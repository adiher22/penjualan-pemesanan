<?php
if(!function_exists('active_link')) {
  function activate_menu($controller) {
  $CI = get_instance();
  $class = $CI->router->fetch_class();
  return ($class == $controller) ? 'active' : '';
  }
}