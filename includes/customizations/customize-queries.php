<?php

//===================================================================
// CUSTOMIZE QUERIES
//===================================================================

add_action('pre_get_posts', function($query) {
  if (is_admin()) return;

  if ($query->is_main_query()) {
    if (is_home() || is_post_type_archive('post')) {
      $query->set('posts_per_page', 12);
    }
  }
});
