/**
 * Abrahamic Religions: photograph viewer.
 * Photographs placed with [abr_photo] inside page and article content open
 * larger in a native <dialog>. The larger file comes from data-abr-full when
 * the theme bundles one, else the photograph's own file. Escape, the close
 * button or a click outside the photograph closes the viewer, and focus
 * returns to the photograph that opened it.
 */
( function () {
	'use strict';

	var images = document.querySelectorAll( '.wp-block-post-content .abr-photo img' );
	if ( ! images.length || typeof window.HTMLDialogElement !== 'function' ) {
		return;
	}

	var labels = window.abrLightbox || {};
	var root = document.documentElement;
	var trigger = null;

	var dialog = document.createElement( 'dialog' );
	dialog.className = 'abr-lightbox';
	dialog.setAttribute( 'aria-label', labels.dialog || 'Enlarged photograph' );

	var figure = document.createElement( 'figure' );
	figure.className = 'abr-lightbox__figure';
	var big = document.createElement( 'img' );
	big.className = 'abr-lightbox__img';
	big.decoding = 'async';
	var caption = document.createElement( 'figcaption' );
	caption.className = 'abr-lightbox__caption';
	figure.appendChild( big );
	figure.appendChild( caption );

	var close = document.createElement( 'button' );
	close.type = 'button';
	close.className = 'abr-lightbox__close';
	close.setAttribute( 'aria-label', labels.close || 'Close photograph' );

	dialog.appendChild( figure );
	dialog.appendChild( close );
	document.body.appendChild( dialog );

	function open( img, button ) {
		trigger = button;
		dialog.classList.add( 'is-loading' );
		big.onload = function () {
			dialog.classList.remove( 'is-loading' );
		};
		big.alt = img.alt;
		big.src = img.getAttribute( 'data-abr-full' ) || img.currentSrc || img.src;
		caption.textContent = img.alt;
		caption.hidden = ! img.alt;
		root.classList.add( 'abr-lightbox-open' );
		dialog.showModal();
		close.focus();
	}

	close.addEventListener( 'click', function () {
		dialog.close();
	} );

	// The dialog fills the screen; a click on it, outside the photograph and caption, closes it.
	dialog.addEventListener( 'click', function ( event ) {
		if ( event.target === dialog || event.target === figure ) {
			dialog.close();
		}
	} );

	dialog.addEventListener( 'close', function () {
		root.classList.remove( 'abr-lightbox-open' );
		big.removeAttribute( 'src' );
		if ( trigger ) {
			trigger.focus();
		}
	} );

	Array.prototype.forEach.call( images, function ( img ) {
		var button = document.createElement( 'button' );
		button.type = 'button';
		button.className = 'abr-photo__zoom';
		button.setAttribute( 'aria-label', ( labels.open || 'Enlarge photograph' ) + ( img.alt ? ': ' + img.alt : '' ) );
		img.parentNode.insertBefore( button, img );
		button.appendChild( img );
		button.addEventListener( 'click', function () {
			open( img, button );
		} );
	} );
}() );
