<?php

namespace  PressWind;

use function PressWind\Inc\Core\load_assets;

if (!defined('WP_ENV')) {
  define('WP_ENV', 'development');
}

// include core files (don't touch this files !)
require_once dirname(__FILE__) . '/inc/core/core.php';

// inc, you can modify this files like you want
require_once dirname(__FILE__) . '/inc/disable.php';
require_once dirname(__FILE__) . '/inc/gutenberg.php';
require_once dirname(__FILE__) . '/inc/cookies.php';
require_once dirname(__FILE__) . '/inc/blocks-variations.php';

// pwa icons injected in head
if (file_exists(dirname(__FILE__) . '/inc/pwa_head.php')) {
  include dirname(__FILE__) . '/inc/pwa_head.php';
}

// acf
require_once dirname(__FILE__) . '/inc/acf.php';
require_once dirname(__FILE__) . '/inc/acf-config.php';


// post type
if (file_exists(dirname(__FILE__) . '/post-type/team.php')) {
  include dirname(__FILE__) . '/post-type/team.php';
}
// if (file_exists(dirname(__FILE__) . '/post-type/event.php')) {
//   include dirname(__FILE__) . '/post-type/event.php';
// }

// cookie iframe
require_once dirname(__FILE__) . '/inc/rgpd-iframe.php';

// blocks
if (file_exists(dirname(__FILE__) . '/inc/blocks.php')) {
  include dirname(__FILE__) . '/inc/blocks.php';
}


/**
 * Theme setup.
 */
function setup()
{
  add_theme_support('automatic-feed-links');

  add_theme_support('title-tag');

  add_theme_support('post-thumbnails');

  load_theme_textdomain('cvsevrier', get_template_directory() . '/languages');
}

add_action('after_setup_theme', __NAMESPACE__ . '\setup');

/**
 * init assets front
 */
load_assets('press-wind', dirname(__FILE__) . '', '3000');
/**
 * init assets admin
 */
load_assets('press-wind-admin', dirname(__FILE__) . '/admin', '4444', true);



/** others settings */

/**
 * sortable plugin
 */
add_filter(
  'simple_page_ordering_is_sortable',
  function ($sortable, $post_type) {
    if ('team' === $post_type) {
      return true;
    }
    return $sortable;
  },
  10,
  2
);


add_filter('simple_page_ordering_is_sortable', function ($sortable, $post_type) {
  if ('page' === $post_type) {
    return false;
  }
  return $sortable;
}, 10, 2);


/** Excerpt  */
add_filter('excerpt_length', function () {
  return 10;
}, 999);

add_filter('excerpt_more', function () {
  return '...';
}, 999);



// create shortcode team role
function team_role_shortcode($atts)
{
  echo 'lol';
}

add_shortcode('team_role', __NAMESPACE__ . '\team_role_shortcode');
