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
