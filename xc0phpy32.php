<?php

require_once 'parsedown/Parsedown.php';

if ( ! function_exists( 'mb_strlen' ) ) {
	function mb_strlen( $a ) {
		return PHP_INT_MAX;
	}
}

// Put the top-most blog (most recent) on the top.
$published_blogs = [
	'6-05-1998',
	'5-29-1998',
	'5-22-1998',
];

function the_blog_article( $blog ) {
	if ( a_blog_was_requested() && ! is_the_requested_blog( $blog ) ) {
		return;
	}
	
	include "article.php";
}

function the_published_blogs( $then, $extra_data = [] ) {
	ob_start();

	global $published_blogs;
	
	foreach ( $published_blogs as $blog_file_id ) {
		unset( $title, $date, $content, $data, $slug );
		
		ob_start();

		require "blogs/{$blog_file_id}.php";

		$content = ob_get_clean();

		$then( (object) [
			'file_id' => $blog_file_id,
			'title'   => isset( $title ) ? $title : '',
			'date'    => isset( $date ) ? $date : '',
			'content' => isset( $content ) ? $content : '',
			'slug'    => isset( $slug ) ? $slug : $blog_file_id,
			'data'    => (object) array_merge( isset( $data ) ? $data : [], $extra_data ),
		] );
	}
	
	return ob_get_clean();
}

function markup( $markdown ) {
	$Parsedown = new Parsedown();
	
	return $Parsedown->text( $markdown );
}

function get_requested_blog() {
	static $blog = '';
	
	if ( '' === $blog ) {
		$blog = isset( $_GET['blog'] ) 
			? $_GET['blog']
			: '';
	}
	
	return $blog;
}

function is_the_requested_blog( $blog ) {
	return $blog->slug === get_requested_blog();
}

function a_blog_was_requested() {
	return '' !== get_requested_blog();
}

function the_blog_link( $blog ) {
	return "./?blog=" . $blog->slug;
}

function the_blog_date( $blog ) {
	return $blog->date;
}

function the_blog_title( $blog ) {
	return $blog->title;
}

function the_blog_lead( $blog ) {
	return $blog->data->lead;
}

function the_blog_slug( $blog ) {
	return $blog->slug;
}

function sep( $functions, $char, $blog = [], $l = '&nbsp;', $r = '&nbsp;' ) {
	$blog = (object) $blog;
	
	$out = '';
	
	foreach ( $functions as $function ) {
		ob_start();
		
		$function( $blog );
		
		$out .= trim( ob_get_clean() );
		
		if ( ! empty( $out ) && end( $functions ) !== $function ) {
			$out .= "{$l}{$char}{$r}";
		}
	}
	
	return $out;
}