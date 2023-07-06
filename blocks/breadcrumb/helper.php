<?php

namespace PressWind\Blocks\Breadcrumb;

function get_navigation_by_title($nav_title)
{

  // get wp_navigation post
  $query = new \WP_Query(['post_type' => 'wp_navigation', 'title' => $nav_title, 'post_status' => 'publish']);
  $primary_nav = $query->posts[0] ?? null;

  if (!$primary_nav) {
    return;
  }
  $blocks = parse_blocks($primary_nav->post_content);

  $menu_items = [];
  foreach ($blocks as $key => $value) {
    if ($value['blockName'] === null) {
      continue;
    }
    $parent = ['label' => $value['attrs']['label'], 'url' => $value['attrs']['url'], 'type' => $value['attrs']['type'], 'id' => $value['attrs']['id'], 'isTopLevelLink' => $value['attrs']['isTopLevelLink'] ?? false, 'parent' => null];
    $menu_items[] = $parent;
    if (count($value['innerBlocks'])) {
      foreach ($value['innerBlocks'] as $key => $inner) {
        $menu_items[] = ['label' => $inner['attrs']['label'], 'url' => $inner['attrs']['url'], 'type' => $inner['attrs']['type'], 'id' => $inner['attrs']['id'], 'isTopLevelLink' => $inner['attrs']['isTopLevelLink'], 'parent' => $parent];
      }
    }
  }

  return $menu_items;
}


function has_parent($menu_items)
{
  if (!$menu_items) {
    return;
  }
  global $post;
  if (!$post) {
    return;
  }
  foreach ($menu_items as $menu_item) {
    if ($menu_item['parent'] && $menu_item['id'] === $post->ID) {
      return $menu_item['parent'];
    }
  }
}
