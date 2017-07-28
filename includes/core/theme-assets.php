<?php

//===================================================================
// THEME ASSETS
//===================================================================

//-------------------------------------------------------------------
// ENQUEUE/DENQUEUE THEME STYLES/SCRIPTS
//-------------------------------------------------------------------

if (!is_admin()) add_action('wp_enqueue_scripts', 'theme_assets', 99999);

function theme_assets() {

	$directory = get_template_directory_uri();

	wp_enqueue_style('styles', $directory."/assets/dist/css/style.css", false, '1.0.0', 'screen');

  wp_deregister_script('jquery');
  wp_deregister_script('wp-embed');

  wp_enqueue_script('jquery', $directory."/assets/dist/js/jquery.min.js", false, '2.2.4', true);
	wp_enqueue_script('scripts', $directory."/assets/dist/js/main.js", false, '1.0.0', true);

}
