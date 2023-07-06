<?php $partners = get_field('partner_logo', 'option'); ?>
<?php if ($partners) : ?>
  <div class="wp-block-group alignwide is-layout-flow">
    <ul class="cvs-partner-list">
      <?php foreach ($partners as $partner) : ?>
        <li class="cvs-partner">
          <a href="<?php echo $partner['partner_link']; ?>" title="<?php echo $partner['partner_name']; ?>" target="_blank" rel="noopener noreferrer">
            <?php echo wp_get_attachment_image($partner['partner_logo'], 'medium'); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>