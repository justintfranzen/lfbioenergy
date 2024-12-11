<?php
defined('ABSPATH') || exit();

// -----------------------------------------------------------------------------
// Unregister Project Post Type that Divi Adds
function tbp_custom_unregister_pb_post_types()
{
  global $wp_post_types;
  if (isset($wp_post_types['project'])) {
    unset($wp_post_types['project']);
  }
}
add_action('init', 'tbp_custom_unregister_pb_post_types', 20);
