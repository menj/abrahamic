<?php
/**
 * Self-test for inc/article-parts.php: the key points, the "In short" box,
 * where the mid-article next step goes, the review date and the table
 * region. WordPress is replaced by stubs.
 * Run: php tests/article-parts-test.php. Exit code 0 when every check passes.
 *
 * @package Abrahamic
 */

// Run from the command line only: on a web server this file does nothing.
if ( 'cli' !== PHP_SAPI ) {
	exit;
}

define( 'ABSPATH', __DIR__ . '/' );
define( 'ABR_URI', '' );
define( 'ABR_VERSION', '9.9.9' );

$GLOBALS['abr_t'] = array(
	'opts'    => array( 'article_answer' => 1, 'article_mid_next' => 1 ),
	'meta'    => array(),
	'filters' => array(),
);
class WP_Post {
	public $ID            = 7;
	public $post_password = '';
	public $post_content  = '';
	public $post_date     = '2026-08-10 10:00:00';
}
function add_action() {}
function add_shortcode() {}
function add_filter( $hook, $cb ) {
	$GLOBALS['abr_t']['filters'][ $hook ] = $cb;
}
function abr_get_option( $key ) {
	return $GLOBALS['abr_t']['opts'][ $key ] ?? null;
}
function is_admin() {
	return false;
}
function is_feed() {
	return false;
}
function is_singular() {
	return true;
}
function get_queried_object() {
	return $GLOBALS['abr_t']['post'];
}
function get_post_meta( $id, $key ) {
	return $GLOBALS['abr_t']['meta'][ $key ] ?? '';
}
function shortcode_atts( $pairs, $atts ) {
	return array_merge( $pairs, array_intersect_key( (array) $atts, $pairs ) );
}
function esc_html( $s ) {
	return htmlspecialchars( (string) $s, ENT_QUOTES );
}
function esc_attr( $s ) {
	return esc_html( $s );
}
function esc_html__( $s ) {
	return $s;
}
function __( $s ) {
	return $s;
}
function wp_strip_all_tags( $s ) {
	return strip_tags( (string) $s );
}
function wp_html_excerpt( $s, $n ) {
	return function_exists( 'mb_substr' ) ? mb_substr( (string) $s, 0, $n ) : substr( (string) $s, 0, $n );
}
function shortcode_parse_atts( $text ) {
	preg_match_all( '/(\w+)\s*=\s*"([^"]*)"/', (string) $text, $m, PREG_SET_ORDER );
	$out = array();
	foreach ( $m as $a ) {
		$out[ strtolower( $a[1] ) ] = $a[2];
	}
	return $out;
}

require dirname( __DIR__ ) . '/inc/article-parts.php';

$fail  = 0;
$count = 0;
function abr_test_check( $ok, $label ) {
	global $fail, $count;
	++$count;
	if ( ! $ok ) {
		++$fail;
		echo "FAIL: $label\n";
	}
}

$GLOBALS['abr_t']['post'] = new WP_Post();

abr_test_check( array( 'One', 'Two', 'Three' ) === abr_article_points( " One\n\nTwo ;; Three\r\n" ), 'points split on lines and ;;, blanks dropped' );

abr_test_check( '' === abr_article_answer_box(), 'no key points: no box' );
abr_test_check( ! abr_article_answer_shows( $GLOBALS['abr_t']['post'] ), 'no key points: the box does not show, so speakable leaves it out' );

$GLOBALS['abr_t']['meta']['_abr_takeaways'] = "First <b>point</b>\nSecond";
$box = abr_article_answer_box();
abr_test_check( false !== strpos( $box, '<h2 id="abr-answer-title"' ) && false !== strpos( $box, '<li>First &lt;b&gt;point&lt;/b&gt;</li><li>Second</li>' ), 'key points list, escaped' );
abr_test_check( abr_article_answer_shows( $GLOBALS['abr_t']['post'] ), 'key points: the box shows' );
$GLOBALS['abr_t']['post']->post_password = 'x';
abr_test_check( ! abr_article_answer_shows( $GLOBALS['abr_t']['post'] ), 'behind a password: no box, so no speakable part' );
$GLOBALS['abr_t']['post']->post_password = '';
$box2 = abr_article_answer_box( array( 'summary' => 'A summary.' ) );
abr_test_check( false !== strpos( $box2, 'abr-answer-title-2' ) && false !== strpos( $box2, 'A summary.' ) && false === strpos( $box2, '<li>' ), 'a second box: own id, its own summary only' );

$GLOBALS['abr_t']['opts']['article_answer'] = 0;
abr_test_check( '' === abr_article_answer_box() && ! abr_article_answer_shows( $GLOBALS['abr_t']['post'] ), 'switched off: no box' );
$GLOBALS['abr_t']['opts']['article_answer'] = 1;

$GLOBALS['abr_t']['meta']                 = array();
$GLOBALS['abr_t']['post']->post_content = 'Text [abr_answer_box points="One;;Two"] more';
abr_test_check( abr_article_answer_shows( $GLOBALS['abr_t']['post'] ), 'a box placed in the text with points shows' );
$GLOBALS['abr_t']['post']->post_content = 'Text [[abr_answer_box points="One"]] more';
abr_test_check( ! abr_article_answer_shows( $GLOBALS['abr_t']['post'] ), 'an escaped shortcode prints as text and is no box' );
$GLOBALS['abr_t']['post']->post_content = 'Text [abr_answer_box points=";;"] more';
abr_test_check( ! abr_article_answer_shows( $GLOBALS['abr_t']['post'] ), 'a box whose points split to nothing is no box' );

$html = '<p>a</p><h2 id="x">One</h2><p>b</p><h2>Two</h2><p>c</p><h2 class="abr-notes-title" id="notes">Notes</h2>';
abr_test_check( $html === abr_article_insert_mid( $html, '<aside>N</aside>' ), 'two sections and Notes: no mid next step' );
$html = '<p>a</p><h2>One</h2><h2>Two</h2><h2>Three</h2><h2>Four</h2>';
abr_test_check( '<p>a</p><h2>One</h2><h2>Two</h2><aside>N</aside><h2>Three</h2><h2>Four</h2>' === abr_article_insert_mid( $html, '<aside>N</aside>' ), 'mid next step before the third section' );
abr_test_check( $html === abr_article_insert_mid( $html, '' ), 'nothing to insert: text unchanged' );
$html = '<section class="abr-answer"><h2 id="abr-answer-title" class="abr-answer__title">In short</h2></section><h2>One</h2><h2>Two</h2>';
abr_test_check( $html === abr_article_insert_mid( $html, '<aside>N</aside>' ), 'the In short title is no section' );

abr_test_check( '2026-11-02' === abr_article_sanitize_date( ' 2026-11-02 ' ), 'review date kept' );
abr_test_check( '' === abr_article_sanitize_date( '2026-02-30' ) && '' === abr_article_sanitize_date( 'yesterday' ), 'bad review dates dropped' );

$table = $GLOBALS['abr_t']['filters']['render_block_core/table'];
$out   = $table( '<figure class="wp-block-table"><table></table><figcaption class="wp-element-caption">Three <em>dates</em></figcaption></figure>' );
abr_test_check( false !== strpos( $out, '<figure class="wp-block-table" role="region" tabindex="0" aria-label="Three dates">' ), 'table becomes a region named by its caption' );
abr_test_check( $out === $table( $out ), 'a region is not wrapped twice' );

echo $fail ? "$fail of $count checks failed\n" : "All $count checks passed\n";
exit( $fail ? 1 : 0 );
