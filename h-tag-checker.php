<?php
/*
 * Plugin Name: H Tag Checker
 * Version: 1.0
 * Plugin URI: https://trafficlight.me/h-tag-checker
 * Description: This plugin allows your visitors to check the heading tags on their site.
 * Author: Traffic Light Media
 * Author URI: https://trafficlight.me
 * Requires at least: 5.0.1
 * Tested up to: 5.0.1
 *
 * Text Domain: h-tag-checker
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Traffic Light Media
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-h-tag-checker.php' );
require_once( 'includes/class-h-tag-checker-shortcodes.php' );
require_once( 'includes/class-h-tag-checker-settings.php' );

// Load Library class files
require_once( 'includes/lib/class-h-tag-checker-admin-api.php' );

// Load Vendor Libraries
require __DIR__ . '/vendor/autoload.php';

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
