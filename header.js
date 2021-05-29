window.markup = function( markdown ) {
	var md = new Remarkable( {
		html: true,
		xhtmlOut: false,
		breaks: true,
		linkify: true,
	} );
	
	return md.render( markdown );
};

window.get = function( path, placeHolder ) {
	const xhr = new XMLHttpRequest();
	const site = ''; // Keep relative.
	const url = site + path + '.html';
	
	const content = document.getElementById( placeHolder );
	
	if ( 'object' !== typeof content ) {
		alert( 'Could not find: #' + placeHolder );
		return;
	}
	
	xhr.open( 'GET', url );
	xhr.send();

	xhr.onload = function() {
		content.innerHTML = window.markup( xhr.response );
	};
};

window.getRequest = function() {
	return window.location.search
		.replace( '?', '' )
		.replace( '.html', '' );
};