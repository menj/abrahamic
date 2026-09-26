<?php
/**
 * Unlisted posts and pages: reachable at their own address, absent everywhere
 * else (archives, the Journal, search, feeds, menus built from pages, previous
 * and next links, the XML sitemap), and marked noindex.
 *
 * Built into the theme from Unlist Posts & Pages 1.2.1 by Nikhil Chavan (GPL).
 * The list of unlisted IDs stays in the plugin's own option, unlist_posts, so
 * a site moving from the plugin keeps every setting. While the plugin is
 * active, the theme leaves this to it.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'Unlist_Posts' ) ) {
	return;
}

/**
 * IDs of unlisted posts.
 *
 * @return int[]
 */
function abr_unlisted_ids() {
	$ids = get_option( 'unlist_posts', array() );
	return is_array( $ids ) ? array_values( array_filter( array_map( 'absint', $ids ) ) ) : array();
}

/**
 * Whether one post is unlisted.
 *
 * @param int $post_id Post ID.
 * @return bool
 */
function abr_is_unlisted( $post_id ) {
	return in_array( (int) $post_id, abr_unlisted_ids(), true );
}

/**
 * Post types that can be unlisted.
 *
 * @return string[]
 */
function abr_unlist_post_types() {
	return array_values( array_diff( get_post_types( array( 'public' => true ) ), array( 'attachment' ) ) );
}

/**
 * Leave unlisted posts out of front-end lists.
 *
 * Queries for a single post, lists of exact IDs, and queries that suppress filters (the
 * starter-content seeder among them) are left alone. A get_posts() call that
 * lists content for visitors opts back in with 'abr_hide_unlisted' => true.
 *
 * @param WP_Query $query Query.
 */
function abr_unlist_pre_get_posts( $query ) {
	$ids = abr_unlisted_ids();
	if ( ! $ids || ( is_admin() && ! wp_doing_ajax() ) || $query->is_singular() || ( $query->get( 'suppress_filters' ) && ! $query->get( 'abr_hide_unlisted' ) ) ) {
		return;
	}
	// A list of exact IDs is a deliberate choice; the posts page keeps its pagename, so that is not a test.
	if ( $query->get( 'post__in' ) ) {
		return;
	}
	$not_in = (array) $query->get( 'post__not_in' );
	$query->set( 'post__not_in', array_values( array_unique( array_merge( $not_in, $ids ) ) ) );
}
add_action( 'pre_get_posts', 'abr_unlist_pre_get_posts' );

/**
 * Previous and next links skip unlisted posts.
 *
 * @param string $where WHERE clause.
 * @return string
 */
function abr_unlist_adjacent( $where ) {
	$ids = abr_unlisted_ids();
	return $ids ? $where . ' AND p.ID NOT IN (' . implode( ',', $ids ) . ')' : $where;
}
add_filter( 'get_next_post_where', 'abr_unlist_adjacent' );
add_filter( 'get_previous_post_where', 'abr_unlist_adjacent' );

/**
 * Page lists skip unlisted pages.
 *
 * @param array $exclude IDs.
 * @return array
 */
function abr_unlist_page_list( $exclude ) {
	return array_merge( (array) $exclude, abr_unlisted_ids() );
}
add_filter( 'wp_list_pages_excludes', 'abr_unlist_page_list' );

/**
 * Page lists built with get_pages() on the front end skip unlisted pages.
 *
 * @param WP_Post[] $pages Pages.
 * @return WP_Post[]
 */
function abr_unlist_get_pages( $pages ) {
	$ids = abr_unlisted_ids();
	if ( ! $ids || is_admin() ) {
		return $pages;
	}
	return array_values(
		array_filter(
			(array) $pages,
			function ( $page ) use ( $ids ) {
				return ! in_array( (int) $page->ID, $ids, true );
			}
		)
	);
}
add_filter( 'get_pages', 'abr_unlist_get_pages' );

/**
 * The XML sitemap skips unlisted posts.
 *
 * @param array $args Query arguments.
 * @return array
 */
function abr_unlist_sitemap( $args ) {
	$args['post__not_in'] = array_merge( isset( $args['post__not_in'] ) ? (array) $args['post__not_in'] : array(), abr_unlisted_ids() );
	return $args;
}
add_filter( 'wp_sitemaps_posts_query_args', 'abr_unlist_sitemap' );

/**
 * Unlisted posts ask search engines to stay away.
 *
 * @param array $robots Robots directives.
 * @return array
 */
function abr_unlist_robots( $robots ) {
	if ( is_singular() && abr_is_unlisted( get_queried_object_id() ) ) {
		$robots['noindex']  = true;
		$robots['nofollow'] = true;
	}
	return $robots;
}
add_filter( 'wp_robots', 'abr_unlist_robots' );

/* -------------------------------------------------------------------------
 * Editor
 * ---------------------------------------------------------------------- */

/**
 * The Visibility box in the post editor sidebar.
 */
function abr_unlist_meta_box() {
	add_meta_box( 'abr-unlist', __( 'Listing', 'abrahamic' ), 'abr_unlist_meta_box_render', abr_unlist_post_types(), 'side', 'default' );
}
add_action( 'add_meta_boxes', 'abr_unlist_meta_box' );

/**
 * Render the box.
 *
 * @param WP_Post $post Post.
 */
function abr_unlist_meta_box_render( $post ) {
	wp_nonce_field( 'abr_unlist_save', 'abr_unlist_nonce' );
	printf(
		'<p><label><input type="checkbox" name="abr_unlist" value="1" %s> %s</label></p><p class="description">%s</p>',
		checked( abr_is_unlisted( $post->ID ), true, false ),
		esc_html__( 'Unlist this item', 'abrahamic' ),
		esc_html__( 'It stays reachable at its own address, and disappears from lists, search, feeds, the sitemap and search engines.', 'abrahamic' )
	);
}

/**
 * Save the box.
 *
 * @param int $post_id Post ID.
 */
function abr_unlist_save( $post_id ) {
	if ( ! isset( $_POST['abr_unlist_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['abr_unlist_nonce'] ) ), 'abr_unlist_save' ) ) {
		return;
	}
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$ids = abr_unlisted_ids();
	$ids = empty( $_POST['abr_unlist'] ) ? array_diff( $ids, array( $post_id ) ) : array_merge( $ids, array( $post_id ) );
	update_option( 'unlist_posts', array_values( array_unique( array_map( 'absint', $ids ) ) ) );
}
add_action( 'save_post', 'abr_unlist_save' );

/**
 * "Unlisted" beside the title in the post list.
 *
 * @param array   $states States.
 * @param WP_Post $post   Post.
 * @return array
 */
function abr_unlist_state( $states, $post ) {
	if ( abr_is_unlisted( $post->ID ) ) {
		$states['abr_unlisted'] = __( 'Unlisted', 'abrahamic' );
	}
	return $states;
}
add_filter( 'display_post_states', 'abr_unlist_state', 10, 2 );

/**
 * An "Unlisted" view above each post list.
 */
function abr_unlist_views_setup() {
	foreach ( abr_unlist_post_types() as $type ) {
		add_filter(
			'views_edit-' . $type,
			function ( $views ) use ( $type ) {
				$ids = abr_unlisted_ids();
				if ( ! $ids ) {
					return $views;
				}
				$count = count( get_posts( array( 'post_type' => $type, 'post__in' => $ids, 'post_status' => 'any', 'fields' => 'ids', 'posts_per_page' => -1, 'suppress_filters' => true ) ) );
				if ( ! $count ) {
					return $views;
				}
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- view selection only.
				$current                = isset( $_GET['abr_unlisted'] ) ? ' class="current" aria-current="page"' : '';
				$views['abr_unlisted'] = sprintf( '<a href="%s"%s>%s <span class="count">(%d)</span></a>', esc_url( add_query_arg( array( 'post_type' => $type, 'abr_unlisted' => 1 ), admin_url( 'edit.php' ) ) ), $current, esc_html__( 'Unlisted', 'abrahamic' ), $count );
				return $views;
			}
		);
	}
}
add_action( 'admin_init', 'abr_unlist_views_setup' );

/**
 * Filter the post list to unlisted items when that view is chosen.
 *
 * @param WP_Query $query Query.
 */
function abr_unlist_admin_filter( $query ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- view selection only.
	if ( is_admin() && $query->is_main_query() && isset( $_GET['abr_unlisted'] ) ) {
		$ids = abr_unlisted_ids();
		$query->set( 'post__in', $ids ? $ids : array( 0 ) );
	}
}
add_action( 'pre_get_posts', 'abr_unlist_admin_filter' );
