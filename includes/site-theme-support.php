<?php

/**
 * @package projectone
 */

/**
 * Enables "add theme support"
 */

class Add_Theme_Support {
    public function register() {
        add_action( 'after_setup_theme', array( $this, 'theme_support' ) );
    }

    public function theme_support() {

        // adds site logo to the wordpress dashboard
        add_theme_support( 'custom-logo', array(
            'height' => '',
            'width' => '',
            'flex-width' => true,
            'flex-height' => true
        ));

        // adds featured image to the posts
        add_theme_support( 'post-thumbnails' );
    ;
        // switch default markup
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ));

        // activate post formats
        add_theme_support( 'post-formats', array(
            'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'
        ));
    }
}

if ( class_exists( 'Add_Theme_Support' ) ) {
    $addThemeSupport = new Add_Theme_Support();
    $addThemeSupport->register();
}