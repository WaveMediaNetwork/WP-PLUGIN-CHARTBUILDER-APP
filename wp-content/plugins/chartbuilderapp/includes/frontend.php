<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


function cba_shortcode_content() {

    $output = '<div class="cba-wrapper">
                    <div id="cba-navigation">
                        <ul id="cba-navigation-menu">
                            <li id="cba-nav-homepage">Homepage</li>
                            <li id="cba-nav-account">Account Settings</li>
                            <li id="cba-nav-charts">Charts</li>
                            <ul>
                                <li id="cba-nav-my-charts">My Charts</li>
                                <li id="cba-nav-all-charts">All Charts</li>
                            </ul>
                            <li id="cba-nav-organization">Organization Management</li>
                            <li id="cba-nav-receipts">Receipts</li>
                        </ul>
                    </div>
                    <div id="cba-main-container">       
                       '.
                        // all users
                        file_get_contents(CHART_BUILDER_APP_PLUGIN_PATH. '/templates/homepage.php') .
                        file_get_contents(CHART_BUILDER_APP_PLUGIN_PATH. '/templates/account-settings.php') .
                        file_get_contents(CHART_BUILDER_APP_PLUGIN_PATH. '/templates/charts.php') .
                        file_get_contents(CHART_BUILDER_APP_PLUGIN_PATH. '/templates/my-charts.php') .
                        file_get_contents(CHART_BUILDER_APP_PLUGIN_PATH. '/templates/all-charts.php') .

                        // admin only
                        file_get_contents(CHART_BUILDER_APP_PLUGIN_PATH. '/templates/organization-management.php') .
                        file_get_contents(CHART_BUILDER_APP_PLUGIN_PATH. '/templates/receipts.php')
                        .'
                    </div>
                </div>';

    return $output;

}

function cba_plugin_init() {
    add_shortcode( 'chart_builder_app', 'cba_shortcode_content' );
}
add_action( 'init', 'cba_plugin_init' );


function cba_link_scripts_and_styles() {
    if ( file_exists( CHART_BUILDER_APP_PLUGIN_PATH . 'assets/css/cba-front-end.css') ) {
        wp_enqueue_style('cba-front-end-styles', CHART_BUILDER_APP_PLUGIN_URL . 'assets/css/cba-front-end.css', array(), CHART_BUILDER_APP_VERSION );
    }

    if ( file_exists( CHART_BUILDER_APP_PLUGIN_PATH . 'assets/js/cba-front-end.js') ) {
        wp_enqueue_script('cba-front-end-scripts', CHART_BUILDER_APP_PLUGIN_URL . 'assets/js/cba-front-end.js', array( 'jquery' ), CHART_BUILDER_APP_VERSION );
    }
}
add_action('wp_enqueue_scripts','cba_link_scripts_and_styles');