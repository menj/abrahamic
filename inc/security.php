<?php
/**
 * Security: remote-publishing lockdown, spam gate on new content, clean-up
 * tools and 410 Gone for removed spam. Settings live in abr_options (sec_*
 * keys, all on by default) and appear on the Security tab of Theme Options.
 *
 * Emergency switch: define( 'ABR_SECURITY_LOCK', false ); in wp-config.php turns
 * the XML-RPC, application password and REST locks off without touching the options.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/security-detector.php';

define( 'ABR_SEC_LOG', 'abr_security_log' );
define( 'ABR_SEC_GONE', 'abr_security_gone' );
define( 'ABR_SEC_LOG_MAX', 200 );
define( 'ABR_SEC_GONE_MAX', 5000 );

/**
 * Whether a Security toggle is on.
 *
 * @param string $key Option key.
 * @return bool
 */
function abr_sec_on( $key ) {
	$locks = array( 'sec_xmlrpc_off', 'sec_app_passwords_off', 'sec_rest_lock' );
	if ( in_array( $key, $locks, true ) && defined( 'ABR_SECURITY_LOCK' ) && ! ABR_SECURITY_LOCK ) {
		return false;
	}
	return (bool) abr_get_option( $key );
}

/* -------------------------------------------------------------------------
 * 1. Remote-publishing lockdown
 * ---------------------------------------------------------------------- */

/**
 * XML-RPC off: no methods, no pingback header, xmlrpc.php answers 403.
 */
function abr_sec_xmlrpc() {
	if ( ! abr_sec_on( 'sec_xmlrpc_off' ) ) {
		return;
	}
	add_filter( 'xmlrpc_enabled', '__return_false' );
	add_filter( 'xmlrpc_methods', '__return_empty_array', 999 );
	add_filter( 'pings_open', '__return_false', 999 );
	add_filter(
		'wp_headers',
		function ( $headers ) {
			unset( $headers['X-Pingback'], $headers['x-pingback'] );
			return $headers;
		}
	);
	remove_action( 'wp_head', 'rsd_link' );
	if ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) {
		// Counted, not logged one by one: the October 2026 attack sent over
		// 17,000 requests in twelve days from 701 addresses.
		abr_sec_count( 'xmlrpc' );
		if ( abr_sec_fake_jetpack() ) {
			abr_sec_count( 'fake-jetpack' );
		}
		status_header( 403 );
		header( 'Content-Type: text/plain; charset=utf-8' );
		echo 'XML-RPC is disabled on this site.';
		exit;
	}
}
add_action( 'after_setup_theme', 'abr_sec_xmlrpc', 1 );

/**
 * Lines that deny xmlrpc.php at the web server, for Apache 2.4 and 2.2. The
 * marker name is shared by all seven sister themes, so switching between
 * them never writes the block twice.
 *
 * @return string[]
 */
function abr_sec_htaccess_lines() {
	return array(
		'<Files xmlrpc.php>',
		'<IfModule mod_authz_core.c>',
		'Require all denied',
		'</IfModule>',
		'<IfModule !mod_authz_core.c>',
		'Order Deny,Allow',
		'Deny from all',
		'</IfModule>',
		'</Files>',
	);
}

/**
 * Path of the site's .htaccess, or '' when the server is not Apache or the
 * file cannot be written.
 *
 * @return string
 */
function abr_sec_htaccess_file() {
	if ( ! function_exists( 'get_home_path' ) ) {
		require_once ABSPATH . 'wp-admin/includes/file.php';
	}
	if ( ! function_exists( 'insert_with_markers' ) ) {
		require_once ABSPATH . 'wp-admin/includes/misc.php';
	}
	global $is_apache;
	if ( empty( $is_apache ) ) {
		return '';
	}
	$file = get_home_path() . '.htaccess';
	if ( file_exists( $file ) ? ! wp_is_writable( $file ) : ! wp_is_writable( dirname( $file ) ) ) {
		return '';
	}
	return $file;
}

/**
 * Keep the server-level block in step with the XML-RPC switch: written while
 * the switch is on, removed when it is off. Runs in the admin, at most once an
 * hour, so a lost or overwritten .htaccess is repaired without any action.
 *
 * @param bool $force Skip the hourly throttle.
 */
function abr_sec_sync_htaccess( $force = false ) {
	if ( ! $force && get_transient( 'abr_sec_htaccess_checked' ) ) {
		return;
	}
	set_transient( 'abr_sec_htaccess_checked', 1, HOUR_IN_SECONDS );
	$file = abr_sec_htaccess_file();
	if ( '' === $file ) {
		update_option( 'abr_security_htaccess', 'unavailable', false );
		return;
	}
	$want    = abr_sec_on( 'sec_xmlrpc_off' );
	$current = function_exists( 'extract_from_markers' ) ? extract_from_markers( $file, 'Block xmlrpc.php' ) : array();
	if ( $want && $current !== abr_sec_htaccess_lines() ) {
		insert_with_markers( $file, 'Block xmlrpc.php', abr_sec_htaccess_lines() );
	} elseif ( ! $want && $current ) {
		insert_with_markers( $file, 'Block xmlrpc.php', array() );
	}
	update_option( 'abr_security_htaccess', $want ? 'written' : 'off', false );
}
add_action( 'admin_init', 'abr_sec_sync_htaccess' );
add_action( 'after_switch_theme', function () { abr_sec_sync_htaccess( true ); } );
add_action( 'update_option_abr_options', function () { abr_sec_sync_htaccess( true ); } );

/**
 * Take the block out when the theme is switched to one outside the sister
 * themes. A sister theme writes the same block back on its first admin load.
 */
function abr_sec_remove_htaccess() {
	$file = abr_sec_htaccess_file();
	if ( '' !== $file ) {
		insert_with_markers( $file, 'Block xmlrpc.php', array() );
	}
	delete_transient( 'abr_sec_htaccess_checked' );
}
add_action( 'switch_theme', 'abr_sec_remove_htaccess' );

/**
 * Application passwords off.
 *
 * @param bool $available Core value.
 * @return bool
 */
function abr_sec_app_passwords( $available ) {
	return abr_sec_on( 'sec_app_passwords_off' ) ? false : $available;
}
add_filter( 'wp_is_application_passwords_available', 'abr_sec_app_passwords', 99 );

/**
 * Whether this REST request comes from a logged-in browser session with a
 * valid wp_rest nonce. Core sets $wp_rest_auth_cookie when the logged-in cookie
 * validates, and rest_cookie_check_errors() has already logged the user out
 * if the cookie came without a valid nonce.
 *
 * @param WP_REST_Request $request Request.
 * @return bool
 */
function abr_sec_cookie_session( $request ) {
	if ( true !== ( isset( $GLOBALS['wp_rest_auth_cookie'] ) ? $GLOBALS['wp_rest_auth_cookie'] : null ) ) {
		return false;
	}
	if ( ! empty( $GLOBALS['wp_rest_application_password_uuid'] ) ) {
		return false;
	}
	$nonce = $request->get_header( 'X-WP-Nonce' );
	if ( ! $nonce && isset( $_REQUEST['_wpnonce'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- the nonce is checked here.
		$nonce = sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	}
	return $nonce && false !== wp_verify_nonce( $nonce, 'wp_rest' );
}

/**
 * REST lock: a request that writes (POST, PUT, PATCH, DELETE) as a logged-in
 * user must come from a cookie session with a valid nonce. Basic auth,
 * application passwords and any other header-based login are refused for
 * writes in every namespace. Reads and anonymous requests are unchanged, so
 * public GET output, contact forms and comment forms behave as before. The
 * block editor, Rank Math and the media modal send X-WP-Nonce with cookies
 * and pass.
 *
 * @param mixed           $result  Earlier result.
 * @param WP_REST_Server  $server  Server.
 * @param WP_REST_Request $request Request.
 * @return mixed
 */
function abr_sec_rest_guard( $result, $server, $request ) {
	if ( null !== $result || ! abr_sec_on( 'sec_rest_lock' ) || ! ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return $result;
	}
	if ( in_array( strtoupper( $request->get_method() ), array( 'GET', 'HEAD', 'OPTIONS' ), true ) ) {
		return $result;
	}
	$route = (string) $request->get_route();
	/**
	 * Route prefixes that may write with non-cookie authentication, for
	 * example '/jetpack/'. Empty by default.
	 */
	foreach ( (array) apply_filters( 'abr_sec_rest_allow', array() ) as $prefix ) {
		if ( $prefix && 0 === strpos( $route, $prefix ) ) {
			return $result;
		}
	}
	$core = (bool) preg_match( '#^/(wp/v2|batch/v1)(/|$)#', $route ) && 0 !== strpos( $route, '/wp/v2/comments' );
	if ( ! is_user_logged_in() && ! $core ) {
		return $result;
	}
	if ( ! is_user_logged_in() ) {
		// Core refuses anonymous writes to these routes itself; nothing to add.
		return $result;
	}
	if ( abr_sec_cookie_session( $request ) ) {
		return $result;
	}
	abr_sec_log(
		array(
			'event' => 'rest-blocked',
			'title' => $request->get_method() . ' ' . $route,
		)
	);
	return new WP_Error( 'abr_rest_locked', __( 'Changes through the REST API need a logged-in browser session on this site.', 'abrahamic' ), array( 'status' => 403 ) );
}
add_filter( 'rest_pre_dispatch', 'abr_sec_rest_guard', 5, 3 );

/* -------------------------------------------------------------------------
 * 1b. Signals from the October 2026 attack
 *
 * The access logs showed the pattern: password guessing through xmlrpc.php
 * from 15 October, sent with forged "Jetpack by WordPress.com" user agents;
 * the first correct password on 20 October; from 22 October a post every 18
 * to 20 minutes, each one a login, a read of the site and a wp.newPost call,
 * every request from a different address. The login page itself was never
 * reached. These checks answer each step.
 * ---------------------------------------------------------------------- */

define( 'ABR_SEC_COUNTS', 'abr_security_counts' );
define( 'ABR_SEC_FAILED', 'abr_security_failed' );

/**
 * Add one to today's counter for an event. Thirty days are kept.
 *
 * @param string $key Event key.
 */
function abr_sec_count( $key ) {
	$counts = get_option( ABR_SEC_COUNTS, array() );
	$counts = is_array( $counts ) ? $counts : array();
	$day    = gmdate( 'Y-m-d' );
	if ( ! isset( $counts[ $day ] ) ) {
		$counts[ $day ] = array();
		krsort( $counts );
		$counts = array_slice( $counts, 0, 30, true );
	}
	$counts[ $day ][ $key ] = ( isset( $counts[ $day ][ $key ] ) ? (int) $counts[ $day ][ $key ] : 0 ) + 1;
	update_option( ABR_SEC_COUNTS, $counts, false );
}

/**
 * Whether the request claims to come from Jetpack or WordPress.com while the
 * Jetpack plugin is not active. Real Jetpack traffic only reaches sites that
 * run Jetpack, so on this site the claim is forged.
 *
 * @return bool
 */
function abr_sec_fake_jetpack() {
	$agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) : '';
	if ( ! preg_match( '/jetpack|wordpress\.com/i', $agent ) ) {
		return false;
	}
	return ! class_exists( 'Jetpack' ) && ! defined( 'JETPACK__VERSION' );
}

/**
 * Whether this request is a remote, non-browser call: XML-RPC, or REST with
 * an application password or other header login.
 *
 * @return bool
 */
function abr_sec_is_remote() {
	if ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) {
		return true;
	}
	if ( defined( 'REST_REQUEST' ) && REST_REQUEST && is_user_logged_in() ) {
		return true !== ( isset( $GLOBALS['wp_rest_auth_cookie'] ) ? $GLOBALS['wp_rest_auth_cookie'] : null );
	}
	return false;
}

/**
 * Password logins through XML-RPC are refused even when XML-RPC is switched
 * back on (for Jetpack, say). Jetpack signs its own requests and needs no
 * password, so it keeps working.
 *
 * @param WP_User|WP_Error|null $user Result so far.
 * @return WP_User|WP_Error|null
 */
function abr_sec_refuse_remote_password( $user ) {
	if ( ! ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) || ! abr_sec_on( 'sec_xmlrpc_off' ) && ! abr_sec_on( 'sec_rest_lock' ) ) {
		return $user;
	}
	if ( $user instanceof WP_User ) {
		abr_sec_count( 'remote-password' );
		abr_sec_log(
			array(
				'event' => 'remote-password-refused',
				'title' => $user->user_login . ': ' . __( 'the correct password was sent through XML-RPC. Change it now.', 'abrahamic' ),
				'user'  => $user->ID,
			)
		);
	}
	return new WP_Error( 'abr_remote_password', __( 'Password logins through XML-RPC are not accepted on this site.', 'abrahamic' ) );
}
add_filter( 'authenticate', 'abr_sec_refuse_remote_password', 100 );

/**
 * Count failed logins per account name over a rolling day. The attack came
 * from a different address every time, so counting by address shows nothing;
 * counting by account name shows which account is under attack.
 *
 * @param string $login Account name or email tried.
 */
function abr_sec_failed_login( $login ) {
	abr_sec_count( 'failed-login' );
	$login  = sanitize_user( (string) $login, true );
	$failed = get_option( ABR_SEC_FAILED, array() );
	$failed = is_array( $failed ) ? $failed : array();
	$now    = time();
	foreach ( $failed as $name => $row ) {
		if ( $now - (int) $row['last'] > DAY_IN_SECONDS ) {
			unset( $failed[ $name ] );
		}
	}
	if ( '' === $login ) {
		$login = '(empty)';
	}
	if ( ! isset( $failed[ $login ] ) && count( $failed ) >= 50 ) {
		return;
	}
	$row = isset( $failed[ $login ] ) ? $failed[ $login ] : array( 'n' => 0, 'first' => $now, 'last' => $now, 'ips' => array() );
	$row['n']++;
	$row['last'] = $now;
	$ip          = abr_sec_ip();
	if ( $ip && ! in_array( $ip, $row['ips'], true ) && count( $row['ips'] ) < 1000 ) {
		$row['ips'][] = $ip;
	}
	$failed[ $login ] = $row;
	update_option( ABR_SEC_FAILED, $failed, false );
}
add_action( 'wp_login_failed', 'abr_sec_failed_login' );

/**
 * Admin notice when an existing account is being guessed at: ten or more
 * failures in a day, or a correct password refused on the remote route.
 */
function abr_sec_attack_notice() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$failed = get_option( ABR_SEC_FAILED, array() );
	$hit    = array();
	foreach ( (array) $failed as $name => $row ) {
		if ( (int) $row['n'] >= 10 && ( username_exists( $name ) || email_exists( $name ) ) ) {
			$hit[] = sprintf( '%s (%d, %d)', $name, (int) $row['n'], count( (array) $row['ips'] ) );
		}
	}
	$counts = get_option( ABR_SEC_COUNTS, array() );
	$today  = isset( $counts[ gmdate( 'Y-m-d' ) ]['remote-password'] ) ? (int) $counts[ gmdate( 'Y-m-d' ) ]['remote-password'] : 0;
	if ( ! $hit && ! $today ) {
		return;
	}
	$url = abr_options_url( 'security' );
	echo '<div class="notice notice-error"><p><strong>' . esc_html__( 'Security:', 'abrahamic' ) . '</strong> ';
	if ( $today ) {
		esc_html_e( 'Someone sent a correct password through XML-RPC today. The login was refused, but the password is known: change it now.', 'abrahamic' );
		echo ' ';
	}
	if ( $hit ) {
		/* translators: %s: account names with failure and address counts. */
		echo esc_html( sprintf( __( 'Passwords are being guessed for these accounts in the last day (failures, addresses): %s.', 'abrahamic' ), implode( ', ', $hit ) ) ) . ' ';
	}
	echo '<a href="' . esc_url( $url ) . '">' . esc_html__( 'Open the Security tab', 'abrahamic' ) . '</a></p></div>';
}
add_action( 'admin_notices', 'abr_sec_attack_notice' );

/* -------------------------------------------------------------------------
 * 2. Spam gate
 * ---------------------------------------------------------------------- */

/**
 * How this request reached WordPress.
 *
 * @return string
 */
function abr_sec_request_type() {
	if ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) {
		return 'XML-RPC';
	}
	if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
		return ! empty( $GLOBALS['wp_rest_application_password_uuid'] ) ? 'REST (application password)' : 'REST';
	}
	if ( defined( 'WP_CLI' ) && WP_CLI ) {
		return 'WP-CLI';
	}
	if ( wp_doing_cron() ) {
		return 'cron';
	}
	if ( wp_doing_ajax() ) {
		return 'admin AJAX';
	}
	return is_admin() ? 'admin' : 'front end';
}

/**
 * Visitor IP address, as the web server saw it.
 *
 * @return string
 */
function abr_sec_ip() {
	$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
	return filter_var( $ip, FILTER_VALIDATE_IP ) ? $ip : '';
}

/**
 * Add a line to the capped log.
 *
 * @param array $entry Fields: event, title, post_id, reasons.
 */
function abr_sec_log( $entry ) {
	$log   = get_option( ABR_SEC_LOG, array() );
	$log   = is_array( $log ) ? $log : array();
	$log[] = array_merge(
		array(
			'time'    => time(),
			'event'   => '',
			'title'   => '',
			'post_id' => 0,
			'reasons' => array(),
			'user'    => get_current_user_id(),
			'type'    => abr_sec_request_type(),
			'ip'      => abr_sec_ip(),
		),
		$entry
	);
	update_option( ABR_SEC_LOG, array_slice( $log, -ABR_SEC_LOG_MAX ), false );
}

/**
 * Whether a post is starter content: it carries the seed key, or its title
 * and slug are those of an item in inc/seed/content.json.
 *
 * @param int    $post_id Post ID, 0 for a new post.
 * @param string $title   Title.
 * @param string $slug    Slug.
 * @return bool
 */
function abr_sec_is_seeded( $post_id, $title = '', $slug = '' ) {
	if ( $post_id && '' !== (string) get_post_meta( $post_id, '_abr_seed', true ) ) {
		return true;
	}
	static $index = null;
	if ( null === $index ) {
		$index = array();
		$data  = function_exists( 'abr_seed_data' ) ? abr_seed_data() : array();
		if ( ! empty( $data['items'] ) ) {
			foreach ( $data['items'] as $item ) {
				$index[ $item['title'] . '|' . $item['slug'] ] = true;
			}
		}
	}
	return isset( $index[ $title . '|' . $slug ] );
}

/**
 * Post types the gate and the scan look at. Menus, attachments, templates and
 * blocks are never touched.
 *
 * @return string[]
 */
function abr_sec_types() {
	return array( 'post', 'page' );
}

/**
 * Hold suspected spam: any post going public whose title, slug or content
 * scores as gambling spam is saved as Pending instead.
 *
 * @param array $data    Sanitised post data.
 * @param array $postarr Raw post data.
 * @return array
 */
function abr_sec_gate( $data, $postarr ) {
	if ( ! abr_sec_on( 'sec_spam_gate' ) || ! in_array( $data['post_type'], abr_sec_types(), true ) ) {
		return $data;
	}
	$public = in_array( $data['post_status'], array( 'publish', 'future', 'private' ), true );
	$id     = isset( $postarr['ID'] ) ? (int) $postarr['ID'] : 0;
	$title  = wp_unslash( $data['post_title'] );
	$slug   = $data['post_name'];
	if ( abr_sec_is_seeded( $id, $title, $slug ) ) {
		return $data;
	}
	$verdict = abr_spam_score( $title, $slug, wp_unslash( $data['post_content'] ) );
	if ( ! $verdict['spam'] && $public && abr_sec_is_remote() ) {
		// The spam arrived through wp.newPost: anything published from
		// outside the editor waits for review, whatever it says.
		$verdict = array( 'spam' => true, 'reasons' => array( __( 'published from outside the editor', 'abrahamic' ) . ' (' . abr_sec_request_type() . ')' ) );
	}
	if ( ! $verdict['spam'] ) {
		return $data;
	}
	if ( $public ) {
		$data['post_status'] = 'pending';
	}
	$GLOBALS['abr_sec_held'] = array(
		'event'   => $public ? 'held' : 'flagged-draft',
		'title'   => $title,
		'reasons' => $verdict['reasons'],
	);
	return $data;
}
add_filter( 'wp_insert_post_data', 'abr_sec_gate', 99, 2 );

/**
 * Log what the gate held, now that the post has an ID.
 *
 * @param int $post_id Post ID.
 */
function abr_sec_gate_log( $post_id ) {
	if ( empty( $GLOBALS['abr_sec_held'] ) ) {
		return;
	}
	$entry                   = $GLOBALS['abr_sec_held'];
	$GLOBALS['abr_sec_held'] = null;
	$entry['post_id']        = (int) $post_id;
	update_post_meta( $post_id, '_abr_spam_held', time() );
	abr_sec_log( $entry );
}
add_action( 'wp_insert_post', 'abr_sec_gate_log', 1 );

/**
 * Keep held posts away from search engines while they wait: Rank Math and the
 * core sitemap only list published items, and a held post is never published,
 * so Instant Indexing has nothing to submit.
 */

/* -------------------------------------------------------------------------
 * 3. 410 Gone for removed spam
 * ---------------------------------------------------------------------- */

/**
 * Path of a URL, without slashes at either end.
 *
 * @param string $url URL.
 * @return string
 */
function abr_sec_path( $url ) {
	$path = (string) wp_parse_url( $url, PHP_URL_PATH );
	return trim( strtolower( rawurldecode( $path ) ), '/' );
}

/**
 * Remember the address of a post moved to the trash as spam.
 *
 * @param WP_Post $post Post.
 */
function abr_sec_remember_gone( $post ) {
	$gone = get_option( ABR_SEC_GONE, array() );
	$gone = is_array( $gone ) ? $gone : array();
	foreach ( array( get_permalink( $post ), home_url( '/?p=' . $post->ID ) ) as $url ) {
		$path = abr_sec_path( $url );
		if ( '' !== $path ) {
			$gone[ $path ] = (int) $post->ID;
		}
	}
	if ( $post->post_name ) {
		$gone[ strtolower( rawurldecode( $post->post_name ) ) ] = (int) $post->ID;
	}
	update_option( ABR_SEC_GONE, array_slice( $gone, -ABR_SEC_GONE_MAX, null, true ), false );
}

/**
 * Answer 410 Gone, in place of 404, on the address of removed spam. A post
 * restored from the trash and published again is served as normal, since the
 * request is then no longer a 404.
 */
function abr_sec_send_gone() {
	if ( ! is_404() || ! abr_sec_on( 'sec_gone' ) ) {
		return;
	}
	$gone = get_option( ABR_SEC_GONE, array() );
	if ( ! $gone || ! is_array( $gone ) ) {
		return;
	}
	$uri  = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
	$path = abr_sec_path( $uri );
	$last = basename( $path );
	if ( isset( $gone[ $path ] ) || ( '' !== $last && isset( $gone[ $last ] ) && false === strpos( $path, '/' ) ) ) {
		status_header( 410 );
		nocache_headers();
		header( 'X-Robots-Tag: noindex', true );
	}
}
add_action( 'template_redirect', 'abr_sec_send_gone', 0 );

/* -------------------------------------------------------------------------
 * 4. Login record for the report
 * ---------------------------------------------------------------------- */

/**
 * Last login time and IP, kept from this version on.
 *
 * @param string  $login Login name.
 * @param WP_User $user  User.
 */
function abr_sec_record_login( $login, $user ) {
	update_user_meta( $user->ID, '_abr_last_login', array( 'time' => time(), 'ip' => abr_sec_ip() ) );
}
add_action( 'wp_login', 'abr_sec_record_login', 10, 2 );

/* -------------------------------------------------------------------------
 * 5. Admin actions
 * ---------------------------------------------------------------------- */

/**
 * Stop unless the user may manage options and the nonce is valid.
 *
 * @param string $action Nonce action.
 */
function abr_sec_check( $action ) {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to do that.', 'abrahamic' ), 403 );
	}
	check_admin_referer( $action );
}

/**
 * Back to the Security tab with a notice.
 *
 * @param string $notice Notice code.
 * @param int    $count  Count.
 */
function abr_sec_back( $notice, $count = 0 ) {
	wp_safe_redirect( abr_options_url( 'security', array( 'abr-sec' => $notice, 'abr-count' => (int) $count ) ) );
	exit;
}

/**
 * Revoke every application password of every user.
 */
function abr_sec_handle_revoke() {
	abr_sec_check( 'abr_sec_revoke' );
	$count = 0;
	if ( class_exists( 'WP_Application_Passwords' ) ) {
		foreach ( get_users( array( 'fields' => 'ID' ) ) as $user_id ) {
			$deleted = WP_Application_Passwords::delete_all_application_passwords( (int) $user_id );
			if ( ! is_wp_error( $deleted ) ) {
				$count += (int) $deleted;
			}
		}
	}
	abr_sec_log( array( 'event' => 'app-passwords-revoked', 'title' => (string) $count ) );
	abr_sec_back( 'revoked', $count );
}
add_action( 'admin_post_abr_sec_revoke', 'abr_sec_handle_revoke' );

/**
 * End every login session of every user, this one included.
 */
function abr_sec_handle_logout() {
	abr_sec_check( 'abr_sec_logout' );
	abr_sec_log( array( 'event' => 'sessions-ended', 'title' => '' ) );
	foreach ( get_users( array( 'fields' => 'ID' ) ) as $user_id ) {
		WP_Session_Tokens::get_instance( (int) $user_id )->destroy_all();
	}
	wp_clear_auth_cookie();
	wp_safe_redirect( wp_login_url( abr_options_url( 'security' ) ) );
	exit;
}
add_action( 'admin_post_abr_sec_logout', 'abr_sec_handle_logout' );

/**
 * Category slugs the theme seeds.
 *
 * @return string[]
 */
function abr_sec_seeded_terms() {
	$data  = function_exists( 'abr_seed_data' ) ? abr_seed_data() : array();
	$slugs = array();
	if ( ! empty( $data['terms'] ) ) {
		foreach ( $data['terms'] as $term ) {
			$slugs[] = $term['slug'];
		}
	}
	return $slugs;
}

/**
 * Categories spam created: a spam-scoring name or one of the names seen in the
 * incident, never a seeded or default category, and only when nothing but
 * trashed posts uses it.
 *
 * @return WP_Term[]
 */
function abr_sec_spam_categories() {
	$known   = array( 'casino', 'casinos', 'review', 'reviews', 'betting', 'gambling', 'bonus', 'slots', 'sportsbook', 'kasyno', 'kazino' );
	$seeded  = abr_sec_seeded_terms();
	$default = (int) get_option( 'default_category' );
	$out     = array();
	foreach ( get_terms( array( 'taxonomy' => 'category', 'hide_empty' => false ) ) as $term ) {
		if ( (int) $term->term_id === $default || in_array( $term->slug, $seeded, true ) || 'uncategorized' === $term->slug ) {
			continue;
		}
		$verdict = abr_spam_score( $term->name, $term->slug, '' );
		if ( ! in_array( $term->slug, $known, true ) && ! $verdict['spam'] ) {
			continue;
		}
		$used = get_posts(
			array(
				'post_type'      => 'any',
				'post_status'    => array( 'publish', 'pending', 'draft', 'future', 'private' ),
				'category'       => $term->term_id,
				'posts_per_page' => 1,
				'fields'         => 'ids',
				'no_found_rows'  => true,
			)
		);
		$term->abr_in_use = ! empty( $used );
		$out[]            = $term;
	}
	return $out;
}

/**
 * Delete spam categories that are empty.
 */
function abr_sec_handle_delete_categories() {
	abr_sec_check( 'abr_sec_categories' );
	$count = 0;
	foreach ( abr_sec_spam_categories() as $term ) {
		if ( ! $term->abr_in_use && ! is_wp_error( wp_delete_term( $term->term_id, 'category' ) ) ) {
			++$count;
		}
	}
	abr_sec_log( array( 'event' => 'categories-deleted', 'title' => (string) $count ) );
	abr_sec_back( 'categories', $count );
}
add_action( 'admin_post_abr_sec_categories', 'abr_sec_handle_delete_categories' );

/**
 * Clear the gate log.
 */
function abr_sec_handle_clear_log() {
	abr_sec_check( 'abr_sec_clear_log' );
	delete_option( ABR_SEC_LOG );
	abr_sec_back( 'log-cleared' );
}
add_action( 'admin_post_abr_sec_clear_log', 'abr_sec_handle_clear_log' );

/**
 * AJAX: one batch of the scan.
 */
function abr_sec_ajax_scan() {
	check_ajax_referer( 'abr_sec_ajax', 'nonce' );
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_send_json_error( array( 'message' => __( 'You do not have permission to do that.', 'abrahamic' ) ), 403 );
	}
	$offset = isset( $_POST['offset'] ) ? absint( $_POST['offset'] ) : 0;
	$batch  = 100;
	$query  = new WP_Query(
		array(
			'post_type'              => abr_sec_types(),
			'post_status'            => array( 'publish', 'pending', 'draft', 'future', 'private' ),
			'posts_per_page'         => $batch,
			'offset'                 => $offset,
			'orderby'                => 'ID',
			'order'                  => 'DESC',
			'no_found_rows'          => false,
			'update_post_term_cache' => false,
			'suppress_filters'       => true,
		)
	);
	$rows = array();
	foreach ( $query->posts as $post ) {
		if ( abr_sec_is_seeded( $post->ID, $post->post_title, $post->post_name ) ) {
			continue;
		}
		$verdict = abr_spam_score( $post->post_title, $post->post_name, $post->post_content );
		if ( ! $verdict['spam'] ) {
			continue;
		}
		$author = get_userdata( (int) $post->post_author );
		$rows[] = array(
			'id'      => (int) $post->ID,
			'title'   => '' !== $post->post_title ? wp_strip_all_tags( $post->post_title ) : __( '(no title)', 'abrahamic' ),
			'date'    => get_the_date( 'Y-m-d H:i', $post ),
			'status'  => $post->post_status,
			'author'  => $author ? $author->user_login : '',
			'reasons' => $verdict['reasons'],
			'edit'    => (string) get_edit_post_link( $post->ID, 'raw' ),
			'view'    => 'publish' === $post->post_status ? (string) get_permalink( $post ) : '',
		);
	}
	$next = $offset + count( $query->posts );
	wp_send_json_success(
		array(
			'rows'  => $rows,
			'next'  => $next,
			'total' => (int) $query->found_posts,
			'done'  => count( $query->posts ) < $batch,
		)
	);
}
add_action( 'wp_ajax_abr_sec_scan', 'abr_sec_ajax_scan' );

/**
 * AJAX: move a batch of posts to the trash. Each one is scored again here, so
 * only posts that still read as spam and are not starter content go.
 */
function abr_sec_ajax_trash() {
	check_ajax_referer( 'abr_sec_ajax', 'nonce' );
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_send_json_error( array( 'message' => __( 'You do not have permission to do that.', 'abrahamic' ) ), 403 );
	}
	$ids     = isset( $_POST['ids'] ) ? array_slice( array_map( 'absint', (array) wp_unslash( $_POST['ids'] ) ), 0, 100 ) : array(); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- absint on each.
	$trashed = array();
	$skipped = array();
	foreach ( array_filter( $ids ) as $id ) {
		$post = get_post( $id );
		if ( ! $post || ! in_array( $post->post_type, abr_sec_types(), true ) || 'trash' === $post->post_status || ! current_user_can( 'delete_post', $id ) || abr_sec_is_seeded( $id, $post->post_title, $post->post_name ) ) {
			$skipped[] = $id;
			continue;
		}
		$verdict = abr_spam_score( $post->post_title, $post->post_name, $post->post_content );
		if ( ! $verdict['spam'] ) {
			$skipped[] = $id;
			continue;
		}
		if ( 'publish' === $post->post_status ) {
			abr_sec_remember_gone( $post );
		}
		if ( wp_trash_post( $id ) ) {
			$trashed[] = $id;
		} else {
			$skipped[] = $id;
		}
	}
	if ( $trashed ) {
		abr_sec_log( array( 'event' => 'trashed', 'title' => (string) count( $trashed ) ) );
	}
	wp_send_json_success( array( 'trashed' => $trashed, 'skipped' => $skipped ) );
}
add_action( 'wp_ajax_abr_sec_trash', 'abr_sec_ajax_trash' );

/* -------------------------------------------------------------------------
 * 6. Screen
 * ---------------------------------------------------------------------- */

/**
 * Assets for the Security tab.
 *
 * @param string $hook Screen hook.
 */
function abr_sec_assets( $hook ) {
	if ( 'appearance_page_' . ABR_OPTIONS_SLUG !== $hook || ! current_user_can( 'manage_options' ) ) {
		return;
	}
	wp_enqueue_style( 'abr-security', ABR_URI . '/assets/css/security.css', array( 'abr-admin' ), ABR_VERSION );
	wp_enqueue_script( 'abr-security', ABR_URI . '/assets/js/security.js', array(), ABR_VERSION, true );
	wp_localize_script(
		'abr-security',
		'abrSecurity',
		array(
			'ajax'    => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'abr_sec_ajax' ),
			'i18n'    => array(
				'scanning'     => __( 'Scanning: %1$d of %2$d checked, %3$d found.', 'abrahamic' ),
				'done'         => __( 'Scan finished: %1$d checked, %2$d found.', 'abrahamic' ),
				'none'         => __( 'No suspected spam found.', 'abrahamic' ),
				'trashing'     => __( 'Moving to the trash: %1$d of %2$d.', 'abrahamic' ),
				'trashed'      => __( '%1$d moved to the trash, %2$d skipped. Posts > Trash can restore them.', 'abrahamic' ),
				'confirmTrash' => __( 'Move the selected posts to the trash? They can be restored from Posts > Trash.', 'abrahamic' ),
				'error'        => __( 'The request failed. Reload the page and try again.', 'abrahamic' ),
				'edit'         => __( 'Edit', 'abrahamic' ),
				'view'         => __( 'View', 'abrahamic' ),
				'select'       => __( 'Select', 'abrahamic' ),
			),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'abr_sec_assets', 20 );

/**
 * Notices after Security actions.
 */
function abr_sec_notice() {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- display only.
	$code = isset( $_GET['abr-sec'] ) ? sanitize_key( wp_unslash( $_GET['abr-sec'] ) ) : '';
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- display only.
	$n    = isset( $_GET['abr-count'] ) ? absint( $_GET['abr-count'] ) : 0;
	$map  = array(
		/* translators: %d: number of application passwords. */
		'revoked'     => sprintf( __( 'Application passwords revoked: %d.', 'abrahamic' ), $n ),
		/* translators: %d: number of categories. */
		'categories'  => sprintf( __( 'Empty spam categories deleted: %d.', 'abrahamic' ), $n ),
		'log-cleared' => __( 'Security log cleared.', 'abrahamic' ),
	);
	if ( isset( $map[ $code ] ) ) {
		printf( '<div class="notice notice-success is-dismissible"><p>%s</p></div>', esc_html( $map[ $code ] ) );
	}
}

/**
 * Toggles, shown inside the Theme Options form.
 */
function abr_sec_render_settings() {
	?>
	<h2><?php esc_html_e( 'Remote publishing', 'abrahamic' ); ?></h2>
	<p class="abr-help"><?php esc_html_e( 'Spam tools publish from outside the site with a stored password. These switches close the doors they use. Writing in the editor is not affected.', 'abrahamic' ); ?></p>
	<?php
	abr_field( 'sec_xmlrpc_off', __( 'Turn off XML-RPC', 'abrahamic' ), 'checkbox', __( 'xmlrpc.php answers 403 and the pingback header goes. On Apache the theme also blocks it in .htaccess, and removes that block when this is switched off. The Jetpack plugin and old mobile apps need XML-RPC.', 'abrahamic' ) );
	$state = get_option( 'abr_security_htaccess', '' );
	if ( 'written' === $state ) {
		echo '<p class="abr-help">' . esc_html__( 'The web server also refuses xmlrpc.php: the theme keeps a "Block xmlrpc.php" section in .htaccess and repairs it if it goes missing.', 'abrahamic' ) . '</p>';
	} elseif ( 'unavailable' === $state ) {
		echo '<p class="abr-help abr-help--key">' . esc_html__( 'The theme could not write .htaccess (the server is not Apache, or the file is read-only). WordPress still refuses xmlrpc.php; ask the host to deny it at the server as well.', 'abrahamic' ) . '</p>';
	}
	abr_field( 'sec_app_passwords_off', __( 'Turn off application passwords', 'abrahamic' ), 'checkbox', __( 'Stored application passwords stop working at once. Revoke them as well, below, so they cannot return if this is switched off.', 'abrahamic' ) );
	abr_field( 'sec_rest_lock', __( 'Allow REST API changes only from a logged-in browser', 'abrahamic' ), 'checkbox', __( 'Any request that creates, changes or deletes content while logged in must come from a browser session on this site. Basic authentication and passwords sent in a header are refused. Reading through the API is unchanged.', 'abrahamic' ) );
	?>
	<h2><?php esc_html_e( 'New content', 'abrahamic' ); ?></h2>
	<?php
	abr_field( 'sec_spam_gate', __( 'Hold suspected gambling spam as Pending', 'abrahamic' ), 'checkbox', __( 'A post or page whose title, address or text reads as casino or betting spam is saved as Pending, never published, and logged below. Starter content is exempt.', 'abrahamic' ) );
	abr_field( 'sec_gone', __( 'Answer 410 Gone on the address of removed spam', 'abrahamic' ), 'checkbox', __( 'Search engines drop a 410 address faster than a 404 one. Only addresses of spam moved to the trash from this tab are affected.', 'abrahamic' ) );
	if ( defined( 'ABR_SECURITY_LOCK' ) && ! ABR_SECURITY_LOCK ) {
		echo '<p class="abr-help abr-help--key">' . esc_html__( 'ABR_SECURITY_LOCK is false in wp-config.php, so the three remote-publishing switches are off whatever they show.', 'abrahamic' ) . '</p>';
	}
}

/**
 * Small action form posting to admin-post.php.
 *
 * @param string $action  Action and nonce name.
 * @param string $label   Button label.
 * @param string $confirm Confirmation text.
 * @param string $class   Button class.
 */
function abr_sec_button( $action, $label, $confirm, $class = 'secondary' ) {
	?>
	<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="abr-tools-form" data-abr-confirm="<?php echo esc_attr( $confirm ); ?>">
		<input type="hidden" name="action" value="<?php echo esc_attr( $action ); ?>">
		<?php wp_nonce_field( $action ); ?>
		<?php submit_button( $label, $class, 'submit', false ); ?>
	</form>
	<?php
}

/**
 * Administrators with last login and application passwords.
 *
 * @return array
 */
function abr_sec_admin_rows() {
	$rows = array();
	foreach ( get_users( array( 'role' => 'administrator' ) ) as $user ) {
		$last     = get_user_meta( $user->ID, '_abr_last_login', true );
		$sessions = get_user_meta( $user->ID, 'session_tokens', true );
		$time     = is_array( $last ) && ! empty( $last['time'] ) ? (int) $last['time'] : 0;
		$ip       = is_array( $last ) && ! empty( $last['ip'] ) ? $last['ip'] : '';
		if ( is_array( $sessions ) ) {
			foreach ( $sessions as $session ) {
				if ( ! empty( $session['login'] ) && (int) $session['login'] > $time ) {
					$time = (int) $session['login'];
					$ip   = isset( $session['ip'] ) ? $session['ip'] : $ip;
				}
			}
		}
		$apps = class_exists( 'WP_Application_Passwords' ) ? WP_Application_Passwords::get_user_application_passwords( $user->ID ) : array();
		$used = 0;
		foreach ( $apps as $app ) {
			$used = max( $used, (int) $app['last_used'] );
		}
		$rows[] = array(
			'user'     => $user,
			'login'    => $time,
			'ip'       => $ip,
			'sessions' => is_array( $sessions ) ? count( $sessions ) : 0,
			'apps'     => $apps,
			'app_used' => $used,
		);
	}
	return $rows;
}

/**
 * Posts per day and author over the last 30 days, and hours with bursts.
 *
 * @return array { days: array date => array login => count, bursts: array }
 */
function abr_sec_activity() {
	global $wpdb;
	$since = gmdate( 'Y-m-d H:i:s', time() - 30 * DAY_IN_SECONDS );
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery -- report query, read only.
	$rows = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT post_author, DATE(post_date) AS d, HOUR(post_date) AS h, COUNT(*) AS n FROM {$wpdb->posts} WHERE post_type = 'post' AND post_status NOT IN ('auto-draft','inherit') AND post_date_gmt >= %s GROUP BY post_author, d, h",
			$since
		)
	);
	$days   = array();
	$bursts = array();
	foreach ( (array) $rows as $row ) {
		$user  = get_userdata( (int) $row->post_author );
		$login = $user ? $user->user_login : '#' . (int) $row->post_author;
		$days[ $row->d ][ $login ] = ( isset( $days[ $row->d ][ $login ] ) ? $days[ $row->d ][ $login ] : 0 ) + (int) $row->n;
		if ( (int) $row->n > 2 ) {
			$bursts[] = array( 'login' => $login, 'when' => sprintf( '%s %02d:00', $row->d, (int) $row->h ), 'n' => (int) $row->n );
		}
	}
	krsort( $days );
	return array( 'days' => $days, 'bursts' => $bursts );
}

/**
 * Starter items whose content now carries gambling links.
 *
 * @return WP_Post[]
 */
function abr_sec_tainted_seeds() {
	$out   = array();
	$posts = get_posts(
		array(
			'post_type'      => array( 'post', 'page' ),
			'post_status'    => 'any',
			'posts_per_page' => 500,
			'meta_key'       => '_abr_seed', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_query_meta_key
			'no_found_rows'  => true,
		)
	);
	foreach ( $posts as $post ) {
		$hosts = abr_spam_links( $post->post_content );
		if ( $hosts ) {
			$post->abr_hosts = $hosts;
			$out[]           = $post;
		}
	}
	return $out;
}

/**
 * Whether Rank Math Instant Indexing is on.
 *
 * @return bool
 */
function abr_sec_instant_indexing() {
	return class_exists( '\RankMath\Helper' ) && method_exists( '\RankMath\Helper', 'is_module_active' ) && \RankMath\Helper::is_module_active( 'instant-indexing' );
}

/**
 * Tools and reports, shown under the form while the Security tab is open.
 */
function abr_sec_render_tools() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$format = get_option( 'date_format' ) . ' ' . get_option( 'time_format' );
	$admins = abr_sec_admin_rows();
	$total  = 0;
	foreach ( $admins as $a ) {
		$total += count( $a['apps'] );
	}
	?>
	<section class="abr-card abr-sec" id="abr-security-tools" data-extra-for="security" hidden>
		<?php abr_sec_notice(); ?>

		<h2><?php esc_html_e( 'Clean up spam', 'abrahamic' ); ?></h2>
		<p class="abr-help"><?php esc_html_e( 'The scan reads every post and page that is published, pending, scheduled, private or a draft, 100 at a time, and lists those that read as gambling spam. Starter content is never listed. Nothing changes until you move posts to the trash, and the trash can restore them.', 'abrahamic' ); ?></p>
		<div class="abr-sec-bar">
			<button type="button" class="button button-primary" id="abr-sec-scan"><?php esc_html_e( 'Scan for spam', 'abrahamic' ); ?></button>
			<button type="button" class="button" id="abr-sec-trash" disabled><?php esc_html_e( 'Move selected to Trash', 'abrahamic' ); ?></button>
			<span class="abr-sec-status" id="abr-sec-status" role="status" aria-live="polite"></span>
		</div>
		<div class="abr-sec-progress" hidden><span id="abr-sec-progress"></span></div>
		<div class="abr-sec-scroll">
			<table class="widefat striped abr-sec-table" id="abr-sec-results" hidden>
				<thead>
					<tr>
						<td class="check-column"><input type="checkbox" id="abr-sec-all" aria-label="<?php esc_attr_e( 'Select all', 'abrahamic' ); ?>"></td>
						<th scope="col"><?php esc_html_e( 'Title', 'abrahamic' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Date', 'abrahamic' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Status', 'abrahamic' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Author', 'abrahamic' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Reasons', 'abrahamic' ); ?></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<p class="abr-help">
			<?php
			esc_html_e( 'A trashed post answers 404, or 410 Gone when that switch is on. Resubmit the sitemap in Google Search Console afterwards.', 'abrahamic' );
			echo ' ';
			echo abr_sec_instant_indexing()
				? esc_html__( 'Rank Math Instant Indexing is on. Held spam is never published, so it is never submitted.', 'abrahamic' )
				: esc_html__( 'Rank Math Instant Indexing is off.', 'abrahamic' );
			?>
		</p>

		<h2><?php esc_html_e( 'Spam categories', 'abrahamic' ); ?></h2>
		<?php $cats = abr_sec_spam_categories(); ?>
		<?php if ( $cats ) : ?>
			<ul class="abr-sec-list">
				<?php foreach ( $cats as $term ) : ?>
					<li>
						<?php
						echo esc_html( $term->name . ' (' . $term->slug . ')' );
						echo ' ';
						echo $term->abr_in_use ? esc_html__( 'still used by posts outside the trash, kept', 'abrahamic' ) : esc_html__( 'empty, can be deleted', 'abrahamic' );
						?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php abr_sec_button( 'abr_sec_categories', __( 'Delete empty spam categories', 'abrahamic' ), __( 'Delete the empty spam categories listed? Categories the theme seeds are never deleted.', 'abrahamic' ) ); ?>
		<?php else : ?>
			<p class="abr-help"><?php esc_html_e( 'No spam categories found.', 'abrahamic' ); ?></p>
		<?php endif; ?>

		<h2><?php esc_html_e( 'Passwords and sessions', 'abrahamic' ); ?></h2>
		<p class="abr-help">
			<?php
			/* translators: %d: number of application passwords. */
			echo esc_html( sprintf( __( 'Application passwords stored on administrator accounts: %d.', 'abrahamic' ), $total ) );
			?>
		</p>
		<div class="abr-sec-bar">
			<?php
			abr_sec_button( 'abr_sec_revoke', __( 'Revoke all application passwords', 'abrahamic' ), __( 'Revoke every application password of every user? Tools that use them stop working.', 'abrahamic' ), 'delete' );
			abr_sec_button( 'abr_sec_logout', __( 'Log out all sessions', 'abrahamic' ), __( 'End every login session of every user, yours included? You will need to log in again.', 'abrahamic' ), 'delete' );
			?>
		</div>

		<h3><?php esc_html_e( 'Administrator accounts', 'abrahamic' ); ?></h3>
		<div class="abr-sec-scroll">
			<table class="widefat striped abr-sec-table">
				<thead><tr><th scope="col"><?php esc_html_e( 'Account', 'abrahamic' ); ?></th><th scope="col"><?php esc_html_e( 'Last login', 'abrahamic' ); ?></th><th scope="col"><?php esc_html_e( 'Sessions', 'abrahamic' ); ?></th><th scope="col"><?php esc_html_e( 'Application passwords', 'abrahamic' ); ?></th></tr></thead>
				<tbody>
					<?php foreach ( $admins as $a ) : ?>
						<tr>
							<td><a href="<?php echo esc_url( get_edit_user_link( $a['user']->ID ) ); ?>"><?php echo esc_html( $a['user']->user_login ); ?></a><br><span class="abr-help"><?php echo esc_html( $a['user']->user_email ); ?></span></td>
							<td><?php echo $a['login'] ? esc_html( wp_date( $format, $a['login'] ) . ( $a['ip'] ? ' (' . $a['ip'] . ')' : '' ) ) : esc_html__( 'Not recorded', 'abrahamic' ); ?></td>
							<td><?php echo esc_html( (string) $a['sessions'] ); ?></td>
							<td>
								<?php
								echo esc_html( (string) count( $a['apps'] ) );
								foreach ( $a['apps'] as $app ) {
									echo '<br><span class="abr-help">' . esc_html( $app['name'] . ': ' . ( $app['last_used'] ? wp_date( $format, (int) $app['last_used'] ) . ( $app['last_ip'] ? ' (' . $app['last_ip'] . ')' : '' ) : __( 'never used', 'abrahamic' ) ) ) . '</span>';
								}
								?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<h2><?php esc_html_e( 'Attacks seen', 'abrahamic' ); ?></h2>
		<?php
		$counts = get_option( ABR_SEC_COUNTS, array() );
		$counts = is_array( $counts ) ? $counts : array();
		krsort( $counts );
		$labels = array(
			'xmlrpc'          => __( 'XML-RPC requests refused', 'abrahamic' ),
			'fake-jetpack'    => __( 'of them posing as Jetpack', 'abrahamic' ),
			'remote-password' => __( 'correct passwords refused on XML-RPC', 'abrahamic' ),
			'failed-login'    => __( 'failed logins', 'abrahamic' ),
		);
		?>
		<p class="abr-help"><?php esc_html_e( 'Counted per day, in UTC, for the last 30 days. A correct password refused on XML-RPC means the password is known to someone else: change it.', 'abrahamic' ); ?></p>
		<?php if ( $counts ) : ?>
			<div class="abr-sec-scroll">
				<table class="widefat striped abr-sec-table">
					<thead><tr><th scope="col"><?php esc_html_e( 'Day', 'abrahamic' ); ?></th><?php foreach ( $labels as $label ) : ?><th scope="col"><?php echo esc_html( $label ); ?></th><?php endforeach; ?></tr></thead>
					<tbody>
						<?php foreach ( $counts as $day => $row ) : ?>
							<tr><td><?php echo esc_html( $day ); ?></td><?php foreach ( array_keys( $labels ) as $key ) : ?><td><?php echo esc_html( (string) ( isset( $row[ $key ] ) ? (int) $row[ $key ] : 0 ) ); ?></td><?php endforeach; ?></tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php else : ?>
			<p class="abr-help"><?php esc_html_e( 'Nothing counted yet.', 'abrahamic' ); ?></p>
		<?php endif; ?>
		<h3><?php esc_html_e( 'Accounts being guessed, last 24 hours', 'abrahamic' ); ?></h3>
		<p class="abr-help"><?php esc_html_e( 'Attackers change address on every try, so failures are counted by account name. An account of yours in this list should get a new, long password, and ideally a new name that is not the site name.', 'abrahamic' ); ?></p>
		<?php
		$failed = get_option( ABR_SEC_FAILED, array() );
		$failed = is_array( $failed ) ? $failed : array();
		uasort(
			$failed,
			function ( $x, $y ) {
				return (int) $y['n'] - (int) $x['n'];
			}
		);
		?>
		<?php if ( $failed ) : ?>
			<ul class="abr-sec-list">
				<?php foreach ( array_slice( $failed, 0, 20, true ) as $name => $row ) : ?>
					<li>
						<?php
						$real = username_exists( $name ) || email_exists( $name );
						/* translators: 1: account name, 2: failures, 3: addresses, 4: whether the account exists. */
						echo esc_html( sprintf( __( '%1$s: %2$d failures from %3$d addresses%4$s', 'abrahamic' ), $name, (int) $row['n'], count( (array) $row['ips'] ), $real ? __( ', a real account on this site', 'abrahamic' ) : '' ) );
						?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php else : ?>
			<p class="abr-help"><?php esc_html_e( 'None.', 'abrahamic' ); ?></p>
		<?php endif; ?>

		<h2><?php esc_html_e( 'Activity', 'abrahamic' ); ?></h2>
		<?php $activity = abr_sec_activity(); ?>
		<h3><?php esc_html_e( 'Posts per day, last 30 days', 'abrahamic' ); ?></h3>
		<?php if ( $activity['days'] ) : ?>
			<div class="abr-sec-scroll">
				<table class="widefat striped abr-sec-table abr-sec-days">
					<thead><tr><th scope="col"><?php esc_html_e( 'Day', 'abrahamic' ); ?></th><th scope="col"><?php esc_html_e( 'Account and count', 'abrahamic' ); ?></th></tr></thead>
					<tbody>
						<?php foreach ( $activity['days'] as $day => $counts ) : ?>
							<tr>
								<td><?php echo esc_html( $day ); ?></td>
								<td>
									<?php
									$parts = array();
									foreach ( $counts as $login => $n ) {
										$parts[] = $login . ': ' . $n;
									}
									echo esc_html( implode( ', ', $parts ) );
									?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php else : ?>
			<p class="abr-help"><?php esc_html_e( 'No posts in the last 30 days.', 'abrahamic' ); ?></p>
		<?php endif; ?>
		<h3><?php esc_html_e( 'Burst publishing', 'abrahamic' ); ?></h3>
		<p class="abr-help"><?php esc_html_e( 'Hours in which one account added more than two posts. A report only: nothing is held or trashed for this.', 'abrahamic' ); ?></p>
		<?php if ( $activity['bursts'] ) : ?>
			<ul class="abr-sec-list">
				<?php foreach ( array_slice( $activity['bursts'], 0, 50 ) as $b ) : ?>
					<li><?php echo esc_html( sprintf( '%s, %s: %d', $b['login'], $b['when'], $b['n'] ) ); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php else : ?>
			<p class="abr-help"><?php esc_html_e( 'None.', 'abrahamic' ); ?></p>
		<?php endif; ?>

		<h3><?php esc_html_e( 'Starter content with gambling links', 'abrahamic' ); ?></h3>
		<?php $tainted = abr_sec_tainted_seeds(); ?>
		<?php if ( $tainted ) : ?>
			<p class="abr-help"><?php esc_html_e( 'These starter items link to gambling sites. Nothing is changed here: open each one and remove the links by hand.', 'abrahamic' ); ?></p>
			<ul class="abr-sec-list">
				<?php foreach ( $tainted as $post ) : ?>
					<li><a href="<?php echo esc_url( (string) get_edit_post_link( $post->ID ) ); ?>"><?php echo esc_html( $post->post_title ); ?></a> <span class="abr-help"><?php echo esc_html( implode( ', ', $post->abr_hosts ) ); ?></span></li>
				<?php endforeach; ?>
			</ul>
		<?php else : ?>
			<p class="abr-help"><?php esc_html_e( 'None: no starter item links to a gambling site.', 'abrahamic' ); ?></p>
		<?php endif; ?>

		<h2><?php esc_html_e( 'Security log', 'abrahamic' ); ?></h2>
		<?php
		$log = get_option( ABR_SEC_LOG, array() );
		$log = is_array( $log ) ? array_reverse( $log ) : array();
		?>
		<?php if ( $log ) : ?>
			<div class="abr-sec-scroll abr-sec-scroll--tall">
				<table class="widefat striped abr-sec-table">
					<thead><tr><th scope="col"><?php esc_html_e( 'Time', 'abrahamic' ); ?></th><th scope="col"><?php esc_html_e( 'Event', 'abrahamic' ); ?></th><th scope="col"><?php esc_html_e( 'Detail', 'abrahamic' ); ?></th><th scope="col"><?php esc_html_e( 'Account', 'abrahamic' ); ?></th><th scope="col"><?php esc_html_e( 'Route', 'abrahamic' ); ?></th><th scope="col"><?php esc_html_e( 'IP', 'abrahamic' ); ?></th></tr></thead>
					<tbody>
						<?php foreach ( $log as $e ) : ?>
							<?php $u = ! empty( $e['user'] ) ? get_userdata( (int) $e['user'] ) : false; ?>
							<tr>
								<td><?php echo esc_html( wp_date( $format, (int) $e['time'] ) ); ?></td>
								<td><?php echo esc_html( $e['event'] ); ?></td>
								<td>
									<?php
									if ( ! empty( $e['post_id'] ) && get_post( (int) $e['post_id'] ) ) {
										echo '<a href="' . esc_url( (string) get_edit_post_link( (int) $e['post_id'] ) ) . '">' . esc_html( $e['title'] ) . '</a>';
									} else {
										echo esc_html( $e['title'] );
									}
									if ( ! empty( $e['reasons'] ) ) {
										echo '<br><span class="abr-help">' . esc_html( implode( '; ', (array) $e['reasons'] ) ) . '</span>';
									}
									?>
								</td>
								<td><?php echo esc_html( $u ? $u->user_login : '' ); ?></td>
								<td><?php echo esc_html( $e['type'] ); ?></td>
								<td><?php echo esc_html( $e['ip'] ); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<?php abr_sec_button( 'abr_sec_clear_log', __( 'Clear the log', 'abrahamic' ), __( 'Clear the security log?', 'abrahamic' ) ); ?>
		<?php else : ?>
			<p class="abr-help"><?php esc_html_e( 'Nothing logged yet.', 'abrahamic' ); ?></p>
		<?php endif; ?>
	</section>
	<?php
}
