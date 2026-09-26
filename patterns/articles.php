<?php
/**
 * Title: Latest Journal Entries
 * Slug: abrahamic/articles
 * Categories: abrahamic
 * Description: Three most recent posts in a card grid.
 * Keywords: abrahamic, articles
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"tagName":"section","anchor":"articles","className":"abr-section abr-articles","layout":{"type":"constrained"}} -->
<section id="articles" class="wp-block-group abr-section abr-articles">
<!-- wp:group {"align":"wide","className":"abr-articles-head","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group alignwide abr-articles-head">
<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"abr-label"} -->
<p class="abr-label">IX · The Journey Continues</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"className":"abr-title"} -->
<h2 class="wp-block-heading abr-title">From the archive</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline is-small"} -->
<div class="wp-block-button is-style-outline is-small"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( abr_link( '@journal', '/journal/' ) ); ?>">Read the journal</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- wp:query {"queryId":11,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"abr-article abr-lift","layout":{"type":"default"}} -->
<div class="wp-block-group abr-article abr-lift"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->
<!-- wp:group {"className":"abr-article__body","layout":{"type":"default"}} -->
<div class="wp-block-group abr-article__body"><!-- wp:post-terms {"term":"category"} /-->
<!-- wp:post-title {"level":3,"isLink":true} /-->
<!-- wp:post-excerpt {"excerptLength":22} /-->
<!-- wp:group {"className":"abr-article__meta","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group abr-article__meta"><!-- wp:post-date {"format":"F Y"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->
<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p>New articles are in preparation.</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->
</section>
<!-- /wp:group -->
