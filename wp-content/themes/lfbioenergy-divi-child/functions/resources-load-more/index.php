<?php
// register a mobile menu
function dpdfg_custom_loader()
{
  ob_start(); ?>
  <div class="dp-dfg-loader"><div class="my_custom_loader"></div></div>
  <style>
    .dp-dfg-loader {
      position: absolute;
      top: 50%;
      left: 50%;
      margin-top: -30px;
      margin-left: -30px;
    }
    .my_custom_loader {
      border: 8px solid #f3f3f3;
      border-top: 8px solid #3b804d;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      animation: spin 2s linear infinite;
      margin: 0 auto;
    }
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
  <?php return ob_get_clean();
}

add_filter('dpdfg_custom_loader', 'dpdfg_custom_loader');
