<?php
/**
 * The error pages as plain HTML: one builder for the maintenance notice, the
 * three wp-content drop-ins and the static pages in errors/.
 *
 * Pure PHP, no WordPress function: the drop-ins run while WordPress is half
 * loaded or has no database, and bin/build-error-pages.php runs it on the
 * command line. The style is inline for the same reason, in the theme's
 * colours (light and dark by the visitor's system setting) with the AR mark
 * in text, so no file of the theme is needed to show it.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Status, title and wording of each page.
 *
 * @return array<string,array> Kind => status, retry, eyebrow, title, lines.
 */
function abr_error_page_kinds() {
	return array(
		'maintenance' => array(
			'status'  => 503,
			'retry'   => 300,
			'eyebrow' => 'Maintenance',
			'title'   => 'Back shortly',
			'lines'   => array( 'The site is temporarily offline for maintenance while it is being updated.', 'Please try again in a few minutes. Thank you for your patience.' ),
		),
		'php-error'   => array(
			'status'  => 500,
			'retry'   => 0,
			'eyebrow' => 'Error 500',
			'title'   => 'Something went wrong',
			'lines'   => array( 'A fault on our side stopped this page from loading. It is not something you did.', 'Please try again in a few minutes.' ),
		),
		'db-error'    => array(
			'status'  => 503,
			'retry'   => 600,
			'eyebrow' => 'Database unavailable',
			'title'   => 'We cannot reach our database',
			'lines'   => array( 'The site cannot reach its database just now. This is temporary, and nothing you did caused it.', 'Please try again in a few minutes.' ),
		),
		'403'         => array(
			'status'  => 403,
			'retry'   => 0,
			'eyebrow' => 'Error 403',
			'title'   => 'Access denied',
			'lines'   => array( 'This address is closed to visitors.', 'The articles and the main sections are open from the home page.' ),
		),
		'500'         => array(
			'status'  => 500,
			'retry'   => 0,
			'eyebrow' => 'Error 500',
			'title'   => 'Something went wrong',
			'lines'   => array( 'A fault on our side stopped this page from loading. It is not something you did.', 'Please try again in a few minutes.' ),
		),
		'502'         => array(
			'status'  => 502,
			'retry'   => 0,
			'eyebrow' => 'Error 502',
			'title'   => 'Bad gateway',
			'lines'   => array( 'A server between you and the site gave a wrong answer.', 'Please try again in a few minutes.' ),
		),
		'504'         => array(
			'status'  => 504,
			'retry'   => 0,
			'eyebrow' => 'Error 504',
			'title'   => 'The server took too long',
			'lines'   => array( 'A server between you and the site waited too long for an answer.', 'Please try again in a few minutes.' ),
		),
		'503'         => array(
			'status'  => 503,
			'retry'   => 300,
			'eyebrow' => 'Error 503',
			'title'   => 'Temporarily unavailable',
			'lines'   => array( 'The site is busy or offline for a short while.', 'Please try again in a few minutes.' ),
		),
	);
}

/**
 * One page as a complete HTML document.
 *
 * @param string $kind A key of abr_error_page_kinds().
 * @param string $site Site name, plain text.
 * @param string $home Address of the home page.
 * @return string
 */
function abr_error_page_html( $kind, $site, $home = '/' ) {
	$kinds = abr_error_page_kinds();
	$k     = isset( $kinds[ $kind ] ) ? $kinds[ $kind ] : $kinds['500'];
	$e     = static function ( $s ) {
		return htmlspecialchars( (string) $s, ENT_QUOTES, 'UTF-8' );
	};
	$lines = '';
	foreach ( $k['lines'] as $line ) {
		$lines .= '<p>' . $e( $line ) . "</p>\n";
	}
	$again = in_array( $k['status'], array( 403 ), true ) ? 'Go to the home page' : 'Try again';
	return '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<title>' . $e( $k['title'] ) . ' | ' . $e( $site ) . '</title>
<style>
:root{--bg:#f8f5ef;--ink:#172033;--muted:#5d6475;--gold:#b8955a;--gold-ink:#7a5a24;--card:#ffffff;--edge:rgba(23,32,51,.1)}
@media (prefers-color-scheme:dark){:root{--bg:#0f131b;--ink:#ece7dd;--muted:#a9adb6;--gold:#cfa869;--gold-ink:#cfa869;--card:#171d29;--edge:rgba(236,231,221,.12)}}
*{box-sizing:border-box}
html,body{height:100%;margin:0}
body{display:flex;align-items:center;justify-content:center;padding:24px 16px;background:var(--bg);color:var(--ink);font-family:"Sabon Next LT",Sabon,"Adobe Garamond Pro",Garamond,Georgia,"Times New Roman",serif;line-height:1.55}
main{width:min(560px,100%);padding:44px clamp(20px,6vw,40px) 40px;background:var(--card);border:1px solid var(--edge);border-top:4px solid var(--gold);border-radius:10px;text-align:center;box-shadow:0 14px 44px rgba(0,0,0,.08)}
.mark{display:inline-flex;align-items:center;justify-content:center;width:64px;height:64px;border-radius:12px;background:var(--ink);color:var(--bg);font-size:28px;font-weight:700;letter-spacing:.02em}
.mark span{border-bottom:2px solid var(--gold);line-height:1.1}
.name{margin:14px auto 0;font-size:.82rem;letter-spacing:.28em;text-transform:uppercase;color:var(--muted)}
.code{margin:22px 0 0;font:600 .78rem/1.2 system-ui,sans-serif;letter-spacing:.22em;text-transform:uppercase;color:var(--gold-ink)}
h1{margin:10px 0 12px;font-size:clamp(1.6rem,4vw,2.1rem);font-weight:600;line-height:1.2}
p{margin:0 auto 10px;max-width:42ch;font-size:1.08rem;color:var(--muted)}
.again{margin-top:26px;display:inline-block;padding:11px 26px;border-radius:8px;background:var(--gold);color:#10151d;font-weight:700;text-decoration:none}
.again:hover{background:var(--ink);color:var(--bg)}
.again:focus-visible{outline:2px solid var(--ink);outline-offset:3px}
@media (prefers-reduced-motion:no-preference){.again{transition:background .2s,color .2s}}
</style>
</head>
<body>
<main role="main">
<div class="mark" aria-hidden="true"><span>AR</span></div>
<p class="name">' . $e( $site ) . '</p>
<p class="code">' . $e( $k['eyebrow'] ) . '</p>
<h1>' . $e( $k['title'] ) . '</h1>
' . $lines . '<a class="again" href="' . $e( $home ) . '">' . $e( $again ) . '</a>
</main>
</body>
</html>';
}

/**
 * The PHP header of a drop-in: marker line, then the status headers.
 *
 * @param string $kind    Drop-in kind.
 * @param string $marker  Marker text (theme name and "error page drop-in").
 * @param string $version Theme version.
 * @param string $theme   Theme name for the "Written by" line.
 * @return string
 */
function abr_error_dropin_head( $kind, $marker, $version, $theme ) {
	$k      = abr_error_page_kinds()[ $kind ];
	$reason = array(
		500 => 'Internal Server Error',
		503 => 'Service Unavailable',
	);
	return "<?php\n// " . $marker . ' (' . $kind . ') ' . $version . '. Written by the ' . $theme . " theme; safe to delete.\n"
		. "// Self-contained: no theme file, no WordPress function and no database.\n"
		. "if ( ! headers_sent() ) {\n"
		. "\theader( 'HTTP/1.1 " . $k['status'] . ' ' . $reason[ $k['status'] ] . "', true, " . $k['status'] . " );\n"
		. "\theader( 'Content-Type: text/html; charset=utf-8' );\n"
		. ( $k['retry'] ? "\theader( 'Retry-After: " . (int) $k['retry'] . "' );\n" : '' )
		. "\theader( 'X-Robots-Tag: noindex' );\n"
		. "\theader( 'Cache-Control: no-store, max-age=0' );\n"
		. "}\n?>\n";
}
