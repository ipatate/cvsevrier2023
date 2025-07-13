<?php

namespace CVSevrier\Inc;


add_action('admin_bar_menu', __NAMESPACE__ . '\wpopt_add_purge_button', 100);

function wpopt_add_purge_button($wp_admin_bar)
{
  if (! is_user_logged_in()) {
    return;
  }
  $user = wp_get_current_user();
  if (! in_array('editor', (array) $user->roles, true)) {
    return;
  }

  $url = wp_nonce_url(
    admin_url('admin-post.php?action=wpopt_purge_cache'),
    'wpopt_purge_cache'
  );

  $args = array(
    'id'    => 'wpopt-purge-cache',
    'title' => 'Purger le cache',
    'href'  => $url,
    'meta'  => array(
      'class' => 'wp-optimize-purge-button',
      'title' => 'Supprimez tous les objets du cache',
    ),
  );
  $wp_admin_bar->add_node($args);
}


add_action('admin_post_wpopt_purge_cache',  __NAMESPACE__ . '\wpopt_handle_purge_request');

function wpopt_handle_purge_request()
{
  if (! check_admin_referer('wpopt_purge_cache')) {
    wp_die('Vérification de sécurité échouée.');
  }

  if (! current_user_can('edit_others_pages')) {
    wp_die('Vous n\'avez pas la permission de purger le cache.');
  }

  if (function_exists('wpo_cache_flush')) {
    wpo_cache_flush();
  } elseif (did_action('wp_optimize_cache_init')) {
    do_action('wp_optimize_flush_cache');
  } elseif (class_exists('\WP_Optimize\Cache\Cache')) {
    \WP_Optimize\Cache\Cache::purge_all();
  }

  $referer = wp_get_referer() ? wp_get_referer() : admin_url();
  $redirect = add_query_arg(array('wpopt_purge' => 'success'), $referer);
  wp_safe_redirect($redirect);
  exit;
}

add_action('admin_notices', __NAMESPACE__ . '\wpopt_purge_admin_notice');
function wpopt_purge_admin_notice()
{
  if (isset($_GET['wpopt_purge']) && $_GET['wpopt_purge'] === 'success') {
    echo '<div class="notice notice-success is-dismissible">';
    echo '<p>Le cache a bien été purgé ✅</p>';
    echo '</div>';
  }
}
