/**
 * Abrahamic: Theme Options screen.
 * Tabs (URL ?tab= first, then the last tab used), colour pickers,
 * scheme presets, social filter and count, reset confirmation.
 */
( function ( $ ) {
	'use strict';

	var settings = window.abrOptions || {};
	var storageKey = 'abrOptionsTab';
	var $wrap = $( '.abr-settings' );
	var $tabs = $wrap.find( '.abr-tab' );
	var $panels = $wrap.find( '.abr-panel' );
	var $form = $wrap.find( '.abr-options-form' );

	function activate( slug, focus ) {
		var $tab = $tabs.filter( '[data-tab="' + slug + '"]' );
		if ( ! $tab.length ) {
			return;
		}
		$tabs.attr( { 'aria-selected': 'false', tabindex: '-1' } );
		$tab.attr( { 'aria-selected': 'true', tabindex: '0' } );
		$panels.attr( 'hidden', true );
		$( '#abr-panel-' + slug ).removeAttr( 'hidden' );

		// Tools has its own forms; the options form is hidden while it is open.
		$form.prop( 'hidden', 'tools' === slug );

		if ( focus ) {
			$tab.trigger( 'focus' );
		}
		try {
			window.sessionStorage.setItem( storageKey, slug );
		} catch ( e ) {}

		// Keep the tab in the address so a save returns to it.
		if ( window.history && window.history.replaceState ) {
			var url = new URL( window.location.href );
			url.searchParams.set( 'tab', slug );
			url.searchParams.delete( 'abr-notice' );
			window.history.replaceState( null, '', url.toString() );
			$form.find( 'input[name="_wp_http_referer"]' ).val( url.pathname + url.search );
		}
	}

	$tabs.on( 'click', function () {
		activate( $( this ).data( 'tab' ) );
	} );

	$tabs.on( 'keydown', function ( e ) {
		var i = $tabs.index( this );
		var n = $tabs.length;
		var next = null;
		if ( 'ArrowRight' === e.key ) {
			next = ( i + 1 ) % n;
		} else if ( 'ArrowLeft' === e.key ) {
			next = ( i - 1 + n ) % n;
		} else if ( 'Home' === e.key ) {
			next = 0;
		} else if ( 'End' === e.key ) {
			next = n - 1;
		}
		if ( null !== next ) {
			e.preventDefault();
			activate( $tabs.eq( next ).data( 'tab' ), true );
		}
	} );

	var initial = $wrap.data( 'initial-tab' );
	if ( ! initial ) {
		try {
			initial = window.sessionStorage.getItem( storageKey );
		} catch ( e ) {}
	}
	activate( initial || $tabs.first().data( 'tab' ) );

	/* Colour pickers and scheme presets. */
	$( '.abr-color' ).wpColorPicker();

	var schemes = settings.schemes || {};
	$( 'input[name="abr_options[scheme]"]' ).on( 'change', function () {
		var slug = this.value;
		var $custom = $( '.abr-custom-colours' );
		if ( 'custom' === slug ) {
			$custom.removeAttr( 'hidden' );
			return;
		}
		$custom.attr( 'hidden', true );
		$.each( schemes[ slug ] || {}, function ( key, hex ) {
			$( '.abr-color[data-slug="' + key + '"]' ).wpColorPicker( 'color', hex );
		} );
	} );

	/* Social tab: filter by name and mark filled fields. */
	var $filter = $( '#abr-social-filter' );
	var $count = $( '.abr-social-count' );
	var $fields = $( '.abr-social-field' );

	function refreshFilled() {
		var filled = 0;
		$fields.each( function () {
			var on = $.trim( $( this ).find( 'input' ).val() ) !== '';
			$( this ).toggleClass( 'is-filled', on );
			filled += on ? 1 : 0;
		} );
		$count.text( ( $count.data( 'template' ) || '%d' ).replace( '%d', filled ) );
	}

	$filter.on( 'input', function () {
		var term = $.trim( this.value ).toLowerCase();
		$fields.each( function () {
			var match = ! term || String( $( this ).data( 'name' ) ).indexOf( term ) !== -1;
			$( this ).prop( 'hidden', ! match );
		} );
		$( '.abr-social-group' ).each( function () {
			$( this ).prop( 'hidden', $( this ).find( '.abr-social-field:not([hidden])' ).length === 0 );
		} );
	} );

	/* Enter in the filter must not submit the options form. */
	$filter.on( 'keydown', function ( e ) {
		if ( 'Enter' === e.key ) {
			e.preventDefault();
		}
	} );

	$fields.find( 'input' ).on( 'input', refreshFilled );
	refreshFilled();

	/* Image fields: pick from the media library. */
	$( '.abr-media-button' ).on( 'click', function ( e ) {
		e.preventDefault();
		var $input = $( '#' + $( this ).data( 'target' ) );
		if ( ! window.wp || ! window.wp.media ) {
			$input.trigger( 'focus' );
			return;
		}
		var frame = window.wp.media( {
			title: settings.mediaTitle || 'Choose an image',
			button: { text: settings.mediaButton || 'Use this image' },
			library: { type: 'image' },
			multiple: false
		} );
		frame.on( 'select', function () {
			var attachment = frame.state().get( 'selection' ).first().toJSON();
			$input.val( attachment.url ).trigger( 'change' );
		} );
		frame.open();
	} );

	/* Tools: confirm before resetting. */
	$( '.abr-reset-form' ).on( 'submit', function ( e ) {
		if ( ! window.confirm( settings.confirmReset || 'Reset all Theme Options?' ) ) {
			e.preventDefault();
		}
	} );
}( jQuery ) );
