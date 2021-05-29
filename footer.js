window.get( 'sidebar', 'sidebar' );
window.get( 'menu', 'nav' );

window.request = window.getRequest();

// Handle the request (if any).
if ( '' === window.request ) {

	// No request, show home.
	window.get( 'home', 'main' );
} else {

	// Show the request.
	window.get( window.request, 'main' );
}