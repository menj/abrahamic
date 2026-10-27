<?php
/**
 * Self-test for inc/security-detector.php. Run: php tests/security-detector-test.php
 * Exit code 0 when every starter item scores clean and every sample spam title flags.
 *
 * @package Abrahamic
 */

define( 'ABR_SECURITY_TEST', true );
require dirname( __DIR__ ) . '/inc/security-detector.php';

$fail = 0;
$data = json_decode( file_get_contents( dirname( __DIR__ ) . '/inc/seed/content.json' ), true );
$n    = 0;
foreach ( $data['items'] as $item ) {
	$fields = array( 'title' => $item['title'], 'slug' => $item['slug'], 'content' => $item['content'] . ' ' . ( isset( $item['excerpt'] ) ? $item['excerpt'] : '' ) . ' ' . ( isset( $item['description'] ) ? $item['description'] : '' ) );
	$r = abr_spam_score( $fields['title'], $fields['slug'], $fields['content'] );
	++$n;
	if ( $r['score'] > 0 ) {
		++$fail;
		echo 'FALSE POSITIVE (score ' . $r['score'] . '): ' . $item['key'] . ' ' . implode( '; ', $r['reasons'] ) . "\n";
	}
}
foreach ( $data['terms'] as $term ) {
	$r = abr_spam_score( $term['name'], $term['slug'], isset( $term['description'] ) ? $term['description'] : '' );
	++$n;
	if ( $r['score'] > 0 ) {
		++$fail;
		echo 'FALSE POSITIVE term: ' . $term['key'] . ' ' . implode( '; ', $r['reasons'] ) . "\n";
	}
}
echo "Starter items and terms checked: $n\n";

$clean = array( 'Bethlehem and Bethel in Genesis', 'The Hebrew alphabet', 'Between the Testaments', 'A better reading of Isaiah', 'Kumar and the Vedas', 'What is at stake in the Council of Nicaea', 'The crown of the Dome of the Rock', 'Elizabeth and Bethany', 'Judith in the Apocrypha' );
foreach ( $clean as $t ) {
	$r = abr_spam_score( $t, '', '' );
	if ( $r['spam'] ) {
		++$fail;
		echo "FALSE POSITIVE sample: $t\n";
	}
}

$spam = array(
	array( 'Bet Big Win Big with Bodog Sports Edge', '' ),
	array( 'Exclusive Coolbet Bonus Code Unlocks Big Wins', '' ),
	array( 'Скачать Пинап КЗ: Официальный сайт', '' ),
	array( 'Krok po kroku: Kompleksowy przewodnik po Pelican Casino', '' ),
	array( 'Live-Roulette bei Mr Pacho', '' ),
	array( 'Crash-Games als neuer Trend', '' ),
	array( 'Persoonlijke ervaringen met top 10 online casino’s in Nederland 2026', '' ),
	array( 'Panduan Lengkap 1xBet Download', '' ),
	array( 'Pusulabet 2026 Giriş Adresi', '' ),
	array( 'Sweepstakes Casinos Explained', '' ),
	array( 'Stake Casino Australia', '' ),
	array( 'Sportwetten-Analyse vor dem Spiel', '' ),
	array( 'Connection check jk5g5zw7', '' ),
	array( 'cl-probe', '' ),
	array( 'Mostbet giriş', '' ),
	array( 'Surfplay review', '' ),
	array( 'Crownplay bonus', '' ),
	array( 'Trino Casino', '' ),
	array( 'Syndicate Casino login', '' ),
	array( 'Stellar Spins', '' ),
	array( 'Starda официальный сайт', '' ),
	array( 'Slotspalace', '' ),
	array( 'Sportaza', '' ),
	array( 'Spybet', '' ),
	array( 'Squeenaud', '' ),
	array( 'Spinjo', '' ),
	array( 'Spellwin', '' ),
	array( 'Spinsup', '' ),
	array( 'Spinch', '' ),
	array( 'Spin Samurai', '' ),
	array( 'Slots Gallery', '' ),
	array( 'Najboljše igralne avtomate v Sloveniji', '' ),
	array( 'Casino Oyunlarında Bankroll Yönetimi', '' ),
	array( 'Glücksspiel in der Schweiz', '' ),
	array( 'Ausländische Online Casinos', '' ),
	array( 'Untitled', 'casinos-online-mas-seguros-espana-2026' ),
	array( 'Untitled', 'zahranicne-stavkove-kancelarie-na-slovensku-3' ),
	array( 'Untitled', 'pin-ap-kazino-oficialnyj-sajt' ),
	array( 'Untitled', 'kto-brasil-cassino-online-e-apostas' ),
	array( 'Vavada зеркало', '' ),
	array( 'Melbet app', '' ),
	array( 'Betify login', '' ),
	array( 'Casinozer avis', '' ),
	array( 'AureonPlay', '' ),
	array( 'PlatinCasino', '' ),
	array( 'True Blue Casino', '' ),
	array( 'SydSpin', '' ),
	array( 'TCL99', '' ),
	array( 'Vegas Stars', '' ),
	array( 'Surge Casino', '' ),
	array( '1win', '' ),
);
foreach ( $spam as $s ) {
	$r = abr_spam_score( $s[0], $s[1], '' );
	if ( ! $r['spam'] ) {
		++$fail;
		echo "MISSED: {$s[0]} {$s[1]} (score {$r['score']})\n";
	}
}
$r = abr_spam_score( 'A guide', '', '<p>See <a href="https://best-casino.example/">here</a></p>' );
if ( ! $r['spam'] ) {
	++$fail;
	echo "MISSED: gambling link\n";
}
echo 'Spam samples checked: ' . ( count( $spam ) + 1 ) . "\n";
echo $fail ? "FAILED: $fail\n" : "PASS\n";
exit( $fail ? 1 : 0 );
