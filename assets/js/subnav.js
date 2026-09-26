/**
 * Abrahamic: the home page section bar ([abr_home_subnav]).
 *
 * Marks the link of the section currently in view (aria-current), and keeps
 * that link visible when the bar scrolls sideways on narrow screens. Smooth
 * scrolling itself comes from CSS (scroll-behavior on html), which also honours
 * the visitor's reduced-motion setting.
 */
( function () {
	'use strict';

	var bar = document.querySelector( '.abr-subnav' );
	if ( ! bar || ! ( 'IntersectionObserver' in window ) ) {
		return;
	}
	var list  = bar.querySelector( '.abr-subnav__list' );
	var links = Array.prototype.slice.call( bar.querySelectorAll( 'a[href^="#"]' ) );
	var byId  = {};
	var sections = [];

	links.forEach( function ( link ) {
		var id = decodeURIComponent( link.getAttribute( 'href' ).slice( 1 ) );
		var section = document.getElementById( id );
		if ( section ) {
			byId[ id ] = link;
			sections.push( section );
		}
	} );
	if ( ! sections.length ) {
		return;
	}

	var current = null;
	function mark( id ) {
		if ( id === current ) {
			return;
		}
		current = id;
		links.forEach( function ( link ) {
			link.removeAttribute( 'aria-current' );
		} );
		var active = id && byId[ id ];
		if ( active ) {
			active.setAttribute( 'aria-current', 'true' );
			// Bring the active link into view inside the bar only (never the page).
			var left = active.offsetLeft - ( list.clientWidth - active.offsetWidth ) / 2;
			list.scrollTo( { left: Math.max( 0, left ), behavior: 'smooth' } );
		}
	}

	// A section counts as current while it crosses a line a third of the way down.
	var visible = {};
	var observer = new IntersectionObserver( function ( entries ) {
		entries.forEach( function ( entry ) {
			visible[ entry.target.id ] = entry.isIntersecting;
		} );
		var found = null;
		sections.forEach( function ( section ) {
			if ( visible[ section.id ] && ! found ) {
				found = section.id;
			}
		} );
		mark( found );
	}, { rootMargin: '-33% 0px -66% 0px', threshold: 0 } );

	sections.forEach( function ( section ) {
		observer.observe( section );
	} );

	// The bar gains a shadow once it sits against the header.
	var sentinel = document.createElement( 'div' );
	sentinel.setAttribute( 'aria-hidden', 'true' );
	sentinel.style.cssText = 'position:relative;height:1px;margin:0 0 -1px';
	bar.parentNode.insertBefore( sentinel, bar );
	new IntersectionObserver( function ( entries ) {
		bar.classList.toggle( 'is-stuck', ! entries[ 0 ].isIntersecting );
	}, { rootMargin: '-' + ( parseInt( getComputedStyle( bar ).top, 10 ) + 1 ) + 'px 0px 0px 0px' } ).observe( sentinel );
}() );
