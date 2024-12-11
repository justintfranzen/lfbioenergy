<?php
function location_hours_shortcode($atts)
{
  // Shortcode attributes.
  $a = shortcode_atts(
    [
      'day' => 'Monday',
      'hours' => '8-4',
    ],
    $atts,
  );
  ob_start();
  ?>

        <span class="day"><?php echo $a['day']; ?></span><span class="hours"><?php echo $a['hours']; ?></span>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

function register_location_hours_shortcode()
{
  add_shortcode('location_hours', 'location_hours_shortcode');
}

?>
