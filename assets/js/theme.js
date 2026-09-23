/**
 * Abrahamic Religions: front-end behaviour.
 * Header shadow, active-section nav state, comparison tabs (mobile),
 * timeline arrows, optional reveal-on-scroll.
 */
( function () {
	'use strict';

	var doc = document.documentElement;
	var settings = window.abrTheme || {};
	var reducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	/* Header shadow once the page scrolls. */
	var header = document.querySelector( '.abr-header' );
	if ( header ) {
		var onScroll = function () {
			header.classList.toggle( 'is-scrolled', window.scrollY > 8 );
		};
		window.addEventListener( 'scroll', onScroll, { passive: true } );
		onScroll();
	}

	/* Mark the nav link whose section is in view (front page only). */
	var navLinks = Array.prototype.slice.call( document.querySelectorAll( '.abr-header a[href*="#"]' ) );
	var sectionMap = {};
	navLinks.forEach( function ( link ) {
		var hash = link.hash && link.hash.slice( 1 );
		var target = hash && document.getElementById( hash );
		if ( target && link.pathname.replace( /\/$/, '' ) === window.location.pathname.replace( /\/$/, '' ) ) {
			sectionMap[ hash ] = link;
		}
	} );
	if ( 'IntersectionObserver' in window && Object.keys( sectionMap ).length ) {
		var navObserver = new IntersectionObserver( function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( ! entry.isIntersecting ) {
					return;
				}
				navLinks.forEach( function ( l ) {
					l.classList.remove( 'is-current' );
					l.removeAttribute( 'aria-current' );
				} );
				var active = sectionMap[ entry.target.id ];
				active.classList.add( 'is-current' );
				active.setAttribute( 'aria-current', 'location' );
			} );
		}, { rootMargin: '-45% 0px -50% 0px' } );
		Object.keys( sectionMap ).forEach( function ( id ) {
			navObserver.observe( document.getElementById( id ) );
		} );
	}

	/* Mark the menu link for the section the visitor is in: the longest link path
	   that the current path starts with. WordPress already marks exact page matches. */
	var here = window.location.pathname.replace( /\/+$/, '' ) + '/';
	var best = null;
	var bestLength = 1;
	document.querySelectorAll( '.abr-header .wp-block-navigation-item > .wp-block-navigation-item__content' ).forEach( function ( link ) {
		if ( link.hash || link.origin !== window.location.origin ) {
			return;
		}
		var path = link.pathname.replace( /\/+$/, '' ) + '/';
		if ( path.length > bestLength && here.indexOf( path ) === 0 ) {
			best = link;
			bestLength = path.length;
		}
	} );
	if ( best ) {
		best.classList.add( 'is-current' );
		var parentItem = best.closest( '.wp-block-navigation__submenu-container' );
		parentItem = parentItem && parentItem.closest( '.wp-block-navigation-submenu' );
		if ( parentItem ) {
			var parentLink = parentItem.querySelector( ':scope > .wp-block-navigation-item__content' );
			if ( parentLink ) {
				parentLink.classList.add( 'is-current-parent' );
			}
		}
		if ( ! best.hasAttribute( 'aria-current' ) ) {
			best.setAttribute( 'aria-current', here === best.pathname.replace( /\/+$/, '' ) + '/' ? 'page' : 'true' );
		}
	}

	/* Comparison tabs. All three columns show on wide screens; tabs switch them on narrow ones. */
	document.querySelectorAll( '.abr-compare' ).forEach( function ( section ) {
		var tabs = Array.prototype.slice.call( section.querySelectorAll( '.abr-compare-tabs [role="tab"]' ) );
		var cols = Array.prototype.slice.call( section.querySelectorAll( '.abr-compare-col' ) );

		var select = function ( tab ) {
			tabs.forEach( function ( t ) {
				var on = t === tab;
				t.setAttribute( 'aria-selected', on ? 'true' : 'false' );
				t.tabIndex = on ? 0 : -1;
			} );
			cols.forEach( function ( col ) {
				col.classList.toggle( 'is-active', col.classList.contains( 'is-' + tab.dataset.target ) );
			} );
		};

		tabs.forEach( function ( tab, i ) {
			tab.addEventListener( 'click', function () {
				select( tab );
			} );
			tab.addEventListener( 'keydown', function ( e ) {
				var next = null;
				if ( 'ArrowRight' === e.key ) {
					next = tabs[ ( i + 1 ) % tabs.length ];
				} else if ( 'ArrowLeft' === e.key ) {
					next = tabs[ ( i - 1 + tabs.length ) % tabs.length ];
				}
				if ( next ) {
					e.preventDefault();
					next.focus();
					select( next );
				}
			} );
		} );
		if ( tabs.length ) {
			select( tabs[ 0 ] );
		}
	} );

	/* Timeline arrow buttons. */
	document.querySelectorAll( '.abr-timeline' ).forEach( function ( section ) {
		var track = section.querySelector( '.abr-timeline__track' );
		if ( ! track ) {
			return;
		}
		section.querySelectorAll( '[data-scroll]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var step = ( track.firstElementChild ? track.firstElementChild.offsetWidth : 220 ) + 24;
				track.scrollBy( {
					left: Number( btn.dataset.scroll ) * step,
					behavior: reducedMotion ? 'auto' : 'smooth',
				} );
			} );
		} );
	} );

	/* Reveal on scroll: one staggered entrance per grid. */
	if ( settings.reveal && ! reducedMotion && 'IntersectionObserver' in window ) {
		var items = document.querySelectorAll( '.abr-grid > *, .abr-timeline__track > *, .abr-articles .wp-block-post' );
		if ( items.length ) {
			doc.classList.add( 'abr-reveal-on' );
			var revealObserver = new IntersectionObserver( function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( entry.isIntersecting ) {
						entry.target.classList.add( 'is-visible' );
						revealObserver.unobserve( entry.target );
					}
				} );
			}, { rootMargin: '0px 0px -8% 0px' } );

			items.forEach( function ( el ) {
				var index = Array.prototype.indexOf.call( el.parentNode.children, el ) % 4;
				el.classList.add( 'abr-reveal' );
				el.style.transitionDelay = ( index * 80 ) + 'ms';
				revealObserver.observe( el );
			} );
		}
	}
}() );

/**
 * Copy the citation text to the clipboard.
 */
document.addEventListener( 'click', function ( event ) {
	var button = event.target.closest && event.target.closest( '[data-abr-copy]' );
	if ( ! button ) {
		return;
	}
	var box = button.closest( '.abr-cite' );
	var text = box ? box.querySelector( '[data-abr-copy-text]' ) : null;
	if ( ! text || ! navigator.clipboard ) {
		return;
	}
	navigator.clipboard.writeText( text.textContent.trim() ).then( function () {
		var original = button.textContent;
		button.textContent = button.getAttribute( 'data-copied' );
		button.classList.add( 'is-done' );
		window.setTimeout( function () {
			button.textContent = original;
			button.classList.remove( 'is-done' );
		}, 2000 );
	} );
} );

/**
 * Header search: an icon that opens a dropdown field, closes on a second
 * click of the same icon, on Escape, or on a click outside it.
 */
( function () {
	'use strict';

	function closeAll( except ) {
		document.querySelectorAll( '.abr-header-search.is-open' ).forEach( function ( box ) {
			if ( box === except ) {
				return;
			}
			box.classList.remove( 'is-open' );
			var toggle = box.querySelector( '[data-abr-search-toggle]' );
			var field = box.querySelector( '.abr-header-search__field' );
			if ( toggle ) {
				toggle.setAttribute( 'aria-expanded', 'false' );
			}
			if ( field ) {
				field.setAttribute( 'tabindex', '-1' );
			}
		} );
	}

	document.addEventListener( 'click', function ( event ) {
		var toggle = event.target.closest && event.target.closest( '[data-abr-search-toggle]' );
		if ( toggle ) {
			var box = toggle.closest( '.abr-header-search' );
			var opening = ! box.classList.contains( 'is-open' );
			closeAll( opening ? box : null );
			box.classList.toggle( 'is-open', opening );
			toggle.setAttribute( 'aria-expanded', opening ? 'true' : 'false' );
			var field = box.querySelector( '.abr-header-search__field' );
			if ( field ) {
				field.setAttribute( 'tabindex', opening ? '0' : '-1' );
				if ( opening ) {
					field.focus();
				}
			}
			return;
		}
		if ( ! event.target.closest || ! event.target.closest( '.abr-header-search' ) ) {
			closeAll();
		}
	} );

	document.addEventListener( 'keydown', function ( event ) {
		if ( 'Escape' !== event.key ) {
			return;
		}
		var open = document.querySelector( '.abr-header-search.is-open' );
		if ( ! open ) {
			return;
		}
		var toggle = open.querySelector( '[data-abr-search-toggle]' );
		closeAll();
		if ( toggle ) {
			toggle.focus();
		}
	} );
}() );
