<?php
/**
 * Title: Shared Heritage
 * Slug: abrahamic/heritage
 * Categories: abrahamic
 * Description: Shared Heritage
 * Keywords: abrahamic, heritage
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"tagName":"section","anchor":"heritage","className":"abr-section abr-heritage is-dark","layout":{"type":"constrained"}} -->
<section id="heritage" class="wp-block-group abr-section abr-heritage is-dark">
<!-- wp:group {"align":"wide","className":"abr-section-head is-left","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide abr-section-head is-left">
<!-- wp:paragraph {"className":"abr-label"} -->
<p class="abr-label">II · The Root</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"className":"abr-title"} -->
<h2 class="wp-block-heading abr-title">One heritage, different traditions</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"abr-sub"} -->
<p class="abr-sub">Judaism, Mandaeism, Christianity and Islam share figures, narratives and places, and read them in different ways.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","className":"abr-grid abr-grid--2","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide abr-grid abr-grid--2">
<!-- wp:html -->
<div class="abr-lineage" role="img" aria-label="Lineage diagram: Abraham, then ancient Israelite and biblical traditions, branching into Judaism, Christianity and Islam, with Mandaeism sharing the prophets from Adam to Shem and John the Baptist">
<div class="abr-lineage__node">Abraham<small>Patriarch, father of many nations</small></div>
<div class="abr-lineage__arrow"><?php echo abr_icon( 'arrow-down' ); ?></div>
<div class="abr-lineage__node">Ancient Israelite and Biblical Traditions<small>Covenant, law, prophecy</small></div>
<div class="abr-lineage__arrow"><?php echo abr_icon( 'arrow-down' ); ?></div>
<div class="abr-lineage__split">
<div class="abr-lineage__node">Judaism<small>Torah, rabbinic tradition</small></div>
<div class="abr-lineage__node">Christianity<small>Old and New Testament</small></div>
<div class="abr-lineage__node">Islam<small>Qur’an, prophetic tradition</small></div>
</div>
<?php if ( abr_link( '@mandaeism', '' ) ) : ?>
<div class="abr-lineage__aside"><div class="abr-lineage__node">Mandaeism<small>Adam to Shem, John the Baptist</small></div><small class="abr-lineage__note">Shares the prophets from Adam to Shem; does not accept Abraham.</small></div>
<?php endif; ?>
<p class="abr-lineage__note"><?php echo abr_icon( 'info' ); ?>The diagram traces historical and theological connections. It does not imply that the traditions share identical doctrines.</p>
</div>
<!-- /wp:html -->
<!-- wp:group {"className":"abr-heritage__copy","layout":{"type":"default"}} -->
<div class="wp-block-group abr-heritage__copy">
<!-- wp:paragraph -->
<p>The shared heritage of these traditions centres on the figure of Abraham, yet each community has developed its own interpretation of scripture, law, theology, and practice. Scholars continue to examine both the connections and the divergences that shape these faiths.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Tracing those relationships deepens the reader’s grasp of religious history and human culture.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-gold"} -->
<div class="wp-block-button is-style-gold"><a class="wp-block-button__link wp-element-button" href="#comparison">Explore the shared heritage</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:shortcode -->
[abr_back_to_top]
<!-- /wp:shortcode -->
</section>
<!-- /wp:group -->
