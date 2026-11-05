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

/** The folder in wp-content that holds this site's copies of the static pages. */
const ABR_STATIC_ERRORS = 'abrahamic-errors';

/**
 * The copies of the static pages, relative to wp-content => page kind.
 *
 * @return array<string,string>
 */
function abr_error_static_files() {
	$files = array();
	foreach ( array( '403', '500', '502', '503', '504' ) as $code ) {
		$files[ ABR_STATIC_ERRORS . '/' . $code . '.html' ] = $code;
	}
	return $files;
}

/**
 * Every file the theme writes, relative to wp-content => page kind: the
 * three drop-ins, then the copies of the static pages.
 *
 * @return array<string,string>
 */
function abr_error_files() {
	return abr_error_dropins() + abr_error_static_files();
}

/**
 * The site name and the path of the home page, as the pages show them.
 *
 * @return array{0:string,1:string}
 */
function abr_error_site() {
	$site = wp_specialchars_decode( (string) get_bloginfo( 'name' ), ENT_QUOTES );
	$home = (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH );
	return array( '' !== $site ? $site : 'Abrahamic Religions', '' !== $home ? $home : '/' );
}

/**
 * The source of one drop-in.
 *
 * @param string $kind Page kind.
 * @return string
 */
function abr_error_dropin_source( $kind ) {
	list( $site, $home ) = abr_error_site();
	return abr_error_dropin_head( $kind, ABR_ERR_MARKER, ABR_VERSION, 'Abrahamic' )
		. abr_error_page_html( $kind, $site, $home ) . "\n";
}

/**
 * The text the theme writes for one file: a drop-in, or a static page with
 * the marker in an HTML comment and this site's home address.
 *
 * @param string $name A key of abr_error_files().
 * @return string
 */
function abr_error_file_source( $name ) {
	$static = abr_error_static_files();
	if ( ! isset( $static[ $name ] ) ) {
		return abr_error_dropin_source( abr_error_dropins()[ $name ] );
	}
	list( $site, $home ) = abr_error_site();
	return '<!-- ' . ABR_ERR_MARKER . ' (' . $static[ $name ] . ') ' . ABR_VERSION . ". Written by the Abrahamic theme; safe to delete. -->\n"
		. abr_error_page_html( $static[ $name ], $site, $home ) . "\n";
}

/**
 * Whether this site writes the shared files in wp-content: any site off a
 * network, the main site of a network, or, while the main site runs another
 * theme, the one subsite with the lowest ID that runs this one. Without the last case a network whose
 * main site had switched away kept the drop-ins of the old version for
 * good, with no site left to refresh them.
 *
 * @return bool
 */
function abr_error_writer() {
	if ( ! is_multisite() || is_main_site() ) {
		return true;
	}
	$slug = basename( dirname( __DIR__ ) );
	$main = get_main_site_id();
	if ( in_array( $slug, array( get_blog_option( $main, 'stylesheet' ), get_blog_option( $main, 'template' ) ), true ) ) {
		return false;
	}
	// One writer only: the site with the lowest ID that runs the theme, so
	// the shared files never flip between subsites' addresses.
	return get_current_blog_id() === abr_error_first_theme_site();
}

/**
 * The site with the lowest ID that runs this theme, as its stylesheet or
 * its template; 0 when none does. Sites are read 500 at a time.
 *
 * @return int
 */
function abr_error_first_theme_site() {
	$slug   = basename( dirname( __DIR__ ) );
	$offset = 0;
	do {
		$ids = get_sites(
			array(
				'fields'  => 'ids',
				'number'  => 500,
				'offset'  => $offset,
				'orderby' => 'id',
				'order'   => 'ASC',
			)
		);
		foreach ( $ids as $id ) {
			if ( in_array( $slug, array( get_blog_option( $id, 'stylesheet' ), get_blog_option( $id, 'template' ) ), true ) ) {
				return (int) $id;
			}
		}
		$offset += 500;
	} while ( 500 === count( $ids ) );
	return 0;
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
 * Whether a file is a leftover of one of the owner's sibling themes, which
 * mark every drop-in "Written by the ... theme; safe to delete". Such a file
 * may be replaced when this theme installs its own; a file with no such mark
 * is never touched.
 *
 * @param string $path File path.
 * @return bool
 */
function abr_error_is_sibling( $path ) {
	return (bool) preg_match( '/Written by the [A-Za-z0-9 .\'-]{1,40} theme; safe to delete/', abr_error_head_of( $path ) );
}

/**
 * Whether the theme may write over a file at install time: its own, or a
 * sibling theme's marked leftover.
 *
 * @param string $path File path.
 * @return bool
 */
function abr_error_is_replaceable( $path ) {
	return abr_error_is_ours( $path ) || abr_error_is_sibling( $path );
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
	if ( ! file_exists( $path ) ) {
		return 'missing';
	}
	if ( ! abr_error_is_ours( $path ) ) {
		return 'foreign';
	}
	return (string) file_get_contents( $path ) === abr_error_file_source( $name ) ? 'installed' : 'outdated'; // phpcs:ignore WordPress.WP.AlternativeFunctions
}

/**
 * Write the drop-ins and the copies of the static pages into a directory.
 * A missing file, one of the theme's
 * own or a sibling theme's marked leftover is written; anyone else's is left
 * alone.
 *
 * @param string $dir Directory, wp-content by default.
 * @return array<string,string> File name => written | unchanged | kept | failed.
 */
function abr_error_install( $dir = '' ) {
	$dir    = rtrim( '' !== $dir ? $dir : WP_CONTENT_DIR, '/' );
	$result = array();
	foreach ( array_keys( abr_error_files() ) as $name ) {
		$state = abr_error_state( $name, $dir );
		if ( 'foreign' === $state && ! abr_error_is_replaceable( $dir . '/' . $name ) ) {
			$result[ $name ] = 'kept';
			continue;
		}
		if ( 'installed' === $state ) {
			$result[ $name ] = 'unchanged';
			continue;
		}
		$target = $dir . '/' . $name;
		if ( ! is_dir( dirname( $target ) ) ) {
			@mkdir( dirname( $target ), 0755, true ); // phpcs:ignore WordPress.WP.AlternativeFunctions, WordPress.PHP.NoSilencedErrors
		}
		// A temporary name, then a rename, so WordPress never reads half a file.
		$tmp = $target . '.' . uniqid( 'abr-', true ) . '.tmp';
		if ( false !== @file_put_contents( $tmp, abr_error_file_source( $name ) ) && @rename( $tmp, $target ) ) { // phpcs:ignore WordPress.WP.AlternativeFunctions, WordPress.PHP.NoSilencedErrors
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
	if ( ! current_user_can( 'manage_options' ) || ! abr_error_writer() ) {
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
	$result = abr_error_writer() ? abr_error_install() : array();
	update_option( 'abr_dropins', $result, false );
	if ( ! in_array( 'failed', $result, true ) ) {
		delete_option( 'abr_dropins_repaired' );
	}
	wp_safe_redirect( abr_options_url( 'tools', array( 'abr-errors' => implode( ',', array_map( static fn( $f, $s ) => $f . ':' . $s, array_keys( $result ), $result ) ) ) ) . '#abr-error-pages' );
	exit;
}
add_action( 'admin_post_abr_install_error_pages', 'abr_handle_install_error_pages' );

/**
 * The lines for .htaccess that point the web server at this site's copies
 * of the static pages in wp-content, which carry its own home address.
 *
 * @return string
 */
function abr_error_htaccess_snippet() {
	$base  = untrailingslashit( (string) wp_parse_url( content_url( '/' ), PHP_URL_PATH ) ) . '/' . ABR_STATIC_ERRORS . '/';
	$lines = array( '# Abrahamic: pages for the errors the web server answers before WordPress runs' );
	foreach ( array( 403, 500, 502, 503, 504 ) as $code ) {
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
		'network'   => __( 'Installed by the theme for the network', 'abrahamic' ),
	);
	$when   = array(
		'maintenance.php' => __( 'WordPress is updating (503, Retry-After)', 'abrahamic' ),
		'php-error.php'   => __( 'a fatal PHP error stops a page (500)', 'abrahamic' ),
		'db-error.php'    => __( 'the database cannot be reached (503, Retry-After)', 'abrahamic' ),
	);
	foreach ( abr_error_static_files() as $abr_name => $abr_code ) {
		/* translators: %s: HTTP status code. */
		$when[ $abr_name ] = sprintf( __( 'the web server answers %s, through the .htaccess lines below', 'abrahamic' ), $abr_code );
	}
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
			<tr><td><code>wp-content/<?php echo esc_html( $abr_name ); ?></code></td><td><?php echo esc_html( $abr_when ); ?></td><td><?php
			$abr_state = abr_error_state( $abr_name );
			// Another site writes the shared files with its own addresses, so
			// here the theme's own copy reads as the network's, not outdated.
			if ( 'outdated' === $abr_state && ! abr_error_writer() ) {
				$abr_state = 'network';
			}
			echo esc_html( $labels[ $abr_state ] );
			?></td></tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php if ( ! abr_error_writer() ) : ?>
		<p class="abr-help"><?php esc_html_e( 'wp-content is shared by the whole network, so one site writes the error pages for all: the main site, or the first site that runs Abrahamic when the main site runs another theme. The status above reflects that site\'s addresses.', 'abrahamic' ); ?></p>
	<?php else : ?>
	<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="abr-tools-form">
		<input type="hidden" name="action" value="abr_install_error_pages">
		<?php wp_nonce_field( 'abr_install_error_pages' ); ?>
		<?php submit_button( __( 'Install error pages', 'abrahamic' ), 'secondary', 'submit', false ); ?>
	</form>
	<?php endif; ?>
	<p class="abr-help"><?php esc_html_e( 'For errors the web server answers before WordPress starts, the button also writes static pages into wp-content/abrahamic-errors, with this site\'s home address. Add these lines to .htaccess to use them:', 'abrahamic' ); ?></p>
	<textarea readonly rows="6" class="large-text code" aria-label="<?php esc_attr_e( '.htaccess lines', 'abrahamic' ); ?>"><?php echo esc_textarea( abr_error_htaccess_snippet() ); ?></textarea>
	<?php
}
