<?php
/**
 * Title: Featured topics
 * Slug: abrahamic/topics
 * Categories: abrahamic
 * Description: Featured topics
 * Keywords: abrahamic, topics
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"tagName":"section","anchor":"topics","className":"abr-section abr-topics is-white","layout":{"type":"constrained"}} -->
<section id="topics" class="wp-block-group abr-section abr-topics is-white">
<!-- wp:group {"align":"wide","className":"abr-section-head","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide abr-section-head">
<!-- wp:paragraph {"className":"abr-label"} -->
<p class="abr-label">X · Paths to Explore</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"className":"abr-title"} -->
<h2 class="wp-block-heading abr-title">Featured topics</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","className":"abr-grid abr-grid--4","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide abr-grid abr-grid--4">
<!-- wp:html -->
<div class="abr-topic abr-lift"><a href="<?php echo esc_url( abr_category_url( 'religion' ) ); ?>"><?php echo abr_icon( 'book' ); ?><span>Religion</span></a></div>
<!-- /wp:html -->
<!-- wp:html -->
<div class="abr-topic abr-lift"><a href="<?php echo esc_url( abr_category_url( 'history' ) ); ?>"><?php echo abr_icon( 'history' ); ?><span>History</span></a></div>
<!-- /wp:html -->
<!-- wp:html -->
<div class="abr-topic abr-lift"><a href="<?php echo esc_url( abr_category_url( 'scripture' ) ); ?>"><?php echo abr_icon( 'scroll' ); ?><span>Scripture</span></a></div>
<!-- /wp:html -->
<!-- wp:html -->
<div class="abr-topic abr-lift"><a href="<?php echo esc_url( abr_category_url( 'theology' ) ); ?>"><?php echo abr_icon( 'pray' ); ?><span>Theology</span></a></div>
<!-- /wp:html -->
<!-- wp:html -->
<div class="abr-topic abr-lift"><a href="<?php echo esc_url( abr_category_url( 'culture' ) ); ?>"><?php echo abr_icon( 'globe' ); ?><span>Culture</span></a></div>
<!-- /wp:html -->
<!-- wp:html -->
<div class="abr-topic abr-lift"><a href="<?php echo esc_url( abr_category_url( 'philosophy' ) ); ?>"><?php echo abr_icon( 'lamp' ); ?><span>Philosophy</span></a></div>
<!-- /wp:html -->
<!-- wp:html -->
<div class="abr-topic abr-lift"><a href="<?php echo esc_url( abr_category_url( 'archaeology' ) ); ?>"><?php echo abr_icon( 'archway' ); ?><span>Archaeology</span></a></div>
<!-- /wp:html -->
<!-- wp:html -->
<div class="abr-topic abr-lift"><a href="<?php echo esc_url( abr_category_url( 'interfaith-studies' ) ); ?>"><?php echo abr_icon( 'handshake' ); ?><span>Interfaith studies</span></a></div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
