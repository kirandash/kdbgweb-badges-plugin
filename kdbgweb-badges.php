<?php
/*
 * Plugin Name: Official BG Web Agency Badges Plugin
 * Plugin URI: http://bgwebagency.com/kdbgweb-badges-plugin
 * Description: Provides both widgets and shortcodes to help you display your BGWebAgency profile badges on your website.
 * Version: 1.0
 * Author: Kiran Dash
 * Author URI: http://bgwebagency.com
 * License: GPL2
 */

/*
 * Add a link to our plugin in the admin menu
 * under 'Settings > BG Web Agency Badges'
 */

function kdbgwebagency_badges_menu() {
    
    /*
     * Use the add_options_page function
     * add_options_page ( $page_title, $menu_title, $capability, $menu-slug, $function )
     */
    
    add_options_page(
        'Official BG Web Agency Badges plugin',
        'BG Web Agency Badges',
        'manage_options',
        'kdbgweb-badges',
        'kdbgweb_badges_options_page'
    );
    
}

add_action( 'admin_menu', 'kdbgwebagency_badges_menu' );

function kdbgweb_badges_options_page() {
    
    if( !current_user_can( 'manage_options' ) ){
        
        wp_die('You do not have sufficient permissions to access this page.');
        
    }
    
    echo '<p>Welcome to our plugin page.</p>';
    
}