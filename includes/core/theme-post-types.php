<?php

//======================================================================
// CUSTOM POST TYPE -> SLIDER
//======================================================================

//-------------------------------------------------------------------
// CREATE CUSTOM POST TYPE
//-------------------------------------------------------------------

function slider_post_type() {

	$labels = array(
		'name'                => _x( 'Slider', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Slider', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item', 'text_domain' ),
		'all_items'           => __( 'Todos os Slides', 'text_domain' ),
		'view_item'           => __( 'Ver Slides', 'text_domain' ),
		'add_new_item'        => __( 'Adicionar novo Slide', 'text_domain' ),
		'add_new'             => __( 'Adicionar novo Slide', 'text_domain' ),
		'edit_item'           => __( 'Editar Slide', 'text_domain' ),
		'update_item'         => __( 'Atualizar Slide', 'text_domain' ),
		'search_items'        => __( 'Buscar Slides', 'text_domain' ),
		'not_found'           => __( 'Nada encontrado', 'text_domain' ),
		'not_found_in_trash'  => __( 'Nada encontrado na lixeira', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'slider', 'text_domain' ),
		'description'         => __( 'Cadastro de imagens do slider.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-images-alt2',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'slider', $args );

}

add_action( 'init', 'slider_post_type', 0 );

//-------------------------------------------------------------------
// CUSTOMIZE POST TYPE MESSAGES
// FOUND AT http://bryceadams.com/custom-post-type-updated-admin-messages-wordpress/
// BASED ON/ORIGINAL AT https://gist.github.com/bryceadams/591a008cb5e16131328c#file-gistfile1-php
//-------------------------------------------------------------------

add_filter( 'post_updated_messages', 'slider_updated_messages' );

function slider_updated_messages( $messages ) {

    global $post, $post_ID;

	//DEFINE CURRENT POST TYPE
    $messages['slider'] = array(

		//COSTUMIZE MESSAGENS
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __( 'Slide atualizado. <a href="%s">Ver Slider</a>' ), esc_url( home_url( '/' ) ) ),
		2 => '',
		3 => '',
		4 => __( 'Slide atualizado.' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Slide restaurado para revisão de %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'Slide Publicado. <a href="%s">Ver Slider</a>' ), esc_url( home_url( '/' ) ) ),
		7 => __( 'Slide salvo.' ),
		8 => sprintf( __( 'Slide enviado.' ) ),
		9 => sprintf( __( 'Slide agendado para: <strong>%1$s</strong>.' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ) ),
		10 => sprintf( __( 'Rascunho do Slide Atualizado.' ) ),
	);

	return $messages;

}
