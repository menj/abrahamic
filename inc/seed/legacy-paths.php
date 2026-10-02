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
	// Article addresses shortened in 2.80.0 (Rank Math's 75-character limit on the full address).
	'/journal/how-the-abrahamic-religions-understand-monotheism/' => 'post:how-the-abrahamic-religions-understand-monotheism',
	'/journal/understanding-the-bible-and-the-quran-in-historical-context/' => 'post:understanding-the-bible-and-the-quran-in-historical-context',
	'/journal/prayer-across-the-abrahamic-traditions/' => 'post:prayer-across-the-abrahamic-traditions',
	'/journal/what-archaeology-tells-us-about-the-ancient-near-east/' => 'post:what-archaeology-tells-us-about-the-ancient-near-east',
	'/journal/faith-and-reason-in-medieval-thought/' => 'post:faith-and-reason-in-medieval-thought',
	'/journal/interfaith-dialogue-in-the-modern-era/' => 'post:interfaith-dialogue-in-the-modern-era',
	'/journal/john-the-baptist-in-four-traditions/' => 'post:john-the-baptist-in-four-traditions',
	'/journal/the-preservation-and-transmission-of-scripture/' => 'post:the-preservation-and-transmission-of-scripture',
	'/journal/al-ghazali-ibn-rushd-and-the-limits-of-reason/' => 'post:al-ghazali-ibn-rushd-and-the-limits-of-reason',
	'/journal/the-amman-message-and-a-common-word/' => 'post:the-amman-message-and-a-common-word',
	'/journal/the-population-of-the-abrahamic-religions/' => 'post:the-population-of-the-abrahamic-religions',
	'/journal/apostasy-in-the-abrahamic-traditions/' => 'post:apostasy-in-the-abrahamic-traditions',
	'/journal/the-sabians-in-classical-muslim-scholarship/' => 'post:the-sabians-in-classical-muslim-scholarship',
	'/journal/religious-law-in-the-abrahamic-traditions/' => 'post:religious-law-in-the-abrahamic-traditions',
	'/journal/war-and-peace-in-the-abrahamic-traditions/' => 'post:war-and-peace-in-the-abrahamic-traditions',
	'/journal/ishmael-in-the-abrahamic-traditions/' => 'post:ishmael-in-the-abrahamic-traditions',
	'/journal/what-the-quran-says-about-the-bible/' => 'post:what-the-quran-says-about-the-bible',
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
