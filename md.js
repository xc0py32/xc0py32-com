$( '.md' ).each( function( index, element ) {
	var md = new Remarkable();

	var mdContent = element.innerHTML;

	element.innerHTML = md.render( mdContent );
} );