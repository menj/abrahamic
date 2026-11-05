<?php
/**
 * Self-test for inc/seed-schedule.php and the post_date field of the seed data.
 * Run: php tests/seed-schedule-test.php. Exit code 0 when every check passes.
 *
 * @package Abrahamic
 */

// Run from the command line only: on a web server this file does nothing.
if ( 'cli' !== PHP_SAPI ) {
	exit;
}

define( 'ABSPATH', __DIR__ . '/' );
require dirname( __DIR__ ) . '/inc/seed-schedule.php';

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

$kl  = new DateTimeZone( 'Asia/Kuala_Lumpur' );
$utc = new DateTimeZone( 'UTC' );
// 3 November 2026, 12:00 in Kuala Lumpur (04:00 UTC).
$now = ( new DateTimeImmutable( '2026-11-03 12:00:00', $kl ) )->getTimestamp();

// No field, or an unreadable one: null, so the seeder keeps its older behaviour.
abr_test_check( null === abr_seed_schedule( array(), $now, $kl ), 'no post_date gives null' );
abr_test_check( null === abr_seed_schedule( array( 'post_date' => '' ), $now, $kl ), 'empty post_date gives null' );
abr_test_check( null === abr_seed_schedule( array( 'days_ago' => 3 ), $now, $kl ), 'days_ago alone gives null' );
foreach ( array( '2026-02-30 09:00:00', '10 October 2026', '2026-10-10T09:00:00', '2026-13-01', 'yesterday', '2026-10-10 25:00:00' ) as $bad ) {
	abr_test_check( null === abr_seed_schedule( array( 'post_date' => $bad ), $now, $kl ), "invalid post_date '$bad' gives null" );
}
abr_test_check( null === abr_seed_schedule( array( 'post_date' => 20261010 ), $now, $kl ), 'non-string post_date gives null' );

// A past date publishes with that date; the GMT date follows the site time zone.
$r = abr_seed_schedule( array( 'post_date' => '2026-10-10 09:00:00' ), $now, $kl );
abr_test_check( $r && 'publish' === $r['post_status'], 'past date publishes' );
abr_test_check( $r && '2026-10-10 09:00:00' === $r['post_date'], 'past date keeps the site-time date' );
abr_test_check( $r && '2026-10-10 01:00:00' === $r['post_date_gmt'], 'past date converts to GMT' );

// A date to come is Scheduled.
$r = abr_seed_schedule( array( 'post_date' => '2026-12-20 09:00:00' ), $now, $kl );
abr_test_check( $r && 'future' === $r['post_status'], 'future date is scheduled' );
abr_test_check( $r && '2026-12-20 01:00:00' === $r['post_date_gmt'], 'future date converts to GMT' );

// A bare date means 09:00 site time; HH:MM gains seconds.
$r = abr_seed_schedule( array( 'post_date' => '2026-11-17' ), $now, $kl );
abr_test_check( $r && '2026-11-17 09:00:00' === $r['post_date'] && 'future' === $r['post_status'], 'bare date is 09:00 and scheduled' );
$r = abr_seed_schedule( array( 'post_date' => '2026-10-19 08:30' ), $now, $kl );
abr_test_check( $r && '2026-10-19 08:30:00' === $r['post_date'], 'HH:MM gains seconds' );

// The boundary: the same instant is not in the future; one second later is.
$r = abr_seed_schedule( array( 'post_date' => '2026-11-03 12:00:00' ), $now, $kl );
abr_test_check( $r && 'publish' === $r['post_status'], 'the present instant publishes' );
$r = abr_seed_schedule( array( 'post_date' => '2026-11-03 12:00:01' ), $now, $kl );
abr_test_check( $r && 'future' === $r['post_status'], 'one second ahead is scheduled' );

// The same date reads differently in another site time zone.
$r = abr_seed_schedule( array( 'post_date' => '2026-11-03 09:00:00' ), $now, $utc );
abr_test_check( $r && 'future' === $r['post_status'], '09:00 UTC is still ahead of 04:00 UTC' );

// Run later, a scheduled item resolves to publish with the same date, so a site
// seeded after the day gets the post with its intended date.
$later = ( new DateTimeImmutable( '2027-01-01 00:00:00', $kl ) )->getTimestamp();
$r     = abr_seed_schedule( array( 'post_date' => '2026-12-20 09:00:00' ), $later, $kl );
abr_test_check( $r && 'publish' === $r['post_status'] && '2026-12-20 09:00:00' === $r['post_date'], 'a run after the day publishes with the fixed date' );

// The seeder: post_date is read only where a post is created, and the sync step
// never writes a status, so a re-run cannot republish a Scheduled post.
$src = file_get_contents( dirname( __DIR__ ) . '/inc/seed.php' );
abr_test_check( false !== strpos( $src, "require_once __DIR__ . '/seed-schedule.php';" ), 'seed.php loads the helper' );
abr_test_check( 1 === substr_count( $src, 'abr_seed_schedule(' ), 'seed.php calls the helper once, at creation' );
$create = strpos( $src, '$postarr = array(' );
$insert = strpos( $src, 'wp_insert_post( wp_slash( $postarr ), true )' );
$call   = strpos( $src, 'abr_seed_schedule(' );
abr_test_check( $create && $insert && $call > $create && $call < $insert, 'the helper runs between building and inserting a new post' );
$sync_start = strpos( $src, '// Parent pages, and structure sync' );
$sync_end   = strpos( $src, 'wp_update_post( wp_slash( $update ) )', $sync_start );
$sync       = false === $sync_end ? substr( $src, $sync_start, 6000 ) : substr( $src, $sync_start, $sync_end - $sync_start );
abr_test_check( $sync_start && false === strpos( $sync, "'post_status'" ) && false === strpos( $sync, "'post_date" ), 'the sync step sets no status or date' );
$lookup = substr( $src, strpos( $src, 'function abr_seed_post_by_slug' ), 800 );
abr_test_check( false !== strpos( $lookup, "'future'" ), 'the adoption lookup finds Scheduled posts, so none is duplicated' );

// The seed data: every post_date is valid, on a post, and keys and slugs are unique.
$data = json_decode( file_get_contents( dirname( __DIR__ ) . '/inc/seed/content.json' ), true );
abr_test_check( is_array( $data ) && ! empty( $data['items'] ), 'content.json parses' );
$keys  = array();
$slugs = array();
$dated = 0;
foreach ( (array) $data['items'] as $item ) {
	$keys[]  = $item['key'];
	$slugs[] = $item['type'] . ':' . $item['slug'];
	if ( ! isset( $item['post_date'] ) ) {
		continue;
	}
	++$dated;
	abr_test_check( 'post' === $item['type'], $item['key'] . ': post_date is on a post' );
	abr_test_check( null !== abr_seed_schedule( $item, $now, $kl ), $item['key'] . ': post_date ' . $item['post_date'] . ' is valid' );
	abr_test_check( ! preg_match( '/\d/', $item['slug'] ), $item['key'] . ': slug has no digits' );
}
abr_test_check( count( $keys ) === count( array_unique( $keys ) ), 'seed keys are unique' );
abr_test_check( count( $slugs ) === count( array_unique( $slugs ) ), 'seed slugs are unique' );
echo "Dated seed items: $dated\n";

echo "Checks: $count, failed: $fail\n";
exit( $fail ? 1 : 0 );
