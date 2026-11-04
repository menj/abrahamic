<?php
/**
 * The three wp-content drop-ins and the "Install error pages" button
 * (Appearance > Theme Options > Tools).
 *
 * WordPress shows wp-content/maintenance.php while it updates (503),
 * php-error.php on a fatal PHP error (500) and db-error.php when the database
 * cannot be reached (503). Each file is built from its own entry in
 * abr_error_page_kinds(), so each says what actually happened.
 *
 * Up to 2.95.0 the theme wrote the maintenance notice into all three files,
 * so a fatal error or a database outage told visitors the site was down for
 * maintenance. Those copies carry the old marker "Abrahamic maintenance
 * drop-in"; they count as the theme's own and are rewritten with the right
 * page on the first admin page after the update, with a notice saying so.
 * The repair is automatic because the file is provably the theme's (its
 * marker), the theme already refreshed these files on every update, and every
 * hour a wrong page stays up misreports an outage to visitors and to search
 * engines. A file without one of the theme's markers is never touched.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/error-page-html.php';

/** The marker every drop-in the theme writes carries in its first line. */
const ABR_ERR_MARKER = 'Abrahamic error page drop-in';

/**
 * Markers the theme has written in earlier versions. A file that carries one
 * is the theme's own.
 *
 * @return string[]
 */
function abr_error_markers() {
	return array( ABR_ERR_MARKER, 'Abrahamic maintenance drop-in', 'Written by the Abrahamic theme; safe to delete' );
}

/**
 * Drop-in file name => page kind.
 *
 * @return array<string,string>
 */
function abr_error_dropins() {
	return array(
		'maintenance.php' => 'maintenance',
		'php-error.php'   => 'php-error',
		'db-error.php'    => 'db-error',
	);
}

/**
 * The source of one drop-in.
 *
 * @param string $kind Page kind.
 * @return string
 */
function abr_error_dropin_source( $kind ) {
	$site = wp_specialchars_decode( (string) get_bloginfo( 'name' ), ENT_QUOTES );
	$home = (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH );
	return abr_error_dropin_head( $kind, ABR_ERR_MARKER, ABR_VERSION, 'Abrahamic' )
		. abr_error_page_html( $kind, '' !== $site ? $site : 'Abrahamic Religions', '' !== $home ? $home : '/' ) . "\n";
}

/**
 * The first bytes of a file.
 *
 * @param string $path File path.
 * @return string
 */
function abr_error_head_of( $path ) {
	return is_readable( $path ) ? (string) file_get_contents( $path, false, null, 0, 400 ) : ''; // phpcs:ignore WordPress.WP.AlternativeFunctions
}

/**
 * Whether the theme wrote a file, in this version or an earlier one.
 *
 * @param string $path File path.
 * @return bool
 */
function abr_error_is_ours( $path ) {
	$head = abr_error_head_of( $path );
	foreach ( abr_error_markers() as $marker ) {
		if ( '' !== $head && false !== strpos( $head, $marker ) ) {
			return true;
		}
	}
	return false;
}

/**
 * Whether a theme-written file holds the wrong page for its name: the
 * maintenance notice in php-error.php or db-error.php, as up to 2.95.0.
 *
 * @param string $path File path.
 * @param string $kind The kind the file name calls for.
 * @return bool
 */
function abr_error_wrong_kind( $path, $kind ) {
	if ( ! abr_error_is_ours( $path ) ) {
		return false;
	}
	$head = abr_error_head_of( $path );
	if ( preg_match( '/' . preg_quote( ABR_ERR_MARKER, '/' ) . ' \(([a-z0-9-]+)\)/', $head, $m ) ) {
		return $m[1] !== $kind;
	}
	// The old marker named no kind: every one of those files is the notice.
	return false !== strpos( $head, 'Abrahamic maintenance drop-in' ) && 'maintenance' !== $kind;
}

/**
 * The state of one drop-in in a directory.
 *
 * @param string $name File name.
 * @param string $dir  Directory, wp-content by default.
 * @return string missing | installed | outdated | foreign
 */
function abr_error_state( $name, $dir = '' ) {
	$dir  = '' !== $dir ? $dir : WP_CONTENT_DIR;
	$path = rtrim( $dir, '/' ) . '/' . $name;
	$kind = abr_error_dropins()[ $name ];
	if ( ! file_exists( $path ) ) {
		return 'missing';
	}
	if ( ! abr_error_is_ours( $path ) ) {
		return 'foreign';
	}
	return (string) file_get_contents( $path ) === abr_error_dropin_source( $kind ) ? 'installed' : 'outdated'; // phpcs:ignore WordPress.WP.AlternativeFunctions
}

/**
 * Write the drop-ins into a directory. A missing file, or one of the theme's
 * own, is written; anyone else's is left alone.
 *
 * @param string $dir Directory, wp-content by default.
 * @return array<string,string> File name => written | unchanged | kept | failed.
 */
function abr_error_install( $dir = '' ) {
	$dir    = rtrim( '' !== $dir ? $dir : WP_CONTENT_DIR, '/' );
	$result = array();
	foreach ( abr_error_dropins() as $name => $kind ) {
		$state = abr_error_state( $name, $dir );
		if ( 'foreign' === $state ) {
			$result[ $name ] = 'kept';
			continue;
		}
		if ( 'installed' === $state ) {
			$result[ $name ] = 'unchanged';
			continue;
		}
		$target = $dir . '/' . $name;
		// A temporary name, then a rename, so WordPress never reads half a file.
		$tmp = $target . '.' . uniqid( 'abr-', true ) . '.tmp';
		if ( false !== @file_put_contents( $tmp, abr_error_dropin_source( $kind ) ) && @rename( $tmp, $target ) ) { // phpcs:ignore WordPress.WP.AlternativeFunctions, WordPress.PHP.NoSilencedErrors
			$result[ $name ] = 'written';
		} else {
			$result[ $name ] = 'failed';
			if ( file_exists( $tmp ) ) {
				@unlink( $tmp ); // phpcs:ignore WordPress.WP.AlternativeFunctions, WordPress.PHP.NoSilencedErrors
			}
		}
	}
	return $result;
}

/**
 * The repair: on the first admin page after the update, an administrator's
 * request rewrites any of the theme's drop-ins that holds the wrong page, and
 * leaves a notice that says which. Runs once per version (abr_dropins_version).
 */
function abr_error_repair_wrong_kind() {
	if ( ! current_user_can( 'manage_options' ) || ( is_multisite() && ! is_main_site() ) ) {
		return;
	}
	$wrong = array();
	foreach ( abr_error_dropins() as $name => $kind ) {
		if ( abr_error_wrong_kind( WP_CONTENT_DIR . '/' . $name, $kind ) ) {
			$wrong[] = $name;
		}
	}
	if ( ! $wrong ) {
		return;
	}
	$result   = abr_error_install();
	$repaired = array_values( array_filter( $wrong, static fn( $n ) => 'written' === ( $result[ $n ] ?? '' ) ) );
	update_option( 'abr_dropins_repaired', array( 'files' => $repaired, 'failed' => array_values( array_diff( $wrong, $repaired ) ) ), false );
}

/**
 * The notice after a repair, shown once.
 */
function abr_error_repair_notice() {
	$done = get_option( 'abr_dropins_repaired' );
	if ( ! is_array( $done ) || ! current_user_can( 'manage_options' ) ) {
		return;
	}
	if ( ! empty( $done['files'] ) ) {
		printf(
			'<div class="notice notice-success is-dismissible"><p>%s</p></div>',
			esc_html(
				sprintf(
					/* translators: %s: file names. */
					__( 'The error pages in wp-content were repaired: %s held the maintenance notice, so a PHP or database fault told visitors the site was down for maintenance. Each file now shows its own page.', 'abrahamic' ),
					implode( ', ', $done['files'] )
				)
			)
		);
	}
	// A file put right since the repair (by the button or by hand) no longer counts.
	$done['failed'] = array_values( array_filter( (array) ( $done['failed'] ?? array() ), static fn( $n ) => abr_error_wrong_kind( WP_CONTENT_DIR . '/' . $n, abr_error_dropins()[ $n ] ?? '' ) ) );
	if ( ! empty( $done['failed'] ) ) {
		printf(
			'<div class="notice notice-error"><p>%s <a href="%s">%s</a></p></div>',
			esc_html(
				sprintf(
					/* translators: %s: file names. */
					__( '%s still hold the maintenance notice: wp-content is not writable.', 'abrahamic' ),
					implode( ', ', $done['failed'] )
				)
			),
			esc_url( abr_options_url( 'tools' ) . '#abr-error-pages' ),
			esc_html__( 'Install error pages', 'abrahamic' )
		);
		return;
	}
	delete_option( 'abr_dropins_repaired' );
}
add_action( 'admin_notices', 'abr_error_repair_notice' );

/**
 * "Install error pages" on the Tools tab.
 */
function abr_handle_install_error_pages() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to do that.', 'abrahamic' ), 403 );
	}
	check_admin_referer( 'abr_install_error_pages' );
	$result = ( is_multisite() && ! is_main_site() ) ? array() : abr_error_install();
	update_option( 'abr_dropins', $result, false );
	if ( ! in_array( 'failed', $result, true ) ) {
		delete_option( 'abr_dropins_repaired' );
	}
	wp_safe_redirect( abr_options_url( 'tools', array( 'abr-errors' => implode( ',', array_map( static fn( $f, $s ) => $f . ':' . $s, array_keys( $result ), $result ) ) ) ) . '#abr-error-pages' );
	exit;
}
add_action( 'admin_post_abr_install_error_pages', 'abr_handle_install_error_pages' );

/**
 * The lines for .htaccess that point the web server at the static pages.
 *
 * @return string
 */
function abr_error_htaccess_snippet() {
	$base  = untrailingslashit( (string) wp_parse_url( ABR_URI, PHP_URL_PATH ) ) . '/errors/';
	$lines = array( '# Abrahamic: pages for the errors the web server answers before WordPress runs' );
	foreach ( array( 403, 500, 502, 503 ) as $code ) {
		$lines[] = 'ErrorDocument ' . $code . ' ' . $base . $code . '.html';
	}
	return implode( "\n", $lines );
}

/**
 * The error pages section of the Tools tab.
 */
function abr_render_error_pages_section() {
	$labels = array(
		'missing'   => __( 'Not installed', 'abrahamic' ),
		'installed' => __( 'Installed, current', 'abrahamic' ),
		'outdated'  => __( 'Installed by the theme, outdated', 'abrahamic' ),
		'foreign'   => __( 'Another file is there; left alone', 'abrahamic' ),
	);
	$when   = array(
		'maintenance.php' => __( 'WordPress is updating (503, Retry-After)', 'abrahamic' ),
		'php-error.php'   => __( 'a fatal PHP error stops a page (500)', 'abrahamic' ),
		'db-error.php'    => __( 'the database cannot be reached (503, Retry-After)', 'abrahamic' ),
	);
	?>
	<h2 id="abr-error-pages"><?php esc_html_e( 'Error pages', 'abrahamic' ); ?></h2>
	<?php
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- display of the last result only.
	$last = isset( $_GET['abr-errors'] ) ? sanitize_text_field( wp_unslash( $_GET['abr-errors'] ) ) : '';
	if ( '' !== $last ) {
		printf( '<div class="notice notice-info inline"><p>%s</p></div>', esc_html( str_replace( array( ',', ':' ), array( ', ', ': ' ), $last ) ) );
	}
	?>
	<p class="abr-help"><?php esc_html_e( 'WordPress shows these files from wp-content when it cannot build a page. Each is self-contained, so it works with the theme half uploaded or the database down. The button writes them; a file the theme did not write is never overwritten.', 'abrahamic' ); ?></p>
	<table class="widefat striped">
		<thead><tr><th scope="col"><?php esc_html_e( 'File', 'abrahamic' ); ?></th><th scope="col"><?php esc_html_e( 'Shown when', 'abrahamic' ); ?></th><th scope="col"><?php esc_html_e( 'Status', 'abrahamic' ); ?></th></tr></thead>
		<tbody>
		<?php foreach ( $when as $abr_name => $abr_when ) : ?>
			<tr><td><code>wp-content/<?php echo esc_html( $abr_name ); ?></code></td><td><?php echo esc_html( $abr_when ); ?></td><td><?php echo esc_html( $labels[ abr_error_state( $abr_name ) ] ); ?></td></tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php if ( is_multisite() && ! is_main_site() ) : ?>
		<p class="abr-help"><?php esc_html_e( 'wp-content is shared by the whole network, so the error pages are installed from the main site.', 'abrahamic' ); ?></p>
	<?php else : ?>
	<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="abr-tools-form">
		<input type="hidden" name="action" value="abr_install_error_pages">
		<?php wp_nonce_field( 'abr_install_error_pages' ); ?>
		<?php submit_button( __( 'Install error pages', 'abrahamic' ), 'secondary', 'submit', false ); ?>
	</form>
	<?php endif; ?>
	<p class="abr-help"><?php esc_html_e( 'For errors the web server answers before WordPress starts, static pages are in the theme\'s errors folder. Add these lines to .htaccess to use them:', 'abrahamic' ); ?></p>
	<textarea readonly rows="5" class="large-text code" aria-label="<?php esc_attr_e( '.htaccess lines', 'abrahamic' ); ?>"><?php echo esc_textarea( abr_error_htaccess_snippet() ); ?></textarea>
	<?php
}
