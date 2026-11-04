<?php
/**
 * Self-test for inc/schema.php. Run: php tests/schema-graph-test.php
 *
 * Builds the structured data graph for every seed item, the home page, an
 * archive and a search page, as the theme prints it and as it merges into a
 * Rank Math graph. Checks that each graph encodes as JSON, that every @id is
 * unique, that every reference points to a node in the same graph, and that
 * each node carries the properties its type needs. Exit code 0 when all pass.
 *
 * @package Abrahamic
 */

define( 'ABSPATH', __DIR__ . '/' );
require dirname( __DIR__ ) . '/inc/schema.php';

$root     = dirname( __DIR__ );
$home     = 'https://example.org/';
$fail     = 0;
$checked  = 0;
$seed     = json_decode( (string) file_get_contents( $root . '/inc/seed/content.json' ), true );
$entities = json_decode( (string) file_get_contents( $root . '/inc/data/schema-entities.json' ), true );
if ( ! is_array( $seed ) || ! is_array( $entities ) || ! isset( $entities['entities'] ) ) {
	echo "FAILED: seed content or inc/data/schema-entities.json does not parse\n";
	exit( 1 );
}

/**
 * Record a failure.
 *
 * @param string $where Page.
 * @param string $what  Problem.
 */
function abr_test_fail( $where, $what ) {
	global $fail;
	++$fail;
	echo "FAIL {$where}: {$what}\n";
}

$header_nav = array();
if ( preg_match_all( '#<!-- wp:navigation-link (\{.*?\}) /-->#', (string) file_get_contents( $root . '/parts/header.html' ), $m ) ) {
	foreach ( $m[1] as $json ) {
		$a            = json_decode( $json, true );
		$header_nav[] = array(
			'name' => $a['label'],
			'url'  => rtrim( $home, '/' ) . $a['url'],
		);
	}
}
// The pattern prints an icon and a link; stand-ins are enough to read its eras.
function abr_icon( $name ) {
	return '';
}
function abr_link( $target, $fallback = '/' ) {
	return $fallback;
}
function esc_url( $url ) {
	return $url;
}
ob_start();
include $root . '/patterns/timeline.php';
$timeline_html = (string) ob_get_clean();

/**
 * The theme's base graph (inc/seo.php) in outline.
 *
 * @param array $ctx Context.
 * @return array
 */
function abr_test_base( $ctx ) {
	$home  = $ctx['home'];
	$graph = array(
		array( '@type' => 'Organization', '@id' => $home . '#organization', 'name' => 'Abrahamic Religions', 'url' => $home ),
		array( '@type' => 'WebSite', '@id' => $home . '#website', 'url' => $home, 'name' => 'Abrahamic Religions', 'publisher' => array( '@id' => $home . '#organization' ) ),
	);
	if ( '' === $ctx['url'] ) {
		return $graph;
	}
	if ( 'post' === $ctx['kind'] ) {
		$graph[] = array( '@type' => 'Article', '@id' => $ctx['url'] . '#article', 'headline' => isset( $ctx['title'] ) ? $ctx['title'] : '', 'mainEntityOfPage' => array( '@id' => $ctx['url'] . '#webpage' ), 'author' => array( '@id' => $home . '#organization' ) );
	}
	$graph[] = array( '@type' => 'archive' === $ctx['kind'] ? 'CollectionPage' : 'WebPage', '@id' => $ctx['url'] . '#webpage', 'url' => $ctx['url'], 'name' => isset( $ctx['title'] ) ? $ctx['title'] : 'Archive', 'isPartOf' => array( '@id' => $home . '#website' ) );
	return $graph;
}

/**
 * Check one graph.
 *
 * @param string $where Page.
 * @param array  $graph Graph.
 * @return array Nodes by @id.
 */
function abr_test_graph( $where, $graph ) {
	global $checked;
	++$checked;
	$json = json_encode( array( '@context' => 'https://schema.org', '@graph' => array_values( $graph ) ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
	if ( false === $json || ! is_array( json_decode( $json, true ) ) ) {
		abr_test_fail( $where, 'graph does not encode as JSON: ' . json_last_error_msg() );
		return array();
	}
	$ids  = array();
	$refs = array();
	$walk = static function ( $value, $top ) use ( &$walk, &$ids, &$refs, $where ) {
		if ( ! is_array( $value ) ) {
			return;
		}
		if ( isset( $value['@id'] ) ) {
			if ( 1 === count( $value ) ) {
				$refs[] = $value['@id'];
				return;
			}
			if ( isset( $ids[ $value['@id'] ] ) ) {
				abr_test_fail( $where, 'duplicate @id ' . $value['@id'] );
			}
			$ids[ $value['@id'] ] = $value;
		}
		if ( isset( $value['@type'] ) ) {
			abr_test_required( $where, $value );
		}
		foreach ( $value as $child ) {
			$walk( $child, false );
		}
	};
	foreach ( $graph as $node ) {
		if ( ! isset( $node['@type'] ) ) {
			abr_test_fail( $where, 'top-level node without @type' );
		}
		$walk( $node, true );
	}
	foreach ( array_unique( $refs ) as $ref ) {
		if ( ! isset( $ids[ $ref ] ) ) {
			abr_test_fail( $where, 'reference to a missing node ' . $ref );
		}
	}
	return $ids;
}

/**
 * Required properties by type.
 *
 * @param string $where Page.
 * @param array  $node  Node.
 */
function abr_test_required( $where, $node ) {
	$need = array(
		'Quotation'             => array( 'text', 'inLanguage', 'isPartOf' ),
		'Chapter'               => array( 'name', 'position', 'isPartOf' ),
		'Book'                  => array( 'name', 'genre' ),
		'Event'                 => array( 'name' ),
		'DefinedTerm'           => array( 'name', 'description', 'inDefinedTermSet' ),
		'DefinedTermSet'        => array( 'name', 'hasDefinedTerm' ),
		'ImageObject'           => array( 'creator' ),
		'ListItem'              => array( 'position' ),
		'ItemList'              => array( 'itemListElement' ),
		'PropertyValue'         => array( 'name', 'value' ),
		'SearchAction'          => array( 'target' ),
		'SiteNavigationElement' => array( 'name' ),
		'SearchResultsPage'     => array( 'url', 'isPartOf' ),
		'Person'                => array( 'name' ),
		'Place'                 => array( 'name' ),
	);
	foreach ( (array) $node['@type'] as $type ) {
		foreach ( isset( $need[ $type ] ) ? $need[ $type ] : array() as $prop ) {
			if ( ! isset( $node[ $prop ] ) || '' === $node[ $prop ] || array() === $node[ $prop ] ) {
				abr_test_fail( $where, $type . ' ' . ( isset( $node['@id'] ) ? $node['@id'] . ' ' : '' ) . 'lacks ' . $prop );
			}
		}
		if ( 'Event' === $type && isset( $node['startDate'] ) && ! preg_match( '/^\d{4}$/', $node['startDate'] ) ) {
			abr_test_fail( $where, 'Event startDate is not an ISO 8601 year: ' . $node['startDate'] );
		}
		if ( 'ListItem' === $type && ! isset( $node['item'] ) && ! isset( $node['url'] ) ) {
			abr_test_fail( $where, 'ListItem without item or url' );
		}
	}
}

/**
 * Count nodes of a type.
 *
 * @param array  $ids  Nodes by @id.
 * @param string $type Type.
 * @return int
 */
function abr_test_count( $ids, $type ) {
	$n = 0;
	foreach ( $ids as $node ) {
		$n += in_array( $type, (array) $node['@type'], true ) ? 1 : 0;
	}
	return $n;
}

$common = array(
	'home'        => $home,
	'language'    => 'en-GB',
	'site_name'   => 'Abrahamic Religions',
	'copyright'   => '© 2026 Abrahamic Religions. All rights reserved.',
	'copyright_template' => '© {year} Abrahamic Religions. All rights reserved.',
	'header_nav'  => $header_nav,
	'footer_navs' => array( array( 'name' => 'Explore', 'items' => array( array( 'name' => 'Glossary', 'url' => $home . 'glossary/' ) ) ) ),
	'entities'    => $entities['entities'],
	'search'      => $home . '?s={search_term_string}',
);

$totals = array();
foreach ( $seed['items'] as $item ) {
	$front = 'page:home' === $item['key'];
	$ctx   = array_merge(
		$common,
		array(
			'url'           => $home . ( $front ? '' : $item['slug'] . '/' ),
			'kind'          => $front ? 'front' : ( 'post' === $item['type'] ? 'post' : 'page' ),
			'title'         => $item['title'],
			'content'       => $item['content'],
			'excerpt'       => isset( $item['excerpt'] ) ? $item['excerpt'] : '',
			'tags'          => array( 'abraham' ),
			'year'          => '2024',
			'reading'       => 7,
			'is_glossary'   => 'page:glossary' === $item['key'],
			'is_timeline'   => 'page:timeline' === $item['key'],
			'timeline_html' => $front ? $timeline_html : '',
		)
	);
	$ext   = abr_schema_build( $ctx );
	$graph = abr_schema_merge( abr_test_base( $ctx ), $ext, true, 'post' === $ctx['kind'] );
	$ids   = abr_test_graph( $item['key'], $graph );
	foreach ( array( 'Quotation', 'Chapter', 'Event', 'DefinedTerm', 'Table', 'ImageObject', 'PropertyValue' ) as $type ) {
		$totals[ $type ] = ( isset( $totals[ $type ] ) ? $totals[ $type ] : 0 ) + abr_test_count( $ids, $type );
	}
	foreach ( $graph as $node ) {
		if ( isset( $node['copyrightYear'], $node['copyrightNotice'] ) && false === strpos( $node['copyrightNotice'], (string) $node['copyrightYear'] ) ) {
			abr_test_fail( $item['key'], 'copyrightNotice "' . $node['copyrightNotice'] . '" does not state copyrightYear ' . $node['copyrightYear'] );
		}
		if ( isset( $node['additionalProperty'] ) ) {
			$totals['PropertyValue'] = ( isset( $totals['PropertyValue'] ) ? $totals['PropertyValue'] : 0 ) + 1;
		}
	}
	if ( 'post' === $ctx['kind'] && ( ! isset( $ids[ $ctx['url'] . '#article' ]['wordCount'] ) || array( 'Article', 'BlogPosting' ) !== (array) $ids[ $ctx['url'] . '#article' ]['@type'] ) ) {
		abr_test_fail( $item['key'], 'article lacks BlogPosting or wordCount' );
	}
	if ( 'page:glossary' === $item['key'] && abr_test_count( $ids, 'DefinedTerm' ) < 10 ) {
		abr_test_fail( $item['key'], 'glossary has fewer than ten DefinedTerm nodes' );
	}
	if ( 'page:timeline' === $item['key'] && 9 !== abr_test_count( $ids, 'Event' ) ) {
		abr_test_fail( $item['key'], 'timeline should give nine Event nodes, gave ' . abr_test_count( $ids, 'Event' ) );
	}
	if ( $front && abr_test_count( $ids, 'Event' ) < 5 ) {
		abr_test_fail( $item['key'], 'home page timeline gave too few Event nodes' );
	}
	foreach ( $ids as $id => $node ) {
		// hasPart takes a CreativeWork; an ItemList is not one.
		foreach ( isset( $node['hasPart'] ) ? (array) $node['hasPart'] : array() as $part ) {
			$part_type = isset( $part['@id'], $ids[ $part['@id'] ]['@type'] ) ? $ids[ $part['@id'] ]['@type'] : ( isset( $part['@type'] ) ? $part['@type'] : '' );
			if ( in_array( 'ItemList', (array) $part_type, true ) ) {
				abr_test_fail( $item['key'], $id . ' has an ItemList as hasPart' );
			}
		}
		// schema.org Date has no years before 1 CE.
		if ( 'Event' === $node['@type'] ) {
			foreach ( array( 'startDate', 'endDate' ) as $prop ) {
				if ( isset( $node[ $prop ] ) && ! preg_match( '/^\d{4}$/', $node[ $prop ] ) || isset( $node[ $prop ] ) && '0000' === $node[ $prop ] ) {
					abr_test_fail( $item['key'], $id . ' ' . $prop . ' "' . $node[ $prop ] . '" is not a CE year' );
				}
			}
			// Each Event's name carries the period as the page prints it (the
			// heading, or the era with its kicker): a CE period must have its
			// startDate, a BCE one none, and its description opens with the range
			// exactly as printed.
			$range = null;
			if ( false === strpos( $id, '#period-' ) ) {
				continue;
			}
			if ( ! abr_schema_period( $node['name'], $range ) ) {
				abr_test_fail( $item['key'], $id . ' name "' . $node['name'] . '" carries no period' );
			} elseif ( false === strpos( $range, 'BCE' ) ) {
				if ( ! isset( $node['startDate'] ) ) {
					abr_test_fail( $item['key'], $id . ' is a CE period (' . $range . ') without startDate' );
				}
			} elseif ( isset( $node['startDate'] ) || isset( $node['endDate'] ) ) {
				abr_test_fail( $item['key'], $id . ' is a BCE period (' . $range . ') with a startDate or endDate' );
			} elseif ( empty( $node['description'] ) || 0 !== strpos( $node['description'], $range . '.' ) || false === strpos( $node['name'], $range ) ) {
				abr_test_fail( $item['key'], $id . ' description does not open with the range as printed, "' . $range . '"' );
			}
		}
	}
	if ( $front || 'page:timeline' === $item['key'] ) {
		$linked = false;
		foreach ( $graph as $node ) {
			foreach ( array( 'about', 'mainEntity' ) as $prop ) {
				foreach ( isset( $node[ $prop ] ) ? ( isset( $node[ $prop ]['@id'] ) ? array( $node[ $prop ] ) : (array) $node[ $prop ] ) : array() as $ref ) {
					if ( isset( $ref['@id'] ) && $ctx['url'] . '#timeline-list' === $ref['@id'] ) {
						$linked = true;
					}
				}
			}
		}
		if ( ! $linked ) {
			abr_test_fail( $item['key'], 'the timeline ItemList is linked by neither about nor mainEntity' );
		}
	}
	if ( 'post:hira-and-quba' === $item['key'] ) {
		$grade = isset( $ids[ $ctx['url'] . '#hadith-jami-al-tirmidhi-324' ]['additionalProperty']['value'] ) ? $ids[ $ctx['url'] . '#hadith-jami-al-tirmidhi-324' ]['additionalProperty']['value'] : '';
		if ( 'ḥasan' !== $grade ) {
			abr_test_fail( $item['key'], 'Jāmiʿ al-Tirmidhī 324 should carry the grading the note prints (ḥasan), got "' . $grade . '"' );
		}
		if ( ! isset( $ids[ $ctx['url'] . '#hadith-sunan-ibn-majah-1412' ] ) || isset( $ids[ $ctx['url'] . '#hadith-sunan-ibn-majah-1412' ]['additionalProperty'] ) ) {
			abr_test_fail( $item['key'], 'Sunan Ibn Mājah 1412 should be cited with no grading' );
		}
	}
	foreach ( $ids as $id => $node ) {
		if ( 'Quotation' === $node['@type'] && 'en' === $node['inLanguage'] && empty( $node['translationOfWork'] ) ) {
			abr_test_fail( $item['key'], 'English quotation without the Arabic it translates: ' . $id );
		}
	}

	// The same page under Rank Math: its keyed graph, extended in place.
	$rank_math = array(
		'publisher' => array( '@type' => 'Organization', '@id' => $home . '#organization', 'name' => 'Abrahamic Religions' ),
		'WebSite'   => array( '@type' => 'WebSite', '@id' => $home . '#website', 'url' => $home ),
		'WebPage'   => array( '@type' => 'WebPage', '@id' => $ctx['url'] . '#webpage', 'url' => $ctx['url'], 'inLanguage' => 'en-GB' ),
		'richSnippet' => array( '@type' => 'BlogPosting', '@id' => $ctx['url'] . '#richSnippet', 'headline' => $item['title'] ),
	);
	$merged = abr_schema_merge( $rank_math, $ext, false, 'post' === $ctx['kind'] );
	if ( array_key_exists( 0, $merged ) ) {
		abr_test_fail( $item['key'], 'Rank Math graph lost its keys' );
	}
	abr_test_graph( $item['key'] . ' (Rank Math)', $merged );
	if ( 'en-GB' !== $merged['WebPage']['inLanguage'] || 'BlogPosting' !== $merged['richSnippet']['@type'] ) {
		abr_test_fail( $item['key'], 'Rank Math values were overwritten' );
	}
}

// Archive, search and a duplicate node.
$ctx = array_merge(
	$common,
	array(
		'url'  => $home . 'tag/abraham/',
		'kind' => 'archive',
		'list' => array( array( 'name' => 'Where was Abraham from?', 'url' => $home . 'where-was-abraham-from/' ) ),
	)
);
$ids = abr_test_graph( 'tag archive', abr_schema_merge( abr_test_base( $ctx ), abr_schema_build( $ctx ) ) );
if ( ! isset( $ids[ $ctx['url'] . '#webpage' ]['mainEntity'] ) || 'CollectionPage' !== $ids[ $ctx['url'] . '#webpage' ]['@type'] ) {
	abr_test_fail( 'tag archive', 'CollectionPage lacks its ItemList' );
}
$ctx = array_merge( $common, array( 'url' => '', 'kind' => 'search', 'title' => 'Search', 'search_url' => $home . 'search/abraham/' ) );
$ids = abr_test_graph( 'search', abr_schema_merge( abr_test_base( $ctx ), abr_schema_build( $ctx ) ) );
if ( 1 !== abr_test_count( $ids, 'SearchResultsPage' ) || empty( $ids[ $home . '#website' ]['potentialAction'] ) ) {
	abr_test_fail( 'search', 'no SearchResultsPage or SearchAction' );
}
$deduped = abr_schema_dedupe(
	array(
		array( '@type' => 'Thing', '@id' => 'x', 'name' => 'A' ),
		array( '@type' => 'Thing', '@id' => 'x', 'name' => 'B', 'url' => 'u' ),
	)
);
if ( 1 !== count( $deduped ) || 'A' !== $deduped[0]['name'] || 'u' !== $deduped[0]['url'] ) {
	abr_test_fail( 'dedupe', 'nodes sharing an @id were not merged' );
}

// Rank Math prints isAccessibleForFree as "1"; the merge must hand back booleans.
$rm_bool = abr_schema_fix_booleans(
	array(
		'WebPage'     => array( '@type' => 'WebPage', '@id' => 'p#webpage', 'isAccessibleForFree' => '1', 'inLanguage' => 'en-GB' ),
		'richSnippet' => array(
			'@type'               => 'BlogPosting',
			'@id'                 => 'p#richSnippet',
			'isAccessibleForFree' => '1',
			'wordCount'           => '1200',
			'hasPart'             => array( array( '@type' => 'WebPageElement', 'isAccessibleForFree' => 'no' ) ),
		),
		'Other'       => array( 'a' => array( 'isAccessibleForFree' => 1 ), 'b' => array( 'isAccessibleForFree' => '' ), 'c' => array( 'isAccessibleForFree' => 'TRUE' ), 'd' => array( 'isAccessibleForFree' => 0 ), 'e' => array( 'isAccessibleForFree' => 'false' ) ),
	)
);
if ( true !== $rm_bool['WebPage']['isAccessibleForFree'] || true !== $rm_bool['richSnippet']['isAccessibleForFree'] || false !== $rm_bool['richSnippet']['hasPart'][0]['isAccessibleForFree'] ) {
	abr_test_fail( 'Rank Math booleans', 'isAccessibleForFree was not cast to a boolean on WebPage, BlogPosting or a nested part' );
}
if ( true !== $rm_bool['Other']['a']['isAccessibleForFree'] || false !== $rm_bool['Other']['b']['isAccessibleForFree'] || true !== $rm_bool['Other']['c']['isAccessibleForFree'] || false !== $rm_bool['Other']['d']['isAccessibleForFree'] || false !== $rm_bool['Other']['e']['isAccessibleForFree'] ) {
	abr_test_fail( 'Rank Math booleans', 'one of 1, "", "TRUE", 0 or "false" was cast wrongly' );
}
if ( '1200' !== $rm_bool['richSnippet']['wordCount'] || 'en-GB' !== $rm_bool['WebPage']['inLanguage'] ) {
	abr_test_fail( 'Rank Math booleans', 'a value other than isAccessibleForFree changed' );
}
if ( false === strpos( (string) json_encode( $rm_bool ), '"isAccessibleForFree":true' ) ) {
	abr_test_fail( 'Rank Math booleans', 'JSON does not print isAccessibleForFree as true' );
}

// Rank Math prints its graph through wp_kses_post_deep(), so true reaches the
// page as "1"; the printed script is fixed after the fact.
$printed = '<script type="application/ld+json" class="rank-math-schema">{"@graph":[{"@type":"WebPage","isAccessibleForFree":"1","position":"1"},{"@type":"Article", "isAccessibleForFree" : "0"},{"@type":"WebPageElement","isAccessibleForFree":""},{"name":"isAccessibleForFree"},{"@type":"Thing","description":"say \\"isAccessibleForFree\\":\\"1\\" here","alternateName":"x,\\"isAccessibleForFree\\":\\"1\\"}"},{"@type":"Thing","isAccessibleForFree":"yes"}]}</script>';
$other   = '<script>var c = {"isAccessibleForFree":"1"};</script><p>{"isAccessibleForFree":"1"}</p>';
$fixed   = abr_schema_fix_printed_booleans( $other . $printed );
if ( 0 !== strpos( $fixed, $other ) ) {
	abr_test_fail( 'Rank Math printed booleans', 'text outside the ld+json script changed: ' . $fixed );
}
$decoded = json_decode( (string) preg_replace( '#^<script[^>]*>|</script>$#', '', substr( $fixed, strlen( $other ) ) ), true );
if ( ! is_array( $decoded ) || true !== $decoded['@graph'][0]['isAccessibleForFree'] || false !== $decoded['@graph'][1]['isAccessibleForFree'] || false !== $decoded['@graph'][2]['isAccessibleForFree'] ) {
	abr_test_fail( 'Rank Math printed booleans', 'isAccessibleForFree is not a boolean in the printed script: ' . $fixed );
}
if ( is_array( $decoded ) && ( '1' !== $decoded['@graph'][0]['position'] || 'isAccessibleForFree' !== $decoded['@graph'][3]['name'] || 'say "isAccessibleForFree":"1" here' !== $decoded['@graph'][4]['description'] || 'x,"isAccessibleForFree":"1"}' !== $decoded['@graph'][4]['alternateName'] || 'yes' !== $decoded['@graph'][5]['isAccessibleForFree'] ) ) {
	abr_test_fail( 'Rank Math printed booleans', 'a value other than the exact isAccessibleForFree tokens changed: ' . $fixed );
}
if ( 'abc' !== abr_schema_fix_printed_booleans( 'abc' ) ) {
	abr_test_fail( 'Rank Math printed booleans', 'markup without the property changed' );
}

foreach ( array( 'Quotation', 'Chapter', 'Event', 'DefinedTerm', 'Table', 'ImageObject' ) as $type ) {
	if ( empty( $totals[ $type ] ) ) {
		abr_test_fail( 'seed', 'no ' . $type . ' nodes across the seed content' );
	}
}
echo 'Graphs checked: ' . $checked . '. Nodes: ' . implode( ', ', array_map( static function ( $k, $v ) { return $k . ' ' . $v; }, array_keys( $totals ), $totals ) ) . "\n";
if ( $fail ) {
	echo "FAILED: $fail\n";
	exit( 1 );
}
echo "OK\n";
exit( 0 );
