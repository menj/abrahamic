<?php
/**
 * Graceful maintenance notices.
 *
 * Visitors should never meet a bare PHP error or WordPress's generic "critical
 * error" message. This module provides one calm, branded notice (HTTP 503 with
 * Retry-After, so search engines treat the outage as temporary) and shows it in
 * every situation where the site cannot render normally:
 *
 * - WordPress updates (core, plugins, themes): wp-content/maintenance.php
 * - Fatal PHP errors, from any theme or plugin: wp-content/php-error.php
 * - Database connection failures: wp-content/db-error.php
 * - This theme caught half-uploaded (a file missing while an update unpacks):
 *   abr_maintenance_guard(), called from functions.php before anything loads.
 *
 * The three wp-content files are WordPress "drop-ins". They live outside the
 * theme, so they keep working while the theme is being replaced or after it is
 * deleted, and they are fully self-contained: no theme file, stylesheet, font or
 * WordPress function is needed to show them. The theme writes them once per
 * version, each with its own page (inc/error-pages.php), and never
 * overwrites a drop-in that it did not write itself.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

// Optional here: the guard below must still work when an update has not
// unpacked this file yet.
if ( is_readable( __DIR__ . '/error-page-html.php' ) ) {
	require_once __DIR__ . '/error-page-html.php';
}

/**
 * The notice as a complete HTML document.
 *
 * @param string $site Site name.
 * @return string
 */
function abr_maintenance_document( $site ) {
	if ( ! function_exists( 'abr_error_page_html' ) ) {
		return '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex"><title>Back shortly | ' . htmlspecialchars( (string) $site, ENT_QUOTES, 'UTF-8' ) . '</title></head><body style="font-family:Georgia,serif;text-align:center;padding:48px 16px"><h1>Back shortly</h1><p>The site is temporarily offline for maintenance while it is being updated.</p><p><a href="/">Try again</a></p></body></html>';
	}
	return abr_error_page_html( 'maintenance', (string) $site, '/' );
}

/**
 * Send the notice with a 503 status and stop.
 */
function abr_maintenance_send() {
	if ( ! headers_sent() ) {
		header( 'HTTP/1.1 503 Service Unavailable', true, 503 );
		header( 'Content-Type: text/html; charset=utf-8' );
		header( 'Retry-After: 300' );
		header( 'X-Robots-Tag: noindex' );
		header( 'Cache-Control: no-store, max-age=0' );
	}
	echo abr_maintenance_document( function_exists( 'get_bloginfo' ) ? get_bloginfo( 'name' ) : 'Abrahamic Religions' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	exit;
}

/**
 * Guard against a half-uploaded theme: when any file the theme needs is
 * missing, visitors get the notice instead of a fatal error. Signed-in
 * administrators and the admin screens are left alone, so an update can finish.
 *
 * @param string[] $files Absolute paths the theme requires.
 * @return bool True when every file is present.
 */
function abr_maintenance_guard( $files ) {
	foreach ( $files as $file ) {
		if ( ! is_readable( $file ) ) {
			if ( ! is_admin() && ! wp_doing_ajax() && ! ( defined( 'WP_CLI' ) && WP_CLI ) && false === strpos( (string) ( $_SERVER['REQUEST_URI'] ?? '' ), 'wp-login' ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
				abr_maintenance_send();
			}
			return false;
		}
	}
	return true;
}

/**
 * Contents of the maintenance drop-in. Kept for callers of earlier versions;
 * each drop-in now has its own source, abr_error_dropin_source().
 *
 * @return string
 */
function abr_maintenance_dropin_source() {
	return abr_error_dropin_source( 'maintenance' );
}

/**
 * Write or refresh the three drop-ins in wp-content, once per theme version.
 *
 * Up to 2.95.0 this wrote the maintenance notice into all three files. Each
 * file now gets its own page (inc/error-pages.php), and the theme's old
 * copies with the wrong page are repaired first, with a notice.
 */
function abr_maintenance_install_dropins() {
	if ( ! function_exists( 'abr_error_install' ) || ( is_multisite() && ! is_main_site() ) ) {
		return;
	}
	abr_error_repair_wrong_kind();
	if ( get_option( 'abr_dropins_version' ) === ABR_VERSION && abr_maintenance_dropins_settled() ) {
		return;
	}
	$result = abr_error_install();
	update_option( 'abr_dropins', $result, false );
	// A failed write is tried again on the next admin page, not recorded as done.
	if ( ! in_array( 'failed', $result, true ) ) {
		update_option( 'abr_dropins_version', ABR_VERSION, false );
	}
}
add_action( 'admin_init', 'abr_maintenance_install_dropins' );
add_action( 'after_switch_theme', 'abr_maintenance_install_dropins' );

/**
 * Whether every drop-in is in place: installed and current, or another
 * party's file the theme must leave alone. A file deleted by hand, removed
 * when the theme was switched off, or left by a sibling theme is not, so it
 * is written again on the next admin page.
 *
 * @return bool
 */
function abr_maintenance_dropins_settled() {
	foreach ( array_keys( abr_error_dropins() ) as $name ) {
		$state = abr_error_state( $name );
		if ( 'installed' === $state ) {
			continue;
		}
		if ( 'foreign' === $state && ! abr_error_is_replaceable( WP_CONTENT_DIR . '/' . $name ) ) {
			continue;
		}
		return false;
	}
	return true;
}

/**
 * Whether another site of the network still runs this theme, as its
 * stylesheet or its template. The drop-ins in the shared wp-content then
 * stay. At most 500 sites are checked.
 *
 * @return bool
 */
function abr_maintenance_dropins_in_use_elsewhere() {
	if ( ! is_multisite() ) {
		return false;
	}
	$slug = basename( dirname( __DIR__ ) );
	$ids  = get_sites(
		array(
			'fields'       => 'ids',
			'number'       => 500,
			'site__not_in' => array( get_current_blog_id() ),
		)
	);
	foreach ( $ids as $id ) {
		if ( in_array( $slug, array( get_blog_option( $id, 'stylesheet' ), get_blog_option( $id, 'template' ) ), true ) ) {
			return true;
		}
	}
	return false;
}

/**
 * Remove the theme's drop-ins when it is switched off. Only a file that
 * carries one of the theme's markers is deleted; the version flag goes too,
 * so switching back writes them again.
 */
function abr_maintenance_remove_dropins() {
	if ( function_exists( 'abr_error_dropins' ) && ! ( is_multisite() && ! is_main_site() ) && ! abr_maintenance_dropins_in_use_elsewhere() ) {
		foreach ( array_keys( abr_error_dropins() ) as $name ) {
			$target = WP_CONTENT_DIR . '/' . $name;
			if ( file_exists( $target ) && abr_error_is_ours( $target ) ) {
				@unlink( $target ); // phpcs:ignore WordPress.WP.AlternativeFunctions, WordPress.PHP.NoSilencedErrors
			}
		}
	}
	delete_option( 'abr_dropins_version' );
}
add_action( 'switch_theme', 'abr_maintenance_remove_dropins' );
