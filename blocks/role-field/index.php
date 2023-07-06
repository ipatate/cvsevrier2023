<?php
global $post;
$position = get_field('team_role', $post->ID);
?>
<?php if ($position) : ?>
  <p class="font-semibold text-dark-gray"><?php echo $position; ?></p>
<?php endif; ?>