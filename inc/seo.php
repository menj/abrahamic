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

/**
 * Plain text trimmed to a length at a word boundary.
 *
 * @param string $text  Text.
 * @param int    $limit Characters.
 * @return string
 */
function abr_seo_trim( $text, $limit = 130 ) {
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
	return abr_seo_trim( $text );
}

/**
 * Title of the current view, without the site name.
 *
 * @return string
 */
function abr_seo_title() {
	if ( is_front_page() ) {
		return trim( get_bloginfo( 'name' ) . ( get_bloginfo( 'description' ) ? ' – ' . get_bloginfo( 'description' ) : '' ) );
	}
	if ( is_home() ) {
		$id = (int) get_option( 'page_for_posts' );
		return $id ? get_the_title( $id ) : get_bloginfo( 'name' );
	}
	if ( is_singular() ) {
		return single_post_title( '', false );
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
		$webpage['primaryImageOfPage'] = abr_schema_image( $image );
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
				'image'            => array( $image['url'] ),
				'articleSection'   => wp_list_pluck( get_the_category( $post->ID ), 'name' ),
				'wordCount'        => str_word_count( wp_strip_all_tags( $post->post_content ) ),
				'inLanguage'       => $language,
			)
		);
	}

	$faq_key = abr_seed_id( 'page:faq' );
	if ( is_singular( 'page' ) && $faq_key && get_queried_object_id() === $faq_key ) {
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
		$answer   = trim( wp_strip_all_tags( $match[2] ) );
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
	$title       = abr_seo_title();

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
