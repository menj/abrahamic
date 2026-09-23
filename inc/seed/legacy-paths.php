<?php
/**
 * Earlier addresses mapped to the seed key that carries that material now: the
 * site between 2016 and 2023, and addresses the theme itself has since changed.
 * Used for 301 redirects (inc/redirects.php).
 *
 * @package Abrahamic
 */

defined( 'ABSPATH' ) || exit;

return array(
	'/abraham/'                     => 'post:who-was-abraham',
	'/jerusalem/'                   => 'post:jerusalem-in-three-traditions',
	'/millat-ibrahim/'              => 'post:millat-ibrahim',
	'/kedar/'                       => 'post:who-was-kedar',
	'/the-abrahamic-religions/'     => 'page:guides',
	'/dmca-policy/'                 => 'page:dmca',
	'/thank-you/'                   => 'page:thank-you',
	'/sitemap/'                     => 'page:site-map',
	'/contact-abrahamic-religions/' => 'page:contact',
	// Renamed by the theme.
	'/site-map/'                    => 'page:site-map',
);
