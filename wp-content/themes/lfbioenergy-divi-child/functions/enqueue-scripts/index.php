<?php
function lfbioenergy_child_theme_enqueue_styles()
{
  $site_version = defined('LFBIOENERGY_SITE_VERSION') ? NOBLE_SITE_VERSION : '1.0.0';
  wp_enqueue_style('lfbioenergy-divi-child', get_stylesheet_directory_uri() . '/dist/index.css', [], $site_version);
}
add_action('wp_enqueue_scripts', 'lfbioenergy_child_theme_enqueue_styles', 9999999);

function lfbioenergy_child_theme_enqueue_scripts()
{
  $site_version = defined('LFBIOENERGY_SITE_VERSION') ? NOBLE_SITE_VERSION : '1.0.0';
  wp_enqueue_script(
    'lfbioenergy-divi-child-divi-child',
    get_stylesheet_directory_uri() . '/dist/index.js',
    [],
    $site_version,
    true,
  );
  wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/88c504b7a6.js', '', '6.0.1', false);
}
add_action('wp_enqueue_scripts', 'lfbioenergy_child_theme_enqueue_scripts', 11);

function lfbioenergy_disable_classic_theme_styles()
{
  wp_deregister_style('classic-theme-styles');
  wp_dequeue_style('classic-theme-styles');
}
add_filter('wp_enqueue_scripts', 'lfbioenergy_disable_classic_theme_styles', 100);
