<?php

//======================================================================
// THEME ASSETS
//======================================================================

//-------------------------------------------------------------------
// ENQUEUE/DENQUEUE THEME STYLES/SCRIPTS
//-------------------------------------------------------------------

if (!is_admin()) add_action('wp_enqueue_scripts', 'theme_assets', 99999);

function theme_assets() {

	$directory = get_template_directory_uri();

	wp_enqueue_style('global-styles', $directory."/assets/css/dist/style.css", false, '0.0.1', 'screen');

  wp_deregister_script('jquery');

  wp_enqueue_script('jquery', $directory."/assets/js/dist/jquery.min.js", false, '2.2.4', true);
	wp_enqueue_script('global-js', $directory."/assets/js/dist/main.js", false, '0.0.1', true);

}
