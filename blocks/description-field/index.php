<?php
global $post;
$desc = get_field('team_description', $post->ID);
?>
<?php if ($desc) : ?>
  <p><?php echo $desc; ?></p>
<?php endif; ?>