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
 * Class to print fields in the tab Colors -> Sidebar
 * 
 * @since 1.0.0
 */
class YIT_Submenu_Tabs_Theme_option_Colors_Sidebar extends YIT_Submenu_Tabs_Abstract {
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
            
            /*
            20 => array(
                'id' => 'button-sidebar',
                'type' => 'colorpicker',
                'name' => __( 'Widget button in sidebar', 'yit' ),
                'desc' => __( 'Select the button color in the widgets box.', 'yit' ),
                'std' => '#bc7f3e',
                'style' => array(
                	'selectors' => '.yit_quick_contact .contact-form li.submit-button input.sendmail, .sidebar .cta .newsletter-submit .submit-field, #footer .cta .newsletter-submit .submit-field',
                	'properties' => 'background-color'
				)
            ),
            
            30 => array(
                'id' => 'button-hover-sidebar',
                'type' => 'colorpicker',
                'name' => __( 'Widget hover button in sidebar', 'yit' ),
                'desc' => __( 'Select the button hover color in the widgets box.', 'yit' ),
                'std' => '#e79c0c',
                'style' => array(
                	'selectors' => '.yit_quick_contact .contact-form li.submit-button input.sendmail:hover, .sidebar .cta .newsletter-submit .submit-field:hover, #footer .cta .newsletter-submit .submit-field:hover',
                	'properties' => 'background-color'
				)
            ), */
            
			40 => array(
                'id' => 'button-text-sidebar',
                'type' => 'colorpicker',
                'name' => __( 'Widget text button in sidebar', 'yit' ),
                'desc' => __( 'Select the button text color in the widgets box.', 'yit' ),
                'std' => '#ffffff',
                'style' => array(
                	'selectors' => '.yit_quick_contact .contact-form li.submit-button input.sendmail',
                	'properties' => 'color'
				)
            ),
        );
    }
}