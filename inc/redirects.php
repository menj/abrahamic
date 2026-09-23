<?php
/**
 * Permanent redirects from earlier addresses.
 *
 * Covers the 2.3.0 addresses of seeded pages and articles (inc/seed/legacy-v1.php),
 * category archives under the former /category/ base, and the sections renamed in
 * the sections the theme has renamed (/articles/ and /insights/ to /journal/,
 * /knowledge-base/ to /reference/). Runs only for requests
 * that would otherwise end in a 404, before WordPress guesses a destination.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Current request path relative to the site root, with a trailing slash.
 *
 * @return string
 */
function abr_request_path() {
	$uri  = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '/'; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	$path = (string) wp_parse_url( $uri, PHP_URL_PATH );
	$home = (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH );
	if ( '/' !== $home && 0 === strpos( $path, $home ) ) {
		$path = '/' . substr( $path, strlen( $home ) );
	}
	return trailingslashit( '/' . ltrim( rawurldecode( $path ), '/' ) );
}

/**
 * Earlier addresses, from the 2016 to 2023 site and from the theme's own renames.
 *
 * @return array path => seed key
 */
function abr_legacy_paths() {
	static $map = null;
	if ( null === $map ) {
		$map = require ABR_DIR . '/inc/seed/legacy-paths.php';
	}
	return $map;
}

/**
 * Section prefixes the theme has renamed: earlier prefix => current prefix.
 *
 * @return array
 */
function abr_renamed_prefixes() {
	return array(
		'/articles/'       => '/journal/',
		'/insights/'       => '/journal/',
		'/knowledge-base/' => '/reference/',
	);
}

/**
 * Current address for a path under the current structure, or an empty string
 * when nothing answers there.
 *
 * @param string $path Root-relative path with a trailing slash.
 * @return string
 */
function abr_resolve_current_path( $path ) {
	$base = trim( (string) get_option( 'category_base' ), '/' );
	// Topic archives, with pages.
	if ( '' !== $base && preg_match( '#^/' . preg_quote( $base, '#' ) . '/([^/]+)/(?:page/(\d+)/)?$#', $path, $m ) ) {
		$term = get_term_by( 'slug', sanitize_title( $m[1] ), 'category' );
		if ( ! $term ) {
			return '';
		}
		$link = get_term_link( $term );
		return empty( $m[2] ) ? $link : trailingslashit( $link ) . user_trailingslashit( 'page/' . (int) $m[2], 'paged' );
	}
	// Paged posts page.
	$posts_page = (int) get_option( 'page_for_posts' );
	if ( $posts_page && preg_match( '#^(.*/)page/(\d+)/$#', $path, $m ) ) {
		$listing = get_permalink( $posts_page );
		if ( untrailingslashit( home_url( $m[1] ) ) === untrailingslashit( $listing ) ) {
			return trailingslashit( $listing ) . user_trailingslashit( 'page/' . (int) $m[2], 'paged' );
		}
		return '';
	}
	// Pages and articles.
	$id = url_to_postid( home_url( $path ) );
	if ( ! $id ) {
		$page = get_page_by_path( trim( $path, '/' ) );
		$id   = $page ? $page->ID : 0;
	}
	return ( $id && 'publish' === get_post_status( $id ) ) ? get_permalink( $id ) : '';
}

/**
 * Destination for an earlier address, or an empty string.
 *
 * @param string $path Request path.
 * @return string
 */
function abr_redirect_target( $path ) {
	// Category archives under the former /category/ base.
	if ( preg_match( '#^/category/([^/]+)/(?:page/(\d+)/)?$#', $path, $m ) ) {
		$term = get_term_by( 'slug', sanitize_title( $m[1] ), 'category' );
		if ( $term ) {
			$link = get_term_link( $term );
			if ( ! is_wp_error( $link ) ) {
				return empty( $m[2] ) ? $link : trailingslashit( $link ) . user_trailingslashit( 'page/' . (int) $m[2], 'paged' );
			}
		}
		return '';
	}

	// Seeded pages and articles at their 2.3.0 addresses.
	foreach ( abr_seed_legacy_v1() as $key => $row ) {
		if ( $row['path'] !== $path || 0 === strpos( $key, 'category:' ) ) {
			continue;
		}
		$id = abr_seed_id( $key );
		if ( $id ) {
			$url = get_permalink( $id );
			if ( $url && untrailingslashit( $url ) !== untrailingslashit( home_url( $path ) ) ) {
				return $url;
			}
		}
	}

	// Earlier addresses of the site and of the theme's own pages.
	foreach ( abr_legacy_paths() as $old => $key ) {
		if ( $old !== $path ) {
			continue;
		}
		$id = abr_seed_id( $key );
		if ( $id ) {
			$url = get_permalink( $id );
			if ( $url && untrailingslashit( $url ) !== untrailingslashit( home_url( $path ) ) ) {
				return $url;
			}
		}
	}

	// Renamed sections: /articles/ and /insights/ to /journal/, /knowledge-base/ to /reference/.
	foreach ( abr_renamed_prefixes() as $old => $new ) {
		if ( 0 === strpos( $path, $old ) ) {
			$url = abr_resolve_current_path( $new . substr( $path, strlen( $old ) ) );
			if ( $url && ! is_wp_error( $url ) && untrailingslashit( $url ) !== untrailingslashit( home_url( $path ) ) ) {
				return $url;
			}
		}
	}
	return '';
}

/**
 * Point links inside content at current addresses.
 *
 * @param string $content Post content.
 * @return string
 */
function abr_rewrite_legacy_links( $content ) {
	$home = untrailingslashit( esc_url( home_url( '/' ) ) );
	return preg_replace_callback(
		'#href="' . preg_quote( $home, '#' ) . '(/[^"\#?]*)([\#?][^"]*)?"#',
		function ( $m ) {
			$path = trailingslashit( $m[1] );
			if ( '/' === $path || abr_resolve_current_path( $path ) ) {
				return $m[0];
			}
			$target = abr_redirect_target( $path );
			return $target ? 'href="' . esc_url( $target ) . ( isset( $m[2] ) ? $m[2] : '' ) . '"' : $m[0];
		},
		$content
	);
}

/**
 * Published posts and pages whose content links to an earlier address.
 *
 * @return WP_Post[]
 */
function abr_posts_with_legacy_links() {
	$found = array();
	$posts = get_posts(
		array(
			'post_type'        => array( 'post', 'page' ),
			'post_status'      => 'publish',
			'posts_per_page'   => -1,
			'suppress_filters' => true,
		)
	);
	foreach ( $posts as $post ) {
		if ( abr_rewrite_legacy_links( $post->post_content ) !== $post->post_content ) {
			$found[] = $post;
		}
	}
	return $found;
}

/**
 * Tools: point links in content at the current addresses.
 */
function abr_handle_update_links() {
	if ( ! current_user_can( 'edit_theme_options' ) || ! current_user_can( 'edit_pages' ) ) {
		wp_die( esc_html__( 'You are not allowed to update links.', 'abrahamic' ), 403 );
	}
	check_admin_referer( 'abr_update_links' );
	$count = 0;
	foreach ( abr_posts_with_legacy_links() as $post ) {
		if ( current_user_can( 'edit_post', $post->ID ) ) {
			wp_update_post(
				wp_slash(
					array(
						'ID'           => $post->ID,
						'post_content' => abr_rewrite_legacy_links( $post->post_content ),
					)
				)
			);
			++$count;
		}
	}
	wp_safe_redirect( abr_options_url( 'tools', array( 'abr-notice' => 'links-updated', 'abr-created' => $count ) ) . '#abr-seed' );
	exit;
}
add_action( 'admin_post_abr_update_links', 'abr_handle_update_links' );

/**
 * Redirect 404s that match an earlier address.
 */
function abr_legacy_redirect() {
	if ( ! is_404() ) {
		return;
	}
	$method = isset( $_SERVER['REQUEST_METHOD'] ) ? sanitize_key( wp_unslash( $_SERVER['REQUEST_METHOD'] ) ) : 'get';
	if ( ! in_array( $method, array( 'get', 'head' ), true ) ) {
		return;
	}
	$target = abr_redirect_target( abr_request_path() );
	if ( $target ) {
		wp_safe_redirect( $target, 301, 'Abrahamic' );
		exit;
	}
}
add_action( 'template_redirect', 'abr_legacy_redirect', 5 );
