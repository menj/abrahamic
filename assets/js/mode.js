/**
 * Abrahamic: light and dark colours.
 *
 * Runs in the document head so the stored choice is applied before the first
 * paint. The starting mode comes from the data-abr-mode-default attribute on
 * the script tag, set from Theme Options.
 */
( function () {
	'use strict';

	var KEY = 'abr-mode';
	var root = document.documentElement;
	var script = document.currentScript;
	var fallback = ( script && script.getAttribute( 'data-abr-mode-default' ) ) || 'light';

	function preferred() {
		try {
			var stored = window.localStorage.getItem( KEY );
			if ( 'light' === stored || 'dark' === stored ) {
				return stored;
			}
		} catch ( e ) {}
		if ( 'system' === fallback ) {
			return window.matchMedia && window.matchMedia( '(prefers-color-scheme: dark)' ).matches ? 'dark' : 'light';
		}
		return 'dark' === fallback ? 'dark' : 'light';
	}

	function apply( mode ) {
		root.setAttribute( 'data-abr-mode', mode );
		var dark = 'dark' === mode;
		document.querySelectorAll( '[data-abr-mode-toggle]' ).forEach( function ( button ) {
			button.setAttribute( 'aria-pressed', dark ? 'true' : 'false' );
			var label = button.querySelector( '[data-abr-mode-label]' );
			if ( label ) {
				label.textContent = dark ? label.getAttribute( 'data-light' ) : label.getAttribute( 'data-dark' );
			}
		} );
	}

	apply( preferred() );

	document.addEventListener( 'DOMContentLoaded', function () {
		apply( root.getAttribute( 'data-abr-mode' ) );

		document.addEventListener( 'click', function ( event ) {
			var button = event.target.closest && event.target.closest( '[data-abr-mode-toggle]' );
			if ( ! button ) {
				return;
			}
			var next = 'dark' === root.getAttribute( 'data-abr-mode' ) ? 'light' : 'dark';
			apply( next );
			try {
				window.localStorage.setItem( KEY, next );
			} catch ( e ) {}
		} );
	} );

	if ( window.matchMedia ) {
		var query = window.matchMedia( '(prefers-color-scheme: dark)' );
		var follow = function () {
			var stored = null;
			try {
				stored = window.localStorage.getItem( KEY );
			} catch ( e ) {}
			if ( ! stored && 'system' === fallback ) {
				apply( query.matches ? 'dark' : 'light' );
			}
		};
		if ( query.addEventListener ) {
			query.addEventListener( 'change', follow );
		}
	}
}() );
