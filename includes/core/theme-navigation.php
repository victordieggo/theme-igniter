<?php

//======================================================================
// REGISTER WP MENUS
// wp_nav_menu( array( 'theme_location' => 'main-menu' ) );
//======================================================================

//-------------------------------------------------------------------
// REGISTER MENUS
//-------------------------------------------------------------------

function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

//-------------------------------------------------------------------
// REMOVE MENU CONTAINER CREATED BY WORDPRESS
//-------------------------------------------------------------------

add_filter('wp_nav_menu_args', 'prefix_nav_menu_args');
function prefix_nav_menu_args($args = '') {
    $args['container'] = false;
    return $args;
}
