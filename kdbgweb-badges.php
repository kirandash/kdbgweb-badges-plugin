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
 * Assign global variables
 */
 
 $plugin_url = WP_PLUGIN_URL . '/kdbgweb-badges';
 $options = array();
 $display_json = false;
 
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
    
	global $plugin_url;
	global $options;
	global $display_json;
	
	if( isset( $_POST['kdbgweb_form_submitted'] ) ) {
		
		$hidden_field = esc_html( $_POST['kdbgweb_form_submitted'] );
		
		if( $hidden_field == 'Y' ) {
			
			$kdbgweb_username = esc_html( $_POST['kdbgweb_username'] );
			
			$kdbgweb_profile = kdbgweb_badges_get_profile( $kdbgweb_username );
			
			$options['kdbgweb_username'] = $kdbgweb_username;
			$options['kdbgweb_profile']  = $kdbgweb_profile;
			$options['last_updated'] 	 = time();
			
			update_option( 'kdbgweb_badges', $options );
			
			//var_dump($kdbgweb_profile);
			
		}
		
	}
	
	$options = get_option( 'kdbgweb_username' );
	
	if( $options != '' ) {
		
		$kdbgweb_username = $options['kdbgweb_username'];
		$kdbgweb_profile  = $options['kdbgweb_profile'];
		
	}
	
    require('inc/options-page-wrapper.php');
    
}

class Kdbgweb_Badges_Widget extends WP_Widget {

	function kdbgweb_badges_widget() {
		// Instantiate the parent object
		parent::__construct( false, 'Official BGWebagency Badges Widget' );
	}

	function widget( $args, $instance ) {
		// Widget output
		
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$num_badges = $instance['num_badges'];
		$display_tooltip = $instance['display_tooltip'];
		
		$options = get_option('kdbgweb_badges');
		$kdbgweb_profile  = $options['kdbgweb_profile'];	
		
		require( 'inc/front-end.php' );	
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['num_badges'] = strip_tags($new_instance['num_badges']);
		$instance['display_tooltip'] = strip_tags($new_instance['display_tooltip']);
		
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		
		$title = esc_attr( $instance['title'] );
		$num_badges = esc_attr( $instance['num_badges'] );
		$display_tooltip = esc_attr( $instance['display_tooltip'] );
		
		$options = get_option('kdbgweb_badges');
		$kdbgweb_profile  = $options['kdbgweb_profile'];		
		
		require( 'inc/widget-fields.php' );
	}
}

function kdbgweb_badges_register_widgets() {
	register_widget( 'Kdbgweb_Badges_Widget' );
}

add_action( 'widgets_init', 'kdbgweb_badges_register_widgets' );

function kdbgweb_badges_get_profile( $kdbgweb_username ) {
	
	$json_feed_url = 'http://teamtreehouse.com/'. $kdbgweb_username .'.json';
	$args = array( 'timeout' => 120 );
	
	$json_feed = wp_remote_get( $json_feed_url, $args );
	
	$kdbgweb_profile = json_decode( $json_feed['body'] );
	
	return $kdbgweb_profile;
	
}

function kdbgweb_badges_backend_styles() {
	
	wp_enqueue_style('kdbgweb_badges_backend_css', plugins_url('kdbgweb-badges/kdbgweb-badges.css') );
	
}

add_action('admin_head','kdbgweb_badges_backend_styles');

function kdbgweb_badges_frontend_scripts_and_styles() {
	
	wp_enqueue_style('kdbgweb_badges_frontend_css', plugins_url('kdbgweb-badges/kdbgweb-badges.css') );
	wp_enqueue_script('kdbgweb_badges_frontend_js', plugins_url('kdbgweb-badges/kdbgweb-badges.js'), array('jquery'), '', true );
	
}

add_action('wp_enqueue_scripts','kdbgweb_badges_frontend_scripts_and_styles');