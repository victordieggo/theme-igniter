<?php

//===================================================================
// THEME ASSETS
//===================================================================

//-------------------------------------------------------------------
// ENQUEUE THEME ASSETS
//-------------------------------------------------------------------

add_action('wp_enqueue_scripts', 'theme_assets');

function theme_assets() {
  if (is_admin()) return;

  wp_enqueue_style('styles', ASSETS_URL . '/css/main.css', false, '0.0.1', 'screen');
  wp_enqueue_script('scripts', ASSETS_URL . '/js/main.js', false, '0.0.1', true);
}

add_action('wp_enqueue_scripts', 'theme_assets', 99);

//-------------------------------------------------------------------
// DENQUEUE/DEREGISTER UNUSED ASSETS
//-------------------------------------------------------------------

add_action('wp_enqueue_scripts', 'clean_assets', 99);

function clean_assets() {
  if (is_admin()) return;

  wp_deregister_script('jquery');
  wp_deregister_script('wp-embed');
}
