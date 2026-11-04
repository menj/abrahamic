<?php
/**
 * Structured data beyond the base graph in inc/seo.php: scripture quotations
 * and citations, hadith with the grading the page prints, the glossary as a
 * DefinedTermSet, diagrams, tables, the timeline, people and places a page
 * names, the page frame (header, menus, footer), site search, archive lists
 * and article details.
 *
 * Every node describes something visible on the page or a plain fact about
 * it. The builder, abr_schema_build(), works on a context array and calls no
 * WordPress function, so tests/schema-graph-test.php can run it on the seed
 * content. abr_schema_context() reads the context from WordPress, and
 * abr_schema_merge() folds the result into one graph: the theme's own, or
 * Rank Math's through rank_math/json_ld, never a second block.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Plain text of an HTML fragment.
 *
 * @param string $html Markup.
 * @return string
 */
function abr_schema_text( $html ) {
	$html = preg_replace( '#<sup[^>]*>.*?</sup>#s', '', (string) $html );
	$html = preg_replace( '#<!--.*?-->#s', '', $html );
	$text = html_entity_decode( strip_tags( $html ), ENT_QUOTES | ENT_HTML5, 'UTF-8' );
	return trim( preg_replace( '/\s+/u', ' ', $text ) );
}

/**
 * Lower-case ASCII slug for @id fragments.
 *
 * @param string $text Text.
 * @return string
 */
function abr_schema_slug( $text ) {
	$text = strtolower( (string) $text );
	if ( function_exists( 'iconv' ) ) {
		$ascii = @iconv( 'UTF-8', 'ASCII//TRANSLIT//IGNORE', $text ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged -- a failed transliteration falls back below.
		$text  = false !== $ascii ? $ascii : $text;
	}
	return trim( preg_replace( '/[^a-z0-9]+/', '-', $text ), '-' );
}

/**
 * The scriptures and hadith collections the site cites.
 *
 * @return array Key => [ name, genre, inLanguage, sameAs, match ].
 */
function abr_schema_scriptures() {
	return array(
		'quran'            => array( 'The Qur\'an', 'Scripture', 'ar', 'https://www.wikidata.org/wiki/Q428', '' ),
		'bible'            => array( 'The Bible', 'Scripture', '', 'https://www.wikidata.org/wiki/Q1845', '' ),
		'sahih-al-bukhari' => array( 'Ṣaḥīḥ al-Bukhārī', 'Hadith collection', 'ar', '', 'Ṣaḥīḥ al-Bukhārī|Sahih al-Bukhari' ),
		'sahih-muslim'     => array( 'Ṣaḥīḥ Muslim', 'Hadith collection', 'ar', '', 'Ṣaḥīḥ Muslim|Sahih Muslim' ),
		'sunan-abi-dawud'  => array( 'Sunan Abī Dāwūd', 'Hadith collection', 'ar', '', 'Sunan Abī Dāwūd|Sunan Abi Dawud' ),
		'jami-al-tirmidhi' => array( 'Jāmiʿ al-Tirmidhī', 'Hadith collection', 'ar', '', 'Jāmiʿ al-Tirmidhī|Jami al-Tirmidhi' ),
		'sunan-ibn-majah'  => array( 'Sunan Ibn Mājah', 'Hadith collection', 'ar', '', 'Sunan Ibn Mājah|Sunan Ibn Majah' ),
		'sunan-al-nasai'   => array( 'Sunan al-Nasāʾī', 'Hadith collection', 'ar', '', 'Sunan al-Nasāʾī|Sunan al-Nasai' ),
		'muwatta-malik'    => array( 'Muwaṭṭaʾ Mālik', 'Hadith collection', 'ar', '', 'Muwaṭṭaʾ Mālik|Muwatta Malik' ),
		'musnad-ahmad'     => array( 'Musnad Aḥmad', 'Hadith collection', 'ar', '', 'Musnad Aḥmad|Musnad Ahmad' ),
	);
}

/**
 * Book node for a scripture or collection.
 *
 * @param string $key  Key in abr_schema_scriptures().
 * @param string $home Home URL.
 * @return array
 */
function abr_schema_book_node( $key, $home ) {
	$def  = abr_schema_scriptures()[ $key ];
	$node = array(
		'@type' => 'Book',
		'@id'   => $home . '#book-' . $key,
		'name'  => $def[0],
		'genre' => $def[1],
	);
	if ( '' !== $def[2] ) {
		$node['inLanguage'] = $def[2];
	}
	if ( '' !== $def[3] ) {
		$node['sameAs'] = $def[3];
	}
	return $node;
}

/**
 * Books of the Bible as the footnotes name them.
 *
 * @return string[]
 */
function abr_schema_bible_books() {
	return array( 'Genesis', 'Exodus', 'Leviticus', 'Numbers', 'Deuteronomy', 'Joshua', 'Judges', 'Ruth', '1 Samuel', '2 Samuel', '1 Kings', '2 Kings', '1 Chronicles', '2 Chronicles', 'Ezra', 'Nehemiah', 'Esther', 'Job', 'Psalms', 'Psalm', 'Proverbs', 'Ecclesiastes', 'Song of Songs', 'Isaiah', 'Jeremiah', 'Lamentations', 'Ezekiel', 'Daniel', 'Hosea', 'Joel', 'Amos', 'Obadiah', 'Jonah', 'Micah', 'Nahum', 'Habakkuk', 'Zephaniah', 'Haggai', 'Zechariah', 'Malachi', 'Matthew', 'Mark', 'Luke', 'John', 'Acts', 'Romans', '1 Corinthians', '2 Corinthians', 'Galatians', 'Ephesians', 'Philippians', 'Colossians', '1 Thessalonians', '2 Thessalonians', '1 Timothy', '2 Timothy', 'Titus', 'Philemon', 'Hebrews', 'James', '1 Peter', '2 Peter', '1 John', '2 John', '3 John', 'Jude', 'Revelation' );
}

/**
 * Chapter node: a surah of the Qur'an or a chapter of a book of the Bible.
 *
 * @param string $home    Home URL.
 * @param string $book    'quran' or a Bible book name.
 * @param int    $chapter Chapter number.
 * @return array
 */
function abr_schema_chapter_node( $home, $book, $chapter ) {
	if ( 'quran' === $book ) {
		return array(
			'@type'    => 'Chapter',
			'@id'      => $home . '#quran-' . (int) $chapter,
			'name'     => 'Qur\'an, sūrah ' . (int) $chapter,
			'position' => (int) $chapter,
			'isPartOf' => array( '@id' => $home . '#book-quran' ),
		);
	}
	return array(
		'@type'    => 'Chapter',
		'@id'      => $home . '#bible-' . abr_schema_slug( $book ) . '-' . (int) $chapter,
		'name'     => $book . ' ' . (int) $chapter,
		'position' => (int) $chapter,
		'isPartOf' => array( '@id' => $home . '#book-bible' ),
	);
}

/**
 * The numbered notes at the foot of a page.
 *
 * @param string $content Post content.
 * @return array Number => [ text, url ].
 */
function abr_schema_notes( $content ) {
	$notes = array();
	if ( ! preg_match_all( '#<li id="note-(\d+)">(.*?)</li>#s', (string) $content, $m, PREG_SET_ORDER ) ) {
		return $notes;
	}
	foreach ( $m as $note ) {
		$html = preg_replace( '#<a [^>]*class="abr-fn-back"[^>]*>.*?</a>#s', '', $note[2] );
		$url  = preg_match( '#href="(https?://[^"]+)"#', $html, $u ) ? $u[1] : '';
		$notes[ (int) $note[1] ] = array(
			'text' => abr_schema_text( $html ),
			'url'  => $url,
		);
	}
	return $notes;
}

/**
 * Collect the Book and Chapter nodes a set of references needs.
 *
 * @param array  $nodes Nodes, by reference.
 * @param array  $node  Node to add.
 * @return array Reference to the node.
 */
function abr_schema_add( &$nodes, $node ) {
	if ( ! isset( $nodes[ $node['@id'] ] ) ) {
		$nodes[ $node['@id'] ] = $node;
	}
	return array( '@id' => $node['@id'] );
}

/**
 * Qur'an passages quoted in the content (blockquote.abr-verse with the
 * Arabic, the English and a cite naming the reference). The Arabic is the
 * work quoted; the English is its translation, with the translator when the
 * note the cite points to names one.
 *
 * @param array $ctx   Context.
 * @param array $nodes Nodes, by reference.
 * @return array[] References to the Quotation nodes.
 */
function abr_schema_verses( $ctx, &$nodes ) {
	$refs = array();
	if ( ! preg_match_all( '#<blockquote class="[^"]*\babr-verse\b[^"]*">(.*?)</blockquote>#s', $ctx['content'], $m ) ) {
		return $refs;
	}
	$notes = abr_schema_notes( $ctx['content'] );
	foreach ( $m[1] as $i => $quote ) {
		preg_match_all( '#<p class="[^"]*abr-verse__ar[^"]*"[^>]*>(.*?)</p>#s', $quote, $ar );
		preg_match_all( '#<p class="[^"]*abr-verse__en[^"]*"[^>]*>(.*?)</p>#s', $quote, $en );
		$cite_html = preg_match( '#<cite>(.*?)</cite>#s', $quote, $c ) ? $c[1] : '';
		$cite      = abr_schema_text( $cite_html );
		if ( ! preg_match( '/Qur.an\s+(\d{1,3}):(\d{1,3})(?:\s*[-–]\s*(\d{1,3}))?/u', $cite, $ref ) ) {
			continue;
		}
		$surah = (int) $ref[1];
		if ( $surah < 1 || $surah > 114 ) {
			continue;
		}
		abr_schema_add( $nodes, abr_schema_book_node( 'quran', $ctx['home'] ) );
		$chapter = abr_schema_add( $nodes, abr_schema_chapter_node( $ctx['home'], 'quran', $surah ) );
		$id      = $ctx['url'] . '#quote-' . ( $i + 1 );
		$arabic  = trim( implode( ' ', array_map( 'abr_schema_text', $ar[1] ) ) );
		$english = trim( implode( ' ', array_map( 'abr_schema_text', $en[1] ) ) );
		if ( '' !== $arabic ) {
			$nodes[ $id ] = array(
				'@type'      => 'Quotation',
				'@id'        => $id,
				'name'       => $cite,
				'text'       => $arabic,
				'inLanguage' => 'ar',
				'isPartOf'   => $chapter,
			);
			$refs[] = array( '@id' => $id );
		}
		if ( '' !== $english ) {
			$node = array(
				'@type'      => 'Quotation',
				'@id'        => $id . '-en',
				'name'       => $cite,
				'text'       => $english,
				'inLanguage' => 'en',
				'isPartOf'   => $chapter,
			);
			if ( '' !== $arabic ) {
				$node['translationOfWork'] = array( '@id' => $id );
			}
			$note = preg_match( '/#note-(\d+)/', $cite_html, $n ) && isset( $notes[ (int) $n[1] ] ) ? $notes[ (int) $n[1] ]['text'] : '';
			if ( preg_match( '/\btrans\.\s+([^;,.]+)/u', $note, $t ) ) {
				$node['translator'] = array(
					'@type' => 'Organization',
					'name'  => trim( $t[1] ),
				);
			}
			$nodes[ $node['@id'] ] = $node;
			$refs[]                = array( '@id' => $node['@id'] );
		}
	}
	return $refs;
}

/**
 * Citations from the notes: Qur'an and Bible chapters, hadith by collection
 * and number (with the grading where the note prints one), and other sources
 * as CreativeWork. "Ibid." repeats an earlier source and adds nothing.
 *
 * @param array $ctx   Context.
 * @param array $nodes Nodes, by reference.
 * @return array[] Citation entries.
 */
function abr_schema_citations( $ctx, &$nodes ) {
	$citations = array();
	$seen      = array();
	$books     = implode( '|', array_map( 'preg_quote', abr_schema_bible_books() ) );
	$hadith    = array();
	foreach ( abr_schema_scriptures() as $key => $def ) {
		if ( '' !== $def[4] ) {
			foreach ( explode( '|', $def[4] ) as $name ) {
				$hadith[ $name ] = $key;
			}
		}
	}
	$hadith_re = implode( '|', array_map( 'preg_quote', array_keys( $hadith ) ) );
	foreach ( abr_schema_notes( $ctx['content'] ) as $number => $note ) {
		$text  = $note['text'];
		$found = false;
		if ( 0 === strpos( $text, 'Ibid' ) || '' === $text ) {
			continue;
		}
		foreach ( preg_split( '/;\s*/u', $text ) as $part ) {
			if ( preg_match( '/(' . $hadith_re . ')\s+(\d+[a-z]?)/u', $part, $h ) ) {
				$found = true;
				$key   = $hadith[ $h[1] ];
				$id    = $ctx['url'] . '#hadith-' . $key . '-' . $h[2];
				if ( isset( $seen[ $id ] ) ) {
					continue;
				}
				$seen[ $id ] = true;
				$node        = array(
					'@type'      => 'CreativeWork',
					'@id'        => $id,
					'name'       => abr_schema_scriptures()[ $key ][0] . ' ' . $h[2],
					'identifier' => $h[2],
					'genre'      => 'Hadith',
					'isPartOf'   => abr_schema_add( $nodes, abr_schema_book_node( $key, $ctx['home'] ) ),
				);
				if ( preg_match( '/\bgraded\s+(\S+?)(?:\s+by\s+([^,;.]+))?(?=[,;.]|$)/u', $part, $g ) ) {
					$grade = array(
						'@type' => 'PropertyValue',
						'name'  => 'grading',
						'value' => $g[1],
					);
					if ( ! empty( $g[2] ) ) {
						$grade['description'] = 'graded by ' . trim( $g[2] );
					}
					$node['additionalProperty'] = $grade;
				}
				$nodes[ $id ] = $node;
				$citations[]  = array( '@id' => $id );
				continue;
			}
			if ( preg_match( '/Qur.an\s+(\d{1,3}):\d/u', $part, $q ) && (int) $q[1] >= 1 && (int) $q[1] <= 114 ) {
				$found = true;
				abr_schema_add( $nodes, abr_schema_book_node( 'quran', $ctx['home'] ) );
				$ref = abr_schema_add( $nodes, abr_schema_chapter_node( $ctx['home'], 'quran', (int) $q[1] ) );
				if ( ! isset( $seen[ $ref['@id'] ] ) ) {
					$seen[ $ref['@id'] ] = true;
					$citations[]         = $ref;
				}
				continue;
			}
			if ( preg_match( '/^(?:cf\.\s+)?(' . $books . ')\s+(\d{1,3}):\d/u', $part, $b ) ) {
				$found = true;
				abr_schema_add( $nodes, abr_schema_book_node( 'bible', $ctx['home'] ) );
				$ref = abr_schema_add( $nodes, abr_schema_chapter_node( $ctx['home'], 'Psalm' === $b[1] ? 'Psalms' : $b[1], (int) $b[2] ) );
				if ( ! isset( $seen[ $ref['@id'] ] ) ) {
					$seen[ $ref['@id'] ] = true;
					$citations[]         = $ref;
				}
			}
		}
		// A note that names a source (a date, a quoted title or a link) and is
		// not one of the passages above; a note of comment alone is skipped.
		if ( ! $found && ( '' !== $note['url'] || preg_match( '/\b(1[0-9]{3}|20[0-9]{2})\b|“[^”]+”|"[^"]+"/u', $text ) ) ) {
			$work = array(
				'@type' => 'CreativeWork',
				'name'  => $text,
			);
			if ( '' !== $note['url'] ) {
				$work['url'] = $note['url'];
			}
			$citations[] = $work;
		}
	}
	return $citations;
}

/**
 * Diagrams drawn by the theme ([abr_diagram]) as ImageObject.
 *
 * @param array $ctx   Context.
 * @param array $nodes Nodes, by reference.
 * @return array[]
 */
function abr_schema_diagrams( $ctx, &$nodes ) {
	$refs = array();
	if ( ! preg_match_all( '/(?<!\[)\[abr_diagram\s+([^\]]*)\]/', $ctx['content'], $m ) ) {
		return $refs;
	}
	foreach ( $m[1] as $i => $atts ) {
		$name    = preg_match( '/name="([^"]*)"/', $atts, $a ) ? $a[1] : '';
		$caption = preg_match( '/caption="([^"]*)"/', $atts, $a ) ? html_entity_decode( $a[1], ENT_QUOTES, 'UTF-8' ) : '';
		if ( ! in_array( $name, array( 'family-tree', 'shared-beliefs', 'world-religions' ), true ) ) {
			continue;
		}
		$id   = $ctx['url'] . '#diagram-' . ( $i + 1 );
		$node = array(
			'@type'           => 'ImageObject',
			'@id'             => $id,
			'name'            => ucfirst( str_replace( '-', ' ', $name ) ),
			'encodingFormat'  => 'image/svg+xml',
			'creator'         => array( '@id' => $ctx['home'] . '#organization' ),
			'copyrightHolder' => array( '@id' => $ctx['home'] . '#organization' ),
		);
		if ( '' !== $caption ) {
			$node['caption'] = $caption;
		}
		if ( '' !== $ctx['copyright'] ) {
			$node['copyrightNotice'] = $ctx['copyright'];
		}
		$nodes[ $id ] = $node;
		$refs[]       = array( '@id' => $id );
	}
	return $refs;
}

/**
 * Tables in the content, named by their caption or the heading above them.
 *
 * @param array $ctx   Context.
 * @param array $nodes Nodes, by reference.
 * @return array[]
 */
function abr_schema_tables( $ctx, &$nodes ) {
	$refs = array();
	if ( ! preg_match_all( '#<figure class="[^"]*wp-block-table[^"]*">(.*?)</figure>#s', $ctx['content'], $m, PREG_OFFSET_CAPTURE ) ) {
		return $refs;
	}
	foreach ( $m[1] as $i => $table ) {
		$name = preg_match( '#<figcaption[^>]*>(.*?)</figcaption>#s', $table[0], $c ) ? abr_schema_text( $c[1] ) : '';
		if ( '' === $name && preg_match_all( '#<h[2-4][^>]*>(.*?)</h[2-4]>#s', substr( $ctx['content'], 0, $table[1] ), $h ) ) {
			$name = abr_schema_text( end( $h[1] ) );
		}
		$id   = $ctx['url'] . '#table-' . ( $i + 1 );
		$node = array(
			'@type' => 'Table',
			'@id'   => $id,
		);
		if ( '' !== $name ) {
			$node['name'] = $name;
		}
		$nodes[ $id ] = $node;
		$refs[]       = array( '@id' => $id );
	}
	return $refs;
}

/**
 * The glossary page's terms (a list of "<strong>Term</strong>: definition").
 *
 * @param array $ctx   Context.
 * @param array $nodes Nodes, by reference.
 * @return array|null Reference to the DefinedTermSet.
 */
function abr_schema_glossary( $ctx, &$nodes ) {
	if ( empty( $ctx['is_glossary'] ) || ! preg_match_all( '#<li><strong>(.*?)</strong>\s*:\s*(.*?)</li>#s', $ctx['content'], $m, PREG_SET_ORDER ) ) {
		return null;
	}
	$set_id = $ctx['url'] . '#glossary';
	$terms  = array();
	foreach ( $m as $item ) {
		$name = abr_schema_text( $item[1] );
		$desc = abr_schema_text( $item[2] );
		if ( '' === $name || '' === $desc ) {
			continue;
		}
		$id = $ctx['url'] . '#term-' . abr_schema_slug( $name );
		if ( isset( $nodes[ $id ] ) ) {
			continue;
		}
		$nodes[ $id ] = array(
			'@type'            => 'DefinedTerm',
			'@id'              => $id,
			'name'             => $name,
			'description'      => $desc,
			'inDefinedTermSet' => array( '@id' => $set_id ),
		);
		$terms[] = array( '@id' => $id );
	}
	if ( ! $terms ) {
		return null;
	}
	$nodes[ $set_id ] = array(
		'@type'          => 'DefinedTermSet',
		'@id'            => $set_id,
		'name'           => $ctx['title'],
		'url'            => $ctx['url'],
		'hasDefinedTerm' => $terms,
	);
	return array( '@id' => $set_id );
}

/**
 * ISO 8601 year (astronomical numbering, so 1 BCE is 0000).
 *
 * @param int  $year Year as written.
 * @param bool $bce  Before the Common Era.
 * @return string
 */
function abr_schema_iso_year( $year, $bce ) {
	$n = $bce ? 1 - (int) $year : (int) $year;
	return ( $n < 0 ? '-' : '' ) . str_pad( (string) abs( $n ), 4, '0', STR_PAD_LEFT );
}

/**
 * Start and end of a period written as "c. 2000 to 1200 BCE", "516 BCE to
 * 70 CE", "1800 to the present" or with an en dash.
 *
 * @param string      $text  Text holding the range.
 * @param string|null $range Set to the range as written, such as
 *                           "c. 2000 to 1200 BCE".
 * @return array|null [ start, end ] with end '' for "the present".
 */
function abr_schema_period( $text, &$range = null ) {
	$re = '/(?:c\.\s*)?(\d{1,4})\s*(BCE|CE)?\s*(?:to|–|-)\s*(?:c\.\s*)?(?:(\d{1,4})\s*(BCE|CE)?|(?:the )?present|today)/u';
	if ( ! preg_match( $re, $text, $m ) ) {
		return null;
	}
	$range = trim( $m[0] );
	$end_era   = isset( $m[4] ) ? $m[4] : '';
	$start_era = isset( $m[2] ) && '' !== $m[2] ? $m[2] : $end_era;
	$start     = abr_schema_iso_year( $m[1], 'BCE' === $start_era );
	$end       = isset( $m[3] ) && '' !== $m[3] ? abr_schema_iso_year( $m[3], 'BCE' === $end_era ) : '';
	return array( $start, $end );
}

/**
 * Dated periods shown on the page as an ItemList of Event: the timeline
 * page's sections, or the eras of the home page's timeline section.
 *
 * @param array $ctx   Context.
 * @param array $nodes Nodes, by reference.
 * @return array|null Reference to the ItemList.
 */
function abr_schema_timeline( $ctx, &$nodes ) {
	$periods = array();
	if ( ! empty( $ctx['is_timeline'] ) && preg_match_all( '#<h2[^>]*id="([^"]+)"[^>]*>(.*?)</h2>(.*?)(?=<h2|$)#s', $ctx['content'], $m, PREG_SET_ORDER ) ) {
		foreach ( $m as $section ) {
			$name   = abr_schema_text( $section[2] );
			$period = abr_schema_period( $name, $range );
			if ( $period ) {
				$first     = preg_match( '#<p[^>]*>(.*?)</p>#s', $section[3], $p ) ? abr_schema_text( $p[1] ) : '';
				$periods[] = array( $name, $period, $first, $ctx['url'] . '#' . $section[1], $range );
			}
		}
	}
	if ( ! empty( $ctx['timeline_html'] ) && preg_match_all( '#<div class="[^"]*\babr-era\b[^"]*"[^>]*>(.*?)</div>#s', $ctx['timeline_html'], $m, PREG_SET_ORDER ) ) {
		foreach ( $m as $era ) {
			$when   = preg_match( '#<p class="abr-kicker">(.*?)</p>#s', $era[1], $k ) ? abr_schema_text( $k[1] ) : '';
			$name   = preg_match( '#<h3[^>]*>(.*?)</h3>#s', $era[1], $h ) ? abr_schema_text( $h[1] ) : '';
			$desc   = preg_match( '#<p>(.*?)</p>#s', $era[1], $d ) ? abr_schema_text( $d[1] ) : '';
			$period = abr_schema_period( $when, $range );
			if ( $period && '' !== $name ) {
				$periods[] = array( $name . ' (' . $when . ')', $period, $desc, $ctx['url'] . '#timeline', $range );
			}
		}
	}
	if ( ! $periods ) {
		return null;
	}
	$list_id = $ctx['url'] . '#timeline-list';
	$items   = array();
	foreach ( $periods as $i => $period ) {
		$id    = $ctx['url'] . '#period-' . ( $i + 1 );
		$event = array(
			'@type' => 'Event',
			'@id'   => $id,
			'name'  => $period[0],
		);
		// schema.org Date has no years before 1 CE, so validators reject
		// "-1999". A period that starts or ends BCE gives its era as text in
		// the description and carries no startDate or endDate.
		$bce = false !== strpos( $period[4], 'BCE' );
		if ( ! $bce ) {
			$event['startDate'] = $period[1][0];
		}
		$event['url'] = $period[3];
		if ( ! $bce && '' !== $period[1][1] ) {
			$event['endDate'] = $period[1][1];
		}
		$desc = $period[2];
		if ( $bce && false === strpos( $desc, $period[4] ) ) {
			$desc = '' === $desc ? $period[4] . '.' : $period[4] . '. ' . $desc;
		}
		if ( '' !== $desc ) {
			$event['description'] = $desc;
		}
		$nodes[ $id ] = $event;
		$items[]      = array(
			'@type'    => 'ListItem',
			'position' => $i + 1,
			'item'     => array( '@id' => $id ),
		);
	}
	$nodes[ $list_id ] = array(
		'@type'           => 'ItemList',
		'@id'             => $list_id,
		'name'            => 'Timeline',
		'itemListOrder'   => 'https://schema.org/ItemListOrderAscending',
		'numberOfItems'   => count( $items ),
		'itemListElement' => $items,
	);
	return array( '@id' => $list_id );
}

/**
 * Entities (inc/data/schema-entities.json) the page names: those in the
 * title are what it is about, the rest are mentions.
 *
 * @param array $ctx   Context.
 * @param array $nodes Nodes, by reference.
 * @return array [ about, mentions ] lists of references.
 */
function abr_schema_entities( $ctx, &$nodes ) {
	$about    = array();
	$mentions = array();
	if ( empty( $ctx['entities'] ) ) {
		return array( $about, $mentions );
	}
	$title = ' ' . $ctx['title'] . ' ';
	$body  = ' ' . abr_schema_text( $ctx['content'] ) . ' ';
	foreach ( $ctx['entities'] as $key => $entity ) {
		$names = isset( $entity['match'] ) ? (array) $entity['match'] : array( $entity['name'] );
		$re    = '/(?<![\p{L}\p{N}])(?:' . implode( '|', array_map( 'preg_quote', $names ) ) . ')(?![\p{L}\p{N}])/u';
		$in_title = (bool) preg_match( $re, $title );
		if ( ! $in_title && ! preg_match( $re, $body ) ) {
			continue;
		}
		unset( $entity['match'] );
		// The Qur'an and the Bible are the same Book nodes the citations use.
		$id     = isset( abr_schema_scriptures()[ $key ] ) ? $ctx['home'] . '#book-' . $key : $ctx['home'] . '#entity-' . $key;
		$entity = array_merge( array( '@type' => $entity['@type'], '@id' => $id ), $entity );
		$ref    = abr_schema_add( $nodes, $entity );
		if ( $in_title ) {
			$about[] = $ref;
		} else {
			$mentions[] = $ref;
		}
	}
	return array( $about, $mentions );
}

/**
 * Header, menus and footer as WebPageElement nodes. One SiteNavigationElement
 * per visible menu, each link a part of it.
 *
 * @param array $ctx   Context.
 * @param array $nodes Nodes, by reference.
 * @return array[] References to WPHeader and WPFooter.
 */
function abr_schema_frame( $ctx, &$nodes ) {
	$home  = $ctx['home'];
	$parts = array();
	$menu  = static function ( $id, $name, $links ) use ( &$nodes ) {
		$items = array();
		foreach ( $links as $i => $link ) {
			$items[] = array(
				'@type' => 'SiteNavigationElement',
				'@id'   => $id . '-' . ( $i + 1 ),
				'name'  => $link['name'],
				'url'   => $link['url'],
			);
		}
		$nodes[ $id ] = array(
			'@type'   => 'SiteNavigationElement',
			'@id'     => $id,
			'name'    => $name,
			'hasPart' => $items,
		);
		return array( '@id' => $id );
	};
	$header = array(
		'@type' => 'WPHeader',
		'@id'   => $home . '#header',
		'name'  => $ctx['site_name'],
	);
	if ( ! empty( $ctx['header_nav'] ) ) {
		$header['hasPart'] = array( $menu( $home . '#nav-primary', 'Main menu', $ctx['header_nav'] ) );
	}
	$nodes[ $header['@id'] ] = $header;
	$parts[]                 = array( '@id' => $header['@id'] );

	$footer = array(
		'@type' => 'WPFooter',
		'@id'   => $home . '#footer',
		'name'  => $ctx['site_name'],
	);
	if ( '' !== $ctx['copyright'] ) {
		$footer['copyrightNotice'] = $ctx['copyright'];
	}
	$menus = array();
	foreach ( (array) $ctx['footer_navs'] as $i => $nav ) {
		if ( ! empty( $nav['items'] ) ) {
			$menus[] = $menu( $home . '#nav-footer-' . ( $i + 1 ), $nav['name'], $nav['items'] );
		}
	}
	if ( $menus ) {
		$footer['hasPart'] = $menus;
	}
	$nodes[ $footer['@id'] ] = $footer;
	$parts[]                 = array( '@id' => $footer['@id'] );
	return $parts;
}

/**
 * Build the nodes and the properties for the current view from a context.
 *
 * @param array $ctx Context from abr_schema_context().
 * @return array { nodes, website, webpage, article, page_type }
 */
function abr_schema_build( $ctx ) {
	$ctx   = array_merge(
		array(
			'home'          => '',
			'url'           => '',
			'kind'          => 'other',
			'title'         => '',
			'content'       => '',
			'excerpt'       => '',
			'tags'          => array(),
			'language'      => 'en',
			'site_name'     => '',
			'copyright'     => '',
			'year'          => '',
			'copyright_template' => '',
			'reading'       => 0,
			'is_glossary'   => false,
			'is_timeline'   => false,
			'is_landing'    => false,
			'timeline_html' => '',
			'list'          => array(),
			'header_nav'    => array(),
			'footer_navs'   => array(),
			'search'        => '',
			'search_url'    => '',
			'entities'      => array(),
		),
		$ctx
	);
	$nodes   = array();
	$out     = array(
		'nodes'     => array(),
		'website'   => array(),
		'webpage'   => array(),
		'article'   => array(),
		'page_type' => '',
	);
	$org_ref = array( '@id' => $ctx['home'] . '#organization' );

	if ( '' !== $ctx['search'] ) {
		$out['website']['potentialAction'] = array(
			'@type'  => 'SearchAction',
			'target' => array(
				'@type'       => 'EntryPoint',
				'urlTemplate' => $ctx['search'],
			),
		);
	}

	$frame = abr_schema_frame( $ctx, $nodes );

	if ( 'search' === $ctx['kind'] && '' !== $ctx['search_url'] ) {
		$nodes[ $ctx['search_url'] . '#webpage' ] = array(
			'@type'      => 'SearchResultsPage',
			'@id'        => $ctx['search_url'] . '#webpage',
			'url'        => $ctx['search_url'],
			'name'       => $ctx['title'],
			'isPartOf'   => array( '@id' => $ctx['home'] . '#website' ),
			'inLanguage' => $ctx['language'],
			'hasPart'    => $frame,
		);
	}
	if ( '' === $ctx['url'] ) {
		$out['nodes'] = array_values( $nodes );
		return $out;
	}

	$page                = array( 'hasPart' => $frame );
	$page['speakable']   = array(
		'@type'       => 'SpeakableSpecification',
		'cssSelector' => in_array( $ctx['kind'], array( 'post', 'page' ), true ) ? array( 'h1', '.abr-prose > p:first-of-type' ) : array( 'h1' ),
	);

	// Archive, tag and posts pages: the list of entries shown.
	if ( $ctx['list'] ) {
		$items = array();
		foreach ( array_values( $ctx['list'] ) as $i => $entry ) {
			$items[] = array(
				'@type'    => 'ListItem',
				'position' => $i + 1,
				'name'     => $entry['name'],
				'url'      => $entry['url'],
			);
		}
		$nodes[ $ctx['url'] . '#list' ] = array(
			'@type'           => 'ItemList',
			'@id'             => $ctx['url'] . '#list',
			'numberOfItems'   => count( $items ),
			'itemListElement' => $items,
		);
		$page['mainEntity'] = array( '@id' => $ctx['url'] . '#list' );
	}

	if ( in_array( $ctx['kind'], array( 'post', 'page', 'front' ), true ) ) {
		$work      = array();
		$quotes    = abr_schema_verses( $ctx, $nodes );
		$citations = abr_schema_citations( $ctx, $nodes );
		$figures   = abr_schema_diagrams( $ctx, $nodes );
		$tables    = abr_schema_tables( $ctx, $nodes );
		$glossary  = abr_schema_glossary( $ctx, $nodes );
		$timeline  = abr_schema_timeline( $ctx, $nodes );
		list( $about, $mentions ) = abr_schema_entities( $ctx, $nodes );

		$parts = array_merge( $quotes, $tables );
		if ( $parts ) {
			$work['hasPart'] = $parts;
		}
		if ( $citations ) {
			$work['citation'] = $citations;
		}
		if ( $figures ) {
			$work['associatedMedia'] = $figures;
		}
		if ( $about ) {
			$work['about'] = $about;
		}
		if ( $mentions ) {
			$work['mentions'] = $mentions;
		}
		if ( $glossary ) {
			$page['mainEntity'] = $glossary;
		}
		// An ItemList is not a CreativeWork, so it cannot be a hasPart. The
		// timeline page is about its list; elsewhere the list is what the
		// work is about, beside the entities in its title.
		if ( $timeline && $ctx['is_timeline'] ) {
			$page['mainEntity'] = $timeline;
		} elseif ( $timeline ) {
			$work['about']   = isset( $work['about'] ) ? $work['about'] : array();
			$work['about'][] = $timeline;
		}
		if ( $ctx['is_landing'] && preg_match_all( '#<h2[^>]*id="([^"]+)"[^>]*>(.*?)</h2>#s', $ctx['content'], $m, PREG_SET_ORDER ) ) {
			foreach ( $m as $section ) {
				$page['hasPart'][] = array(
					'@type' => 'WebPageElement',
					'@id'   => $ctx['url'] . '#' . $section[1],
					'name'  => abr_schema_text( $section[2] ),
				);
			}
		}

		$text  = abr_schema_text( $ctx['content'] );
		$work += array(
			'inLanguage'          => $ctx['language'],
			'isAccessibleForFree' => true,
			'copyrightHolder'     => $org_ref,
			'accessMode'          => $figures || false !== strpos( $ctx['content'], '[abr_photo' ) ? array( 'textual', 'visual' ) : array( 'textual' ),
			'accessModeSufficient' => array(
				'@type'                => 'ItemList',
				'itemListElement'      => array( 'textual' ),
				'description'          => 'Text alone',
			),
		);
		// The work's year and notice agree: both carry its publication year. The
		// footer node keeps the notice as the footer prints it, with this year.
		$notice = abr_schema_work_notice( $ctx );
		if ( '' !== $ctx['year'] ) {
			$work['copyrightYear'] = (int) $ctx['year'];
		}
		if ( '' !== $notice ) {
			$work['copyrightNotice'] = $notice;
		}
		$features = array( 'alternativeText', 'structuralNavigation' );
		if ( false !== strpos( $ctx['content'], 'abr-toc' ) ) {
			$features[] = 'tableOfContents';
		}
		$work['accessibilityFeature'] = $features;

		if ( 'post' === $ctx['kind'] ) {
			if ( $ctx['tags'] ) {
				$work['keywords'] = implode( ', ', $ctx['tags'] );
			}
			if ( '' !== $ctx['excerpt'] ) {
				$work['abstract'] = $ctx['excerpt'];
			}
			if ( $ctx['reading'] > 0 ) {
				$work['timeRequired'] = 'PT' . (int) $ctx['reading'] . 'M';
			}
			$work['wordCount'] = count( preg_split( '/\s+/u', $text, -1, PREG_SPLIT_NO_EMPTY ) );
			$work['audience']  = array(
				'@type'        => 'Audience',
				'audienceType' => 'General readers',
			);
			$out['article'] = $work;
		} else {
			$page += $work;
		}
	}

	if ( 'archive' === $ctx['kind'] ) {
		$out['page_type'] = 'CollectionPage';
	}
	$out['webpage'] = $page;
	$out['nodes']   = array_values( $nodes );
	return $out;
}

/**
 * Types that mark a node as the page, the article or the site.
 *
 * @param string $role 'webpage', 'article' or 'website'.
 * @return string[]
 */
function abr_schema_role_types( $role ) {
	$types = array(
		'webpage' => array( 'WebPage', 'AboutPage', 'ContactPage', 'CollectionPage', 'FAQPage', 'ItemPage', 'ProfilePage', 'QAPage', 'SearchResultsPage', 'MedicalWebPage', 'CheckoutPage', 'RealEstateListing' ),
		'article' => array( 'Article', 'BlogPosting', 'NewsArticle', 'ScholarlyArticle', 'Report', 'TechArticle', 'SocialMediaPosting' ),
		'website' => array( 'WebSite' ),
	);
	return $types[ $role ];
}

/**
 * Fold the built nodes and properties into a graph, filling only properties
 * the graph's own nodes lack, then merge nodes that share an @id so each
 * appears once.
 *
 * @param array $graph   Graph nodes (list, or keyed as Rank Math keys them).
 * @param array $ext     Result of abr_schema_build().
 * @param bool  $own     True for the theme's own graph: Article on a post also
 *                       takes BlogPosting, and an archive page CollectionPage.
 * @param bool  $is_post Whether the view is a single post.
 * @return array
 */
function abr_schema_merge( $graph, $ext, $own = true, $is_post = false ) {
	$keyed = ! array_key_exists( 0, $graph ) && $graph;
	$done  = array();
	foreach ( $graph as $key => $node ) {
		if ( ! is_array( $node ) || ! isset( $node['@type'] ) ) {
			continue;
		}
		$types = (array) $node['@type'];
		foreach ( array( 'webpage', 'article', 'website' ) as $role ) {
			if ( isset( $done[ $role ] ) || ! array_intersect( $types, abr_schema_role_types( $role ) ) ) {
				continue;
			}
			if ( 'webpage' === $role && in_array( 'FAQPage', $types, true ) && count( $types ) === 1 ) {
				continue; // The FAQ node beside the page, not the page itself.
			}
			$done[ $role ] = true;
			foreach ( $ext[ $role ] as $prop => $value ) {
				if ( 'hasPart' === $prop && ! empty( $node['hasPart'] ) ) {
					$graph[ $key ]['hasPart'] = array_merge( (array) $node['hasPart'], $value );
				} elseif ( ! isset( $node[ $prop ] ) || array() === $node[ $prop ] || '' === $node[ $prop ] ) {
					$graph[ $key ][ $prop ] = $value;
				}
			}
			if ( $own && 'article' === $role && $is_post && array( 'Article' ) === $types ) {
				$graph[ $key ]['@type'] = array( 'Article', 'BlogPosting' );
			}
		}
	}
	$i = 0;
	foreach ( $ext['nodes'] as $node ) {
		if ( $keyed ) {
			$graph[ 'abrSchema' . ( $i++ ) ] = $node;
		} else {
			$graph[] = $node;
		}
	}
	return abr_schema_dedupe( $graph );
}

/**
 * Copyright notice for a page's work node, with the same year as its
 * copyrightYear: the footer's notice with the publication year in place of
 * {year}. Without a template or a year it is the footer's notice as printed.
 *
 * @param array $ctx View context.
 * @return string
 */
function abr_schema_work_notice( $ctx ) {
	$template = isset( $ctx['copyright_template'] ) ? (string) $ctx['copyright_template'] : '';
	if ( '' !== $ctx['year'] && false !== strpos( $template, '{year}' ) ) {
		return str_replace( '{year}', (string) $ctx['year'], $template );
	}
	return (string) $ctx['copyright'];
}

/**
 * Merge nodes that share an @id: the first keeps its values and takes the
 * properties only the later ones have.
 *
 * @param array $graph Graph nodes.
 * @return array
 */
function abr_schema_dedupe( $graph ) {
	$first = array();
	foreach ( $graph as $key => $node ) {
		if ( ! is_array( $node ) || empty( $node['@id'] ) ) {
			continue;
		}
		$id = $node['@id'];
		if ( ! isset( $first[ $id ] ) ) {
			$first[ $id ] = $key;
			continue;
		}
		$graph[ $first[ $id ] ] += $node;
		unset( $graph[ $key ] );
	}
	return array_key_exists( 0, $graph ) || ! $graph ? array_values( $graph ) : $graph;
}

/**
 * Links of a menu as [ name, url ], dropping empty and home-only entries.
 *
 * @param string $option Theme option holding the menu.
 * @return array[]
 */
function abr_schema_menu_links( $option ) {
	$links = array();
	foreach ( abr_parse_menu( abr_get_option( $option ) ) as $item ) {
		$url = abr_link( $item['target'], '' );
		if ( $url && home_url( '' ) !== $url && 0 !== strpos( $url, '#' ) ) {
			$links[] = array(
				'name' => $item['label'],
				'url'  => $url,
			);
		}
	}
	return $links;
}

/**
 * Links of the header's navigation, from the same source the page renders:
 * abr_primary_nav_data() fills the header's Navigation block from the
 * nav_header option, cut to ABR_PRIMARY_NAV_MAX top-level links with up to
 * ABR_NAV_CHILDREN_MAX dropdown links each.
 *
 * @return array[]
 */
function abr_schema_header_links() {
	$items = abr_parse_menu( abr_get_option( 'nav_header' ) );
	$items = array_slice( $items, 0, defined( 'ABR_PRIMARY_NAV_MAX' ) ? ABR_PRIMARY_NAV_MAX : count( $items ) );
	$links = array();
	foreach ( $items as $item ) {
		$children = array_slice( $item['children'], 0, defined( 'ABR_NAV_CHILDREN_MAX' ) ? ABR_NAV_CHILDREN_MAX : count( $item['children'] ) );
		foreach ( array_merge( array( $item ), $children ) as $entry ) {
			$url = abr_link( $entry['target'], '' );
			if ( $url ) {
				$links[] = array(
					'name' => wp_strip_all_tags( $entry['label'] ),
					'url'  => $url,
				);
			}
		}
	}
	return $links;
}

/**
 * Context for the current view, read from WordPress.
 *
 * @return array
 */
function abr_schema_context() {
	$home = home_url( '/' );
	$ctx  = array(
		'home'        => $home,
		'url'         => abr_seo_canonical(),
		'language'    => get_bloginfo( 'language' ),
		'site_name'   => get_bloginfo( 'name' ),
		'copyright'   => str_replace( '{year}', wp_date( 'Y' ), abr_get_option( 'footer_copyright' ) ),
		'copyright_template' => abr_get_option( 'footer_copyright' ),
		'header_nav'  => abr_schema_header_links(),
		'footer_navs' => array(),
		'entities'    => array(),
		'search'      => $home . '?s={search_term_string}',
	);
	for ( $col = 1; $col <= 3; $col++ ) {
		$title                = abr_get_option( 'nav_footer_' . $col . '_title' );
		$ctx['footer_navs'][] = array(
			'name'  => '' !== $title ? $title : 'Footer',
			'items' => abr_schema_menu_links( 'nav_footer_' . $col ),
		);
	}
	$ctx['footer_navs'][] = array(
		'name'  => 'Site information',
		'items' => array_slice( abr_schema_menu_links( 'nav_utility' ), 0, defined( 'ABR_SECONDARY_NAV_MAX' ) ? ABR_SECONDARY_NAV_MAX : 8 ),
	);
	$entities = abr_seed_read_json( ABR_DIR . '/inc/data/schema-entities.json' );
	if ( isset( $entities['entities'] ) && is_array( $entities['entities'] ) ) {
		$ctx['entities'] = $entities['entities'];
	}

	if ( is_search() ) {
		$ctx['kind']       = 'search';
		$ctx['title']      = abr_seo_title();
		$ctx['search_url'] = get_search_link();
		return $ctx;
	}
	if ( is_front_page() ) {
		$ctx['kind'] = 'front';
		$post        = get_queried_object();
		$ctx['content'] = $post instanceof WP_Post ? (string) $post->post_content : '';
		$ctx['title']   = get_bloginfo( 'name' );
		$template       = function_exists( 'get_block_template' ) ? get_block_template( get_stylesheet() . '//front-page' ) : null;
		$markup         = $template && ! empty( $template->content ) ? $template->content : '';
		if ( false !== strpos( $markup, '"slug":"abrahamic/timeline"' ) && is_readable( ABR_DIR . '/patterns/timeline.php' ) ) {
			ob_start();
			include ABR_DIR . '/patterns/timeline.php';
			$ctx['timeline_html'] = (string) ob_get_clean();
		}
		return $ctx;
	}
	if ( is_singular() ) {
		$post           = get_queried_object();
		$ctx['kind']    = is_singular( 'post' ) ? 'post' : 'page';
		$ctx['title']   = wp_strip_all_tags( get_the_title( $post ) );
		$ctx['content'] = (string) $post->post_content;
		$ctx['year']    = get_post_time( 'Y', true, $post );
		if ( 'post' === $ctx['kind'] ) {
			$ctx['excerpt'] = has_excerpt( $post ) ? wp_strip_all_tags( get_the_excerpt( $post ) ) : '';
			$tags           = get_the_tags( $post->ID );
			$ctx['tags']    = is_array( $tags ) ? array_values( array_filter( wp_list_pluck( $tags, 'name' ) ) ) : array();
			$words          = str_word_count( wp_strip_all_tags( $post->post_content ) );
			$ctx['reading'] = max( 1, (int) round( $words / 220 ) );
		}
		$ctx['is_glossary'] = (int) $post->ID === abr_seed_id( 'page:glossary' );
		$ctx['is_timeline'] = (int) $post->ID === abr_seed_id( 'page:timeline' );
		$ctx['is_landing']  = 'page-landing' === get_page_template_slug( $post );
		return $ctx;
	}
	if ( is_home() || is_archive() ) {
		global $wp_query;
		$ctx['kind'] = 'archive';
		foreach ( (array) $wp_query->posts as $post ) {
			$ctx['list'][] = array(
				'name' => wp_strip_all_tags( get_the_title( $post ) ),
				'url'  => get_permalink( $post ),
			);
		}
	}
	return $ctx;
}

/**
 * Images the theme ships: add size and format to their ImageObject nodes,
 * and mark the featured image as representative of the page.
 *
 * @param array $graph Graph nodes.
 * @return array
 */
function abr_schema_image_details( $graph ) {
	foreach ( $graph as $key => $node ) {
		if ( ! is_array( $node ) || ! isset( $node['@type'] ) || 'ImageObject' !== $node['@type'] || empty( $node['contentUrl'] ) ) {
			continue;
		}
		$url = (string) $node['contentUrl'];
		$ext = strtolower( pathinfo( (string) wp_parse_url( $url, PHP_URL_PATH ), PATHINFO_EXTENSION ) );
		$mime = array(
			'avif' => 'image/avif',
			'webp' => 'image/webp',
			'jpg'  => 'image/jpeg',
			'jpeg' => 'image/jpeg',
			'png'  => 'image/png',
			'svg'  => 'image/svg+xml',
		);
		if ( empty( $node['encodingFormat'] ) && isset( $mime[ $ext ] ) ) {
			$graph[ $key ]['encodingFormat'] = $mime[ $ext ];
		}
		if ( empty( $node['width'] ) && function_exists( 'attachment_url_to_postid' ) && 0 !== strpos( $url, ABR_URI . '/' ) ) {
			// A featured photo or other upload: WordPress keeps its size.
			$size = abr_schema_attachment_size( $url );
			if ( $size ) {
				$graph[ $key ]['width']  = $size[0];
				$graph[ $key ]['height'] = $size[1];
				$node['width']           = $size[0];
			}
		}
		if ( empty( $node['width'] ) && 0 === strpos( $url, ABR_URI . '/' ) ) {
			$file = ABR_DIR . '/' . rawurldecode( substr( $url, strlen( ABR_URI ) + 1 ) );
			$size = is_readable( $file ) ? @getimagesize( $file ) : false; // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged -- a bundled file.
			if ( $size ) {
				$graph[ $key ]['width']  = (int) $size[0];
				$graph[ $key ]['height'] = (int) $size[1];
			}
		}
		if ( ! empty( $node['creator'] ) && empty( $node['copyrightHolder'] ) ) {
			$graph[ $key ]['copyrightHolder'] = $node['creator'];
		}
		if ( isset( $node['@id'] ) && preg_match( '/#(primaryimage|abr-featured-image)$/', $node['@id'] ) ) {
			$graph[ $key ]['representativeOfPage'] = true;
		}
	}
	return $graph;
}

/**
 * Width and height of an image in the media library, for the size its URL
 * names (the full image or one of its generated sizes).
 *
 * @param string $url Image URL.
 * @return int[]|null [ width, height ].
 */
function abr_schema_attachment_size( $url ) {
	$id = (int) attachment_url_to_postid( $url );
	if ( ! $id ) {
		return null;
	}
	$meta = wp_get_attachment_metadata( $id );
	if ( is_array( $meta ) ) {
		$file = wp_basename( (string) wp_parse_url( $url, PHP_URL_PATH ) );
		if ( ! empty( $meta['sizes'] ) ) {
			foreach ( $meta['sizes'] as $size ) {
				if ( isset( $size['file'], $size['width'], $size['height'] ) && $size['file'] === $file ) {
					return array( (int) $size['width'], (int) $size['height'] );
				}
			}
		}
		if ( ! empty( $meta['width'] ) && ! empty( $meta['height'] ) ) {
			return array( (int) $meta['width'], (int) $meta['height'] );
		}
	}
	$src = wp_get_attachment_image_src( $id, 'full' );
	return $src && ! empty( $src[1] ) ? array( (int) $src[1], (int) $src[2] ) : null;
}

/**
 * Cast every isAccessibleForFree in a graph, nested nodes included, to a real
 * boolean. Rank Math prints the string "1", which validators reject as
 * INVALID_BOOLEAN. No other value is touched.
 *
 * @param mixed $graph Graph, node or value.
 * @return mixed
 */
function abr_schema_fix_booleans( $graph ) {
	if ( ! is_array( $graph ) ) {
		return $graph;
	}
	foreach ( $graph as $key => $value ) {
		if ( 'isAccessibleForFree' === $key && ! is_array( $value ) ) {
			if ( is_bool( $value ) ) {
				continue;
			}
			$v = strtolower( trim( (string) $value ) );
			if ( in_array( $v, array( '1', 'true', 'yes' ), true ) ) {
				$graph[ $key ] = true;
			} elseif ( in_array( $v, array( '0', 'false', 'no', '' ), true ) ) {
				$graph[ $key ] = false;
			}
		} elseif ( is_array( $value ) ) {
			$graph[ $key ] = abr_schema_fix_booleans( $value );
		}
	}
	return $graph;
}

/**
 * Cast isAccessibleForFree back to a boolean in printed JSON-LD. Rank Math
 * runs its graph through wp_kses_post_deep() after every filter, just before
 * it encodes it, and kses turns true into "1" and false into "" (a "0" stays
 * "0"). So the cast in abr_schema_fix_booleans() never reaches the page under
 * Rank Math, and the printed script has to be fixed instead.
 *
 * Only the inside of <script type="application/ld+json"> blocks is read, and
 * only the exact key/value tokens "isAccessibleForFree":"1", "0" and "" are
 * changed, with or without pretty printing. Any other text, an escaped
 * mention of the property inside a string included, is left alone.
 *
 * @param string $html Printed markup holding one or more ld+json scripts.
 * @return string
 */
function abr_schema_fix_printed_booleans( $html ) {
	$html = (string) $html;
	if ( false === strpos( $html, '"isAccessibleForFree"' ) ) {
		return $html;
	}
	return (string) preg_replace_callback(
		'#(<script\b[^>]*\btype=(["\'])application/ld\+json\2[^>]*>)(.*?)(</script>)#is',
		static function ( $m ) {
			// A key token is preceded by { or , (and white space); a value inside a string is not.
			$json = preg_replace_callback(
				'/([{,]\s*"isAccessibleForFree"\s*:\s*)"(1|0|)"(?=\s*[,}])/',
				static function ( $t ) {
					return $t[1] . ( '1' === $t[2] ? 'true' : 'false' );
				},
				$m[3]
			);
			return $m[1] . $json . $m[4];
		},
		$html
	);
}

/**
 * Extend a graph for the current view.
 *
 * @param array $graph Graph nodes.
 * @param bool  $own   Whether this is the theme's own graph.
 * @return array
 */
function abr_schema_extend( $graph, $own = true ) {
	$ext = abr_schema_build( abr_schema_context() );
	if ( $own && 'CollectionPage' === $ext['page_type'] ) {
		$ext['page_type'] = '';
	}
	return abr_schema_one_author( abr_schema_image_details( abr_schema_merge( $graph, $ext, $own, is_singular( 'post' ) ) ) );
}

/**
 * The @id of the author Person.
 *
 * @return string
 */
function abr_schema_author_id() {
	return home_url( '/#author' );
}

/**
 * The author Person. The owner decided on 2026-11-04 that the JSON-LD alone
 * names him as the author of every article: Mohd Elfie Nieshaem Juferi, at
 * https://menj.bio. Nowhere else names him (docs/ssot.md, Anonymity).
 *
 * @return array
 */
function abr_schema_author_node() {
	return array(
		'@type'  => 'Person',
		'@id'    => abr_schema_author_id(),
		'name'   => 'Mohd Elfie Nieshaem Juferi',
		'url'    => 'https://menj.bio',
		'sameAs' => array( 'https://menj.bio' ),
	);
}

/**
 * One author across the graph, the theme's own or Rank Math's.
 *
 * Every author value, at any depth, points to the author Person; every
 * Article and page node without one gets the reference; any other Person an
 * author pointed to is dropped and references to it are repointed; and the
 * Person is added once. The publisher stays the site's Organization. Keys
 * are kept, so Rank Math's keyed graph stays keyed.
 *
 * @param array $graph Graph nodes.
 * @return array
 */
function abr_schema_one_author( $graph ) {
	if ( ! is_array( $graph ) || ! $graph ) {
		return $graph;
	}
	$id   = abr_schema_author_id();
	$list = array_values( $graph ) === $graph;
	$old  = array();
	$find = function ( $n ) use ( &$find, &$old, $id ) {
		if ( ! is_array( $n ) ) {
			return;
		}
		foreach ( $n as $k => $v ) {
			if ( 'author' === $k && is_array( $v ) && ! empty( $v['@id'] ) && $id !== $v['@id'] && home_url( '/#organization' ) !== $v['@id'] && ( ! isset( $v['@type'] ) || in_array( 'Person', (array) $v['@type'], true ) ) ) {
				$old[ (string) $v['@id'] ] = true;
			}
			if ( is_array( $v ) ) {
				$find( $v );
			}
		}
	};
	$find( $graph );
	$walk = function ( $n ) use ( &$walk, $old, $id ) {
		if ( ! is_array( $n ) ) {
			return $n;
		}
		if ( 1 === count( $n ) && isset( $n['@id'] ) && isset( $old[ (string) $n['@id'] ] ) ) {
			return array( '@id' => $id );
		}
		foreach ( $n as $k => $v ) {
			if ( 'author' === $k && is_array( $v ) ) {
				$n[ $k ] = array( '@id' => $id );
			} elseif ( is_array( $v ) ) {
				$n[ $k ] = $walk( $v );
			}
		}
		return $n;
	};
	$types = array( 'Article', 'BlogPosting', 'NewsArticle', 'WebPage', 'AboutPage', 'CollectionPage', 'ContactPage', 'FAQPage', 'ItemPage', 'SearchResultsPage', 'QAPage' );
	$out   = array();
	$have  = null;
	foreach ( $graph as $key => $node ) {
		if ( ! is_array( $node ) ) {
			$out[ $key ] = $node;
			continue;
		}
		$node_types = (array) ( isset( $node['@type'] ) ? $node['@type'] : array() );
		if ( ! empty( $node['@id'] ) && isset( $old[ (string) $node['@id'] ] ) && in_array( 'Person', $node_types, true ) ) {
			continue;
		}
		if ( isset( $node['@id'] ) && $id === $node['@id'] ) {
			$have = $key;
		} else {
			$node = $walk( $node );
			if ( array_intersect( $node_types, $types ) && empty( $node['author'] ) ) {
				$node['author'] = array( '@id' => $id );
			}
		}
		$out[ $key ] = $node;
	}
	if ( null === $have ) {
		if ( $list ) {
			$out[] = abr_schema_author_node();
		} else {
			$out['abrAuthor'] = abr_schema_author_node();
		}
	} else {
		$out[ $have ] = array_merge( $out[ $have ], abr_schema_author_node() );
	}
	return $list ? array_values( $out ) : $out;
}
