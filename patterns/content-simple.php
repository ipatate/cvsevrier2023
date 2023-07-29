<?php

/**
 * Title: Content simple
 * Slug: cvsevrier/content-simple
 * Categories: cvsevrier/cvsevrier-patterns
 */

?>

<!-- wp:group {"className":"cvs-content-simple","layout":{"type":"constrained"}} -->
<div class="wp-block-group cvs-content-simple"><!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group"><!-- wp:image {"sizeSlug":"large"} -->
    <figure class="wp-block-image size-large"><img src="https://fakeimg.pl/630x480/" alt="" /></figure>
    <!-- /wp:image -->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
  <div class="wp-block-group"><!-- wp:heading {"level":3} -->
    <h3 class="wp-block-heading">Titre</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"textColor":"text-gray"} -->
    <p class="has-text-gray-color has-text-color">Bla Bla</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:button -->
      <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Button</a></div>
      <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->