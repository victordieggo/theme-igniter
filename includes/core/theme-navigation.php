<?php

//===================================================================
// REGISTER WP MENUS
// wp_nav_menu( array( 'theme_location' => 'main-menu' ) );
//===================================================================

//-------------------------------------------------------------------
// REGISTER MENUS
//-------------------------------------------------------------------

add_action( 'init', 'register_my_menus' );

function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Menu' ),
    )
  );
}

//-------------------------------------------------------------------
// REMOVE MENU CONTAINER CREATED BY WORDPRESS
//-------------------------------------------------------------------

add_filter('wp_nav_menu_args', 'prefix_nav_menu_args');

function prefix_nav_menu_args($args = '') {
  $args['container'] = false;
  return $args;
}

//-------------------------------------------------------------------
// FILTER CLASSES FROM MENUS
//-------------------------------------------------------------------

add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');

function custom_wp_nav_menu($var) {
  $allowed_classes = array(
    'menu-item-has-children',
    'current-menu-ancestor',
    'current-menu-item',
    'menu-item-home',
    'menu-item',
    'sub-menu,',
    'menu,',
  );
  return is_array($var) ? array_intersect($var, $allowed_classes) : '';
}

//-------------------------------------------------------------------
// ADD ARIA-CONTROLS TO MENU
//-------------------------------------------------------------------

add_filter('nav_menu_link_attributes', 'aria_controls', 10, 3);

function aria_controls($atts, $item, $args) {
  if (in_array('menu-item-has-children', $item->classes)) {
    $atts['aria-expanded'] = 'false';
  }
  return $atts;
}
