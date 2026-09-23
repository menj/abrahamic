<?php
/**
 * Inline SVG interface icons, drawn on a 24x24 grid with a 1.6 stroke.
 * Names that match a social network fall through to abr_social_icon().
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return an SVG icon.
 *
 * @param string $name Icon key.
 * @return string SVG markup.
 */
function abr_icon( $name ) {
	$paths = array(
		'star-of-david' => '<path d="M12 2.5 20.5 17h-17z"/><path d="M12 21.5 3.5 7h17z"/>',
		'cross'         => '<path d="M10 2.5h4v6h5.5v4H14v9h-4v-9H4.5v-4H10z"/>',
		'crescent'      => '<path d="M15.5 3.2A9 9 0 1 0 15.5 20.8 7.2 7.2 0 1 1 15.5 3.2z"/><path d="m18.6 9.2.7 1.9 2 .1-1.6 1.2.6 1.9-1.7-1.1-1.7 1.1.6-1.9-1.6-1.2 2-.1z"/>',
		'scroll'        => '<path d="M7 4h11a2 2 0 0 1 2 2v1h-3"/><path d="M17 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-1h11"/><path d="M7 4a2 2 0 0 0-2 2v11"/><path d="M9 9h5M9 12h5"/>',
		'city'          => '<path d="M3 21h18"/><path d="M5 21V11h4v10"/><path d="M9 21V8a3 3 0 0 1 6 0v13"/><path d="M15 21v-7h4v7"/><path d="M12 3v2"/>',
		'mosque'        => '<path d="M3 21h18"/><path d="M6 21v-7a6 6 0 0 1 12 0v7"/><path d="M12 3v5"/><path d="M10 21v-4a2 2 0 0 1 4 0v4"/><path d="M3 21V9M21 21V9"/>',
		'mountain'      => '<path d="M2 20 9 7l4 7 2-3 7 9z"/><path d="m7.5 10 1.5 1.5L10.5 10"/>',
		'arrow-down'    => '<path d="M12 4v16M6 14l6 6 6-6"/>',
		'arrow-right'   => '<path d="M4 12h16M14 6l6 6-6 6"/>',
		'info'          => '<circle cx="12" cy="12" r="9"/><path d="M12 11v6M12 7.5v.5"/>',
		'book'          => '<path d="M2 5c4-1.5 7-1 10 1 3-2 6-2.5 10-1v14c-4-1.5-7-1-10 1-3-2-6-2.5-10-1z"/><path d="M12 6v14"/>',
		'history'       => '<path d="M3 12a9 9 0 1 0 3-6.7L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l3 2"/>',
		'pray'          => '<path d="M12 3c-2 3-3 6-3 9v4l-4 5h14l-4-5v-4c0-3-1-6-3-9z"/><path d="M12 8v8"/>',
		'globe'         => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"/>',
		'lamp'          => '<path d="M9 18h6M10 21h4"/><path d="M12 3a6 6 0 0 0-3.5 10.9c.6.5 1 1.2 1 2V16h5v-.1c0-.8.4-1.5 1-2A6 6 0 0 0 12 3z"/>',
		'archway'       => '<path d="M2 21h20M3 4h18v3H3z"/><path d="M4 7v14M20 7v14"/><path d="M8 21v-6a4 4 0 0 1 8 0v6"/>',
		'handshake'     => '<path d="m2 12 4-4 5 2 3-2 4 1 4 4"/><path d="m6 8-4 4 6 6 2-1 2 2 2-1 2 1 4-5"/><path d="m10 13 2 2M13 12l2 2"/>',
		'landmark'      => '<path d="M3 21h18M4 10h16M12 3 3 8h18z"/><path d="M6 10v8M10 10v8M14 10v8M18 10v8M4 18h16"/>',
		'search'        => '<circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/>',
		'close'         => '<path d="M6 6l12 12M18 6 6 18"/>',
		'sun'           => '<circle cx="12" cy="12" r="4.2"/><path d="M12 2.6v2.2M12 19.2v2.2M4.4 12H2.2M21.8 12h-2.2M6.4 6.4 4.8 4.8M19.2 19.2l-1.6-1.6M17.6 6.4l1.6-1.6M4.8 19.2l1.6-1.6"/>',
		'moon'          => '<path d="M20 14.2A8.4 8.4 0 0 1 9.8 4a8.4 8.4 0 1 0 10.2 10.2z"/><path d="m17.4 3.4.5 1.4 1.4.5-1.4.5-.5 1.4-.5-1.4-1.4-.5 1.4-.5z"/>',
	);

	if ( 'darfash' === $name ) {
		return abr_darfash_svg( 'abr-icon abr-icon--darfash' );
	}

	if ( ! isset( $paths[ $name ] ) ) {
		// Social marks come from the icon pack (inc/social.php).
		return abr_social_icon( $name );
	}

	return '<svg class="abr-icon abr-icon--' . esc_attr( $name ) . '" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $paths[ $name ] . '</svg>';
}

/**
 * The darfash, the Mandaean banner, as inline SVG from assets/images/darfash.svg.
 * Drawing by Dragovit (Wikimedia Commons, CC BY-SA 3.0), credited on the
 * Copyright and DMCA page. The paths take the current text colour, so the mark
 * follows the colour scheme like the other religion icons.
 *
 * @param string $class Classes for the svg element.
 * @param string $label Accessible name; empty hides the mark from assistive technology.
 * @return string SVG markup, or an empty string when the file is missing.
 */
function abr_darfash_svg( $class, $label = '' ) {
	static $paths = null;
	if ( null === $paths ) {
		$file  = ABR_DIR . '/assets/images/darfash.svg';
		$svg   = is_readable( $file ) ? file_get_contents( $file ) : ''; // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- a bundled file.
		$paths = preg_match_all( '/<path d="[^"]*"\/>/', (string) $svg, $m ) ? implode( '', $m[0] ) : '';
	}
	if ( '' === $paths ) {
		return '';
	}
	$a11y = '' === $label ? ' aria-hidden="true" focusable="false"' : ' role="img" aria-label="' . esc_attr( $label ) . '"';
	return '<svg class="' . esc_attr( $class ) . '" viewBox="0 0 964.24 1614.5" fill="currentColor"' . $a11y . '>' . $paths . '</svg>';
}
