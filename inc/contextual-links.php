<?php
/**
 * Contextual links: in the running text of a single post or page, the first
 * mention of a known phrase links to the inner page that treats it, on this
 * site or on one of the six sister sites. No lists, boxes or widgets.
 *
 * The phrases come from inc/data/network-links.json, a file shared byte for
 * byte by all seven themes, plus the extra lines on Theme Options >
 * Contextual links. Links are made as the content renders; stored content is
 * never changed.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

define( 'ABR_CTX_SITE', 'abrahamic' );

/**
 * Lower-case, multibyte where available.
 *
 * @param string $text Text.
 * @return string
 */
function abr_ctx_lower( $text ) {
	return function_exists( 'mb_strtolower' ) ? mb_strtolower( $text, 'UTF-8' ) : strtolower( $text );
}

/**
 * Lines of a saved textarea. Split byte-wise (no /u), so a stray invalid byte
 * cannot make the split fail and lose every line.
 *
 * @param string $text Textarea value.
 * @return string[]
 */
function abr_ctx_lines( $text ) {
	return (array) preg_split( '/\r\n|\r|\n/', (string) $text );
}

/**
 * Lower-case host of an address, without "www.".
 *
 * @param string $url Address.
 * @return string
 */
function abr_ctx_host( $url ) {
	return (string) preg_replace( '/^www\./', '', abr_ctx_lower( (string) wp_parse_url( $url, PHP_URL_HOST ) ) );
}

/**
 * Comparable key for an address: host and path, lower case, no trailing
 * slash, no query or fragment. Relative addresses are on this site.
 *
 * @param string $url Address.
 * @return string
 */
function abr_ctx_url_key( $url ) {
	$parts = wp_parse_url( html_entity_decode( (string) $url, ENT_QUOTES ) );
	if ( ! is_array( $parts ) ) {
		return '';
	}
	if ( empty( $parts['host'] ) ) {
		if ( empty( $parts['path'] ) || '/' !== $parts['path'][0] ) {
			return '';
		}
		$parts['host'] = (string) wp_parse_url( home_url(), PHP_URL_HOST );
	}
	$path = isset( $parts['path'] ) ? rtrim( $parts['path'], '/' ) : '';
	return abr_ctx_lower( preg_replace( '/^www\./i', '', $parts['host'] ) . $path );
}

/**
 * Sister-site bases from the shared map, keyed by site key.
 *
 * @return array
 */
function abr_ctx_network() {
	static $network = null;
	if ( null === $network ) {
		$file    = ABR_DIR . '/inc/data/network-links.json';
		$data    = is_readable( $file ) ? json_decode( (string) file_get_contents( $file ), true ) : null; // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- local theme file.
		$network = is_array( $data ) ? $data : array();
	}
	return $network;
}

/**
 * Every phrase and its target, admin lines first so they win.
 *
 * @return array<int,array{phrase:string,url:string,sister:bool}>
 */
function abr_ctx_entries() {
	$network = abr_ctx_network();
	$sites   = isset( $network['sites'] ) && is_array( $network['sites'] ) ? $network['sites'] : array();
	$hosts   = array();
	foreach ( $sites as $key => $base ) {
		if ( ABR_CTX_SITE !== $key ) {
			$host = abr_ctx_host( $base );
			if ( $host ) {
				$hosts[ $host ] = true;
			}
		}
	}
	$own_host = abr_ctx_host( home_url() );
	$entries  = array();

	foreach ( abr_ctx_lines( abr_get_option( 'ctx_extra' ) ) as $line ) {
		$parts = array_map( 'trim', explode( '|', $line, 2 ) );
		if ( count( $parts ) < 2 || '' === $parts[0] || '' === $parts[1] ) {
			continue;
		}
		if ( '/' === $parts[1][0] && '/' !== substr( $parts[1], 0, 2 ) ) {
			$entries[] = array( 'phrase' => $parts[0], 'url' => home_url( $parts[1] ), 'sister' => false );
			continue;
		}
		if ( ! preg_match( '#^https?://#i', $parts[1] ) ) {
			continue;
		}
		$host = abr_ctx_host( $parts[1] );
		if ( isset( $hosts[ $host ] ) ) {
			$entries[] = array( 'phrase' => $parts[0], 'url' => $parts[1], 'sister' => true );
		} elseif ( $host && $host === $own_host ) {
			$entries[] = array( 'phrase' => $parts[0], 'url' => $parts[1], 'sister' => false );
		}
	}

	if ( isset( $network['links'] ) && is_array( $network['links'] ) ) {
		foreach ( $network['links'] as $link ) {
			if ( empty( $link['site'] ) || empty( $link['path'] ) || empty( $link['phrases'] ) || ! isset( $sites[ $link['site'] ] ) ) {
				continue;
			}
			$own = ABR_CTX_SITE === $link['site'];
			$url = $own ? home_url( $link['path'] ) : rtrim( $sites[ $link['site'] ], '/' ) . $link['path'];
			foreach ( (array) $link['phrases'] as $phrase ) {
				$entries[] = array( 'phrase' => (string) $phrase, 'url' => $url, 'sister' => ! $own );
			}
		}
	}

	return (array) apply_filters( 'abr_contextual_links_map', $entries );
}

/**
 * The compiled map: phrase (lower-cased, straight apostrophe) => target, each
 * phrase's own pattern, and the longest-first patterns of every phrase. One
 * pattern is used while it compiles; a map grown past PCRE's size limit by
 * extra lines is split into chunks that do.
 *
 * @return array{lookup:array,alts:array,patterns:string[]}
 */
function abr_ctx_compiled() {
	static $compiled = null;
	if ( null !== $compiled ) {
		return $compiled;
	}
	$lookup = array();
	foreach ( abr_ctx_entries() as $entry ) {
		if ( empty( $entry['phrase'] ) || empty( $entry['url'] ) ) {
			continue;
		}
		$key = abr_ctx_norm( $entry['phrase'] );
		if ( ! isset( $lookup[ $key ] ) ) {
			$lookup[ $key ] = array( 'url' => $entry['url'], 'sister' => ! empty( $entry['sister'] ) );
		}
	}
	$phrases = array_keys( $lookup );
	usort(
		$phrases,
		static function ( $a, $b ) {
			return strlen( $b ) <=> strlen( $a );
		}
	);
	$alts = array();
	foreach ( $phrases as $phrase ) {
		// wptexturize turns ' into &#8217; before this runs, and editors write
		// non-breaking spaces; match every form of both.
		$alts[ $phrase ] = str_replace(
			array( "'", ' ' ),
			array( "(?:'|\x{2019}|\x{2018}|\x{02BC}|&\#8217;|&\#8216;|&\#0?39;|&rsquo;|&lsquo;|&apos;)", '(?:\s|&nbsp;|&\#160;|\x{00A0})+' ),
			preg_quote( $phrase, '/' )
		);
	}
	$compiled = array(
		'lookup'   => $lookup,
		'alts'     => $alts,
		'patterns' => abr_ctx_patterns( array_values( $alts ) ),
	);
	return $compiled;
}

/**
 * Patterns that compile, covering the alternatives in order (longest first).
 * A chunk that fails to compile is halved; a single phrase that cannot
 * compile on its own is dropped.
 *
 * @param string[] $alts Escaped alternatives.
 * @return string[]
 */
function abr_ctx_patterns( $alts ) {
	if ( ! $alts ) {
		return array();
	}
	$pattern = '/(?<![\p{L}\p{N}])(?:' . implode( '|', $alts ) . ')(?![\p{L}\p{N}])/iu';
	if ( false !== @preg_match( $pattern, '' ) ) { // phpcs:ignore WordPress.PHP.NoSilencedErrors -- a failed compile is handled here.
		return array( $pattern );
	}
	if ( 1 === count( $alts ) ) {
		return array();
	}
	$half = (int) ceil( count( $alts ) / 2 );
	return array_merge( abr_ctx_patterns( array_slice( $alts, 0, $half ) ), abr_ctx_patterns( array_slice( $alts, $half ) ) );
}

/**
 * The lookup key a matched piece of text belongs to, or '' if none. Without
 * mbstring only ASCII letters are lowered, so a match in non-ASCII capitals
 * is tried against each phrase's own pattern.
 *
 * @param array  $map  Compiled map.
 * @param string $text Matched text.
 * @return string
 */
function abr_ctx_key( $map, $text ) {
	$key = abr_ctx_norm( $text );
	if ( isset( $map['lookup'][ $key ] ) ) {
		return $key;
	}
	foreach ( $map['alts'] as $phrase => $alt ) {
		if ( preg_match( '/^(?:' . $alt . ')$/iu', $text ) ) {
			return (string) $phrase;
		}
	}
	return '';
}

/**
 * The first phrase match at or after a byte offset, the longest where several
 * start there: [ byte offset, text ]. Null when there is none, false when the
 * text cannot be matched (invalid UTF-8). The scan is resumed by the caller,
 * so a match it passes over (a target already linked) never hides a phrase
 * that overlaps it, and matches from several chunks never shadow each other.
 *
 * @param string[] $patterns Patterns.
 * @param string   $text     Plain text.
 * @param int      $from     Byte offset, on a character boundary.
 * @return array|null|false
 */
function abr_ctx_next( $patterns, $text, $from ) {
	$best = null;
	foreach ( $patterns as $pattern ) {
		$n = preg_match( $pattern, $text, $m, PREG_OFFSET_CAPTURE, $from );
		if ( false === $n ) {
			return false;
		}
		if ( $n && ( null === $best || $m[0][1] < $best[0] || ( $m[0][1] === $best[0] && strlen( $m[0][0] ) > strlen( $best[1] ) ) ) ) {
			$best = array( $m[0][1], $m[0][0] );
		}
	}
	return $best;
}

/**
 * Byte length of the UTF-8 character that starts at an offset.
 *
 * @param string $text   Text.
 * @param int    $offset Byte offset.
 * @return int
 */
function abr_ctx_char_len( $text, $offset ) {
	$byte = ord( $text[ $offset ] );
	return $byte >= 0xF0 ? 4 : ( $byte >= 0xE0 ? 3 : ( $byte >= 0xC0 ? 2 : 1 ) );
}

/**
 * A phrase or matched text as a lookup key: lower case, straight apostrophes,
 * and every run of spaces (non-breaking ones included) as one space.
 *
 * @param string $text Text.
 * @return string
 */
function abr_ctx_norm( $text ) {
	$text = str_replace( array( '&nbsp;', '&#160;', "\u{00A0}" ), ' ', abr_ctx_plain_apostrophes( $text ) );
	return abr_ctx_lower( trim( (string) preg_replace( '/\s+/', ' ', $text ) ) );
}

/**
 * Curly and encoded apostrophes as a straight one.
 *
 * @param string $text Text.
 * @return string
 */
function abr_ctx_plain_apostrophes( $text ) {
	return str_replace( array( "\u{2019}", "\u{2018}", "\u{02BC}", '&#8217;', '&#8216;', '&#039;', '&#39;', '&rsquo;', '&lsquo;', '&apos;' ), "'", $text );
}

/**
 * Whether this request's main content gets links.
 *
 * @return bool
 */
function abr_ctx_applies() {
	if ( is_admin() || is_feed() || ! is_singular() || ! is_main_query() || is_front_page() || doing_filter( 'get_the_excerpt' ) ) {
		return false;
	}
	$post = get_post();
	// The queried entry only: never a post rendered inside another one.
	if ( ! $post || (int) $post->ID !== (int) get_queried_object_id() ) {
		return false;
	}
	$excluded = array_filter( array_map( 'sanitize_title', abr_ctx_lines( abr_get_option( 'ctx_exclude' ) ) ) );
	$enabled  = ! in_array( $post->post_name, $excluded, true );
	return (bool) apply_filters( 'abr_contextual_links_enabled', $enabled, $post );
}

/**
 * Link the first mention of each known phrase.
 *
 * @param string $content Rendered content.
 * @return string
 */
function abr_ctx_filter( $content ) {
	if ( false === strpos( $content, '<' ) || ! abr_ctx_applies() ) {
		return $content;
	}
	$caps = array(
		'own'    => abr_get_option( 'ctx_own' ) ? (int) abr_get_option( 'ctx_own_max' ) : 0,
		'sister' => abr_get_option( 'ctx_sister' ) ? (int) abr_get_option( 'ctx_sister_max' ) : 0,
	);
	return abr_ctx_link( $content, $caps, (string) get_permalink() );
}
// After do_blocks (9), wptexturize (10) and do_shortcode (11), so the
// patterns and [abr_…] shortcodes are already expanded and texturised. The
// render_block filters in functions.php run per block; this runs once.
add_filter( 'the_content', 'abr_ctx_filter', 30 );

/**
 * The linking pass itself, free of request state so it can be tested.
 *
 * @param string $content HTML.
 * @param array  $caps    Links allowed: 'own' and 'sister'.
 * @param string $here    Address of the page being rendered.
 * @return string
 */
function abr_ctx_link( $content, $caps, $here ) {
	if ( $caps['own'] < 1 && $caps['sister'] < 1 ) {
		return $content;
	}
	$map = abr_ctx_compiled();
	if ( ! $map['patterns'] ) {
		return $content;
	}

	// Targets already linked by hand, and this page itself, count as done.
	$done = array( abr_ctx_url_key( $here ) => true );
	if ( preg_match_all( '/<a\s[^>]*href=("|\')(.*?)\1/i', $content, $hrefs ) ) {
		foreach ( $hrefs[2] as $href ) {
			$done[ abr_ctx_url_key( $href ) ] = true;
		}
	}
	$made = array( 'own' => 0, 'sister' => 0 );

	$skip_tags  = array( 'a', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'blockquote', 'q', 'figure', 'figcaption', 'cite', 'code', 'pre', 'sup', 'sub', 'nav', 'table', 'button', 'label', 'select', 'textarea', 'summary', 'details', 'script', 'style', 'svg' );
	$skip_class = '/\bclass=("|\')[^"\']*\b(?:abr-fn|abr-fn-back|abr-notes|abr-notes-title|abr-toc|wp-block-rank-math-toc-block|abr-further|abr-verse|abr-verse__ar|abr-verse__en|abr-table|abr-breadcrumbs|abr-lanah)\b/i';
	// Every script language theme.css styles: Arabic; Hebrew and square-script
	// Aramaic; Syriac; Greek.
	$skip_lang  = '/\blang=("|\')(?:ar|he|hbo|arc|tmr|jpa|oar|sam|syc|syr|aii|cld|el|grc)(?:-[a-z0-9-]+)?\1/i';
	$void       = array( 'area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'source', 'track', 'wbr' );

	// Open elements: tag, whether it forbids links, and for p and li
	// whether a link has been added inside it.
	$stack  = array();
	$skip   = 0;
	// A comment, or a tag whose quoted attribute values may hold '>'.
	$pieces = preg_split( '/(<!--.*?-->|<(?:[^>"\']|"[^"]*"|\'[^\']*\')+>)/s', $content, -1, PREG_SPLIT_DELIM_CAPTURE );
	if ( false === $pieces ) {
		return $content;
	}
	// Inline formatting a phrase may run across ("Paul <em>of</em> Tarsus").
	$inline = array( 'em', 'strong', 'i', 'b', 'span', 'small', 'mark', 'abbr' );

	// A run: text and inline formatting tags in one block, outside any skip
	// region, matched as one plain string. Any other tag ends the run.
	$run   = array();
	$out   = '';
	$state = array(
		'map'  => $map,
		'caps' => $caps,
	);
	foreach ( $pieces as $piece ) {
		if ( '' === $piece ) {
			continue;
		}
		if ( '<' === $piece[0] ) {
			$tag     = '';
			$closing = false;
			$forbid  = false;
			$opens   = false;
			if ( preg_match( '#^<(/?)([a-zA-Z][a-zA-Z0-9-]*)#', $piece, $m ) ) {
				$tag     = strtolower( $m[2] );
				$closing = '/' === $m[1];
				$opens   = ! $closing && ! in_array( $tag, $void, true ) && '/' !== substr( $piece, -2, 1 );
				$forbid  = $opens && ( in_array( $tag, $skip_tags, true ) || preg_match( $skip_class, $piece ) || preg_match( $skip_lang, $piece ) );
			}
			$in_run = 0 === $skip && in_array( $tag, $inline, true ) && ( $closing || ( $opens && ! $forbid ) );
			if ( ! $in_run ) {
				$out .= abr_ctx_link_run( $run, $stack, $made, $done, $state );
				$run  = array();
			}
			if ( $closing ) {
				for ( $i = count( $stack ) - 1; $i >= 0; $i-- ) {
					if ( $stack[ $i ]['tag'] === $tag ) {
						foreach ( array_splice( $stack, $i ) as $closed ) {
							$skip -= $closed['skip'] ? 1 : 0;
						}
						break;
					}
				}
			} elseif ( $opens ) {
				$stack[] = array( 'tag' => $tag, 'skip' => (bool) $forbid, 'linked' => false );
				$skip   += $forbid ? 1 : 0;
			}
			if ( $in_run ) {
				$run[] = array( 'tag' => $tag, 'close' => $closing, 'html' => $piece );
			} else {
				$out .= $piece;
			}
			continue;
		}
		if ( $skip > 0 ) {
			$out .= $piece;
			continue;
		}
		$run[] = array( 'tag' => '', 'html' => $piece );
	}
	return $out . abr_ctx_link_run( $run, $stack, $made, $done, $state );
}

/**
 * Link the phrases in one run of text and inline formatting tags. A phrase may
 * run across those tags only when every tag inside it opens and closes inside
 * it, so the added link wraps whole elements and the markup stays valid.
 *
 * @param array $run   Items: text ('tag' empty) or inline tags, in order.
 * @param array $stack Open elements (for the nearest p or li).
 * @param array $made  Links made, by kind.
 * @param array $done  Targets already linked.
 * @param array $state 'map' (compiled map) and 'caps'.
 * @return string
 */
function abr_ctx_link_run( $run, &$stack, &$made, &$done, $state ) {
	if ( ! $run ) {
		return '';
	}
	$map  = $state['map'];
	$caps = $state['caps'];
	$html = '';
	// The plain text, each text item's offset in it, and each tag's position.
	$plain = '';
	foreach ( $run as $n => $item ) {
		$run[ $n ]['at'] = strlen( $plain );
		$html           .= $item['html'];
		if ( '' === $item['tag'] ) {
			$plain .= $item['html'];
		}
	}
	if ( '' === trim( $plain ) || ( $made['own'] >= $caps['own'] && $made['sister'] >= $caps['sister'] ) ) {
		return $html;
	}
	// The nearest p or li, which takes one added link at most.
	$block = null;
	for ( $i = count( $stack ) - 1; $i >= 0; $i-- ) {
		if ( 'p' === $stack[ $i ]['tag'] || 'li' === $stack[ $i ]['tag'] ) {
			$block = $i;
			break;
		}
	}
	$links  = array(); // [ first item, last item, start, end, opening tag ].
	$after  = -1;      // Last item inside a link made in this run.
	$pos    = 0;
	$shadow = 0; // End of the furthest match passed over.
	$len    = strlen( $plain );
	while ( $pos < $len ) {
		if ( ( null !== $block && $stack[ $block ]['linked'] ) || ( $made['own'] >= $caps['own'] && $made['sister'] >= $caps['sister'] ) ) {
			break;
		}
		$hit = abr_ctx_next( $map['patterns'], $plain, $pos );
		// Invalid UTF-8 makes the /u patterns fail; keep the text as it was.
		if ( false === $hit ) {
			return $html;
		}
		if ( null === $hit ) {
			break;
		}
		list( $offset, $text ) = $hit;
		$end = $offset + strlen( $text );
		// The tags inside the link must balance, or no link can wrap the phrase.
		$wrap = abr_ctx_wrap( $run, $offset, $end, $after );
		if ( null === $wrap ) {
			$pos = $offset + abr_ctx_char_len( $plain, $offset );
			continue;
		}
		$key    = abr_ctx_key( $map, $text );
		$target = '' === $key ? null : $map['lookup'][ $key ];
		$kind   = $target && $target['sister'] ? 'sister' : 'own';
		$url_id = $target ? abr_ctx_url_key( $target['url'] ) : '';
		// A phrase wholly inside one passed over is part of that name ("Barnabas"
		// in "Gospel of Barnabas"); one running past its end is not ("Paul of
		// Tarsus" after "Peter and Paul").
		if ( $end <= $shadow || ! $target || $made[ $kind ] >= $caps[ $kind ] || isset( $done[ $url_id ] ) ) {
			// Passed over: resume one character on, so an overlapping phrase can still match.
			$shadow = max( $shadow, $end );
			$pos    = $offset + abr_ctx_char_len( $plain, $offset );
			continue;
		}
		$done[ $url_id ] = true;
		++$made[ $kind ];
		if ( null !== $block && isset( $stack[ $block ] ) ) {
			$stack[ $block ]['linked'] = true;
		}
		$open    = $target['sister']
			? '<a class="abr-ctx-link abr-ctx-link--sister" href="' . esc_url( $target['url'] ) . '" rel="noopener">'
			: '<a class="abr-ctx-link" href="' . esc_url( $target['url'] ) . '">';
		$links[] = array( $wrap[0], $wrap[1], $offset, $end, $open );
		$after   = $wrap[1];
		$pos     = $end;
	}
	if ( ! $links ) {
		return $html;
	}
	// Rebuild. A link that starts at a text item opens inside it at the
	// phrase's first character; one that starts at a tag opens before that
	// tag. Likewise at the end.
	$out = '';
	foreach ( $run as $n => $item ) {
		foreach ( $links as $link ) {
			if ( $link[0] === $n && '' !== $item['tag'] ) {
				$out .= $link[4];
			}
		}
		if ( '' !== $item['tag'] ) {
			$out .= $item['html'];
		} else {
			$cut = array();
			foreach ( $links as $link ) {
				if ( $link[0] === $n ) {
					$cut[] = array( $link[2] - $item['at'], 1, $link[4] );
				}
				if ( $link[1] === $n ) {
					$cut[] = array( $link[3] - $item['at'], 0, '</a>' );
				}
			}
			// By position; where one link ends as the next begins, close first.
			usort(
				$cut,
				static function ( $a, $b ) {
					return $a[0] === $b[0] ? $a[1] <=> $b[1] : $a[0] <=> $b[0];
				}
			);
			$at = 0;
			foreach ( $cut as $c ) {
				$out .= substr( $item['html'], $at, $c[0] - $at ) . $c[2];
				$at   = $c[0];
			}
			$out .= substr( $item['html'], $at );
		}
		foreach ( $links as $link ) {
			if ( $link[1] === $n && '' !== $item['tag'] ) {
				$out .= '</a>';
			}
		}
	}
	return $out;
}

/**
 * Where a link around a span of the plain text can open and close so that the
 * inline tags inside it balance: [ first item, last item ], or null. The
 * tightest fit is tried first; tags sitting exactly at either edge
 * ("<strong>Council</strong> of Nicaea") are taken in when that balances it.
 *
 * @param array $run   Run items with their plain-text positions.
 * @param int   $start Start of the span.
 * @param int   $end   End of the span.
 * @param int   $after The link may only start after this item (the last link's end).
 * @return array|null
 */
function abr_ctx_wrap( $run, $start, $end, $after ) {
	$first = null;
	$last  = null;
	foreach ( $run as $n => $item ) {
		if ( '' !== $item['tag'] ) {
			continue;
		}
		$to = $item['at'] + strlen( $item['html'] );
		if ( null === $first && $start >= $item['at'] && $start < $to ) {
			$first = $n;
		}
		if ( $end > $item['at'] && $end <= $to ) {
			$last = $n;
		}
	}
	if ( null === $first || null === $last ) {
		return null;
	}
	// Tags directly before the first text item (when the span starts with it),
	// and directly after the last one (when the span ends with it).
	$heads = array( $first );
	if ( $start === $run[ $first ]['at'] ) {
		for ( $n = $first - 1; $n > $after && '' !== $run[ $n ]['tag']; $n-- ) {
			$heads[] = $n;
		}
	}
	$tails = array( $last );
	if ( $end === $run[ $last ]['at'] + strlen( $run[ $last ]['html'] ) ) {
		for ( $n = $last + 1; isset( $run[ $n ] ) && '' !== $run[ $n ]['tag']; $n++ ) {
			$tails[] = $n;
		}
	}
	foreach ( $heads as $a ) {
		foreach ( $tails as $b ) {
			$open = array();
			$ok   = true;
			for ( $n = $a; $n <= $b && $ok; $n++ ) {
				if ( '' === $run[ $n ]['tag'] ) {
					continue;
				}
				if ( ! $run[ $n ]['close'] ) {
					$open[] = $run[ $n ]['tag'];
				} elseif ( ! $open || array_pop( $open ) !== $run[ $n ]['tag'] ) {
					$ok = false;
				}
			}
			if ( $ok && ! $open ) {
				return array( $a, $b );
			}
		}
	}
	return null;
}
