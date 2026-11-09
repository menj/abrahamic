<?php
/**
 * Writes inc/seed/checksums.json: the md5 of the starter content file and the supersedes map.
 * The content sync stops removals when a file no longer matches (inc/seed-sync.php).
 *
 * Run after every edit of inc/seed/content.json or inc/seed/supersedes.json:  php bin/seed-checksums.php
 */
if ( 'cli' !== PHP_SAPI ) {
	exit;
}

$dir  = dirname( __DIR__ ) . '/inc/seed/';
$sums = array();
foreach ( array( 'content', 'supersedes' ) as $name ) {
	$sums[ $name ] = md5_file( $dir . $name . '.json' );
}
file_put_contents( $dir . 'checksums.json', json_encode( $sums, JSON_PRETTY_PRINT ) . "\n" );
echo "Wrote inc/seed/checksums.json\n";
