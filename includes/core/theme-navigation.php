<?php

//===================================================================
// THEME NAVIGATION
//===================================================================

//-------------------------------------------------------------------
// REGISTER MENUS
//-------------------------------------------------------------------

add_action('init', function() {
  register_nav_menus(
    array(
      'main-menu' => 'Menu'
    )
  );
});

//-------------------------------------------------------------------
// REMOVE MENU CONTAINER CREATED BY WORDPRESS
//-------------------------------------------------------------------

add_filter('wp_nav_menu_args', function($args = '') {
  $args['container'] = false;
  return $args;
});

//-------------------------------------------------------------------
// ADD CUSTOM CSS CLASS TO MENU ITEMS
//-------------------------------------------------------------------

add_filter('nav_menu_css_class', function($classes, $item) {
  $classes[] = 'navBar-menuItem';

  if (in_array('menu-item-has-children', $classes)) {
    $classes[] = 'navBar-menuItem--hasChildren';
  }

  return $classes;
}, 10, 2);

//-------------------------------------------------------------------
// ADD CUSTOM CSS CLASS TO SUBMENUS
//-------------------------------------------------------------------

add_filter('nav_menu_submenu_css_class', function($classes) {
  $classes = array('navBar-subMenu');
  return $classes;
});

//-------------------------------------------------------------------
// FILTER MENU ITEMS CSS CLASS
//-------------------------------------------------------------------

add_filter('page_css_class', 'filter_menu_items_css_class');
add_filter('nav_menu_item_id', 'filter_menu_items_css_class');
add_filter('nav_menu_css_class', 'filter_menu_items_css_class');

function filter_menu_items_css_class($var) {
  $allowed_classes = array(
    'navBar-menuItem',
    'navBar-menuItem--hasChildren'
  );
  return is_array($var) ? array_intersect($var, $allowed_classes) : '';
}

//-------------------------------------------------------------------
// FILTER MENU LINKS ATTRIBUTES
//-------------------------------------------------------------------

add_filter('nav_menu_link_attributes', function($atts, $item, $args) {
  $atts['class'] = 'navBar-menuItem-link';

  if (in_array('menu-item-has-children', $item->classes)) {
    $atts['aria-expanded'] = 'false';
  }

  return $atts;
}, 10, 3);

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

add_action('wp_update_nav_menu', function() {
  global $wpdb;
  $menus = $wpdb->get_col('SELECT option_name FROM $wpdb->options WHERE option_name LIKE "menu-%" ');
  foreach($menus as $menu) {
    delete_transient($menu);
  }
});
