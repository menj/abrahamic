<?php
/**
 * Self-test for inc/unlist.php: which queries and links leave unlisted posts
 * out, and the robots and sitemap filters. WordPress is replaced by small stubs.
 * Run: php tests/unlist-test.php. Exit code 0 when every check passes.
 *
 * @package Abrahamic
 */

define( 'ABSPATH', __DIR__ . '/' );

$GLOBALS['abr_t'] = array(
	'options'  => array( 'unlist_posts' => array( 7, '9', 0, 7 ) ),
	'admin'    => false,
	'ajax'     => false,
	'singular' => false,
	'queried'  => 0,
	'enabled'  => true,
	'can'      => false,
	'referer'  => false,
	'filters'  => array(),
);
function add_action() {}
function add_filter( $hook, $cb ) {
	$GLOBALS['abr_t']['filters'][ $hook ][] = $cb;
}
function apply_filters( $hook, $value ) {
	return 'unlist_posts_enabled' === $hook ? $GLOBALS['abr_t']['enabled'] : $value;
}
function get_option( $key, $default = false ) {
	return isset( $GLOBALS['abr_t']['options'][ $key ] ) ? $GLOBALS['abr_t']['options'][ $key ] : $default;
}
function update_option( $key, $value ) {
	$GLOBALS['abr_t']['options'][ $key ] = $value;
	return true;
}
function absint( $v ) {
	return abs( (int) $v );
}
function is_admin() {
	return $GLOBALS['abr_t']['admin'];
}
function wp_doing_ajax() {
	return $GLOBALS['abr_t']['ajax'];
}
function is_singular() {
	return $GLOBALS['abr_t']['singular'];
}
function get_queried_object_id() {
	return $GLOBALS['abr_t']['queried'];
}
function current_user_can() {
	return $GLOBALS['abr_t']['can'];
}
function wp_get_referer() {
	return $GLOBALS['abr_t']['referer'];
}
function wp_parse_url( $url ) {
	return parse_url( $url );
}
function admin_url() {
	return 'https://example.org/wp-admin/';
}
function trailingslashit( $s ) {
	return rtrim( $s, '/' ) . '/';
}
function wp_parse_id_list( $list ) {
	return array_unique( array_map( 'absint', preg_split( '/[\s,]+/', (string) $list, -1, PREG_SPLIT_NO_EMPTY ) ) );
}
function wp_robots_no_robots( $robots ) {
	$robots['noindex'] = true;
	return $robots;
}

/** Minimal WP_Query. */
class WP_Query {
	public $vars;
	public $singular;
	public function __construct( $vars = array(), $singular = false ) {
		$this->vars     = $vars;
		$this->singular = $singular;
	}
	public function get( $key ) {
		return isset( $this->vars[ $key ] ) ? $this->vars[ $key ] : '';
	}
	public function set( $key, $value ) {
		$this->vars[ $key ] = $value;
	}
	public function is_singular() {
		return $this->singular;
	}
}
/** Minimal WP_Post. */
class WP_Post {
	public $ID;
	public function __construct( $id ) {
		$this->ID = $id;
	}
}

require dirname( __DIR__ ) . '/inc/unlist.php';

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
function abr_test_reset() {
	$GLOBALS['abr_t'] = array_merge( $GLOBALS['abr_t'], array( 'admin' => false, 'ajax' => false, 'singular' => false, 'queried' => 0, 'enabled' => true, 'can' => false, 'referer' => false ) );
}

// The stored list is cleaned: integers, no zero, no repeats.
abr_test_check( array( 7, 9 ) === abr_unlisted_ids(), 'stored IDs are cleaned' );
abr_test_check( abr_is_unlisted( 9 ) && ! abr_is_unlisted( 8 ), 'abr_is_unlisted reads the list' );

// Home page, archives, feeds, search and REST lists: unlisted IDs join post__not_in.
$q = new WP_Query( array( 'post__not_in' => array( 3 ) ) );
abr_unlist_pre_get_posts( $q );
abr_test_check( array( 3, 7, 9 ) === $q->get( 'post__not_in' ), 'a list query leaves unlisted posts out and keeps its own exclusions' );

// A single post stays reachable by its address.
$q = new WP_Query( array( 'name' => 'hidden' ), true );
abr_unlist_pre_get_posts( $q );
abr_test_check( '' === $q->get( 'post__not_in' ), 'a singular query is left alone' );

// Exact ID lists and suppress_filters queries are left alone; abr_hide_unlisted opts back in.
$q = new WP_Query( array( 'post__in' => array( 7 ) ) );
abr_unlist_pre_get_posts( $q );
abr_test_check( '' === $q->get( 'post__not_in' ), 'a post__in query is left alone' );
$q = new WP_Query( array( 'suppress_filters' => true ) );
abr_unlist_pre_get_posts( $q );
abr_test_check( '' === $q->get( 'post__not_in' ), 'a suppress_filters query is left alone' );
$q = new WP_Query( array( 'suppress_filters' => true, 'abr_hide_unlisted' => true ) );
abr_unlist_pre_get_posts( $q );
abr_test_check( array( 7, 9 ) === array_values( array_filter( (array) $q->get( 'post__not_in' ) ) ), 'abr_hide_unlisted (related articles, topic lists) hides them' );

// Admin screens see every post; front-end AJAX does not; admin-sent AJAX by an editor does.
$GLOBALS['abr_t']['admin'] = true;
$q                         = new WP_Query();
abr_unlist_pre_get_posts( $q );
abr_test_check( '' === $q->get( 'post__not_in' ), 'an admin screen sees unlisted posts' );
$GLOBALS['abr_t']['ajax'] = true;
$q                        = new WP_Query();
abr_unlist_pre_get_posts( $q );
abr_test_check( array( 7, 9 ) === array_values( array_filter( (array) $q->get( 'post__not_in' ) ) ), 'AJAX without an admin referer hides them' );
$GLOBALS['abr_t']['referer'] = 'https://example.org/wp-admin/edit.php';
$q                           = new WP_Query();
abr_unlist_pre_get_posts( $q );
abr_test_check( array( 7, 9 ) === array_values( array_filter( (array) $q->get( 'post__not_in' ) ) ), 'an admin referer from a user who cannot edit posts hides them' );
$GLOBALS['abr_t']['can'] = true;
$q                       = new WP_Query();
abr_unlist_pre_get_posts( $q );
abr_test_check( '' === $q->get( 'post__not_in' ), 'admin-sent AJAX by an editor sees them' );
$GLOBALS['abr_t']['referer'] = 'https://evil.example/wp-admin/';
abr_test_check( ! abr_unlist_admin_referer(), 'a referer from another host is refused' );
$GLOBALS['abr_t']['referer'] = 'https://example.org/wp-admin-foo/';
abr_test_check( ! abr_unlist_admin_referer(), 'a path that only starts like wp-admin is refused' );
abr_test_reset();

// Previous and next links.
abr_test_check( "WHERE x AND p.ID NOT IN (7,9)" === abr_unlist_adjacent( 'WHERE x' ), 'adjacent links skip unlisted posts' );

// Page lists and the core sitemap.
abr_test_check( array( 2, 7, 9 ) === abr_unlist_page_list( array( 2 ) ), 'wp_list_pages excludes them' );
$args = abr_unlist_sitemap( array( 'post__not_in' => array( 4 ) ) );
abr_test_check( array( 4, 7, 9 ) === $args['post__not_in'], 'the core sitemap query excludes them' );

// Rank Math sitemap.
abr_test_check( array( 5, 7, 9 ) === abr_unlist_rank_math_exclude( array( 5 ) ), 'Rank Math exclusion list gains them (array)' );
abr_test_check( array( 5, 6, 7, 9 ) === abr_unlist_rank_math_exclude( '5,6' ), 'Rank Math exclusion list gains them (string)' );
abr_test_check( false === abr_unlist_rank_math_entry( array( 'loc' => 'x' ), 'post', new WP_Post( 7 ) ), 'Rank Math drops an unlisted entry' );
abr_test_check( array( 'loc' => 'x' ) === abr_unlist_rank_math_entry( array( 'loc' => 'x' ), 'post', new WP_Post( 8 ) ), 'Rank Math keeps a listed entry' );

// Robots: core and Rank Math.
$GLOBALS['abr_t']['singular'] = true;
$GLOBALS['abr_t']['queried']  = 9;
$r                            = abr_unlist_robots( array() );
abr_test_check( ! empty( $r['noindex'] ), 'wp_robots gets noindex on an unlisted post' );
$r = abr_unlist_rank_math_robots( array( 'index' => 'index', 'follow' => 'follow' ) );
abr_test_check( 'noindex' === $r['index'], 'Rank Math robots get noindex on an unlisted post' );
$GLOBALS['abr_t']['queried'] = 8;
$r                           = abr_unlist_rank_math_robots( array( 'index' => 'index' ) );
abr_test_check( 'index' === $r['index'], 'a listed post keeps index' );
abr_test_reset();

// The plugin's switch turns every rule off.
$GLOBALS['abr_t']['enabled'] = false;
$q                           = new WP_Query();
abr_unlist_pre_get_posts( $q );
abr_test_check( '' === $q->get( 'post__not_in' ) && 'W' === abr_unlist_adjacent( 'W' ), 'unlist_posts_enabled false switches the rules off' );
abr_test_reset();

// Saving keeps the list clean.
abr_unlist_set( 11, true );
abr_unlist_set( 7, false );
abr_test_check( array( 9, 11 ) === get_option( 'unlist_posts' ), 'abr_unlist_set adds and removes IDs' );

echo "Unlist checks: $count, failed: $fail\n";
exit( $fail ? 1 : 0 );
