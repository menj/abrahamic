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
 * IDs of unlisted posts. Empty while the plugin's own switch,
 * the unlist_posts_enabled filter, returns false, so every front-end rule
 * stands down together.
 *
 * @return int[]
 */
function abr_unlisted_ids() {
	if ( ! apply_filters( 'unlist_posts_enabled', true ) ) {
		return array();
	}
	$ids = get_option( 'unlist_posts', array() );
	return is_array( $ids ) ? array_values( array_unique( array_filter( array_map( 'absint', $ids ) ) ) ) : array();
}

/**
 * Whether the current AJAX request came from a screen in wp-admin, made by a
 * user who can edit posts. Such requests see unlisted posts, as the plugin
 * allows since 1.2.0, so admin tools that query over AJAX keep working.
 *
 * @return bool
 */
function abr_unlist_admin_referer() {
	if ( ! current_user_can( 'edit_posts' ) ) {
		return false;
	}
	$referer = wp_get_referer();
	if ( ! $referer ) {
		return false;
	}
	$from  = wp_parse_url( $referer );
	$admin = wp_parse_url( admin_url() );
	if ( empty( $from['host'] ) || empty( $admin['host'] ) || strtolower( $from['host'] ) !== strtolower( $admin['host'] ) ) {
		return false;
	}
	if ( empty( $from['path'] ) || empty( $admin['path'] ) ) {
		return false;
	}
	return 0 === strpos( trailingslashit( $from['path'] ), trailingslashit( $admin['path'] ) );
}

/**
 * Whether the request is one where unlisted posts stay visible: an admin
 * screen, or AJAX sent from one.
 *
 * @return bool
 */
function abr_unlist_is_admin_view() {
	return is_admin() && ( ! wp_doing_ajax() || abr_unlist_admin_referer() );
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
	if ( ! $ids || abr_unlist_is_admin_view() || $query->is_singular() || ( $query->get( 'suppress_filters' ) && ! $query->get( 'abr_hide_unlisted' ) ) ) {
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
	return $ids && ! abr_unlist_is_admin_view() ? $where . ' AND p.ID NOT IN (' . implode( ',', $ids ) . ')' : $where;
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
 * Rank Math's sitemap skips unlisted posts. Rank Math builds its post
 * sitemaps with its own SQL, so the query filters above do not reach it.
 *
 * @param array|string $ids IDs Rank Math already excludes.
 * @return int[]
 */
function abr_unlist_rank_math_exclude( $ids ) {
	$ids = is_array( $ids ) ? $ids : wp_parse_id_list( $ids );
	return array_values( array_unique( array_merge( array_map( 'absint', $ids ), abr_unlisted_ids() ) ) );
}
add_filter( 'rank_math/sitemap/posts_to_exclude', 'abr_unlist_rank_math_exclude' );

/**
 * Rank Math's sitemap entry filter: drop an unlisted post's entry, as a
 * second line behind the exclusion list.
 *
 * @param array|false $url    Entry.
 * @param string      $type   Object type.
 * @param mixed       $object Post or term.
 * @return array|false
 */
function abr_unlist_rank_math_entry( $url, $type, $object ) {
	if ( 'post' === $type && $object instanceof WP_Post && abr_is_unlisted( $object->ID ) ) {
		return false;
	}
	return $url;
}
add_filter( 'rank_math/sitemap/entry', 'abr_unlist_rank_math_entry', 10, 3 );

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

/**
 * Yoast SEO prints its own robots tag; on an unlisted post it stands aside,
 * as the plugin arranges, so the noindex above is the one that counts.
 */
function abr_unlist_yoast_robots() {
	if ( is_singular() && abr_is_unlisted( get_queried_object_id() ) ) {
		add_filter( 'wpseo_robots_array', '__return_empty_array' );
	}
}
add_action( 'wp', 'abr_unlist_yoast_robots' );

/**
 * With Rank Math active it writes the robots tag, so the noindex goes through
 * its robots filter.
 *
 * @param array $robots Rank Math robots directives.
 * @return array
 */
function abr_unlist_rank_math_robots( $robots ) {
	if ( is_singular() && abr_is_unlisted( get_queried_object_id() ) ) {
		$robots          = (array) $robots;
		$robots['index'] = 'noindex';
		$robots['follow'] = 'nofollow';
	}
	return $robots;
}
add_filter( 'rank_math/frontend/robots', 'abr_unlist_rank_math_robots' );

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
 * Add a post to the unlisted list or take it out.
 *
 * Reads the stored option directly, so a save made while the
 * unlist_posts_enabled filter is off keeps the rest of the list.
 *
 * @param int  $post_id Post ID.
 * @param bool $unlist  True to unlist.
 */
function abr_unlist_set( $post_id, $unlist ) {
	$post_id = absint( $post_id );
	$stored  = get_option( 'unlist_posts', array() );
	$ids     = is_array( $stored ) ? array_filter( array_map( 'absint', $stored ) ) : array();
	$ids     = $unlist ? array_merge( $ids, array( $post_id ) ) : array_diff( $ids, array( $post_id ) );
	update_option( 'unlist_posts', array_values( array_unique( $ids ) ) );
}

/**
 * Save the box, the Quick Edit checkbox or the Bulk Edit choice.
 *
 * @param int $post_id Post ID.
 */
function abr_unlist_save( $post_id ) {
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	// Bulk Edit: core checks the bulk-posts nonce first; it is checked again here.
	if ( isset( $_REQUEST['bulk_edit'], $_REQUEST['abr_unlist_bulk'] ) ) {
		if ( empty( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ), 'bulk-posts' ) ) {
			return;
		}
		$choice = sanitize_key( wp_unslash( $_REQUEST['abr_unlist_bulk'] ) );
		if ( 'unlist' === $choice || 'list' === $choice ) {
			abr_unlist_set( $post_id, 'unlist' === $choice );
		}
		return;
	}
	// Quick Edit.
	if ( isset( $_POST['abr_unlist_qe_nonce'] ) ) {
		if ( wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['abr_unlist_qe_nonce'] ) ), 'abr_unlist_quick_edit' ) ) {
			abr_unlist_set( $post_id, ! empty( $_POST['abr_unlist'] ) );
		}
		return;
	}
	if ( ! isset( $_POST['abr_unlist_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['abr_unlist_nonce'] ) ), 'abr_unlist_save' ) ) {
		return;
	}
	abr_unlist_set( $post_id, ! empty( $_POST['abr_unlist'] ) );
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

/* -------------------------------------------------------------------------
 * Post lists: an Unlisted column, Quick Edit and Bulk Edit
 * ---------------------------------------------------------------------- */

/**
 * Add the column to every list of a post type that can be unlisted. Quick
 * Edit and Bulk Edit fields hang off a column, so they need it too.
 */
function abr_unlist_columns_setup() {
	foreach ( abr_unlist_post_types() as $type ) {
		add_filter( "manage_{$type}_posts_columns", 'abr_unlist_column' );
		add_action( "manage_{$type}_posts_custom_column", 'abr_unlist_column_render', 10, 2 );
	}
}
add_action( 'admin_init', 'abr_unlist_columns_setup' );

/**
 * Column header.
 *
 * @param array $columns Columns.
 * @return array
 */
function abr_unlist_column( $columns ) {
	$columns['abr_unlisted'] = __( 'Unlisted', 'abrahamic' );
	return $columns;
}

/**
 * Column cell. Quick Edit reads data-unlisted to tick its checkbox.
 *
 * @param string $column  Column.
 * @param int    $post_id Post ID.
 */
function abr_unlist_column_render( $column, $post_id ) {
	if ( 'abr_unlisted' !== $column ) {
		return;
	}
	$on = abr_is_unlisted( $post_id );
	printf(
		'<span class="abr-unlist-status" data-unlisted="%s">%s</span>',
		$on ? '1' : '0',
		$on ? esc_html__( 'Yes', 'abrahamic' ) : '&mdash;'
	);
}

/**
 * Quick Edit checkbox.
 *
 * @param string $column    Column.
 * @param string $post_type Post type.
 */
function abr_unlist_quick_edit( $column, $post_type ) {
	if ( 'abr_unlisted' !== $column || ! in_array( $post_type, abr_unlist_post_types(), true ) ) {
		return;
	}
	wp_nonce_field( 'abr_unlist_quick_edit', 'abr_unlist_qe_nonce' );
	printf(
		'<fieldset class="inline-edit-col-right"><div class="inline-edit-col"><label class="alignleft"><input type="checkbox" name="abr_unlist" value="1"> <span class="checkbox-title">%s</span></label></div></fieldset>',
		esc_html__( 'Unlist this item', 'abrahamic' )
	);
}
add_action( 'quick_edit_custom_box', 'abr_unlist_quick_edit', 10, 2 );

/**
 * Bulk Edit choice: no change, unlist or list.
 *
 * @param string $column    Column.
 * @param string $post_type Post type.
 */
function abr_unlist_bulk_edit( $column, $post_type ) {
	if ( 'abr_unlisted' !== $column || ! in_array( $post_type, abr_unlist_post_types(), true ) ) {
		return;
	}
	printf(
		'<fieldset class="inline-edit-col-right"><div class="inline-edit-col"><label class="inline-edit-group"><span class="title">%1$s</span><select name="abr_unlist_bulk"><option value="-1">%2$s</option><option value="unlist">%3$s</option><option value="list">%4$s</option></select></label></div></fieldset>',
		esc_html__( 'Unlisted', 'abrahamic' ),
		esc_html__( 'No change', 'abrahamic' ),
		esc_html__( 'Unlist', 'abrahamic' ),
		esc_html__( 'List', 'abrahamic' )
	);
}
add_action( 'bulk_edit_custom_box', 'abr_unlist_bulk_edit', 10, 2 );

/**
 * The Quick Edit script, on post list screens only.
 *
 * @param string $hook Admin page.
 */
function abr_unlist_quick_edit_script( $hook ) {
	if ( 'edit.php' !== $hook ) {
		return;
	}
	$screen = get_current_screen();
	if ( ! $screen || ! in_array( $screen->post_type, abr_unlist_post_types(), true ) ) {
		return;
	}
	wp_enqueue_script( 'abr-unlist-quick-edit', ABR_URI . '/assets/js/unlist-quick-edit.js', array( 'jquery', 'inline-edit-post' ), ABR_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'abr_unlist_quick_edit_script' );
