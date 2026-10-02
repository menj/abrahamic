<?php
/**
 * Journal tags: a fixed, lowercase vocabulary (inc/seed/tags.php) applied to
 * the starter articles, with descriptions and Rank Math focus keywords for the
 * tag pages. Tag pages covering fewer than three articles are kept out of
 * search results, so no thin tag page is indexed.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'ABR_TAG_MIN_POSTS' ) ) {
	define( 'ABR_TAG_MIN_POSTS', 3 );
}

/**
 * Create the tags and attach them to the starter articles. Runs once per
 * version of the tag list (and after each starter-content run). It never
 * removes a tag, never renames a tag an editor changed, and only fills a
 * description or focus keyword that is empty.
 *
 * @param bool $force Run even if this version of the list has run before.
 * @return int Number of articles tagged.
 */
function abr_seed_tags( $force = false ) {
	$file = ABR_DIR . '/inc/seed/tags.php';
	if ( ! is_readable( $file ) ) {
		return 0;
	}
	$stamp = md5_file( $file );
	if ( ! $force && get_option( 'abr_tags_stamp' ) === $stamp ) {
		return 0;
	}
	$data = require $file;
	$ids  = array();
	foreach ( $data['terms'] as $slug => $def ) {
		list( $name, $description, $keyword ) = $def;
		$term = get_term_by( 'slug', $slug, 'post_tag' );
		if ( ! $term ) {
			$made = wp_insert_term(
				$name,
				'post_tag',
				array(
					'slug'        => $slug,
					'description' => $description,
				)
			);
			if ( is_wp_error( $made ) ) {
				continue;
			}
			$term_id = (int) $made['term_id'];
		} else {
			$term_id = (int) $term->term_id;
			if ( '' === trim( (string) $term->description ) ) {
				wp_update_term( $term_id, 'post_tag', array( 'description' => $description ) );
			}
		}
		if ( '' === trim( (string) get_term_meta( $term_id, 'rank_math_focus_keyword', true ) ) ) {
			update_term_meta( $term_id, 'rank_math_focus_keyword', $keyword );
		}
		$ids[ $slug ] = $term_id;
	}
	// Withdrawn tags: deleted only if untouched since the theme created them.
	foreach ( isset( $data['retired'] ) ? $data['retired'] : array() as $slug => $original ) {
		$old = get_term_by( 'slug', $slug, 'post_tag' );
		if ( $old && trim( (string) $old->description ) === $original ) {
			wp_delete_term( (int) $old->term_id, 'post_tag' );
		}
	}
	// Categories that take the place of withdrawn tags (appended, never removed).
	foreach ( isset( $data['categories'] ) ? $data['categories'] : array() as $key => $cats ) {
		$post_id = abr_seed_id( $key );
		if ( ! $post_id ) {
			continue;
		}
		$cat_ids = array();
		foreach ( $cats as $cat_slug ) {
			$cat = get_category_by_slug( $cat_slug );
			if ( $cat ) {
				$cat_ids[] = (int) $cat->term_id;
			}
		}
		if ( $cat_ids ) {
			wp_set_post_terms( $post_id, $cat_ids, 'category', true );
		}
	}
	$tagged = 0;
	foreach ( $data['posts'] as $key => $slugs ) {
		$post_id = abr_seed_id( $key );
		if ( ! $post_id ) {
			continue;
		}
		$terms = array_values( array_filter( array_map( function ( $s ) use ( $ids ) {
			return isset( $ids[ $s ] ) ? $ids[ $s ] : 0;
		}, $slugs ) ) );
		if ( $terms ) {
			wp_set_post_terms( $post_id, $terms, 'post_tag', true ); // Appends; never removes.
			$tagged++;
		}
	}
	update_option( 'abr_tags_stamp', $stamp, false );
	return $tagged;
}
add_action(
	'admin_init',
	function () {
		if ( current_user_can( 'edit_theme_options' ) ) {
			abr_seed_tags();
		}
	},
	21
);

/**
 * Tag names are always lowercase, however they are entered.
 *
 * @param string $name Tag name.
 * @return string
 */
function abr_lowercase_tag_name( $name ) {
	return function_exists( 'mb_strtolower' ) ? mb_strtolower( (string) $name, 'UTF-8' ) : strtolower( (string) $name );
}
add_filter( 'pre_post_tag_name', 'abr_lowercase_tag_name' );

/**
 * Tags must never repeat a category. A tag whose name or slug matches a
 * category (case and spacing ignored) is refused, with a message naming the
 * category to use instead.
 *
 * @param string|WP_Error $term     Term name.
 * @param string          $taxonomy Taxonomy.
 * @param array|string    $args     Arguments, which may include a slug.
 * @return string|WP_Error
 */
function abr_tag_not_category( $term, $taxonomy, $args = array() ) {
	if ( 'post_tag' !== $taxonomy || is_wp_error( $term ) ) {
		return $term;
	}
	$key  = sanitize_title( (string) $term );
	$slug = is_array( $args ) && ! empty( $args['slug'] ) ? sanitize_title( $args['slug'] ) : $key;
	foreach ( get_terms( array( 'taxonomy' => 'category', 'hide_empty' => false ) ) as $cat ) {
		$cat_keys = array( $cat->slug, sanitize_title( $cat->name ) );
		if ( in_array( $key, $cat_keys, true ) || in_array( $slug, $cat_keys, true ) ) {
			/* translators: %s: category name. */
			return new WP_Error( 'abr_tag_is_category', sprintf( __( 'This repeats the category "%s". Use the category instead of a tag.', 'abrahamic' ), $cat->name ) );
		}
	}
	return $term;
}
add_filter( 'pre_insert_term', 'abr_tag_not_category', 10, 3 );

/**
 * Whether the current tag page covers too few articles to be indexed.
 *
 * @return bool
 */
function abr_tag_is_thin() {
	if ( ! is_tag() ) {
		return false;
	}
	$term = get_queried_object();
	return $term instanceof WP_Term && (int) $term->count < ABR_TAG_MIN_POSTS;
}

add_filter(
	'wp_robots',
	function ( $robots ) {
		if ( abr_tag_is_thin() ) {
			$robots['noindex'] = true;
			$robots['follow']  = true;
			unset( $robots['index'] );
		}
		return $robots;
	}
);

add_filter(
	'rank_math/frontend/robots',
	function ( $robots ) {
		if ( abr_tag_is_thin() ) {
			$robots['index'] = 'noindex';
		}
		return $robots;
	}
);
