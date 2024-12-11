<?php
defined('ABSPATH') || exit();

// -----------------------------------------------------------------------------

// Use Classic Editor over Gutenberg
function tbp_disable_gutenberg()
{
  return false;
}
add_filter('gutenberg_can_edit_post_type', 'tbp_disable_gutenberg');
add_filter('use_block_editor_for_post_type', 'tbp_disable_gutenberg');

// Remove Classic Editor altogether
//function tbp_disable_classic_editor()
//{
//  remove_post_type_support('page', 'editor');
//  remove_post_type_support('post', 'editor');
//}
//add_action('admin_head', 'tbp_disable_classic_editor');

// Disable emojis in WordPress
add_action('init', 'tbp_disable_emojis');
function tbp_disable_emojis()
{
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter('tiny_mce_plugins', 'tbp_disable_emojis_tinymce');
}
function tbp_disable_emojis_tinymce($plugins)
{
  return is_array($plugins) ? array_diff($plugins, ['wpemoji']) : [];
}

// Remove duotone support for Gutenberg blocks
add_action('init', 'tbp_remove_duotone_support');
function tbp_remove_duotone_support()
{
  remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
  remove_filter('render_block', 'wp_render_duotone_support');
}

// Remove Gutenberg block styles
add_action('enqueue_block_assets', 'tbp_deregister_wp_styles', 1);
function tbp_deregister_wp_styles()
{
  wp_deregister_style('wp-block-library');
  wp_register_style('wp-block-library', '');
}
