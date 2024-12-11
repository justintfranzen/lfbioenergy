<?php
function slider_buttons_shortcode($atts)
{
  // Shortcode attributes.
  $a = shortcode_atts(
    [
      'button-text' => 'primary',
      'button-link' => 'button link',
    ],
    $atts,
  );
  ob_start();
  ?>

          <a href="<?php echo $a['button-link']; ?>"><?php echo $a['button-text']; ?></a>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

function register_slider_buttons_shortcode()
{
  add_shortcode('slider_buttons', 'slider_buttons_shortcode');
}

?>
