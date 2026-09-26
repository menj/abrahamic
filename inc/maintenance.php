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
 * version, and never overwrites a drop-in that it did not write itself.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * The notice as a complete HTML document.
 *
 * @param string $site Site name.
 * @return string
 */
function abr_maintenance_document( $site ) {
	$site = htmlspecialchars( (string) $site, ENT_QUOTES, 'UTF-8' );
	return '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<title>Back shortly | ' . $site . '</title>
<style>
:root{--bg:#f8f5ef;--ink:#172033;--muted:#5d6475;--gold:#b8955a;--card:#ffffff;--edge:rgba(23,32,51,.1)}
@media (prefers-color-scheme:dark){:root{--bg:#0f131b;--ink:#ece7dd;--muted:#a9adb6;--gold:#cfa869;--card:#171d29;--edge:rgba(236,231,221,.12)}}
*{box-sizing:border-box}
html,body{height:100%;margin:0}
body{display:flex;align-items:center;justify-content:center;padding:24px;background:var(--bg);color:var(--ink);font-family:"Sabon Next LT",Sabon,"Adobe Garamond Pro",Garamond,Georgia,"Times New Roman",serif;line-height:1.55}
main{width:min(560px,100%);padding:44px 40px 40px;background:var(--card);border:1px solid var(--edge);border-top:4px solid var(--gold);border-radius:10px;text-align:center;box-shadow:0 14px 44px rgba(0,0,0,.08)}
.mark{display:inline-flex;align-items:center;justify-content:center;width:64px;height:64px;border-radius:12px;background:var(--ink);color:var(--bg);font-size:28px;font-weight:700;letter-spacing:.02em}
.mark span{border-bottom:2px solid var(--gold);line-height:1.1}
.name{margin:14px auto 0;font-size:.82rem;letter-spacing:.28em;text-transform:uppercase;color:var(--muted)}
h1{margin:26px 0 12px;font-size:clamp(1.6rem,4vw,2.1rem);font-weight:600;line-height:1.2}
p{margin:0 auto 10px;max-width:42ch;font-size:1.08rem;color:var(--muted)}
.again{margin-top:26px;display:inline-block;padding:11px 26px;border-radius:8px;background:var(--gold);color:#10151d;font-weight:700;text-decoration:none}
.again:focus-visible{outline:2px solid var(--ink);outline-offset:3px}
</style>
</head>
<body>
<main role="main">
<div class="mark" aria-hidden="true"><span>AR</span></div>
<p class="name">' . $site . '</p>
<h1>Back shortly</h1>
<p>The site is temporarily offline for maintenance while it is being updated.</p>
<p>Please try again in a few minutes. Thank you for your patience.</p>
<a class="again" href="/">Try again</a>
</main>
</body>
</html>';
}

/**
 * Send the notice with a 503 status and stop.
 */
function abr_maintenance_send() {
	if ( ! headers_sent() ) {
		header( 'HTTP/1.1 503 Service Unavailable', true, 503 );
		header( 'Content-Type: text/html; charset=utf-8' );
		header( 'Retry-After: 300' );
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
 * Contents of one drop-in. Each is a standalone PHP file that sends the 503
 * headers and prints the notice; the marker line lets the theme recognise and
 * refresh its own drop-ins without touching anyone else's.
 *
 * @return string
 */
function abr_maintenance_dropin_source() {
	$html = abr_maintenance_document( get_bloginfo( 'name' ) );
	return "<?php\n// Abrahamic maintenance drop-in " . ABR_VERSION . ". Written by the Abrahamic theme; safe to delete.\n"
		. "if ( ! headers_sent() ) {\n\theader( 'HTTP/1.1 503 Service Unavailable', true, 503 );\n\theader( 'Content-Type: text/html; charset=utf-8' );\n\theader( 'Retry-After: 300' );\n\theader( 'Cache-Control: no-store, max-age=0' );\n}\n?>\n"
		. $html . "\n";
}

/**
 * Write or refresh the three drop-ins in wp-content, once per theme version.
 */
function abr_maintenance_install_dropins() {
	if ( get_option( 'abr_dropins_version' ) === ABR_VERSION ) {
		return;
	}
	$source = abr_maintenance_dropin_source();
	$result = array();
	foreach ( array( 'maintenance.php', 'php-error.php', 'db-error.php' ) as $name ) {
		$path = WP_CONTENT_DIR . '/' . $name;
		if ( file_exists( $path ) ) {
			$head = (string) file_get_contents( $path, false, null, 0, 200 ); // phpcs:ignore WordPress.WP.AlternativeFunctions
			if ( false === strpos( $head, 'Abrahamic maintenance drop-in' ) ) {
				$result[ $name ] = 'kept';
				continue;
			}
		}
		$written          = false !== @file_put_contents( $path, $source ); // phpcs:ignore WordPress.WP.AlternativeFunctions, WordPress.PHP.NoSilencedErrors
		$result[ $name ] = $written ? 'written' : 'failed';
	}
	update_option( 'abr_dropins', $result, false );
	update_option( 'abr_dropins_version', ABR_VERSION, false );
}
add_action( 'admin_init', 'abr_maintenance_install_dropins' );
add_action( 'after_switch_theme', 'abr_maintenance_install_dropins' );
