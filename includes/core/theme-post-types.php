<?php

//===================================================================
// CUSTOM POST TYPE -> SLIDER
//===================================================================

//-------------------------------------------------------------------
// REGISTER POST TYPE
//-------------------------------------------------------------------

add_action('init', function() {

  $label = 'slide';
  $plural = 'Slides';
  $singular = 'Slide';

  $args = array(
    'label'               => $label,
    'description'         => 'Cadastro dos slides exibidos slider.',
    'labels'              => [
      'name'               => $singular,
      'singular_name'      => $singular,
      'menu_name'          => $plural,
      'parent_item_colon'  => $singular . 'pai: ',
      'all_items'          => 'Todos os ' . strtolower($plural),
      'view_item'          => 'Ver ' . strtolower($singular),
      'add_new_item'       => 'Adicionar novo ' . strtolower($singular),
      'add_new'            => 'Adicionar novo',
      'edit_item'          => 'Editar ' . strtolower($singular),
      'update_item'        => 'Atualizar ' . strtolower($singular),
      'search_items'       => 'Buscar ' . strtolower($plural),
      'not_found'          => 'Nenhum ' . strtolower($singular) . ' encontrado.',
      'not_found_in_trash' => 'Nenhum ' . strtolower($singular) . ' encontrado na lixeira.',
    ],
    'supports'            => array('title', 'thumbnail', 'page-attributes'),
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

  register_post_type($label, $args);
});

//-------------------------------------------------------------------
// CUSTOMIZE POST TYPE MESSAGES
//-------------------------------------------------------------------

add_filter('post_updated_messages', function($messages) {

  global $post, $post_ID;

  $messages['slide'] = array(
    0 => '',
    1 => sprintf('Slide atualizado. <a href="%s">Ver slide</a>', esc_url(home_url('/'))),
    2 => '',
    3 => '',
    4 => 'Slide atualizado.',
    5 => isset($_GET['revision']) ? sprintf('Slide restaurado para revisão de %s', wp_post_revision_title((int) $_GET['revision'], false)) : false,
    6 => sprintf('Slide publicado. <a href="%s">Ver slide</a>', esc_url(home_url('/'))),
    7 => 'Slide salvo.',
    8 => 'Slide enviado.',
    9 => sprintf('Slide agendado para: <strong>%1$s</strong>.', date_i18n('M j, Y @ G:i', strtotime($post->post_date))),
    10 => sprintf('Rascunho do slide atualizado.'),
  );

  return $messages;

});
