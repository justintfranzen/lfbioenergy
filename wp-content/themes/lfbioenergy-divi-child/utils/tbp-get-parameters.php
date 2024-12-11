<?php
function tbp_get_parameters($slug, $array = false)
{
  if (isset($_GET[$slug])) {
    // Make sure there is a query
    if ($array == true) {
      $query = explode('&', $_SERVER['QUERY_STRING']);
      $params = [];
      foreach ($query as $param) {
        [$name, $value] = explode('=', $param, 2);
        if ($value) {
          $params[urldecode($name)][] = urldecode($value);
        }
      }
      return $params[$slug];
    } else {
      $return = $_GET[$slug];
      $return = trim($return);
      $return = stripslashes($return);
      return $return;
    }
  }
  return null;
}
