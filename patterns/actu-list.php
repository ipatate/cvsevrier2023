<?php

/**
 * Title: List Actualités
 * Slug: cvsevrier/list-actu
 * Categories: cvsevrier/cvsevrier-patterns
 */
?>

<!-- wp:query {"queryId":4,"query":{"perPage":"15","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"flex","columns":3},"className":"bart-actu-list"} -->
<div class="wp-block-query cvs-actu-list">
  <!-- wp:post-template -->
  <!-- wp:post-featured-image {"isLink":true} /-->

  <!-- wp:post-date /-->

  <!-- wp:post-title {"isLink":true,"style":{"typography":{"lineHeight":"1.2"}},"fontSize":"x-large"} /-->

  <!-- wp:post-excerpt {"moreText":"Lire la suite"} /-->
  <!-- /wp:post-template -->

  <!-- wp:query-pagination -->
  <!-- wp:query-pagination-previous /-->

  <!-- wp:query-pagination-numbers /-->

  <!-- wp:query-pagination-next /-->
  <!-- /wp:query-pagination -->

  <!-- wp:query-no-results -->
  <!-- wp:paragraph {"placeholder":"Ajouter un texte ou des blocs qui s’afficheront lorsqu’une requête ne renverra aucun résultat."} -->
  <p></p>
  <!-- /wp:paragraph -->
  <!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->