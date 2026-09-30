<?php
/**
 * Search: descriptions, canonical addresses, robots rules, XML sitemap scope,
 * Open Graph, structured data (Organization, WebSite, WebPage, BreadcrumbList,
 * Article), verification codes, analytics and the "Search description" box.
 *
 * Head output stands down when a dedicated SEO plugin is active.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Name of an active SEO plugin, or an empty string.
 *
 * @return string
 */
function abr_seo_plugin() {
	$plugins = array(
		'Yoast SEO'             => defined( 'WPSEO_VERSION' ),
		'Rank Math'             => defined( 'RANK_MATH_VERSION' ),
		'All in One SEO'        => defined( 'AIOSEO_VERSION' ),
		'SEOPress'              => defined( 'SEOPRESS_VERSION' ),
		'The SEO Framework'     => defined( 'THE_SEO_FRAMEWORK_VERSION' ),
		'Slim SEO'              => defined( 'SLIM_SEO_VER' ),
		'Squirrly SEO'          => defined( 'SQ_VERSION' ),
	);
	foreach ( $plugins as $name => $active ) {
		if ( $active ) {
			return $name;
		}
	}
	return '';
}

/**
 * Whether the theme outputs its own search tags.
 *
 * @return bool
 */
function abr_seo_active() {
	/**
	 * Filters whether the theme's search output runs.
	 *
	 * @param bool $enabled Setting on, and no SEO plugin active.
	 */
	return (bool) apply_filters( 'abr_seo_enabled', abr_get_option( 'seo_enabled' ) && '' === abr_seo_plugin() );
}

if ( ! defined( 'ABR_TITLE_MAX' ) ) {
	define( 'ABR_TITLE_MAX', 59 ); // Whole title, branding included: under 60 characters.
}
if ( ! defined( 'ABR_DESCRIPTION_MAX' ) ) {
	define( 'ABR_DESCRIPTION_MAX', 129 ); // Whole description, call to action included: under 130.
}

/**
 * Plain text trimmed to a length at a word boundary.
 *
 * @param string $text  Text.
 * @param int    $limit Characters.
 * @return string
 */
function abr_seo_trim( $text, $limit = ABR_DESCRIPTION_MAX ) {
	$text = trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags( strip_shortcodes( (string) $text ) ) ) );
	if ( mb_strlen( $text ) <= $limit ) {
		return $text;
	}
	$cut = mb_substr( $text, 0, $limit - 1 );
	$cut = preg_replace( '/\s+\S*$/u', '', $cut );
	return rtrim( $cut, " ,;:.-" ) . '…';
}

/**
 * Description of the current view.
 *
 * @return string
 */
function abr_seo_description() {
	$text = '';
	if ( is_front_page() ) {
		$text = abr_get_option( 'seo_home_description' );
		$id   = (int) get_option( 'page_on_front' );
		if ( '' === $text && $id ) {
			$text = get_post_meta( $id, '_abr_description', true );
		}
		$text = '' !== $text ? $text : get_bloginfo( 'description' );
	} elseif ( is_home() ) {
		$id   = (int) get_option( 'page_for_posts' );
		$text = $id ? get_post_meta( $id, '_abr_description', true ) : '';
		$text = ( '' === $text && $id ) ? get_post_field( 'post_excerpt', $id ) : $text;
	} elseif ( is_singular() ) {
		$post = get_queried_object();
		$text = get_post_meta( $post->ID, '_abr_description', true );
		if ( '' === $text ) {
			$text = has_excerpt( $post ) ? $post->post_excerpt : $post->post_content;
		}
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$term = get_queried_object();
		$text = term_description( $term );
		if ( '' === trim( wp_strip_all_tags( $text ) ) ) {
			/* translators: %s: topic name. */
			$text = sprintf( __( 'Articles on %s from the Abrahamic Religions journal.', 'abrahamic' ), $term->name );
		}
	}
	return abr_seo_finish_description( $text );
}

/**
 * A description under 130 characters that ends with a call to action. Written
 * descriptions already end with one ("Read the answer.", "Compare them here.");
 * one is added to any description that lacks it, the text being shortened at a
 * word boundary to make room.
 *
 * @param string $text Description.
 * @return string
 */
function abr_seo_finish_description( $text ) {
	$text = trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags( strip_shortcodes( (string) $text ) ) ) );
	if ( '' === $text ) {
		return '';
	}
	$sentences = preg_split( '/(?<=[.!?])\s+/u', $text );
	$last      = (string) end( $sentences );
	$has_cta   = (bool) preg_match( '/\b(read|discover|find|learn|explore|see|compare|walk|browse|get|start|meet|follow|trace|study|look|visit|contact|write|ask|check|view|search|choose|make|help|join|subscribe|donate)\b/i', $last );
	if ( $has_cta ) {
		return abr_seo_trim( $text );
	}
	if ( is_front_page() ) {
		$cta = __( 'Explore the guide.', 'abrahamic' );
	} elseif ( is_home() || is_archive() ) {
		$cta = __( 'Browse the articles.', 'abrahamic' );
	} else {
		$cta = __( 'Read more.', 'abrahamic' );
	}
	$room = ABR_DESCRIPTION_MAX - mb_strlen( $cta ) - 1;
	$body = mb_strlen( $text ) <= $room ? $text : preg_replace( '/\s+\S*$/u', '', mb_substr( $text, 0, $room ) );
	$body = rtrim( $body, " ,;:-–" );
	if ( ! preg_match( '/[.!?…]$/u', $body ) ) {
		$body .= '.';
	}
	return $body . ' ' . $cta;
}

/**
 * Short search title for a post: the editor's "Search title" (_abr_seo_title)
 * if set, else the starter content's short title (inc/seed/seo-titles.php),
 * else the post title.
 *
 * @param int    $post_id Post ID.
 * @param string $title   Post title.
 * @return string
 */
function abr_short_title( $post_id, $title ) {
	$custom = trim( (string) get_post_meta( $post_id, '_abr_seo_title', true ) );
	if ( '' !== $custom ) {
		return $custom;
	}
	static $map = null;
	if ( null === $map ) {
		$file = ABR_DIR . '/inc/seed/seo-titles.php';
		$map  = is_readable( $file ) ? require $file : array();
	}
	$key = (string) get_post_meta( $post_id, '_abr_seed', true );
	return ( '' !== $key && isset( $map[ $key ] ) ) ? $map[ $key ] : $title;
}

/**
 * Title of the home page, without the site name.
 *
 * @return string
 */
function abr_home_title() {
	$title = trim( (string) abr_get_option( 'home_title' ) );
	return '' !== $title ? $title : 'A guide to the four Abrahamic faiths';
}

/**
 * A title with the site's branding: "Title | Abrahamic Religions". Any
 * existing site-name suffix, with whatever separator, is replaced, so the
 * branding is identical whether the theme or an SEO plugin wrote the title.
 *
 * @param string $title Title, with or without a site-name suffix.
 * @return string
 */
function abr_branded_title( $title ) {
	$site  = wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES );
	$title = trim( html_entity_decode( wp_strip_all_tags( (string) $title ), ENT_QUOTES | ENT_HTML5, 'UTF-8' ) );
	$title = trim( (string) preg_replace( '/\s*[-–—|·:»]\s*' . preg_quote( $site, '/' ) . '\s*$/u', '', $title ) );
	if ( '' === $title || 0 === strcasecmp( $title, $site ) ) {
		return $site;
	}
	$suffix = ' | ' . $site;
	$room   = ABR_TITLE_MAX - mb_strlen( $suffix );
	if ( mb_strlen( $title ) > $room ) {
		// No short title was written for this page: shorten at a word boundary.
		$title = rtrim( (string) preg_replace( '/\s+\S*$/u', '', mb_substr( $title, 0, $room + 1 ) ), " ,;:.-–" );
	}
	return $title . $suffix;
}

/**
 * The document title: "Title | Abrahamic Religions", and on the home page the
 * home page title (never the page's own name, "Home").
 *
 * @param array $parts Title parts.
 * @return array
 */
function abr_document_title_parts( $parts ) {
	if ( is_front_page() ) {
		return array(
			'title' => abr_home_title(),
			'site'  => get_bloginfo( 'name' ),
		);
	}
	unset( $parts['tagline'] );
	if ( is_search() ) {
		// "Search: query", the query shortened to fit the 60-character limit.
		$room           = ABR_TITLE_MAX - mb_strlen( ' | ' . get_bloginfo( 'name' ) ) - 10;
		$query          = trim( get_search_query( false ) );
		$query          = mb_strlen( $query ) > $room ? rtrim( mb_substr( $query, 0, $room - 1 ) ) . '…' : $query;
		$parts['title'] = sprintf( /* translators: %s: search terms. */ __( 'Search: %s', 'abrahamic' ), $query );
		return $parts;
	}
	if ( isset( $parts['title'] ) ) {
		$short          = is_singular() ? abr_short_title( get_queried_object_id(), $parts['title'] ) : $parts['title'];
		$parts['title'] = str_replace( ' | ' . get_bloginfo( 'name' ), '', abr_branded_title( $short ) );
	}
	return $parts;
}
add_filter( 'document_title_parts', 'abr_document_title_parts', 20 );
add_filter(
	'document_title_separator',
	function () {
		return '|';
	},
	20
);

/**
 * Rank Math, when active, always has the last word. Wherever an editor has set
 * a title or description in Rank Math (on a post, page or topic), Rank Math's
 * text is used untouched. Where nothing has been set there, Rank Math would fall
 * back to its own generic templates ("Home - Abrahamic Religions"); in those
 * cases the theme's defaults are used instead: the short title with
 * "| Abrahamic Religions", under 60 characters, and the description under 130
 * characters with a call to action.
 *
 * @param string $field Rank Math meta key: rank_math_title, rank_math_description,
 *                      rank_math_facebook_title, rank_math_facebook_description,
 *                      rank_math_twitter_title or rank_math_twitter_description.
 * @return bool Whether an editor set this field for the current view.
 */
function abr_rank_math_has( $field ) {
	$object = get_queried_object();
	if ( is_front_page() && ! is_home() ) {
		$object = get_post( (int) get_option( 'page_on_front' ) );
	} elseif ( is_home() && ! is_front_page() ) {
		$object = get_post( (int) get_option( 'page_for_posts' ) );
	}
	if ( $object instanceof WP_Post ) {
		return '' !== trim( (string) get_post_meta( $object->ID, $field, true ) );
	}
	if ( $object instanceof WP_Term ) {
		return '' !== trim( (string) get_term_meta( $object->term_id, $field, true ) );
	}
	return false;
}

/**
 * The theme's default title for the current view, with its branding.
 *
 * @return string
 */
function abr_default_title() {
	return abr_branded_title( abr_seo_title() );
}

/**
 * Rank Math title filters: Rank Math's own text when an editor set it,
 * otherwise the theme default.
 *
 * @param string $title Title from Rank Math.
 * @return string
 */
function abr_rank_math_title( $title ) {
	return abr_rank_math_has( 'rank_math_title' ) ? $title : abr_default_title();
}

/**
 * Rank Math social title filters.
 *
 * @param string $title Title from Rank Math.
 * @return string
 */
function abr_rank_math_social_title( $title ) {
	$field = 'rank_math/opengraph/twitter/twitter_title' === current_filter() ? 'rank_math_twitter_title' : 'rank_math_facebook_title';
	return ( abr_rank_math_has( $field ) || abr_rank_math_has( 'rank_math_title' ) ) ? $title : abr_default_title();
}

/**
 * Rank Math description filters.
 *
 * @param string $description Description from Rank Math.
 * @return string
 */
function abr_rank_math_description( $description ) {
	$field = 'rank_math_description';
	if ( 'rank_math/opengraph/facebook/og_description' === current_filter() && abr_rank_math_has( 'rank_math_facebook_description' ) ) {
		return $description;
	}
	if ( 'rank_math/opengraph/twitter/twitter_description' === current_filter() && abr_rank_math_has( 'rank_math_twitter_description' ) ) {
		return $description;
	}
	if ( abr_rank_math_has( $field ) ) {
		return $description;
	}
	$ours = abr_seo_description();
	return '' !== $ours ? $ours : $description;
}
add_filter( 'rank_math/frontend/title', 'abr_rank_math_title', 20 );
add_filter( 'rank_math/opengraph/facebook/og_title', 'abr_rank_math_social_title', 20 );
add_filter( 'rank_math/opengraph/twitter/twitter_title', 'abr_rank_math_social_title', 20 );
add_filter( 'rank_math/frontend/description', 'abr_rank_math_description', 20 );
add_filter( 'rank_math/opengraph/facebook/og_description', 'abr_rank_math_description', 20 );
add_filter( 'rank_math/opengraph/twitter/twitter_description', 'abr_rank_math_description', 20 );

/**
 * Title of the current view, without the site name.
 *
 * @return string
 */
function abr_seo_title() {
	if ( is_front_page() ) {
		return abr_home_title();
	}
	if ( is_home() ) {
		$id = (int) get_option( 'page_for_posts' );
		return $id ? get_the_title( $id ) : get_bloginfo( 'name' );
	}
	if ( is_singular() ) {
		return abr_short_title( get_queried_object_id(), single_post_title( '', false ) );
	}
	if ( is_archive() ) {
		return wp_strip_all_tags( get_the_archive_title() );
	}
	return wp_get_document_title();
}

/**
 * Canonical address of the current view, or an empty string where none applies.
 *
 * @return string
 */
function abr_seo_canonical() {
	if ( is_404() || is_search() ) {
		return '';
	}
	if ( is_singular() ) {
		$url = wp_get_canonical_url();
		return $url ? $url : '';
	}
	$paged = max( 1, (int) get_query_var( 'paged' ) );
	if ( is_front_page() ) {
		$base = home_url( '/' );
	} elseif ( is_home() ) {
		$id   = (int) get_option( 'page_for_posts' );
		$base = $id ? get_permalink( $id ) : home_url( '/' );
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$base = get_term_link( get_queried_object() );
	} else {
		return strtok( get_pagenum_link( $paged ), '?' );
	}
	if ( is_wp_error( $base ) ) {
		return '';
	}
	return $paged > 1 ? trailingslashit( $base ) . user_trailingslashit( 'page/' . $paged, 'paged' ) : $base;
}

/**
 * Share image: featured image, the Search tab image, or the bundled image.
 *
 * @return array { url, width, height }
 */
function abr_seo_image() {
	if ( is_singular() && has_post_thumbnail() ) {
		$src = wp_get_attachment_image_src( get_post_thumbnail_id( get_queried_object_id() ), 'full' );
		if ( $src ) {
			return array(
				'url'    => $src[0],
				'width'  => (int) $src[1],
				'height' => (int) $src[2],
			);
		}
	}
	$custom = abr_get_option( 'share_image' );
	if ( $custom ) {
		return array(
			'url'    => $custom,
			'width'  => 0,
			'height' => 0,
		);
	}
	return array(
		'url'    => ABR_URI . '/assets/images/share.png',
		'width'  => 1200,
		'height' => 630,
	);
}

/**
 * Organisation logo: the Search tab logo, the site icon, or the bundled logo.
 *
 * @return array { url, width, height }
 */
function abr_seo_logo() {
	$custom = abr_get_option( 'org_logo' );
	if ( $custom ) {
		return array(
			'url'    => $custom,
			'width'  => 0,
			'height' => 0,
		);
	}
	if ( has_site_icon() ) {
		return array(
			'url'    => get_site_icon_url( 512 ),
			'width'  => 512,
			'height' => 512,
		);
	}
	return array(
		'url'    => ABR_URI . '/assets/images/logo.png',
		'width'  => 512,
		'height' => 512,
	);
}

/**
 * ImageObject for structured data.
 *
 * @param array  $image Image array.
 * @param string $id    Node ID.
 * @return array
 */
function abr_schema_image( $image, $id = '' ) {
	$node = array(
		'@type' => 'ImageObject',
		'url'   => $image['url'],
	);
	if ( $id ) {
		$node['@id'] = $id;
	}
	if ( $image['width'] ) {
		$node['width']  = $image['width'];
		$node['height'] = $image['height'];
	}
	return $node;
}

/**
 * Credit and licence of a bundled photograph (inc/seed/photo-credits.php).
 *
 * @param string $name Photo file stem.
 * @return array|null
 */
function abr_photo_credit( $name ) {
	static $credits = null;
	if ( null === $credits ) {
		$file    = ABR_DIR . '/inc/seed/photo-credits.php';
		$credits = is_readable( $file ) ? require $file : array();
	}
	return isset( $credits[ $name ] ) ? $credits[ $name ] : null;
}

/**
 * ImageObject with Google's image licence properties: contentUrl, licence,
 * the page where the image can be obtained, the creator and a credit line.
 *
 * @param string $url  Image URL as shown on the page.
 * @param string $name Photo file stem.
 * @param string $id   Node ID.
 * @return array|null
 */
function abr_schema_licensed_image( $url, $name, $id = '' ) {
	$credit = abr_photo_credit( $name );
	if ( ! $credit || '' === $url ) {
		return null;
	}
	$node = array(
		'@type'      => 'ImageObject',
		'contentUrl' => $url,
		'url'        => $url,
		'license'    => $credit['license'],
	);
	if ( $id ) {
		$node['@id'] = $id;
	}
	if ( '' !== $credit['page'] ) {
		$node['acquireLicensePage'] = $credit['page'];
	}
	$who = '' !== $credit['creator'] ? $credit['creator'] : $credit['source'];
	if ( '' !== $credit['creator'] ) {
		$node['creator'] = array(
			'@type' => 'Person',
			'name'  => $credit['creator'],
		);
	}
	$node['creditText']      = $who . ' / ' . $credit['source'];
	$node['copyrightNotice'] = $who . ', ' . $credit['licence'];
	return $node;
}

/**
 * Photographs placed in a post's content with [abr_photo name="..."].
 *
 * @param WP_Post $post Post.
 * @return string[] File stems.
 */
function abr_content_photo_names( $post ) {
	preg_match_all( '/\[abr_photo\s+name="([a-z0-9-]+)"/', (string) $post->post_content, $m );
	return array_values( array_unique( $m[1] ) );
}

/**
 * Posts whose content is written as questions and answers (H2 question, then
 * the answer), which also carry FAQPage structured data.
 *
 * @return string[] Seed keys.
 */
function abr_faq_style_keys() {
	return array( 'page:faq', 'post:islamic-dilemma-reddit', 'post:judaism-vs-christianity-reddit' );
}

/**
 * Structured data graph for the current view.
 *
 * @return array
 */
function abr_schema_graph() {
	$home     = home_url( '/' );
	$org_id   = $home . '#organization';
	$site_id  = $home . '#website';
	$language = get_bloginfo( 'language' );
	$tagline  = get_bloginfo( 'description' );

	$org = array(
		'@type' => 'Organization',
		'@id'   => $org_id,
		'name'  => get_bloginfo( 'name' ),
		'url'   => $home,
		'logo'  => abr_schema_image( abr_seo_logo(), $home . '#logo' ),
	);
	if ( $tagline ) {
		$org['description'] = $tagline;
	}
	$same_as = array_values( wp_list_pluck( abr_social_profiles(), 'url' ) );
	if ( $same_as ) {
		$org['sameAs'] = $same_as;
	}
	if ( is_email( abr_get_option( 'contact_email' ) ) ) {
		$org['email'] = abr_get_option( 'contact_email' );
	}

	$graph = array(
		$org,
		array_filter(
			array(
				'@type'       => 'WebSite',
				'@id'         => $site_id,
				'url'         => $home,
				'name'        => get_bloginfo( 'name' ),
				'description' => $tagline,
				'publisher'   => array( '@id' => $org_id ),
				'inLanguage'  => $language,
			)
		),
	);

	$url = abr_seo_canonical();
	if ( ! $url ) {
		return $graph;
	}

	$type = 'WebPage';
	if ( is_home() || is_archive() ) {
		$type = 'CollectionPage';
	} elseif ( is_page() && get_queried_object_id() === abr_seed_id( 'page:about' ) ) {
		$type = 'AboutPage';
	} elseif ( is_page() && get_queried_object_id() === abr_seed_id( 'page:contact' ) ) {
		$type = 'ContactPage';
	}

	$page_id = $url . '#webpage';
	$webpage = array_filter(
		array(
			'@type'       => $type,
			'@id'         => $page_id,
			'url'         => $url,
			'name'        => abr_seo_title(),
			'description' => abr_seo_description(),
			'isPartOf'    => array( '@id' => $site_id ),
			'inLanguage'  => $language,
		)
	);

	$trail = abr_breadcrumb_trail();
	if ( count( $trail ) > 1 ) {
		$items = array();
		foreach ( array_values( $trail ) as $i => $crumb ) {
			$item = array(
				'@type'    => 'ListItem',
				'position' => $i + 1,
				'name'     => $crumb['name'],
			);
			if ( '' !== $crumb['url'] ) {
				$item['item'] = $crumb['url'];
			}
			$items[] = $item;
		}
		$webpage['breadcrumb'] = array( '@id' => $url . '#breadcrumb' );
		$graph[]               = array(
			'@type'           => 'BreadcrumbList',
			'@id'             => $url . '#breadcrumb',
			'itemListElement' => $items,
		);
	}

	if ( is_singular( 'post' ) ) {
		$post   = get_queried_object();
		$image  = abr_seo_image();
		// The site itself is the author of every article: no person is named.
		$author = array( '@id' => $org_id );
		$thumb_id = get_post_thumbnail_id( $post );
		$featured = $thumb_id ? abr_schema_licensed_image( (string) wp_get_attachment_url( $thumb_id ), pathinfo( (string) get_attached_file( $thumb_id ), PATHINFO_FILENAME ), $url . '#primaryimage' ) : null;
		$webpage['primaryImageOfPage'] = $featured ? array( '@id' => $url . '#primaryimage' ) : abr_schema_image( $image );
		if ( $featured ) {
			$graph[] = $featured;
		}
		$graph[]                       = array_filter(
			array(
				'@type'            => 'Article',
				'@id'              => $url . '#article',
				'headline'         => mb_substr( wp_strip_all_tags( get_the_title( $post ) ), 0, 110 ),
				'description'      => abr_seo_description(),
				'url'              => $url,
				'datePublished'    => get_post_time( 'c', true, $post ),
				'dateModified'     => get_post_modified_time( 'c', true, $post ),
				'author'           => $author,
				'publisher'        => array( '@id' => $org_id ),
				'mainEntityOfPage' => array( '@id' => $page_id ),
				'image'            => $featured ? array( '@id' => $url . '#primaryimage' ) : array( $image['url'] ),
				'speakable'        => array(
					'@type'       => 'SpeakableSpecification',
					'cssSelector' => array( 'h1', '.abr-prose > p:first-of-type' ),
				),
				'articleSection'   => wp_list_pluck( get_the_category( $post->ID ), 'name' ),
				'wordCount'        => str_word_count( wp_strip_all_tags( $post->post_content ) ),
				'inLanguage'       => $language,
			)
		);
	}

	if ( is_singular() ) {
		$post_obj = get_queried_object();
		$images   = array();
		foreach ( abr_content_photo_names( $post_obj ) as $i => $name ) {
			$node = abr_schema_licensed_image( ABR_URI . '/assets/images/photos/' . rawurlencode( $name ) . '.avif', $name, $url . '#image-' . ( $i + 1 ) );
			if ( $node ) {
				$graph[]  = $node;
				$images[] = array( '@id' => $node['@id'] );
			}
		}
		if ( $images ) {
			$webpage['image'] = $images;
		}
	}

	$faq_ids = array_filter( array_map( 'abr_seed_id', abr_faq_style_keys() ) );
	if ( is_singular() && in_array( get_queried_object_id(), $faq_ids, true ) ) {
		$pairs = abr_faq_qa_pairs( get_queried_object() );
		if ( $pairs ) {
			$graph[] = array(
				'@type'      => 'FAQPage',
				'@id'        => $url . '#faq',
				'mainEntity' => $pairs,
			);
		}
	}

	$graph[] = $webpage;
	return $graph;
}

/**
 * Question/answer pairs read from the FAQ page's own headings and the
 * paragraph that follows each one, for FAQPage structured data.
 *
 * @param WP_Post $post The FAQ page.
 * @return array
 */
function abr_faq_qa_pairs( $post ) {
	if ( ! preg_match_all( '#<h2[^>]*>(.*?)</h2>\\s*(?:<!--.*?-->\\s*)*<p[^>]*>(.*?)</p>#s', $post->post_content, $m, PREG_SET_ORDER ) ) {
		return array();
	}
	$pairs = array();
	foreach ( $m as $match ) {
		$question = trim( wp_strip_all_tags( $match[1] ) );
		// Footnote markers are dropped from the answer text.
		$answer   = trim( wp_strip_all_tags( preg_replace( '#<sup[^>]*>.*?</sup>#s', '', $match[2] ) ) );
		if ( '' === $question || '' === $answer || 'Notes' === $question ) {
			continue;
		}
		$pairs[] = array(
			'@type'          => 'Question',
			'name'           => $question,
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => $answer,
			),
		);
	}
	return $pairs;
}

/**
 * Verification codes (always), then the theme's search tags when active.
 */
function abr_seo_head() {
	$codes = array(
		'google-site-verification' => abr_get_option( 'google_verification' ),
		'msvalidate.01'            => abr_get_option( 'bing_verification' ),
	);
	foreach ( $codes as $name => $value ) {
		if ( '' !== $value ) {
			printf( '<meta name="%s" content="%s">' . "\n", esc_attr( $name ), esc_attr( $value ) );
		}
	}

	if ( ! abr_seo_active() ) {
		return;
	}

	$description = abr_seo_description();
	$canonical   = abr_seo_canonical();
	$image       = abr_seo_image();
	$title       = abr_branded_title( abr_seo_title() );

	if ( '' !== $description ) {
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( $description ) );
	}
	if ( $canonical && ! is_singular() ) {
		printf( '<link rel="canonical" href="%s">' . "\n", esc_url( $canonical ) );
	}

	$og = array(
		'og:site_name'   => get_bloginfo( 'name' ),
		'og:locale'      => str_replace( '-', '_', get_bloginfo( 'language' ) ),
		'og:type'        => is_singular( 'post' ) ? 'article' : 'website',
		'og:title'       => $title,
		'og:description' => $description,
		'og:url'         => $canonical,
		'og:image'       => $image['url'],
	);
	if ( $image['width'] ) {
		$og['og:image:width']  = $image['width'];
		$og['og:image:height'] = $image['height'];
	}
	if ( is_singular( 'post' ) ) {
		$og['article:published_time'] = get_post_time( 'c', true );
		$og['article:modified_time']  = get_post_modified_time( 'c', true );
	}
	foreach ( array_filter( $og ) as $property => $content ) {
		printf( '<meta property="%s" content="%s">' . "\n", esc_attr( $property ), esc_attr( $content ) );
	}

	$twitter = array(
		'twitter:card'        => 'summary_large_image',
		'twitter:title'       => $title,
		'twitter:description' => $description,
		'twitter:image'       => $image['url'],
	);
	if ( preg_match( '#(?:x|twitter)\.com/@?([A-Za-z0-9_]{1,15})/?$#', abr_get_option( 'social_x' ), $m ) ) {
		$twitter['twitter:site'] = '@' . $m[1];
	}
	foreach ( array_filter( $twitter ) as $name => $content ) {
		printf( '<meta name="%s" content="%s">' . "\n", esc_attr( $name ), esc_attr( $content ) );
	}

	printf(
		'<script type="application/ld+json">%s</script>' . "\n",
		wp_json_encode(
			array(
				'@context' => 'https://schema.org',
				'@graph'   => abr_schema_graph(),
			),
			JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP
		)
	);
}
add_action( 'wp_head', 'abr_seo_head', 2 );

/**
 * Robots directives: keep thin and duplicate views out of the index.
 *
 * @param array $robots Directives.
 * @return array
 */
function abr_seo_robots( $robots ) {
	if ( ! abr_seo_active() ) {
		return $robots;
	}
	if ( is_404() || is_date() || is_author() || is_attachment() ) {
		$robots['noindex'] = true;
		$robots['follow']  = true;
	}
	return $robots;
}
add_filter( 'wp_robots', 'abr_seo_robots' );

/**
 * robots.txt: keep internal search results out of the crawl.
 *
 * @param string $output robots.txt.
 * @param bool   $public Whether the site is public.
 * @return string
 */
function abr_seo_robots_txt( $output, $public ) {
	if ( ! $public || ! abr_seo_active() ) {
		return $output;
	}
	$path  = (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH );
	$rules = 'Disallow: ' . $path . '?s=' . "\n" . 'Disallow: ' . $path . 'search/' . "\n";
	if ( false !== strpos( $output, "Allow: {$path}wp-admin/admin-ajax.php\n" ) ) {
		return str_replace( "Allow: {$path}wp-admin/admin-ajax.php\n", "Allow: {$path}wp-admin/admin-ajax.php\n" . $rules, $output );
	}
	return $output . $rules;
}
add_filter( 'robots_txt', 'abr_seo_robots_txt', -1, 2 );

/**
 * XML sitemap: leave out author archives, which duplicate the article listings.
 *
 * @param WP_Sitemaps_Provider|false $provider Provider.
 * @param string                     $name     Provider name.
 * @return WP_Sitemaps_Provider|false
 */
function abr_seo_sitemap_providers( $provider, $name ) {
	return ( 'users' === $name && abr_seo_active() ) ? false : $provider;
}
add_filter( 'wp_sitemaps_add_provider', 'abr_seo_sitemap_providers', 10, 2 );

/**
 * Feed links and page excerpts, which the hub cards and descriptions use.
 */
function abr_seo_supports() {
	add_theme_support( 'automatic-feed-links' );
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'after_setup_theme', 'abr_seo_supports' );

/**
 * Register the description field.
 */
function abr_seo_register_meta() {
	foreach ( array( 'post', 'page' ) as $type ) {
		register_post_meta(
			$type,
			'_abr_description',
			array(
				'type'              => 'string',
				'single'            => true,
				'show_in_rest'      => false,
				'sanitize_callback' => 'sanitize_textarea_field',
				'auth_callback'     => function ( $allowed, $meta_key, $post_id ) {
					return current_user_can( 'edit_post', $post_id );
				},
			)
		);
	}
}
add_action( 'init', 'abr_seo_register_meta' );

/**
 * "Search description" box on posts and pages.
 */
function abr_seo_add_meta_box() {
	if ( ! abr_seo_active() ) {
		return;
	}
	foreach ( array( 'post', 'page' ) as $type ) {
		add_meta_box( 'abr-search-description', __( 'Search description', 'abrahamic' ), 'abr_seo_render_meta_box', $type, 'side', 'default' );
	}
}
add_action( 'add_meta_boxes', 'abr_seo_add_meta_box' );

/**
 * Meta box markup.
 *
 * @param WP_Post $post Post.
 */
function abr_seo_render_meta_box( $post ) {
	wp_nonce_field( 'abr_description_' . $post->ID, 'abr_description_nonce' );
	$value = get_post_meta( $post->ID, '_abr_description', true );
	printf(
		'<label class="screen-reader-text" for="abr-description">%1$s</label><textarea id="abr-description" name="abr_description" rows="4" class="widefat abr-description" data-limit="130" aria-describedby="abr-description-help">%2$s</textarea><p id="abr-description-help" class="description">%3$s <span class="abr-description-count" aria-live="polite"></span></p>',
		esc_html__( 'Search description', 'abrahamic' ),
		esc_textarea( $value ),
		esc_html__( 'Shown in search results and link previews. Aim for 130 characters or fewer, ending with a call to action. Leave empty to use the excerpt.', 'abrahamic' )
	);
}

/**
 * Save the description.
 *
 * @param int $post_id Post ID.
 */
function abr_seo_save_meta_box( $post_id ) {
	if ( ! isset( $_POST['abr_description_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['abr_description_nonce'] ) ), 'abr_description_' . $post_id ) ) {
		return;
	}
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$value = isset( $_POST['abr_description'] ) ? sanitize_textarea_field( wp_unslash( $_POST['abr_description'] ) ) : '';
	if ( '' === $value ) {
		delete_post_meta( $post_id, '_abr_description' );
	} else {
		update_post_meta( $post_id, '_abr_description', $value );
	}
}
add_action( 'save_post', 'abr_seo_save_meta_box' );

/**
 * Character counter for the description box.
 *
 * @param string $hook Admin screen.
 */
function abr_seo_editor_assets( $hook ) {
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ), true ) && abr_seo_active() ) {
		wp_enqueue_script( 'abr-description', ABR_URI . '/assets/js/description.js', array(), ABR_VERSION, true );
	}
}
add_action( 'admin_enqueue_scripts', 'abr_seo_editor_assets' );

/**
 * Google Analytics 4, for visitors who are not editors.
 */
function abr_seo_analytics() {
	$id = abr_get_option( 'ga4_id' );
	if ( '' === $id || current_user_can( 'edit_posts' ) ) {
		return;
	}
	wp_enqueue_script( 'abr-gtag', 'https://www.googletagmanager.com/gtag/js?id=' . rawurlencode( $id ), array(), null, array( 'strategy' => 'async' ) ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
	wp_enqueue_script( 'abr-analytics', ABR_URI . '/assets/js/analytics.js', array(), ABR_VERSION, array( 'strategy' => 'defer' ) );
}
add_action( 'wp_enqueue_scripts', 'abr_seo_analytics' );

/**
 * Pass the measurement ID to analytics.js as a data attribute.
 *
 * @param string $tag    Script tag.
 * @param string $handle Handle.
 * @return string
 */
function abr_seo_analytics_tag( $tag, $handle ) {
	if ( 'abr-analytics' === $handle ) {
		$tag = str_replace( '<script ', '<script data-ga-id="' . esc_attr( abr_get_option( 'ga4_id' ) ) . '" ', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'abr_seo_analytics_tag', 10, 2 );
