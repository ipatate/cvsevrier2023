<?php

namespace CVSevrier\PostType;

function gm_event_custom_post_type()
{
    register_post_type(
        'events',
        [
            'labels' => [
                'name' => _('Events'),
                'singular_name' => _('Event'),
            ],
            'show_in_rest' => true,
            'supports' => [
                'title',
                'thumbnail',
                'editor',
            ],
            'public' => true,
            'has_archive' => true,
            'menu_position' => 20,
            'menu_icon' => 'dashicons-calendar',
            'rewrite' => ['slug' => 'evenements', 'with_front' => false],
            'taxonomies' => ['events_categories'],
            'show_in_graphql' => true,
            //   'hierarchical' => true,
            'graphql_single_name' => 'Event',
            'graphql_plural_name' => 'Events',
        ]
    );

    register_taxonomy('events_categories', 'events', [
        'public' => false,
        'show_ui' => true,
        // 'show_in_menu' => true,
        // 'show_in_nav_menus' => true,
        'hierarchical' => true, 'show_tagcloud' => false, 'show_admin_column' => true,             'show_in_rest' => false,
    ]);
}

add_action('init', __NAMESPACE__.'\gm_event_custom_post_type');

/*
 * Add columns to events post list
 */
function add_acf_columns($columns)
{
    return array_merge($columns, [
        'date_event' => __('Date Event'),
    ]);
}
add_filter('manage_events_posts_columns', __NAMESPACE__.'\add_acf_columns');

/*
 * Add columns to events post list
 */
function events_custom_column($column, $post_id)
{
    switch ($column) {
        case 'date_event':
            // get date event
            $_d = get_post_meta($post_id, 'date_event', true);
            if ($_d) {
                $s = strtotime($_d);
                printf('%s %s %s', date('d', $s), date('F', $s), date('Y', $s));
            }
            break;
    }
}
add_action('manage_events_posts_custom_column', __NAMESPACE__.'\events_custom_column', 10, 2);

function custom_post_columns($columns, $post_type)
{
    switch ($post_type) {
        case 'events':
            unset($columns['date']);
            break;
    }

    return $columns;
}

add_filter('manage_posts_columns', __NAMESPACE__.'\custom_post_columns', 10, 2);
