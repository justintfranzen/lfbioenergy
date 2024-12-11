<?php
// register a mobile menu
function noble_mobile_menu()
{
  register_nav_menu('noble-mobile-menu', __('Mobile Menu'));
}
add_action('init', 'noble_mobile_menu');

function noble_add_mobile_menu()
{
  ?>
  <div class="mobile-menu-toggle">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
  </div>
  <?php
  $args = ['theme_location' => 'noble-mobile-menu', 'menu_class' => 'mobile-menu'];
  wp_nav_menu($args);
}
add_action('et_before_main_content', 'noble_add_mobile_menu');

function noble_mobile_utility_menu()
{
  register_nav_menu('noble-mobile-utility-menu', __('Mobile Utility Menu'));
}
add_action('init', 'noble_mobile_utility_menu');
