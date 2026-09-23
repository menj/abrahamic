/**
 * Abrahamic: character counter for the "Search description" box.
 */
( function () {
	'use strict';

	var field = document.getElementById( 'abr-description' );
	var count = document.querySelector( '.abr-description-count' );
	if ( ! field || ! count ) {
		return;
	}
	var limit = parseInt( field.getAttribute( 'data-limit' ), 10 ) || 130;

	function update() {
		var length = field.value.trim().length;
		count.textContent = length + ' / ' + limit;
		count.style.color = length > limit ? '#b32d2e' : '';
		count.style.fontWeight = length > limit ? '600' : '';
	}
	field.addEventListener( 'input', update );
	update();
}() );
