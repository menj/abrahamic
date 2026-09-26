<?php
/**
 * Theme Options data layer: schema, defaults, reading, sanitising,
 * colour schemes and the 1.x migration. The screen lives in inc/theme-options.php.
 * All options are stored in one array, `abr_options`.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Menu limits: top-level header links, links under each, and secondary links.
 */
define( 'ABR_PRIMARY_NAV_MAX', 5 );
define( 'ABR_NAV_CHILDREN_MAX', 10 );
define( 'ABR_SECONDARY_NAV_MAX', 8 );
define( 'ABR_LISTING_PER_PAGE', 12 );
define( 'ABR_FURTHER_MAX', 6 );

/**
 * Named colour schemes. Keys map to theme.json palette slugs.
 *
 * @return array
 */
function abr_schemes() {
	return array(
		'classic'    => array(
			'label'  => __( 'Classic Navy', 'abrahamic' ),
			'colors' => array( 'navy' => '#172033', 'ivory' => '#F8F5EF', 'gold' => '#B89555', 'beige' => '#E9E2D5', 'charcoal' => '#242424' ),
		),
		'manuscript' => array(
			'label'  => __( 'Manuscript Sepia', 'abrahamic' ),
			'colors' => array( 'navy' => '#3B2A1E', 'ivory' => '#F6EFE2', 'gold' => '#A8743A', 'beige' => '#E7DAC4', 'charcoal' => '#2B2420' ),
		),
		'jerusalem'  => array(
			'label'  => __( 'Jerusalem Stone', 'abrahamic' ),
			'colors' => array( 'navy' => '#2F3A2E', 'ivory' => '#F5F2EA', 'gold' => '#B08D57', 'beige' => '#E4DDCD', 'charcoal' => '#262A24' ),
		),
		'lapis'      => array(
			'label'  => __( 'Lapis', 'abrahamic' ),
			'colors' => array( 'navy' => '#14305C', 'ivory' => '#F7F6F2', 'gold' => '#C39A4A', 'beige' => '#E3E4E8', 'charcoal' => '#1E2330' ),
		),
		'custom'     => array(
			'label'  => __( 'Custom', 'abrahamic' ),
			'colors' => array(),
		),
	);
}

/**
 * Option schema: key => sanitising type. Types are handled in abr_sanitize_options().
 *
 * @return array
 */
function abr_option_types() {
	$types = array(
		// General.
		'sticky_header'    => 'bool',
		'mode_toggle'      => 'bool',
		'mode_default'     => 'mode',
		'reveal_motion'    => 'bool',
		// Header.
		'logo_style'       => 'logo_style',
		'logo_main'        => 'text',
		'logo_sub'         => 'text',
		'header_search'    => 'bool',
		'header_cta'       => 'bool',
		'header_cta_label' => 'text',
		'header_cta_url'   => 'link',
		'header_donate'       => 'bool',
		'header_donate_label' => 'text',
		'header_donate_url'   => 'link',
		'donate_colour'       => 'hex',
		'donation_url'        => 'url',
		'donation_button'     => 'text',
		// Footer.
		'footer_title'     => 'text',
		'footer_tagline'   => 'text',
		'footer_text'      => 'textarea',
		'footer_copyright' => 'text',
		'footer_note'      => 'text',
		'contact_email'    => 'email',
		// Navigation.
		'nav_header'         => 'menu_primary',
		'home_subnav'        => 'bool',
		'home_parallax'      => 'bool',
		'home_subnav_items'  => 'menu_secondary',
		'nav_utility'        => 'menu_secondary',
		'nav_secondary'      => 'menu_secondary',
		'further_title'      => 'text',
		'further_links'      => 'menu_further',
		'nav_footer_1_title' => 'text',
		'nav_footer_1'       => 'menu',
		'nav_footer_2_title' => 'text',
		'nav_footer_2'       => 'menu',
		'nav_footer_3_title' => 'text',
		'nav_footer_3'       => 'menu',
		// Search.
		'seo_enabled'          => 'bool',
		'seed_mode'            => 'seed_mode',
		'seo_home_description' => 'textarea',
		'google_verification'  => 'token',
		'bing_verification'    => 'token',
		'ga4_id'               => 'ga4',
		'share_image'          => 'url',
		'org_logo'             => 'url',
		// Colours.
		'scheme'           => 'scheme',
		'custom_navy'      => 'hex',
		'custom_ivory'     => 'hex',
		'custom_gold'      => 'hex',
		'custom_beige'     => 'hex',
		'custom_charcoal'  => 'hex',
		// Newsletter.
		'newsletter_url'   => 'url',
		'newsletter_name'  => 'key',
		'newsletter_text'  => 'textarea',
		// Login.
		'login_design'        => 'bool',
		'login_logo'          => 'url',
		'login_layout'        => 'login_layout',
		'login_photo'         => 'login_photo',
		'login_message'       => 'text',
		'login_hide'          => 'bool',
		'login_slug'          => 'slug',
		'login_redirect_slug' => 'slug',
		// Search addresses.
		'search_pretty'       => 'bool',
		'search_base'         => 'slug',
	);
	// Social.
	foreach ( array_keys( abr_social_networks() ) as $slug ) {
		$types[ abr_social_key( $slug ) ] = 'url';
	}
	return $types;
}

/**
 * Words that cannot serve as a login or search address.
 *
 * @return string[]
 */
function abr_reserved_slugs() {
	return array( 'wp-admin', 'wp-login', 'wp-login-php', 'wp-content', 'wp-includes', 'wp-json', 'admin', 'feed', 'page', 'comments', 'author', 'category', 'tag', 'embed', 'trackback', 'attachment', 'sitemap', 'wp-sitemap' );
}

/**
 * Defaults for every option.
 *
 * @return array
 */
function abr_option_defaults() {
	$defaults = array(
		'sticky_header'    => 1,
		'mode_toggle'      => 1,
		'mode_default'     => 'light',
		'reveal_motion'    => 1,
		'logo_style'       => 'mark_text',
		'logo_main'        => __( 'Abrahamic', 'abrahamic' ),
		'logo_sub'         => __( 'Religions', 'abrahamic' ),
		'header_search'    => 1,
		'header_cta'       => 1,
		'header_cta_label' => __( 'Explore', 'abrahamic' ),
		'header_cta_url'   => '@guides',
		'header_donate'       => 1,
		'header_donate_label' => __( 'Donate', 'abrahamic' ),
		'header_donate_url'   => '@donate',
		'donate_colour'       => '#b3261e',
		'donation_url'        => '',
		'donation_button'     => __( 'Donate now', 'abrahamic' ),
		'footer_title'     => __( 'Abrahamic Religions', 'abrahamic' ),
		'footer_tagline'   => __( 'Exploring faith, history, culture, and shared heritage.', 'abrahamic' ),
		'footer_text'      => __( 'An independent educational resource on the shared heritage and distinct traditions of the world’s major Abrahamic faiths.', 'abrahamic' ),
		/* translators: {year} is replaced with the current year. */
		'footer_copyright' => __( '© {year} Abrahamic Religions. All rights reserved.', 'abrahamic' ),
		'footer_note'      => __( 'An independent educational resource.', 'abrahamic' ),
		'contact_email'    => '',
		'nav_header'         => "Religions | @religions\n- Judaism | @judaism\n- Mandaeism | @mandaeism\n- Christianity | @christianity\n- Islam | @islam\nReference | @reference\n- Sacred texts | @sacred-texts\n- History and timeline | @timeline\n- Figures | @figures\n- Places | @places\n- Comparative studies | @comparisons\n- Glossary | @glossary\n- Frequently asked questions | @faq\n- Research | @research\nJournal | @journal\nEditorial | @editorial-policy\nKB | https://knowislam.wiki/ | Knowledge Base",
		'further_title'      => __( 'Further reading', 'abrahamic' ),
		'further_links'      => '',
		'home_subnav'        => 1,
		'home_parallax'      => 1,
		'home_subnav_items'  => "Shared Heritage | #heritage\nFigures | #figures\nGeography | #places\nSacred Scriptures | #texts\nThe Traditions | #religions\nTimeline | #timeline\nComparative View | #comparison",
		'nav_utility'        => "About AR | @about\nTerms of use | @terms\nPrivacy policy | @privacy-policy\nDMCA | @dmca\nContact AR | @contact\nSitemap | @site-map",
		'nav_secondary'      => "About AR | @about\nEditorial policy | @editorial-policy\nContact AR | @contact\nDonate | @donate\nKnowledge base | https://knowislam.wiki/\nPrivacy policy | @privacy-policy\nTerms & conditions | @terms\nSitemap | @site-map",
		'nav_footer_1_title' => __( 'Explore', 'abrahamic' ),
		'nav_footer_1'       => "Religions | @religions\nJudaism | @judaism\nMandaeism | @mandaeism\nChristianity | @christianity\nIslam | @islam",
		'nav_footer_2_title' => __( 'Reference', 'abrahamic' ),
		'nav_footer_2'       => "Reference | @reference\nSacred texts | @sacred-texts\nHistory and timeline | @timeline\nFigures | @figures\nPlaces | @places\nComparative studies | @comparisons\nGlossary | @glossary\nFAQ | @faq\nResearch | @research",
		'nav_footer_3_title' => __( 'Journal', 'abrahamic' ),
		'nav_footer_3'       => "Latest entries | @journal\nAll topics | @topics\nHistory | @topic:history\nScripture | @topic:scripture\nTheology | @topic:theology\nPhilosophy | @topic:philosophy\nInterfaith studies | @topic:interfaith-studies",
		'seo_enabled'          => 1,
		'seed_mode'            => 'replace',
		'seo_home_description' => '',
		'google_verification'  => '',
		'bing_verification'    => '',
		'ga4_id'               => '',
		'share_image'          => '',
		'org_logo'             => '',
		'scheme'           => 'classic',
		'custom_navy'      => '#172033',
		'custom_ivory'     => '#F8F5EF',
		'custom_gold'      => '#B89555',
		'custom_beige'     => '#E9E2D5',
		'custom_charcoal'  => '#242424',
		'newsletter_url'   => '',
		'newsletter_name'  => 'email',
		'newsletter_text'  => __( 'Receive new articles, historical explainers, and curated resources from Abrahamic Religions.', 'abrahamic' ),
		'login_design'        => 1,
		'login_logo'          => '',
		'login_layout'        => 'centred',
		'login_photo'         => 'jerusalem-panorama',
		'login_message'       => __( 'An independent educational resource on the Abrahamic traditions.', 'abrahamic' ),
		// A site moving from WPS Hide Login or Pretty Search Permalinks keeps its addresses.
		'login_hide'          => get_option( 'whl_page' ) ? 1 : 0,
		'login_slug'          => get_option( 'whl_page' ) ? sanitize_title( get_option( 'whl_page' ) ) : 'login',
		'login_redirect_slug' => get_option( 'whl_redirect_admin' ) ? sanitize_title( get_option( 'whl_redirect_admin' ) ) : '404',
		'search_pretty'       => 1,
		'search_base'         => get_option( 'wpseosearch_base' ) ? sanitize_title( get_option( 'wpseosearch_base' ) ) : 'search',
	);
	foreach ( array_keys( abr_social_networks() ) as $slug ) {
		$defaults[ abr_social_key( $slug ) ] = '';
	}
	return $defaults;
}

/**
 * All options merged over their defaults.
 *
 * @return array
 */
function abr_get_options() {
	static $cache = null;
	$stored = (array) get_option( 'abr_options', array() );
	$key    = md5( serialize( $stored ) ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.serialize_serialize
	if ( null !== $cache && $cache[0] === $key ) {
		return $cache[1];
	}
	// Menus saved unchanged from an earlier default give way to the current default.
	foreach ( abr_legacy_menu_defaults() as $menu => $values ) {
		if ( isset( $stored[ $menu ] ) && in_array( str_replace( "\r", '', (string) $stored[ $menu ] ), $values, true ) ) {
			unset( $stored[ $menu ] );
		}
	}
	$opts  = wp_parse_args( $stored, abr_option_defaults() );
	$cache = array( $key, $opts );
	return $opts;
}

/**
 * Earlier default menus and footer headings, by option key.
 *
 * @return array key => string[]
 */
function abr_legacy_menu_defaults() {
	return array(
		'nav_header' => array( abr_legacy_nav_header(), "Religions | @religions\n- Judaism | @judaism\n- Mandaeism | @mandaeism\n- Christianity | @christianity\n- Islam | @islam\nSacred texts | @sacred-texts\nTimeline | @timeline\nReference | @reference\n- Figures | @figures\n- Places | @places\n- Comparative studies | @comparisons\n- Glossary | @glossary\n- Frequently asked questions | @faq\n- Research | @research\nJournal | @journal", "Religions | @religions\n- Judaism | @judaism\n- Christianity | @christianity\n- Islam | @islam\n- Mandaeism | @mandaeism\nSacred texts | @sacred-texts\nTimeline | @timeline\nReference | @reference\n- Figures | @figures\n- Places | @places\n- Comparative studies | @comparisons\n- Glossary | @glossary\n- Frequently asked questions | @faq\n- Research | @research\nJournal | @journal", "Religions | @guides\n- Judaism | @judaism\n- Christianity | @christianity\n- Islam | @islam\nSacred Texts | @sacred-texts\nKnowledge Base | @knowledge-base\n- History and Timeline | @timeline\n- Figures | @figures\n- Places | @places\n- Comparative Studies | @comparisons\n- Glossary | @glossary\n- Frequently Asked Questions | @faq\n- Research | @research\nArticles | @articles\n- Topics | @topics\nAbout | @about\n- Editorial Policy | @editorial-policy\n- Contact | @contact", "Religions | @guides\n- Judaism | @judaism\n- Christianity | @christianity\n- Islam | @islam\nReference | @reference\n- Sacred Texts | @sacred-texts\n- History and Timeline | @timeline\n- Figures | @figures\n- Places | @places\n- Comparative Studies | @comparisons\n- Glossary | @glossary\n- Frequently Asked Questions | @faq\n- Research | @research\nInsights | @insights\n- Topics | @topics\nKnowledge Base | https://knowislam.wiki/\nAbout | @about\n- Editorial Policy | @editorial-policy\n- Contact | @contact", "Religions | @religions\n- Judaism | @judaism\n- Christianity | @christianity\n- Islam | @islam\nSacred Texts | @sacred-texts\nTimeline | @timeline\nReference | @reference\n- Figures | @figures\n- Places | @places\n- Comparative Studies | @comparisons\n- Glossary | @glossary\n- Frequently Asked Questions | @faq\n- Research | @research\nInsights | @insights\n- Topics | @topics", "Religions | @religions\n- Judaism | @judaism\n- Christianity | @christianity\n- Islam | @islam\nSacred Texts | @sacred-texts\nTimeline | @timeline\nReference | @reference\n- Figures | @figures\n- Places | @places\n- Comparative Studies | @comparisons\n- Glossary | @glossary\n- Frequently Asked Questions | @faq\n- Research | @research\nJournal | @journal\n- Topics | @topics", "Religions | @religions\n- Judaism | @judaism\n- Christianity | @christianity\n- Islam | @islam\nSacred Texts | @sacred-texts\nTimeline | @timeline\nReference | @reference\n- Figures | @figures\n- Places | @places\n- Comparative Studies | @comparisons\n- Glossary | @glossary\n- Frequently Asked Questions | @faq\n- Research | @research\nJournal | @journal" ),
		'nav_secondary' => array( "History and Timeline | @timeline\nFigures | @figures\nPlaces | @places\nComparisons | @comparisons\nGlossary | @glossary\nFAQ | @faq\nContact | @contact", "Sacred Texts | @sacred-texts\nHistory and Timeline | @timeline\nFigures | @figures\nPlaces | @places\nComparisons | @comparisons\nGlossary | @glossary\nFAQ | @faq\nContact | @contact", "About AR | @about\nEditorial Policy | @editorial-policy\nContact AR | @contact\nKnowledge Base | https://knowislam.wiki/\nPrivacy Policy | @privacy-policy\nTerms & Conditions | @terms\nSite Map | @site-map", "About AR | @about\nEditorial Policy | @editorial-policy\nContact AR | @contact\nDonate | @donate\nKnowledge Base | https://knowislam.wiki/\nPrivacy Policy | @privacy-policy\nTerms & Conditions | @terms\nSite Map | @site-map" ),
		'nav_footer_1' => array( "Religions | @guides\nJudaism | @judaism\nChristianity | @christianity\nIslam | @islam\nKnowledge Base | @knowledge-base\nHistory and Timeline | @timeline\nSacred Texts | @sacred-texts", "Religions | @guides\nJudaism | @judaism\nChristianity | @christianity\nIslam | @islam\nReference | @reference\nHistory and Timeline | @timeline\nSacred Texts | @sacred-texts", "Religions | @religions\nJudaism | @judaism\nChristianity | @christianity\nIslam | @islam" , "Religions | @religions\nJudaism | @judaism\nChristianity | @christianity\nIslam | @islam\nMandaeism | @mandaeism" ),
		'nav_footer_2' => array( "Articles | @articles\nTopics | @topics\nFigures | @figures\nPlaces | @places\nGlossary | @glossary\nFAQ | @faq\nResearch | @research", "Insights | @insights\nTopics | @topics\nKnowledge Base | https://knowislam.wiki/\nFigures | @figures\nPlaces | @places\nGlossary | @glossary\nFAQ | @faq\nResearch | @research" ),
		'nav_footer_2_title' => array( __( 'Resources', 'abrahamic' ) ),
		'nav_footer_3_title' => array( __( 'About', 'abrahamic' ), __( 'Insights', 'abrahamic' ) ),
		'nav_footer_3' => array( "About Us | @about\nEditorial Policy | @editorial-policy\nContact | @contact\nPrivacy Policy | @privacy-policy\nTerms of Use | @terms\nSite Map | @site-map", "Latest Insights | @insights\nAll Topics | @topics\nHistory | @topic:history\nScripture | @topic:scripture\nTheology | @topic:theology\nPhilosophy | @topic:philosophy\nInterfaith Studies | @topic:interfaith-studies" ),
	);
}

/**
 * The header menu shipped as the default in 2.4.x.
 *
 * @return string
 */
function abr_legacy_nav_header() {
	return "Home | /\nReligions | @guides\nHistory | @timeline\nSacred texts | @sacred-texts\nFigures | @figures\nPlaces | @places\nComparisons | @comparisons\nArticles | @articles\nAbout | @about";
}

/**
 * Read one option with its default.
 *
 * @param string $key Option key.
 * @return mixed
 */
function abr_get_option( $key ) {
	$opts = abr_get_options();
	return isset( $opts[ $key ] ) ? $opts[ $key ] : null;
}

/**
 * Sanitise the option array. Unknown keys are dropped; a missing boolean
 * counts as off, because an unticked checkbox is not submitted.
 *
 * @param array $input Raw input.
 * @return array
 */
function abr_sanitize_options( $input ) {
	$in  = is_array( $input ) ? $input : array();
	$d   = abr_option_defaults();
	$out = array();

	foreach ( abr_option_types() as $key => $type ) {
		$raw = isset( $in[ $key ] ) ? $in[ $key ] : null;
		if ( is_array( $raw ) ) {
			$raw = null;
		}
		switch ( $type ) {
			case 'bool':
				$out[ $key ] = empty( $raw ) ? 0 : 1;
				break;
			case 'text':
				$out[ $key ] = null === $raw ? $d[ $key ] : sanitize_text_field( $raw );
				break;
			case 'textarea':
				$out[ $key ] = null === $raw ? $d[ $key ] : sanitize_textarea_field( $raw );
				break;
			case 'url':
				$out[ $key ] = null === $raw ? $d[ $key ] : esc_url_raw( trim( $raw ) );
				break;
			case 'link':
				$out[ $key ] = null === $raw ? $d[ $key ] : abr_sanitize_link( $raw );
				break;
			case 'menu':
				$out[ $key ] = null === $raw ? $d[ $key ] : abr_sanitize_menu( $raw );
				break;
			case 'menu_primary':
				$out[ $key ] = null === $raw ? $d[ $key ] : abr_sanitize_menu( $raw, ABR_PRIMARY_NAV_MAX, ABR_NAV_CHILDREN_MAX, $key );
				break;
			case 'menu_further':
				$out[ $key ] = null === $raw ? $d[ $key ] : abr_sanitize_menu( $raw, ABR_FURTHER_MAX, 0, $key );
				break;
			case 'menu_secondary':
				$out[ $key ] = null === $raw ? $d[ $key ] : abr_sanitize_menu( $raw, ABR_SECONDARY_NAV_MAX, 0, $key );
				break;
			case 'token':
				$out[ $key ] = null === $raw ? $d[ $key ] : abr_sanitize_token( $raw );
				break;
			case 'ga4':
				$val         = null === $raw ? '' : strtoupper( trim( $raw ) );
				$out[ $key ] = preg_match( '/^G-[A-Z0-9]{4,20}$/', $val ) ? $val : '';
				break;
			case 'email':
				$out[ $key ] = null === $raw ? $d[ $key ] : sanitize_email( $raw );
				break;
			case 'key':
				$val         = null === $raw ? '' : sanitize_key( $raw );
				$out[ $key ] = '' === $val ? $d[ $key ] : $val;
				break;
			case 'slug':
				$val         = null === $raw ? '' : sanitize_title( $raw );
				$out[ $key ] = ( '' === $val || in_array( $val, abr_reserved_slugs(), true ) ) ? $d[ $key ] : $val;
				break;
			case 'login_layout':
				$out[ $key ] = ( null !== $raw && function_exists( 'abr_login_layouts' ) && array_key_exists( $raw, abr_login_layouts() ) ) ? $raw : $d[ $key ];
				break;
			case 'login_photo':
				$out[ $key ] = ( null !== $raw && function_exists( 'abr_login_photos' ) && array_key_exists( $raw, abr_login_photos() ) ) ? $raw : $d[ $key ];
				break;
			case 'hex':
				$hex         = null === $raw ? '' : sanitize_hex_color( $raw );
				$out[ $key ] = $hex ? $hex : $d[ $key ];
				break;
			case 'seed_mode':
				$out[ $key ] = ( null !== $raw && array_key_exists( $raw, abr_seed_modes() ) ) ? $raw : $d[ $key ];
				break;
			case 'mode':
				$out[ $key ] = ( null !== $raw && array_key_exists( $raw, abr_modes() ) ) ? $raw : $d[ $key ];
				break;
			case 'logo_style':
				$out[ $key ] = ( null !== $raw && array_key_exists( $raw, abr_logo_styles() ) ) ? $raw : $d[ $key ];
				break;
			case 'scheme':
				$out[ $key ] = ( null !== $raw && array_key_exists( $raw, abr_schemes() ) ) ? $raw : $d[ $key ];
				break;
		}
	}
	// The login address, its fallback and the search address must differ.
	if ( $out['login_slug'] === $out['login_redirect_slug'] || $out['login_slug'] === $out['search_base'] ) {
		$out['login_hide'] = 0;
		add_settings_error( 'abr_options', 'abr_login_slug', __( 'The login address must differ from the fallback address and the search address. The private login address has been switched off until that is fixed.', 'abrahamic' ) );
	}
	return $out;
}

/**
 * How starter content behaves when the theme ships a newer version of it.
 *
 * @return array slug => label
 */
function abr_seed_modes() {
	return array(
		'replace' => __( 'Replace starter pages with the current version', 'abrahamic' ),
		'keep'    => __( 'Keep my edits to starter pages', 'abrahamic' ),
	);
}

/**
 * Starting colour modes.
 *
 * @return array slug => label
 */
function abr_modes() {
	return array(
		'light'  => __( 'Light', 'abrahamic' ),
		'dark'   => __( 'Dark', 'abrahamic' ),
		'system' => __( 'Follow the visitor\'s device', 'abrahamic' ),
	);
}

/**
 * Logo styles for the header.
 *
 * @return array slug => label
 */
function abr_logo_styles() {
	return array(
		'mark_text' => __( 'AR mark and name', 'abrahamic' ),
		'mark'      => __( 'AR mark only', 'abrahamic' ),
		'text'      => __( 'Name only', 'abrahamic' ),
	);
}

/**
 * Clean a link target: an @token, a root-relative path, an anchor or a full URL.
 *
 * @param string $value Raw value.
 * @return string
 */
function abr_sanitize_link( $value ) {
	$value = trim( wp_strip_all_tags( (string) $value ) );
	if ( '' === $value ) {
		return '';
	}
	if ( '@' === $value[0] ) {
		return '@' . preg_replace( '/[^a-z0-9:_-]/', '', strtolower( substr( $value, 1 ) ) );
	}
	if ( '#' === $value[0] ) {
		return '#' . preg_replace( '/[^A-Za-z0-9_-]/', '', substr( $value, 1 ) );
	}
	return esc_url_raw( $value );
}

/**
 * Clean a navigation definition, line by line.
 *
 * @param string $value Raw value.
 * @return string
 */
function abr_sanitize_menu( $value, $max_top = 0, $max_children = -1, $key = '' ) {
	$lines    = array();
	$top      = 0;
	$children = 0;
	$dropped  = 0;
	foreach ( preg_split( '/\r\n|\r|\n/', (string) $value ) as $line ) {
		$child = (bool) preg_match( '/^\s*-/', $line );
		$line  = preg_replace( '/^\s*-\s*/', '', $line );
		$parts = array_map( 'trim', explode( '|', $line, 3 ) );
		$label = sanitize_text_field( $parts[0] );
		$link  = isset( $parts[1] ) ? abr_sanitize_link( $parts[1] ) : '';
		$hint  = isset( $parts[2] ) ? sanitize_text_field( $parts[2] ) : '';
		if ( '' === $label || '' === $link ) {
			continue;
		}
		if ( $child && ( 0 === $max_children || 0 === $top ) ) {
			$child = false; // No dropdowns here: treat as a top-level line.
		}
		if ( $child ) {
			if ( $top > $max_top && $max_top ) {
				continue; // Belongs to a dropped parent.
			}
			if ( $max_children > 0 && $children >= $max_children ) {
				++$dropped;
				continue;
			}
			++$children;
		} else {
			++$top;
			$children = 0;
			if ( $max_top && $top > $max_top ) {
				++$dropped;
				continue;
			}
		}
		$lines[] = ( $child ? '- ' : '' ) . $label . ' | ' . $link . ( '' !== $hint ? ' | ' . $hint : '' );
	}
	if ( $dropped && $key && function_exists( 'add_settings_error' ) ) {
		$message = 0 === $max_children
			/* translators: 1: number of links removed, 2: link limit. */
			? _n( '%1$d link was removed: this list holds %2$d links.', '%1$d links were removed: this list holds %2$d links.', $dropped, 'abrahamic' )
			/* translators: 1: number of links removed, 2: top-level limit, 3: dropdown limit. */
			: _n( '%1$d main menu link was removed: the main menu holds %2$d top-level links, each with up to %3$d dropdown links. Place extra links under a parent with a leading dash, or in the secondary menu.', '%1$d main menu links were removed: the main menu holds %2$d top-level links, each with up to %3$d dropdown links. Place extra links under a parent with a leading dash, or in the secondary menu.', $dropped, 'abrahamic' );
		add_settings_error( 'abr_options', 'abr-' . $key . '-limit', sprintf( $message, $dropped, $max_top, ABR_NAV_CHILDREN_MAX ), 'warning' );
	}
	return implode( "\n", $lines );
}

/**
 * Clean a verification code; a pasted meta tag is reduced to its content value.
 *
 * @param string $value Raw value.
 * @return string
 */
function abr_sanitize_token( $value ) {
	$value = (string) $value;
	if ( preg_match( '/content=["\']([^"\']+)["\']/i', $value, $m ) ) {
		$value = $m[1];
	}
	return preg_replace( '/[^A-Za-z0-9_\-.:=]/', '', trim( $value ) );
}

/**
 * CSS custom properties for the active scheme. Overrides the theme.json
 * preset variables, so every block using a palette colour follows along.
 *
 * @return string
 */
function abr_scheme_css() {
	$opts    = abr_get_options();
	$schemes = abr_schemes();
	$active  = $opts['scheme'];

	if ( 'custom' === $active ) {
		$colors = array();
		foreach ( array( 'navy', 'ivory', 'gold', 'beige', 'charcoal' ) as $slug ) {
			$colors[ $slug ] = $opts[ 'custom_' . $slug ];
		}
	} else {
		$colors = isset( $schemes[ $active ] ) ? $schemes[ $active ]['colors'] : $schemes['classic']['colors'];
	}

	$css = ':root{';
	foreach ( $colors as $slug => $hex ) {
		$hex = sanitize_hex_color( $hex );
		if ( $hex ) {
			$css .= '--wp--preset--color--' . $slug . ':' . $hex . ';';
		}
	}
	$donate = sanitize_hex_color( $opts['donate_colour'] );
	if ( $donate ) {
		$css .= '--abr-donate:' . $donate . ';';
	}
	$css .= '}';

	if ( ! $opts['sticky_header'] ) {
		$css .= '.abr-header{position:relative}.wp-site-blocks>header.wp-block-template-part{position:static!important}:root{--abr-subnav-top:0px}';
	}
	return $css;
}

/**
 * Body classes driven by options.
 *
 * @param array $classes Body classes.
 * @return array
 */
function abr_option_body_classes( $classes ) {
	if ( ! abr_get_option( 'header_search' ) ) {
		$classes[] = 'abr-no-header-search';
	}
	return $classes;
}
add_filter( 'body_class', 'abr_option_body_classes' );

/**
 * One-time carry-over of settings saved by the 1.x builds, which stored them
 * under `ar_options`. The legacy row is left in place; see docs/upgrading.md.
 */
function abr_migrate_legacy_options() {
	if ( false !== get_option( 'abr_options' ) ) {
		return;
	}
	$legacy = get_option( 'ar_options' );
	if ( is_array( $legacy ) ) {
		// Legacy rows predate the header options, which default to on.
		$legacy = array_merge(
			array(
				'header_search' => 1,
				'header_cta'    => 1,
			),
			$legacy
		);
		update_option( 'abr_options', abr_sanitize_options( $legacy ) );
	}
}
add_action( 'after_switch_theme', 'abr_migrate_legacy_options' );

/**
 * One-time move of the header Donate link from the 2.12.0 default (@donate) to the
 * PayPal page. Runs once, so a later deliberate choice of @donate is kept.
 */
function abr_migrate_donate_link() {
	if ( get_option( 'abr_donate_link_migrated' ) ) {
		return;
	}
	$stored = get_option( 'abr_options' );
	if ( is_array( $stored ) && isset( $stored['header_donate_url'] ) && '@donate' === $stored['header_donate_url'] ) {
		$stored['header_donate_url'] = abr_option_defaults()['header_donate_url'];
		update_option( 'abr_options', $stored );
	}
	update_option( 'abr_donate_link_migrated', 1 );
}
add_action( 'init', 'abr_migrate_donate_link', 5 );

/**
 * One-time addition of Editorial policy and Knowledge base to a stored main menu
 * (2.62.0), at the end, when the menu has room and does not already link them.
 */
function abr_migrate_nav_editorial_kb() {
	if ( get_option( 'abr_nav_editorial_kb_added' ) ) {
		return;
	}
	$stored = get_option( 'abr_options' );
	if ( is_array( $stored ) && ! empty( $stored['nav_header'] ) ) {
		$menu = (string) $stored['nav_header'];
		$top  = 0;
		foreach ( preg_split( '/\R/', $menu ) as $line ) {
			if ( '' !== trim( $line ) && '-' !== substr( ltrim( $line ), 0, 1 ) ) {
				$top++;
			}
		}
		$add = array();
		if ( false === strpos( $menu, '@editorial-policy' ) ) {
			$add[] = 'Editorial | @editorial-policy';
		}
		if ( false === strpos( $menu, 'knowislam.wiki' ) && false === strpos( $menu, '@knowledge-base' ) ) {
			$add[] = 'KB | https://knowislam.wiki/ | Knowledge Base';
		}
		if ( $add && $top + count( $add ) <= ABR_PRIMARY_NAV_MAX ) {
			$stored['nav_header'] = rtrim( $menu ) . "\n" . implode( "\n", $add );
			update_option( 'abr_options', $stored );
		}
	}
	update_option( 'abr_nav_editorial_kb_added', 1 );
}
add_action( 'init', 'abr_migrate_nav_editorial_kb', 5 );

/**
 * One-time shortening of the main-menu label "Editorial policy" to "Editorial"
 * (2.63.1). Only that exact line is changed; any other label is left alone.
 */
function abr_migrate_nav_editorial_label() {
	if ( get_option( 'abr_nav_editorial_label' ) ) {
		return;
	}
	$stored = get_option( 'abr_options' );
	if ( is_array( $stored ) && ! empty( $stored['nav_header'] ) ) {
		$menu = preg_replace( '/^Editorial policy(\s*\|\s*@editorial-policy\s*)$/m', 'Editorial$1', (string) $stored['nav_header'] );
		if ( $menu !== $stored['nav_header'] ) {
			$stored['nav_header'] = $menu;
			update_option( 'abr_options', $stored );
		}
	}
	update_option( 'abr_nav_editorial_label', 1 );
}
add_action( 'init', 'abr_migrate_nav_editorial_label', 6 );

/**
 * One-time shortening of the main-menu label "Knowledge base" to "KB", with
 * "Knowledge Base" as its tooltip (2.63.2). Only that exact line is changed.
 */
function abr_migrate_nav_kb_label() {
	if ( get_option( 'abr_nav_kb_label' ) ) {
		return;
	}
	$stored = get_option( 'abr_options' );
	if ( is_array( $stored ) && ! empty( $stored['nav_header'] ) ) {
		$menu = preg_replace( '/^(\s*-?\s*)Knowledge base\s*\|\s*(https:\/\/knowislam\.wiki\/?)\s*$/mi', '$1KB | $2 | Knowledge Base', (string) $stored['nav_header'] );
		if ( $menu !== $stored['nav_header'] ) {
			$stored['nav_header'] = $menu;
			update_option( 'abr_options', $stored );
		}
	}
	update_option( 'abr_nav_kb_label', 1 );
}
add_action( 'init', 'abr_migrate_nav_kb_label', 6 );

/**
 * One-time rename of two footer links to "About AR" and "Contact AR" (2.63.4),
 * where a stored footer list still carries the 2.61.1 labels.
 */
function abr_migrate_footer_ar_labels() {
	if ( get_option( 'abr_footer_ar_labels' ) ) {
		return;
	}
	$stored = get_option( 'abr_options' );
	if ( is_array( $stored ) && ! empty( $stored['nav_utility'] ) ) {
		$menu = preg_replace(
			array( '/^About this site(\s*\|\s*@about\s*)$/m', '/^Contact us(\s*\|\s*@contact\s*)$/m' ),
			array( 'About AR$1', 'Contact AR$1' ),
			(string) $stored['nav_utility']
		);
		if ( $menu !== $stored['nav_utility'] ) {
			$stored['nav_utility'] = $menu;
			update_option( 'abr_options', $stored );
		}
	}
	update_option( 'abr_footer_ar_labels', 1 );
}
add_action( 'init', 'abr_migrate_footer_ar_labels', 6 );
add_action( 'admin_init', 'abr_migrate_legacy_options', 5 );

/**
 * Register the option with the Settings API.
 */
function abr_register_settings() {
	register_setting(
		'abr_settings',
		'abr_options',
		array(
			'type'              => 'array',
			'sanitize_callback' => 'abr_sanitize_options',
			'default'           => abr_option_defaults(),
		)
	);
}
add_action( 'admin_init', 'abr_register_settings' );

/**
 * Anyone who may edit the theme may save its options.
 *
 * @return string
 */
function abr_options_capability() {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_abr_settings', 'abr_options_capability' );
