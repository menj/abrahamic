<?php
/**
 * Donation link rules: one PayPal.me destination, US dollars only.
 * Run: php tests/donation-test.php
 */
if ( 'cli' !== PHP_SAPI ) {
	exit( 1 );
}
$src = file_get_contents( dirname( __DIR__ ) . '/inc/options.php' );
$src = substr( $src, strpos( $src, "define( 'ABR_DONATION_BASE'" ) );
$src = preg_replace( '/^<\?php/', '', $src );
$saved = '';
function abr_get_option( $key ) { global $saved; return $saved; }
function esc_url_raw( $u ) { return $u; }
function absint( $n ) { return abs( (int) $n ); }
function get_option() { return array(); }
eval( $src ); // phpcs:ignore Squiz.PHP.Eval.Discouraged

$fail = 0;
function check( $name, $ok ) { global $fail; if ( ! $ok ) { $fail++; echo "FAIL $name\n"; } }
$b = 'https://www.paypal.com/paypalme/menj';
check( 'base', abr_donation_url_is_valid( $b ) );
check( 'base slash', abr_donation_url_is_valid( $b . '/' ) );
check( 'amount', abr_donation_url_is_valid( $b . '/25USD' ) );
foreach ( array( 'https://www.paypal.com/paypalme/other', 'https://paypal.me/menj', 'https://www.paypal.com/paypalme/menj/25EUR', 'https://www.paypal.com/paypalme/menj/0USD', 'https://www.paypal.com/paypalme/menjx', 'http://www.paypal.com/paypalme/menj', 'https://evil.example/?u=https://www.paypal.com/paypalme/menj', 'https://stripe.com/pay', '' ) as $bad ) {
	check( "reject $bad", ! abr_donation_url_is_valid( $bad ) );
}
check( 'amount url', abr_donation_amount_url( 25 ) === $b . '/25USD' );
check( 'amounts', abr_donation_amounts() === array( 5, 10, 25, 50 ) );
foreach ( abr_donation_amounts() as $a ) { check( "usd $a", (bool) preg_match( '#/' . $a . 'USD$#', abr_donation_amount_url( $a ) ) ); }
$saved = 'https://stripe.com/pay';
check( 'fallback', abr_donation_url() === $b );
$saved = $b . '/10USD';
check( 'saved valid kept', abr_donation_url() === $b . '/10USD' );
echo $fail ? "$fail failed\n" : "donation-test: ok\n";
exit( $fail ? 1 : 0 );
