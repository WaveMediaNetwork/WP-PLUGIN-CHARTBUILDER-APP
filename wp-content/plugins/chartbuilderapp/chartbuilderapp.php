<?php
/*
Plugin Name: Chart Builder App
Description: Custom Professional Chart Builder.
Version: 1.0
Author: <a href="https://wavemedianetwork.com">Wave Media Network</a>
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin constants
define( 'CHART_BUILDER_APP_VERSION', '1.0' );
define( 'CHART_BUILDER_APP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'CHART_BUILDER_APP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include plugin files
include( CHART_BUILDER_APP_PLUGIN_PATH . 'includes/frontend.php' );
include( CHART_BUILDER_APP_PLUGIN_PATH . 'includes/functions.php' );


// Register activation and deactivation hooks
register_activation_hook( __FILE__, 'customoa_activate' );
register_deactivation_hook( __FILE__, 'customoa_deactivate' );


///**
// * Initializes the CustomOA plugin.
// */
//function cba_plugin_init() {
//    // Register the CustomOA shortcode
//    add_shortcode( 'chart_builder_app', 'customoa_shortcode' );
//}
//add_action( 'init', 'cba_plugin_init' );

/**
 * Activates the CustomOA plugin.
 */
function cba_plugin_activate() {
    // No activation tasks required
}

/**
 * Deactivates the CustomOA plugin.
 */
function cba_plugin_deactivate() {
    // No deactivation tasks required
}