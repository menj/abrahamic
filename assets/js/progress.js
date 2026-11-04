/**
 * Reading progress bar (inc/progress.php). A passive scroll listener asks
 * for one animation frame; the frame sets the bar's scale from the scroll
 * position, and again whenever the page changes height.
 */
( function () {
	'use strict';
	var bar = document.querySelector( '.abr-progress__bar' );
	if ( ! bar ) {
		return;
	}
	var queued = false;

	function update() {
		queued = false;
		var root = document.documentElement;
		var max = root.scrollHeight - root.clientHeight;
		var ratio = max > 0 ? Math.min( 1, Math.max( 0, root.scrollTop / max ) ) : 0;
		bar.style.transform = 'scaleX(' + ratio + ')';
	}

	function request() {
		if ( ! queued ) {
			queued = true;
			window.requestAnimationFrame( update );
		}
	}

	window.addEventListener( 'scroll', request, { passive: true } );
	window.addEventListener( 'resize', request, { passive: true } );
	window.addEventListener( 'load', request );
	// Lazy images and late fonts make the page taller after it loads, with no
	// scroll or resize event. A ResizeObserver on the body catches that; where
	// it is missing, image load events (which do not bubble) are caught on the
	// way down instead.
	if ( 'ResizeObserver' in window ) {
		new window.ResizeObserver( request ).observe( document.body );
	} else {
		document.addEventListener( 'load', request, true );
	}
	update();
}() );
