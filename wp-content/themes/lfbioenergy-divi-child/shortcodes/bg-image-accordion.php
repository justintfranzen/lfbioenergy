<?php
function bg_image_accordion_shortcode($atts)
{
  // Shortcode attributes.
  $a = shortcode_atts(
    [
      'location' => 'Wautoma',
      'description' => 'location description',
      'button-text' => 'button text',
      'button-link' => 'button link',
    ],
    $atts,
  );
  ob_start();
  ?>

        <div class="accordion-content">
          <p class="location"><?php echo $a['location']; ?></p>
            <div class="location-content">
             <p class="location-description"><?php echo $a['description']; ?></p>
             <?php if ($a['button-text']): ?>
             <a href="<?php echo $a['button-link']; ?>" class="location-btn"><?php echo $a['button-text']; ?></a>
              <?php endif; ?>
            </div>
        </div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

function register_bg_image_accordion_shortcode()
{
  add_shortcode('bg_image_accordion', 'bg_image_accordion_shortcode');
}

?>
