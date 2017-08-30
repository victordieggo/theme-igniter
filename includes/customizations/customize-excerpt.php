<?php

//===================================================================
// CUSTOM EXCERPT
//===================================================================

function get_custom_excerpt($lenght) {

  if (!$lenght) {
    $lenght = 360;
  }

  if (has_excerpt()) {
    $excerpt = get_the_excerpt();
  } else {
    $excerpt = apply_filters( 'the_content', get_post_field( 'post_content', get_the_ID() ) );
  }

  $excerpt = wp_strip_all_tags( $excerpt );
  $excerpt = mb_strimwidth( $excerpt, 0, $lenght, '...' );
  return $excerpt;

}

function custom_excerpt($lenght) {
  echo get_custom_excerpt($lenght);
}
