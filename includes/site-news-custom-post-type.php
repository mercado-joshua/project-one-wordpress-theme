<?php

/**
 * @package projectone
 */

/**
 * Create News Custom Post Type
 */

class News_Post_Type {
    public function register() {
        add_action( 'init', array( $this, 'registerPostType' ) );
    }

    public function registerPostType() {
        register_post_type( 'news-post-type', array(
            'labels' => array(
                'name' => __( 'News' )
            ),
            'menu_position' => 5,
            'public' => true,
            'supports' => array( 'title', 'editor', 'thumbnail' )
        ));
    }
}

if ( class_exists( 'News_Post_Type' ) ) {
    $newsPostType = new News_Post_Type();
    $newsPostType->register();
}