<?php
/**
 * Your Inspiration Themes
 * 
 * @package WordPress
 * @subpackage Your Inspiration Themes
 * @author Your Inspiration Themes Team <info@yithemes.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

/**
 * Add specific fields to the tab General -> Settings
 * 
 * @param array $fields
 * @return array
 */ 
function yit_tab_general_header( $fields ) {

    $fields[40] = array(
        'id' => 'header-height',
        'type' => 'number',
        'name' => __( 'Header Min-Height', 'yit' ),
        'desc' => __( 'Select the min-height of the header.', 'yit' ),
        'min' => 0,
        'max' => 1000,
        'std' => 150,
        'style' => array(
            'selectors' => '#header',
            'properties' => 'min-height'
        )
    );

    $fields[50] = array(
        'id' => 'nav-cart-min-height-onoff',
        'type' => 'onoff',
        'name' => __( 'Set Min-Height for header navigation and cart', 'yit' ),
        'desc' => __( 'Select the min-height for header navigation and cart.', 'yit' ),
        'std' => 0,
    );

    $fields[60] = array(
        'id' => 'nav-cart-min-height',
        'type' => 'number',
        'name' => __( 'Header Min-Height', 'yit' ),
        'desc' => __( 'Select the min-height of the header.', 'yit' ),
        'min' => 1,
        'max' => 1000,
        'std' => 50,
        'deps' => array(
            'ids' => 'nav-cart-min-height-onoff',
            'values' => '1'
        )
    );

    $fields[70] = array(
        'id' => 'hide-header-shadow',
        'type' => 'onoff',
        'name' => __( 'Hide shadow in header box.', 'yit' ),
        'desc' => __( 'Hide shadow in header box.', 'yit' ),
        'std' => 0,
    );
	
	return $fields;
}
add_filter( 'yit_submenu_tabs_theme_option_general_header', 'yit_tab_general_header' );