<?php

namespace CVSevrier\Inc;

/**
 * Get all registered core block patterns names
 */
function get_all_pattern_default()
{
    $get_patterns = \WP_Block_Patterns_Registry::get_instance()->get_all_registered();
    $pattern_names = array_map(
        function (array $pattern) {
            return $pattern['name'];
        },
        $get_patterns
    );

    return $pattern_names;
}

/**
 * gutenberg settings
 */
function setup()
{
    // add css style for editor admin
    add_theme_support('editor-styles');
    add_editor_style('style-editor.css');

    // add default block style
    add_theme_support('wp-block-styles');

    // responsive embed
    add_theme_support('responsive-embeds');

    // add category for theme patterns
    register_block_pattern_category('cvsevrier/cvsevrier-patterns', ['label' => __('CVSevrier', 'cvsevrier')]);

    // or remove the theme support for the core-block-patterns
    remove_theme_support('core-block-patterns');

    // remove remote patterns
    add_filter('should_load_remote_block_patterns', '__return_false');

    // Remove all Core Patterns
    $registered_patterns = namespace\get_all_pattern_default();
    foreach ($registered_patterns as $pattern_name) {
        // if the name starts with 'core' remove it
        if (substr($pattern_name, 0, strlen('core')) === 'core') {
            unregister_block_pattern($pattern_name);
        }
    }
}

add_action('init', __NAMESPACE__.'\setup');

function block_category($categories)
{
    array_splice(
        $categories,
        2,
        0,
        [
            [
                'slug' => 'cvsevrier',
                'title' => __('cvsevrier Theme', 'cvsevrier'),
            ],
        ]
    );

    return $categories;
}

add_filter('block_categories_all', __NAMESPACE__.'\block_category', 10, 2);


// Remove Unwanted Block Suggestions of Block Directory
add_action('admin_enqueue_scripts', function () {
	wp_add_inline_script(
		'wp-block-editor',
		"wp.domReady( () => wp.plugins.unregisterPlugin( 'block-directory' ) )");
}
);
