<?php

require_once 'parsedown/Parsedown.php';

if ( ! function_exists( 'mb_strlen' ) ) {
	function mb_strlen( $a ) {
		return PHP_INT_MAX;
	}
}

$published_blogs = [
	'5-29-1998',
	'5-22-1998',
];

ksort( $published_blogs );

function the_blog_article( $blog ) {
	include "article.php";
}

function the_published_blogs( $then, $_data = [] ) {
	global $published_blogs;
	
	foreach ( $published_blogs as $blog ) {
		unset( $title, $date, $content, $data, $slug );
		
		ob_start();

		require "blogs/{$blog}.php";

		$content = ob_get_clean();

		$then( (object) [
			'blog'    => $blog,
			'title'   => isset( $title ) ? $title : '',
			'date'    => isset( $date ) ? $date : '',
			'content' => isset( $content ) ? $content : '',
			'slug'    => isset( $slug ) ? $slug : $blog,
			'data'    => (object) array_merge( isset( $data ) ? $data : [], $_data ),
		] );
	}
}

function markup( $markdown ) {
	$Parsedown = new Parsedown();
	
	echo $Parsedown->text( $markdown );
}