<?php
$address = get_field('address', 'option');
$phone = get_field('phone', 'option');
?>
<div>
  <?php if ($address) : ?>
    <p><?php echo $address; ?></p>
  <?php endif; ?>
  <?php if ($phone) : ?>
    <p>
      <a href="tel:330<?php echo str_replace(' ', '', $phone); ?>" title="<?php _e('contact phone'); ?>">
        +33 (0)<?php echo $phone; ?>
      </a>
    </p>
  <?php endif; ?>
</div>