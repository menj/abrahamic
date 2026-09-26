<?php
/**
 * Owner anonymity: keep the people who run the site out of everything the
 * public, search engines and AI tools can read.
 *
 * WordPress publishes its user accounts in several places by default: the
 * REST API user list (with a Gravatar hash of each account's email address),
 * author archives and the ?author= address that reveals them, the author name
 * in feeds and embeds, and the users sitemap. This module closes each of
 * them, and every article names the site itself as author and publisher.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Remove the user endpoints from the REST API for anyone who cannot list users.
 *
 * @param array $endpoints Registered routes.
 * @return array
 */
function abr_anon_rest_endpoints( $endpoints ) {
	if ( current_user_can( 'list_users' ) ) {
		return $endpoints;
	}
	foreach ( array_keys( $endpoints ) as $route ) {
		if ( 0 === strpos( $route, '/wp/v2/users' ) ) {
			unset( $endpoints[ $route ] );
		}
	}
	return $endpoints;
}
add_filter( 'rest_endpoints', 'abr_anon_rest_endpoints' );

/**
 * Send author archives, and the ?author= address that finds them, to the Journal.
 */
function abr_anon_author_archives() {
	if ( is_admin() ) {
		return;
	}
	if ( is_author() || isset( $_GET['author'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		wp_safe_redirect( abr_link( '@journal', home_url( '/' ) ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'abr_anon_author_archives', 1 );

/**
 * Author links everywhere point to the home page.
 *
 * @return string
 */
function abr_anon_author_link() {
	return home_url( '/' );
}
add_filter( 'author_link', 'abr_anon_author_link' );

/**
 * The author shown in feeds and on the page is the site itself.
 *
 * @param string $name Author display name.
 * @return string
 */
function abr_anon_author_name( $name ) {
	if ( is_admin() && ! wp_doing_ajax() ) {
		return $name;
	}
	return get_bloginfo( 'name', 'display' );
}
add_filter( 'the_author', 'abr_anon_author_name' );
add_filter( 'get_the_author_display_name', 'abr_anon_author_name' );

/**
 * oEmbed responses name the site as author.
 *
 * @param array $data Response data.
 * @return array
 */
function abr_anon_oembed( $data ) {
	$data['author_name'] = get_bloginfo( 'name', 'display' );
	$data['author_url']  = home_url( '/' );
	return $data;
}
add_filter( 'oembed_response_data', 'abr_anon_oembed' );

/**
 * No users sitemap.
 *
 * @param WP_Sitemaps_Provider $provider Provider.
 * @param string               $name     Provider name.
 * @return WP_Sitemaps_Provider|false
 */
function abr_anon_sitemap( $provider, $name ) {
	return 'users' === $name ? false : $provider;
}
add_filter( 'wp_sitemaps_add_provider', 'abr_anon_sitemap', 10, 2 );
