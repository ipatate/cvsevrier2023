<?php $socials = get_field('social_link', 'option'); ?>
<?php if ($socials) : ?>
  <ul class="cvs-social-links">
    <?php foreach ($socials as $social) : ?>
      <li class="social-link">
        <a href="<?php echo $social['social_url']; ?>" title="<?php echo $social['social_name']; ?>" target="_blank" rel="noopener noreferrer">
          <?php if (file_exists(dirname(__FILE__) . '/../../assets/media/' . $social['social_name'] . '.svg')) : ?>
            <?php echo file_get_contents(dirname(__FILE__) . '/../../assets/media/' . $social['social_name'] . '.svg'); ?>
          <?php endif; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>