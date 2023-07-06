<?php

namespace PressWind\Inc;

function register_acf_options_pages()
{
  // add page for setting section social wall
  if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
      'page_title' => __('Theme Options', 'cvsevrier'),
      'capability' => 'edit_posts',
      'position' => '70',
    ]);
  }
}

add_action('init', __NAMESPACE__ . '\register_acf_options_pages');


add_filter('acf/settings/enable_post_types', '__return_false');
