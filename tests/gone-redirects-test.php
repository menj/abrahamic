<?php
/**
 * Self-test for the 410 answer on listed spam under /journal/ (inc/security.php,
 * inc/data/gone-slugs.json) and for the /sitemap.xml and 2016 logo redirects
 * (inc/redirects.php). WordPress is replaced by small stubs.
 * Run: php tests/gone-redirects-test.php. Exit code 0 when every check passes.
 *
 * @package Abrahamic
 */

define( 'ABSPATH', __DIR__ . '/' );
define( 'ABR_DIR', dirname( __DIR__ ) );
define( 'ABR_URI', 'https://example.test/wp-content/themes/abrahamic' );
define( 'OBJECT', 'OBJECT' );

$GLOBALS['abr_t'] = array(
	'is_404'   => true,
	'status'   => 0,
	'options'  => array( 'sec_gone' => 1 ),
	'pages'    => array(),
	'rm'       => false,
	'rm_sitemap' => true,
);
function add_action() {}
function add_filter() {}
function __( $s ) { return $s; }
function abr_get_option( $k ) { return isset( $GLOBALS['abr_t']['options'][ $k ] ) ? $GLOBALS['abr_t']['options'][ $k ] : null; }
function wp_parse_url( $u, $c = -1 ) { return parse_url( $u, $c ); }
function esc_url_raw( $u ) { return $u; }
function wp_unslash( $s ) { return $s; }
function is_404() { return $GLOBALS['abr_t']['is_404']; }
function is_admin() { return false; }
function status_header( $c ) { $GLOBALS['abr_t']['status'] = $c; }
function nocache_headers() {}
function get_page_by_path( $slug ) { return isset( $GLOBALS['abr_t']['pages'][ $slug ] ) ? (object) array( 'ID' => 1 ) : null; }
function home_url( $p = '' ) { return 'https://example.test' . $p; }
function abr_rank_math_active() { return $GLOBALS['abr_t']['rm']; }
function abr_seed_legacy_v1() { return array(); }
function abr_legacy_paths() { return array(); }
function abr_renamed_prefixes() { return array(); }
class WP_Query {
	public $post_count = 0;
	public $is_404     = false;
	public function set_404() { $this->is_404 = true; }
}

require ABR_DIR . '/inc/security.php';
// Only the two functions under test are wanted from redirects.php; abr_legacy_paths()
// and abr_renamed_prefixes() are stubbed above, so take the file without them.
$abr_src = file_get_contents( ABR_DIR . '/inc/redirects.php' );
foreach ( array( 'abr_legacy_paths', 'abr_renamed_prefixes' ) as $abr_fn ) {
	$abr_src = preg_replace( '#function ' . $abr_fn . '\(\) \{.*?\n\}\n#s', '', $abr_src );
}
eval( '?>' . $abr_src ); // phpcs:ignore Squiz.PHP.Eval.Discouraged -- test harness only.

$fails = 0;
function check( $ok, $what ) {
	global $fails;
	if ( ! $ok ) {
		++$fails;
		echo "FAIL: $what\n";
	}
}

// The list itself.
$slugs = abr_sec_gone_slugs();
check( count( $slugs ) > 500, 'list holds the logged spam slugs' );
$raw = json_decode( file_get_contents( ABR_DIR . '/inc/data/gone-slugs.json' ), true );
check( is_array( $raw ) && count( $raw ) === count( array_unique( $raw ) ), 'list has no duplicates' );

// No real post, page or term slug may be in the list.
$seed  = json_decode( file_get_contents( ABR_DIR . '/inc/seed/content.json' ), true );
$owned = array();
foreach ( array_merge( $seed['items'], $seed['terms'] ) as $item ) {
	$owned[] = (string) ( $item['slug'] ?? '' );
	$owned[] = substr( strstr( (string) ( $item['key'] ?? ':' ), ':' ), 1 );
}
foreach ( array_keys( json_decode( file_get_contents( ABR_DIR . '/inc/seed/legacy-paths.json' ), true ) ) as $old ) {
	$owned[] = basename( trim( $old, '/' ) );
}
$owned = array_filter( array_map( 'strtolower', $owned ) );
check( count( $owned ) > 50, 'seed slugs were read' );
foreach ( $owned as $slug ) {
	check( ! isset( $slugs[ $slug ] ), "real slug $slug is not in the gone list" );
}

// Path parsing.
$spam = 'spinch-casino-login-pros-cons-your-guide';
check( isset( $slugs[ $spam ] ), 'sample spam slug is listed' );
check( $spam === abr_sec_gone_journal_slug( "journal/$spam" ), 'bare slug' );
foreach ( array( 'feed', 'feed/rss2', 'feed/atom', 'embed', 'amp', 'page/2' ) as $tail ) {
	check( $spam === abr_sec_gone_journal_slug( "journal/$spam/$tail" ), "/$tail stripped" );
}
check( '' === abr_sec_gone_journal_slug( "journal/$spam/other" ), 'other tail not stripped' );
check( '' === abr_sec_gone_journal_slug( $spam ), 'outside /journal/ ignored' );
check( '' === abr_sec_gone_journal_slug( "reference/$spam" ), 'other section ignored' );
check( '' === abr_sec_gone_journal_slug( 'journal/who-was-abraham' ), 'real post not matched' );
check( '' === abr_sec_gone_journal_slug( 'journal/who-was-abraham/feed' ), 'real post feed not matched' );
check( '' === abr_sec_gone_journal_slug( 'journal/online-casino-not-in-list' ), 'no keyword fallback' );
check( 'παγκόσμια-ανατροπή-του-πλούτου-μυστι' === abr_sec_gone_journal_slug( abr_sec_path( '/journal/%cf%80%ce%b1%ce%b3%ce%ba%cf%8c%cf%83%ce%bc%ce%b9%ce%b1-%ce%b1%ce%bd%ce%b1%cf%84%cf%81%ce%bf%cf%80%ce%ae-%cf%84%ce%bf%cf%85-%cf%80%ce%bb%ce%bf%cf%8d%cf%84%ce%bf%cf%85-%ce%bc%cf%85%cf%83%cf%84%ce%b9/' ) ), 'percent-encoded slug decoded' );

// The handler.
function run_gone( $uri, $is_404, $count = 0, $page = false ) {
	global $wp_query, $spam;
	$GLOBALS['abr_t']['status'] = 0;
	$GLOBALS['abr_t']['is_404'] = $is_404;
	$GLOBALS['abr_t']['pages']  = $page ? array( $spam => true ) : array();
	$wp_query                   = new WP_Query();
	$wp_query->post_count       = $count;
	$_SERVER['REQUEST_URI']     = $uri;
	abr_sec_send_gone_listed();
	return $GLOBALS['abr_t']['status'];
}
check( 410 === run_gone( "/journal/$spam/", true ), '404 on listed slug becomes 410' );
check( 410 === run_gone( "/journal/$spam/feed/", false ), 'empty feed of listed slug becomes 410' );
check( $wp_query->is_404, 'feed query marked 404 so the 404 template renders' );
check( 410 === run_gone( "/journal/$spam/feed/?x=1", false ), 'query string ignored' );
check( 0 === run_gone( "/journal/$spam/feed/", false, 1 ), 'feed with a post is left alone' );
check( 0 === run_gone( "/journal/$spam/feed/", false, 0, true ), 'existing post with the slug is left alone' );
check( 0 === run_gone( '/journal/who-was-abraham/', true ), 'unlisted 404 left alone' );
$GLOBALS['abr_t']['options']['sec_gone'] = 0;
check( 0 === run_gone( "/journal/$spam/", true ), 'setting off leaves the 404' );
$GLOBALS['abr_t']['options']['sec_gone'] = 1;

// Logo redirects.
check( ABR_URI . '/assets/images/logo.png' === abr_redirect_target( '/wp-content/uploads/2016/09/abrahamic-religions-300x75.png/' ), 'old logo to logo.png' );
check( ABR_URI . '/assets/images/icon-192.png' === abr_redirect_target( '/wp-content/uploads/2016/09/abrahamic-icon.png/' ), 'old icon to icon-192.png' );
foreach ( abr_legacy_asset_paths() as $old => $asset ) {
	check( is_file( ABR_DIR . '/' . $asset ), "$asset exists" );
}

// Sitemap redirect.
$GLOBALS['abr_t']['rm'] = false;
check( '' === abr_redirect_target( '/sitemap.xml/' ), 'no sitemap redirect without Rank Math' );
$GLOBALS['abr_t']['rm'] = true;
check( '' === abr_redirect_target( '/sitemap.xml/' ), 'no sitemap redirect without the sitemap module' );
eval( 'namespace RankMath\Sitemap; class Sitemap {}' ); // phpcs:ignore Squiz.PHP.Eval.Discouraged
check( 'https://example.test/sitemap_index.xml' === abr_redirect_target( '/sitemap.xml/' ), 'sitemap.xml to sitemap_index.xml under Rank Math' );
check( '' === abr_redirect_target( '/sitemap_index.xml/' ), 'sitemap_index.xml itself not redirected' );

echo $fails ? "$fails check(s) failed\n" : "All checks passed\n";
exit( $fails ? 1 : 0 );
