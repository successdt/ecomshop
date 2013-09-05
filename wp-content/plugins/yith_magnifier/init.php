<?php
/**
* Plugin Name: YITH WooCommerce Magnifier
* Plugin URI: http://yithemes.com/
* Description: Woocommerce Magnifier Plugin
* Version: 1.0.0
* Author: Your Inspiration Themes
* Author URI: http://yithemes.com/
* Text Domain: yith-wcmg
* Domain Path: /languages/
* 
* @author Your Inspiration Themes
* @package YITH WooCommerce Magnifier
* @version 1.0.0
*/

if ( !defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

if( !function_exists('is_plugin_active') ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

/**
 * Required functions
 */
if ( ! function_exists( 'woothemes_queue_update' ) )
    require_once( 'woo-includes/woo-functions.php' );

if ( ! is_woocommerce_active() ) return;


define( 'YITH_WCMG', true );

if( is_plugin_active('yith_magnifier/init.php') ) {
    define( 'YITH_WCMG_URL', plugin_dir_url( __FILE__ ) );
    define( 'YITH_WCMG_DIR', plugin_dir_path( __FILE__ ) );
} else {
    define( 'YITH_WCMG_URL', YIT_THEME_PLUGINS_URL . '/yith_magnifier/' );
    define( 'YITH_WCMG_DIR', dirname( __FILE__ ) . '/' );
}

if (is_woocommerce_active()) {
    // Load required classes and functions
    require_once('functions.yith-wcmg.php');
	require_once('class.yith-wcmg-admin.php');
	require_once('class.yith-wcmg-frontend.php');
	require_once('class.yith-wcmg.php');
    
    // Let's start the game!
    global $yith_wcmg;
    $yith_wcmg = new YITH_WCMG();
}