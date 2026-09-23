<?php
/**
 * Starter content seeder.
 *
 * Creates the pages, articles and categories in inc/seed/content.php on theme
 * activation, and again whenever ABR_SEED_VERSION rises. Every item it creates
 * or adopts is recorded in the `abr_seeded_slugs` option (the tombstone list),
 * so an item an editor deletes is never recreated; only an explicit Restore in
 * Theme Options > Tools brings it back. Existing content is never overwritten.
 *
 * Site set-up steps run once each, also recorded in the tombstone list:
 * the /journal/ permalink structure (see abr_seed_permalinks()); the site tagline; WordPress's
 * untouched sample post and page moved to the trash; the untouched default
 * privacy policy draft filled and published; and Home and Articles set as the
 * front page and posts page when no front page was chosen.
 *
 * Featured images: an article with a 'photo' entry receives that bundled
 * photograph as its featured image, copied once into the media library, while
 * it has none. Each article receives it once only (_abr_seed_photo), so an
 * editor who removes or replaces the image keeps that choice.
 *
 * Structure sync: when ABR_SEED_VERSION rises, every seeder-owned item whose
 * _abr_seed_version is older takes the current slug and parent page. Its text is
 * refreshed according to the `seed_mode` option: `replace` (the default) writes
 * the current version over the stored one, keeping the previous text in a
 * WordPress revision; `keep` refreshes only items still matching their
 * _abr_seed_hash fingerprint (or the version 1 fingerprint in
 * inc/seed/legacy-v1.php). Items the starter set no longer carries are moved to
 * the trash, where they can be restored.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Copies a bundled photograph into the media library once and returns its
 * attachment ID; later calls reuse it while it exists. Returns 0 on failure.
 *
 * @param string $name File name in assets/images/photos/, without .avif.
 * @param string $alt  Alternative text for the attachment.
 * @return int
 */
function abr_seed_photo_attachment( $name, $alt ) {
	$map = (array) get_option( 'abr_seed_photos', array() );
	if ( ! empty( $map[ $name ] ) && 'attachment' === get_post_type( (int) $map[ $name ] ) ) {
		return (int) $map[ $name ];
	}
	$name = sanitize_file_name( $name );
	$file = ABR_DIR . '/assets/images/photos/' . $name . '.avif';
	if ( ! is_readable( $file ) ) {
		return 0;
	}
	$upload = wp_upload_bits( $name . '.avif', null, file_get_contents( $file ) ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- a bundled file.
	if ( ! empty( $upload['error'] ) ) {
		return 0;
	}
	$id = wp_insert_attachment(
		array(
			'post_mime_type' => 'image/avif',
			'post_title'     => $alt,
			'post_status'    => 'inherit',
		),
		$upload['file']
	);
	if ( ! $id || is_wp_error( $id ) ) {
		return 0;
	}
	require_once ABSPATH . 'wp-admin/includes/image.php';
	wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $upload['file'] ) );
	update_post_meta( $id, '_wp_attachment_image_alt', $alt );
	$map[ $name ] = $id;
	update_option( 'abr_seed_photos', $map, false );
	return (int) $id;
}

/**
 * Raise when inc/seed/content.php gains items (set their 'since' to the new value).
 */
define( 'ABR_SEED_VERSION', 44 );

/**
 * Recommended permalink settings (docs/ssot.md, section 12).
 */
define( 'ABR_PERMALINK_STRUCTURE', '/journal/%postname%/' );
define( 'ABR_CATEGORY_BASE', 'journal/topics' );
define( 'ABR_TAG_BASE', 'journal/tags' );

/**
 * Structures the theme applied in earlier releases, replaced automatically.
 *
 * @return string[]
 */
function abr_previous_permalink_structures() {
	return array( '/articles/%postname%/', '/insights/%postname%/' );
}

/**
 * Site tagline set on new sites.
 */
define( 'ABR_SEED_TAGLINE', 'Judaism, Mandaeism, Christianity, Islam' );

/**
 * Seed data.
 *
 * @return array{terms: array, items: array}
 */
function abr_seed_data() {
	static $data = null;
	if ( null === $data ) {
		$data = require ABR_DIR . '/inc/seed/content.php';
	}
	return $data;
}

/**
 * Version 1 fingerprints and addresses.
 *
 * @return array key => array( hash, path )
 */
function abr_seed_legacy_v1() {
	static $legacy = null;
	if ( null === $legacy ) {
		$legacy = require ABR_DIR . '/inc/seed/legacy-v1.php';
	}
	return $legacy;
}

/**
 * Fingerprint of stored seed content, with links made root-relative again.
 *
 * @param string $content Post content.
 * @return string
 */
function abr_seed_content_hash( $content ) {
	return md5( str_replace( 'href="' . esc_url( home_url( '/' ) ), 'href="/', $content ) );
}

/**
 * Whether a seeder-owned post still holds the text the seeder gave it.
 *
 * @param WP_Post $post Post.
 * @param string  $key  Seed key.
 * @return bool
 */
function abr_seed_is_unedited( $post, $key ) {
	$hash = get_post_meta( $post->ID, '_abr_seed_hash', true );
	if ( ! $hash ) {
		$legacy = abr_seed_legacy_v1();
		$hash   = isset( $legacy[ $key ]['hash'] ) ? $legacy[ $key ]['hash'] : '';
	}
	return $hash && abr_seed_content_hash( $post->post_content ) === $hash;
}

/**
 * Whether the site has published articles the seeder did not create.
 *
 * @return bool
 */
function abr_seed_has_foreign_posts() {
	$ids = get_posts(
		array(
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'posts_per_page'   => 1,
			'fields'           => 'ids',
			'suppress_filters' => true,
			'meta_query'       => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_query_meta_query
				array(
					'key'     => '_abr_seed',
					'compare' => 'NOT EXISTS',
				),
			),
		)
	);
	return (bool) $ids;
}

/**
 * Apply the recommended permalink settings when the site uses plain permalinks,
 * uses post names and has no articles of its own yet, or still uses the
 * structure the theme applied before 2.10.0 (its addresses redirect).
 *
 * @return bool Whether the settings were applied.
 */
function abr_seed_permalinks() {
	$current = (string) get_option( 'permalink_structure' );
	if ( ABR_PERMALINK_STRUCTURE === $current ) {
		return false;
	}
	$ours = in_array( $current, abr_previous_permalink_structures(), true );
	if ( '' !== $current && ! $ours && ! ( '/%postname%/' === $current && ! abr_seed_has_foreign_posts() ) ) {
		return false;
	}
	global $wp_rewrite;
	// Through WP_Rewrite, so the rules flushed in this same request use the new structure.
	$wp_rewrite->set_permalink_structure( ABR_PERMALINK_STRUCTURE );
	$wp_rewrite->set_category_base( ABR_CATEGORY_BASE );
	$wp_rewrite->set_tag_base( ABR_TAG_BASE );
	// Category and tag address patterns are registered with the taxonomies; re-register
	// them, as the Permalinks settings screen does after changing the bases.
	create_initial_taxonomies();
	return true;
}

/**
 * Whether the site uses the recommended permalink settings.
 *
 * @return bool
 */
function abr_seed_permalinks_ok() {
	return ABR_PERMALINK_STRUCTURE === get_option( 'permalink_structure' ) && ABR_CATEGORY_BASE === get_option( 'category_base' );
}

/**
 * Store an item's search description.
 *
 * @param int   $post_id Post ID.
 * @param array $item    Seed item.
 */
function abr_seed_set_description( $post_id, $item ) {
	if ( ! empty( $item['description'] ) ) {
		update_post_meta( $post_id, '_abr_description', $item['description'] );
	}
}

/**
 * Address of a seed page or post by key, with a fallback path.
 *
 * @param string $key      Seed key, such as 'page:guides'.
 * @param string $fallback Root-relative fallback path.
 * @return string
 */
function abr_seed_url( $key, $fallback = '/' ) {
	return abr_link( '@' . preg_replace( '/^page:/', '', $key ), $fallback );
}

/**
 * Tombstone list: seed key => timestamp first created or adopted.
 *
 * @return array
 */
function abr_seed_tombstones() {
	return (array) get_option( 'abr_seeded_slugs', array() );
}

/**
 * Post created by the seeder for a key, in any status including trash.
 *
 * @param string $key Seed key.
 * @return WP_Post|null
 */
function abr_seed_post_by_key( $key ) {
	$found = get_posts(
		array(
			'post_type'        => array( 'post', 'page' ),
			'post_status'      => array( 'publish', 'draft', 'pending', 'private', 'future', 'trash' ),
			'meta_key'         => '_abr_seed', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_query_meta_key
			'meta_value'       => $key, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_query_meta_value
			'posts_per_page'   => 1,
			'no_found_rows'    => true,
			'suppress_filters' => true,
		)
	);
	return $found ? $found[0] : null;
}

/**
 * Existing post or page with a slug (not trashed).
 *
 * @param string $type Post type.
 * @param string $slug Slug.
 * @return WP_Post|null
 */
function abr_seed_post_by_slug( $type, $slug ) {
	$found = get_posts(
		array(
			'post_type'        => $type,
			'name'             => $slug,
			'post_status'      => array( 'publish', 'draft', 'pending', 'private', 'future' ),
			'posts_per_page'   => 1,
			'no_found_rows'    => true,
			'suppress_filters' => true,
		)
	);
	return $found ? $found[0] : null;
}

/**
 * Root-relative links in seed content become absolute to this site.
 *
 * @param string $content Block markup.
 * @return string
 */
function abr_seed_prepare_content( $content ) {
	return preg_replace_callback(
		'/href="(\/[^"]*)"/',
		function ( $m ) {
			return 'href="' . esc_url( home_url( $m[1] ) ) . '"';
		},
		$content
	);
}

/**
 * Whether a page is WordPress's untouched default privacy policy draft.
 *
 * @param WP_Post $post Page.
 * @return bool
 */
function abr_seed_is_default_privacy_draft( $post ) {
	return (int) get_option( 'wp_page_for_privacy_policy' ) === (int) $post->ID
		&& 'draft' === $post->post_status
		&& $post->post_modified_gmt === $post->post_date_gmt;
}

/**
 * Author for seeded content: the current user, else the first administrator.
 *
 * @return int
 */
function abr_seed_author() {
	$user = get_current_user_id();
	if ( $user ) {
		return $user;
	}
	$admins = get_users(
		array(
			'role'   => 'administrator',
			'number' => 1,
			'fields' => 'ID',
		)
	);
	return $admins ? (int) $admins[0] : 0;
}

/**
 * Run the seeder.
 *
 * @param string[] $only Limit the run to these keys (used by Restore). Empty means all.
 * @return array Report: created, adopted and skipped keys.
 */
function abr_run_seeder( $only = array() ) {
	$report = array(
		'created'   => array(),
		'adopted'   => array(),
		'skipped'   => array(),
		'moved'     => array(),
		'refreshed' => array(),
		'replaced'  => array(),
		'retired'   => array(),
		'photos'    => array(),
	);

	/**
	 * Filters whether the starter content seeder runs.
	 *
	 * @param bool $enabled Default true.
	 */
	if ( ! apply_filters( 'abr_seed_enabled', true ) ) {
		return $report;
	}

	$data   = abr_seed_data();
	$seeded = abr_seed_tombstones();
	$wanted = function ( $key ) use ( $only, $seeded ) {
		return $only ? in_array( $key, $only, true ) : ! isset( $seeded[ $key ] );
	};

	// Permalinks: /articles/ for articles and topics, readable page paths.
	// Keyed by the settings themselves, so a later change to them runs once more.
	$permalink_key = 'option:permalinks:' . substr( md5( ABR_PERMALINK_STRUCTURE . '|' . ABR_CATEGORY_BASE . '|' . ABR_TAG_BASE ), 0, 8 );
	$flush         = false;
	if ( ! $only && ! isset( $seeded[ $permalink_key ] ) ) {
		if ( abr_seed_permalinks() ) {
			$flush               = true;
			$report['created'][] = $permalink_key;
		} else {
			$report['adopted'][] = $permalink_key;
		}
		$seeded[ $permalink_key ] = time();
	}

	// Tagline, used in the front page title.
	$tagline_key = 'option:tagline';
	if ( ! $only && ! isset( $seeded[ $tagline_key ] ) ) {
		$tagline = trim( (string) get_option( 'blogdescription' ) );
		if ( '' === $tagline || 'Just another WordPress site' === $tagline ) {
			update_option( 'blogdescription', ABR_SEED_TAGLINE );
			$report['created'][] = $tagline_key;
		} else {
			$report['adopted'][] = $tagline_key;
		}
		$seeded[ $tagline_key ] = time();
	}

	// WordPress's untouched sample post and page go to the trash.
	$cleanup_key = 'cleanup:defaults';
	if ( ! $only && ! isset( $seeded[ $cleanup_key ] ) ) {
		foreach ( array( 'post' => 'hello-world', 'page' => 'sample-page' ) as $type => $slug ) {
			$sample = abr_seed_post_by_slug( $type, $slug );
			if ( $sample && $sample->post_modified_gmt === $sample->post_date_gmt ) {
				wp_trash_post( $sample->ID );
				$report['created'][] = $cleanup_key . ':' . $slug;
			}
		}
		$seeded[ $cleanup_key ] = time();
	}

	// Categories.
	foreach ( $data['terms'] as $term ) {
		$key = $term['key'];
		// A description still carrying an earlier starter wording takes the current one,
		// whether or not the term was created in an earlier run.
		if ( ! empty( $term['previous'] ) ) {
			$existing_term = get_term_by( 'slug', $term['slug'], $term['taxonomy'] );
			if ( $existing_term && $existing_term->description === $term['previous'] ) {
				wp_update_term( $existing_term->term_id, $term['taxonomy'], array( 'description' => $term['description'] ) );
				$report['refreshed'][] = $key;
			}
		}
		if ( ! $wanted( $key ) ) {
			$report['skipped'][] = $key;
			continue;
		}
		if ( get_term_by( 'slug', $term['slug'], $term['taxonomy'] ) ) {
			$report['adopted'][] = $key;
		} else {
			$result = wp_insert_term(
				$term['name'],
				$term['taxonomy'],
				array(
					'slug'        => $term['slug'],
					'description' => $term['description'],
				)
			);
			if ( is_wp_error( $result ) ) {
				continue;
			}
			$report['created'][] = $key;
		}
		$seeded[ $key ] = time();
	}

	// Pages and posts.
	$author  = abr_seed_author();
	$special = array();
	$ids     = array();
	foreach ( $data['items'] as $item ) {
		$key = $item['key'];
		if ( ! $wanted( $key ) ) {
			$report['skipped'][] = $key;
			$post                = abr_seed_post_by_key( $key );
			$post                = $post ? $post : abr_seed_post_by_slug( $item['type'], $item['slug'] );
			if ( $post && 'trash' !== $post->post_status ) {
				$ids[ $key ] = $post->ID;
				if ( ! empty( $item['special'] ) ) {
					$special[ $item['special'] ] = $post->ID;
				}
			}
			continue;
		}

		$content  = abr_seed_prepare_content( $item['content'] );
		$existing = abr_seed_post_by_slug( $item['type'], $item['slug'] );

		if ( $existing && 'privacy' === $item['special'] && abr_seed_is_default_privacy_draft( $existing ) ) {
			wp_update_post(
				array(
					'ID'           => $existing->ID,
					'post_title'   => $item['title'],
					'post_content' => $content,
					'post_excerpt' => $item['excerpt'],
					'post_status'  => 'publish',
				)
			);
			update_post_meta( $existing->ID, '_abr_seed', $key );
			update_post_meta( $existing->ID, '_abr_seed_hash', md5( $item['content'] ) );
			update_post_meta( $existing->ID, '_abr_seed_version', ABR_SEED_VERSION );
			abr_seed_set_description( $existing->ID, $item );
			$report['created'][] = $key;
			$post_id             = $existing->ID;
		} elseif ( $existing ) {
			$report['adopted'][] = $key;
			$post_id             = $existing->ID;
		} else {
			$postarr = array(
				'post_type'      => $item['type'],
				'post_status'    => 'publish',
				'post_title'     => $item['title'],
				'post_name'      => $item['slug'],
				'post_content'   => $content,
				'post_excerpt'   => $item['excerpt'],
				'post_author'    => $author,
				'menu_order'     => isset( $item['menu_order'] ) ? (int) $item['menu_order'] : 0,
				'comment_status' => 'page' === $item['type'] ? 'closed' : get_default_comment_status( 'post' ),
				'ping_status'    => 'closed',
			);
			if ( ! empty( $item['days_ago'] ) ) {
				$local                   = current_time( 'timestamp' ) - (int) $item['days_ago'] * DAY_IN_SECONDS; // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested
				$postarr['post_date']     = gmdate( 'Y-m-d H:i:s', $local );
				$postarr['post_date_gmt'] = get_gmt_from_date( $postarr['post_date'] );
			}
			if ( ! empty( $item['categories'] ) ) {
				$postarr['post_category'] = array_filter(
					array_map(
						function ( $slug ) {
							$term = get_term_by( 'slug', $slug, 'category' );
							return $term ? (int) $term->term_id : 0;
						},
						$item['categories']
					)
				);
			}
			$post_id = wp_insert_post( wp_slash( $postarr ), true );
			if ( is_wp_error( $post_id ) ) {
				continue;
			}
			update_post_meta( $post_id, '_abr_seed', $key );
			update_post_meta( $post_id, '_abr_seed_version', ABR_SEED_VERSION );
			update_post_meta( $post_id, '_abr_seed_hash', md5( $item['content'] ) );
			abr_seed_set_description( $post_id, $item );
			$report['created'][] = $key;
		}

		$ids[ $key ] = $post_id;
		if ( ! empty( $item['special'] ) ) {
			$special[ $item['special'] ] = $post_id;
		}
		$seeded[ $key ] = time();
	}

	// Parent pages, and structure sync for seeder-owned items from older seed versions.
	foreach ( $data['items'] as $item ) {
		$key = $item['key'];
		if ( empty( $ids[ $key ] ) ) {
			continue;
		}
		$post = get_post( $ids[ $key ] );
		if ( ! $post || get_post_meta( $post->ID, '_abr_seed', true ) !== $key ) {
			continue;
		}
		$parent  = ( ! empty( $item['parent'] ) && ! empty( $ids[ $item['parent'] ] ) ) ? (int) $ids[ $item['parent'] ] : 0;
		$version = (int) get_post_meta( $post->ID, '_abr_seed_version', true );
		$fresh   = in_array( $key, $report['created'], true );
		$update  = array();

		if ( ( $fresh || $version < ABR_SEED_VERSION ) && (int) $post->post_parent !== $parent ) {
			$update['post_parent'] = $parent;
		}
		if ( ! $fresh && $version < ABR_SEED_VERSION ) {
			if ( $post->post_name !== $item['slug'] ) {
				$update['post_name'] = $item['slug'];
			}
			$edited  = ! abr_seed_is_unedited( $post, $key );
			$replace = 'replace' === abr_get_option( 'seed_mode' );
			if ( $replace || ! $edited ) {
				if ( abr_seed_content_hash( $post->post_content ) !== md5( $item['content'] ) || $post->post_title !== $item['title'] || $post->post_excerpt !== $item['excerpt'] ) {
					$update['post_content'] = abr_seed_prepare_content( $item['content'] );
					$update['post_title']   = $item['title'];
					$update['post_excerpt'] = $item['excerpt'];
					$report[ $edited ? 'replaced' : 'refreshed' ][] = $key;
				}
				update_post_meta( $post->ID, '_abr_seed_hash', md5( $item['content'] ) );
			}
			// The description follows the same replace-or-unedited rule as the body, so a
			// wording correction reaches existing sites; an owner's own description is
			// kept once the page no longer matches its seeded content.
			if ( '' === (string) get_post_meta( $post->ID, '_abr_description', true ) || $replace || ! $edited ) {
				abr_seed_set_description( $post->ID, $item );
			}
			update_post_meta( $post->ID, '_abr_seed_version', ABR_SEED_VERSION );
		}
		if ( $update ) {
			$update['ID'] = $post->ID;
			wp_update_post( wp_slash( $update ) );
			if ( ! $fresh ) {
				$report['moved'][] = $key;
			}
		}
	}

	// Featured images for articles that carry a bundled photograph.
	foreach ( $data['items'] as $item ) {
		if ( empty( $item['photo'] ) || empty( $ids[ $item['key'] ] ) ) {
			continue;
		}
		$post_id = (int) $ids[ $item['key'] ];
		if ( get_post_meta( $post_id, '_abr_seed', true ) !== $item['key'] || get_post_meta( $post_id, '_abr_seed_photo', true ) || has_post_thumbnail( $post_id ) ) {
			continue;
		}
		$attachment = abr_seed_photo_attachment( $item['photo']['name'], $item['photo']['alt'] );
		if ( $attachment && set_post_thumbnail( $post_id, $attachment ) ) {
			update_post_meta( $post_id, '_abr_seed_photo', $item['photo']['name'] );
			$report['photos'][] = $item['key'];
		}
	}

	// Reading settings: a static front page and the Articles page, once, and only
	// when the site still shows latest posts with no front page chosen.
	$reading_key = 'option:reading';
	if ( ! $only && ! isset( $seeded[ $reading_key ] ) && ! empty( $special['front'] ) && ! empty( $special['posts'] ) ) {
		if ( 'posts' === get_option( 'show_on_front' ) && ! get_option( 'page_on_front' ) ) {
			update_option( 'page_on_front', (int) $special['front'] );
			update_option( 'page_for_posts', (int) $special['posts'] );
			update_option( 'show_on_front', 'page' );
			$report['created'][] = $reading_key;
		} else {
			$report['adopted'][] = $reading_key;
		}
		$seeded[ $reading_key ] = time();
	}

	// Items the starter set no longer carries go to the trash.
	if ( ! $only ) {
		$current = array_merge( wp_list_pluck( $data['items'], 'key' ), wp_list_pluck( $data['terms'], 'key' ) );
		foreach ( array_keys( $seeded ) as $key ) {
			if ( in_array( $key, $current, true ) || false !== strpos( $key, 'option:' ) || false !== strpos( $key, 'cleanup:' ) ) {
				continue;
			}
			$post = abr_seed_post_by_key( $key );
			if ( $post && 'trash' !== $post->post_status ) {
				wp_trash_post( $post->ID );
				$report['retired'][] = $key;
			}
		}
	}

	if ( function_exists( 'abr_search_rebuild_index' ) ) {
		abr_search_rebuild_index();
	}

	update_option( 'abr_seeded_slugs', $seeded, false );
	update_option( 'abr_seed_version', ABR_SEED_VERSION, false );
	update_option(
		'abr_seed_log',
		array(
			'time'    => time(),
			'version' => ABR_SEED_VERSION,
			'created'   => count( $report['created'] ),
			'adopted'   => count( $report['adopted'] ),
			'moved'     => count( $report['moved'] ),
			'refreshed' => count( $report['refreshed'] ),
			'replaced'  => count( $report['replaced'] ),
			'retired'   => count( $report['retired'] ),
			'photos'    => count( $report['photos'] ),
		),
		false
	);

	if ( $flush || $report['created'] || $report['moved'] ) {
		if ( ! function_exists( 'save_mod_rewrite_rules' ) ) {
			require_once ABSPATH . 'wp-admin/includes/misc.php';
		}
		flush_rewrite_rules( $flush );
	}
	return $report;
}

/**
 * Seed on activation.
 */
function abr_seed_on_activation() {
	abr_run_seeder();
}
add_action( 'after_switch_theme', 'abr_seed_on_activation' );

/**
 * Seed new items after a theme update, on the next admin load.
 */
function abr_seed_on_upgrade() {
	if ( wp_doing_ajax() || ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}
	if ( abr_seed_is_behind() ) {
		abr_run_seeder();
	}
}

/**
 * Whether the site carries an older version of the starter content.
 *
 * @return bool
 */
function abr_seed_is_behind() {
	return (int) get_option( 'abr_seed_version', 0 ) < ABR_SEED_VERSION;
}

/**
 * Starter items the site is missing and has not deleted.
 *
 * @return string[] Keys.
 */
function abr_seed_missing_keys() {
	$data    = abr_seed_data();
	$seeded  = (array) get_option( 'abr_seeded_slugs', array() );
	$missing = array();
	foreach ( $data['items'] as $item ) {
		if ( isset( $seeded[ $item['key'] ] ) ) {
			continue;
		}
		$missing[] = $item['key'];
	}
	return $missing;
}

/**
 * Run the seeder without waiting for an admin visit.
 *
 * The upgrade hook above needs someone with edit_theme_options to open an admin
 * screen. On a site where that does not happen, new starter content would never
 * appear, so this runs on an ordinary request instead, once, behind a lock.
 */
function abr_seed_on_request() {
	if ( wp_doing_ajax() || wp_doing_cron() || is_admin() || ! abr_seed_is_behind() ) {
		return;
	}
	if ( get_transient( 'abr_seed_running' ) ) {
		return;
	}
	set_transient( 'abr_seed_running', 1, 5 * MINUTE_IN_SECONDS );
	abr_run_seeder();
	delete_transient( 'abr_seed_running' );
}
add_action( 'wp_loaded', 'abr_seed_on_request', 20 );
add_action( 'admin_init', 'abr_seed_on_upgrade', 20 );

/**
 * Status of every seed item, for the Tools tab.
 *
 * @return array[] Each: key, label, kind, state, post (WP_Post|null).
 */
function abr_seed_status() {
	$data   = abr_seed_data();
	$seeded = abr_seed_tombstones();
	$rows   = array();

	foreach ( $data['items'] as $item ) {
		$post  = abr_seed_post_by_key( $item['key'] );
		$state = 'pending';
		if ( $post ) {
			$state = 'trash' === $post->post_status ? 'trash' : $post->post_status;
		} else {
			$post = abr_seed_post_by_slug( $item['type'], $item['slug'] );
			if ( $post ) {
				$state = 'kept';
			} elseif ( isset( $seeded[ $item['key'] ] ) ) {
				$state = 'deleted';
			}
		}
		$rows[] = array(
			'key'   => $item['key'],
			'label' => $item['title'],
			'kind'  => 'page' === $item['type'] ? __( 'Page', 'abrahamic' ) : __( 'Article', 'abrahamic' ),
			'state' => $state,
			'post'  => $post,
		);
	}
	return $rows;
}

/**
 * Tools: add missing starter content.
 */
function abr_handle_seed_run() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to add starter content.', 'abrahamic' ), 403 );
	}
	check_admin_referer( 'abr_seed_run' );
	$report = abr_run_seeder();
	wp_safe_redirect(
		abr_options_url(
			'tools',
			array(
				'abr-notice'  => 'seeded',
				'abr-created' => count( $report['created'] ),
			)
		) . '#abr-seed'
	);
	exit;
}
add_action( 'admin_post_abr_seed_run', 'abr_handle_seed_run' );

/**
 * Tools: restore one deleted starter item.
 */
function abr_handle_seed_restore() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to restore starter content.', 'abrahamic' ), 403 );
	}
	$key = isset( $_POST['abr_seed_key'] ) ? sanitize_text_field( wp_unslash( $_POST['abr_seed_key'] ) ) : '';
	check_admin_referer( 'abr_seed_restore_' . $key );

	$known = wp_list_pluck( abr_seed_data()['items'], 'key' );
	if ( ! in_array( $key, $known, true ) ) {
		wp_safe_redirect( abr_options_url( 'tools', array( 'abr-notice' => 'restore-failed' ) ) . '#abr-seed' );
		exit;
	}

	$seeded = abr_seed_tombstones();
	unset( $seeded[ $key ] );
	update_option( 'abr_seeded_slugs', $seeded, false );
	$report = abr_run_seeder( array( $key ) );

	$code = in_array( $key, $report['created'], true ) ? 'restored' : 'restore-failed';
	wp_safe_redirect( abr_options_url( 'tools', array( 'abr-notice' => $code ) ) . '#abr-seed' );
	exit;
}
add_action( 'admin_post_abr_seed_restore', 'abr_handle_seed_restore' );
