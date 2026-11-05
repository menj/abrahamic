<?php
/**
 * Browser icons from the AR mark: the head tags, the web app manifest and
 * /favicon.ico. A Site Icon set under Appearance > Customize > Site Identity
 * replaces all of them, and WordPress then prints its own tags.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Address of one file in assets/images/, versioned by the theme version.
 *
 * @param string $file File name.
 * @return string
 */
function abr_favicon_url( $file ) {
	return add_query_arg( 'ver', ABR_VERSION, ABR_URI . '/assets/images/' . $file );
}

/**
 * Browser icons and the manifest, until a Site Icon is set. Runs on the
 * site, the login screen and the admin.
 */
function abr_default_icons() {
	if ( has_site_icon() ) {
		return;
	}
	printf( '<link rel="icon" href="%s" type="image/svg+xml">' . "\n", esc_url( abr_favicon_url( 'favicon.svg' ) ) );
	printf( '<link rel="icon" href="%s" sizes="32x32" type="image/png">' . "\n", esc_url( abr_favicon_url( 'favicon-32.png' ) ) );
	printf( '<link rel="icon" href="%s" sizes="192x192" type="image/png">' . "\n", esc_url( abr_favicon_url( 'icon-192.png' ) ) );
	printf( '<link rel="apple-touch-icon" href="%s">' . "\n", esc_url( abr_favicon_url( 'apple-touch-icon.png' ) ) );
	printf( '<link rel="manifest" href="%s">' . "\n", esc_url( abr_favicon_url( 'site.webmanifest' ) ) );
	echo '<meta name="theme-color" content="#172033">' . "\n";
}
add_action( 'wp_head', 'abr_default_icons', 3 );
add_action( 'login_head', 'abr_default_icons' );
add_action( 'admin_head', 'abr_default_icons' );

/**
 * Browsers and bots ask for /favicon.ico on their own. Until a Site Icon is
 * set, answer with the theme's icon: a day's cache, then an ETag check that
 * answers 304 while the file is unchanged. With a Site Icon, or while the
 * file is missing, WordPress answers with its redirect.
 */
function abr_serve_favicon() {
	$file = ABR_DIR . '/assets/images/favicon.ico';
	if ( has_site_icon() || ! is_readable( $file ) ) {
		return;
	}
	$etag = '"' . md5_file( $file ) . '"';
	header( 'Content-Type: image/x-icon' );
	header( 'Cache-Control: public, max-age=86400' );
	header( 'ETag: ' . $etag );
	if ( $etag === trim( wp_unslash( (string) ( $_SERVER['HTTP_IF_NONE_MATCH'] ?? '' ) ) ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		status_header( 304 );
		exit;
	}
	status_header( 200 );
	header( 'Content-Length: ' . (string) filesize( $file ) );
	readfile( $file ); // phpcs:ignore WordPress.WP.AlternativeFunctions
	exit;
}
add_action( 'do_faviconico', 'abr_serve_favicon', 5 );
// WordPress ends a HEAD request before do_favicon, with an empty HTML answer.
// template_redirect runs first, so HEAD gets the icon's own headers too.
add_action(
	'template_redirect',
	static function () {
		if ( is_favicon() ) {
			abr_serve_favicon();
		}
	},
	0
);
