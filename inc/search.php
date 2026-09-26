<?php
/**
 * Site search: a normalised index, spelling variants, relevance ordering and
 * results that show where each match sits.
 *
 * WordPress matches the words as typed, against the stored text. On this site
 * the same name is written several ways (Makkah and Mecca, Qur'an and Quran,
 * hadith and ḥadīth), so each item carries a normalised copy of its text in
 * _abr_index, and queries are normalised and expanded the same way.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Names this site writes in more than one way. Each line is a set of
 * equivalents; matching any of them matches all of them.
 *
 * @return array[]
 */
function abr_search_equivalents() {
	return array(
		array( 'makkah', 'mecca', 'bakkah' ),
		array( 'madinah', 'medina', 'yathrib' ),
		array( 'quran', 'koran', 'qoran' ),
		array( 'hadith', 'ahadith' ),
		array( 'muhammad', 'mohammed', 'mohammad', 'muhammed' ),
		array( 'ibrahim', 'abraham', 'avraham' ),
		array( 'musa', 'moses', 'moshe' ),
		array( 'isa', 'jesus', 'yeshua' ),
		array( 'maryam', 'mary', 'miriam' ),
		array( 'ismail', 'ishmael' ),
		array( 'ishaq', 'isaac', 'yitzhak' ),
		array( 'yaqub', 'jacob', 'israel' ),
		array( 'dawud', 'david' ),
		array( 'sulayman', 'solomon' ),
		array( 'jerusalem', 'quds', 'yerushalayim' ),
		array( 'kaaba', 'kabah', 'kaabah' ),
		array( 'tanakh', 'tanach' ),
		array( 'torah', 'pentateuch' ),
		array( 'hanukkah', 'chanukah' ),
		array( 'pesach', 'passover' ),
		array( 'salah', 'salat', 'namaz' ),
		array( 'zakah', 'zakat' ),
		array( 'hajj', 'pilgrimage' ),
		array( 'tawhid', 'monotheism' ),
		array( 'shirk', 'polytheism' ),
		array( 'injil', 'gospel' ),
		array( 'zabur', 'psalms' ),
		array( 'surah', 'sura', 'chapter' ),
		array( 'ayah', 'verse' ),
	);
}

/**
 * Letters with marks, and their plain equivalents, for hosts where PHP cannot
 * decompose them itself.
 *
 * @return array
 */
function abr_search_letters() {
	static $map = null;
	if ( null === $map ) {
		$pairs = array(
			'aāăàáâãäåǎ' => 'a',
			'cçćĉċč'     => 'c',
			'dďđḍḏ'      => 'd',
			'eēĕėęěèéêë' => 'e',
			'gĝğġģǧ'     => 'g',
			'hĥħḥḫḩ'     => 'h',
			'iīĭįıìíîï'  => 'i',
			'lĺļľłḷ'     => 'l',
			'nñńņňṅṇ'    => 'n',
			'oōŏőòóôõöǒ' => 'o',
			'rŕŗřṛ'      => 'r',
			'sśŝşšṣ'     => 's',
			'tţťṭṯ'      => 't',
			'uūŭůűųùúûü' => 'u',
			'yýÿŷ'       => 'y',
			'zźżžẓẕ'     => 'z',
		);
		$map = array();
		foreach ( $pairs as $letters => $plain ) {
			foreach ( preg_split( '//u', $letters, -1, PREG_SPLIT_NO_EMPTY ) as $letter ) {
				$map[ $letter ] = $plain;
			}
		}
	}
	return $map;
}

/**
 * Reduce text to a comparable form: lower case, no diacritics, no apostrophes,
 * words separated by single spaces.
 *
 * @param string $text Text.
 * @return string
 */
function abr_search_normalize( $text ) {
	$text = wp_strip_all_tags( (string) $text, true );
	$text = str_replace( array( 'ʾ', 'ʿ', '’', '‘', "'", '`', '-', '–' ), array( '', '', '', '', '', '', ' ', ' ' ), $text );
	if ( function_exists( 'normalizer_normalize' ) ) {
		$text = normalizer_normalize( $text, Normalizer::FORM_D );
	}
	$text = preg_replace( '/\p{Mn}+/u', '', $text );
	// Hosts without the intl extension keep precomposed letters, so map them here.
	$text = strtr( $text, abr_search_letters() );
	$text = function_exists( 'mb_strtolower' ) ? mb_strtolower( $text, 'UTF-8' ) : strtolower( $text );
	$text = preg_replace( '/[^\p{L}\p{N}\s]+/u', ' ', $text );
	return trim( preg_replace( '/\s+/u', ' ', $text ) );
}

/**
 * Add the equivalents of any name a text uses, so either spelling finds it.
 *
 * @param string $normalised Normalised text.
 * @return string
 */
function abr_search_expand( $normalised ) {
	$extra  = array();
	$padded = ' ' . $normalised . ' ';
	foreach ( abr_search_equivalents() as $set ) {
		foreach ( $set as $word ) {
			// Whole words only: "Abrahamic" must not count as "Abraham".
			if ( false !== strpos( $padded, ' ' . $word . ' ' ) ) {
				$extra = array_merge( $extra, $set );
				break;
			}
		}
	}
	return $extra ? $normalised . ' ' . implode( ' ', array_unique( $extra ) ) : $normalised;
}

/**
 * Build and store the index for one post.
 *
 * @param int $post_id Post ID.
 * @return string The stored index.
 */
function abr_search_index_post( $post_id ) {
	$post = get_post( $post_id );
	if ( ! $post || ! in_array( $post->post_type, array( 'post', 'page' ), true ) ) {
		return '';
	}
	$terms = wp_get_post_terms( $post_id, array( 'category', 'post_tag' ), array( 'fields' => 'names' ) );
	$parts = array(
		$post->post_title,
		$post->post_excerpt,
		get_post_meta( $post_id, '_abr_description', true ),
		is_wp_error( $terms ) ? '' : implode( ' ', $terms ),
		strip_shortcodes( $post->post_content ),
	);
	$index = ' ' . abr_search_expand( abr_search_normalize( implode( ' ', $parts ) ) ) . ' ';
	update_post_meta( $post_id, '_abr_index', $index );
	update_post_meta( $post_id, '_abr_index_title', ' ' . abr_search_expand( abr_search_normalize( $post->post_title . ' ' . $post->post_excerpt ) ) . ' ' );
	return $index;
}

/**
 * Keep the index current as content is edited.
 *
 * @param int     $post_id Post ID.
 * @param WP_Post $post    Post.
 */
function abr_search_update_index( $post_id, $post ) {
	if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {
		return;
	}
	abr_search_index_post( $post_id );
}
add_action( 'save_post', 'abr_search_update_index', 20, 2 );

/**
 * Build the index for every published page and article.
 *
 * @return int Number indexed.
 */
function abr_search_rebuild_index() {
	$ids = get_posts(
		array(
			'post_type'        => array( 'post', 'page' ),
			'post_status'      => 'publish',
			'posts_per_page'   => -1,
			'fields'           => 'ids',
			'suppress_filters' => true,
		)
	);
	foreach ( $ids as $id ) {
		abr_search_index_post( $id );
	}
	update_option( 'abr_search_indexed', count( $ids ), false );
	return count( $ids );
}

/**
 * The words to match, normalised and expanded.
 *
 * @param string $query Raw search query.
 * @return string[]
 */
function abr_search_terms( $query ) {
	$normalised = abr_search_normalize( $query );
	if ( '' === $normalised ) {
		return array();
	}
	$words = array_filter( explode( ' ', $normalised ), 'strlen' );
	$terms = array();
	foreach ( $words as $word ) {
		$set = array( $word );
		foreach ( abr_search_equivalents() as $equivalents ) {
			if ( in_array( $word, $equivalents, true ) ) {
				$set = array_merge( $set, $equivalents );
			}
		}
		$terms[] = array_values( array_unique( $set ) );
	}
	return $terms;
}

/**
 * Search pages and articles together, against the normalised index.
 *
 * @param WP_Query $query Query.
 */
function abr_search_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ! $query->is_search() ) {
		return;
	}
	$query->set( 'post_type', array( 'post', 'page' ) );
	$query->set( 'posts_per_page', 12 );
	$query->set( 'ignore_sticky_posts', true );
}
add_action( 'pre_get_posts', 'abr_search_query' );

/**
 * Replace WordPress's word matching with a match against the index.
 *
 * @param string   $search Search SQL.
 * @param WP_Query $query  Query.
 * @return string
 */
function abr_search_where( $search, $query ) {
	global $wpdb;
	if ( is_admin() || ! $query->is_main_query() || ! $query->is_search() ) {
		return $search;
	}
	$terms = abr_search_terms( $query->get( 's' ) );
	if ( ! $terms ) {
		return ' AND 1=0 ';
	}
	$clauses = array();
	foreach ( $terms as $set ) {
		$any = array();
		foreach ( $set as $word ) {
			$any[] = $wpdb->prepare( 'abr_idx.meta_value LIKE %s', '%' . $wpdb->esc_like( $word ) . '%' );
		}
		$clauses[] = '(' . implode( ' OR ', $any ) . ')';
	}
	return ' AND (' . implode( ' AND ', $clauses ) . ') ';
}
add_filter( 'posts_search', 'abr_search_where', 10, 2 );

/**
 * Join the index for searching and ordering.
 *
 * @param string   $join  Join SQL.
 * @param WP_Query $query Query.
 * @return string
 */
function abr_search_join( $join, $query ) {
	global $wpdb;
	if ( is_admin() || ! $query->is_main_query() || ! $query->is_search() ) {
		return $join;
	}
	$join .= " INNER JOIN {$wpdb->postmeta} AS abr_idx ON ( {$wpdb->posts}.ID = abr_idx.post_id AND abr_idx.meta_key = '_abr_index' ) ";
	$join .= " LEFT JOIN {$wpdb->postmeta} AS abr_idx_t ON ( {$wpdb->posts}.ID = abr_idx_t.post_id AND abr_idx_t.meta_key = '_abr_index_title' ) ";
	return $join;
}
add_filter( 'posts_join', 'abr_search_join', 10, 2 );

/**
 * Order by relevance: whole phrase in the title first, then a word in the
 * title, then the rest, and the newest first within each group.
 *
 * @param string   $orderby Order SQL.
 * @param WP_Query $query   Query.
 * @return string
 */
function abr_search_orderby( $orderby, $query ) {
	global $wpdb;
	if ( is_admin() || ! $query->is_main_query() || ! $query->is_search() ) {
		return $orderby;
	}
	$terms = abr_search_terms( $query->get( 's' ) );
	if ( ! $terms ) {
		return $orderby;
	}
	$phrase  = abr_search_normalize( $query->get( 's' ) );
	$score   = array();
	// The whole phrase as a title, then as part of the title.
	$score[] = $wpdb->prepare( 'CASE WHEN abr_idx_t.meta_value LIKE %s THEN 400 ELSE 0 END', '% ' . $wpdb->esc_like( $phrase ) . ' %' );
	$score[] = $wpdb->prepare( 'CASE WHEN abr_idx_t.meta_value LIKE %s THEN 120 ELSE 0 END', '%' . $wpdb->esc_like( $phrase ) . '%' );
	foreach ( $terms as $set ) {
		$whole = array();
		$part  = array();
		foreach ( $set as $word ) {
			$whole[] = $wpdb->prepare( 'abr_idx_t.meta_value LIKE %s', '% ' . $wpdb->esc_like( $word ) . ' %' );
			$part[]  = $wpdb->prepare( 'abr_idx_t.meta_value LIKE %s', '%' . $wpdb->esc_like( $word ) . '%' );
		}
		// A whole word in the title, then the word inside a longer one, then in the body.
		$score[] = 'CASE WHEN (' . implode( ' OR ', $whole ) . ') THEN 60 ELSE 0 END';
		$score[] = 'CASE WHEN (' . implode( ' OR ', $part ) . ') THEN 15 ELSE 0 END';
		$body    = array();
		foreach ( $set as $word ) {
			$body[] = $wpdb->prepare( 'abr_idx.meta_value LIKE %s', '% ' . $wpdb->esc_like( $word ) . ' %' );
		}
		$score[] = 'CASE WHEN (' . implode( ' OR ', $body ) . ') THEN 8 ELSE 0 END';
	}
	return '(' . implode( ' + ', $score ) . ") DESC, {$wpdb->posts}.post_date DESC";
}
add_filter( 'posts_orderby', 'abr_search_orderby', 10, 2 );

/**
 * A short passage around the first match, with the matched words marked.
 *
 * @param WP_Post $post  Post.
 * @param string  $query Search query.
 * @return string
 */
function abr_search_snippet( $post, $query ) {
	$text  = wp_strip_all_tags( strip_shortcodes( $post->post_content ), true );
	$text  = trim( preg_replace( '/\s+/u', ' ', $text ) );
	$terms = abr_search_terms( $query );
	$at    = false;
	$word  = '';
	foreach ( $terms as $set ) {
		foreach ( $set as $candidate ) {
			$position = stripos( abr_search_normalize( $text ), $candidate );
			if ( false !== $position ) {
				$at   = $position;
				$word = $candidate;
				break 2;
			}
		}
	}
	if ( false === $at ) {
		$excerpt = $post->post_excerpt ? $post->post_excerpt : $text;
		return esc_html( wp_trim_words( $excerpt, 30 ) );
	}
	$start   = max( 0, $at - 90 );
	$snippet = substr( $text, $start, 260 );
	$snippet = ( $start > 0 ? '…' : '' ) . trim( $snippet ) . '…';
	$snippet = esc_html( $snippet );
	return preg_replace( '/(' . preg_quote( $word, '/' ) . ')/iu', '<mark>$1</mark>', $snippet, 1 );
}

/**
 * Where a result sits: its section, or the Journal for an article.
 *
 * @param WP_Post $post Post.
 * @return string
 */
function abr_search_context( $post ) {
	if ( 'post' === $post->post_type ) {
		$id = abr_seed_id( 'page:articles' );
		return $id ? get_the_title( $id ) : __( 'Journal', 'abrahamic' );
	}
	$parents = get_post_ancestors( $post );
	if ( $parents ) {
		return get_the_title( end( $parents ) );
	}
	return __( 'Pages', 'abrahamic' );
}

/**
 * [abr_search_results]: the results themselves, with the section each sits in,
 * a passage around the match, and pagination. An empty search asks for a word
 * and offers the topics instead of listing everything.
 */
add_shortcode(
	'abr_search_results',
	function () {
		global $wp_query;
		$query = get_search_query();
		if ( '' === trim( $query ) ) {
			return '<div class="abr-search-empty"><p>' . esc_html__( 'Type a word or a name to search the site. You can use either spelling of a name: Makkah or Mecca, Qur\'an or Quran.', 'abrahamic' ) . '</p>'
				. do_shortcode( '[abr_topic_chips]' ) . '</div>';
		}
		$found = (int) $wp_query->found_posts;
		$out   = '<p class="abr-search-count">' . sprintf(
			/* translators: 1: number of results, 2: search terms. */
			esc_html( _n( '%1$s result for %2$s', '%1$s results for %2$s', $found, 'abrahamic' ) ),
			'<strong>' . esc_html( number_format_i18n( $found ) ) . '</strong>',
			'<strong>' . esc_html( $query ) . '</strong>'
		) . '</p>';

		if ( ! $found ) {
			return $out . '<div class="abr-search-empty"><p>' . esc_html__( 'Nothing matched. Try a shorter word, a different spelling, or one of these topics.', 'abrahamic' ) . '</p>'
				. do_shortcode( '[abr_topic_chips]' ) . '</div>';
		}

		$out .= '<ol class="abr-results">';
		while ( have_posts() ) {
			the_post();
			$post    = get_post();
			$context = abr_search_context( $post );
			$meta    = 'post' === $post->post_type
				? sprintf( '%1$s <span aria-hidden="true">·</span> %2$s', esc_html( $context ), esc_html( get_the_date() ) )
				: esc_html( $context );
			$out    .= sprintf(
				'<li class="abr-result"><p class="abr-result__where">%1$s</p><h2 class="abr-result__title"><a href="%2$s">%3$s</a></h2><p class="abr-result__snippet">%4$s</p><p class="abr-result__path">%5$s</p></li>',
				$meta, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
				esc_url( get_permalink() ),
				esc_html( get_the_title() ),
				abr_search_snippet( $post, $query ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the function.
				esc_html( str_replace( home_url(), '', get_permalink() ) )
			);
		}
		$out .= '</ol>';
		rewind_posts();

		$links = paginate_links(
			array(
				'total'     => (int) $wp_query->max_num_pages,
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'mid_size'  => 1,
				'prev_text' => __( 'Previous', 'abrahamic' ),
				'next_text' => __( 'Next', 'abrahamic' ),
				'type'      => 'array',
			)
		);
		if ( $links ) {
			$out .= '<nav class="abr-pagination" aria-label="' . esc_attr__( 'Results', 'abrahamic' ) . '">' . implode( ' ', $links ) . '</nav>';
		}
		return $out;
	}
);

/**
 * Tools: rebuild the search index.
 */
function abr_handle_rebuild_search() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to rebuild the search index.', 'abrahamic' ), 403 );
	}
	check_admin_referer( 'abr_rebuild_search' );
	$count = abr_search_rebuild_index();
	wp_safe_redirect( abr_options_url( 'tools', array( 'abr-notice' => 'search-indexed', 'abr-created' => $count ) ) . '#abr-seed' );
	exit;
}
add_action( 'admin_post_abr_rebuild_search', 'abr_handle_rebuild_search' );

/* -------------------------------------------------------------------------
 * Search addresses: /search/term/ in place of /?s=term
 *
 * Built into the theme from Pretty Search Permalinks 1.3 by Angel Costa (GPL). Its setting,
 * wpseosearch_base, seeds the theme's default. While the plugin is active,
 * the theme leaves this to it.
 * ---------------------------------------------------------------------- */

/**
 * Whether the theme handles search addresses.
 *
 * @return bool
 */
function abr_search_pretty_on() {
	return ! function_exists( 'wpseosearch_base' ) && (bool) abr_get_option( 'search_pretty' );
}

/**
 * Set the search base before rewrite rules are used, and rebuild them once
 * whenever the base changes.
 */
function abr_search_base_setup() {
	if ( ! abr_search_pretty_on() ) {
		return;
	}
	global $wp_rewrite;
	$base                    = abr_get_option( 'search_base' );
	$wp_rewrite->search_base = $base;
	// Rebuild the rules once whenever the base differs from the one they were built with.
	if ( get_option( 'abr_search_base_built' ) !== $base ) {
		update_option( 'abr_search_base_built', $base );
		flush_rewrite_rules( false );
	}
}
add_action( 'init', 'abr_search_base_setup', 20 );

/**
 * Send /?s=term to /search/term/.
 */
function abr_search_pretty_redirect() {
	global $wp_rewrite;
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- presence check only.
	if ( ! abr_search_pretty_on() || ! is_search() || is_admin() || ! isset( $_GET['s'] ) || ! $wp_rewrite->using_permalinks() ) {
		return;
	}
	$term = get_query_var( 's' );
	if ( '' === trim( (string) $term ) ) {
		return;
	}
	wp_safe_redirect( get_search_link( $term ) );
	exit;
}
add_action( 'template_redirect', 'abr_search_pretty_redirect' );
