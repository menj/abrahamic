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
	public $post_content = 'one two three four five six seven eight nine ten';
	public $post_status = 'publish';
	public $post_title  = '';
	public function __construct( $id, $img = true ) {
		$this->ID         = $id;
		$this->post_title = 'Article ' . $id;
		$this->img        = $img;
	}
	public $img;
}
class WP_Term {
	public $slug;
	public $name;
	public $term_id;
}
class WP_Query {}
class WP_Block {}

$GLOBALS['abr_t'] = array(
	'posts'    => array(),
	'unlisted' => array(),
	'filters'  => array(),
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
function apply_filters( $tag, $value ) {
	return $GLOBALS['abr_t']['filters'][ $tag ] ?? $value;
}
function abr_get_option( $k ) {
	return $GLOBALS['abr_t']['opts'][ $k ] ?? ( 'll_accent' === $k ? '' : 1 );
}
function strip_shortcodes( $s ) {
	return $s;
}
function wp_strip_all_tags( $s ) {
	return strip_tags( (string) $s );
}
function _n( $a ) {
	return $a;
}
function get_the_date( $f, $p ) {
	return 'c' === $f ? '2026-11-05T00:00:00+00:00' : '5 Nov 2026';
}
function get_the_category( $id ) {
	$cats = array(
		1 => array( 'history' ),
		2 => array( 'uncategorized', 'scripture' ),
		3 => array( 'uncategorized' ),
	);
	$out  = array();
	foreach ( $cats[ $id ] ?? array( 'theology' ) as $slug ) {
		$c          = new WP_Term();
		$c->slug    = $slug;
		$c->name    = ucfirst( $slug );
		$c->term_id = crc32( $slug ) % 1000;
		$out[]      = $c;
	}
	return $out;
}
function get_category_link( $id ) {
	return '/category/' . $id . '/';
}
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

// Category tabs, meta line, current row, settings.
$r = abr_lead_list( abr_t_posts( array( 1 => true, 2 => true, 3 => true, 4 => true, 5 => true, 6 => true ) ) );
abr_test_check( 6 === substr_count( $r['html'], 'class="abr-lead-list__meta"' ) && false !== strpos( $r['html'], '1 min read' ), 'the lead and each item carry a date and reading-time line' );
abr_test_check( 1 === preg_match( '#<a class="abr-lead-list__tab abr-lead-list__tab--c\d" href="/category/\d+/">History</a>#', $r['html'] ) && false === strpos( $r['html'], '>Uncategorized<' ), 'the lead tab is a link that names the category; the default category is skipped' );
abr_test_check( 5 === substr_count( $r['html'], '<a class="abr-lead-list__tab' ), 'a piece with only the default category has no tab' );
abr_test_check( 1 === substr_count( $r['html'], 'abr-lead-list__item is-current' ), 'only the first list item is the current row' );
abr_test_check( 5 === substr_count( $r['html'], 'class="abr-lead-list__arrow" aria-hidden="true"' ), 'arrows are hidden from assistive technology' );
abr_test_check( false === strpos( $r['html'], 'abr-lead-list--calm' ) && false === strpos( $r['html'], 'style="--abr-ll-accent' ), 'by default motion is on and the theme accent is used' );
$GLOBALS['abr_t']['filters'] = array(
	'abr_lead_list_show_tabs' => false,
	'abr_lead_list_motion'    => false,
	'abr_lead_list_accent'    => '#2f6fb0',
);
$r = abr_lead_list( abr_t_posts( array( 1 => true, 2 => true, 3 => true, 4 => true, 5 => true, 6 => true ) ) );
abr_test_check( false === strpos( $r['html'], '<a class="abr-lead-list__tab' ) && false !== strpos( $r['html'], 'abr-lead-list--calm' ) && false !== strpos( $r['html'], '--abr-ll-accent:#2f6fb0' ), 'the switches remove the tabs and motion, and the accent override is applied' );
$GLOBALS['abr_t']['filters'] = array( 'abr_lead_list_accent' => 'red; background:url(x)' );
$r = abr_lead_list( abr_t_posts( array( 1 => true, 2 => true, 3 => true, 4 => true, 5 => true, 6 => true ) ) );
abr_test_check( false === strpos( $r['html'], 'style="--abr-ll-accent' ), 'an accent that is not a hex colour is dropped' );
$GLOBALS['abr_t']['filters'] = array();

// Contrast of the tab pairs in both modes, and of the default hovered title on its tint.
$abr_modes = array(
	'light' => array( 'navy' => '#172033', 'ivory' => '#f8f5ef', 'white' => '#ffffff', 'gold' => '#b89555', 'beige' => '#e9e2d5' ),
	'dark'  => array( 'navy' => '#ece7dd', 'ivory' => '#0f131b', 'white' => '#171d29', 'gold' => '#cfa869', 'beige' => '#2b3341' ),
);
foreach ( $abr_modes as $mode => $t ) {
	$ink   = 'light' === $mode ? abr_lead_list_mix( $t['gold'], $t['navy'], 60 ) : $t['gold'];
	$pairs = array(
		'c0' => array( $t['navy'], $t['ivory'] ),
		'c1' => array( $ink, $t['white'] ),
		'c2' => array( $t['gold'], '#172033' ),
		'c3' => array( $t['beige'], $t['navy'] ),
		'c4' => array( abr_lead_list_mix( $t['navy'], $t['ivory'], 66 ), $t['ivory'] ),
	);
	foreach ( $pairs as $name => $pair ) {
		$ratio = abr_lead_list_ratio( $pair[0], $pair[1] );
		abr_test_check( $ratio >= 4.5, sprintf( 'tab %s in the %s mode reads at %.1f:1 (needs 4.5)', $name, $mode, $ratio ) );
	}
	$tint  = abr_lead_list_mix( $t['gold'], $t['ivory'], 12 );
	$ratio = abr_lead_list_ratio( $ink, $tint );
	abr_test_check( $ratio >= 4.5, sprintf( 'the hovered title in the %s mode reads at %.1f:1 on its tint', $mode, $ratio ) );
	$muted = abr_lead_list_mix( $t['navy'], $t['ivory'], 66 );
	abr_test_check( abr_lead_list_ratio( $muted, $tint ) >= 4.5, sprintf( 'the meta line in the %s mode reads at %.1f:1 on the tint', $mode, abr_lead_list_ratio( $muted, $tint ) ) );
}
abr_test_check( abr_lead_list_accent_ok( '#2f6fb0' ) && ! abr_lead_list_accent_ok( '#ffffff' ) && ! abr_lead_list_accent_ok( '#f5f5a0' ), 'an accent override that cannot carry text is refused' );

exit( $abr_fail ? 1 : 0 );
