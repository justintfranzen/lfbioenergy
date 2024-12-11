<?php

function tbp_write_log($log, $print = false, $show_time = false, $use_print_r = false)
{
  $time = '';
  if ($show_time) {
    $n = new DateTime();
    $n->setTimeZone(new DateTimeZone('America/Chicago'));
    $time = $n->format('Y-m-d g:i:s A') . ' - ';
  }

  if (is_array($log) || is_object($log)) {
    error_log($time . print_r($log, true));
  } else {
    error_log($time . $log);
  }

  if ($print) {
    echo '<pre>';
    if ($use_print_r) {
      print_r($log);
    } else {
      var_dump($log);
    }
    echo '</pre>';
  }
}
