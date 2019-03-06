<?php

//===================================================================
// THEME NAVIGATION
// wp_nav_menu(array('theme_location' => 'main-menu'));
//===================================================================

//-------------------------------------------------------------------
// REGISTER MENUS
//-------------------------------------------------------------------

add_action('init', 'register_my_menus');

function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => 'Menu',
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

//-------------------------------------------------------------------
// GET TRANSIENT MENU
//-------------------------------------------------------------------

function transient_menu($args = array()) {
  $defaults = array(
    'menu' => '',
    'theme_location' => '',
    'echo' => true,
  );

  $args = wp_parse_args($args, $defaults);

  $transient_name = 'menu-' . $args['menu'] . '-' . $args['theme_location'];
  $menu = get_transient($transient_name);

  if (false === $menu) {
    $menu_args = $args;
    $menu_args['echo'] = false;
    $menu = wp_nav_menu($menu_args);
    set_transient($transient_name, $menu, 0);
  }

  if (false === $args['echo']) {
    return $menu;
  }

  echo $menu;
}

//-------------------------------------------------------------------
// UPDATE MENU TRANSIENT
//-------------------------------------------------------------------

add_action('wp_update_nav_menu', 'update_menus');

function update_menus() {
  global $wpdb;
  $menus = $wpdb->get_col('SELECT option_name FROM $wpdb->options WHERE option_name LIKE "menu-%" ');
  foreach($menus as $menu) {
    delete_transient($menu);
  }
}
