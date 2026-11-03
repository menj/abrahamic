<?php
/**
 * Fixed publication dates for starter content.
 *
 * An item in inc/seed/content.json may carry `post_date`, a fixed date in site
 * time ("YYYY-MM-DD HH:MM:SS", or "YYYY-MM-DD" for 09:00). A date in the past
 * publishes the post with that date; a date still to come creates it as
 * Scheduled (`future`), and WP-Cron publishes it on the day. An item without
 * the field keeps the older behaviour (published now, or `days_ago` back).
 *
 * Kept free of WordPress calls so tests/seed-schedule-test.php can run it.
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

/**
 * The status and dates a new seeded post takes from its `post_date` field.
 *
 * @param array         $item    Seed item.
 * @param int           $now_gmt Current Unix time.
 * @param \DateTimeZone $tz      Site time zone.
 * @return array|null `post_status`, `post_date` (site time) and `post_date_gmt`,
 *                    or null when the item has no valid `post_date`.
 */
function abr_seed_schedule( $item, $now_gmt, $tz ) {
	if ( empty( $item['post_date'] ) || ! is_string( $item['post_date'] ) ) {
		return null;
	}
	$raw = trim( $item['post_date'] );
	if ( preg_match( '/^\d{4}-\d{2}-\d{2}$/', $raw ) ) {
		$raw .= ' 09:00:00';
	} elseif ( preg_match( '/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/', $raw ) ) {
		$raw .= ':00';
	}
	$local = \DateTimeImmutable::createFromFormat( '!Y-m-d H:i:s', $raw, $tz );
	$errors = \DateTimeImmutable::getLastErrors();
	if ( ! $local || ( $errors && ( $errors['warning_count'] || $errors['error_count'] ) ) || $local->format( 'Y-m-d H:i:s' ) !== $raw ) {
		return null;
	}
	$gmt = $local->setTimezone( new \DateTimeZone( 'UTC' ) );
	return array(
		'post_status'   => $gmt->getTimestamp() > (int) $now_gmt ? 'future' : 'publish',
		'post_date'     => $local->format( 'Y-m-d H:i:s' ),
		'post_date_gmt' => $gmt->format( 'Y-m-d H:i:s' ),
	);
}
