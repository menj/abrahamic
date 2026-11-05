<?php
/**
 * Self-test for inc/lead-list.php: when the lead and list draws, which
 * article leads, and that the lead stays out of the list. WordPress is
 * replaced by small stubs. Run: php tests/lead-list-test.php. Exit code 0
 * when every check passes.
 *
 * @package Abrahamic
 */

// Run from the command line only: on a web server this file does nothing.
if ( 'cli' !== PHP_SAPI ) {
	exit;
}

define( 'ABSPATH', __DIR__ . '/' );

class WP_Post {
	public $ID;
	public $post_status = 'publish';
	public $post_title  = '';
	public function __construct( $id, $img = true ) {
		$this->ID         = $id;
		$this->post_title = 'Article ' . $id;
		$this->img        = $img;
	}
	public $img;
}
class WP_Term {}
class WP_Query {}
class WP_Block {}

$GLOBALS['abr_t'] = array(
	'posts'    => array(),
	'unlisted' => array(),
);
function abr_t_posts( array $spec ) {
	$GLOBALS['abr_t']['posts'] = array();
	foreach ( $spec as $id => $img ) {
		$GLOBALS['abr_t']['posts'][ $id ] = new WP_Post( $id, $img );
	}
	return array_values( $GLOBALS['abr_t']['posts'] );
}
function add_action() {}
function add_filter() {}
function __( $s ) {
	return $s;
}
function esc_html__( $s ) {
	return $s;
}
function esc_html( $s ) {
	return htmlspecialchars( (string) $s, ENT_QUOTES );
}
function esc_attr( $s ) {
	return htmlspecialchars( (string) $s, ENT_QUOTES );
}
function esc_url( $s ) {
	return (string) $s;
}
function sanitize_html_class( $s ) {
	return preg_replace( '/[^A-Za-z0-9_-]/', '', (string) $s );
}
function wp_parse_args( $a, $d ) {
	return array_merge( $d, $a );
}
function wp_list_pluck( $list, $f ) {
	return array_map(
		static function ( $o ) use ( $f ) {
			return $o->$f;
		},
		$list
	);
}
function get_post( $p ) {
	if ( $p instanceof WP_Post ) {
		return $p;
	}
	return $GLOBALS['abr_t']['posts'][ (int) $p ] ?? null;
}
function abr_is_unlisted( $id ) {
	return in_array( (int) $id, $GLOBALS['abr_t']['unlisted'], true );
}
function has_post_thumbnail( $p ) {
	return get_post( $p )->img;
}
function get_the_post_thumbnail( $p, $size, $attr ) {
	return get_post( $p )->img ? '<img class="' . $attr['class'] . '" alt="' . ( $attr['alt'] ?? 'photo' ) . '" src="/' . get_post( $p )->ID . '.avif">' : '';
}
function get_post_thumbnail_id( $p ) {
	return get_post( $p )->img ? 900 + get_post( $p )->ID : 0;
}
function get_post_meta() {
	return '';
}
function get_option( $k, $d = false ) {
	return $d;
}
function wp_get_attachment_caption() {
	return 'Caption line';
}
function wp_kses( $s ) {
	return $s;
}
function get_permalink( $p ) {
	return '/article-' . get_post( $p )->ID . '/';
}
function get_the_title( $p ) {
	return get_post( $p )->post_title;
}

require dirname( __DIR__ ) . '/inc/lead-list.php';

$abr_fail = 0;
function abr_test_check( $ok, $what ) {
	global $abr_fail;
	echo ( $ok ? 'PASS ' : 'FAIL ' ) . $what . "\n";
	$abr_fail += $ok ? 0 : 1;
}

$r = abr_lead_list( abr_t_posts( array( 1 => true, 2 => true, 3 => true, 4 => true, 5 => true, 6 => true, 7 => true ) ) );
abr_test_check( array( 1, 2, 3, 4, 5, 6 ) === $r['ids'], 'the newest article leads and the next five form the list' );
abr_test_check( 1 === substr_count( $r['html'], '<article' ) && 5 === substr_count( $r['html'], '<li ' ), 'one lead article, five list items' );
abr_test_check( false !== strpos( $r['html'], 'aria-labelledby="abr-lead-list-heading"' ) && false !== strpos( $r['html'], 'id="abr-lead-list-heading"' ), 'the section is labelled by its heading' );
abr_test_check( 5 === substr_count( $r['html'], 'alt=""' ), 'list thumbnails carry empty alt text' );
abr_test_check( false !== strpos( $r['html'], '<figcaption class="abr-lead-list__credit">Caption line</figcaption>' ), 'the credit sits in the figcaption' );
$abr_overlay = substr( $r['html'], strpos( $r['html'], 'abr-lead-list__overlay' ), strpos( $r['html'], '</figure>' ) - strpos( $r['html'], 'abr-lead-list__overlay' ) );
abr_test_check( preg_match( '#^abr-lead-list__overlay.*?</div></div><figcaption#s', $abr_overlay ) === 1, 'the credit is outside the overlay' );

$r = abr_lead_list( abr_t_posts( array( 1 => true, 2 => true, 3 => true, 4 => true, 5 => true, 6 => true ) ), array( 'lead_id' => 4 ) );
abr_test_check( array( 4, 1, 2, 3, 5, 6 ) === $r['ids'], 'lead_id leads and is left out of the list' );

$GLOBALS['abr_t']['unlisted'] = array( 2, 4 );
$r                            = abr_lead_list( abr_t_posts( array( 1 => true, 2 => true, 3 => true, 4 => true, 5 => true, 6 => true, 7 => true ) ), array( 'lead_id' => 4 ) );
abr_test_check( array( 1, 3, 5, 6, 7 ) === $r['ids'], 'unlisted articles neither lead nor appear in the list' );
$GLOBALS['abr_t']['unlisted'] = array();

$r = abr_lead_list( abr_t_posts( array( 1 => true, 2 => true, 3 => true ) ) );
abr_test_check( '' === $r['html'], 'three articles: nothing is drawn and the grid stays as it was' );

$r = abr_lead_list( abr_t_posts( array( 1 => true, 2 => true, 3 => true, 4 => true ) ) );
abr_test_check( '' === $r['html'], 'four articles: nothing is drawn' );

$r = abr_lead_list( abr_t_posts( array( 1 => true, 2 => true, 3 => true, 4 => true, 5 => true ) ) );
abr_test_check( array( 1, 2, 3, 4, 5 ) === $r['ids'], 'five articles: a lead and a list of four' );

$r = abr_lead_list( abr_t_posts( array( 1 => false, 2 => true, 3 => true, 4 => true, 5 => true, 6 => true ) ) );
abr_test_check( '' === $r['html'], 'a lead without a photograph: nothing is drawn' );

$r = abr_lead_list( abr_t_posts( array( 1 => true, 2 => false, 3 => true, 4 => true, 5 => true, 6 => true ) ) );
abr_test_check( 1 === substr_count( $r['html'], 'abr-lead-list__thumb--empty' ), 'a list article without a photograph keeps an empty 16:9 panel' );

exit( $abr_fail ? 1 : 0 );
