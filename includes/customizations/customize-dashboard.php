<?php

//===================================================================
// CUSTOMIZE WP DASHBOARD
//===================================================================

//-------------------------------------------------------------------
// Hide Dashboard Menu Itens
//-------------------------------------------------------------------

add_action('admin_menu', 'remove_menus');

function remove_menus() {

  // remove_menu_page('index.php');                  // Dashboard
  // remove_menu_page('edit.php');                   // Posts
  // remove_menu_page('upload.php');                 // Media
  // remove_menu_page('edit.php?post_type=page');    // Pages
  // remove_menu_page('edit-comments.php');          // Comments
  // remove_menu_page('themes.php');                 // Appearance
  // remove_menu_page('plugins.php');                // Plugins
  // remove_menu_page('users.php');                  // Users
  // remove_menu_page('tools.php');                  // Tools
  // remove_menu_page('options-general.php');        // Settings

}

//-------------------------------------------------------------------
// REMOVE THEME EDITOR
//-------------------------------------------------------------------

add_action('_admin_menu', 'remove_editor_menu', 1);

function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}

//-------------------------------------------------------------------
// REMOVE DASHBOARD WIDGETS
//-------------------------------------------------------------------

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

function remove_dashboard_widgets() {

  global $wp_meta_boxes;

  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}

//-------------------------------------------------------------------
// REMOVE DASHBOARD MENU SEPARATORS
//-------------------------------------------------------------------

add_action('admin_head', 'remove_separator');

function remove_separator() {
  echo '<style>
    .wp-menu-separator {
      display: none;
    }
  </style>';
}
