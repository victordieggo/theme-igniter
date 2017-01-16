<?php

//======================================================================
// DEFINE THUMBNAILS SIZE
//======================================================================

if(function_exists('add_theme_support'))
    add_theme_support('post-thumbnails');

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'thumb-small', 400, 400, true );
}
