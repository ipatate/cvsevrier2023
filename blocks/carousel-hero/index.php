<?php
global $post;
$elements = get_field('carousel_elements', $post->ID);
?>
<?php if ($elements) : ?>
  <div class="gm-block-carousel_wrapper">
    <div class="gm-block-carousel_list gm-carousel-grouped wp-block-group" data-total="<?php echo count($elements); ?>">
      <?php foreach ($elements as $key => $element) : ?>
        <?php $image = $element['image']; ?>
        <div class="gm-block-carousel_item">
          <?php echo wp_get_attachment_image(
            $image['ID'],
            'full',
            false,
            ['loading' => ($key > 0 ? 'lazy' : "eager")]
          ); ?>
          <?php if ($element['title']) : ?>
            <div class="wp-block-group">
              <?php if ($key === 0) : ?>
                <h1 class="wp-block-heading"><?php echo $element['title']; ?></h1>
              <?php else : ?>
                <h2 class="wp-block-heading"><?php echo $element['title']; ?></h2>
              <?php endif; ?>
              <?php if ($element['text']) : ?>
                <p><?php echo $element['text']; ?></p>
              <?php endif; ?>
              <?php if ($element['link']) : ?>
                <div class="wp-block-button">

                  <a href="<?php echo $element['link']; ?>" class="wp-block-button__link wp-element-button">
                    <?php echo __('Read more', 'cvsevrier'); ?>
                  </a>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>