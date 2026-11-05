<?php
/**
 * Self-test for inc/error-pages.php and inc/error-page-html.php: each
 * drop-in carries its own page and status, the installer keeps files it did
 * not write, repairs the copies up to 2.95.0 wrote with the wrong page, and
 * reports installed, outdated and foreign. WordPress is replaced by stubs.
 * Run: php tests/error-pages-test.php. Exit code 0 when every check passes.
 *
 * @package Abrahamic
 */

define( 'ABSPATH', __DIR__ . '/' );
define( 'ABR_VERSION', '9.9.9' );
define( 'ABR_URI', 'https://example.test/wp-content/themes/abrahamic' );
// A fresh directory of our own, so the cleanup at the end removes only what this test wrote.
$abr_tmp = sys_get_temp_dir() . '/abr-err-' . getmypid() . '-' . bin2hex( random_bytes( 6 ) );
if ( ! mkdir( $abr_tmp, 0700 ) ) {
	fwrite( STDERR, "cannot create $abr_tmp\n" );
	exit( 1 );
}
define( 'WP_CONTENT_DIR', $abr_tmp );

$GLOBALS['abr_t'] = array( 'options' => array() );
function add_action() {}
function __( $s ) { return $s; }
function get_bloginfo() { return 'Abrahamic Religions'; }
function wp_specialchars_decode( $s ) { return $s; }
function wp_parse_url( $u, $c = -1 ) { return parse_url( $u, $c ); }
function home_url( $p = '' ) { return 'https://example.test' . ( $GLOBALS['abr_t']['sub'] ?? '' ) . $p; }
function content_url( $p = '' ) { return 'https://example.test' . ( $GLOBALS['abr_t']['sub'] ?? '' ) . '/wp-content' . $p; }
function untrailingslashit( $s ) { return rtrim( $s, '/' ); }
function current_user_can() { return true; }
function is_multisite() { return ! empty( $GLOBALS['abr_t']['network'] ); }
function is_main_site() { return empty( $GLOBALS['abr_t']['subsite'] ); }
function get_main_site_id() { return 1; }
function get_blog_option( $id, $k ) { return 1 === $id ? ( $GLOBALS['abr_t']['main_theme'] ?? 'abrahamic' ) : ( $GLOBALS['abr_t']['sites'][ $id ] ?? 'abrahamic' ); }
function get_current_blog_id() { return $GLOBALS['abr_t']['current'] ?? 2; }
function get_sites( $a ) { return ( $a['offset'] ?? 0 ) ? array() : array( 1, 2, 3 ); }

function get_option( $k, $d = false ) { return $GLOBALS['abr_t']['options'][ $k ] ?? $d; }
function update_option( $k, $v ) { $GLOBALS['abr_t']['options'][ $k ] = $v; return true; }
function delete_option( $k ) { unset( $GLOBALS['abr_t']['options'][ $k ] ); }

require dirname( __DIR__ ) . '/inc/error-pages.php';

$abr_fail = 0;
function abr_check( $ok, $label ) {
	global $abr_fail;
	echo ( $ok ? 'ok   ' : 'FAIL ' ) . $label . "\n";
	$abr_fail += $ok ? 0 : 1;
}

// Each drop-in has its own page and status.
$abr_src = array();
foreach ( abr_error_dropins() as $abr_name => $abr_kind ) {
	$abr_src[ $abr_name ] = abr_error_dropin_source( $abr_kind );
	abr_check( false !== strpos( $abr_src[ $abr_name ], ABR_ERR_MARKER . ' (' . $abr_kind . ')' ), "$abr_name carries the marker and its kind" );
	abr_check( false !== strpos( $abr_src[ $abr_name ], 'noindex' ) && false !== strpos( $abr_src[ $abr_name ], 'no-store' ), "$abr_name sends noindex and no-store" );
	preg_match( '~<title>([^<]*)</title>~', $abr_src[ $abr_name ], $abr_m );
	abr_check( isset( $abr_m[1] ) && strlen( html_entity_decode( $abr_m[1] ) ) < 60 && false !== strpos( $abr_m[1], ' | Abrahamic Religions' ), "$abr_name title follows the rule" );
}
abr_check( false !== strpos( $abr_src['maintenance.php'], "503, true, 503" ) || false !== strpos( $abr_src['maintenance.php'], "503 Service Unavailable', true, 503" ), 'maintenance.php sends 503' );
abr_check( false !== strpos( $abr_src['maintenance.php'], 'Retry-After' ), 'maintenance.php sends Retry-After' );
abr_check( false !== strpos( $abr_src['php-error.php'], "500 Internal Server Error', true, 500" ) && false === strpos( $abr_src['php-error.php'], 'Retry-After' ), 'php-error.php sends 500 and no Retry-After' );
abr_check( false !== strpos( $abr_src['php-error.php'], 'Something went wrong' ) && false === stripos( $abr_src['php-error.php'], 'maintenance' ), 'php-error.php says something went wrong, not maintenance' );
abr_check( false !== strpos( $abr_src['db-error.php'], 'We cannot reach our database' ) && false !== strpos( $abr_src['db-error.php'], 'Retry-After' ) && false === stripos( $abr_src['db-error.php'], 'maintenance' ), 'db-error.php names the database, with Retry-After' );

// Each drop-in runs on its own: no WordPress function, no database.
foreach ( $abr_src as $abr_name => $abr_text ) {
	$abr_file = $abr_tmp . '/run-' . $abr_name;
	file_put_contents( $abr_file, $abr_text );
	$abr_out = (string) shell_exec( escapeshellarg( PHP_BINARY ) . ' -d display_errors=1 -d error_reporting=-1 ' . escapeshellarg( $abr_file ) . ' 2>&1' );
	abr_check( 0 === strpos( ltrim( $abr_out ), '<!DOCTYPE html>' ) && false === stripos( $abr_out, 'error:' ) && false === stripos( $abr_out, 'warning' ), "$abr_name runs standalone" );
	unlink( $abr_file );
}

// The 2.95.0 copies: the maintenance notice in all three files.
$abr_old = "<?php\n// Abrahamic maintenance drop-in 2.75.0. Written by the Abrahamic theme; safe to delete.\n?>\n<h1>Back shortly</h1>";
foreach ( array_keys( abr_error_dropins() ) as $abr_name ) {
	file_put_contents( "$abr_tmp/$abr_name", $abr_old );
}
abr_check( ! abr_error_wrong_kind( "$abr_tmp/maintenance.php", 'maintenance' ), 'old maintenance.php is the right kind' );
abr_check( abr_error_wrong_kind( "$abr_tmp/php-error.php", 'php-error' ) && abr_error_wrong_kind( "$abr_tmp/db-error.php", 'db-error' ), 'old php-error.php and db-error.php are the wrong kind' );
abr_check( 'outdated' === abr_error_state( 'php-error.php' ), 'old copy reads as outdated' );
abr_error_repair_wrong_kind();
abr_check( file_get_contents( "$abr_tmp/php-error.php" ) === $abr_src['php-error.php'] && file_get_contents( "$abr_tmp/db-error.php" ) === $abr_src['db-error.php'], 'repair rewrites both with their own pages' );
abr_check( array( 'php-error.php', 'db-error.php' ) === get_option( 'abr_dropins_repaired' )['files'], 'repair records the files for the notice' );
abr_check( 'installed' === abr_error_state( 'maintenance.php' ), 'maintenance.php is installed and current' );

// A file the theme did not write stays.
file_put_contents( "$abr_tmp/db-error.php", "<?php // Somebody else's page\n" );
abr_check( 'foreign' === abr_error_state( 'db-error.php' ), 'foreign file reads as foreign' );
$abr_res = abr_error_install();
abr_check( 'kept' === $abr_res['db-error.php'] && "<?php // Somebody else's page\n" === file_get_contents( "$abr_tmp/db-error.php" ), 'installer keeps a foreign file' );
abr_check( 'unchanged' === $abr_res['php-error.php'], 'installer leaves a current file' );
unlink( "$abr_tmp/php-error.php" );
abr_check( 'missing' === abr_error_state( 'php-error.php' ) && 'written' === abr_error_install()['php-error.php'], 'installer writes a missing file' );

// The static pages are current.
exec( escapeshellarg( PHP_BINARY ) . ' ' . escapeshellarg( dirname( __DIR__ ) . '/bin/build-error-pages.php' ) . ' --check 2>&1', $abr_o, $abr_code );
abr_check( 0 === $abr_code, 'errors/*.html match the builder' );
abr_check( false !== strpos( abr_error_htaccess_snippet(), 'ErrorDocument 503 /wp-content/abrahamic-errors/503.html' ), '.htaccess lines point at the copies in wp-content' );

// The copies of the static pages carry the marker and the site's own home.
abr_check( 'unchanged' === $abr_res['abrahamic-errors/403.html'] && 'installed' === abr_error_state( 'abrahamic-errors/504.html' ), 'installer writes the static copies' );
$abr_copy = file_get_contents( "$abr_tmp/abrahamic-errors/403.html" );
abr_check( 0 === strpos( $abr_copy, '<!-- ' . ABR_ERR_MARKER . ' (403)' ) && false !== strpos( $abr_copy, 'href="/"' ), 'a root install links the home page at /' );
$GLOBALS['abr_t']['sub'] = '/blog';
abr_check( 'outdated' === abr_error_state( 'abrahamic-errors/403.html' ), 'a move to a subfolder makes the copy outdated' );
abr_error_install();
$abr_copy = file_get_contents( "$abr_tmp/abrahamic-errors/403.html" );
abr_check( false !== strpos( $abr_copy, 'href="/blog/"' ) && false === strpos( $abr_copy, 'href="/"' ), 'a subfolder install links the home page in the subfolder' );
abr_check( false !== strpos( abr_error_htaccess_snippet(), 'ErrorDocument 403 /blog/wp-content/abrahamic-errors/403.html' ), '.htaccess lines follow the subfolder' );
abr_check( false !== strpos( file_get_contents( dirname( __DIR__ ) . '/errors/403.html' ), 'href="/"' ), 'errors/ keeps the copy for a root install' );

// Who writes on a network.
$GLOBALS['abr_t']['network'] = true;
$GLOBALS['abr_t']['subsite'] = true;
abr_check( ! abr_error_writer(), 'a subsite leaves the writing to a main site that runs the theme' );
$GLOBALS['abr_t']['main_theme'] = 'twentytwentyfive';
abr_check( abr_error_writer(), 'the first subsite that runs the theme writes when the main site runs another' );
$GLOBALS['abr_t']['sites'] = array( 2 => 'abrahamic', 3 => 'abrahamic' );
$GLOBALS['abr_t']['current'] = 3;
abr_check( ! abr_error_writer(), 'a second subsite leaves the writing to the first' );
unset( $GLOBALS['abr_t']['network'], $GLOBALS['abr_t']['subsite'], $GLOBALS['abr_t']['main_theme'], $GLOBALS['abr_t']['sites'], $GLOBALS['abr_t']['current'] );

array_map( 'unlink', glob( "$abr_tmp/abrahamic-errors/*" ) );
rmdir( "$abr_tmp/abrahamic-errors" );
array_map( 'unlink', glob( "$abr_tmp/*" ) );
rmdir( $abr_tmp );
echo $abr_fail ? "$abr_fail failed\n" : "all passed\n";
exit( $abr_fail ? 1 : 0 );
