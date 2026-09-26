<?php
/**
 * Theme Options screen: Appearance > Theme Options.
 * Seven tabs; the first six save through the Settings API, Tools posts to admin-post.php.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

define( 'ABR_OPTIONS_SLUG', 'abrahamic-theme-options' );

/**
 * Tabs: slug => array( label, icon path data on a 24x24 stroke grid ).
 *
 * @return array
 */
function abr_options_tabs() {
	return array(
		'general'    => array( __( 'General', 'abrahamic' ), '<circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M4.2 4.2l2.1 2.1M17.7 17.7l2.1 2.1M2 12h3M19 12h3M4.2 19.8l2.1-2.1M17.7 6.3l2.1-2.1"/>' ),
		'header'     => array( __( 'Header', 'abrahamic' ), '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18"/>' ),
		'footer'     => array( __( 'Footer', 'abrahamic' ), '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 15h18"/>' ),
		'navigation' => array( __( 'Navigation', 'abrahamic' ), '<path d="M4 6h16M4 12h16M4 18h10"/>' ),
		'colours'    => array( __( 'Colours', 'abrahamic' ), '<circle cx="12" cy="12" r="9"/><circle cx="8.5" cy="10" r="1.2"/><circle cx="12" cy="7.5" r="1.2"/><circle cx="15.5" cy="10" r="1.2"/><path d="M12 21a3 3 0 0 1 0-6h1.5a2.5 2.5 0 0 0 0-5"/>' ),
		'newsletter' => array( __( 'Newsletter', 'abrahamic' ), '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>' ),
		'social'     => array( __( 'Social', 'abrahamic' ), '<circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="m8.6 13.5 6.8 4M15.4 6.5l-6.8 4"/>' ),
		'login'      => array( __( 'Login', 'abrahamic' ), '<rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/>' ),
		'search'     => array( __( 'Search', 'abrahamic' ), '<circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/>' ),
		'tools'      => array( __( 'Tools', 'abrahamic' ), '<path d="M14.7 6.3a4 4 0 0 0-5.4 5.2L3 17.8V21h3.2l6.3-6.3a4 4 0 0 0 5.2-5.4l-2.6 2.6-2.8-.4-.4-2.8z"/>' ),
	);
}

/**
 * Admin URL of the screen, optionally on a tab.
 *
 * @param string $tab  Tab slug.
 * @param array  $args Extra query arguments.
 * @return string
 */
function abr_options_url( $tab = '', $args = array() ) {
	$args = array_merge( array( 'page' => ABR_OPTIONS_SLUG ), $tab ? array( 'tab' => $tab ) : array(), $args );
	return add_query_arg( $args, admin_url( 'themes.php' ) );
}

/**
 * Menu entry and screen assets.
 */
function abr_add_options_page() {
	$hook = add_theme_page(
		__( 'Theme Options', 'abrahamic' ),
		__( 'Theme Options', 'abrahamic' ),
		'edit_theme_options',
		ABR_OPTIONS_SLUG,
		'abr_render_options_page'
	);

	add_action(
		'admin_enqueue_scripts',
		function ( $current ) use ( $hook ) {
			if ( $current !== $hook ) {
				return;
			}
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_media();
			wp_enqueue_style( 'abr-admin', ABR_URI . '/assets/css/admin.css', array(), ABR_VERSION );
			wp_enqueue_script( 'abr-admin', ABR_URI . '/assets/js/admin.js', array( 'wp-color-picker' ), ABR_VERSION, true );
			wp_localize_script(
				'abr-admin',
				'abrOptions',
				array(
					'schemes'      => wp_list_pluck( abr_schemes(), 'colors' ),
					'confirmReset' => __( 'Reset every Theme Option to its default? This cannot be undone. Export first if you may need the current values.', 'abrahamic' ),
					'mediaTitle'   => __( 'Choose an image', 'abrahamic' ),
					'mediaButton'  => __( 'Use this image', 'abrahamic' ),
				)
			);
		}
	);
}
add_action( 'admin_menu', 'abr_add_options_page' );

/**
 * Send the 2.0 and 2.1 screen address to the new one. WordPress refuses
 * unregistered admin pages before admin_init, so this runs on the refusal hook.
 */
function abr_redirect_legacy_screen() {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- read-only redirect.
	$page = isset( $_GET['page'] ) ? sanitize_key( wp_unslash( $_GET['page'] ) ) : '';
	if ( 'abrahamic-settings' === $page && current_user_can( 'edit_theme_options' ) ) {
		wp_safe_redirect( abr_options_url() );
		exit;
	}
}
add_action( 'admin_page_access_denied', 'abr_redirect_legacy_screen' );

/**
 * Theme Options shortcut in the admin bar, under the site name.
 *
 * @param WP_Admin_Bar $bar Admin bar.
 */
function abr_admin_bar_link( $bar ) {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}
	$bar->add_node(
		array(
			'parent' => is_admin() ? 'site-name' : 'appearance',
			'id'     => 'abr-theme-options',
			'title'  => __( 'Theme Options', 'abrahamic' ),
			'href'   => abr_options_url(),
		)
	);
}
add_action( 'admin_bar_menu', 'abr_admin_bar_link', 100 );

/**
 * One option field.
 *
 * @param string $key   Option key.
 * @param string $label Label.
 * @param string $type  checkbox, text, textarea, menu, url, image, color or select.
 * @param string $help  Help text.
 * @param array  $attrs Extra input attributes; for select, 'choices' holds value => label.
 */
function abr_field( $key, $label, $type = 'text', $help = '', $attrs = array() ) {
	$name   = 'abr_options[' . $key . ']';
	$value  = abr_get_option( $key );
	$id     = 'abr-' . str_replace( '_', '-', $key );
	$extra  = '';
	$help_id = $help ? $id . '-help' : '';
	$choices = isset( $attrs['choices'] ) ? (array) $attrs['choices'] : array();
	unset( $attrs['choices'] );
	foreach ( $attrs as $attr => $attr_value ) {
		$extra .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $attr_value ) . '"';
	}
	if ( $help_id ) {
		$extra .= ' aria-describedby="' . esc_attr( $help_id ) . '"';
	}

	echo '<div class="abr-field abr-field--' . esc_attr( $type ) . '">';
	if ( 'checkbox' === $type ) {
		// Hidden zero so an unticked box is still submitted.
		printf(
			'<input type="hidden" name="%2$s" value="0"><label class="abr-switch" for="%1$s"><input type="checkbox" id="%1$s" name="%2$s" value="1" %3$s%5$s><span class="abr-switch__track" aria-hidden="true"></span><span class="abr-switch__label">%4$s</span></label>',
			esc_attr( $id ),
			esc_attr( $name ),
			checked( $value, 1, false ),
			esc_html( $label ),
			$extra // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
		);
	} else {
		printf( '<label for="%s">%s</label>', esc_attr( $id ), esc_html( $label ) );
		if ( 'textarea' === $type || 'menu' === $type ) {
			printf( '<textarea id="%s" name="%s" rows="%d"%s%s>%s</textarea>', esc_attr( $id ), esc_attr( $name ), 'menu' === $type ? 10 : 3, 'menu' === $type ? ' class="abr-code" spellcheck="false"' : '', $extra, esc_textarea( $value ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} elseif ( 'image' === $type ) {
			printf( '<span class="abr-media"><input type="url" class="regular-text" id="%1$s" name="%2$s" value="%3$s"%4$s> <button type="button" class="button abr-media-button" data-target="%1$s">%5$s</button></span>', esc_attr( $id ), esc_attr( $name ), esc_attr( $value ), $extra, esc_html__( 'Choose image', 'abrahamic' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} elseif ( 'select' === $type ) {
			printf( '<select id="%s" name="%s"%s>', esc_attr( $id ), esc_attr( $name ), $extra ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			foreach ( $choices as $choice => $choice_label ) {
				printf( '<option value="%s"%s>%s</option>', esc_attr( $choice ), selected( $value, $choice, false ), esc_html( $choice_label ) );
			}
			echo '</select>';
		} elseif ( 'color' === $type ) {
			printf( '<input type="text" class="abr-color" id="%s" name="%s" value="%s" data-slug="%s"%s>', esc_attr( $id ), esc_attr( $name ), esc_attr( $value ), esc_attr( str_replace( 'custom_', '', $key ) ), $extra ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			printf( '<input type="%s" class="regular-text" id="%s" name="%s" value="%s"%s>', esc_attr( $type ), esc_attr( $id ), esc_attr( $name ), esc_attr( $value ), $extra ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
	if ( $help ) {
		printf( '<p class="abr-help" id="%s">%s</p>', esc_attr( $help_id ), esc_html( $help ) );
	}
	echo '</div>';
}

/**
 * Social tab: one group per category, one URL field per network.
 */
function abr_render_social_fields() {
	foreach ( abr_social_groups() as $group => $networks ) {
		echo '<fieldset class="abr-social-group"><legend>' . esc_html( $group ) . '</legend><div class="abr-social-grid">';
		foreach ( $networks as $slug => $label ) {
			$key = abr_social_key( $slug );
			$id  = 'abr-' . str_replace( '_', '-', $key );
			printf(
				'<div class="abr-social-field" data-name="%1$s"><label for="%2$s"><span class="abr-social-field__icon">%3$s</span>%4$s</label><input type="url" id="%2$s" name="%6$s" value="%5$s" placeholder="https://" inputmode="url" spellcheck="false"></div>',
				esc_attr( strtolower( $label . ' ' . $slug ) ),
				esc_attr( $id ),
				abr_social_icon( $slug ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- theme-bundled SVG.
				esc_html( $label ),
				esc_attr( abr_get_option( $key ) ),
				esc_attr( 'abr_options[' . $key . ']' )
			);
		}
		echo '</div></fieldset>';
	}
}

/**
 * Tab button icon.
 *
 * @param string $paths SVG path data.
 * @return string
 */
function abr_tab_icon( $paths ) {
	return '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $paths . '</svg>';
}

/**
 * Notices after Tools actions.
 */
function abr_options_notice() {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- display only.
	$code     = isset( $_GET['abr-notice'] ) ? sanitize_key( wp_unslash( $_GET['abr-notice'] ) ) : '';
	$messages = array(
		'imported'     => array( 'success', __( 'Theme Options imported.', 'abrahamic' ) ),
		'reset'        => array( 'success', __( 'Theme Options reset to their defaults.', 'abrahamic' ) ),
		'import-empty' => array( 'error', __( 'Choose an export file to import.', 'abrahamic' ) ),
		'import-bad'     => array( 'error', __( 'That file is not an Abrahamic Theme Options export.', 'abrahamic' ) ),
		'restored'       => array( 'success', __( 'Starter item restored.', 'abrahamic' ) ),
		'restore-failed' => array( 'error', __( 'That item was not restored. A page or article with the same address may already exist.', 'abrahamic' ) ),
	);
	if ( 'search-indexed' === $code ) {
		/* translators: %d: number of items indexed. */
		$messages['search-indexed'] = array( 'success', sprintf( _n( 'Search index rebuilt: %d page or article.', 'Search index rebuilt: %d pages and articles.', $count, 'abrahamic' ), $count ) );
	}
	if ( 'links-updated' === $code ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- display only.
		$count = isset( $_GET['abr-created'] ) ? absint( $_GET['abr-created'] ) : 0;
		/* translators: %d: number of pages and articles updated. */
		$messages['links-updated'] = array( 'success', sprintf( _n( 'Links updated in %d page or article.', 'Links updated in %d pages and articles.', $count, 'abrahamic' ), $count ) );
	}
	if ( 'seeded' === $code ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- display only.
		$count = isset( $_GET['abr-created'] ) ? absint( $_GET['abr-created'] ) : 0;
		$log   = get_option( 'abr_seed_log' );
		$parts = array();
		if ( $count ) {
			/* translators: %d: number of items created. */
			$parts[] = sprintf( _n( '%d item added', '%d items added', $count, 'abrahamic' ), $count );
		}
		foreach ( array( 'refreshed' => __( '%d updated', 'abrahamic' ), 'replaced' => __( '%d replaced', 'abrahamic' ), 'retired' => __( '%d moved to the trash', 'abrahamic' ), 'photos' => __( '%d featured images added', 'abrahamic' ) ) as $field => $format ) {
			if ( is_array( $log ) && ! empty( $log[ $field ] ) ) {
				$parts[] = sprintf( $format, (int) $log[ $field ] );
			}
		}
		$text = $parts
			/* translators: %s: list of counts. */
			? sprintf( __( 'Starter content checked: %s.', 'abrahamic' ), implode( ', ', $parts ) )
			: __( 'Starter content checked: nothing was missing. Deleted items stay deleted unless you restore them below.', 'abrahamic' );
		$messages['seeded'] = array( 'success', $text );
	}
	if ( isset( $messages[ $code ] ) ) {
		printf( '<div class="notice notice-%1$s is-dismissible"><p>%2$s</p></div>', esc_attr( $messages[ $code ][0] ), esc_html( $messages[ $code ][1] ) );
	}
}

/**
 * The screen.
 */
function abr_render_options_page() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}
	$tabs    = abr_options_tabs();
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- tab selection only.
	$active  = isset( $_GET['tab'] ) ? sanitize_key( wp_unslash( $_GET['tab'] ) ) : '';
	$active  = isset( $tabs[ $active ] ) ? $active : '';
	$current = abr_get_option( 'scheme' );
	$theme   = wp_get_theme();
	?>
	<div class="wrap abr-settings" data-initial-tab="<?php echo esc_attr( $active ); ?>">
		<header class="abr-settings__head">
			<h1><?php esc_html_e( 'Theme Options', 'abrahamic' ); ?></h1>
			<p>
				<?php
				/* translators: 1: theme name, 2: version. */
				echo esc_html( sprintf( __( '%1$s %2$s. Page content is edited in Appearance > Editor; these options cover the header, footer, colours, login screen and search addresses, among others.', 'abrahamic' ), $theme->get( 'Name' ), ABR_VERSION ) );
				?>
			</p>
		</header>

		<?php
		settings_errors();
		abr_options_notice();
		?>

		<nav class="abr-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Theme Options sections', 'abrahamic' ); ?>">
			<?php foreach ( $tabs as $slug => $tab ) : ?>
				<button type="button" role="tab" class="abr-tab" id="abr-tab-<?php echo esc_attr( $slug ); ?>" aria-controls="abr-panel-<?php echo esc_attr( $slug ); ?>" aria-selected="false" data-tab="<?php echo esc_attr( $slug ); ?>">
					<?php echo abr_tab_icon( $tab[1] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static markup. ?>
					<span><?php echo esc_html( $tab[0] ); ?></span>
				</button>
			<?php endforeach; ?>
		</nav>

		<form method="post" action="options.php" class="abr-card abr-options-form">
			<?php settings_fields( 'abr_settings' ); ?>

			<section class="abr-panel" role="tabpanel" id="abr-panel-general" aria-labelledby="abr-tab-general" hidden>
				<h2><?php esc_html_e( 'Layout and motion', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'sticky_header', __( 'Keep the header fixed while scrolling', 'abrahamic' ), 'checkbox' );
				abr_field( 'mode_toggle', __( 'Show the light and dark switch', 'abrahamic' ), 'checkbox', __( 'Visitors keep their choice on this device. The dark colours follow the scheme chosen on the Colours tab.', 'abrahamic' ) );
				abr_field( 'mode_default', __( 'Colours on a first visit', 'abrahamic' ), 'select', '', array( 'choices' => abr_modes() ) );
				abr_field( 'reveal_motion', __( 'Fade cards in as they enter the viewport', 'abrahamic' ), 'checkbox', __( 'Visitors who prefer reduced motion never see the animation.', 'abrahamic' ) );
				?>
			</section>

			<section class="abr-panel" role="tabpanel" id="abr-panel-header" aria-labelledby="abr-tab-header" hidden>
				<h2><?php esc_html_e( 'Logo', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'logo_style', __( 'Logo', 'abrahamic' ), 'select', __( 'The AR mark follows the colour scheme. It also serves as the browser icon until a Site Icon is set under Settings > General.', 'abrahamic' ), array( 'choices' => abr_logo_styles() ) );
				abr_field( 'logo_main', __( 'Main line', 'abrahamic' ), 'text', __( 'Set in capitals by the stylesheet. Also read by screen readers when the mark stands alone.', 'abrahamic' ) );
				abr_field( 'logo_sub', __( 'Second line', 'abrahamic' ), 'text', __( 'Leave empty for a one-line logo.', 'abrahamic' ) );
				?>
				<h2><?php esc_html_e( 'Header tools', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'header_search', __( 'Show the search button', 'abrahamic' ), 'checkbox' );
				abr_field( 'header_cta', __( 'Show the call-to-action button', 'abrahamic' ), 'checkbox', __( 'Hidden on phones to keep the header on one line.', 'abrahamic' ) );
				abr_field( 'header_cta_label', __( 'Button label', 'abrahamic' ), 'text' );
				abr_field( 'header_cta_url', __( 'Button link', 'abrahamic' ), 'text', __( 'A full address, a path such as /about/, a section such as /#religions, or a page token such as @guides (see the Navigation tab).', 'abrahamic' ), array( 'spellcheck' => 'false' ) );
				?>
				<h2><?php esc_html_e( 'Donate', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'header_donate', __( 'Show the Donate button', 'abrahamic' ), 'checkbox', __( 'Sits beside the call-to-action button and stays visible on phones.', 'abrahamic' ) );
				abr_field( 'header_donate_label', __( 'Donate button label', 'abrahamic' ), 'text' );
				abr_field( 'header_donate_url', __( 'Donate button link', 'abrahamic' ), 'text', __( 'Where the header button goes: @donate opens the Donate page, or paste a payment link. A personal payment page (PayPal.me and the like) shows the account holder\'s name to every donor; use an account opened in the site\'s name to keep the owner anonymous.', 'abrahamic' ), array( 'spellcheck' => 'false' ) );
				abr_field( 'donate_colour', __( 'Donate button colour', 'abrahamic' ), 'color', __( 'Keep enough contrast with white text; the default red is #b3261e.', 'abrahamic' ) );
				abr_field( 'donation_url', __( 'Donation link', 'abrahamic' ), 'url', __( 'The payment page shown as a Donate now button on the Donate page. Defaults to the PayPal page. If empty, the page uses the header button link when it points to a payment site, otherwise it points visitors to the Contact page.', 'abrahamic' ) );
				abr_field( 'donation_button', __( 'Donate page button label', 'abrahamic' ), 'text' );
				?>
				<p class="abr-help"><?php esc_html_e( 'Menu links are set on the Navigation tab.', 'abrahamic' ); ?></p>
			</section>

			<section class="abr-panel" role="tabpanel" id="abr-panel-footer" aria-labelledby="abr-tab-footer" hidden>
				<h2><?php esc_html_e( 'Footer brand', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'footer_title', __( 'Title', 'abrahamic' ), 'text' );
				abr_field( 'footer_tagline', __( 'Tagline', 'abrahamic' ), 'text' );
				abr_field( 'footer_text', __( 'Description', 'abrahamic' ), 'textarea' );
				?>
				<h2><?php esc_html_e( 'Bottom line', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'footer_copyright', __( 'Copyright notice', 'abrahamic' ), 'text', __( '{year} is replaced with the current year.', 'abrahamic' ) );
				abr_field( 'footer_note', __( 'Note', 'abrahamic' ), 'text', __( 'Shown opposite the copyright notice. Leave empty to hide.', 'abrahamic' ) );
				?>
				<h2><?php esc_html_e( 'Contact', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'contact_email', __( 'Contact email', 'abrahamic' ), 'email', __( 'Shown on the Contact page, protected against address harvesting. Leave empty to hide it.', 'abrahamic' ) );
				?>
				<p class="abr-help"><?php esc_html_e( 'Footer link columns are set on the Navigation tab. Social icons come from the Social tab.', 'abrahamic' ); ?></p>
			</section>

			<section class="abr-panel" role="tabpanel" id="abr-panel-navigation" aria-labelledby="abr-tab-navigation" hidden>
				<h2><?php esc_html_e( 'How to write a menu', 'abrahamic' ); ?></h2>
				<p class="abr-help"><?php esc_html_e( 'One link per line, as Label | target. In the main menu, start a line with a dash to place it in the dropdown of the line above.', 'abrahamic' ); ?></p>
				<p class="abr-help"><?php esc_html_e( 'A target is a full address, a path such as /about/, or a token: @guides (Religions), @judaism, @christianity, @islam, @knowledge-base, @sacred-texts, @timeline, @figures, @places, @comparisons, @glossary, @faq, @research, @articles, @topics, @about, @editorial-policy, @contact, @privacy-policy, @terms, @site-map, @post:article-slug or @topic:topic-slug. Tokens follow a page when its address changes.', 'abrahamic' ); ?></p>
				<h2><?php esc_html_e( 'Main menu', 'abrahamic' ); ?></h2>
				<?php if ( count( abr_parse_menu( abr_get_option( 'nav_header' ) ) ) > ABR_PRIMARY_NAV_MAX ) : ?>
					<div class="notice notice-warning inline"><p>
						<?php
						/* translators: %d: top-level limit. */
						echo esc_html( sprintf( __( 'The saved main menu has more than %d top-level links, so the site shows only the first ones. Move the rest into dropdowns or the secondary menu, then save.', 'abrahamic' ), ABR_PRIMARY_NAV_MAX ) );
						?>
					</p></div>
				<?php endif; ?>
				<?php
				abr_field(
					'nav_header',
					__( 'Main menu links', 'abrahamic' ),
					'menu',
					/* translators: 1: top-level limit, 2: dropdown limit. */
					sprintf( __( 'At most %1$d top-level links, each with up to %2$d dropdown links; extra lines are removed on saving. The logo links to the home page. Below 1024 pixels the menu opens as a panel with the dropdowns expanded. For a short label with a tooltip, add the full name as a third part: KB | https://knowislam.wiki/ | Knowledge Base.', 'abrahamic' ), ABR_PRIMARY_NAV_MAX, ABR_NAV_CHILDREN_MAX )
				);
				?>
				<h2><?php esc_html_e( 'Home page journey', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'home_parallax', __( 'Show the chapter banners', 'abrahamic' ), 'checkbox', __( 'A photographic banner before each main section of the home page, moving more slowly than the page as it scrolls. Visitors who ask their device for reduced motion see the banners still.', 'abrahamic' ) );
				abr_field( 'home_subnav', __( 'Show the section bar', 'abrahamic' ), 'checkbox', __( 'A slim bar under the header on the home page only, jumping smoothly to its main sections.', 'abrahamic' ) );
				abr_field(
					'home_subnav_items',
					__( 'Section bar links', 'abrahamic' ),
					'menu',
					/* translators: %d: link limit. */
					sprintf( __( 'One per line: Label | #section. The sections are #heritage, #figures, #places, #texts, #religions, #timeline and #comparison. At most %d links.', 'abrahamic' ), ABR_SECONDARY_NAV_MAX )
				);
				?>
				<h2><?php esc_html_e( 'Footer links', 'abrahamic' ); ?></h2>
				<?php
				abr_field(
					'nav_utility',
					__( 'Footer links', 'abrahamic' ),
					'menu',
					/* translators: %d: link limit. */
					sprintf( __( 'The secondary navigation bar along the bottom of the footer: pages about the site itself. At most %d links, no dropdowns. Leave empty to hide it.', 'abrahamic' ), ABR_SECONDARY_NAV_MAX )
				);
				?>
				<h2><?php esc_html_e( 'Further reading', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'further_title', __( 'Heading', 'abrahamic' ), 'text' );
				abr_field(
					'further_links',
					__( 'Further reading links', 'abrahamic' ),
					'menu',
					/* translators: %d: link limit. */
					sprintf( __( 'Shown at the foot of every article, below related articles. Up to %d links, one per line as Label | address. Descriptive labels that name the subject read best. Leave empty to hide the list.', 'abrahamic' ), ABR_FURTHER_MAX )
				);
				?>
				<h2><?php esc_html_e( 'Footer columns', 'abrahamic' ); ?></h2>
				<div class="abr-columns">
					<?php for ( $col = 1; $col <= 3; $col++ ) : ?>
						<div>
							<?php
							/* translators: %d: column number. */
							abr_field( 'nav_footer_' . $col . '_title', sprintf( __( 'Column %d heading', 'abrahamic' ), $col ), 'text' );
							/* translators: %d: column number. */
							abr_field( 'nav_footer_' . $col, sprintf( __( 'Column %d links', 'abrahamic' ), $col ), 'menu' );
							?>
						</div>
					<?php endfor; ?>
				</div>
			</section>

			<section class="abr-panel" role="tabpanel" id="abr-panel-colours" aria-labelledby="abr-tab-colours" hidden>
				<h2><?php esc_html_e( 'Colour scheme', 'abrahamic' ); ?></h2>
				<div class="abr-schemes">
					<?php foreach ( abr_schemes() as $slug => $scheme ) : ?>
						<label class="abr-scheme">
							<input type="radio" name="abr_options[scheme]" value="<?php echo esc_attr( $slug ); ?>" <?php checked( $current, $slug ); ?>>
							<span class="abr-scheme__swatches" aria-hidden="true">
								<?php
								if ( $scheme['colors'] ) {
									foreach ( $scheme['colors'] as $c ) {
										echo '<i style="background:' . esc_attr( $c ) . '"></i>';
									}
								} else {
									echo '<i class="abr-scheme__any"></i>';
								}
								?>
							</span>
							<span class="abr-scheme__name"><?php echo esc_html( $scheme['label'] ); ?></span>
						</label>
					<?php endforeach; ?>
				</div>
				<div class="abr-custom-colours" <?php echo 'custom' === $current ? '' : 'hidden'; ?>>
					<h3><?php esc_html_e( 'Custom palette', 'abrahamic' ); ?></h3>
					<?php
					abr_field( 'custom_navy', __( 'Primary (headings, dark bands)', 'abrahamic' ), 'color' );
					abr_field( 'custom_ivory', __( 'Background', 'abrahamic' ), 'color' );
					abr_field( 'custom_gold', __( 'Accent', 'abrahamic' ), 'color' );
					abr_field( 'custom_beige', __( 'Surface', 'abrahamic' ), 'color' );
					abr_field( 'custom_charcoal', __( 'Body text', 'abrahamic' ), 'color' );
					?>
				</div>
			</section>

			<section class="abr-panel" role="tabpanel" id="abr-panel-newsletter" aria-labelledby="abr-tab-newsletter" hidden>
				<h2><?php esc_html_e( 'Newsletter form', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'newsletter_url', __( 'Form action URL', 'abrahamic' ), 'url', __( 'The POST endpoint from your mailing provider. The form stays hidden until this is set.', 'abrahamic' ) );
				abr_field( 'newsletter_name', __( 'Email field name', 'abrahamic' ), 'text', __( 'Most providers use "email" or "EMAIL".', 'abrahamic' ) );
				abr_field( 'newsletter_text', __( 'Intro text', 'abrahamic' ), 'textarea' );
				?>
			</section>

			<section class="abr-panel" role="tabpanel" id="abr-panel-social" aria-labelledby="abr-tab-social" hidden>
				<h2><?php esc_html_e( 'Social profiles', 'abrahamic' ); ?></h2>
				<p class="abr-help"><?php esc_html_e( 'Profiles with a URL appear in the footer, in the order shown here. Empty fields are left out.', 'abrahamic' ); ?></p>
				<div class="abr-social-tools">
					<label class="screen-reader-text" for="abr-social-filter"><?php esc_html_e( 'Filter networks', 'abrahamic' ); ?></label>
					<input type="search" id="abr-social-filter" class="abr-social-filter" placeholder="<?php esc_attr_e( 'Filter networks', 'abrahamic' ); ?>" autocomplete="off">
					<span class="abr-social-count" aria-live="polite" data-template="<?php /* translators: %d: number of profiles with a URL. */ echo esc_attr__( '%d in use', 'abrahamic' ); ?>"></span>
				</div>
				<?php abr_render_social_fields(); ?>
			</section>

			<section class="abr-panel" role="tabpanel" id="abr-panel-search" aria-labelledby="abr-tab-search" hidden>
				<?php if ( abr_seo_plugin() ) : ?>
					<div class="notice notice-info inline"><p>
						<?php
						/* translators: %s: plugin name. */
						echo esc_html( sprintf( __( '%s is active, so the theme leaves descriptions, canonical addresses, social tags, structured data, robots rules and the sitemap to it. Verification codes and analytics below still apply.', 'abrahamic' ), abr_seo_plugin() ) );
						?>
					</p></div>
				<?php endif; ?>
				<h2><?php esc_html_e( 'Search output', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'seo_enabled', __( 'Output descriptions, canonical addresses, social tags and structured data', 'abrahamic' ), 'checkbox', __( 'Also keeps internal search results out of the crawl and author archives out of the XML sitemap.', 'abrahamic' ) );
				abr_field( 'seo_home_description', __( 'Front page description', 'abrahamic' ), 'textarea', __( '130 characters or fewer, ending with a call to action. Leave empty to use the Home page\'s search description.', 'abrahamic' ), array( 'data-limit' => '130' ) );
				?>
				<h2><?php esc_html_e( 'Images', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'org_logo', __( 'Organisation logo', 'abrahamic' ), 'image', __( 'Used in structured data. Square, at least 112 pixels. Leave empty to use the site icon or the bundled logo.', 'abrahamic' ) );
				abr_field( 'share_image', __( 'Default share image', 'abrahamic' ), 'image', __( 'Shown in link previews for pages without a featured image. 1200 by 630 pixels works best. Leave empty to use the bundled image.', 'abrahamic' ) );
				?>
				<h2><?php esc_html_e( 'Webmaster tools', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'google_verification', __( 'Google Search Console verification code', 'abrahamic' ), 'text', __( 'Paste the content value, or the whole meta tag, from the HTML tag method.', 'abrahamic' ), array( 'spellcheck' => 'false' ) );
				abr_field( 'bing_verification', __( 'Bing Webmaster Tools verification code', 'abrahamic' ), 'text', __( 'Paste the content value, or the whole msvalidate.01 meta tag.', 'abrahamic' ), array( 'spellcheck' => 'false' ) );
				abr_field( 'ga4_id', __( 'Google Analytics 4 measurement ID', 'abrahamic' ), 'text', __( 'For example G-XXXXXXXXXX. Visits by logged-in editors are not counted. The Privacy Policy page mentions analytics.', 'abrahamic' ), array( 'spellcheck' => 'false' ) );
				?>
				<h2><?php esc_html_e( 'Submit your sitemap', 'abrahamic' ); ?></h2>
				<p class="abr-help">
					<?php
					/* translators: %s: sitemap address. */
					echo esc_html( sprintf( __( 'Add %s in Google Search Console and Bing Webmaster Tools. It is also listed in robots.txt.', 'abrahamic' ), home_url( '/wp-sitemap.xml' ) ) );
					?>
				</p>

				<h2><?php esc_html_e( 'Search addresses', 'abrahamic' ); ?></h2>
				<?php if ( function_exists( 'wpseosearch_base' ) ) : ?>
					<div class="notice notice-info inline"><p><?php esc_html_e( 'Pretty Search Permalinks is active and handles search addresses. Deactivate it to use the settings below.', 'abrahamic' ); ?></p></div>
				<?php endif; ?>
				<?php
				abr_field( 'search_pretty', __( 'Give search results a readable address', 'abrahamic' ), 'checkbox', __( 'A search for Abraham opens at /search/abraham/ in place of /?s=abraham. Needs pretty permalinks under Settings > Permalinks.', 'abrahamic' ) );
				abr_field( 'search_base', __( 'Search address word', 'abrahamic' ), 'text', __( 'Lower-case letters, numbers and hyphens. The default is search.', 'abrahamic' ), array( 'spellcheck' => 'false' ) );
				?>
			</section>

			<section class="abr-panel" role="tabpanel" id="abr-panel-login" aria-labelledby="abr-tab-login" hidden>
				<h2><?php esc_html_e( 'Login screen', 'abrahamic' ); ?></h2>
				<?php
				abr_field( 'login_design', __( 'Use the theme design on the login screen', 'abrahamic' ), 'checkbox', __( 'Colours, type and the light or dark choice follow the rest of the site.', 'abrahamic' ) );
				abr_field( 'login_logo', __( 'Login logo', 'abrahamic' ), 'image', __( 'Leave empty to use the AR mark with the logo text from the Header tab. A file named login-logo.png in wp-content is used when this is empty.', 'abrahamic' ) );
				abr_field( 'login_layout', __( 'Layout', 'abrahamic' ), 'select', __( 'The centred card suits a private team login; the photograph layout suits a public site. The photograph layout needs a photograph below.', 'abrahamic' ), array( 'choices' => abr_login_layouts() ) );
				abr_field( 'login_photo', __( 'Photograph', 'abrahamic' ), 'select', __( 'In the centred layout it sits behind the page, darkened; in the photograph layout it fills the panel beside the form, and a band above it on phones.', 'abrahamic' ), array( 'choices' => abr_login_photos() ) );
				abr_field( 'login_message', __( 'Line of text', 'abrahamic' ), 'text', __( 'Shown under the logo in the centred layout and over the photograph in the photograph layout. Leave empty to leave it out.', 'abrahamic' ) );
				?>
				<p class="abr-help"><a href="<?php echo esc_url( wp_login_url() ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Preview the login screen in a new tab (log out there, or use a private window, to see it as visitors do)', 'abrahamic' ); ?></a></p>

				<h2><?php esc_html_e( 'Private login address', 'abrahamic' ); ?></h2>
				<?php if ( abr_login_hide_plugin_active() ) : ?>
					<div class="notice notice-info inline"><p><?php esc_html_e( 'WPS Hide Login is active and handles the login address. Deactivate it to use the settings below; its address carries over.', 'abrahamic' ); ?></p></div>
				<?php elseif ( is_multisite() ) : ?>
					<div class="notice notice-warning inline"><p><?php esc_html_e( 'The private login address is available on single sites only.', 'abrahamic' ); ?></p></div>
				<?php endif; ?>
				<?php
				abr_field( 'login_hide', __( 'Move the login screen to a private address', 'abrahamic' ), 'checkbox', __( 'wp-login.php and wp-admin then answer logged-out visitors with a missing page. Bookmark the new address before saving.', 'abrahamic' ) );
				abr_field( 'login_slug', __( 'Login address', 'abrahamic' ), 'text', sprintf( /* translators: %s: example address. */ __( 'The login screen opens at %s followed by this word.', 'abrahamic' ), home_url( '/' ) ), array( 'spellcheck' => 'false' ) );
				abr_field( 'login_redirect_slug', __( 'Where wp-admin sends logged-out visitors', 'abrahamic' ), 'text', __( 'An address on this site, usually a page that does not exist so the visitor sees the not-found page. The default is 404.', 'abrahamic' ), array( 'spellcheck' => 'false' ) );
				?>
				<?php if ( abr_login_hide_on() ) : ?>
					<p class="abr-help abr-help--key">
						<?php
						/* translators: %s: login address. */
						echo wp_kses_post( sprintf( __( 'Current login address: <strong>%s</strong>', 'abrahamic' ), esc_html( abr_login_new_url() ) ) );
						?>
					</p>
				<?php endif; ?>
				<p class="abr-help"><?php esc_html_e( 'If the address is ever lost, add define( \'ABR_HIDE_LOGIN\', false ); to wp-config.php, log in at wp-login.php, and remove the line again.', 'abrahamic' ); ?></p>
			</section>

			<div class="abr-options-submit">
				<?php submit_button( __( 'Save Theme Options', 'abrahamic' ), 'primary', 'submit', false ); ?>
			</div>
		</form>

		<section class="abr-card abr-panel abr-panel--tools" role="tabpanel" id="abr-panel-tools" aria-labelledby="abr-tab-tools" hidden>
			<h2><?php esc_html_e( 'Export', 'abrahamic' ); ?></h2>
			<p class="abr-help"><?php esc_html_e( 'Download every Theme Option as a JSON file, for backup or to copy the setup to another site.', 'abrahamic' ); ?></p>
			<p><a class="button" href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=abr_export_options' ), 'abr_export_options' ) ); ?>"><?php esc_html_e( 'Download export file', 'abrahamic' ); ?></a></p>

			<h2><?php esc_html_e( 'Import', 'abrahamic' ); ?></h2>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" enctype="multipart/form-data" class="abr-tools-form">
				<input type="hidden" name="action" value="abr_import_options">
				<?php wp_nonce_field( 'abr_import_options' ); ?>
				<label class="screen-reader-text" for="abr-import-file"><?php esc_html_e( 'Export file', 'abrahamic' ); ?></label>
				<input type="file" id="abr-import-file" name="abr_import_file" accept=".json,application/json">
				<?php submit_button( __( 'Import', 'abrahamic' ), 'secondary', 'submit', false ); ?>
			</form>
			<p class="abr-help"><?php esc_html_e( 'Values in the file replace the matching options; options the file does not contain keep their current values.', 'abrahamic' ); ?></p>

			<h2><?php esc_html_e( 'Reset', 'abrahamic' ); ?></h2>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="abr-tools-form abr-reset-form">
				<input type="hidden" name="action" value="abr_reset_options">
				<?php wp_nonce_field( 'abr_reset_options' ); ?>
				<?php submit_button( __( 'Reset all Theme Options', 'abrahamic' ), 'delete', 'submit', false ); ?>
			</form>

			<?php abr_render_seed_section(); ?>

			<h2><?php esc_html_e( 'System information', 'abrahamic' ); ?></h2>
			<table class="widefat striped abr-sysinfo">
				<tbody>
					<?php
					$parent = $theme->parent();
					$rows   = array(
						__( 'Theme', 'abrahamic' )          => $theme->get( 'Name' ) . ' ' . ABR_VERSION,
						__( 'Parent theme', 'abrahamic' )   => $parent ? $parent->get( 'Name' ) . ' ' . $parent->get( 'Version' ) : __( 'Missing', 'abrahamic' ),
						__( 'WordPress', 'abrahamic' )      => get_bloginfo( 'version' ),
						__( 'PHP', 'abrahamic' )            => PHP_VERSION,
						__( 'Sabon Next LT', 'abrahamic' )  => abr_sabon_missing()
							/* translators: %s: comma-separated file names. */
							? sprintf( __( 'Missing: %s', 'abrahamic' ), implode( ', ', abr_sabon_missing() ) )
							/* translators: %d: number of font files. */
							: sprintf( __( 'Bundled (%d files)', 'abrahamic' ), count( abr_sabon_files() ) ),
						__( 'Permalinks', 'abrahamic' )     => abr_seed_permalinks_ok() ? __( 'Recommended structure in use', 'abrahamic' ) : __( 'Not the recommended structure (see docs/readme.md)', 'abrahamic' ),
						__( 'Search output', 'abrahamic' )  => abr_seo_plugin() ? sprintf( /* translators: %s: plugin name. */ __( 'Handled by %s', 'abrahamic' ), abr_seo_plugin() ) : ( abr_seo_active() ? __( 'Theme', 'abrahamic' ) : __( 'Off', 'abrahamic' ) ),
						__( 'XML sitemap', 'abrahamic' )    => get_option( 'blog_public' ) ? home_url( '/wp-sitemap.xml' ) : __( 'Off: the site discourages search engines (Settings > Reading)', 'abrahamic' ),
						__( 'Colour scheme', 'abrahamic' )  => abr_schemes()[ $current ]['label'],
						__( 'Social profiles', 'abrahamic' ) => (string) count( abr_social_profiles() ),
						__( 'Options stored', 'abrahamic' ) => false === get_option( 'abr_options' ) ? __( 'No (defaults in use)', 'abrahamic' ) : __( 'Yes', 'abrahamic' ),
						__( 'Legacy 1.x row', 'abrahamic' ) => false === get_option( 'ar_options' ) ? __( 'None', 'abrahamic' ) : __( 'Present (ar_options)', 'abrahamic' ),
					);
					foreach ( $rows as $label => $value ) {
						printf( '<tr><th scope="row">%s</th><td>%s</td></tr>', esc_html( $label ), esc_html( $value ) );
					}
					?>
				</tbody>
			</table>
		</section>
	</div>
	<?php
}

/**
 * Tools: starter content status, "add missing" and per-item Restore.
 */
function abr_render_seed_section() {
	$rows   = abr_seed_status();
	$labels = array(
		'publish' => __( 'Published', 'abrahamic' ),
		'draft'   => __( 'Draft', 'abrahamic' ),
		'pending' => __( 'Pending review', 'abrahamic' ),
		'private' => __( 'Private', 'abrahamic' ),
		'future'  => __( 'Scheduled', 'abrahamic' ),
		'trash'   => __( 'In trash', 'abrahamic' ),
		'kept'    => __( 'Your existing content kept', 'abrahamic' ),
		'deleted' => __( 'Deleted', 'abrahamic' ),
		'pending_seed' => __( 'Not added yet', 'abrahamic' ),
	);
	$counts = array_count_values( wp_list_pluck( $rows, 'state' ) );
	$log    = get_option( 'abr_seed_log' );
	?>
	<h2 id="abr-seed"><?php esc_html_e( 'Starter content', 'abrahamic' ); ?></h2>
	<p class="abr-help">
		<?php
		esc_html_e( 'On activation the theme creates the pages the menus link to, the starter articles and the topic categories. On a new site it also sets the permalink structure and the tagline, moves the untouched WordPress sample post and page to the trash, publishes the default privacy policy with starter text, and sets the front page and the article listing. Pages you created yourself are never touched. Items you delete stay deleted unless you restore them here.', 'abrahamic' );
		?>
	</p>
	<?php
	abr_field(
		'seed_mode',
		__( 'When the theme ships new starter content', 'abrahamic' ),
		'select',
		__( 'Replacing writes the current version over starter pages, including any you have edited; the text you had is kept in the page\'s revisions. Pages you created yourself are never touched, and starter pages the theme no longer carries are moved to the trash.', 'abrahamic' ),
		array( 'choices' => abr_seed_modes() )
	);
	?>
	<p class="abr-seed-actions">
		<?php
		$indexed = (int) get_option( 'abr_search_indexed' );
		printf(
			'<a class="button" href="%1$s">%2$s</a> <span class="description">%3$s</span>',
			esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=abr_rebuild_search' ), 'abr_rebuild_search' ) ),
			esc_html__( 'Rebuild the search index', 'abrahamic' ),
			$indexed
				/* translators: %d: number of items indexed. */
				? esc_html( sprintf( _n( '%d page or article is indexed for search.', '%d pages and articles are indexed for search.', $indexed, 'abrahamic' ), $indexed ) )
				: esc_html__( 'Search is not indexed yet.', 'abrahamic' )
		);
		?>
	</p>
	<p class="abr-seed-summary">
		<?php
		/* translators: 1: published count, 2: total count. */
		echo esc_html( sprintf( __( '%1$d of %2$d starter items published.', 'abrahamic' ), isset( $counts['publish'] ) ? $counts['publish'] : 0, count( $rows ) ) );
		if ( is_array( $log ) && ! empty( $log['time'] ) ) {
			echo ' ';
			/* translators: %s: date and time. */
			echo esc_html( sprintf( __( 'Last checked %s.', 'abrahamic' ), wp_date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), (int) $log['time'] ) ) );
		}
		if ( is_array( $log ) && ! empty( $log['photo_errors'] ) ) {
			echo '</p><div class="notice notice-warning inline"><p>' . esc_html__( 'Some featured images could not be added. The next check tries again:', 'abrahamic' ) . '</p><ul>';
			foreach ( (array) $log['photo_errors'] as $error ) {
				echo '<li>' . esc_html( $error ) . '</li>';
			}
			echo '</ul></div><p>';
		}
		?>
	</p>
	<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="abr-tools-form">
		<input type="hidden" name="action" value="abr_seed_run">
		<?php wp_nonce_field( 'abr_seed_run' ); ?>
		<?php submit_button( __( 'Add missing starter content', 'abrahamic' ), 'secondary', 'submit', false ); ?>
	</form>
	<?php
	$legacy = abr_posts_with_legacy_links();
	if ( $legacy ) :
		?>
		<div class="notice notice-warning inline"><p>
			<?php
			/* translators: 1: number of items, 2: comma-separated titles. */
			echo esc_html( sprintf( _n( '%1$d page or article still links to an earlier address: %2$s. Those links redirect, but pointing them at the current address is better.', '%1$d pages and articles still link to earlier addresses: %2$s. Those links redirect, but pointing them at the current addresses is better.', count( $legacy ), 'abrahamic' ), count( $legacy ), implode( ', ', wp_list_pluck( $legacy, 'post_title' ) ) ) );
			?>
		</p>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="abr_update_links">
			<?php wp_nonce_field( 'abr_update_links' ); ?>
			<p><?php submit_button( __( 'Update links', 'abrahamic' ), 'secondary', 'submit', false ); ?></p>
		</form></div>
	<?php endif; ?>
	<details class="abr-seed-details"<?php echo ( isset( $counts['deleted'] ) || isset( $counts['trash'] ) ) ? ' open' : ''; ?>>
		<summary><?php esc_html_e( 'Starter items', 'abrahamic' ); ?></summary>
		<table class="widefat striped abr-seed-table">
			<thead><tr><th scope="col"><?php esc_html_e( 'Item', 'abrahamic' ); ?></th><th scope="col"><?php esc_html_e( 'Type', 'abrahamic' ); ?></th><th scope="col"><?php esc_html_e( 'Status', 'abrahamic' ); ?></th><th scope="col"><span class="screen-reader-text"><?php esc_html_e( 'Actions', 'abrahamic' ); ?></span></th></tr></thead>
			<tbody>
			<?php foreach ( $rows as $row ) : ?>
				<?php $state = 'pending' === $row['state'] ? 'pending_seed' : $row['state']; ?>
				<tr class="abr-seed-row is-<?php echo esc_attr( $state ); ?>">
					<td><?php echo esc_html( $row['label'] ); ?></td>
					<td><?php echo esc_html( $row['kind'] ); ?></td>
					<td><?php echo esc_html( isset( $labels[ $state ] ) ? $labels[ $state ] : $state ); ?></td>
					<td class="abr-seed-actions">
						<?php
						if ( $row['post'] && 'trash' !== $row['state'] ) {
							printf( '<a href="%s">%s</a> ', esc_url( get_edit_post_link( $row['post']->ID ) ), esc_html__( 'Edit', 'abrahamic' ) );
							if ( 'publish' === $row['post']->post_status ) {
								printf( '<a href="%s">%s</a>', esc_url( get_permalink( $row['post'] ) ), esc_html__( 'View', 'abrahamic' ) );
							}
						} elseif ( 'trash' === $row['state'] ) {
							printf( '<a href="%s">%s</a>', esc_url( admin_url( 'edit.php?post_status=trash&post_type=' . $row['post']->post_type ) ), esc_html__( 'Open trash', 'abrahamic' ) );
						} elseif ( 'deleted' === $row['state'] ) {
							?>
							<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
								<input type="hidden" name="action" value="abr_seed_restore">
								<input type="hidden" name="abr_seed_key" value="<?php echo esc_attr( $row['key'] ); ?>">
								<?php wp_nonce_field( 'abr_seed_restore_' . $row['key'] ); ?>
								<button type="submit" class="button-link"><?php esc_html_e( 'Restore', 'abrahamic' ); ?></button>
							</form>
							<?php
						}
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</details>
	<?php
}

/**
 * Tools: export.
 */
function abr_handle_export() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to export Theme Options.', 'abrahamic' ), 403 );
	}
	check_admin_referer( 'abr_export_options' );

	$payload = array(
		'theme'    => 'abrahamic',
		'version'  => ABR_VERSION,
		'exported' => gmdate( 'c' ),
		'site'     => home_url( '/' ),
		'options'  => abr_get_options(),
	);
	nocache_headers();
	header( 'Content-Type: application/json; charset=utf-8' );
	header( 'Content-Disposition: attachment; filename=abrahamic-options-' . gmdate( 'Y-m-d' ) . '.json' );
	echo wp_json_encode( $payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
	exit;
}
add_action( 'admin_post_abr_export_options', 'abr_handle_export' );

/**
 * Tools: import.
 */
function abr_handle_import() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to import Theme Options.', 'abrahamic' ), 403 );
	}
	check_admin_referer( 'abr_import_options' );

	$file = isset( $_FILES['abr_import_file'] ) ? $_FILES['abr_import_file'] : null; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- validated below.
	if ( ! $file || ! empty( $file['error'] ) || empty( $file['tmp_name'] ) || ! is_uploaded_file( $file['tmp_name'] ) ) {
		wp_safe_redirect( abr_options_url( 'tools', array( 'abr-notice' => 'import-empty' ) ) );
		exit;
	}

	$data = ( (int) $file['size'] > 0 && (int) $file['size'] <= MB_IN_BYTES )
		? json_decode( (string) file_get_contents( $file['tmp_name'] ), true ) // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		: null;

	if ( ! is_array( $data ) || ( $data['theme'] ?? '' ) !== 'abrahamic' || ! is_array( $data['options'] ?? null ) ) {
		wp_safe_redirect( abr_options_url( 'tools', array( 'abr-notice' => 'import-bad' ) ) );
		exit;
	}

	$incoming = array_intersect_key( $data['options'], abr_option_types() );
	update_option( 'abr_options', abr_sanitize_options( array_merge( abr_get_options(), $incoming ) ) );

	wp_safe_redirect( abr_options_url( 'tools', array( 'abr-notice' => 'imported' ) ) );
	exit;
}
add_action( 'admin_post_abr_import_options', 'abr_handle_import' );

/**
 * Tools: reset.
 */
function abr_handle_reset() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to reset Theme Options.', 'abrahamic' ), 403 );
	}
	check_admin_referer( 'abr_reset_options' );
	update_option( 'abr_options', abr_option_defaults() );
	wp_safe_redirect( abr_options_url( 'tools', array( 'abr-notice' => 'reset' ) ) );
	exit;
}
add_action( 'admin_post_abr_reset_options', 'abr_handle_reset' );

/**
 * Say so on every admin screen when the starter content is behind or items are
 * missing, with one click to put it right.
 */
function abr_seed_admin_notice() {
	if ( ! current_user_can( 'edit_theme_options' ) || ! function_exists( 'abr_seed_is_behind' ) ) {
		return;
	}
	$behind  = abr_seed_is_behind();
	$missing = abr_seed_missing_keys();
	if ( ! $behind && ! $missing ) {
		return;
	}
	printf(
		'<div class="notice notice-warning"><p><strong>%1$s</strong> %2$s</p><p><a class="button button-primary" href="%3$s">%4$s</a> <a href="%5$s">%6$s</a></p></div>',
		esc_html__( 'Abrahamic:', 'abrahamic' ),
		$missing
			/* translators: %d: number of items. */
			? esc_html( sprintf( _n( '%d starter page or article is missing from this site.', '%d starter pages and articles are missing from this site.', count( $missing ), 'abrahamic' ), count( $missing ) ) )
			: esc_html__( 'the theme ships newer starter content than this site carries.', 'abrahamic' ),
		esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=abr_seed_run' ), 'abr_seed_run' ) ),
		esc_html__( 'Add the missing content', 'abrahamic' ),
		esc_url( abr_options_url( 'tools' ) . '#abr-seed' ),
		esc_html__( 'See what is missing', 'abrahamic' )
	);
}
add_action( 'admin_notices', 'abr_seed_admin_notice' );
