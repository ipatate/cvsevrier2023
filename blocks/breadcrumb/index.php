<?php

namespace PressWind\Blocks\Breadcrumb;

require_once(dirname(__FILE__) . '/helper.php');

function the_breadcrumb($nav_title)
{
  // adapted for FSE block navigation
  $menu_items = get_navigation_by_title($nav_title);

  $sep = '<span>/</span>';

  if (!is_front_page()) {

    // Start the breadcrumb with a link to your homepage
    echo '<div class="cvs-breadcrumb">';
    echo '<a href="';
    echo get_option('home');
    echo '">';
    // bloginfo('name');
    _e('Home', 'cvsevrier');
    echo '</a>' . $sep;

    // if (is_tax() || is_category() || is_tag()
    // ) {
    //   $term = get_queried_object();
    //   $breadcrumb .= ' &raquo; ' . $term->name;
    // }

    if (is_category() || is_single()) {
      the_category('title_li=');
    } elseif (is_archive() || is_single()) {
      if (is_day()) {
        printf(__('%s', 'text_domain'), get_the_date());
      } elseif (is_month()) {
        printf(__('%s', 'text_domain'), get_the_date(_x('F Y', 'monthly archives date format', 'text_domain')));
      } elseif (is_year()) {
        printf(__('%s', 'text_domain'), get_the_date(_x('Y', 'yearly archives date format', 'text_domain')));
      } else {
        _e('Blog Archives', 'text_domain');
      }
    }
    if ($parent = has_parent($menu_items)) {
      echo '<a href="' . $parent['url'] . '">' . $parent['label'] . '</a>' . $sep;
    }

    if (is_single()) {
      echo $sep;
      the_title();
    }

    if (is_page()) {
      echo the_title();
    }

    if (is_home()) {
      global $post;
      $page_for_posts_id = get_option('page_for_posts');
      if ($page_for_posts_id) {
        $post = get_post($page_for_posts_id);
        setup_postdata($post);
        the_title();
        rewind_posts();
      }
    }


    // Search part.
    if (is_search()) {
      echo __('Search results for', 'cvsevrier') . ' "' . get_search_query() . '"';
    }

    // 404 part.
    if (is_404()) {
      _e('Page not found', 'cvsevrier');
    }

    echo '</div>';
  }
}

echo the_breadcrumb('primary main');
