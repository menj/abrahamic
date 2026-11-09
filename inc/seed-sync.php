<?php
/**
 * Starter content that follows the bundle, safely.
 *
 * The seeder (seed.php) creates each item once and refreshes it when ABR_SEED_VERSION rises. This file decides
 * what it may overwrite and lets the owner review what it may not. It never touches an item the owner created.
 *
 * Fingerprints. When the seeder writes an item it records the fingerprint of the stored text (title, excerpt,
 * body and description) in post meta (_abr_sync_fp) and the fingerprint of the bundled entry it wrote from
 * (_abr_sync_bfp). An item counts as edited when its stored text no longer matches that record, and also when
 * no record exists. An item written before this record existed is judged by the older body hash
 * (_abr_seed_hash): the body must still match it.
 *
 * What the seeder and a sync do with an item it created (marked _abr_seed):
 *
 *   current     the bundle has not changed since the last write, or equals the stored text: nothing to do
 *   update      untouched by the owner, bundle text changed: takes the new text
 *   newer       edited by the owner, bundle text changed: listed with a diff; the owner takes the bundled
 *               text or keeps their own. This is true in both seed modes: the text of an edited item is
 *               never overwritten.
 *   trash       dropped from the bundle and untouched: moved to the Trash, never deleted
 *   removed     dropped from the bundle and edited: listed
 *
 * Supersedes. inc/seed/supersedes.json (and the abr_supersedes filter) is { "page" or "post": { old slug: new
 * slug } }. While the new item is published and the old one is untouched, the old one answers with a 301, is
 * hidden from lists, search, feeds and sitemaps, carries noindex, and is moved to the Trash. An old item the
 * owner edited is listed instead. The map ships empty.
 *
 * Guards. Removals stop when the bundle fails its checksum (inc/seed/checksums.json, written by
 * bin/seed-checksums.php), when it lists more than 10 percent fewer items than at the last good sync, or when
 * ABR_DISABLE_CONTENT_SYNC is true. The constant also switches off updates, the redirect and the hiding.
 *
 * @package Abrahamic
 * @since   2.96.20
 */

defined( 'ABSPATH' ) || exit;

/**
 * The kill switch.
 *
 * @return bool
 */
function abr_sync_disabled() {
	return defined( 'ABR_DISABLE_CONTENT_SYNC' ) && ABR_DISABLE_CONTENT_SYNC;
}

/**
 * Fingerprint of the texts the seeder owns for one item. The body is compared with links made root-relative, as
 * abr_seed_content_hash() does, so a stored page and a bundled entry agree.
 *
 * @param string $title       Title.
 * @param string $excerpt     Excerpt.
 * @param string $content     Body.
 * @param string $description Search description.
 * @return string
 */
function abr_sync_fp_values( $title, $excerpt, $content, $description ) {
	$content = str_replace( 'href="' . esc_url( home_url( '/' ) ), 'href="/', (string) $content );
	return md5( (string) wp_json_encode( array( (string) $title, (string) $excerpt, $content, (string) $description ) ) );
}

/**
 * Fingerprint of a bundled item.
 *
 * @param array $item Seed item.
 * @return string
 */
function abr_sync_bundle_fp( $item ) {
	return abr_sync_fp_values( $item['title'] ?? '', $item['excerpt'] ?? '', $item['content'] ?? '', $item['description'] ?? '' );
}

/**
 * Fingerprint of a stored post.
 *
 * @param WP_Post $post Post.
 * @return string
 */
function abr_sync_stored_fp( $post ) {
	return abr_sync_fp_values( $post->post_title, $post->post_excerpt, $post->post_content, (string) get_post_meta( $post->ID, '_abr_description', true ) );
}

/**
 * What a sync does with one existing item. Pure.
 *
 * @param string $bundle_fp      Fingerprint of the bundled item.
 * @param string $stored_fp      Fingerprint of the stored text now.
 * @param string $recorded_fp    Fingerprint recorded when the theme last wrote it, '' when none.
 * @param string $last_bundle_fp Fingerprint of the bundled item at that write, '' when none.
 * @param string $ack            Bundle fingerprint the owner chose to keep their text against.
 * @return string current|update|newer|kept
 */
function abr_sync_decide( $bundle_fp, $stored_fp, $recorded_fp, $last_bundle_fp, $ack ) {
	if ( '' !== $last_bundle_fp && $last_bundle_fp === $bundle_fp ) {
		return 'current';
	}
	if ( $stored_fp === $bundle_fp ) {
		return 'current';
	}
	if ( '' !== $recorded_fp && $recorded_fp === $stored_fp ) {
		return 'update';
	}
	return $ack === $bundle_fp ? 'kept' : 'newer';
}

/**
 * What a sync does with an item the bundle no longer carries. Pure.
 *
 * @param string $stored_fp   Fingerprint of the stored text now.
 * @param string $recorded_fp Fingerprint recorded when the theme last wrote it, '' when none.
 * @param string $ack         The owner's earlier choice ('removed' keeps it quiet).
 * @return string trash|removed|kept
 */
function abr_sync_decide_removed( $stored_fp, $recorded_fp, $ack ) {
	if ( '' !== $recorded_fp && $recorded_fp === $stored_fp ) {
		return 'trash';
	}
	return 'removed' === $ack ? 'kept' : 'removed';
}

/**
 * Whether removals may run. Pure.
 *
 * @param bool $disabled    The kill switch.
 * @param bool $intact      The bundle matches its checksum and loaded.
 * @param int  $count_now   Bundled items now.
 * @param int  $count_prior Bundled items at the last good sync, 0 when none.
 * @return string '' when allowed, otherwise the reason.
 */
function abr_sync_guard( $disabled, $intact, $count_now, $count_prior ) {
	if ( $disabled ) {
		return 'the kill switch ABR_DISABLE_CONTENT_SYNC is on';
	}
	if ( ! $intact ) {
		return 'the starter content file is missing or fails its checksum';
	}
	if ( $count_prior > 0 && $count_now * 10 < $count_prior * 9 ) {
		return 'the bundle lists more than 10 percent fewer items than at the last good sync';
	}
	return '';
}

/**
 * Whether the seed files match the checksums shipped with the theme.
 *
 * @return bool
 */
function abr_sync_checksums_ok() {
	$sums = abr_seed_read_json( ABR_DIR . '/inc/seed/checksums.json' );
	foreach ( array( 'content', 'supersedes' ) as $name ) {
		$file = ABR_DIR . '/inc/seed/' . $name . '.json';
		if ( ! isset( $sums[ $name ] ) || ! is_readable( $file ) || md5_file( $file ) !== $sums[ $name ] ) {
			return false;
		}
	}
	return true;
}

/**
 * Whether removals may run now.
 *
 * @return string '' when allowed, otherwise the reason.
 */
function abr_sync_removal_block() {
	return abr_sync_guard( abr_sync_disabled(), abr_sync_checksums_ok() && ! empty( abr_seed_data()['items'] ), count( abr_seed_data()['items'] ), (int) get_option( 'abr_sync_count', 0 ) );
}

/**
 * The supersedes map, cleaned: type => ( old slug => new slug ).
 *
 * @return array<string,array<string,string>>
 */
function abr_supersedes() {
	$raw = abr_seed_read_json( ABR_DIR . '/inc/seed/supersedes.json' );
	$raw = apply_filters( 'abr_supersedes', $raw );
	$map = array();
	foreach ( is_array( $raw ) ? $raw : array() as $type => $pairs ) {
		if ( ! in_array( $type, array( 'page', 'post' ), true ) || ! is_array( $pairs ) ) {
			continue;
		}
		foreach ( $pairs as $old => $new ) {
			$old = sanitize_title( (string) $old );
			$new = sanitize_title( (string) $new );
			if ( '' !== $old && '' !== $new && $old !== $new ) {
				$map[ $type ][ $old ] = $new;
			}
		}
	}
	return $map;
}

/**
 * The seed items by key.
 *
 * @return array<string,array>
 */
function abr_sync_bundle() {
	$out = array();
	foreach ( abr_seed_data()['items'] as $item ) {
		$out[ $item['key'] ] = $item;
	}
	return $out;
}

/**
 * The state of a post against its own record.
 *
 * @param WP_Post $post Post.
 * @param string  $key  Seed key.
 * @return array{stored:string,recorded:string,bfp:string,ack:string}
 */
function abr_sync_state( $post, $key ) {
	$recorded = (string) get_post_meta( $post->ID, '_abr_sync_fp', true );
	$stored   = abr_sync_stored_fp( $post );
	if ( '' === $recorded && abr_seed_is_unedited( $post, $key ) ) {
		$recorded = $stored; // Only the older body record exists, and the body still matches it.
	}
	return array(
		'stored'   => $stored,
		'recorded' => $recorded,
		'bfp'      => (string) get_post_meta( $post->ID, '_abr_sync_bfp', true ),
		'ack'      => (string) get_post_meta( $post->ID, '_abr_sync_ack', true ),
	);
}

/**
 * Record the stored text of an item the seeder wrote, and the bundled entry it wrote from.
 *
 * @param int   $post_id Post ID.
 * @param array $item    Seed item.
 * @return void
 */
function abr_sync_record( $post_id, $item ) {
	$post = get_post( $post_id );
	if ( $post ) {
		update_post_meta( $post_id, '_abr_sync_fp', abr_sync_stored_fp( $post ) );
		update_post_meta( $post_id, '_abr_sync_bfp', abr_sync_bundle_fp( $item ) );
		delete_post_meta( $post_id, '_abr_sync_ack' );
	}
}

/**
 * The post the theme created for a slug, or null. Items the owner created are never returned.
 *
 * @param string $type Post type.
 * @param string $slug Slug.
 * @return WP_Post|null
 */
function abr_sync_post( $type, $slug ) {
	$post = abr_seed_post_by_slug( $type, $slug );
	return ( $post && get_post_meta( $post->ID, '_abr_seed', true ) ) ? $post : null;
}

/**
 * Superseded pairs that qualify now: old post ID => new post ID. The new one is published, the old one was made
 * by the theme and has not been edited.
 *
 * @return array<int,int>
 */
function abr_superseded_pairs() {
	static $cache = null;
	static $busy  = false;
	if ( null !== $cache ) {
		return $cache;
	}
	if ( $busy ) {
		return array(); // The lookups below fire pre_get_posts, which asks the unlist module, which asks here.
	}
	// The redirect and the hiding stand behind the same guards as the removal they lead to.
	$map = ( abr_sync_disabled() || '' !== abr_sync_removal_block() ) ? array() : abr_supersedes();
	if ( ! $map ) {
		$cache = array();
		return $cache;
	}
	$busy  = true;
	$cache = array();
	$bundle = abr_sync_bundle();
	foreach ( $map as $type => $pairs ) {
		foreach ( $pairs as $old => $new ) {
			$old_post = abr_sync_post( $type, $old );
			$new_post = abr_seed_post_by_slug( $type, $new );
			if ( ! $old_post || ! $new_post || 'publish' !== $old_post->post_status || 'publish' !== $new_post->post_status || $old_post->ID === $new_post->ID ) {
				continue;
			}
			$key = (string) get_post_meta( $old_post->ID, '_abr_seed', true );
			$s   = abr_sync_state( $old_post, $key );
			if ( '' !== $s['recorded'] && $s['recorded'] === $s['stored'] ) {
				$cache[ (int) $old_post->ID ] = (int) $new_post->ID;
			}
		}
	}
	unset( $bundle );
	$busy = false;
	return $cache;
}

/**
 * IDs of the superseded posts, for the unlist module.
 *
 * @return int[]
 */
function abr_superseded_ids() {
	return array_keys( abr_superseded_pairs() );
}

/**
 * The plan: one row per item that needs attention or can be told about.
 *
 * @return array<int,array{key:string,slug:string,title:string,post_id:int,action:string}>
 */
function abr_sync_plan() {
	$bundle = abr_sync_bundle();
	$rows   = array();
	foreach ( $bundle as $key => $item ) {
		$post = abr_seed_post_by_key( $key );
		if ( ! $post || 'trash' === $post->post_status ) {
			continue; // Never created, removed by the owner or retired: the seeder decides, never this plan.
		}
		$s      = abr_sync_state( $post, $key );
		$rows[] = array( 'key' => $key, 'slug' => $item['slug'], 'title' => $post->post_title, 'post_id' => (int) $post->ID, 'action' => abr_sync_decide( abr_sync_bundle_fp( $item ), $s['stored'], $s['recorded'], $s['bfp'], $s['ack'] ) );
	}
	foreach ( array_keys( abr_seed_tombstones() ) as $key ) {
		if ( isset( $bundle[ $key ] ) || false !== strpos( $key, 'option:' ) || false !== strpos( $key, 'cleanup:' ) || 0 !== strpos( $key, 'page:' ) && 0 !== strpos( $key, 'post:' ) ) {
			continue;
		}
		$post = abr_seed_post_by_key( $key );
		if ( ! $post || 'trash' === $post->post_status ) {
			continue;
		}
		$s      = abr_sync_state( $post, $key );
		$rows[] = array( 'key' => $key, 'slug' => $post->post_name, 'title' => $post->post_title, 'post_id' => (int) $post->ID, 'action' => abr_sync_decide_removed( $s['stored'], $s['recorded'], $s['ack'] ) );
	}
	$pairs = abr_superseded_pairs();
	foreach ( abr_supersedes() as $type => $map ) {
		foreach ( $map as $old => $new ) {
			$old_post = abr_sync_post( $type, $old );
			$new_post = abr_seed_post_by_slug( $type, $new );
			if ( ! $old_post || ! $new_post || 'publish' !== $old_post->post_status || 'publish' !== $new_post->post_status ) {
				continue;
			}
			$ack    = (string) get_post_meta( $old_post->ID, '_abr_sync_ack', true );
			$rows[] = array( 'key' => (string) get_post_meta( $old_post->ID, '_abr_seed', true ), 'slug' => $old, 'title' => $old_post->post_title, 'post_id' => (int) $old_post->ID, 'action' => isset( $pairs[ $old_post->ID ] ) ? 'supersede' : ( 'superseded' === $ack ? 'kept' : 'superseded' ) );
		}
	}
	return $rows;
}

/**
 * Append to the change log (the last 100 lines).
 *
 * @param string $key    Item.
 * @param string $action What happened.
 * @return void
 */
function abr_sync_log( $key, $action ) {
	$log   = (array) get_option( 'abr_sync_log', array() );
	$log[] = array( 't' => time(), 'key' => $key, 'action' => $action );
	update_option( 'abr_sync_log', array_slice( $log, -100 ), false );
}

/**
 * Write a bundled item's text into its post, inside the seeding flag, and record the fingerprints.
 *
 * @param WP_Post $post Post.
 * @param array   $item Seed item.
 * @return bool
 */
function abr_sync_write( $post, $item ) {
	$was                     = ! empty( $GLOBALS['abr_seeding'] );
	$GLOBALS['abr_seeding'] = true;
	try {
		$done = wp_update_post(
			wp_slash(
				array(
					'ID'           => $post->ID,
					'post_title'   => $item['title'],
					'post_excerpt' => $item['excerpt'],
					'post_content' => abr_seed_prepare_content( $item['content'] ),
				)
			),
			true
		);
		if ( ! $done || is_wp_error( $done ) ) {
			return false;
		}
		abr_seed_set_description( $post->ID, $item );
		update_post_meta( $post->ID, '_abr_seed_hash', md5( $item['content'] ) );
		abr_sync_record( $post->ID, $item );
		return true;
	} finally {
		$GLOBALS['abr_seeding'] = $was;
	}
}

/**
 * Run the review steps now: take the bundled text for untouched items, retire what the bundle dropped or
 * superseded when no guard stops it, and list everything that waits for the owner.
 *
 * @return array{updated:int,trashed:int,waiting:int,blocked:string}
 */
function abr_sync_apply() {
	$out = array( 'updated' => 0, 'trashed' => 0, 'waiting' => 0, 'blocked' => '' );
	if ( abr_sync_disabled() ) {
		$out['blocked'] = abr_sync_removal_block();
		return $out;
	}
	$bundle         = abr_sync_bundle();
	$blocked        = abr_sync_removal_block();
	$out['blocked'] = $blocked;
	foreach ( abr_sync_plan() as $row ) {
		$post = get_post( $row['post_id'] );
		if ( ! $post ) {
			continue;
		}
		switch ( $row['action'] ) {
			case 'current':
				if ( '' === (string) get_post_meta( $post->ID, '_abr_sync_fp', true ) && isset( $bundle[ $row['key'] ] ) && abr_sync_stored_fp( $post ) === abr_sync_bundle_fp( $bundle[ $row['key'] ] ) ) {
					abr_sync_record( $post->ID, $bundle[ $row['key'] ] ); // Ours and equal to the bundle: record it.
				}
				break;
			case 'update':
				if ( isset( $bundle[ $row['key'] ] ) && abr_sync_write( $post, $bundle[ $row['key'] ] ) ) {
					++$out['updated'];
					abr_sync_log( $row['key'], 'updated to the bundled text' );
				}
				break;
			case 'trash':
			case 'supersede':
				if ( '' === $blocked && 'trash' !== $post->post_status && wp_trash_post( $post->ID ) ) {
					++$out['trashed'];
					abr_sync_log( $row['key'], 'supersede' === $row['action'] ? 'moved to the Trash, replaced' : 'moved to the Trash, dropped from the bundle' );
				}
				break;
		}
	}
	abr_sync_refresh_pending( $blocked );
	$out['waiting'] = count( (array) get_option( 'abr_sync_pending', array() ) );
	if ( '' === $blocked ) {
		update_option( 'abr_sync_count', count( $bundle ), false );
	}
	return $out;
}

/**
 * Store what waits for the owner, for the notice.
 *
 * @param string|null $blocked The removal block, or null to compute it.
 * @return void
 */
function abr_sync_refresh_pending( $blocked = null ) {
	$blocked = null === $blocked ? abr_sync_removal_block() : $blocked;
	$pending = array();
	foreach ( abr_sync_plan() as $row ) {
		if ( in_array( $row['action'], array( 'newer', 'removed', 'superseded', 'trash', 'supersede' ), true ) ) {
			if ( in_array( $row['action'], array( 'trash', 'supersede' ), true ) && '' === $blocked ) {
				continue;
			}
			$pending[ $row['key'] ] = $row;
		}
	}
	update_option( 'abr_sync_pending', $pending, false );
}

/* -------------------------------------------------------------------------
 * The owner's choices, the notice and the card.
 * ---------------------------------------------------------------------- */

/** Where the review lives: Theme Options, Tools. */
function abr_sync_screen_url() {
	return abr_options_url( 'tools' ) . '#abr-content-sync';
}

/** Take the bundled text for one item, retire it, or keep the owner's own. All are logged. */
function abr_sync_handle_item() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to do that.', 'abrahamic' ), 403 );
	}
	check_admin_referer( 'abr_sync_item' );
	if ( abr_sync_disabled() ) {
		wp_safe_redirect( abr_sync_screen_url() ); // The switch comes before any choice: nothing is written or trashed.
		exit;
	}
	$key    = isset( $_POST['item'] ) ? sanitize_text_field( wp_unslash( $_POST['item'] ) ) : '';
	$choice = isset( $_POST['choice'] ) && 'take' === $_POST['choice'] ? 'take' : 'keep';
	$bundle = abr_sync_bundle();
	$post   = '' !== $key ? abr_seed_post_by_key( $key ) : null;
	if ( $post && get_post_meta( $post->ID, '_abr_seed', true ) === $key ) {
		$item = $bundle[ $key ] ?? null;
		if ( 'take' === $choice && $item ) {
			abr_sync_write( $post, $item );
			abr_sync_log( $key, 'took the bundled text' );
		} elseif ( 'take' === $choice ) {
			wp_trash_post( $post->ID ); // Dropped or superseded: the bundled choice is the Trash, never a deletion.
			abr_sync_log( $key, 'moved to the Trash by choice' );
		} else {
			$superseded = false;
			foreach ( abr_supersedes() as $map ) {
				$superseded = $superseded || isset( $map[ $post->post_name ] );
			}
			update_post_meta( $post->ID, '_abr_sync_ack', $item ? abr_sync_bundle_fp( $item ) : ( $superseded ? 'superseded' : 'removed' ) );
			abr_sync_log( $key, 'kept the owner text' );
		}
		abr_sync_apply();
	}
	wp_safe_redirect( abr_sync_screen_url() );
	exit;
}
add_action( 'admin_post_abr_sync_item', 'abr_sync_handle_item' );

/** Run the review now, with the same rules as the automatic step. */
function abr_sync_handle_now() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to do that.', 'abrahamic' ), 403 );
	}
	check_admin_referer( 'abr_sync_now' );
	if ( abr_sync_disabled() ) {
		wp_safe_redirect( abr_sync_screen_url() );
		exit;
	}
	abr_sync_apply();
	wp_safe_redirect( abr_sync_screen_url() );
	exit;
}
add_action( 'admin_post_abr_sync_now', 'abr_sync_handle_now' );

/** One grouped notice for everything that waits for the owner. */
function abr_sync_notice() {
	if ( ! current_user_can( 'edit_theme_options' ) || abr_sync_disabled() || 'keep' === abr_get_option( 'seed_mode' ) ) {
		return;
	}
	$newer = array();
	$gone  = array();
	foreach ( (array) get_option( 'abr_sync_pending', array() ) as $row ) {
		if ( 'newer' === ( $row['action'] ?? '' ) ) {
			$newer[] = (string) $row['title'];
		} elseif ( in_array( $row['action'] ?? '', array( 'removed', 'superseded' ), true ) ) {
			$gone[] = (string) $row['title'];
		}
	}
	if ( ! $newer && ! $gone ) {
		return;
	}
	echo '<div class="notice notice-warning"><p>' . esc_html__( 'Starter content has changes for items you edited. Nothing was overwritten or trashed.', 'abrahamic' ) . '</p>';
	if ( $newer ) {
		echo '<p>' . esc_html__( 'Newer version available:', 'abrahamic' ) . ' ' . esc_html( implode( '; ', $newer ) ) . '</p>';
	}
	if ( $gone ) {
		echo '<p>' . esc_html__( 'Removed from the bundle or replaced:', 'abrahamic' ) . ' ' . esc_html( implode( '; ', $gone ) ) . '</p>';
	}
	printf( '<p><a href="%s">%s</a></p></div>', esc_url( abr_sync_screen_url() ), esc_html__( 'Review them under Tools', 'abrahamic' ) );
}
add_action( 'admin_notices', 'abr_sync_notice' );

/**
 * The text of a field set as one block, for a diff.
 *
 * @param array $fields Fields.
 * @return string
 */
function abr_sync_blob( $fields ) {
	$out = '';
	foreach ( $fields as $name => $value ) {
		$out .= '[' . $name . "]\n" . (string) $value . "\n\n";
	}
	return $out;
}

/** The Tools card: a dry run, the owner's choices, a log. It is drawn outside every other form. */
function abr_render_content_sync_card() {
	$labels = array(
		'update'     => __( 'Would update (you have not edited it)', 'abrahamic' ),
		'newer'      => __( 'Newer version available (you edited it, so it stays as it is)', 'abrahamic' ),
		'trash'      => __( 'Would move to the Trash (dropped from the bundle, you have not edited it)', 'abrahamic' ),
		'removed'    => __( 'Dropped from the bundle (you edited it, so it stays)', 'abrahamic' ),
		'supersede'  => __( 'Would be redirected, hidden and moved to the Trash: its replacement is live', 'abrahamic' ),
		'superseded' => __( 'Replaced, but you edited it or the theme has no record of its text, so it stays', 'abrahamic' ),
		'kept'       => __( 'Kept as it is', 'abrahamic' ),
	);
	echo '<div id="abr-content-sync"><h2>' . esc_html__( 'Starter content: review', 'abrahamic' ) . '</h2>';
	echo '<p class="abr-help">' . esc_html__( 'What the next sync would do. Nothing here has been changed. An item you edited is never overwritten or trashed.', 'abrahamic' ) . '</p>';
	if ( abr_sync_disabled() ) {
		echo '<p>' . esc_html__( 'The content sync is switched off by ABR_DISABLE_CONTENT_SYNC.', 'abrahamic' ) . '</p>';
	}
	$blocked = abr_sync_removal_block();
	if ( '' !== $blocked && ! abr_sync_disabled() ) {
		echo '<div class="notice notice-warning inline"><p>' . esc_html( sprintf( /* translators: %s: reason. */ __( 'Removals are stopped: %s.', 'abrahamic' ), $blocked ) ) . '</p></div>';
	}
	$rows = array_filter( abr_sync_plan(), static function ( $r ) {
		return 'current' !== $r['action'];
	} );
	if ( ! $rows ) {
		echo '<p>' . esc_html__( 'Every item the theme created matches the bundle.', 'abrahamic' ) . '</p>';
	} else {
		$bundle = abr_sync_bundle();
		echo '<table class="widefat striped"><thead><tr><th scope="col">' . esc_html__( 'Item', 'abrahamic' ) . '</th><th scope="col">' . esc_html__( 'The next sync', 'abrahamic' ) . '</th><th scope="col">' . esc_html__( 'Your choice', 'abrahamic' ) . '</th></tr></thead><tbody>';
		foreach ( $rows as $row ) {
			echo '<tr><td>' . esc_html( $row['title'] ) . '<br><code>' . esc_html( $row['key'] ) . '</code>';
			if ( 'newer' === $row['action'] && isset( $bundle[ $row['key'] ] ) ) {
				$post = get_post( $row['post_id'] );
				if ( $post && function_exists( 'wp_text_diff' ) ) {
					$a    = $bundle[ $row['key'] ];
					$mine = abr_sync_blob( array( 'title' => $post->post_title, 'excerpt' => $post->post_excerpt, 'content' => str_replace( 'href="' . esc_url( home_url( '/' ) ), 'href="/', $post->post_content ), 'description' => (string) get_post_meta( $post->ID, '_abr_description', true ) ) );
					$new  = abr_sync_blob( array( 'title' => $a['title'], 'excerpt' => $a['excerpt'], 'content' => $a['content'], 'description' => $a['description'] ?? '' ) );
					$diff = wp_text_diff( $mine, $new, array( 'title_left' => __( 'Yours', 'abrahamic' ), 'title_right' => __( 'The bundled text', 'abrahamic' ) ) );
					if ( $diff ) {
						echo '<details><summary>' . esc_html__( 'Show the differences', 'abrahamic' ) . '</summary>' . $diff . '</details>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built by core's wp_text_diff(), which escapes the text.
					}
				}
			}
			echo '</td><td>' . esc_html( $labels[ $row['action'] ] ?? $row['action'] ) . '</td><td>';
			if ( ! abr_sync_disabled() && in_array( $row['action'], array( 'newer', 'removed', 'superseded', 'kept' ), true ) ) {
				$take = isset( $bundle[ $row['key'] ] ) ? __( 'Take the bundled text', 'abrahamic' ) : __( 'Move to the Trash', 'abrahamic' );
				foreach ( array( 'take' => $take, 'keep' => __( 'Keep mine', 'abrahamic' ) ) as $choice => $text ) {
					printf(
						'<form method="post" action="%1$s" style="display:inline"><input type="hidden" name="action" value="abr_sync_item"><input type="hidden" name="item" value="%2$s"><input type="hidden" name="choice" value="%3$s">%4$s<button type="submit" class="button button-small">%5$s</button></form> ',
						esc_url( admin_url( 'admin-post.php' ) ),
						esc_attr( $row['key'] ),
						esc_attr( $choice ),
						wp_nonce_field( 'abr_sync_item', '_wpnonce', true, false ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- core's nonce field.
						esc_html( $text )
					);
				}
			}
			echo '</td></tr>';
		}
		echo '</tbody></table>';
	}
	if ( ! abr_sync_disabled() ) {
		printf(
			'<form method="post" action="%s" class="abr-tools-form" style="margin-top:12px"><input type="hidden" name="action" value="abr_sync_now">%s<button type="submit" class="button">%s</button></form>',
			esc_url( admin_url( 'admin-post.php' ) ),
			wp_nonce_field( 'abr_sync_now', '_wpnonce', true, false ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- core's nonce field.
			esc_html__( 'Run the review now', 'abrahamic' )
		);
	}
	$log = array_reverse( (array) get_option( 'abr_sync_log', array() ) );
	echo '<h3>' . esc_html__( 'What changed', 'abrahamic' ) . '</h3>';
	if ( ! $log ) {
		echo '<p>' . esc_html__( 'Nothing yet.', 'abrahamic' ) . '</p>';
	} else {
		echo '<table class="widefat striped"><thead><tr><th scope="col">' . esc_html__( 'When', 'abrahamic' ) . '</th><th scope="col">' . esc_html__( 'Item', 'abrahamic' ) . '</th><th scope="col">' . esc_html__( 'What happened', 'abrahamic' ) . '</th></tr></thead><tbody>';
		foreach ( $log as $line ) {
			echo '<tr><td>' . esc_html( wp_date( 'Y-m-d H:i', (int) $line['t'] ) ) . '</td><td>' . esc_html( (string) $line['key'] ) . '</td><td>' . esc_html( (string) $line['action'] ) . '</td></tr>';
		}
		echo '</tbody></table>';
	}
	echo '</div>';
}

/* -------------------------------------------------------------------------
 * Superseded items: the 301 and the hiding.
 * ---------------------------------------------------------------------- */

/** The 301 from a superseded item to its replacement, at whatever address it answers. */
function abr_superseded_redirect() {
	if ( abr_sync_disabled() || is_admin() || is_preview() || is_feed() ) {
		return;
	}
	if ( is_singular() ) {
		$pairs = abr_superseded_pairs();
		$id    = (int) get_queried_object_id();
		if ( isset( $pairs[ $id ] ) ) {
			wp_safe_redirect( get_permalink( $pairs[ $id ] ), 301 );
			exit;
		}
		return;
	}
	if ( ! is_404() || '' !== abr_sync_removal_block() ) {
		return;
	}
	// After the old item is in the Trash its address is a 404. The last path segment is its slug, whatever the
	// parent pages or the permalink base. Only an item the theme created and moved to the Trash qualifies.
	$path = trim( (string) wp_parse_url( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ?? '' ) ), PHP_URL_PATH ), '/' );
	$slug = sanitize_title( (string) basename( $path ) );
	if ( '' === $slug ) {
		return;
	}
	foreach ( abr_supersedes() as $type => $pairs ) {
		if ( ! isset( $pairs[ $slug ] ) ) {
			continue;
		}
		$old = get_posts(
			array(
				'post_type'   => $type,
				'post_status' => 'trash',
				'name'        => $slug . '__trashed', // WordPress renames a trashed post this way.
				'numberposts' => 1,
				'fields'      => 'ids',
				'meta_key'    => '_abr_seed', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_query_meta_key -- one lookup on a 404.
				'meta_compare' => 'EXISTS',
			)
		);
		$new = abr_seed_post_by_slug( $type, $pairs[ $slug ] );
		if ( $old && $new && 'publish' === $new->post_status ) {
			wp_safe_redirect( get_permalink( $new ), 301 );
			exit;
		}
	}
}
add_action( 'template_redirect', 'abr_superseded_redirect', 1 );

/**
 * While the unlist module is in charge, superseded items are part of its list (see abr_unlisted_ids()). When it
 * stands down (the Unlist Posts plugin switches it off), this hides them: out of lists, search and feeds, out of
 * the sitemaps, and noindex on their own page. An editor at work sees everything.
 */
function abr_superseded_fallback() {
	if ( apply_filters( 'unlist_posts_enabled', true ) ) {
		return;
	}
	add_action(
		'pre_get_posts',
		static function ( $q ) {
			if ( abr_sync_disabled() || ( is_admin() && ! wp_doing_ajax() ) || $q->is_singular() || $q->get( 'p' ) || $q->get( 'name' ) || $q->get( 'pagename' ) ) {
				return;
			}
			$ids = abr_superseded_ids();
			if ( $ids && ! $q->get( 'post__in' ) ) {
				$q->set( 'post__not_in', array_values( array_unique( array_merge( (array) $q->get( 'post__not_in' ), $ids ) ) ) );
			}
		}
	);
	add_filter(
		'wp_sitemaps_posts_query_args',
		static function ( $args ) {
			$ids = abr_superseded_ids();
			if ( $ids ) {
				$args['post__not_in'] = array_merge( (array) ( $args['post__not_in'] ?? array() ), $ids );
			}
			return $args;
		}
	);
	add_filter(
		'wp_robots',
		static function ( $robots ) {
			return is_singular() && in_array( (int) get_queried_object_id(), abr_superseded_ids(), true ) ? wp_robots_no_robots( $robots ) : $robots;
		}
	);
}
add_action( 'init', 'abr_superseded_fallback', 20 );
