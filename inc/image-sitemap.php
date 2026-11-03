<?php
/**
 * Image sitemap at /image-sitemap.xml.
 *
 * WordPress's own sitemaps carry no image entries. This file lists every
 * published post and page with the images it shows: the featured image and
 * each bundled photograph placed with [abr_photo]. robots.txt names it. Rank
 * Math and other SEO plugins write their own image entries, so the file stands
 * down while one is active.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Entries of the image sitemap: page address and image addresses.
 *
 * @return array[] Each with 'loc' and 'images'.
 */
function abr_image_sitemap_entries() {
	$entries = array();
	$exclude = array_merge( function_exists( 'abr_seo_utility_ids' ) ? abr_seo_utility_ids() : array(), function_exists( 'abr_unlisted_ids' ) ? abr_unlisted_ids() : array() );
	$paged   = 1;
	do {
		// Batches of 200, so every post is listed without one unbounded query.
		$posts = get_posts(
			array(
				'post_type'        => array( 'post', 'page' ),
				'post_status'      => 'publish',
				'posts_per_page'   => 200,
				'paged'            => $paged,
				'has_password'     => false,
				'post__not_in'     => $exclude,
				'orderby'          => 'ID',
				'order'            => 'ASC',
				'no_found_rows'    => true,
				'suppress_filters' => false,
			)
		);
		foreach ( $posts as $post ) {
			$entry = abr_image_sitemap_entry( $post );
			if ( $entry ) {
				$entries[] = $entry;
			}
		}
		++$paged;
	} while ( count( $posts ) === 200 );
	return $entries;
}

/**
 * One post's entry of the image sitemap.
 *
 * @param WP_Post $post Post.
 * @return array|null With 'loc' and 'images', or null when it shows no image.
 */
function abr_image_sitemap_entry( $post ) {
	$images   = array();
	$thumb_id = get_post_thumbnail_id( $post );
	if ( $thumb_id ) {
		$images[] = (string) wp_get_attachment_url( $thumb_id );
	}
	foreach ( abr_content_photo_names( $post ) as $name ) {
		$images[] = ABR_URI . '/assets/images/photos/' . rawurlencode( $name ) . '.avif';
	}
	$images = array_values( array_unique( array_filter( $images ) ) );
	if ( $images ) {
		return array(
			'loc'    => get_permalink( $post ),
			'images' => array_slice( $images, 0, 1000 ),
		);
	}
	return null;
}

/**
 * Whether the theme serves the image sitemap: whenever no SEO plugin supplies
 * one. The theme's search setting covers head tags and structured data only.
 *
 * @return bool
 */
function abr_image_sitemap_active() {
	/**
	 * Filters whether the theme serves /image-sitemap.xml.
	 *
	 * @param bool $enabled True when no SEO plugin is active.
	 */
	return (bool) apply_filters( 'abr_image_sitemap_enabled', '' === abr_seo_plugin() );
}

/**
 * The image sitemap as XML.
 *
 * @return string
 */
function abr_image_sitemap_xml() {
	$xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
		. '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
	foreach ( abr_image_sitemap_entries() as $entry ) {
		$xml .= "\t<url>\n\t\t<loc>" . esc_url( $entry['loc'] ) . "</loc>\n";
		foreach ( $entry['images'] as $image ) {
			$xml .= "\t\t<image:image><image:loc>" . esc_url( $image ) . "</image:loc></image:image>\n";
		}
		$xml .= "\t</url>\n";
	}
	return $xml . '</urlset>' . "\n";
}

/**
 * Serve /image-sitemap.xml.
 *
 * @param WP $wp Request.
 */
function abr_image_sitemap_serve( $wp ) {
	if ( 'image-sitemap.xml' !== $wp->request || ! abr_image_sitemap_active() || ! get_option( 'blog_public' ) ) {
		return;
	}
	status_header( 200 );
	header( 'Content-Type: application/xml; charset=UTF-8' );
	header( 'X-Robots-Tag: noindex, follow' );
	echo abr_image_sitemap_xml(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- every value is escaped above.
	exit;
}
add_action( 'parse_request', 'abr_image_sitemap_serve', 0 );

/**
 * robots.txt: name the image sitemap.
 *
 * @param string $output robots.txt.
 * @param bool   $public Whether the site is public.
 * @return string
 */
function abr_image_sitemap_robots_txt( $output, $public ) {
	if ( ! $public || ! abr_image_sitemap_active() || ! get_option( 'permalink_structure' ) ) {
		return $output;
	}
	return rtrim( $output ) . "\nSitemap: " . esc_url( home_url( '/image-sitemap.xml' ) ) . "\n";
}
add_filter( 'robots_txt', 'abr_image_sitemap_robots_txt', 20, 2 );
