<?php

namespace CVSevrier\PostType;

function gm_team_custom_post_type()
{

    register_post_type(
        'teams',
        [
            'labels' => [
                'name' => _('Teams'),
                'singular_name' => _('Team'),
            ],
            'show_in_rest' => true,
            'supports' => [
                'title',
                'page-attributes',
                'thumbnail',
                // 'editor'
            ],
            'public' => true,
            'has_archive' => false,
            'publicly_queryable' => false,
            'menu_position' => 20,
            'menu_icon' => 'dashicons-admin-users',
            'rewrite' => ['slug' => 'equipe', 'with_front' => false],
            'taxonomies' => ['teams_categories'],
        ]
    );

    register_taxonomy('teams_categories', 'teams', [
        'public' => true,
        'show_ui' => true,
        'hierarchical' => true, 'show_tagcloud' => false, 'show_admin_column' => true,             'show_in_rest' => true,
    ]);
}
add_action('init', __NAMESPACE__.'\gm_team_custom_post_type');

function custom_post_teams_columns($columns, $post_type)
{
    switch ($post_type) {
        case 'teams':
            // unset($columns['title']);
            unset($columns['seopress_title']);
            break;
    }

    return $columns;
}
add_filter('manage_posts_columns', __NAMESPACE__.'\custom_post_teams_columns', 10, 2);

add_filter('manage_teams_posts_columns', __NAMESPACE__.'\set_custom_edit_teams_columns');

function set_custom_edit_teams_columns($columns)
{
    $columns['menu_order'] = __('Order');

    return $columns;
}

add_action('manage_teams_posts_custom_column', __NAMESPACE__.'\custom_teams_column', 10, 2);

function custom_teams_column($column, $post_id)
{
    switch ($column) {

        // display a thumbnail $post_idphoto
        case 'menu_order':
            $this_post = get_post($post_id);
            echo $this_post->menu_order;
            break;
    }
}

add_filter('manage_edit-teams_sortable_columns', __NAMESPACE__.'\set_custom_teams_sortable_columns');

function set_custom_teams_sortable_columns($columns)
{
    $columns['menu_order'] = 'menu_order';

    return $columns;
}
