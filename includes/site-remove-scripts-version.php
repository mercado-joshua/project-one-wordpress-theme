<?php

/**
 * @package projectone
 */

/**
 * Remove Wordpress Generator Version
 */

class Remove_Scripts_Version {
    public function register() {

        /** [1] removes <meta> wordpress generator version */
        add_filter( 'the_generator', array( $this, 'remove_meta_generator_version' ) );

        /** [2] remove version strings "&ver=" from js and css */
        add_filter( 'script_loader_src', array( $this, 'remove_scripts_version' ) );
        add_filter( 'style_loader_src', array( $this, 'remove_scripts_version' ) );
    }

    public function remove_scripts_version( $src ) {
        if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );

        return $src;
    }

    public function remove_meta_generator_version() {
        return ''; 
    }
}

if ( class_exists( 'Remove_Scripts_Version' ) ) {
    $removeScriptsVersion = new Remove_Scripts_Version();
    $removeScriptsVersion->register();
}