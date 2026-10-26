<?php
/**
 * Qur'anic verse text for the KFGQPC HAFS Uthmanic Script face.
 *
 * The verses in the seed (and most Uthmani text in circulation) follow the
 * Tanzil encoding: sukun is U+0652 and the small rounded zero over a silent
 * letter is U+06DF. The KFGQPC face follows the Complex's own encoding, where
 * the Madani sukun is U+06E1 and the rounded zero is U+0652; it draws U+06DF
 * as a spacing ornament. So each verse line is mapped as it renders, and the
 * stored text stays standard. A line that already carries U+06E1 is taken to
 * be in the Complex's encoding and left alone.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Map Tanzil-encoded Uthmani text to the KFGQPC encoding.
 *
 * @param string $text Verse text or markup.
 * @return string
 */
function abr_quran_text_for_font( $text ) {
	if ( false !== strpos( $text, "\u{06E1}" ) ) {
		return $text;
	}
	return strtr(
		$text,
		array(
			"\u{0652}" => "\u{06E1}",
			"\u{06DF}" => "\u{0652}",
		)
	);
}

/**
 * Apply the mapping to Arabic verse lines (paragraphs with class abr-verse__ar).
 *
 * @param string $content Block output.
 * @return string
 */
function abr_quran_verse_block( $content ) {
	if ( ! preg_match( '/class="[^"]*\babr-verse__ar\b/', $content ) ) {
		return $content;
	}
	// A mapped line is marked, so a second pass over the same markup cannot
	// map its rounded zeros to sukun.
	return (string) preg_replace_callback(
		'/(<p\b[^>]*\babr-verse__ar\b[^>]*)(>)(.*?)(<\/p>)/s',
		static function ( $m ) {
			// A line pasted in the Complex's encoding with a rounded zero but
			// no sukun cannot be told from Tanzil text by its characters; the
			// editor marks it with the class abr-quran-kfgqpc.
			if ( false !== strpos( $m[1], 'data-quran-encoding=' ) || preg_match( '/\bclass="[^"]*\babr-quran-kfgqpc\b/', $m[1] ) ) {
				return $m[0];
			}
			return $m[1] . ' data-quran-encoding="kfgqpc"' . $m[2] . abr_quran_text_for_font( $m[3] ) . $m[4];
		},
		$content
	);
}
add_filter( 'render_block_core/paragraph', 'abr_quran_verse_block' );
