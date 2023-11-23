<?php

/**
 * @package projectone
 */

/**
 * Manages customizer settings for herobox
 */

class Hero_Customizer {
    public function register() {
        add_action( 'customize_register', array( $this, 'heroCustomizer' ) );
    }

    public function heroCustomizer( $wp_customizer ) {

         /**
         * Hero Section
         */

        $wp_customizer->add_section( 'hero-section', array(
            'title' => __( 'Hero Settings' ),
            'priority' => 70
        ));


        /**
         * Image
         */

         // for mobile device
        $wp_customizer->add_setting( 'hero-image-mobile', array(
            'capability' => 'edit_theme_options'
        ));

        $wp_customizer->add_control( new WP_Customize_Image_Control( $wp_customizer, 'hero-image-mobile', array(
            'label' => __( 'Hero Image ( for mobile device )' ),
            'description' => __( 'Choose an image for background' ),
            'section' => 'hero-section'
        )));

        // for desktop device
        $wp_customizer->add_setting( 'hero-image-desktop', array(
            'capability' => 'edit_theme_options'
        ));

        $wp_customizer->add_control( new WP_Customize_Image_Control( $wp_customizer, 'hero-image-desktop', array(
            'label' => __( 'Hero Image ( for desktop device )' ),
            'description' => __( 'Choose an image for background' ),
            'section' => 'hero-section'
        )));

        
        /**
         * Title
         */

        $wp_customizer->add_setting( 'hero-title', array(
            'capability' => 'edit_theme_options',
            'default' => __( 'Type your title...' ),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customizer->add_control( 'hero-title', array(
            'label' => __( 'Hero Title' ),
            'description' => __( 'Change Hero Title' ),
            'settings' => 'hero-title',
            'section' => 'hero-section'
        ));


        /**
         * Post Textarea
         */

        $wp_customizer->add_setting( 'hero-textarea', array(
            'capability' => 'edit_theme_options',
            'default' => __( 'Type your post message...' ),
            'sanitize_callback' => 'sanitize_textarea_field'
        ));

        $wp_customizer->add_control( 'hero-textarea', array(
            'type' => 'textarea',
            'label' => __( 'Post Message' ),
            'description' => __( 'Change Post Message' ),
            'settings' => 'hero-textarea',
            'section' => 'hero-section'
        ));
    
        
        /**
         * URL
         */

        $wp_customizer->add_setting( 'hero-url', array(
            'capability' => 'edit_theme_options',
            'default' => __( 'Type your post url...' ),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customizer->add_control( 'hero-url', array(
            'label' => __( 'Hero Post URL' ),
            'description' => __( 'Change Hero URL' ),
            'settings' => 'hero-url',
            'section' => 'hero-section'
        ));
    }
}

if ( class_exists( 'Hero_Customizer' ) ) {
    $heroCustomizer = new Hero_Customizer();
    $heroCustomizer->register();
}



