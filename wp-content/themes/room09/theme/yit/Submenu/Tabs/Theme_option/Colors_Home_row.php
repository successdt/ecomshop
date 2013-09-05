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
 * Class to print fields in the tab Colors -> General
 * 
 * @since 1.0.0
 */
class YIT_Submenu_Tabs_Theme_option_Colors_Home_row extends YIT_Submenu_Tabs_Abstract {
    /**
     * Default fields
     * 
     * @var array
     * @since 1.0.0
     */
    public $fields;
    
    /**
     * Merge default fields with theme specific fields using the filter yit_submenu_tabs_theme_option_colors_general
     * 
     * @param array $fields
     * @since 1.0.0
     */
    public function __construct() {
        $fields = $this->init();
        $this->fields = apply_filters( strtolower( __CLASS__ ), $fields );
    }
    
    /**
     * Set default values
     * 
     * @return array
     * @since 1.0.0
     */
    public function init() {  
        return array(        	                   	
            10 => array(
                'id' => 'home-row-widget-bg',
                'type' => 'colorpicker',
                'name' => __( 'Widget background', 'yit' ),
                'desc' => __( 'Select the background of the widgets box.', 'yit' ),
                'opacity' => 0.80,
                'std' => '#ffffff',
                'style' => array(
                	'selectors' => '.home-row .home-widget',
                	'properties' => 'background-color'
				)
            ),
              	                   	
            20 => array(
                'id' => 'home-row-widget-border',
                'type' => 'colorpicker',
                'name' => __( 'Widget border', 'yit' ),
                'desc' => __( 'Select the border color of the widgets box.', 'yit' ),
                'std' => '#c5c1be',
                'style' => array(
                	'selectors' => '.home-row .home-widget .widget-wrap, .home-row .home-widget .widget-wrap.widget-last',
                	'properties' => 'border-color'
				)
            ),
            
            30 => array(
                'id'   => 'home-row-widget-title',
                'type' => 'typography',
                'name' => __( 'Widget title', 'yit' ),
                'desc' => __( 'Choose the typography options for the title.', 'yit' ),
                'min'  => 10,
                'max'  => 32,
                'std'  => array(
                    'size'   => 13,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#985d14'
                ),
                'style' => array(
					'selectors' => '.home-row .home-widget h3',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),
            
            40 => array(
                'id'   => 'home-row-widget-paragraph',
                'type' => 'typography',
                'name' => __( 'Widget paragraph', 'yit' ),
                'desc' => __( 'Choose the typography options for the paragraphs.', 'yit' ),
                'min'  => 8,
                'max'  => 32,
                'std'  => array(
                    'size'   => 12,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#5e5c5c'
                ),
                'style' => array(
					'selectors' => '.home-row .home-widget p',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),          
        );
    }
}