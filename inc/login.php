<?php
/**
 * Login page: the theme's own design for the login screen, and an optional
 * private login address.
 *
 * Two GPL plugins are built in here. The logo convention comes from Login Logo
 * by Mark Jaquith: a file named login-logo.png in wp-content is used when no
 * logo is chosen in Theme Options. The private address is a port of WPS Hide
 * Login 1.9.18 by WPServeur, NicolasKulka and wpformation, reduced to single
 * sites and to the options this theme exposes. Its settings (whl_page and
 * whl_redirect_admin) seed the theme's defaults, so a site moving from the
 * plugin keeps its address.
 *
 * While either plugin is active, the theme leaves that part to the plugin.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Whether the WPS Hide Login plugin is running.
 *
 * @return bool
 */
function abr_login_hide_plugin_active() {
	return defined( 'WPS_HIDE_LOGIN_BASENAME' );
}

/* -------------------------------------------------------------------------
 * Design
 * ---------------------------------------------------------------------- */

/**
 * Whether the themed login screen is switched on.
 *
 * @return bool
 */
function abr_login_design_on() {
	return (bool) abr_get_option( 'login_design' );
}

/**
 * Bundled photographs offered for the login screen.
 *
 * @return array name => label
 */
function abr_login_photos() {
	return array(
		'jerusalem-panorama' => __( 'Jerusalem from the Mount of Olives', 'abrahamic' ),
		'hero-kaaba'         => __( 'The Kaaba, Makkah', 'abrahamic' ),
		'cordoba'            => __( 'The Great Mosque of Córdoba', 'abrahamic' ),
		'isaiah-scroll'      => __( 'The Great Isaiah Scroll', 'abrahamic' ),
		'place-sinai'        => __( 'Mount Sinai', 'abrahamic' ),
		'none'               => __( 'No photograph', 'abrahamic' ),
	);
}

/**
 * URL of the chosen login photograph, preferring the large file.
 *
 * @return string
 */
function abr_login_photo_url() {
	$name = abr_get_option( 'login_photo' );
	if ( 'none' === $name || ! array_key_exists( $name, abr_login_photos() ) ) {
		return '';
	}
	foreach ( array( '/assets/images/photos/large/', '/assets/images/photos/' ) as $dir ) {
		if ( is_readable( ABR_DIR . $dir . $name . '.avif' ) ) {
			return ABR_URI . $dir . $name . '.avif';
		}
	}
	return '';
}

/**
 * URL of a custom logo: the Theme Options image, else wp-content/login-logo.png.
 *
 * @return string Empty when the AR mark should be used.
 */
function abr_login_logo_url() {
	$custom = abr_get_option( 'login_logo' );
	if ( $custom ) {
		return $custom;
	}
	$file = WP_CONTENT_DIR . '/login-logo.png';
	if ( is_readable( $file ) ) {
		return add_query_arg( 'v', (string) filemtime( $file ), content_url( 'login-logo.png' ) );
	}
	return '';
}

/**
 * Styles and the colour-mode script for the login screen.
 */
function abr_login_assets() {
	if ( ! abr_login_design_on() ) {
		return;
	}
	wp_enqueue_script( 'abr-mode', ABR_URI . '/assets/js/mode.js', array(), ABR_VERSION, array( 'in_footer' => false ) );
	wp_enqueue_style( 'abr-login', ABR_URI . '/assets/css/login.css', array( 'login' ), ABR_VERSION );
	$css   = abr_scheme_css();
	$photo = abr_login_photo_url();
	if ( $photo ) {
		$css .= ':root{--abr-login-photo:url("' . esc_url_raw( $photo ) . '")}';
	}
	wp_add_inline_style( 'abr-login', $css );
}
add_action( 'login_enqueue_scripts', 'abr_login_assets' );

/**
 * The logo links to the site, not to wordpress.org.
 *
 * @return string
 */
function abr_login_header_url() {
	return home_url( '/' );
}

/**
 * The logo itself: a chosen image, or the AR mark with the site name.
 *
 * @return string
 */
function abr_login_header_text() {
	$name = get_bloginfo( 'name', 'display' );
	$logo = abr_login_logo_url();
	if ( $logo ) {
		return '<img class="abr-login__logo-img" src="' . esc_url( $logo ) . '" alt="' . esc_attr( $name ) . '">';
	}
	$main = abr_get_option( 'logo_main' );
	$sub  = abr_get_option( 'logo_sub' );
	return abr_logo_mark()
		. '<span class="abr-login__wordmark"><span class="abr-login__main">' . esc_html( $main ? $main : $name ) . '</span>'
		. ( $sub ? '<span class="abr-login__sub">' . esc_html( $sub ) . '</span>' : '' ) . '</span>'
		. '<span class="screen-reader-text">' . esc_html( $name ) . '</span>';
}

/**
 * The browser title names the site without the WordPress suffix.
 *
 * @param string $login_title Full title.
 * @param string $title       Screen title.
 * @return string
 */
function abr_login_title( $login_title, $title ) {
	return sprintf( '%1$s &lsaquo; %2$s', $title, get_bloginfo( 'name', 'display' ) );
}

/**
 * Body class, so the layout applies only while the design is on.
 *
 * @param array $classes Classes.
 * @return array
 */
function abr_login_body_class( $classes ) {
	$classes[] = 'abr-login';
	$classes[] = 'abr-login--' . abr_login_layout();
	if ( abr_login_photo_url() ) {
		$classes[] = 'abr-login--photo';
	}
	return $classes;
}

/**
 * Login layouts.
 *
 * @return array slug => label
 */
function abr_login_layouts() {
	return array(
		'centred' => __( 'Centred card on a dark page', 'abrahamic' ),
		'split'   => __( 'Photograph beside the form', 'abrahamic' ),
	);
}

/**
 * The layout in use. The split layout needs a photograph; without one the
 * centred layout is used.
 *
 * @return string
 */
function abr_login_layout() {
	$layout = abr_get_option( 'login_layout' );
	if ( 'split' === $layout && ! abr_login_photo_url() ) {
		return 'centred';
	}
	return array_key_exists( $layout, abr_login_layouts() ) ? $layout : 'centred';
}

/**
 * The photograph panel beside the form (split layout).
 */
function abr_login_aside() {
	if ( 'split' !== abr_login_layout() ) {
		return;
	}
	$message = abr_get_option( 'login_message' );
	echo '<aside class="abr-login__aside" aria-hidden="true"><div class="abr-login__aside-inner">';
	if ( $message ) {
		echo '<p class="abr-login__message">' . esc_html( $message ) . '</p>';
	}
	echo '<p class="abr-login__site">' . esc_html( get_bloginfo( 'name', 'display' ) ) . '</p>';
	echo '</div></aside>';
}

/**
 * The line of text under the logo (centred layout), placed ahead of any
 * message WordPress shows for the current screen.
 *
 * @param string $message Screen message.
 * @return string
 */
function abr_login_tagline( $message ) {
	$line = abr_get_option( 'login_message' );
	if ( 'centred' !== abr_login_layout() || ! $line ) {
		return $message;
	}
	return '<p class="abr-login__tagline">' . esc_html( $line ) . '</p>' . $message;
}

/**
 * Attach the design filters once the login screen starts, when options and
 * translations are available.
 */
function abr_login_design_hooks() {
	if ( ! abr_login_design_on() ) {
		return;
	}
	add_filter( 'login_headerurl', 'abr_login_header_url' );
	add_filter( 'login_headertext', 'abr_login_header_text' );
	add_filter( 'login_title', 'abr_login_title', 10, 2 );
	add_filter( 'login_body_class', 'abr_login_body_class' );
	add_action( 'login_header', 'abr_login_aside' );
	add_filter( 'login_message', 'abr_login_tagline', 5 );
}
add_action( 'login_init', 'abr_login_design_hooks' );

/* -------------------------------------------------------------------------
 * Private login address (port of WPS Hide Login)
 * ---------------------------------------------------------------------- */

/**
 * Read a login setting before translations load. Theme Options defaults use
 * translated strings, and the request must be read earlier than that, so the
 * three settings needed here are read from the stored option directly.
 *
 * @param string $key login_hide, login_slug or login_redirect_slug.
 * @return mixed
 */
function abr_login_early_option( $key ) {
	$stored   = (array) get_option( 'abr_options', array() );
	$defaults = array(
		'login_hide'          => get_option( 'whl_page' ) ? 1 : 0,
		'login_slug'          => get_option( 'whl_page' ) ? sanitize_title( get_option( 'whl_page' ) ) : 'login',
		'login_redirect_slug' => get_option( 'whl_redirect_admin' ) ? sanitize_title( get_option( 'whl_redirect_admin' ) ) : '404',
	);
	return array_key_exists( $key, $stored ) ? $stored[ $key ] : $defaults[ $key ];
}

/**
 * Whether the private login address is in force.
 *
 * Add define( 'ABR_HIDE_LOGIN', false ); to wp-config.php to switch it off,
 * whatever Theme Options says, for example if the address is ever lost.
 * Left undefined (or defined as true), the Login tab decides.
 *
 * @return bool
 */
function abr_login_hide_on() {
	if ( is_multisite() || abr_login_hide_plugin_active() ) {
		return false;
	}
	if ( defined( 'ABR_HIDE_LOGIN' ) && ! ABR_HIDE_LOGIN ) {
		return false;
	}
	return (bool) abr_login_early_option( 'login_hide' ) && '' !== abr_login_early_option( 'login_slug' );
}

/**
 * Whether the permalink structure ends with a slash.
 *
 * @param string $path Path.
 * @return string
 */
function abr_login_trailing( $path ) {
	return '/' === substr( (string) get_option( 'permalink_structure' ), -1, 1 ) ? trailingslashit( $path ) : untrailingslashit( $path );
}

/**
 * The private login address.
 *
 * @param string|null $scheme URL scheme.
 * @return string
 */
function abr_login_new_url( $scheme = null ) {
	$slug = abr_login_early_option( 'login_slug' );
	if ( get_option( 'permalink_structure' ) ) {
		return abr_login_trailing( home_url( '/', $scheme ) . $slug );
	}
	return home_url( '/', $scheme ) . '?' . $slug;
}

/**
 * Where logged-out visitors to wp-admin are sent.
 *
 * @param string|null $scheme URL scheme.
 * @return string
 */
function abr_login_redirect_url( $scheme = null ) {
	$slug = abr_login_early_option( 'login_redirect_slug' );
	if ( get_option( 'permalink_structure' ) ) {
		return abr_login_trailing( home_url( '/', $scheme ) . $slug );
	}
	return home_url( '/', $scheme ) . '?' . $slug;
}

/**
 * Read the request before WordPress routes it. The theme loads after
 * plugins_loaded, where the plugin does this, but still before init and before
 * the request is parsed, so the same interception holds.
 */
function abr_login_intercept() {
	global $pagenow;
	$uri     = isset( $_SERVER['REQUEST_URI'] ) ? rawurldecode( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- compared, not output.
	$request = wp_parse_url( $uri );
	$path    = isset( $request['path'] ) ? untrailingslashit( $request['path'] ) : '';
	$slug    = abr_login_early_option( 'login_slug' );

	$GLOBALS['abr_wp_login_php'] = false;

	$blocked = ( false !== strpos( $uri, 'wp-login.php' ) || site_url( 'wp-login', 'relative' ) === $path
		|| false !== strpos( $uri, 'wp-register.php' ) || site_url( 'wp-register', 'relative' ) === $path );

	if ( $blocked && ! is_admin() ) {
		$GLOBALS['abr_wp_login_php'] = true;
		$_SERVER['REQUEST_URI']      = abr_login_trailing( '/' . str_repeat( '-/', 10 ) );
		$pagenow                     = 'index.php'; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	} elseif ( home_url( $slug, 'relative' ) === $path || ( ! get_option( 'permalink_structure' ) && isset( $_GET[ $slug ] ) && empty( $_GET[ $slug ] ) ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$_SERVER['SCRIPT_NAME'] = $slug;
		$pagenow                = 'wp-login.php'; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	}

	if ( 'customize.php' === $pagenow && ! is_user_logged_in() ) {
		wp_die( 'This has been disabled.', 403 ); // Runs before translations load.
	}
}

/**
 * Serve the login screen at the private address, and a not-found page at the
 * old ones.
 */
function abr_login_wp_loaded() {
	global $pagenow;
	$uri     = isset( $_SERVER['REQUEST_URI'] ) ? rawurldecode( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	$request = wp_parse_url( $uri );
	$path    = isset( $request['path'] ) ? $request['path'] : '';

	// Password-protected posts still post to wp-login.php.
	if ( isset( $_GET['action'] ) && 'postpass' === $_GET['action'] && isset( $_POST['post_password'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
		return;
	}

	if ( is_admin() && ! is_user_logged_in() && ! defined( 'WP_CLI' ) && ! wp_doing_ajax() && ! wp_doing_cron() && 'admin-post.php' !== $pagenow && '/wp-admin/options.php' !== $path ) {
		wp_safe_redirect( abr_login_redirect_url() );
		exit;
	}
	if ( ! is_user_logged_in() && '/wp-admin/options.php' === $path ) {
		wp_safe_redirect( abr_login_redirect_url() );
		exit;
	}

	if ( 'wp-login.php' === $pagenow && $path !== abr_login_trailing( $path ) && get_option( 'permalink_structure' ) ) {
		$query = isset( $_SERVER['QUERY_STRING'] ) ? sanitize_text_field( wp_unslash( $_SERVER['QUERY_STRING'] ) ) : '';
		wp_safe_redirect( abr_login_trailing( abr_login_new_url() ) . ( $query ? '?' . $query : '' ) );
		exit;
	}

	if ( ! empty( $GLOBALS['abr_wp_login_php'] ) ) {
		// The old address answers as a missing page.
		$pagenow = 'index.php'; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		if ( ! defined( 'WP_USE_THEMES' ) ) {
			define( 'WP_USE_THEMES', true );
		}
		wp();
		require_once ABSPATH . WPINC . '/template-loader.php';
		exit;
	}

	if ( 'wp-login.php' === $pagenow ) {
		// Variables wp-login.php expects in the global scope.
		global $error, $interim_login, $action, $user_login;
		if ( is_user_logged_in() && ! isset( $_REQUEST['action'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			wp_safe_redirect( admin_url() );
			exit;
		}
		require_once ABSPATH . 'wp-login.php';
		exit;
	}
}

/**
 * Point every generated wp-login.php address at the private one.
 *
 * @param string      $url    URL.
 * @param string|null $scheme Scheme.
 * @return string
 */
function abr_login_filter_url( $url, $scheme = null ) {
	if ( false !== strpos( $url, 'wp-login.php?action=postpass' ) ) {
		return $url;
	}
	if ( false !== strpos( $url, 'wp-login.php' ) && false === strpos( (string) wp_get_referer(), 'wp-login.php' ) ) {
		if ( is_ssl() ) {
			$scheme = 'https';
		}
		$parts = explode( '?', $url );
		if ( isset( $parts[1] ) ) {
			parse_str( $parts[1], $args );
			if ( isset( $args['login'] ) ) {
				$args['login'] = rawurlencode( $args['login'] );
			}
			return add_query_arg( $args, abr_login_new_url( $scheme ) );
		}
		return abr_login_new_url( $scheme );
	}
	return $url;
}

/**
 * The site_url filter signature.
 *
 * @param string      $url     URL.
 * @param string      $path    Path.
 * @param string|null $scheme  Scheme.
 * @return string
 */
function abr_login_site_url( $url, $path, $scheme ) {
	return abr_login_filter_url( $url, $scheme );
}

/**
 * Redirects to wp-login.php follow the private address too.
 *
 * @param string $location Location.
 * @return string
 */
function abr_login_wp_redirect( $location ) {
	return abr_login_filter_url( $location );
}

/**
 * Keep the personal-data confirmation link working.
 */
function abr_login_confirmaction() {
	// phpcs:disable WordPress.Security.NonceVerification.Recommended -- the request key is the check.
	if ( isset( $_GET['action'], $_GET['request_id'], $_GET['confirm_key'] ) && 'confirmaction' === $_GET['action'] ) {
		$request_id = (int) $_GET['request_id'];
		$key        = sanitize_text_field( wp_unslash( $_GET['confirm_key'] ) );
		if ( ! is_wp_error( wp_validate_user_request_key( $request_id, $key ) ) ) {
			wp_safe_redirect( add_query_arg( array( 'action' => 'confirmaction', 'request_id' => $request_id, 'confirm_key' => $key ), abr_login_new_url() ) );
			exit;
		}
	}
	// phpcs:enable
}

/**
 * Registration and activation screens stay closed on single sites.
 */
function abr_login_block_signup() {
	$uri = isset( $_SERVER['REQUEST_URI'] ) ? rawurldecode( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	if ( false !== strpos( $uri, 'wp-signup' ) || false !== strpos( $uri, 'wp-activate' ) ) {
		wp_die( esc_html__( 'This feature is not enabled.', 'abrahamic' ) );
	}
}

if ( abr_login_hide_on() ) {
	abr_login_intercept();
	add_action( 'wp_loaded', 'abr_login_wp_loaded' );
	add_action( 'init', 'abr_login_block_signup' );
	add_action( 'template_redirect', 'abr_login_confirmaction' );
	add_filter( 'site_url', 'abr_login_site_url', 10, 3 );
	add_filter( 'network_site_url', 'abr_login_site_url', 10, 3 );
	add_filter( 'wp_redirect', 'abr_login_wp_redirect', 10, 1 );
}

/**
 * Tell the administrator where the plugins now live.
 */
function abr_builtin_plugin_notice() {
	if ( ! current_user_can( 'activate_plugins' ) ) {
		return;
	}
	$screen = get_current_screen();
	if ( ! $screen || ! in_array( $screen->id, array( 'plugins', 'appearance_page_' . ABR_OPTIONS_SLUG ), true ) ) {
		return;
	}
	$active = array();
	if ( class_exists( 'CWS_Login_Logo_Plugin' ) ) {
		$active[] = 'Login Logo';
	}
	if ( abr_login_hide_plugin_active() ) {
		$active[] = 'WPS Hide Login';
	}
	if ( class_exists( 'Unlist_Posts' ) ) {
		$active[] = 'Unlist Posts &amp; Pages';
	}
	if ( function_exists( 'wpseosearch_base' ) ) {
		$active[] = 'Pretty Search Permalinks';
	}
	if ( ! $active ) {
		return;
	}
	printf(
		'<div class="notice notice-info"><p>%s</p></div>',
		wp_kses_post(
			sprintf(
				/* translators: %s: plugin names. */
				__( 'The Abrahamic theme now includes %s. The theme leaves each feature to its plugin while the plugin is active; once you deactivate the plugin, the theme takes over with the same settings.', 'abrahamic' ),
				implode( ', ', $active )
			)
		)
	);
}
add_action( 'admin_notices', 'abr_builtin_plugin_notice' );
