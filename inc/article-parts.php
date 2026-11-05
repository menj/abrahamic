<?php
/**
 * Article anatomy (2.96.10): the pieces a single article adds to what the
 * template already prints (breadcrumbs, standfirst, date, reading time, last
 * updated, contents, notes, citation, related articles and further reading).
 *
 *   [abr_answer_box]    "In short": the key points near the top, from the Key
 *                       points and review box or from summary="" points="".
 *   the_content 12      the answer box before the text, and the mid-article
 *                       next step before the third section.
 *   [abr_last_reviewed] the review note, styled like the Citation box.
 *   render_block        tables scroll as named regions on a phone.
 *
 * A next step is only ever keep reading, check the sources or ask a question.
 * Nothing here prints the owner's name; it stays in the JSON-LD alone.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * The article a piece is about: the queried post, when it is not behind a password.
 *
 * @return WP_Post|null
 */
function abr_article_post() {
	if ( ! is_singular( 'post' ) ) {
		return null;
	}
	$post = get_queried_object();
	return ( $post instanceof WP_Post && '' === $post->post_password ) ? $post : null;
}

/**
 * Whether a the_content call is the main text of the queried article.
 *
 * @return bool
 */
function abr_article_is_main() {
	$post = abr_article_post();
	return $post && ! is_admin() && ! is_feed() && is_main_query() && ! doing_filter( 'get_the_excerpt' ) && (int) get_the_ID() === $post->ID;
}

/**
 * Key points from text: one a line, or separated by ";;".
 *
 * @param string $text Text.
 * @return string[]
 */
function abr_article_points( $text ) {
	return array_values( array_filter( array_map( 'trim', (array) preg_split( '/\r\n|\r|\n|\s*;;\s*/', (string) $text ) ), 'strlen' ) );
}

/**
 * Whether the answer box shows on a post: the switch is on and the post has
 * key points, or carries its own [abr_answer_box] with text.
 *
 * @param WP_Post $post Post.
 * @return bool
 */
function abr_article_answer_shows( $post ) {
	if ( ! $post instanceof WP_Post || ! abr_get_option( 'article_answer' ) ) {
		return false;
	}
	if ( abr_article_points( get_post_meta( $post->ID, '_abr_takeaways', true ) ) ) {
		return true;
	}
	return (bool) preg_match( '/\[abr_answer_box\s[^\]]*\b(?:summary|points)\s*=\s*["\']\s*[^"\'\s]/', (string) $post->post_content );
}

/**
 * [abr_answer_box summary="" points=""]: "In short", near the top. Without
 * attributes it lists the article's key points.
 *
 * @param array|string $atts Shortcode attributes.
 * @return string
 */
function abr_article_answer_box( $atts = array() ) {
	$post = abr_article_post();
	if ( ! $post || ! abr_get_option( 'article_answer' ) ) {
		return '';
	}
	$atts    = shortcode_atts(
		array(
			'summary' => '',
			'points'  => '',
		),
		$atts,
		'abr_answer_box'
	);
	$summary = trim( (string) $atts['summary'] );
	$points  = abr_article_points( $atts['points'] );
	if ( '' === $summary && ! $points ) {
		$points = abr_article_points( get_post_meta( $post->ID, '_abr_takeaways', true ) );
	}
	if ( '' === $summary && ! $points ) {
		return '';
	}
	// Each box gets its own heading id, so two on one page stay valid.
	static $count = 0;
	++$count;
	$hid = 1 === $count ? 'abr-answer-title' : 'abr-answer-title-' . $count;
	$out = '<section class="abr-answer" aria-labelledby="' . $hid . '"><h2 id="' . $hid . '" class="abr-answer__title">' . esc_html__( 'In short', 'abrahamic' ) . '</h2>';
	if ( '' !== $summary ) {
		$out .= '<p class="abr-answer__summary">' . esc_html( $summary ) . '</p>';
	}
	if ( $points ) {
		$out .= '<ul class="abr-answer__points"><li>' . implode( '</li><li>', array_map( 'esc_html', $points ) ) . '</li></ul>';
	}
	return $out . '</section>';
}
add_shortcode( 'abr_answer_box', 'abr_article_answer_box' );

/**
 * The next article in the reading path: the next newer one in the article's
 * first category, or, at the end of the path, the one before it.
 *
 * @param WP_Post $post Post.
 * @return array{0:WP_Post,1:string}|null The post and the category name.
 */
function abr_article_path_next( $post ) {
	$cats = get_the_category( $post->ID );
	if ( ! $cats ) {
		return null;
	}
	foreach ( array( array( 'after', 'ASC' ), array( 'before', 'DESC' ) ) as $way ) {
		$found = get_posts(
			array(
				'cat'                 => (int) $cats[0]->term_id,
				'post__not_in'        => array( $post->ID ),
				'posts_per_page'      => 1,
				'orderby'             => 'date',
				'order'               => $way[1],
				'date_query'          => array(
					array(
						$way[0]     => $post->post_date,
						'inclusive' => false,
					),
				),
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
				'abr_hide_unlisted'   => true,
			)
		);
		if ( $found ) {
			return array( $found[0], $cats[0]->name );
		}
	}
	return null;
}

/**
 * The mid-article next step: check the notes, the next article in the
 * reading path, and the Contact page for a question.
 *
 * @param WP_Post $post    Post.
 * @param string  $content The text, to see whether it has notes.
 * @return string
 */
function abr_article_next_step( $post, $content ) {
	$items = array();
	if ( false !== strpos( (string) $content, 'id="notes"' ) ) {
		$items[] = sprintf(
			/* translators: %s: link to the notes. */
			esc_html__( 'Check each claim against its source: %s are at the end.', 'abrahamic' ),
			'<a href="#notes">' . esc_html__( 'the notes', 'abrahamic' ) . '</a>'
		);
	}
	$next = abr_article_path_next( $post );
	if ( $next ) {
		$items[] = sprintf(
			/* translators: 1: category name, 2: link to the next article. */
			esc_html__( 'Next in %1$s: %2$s', 'abrahamic' ),
			esc_html( $next[1] ),
			'<a href="' . esc_url( get_permalink( $next[0] ) ) . '">' . esc_html( get_the_title( $next[0] ) ) . '</a>'
		);
	}
	$contact = abr_seed_id( 'page:contact' );
	if ( $contact && 'publish' === get_post_status( $contact ) ) {
		$items[] = sprintf(
			/* translators: %s: link to the Contact page. */
			esc_html__( 'A question about this article? %s.', 'abrahamic' ),
			'<a href="' . esc_url( get_permalink( $contact ) ) . '">' . esc_html__( 'Ask it here', 'abrahamic' ) . '</a>'
		);
	}
	if ( ! $items ) {
		return '';
	}
	return '<aside class="abr-cite abr-next" aria-label="' . esc_attr__( 'Next step', 'abrahamic' ) . '"><p class="abr-next__kicker">' . esc_html__( 'Next step', 'abrahamic' ) . '</p><ul class="abr-next__list"><li>' . implode( '</li><li>', $items ) . '</li></ul></aside>';
}

/**
 * Put a piece of HTML before the third level-two heading of the text, the
 * Notes heading not counted.
 *
 * @param string $html  Text.
 * @param string $aside Piece to insert.
 * @return string
 */
function abr_article_insert_mid( $html, $aside ) {
	if ( '' === $aside || ! preg_match_all( '#<h2(?![^>]*abr-notes-title)[\s>]#i', $html, $found, PREG_OFFSET_CAPTURE ) || count( $found[0] ) < 3 ) {
		return $html;
	}
	$at = (int) $found[0][2][1];
	return substr( $html, 0, $at ) . $aside . substr( $html, $at );
}

add_filter(
	'the_content',
	static function ( $content ) {
		if ( ! abr_article_is_main() ) {
			return $content;
		}
		$post = abr_article_post();
		if ( abr_get_option( 'article_mid_next' ) ) {
			$content = abr_article_insert_mid( $content, abr_article_next_step( $post, $content ) );
		}
		// The box goes first, unless the author placed one in the text.
		if ( false === strpos( (string) $post->post_content, '[abr_answer_box' ) ) {
			$content = abr_article_answer_box() . $content;
		}
		return $content;
	},
	12
);

/**
 * [abr_last_reviewed]: the date the article was last checked against its
 * sources, set in the Key points and review box. Shown only when set.
 *
 * @return string
 */
function abr_article_last_reviewed() {
	$post = abr_article_post();
	$date = $post ? (string) get_post_meta( $post->ID, '_abr_reviewed', true ) : '';
	$time = preg_match( '/^\d{4}-\d{2}-\d{2}$/', $date ) ? strtotime( $date . ' 12:00:00 UTC' ) : false;
	if ( ! $time ) {
		return '';
	}
	$text = sprintf(
		/* translators: %s: date. */
		esc_html__( 'Last reviewed against its sources on %s.', 'abrahamic' ),
		'<time datetime="' . esc_attr( $date ) . '">' . esc_html( wp_date( (string) get_option( 'date_format' ), $time, new DateTimeZone( 'UTC' ) ) ) . '</time>'
	);
	$contact = abr_seed_id( 'page:contact' );
	if ( $contact && 'publish' === get_post_status( $contact ) ) {
		$text .= ' ' . sprintf(
			/* translators: %s: link to the Contact page. */
			esc_html__( 'Found an error? %s.', 'abrahamic' ),
			'<a href="' . esc_url( get_permalink( $contact ) ) . '">' . esc_html__( 'Tell us', 'abrahamic' ) . '</a>'
		);
	}
	// Each note gets its own heading id, so two on one page stay valid.
	static $count = 0;
	++$count;
	$hid = 1 === $count ? 'abr-reviewed-title' : 'abr-reviewed-title-' . $count;
	return '<aside class="abr-cite abr-reviewed" aria-labelledby="' . $hid . '"><div class="abr-cite__head"><h2 id="' . $hid . '">' . esc_html__( 'Review', 'abrahamic' ) . '</h2></div><p class="abr-cite__text">' . $text . '</p></aside>';
}
add_shortcode( 'abr_last_reviewed', 'abr_article_last_reviewed' );

/*
 * A table in an article scrolls on its own on a phone: a focusable region
 * named by its caption, so a keyboard can scroll it too.
 */
add_filter(
	'render_block_core/table',
	static function ( $html ) {
		if ( ! abr_article_post() || false !== strpos( (string) $html, 'role="region"' ) ) {
			return $html;
		}
		$label = preg_match( '#<figcaption[^>]*>(.*?)</figcaption>#is', (string) $html, $m ) ? trim( wp_strip_all_tags( $m[1] ) ) : '';
		$label = '' !== $label ? $label : __( 'Table', 'abrahamic' );
		return (string) preg_replace( '#<figure\b([^>]*)>#i', '<figure$1 role="region" tabindex="0" aria-label="' . esc_attr( wp_html_excerpt( $label, 120, '…' ) ) . '">', (string) $html, 1 );
	}
);

/* The edit screen: key points and review ---------------------------------- */

add_action(
	'init',
	static function () {
		$args = array(
			'type'              => 'string',
			'single'            => true,
			'show_in_rest'      => true,
			'sanitize_callback' => 'sanitize_textarea_field',
			'auth_callback'     => static function () {
				return current_user_can( 'edit_posts' );
			},
		);
		register_post_meta( 'post', '_abr_takeaways', $args );
		$args['sanitize_callback'] = 'abr_article_sanitize_date';
		register_post_meta( 'post', '_abr_reviewed', $args );
	}
);

/**
 * A review date as Y-m-d, or '' when it is not a real date.
 *
 * @param mixed $value Value.
 * @return string
 */
function abr_article_sanitize_date( $value ) {
	$value = trim( (string) $value );
	if ( ! preg_match( '/^(\d{4})-(\d{2})-(\d{2})$/', $value, $m ) || ! checkdate( (int) $m[2], (int) $m[3], (int) $m[1] ) ) {
		return '';
	}
	return $value;
}

add_action(
	'add_meta_boxes_post',
	static function () {
		add_meta_box( 'abr_article_parts', __( 'Key points and review', 'abrahamic' ), 'abr_article_meta_box', 'post', 'normal', 'default' );
	}
);

/**
 * The Key points and review box.
 *
 * @param WP_Post $post Post.
 */
function abr_article_meta_box( $post ) {
	wp_nonce_field( 'abr_article_parts', 'abr_article_parts_nonce' );
	?>
	<p>
		<label for="abr-takeaways"><strong><?php esc_html_e( 'Key points, one a line', 'abrahamic' ); ?></strong></label>
		<textarea id="abr-takeaways" name="abr_takeaways" rows="4" class="widefat"><?php echo esc_textarea( (string) get_post_meta( $post->ID, '_abr_takeaways', true ) ); ?></textarea>
		<span class="description"><?php esc_html_e( 'Shown in the "In short" box at the top of the article. The excerpt stays under the title.', 'abrahamic' ); ?></span>
	</p>
	<p>
		<label for="abr-reviewed"><strong><?php esc_html_e( 'Last reviewed', 'abrahamic' ); ?></strong></label><br>
		<input type="date" id="abr-reviewed" name="abr_reviewed" value="<?php echo esc_attr( (string) get_post_meta( $post->ID, '_abr_reviewed', true ) ); ?>">
		<span class="description"><?php esc_html_e( 'The day the article was last checked against its sources. Leave it empty to show no review note.', 'abrahamic' ); ?></span>
	</p>
	<?php
}

add_action(
	'save_post_post',
	static function ( $post_id ) {
		if ( ! isset( $_POST['abr_article_parts_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['abr_article_parts_nonce'] ) ), 'abr_article_parts' ) ) {
			return;
		}
		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
		$values = array(
			'_abr_takeaways' => implode( "\n", abr_article_points( sanitize_textarea_field( wp_unslash( $_POST['abr_takeaways'] ?? '' ) ) ) ),
			'_abr_reviewed'  => abr_article_sanitize_date( sanitize_text_field( wp_unslash( $_POST['abr_reviewed'] ?? '' ) ) ),
		);
		foreach ( $values as $key => $value ) {
			if ( '' !== $value ) {
				update_post_meta( $post_id, $key, $value );
			} else {
				delete_post_meta( $post_id, $key );
			}
		}
	}
);

/* Assets -------------------------------------------------------------------- */

add_action(
	'wp_enqueue_scripts',
	static function () {
		if ( is_singular( 'post' ) ) {
			wp_enqueue_style( 'abr-article', ABR_URI . '/assets/css/article.css', array( 'abr-theme' ), ABR_VERSION );
		}
	},
	20
);
