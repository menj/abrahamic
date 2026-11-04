/**
 * Reading progress bar (inc/progress.php). A passive scroll listener asks
 * for one animation frame; the frame sets the bar's scale from the scroll
 * position. Nothing runs between scrolls.
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
	update();
}() );
