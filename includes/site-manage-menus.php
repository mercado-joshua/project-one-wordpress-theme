<?php

/**
 * @package projectone
 */

/**
 * Manages Navigation Menus
 */

class Manage_Menus {
    public $locations = array();

    public function __construct() {
        $this->locations = array(
            'header' => __( 'Header Navigation Menu' )
        );
    }

    public function register() {
        add_action( 'after_setup_theme', array( $this, 'registerMenus' ) );
    }

    public function registerMenus() {
        register_nav_menus( $this->locations );
    } 
}

if ( class_exists( 'Manage_Menus' ) ) {
    $manageMenus = new Manage_Menus();
    $manageMenus->register();
}