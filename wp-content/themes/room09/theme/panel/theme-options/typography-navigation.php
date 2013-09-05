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
 * Add specific fields to the tab Typography -> Navigation
 * 
 * @param array $fields
 * @return array
 */ 
function yit_tab_typography_navigation( $fields ) {
        return array(
            10 => array(
                'id'   => 'navigation-text-font',
                'type' => 'typography',
                'name' => __( 'Navigation font', 'yit' ),
                'desc' => __( 'Choose the font type, size and color for the navigation.', 'yit' ),
                'min'  => 10,
                'max'  => 20,
                'std'  => apply_filters( 'yit_navigation-text-font_std', array(
                    'size'   => 14,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#353333'
                ) ),
                'style' => array(
					'selectors' => '#nav ul li, #nav ul li a, #nav .megamenu ul.sub-menu li.menu-item-custom-content p, #nav ul li, #nav ul li a span.special-font, #nav .megamenu ul.sub-menu li.menu-item-custom-content p span.special-font',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),
            11 => array(
                'id'   => 'navigation-text-font-hover',
                'type' => 'colorpicker',
                'name' => __( 'Navigation font hover', 'yit' ),
                'desc' => __( 'Choose the font type, size and color for the navigation when the status is "hover".', 'yit' ),
                'std'  => apply_filters( 'yit_navigation-text-font-hover_std', '#bc8c27' ),
                'style' => array(
					'selectors' => '#nav ul li a:hover, #nav li:hover > a, #nav ul li a:hover span, #nav li:hover > a span',
					'properties' => 'color'
				)
            ),
            12 => array(
                'id'   => 'navigation-text-font-active',
                'type' => 'colorpicker',
                'name' => __( 'Navigation font active', 'yit' ),
                'desc' => __( 'Choose the font type, size and color for the navigation active item.', 'yit' ),
                'std'  => apply_filters( 'yit_navigation-text-font-active_std', '#bc8c27' ),
                'style' => array(
					'selectors' => '#nav .current-menu-item > a, #nav .current-menu-ancestor > a, div#nav ul .current_page_item > a, #nav .current_page_ancestor > a, #nav .current-menu-ancestor > a, #nav .current-menu-item > a span, #nav .current-menu-ancestor > a span, div#nav ul .current_page_item > a span, #nav .current_page_ancestor > a span, #nav .current-menu-ancestor > a span',
					'properties' => 'color'
				)
            ),
            20 => array(
                'id'   => 'sub-navigation-text-font',
                'type' => 'typography',
                'name' => __( 'Sub Navigation font', 'yit' ),
                'desc' => __( 'Choose the font type, size and color for the navigation sub menus.', 'yit' ),
                'min'  => 1,
                'max'  => 18,
                'std'  => apply_filters( 'yit_sub-navigation-text-font_std', array(
                    'size'   => 12,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#666767'
                ) ),
                'style' => array(
					'selectors' => '#nav ul li ul li a, #nav .megamenu ul.sub-menu li li a, #nav ul li ul li a span.special-font, #nav .megamenu ul.sub-menu li li a span.special-font',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),
            21 => array(
                'id'   => 'sub-navigation-text-font-hover',
                'type' => 'colorpicker',
                'name' => __( 'Sub Navigation font hover', 'yit' ),
                'desc' => __( 'Choose the font type, size and color for the navigation sub menus when the status is "hover".', 'yit' ),
                'std'  => apply_filters( 'yit_sub-navigation-text-font-hover_std', '#bc8c27' ),
                'style' => array(
					'selectors' => '#nav ul li ul li a:hover, #nav .megamenu ul.sub-menu li li a:hover, #nav ul li ul li a:hover span, #nav .megamenu ul.sub-menu li li a:hover span',
					'properties' => 'color'
				)
            ),
            22 => array(
                'id'   => 'sub-navigation-text-font-active',
                'type' => 'colorpicker',
                'name' => __( 'Sub Navigation font active', 'yit' ),
                'desc' => __( 'Choose the font type, size and color for the navigation sub menus active item.', 'yit' ),
                'std'  => apply_filters( 'yit_sub-navigation-text-font-active_std', '#bc8c27' ),
                'style' => array(
					'selectors' => '#nav ul ul .current-menu-item > a, #nav ul ul .current-menu-ancestor > a, div#nav ul ul .current_page_item > a, #nav .megamenu ul.sub-menu li a, #nav ul ul .current-menu-item > a span, #nav ul ul .current-menu-ancestor > a span, div#nav ul ul .current_page_item > a span, #nav .megamenu ul.sub-menu li a span',
					'properties' => 'color'
				)
            ),
            
            25 => array(
                'id'   => 'megamenu-title-font',
                'type' => 'typography',
                'name' => __( 'Megamenu title font', 'yit' ),
                'desc' => __( 'Choose the font type, size and color for the megamenu titles.', 'yit' ),
                'min'  => 1,
                'max'  => 24,
                'std'  => apply_filters( 'yit_sub-navigation-text-font_std', array(
                    'size'   => 12,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#010101'
                ) ),
                'style' => array(
					'selectors' => '#nav .megamenu ul.sub-menu li a, #nav .megamenu ul.sub-menu li a span.special-font',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),
			
			
        );
}
add_filter( 'yit_submenu_tabs_theme_option_typography_navigation', 'yit_tab_typography_navigation' );