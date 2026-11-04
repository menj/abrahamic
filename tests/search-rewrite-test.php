<?php
/**
 * Self-test for the search addresses in inc/search.php: the pretty address a
 * query-string search is sent to, page numbers, empty searches, the plugin
 * hand-over and the rewrite flush marker. WordPress is replaced by stubs.
 * Run: php tests/search-rewrite-test.php. Exit code 0 when every check passes.
 *
 * @package Abrahamic
 */

define( 'ABSPATH', __DIR__ . '/' );
define( 'ABR_VERSION', '9.9.9' );

$GLOBALS['abr_t'] = array(
	'options' => array(),
	'flushed' => 0,
	'theme'   => array( 'search_pretty' => 1, 'search_base' => 'search' ),
);
function add_action() {}
function add_filter() {}
function add_shortcode() {}
function abr_get_option( $key ) {
	return isset( $GLOBALS['abr_t']['theme'][ $key ] ) ? $GLOBALS['abr_t']['theme'][ $key ] : null;
}
function get_option( $key, $default = false ) {
	return isset( $GLOBALS['abr_t']['options'][ $key ] ) ? $GLOBALS['abr_t']['options'][ $key ] : $default;
}
function update_option( $key, $value ) {
	$GLOBALS['abr_t']['options'][ $key ] = $value;
	return true;
}
function flush_rewrite_rules() {
	++$GLOBALS['abr_t']['flushed'];
}

require dirname( __DIR__ ) . '/inc/search.php';

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

$home = 'https://example.org/';
abr_test_check( 'https://example.org/search/abraham/' === abr_search_pretty_url( $home, 'search', 'abraham' ), 'a term becomes /search/term/' );
abr_test_check( 'https://example.org/search/abraham/' === abr_search_pretty_url( 'https://example.org', 'search', ' abraham ' ), 'home without a slash, term trimmed' );
abr_test_check( 'https://example.org/search/dead%20sea%20scrolls/' === abr_search_pretty_url( $home, 'search', 'dead sea scrolls' ), 'spaces are encoded' );
abr_test_check( 'https://example.org/search/qur%E2%80%99an/' === abr_search_pretty_url( $home, 'search', 'qur’an' ), 'non-ASCII letters are encoded' );
abr_test_check( 'https://example.org/search/a%2Fb/' === abr_search_pretty_url( $home, 'search', 'a/b' ), 'a slash in the term cannot add a path segment' );
abr_test_check( 'https://example.org/find/moses/' === abr_search_pretty_url( $home, 'find', 'moses' ), 'a custom base is used' );
abr_test_check( 'https://example.org/search/moses/page/2/' === abr_search_pretty_url( $home, 'search', 'moses', 2 ), 'page 2 keeps its page number' );
abr_test_check( 'https://example.org/search/moses/' === abr_search_pretty_url( $home, 'search', 'moses', 1 ), 'page 1 has no page segment' );
abr_test_check( '' === abr_search_pretty_url( $home, 'search', '' ), 'an empty search gets no address, so no redirect' );
abr_test_check( '' === abr_search_pretty_url( $home, 'search', '   ' ), 'a blank search gets no address' );
abr_test_check( '' === abr_search_pretty_url( $home, '', 'moses' ), 'no base gives no address' );

// The theme hands the feature to the plugin when the plugin is active, and to nothing when switched off.
abr_test_check( abr_search_pretty_on(), 'on by default' );
$GLOBALS['abr_t']['theme']['search_pretty'] = 0;
abr_test_check( ! abr_search_pretty_on(), 'off when the option is off' );
$GLOBALS['abr_t']['theme']['search_pretty'] = 1;

// Rewrite rules flush once per version and base, never on an ordinary load.
$GLOBALS['wp_rewrite'] = (object) array( 'search_base' => 'search' );
abr_search_base_setup();
abr_search_base_setup();
abr_test_check( 1 === $GLOBALS['abr_t']['flushed'], 'first load after an update flushes once; the next load does not' );
abr_test_check( '9.9.9|search' === get_option( 'abr_search_base_built' ), 'the marker holds version and base' );
$GLOBALS['abr_t']['theme']['search_base'] = 'find';
abr_search_base_setup();
abr_test_check( 2 === $GLOBALS['abr_t']['flushed'] && 'find' === $GLOBALS['wp_rewrite']->search_base, 'a new base flushes once and is set' );
$GLOBALS['abr_t']['options']['abr_search_base_built'] = '9.9.8|find';
abr_search_base_setup();
abr_test_check( 3 === $GLOBALS['abr_t']['flushed'], 'a new theme version flushes once' );
abr_search_base_setup();
abr_test_check( 3 === $GLOBALS['abr_t']['flushed'], 'and then not again' );

// Stand-in for the plugin's function. Declared inside a block, so PHP defines it only when this line runs.
if ( ! function_exists( 'wpseosearch_base' ) ) {
	function wpseosearch_base() {}
}
abr_test_check( ! abr_search_pretty_on(), 'off while Pretty Search Permalinks is active' );

echo "Search address checks: $count, failed: $fail\n";
exit( $fail ? 1 : 0 );
