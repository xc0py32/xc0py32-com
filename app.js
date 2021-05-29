window.markup = function( markdown ) {
	var md = new Remarkable( {
		html: true,
		xhtmlOut: false,
		breaks: true,
		linkify: true,
	} );
	
	return md.render( markdown );
};

window.error = function( error ) {
	alert( 'Error on line: ' + error );
}

window.stylizeArticle= function( element ) {

	// Styleize the header of the element.
	$( 'header', element ).each( function( i, header ) {
		$( header ).addClass( 'page-header' );
	} );
};

window.linkArticle = function( element ) {
	var $list = $( '.blogs' );
	
	if ( ! $list.length ) {
		window.error( new Error().lineNumber );
		return;
	}
	
	var $h2 = $( 'h2', element );
	
	if ( ! $h2.length ) {
		window.error( new Error().lineNumber );
		return;
	}
	
	var $li = $( '<li>' );
	
	// @TODO: We can make this dynamic somehow, but how would we make it permanant? 
	var id = $h2.attr( 'data-id' );
	
	if ( 'string' !== typeof id ) {
		window.error( new Error().lineNumber );
		return;
	}
	
	$li.html( '<a href="#' + id + '">' + $h2.text() + '</a>' );
	
	$( element ).attr( 'id', id );
	
	$list.append( $li );
};

window.get = function( url, element ) {
	var xhr = new XMLHttpRequest();
	
	if ( 'object' !== typeof content ) {
		window.error( new Error().lineNumber );
		return;
	}
		
	xhr.open( 'GET', url );
	xhr.send();
	
	xhr.onload = function() {
	
		// Put the new HTML in the article.
		$( element ).html( window.markup( xhr.response ) );
		
		window.stylizeArticle( element );
		window.linkArticle( element );
		
	};
};

$( '.md' ).each( function( i, e ) {
	window.get( $( e ).attr( 'data-md' ), e );
} );