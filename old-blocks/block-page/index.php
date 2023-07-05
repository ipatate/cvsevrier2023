<?php

/**
 * Description: Display ....
 * Version:     0.1.0
 * Author:      Faramaz Pat <info@goodmotion.fr>
 * License:     MIT License
 * Text Domain: gm-page
 **/

defined('ABSPATH') || exit;
/**
 * Load all translations for our plugin from the MO file.
 */
function gm_page_load_textdomain()
{
  load_plugin_textdomain('gm-page', false, basename(__DIR__) . '/languages');
}


function init_page_block()
{
  if (!function_exists('register_block_type')) {
    // Gutenberg is not active.
    return;
  }

  // script for admin
  wp_register_script(
    'gm-page-js',
    get_template_directory_uri() . '/old-blocks/block-page/' . 'dist/main.js',
    [
      'wp-element',
      'wp-block-editor',
      // 'wp-server-side-render',
      // 'wp-editor',
      // 'wp-compose',
      'wp-data',
      'wp-components',
      'wp-i18n',
      'wp-blocks',
    ],
    '',
    null,
    true
  );

  // style for admin editor
  wp_register_style(
    'gm-page-editor-css',
    get_template_directory_uri() . '/old-blocks/block-page/' . 'dist/editor.css',
    [],
    null
  );

  // style for front
  // wp_register_style(
  //     'gm-page-public-css',
  //     get_template_directory_uri() . '/blocks/block-page/' . 'dist/styles.css',
  //     [],
  //     null
  // );

  // create block
  register_block_type(
    'gm/page',
    [
      'editor_script' => 'gm-page-js',
      'editor_style'  => 'gm-page-editor-css',
      // 'style'  => 'gm-page-public-css',
    ]
  );

  if (function_exists('wp_set_script_translations')) {
    /**
     * May be extended to wp_set_script_translations( 'my-handle', 'my-domain',
     * plugin_dir_path( MY_PLUGIN ) . 'languages' ) ). For details see
     * https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
     */
    wp_set_script_translations('gm/page', 'gm-page');
  }
}


// init block
add_action('init', 'gm_page_load_textdomain');
add_action('init', 'init_page_block');
