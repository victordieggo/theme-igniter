<?php

//======================================================================
// UNREGISTER ALL WP WIDGETS
//======================================================================

add_action('widgets_init', 'unregister_default_widgets', 11);

function unregister_default_widgets() {

	//WORDPRESS WIDGETS
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Nav_Menu_Widget');
	unregister_widget('Twenty_Eleven_Ephemera_Widget');

}

//======================================================================
// REGISTER MAIN SIDEBAR
//======================================================================

$args = array(
	'name'          => 'Sidebar',
	'id'            => 'main-sidebar',
	'description'   => '',
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '',
	'after_title'   => ''
);

register_sidebar( $args );
