/**
 * Abrahamic: parallax for the home page chapter banners ([abr_parallax]).
 *
 * Each banner's photograph is taller than its frame and moves at a fraction
 * of the scrolling speed, so it drifts behind the chapter title. Lightweight
 * by design:
 * - only banners on or near the screen are updated (IntersectionObserver);
 * - one requestAnimationFrame per frame at most, with passive listeners;
 * - movement is a GPU transform (translate3d), so nothing is re-laid out;
 * - no movement at all when the visitor asks for reduced motion or data saving.
 */
( function () {
	'use strict';

	var banners = Array.prototype.slice.call( document.querySelectorAll( '.abr-parallax' ) );
	if ( ! banners.length || ! ( 'IntersectionObserver' in window ) ) {
		return;
	}
	var reduce = window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' );
	var saveData = navigator.connection && navigator.connection.saveData;
	if ( ( reduce && reduce.matches ) || saveData ) {
		return;
	}
	document.documentElement.classList.add( 'abr-has-parallax' );

	var active = [];
	var ticking = false;

	function speed() {
		// A gentler drift on small screens.
		return window.innerWidth < 768 ? 0.14 : 0.24;
	}

	function update() {
		ticking = false;
		var vh = window.innerHeight;
		var k = speed();
		active.forEach( function ( banner ) {
			var rect = banner.getBoundingClientRect();
			// Distance of the banner's centre from the centre of the screen.
			var offset = ( rect.top + rect.height / 2 - vh / 2 ) * -k;
			banner.img.style.transform = 'translate3d(0,' + offset.toFixed( 1 ) + 'px,0)';
		} );
	}

	function request() {
		if ( ! ticking && active.length ) {
			ticking = true;
			window.requestAnimationFrame( update );
		}
	}

	var observer = new IntersectionObserver( function ( entries ) {
		entries.forEach( function ( entry ) {
			var banner = entry.target;
			var index = active.indexOf( banner );
			if ( entry.isIntersecting && index === -1 ) {
				active.push( banner );
			} else if ( ! entry.isIntersecting && index !== -1 ) {
				active.splice( index, 1 );
			}
		} );
		request();
	}, { rootMargin: '200px 0px' } );

	banners.forEach( function ( banner ) {
		banner.img = banner.querySelector( '.abr-parallax__img' );
		if ( banner.img ) {
			observer.observe( banner );
		}
	} );

	window.addEventListener( 'scroll', request, { passive: true } );
	window.addEventListener( 'resize', request, { passive: true } );
	if ( reduce && reduce.addEventListener ) {
		reduce.addEventListener( 'change', function ( event ) {
			if ( event.matches ) {
				window.removeEventListener( 'scroll', request );
				banners.forEach( function ( banner ) {
					if ( banner.img ) {
						banner.img.style.transform = '';
					}
				} );
				document.documentElement.classList.remove( 'abr-has-parallax' );
			}
		} );
	}
}() );
