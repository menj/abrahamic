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
	$posts   = get_posts(
		array(
			'post_type'        => array( 'post', 'page' ),
			'post_status'      => 'publish',
			'posts_per_page'   => 1000,
			'has_password'     => false,
			'post__not_in'     => array_merge( function_exists( 'abr_seo_utility_ids' ) ? abr_seo_utility_ids() : array(), function_exists( 'abr_unlisted_ids' ) ? abr_unlisted_ids() : array() ),
			'orderby'          => 'ID',
			'order'            => 'ASC',
			'suppress_filters' => false,
		)
	);
	foreach ( $posts as $post ) {
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
			$entries[] = array(
				'loc'    => get_permalink( $post ),
				'images' => array_slice( $images, 0, 1000 ),
			);
		}
	}
	return $entries;
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
	if ( 'image-sitemap.xml' !== $wp->request || ! abr_seo_active() || ! get_option( 'blog_public' ) ) {
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
	if ( ! $public || ! abr_seo_active() || ! get_option( 'permalink_structure' ) ) {
		return $output;
	}
	return rtrim( $output ) . "\nSitemap: " . esc_url( home_url( '/image-sitemap.xml' ) ) . "\n";
}
add_filter( 'robots_txt', 'abr_image_sitemap_robots_txt', 20, 2 );
