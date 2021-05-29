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
	console.error( error );
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

window.get$ = function( selector ) {
	var $element = $( selector );
	
	if ( ! $element.length ) {
		window.error( 'bad selector: ' + selector );
	}
	
	return $element;
};

window.getNested$ = function( selector, $element ) {
	var $nested = $( selector, $element );
	
	if ( ! $nested.length ) {
		window.error( 'bad nested selector: ' + selector );
	}
	
	return $nested;
};

window.getData = function( data, $element ) {
	var string = $element.attr( 'data-' + data );
	
	if ( 'string' !== typeof string ) {
		window.error( 'no data: ' + data );
	}
	
	return string;
}; 

window.linkArticle = function( $article ) {
	var $blogs   = window.get$( '.blogs' );
	var $header  = window.getNested$( 'header', $article );

	// Create a new list element for the blogs menu.
	var $li = $( '<li>' );

	var slug = window.getData( 'slug', $header ); // The slug (or id) of the article on the page.
	var $h2  = window.getNested$( 'h2', $header ); // We pull the title from this.

	// Build a link to the article.
	$li.html( '<a href="#' + slug + '">' + $h2.text() + '</a>' );

	// Link to the article.
	$article.attr( 'id', slug );

	// Add the link to the list.
	$blogs.append( $li );
};

window.getPart = function( part, $element ) {
	window.xhrThen( part, function() {
		$element.html( this.response.trim() );
	} );
};

window.xhrThen = function( url, then ) {
	var xhr = new XMLHttpRequest();
	
	xhr.open( 'GET', url );
	xhr.onload = then.bind( xhr );
	
	xhr.send();
};

window.addNavToArticle = function( $article ) {
	var url = './parts/article-footer.html';

	window.xhrThen( url, function() {
		$article.append( $( this.response ) );
	} );
};

window.putArticleMd = function( url, $article ) {
	window.xhrThen( url, function() {
		var md = window.markup( this.response );

		// Put the new HTML in the article.
		$article.html( md || 'no-content' );

		window.stylizeArticle( $article );
		window.linkArticle( $article );
		window.addNavToArticle( $article );
	} );
};

$( document ).ready( function() {
	$( 'article' ).each( function( i, article ) {
		
		var $article = $( article );
		
		window.putArticleMd( $article.attr( 'data-md' ), $article );
	} );
} );
