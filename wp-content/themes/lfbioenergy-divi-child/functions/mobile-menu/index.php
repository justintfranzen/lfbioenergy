<?php
// register a mobile menu
function lfbio_mobile_menu()
{
  register_nav_menu('lfbio-mobile-menu', __('Mobile Menu'));
}
add_action('init', 'lfbio_mobile_menu');

function lfbio_add_mobile_menu()
{
  ?>
  <div class="mobile-menu-toggle">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
  </div>
  <?php
  $args = ['theme_location' => 'lfbio-mobile-menu', 'menu_class' => 'mobile-menu'];
  wp_nav_menu($args);
}
add_action('et_before_main_content', 'lfbio_add_mobile_menu');
