<?php

/**
 * @package projectone
 */

/**
 * Remove Wordpress Topbar
 */

class Remove_WP_Topbar {
    public function register() {
        add_action( 'after_setup_theme', array( $this, 'removeTopbar' ) );
        add_action( 'admin_bar_menu', array( $this, 'removeTopbarItems' ), 9999 );
    }

    // removes top bar items
    public function removeTopbarItems( $wp_admin_bar ) {
        if ( ! is_admin() ) {
            $wp_admin_bar->remove_node( 'new-content' );
            $wp_admin_bar->remove_node( 'comments' );
            $wp_admin_bar->remove_node( 'my-account' );
            $wp_admin_bar->remove_node( 'wp-logo' );
            $wp_admin_bar->remove_node( 'customize' );
            $wp_admin_bar->remove_node( 'search' );
            $wp_admin_bar->remove_node( 'site-name' );
        }
    }

    // removes topbar completely
    public function removeTopbar() {
        if ( ! is_admin() ) {
            show_admin_bar( false );
        } 
    }
}

if ( class_exists( 'Remove_WP_Topbar' ) ) {
    $removeWPTopbar = new Remove_WP_Topbar();
    $removeWPTopbar->register();
}