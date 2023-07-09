<?php

/**
 * Description: Display ....
 * Version:     0.1.0
 * Author:      Faramaz Pat <info@goodmotion.fr>
 * License:     MIT License
 * Text Domain: gm-addock
 **/

defined('ABSPATH') || exit;
/**
 * Load all translations for our plugin from the MO file.
 */
function gm_addock_load_textdomain()
{
  load_plugin_textdomain('gm-addock', false, basename(__DIR__) . '/languages');
}



function init_addock_block()
{
  if (!function_exists('register_block_type')) {
    // Gutenberg is not active.
    return;
  }


  // script for admin
  wp_register_script(
    'gm-addock-js',
    get_template_directory_uri() . '/old-blocks/block-addock/' . 'dist/main.js',
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
    'gm-addock-editor-css',
    get_template_directory_uri() . '/old-blocks/block-addock/' . 'dist/editor.css',
    [],
    null
  );

  // style for admin editor
  wp_register_style(
    'gm-addock-front-css',
    get_template_directory_uri() . '/old-blocks/block-addock/' . 'dist/main.css',
    [],
    null
  );

  // create block
  register_block_type(
    'gm/addock',
    [
      'editor_script' => 'gm-addock-js',
      'editor_style'  => 'gm-addock-editor-css',
      'style'  => 'gm-addock-front-css',
      'attributes' => [
        'hash' => [
          'type' => "string",
          'default' => ""
        ]
      ]
    ]
  );

  if (function_exists('wp_set_script_translations')) {
    /**
     * May be extended to wp_set_script_translations( 'my-handle', 'my-domain',
     * plugin_dir_path( MY_PLUGIN ) . 'languages' ) ). For details see
     * https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
     */
    wp_set_script_translations('gm/addock', 'gm-addock');
  }
}


// add js script on front
function gm_addock_frontend_scripts()
{
  // if (has_block('gm/addock')) {
  wp_enqueue_script(
    'gm-addock-front',
    get_template_directory_uri() . '/old-blocks/block-addock/dist/gm-addock.js',
    [],
    filemtime(get_template_directory() . '/old-blocks/block-addock/dist/gm-addock.js'),
    true
  );
  // }
}

add_filter(
  'script_loader_tag',
  function ($tag, $handle) use ($PLUGIN_NAME) {
    if ('gm-addock-front' !== $handle)
      return $tag;
    return str_replace(' src', ' async="async" src', $tag);
  },
  10,
  2
);

// add script in front if block exist
add_action('wp_enqueue_scripts', 'gm_addock_frontend_scripts');

// init block
add_action('init', 'gm_addock_load_textdomain');
add_action('init', 'init_addock_block');
