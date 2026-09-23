<?php
/**
 * Site structure: link resolution, breadcrumbs, hub listings, site map,
 * related articles and the Theme Options navigation builder.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Seed key => post ID for every seeder-owned post, in one query per request.
 *
 * @return array
 */
function abr_seed_index() {
	static $index = null;
	if ( null === $index ) {
		$index = array();
		$posts = get_posts(
			array(
				'post_type'        => array( 'post', 'page' ),
				'post_status'      => 'publish',
				'posts_per_page'   => -1,
				'meta_key'         => '_abr_seed', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_query_meta_key
				'suppress_filters' => true,
				'no_found_rows'    => true,
			)
		);
		foreach ( $posts as $post ) {
			$index[ get_post_meta( $post->ID, '_abr_seed', true ) ] = $post->ID;
		}
	}
	return $index;
}

/**
 * Post ID for a seed key, or 0.
 *
 * @param string $key Seed key, with or without the "page:" prefix.
 * @return int
 */
function abr_seed_id( $key ) {
	$key   = false === strpos( $key, ':' ) ? 'page:' . $key : $key;
	$index = abr_seed_index();
	return isset( $index[ $key ] ) ? (int) $index[ $key ] : 0;
}

/**
 * Resolve a link target.
 *
 * Accepts a full URL, a root-relative path, an in-page anchor, or a token:
 * `@slug` (seed page), `@post:slug` (seed article), `@topic:slug` (category),
 * `@privacy-policy` (the WordPress privacy page), `@articles` (posts page).
 *
 * @param string $target Target.
 * @return array { url: string, id: int, kind: string, type: string }
 */
function abr_resolve_link( $target ) {
	$target = trim( (string) $target );
	$out    = array(
		'url'  => '',
		'id'   => 0,
		'kind' => 'custom',
		'type' => '',
	);
	if ( '' === $target ) {
		return $out;
	}
	if ( '@' !== $target[0] ) {
		$out['url'] = ( '/' === $target[0] ) ? home_url( $target ) : $target;
		return $out;
	}

	$token = substr( $target, 1 );
	$alias = array(
		'reference' => 'knowledge-base',
		'insights'  => 'articles',
		'journal'   => 'articles',
		'religions' => 'guides',
		'mandaeism' => 'mandaeism',
	);
	$token = isset( $alias[ $token ] ) ? $alias[ $token ] : $token;
	if ( 0 === strpos( $token, 'topic:' ) ) {
		$term = get_term_by( 'slug', substr( $token, 6 ), 'category' );
		if ( $term ) {
			$out = array(
				'url'  => get_term_link( $term ),
				'id'   => (int) $term->term_id,
				'kind' => 'taxonomy',
				'type' => 'category',
			);
		}
		return $out;
	}

	$id = abr_seed_id( $token );
	if ( ! $id && 'privacy-policy' === $token ) {
		$id = (int) get_option( 'wp_page_for_privacy_policy' );
		$id = ( $id && 'publish' === get_post_status( $id ) ) ? $id : 0;
	}
	if ( ! $id && 'articles' === $token ) {
		$id = (int) get_option( 'page_for_posts' );
	}
	if ( $id ) {
		$out = array(
			'url'  => get_permalink( $id ),
			'id'   => $id,
			'kind' => 'post-type',
			'type' => get_post_type( $id ),
		);
	}
	return $out;
}

/**
 * URL for a link target.
 *
 * @param string $target   Target, see abr_resolve_link().
 * @param string $fallback Root-relative path used when a token does not resolve.
 * @return string
 */
function abr_link( $target, $fallback = '/' ) {
	$link = abr_resolve_link( $target );
	if ( $link['url'] ) {
		return $link['url'];
	}
	if ( '' === $fallback ) {
		return '';
	}
	// A page token that resolves to nothing would otherwise send readers to a
	// missing address, so the fallback is used only when something answers there.
	if ( 0 === strpos( (string) $target, '@' ) && 0 === strpos( $fallback, '/' ) && ! abr_path_exists( $fallback ) ) {
		return '';
	}
	return home_url( $fallback );
}

/**
 * Whether a root-relative path resolves to published content.
 *
 * @param string $path Path.
 * @return bool
 */
function abr_path_exists( $path ) {
	static $cache = array();
	$path = '/' . ltrim( (string) $path, '/' );
	if ( isset( $cache[ $path ] ) ) {
		return $cache[ $path ];
	}
	$page = get_page_by_path( trim( $path, '/' ) );
	$id   = $page ? $page->ID : url_to_postid( home_url( $path ) );
	$cache[ $path ] = (bool) $id && 'publish' === get_post_status( $id );
	return $cache[ $path ];
}

/**
 * Whether an address points to another site.
 *
 * @param string $url Address.
 * @return bool
 */
function abr_is_external( $url ) {
	$host = wp_parse_url( $url, PHP_URL_HOST );
	return $host && strtolower( $host ) !== strtolower( (string) wp_parse_url( home_url(), PHP_URL_HOST ) );
}

/**
 * Link markup with an external marker where the address leaves the site.
 *
 * @param string $url   Address.
 * @param string $label Label.
 * @return string
 */
function abr_menu_anchor( $url, $label ) {
	if ( ! abr_is_external( $url ) ) {
		return sprintf( '<a href="%1$s">%2$s</a>', esc_url( $url ), esc_html( $label ) );
	}
	return sprintf(
		'<a class="abr-external" href="%1$s">%2$s<span class="screen-reader-text"> %3$s</span></a>',
		esc_url( $url ),
		esc_html( $label ),
		/* translators: %s: site host. */
		esc_html( sprintf( __( '(on %s)', 'abrahamic' ), wp_parse_url( $url, PHP_URL_HOST ) ) )
	);
}

/**
 * Parse a navigation definition: one "Label | target" per line; a line starting
 * with "-" is a child of the previous top-level line.
 *
 * @param string $text Definition.
 * @return array[] Items: label, target, children.
 */
function abr_parse_menu( $text ) {
	$items = array();
	foreach ( preg_split( '/\r\n|\r|\n/', (string) $text ) as $line ) {
		$child = (bool) preg_match( '/^\s*-\s*/', $line );
		$line  = preg_replace( '/^\s*-\s*/', '', $line );
		$parts = array_map( 'trim', explode( '|', $line, 2 ) );
		if ( '' === $parts[0] || empty( $parts[1] ) ) {
			continue;
		}
		$item = array(
			'label'    => $parts[0],
			'target'   => $parts[1],
			'children' => array(),
		);
		if ( $child && $items ) {
			$items[ count( $items ) - 1 ]['children'][] = $item;
		} else {
			$items[] = $item;
		}
	}
	return $items;
}

/**
 * Navigation link block for a menu item.
 *
 * @param array $item Menu item.
 * @return array|null Parsed block.
 */
function abr_menu_block( $item ) {
	$link = abr_resolve_link( $item['target'] );
	if ( ! $link['url'] ) {
		return null;
	}
	$attrs = array(
		'label'          => $item['label'],
		'url'            => $link['url'],
		'kind'           => $link['kind'],
		'isTopLevelLink' => true,
	);
	if ( $link['id'] ) {
		$attrs['id']   = $link['id'];
		$attrs['type'] = 'category' === $link['type'] ? 'category' : $link['type'];
	}
	if ( abr_is_external( $link['url'] ) ) {
		$attrs['className'] = 'abr-external';
		/* translators: %s: site host. */
		$attrs['title'] = sprintf( __( 'Opens %s', 'abrahamic' ), wp_parse_url( $link['url'], PHP_URL_HOST ) );
	}
	$children = array_values( array_filter( array_map( 'abr_menu_block', $item['children'] ) ) );
	$name     = $children ? 'core/navigation-submenu' : 'core/navigation-link';
	return array(
		'blockName'    => $name,
		'attrs'        => $attrs,
		'innerBlocks'  => $children,
		'innerHTML'    => '',
		'innerContent' => array_fill( 0, count( $children ), null ),
	);
}

/**
 * Header navigation from Theme Options: replaces the links inside the
 * Navigation block that carries the `abr-primary-nav` class.
 *
 * @param array $block Parsed block.
 * @return array
 */
function abr_primary_nav_data( $block ) {
	if ( 'core/navigation' !== $block['blockName'] || empty( $block['attrs']['className'] ) || false === strpos( $block['attrs']['className'], 'abr-primary-nav' ) ) {
		return $block;
	}
	$items = array_slice( abr_parse_menu( abr_get_option( 'nav_header' ) ), 0, ABR_PRIMARY_NAV_MAX );
	foreach ( $items as $i => $item ) {
		$items[ $i ]['children'] = array_slice( $item['children'], 0, ABR_NAV_CHILDREN_MAX );
	}
	$inner = array_values( array_filter( array_map( 'abr_menu_block', $items ) ) );
	unset( $block['attrs']['ref'] );
	$block['innerBlocks']  = $inner;
	$block['innerContent'] = array_fill( 0, count( $inner ), null );
	return $block;
}
add_filter( 'render_block_data', 'abr_primary_nav_data' );

/**
 * Tell screen readers when a header menu link leaves the site.
 *
 * @param string $html  Block markup.
 * @param array  $block Parsed block.
 * @return string
 */
function abr_external_nav_label( $html, $block ) {
	if ( empty( $block['attrs']['className'] ) || false === strpos( $block['attrs']['className'], 'abr-external' ) || empty( $block['attrs']['url'] ) ) {
		return $html;
	}
	/* translators: %s: site host. */
	$note = ' <span class="screen-reader-text">' . esc_html( sprintf( __( '(on %s)', 'abrahamic' ), wp_parse_url( $block['attrs']['url'], PHP_URL_HOST ) ) ) . '</span>';
	return preg_replace( '#(<span class="wp-block-navigation-item__label">.*?</span>)#s', '$1' . $note, $html, 1 );
}
add_filter( 'render_block_core/navigation-link', 'abr_external_nav_label', 10, 2 );

/**
 * [abr_secondary_nav]: the secondary (site) menu from Theme Options, shown in the footer's bottom row.
 */
add_shortcode(
	'abr_secondary_nav',
	function () {
		$items  = array_slice( abr_parse_menu( abr_get_option( 'nav_secondary' ) ), 0, ABR_SECONDARY_NAV_MAX );
		$output = '';
		foreach ( $items as $item ) {
			$link = abr_resolve_link( $item['target'] );
			if ( ! $link['url'] ) {
				continue;
			}
			$current = ( 'post-type' === $link['kind'] && is_page() && get_queried_object_id() === $link['id'] )
				|| ( 'taxonomy' === $link['kind'] && is_category( $link['id'] ) );
			$output .= $current
				? sprintf( '<li><a href="%1$s" aria-current="page">%2$s</a></li>', esc_url( $link['url'] ), esc_html( $item['label'] ) )
				: '<li>' . abr_menu_anchor( $link['url'], $item['label'] ) . '</li>';
		}
		if ( ! $output ) {
			return '';
		}
		return '<nav class="abr-footer-links" aria-label="' . esc_attr__( 'Site information', 'abrahamic' ) . '"><ul>' . $output . '</ul></nav>';
	}
);

/**
 * [abr_further_reading]: the Further reading list from Theme Options, at the foot of articles.
 */
add_shortcode(
	'abr_further_reading',
	function () {
		$items  = array_slice( abr_parse_menu( abr_get_option( 'further_links' ) ), 0, ABR_FURTHER_MAX );
		$output = '';
		foreach ( $items as $item ) {
			$url = abr_link( $item['target'], '' );
			if ( $url && home_url( '' ) !== $url ) {
				$output .= '<li>' . abr_menu_anchor( $url, $item['label'] ) . '</li>';
			}
		}
		if ( ! $output ) {
			return '';
		}
		$title = abr_get_option( 'further_title' );
		$title = '' !== $title ? $title : __( 'Further reading', 'abrahamic' );
		return '<aside class="abr-further" aria-labelledby="abr-further-title"><h2 id="abr-further-title">' . esc_html( $title ) . '</h2><ul>' . $output . '</ul></aside>';
	}
);

/**
 * [abr_footer_menu column="1"]: a footer column from Theme Options.
 */
add_shortcode(
	'abr_footer_menu',
	function ( $atts ) {
		$atts   = shortcode_atts( array( 'column' => '1' ), $atts );
		$col    = max( 1, min( 3, (int) $atts['column'] ) );
		$title  = abr_get_option( 'nav_footer_' . $col . '_title' );
		$items  = abr_parse_menu( abr_get_option( 'nav_footer_' . $col ) );
		$output = '';
		foreach ( $items as $item ) {
			$url = abr_link( $item['target'], '' );
			if ( $url && home_url( '' ) !== $url ) {
				$output .= '<li>' . abr_menu_anchor( $url, $item['label'] ) . '</li>';
			}
		}
		if ( ! $output ) {
			return '';
		}
		return sprintf(
			'<nav class="abr-footer-menu" aria-label="%1$s">%2$s<ul>%3$s</ul></nav>',
			esc_attr( $title ? $title : __( 'Footer', 'abrahamic' ) ),
			$title ? '<h2>' . esc_html( $title ) . '</h2>' : '',
			$output
		);
	}
);

/**
 * Breadcrumb trail for the current view, shared by the visible breadcrumbs
 * and the BreadcrumbList structured data.
 *
 * @return array[] Each: name, url. Empty on the front page.
 */
function abr_breadcrumb_trail() {
	static $trail = null;
	if ( null !== $trail ) {
		return $trail;
	}
	$trail = array();
	if ( is_front_page() ) {
		return $trail;
	}
	$trail[]    = array(
		'name' => __( 'Home', 'abrahamic' ),
		'url'  => home_url( '/' ),
	);
	$posts_page = (int) get_option( 'page_for_posts' );
	$articles   = $posts_page ? array(
		'name' => get_the_title( $posts_page ),
		'url'  => get_permalink( $posts_page ),
	) : null;
	$topics_id  = abr_seed_id( 'page:topics' );
	$topics     = $topics_id ? array(
		'name' => get_the_title( $topics_id ),
		'url'  => get_permalink( $topics_id ),
	) : null;

	if ( is_home() ) {
		$trail[] = array(
			'name' => $posts_page ? get_the_title( $posts_page ) : __( 'Journal', 'abrahamic' ),
			'url'  => $posts_page ? get_permalink( $posts_page ) : home_url( '/' ),
		);
	} elseif ( is_singular( 'post' ) ) {
		$post = get_queried_object();
		if ( $articles ) {
			$trail[] = $articles;
		}
		$cats = get_the_category( $post->ID );
		if ( $cats ) {
			$trail[] = array(
				'name' => $cats[0]->name,
				'url'  => get_term_link( $cats[0] ),
			);
		}
		$trail[] = array(
			'name' => get_the_title( $post ),
			'url'  => get_permalink( $post ),
		);
	} elseif ( is_page() ) {
		$post = get_queried_object();
		foreach ( array_reverse( get_post_ancestors( $post ) ) as $ancestor ) {
			$trail[] = array(
				'name' => get_the_title( $ancestor ),
				'url'  => get_permalink( $ancestor ),
			);
		}
		$trail[] = array(
			'name' => get_the_title( $post ),
			'url'  => get_permalink( $post ),
		);
	} elseif ( is_category() || is_tag() ) {
		if ( $articles ) {
			$trail[] = $articles;
		}
		if ( is_category() && $topics ) {
			$trail[] = $topics;
		}
		$term    = get_queried_object();
		$trail[] = array(
			'name' => $term->name,
			'url'  => get_term_link( $term ),
		);
	} elseif ( is_search() ) {
		$trail[] = array(
			/* translators: %s: search terms. */
			'name' => sprintf( __( 'Search results for "%s"', 'abrahamic' ), get_search_query( false ) ),
			'url'  => get_search_link(),
		);
	} elseif ( is_404() ) {
		$trail[] = array(
			'name' => __( 'Page not found', 'abrahamic' ),
			'url'  => '',
		);
	} elseif ( is_archive() ) {
		if ( $articles ) {
			$trail[] = $articles;
		}
		$trail[] = array(
			'name' => wp_strip_all_tags( get_the_archive_title() ),
			'url'  => '',
		);
	}
	return $trail;
}

/**
 * [abr_breadcrumbs]: visible breadcrumb trail.
 */
add_shortcode(
	'abr_breadcrumbs',
	function () {
		$trail = abr_breadcrumb_trail();
		if ( count( $trail ) < 2 ) {
			return '';
		}
		$items = '';
		$last  = count( $trail ) - 1;
		foreach ( $trail as $i => $crumb ) {
			$items .= $i === $last || '' === $crumb['url']
				? sprintf( '<li><span aria-current="page">%s</span></li>', esc_html( $crumb['name'] ) )
				: sprintf( '<li><a href="%s">%s</a></li>', esc_url( $crumb['url'] ), esc_html( $crumb['name'] ) );
		}
		return '<nav class="abr-breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'abrahamic' ) . '"><ol>' . $items . '</ol></nav>';
	}
);

/**
 * Current page ID inside content or a template.
 *
 * @return int
 */
function abr_context_id() {
	$id = get_the_ID();
	return $id ? (int) $id : (int) get_queried_object_id();
}

/**
 * [abr_child_pages]: cards for the child pages of the current page.
 */
add_shortcode(
	'abr_child_pages',
	function () {
		$children = get_pages(
			array(
				'parent'      => abr_context_id(),
				'sort_column' => 'menu_order,post_title',
				'post_status' => 'publish',
			)
		);
		if ( ! $children ) {
			return '';
		}
		$out = '';
		foreach ( $children as $child ) {
			$out .= sprintf(
				'<li class="abr-hub-card"><h2 class="abr-hub-card__title"><a href="%1$s">%2$s</a></h2><p>%3$s</p></li>',
				esc_url( get_permalink( $child ) ),
				esc_html( get_the_title( $child ) ),
				esc_html( has_excerpt( $child ) ? $child->post_excerpt : wp_trim_words( wp_strip_all_tags( $child->post_content ), 24 ) )
			);
		}
		return '<ul class="abr-hub-grid" role="list">' . $out . '</ul>';
	}
);

/**
 * Categories that have articles, in the seed order where possible.
 *
 * @return WP_Term[]
 */
function abr_topics() {
	$terms = get_terms(
		array(
			'taxonomy'   => 'category',
			'hide_empty' => true,
			'exclude'    => array( (int) get_option( 'default_category' ) ),
		)
	);
	return is_wp_error( $terms ) ? array() : $terms;
}

/**
 * [abr_topic_index]: every topic with its description and article count.
 */
add_shortcode(
	'abr_topic_index',
	function () {
		$out = '';
		foreach ( abr_topics() as $term ) {
			$out .= sprintf(
				'<li class="abr-hub-card"><h2 class="abr-hub-card__title"><a href="%1$s">%2$s</a></h2><p>%3$s</p><p class="abr-hub-card__meta">%4$s</p></li>',
				esc_url( get_term_link( $term ) ),
				esc_html( $term->name ),
				esc_html( $term->description ),
				/* translators: %d: number of articles. */
				esc_html( sprintf( _n( '%d article', '%d articles', $term->count, 'abrahamic' ), $term->count ) )
			);
		}
		return $out ? '<ul class="abr-hub-grid" role="list">' . $out . '</ul>' : '';
	}
);

/**
 * [abr_topic_chips]: compact topic links for article listings.
 */
add_shortcode(
	'abr_topic_chips',
	function () {
		$current = is_category() ? get_queried_object_id() : 0;
		$out     = '';
		foreach ( abr_topics() as $term ) {
			$out .= sprintf(
				'<li><a href="%1$s"%3$s>%2$s</a></li>',
				esc_url( get_term_link( $term ) ),
				esc_html( $term->name ),
				(int) $term->term_id === $current ? ' aria-current="page"' : ''
			);
		}
		return $out ? '<nav class="abr-topic-chips" aria-label="' . esc_attr__( 'Topics', 'abrahamic' ) . '"><ul>' . $out . '</ul></nav>' : '';
	}
);

/**
 * [abr_page_heading]: heading and introduction for the posts page.
 */
add_shortcode(
	'abr_page_heading',
	function () {
		$id    = is_home() ? (int) get_option( 'page_for_posts' ) : get_queried_object_id();
		$title = $id ? get_the_title( $id ) : __( 'Journal', 'abrahamic' );
		$intro = $id ? get_post_field( 'post_excerpt', $id ) : '';
		$topics = abr_seed_id( 'page:topics' );
		if ( $intro && $topics && is_home() ) {
			$intro = sprintf(
				'%1$s <a href="%2$s">%3$s</a>.',
				esc_html( $intro ),
				esc_url( get_permalink( $topics ) ),
				esc_html__( 'Browse every topic', 'abrahamic' )
			);
		} else {
			$intro = esc_html( $intro );
		}
		return '<h1 class="wp-block-heading abr-page-title">' . esc_html( $title ) . '</h1>'
			. ( $intro ? '<p class="abr-standfirst">' . $intro . '</p>' : '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
	}
);

/**
 * [abr_related_articles]: up to three articles sharing a topic with the current one.
 */
add_shortcode(
	'abr_related_articles',
	function () {
		$id   = get_queried_object_id();
		$cats = wp_get_post_categories( $id );
		if ( ! $id || ! $cats ) {
			return '';
		}
		$related = get_posts(
			array(
				'category__in'        => $cats,
				'post__not_in'        => array( $id ),
				'posts_per_page'      => 3,
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
			)
		);
		if ( ! $related ) {
			return '';
		}
		$out = '';
		foreach ( $related as $post ) {
			$out .= sprintf(
				'<li class="abr-hub-card"><h3 class="abr-hub-card__title"><a href="%1$s">%2$s</a></h3><p>%3$s</p></li>',
				esc_url( get_permalink( $post ) ),
				esc_html( get_the_title( $post ) ),
				esc_html( get_the_excerpt( $post ) )
			);
		}
		return '<section class="abr-related" aria-labelledby="abr-related-title"><h2 id="abr-related-title">' . esc_html__( 'Related articles', 'abrahamic' ) . '</h2><ul class="abr-hub-grid" role="list">' . $out . '</ul></section>';
	}
);

/**
 * [abr_last_updated]: when a singular post's content was last revised, shown
 * only once that date is at least a day past its original publication so an
 * unedited article does not carry a redundant second date.
 */
add_shortcode(
	'abr_last_updated',
	function () {
		if ( ! is_singular() ) {
			return '';
		}
		$id = get_queried_object_id();
		if ( ! $id ) {
			return '';
		}
		$published = get_post_time( 'U', true, $id );
		$modified  = get_post_modified_time( 'U', true, $id );
		if ( $modified - $published < DAY_IN_SECONDS ) {
			return '';
		}
		return sprintf(
			'<span class="abr-last-updated">%s <time datetime="%s">%s</time></span>',
			esc_html__( 'Last updated', 'abrahamic' ),
			esc_attr( get_post_modified_time( 'c', true, $id ) ),
			esc_html( get_post_modified_time( get_option( 'date_format' ), true, $id ) )
		);
	}
);

/**
 * [abr_reading_time]: estimated reading time of the current article.
 */
add_shortcode(
	'abr_reading_time',
	function () {
		$id = get_queried_object_id();
		if ( ! $id ) {
			return '';
		}
		$words   = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', $id ) ) );
		$minutes = max( 1, (int) round( $words / 220 ) );
		/* translators: %d: minutes. */
		return '<span class="abr-reading-time">' . esc_html( sprintf( _n( '%d minute read', '%d minute read', $minutes, 'abrahamic' ), $minutes ) ) . '</span>';
	}
);

/**
 * [abr_hub_links]: the main sections, for the 404 and search pages.
 */
add_shortcode(
	'abr_hub_links',
	function () {
		$out = '';
		$seen = array();
		foreach ( abr_parse_menu( abr_get_option( 'nav_header' ) ) as $item ) {
			foreach ( array_merge( array( $item ), $item['children'] ) as $link ) {
				$url = abr_link( $link['target'], '' );
				if ( $url && home_url( '' ) !== $url && ! isset( $seen[ $url ] ) ) {
					$seen[ $url ] = true;
					$out         .= '<li>' . abr_menu_anchor( $url, $link['label'] ) . '</li>';
				}
			}
		}
		$map  = abr_seed_id( 'page:site-map' );
		$out .= $map ? sprintf( '<li><a href="%s">%s</a></li>', esc_url( get_permalink( $map ) ), esc_html( get_the_title( $map ) ) ) : '';
		return '<nav class="abr-hub-links" aria-label="' . esc_attr__( 'Main sections', 'abrahamic' ) . '"><ul>' . $out . '</ul></nav>';
	}
);

/**
 * Nested list of published pages under a parent.
 *
 * @param int   $parent  Parent ID.
 * @param int[] $exclude IDs to leave out.
 * @return string
 */
function abr_site_map_pages( $parent, $exclude ) {
	$pages = get_pages(
		array(
			'parent'      => $parent,
			'sort_column' => 'menu_order,post_title',
			'post_status' => 'publish',
			'exclude'     => $exclude,
		)
	);
	if ( ! $pages ) {
		return '';
	}
	$out = '';
	foreach ( $pages as $page ) {
		$out .= sprintf(
			'<li><a href="%1$s">%2$s</a>%3$s</li>',
			esc_url( get_permalink( $page ) ),
			esc_html( get_the_title( $page ) ),
			abr_site_map_pages( $page->ID, $exclude )
		);
	}
	return '<ul>' . $out . '</ul>';
}

/**
 * [abr_site_map]: the HTML site map, organised by section.
 */
add_shortcode(
	'abr_site_map',
	function () {
		$front   = (int) get_option( 'page_on_front' );
		$posts   = (int) get_option( 'page_for_posts' );
		$exclude = array_filter( array( $front, $posts ) );
		$out     = '';

		// Page sections: each top-level page with children becomes a section.
		$top    = get_pages(
			array(
				'parent'      => 0,
				'sort_column' => 'menu_order,post_title',
				'post_status' => 'publish',
				'exclude'     => $exclude,
			)
		);
		$single = '';
		foreach ( $top as $page ) {
			$children = abr_site_map_pages( $page->ID, $exclude );
			if ( $children ) {
				$out .= sprintf(
					'<section class="abr-site-map__section"><h2><a href="%1$s">%2$s</a></h2>%3$s</section>',
					esc_url( get_permalink( $page ) ),
					esc_html( get_the_title( $page ) ),
					$children
				);
			} else {
				$single .= sprintf( '<li><a href="%s">%s</a></li>', esc_url( get_permalink( $page ) ), esc_html( get_the_title( $page ) ) );
			}
		}

		// Articles by topic.
		$topics = '';
		foreach ( abr_topics() as $term ) {
			$items = '';
			foreach ( get_posts( array( 'category' => $term->term_id, 'posts_per_page' => 50, 'no_found_rows' => true ) ) as $post ) {
				$items .= sprintf( '<li><a href="%s">%s</a></li>', esc_url( get_permalink( $post ) ), esc_html( get_the_title( $post ) ) );
			}
			$topics .= sprintf( '<li><a href="%1$s">%2$s</a><ul>%3$s</ul></li>', esc_url( get_term_link( $term ) ), esc_html( $term->name ), $items );
		}
		if ( $topics ) {
			$heading = $posts ? sprintf( '<a href="%s">%s</a>', esc_url( get_permalink( $posts ) ), esc_html( get_the_title( $posts ) ) ) : esc_html__( 'Journal', 'abrahamic' );
			$out    .= '<section class="abr-site-map__section"><h2>' . $heading . '</h2><ul>' . $topics . '</ul></section>';
		}

		if ( $single ) {
			$out .= '<section class="abr-site-map__section"><h2>' . esc_html__( 'Site information', 'abrahamic' ) . '</h2><ul>' . $single . '</ul></section>';
		}
		return '<div class="abr-site-map">' . $out . '</div>';
	}
);

/**
 * [abr_term_label]: the kind of archive being viewed, above its title.
 */
add_shortcode(
	'abr_term_label',
	function () {
		if ( is_tag() ) {
			return '<p class="abr-label">' . esc_html__( 'Tag', 'abrahamic' ) . '</p>';
		}
		if ( is_category() ) {
			return '<p class="abr-label">' . esc_html__( 'Topic', 'abrahamic' ) . '</p>';
		}
		return '';
	}
);

/**
 * [abr_term_count]: how many articles carry the current term.
 */
add_shortcode(
	'abr_term_count',
	function () {
		$term = get_queried_object();
		if ( ! $term instanceof WP_Term ) {
			return '';
		}
		$count = (int) $term->count;
		return '<p class="abr-term-count">' . sprintf(
			/* translators: %s: number of articles. */
			esc_html( _n( '%s article carries this tag.', '%s articles carry this tag.', $count, 'abrahamic' ) ),
			esc_html( number_format_i18n( $count ) )
		) . '</p>';
	}
);

/**
 * [abr_tag_list]: every tag in use, as links, with the current one marked.
 */
add_shortcode(
	'abr_tag_list',
	function ( $atts ) {
		$atts = shortcode_atts( array( 'title' => __( 'All tags', 'abrahamic' ) ), $atts );
		$tags = get_terms(
			array(
				'taxonomy'   => 'post_tag',
				'hide_empty' => true,
				'orderby'    => 'name',
			)
		);
		if ( is_wp_error( $tags ) || ! $tags ) {
			return '';
		}
		$current = get_queried_object();
		$items   = '';
		foreach ( $tags as $tag ) {
			$link = get_term_link( $tag );
			if ( is_wp_error( $link ) ) {
				continue;
			}
			$is_current = ( $current instanceof WP_Term && $current->term_id === $tag->term_id );
			$items     .= sprintf(
				'<li><a class="abr-chip%1$s" href="%2$s"%3$s>%4$s <span class="abr-chip__count">%5$s</span></a></li>',
				$is_current ? ' is-current' : '',
				esc_url( $link ),
				$is_current ? ' aria-current="page"' : '',
				esc_html( $tag->name ),
				esc_html( number_format_i18n( $tag->count ) )
			);
		}
		return $items
			? '<nav class="abr-tag-cloud" aria-label="' . esc_attr( $atts['title'] ) . '"><h2>' . esc_html( $atts['title'] ) . '</h2><ul>' . $items . '</ul></nav>'
			: '';
	}
);
