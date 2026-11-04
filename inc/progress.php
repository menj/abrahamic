<?php
/**
 * Reading progress bar: a thin bar fixed to the top or bottom of the window
 * on single posts and pages, filled as the reader scrolls.
 *
 * Built into the theme from Reading Progress Bar 1.3.1 by Jb Audras (GPL).
 * While the plugin is active, the theme leaves the bar to it, so the page
 * never shows two.
 *
 * The bar is aria-hidden. It repeats what the browser's scroll position
 * already tells every reader, and assistive technology has its own way to
 * report position in a page. A role="progressbar" whose value changes on
 * every scroll step would be announced again and again for no gain.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Where the bar can sit.
 *
 * @return array slug => label
 */
function abr_progress_positions() {
	return array(
		'top'    => __( 'Top of the window', 'abrahamic' ),
		'bottom' => __( 'Bottom of the window', 'abrahamic' ),
	);
}

/**
 * Post types the bar can be shown on.
 *
 * @return array slug => label
 */
function abr_progress_post_types() {
	$out = array();
	foreach ( get_post_types( array( 'public' => true ), 'objects' ) as $type ) {
		if ( 'attachment' !== $type->name ) {
			$out[ $type->name ] = $type->labels->name;
		}
	}
	return $out;
}

/**
 * Whether the bar shows on this request.
 *
 * @return bool
 */
function abr_progress_active() {
	if ( function_exists( 'rp_show_it' ) || ! abr_get_option( 'progress_on' ) || ! is_singular() || is_front_page() ) {
		return false;
	}
	return in_array( get_post_type(), (array) abr_get_option( 'progress_types' ), true );
}

/**
 * Its stylesheet and script, only where it shows.
 */
function abr_progress_assets() {
	if ( ! abr_progress_active() ) {
		return;
	}
	wp_enqueue_style( 'abr-progress', ABR_URI . '/assets/css/progress.css', array( 'abr-theme' ), ABR_VERSION );
	wp_enqueue_script( 'abr-progress', ABR_URI . '/assets/js/progress.js', array(), ABR_VERSION, array( 'strategy' => 'defer', 'in_footer' => true ) );
}
add_action( 'wp_enqueue_scripts', 'abr_progress_assets', 20 );

/**
 * The bar, first thing in the body. An empty colour follows the scheme's accent.
 */
function abr_progress_markup() {
	if ( ! abr_progress_active() ) {
		return;
	}
	$style  = '--abr-progress-height:' . (int) abr_get_option( 'progress_height' ) . 'px;';
	$colour = abr_get_option( 'progress_colour' );
	if ( $colour ) {
		$style .= '--abr-progress-colour:' . $colour . ';';
	}
	printf(
		'<div class="abr-progress abr-progress--%1$s" style="%2$s" aria-hidden="true"><div class="abr-progress__bar"></div></div>',
		esc_attr( 'bottom' === abr_get_option( 'progress_position' ) ? 'bottom' : 'top' ),
		esc_attr( $style )
	);
}
add_action( 'wp_body_open', 'abr_progress_markup', 5 );
