<?php

namespace CVSevrier;

if (! defined('WP_ENV')) {
    define('WP_ENV', 'development');
}

// inc, you can modify this files like you want
require_once dirname(__FILE__).'/inc/setup.php';
require_once dirname(__FILE__).'/inc/assets.php';
require_once dirname(__FILE__).'/inc/gutenberg.php';
require_once dirname(__FILE__).'/inc/cookies.php';
require_once dirname(__FILE__).'/inc/sortable.php';
require_once dirname(__FILE__).'/inc/blocks-variations.php';

// login
require_once dirname(__FILE__).'/inc/login_assets.php';

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


/** Excerpt  */
//add_filter('excerpt_length', function () {
//    return 10;
//}, 999);
//
//add_filter('excerpt_more', function () {
//    return '...';
//}, 999);

