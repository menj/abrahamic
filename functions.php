<?php
/**
 * Abrahamic child theme bootstrap.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

define( 'ABR_VERSION', '2.52.0' );
define( 'ABR_DIR', get_stylesheet_directory() );
define( 'ABR_URI', get_stylesheet_directory_uri() );

require_once ABR_DIR . '/inc/icons.php';
require_once ABR_DIR . '/inc/social.php';
require_once ABR_DIR . '/inc/options.php';
require_once ABR_DIR . '/inc/theme-options.php';
require_once ABR_DIR . '/inc/shortcodes.php';
require_once ABR_DIR . '/inc/structure.php';
require_once ABR_DIR . '/inc/seed.php';
require_once ABR_DIR . '/inc/seo.php';
require_once ABR_DIR . '/inc/redirects.php';
require_once ABR_DIR . '/inc/search.php';

/**
 * Theme supports and pattern category.
 */
function abr_setup() {
	add_editor_style( 'assets/css/theme.css' );
	register_block_pattern_category(
		'abrahamic',
		array( 'label' => __( 'Abrahamic', 'abrahamic' ) )
	);
}
add_action( 'after_setup_theme', 'abr_setup' );

/**
 * Front-end assets. The parent stylesheet is not needed: Twenty Twenty-Five
 * ships its styling through theme.json, which the child theme inherits.
 */
function abr_enqueue_assets() {
	wp_enqueue_style( 'abr-theme', ABR_URI . '/assets/css/theme.css', array(), ABR_VERSION );
	wp_add_inline_style( 'abr-theme', abr_scheme_css() );

	wp_enqueue_script( 'abr-theme', ABR_URI . '/assets/js/theme.js', array(), ABR_VERSION, array( 'strategy' => 'defer', 'in_footer' => true ) );
	// Colour mode runs in the head, before the first paint, so the page never flashes.
	wp_enqueue_script( 'abr-mode', ABR_URI . '/assets/js/mode.js', array(), ABR_VERSION, array( 'in_footer' => false ) );
	wp_localize_script(
		'abr-theme',
		'abrTheme',
		array( 'reveal' => (bool) abr_get_option( 'reveal_motion' ) )
	);

	// Photograph viewer, only where the content carries a bundled photograph.
	$post = get_post();
	if ( is_singular() && $post && has_shortcode( $post->post_content, 'abr_photo' ) ) {
		wp_enqueue_script( 'abr-lightbox', ABR_URI . '/assets/js/lightbox.js', array(), ABR_VERSION, array( 'strategy' => 'defer', 'in_footer' => true ) );
		wp_localize_script(
			'abr-lightbox',
			'abrLightbox',
			array(
				'open'   => __( 'Enlarge photograph', 'abrahamic' ),
				'close'  => __( 'Close photograph', 'abrahamic' ),
				'dialog' => __( 'Enlarged photograph', 'abrahamic' ),
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'abr_enqueue_assets' );

/**
 * Pass the starting colour mode to mode.js as a data attribute.
 *
 * @param string $tag    Script tag.
 * @param string $handle Handle.
 * @return string
 */
function abr_mode_script_tag( $tag, $handle ) {
	if ( 'abr-mode' === $handle ) {
		$tag = str_replace( '<script ', '<script data-abr-mode-default="' . esc_attr( abr_get_option( 'mode_default' ) ) . '" ', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'abr_mode_script_tag', 10, 2 );

/**
 * Editor gets the same colour scheme as the front end.
 */
function abr_enqueue_editor_assets() {
	wp_register_style( 'abr-editor-scheme', false, array(), ABR_VERSION );
	wp_enqueue_style( 'abr-editor-scheme' );
	wp_add_inline_style( 'abr-editor-scheme', abr_scheme_css() );
}
add_action( 'enqueue_block_assets', 'abr_enqueue_editor_assets' );

/**
 * Sabon Next LT is bundled with the theme and must stay bundled (docs/ssot.md, section 6).
 * Each face ships as a Latin file and an extended file (Greek, Cyrillic and the rest).
 *
 * @return string[] File names under assets/fonts/.
 */
function abr_sabon_files() {
	$files = array();
	foreach ( array( 'regular', 'italic', 'bold', 'bold-italic' ) as $face ) {
		$files[] = 'sabon-next-lt-' . $face . '.woff2';
		$files[] = 'sabon-next-lt-' . $face . '-ext.woff2';
	}
	return $files;
}

/**
 * Bundled Sabon files that are missing from the theme folder.
 *
 * @return string[]
 */
function abr_sabon_missing() {
	return array_values(
		array_filter(
			abr_sabon_files(),
			function ( $file ) {
				return ! is_readable( ABR_DIR . '/assets/fonts/' . $file );
			}
		)
	);
}

/**
 * Warn on the Themes and Theme Options screens if a Sabon file is missing.
 */
function abr_sabon_missing_notice() {
	$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
	if ( ! $screen || ! current_user_can( 'edit_theme_options' ) || ! in_array( $screen->id, array( 'themes', 'appearance_page_abrahamic-theme-options' ), true ) ) {
		return;
	}
	$missing = abr_sabon_missing();
	if ( $missing ) {
		printf(
			'<div class="notice notice-error"><p>%s</p><p><code>%s</code></p></div>',
			esc_html__( 'Abrahamic: Sabon Next LT font files are missing from assets/fonts/. The site falls back to other serif fonts until they are restored. Reinstall the theme package.', 'abrahamic' ),
			esc_html( implode( ', ', $missing ) )
		);
	}
}
add_action( 'admin_notices', 'abr_sabon_missing_notice' );

/**
 * Preload the two Latin Sabon faces used above the fold.
 */
function abr_preload_fonts() {
	foreach ( array( 'sabon-next-lt-regular', 'sabon-next-lt-bold' ) as $font ) {
		printf(
			'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
			esc_url( ABR_URI . '/assets/fonts/' . $font . '.woff2' )
		);
	}
}
add_action( 'wp_head', 'abr_preload_fonts', 1 );

/**
 * Block styles: gold button, typewriter note, Arabic calligraphy. Plus the [abr_year] helper.
 */
function abr_register_block_styles() {
	register_block_style(
		'core/button',
		array(
			'name'  => 'gold',
			'label' => __( 'Gold', 'abrahamic' ),
		)
	);
	// Red donation button, for the Donate page and any other appeal.
	register_block_style(
		'core/button',
		array(
			'name'  => 'abr-donate',
			'label' => __( 'Donate (red)', 'abrahamic' ),
		)
	);
	// Special Elite: archival notes and document transcriptions only.
	foreach ( array( 'core/paragraph', 'core/quote' ) as $block ) {
		register_block_style(
			$block,
			array(
				'name'  => 'abr-typewriter',
				'label' => __( 'Typewriter note', 'abrahamic' ),
			)
		);
	}
	// Arslan Wessam: short decorative Arabic lines only, never running text.
	foreach ( array( 'core/paragraph', 'core/heading' ) as $block ) {
		register_block_style(
			$block,
			array(
				'name'  => 'abr-calligraphy',
				'label' => __( 'Arabic calligraphy', 'abrahamic' ),
			)
		);
	}
}
add_action( 'init', 'abr_register_block_styles' );

add_shortcode(
	'abr_year',
	function () {
		return esc_html( wp_date( 'Y' ) );
	}
);

/**
 * Patterns nested in templates are expanded after WordPress runs
 * do_shortcode() on the template, so theme shortcodes inside Shortcode,
 * Custom HTML and Paragraph blocks are processed at block render time.
 *
 * @param string $content Block output.
 * @return string
 */
function abr_render_theme_shortcodes( $content ) {
	return false !== strpos( $content, '[abr_' ) ? do_shortcode( $content ) : $content;
}
add_filter( 'render_block_core/shortcode', 'abr_render_theme_shortcodes' );
add_filter( 'render_block_core/html', 'abr_render_theme_shortcodes' );
add_filter( 'render_block_core/paragraph', 'abr_render_theme_shortcodes' );
