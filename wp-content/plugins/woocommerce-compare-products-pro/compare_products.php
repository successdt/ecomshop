<?php
/*
Plugin Name: WooCommerce Compare Products PRO
Plugin URI: http://woothemes.com/woocommerce
Description: Compare Products uses your existing WooCommerce Product Categories and Product Attributes to create Compare Product Features for all your products. A sidebar Compare basket is created that users add products to and view the Comparison in a Compare this pop-up screen.
Version: 2.0.7
Author: A3 Revolution Software Development team
Author URI: http://www.a3rev.com/
License: This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007

	WooCommerce Compare Products PRO. Plugin for the WooCommerce plugin.
	Copyright © 2011 A3 Revolution Software Development team

	A3 Revolution Software Development team
	admin@a3rev.com
	PO Box 1170
	Gympie 4570
	QLD Australia
*/

/**
 * Required functions
 */
if ( ! function_exists( 'woothemes_queue_update' ) )
	require_once( 'woo-includes/woo-functions.php' );

/**
 * Plugin updates
 */
woothemes_queue_update( plugin_basename( __FILE__ ), '4534e3a3c714da0ea29b363b73458528', '18685' );

if ( is_woocommerce_active() ) {

	define( 'WOOCP_FILE_PATH', dirname( __FILE__ ) );
	define( 'WOOCP_DIR_NAME', basename( WOOCP_FILE_PATH ) );
	define( 'WOOCP_FOLDER', dirname( plugin_basename( __FILE__ ) ) );
	define(	'WOOCP_NAME', plugin_basename(__FILE__) );
	define( 'WOOCP_URL', WP_CONTENT_URL . '/plugins/' . WOOCP_FOLDER );
	define( 'WOOCP_JS_URL',  WOOCP_URL . '/assets/js' );
	define( 'WOOCP_IMAGES_URL',  WOOCP_URL . '/assets/images' );

	include 'classes/class-wc-compare-filter.php';
	include 'classes/data/class-wc-compare-data.php';
	include 'classes/data/class-wc-compare-categories-data.php';
	include 'classes/data/class-wc-compare-categories-fields-data.php';
	include 'classes/class-wc-compare-metabox.php';
	include 'widgets/compare_widget.php';

	include 'admin/classes/class-wc-compare-settings.php';
	include 'admin/classes/class-wc-compare-categories.php';
	include 'admin/classes/class-wc-compare-fields.php';
	include 'admin/classes/class-wc-compare-products.php';

	include 'classes/class-wc-compare-functions.php';

	include 'admin/compare_init.php';

	/**
	 * Show compare button
	 */
	function woo_add_compare_button($product_id='', $echo=false) {
		$html = WC_Compare_Hook_Filter::add_compare_button($product_id);
		if ($echo) echo $html;
		else return $html;
	}

	/**
	 * Show compare fields panel
	 */
	function woo_show_compare_fields($product_id='', $echo=false) {
		$html = WC_Compare_Hook_Filter::show_compare_fields($product_id);
		if ($echo) echo $html;
		else return $html;
	}
	
}

/**
 * Call when the plugin is activated
 */
register_activation_hook(__FILE__, 'woocp_install');

function woocp_install() {
	update_option('a3rev_woocp_pro_version', '2.0.7');
	update_option('a3rev_woocp_just_confirm', 1);
}

// add the table for the importer of sample data
function yit_add_woocp_tables( $tables ) {
    global $wpdb;

    $tables[] = 'woo_compare_fields';
    $tables[] = 'woo_compare_categories';
    $tables[] = 'woo_compare_cat_fields';

    return $tables;
}
add_filter( 'yit_sample_data_tables', 'yit_add_woocp_tables' );

// add the table for the importer of sample data
function yit_add_woocp_options( $options ) {
	$options[] = 'woo_comparable_settings';

    return $options;
}
add_filter( 'yit_sample_data_options', 'yit_add_woocp_options' );