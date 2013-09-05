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

function yit_tab_typography_header( $items ) {
    return array_merge( $items, array(

        12 => array(
            'id'   => 'logo-tagline-highlight-font',
            'type' => 'typography',
            'name' => __( 'Tagline font highlight', 'yit' ),
            'desc' => __( 'Select the type to use for the tagline highlight.', 'yit' ),
            'min'  => 14,
            'max'  => 40,
            'std'  => apply_filters( 'yit_logo-tagline-highlight-font_std', array(
                    'size'   => 17,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#8d8d8d' 
            ) ),
            'style' => array(
				'selectors' => '#header #logo #tagline span',
				'properties' => 'font-size, font-family, color, font-style, font-weight'
			)
        ),

        100 => array(
            'id'   => 'topbar-tipography',
            'type' => 'typography',
            'name' => __( 'Topbar font', 'yit' ),
            'desc' => __( 'Select the type to use for the topbar elements.', 'yit' ),
            'min'  => 10,
            'max'  => 18,
            'std'  => array(
                'size'   => 11,
                'unit'   => 'px',
                'family' => 'Monda',
                'style'  => 'regular',
                'color'  => '#7b7979'
            ),
            'style' => array(
                'selectors' => '#topbar, #topbar a, #topbar span, #topbar li:after, #topbar input, #topbar .menu li a',
                'properties' => 'font-size, font-family, color, font-style, font-weight'
            )
        ),

        110 => array(
            'id'   => 'topbar-links-hover',
            'type' => 'colorpicker',
            'name' => __( 'Topbar links hover color', 'yit' ),
            'desc' => __( 'Choose the color for links hover and the name of the user logged in.', 'yit' ),
            'std'  => '#b27b06',
            'style' => array(
                'selectors' => '#topbar .welcome_username span, #topbar a:hover, #topbar .menu li a:hover',
                'properties' => 'color'
            )
        ),
    ) );
}
add_filter( 'yit_submenu_tabs_theme_option_typography_header', 'yit_tab_typography_header' );

add_filter( 'yit_logo-font_std', create_function( '', "return array(
                    'size'   => 48,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#2f2f2f'
                );" ) );

function yit_logo_font_style( $array ) {
	$array['selectors'] = '#header #logo #textual, span.logo';    
    return $array;
}                
add_filter( 'yit_logo-font_style', 'yit_logo_font_style' ); 

add_filter( 'yit_logo-highlight-font_std', create_function( '', "return array(
                    'size'   => 48,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#b27b06'
                );" ) );

add_filter( 'yit_logo-tagline-font_std', create_function( '', "return array(
                    'size'   => 14,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#959494'
                );" ) );
				
add_filter( 'yit_logo-tagline-highlight-font_std', create_function( '', "return array(
                    'size'   => 14,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#b27b06'
                );" ) );				           