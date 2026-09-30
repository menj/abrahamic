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
	// The 2016 Venn diagram image, still found by image search: now drawn in the family-tree article.
	'/wp-content/uploads/2016/09/Abrahamic-Religions-Venn-Diagram.jpg/' => 'post:abrahamic-family-tree',
	'/wp-content/uploads/2016/09/Abrahamic-Religions-Venn-Diagram-130x150.jpg/' => 'post:abrahamic-family-tree',
	'/wp-content/uploads/2016/09/Abrahamic-Religions-Venn-Diagram-259x300.jpg/' => 'post:abrahamic-family-tree',
	'/wp-content/uploads/2016/09/Abrahamic-Religions-Venn-Diagram-52x60.jpg/' => 'post:abrahamic-family-tree',
	// Rank Math redirects on the 2016-2023 site, and that site's post addresses.
	'/millat/'                            => 'post:millat-ibrahim',
	'/the-abrahamic-faiths/'              => 'page:guides',
	'/abrahamic-faiths/'                  => 'page:guides',
	'/why-are-these-religions-abrahamic/' => 'page:guides',
	'/why-abrahamic/'                     => 'page:guides',
	'/the-religion-of-judaism/'           => 'page:judaism',
	'/the-religion-of-christianity/'      => 'page:christianity',
	'/the-religion-of-islam/'             => 'page:islam',
	'/judaism/'                           => 'page:judaism',
	'/christianity/'                      => 'page:christianity',
	'/islam/'                             => 'page:islam',
	'/thank-you-for-your-generosity/'     => 'page:thank-you',
	'/information/'                       => 'page:home',
	// Renamed by the theme.
	'/site-map/'                    => 'page:site-map',
);
