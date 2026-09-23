<?php
/**
 * Output driven by Theme Options. Placed in template parts and patterns
 * through Custom HTML, Shortcode and Paragraph blocks. See docs/readme.md.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

add_shortcode(
	'abr_icon',
	function ( $atts ) {
		$atts = shortcode_atts( array( 'name' => '' ), $atts );
		return abr_icon( sanitize_key( $atts['name'] ) );
	}
);

add_shortcode(
	'abr_newsletter',
	function () {
		$url = abr_get_option( 'newsletter_url' );
		$out = '<p class="abr-newsletter__text">' . esc_html( abr_get_option( 'newsletter_text' ) ) . '</p>';
		if ( ! $url ) {
			return current_user_can( 'edit_theme_options' )
				? $out . '<p class="abr-newsletter__notice">' . esc_html__( 'Set the form action URL under Appearance > Theme Options > Newsletter.', 'abrahamic' ) . '</p>'
				: $out;
		}
		$out .= sprintf(
			'<form class="abr-newsletter__form" method="post" action="%1$s" target="_blank"><label class="screen-reader-text" for="abr-nl-email">%2$s</label><input type="email" id="abr-nl-email" name="%3$s" placeholder="%4$s" autocomplete="email" required><button type="submit" class="abr-btn abr-btn--gold">%5$s</button></form>',
			esc_url( $url ),
			esc_html__( 'Email address', 'abrahamic' ),
			esc_attr( abr_get_option( 'newsletter_name' ) ),
			esc_attr__( 'Your email address', 'abrahamic' ),
			esc_html__( 'Subscribe', 'abrahamic' )
		);
		return $out;
	}
);

add_shortcode(
	'abr_social',
	function () {
		$out = '';
		foreach ( abr_social_profiles() as $slug => $profile ) {
			$out .= sprintf(
				'<li><a href="%1$s" rel="me noopener" aria-label="%2$s" title="%2$s">%3$s</a></li>',
				esc_url( $profile['url'] ),
				esc_attr( $profile['label'] ),
				abr_social_icon( $slug )
			);
		}
		return $out ? '<ul class="abr-social" role="list">' . $out . '</ul>' : '';
	}
);

/**
 * Contact email from Theme Options, obfuscated against harvesting.
 */
add_shortcode(
	'abr_contact_email',
	function () {
		$email = abr_get_option( 'contact_email' );
		if ( ! is_email( $email ) ) {
			return current_user_can( 'edit_theme_options' )
				? '<p class="abr-newsletter__notice">' . esc_html__( 'Set the contact email under Appearance > Theme Options > Footer.', 'abrahamic' ) . '</p>'
				: '';
		}
		$shown = antispambot( $email );
		return sprintf(
			'<p class="abr-contact-email">%1$s <a href="%2$s">%3$s</a></p>',
			esc_html__( 'Write to the editors at', 'abrahamic' ),
			esc_url( 'mailto:' . antispambot( $email, 1 ) ),
			esc_html( $shown )
		);
	}
);

/**
 * Category archive address by slug, for the topic cards.
 *
 * @param string $slug Category slug.
 * @return string
 */
function abr_category_url( $slug ) {
	$term = get_term_by( 'slug', $slug, 'category' );
	$link = $term ? get_term_link( $term ) : '';
	return ( $link && ! is_wp_error( $link ) ) ? $link : home_url( '/category/' . $slug . '/' );
}

/**
 * [abr_topic_url slug="history"] prints a category archive address.
 */
add_shortcode(
	'abr_topic_url',
	function ( $atts ) {
		$atts = shortcode_atts( array( 'slug' => '' ), $atts );
		return esc_url( abr_category_url( sanitize_title( $atts['slug'] ) ) );
	}
);

/**
 * Two-line text logo linked to the home page.
 */
/**
 * The AR mark as inline SVG, decorative, coloured by the scheme.
 *
 * @return string
 */
function abr_logo_mark() {
	static $svg = null;
	if ( null === $svg ) {
		$file = ABR_DIR . '/assets/images/logo-mark.svg';
		$svg  = is_readable( $file ) ? (string) file_get_contents( $file ) : ''; // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		$svg  = preg_replace( '#<title[^>]*>.*?</title>#s', '', $svg );
		$svg  = str_replace( ' role="img" aria-labelledby="abr-mark-title"', ' class="abr-logo__mark" aria-hidden="true" focusable="false"', trim( $svg ) );
	}
	return $svg;
}

add_shortcode(
	'abr_logo',
	function () {
		$style = abr_get_option( 'logo_style' );
		$main  = abr_get_option( 'logo_main' );
		$sub   = abr_get_option( 'logo_sub' );
		$name  = trim( $main . ' ' . $sub );
		$mark  = 'text' !== $style ? abr_logo_mark() : '';
		$words = '';
		if ( 'mark' !== $style || '' === $mark ) {
			$words = '<span class="abr-logo__words"><span class="abr-logo__main">' . esc_html( $main ) . '</span>'
				. ( '' !== $sub ? '<span class="abr-logo__sub">' . esc_html( $sub ) . '</span>' : '' ) . '</span>';
		}
		return sprintf(
			'<a class="abr-logo abr-logo--%1$s" href="%2$s" rel="home" aria-label="%3$s">%4$s%5$s</a>',
			esc_attr( $mark ? $style : 'text' ),
			esc_url( home_url( '/' ) ),
			/* translators: %s: site name as shown in the logo. */
			esc_attr( sprintf( __( '%s, home', 'abrahamic' ), $name ) ),
			$mark, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- bundled file.
			$words
		);
	}
);

/**
 * [abr_photo]: a bundled photograph, with the decorative panel as the fallback.
 *
 * Attributes: name (file stem under assets/images/photos), alt, ratio, icon,
 * caption and note (guidance shown only to signed-in editors).
 */
add_shortcode(
	'abr_photo',
	function ( $atts ) {
		$atts = shortcode_atts(
			array(
				'name'    => '',
				'alt'     => '',
				'ratio'   => '16 / 9',
				'icon'    => 'city',
				'caption' => '',
				'note'    => '',
				'class'   => '',
			),
			$atts
		);
		$file = ABR_DIR . '/assets/images/photos/' . sanitize_file_name( $atts['name'] ) . '.avif';
		$classes = trim( 'abr-photo ' . $atts['class'] );
		if ( '' !== $atts['name'] && is_readable( $file ) ) {
			$size  = @getimagesize( $file ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged -- a bundled file.
			$large = '/assets/images/photos/large/' . sanitize_file_name( $atts['name'] ) . '.avif';
			$full  = is_readable( ABR_DIR . $large ) ? ' data-abr-full="' . esc_url( ABR_URI . $large ) . '"' : '';
			return sprintf(
				'<figure class="%1$s" style="--abr-photo-ratio:%2$s"><img src="%3$s" alt="%4$s" width="%5$d" height="%6$d" loading="lazy" decoding="async"%7$s></figure>',
				esc_attr( $classes ),
				esc_attr( $atts['ratio'] ),
				esc_url( ABR_URI . '/assets/images/photos/' . rawurlencode( $atts['name'] ) . '.avif' ),
				esc_attr( $atts['alt'] ),
				$size ? (int) $size[0] : 1200,
				$size ? (int) $size[1] : 675,
				$full
			);
		}
		return sprintf(
			'<div class="abr-panel-art"%1$s style="--abr-photo-ratio:%2$s">%3$s%4$s%5$s</div>',
			'' === $atts['alt'] ? ' aria-hidden="true"' : ' role="img" aria-label="' . esc_attr( $atts['alt'] ) . '"',
			esc_attr( $atts['ratio'] ),
			abr_icon( $atts['icon'] ),
			'' !== $atts['caption'] ? '<span>' . esc_html( $atts['caption'] ) . '</span>' : '',
			'' !== $atts['note'] ? do_shortcode( '[abr_art_note text="' . esc_attr( $atts['note'] ) . '"]' ) : ''
		);
	}
);

/**
 * [abr_darfash]: the darfash, the Mandaean banner, as a captioned figure.
 */
add_shortcode(
	'abr_darfash',
	function () {
		$svg = abr_darfash_svg( 'abr-darfash__mark', __( 'The darfash, the Mandaean banner', 'abrahamic' ) );
		if ( '' === $svg ) {
			return '';
		}
		return '<figure class="abr-darfash">' . $svg . '<figcaption>' . esc_html__( 'The darfash, the banner of the Mandaeans', 'abrahamic' ) . '</figcaption></figure>';
	}
);

/**
 * [abr_header_search]: the search icon at the end of the header, expanding
 * into an inline search field. Respects the "Show search" setting the mode
 * toggle also checks.
 */
add_shortcode(
	'abr_header_search',
	function () {
		if ( ! abr_get_option( 'header_search' ) ) {
			return '';
		}
		return sprintf(
			'<div class="abr-header-search" data-abr-search>'
			. '<button type="button" class="abr-header-search__toggle" data-abr-search-toggle aria-expanded="false" aria-controls="abr-header-search-field">'
			. '<span class="abr-header-search__icon-open">%1$s</span><span class="abr-header-search__icon-close">%2$s</span>'
			. '<span class="screen-reader-text">%3$s</span></button>'
			. '<form role="search" method="get" class="abr-header-search__form" action="%4$s">'
			. '<label class="screen-reader-text" for="abr-header-search-field">%5$s</label>'
			. '<input type="search" id="abr-header-search-field" class="abr-header-search__field" name="s" placeholder="%6$s" autocomplete="off" tabindex="-1">'
			. '</form></div>',
			abr_icon( 'search' ),
			abr_icon( 'close' ),
			esc_attr__( 'Search', 'abrahamic' ),
			esc_url( home_url( '/' ) ),
			esc_attr__( 'Search', 'abrahamic' ),
			esc_attr__( 'Search the site', 'abrahamic' )
		);
	}
);

/**
 * [abr_mode_toggle]: the light and dark switch in the header.
 */
add_shortcode(
	'abr_mode_toggle',
	function () {
		if ( ! abr_get_option( 'mode_toggle' ) ) {
			return '';
		}
		return sprintf(
			'<button type="button" class="abr-mode" data-abr-mode-toggle aria-pressed="false"><span class="abr-mode__rail" aria-hidden="true"><span class="abr-mode__knob">%1$s%2$s</span></span><span class="screen-reader-text" data-abr-mode-label data-dark="%3$s" data-light="%4$s">%3$s</span></button>',
			abr_icon( 'sun' ),
			abr_icon( 'moon' ),
			esc_attr__( 'Switch to dark colours', 'abrahamic' ),
			esc_attr__( 'Switch to light colours', 'abrahamic' )
		);
	}
);

/**
 * [abr_citation]: how to cite the page, with a copy button.
 */
add_shortcode(
	'abr_citation',
	function () {
		if ( ! is_singular() ) {
			return '';
		}
		$id   = get_the_ID();
		$site = get_bloginfo( 'name' );
		$text = sprintf(
			/* translators: 1: title, 2: site name, 3: year, 4: address. */
			_x( '"%1$s," %2$s (%3$s), %4$s.', 'citation', 'abrahamic' ),
			get_the_title( $id ),
			$site,
			get_the_date( 'Y', $id ),
			get_permalink( $id )
		);
		return sprintf(
			'<aside class="abr-cite" aria-labelledby="abr-cite-title">'
			. '<div class="abr-cite__head"><h2 id="abr-cite-title">%1$s</h2>'
			. '<button type="button" class="abr-cite__copy" data-abr-copy data-copied="%3$s">%2$s</button></div>'
			. '<p class="abr-cite__text" data-abr-copy-text>%4$s</p></aside>',
			esc_html__( 'Cite this page', 'abrahamic' ),
			esc_html__( 'Copy', 'abrahamic' ),
			esc_attr__( 'Copied', 'abrahamic' ),
			esc_html( $text )
		);
	}
);

/**
 * [abr_art_note]: guidance on a placeholder panel, shown only to signed-in editors.
 */
add_shortcode(
	'abr_art_note',
	function ( $atts ) {
		$atts = shortcode_atts( array( 'text' => '' ), $atts );
		if ( '' === $atts['text'] || ! is_user_logged_in() || ! current_user_can( 'edit_theme_options' ) ) {
			return '';
		}
		return '<small class="abr-panel-art__note">' . esc_html( $atts['text'] ) . '</small>';
	}
);

/**
 * Header Donate button, beside the call-to-action.
 */
add_shortcode(
	'abr_header_donate',
	function () {
		$label = abr_get_option( 'header_donate_label' );
		$url   = abr_get_option( 'header_donate_url' );
		if ( ! abr_get_option( 'header_donate' ) || '' === $label || '' === $url ) {
			return '';
		}
		$href  = abr_link( $url, '/' );
		$title = abr_is_external( $href )
			/* translators: %s: site host, such as www.paypal.com. */
			? ' title="' . esc_attr( sprintf( __( 'Opens %s', 'abrahamic' ), wp_parse_url( $href, PHP_URL_HOST ) ) ) . '"'
			: '';
		return sprintf(
			'<div class="wp-block-buttons abr-header__donate"><div class="wp-block-button is-small is-style-abr-donate"><a class="wp-block-button__link wp-element-button" href="%1$s"%3$s>%2$s</a></div></div>',
			esc_url( $href ),
			esc_html( $label ),
			$title // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
		);
	}
);

/**
 * [abr_donation]: the donation button from Theme Options, or a route to the
 * Contact page while no donation link is set.
 */
add_shortcode(
	'abr_donation',
	function () {
		$url = abr_get_option( 'donation_url' );
		if ( ! $url ) {
			// Fall back to the header button when it points to a payment page elsewhere.
			$header = abr_link( abr_get_option( 'header_donate_url' ), '' );
			$url    = abr_is_external( $header ) ? $header : '';
		}
		if ( $url ) {
			$label = abr_get_option( 'donation_button' );
			return sprintf(
				'<div class="wp-block-buttons abr-donation"><div class="wp-block-button is-style-abr-donate"><a class="wp-block-button__link wp-element-button" href="%1$s">%2$s</a></div></div>',
				esc_url( $url ),
				esc_html( '' !== $label ? $label : __( 'Donate now', 'abrahamic' ) )
			);
		}
		$contact = abr_link( '@contact', '/about/contact/' );
		$out     = sprintf(
			'<p class="abr-donation">%1$s <a href="%2$s">%3$s</a>.</p>',
			esc_html__( 'To arrange a contribution, please write to us through the', 'abrahamic' ),
			esc_url( $contact ),
			esc_html__( 'Contact page', 'abrahamic' )
		);
		if ( current_user_can( 'edit_theme_options' ) ) {
			$out .= '<p class="abr-newsletter__notice">' . esc_html__( 'Add a donation link under Appearance > Theme Options > Header to show a Donate now button here.', 'abrahamic' ) . '</p>';
		}
		return $out;
	}
);

/**
 * Browser icons from the AR mark, until a Site Icon is set.
 */
function abr_default_icons() {
	if ( has_site_icon() ) {
		return;
	}
	$base = ABR_URI . '/assets/images/';
	printf( '<link rel="icon" href="%s" type="image/svg+xml">' . "\n", esc_url( $base . 'logo-mark.svg' ) );
	printf( '<link rel="icon" href="%s" sizes="32x32" type="image/png">' . "\n", esc_url( $base . 'favicon-32.png' ) );
	printf( '<link rel="icon" href="%s" sizes="192x192" type="image/png">' . "\n", esc_url( $base . 'icon-192.png' ) );
	printf( '<link rel="apple-touch-icon" href="%s">' . "\n", esc_url( $base . 'apple-touch-icon.png' ) );
}
add_action( 'wp_head', 'abr_default_icons', 3 );
add_action( 'login_head', 'abr_default_icons' );

/**
 * Header call-to-action button.
 */
add_shortcode(
	'abr_header_cta',
	function () {
		$label = abr_get_option( 'header_cta_label' );
		$url   = abr_get_option( 'header_cta_url' );
		if ( ! abr_get_option( 'header_cta' ) || '' === $label || '' === $url ) {
			return '';
		}
		$url = abr_link( $url, '/' );
		return sprintf(
			'<div class="wp-block-buttons abr-header__cta"><div class="wp-block-button is-small"><a class="wp-block-button__link wp-element-button" href="%1$s">%2$s</a></div></div>',
			esc_url( $url ),
			esc_html( $label )
		);
	}
);

/**
 * Footer brand block: title, tagline and description.
 */
add_shortcode(
	'abr_footer_brand',
	function () {
		$out   = '';
		$title = abr_get_option( 'footer_title' );
		$tag   = abr_get_option( 'footer_tagline' );
		$text  = abr_get_option( 'footer_text' );
		if ( '' !== $title ) {
			$mark = 'text' !== abr_get_option( 'logo_style' ) ? abr_logo_mark() : '';
			$out .= sprintf( '<a class="abr-logo abr-logo--footer" href="%1$s">%3$s<span class="abr-logo__words"><span class="abr-logo__main">%2$s</span></span></a>', esc_url( home_url( '/' ) ), esc_html( $title ), $mark ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- bundled file.
		}
		if ( '' !== $tag ) {
			$out .= '<p class="abr-tagline">' . esc_html( $tag ) . '</p>';
		}
		if ( '' !== $text ) {
			$out .= '<p class="abr-footer__text">' . nl2br( esc_html( $text ) ) . '</p>';
		}
		return $out;
	}
);

/**
 * Footer copyright notice; {year} becomes the current year.
 */
add_shortcode(
	'abr_copyright',
	function () {
		$text = str_replace( '{year}', wp_date( 'Y' ), abr_get_option( 'footer_copyright' ) );
		return '' === $text ? '' : '<p class="abr-copyright">' . esc_html( $text ) . '</p>';
	}
);

/**
 * Footer note opposite the copyright notice.
 */
add_shortcode(
	'abr_footer_note',
	function () {
		$text = abr_get_option( 'footer_note' );
		return '' === $text ? '' : '<p class="abr-footer-note">' . esc_html( $text ) . '</p>';
	}
);
