<?php

//======================================================================
// CUSTOM QUERIES
//======================================================================

//-------------------------------------------------------------------
// ALTER MAIN QUERY FOR BLOG/POSTS ARCHIVE
//-------------------------------------------------------------------

function limit_blog_posts($query) {
    if ( is_home() || is_post_type_archive( 'post' ) ) {
        $query->set('posts_per_page', 12);
    }
}
add_action( 'pre_get_posts', 'limit_blog_posts' );
