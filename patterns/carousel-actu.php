<?php

/**
 * Title: Carousel Actualités
 * Slug: cvsevrier/carousel-actu
 * Categories: cvsevrier/cvsevrier-patterns
 */
?>

<!-- wp:group {"className":"cvs-carousel-actu"} -->
<div class="wp-block-group cvs-carousel-actu"><!-- wp:heading {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40"}}}} -->
  <h2 class="wp-block-heading" style="padding-bottom:var(--wp--preset--spacing--40)">Les publications</h2>
  <!-- /wp:heading -->

  <!-- wp:query {"queryId":14,"query":{"perPage":"6","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"tagName":"section","displayLayout":{"type":"list","columns":3},"align":"wide","className":"cvs-carousel-list-actu cvs-carousel-loop","layout":{"type":"default"}} -->
  <section class="wp-block-query alignwide cvs-carousel-list-actu cvs-carousel-loop"><!-- wp:post-template {"className":"cvs-carousel-grouped"} -->
    <!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"align":"wide"} /--></div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"backgroundColor":"quinary","layout":{"type":"default"}} -->
    <div class="wp-block-group has-quinary-background-color has-background"><!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->

      <!-- wp:post-excerpt {"moreText":"Lire la suite"} /-->
    </div>
    <!-- /wp:group -->
    <!-- /wp:post-template -->
  </section>
  <!-- /wp:query -->
</div>
<!-- /wp:group -->