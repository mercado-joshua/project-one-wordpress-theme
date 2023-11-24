<?php
/**
 * @package projectone
 */

/**
 * -----------------------------------+
 * Table of contents:
 * -----------------------------------+
 * 
 *  1. Enables "add theme support"
 *  2. Manages JS & CSS scripts
 *  3. Remove wordpress generator version
 *  4. Manage Menus
 *  5. Hero Customizer
 * 
 */

/**
 * [1] Enables "add theme support"
 */
require_once( get_template_directory() . '/includes/site-theme-support.php' );

/**
 * [2] Manage scripts
 */
require_once( get_template_directory() . '/includes/site-manage-scripts.php' );

/**
 * [3] Remove wordpress generator version
 */
require get_template_directory() . '/includes/site-remove-scripts-version.php';

/**
 * [4] Manage Menus
 */
require get_template_directory() . '/includes/site-manage-menus.php';

/**
 * [5] Remove WP Topbar
 */
require get_template_directory() . '/includes/site-remove-wp-topbar.php';

/**
 * [6] Hero Customizer
 */
require get_template_directory() . '/includes/site-hero-customizer.php';

/**
 * [7] News Custom Post Type
 */
require get_template_directory() . '/includes/site-news-custom-post-type.php';


