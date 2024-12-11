<?php
if (!function_exists('load_divi_custom_font')) {
  function load_divi_custom_font($fonts)
  {
    // Add font to Divi's font menu
    $custom_font = [
      'proxima-nova' => [
        'styles' => '400,600,700',
        'character_set' => 'latin',
        'type' => 'sans-serif',
        'standard' => 1,
      ],
    ];

    return array_merge($custom_font, $fonts);
  }

  add_filter('et_websafe_fonts', 'load_divi_custom_font', 10, 2);
}
