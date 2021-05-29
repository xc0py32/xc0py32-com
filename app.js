window.xhr = new XMLHttpRequest();

window.md = new Remarkable( {
	html: true,
	xhtmlOut: false,
	breaks: true,
	linkify: true
} );

window.markup = function( markdown ) {
	return window.md.render( markdown );
};

window.error = function( error ) {
	alert( error );
};

window.stylizeArticle= function( element ) {

	// Styleize the header of the element.
	$( 'header', element ).each( function( i, header ) {
		$( header ).addClass( 'page-header' )
			.addClass( 'text-center' );
	} );
};

window.putArticleMd$ = function( selector ) {

	var $element = $( selector );

	if ( ! $element.length ) {
		window.error( 'badelement: ' + selector );
	}

	return $element;
};

window.putArticleMdNested$ = function ( selector, $element ) {
	var $nested = $( selector, $element );

	if ( ! $nested.length ) {
		window.error( 'bad nested element: ' + selector );
	}

	return $nested;
};

window.putArticleMdData$ = function( attr, $element ) {

	var attribute = $element.attr( 'data-' + attr );

	if ( 'string' !== typeof attribute ) {
		window.error( 'Could not get attr: ' + attr );
	}

	return attribute;
};

window.linkArticle = function( article ) {

	var $blogs    = window.putArticleMd$( '.blogs' );
	var $article = window.putArticleMd$( article );
	var $header  = window.putArticleMdNested$( 'header', $article );

	// Create a new list element for the blogs menu.
	var $li = $( '<li>' );

	var slug = window.putArticleMdData$( 'slug', $header ); // The slug (or id) of the article on the page.
	var $h2  = window.putArticleMdNested$( 'h2', $header ); // We pull the title from this.

	// Build a link to the article.
	$li.html( '<a href="#' + slug + '">' + $h2.text() + '</a>' );

	// Link to the article.
	$article.attr( 'id', slug );

	// Add the link to the list.
	$blogs.append( $li );
};

window.getPart = function( part, $element ) {
	window.xhrThen( part, function() {
		$element.html( xhr.response );
	} );
};

window.xhrThen = function( url, then ) {

	window.xhr.open( 'GET', url );
	window.xhr.send();

	window.xhr.onload = then;
};

window.addNavToArticle = function( $article ) {
	window.xhrThen( './parts/article-nav.html', function() {
		$article.append( $( xhr.response ) );
	} );
};

window.putArticleMd = function( url, article ) {
	var $article = $( article );

	window.xhrThen( url, function() {

		// Put the new HTML in the article.
		$article.html( window.markup( xhr.response ) );

		window.stylizeArticle( article );
		window.linkArticle( article );
		
		window.addNavToArticle( $article );
	} );
};

$( document ).ready( function() {

	$( 'article' ).each( function( i, article ) {
		
		var $article = $( article );
		
		window.putArticleMd( $article.attr( 'data-md' ), article );
	} );
} );
