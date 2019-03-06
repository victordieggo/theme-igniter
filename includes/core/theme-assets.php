<?php

//===================================================================
// THEME ASSETS
//===================================================================

//-------------------------------------------------------------------
// ENQUEUE THEME ASSETS
//-------------------------------------------------------------------

add_action('wp_enqueue_scripts', 'theme_assets', 99);

function theme_assets() {
  if (is_admin()) return;

  $directory = get_template_directory_uri();

  wp_enqueue_style('styles', $directory.'/assets/dist/css/main.css', false, '0.0.1', 'screen');
  wp_enqueue_script('scripts', $directory.'/assets/dist/js/main.js', false, '0.0.1', true);
}

//-------------------------------------------------------------------
// DENQUEUE/DEREGISTER UNUSED ASSETS
//-------------------------------------------------------------------

add_action('wp_enqueue_scripts', 'clean_assets', 99);

function clean_assets() {
  if (is_admin()) return;

  wp_deregister_script('jquery');
  wp_deregister_script('wp-embed');
}
