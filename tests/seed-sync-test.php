<?php
/**
 * Stub test of the starter content review rules (inc/seed-sync.php): fingerprints, the decision for a changed,
 * edited, dropped or superseded item, and the removal guard.
 *
 * Run: php tests/seed-sync-test.php
 */

if ( 'cli' !== PHP_SAPI ) {
	exit;
}
define( 'ABSPATH', '/' );
function wp_json_encode( $v ) {
	return json_encode( $v, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
}
function esc_url( $u ) {
	return $u;
}
function home_url( $p = '' ) {
	return 'https://abr.test' . $p;
}
function add_action() {}
function add_filter() {}

require dirname( __DIR__ ) . '/inc/seed-sync.php';

$fail = 0;
function abr_check( $ok, $label ) {
	global $fail;
	echo ( $ok ? 'ok   ' : 'FAIL ' ) . $label . "\n";
	$fail += $ok ? 0 : 1;
}

$a = array( 'title' => 'T', 'excerpt' => 'E', 'content' => '<a href="/x/">C</a>', 'description' => 'D' );
$b = array( 'title' => 'T', 'excerpt' => 'E', 'content' => '<a href="/x/">C2</a>', 'description' => 'D' );
$fa = abr_sync_bundle_fp( $a );
$fb = abr_sync_bundle_fp( $b );
abr_check( $fa !== $fb, 'a changed body changes the fingerprint' );
abr_check( abr_sync_fp_values( 'T', 'E', '<a href="https://abr.test/x/">C</a>', 'D' ) === $fa, 'a stored body with home-based links fingerprints like the bundled root-relative one' );
abr_check( abr_sync_fp_values( 'T2', 'E', $a['content'], 'D' ) !== $fa, 'the title is part of the fingerprint' );
abr_check( abr_sync_fp_values( 'T', 'E', $a['content'], 'D2' ) !== $fa, 'the description is part of the fingerprint' );

abr_check( 'current' === abr_sync_decide( $fb, $fb, $fb, $fb, '' ), 'equal text is current' );
abr_check( 'current' === abr_sync_decide( $fb, $fa, $fa, $fb, '' ), 'a bundle unchanged since the last write is current, even when the owner edited' );
abr_check( 'update' === abr_sync_decide( $fb, $fa, $fa, $fa, '' ), 'untouched and the bundle changed: update' );
abr_check( 'newer' === abr_sync_decide( $fb, 'mine', $fa, $fa, '' ), 'edited and the bundle changed: newer, never overwritten' );
abr_check( 'newer' === abr_sync_decide( $fb, $fa, '', '', '' ), 'no recorded fingerprint counts as edited' );
abr_check( 'kept' === abr_sync_decide( $fb, 'mine', $fa, $fa, $fb ), 'the owner chose to keep against this bundle text' );
abr_check( 'newer' === abr_sync_decide( $fb, 'mine', $fa, $fa, $fa ), 'a keep against an older bundle text does not hold' );

abr_check( 'trash' === abr_sync_decide_removed( $fa, $fa, '' ), 'dropped and untouched: trash' );
abr_check( 'removed' === abr_sync_decide_removed( 'mine', $fa, '' ), 'dropped and edited: listed' );
abr_check( 'removed' === abr_sync_decide_removed( $fa, '', '' ), 'dropped with no record: listed, never trashed' );
abr_check( 'kept' === abr_sync_decide_removed( 'mine', $fa, 'removed' ), 'dropped, edited, owner chose to keep: quiet' );
abr_check( 'kept' === abr_sync_decide_removed( 'mine', $fa, 'superseded' ), 'a keep recorded for a replaced item also quiets the dropped row' );

abr_check( '' === abr_sync_guard( false, true, 100, 100 ), 'the guard allows an ordinary sync' );
abr_check( '' !== abr_sync_guard( true, true, 100, 100 ), 'the kill switch stops removals' );
abr_check( '' !== abr_sync_guard( false, false, 100, 100 ), 'a failed checksum stops removals' );
abr_check( '' !== abr_sync_guard( false, true, 80, 100 ), 'a drop of more than 10 percent stops removals' );
abr_check( '' !== abr_sync_guard( false, true, 89, 100 ), 'a drop of 11 percent is stopped, with no rounding' );
abr_check( '' === abr_sync_guard( false, true, 90, 100 ), 'a drop of exactly 10 percent is allowed' );
abr_check( '' === abr_sync_guard( false, true, 5, 0 ), 'the first sync has no prior count' );

echo $fail ? "\n$fail check(s) failed\n" : "\nAll checks passed\n";
exit( $fail ? 1 : 0 );
