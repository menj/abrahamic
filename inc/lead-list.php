<?php
/**
 * Lead and list: the newest article large on the left, the next five as a
 * stacked list on the right, above the article grid on the first page of the
 * Journal and of each archive. The abrahamic/lead-list block draws it; with
 * fewer than five articles, or a lead without a photograph, it draws nothing
 * and the grid shows as before.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/** How many articles the list beside the lead holds. */
const ABR_LEAD_LIST_MAX = 5;

/** The fewest articles the layout needs, the lead included. */
const ABR_LEAD_LIST_MIN = 5;

/**
 * Credit line for a post's featured image: the bundled photograph's entry in
 * inc/seed/photo-credits.json when the image is the seeded one, otherwise the
 * attachment's caption.
 *
 * @param int $post_id Post ID.
 * @return string HTML, or '' when there is no credit to show.
 */
function abr_lead_list_credit( $post_id ) {
	$thumb = (int) get_post_thumbnail_id( $post_id );
	if ( ! $thumb ) {
		return '';
	}
	$name     = (string) get_post_meta( $post_id, '_abr_seed_photo', true );
	$given_id = (int) get_post_meta( $post_id, '_abr_seed_photo_id', true );
	$map      = (array) get_option( 'abr_seed_photos', array() );
	if ( '' !== $name && ( $thumb === $given_id || ( isset( $map[ $name ] ) && (int) $map[ $name ] === $thumb ) ) && function_exists( 'abr_photo_credit' ) ) {
		$credit = abr_photo_credit( $name );
		if ( $credit ) {
			$who  = '' !== (string) $credit['creator'] ? $credit['creator'] : $credit['source'];
			$line = '' !== (string) $credit['page'] ? '<a href="' . esc_url( $credit['page'] ) . '">' . esc_html( $who ) . '</a>' : esc_html( $who );
			if ( $who !== $credit['source'] ) {
				$line .= ', ' . esc_html( $credit['source'] );
			}
			if ( '' !== (string) $credit['licence'] ) {
				$line .= ' (' . ( '' !== (string) $credit['license'] ? '<a href="' . esc_url( $credit['license'] ) . '" rel="license">' . esc_html( $credit['licence'] ) . '</a>' : esc_html( $credit['licence'] ) ) . ')';
			}
			/* translators: %s: photographer, source and licence. */
			return sprintf( esc_html__( 'Photograph: %s', 'abrahamic' ), $line );
		}
	}
	$caption = wp_get_attachment_caption( $thumb );
	return $caption ? wp_kses( $caption, array( 'a' => array( 'href' => true, 'rel' => true, 'target' => true ) ) ) : '';
}

/**
 * Draw the lead and list.
 *
 * @param WP_Post[] $posts Articles, newest first.
 * @param array     $args  {
 *     @type string $heading    Section heading.
 *     @type string $heading_id ID of the heading, for aria-labelledby.
 *     @type int    $lead_id    Article to lead with; the newest leads when it is 0 or not usable.
 *     @type int    $max        Articles in the list (at most five).
 * }
 * @return array { html: string, ids: int[] } html is '' when the layout does not apply.
 */
function abr_lead_list( array $posts, array $args = array() ) {
	$args  = wp_parse_args(
		$args,
		array(
			'heading'    => __( 'Latest articles', 'abrahamic' ),
			'heading_id' => 'abr-lead-list-heading',
			'lead_id'    => 0,
			'max'        => ABR_LEAD_LIST_MAX,
		)
	);
	$empty = array(
		'html' => '',
		'ids'  => array(),
	);

	$posts = array_values(
		array_filter(
			array_map( 'get_post', $posts ),
			static function ( $p ) {
				return $p instanceof WP_Post && 'publish' === $p->post_status && ! ( function_exists( 'abr_is_unlisted' ) && abr_is_unlisted( $p->ID ) );
			}
		)
	);

	$lead    = null;
	$lead_id = (int) $args['lead_id'];
	if ( $lead_id ) {
		foreach ( $posts as $i => $p ) {
			if ( $p->ID === $lead_id ) {
				$lead = $p;
				unset( $posts[ $i ] );
				break;
			}
		}
		if ( ! $lead ) {
			$chosen = get_post( $lead_id );
			if ( $chosen instanceof WP_Post && 'publish' === $chosen->post_status && ! ( function_exists( 'abr_is_unlisted' ) && abr_is_unlisted( $chosen->ID ) ) ) {
				$lead = $chosen;
			}
		}
	}
	if ( ! $lead ) {
		$lead = array_shift( $posts );
	}
	$list = array_slice( array_values( $posts ), 0, max( 1, min( ABR_LEAD_LIST_MAX, (int) $args['max'] ) ) );

	if ( ! $lead || 1 + count( $list ) < ABR_LEAD_LIST_MIN || ! has_post_thumbnail( $lead ) ) {
		return $empty;
	}

	$heading_id = sanitize_html_class( $args['heading_id'] );
	$lead_img   = get_the_post_thumbnail(
		$lead,
		'large',
		array(
			'class'         => 'abr-lead-list__img',
			'loading'       => 'eager',
			'fetchpriority' => 'high',
			'sizes'         => '(max-width: 781px) 100vw, 60vw',
		)
	);
	if ( '' === $lead_img ) {
		return $empty;
	}
	$credit = abr_lead_list_credit( $lead->ID );

	$html  = '<section class="abr-lead-list alignwide" aria-labelledby="' . esc_attr( $heading_id ) . '">';
	$html .= '<h2 class="abr-lead-list__heading" id="' . esc_attr( $heading_id ) . '">' . esc_html( $args['heading'] ) . '</h2>';
	$html .= '<div class="abr-lead-list__grid">';
	$html .= '<article class="abr-lead-list__lead"><figure class="abr-lead-list__figure">';
	$html .= '<div class="abr-lead-list__media">' . $lead_img;
	$html .= '<div class="abr-lead-list__overlay"><span class="abr-lead-list__rule" aria-hidden="true"></span>';
	$html .= '<h3 class="abr-lead-list__title"><a class="abr-lead-list__link" href="' . esc_url( get_permalink( $lead ) ) . '">' . esc_html( get_the_title( $lead ) ) . '</a></h3>';
	$html .= '</div></div>';
	if ( '' !== $credit ) {
		$html .= '<figcaption class="abr-lead-list__credit">' . $credit . '</figcaption>';
	}
	$html .= '</figure></article>';

	$html .= '<ul class="abr-lead-list__list">';
	foreach ( $list as $item ) {
		$thumb = has_post_thumbnail( $item ) ? get_the_post_thumbnail(
			$item,
			'medium',
			array(
				'class'   => 'abr-lead-list__thumb-img',
				'alt'     => '',
				'loading' => 'lazy',
				'sizes'   => '(max-width: 781px) 40vw, 12rem',
			)
		) : '';
		$html .= '<li class="abr-lead-list__item">';
		$html .= '<span class="abr-lead-list__thumb' . ( '' === $thumb ? ' abr-lead-list__thumb--empty abr-panel-art' : '' ) . '" aria-hidden="true">' . $thumb . '</span>';
		$html .= '<h3 class="abr-lead-list__item-title"><a class="abr-lead-list__link" href="' . esc_url( get_permalink( $item ) ) . '">' . esc_html( get_the_title( $item ) ) . '</a></h3>';
		$html .= '</li>';
	}
	$html .= '</ul></div></section>';

	return array(
		'html' => $html,
		'ids'  => array_merge( array( $lead->ID ), wp_list_pluck( $list, 'ID' ) ),
	);
}

/**
 * Articles the lead and list showed on this request, so the grid below can
 * leave them out.
 *
 * @param int[]|null $ids IDs to record, or null to read.
 * @return int[]
 */
function abr_lead_list_shown( $ids = null ) {
	static $shown = array();
	if ( null !== $ids ) {
		$shown = array_map( 'intval', $ids );
	}
	return $shown;
}

/**
 * Render callback of the abrahamic/lead-list block: the first page of the
 * Journal and of an archive, from the articles the main query already holds.
 *
 * @param array $attributes Block attributes.
 * @return string
 */
function abr_lead_list_block_render( $attributes ) {
	global $wp_query;
	if ( is_admin() || is_paged() || ! ( is_home() || is_archive() ) || ! $wp_query instanceof WP_Query || empty( $wp_query->posts ) ) {
		return '';
	}
	$attributes = is_array( $attributes ) ? $attributes : array();
	$heading    = isset( $attributes['heading'] ) ? trim( (string) $attributes['heading'] ) : '';
	if ( '' === $heading ) {
		$term = is_category() || is_tag() || is_tax() ? get_queried_object() : null;
		/* translators: %s: topic or tag name. */
		$heading = $term instanceof WP_Term ? sprintf( __( 'Latest in %s', 'abrahamic' ), $term->name ) : __( 'Latest articles', 'abrahamic' );
	}
	$out        = abr_lead_list(
		array_slice( $wp_query->posts, 0, 1 + ABR_LEAD_LIST_MAX ),
		array(
			'heading' => $heading,
			'lead_id' => isset( $attributes['leadId'] ) ? (int) $attributes['leadId'] : 0,
		)
	);
	if ( '' === $out['html'] ) {
		return '';
	}
	abr_lead_list_shown( $out['ids'] );
	return $out['html'];
}

/**
 * Register the block. It is dynamic and has no editor script: the site editor
 * shows it as a placeholder, and the page draws it from the main query.
 */
function abr_lead_list_register() {
	register_block_type(
		'abrahamic/lead-list',
		array(
			'api_version'     => 3,
			'title'           => __( 'Lead and list', 'abrahamic' ),
			'category'        => 'theme',
			'attributes'      => array(
				'heading' => array(
					'type'    => 'string',
					'default' => '',
				),
				'leadId'  => array(
					'type'    => 'integer',
					'default' => 0,
				),
			),
			'render_callback' => 'abr_lead_list_block_render',
		)
	);
}
add_action( 'init', 'abr_lead_list_register' );

/**
 * The grid of the main query leaves out the articles the lead and list
 * already showed: its post template runs on the remaining ones, then the
 * main query is restored for pagination and everything after it.
 *
 * @param string|null   $pre    Short-circuit output.
 * @param array         $parsed Parsed block.
 * @param WP_Block|null $parent Parent block.
 * @return string|null
 */
function abr_lead_list_grid_before( $pre, $parsed, $parent = null ) {
	global $wp_query;
	$shown = abr_lead_list_shown();
	if ( null !== $pre || ! $shown || 'core/post-template' !== ( $parsed['blockName'] ?? '' ) || ! $parent instanceof WP_Block || empty( $parent->parsed_block['attrs']['query']['inherit'] ) || ! $wp_query instanceof WP_Query ) {
		return $pre;
	}
	$GLOBALS['abr_lead_list_saved'] = array( $wp_query->posts, $wp_query->post_count, $wp_query->post, $GLOBALS['post'] ?? null );
	$rest                           = array_values(
		array_filter(
			$wp_query->posts,
			static function ( $p ) use ( $shown ) {
				return ! in_array( (int) ( is_object( $p ) ? $p->ID : $p ), $shown, true );
			}
		)
	);
	$wp_query->posts      = $rest;
	$wp_query->post_count = count( $rest );
	$wp_query->rewind_posts();
	return $pre;
}
add_filter( 'pre_render_block', 'abr_lead_list_grid_before', 10, 3 );

/**
 * Restore the main query, its current post and the global post after the
 * grid's post template.
 *
 * @param string $content Block HTML.
 * @param array  $block   Parsed block.
 * @return string
 */
function abr_lead_list_grid_after( $content, $block ) {
	global $wp_query;
	if ( 'core/post-template' === ( $block['blockName'] ?? '' ) && isset( $GLOBALS['abr_lead_list_saved'] ) && $wp_query instanceof WP_Query ) {
		list( $wp_query->posts, $wp_query->post_count, $wp_query->post, $GLOBALS['post'] ) = $GLOBALS['abr_lead_list_saved'];
		unset( $GLOBALS['abr_lead_list_saved'] );
		$wp_query->rewind_posts();
		// The loop moved the global post on; put it back, with the template tags' data.
		if ( $GLOBALS['post'] instanceof WP_Post ) {
			setup_postdata( $GLOBALS['post'] );
		}
	}
	return $content;
}
add_filter( 'render_block', 'abr_lead_list_grid_after', 10, 2 );

/**
 * The stylesheet, on the first page of the Journal and of the archives that use archive.html (tags have tag.html). It is
 * enqueued with the theme's own styles rather than while the block or list
 * renders: an enqueue made during rendering prints the theme stylesheet it
 * depends on above the core block styles, and they then win over it.
 */
function abr_lead_list_assets() {
	if ( is_paged() || ! ( is_home() || ( is_archive() && ! is_tag() ) ) ) {
		return;
	}
	wp_enqueue_style( 'abr-lead-list', ABR_URI . '/assets/css/lead-list.css', array( 'abr-theme' ), ABR_VERSION );
}
add_action( 'wp_enqueue_scripts', 'abr_lead_list_assets', 20 );
