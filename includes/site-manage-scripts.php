<?php

/**
 * @package projectone
 */

/**
 * Manages JS and CSS scripts
 */

class Base_Controller {

    public $version;
    public $scripts = array();
    public $styles = array();

    public function __construct() {
        $this->version = wp_get_theme()->get( 'Version' );

        $this->scripts = array(
            array(
                'name' => 'jquery-min',
                'path' => get_template_directory_uri() . '/assets/js/jquery.min.js', 
                'deps' => array(), 
                'version' => '3.7.1', 
                'media' => 'all',
                'in_footer' => true 
            ),
            array(
                'name' => 'fontawesome-min', 
                'path' => get_template_directory_uri() . '/assets/js/all.min.js', 
                'deps' => array(), 
                'version' => '6.4.2', 
                'media' => 'all',
                'in_footer' => true 
            ),
            array(
                'name' => 'bootstrap-min', 
                'path' => get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', 
                'deps' => array( 'jquery-min' ), 
                'version' => '5.3.2', 
                'media' => 'all',
                'in_footer' => true 
            ),
            array(
                'name' =>'polyfill-min', 
                'path' => get_template_directory_uri() . '/assets/js/polyfill.min.js', 
                'deps' => array(), 
                'version' => '1.0', 
                'media' => 'all',
                'in_footer' => true 
            )
        );

        $this->styles = array(
            array(
                'name' =>'fontawesome-min', 
                'path' => get_template_directory_uri() . '/assets/css/fontawesome.css', 
                'deps' => array(), 
                'version' => '6.4.2',
                'media' => 'all',
            ),
            array(
                'name' =>'bootstrap-min', 
                'path' => get_template_directory_uri() . '/assets/css/bootstrap.css',
                'deps' => array(), 
                'version' => '5.3.2',
                'media' => 'all',
            ),
            array(
                'name' =>'style', 
                'path' => get_stylesheet_uri(),
                'deps' => array( 'bootstrap-min' ), 
                'version' => $this->version,
                'media' => 'all',
            )
        );
    }
}

class Manage_Scripts extends Base_Controller {
    public function register() {

        /** removes unnecessary scripts */
        add_action( 'init', array( $this, 'removeEmojis' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'removeBlockLibrary' ), 100 );

        /** enqueues styles and scripts */
        add_action( 'wp_enqueue_scripts', array( $this, 'registerScripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'registerStyles' ) );
    }

    public function removeEmojis() {
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    }

    public function removeBlockLibrary(){
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
    }

    public function registerScripts() {

        wp_deregister_script( 'jquery' );

        foreach( $this->scripts as $script ) {
            wp_enqueue_script(
                $script[ 'name' ],
                $script[ 'path' ],
                $script[ 'deps' ],
                $script[ 'version' ],
                $script[ 'media' ],
                $script[ 'in_footer' ]
            );
        }
    }

    public function registerStyles() {
        foreach( $this->styles as $style ) {
            wp_enqueue_style(
                $style[ 'name' ],
                $style[ 'path' ],
                $style[ 'deps' ],
                $style[ 'version' ],
                $style[ 'media' ]
            );
        }
    }
}

if ( class_exists( 'Manage_Scripts' ) ) {
    $manageScripts = new Manage_Scripts();
    $manageScripts->register();
}
