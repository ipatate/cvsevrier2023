<?php

namespace CVSevrier;

if (! defined('WP_ENV')) {
    define('WP_ENV', 'development');
}

// inc, you can modify this files like you want
require_once dirname(__FILE__).'/inc/disable.php';
require_once dirname(__FILE__).'/inc/gutenberg.php';
require_once dirname(__FILE__).'/inc/cookies.php';
require_once dirname(__FILE__).'/inc/blocks-variations.php';

// login
require_once dirname(__FILE__) . '/inc/login_assets.php';

// pwa icons injected in head
if (file_exists(dirname(__FILE__).'/inc/pwa_head.php')) {
    include dirname(__FILE__).'/inc/pwa_head.php';
}

// acf
require_once dirname(__FILE__).'/inc/acf.php';
require_once dirname(__FILE__).'/inc/acf-config.php';

// post type
if (file_exists(dirname(__FILE__).'/post-type/team.php')) {
    include dirname(__FILE__).'/post-type/team.php';
}
// if (file_exists(dirname(__FILE__) . '/post-type/event.php')) {
//   include dirname(__FILE__) . '/post-type/event.php';
// }

// cookie iframe
require_once dirname(__FILE__).'/inc/rgpd-iframe.php';

// blocks
if (file_exists(dirname(__FILE__).'/inc/blocks.php')) {
    include dirname(__FILE__).'/inc/blocks.php';
}

// clean html carousel
if (file_exists(dirname(__FILE__).'/inc/clean_html.php')) {
    include dirname(__FILE__).'/inc/clean_html.php';
}

/**
 * Theme setup.
 */
function setup()
{
    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    load_theme_textdomain('cvsevrier', get_template_directory().'/languages');
}

add_action('after_setup_theme', __NAMESPACE__.'\setup');

if (class_exists('PressWind\PWVite')) {
    /**
     * init assets front
     */
    \PressWind\PWVite::init(port: 3000, path: '');

    /**
     * init assets admin
     */
    \PressWind\PWVite::init(port: 4444, path: '/admin', position: 'editor');

}

/** others settings */

/**
 * sortable plugin
 */
add_filter(
    'simple_page_ordering_is_sortable',
    function ($sortable, $post_type) {
        if ($post_type === 'team') {
            return true;
        }

        return $sortable;
    },
    10,
    2
);

add_filter('simple_page_ordering_is_sortable', function ($sortable, $post_type) {
    if ($post_type === 'page') {
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

add_filter('jetpack_sharing_counts', '__return_false', 99);
add_filter('jetpack_implode_frontend_css', '__return_false', 99);
