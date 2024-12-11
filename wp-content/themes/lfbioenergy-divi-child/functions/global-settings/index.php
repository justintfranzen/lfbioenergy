<?php

/*===================================================
 * Load Global Settings JSON
 *===================================================*/

function load_global_settings_acf_fields($paths)
{
  $paths[] = dirname(__FILE__) . '/acf-json';
  return $paths;
}

add_filter('acf/settings/load_json', 'load_global_settings_acf_fields');

/*===================================================
 * Add Global Settings Options Page
 *===================================================*/

function add_acf_global_options_page()
{
  if (function_exists('acf_add_options_page')) {
    $args = [
      'page_title' => 'Global Settings',
      'icon_url' => 'dashicons-admin-site',
    ];
    acf_add_options_page($args);
  }
}

add_action('acf/init', 'add_acf_global_options_page');
