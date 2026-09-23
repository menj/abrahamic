<?php
/**
 * Social profile registry and icon loader.
 * Icons come from assets/icons/social/{slug}.svg (see docs/ssot.md, section 11).
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * Supported networks, grouped as they appear on the settings screen.
 * Order here is the order in the footer row.
 *
 * @return array group label => array( slug => network label )
 */
function abr_social_groups() {
	return array(
		__( 'Social networks', 'abrahamic' )           => array(
			'facebook'  => 'Facebook',
			'instagram' => 'Instagram',
			'x'         => 'X',
			'threads'   => 'Threads',
			'bluesky'   => 'Bluesky',
			'mastodon'  => 'Mastodon',
			'linkedin'  => 'LinkedIn',
			'tiktok'    => 'TikTok',
			'pinterest' => 'Pinterest',
			'snapchat'  => 'Snapchat',
			'reddit'    => 'Reddit',
			'tumblr'    => 'Tumblr',
			'gtribe'    => 'GTribe',
		),
		__( 'Video and audio', 'abrahamic' )           => array(
			'youtube'    => 'YouTube',
			'vimeo'      => 'Vimeo',
			'twitch'     => 'Twitch',
			'spotify'    => 'Spotify',
			'soundcloud' => 'SoundCloud',
			'suno'       => 'Suno',
		),
		__( 'Messaging', 'abrahamic' )                 => array(
			'whatsapp' => 'WhatsApp',
			'telegram' => 'Telegram',
			'signal'   => 'Signal',
			'discord'  => 'Discord',
			'line'     => 'LINE',
			'wechat'   => 'WeChat',
		),
		__( 'Writing and publishing', 'abrahamic' )    => array(
			'substack'          => 'Substack',
			'medium'            => 'Medium',
			'wordpress'         => 'WordPress',
			'wordpress-profile' => 'WordPress.org Profile',
			'goodreads'         => 'Goodreads',
			'issuu'             => 'Issuu',
			'scribd'            => 'Scribd',
			'quora'             => 'Quora',
		),
		__( 'Scholarly and identity', 'abrahamic' )    => array(
			'academia'  => 'Academia.edu',
			'orcid'     => 'ORCID',
			'wikipedia' => 'Wikipedia',
			'wikidata'  => 'Wikidata',
			'isni'      => 'ISNI',
			'viaf'      => 'VIAF',
			'oclc'      => 'OCLC',
		),
		__( 'Creative and professional', 'abrahamic' ) => array(
			'github'   => 'GitHub',
			'behance'  => 'Behance',
			'dribbble' => 'Dribbble',
			'flickr'   => 'Flickr',
			'fiverr'   => 'Fiverr',
		),
	);
}

/**
 * Flat list of networks.
 *
 * @return array slug => label
 */
function abr_social_networks() {
	static $flat = null;
	if ( null === $flat ) {
		$flat = array();
		foreach ( abr_social_groups() as $networks ) {
			$flat += $networks;
		}
	}
	return $flat;
}

/**
 * Option key for a network slug.
 *
 * @param string $slug Network slug.
 * @return string
 */
function abr_social_key( $slug ) {
	return 'social_' . str_replace( '-', '_', $slug );
}

/**
 * Inline SVG for a network. Only registered slugs are read from disk.
 *
 * @param string $slug Network slug.
 * @return string SVG markup, or an empty string for unknown slugs.
 */
function abr_social_icon( $slug ) {
	static $cache = array();

	if ( ! array_key_exists( $slug, abr_social_networks() ) ) {
		return '';
	}
	if ( ! isset( $cache[ $slug ] ) ) {
		$file = ABR_DIR . '/assets/icons/social/' . $slug . '.svg';
		$svg  = is_readable( $file ) ? trim( (string) file_get_contents( $file ) ) : ''; // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		if ( $svg ) {
			$svg = preg_replace(
				'/^<svg /',
				'<svg class="abr-icon abr-icon--social abr-icon--' . esc_attr( $slug ) . '" width="24" height="24" aria-hidden="true" focusable="false" ',
				$svg,
				1
			);
		}
		$cache[ $slug ] = $svg;
	}
	return $cache[ $slug ];
}

/**
 * Profiles with a saved URL, in registry order.
 *
 * @return array slug => array( 'label' => string, 'url' => string )
 */
function abr_social_profiles() {
	$out = array();
	foreach ( abr_social_networks() as $slug => $label ) {
		$url = abr_get_option( abr_social_key( $slug ) );
		if ( $url ) {
			$out[ $slug ] = array(
				'label' => $label,
				'url'   => $url,
			);
		}
	}
	return $out;
}
