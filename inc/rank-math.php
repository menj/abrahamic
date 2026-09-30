<?php
/**
 * Working alongside Rank Math SEO.
 *
 * Rank Math has the last word on titles, descriptions and structured data
 * wherever an editor has set them (see inc/seo.php). This module adds what the
 * theme knows and Rank Math does not, without overriding anything an editor set:
 *
 * - Focus keywords. Each article and principal page receives the focus keyword
 *   from inc/seed/focus-keywords.php, only where its Rank Math focus keyword is
 *   empty. A keyword typed in Rank Math is never replaced.
 * - Anonymity. Rank Math describes each article's author as a Person with the
 *   account's Gravatar, a hash of its email address. The Person node is removed
 *   and the site's Organization named as author, as everywhere else.
 * - Structured data. The theme's graph is more complete than Rank Math's
 *   default (licence data for every credited photograph, speakable, FAQPage
 *   from question-and-answer content, breadcrumbs, page types, no Person), so it
 *   is printed in Rank Math's place. Where an editor has built a schema in Rank
 *   Math's Schema tab, Rank Math's graph is kept and the theme adds its licence,
 *   speakable and FAQ data to it.
 * - Everything else (titles and descriptions an editor sets, robots, canonical,
 *   social tags, sitemaps) is Rank Math's.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Whether Rank Math is active.
 *
 * @return bool
 */
function abr_rank_math_active() {
	return defined( 'RANK_MATH_VERSION' ) || class_exists( 'RankMath' );
}

/**
 * Fill empty Rank Math focus keywords from the starter content. Runs once per
 * version of the keyword list (and after each starter-content run), so a change
 * to the list reaches the live site without a new starter-content version.
 *
 * @param bool $force Run even when this version of the list has run before.
 * @return int Number of keywords written.
 */
function abr_seed_focus_keywords( $force = false ) {
	$file = ABR_DIR . '/inc/seed/focus-keywords.php';
	if ( ! is_readable( $file ) ) {
		return 0;
	}
	$stamp = md5_file( $file );
	if ( ! $force && get_option( 'abr_focus_keywords_stamp' ) === $stamp ) {
		return 0;
	}
	$map     = require $file;
	// Keywords the theme wrote in 2.77.0 and has since refined.
	$previous = array(
		'post:who-was-abraham'                                   => 'who was abraham,abraham',
		'post:millat-ibrahim'                                    => 'millat ibrahim,religion of abraham',
		'post:jesus-across-the-traditions'                       => 'jesus in islam,jesus',
		'post:john-the-baptist-in-four-traditions'               => 'john the baptist,yahya',
		'post:war-and-peace-in-the-abrahamic-traditions'         => 'are abrahamic religions violent,religious violence',
		'post:how-the-abrahamic-religions-understand-monotheism' => 'abrahamic monotheism,monotheistic religions',
		'post:the-council-of-nicaea'                             => 'council of nicaea,nicene creed',
		'post:the-islamic-dilemma'                               => 'islamic dilemma,surah 5:46',
		'page:comparisons'                                       => 'similarities between judaism christianity and islam',
		'post:the-stations-of-the-hajj'                          => 'stations of hajj,hajj',
	);
	$written = 0;
	foreach ( $map as $key => $keyword ) {
		$id = abr_seed_id( $key );
		if ( ! $id ) {
			continue;
		}
		$current = trim( (string) get_post_meta( $id, 'rank_math_focus_keyword', true ) );
		$seeded  = (string) get_post_meta( $id, '_abr_focus_seeded', true );
		// An editor's keyword is never replaced: only an empty field, or one still
		// holding exactly what the theme wrote earlier, is updated.
		if ( '' === $seeded && isset( $previous[ $key ] ) && $current === $previous[ $key ] ) {
			$seeded = $current; // Written by 2.77.0, before the theme recorded its own values.
		}
		if ( '' !== $current && $current !== $seeded ) {
			continue;
		}
		if ( $current === $keyword ) {
			continue;
		}
		update_post_meta( $id, 'rank_math_focus_keyword', $keyword );
		update_post_meta( $id, '_abr_focus_seeded', $keyword );
		$written++;
	}
	update_option( 'abr_focus_keywords_stamp', $stamp, false );
	return $written;
}
add_action(
	'admin_init',
	function () {
		if ( current_user_can( 'edit_theme_options' ) ) {
			abr_seed_focus_keywords();
		}
	},
	20
);

/**
 * Whether an editor has built a schema for the current page in Rank Math's
 * Schema tab (stored as rank_math_schema_* post meta).
 *
 * @return bool
 */
function abr_rank_math_schema_customised() {
	if ( ! is_singular() ) {
		return false;
	}
	foreach ( array_keys( (array) get_post_meta( get_queried_object_id() ) ) as $meta_key ) {
		if ( 0 === strpos( (string) $meta_key, 'rank_math_schema_' ) ) {
			return true;
		}
	}
	return false;
}

/**
 * Adjust Rank Math's JSON-LD graph (after Rank Math has connected its entities).
 *
 * @param array $data   Graph nodes, keyed by Rank Math.
 * @param mixed $jsonld Rank Math JsonLD instance.
 * @return array
 */
function abr_rank_math_json_ld( $data, $jsonld = null ) {
	if ( ! is_array( $data ) ) {
		return $data;
	}
	// The theme's graph is the more complete one (licence data, speakable, FAQ from
	// the content, breadcrumbs, page types, no Person), so it takes precedence and
	// is printed in Rank Math's place. Where an editor has built a schema in Rank
	// Math's Schema tab for this page, Rank Math's graph is kept and the theme only
	// adds to it, below.
	if ( ! abr_rank_math_schema_customised() && function_exists( 'abr_schema_graph' ) ) {
		$out = array();
		foreach ( abr_schema_graph() as $i => $node ) {
			$out[ 'abr' . $i ] = $node;
		}
		return $out;
	}
	$home   = home_url( '/' );
	$org_id = $home . '#organization';

	// Anonymity: no Person, no Gravatar; the site's Organization is the author.
	$person_ids = array();
	foreach ( $data as $key => $node ) {
		if ( is_array( $node ) && isset( $node['@type'] ) && in_array( 'Person', (array) $node['@type'], true ) ) {
			if ( isset( $node['@id'] ) ) {
				$person_ids[] = $node['@id'];
			}
			unset( $data[ $key ] );
		}
	}
	foreach ( $data as $key => $node ) {
		if ( ! is_array( $node ) ) {
			continue;
		}
		if ( isset( $node['author'] ) ) {
			$data[ $key ]['author'] = array(
				'@id'  => $org_id,
				'name' => get_bloginfo( 'name' ),
			);
		}
		foreach ( array( 'mainEntity', 'about' ) as $prop ) {
			if ( isset( $node[ $prop ]['@id'] ) && in_array( $node[ $prop ]['@id'], $person_ids, true ) ) {
				unset( $data[ $key ][ $prop ] );
			}
		}
	}

	// The author refers to the site's Organization; make sure the graph contains it.
	$has_org = false;
	foreach ( $data as $node ) {
		if ( is_array( $node ) && isset( $node['@id'] ) && $org_id === $node['@id'] ) {
			$has_org = true;
		}
	}
	if ( ! $has_org ) {
		$data['abrOrganization'] = array(
			'@type' => 'Organization',
			'@id'   => $org_id,
			'name'  => get_bloginfo( 'name' ),
			'url'   => $home,
			'logo'  => abr_schema_image( abr_seo_logo(), $home . '#logo' ),
		);
	}

	if ( ! is_singular() ) {
		return $data;
	}
	$post = get_queried_object();
	$url  = get_permalink( $post );

	// Licence data for the featured image and for every photograph in the content.
	$images   = array();
	$thumb_id = get_post_thumbnail_id( $post );
	if ( $thumb_id ) {
		$node = abr_schema_licensed_image( (string) wp_get_attachment_url( $thumb_id ), pathinfo( (string) get_attached_file( $thumb_id ), PATHINFO_FILENAME ), $url . '#abr-featured-image' );
		if ( $node ) {
			$data['abrFeaturedImage'] = $node;
			$images[]                 = array( '@id' => $node['@id'] );
		}
	}
	foreach ( abr_content_photo_names( $post ) as $i => $name ) {
		$node = abr_schema_licensed_image( ABR_URI . '/assets/images/photos/' . rawurlencode( $name ) . '.avif', $name, $url . '#abr-image-' . ( $i + 1 ) );
		if ( $node ) {
			$data[ 'abrImage' . ( $i + 1 ) ] = $node;
			$images[]                        = array( '@id' => $node['@id'] );
		}
	}

	foreach ( $data as $key => $node ) {
		if ( ! is_array( $node ) || ! isset( $node['@type'] ) ) {
			continue;
		}
		$types = (array) $node['@type'];
		if ( $images && array_intersect( $types, array( 'WebPage', 'AboutPage', 'ContactPage', 'CollectionPage', 'FAQPage' ) ) && empty( $node['image'] ) ) {
			$data[ $key ]['image'] = $images;
		}
		if ( is_singular( 'post' ) && array_intersect( $types, array( 'Article', 'BlogPosting', 'NewsArticle' ) ) && empty( $node['speakable'] ) ) {
			$data[ $key ]['speakable'] = array(
				'@type'       => 'SpeakableSpecification',
				'cssSelector' => array( 'h1', '.abr-prose > p:first-of-type' ),
			);
		}
	}

	// FAQPage for pages written as questions and answers, unless Rank Math has one.
	$has_faq = false;
	foreach ( $data as $node ) {
		if ( is_array( $node ) && isset( $node['@type'] ) && in_array( 'FAQPage', (array) $node['@type'], true ) ) {
			$has_faq = true;
		}
	}
	$faq_ids = array_filter( array_map( 'abr_seed_id', abr_faq_style_keys() ) );
	if ( ! $has_faq && in_array( (int) $post->ID, array_map( 'intval', $faq_ids ), true ) ) {
		$pairs = abr_faq_qa_pairs( $post );
		if ( $pairs ) {
			$data['abrFaq'] = array(
				'@type'      => 'FAQPage',
				'@id'        => $url . '#faq',
				'mainEntity' => $pairs,
			);
		}
	}
	return $data;
}
add_filter( 'rank_math/json_ld', 'abr_rank_math_json_ld', 100, 2 );
