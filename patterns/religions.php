<?php
/**
 * Title: Four traditions
 * Slug: abrahamic/religions
 * Categories: abrahamic
 * Description: Four traditions
 * Keywords: abrahamic, religions
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"tagName":"section","anchor":"religions","className":"abr-section abr-religions","layout":{"type":"constrained"}} -->
<section id="religions" class="wp-block-group abr-section abr-religions">
<!-- wp:group {"align":"wide","className":"abr-section-head","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide abr-section-head">
<!-- wp:paragraph {"className":"abr-label"} -->
<p class="abr-label">The traditions</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"className":"abr-title"} -->
<h2 class="wp-block-heading abr-title">The Abrahamic religions</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"abr-sub"} -->
<p class="abr-sub">Four traditions, three of them large and one very small, each with its own theology, sacred literature and history, and all drawing on a shared prophetic heritage.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","className":"abr-grid abr-grid--4","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide abr-grid abr-grid--4">
<!-- wp:group {"className":"abr-religion is-judaism abr-lift","layout":{"type":"default"}} -->
<div class="wp-block-group abr-religion is-judaism abr-lift">
<!-- wp:html -->
<div class="abr-card-icon"><?php echo abr_icon( 'star-of-david' ); ?></div>
<!-- /wp:html -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Judaism</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Explore Jewish history, traditions, scripture, festivals, communities, and the development of Jewish thought.</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"abr-chips"} -->
<ul class="wp-block-list abr-chips"><!-- wp:list-item -->
<li>Torah</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Hebrew Bible</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Jewish History</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Traditions</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Festivals</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Rabbinic Thought</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-small"} -->
<div class="wp-block-button is-small"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( abr_link( '@judaism', '/religions/judaism/' ) ); ?>">Explore Judaism</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<?php if ( abr_link( '@mandaeism', '' ) ) : ?>
<!-- wp:group {"className":"abr-religion is-mandaeism abr-lift","layout":{"type":"default"}} -->
<div class="wp-block-group abr-religion is-mandaeism abr-lift">
<!-- wp:html -->
<div class="abr-card-icon"><?php echo abr_icon( 'darfash' ); ?></div>
<!-- /wp:html -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Mandaeism</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Meet the Mandaeans of Iraq and Iran: baptism in flowing water, scriptures in Mandaic, and their standing as the Sabians named in the Qur’an.</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"abr-chips"} -->
<ul class="wp-block-list abr-chips"><!-- wp:list-item -->
<li>Ginza Rabba</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>John the Baptist</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Sabians</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Mandaic</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Baptism</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-small"} -->
<div class="wp-block-button is-small"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( abr_link( '@mandaeism', '/religions/mandaeism/' ) ); ?>">Explore Mandaeism</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<?php endif; ?>
<!-- wp:group {"className":"abr-religion is-christianity abr-lift","layout":{"type":"default"}} -->
<div class="wp-block-group abr-religion is-christianity abr-lift">
<!-- wp:html -->
<div class="abr-card-icon"><?php echo abr_icon( 'cross' ); ?></div>
<!-- /wp:html -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Christianity</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Discover the origins, scriptures, traditions, denominations, historical development, and theological ideas of Christianity.</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"abr-chips"} -->
<ul class="wp-block-list abr-chips"><!-- wp:list-item -->
<li>Bible</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Jesus</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Early Christianity</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Denominations</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Christian History</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Theology</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-small"} -->
<div class="wp-block-button is-small"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( abr_link( '@christianity', '/religions/christianity/' ) ); ?>">Explore Christianity</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"abr-religion is-islam abr-lift","layout":{"type":"default"}} -->
<div class="wp-block-group abr-religion is-islam abr-lift">
<!-- wp:html -->
<div class="abr-card-icon"><?php echo abr_icon( 'crescent' ); ?></div>
<!-- /wp:html -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Islam</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Explore Islamic history, the Qur’an, prophetic tradition, schools of thought, civilisations, and diverse Muslim communities.</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"abr-chips"} -->
<ul class="wp-block-list abr-chips"><!-- wp:list-item -->
<li>Qur’an</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Muhammad</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Hadith</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Islamic History</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Schools of Thought</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Muslim Civilisations</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-small"} -->
<div class="wp-block-button is-small"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( abr_link( '@islam', '/religions/islam/' ) ); ?>">Explore Islam</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
