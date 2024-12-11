<?php
require_once 'bg-image-accordion.php';
require_once 'blog-index.php';
require_once 'slider-buttons.php';
require_once 'location-hours.php';

function noble_register_shortcodes()
{
  register_bg_image_accordion_shortcode();
  register_noble_blog_index_shortcode();
  register_slider_buttons_shortcode();
  register_location_hours_shortcode();
}

add_action('init', 'noble_register_shortcodes');
