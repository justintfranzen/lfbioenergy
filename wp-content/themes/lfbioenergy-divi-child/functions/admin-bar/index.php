<?php

/*===================================================
 * Move Margin to bottom of page
 *===================================================*/
function tbp_remove_admin_login_header()
{
  remove_action('wp_head', '_admin_bar_bump_cb');
}
function tbp_add_admin_login_header()
{
  if (is_admin_bar_showing()): ?>
    <style>
      html {  
        margin-bottom: 32px;  
      }
      #wpadminbar {
        top: auto;
        bottom: 0;
        position: fixed !important;
        width: 100%;
      }
      #wpadminbar .ab-sub-wrapper {
          bottom: 100%;
      }
      #wpadminbar ul li {
        background-color: #23282d;
      }
    </style>
  <?php endif;
}
add_action('get_header', 'tbp_remove_admin_login_header');
add_action('wp_head', 'tbp_add_admin_login_header');
