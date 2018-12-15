<?php
/*
 * Plugin Name: H Tag Checker
 * Version: 1.0
 * Plugin URI: http://www.hughlashbrooke.com/
 * Description: This is your starter template for your next WordPress plugin.
 * Author: Hugh Lashbrooke
 * Author URI: http://www.hughlashbrooke.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: h-tag-checker
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-h-tag-checker.php' );
require_once( 'includes/class-h-tag-checker-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-h-tag-checker-admin-api.php' );
require_once( 'includes/lib/class-h-tag-checker-post-type.php' );
require_once( 'includes/lib/class-h-tag-checker-taxonomy.php' );

/**
 * Returns the main instance of H_Tag_Checker to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object H_Tag_Checker
 */
function H_Tag_Checker () {
	$instance = H_Tag_Checker::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = H_Tag_Checker_Settings::instance( $instance );
	}

	return $instance;
}

H_Tag_Checker();
