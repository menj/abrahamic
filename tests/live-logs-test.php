<?php
/**
 * Self-test for the fixes from the live logs of November 2026: the
 * development files removed from the theme folder under a single-request
 * lease (inc/dev-files.php), the .htaccess block that denies WordPress's own
 * files (inc/security.php), the incomplete-upload guard (functions.php) and
 * the CLI guard on every script in tests/ and bin/. WordPress is replaced by
 * small stubs. Run: php tests/live-logs-test.php. Exit code 0 when every
 * check passes.
 *
 * @package Abrahamic
 */

// Run from the command line only: on a web server this file does nothing.
if ( 'cli' !== PHP_SAPI ) {
	exit;
}

define( 'ABSPATH', '/srv/site/' );
define( 'MINUTE_IN_SECONDS', 60 );
define( 'DAY_IN_SECONDS', 86400 );
define( 'ABR_VERSION', '9.9.9' );

/**
 * Load named functions from a theme file, without the rest of it.
 *
 * @param string   $file  Path in the theme.
 * @param string[] $names Function names.
 */
function t_load( $file, $names ) {
	$src = (string) file_get_contents( dirname( __DIR__ ) . '/' . $file );
	foreach ( $names as $name ) {
		if ( ! preg_match( '/^function ' . $name . '\(.*?^}\n/ms', $src, $m ) ) {
			fwrite( STDERR, "not found: $name\n" );
			exit( 1 );
		}
		eval( $m[0] ); // phpcs:ignore Squiz.PHP.Eval
	}
}

$GLOBALS['t'] = array( 'env' => 'production', 'options' => array(), 'transients' => array(), 'hooks' => array() );
function wp_get_environment_type() { return $GLOBALS['t']['env']; }
function wp_normalize_path( $p ) { return str_replace( '\\', '/', $p ); }
function trailingslashit( $p ) { return rtrim( $p, '/\\' ) . '/'; }
function get_option( $k, $d = false ) {
	$v = $GLOBALS['t']['options'][ $k ] ?? $d;
	if ( 'abr_dev_files_version' === $k && ! empty( $GLOBALS['t']['after_check'] ) ) {
		call_user_func( $GLOBALS['t']['after_check'] );
	}
	return $v;
}
function add_option( $k, $v ) {
	if ( array_key_exists( $k, $GLOBALS['t']['options'] ) ) {
		return false;
	}
	$GLOBALS['t']['options'][ $k ] = $v;
	return true;
}
function update_option( $k, $v ) {
	if ( 'abr_dev_files_version' === $k ) {
		$GLOBALS['t']['lock_at_version'] = $GLOBALS['t']['options']['abr_dev_files_lock'] ?? null;
	}
	$GLOBALS['t']['options'][ $k ] = $v;
	return true;
}
function add_action( $hook, $fn ) { $GLOBALS['t']['hooks'][ $hook ][] = $fn; }
function remove_action( $hook, $fn ) {
	$GLOBALS['t']['hooks'][ $hook ] = array_values( array_filter( $GLOBALS['t']['hooks'][ $hook ] ?? array(), static function ( $f ) use ( $fn ) { return $f !== $fn; } ) );
}
function do_action( $hook ) {
	foreach ( $GLOBALS['t']['hooks'][ $hook ] ?? array() as $fn ) {
		call_user_func( $fn );
	}
}
function wp_rand( $a, $b ) { return random_int( $a, $b ); }
function wp_cache_delete() { return true; }
function get_transient( $k ) { return $GLOBALS['t']['transients'][ $k ] ?? false; }
function set_transient( $k, $v ) { $GLOBALS['t']['transients'][ $k ] = $v; return true; }
function wp_doing_ajax() { return ! empty( $GLOBALS['t']['ajax'] ); }
function wp_doing_cron() { return false; }
function is_admin() { return ! empty( $GLOBALS['t']['admin'] ); }

$fail = 0;
$n    = 0;
/**
 * Record one check.
 *
 * @param string $label What is checked.
 * @param bool   $ok    Whether it holds.
 */
function check( $label, $ok ) {
	global $fail, $n;
	++$n;
	if ( ! $ok ) {
		++$fail;
		echo "FAIL: $label\n";
	}
}

// The theme's log lines go to a file of their own.
$log = sys_get_temp_dir() . '/abr-live-log-' . getmypid();
ini_set( 'error_log', $log ); // phpcs:ignore WordPress.PHP.IniSet

t_load( 'inc/dev-files.php', array( 'abr_keeps_dev_files', 'abr_dev_entries', 'abr_remove_tree', 'abr_remove_dev_files', 'abr_cleanup_on_version_change', 'abr_renew_cleanup_lease', 'abr_release_lock', 'abr_swap_lock' ) );
t_load( 'inc/security.php', array( 'abr_sec_core_lines', 'abr_sec_core_prefix' ) );
t_load( 'functions.php', array( 'abr_incomplete_theme', 'abr_incomplete_serves' ) );

// Development files in the theme folder.
$root = sys_get_temp_dir() . '/abr-live-' . getmypid();
define( 'ABR_DIR', $root );
foreach ( array( '.git/objects/ab', '.claude', '.well-known', 'tests', 'bin', 'docs', 'inc' ) as $d ) {
	mkdir( "$root/$d", 0755, true );
}
foreach ( array( '.git/objects/ab/cd', '.git/config', '.claude/CLAUDE.md', '.gitattributes', '.htaccess', '.user.ini', '.well-known/x', 'tests/a-test.php', 'bin/build.php', 'docs/readme.md', 'inc/x.php' ) as $f ) {
	file_put_contents( "$root/$f", 'x' );
}
chmod( "$root/.git/objects/ab/cd", 0444 );
$list = array_map( 'basename', abr_dev_entries() );
sort( $list );
check( 'the dot entries and tests are listed; .htaccess, .user.ini and .well-known are not', array( '.claude', '.git', '.gitattributes', 'tests' ) === $list );
$GLOBALS['t']['env'] = 'development';
check( 'a development site keeps them all', array() === abr_dev_entries() );
$GLOBALS['t']['env'] = 'local';
check( 'so does a local one', array() === abr_dev_entries() );
$GLOBALS['t']['env'] = 'production';
define( 'ABR_KEEP_DOTFILES', false );
check( 'ABR_KEEP_DOTFILES false changes nothing', 4 === count( abr_dev_entries() ) );

// The clean-up on a version change: one request runs it under a lease.
$GLOBALS['t']['ticks'] = 0;
add_action( 'abr_cleanup_tick', static function () { ++$GLOBALS['t']['ticks']; } );
class T_DB {
	public $options = 'wp_options';
	public function prepare( $sql, ...$args ) {
		return $args;
	}
	public function get_var( $args ) {
		return $GLOBALS['t']['options'][ $args[0] ] ?? null;
	}
	public function query( $args ) {
		if ( 2 === count( $args ) ) {
			list( $name, $held ) = $args;
			if ( ! array_key_exists( $name, $GLOBALS['t']['options'] ) || (string) $GLOBALS['t']['options'][ $name ] !== $held ) {
				return 0;
			}
			unset( $GLOBALS['t']['options'][ $name ] );
			return 1;
		}
		list( $next, $name, $held ) = $args;
		if ( ! array_key_exists( $name, $GLOBALS['t']['options'] ) || (string) $GLOBALS['t']['options'][ $name ] !== $held ) {
			return 0;
		}
		$GLOBALS['t']['options'][ $name ] = $next;
		return 1;
	}
}
$GLOBALS['wpdb'] = new T_DB();
$GLOBALS['t']['options']['abr_dev_files_lock'] = time() . '.111111';
abr_cleanup_on_version_change();
check( 'a fresh lease held by another request keeps this one out', file_exists( "$root/.git" ) && ! isset( $GLOBALS['t']['options']['abr_dev_files_version'] ) );
$stale = (string) ( time() - 600 ) . '.123456';
$GLOBALS['t']['options']['abr_dev_files_lock'] = $stale;
check( 'of two requests that read the same stale lease, only one takes it over', abr_swap_lock( 'abr_dev_files_lock', $stale, time() . '.1' ) && ! abr_swap_lock( 'abr_dev_files_lock', $stale, time() . '.2' ) );
$GLOBALS['t']['options']['abr_dev_files_lock'] = $stale;
abr_cleanup_on_version_change();
check( 'a stale lease is taken over and every development file goes', ! file_exists( "$root/.git" ) && ! file_exists( "$root/.claude" ) && ! file_exists( "$root/.gitattributes" ) && ! file_exists( "$root/tests" ) );
check( 'bin, docs, the code and the server files stay', file_exists( "$root/bin/build.php" ) && file_exists( "$root/docs/readme.md" ) && file_exists( "$root/inc/x.php" ) && file_exists( "$root/.htaccess" ) && file_exists( "$root/.user.ini" ) && file_exists( "$root/.well-known/x" ) );
check( 'the walk ticks for every entry, so the lease can be renewed', $GLOBALS['t']['ticks'] >= 7 );
check( 'the version is recorded while the lease is held, and the lease freed after', '9.9.9' === $GLOBALS['t']['options']['abr_dev_files_version'] && '-done' === substr( (string) $GLOBALS['t']['lock_at_version'], -5 ) && ! isset( $GLOBALS['t']['options']['abr_dev_files_lock'] ) );
check( 'the tick hook goes with the run', 1 === count( $GLOBALS['t']['hooks']['abr_cleanup_tick'] ) );
mkdir( "$root/tests" );
abr_cleanup_on_version_change();
check( 'once recorded, it does not run again', is_dir( "$root/tests" ) );
// A renewal on a tick, and a rival that read the old lease cannot take it.
$GLOBALS['abr_cleanup_lease']                   = (string) ( time() - 120 ) . '.222222';
$GLOBALS['t']['options']['abr_dev_files_lock']  = $GLOBALS['abr_cleanup_lease'];
$rival                                          = $GLOBALS['abr_cleanup_lease'];
abr_renew_cleanup_lease();
check( 'a running clean-up renews its lease', time() - (int) $GLOBALS['t']['options']['abr_dev_files_lock'] < 60 && ! abr_swap_lock( 'abr_dev_files_lock', $rival, time() . '.9' ) );
unset( $GLOBALS['abr_cleanup_lease'], $GLOBALS['t']['options']['abr_dev_files_lock'] );
// A request that passed the check, then paused while another finished.
$GLOBALS['t']['options']['abr_dev_files_version'] = '9.9.8';
$GLOBALS['t']['after_check'] = static function () {
	$GLOBALS['t']['options']['abr_dev_files_version'] = '9.9.9';
};
abr_cleanup_on_version_change();
unset( $GLOBALS['t']['after_check'] );
check( 'a request that paused past the check runs nothing once it holds the lease, and frees it', is_dir( "$root/tests" ) && ! isset( $GLOBALS['t']['options']['abr_dev_files_lock'] ) );
// An entry that cannot be removed: the version stays unrecorded and the
// lease is kept, fresh, so the next try waits five minutes. Needs chattr (or
// a user other than root, for whom a read-only folder is enough).
unset( $GLOBALS['t']['options']['abr_dev_files_lock'] );
$GLOBALS['t']['options']['abr_dev_files_version'] = '9.9.8';
mkdir( "$root/.stuck" );
file_put_contents( "$root/.stuck/f", 'x' );
$as_root = function_exists( 'posix_geteuid' ) && 0 === posix_geteuid();
$stuck   = $as_root ? ( exec( 'chattr +i ' . escapeshellarg( "$root/.stuck/f" ) . ' 2>/dev/null', $o, $rc ) !== false && 0 === $rc ) : chmod( "$root/.stuck", 0555 );
if ( $stuck ) {
	abr_cleanup_on_version_change();
	$lock = (string) ( $GLOBALS['t']['options']['abr_dev_files_lock'] ?? '' );
	check( 'an entry that cannot go leaves the version unrecorded and a fresh lease in place', '9.9.8' === $GLOBALS['t']['options']['abr_dev_files_version'] && '' !== $lock && time() - (int) $lock < 60 && file_exists( "$root/.stuck/f" ) );
	$as_root ? exec( 'chattr -i ' . escapeshellarg( "$root/.stuck/f" ) ) : chmod( "$root/.stuck", 0755 );
	abr_cleanup_on_version_change();
	check( 'a fresh lease means no second try at once', file_exists( "$root/.stuck/f" ) );
	$GLOBALS['t']['options']['abr_dev_files_lock'] = ( time() - 600 ) . substr( $lock, strpos( $lock, '.' ) );
	abr_cleanup_on_version_change();
	check( 'once the lease is stale, the next request finishes and records the version', ! file_exists( "$root/.stuck" ) && '9.9.9' === $GLOBALS['t']['options']['abr_dev_files_version'] );
} else {
	echo "skipped: no way to make a file that cannot be removed here\n";
	abr_remove_tree( "$root/.stuck" );
}
$GLOBALS['t']['options']['abr_dev_files_version'] = '9.9.8';
is_dir( "$root/tests" ) || mkdir( "$root/tests" );
$GLOBALS['t']['env'] = 'development';
abr_cleanup_on_version_change();
check( 'a development site runs nothing and records nothing', is_dir( "$root/tests" ) && '9.9.8' === $GLOBALS['t']['options']['abr_dev_files_version'] );
$GLOBALS['t']['env'] = 'production';
abr_remove_tree( $root );
check( 'the test folder is gone', ! file_exists( $root ) );

// The .htaccess block for WordPress's own files.
check( 'WordPress at the .htaccess folder: no prefix', '' === abr_sec_core_prefix( '/srv/site/', '/srv/site/' ) && '' === abr_sec_core_prefix( '/srv/site', '/srv/site/' ) );
check( 'WordPress in its own subfolder: its folder', 'wp/' === abr_sec_core_prefix( '/srv/site/', '/srv/site/wp/' ) );
check( 'WordPress outside the .htaccess folder: no block', null === abr_sec_core_prefix( '/srv/site/', '/opt/wp/' ) );
check( 'the rules carry the subfolder', false !== strpos( implode( "\n", abr_sec_core_lines( 'wp/' ) ), 'RewriteRule ^wp/wp-includes/' ) );
$rx = array();
foreach ( abr_sec_core_lines( '' ) as $line ) {
	if ( preg_match( '/^RewriteRule (\S+) - \[F,L\]$/', $line, $m ) ) {
		$rx[] = '#' . $m[1] . '#';
	}
}
$denied = static function ( $path ) use ( $rx ) {
	foreach ( $rx as $r ) {
		if ( preg_match( $r, $path ) ) {
			return true;
		}
	}
	return false;
};
foreach ( array( 'wp-includes/blocks/rss.php', 'wp-includes/version.php', 'wp-settings.php', 'wp-config-sample.php', 'readme.html', 'wp-admin/install.php' ) as $p ) {
	check( "$p is denied", $denied( $p ) );
}
foreach ( array( 'wp-includes/js/tinymce/wp-tinymce.php', 'wp-includes/ms-files.php', 'wp-includes/css/dashicons.min.css', 'wp-login.php', 'index.php', 'xmlrpc.php', 'wp-admin/index.php', 'wp-content/themes/abrahamic/readme.html' ) as $p ) {
	check( "$p stays open", ! $denied( $p ) );
}

$sec = (string) file_get_contents( dirname( __DIR__ ) . '/inc/security.php' );
check( 'a core block that does not go in marks the file unavailable and is retried', false !== strpos( $sec, "&& true !== insert_with_markers( \$file, ABR_SEC_CORE_MARKER, \$core ) ) {" ) && false !== strpos( $sec, "! \$ok ? 'unavailable'" ) );
check( 'a theme switch takes the core block out', false !== strpos( $sec, 'insert_with_markers( $file, ABR_SEC_CORE_MARKER, array() );' ) );

// The incomplete-upload guard: one log line per problem, and the admin,
// AJAX and the command line are never sent the notice.
$GLOBALS['t']['admin'] = true;
abr_incomplete_theme( 'inc/seo.php is missing' );
abr_incomplete_theme( 'inc/seo.php is missing' );
abr_incomplete_theme( 'inc/search.php is missing' );
$lines = file_exists( $log ) ? count( preg_grep( '/incomplete or being uploaded/', file( $log ) ) ) : 0;
@unlink( $log ); // phpcs:ignore WordPress.PHP.NoSilencedErrors
check( 'a missing file is logged once, each problem on its own line', 2 === $lines );
check( 'a missing file leaves the admin alone, so an upload can finish', ! abr_incomplete_serves( false, 'apache2handler' ) );
check( 'a file that broke part-way sends the admin the notice', abr_incomplete_serves( true, 'apache2handler' ) );
$GLOBALS['t']['admin'] = false;
check( 'a visitor gets the notice', abr_incomplete_serves( false, 'apache2handler' ) && abr_incomplete_serves( true, 'fpm-fcgi' ) );
check( 'the command line never does', ! abr_incomplete_serves( true, 'cli' ) );
$GLOBALS['t']['ajax'] = true;
check( 'nor does AJAX', ! abr_incomplete_serves( true, 'apache2handler' ) );
$GLOBALS['t']['ajax'] = false;
$_SERVER['REQUEST_URI'] = '/wp-login.php?action=lostpassword';
check( 'nor the login screen', ! abr_incomplete_serves( true, 'apache2handler' ) );
unset( $_SERVER['REQUEST_URI'] );
$src = (string) file_get_contents( dirname( __DIR__ ) . '/functions.php' );
check( 'every theme file is checked before any loads, inc/maintenance.php included', false !== strpos( $src, "array_merge( array( ABR_DIR . '/inc/maintenance.php' ), \$abr_files )" ) );
check( 'a half-written file is caught', false !== strpos( $src, 'catch ( Throwable $abr_error )' ) );
foreach ( glob( dirname( __DIR__ ) . '/inc/*.php' ) as $f ) {
	check( 'functions.php guards inc/' . basename( $f ), false !== strpos( $src, "'/inc/" . basename( $f ) . "'" ) );
}
$m = (string) file_get_contents( dirname( __DIR__ ) . '/inc/maintenance.php' );
check( 'the notice is a 503 with Retry-After', false !== strpos( $m, '503 Service Unavailable' ) && false !== strpos( $m, 'Retry-After: 300' ) );

// Every script in tests/ and bin/ exits outside the command line.
foreach ( array_merge( glob( __DIR__ . '/*.php' ), glob( dirname( __DIR__ ) . '/bin/*.php' ) ) as $f ) {
	$head = (string) file_get_contents( $f, false, null, 0, 1500 );
	check( basename( $f ) . ' has the CLI guard', false !== strpos( $head, "if ( 'cli' !== PHP_SAPI ) {" ) );
}

echo "Checks: $n\n", $fail ? "FAIL ($fail)\n" : "PASS\n";
exit( $fail ? 1 : 0 );
