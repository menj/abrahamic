<?php
/**
 * Build the static error pages in errors/ from inc/error-page-html.php.
 * Run: php bin/build-error-pages.php (add --check to fail when a page is stale).
 *
 * @package Abrahamic
 */

define( 'ABSPATH', dirname( __DIR__ ) . '/' );
require dirname( __DIR__ ) . '/inc/error-page-html.php';

$abr_check = in_array( '--check', $argv, true );
$abr_stale = 0;
foreach ( array( '403', '500', '502', '503' ) as $abr_code ) {
	$abr_path = dirname( __DIR__ ) . '/errors/' . $abr_code . '.html';
	$abr_html = abr_error_page_html( $abr_code, 'Abrahamic Religions', '/' ) . "\n";
	if ( $abr_check ) {
		if ( ! is_readable( $abr_path ) || file_get_contents( $abr_path ) !== $abr_html ) {
			fwrite( STDERR, "stale: errors/$abr_code.html\n" );
			++$abr_stale;
		}
		continue;
	}
	file_put_contents( $abr_path, $abr_html );
	echo "wrote errors/$abr_code.html\n";
}
exit( $abr_stale ? 1 : 0 );
