<?php
/**
 * Self-test for the seed index, the seeder lock and the guarded file list.
 * Run: php tests/seed-index-test.php. Exit code 0 when every check passes.
 *
 * A Scheduled post must be visible to the tag and Rank Math seeders, which
 * stamp themselves done after one pass, so it is tagged and given its fields
 * when it is created rather than never.
 *
 * @package Abrahamic
 */

// Run from the command line only: on a web server this file does nothing.
if ( 'cli' !== PHP_SAPI ) {
	exit;
}

define( 'ABSPATH', __DIR__ . '/' );
$GLOBALS['abr_test_hooks'] = array();
function add_action() {}
function add_filter() {}
function add_shortcode() {}
$GLOBALS['abr_test_queries'] = array();
function get_posts( $args ) {
	$GLOBALS['abr_test_queries'][] = $args;
	$out = array();
	foreach ( $GLOBALS['abr_test_posts'] as $p ) {
		if ( in_array( $p->post_status, (array) $args['post_status'], true ) ) {
			$out[] = $p;
		}
	}
	return $out;
}
function get_post_meta( $id ) {
	return $GLOBALS['abr_test_meta'][ $id ];
}
require dirname( __DIR__ ) . '/inc/structure.php';

$fail  = 0;
$count = 0;
function abr_test_check( $ok, $label ) {
	global $fail, $count;
	++$count;
	if ( ! $ok ) {
		++$fail;
		echo "FAILED: $label\n";
	}
}

$GLOBALS['abr_test_posts'] = array(
	(object) array( 'ID' => 1, 'post_status' => 'publish' ),
	(object) array( 'ID' => 2, 'post_status' => 'future' ),
);
$GLOBALS['abr_test_meta']  = array( 1 => 'post:noah-in-three-traditions', 2 => 'post:solomon-in-the-quran' );

// Link resolution sees published posts only; the seeders also see Scheduled ones.
abr_test_check( 1 === abr_seed_id( 'post:noah-in-three-traditions' ), 'a published post is in the index' );
abr_test_check( 0 === abr_seed_id( 'post:solomon-in-the-quran' ), 'a Scheduled post stays out of the published index' );
abr_test_check( 2 === abr_seed_id( 'post:solomon-in-the-quran', true ), 'a Scheduled post is in the seeders\' index' );
abr_test_check( 1 === abr_seed_id( 'post:noah-in-three-traditions', true ), 'the seeders\' index keeps published posts' );
abr_test_check( 2 === count( $GLOBALS['abr_test_queries'] ), 'one query per index per request' );

// The seeder clears the cache after creating a post, so a later pass sees it.
$GLOBALS['abr_test_posts'][] = (object) array( 'ID' => 3, 'post_status' => 'future' );
$GLOBALS['abr_test_meta'][3] = 'post:why-christmas-is-in-december';
abr_test_check( 0 === abr_seed_id( 'post:why-christmas-is-in-december', true ), 'the cached index does not see a new post' );
unset( $GLOBALS['abr_seed_index_cache'] );
abr_test_check( 3 === abr_seed_id( 'post:why-christmas-is-in-december', true ), 'a cleared index sees the new post' );

$root = dirname( __DIR__ );
$seed = file_get_contents( $root . '/inc/seed.php' );
abr_test_check( false !== strpos( $seed, "unset( \$GLOBALS['abr_seed_index_cache'] );" ), 'seed.php clears the index after creating a post' );

// Every seed lookup in the tag and Rank Math seeders includes Scheduled posts.
foreach ( array( 'inc/tags.php', 'inc/rank-math.php' ) as $file ) {
	$src = file_get_contents( $root . '/' . $file );
	preg_match_all( '/abr_seed_id\(\s*\$key\s*(,\s*true\s*)?\)/', $src, $m );
	abr_test_check( count( $m[0] ) > 0, "$file looks up seed posts" );
	abr_test_check( count( array_filter( $m[1] ) ) === count( $m[0] ), "$file includes Scheduled posts in every lookup" );
}

// The seeder lock: activation, admin upgrade and front-end request share it.
abr_test_check( false !== strpos( $seed, "add_option( 'abr_seed_lock'" ), 'the lock is taken with add_option' );
foreach ( array( 'abr_seed_on_activation', 'abr_seed_on_upgrade', 'abr_seed_on_request' ) as $fn ) {
	$start = strpos( $seed, "function $fn(" );
	$body  = substr( $seed, $start, strpos( $seed, "\n}", $start ) - $start );
	abr_test_check( false !== strpos( $body, 'abr_seed_run_locked()' ) && false === strpos( $body, 'abr_run_seeder()' ), "$fn runs the seeder behind the lock" );
}

// The maintenance guard checks seed-schedule.php, loaded before seed.php.
$functions = file_get_contents( $root . '/functions.php' );
$sched     = strpos( $functions, "'/inc/seed-schedule.php'" );
$seedpos   = strpos( $functions, "'/inc/seed.php'" );
abr_test_check( false !== $sched && $sched < $seedpos, 'functions.php guards and loads seed-schedule.php before seed.php' );

echo "Checks: $count, failed: $fail\n";
exit( $fail ? 1 : 0 );
