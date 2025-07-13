<?php

namespace CVSevrier\Inc;

/**
 * Theme setup.
 */
function setup_base(): void
{
  add_theme_support('automatic-feed-links');

  add_theme_support('title-tag');

  add_theme_support('post-thumbnails');

  // load i18n text
  load_theme_textdomain('cvsevrier', get_template_directory() . '/languages');
}

add_action('after_setup_theme', __NAMESPACE__ . '\setup_base');


add_filter('jetpack_sharing_counts', '__return_false', 99);
add_filter('jetpack_implode_frontend_css', '__return_false', 99);

// Removes JPEG compression.
add_filter('jpeg_quality', function () {
  return 100;
}, 10, 2);
