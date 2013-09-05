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
 * Class to print fields in the tab General -> Header
 *
 * @since 1.0.0
 */
class YIT_Submenu_Tabs_Theme_option_General_Header extends YIT_Submenu_Tabs_Abstract {
    /**
     * Default fields
     *
     * @var array
     * @since 1.0.0
     */
    public $fields;

    /**
     * Merge default fields with theme specific fields using the filter yit_submenu_tabs_theme_option_shop_general_settings
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
                'id'   => 'login-width',
                'type' => 'slider',
                'name' => __( 'Width reserved to Logo section', 'yit' ),
                'desc' => __( 'Select the max width reserved to the logo section.', 'yit' ),
                'std'  => 270,
                'min'  => 70,
                'max'  => 1170,
                'step' => 100
            ),
            20 => array(
                'id'   => 'topbar-login',
                'type' => 'onoff',
                'name' => __( 'Display Login links', 'yit' ),
                'desc' => __( 'Say if you want to display the Login/Register item in Tobar.', 'yit' ),
                'std'  => 1,
            ),
            30 => array(
                'id'   => 'show-header-search',
                'type' => 'onoff',
                'name' => __( 'Show Search bar', 'yit' ),
                'desc' => __( 'Say if you want to display the search bar in header.', 'yit' ),
                'std'  => true,
            ),

        );
    }
}
