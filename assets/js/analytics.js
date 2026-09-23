/**
 * Abrahamic: Google Analytics 4 bootstrap. The measurement ID arrives in the
 * script tag's data-ga-id attribute, set from Theme Options > Search.
 */
( function () {
	'use strict';

	var script = document.currentScript;
	var id = script && script.getAttribute( 'data-ga-id' );
	if ( ! id ) {
		return;
	}
	window.dataLayer = window.dataLayer || [];
	function gtag() {
		window.dataLayer.push( arguments );
	}
	window.gtag = gtag;
	gtag( 'js', new Date() );
	gtag( 'config', id );
}() );
