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

function yit_sidebar_title_font_std( $array ) {
    $array['size'] = 14;
    $array['family'] = 'Monda';
    $array['color'] = '#a76c23';
    $array['style'] = 'regular';
    
    return $array;
}
add_filter( 'yit_sidebar-title-font_std', 'yit_sidebar_title_font_std' );

function yit_sidebar_title_font_style( $array ) {
    $array['selectors'] .= '.sidebar .cta .border h3, .sidebar .yit_quick_contact h3, .widget.widget_onsale h3, .widget.widget_best_sellers h3, .widget.widget_recent_products h3, .widget.widget_top_rated_products h3, .widget.widget_random_products h3, .widget.widget_featured_products h3, .widget.widget_recently_viewed_products h3';
    return $array;
}
add_filter( 'yit_sidebar-title-font_style', 'yit_sidebar_title_font_style' );

function yit_sidebar_content_font_std( $array ) {
    $array['size'] = 11;
    $array['family'] = 'Monda';
    $array['color'] = '#4f4d4d';
    
    return $array;
}
add_filter( 'yit_sidebar-content-font_std', 'yit_sidebar_content_font_std' );

function yit_sidebar_content_font_style( $array ) {
    $array['selectors'] = '.sidebar p, .sidebar li, .sidebar div, .sidebar a, #wp-calendar th, #wp-calendar td, .woocommerce ul.cart_list li a, .woocommerce-page ul.cart_list li a, .woocommerce ul.product_list_widget li a, .woocommerce-page ul.product_list_widget li a';
    return $array;
}
add_filter( 'yit_sidebar-content-font_style', 'yit_sidebar_content_font_style' );

add_filter( 'yit_sidebar-links-font_std', create_function( '', 'return "#995d08";' ) );
add_filter( 'yit_sidebar-links-hover-font_std', create_function( '', 'return "#d58f2c";' ) );

function yit_sidebar_add_options( $array ) {
    $array[] = array(
        'id' => 'widget-testimonials-font',
        'type' => 'typography',
        'name' => __( 'Testimonials slider excerpt font', 'yit' ),
        'desc' => __( 'Choose the font type, size and color.', 'yit' ),
        'min'  => 1,
        'max'  => 30,
        'std'  => apply_filters( 'yit_widget-testimonials-font_std', array(
            'size'   => 12,
            'unit'   => 'px',
            'family' => 'Monda',
            'style'  => 'regular',
            'color'  => '#4f4d4d' 
        ) ),
        'style' => array(
			'selectors' => '.testimonial-widget li blockquote p, .testimonial-widget li blockquote p:first-child',
			'properties' => 'font-size, font-family, color, font-style, font-weight'
		)
    );
    
    $array[] = array(
        'id' => 'widget-testimonials-name-font',
        'type' => 'typography',
        'name' => __( 'Testimonials slider name font', 'yit' ),
        'desc' => __( 'Choose the font type, size and color.', 'yit' ),
        'min'  => 1,
        'max'  => 30,
        'std'  => apply_filters( 'yit_widget-testimonials-name-font_std', array(
            'size'   => 14,
            'unit'   => 'px',
            'family' => 'Monda',
            'style'  => 'regular',
            'color'  => '#909091' 
        ) ),
        'style' => array(
			'selectors' => '.testimonial-widget li .name-testimonial',
			'properties' => 'font-size, font-family, color, font-style, font-weight'
		)
    );
    
	/*
    $array[] = array(
        'id' => 'widget-testimonials-website-font',
        'type' => 'typography',
        'name' => __( 'Testimonials slider website font', 'yit' ),
        'desc' => __( 'Choose the font type, size and color.', 'yit' ),
        'min'  => 1,
        'max'  => 30,
        'std'  => apply_filters( 'yit_widget-testimonials-website-font_std', array(
            'size'   => 12,
            'unit'   => 'px',
            'family' => 'Monda',
            'style'  => 'regular',
            'color'  => '#747373' 
        ) ),
        'style' => array(
			'selectors' => '.testimonial-widget li .url-testimonial',
			'properties' => 'font-size, font-family, color, font-style, font-weight'
		)
    );
	*/
    
    return $array;
}
add_filter( 'yit_submenu_tabs_theme_option_typography_sidebar', 'yit_sidebar_add_options' );