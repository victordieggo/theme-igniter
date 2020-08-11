<?php

//===================================================================
// THEME ASSETS
//===================================================================

//-------------------------------------------------------------------
// ENQUEUE THEME ASSETS
//-------------------------------------------------------------------

add_action('wp_enqueue_scripts', function() {
  if (is_admin()) return;

  wp_deregister_script('jquery');
  wp_deregister_script('wp-embed');

  wp_dequeue_style('wp-block-library');

  wp_enqueue_script('scripts', ASSETS_URL . '/js/main.js', false, '0.0.1', true);
  wp_enqueue_style('styles', ASSETS_URL . '/css/main.css', false, '0.0.1', 'screen');
});
