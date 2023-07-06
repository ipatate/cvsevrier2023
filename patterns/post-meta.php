<?php

/**
 * Title: Post Meta
 * Slug: cvsevrier/post-meta
 * Categories: cvsevrier/cvsevrier-patterns
 * inserter: false
 */
?>
<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40",
"bottom":"var:preset|spacing|40"
}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40);
margin-bottom:var(--wp--preset--spacing--40)">
  <!-- wp:group {"style":{"spacing":{"blockGap":"0.5ch"}},"layout":{"type":"flex"}} -->
  <div class="wp-block-group">
    <!-- wp:paragraph -->
    <p>
      <?php echo esc_html_x('Posted the', 'Verb to explain the publication status of a post', 'barthelemy'); ?>
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:post-date {"format": "d m Y"} /-->

  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->