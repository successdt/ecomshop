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
 * Manage the Skins of the theme
 * 
 * @since 1.0.0
 */
class YIT_Skin {

    /**
     * Form action for admin panel
     *
     * @var array
     */
    var $admin_action = 'apply-skin';

    /**
     * Skins
     *
     * @var array
     */
    var $skins = array();

	/**
	 * Constructor
	 */
	public function __construct() {

        // add tab in the theme panel
        add_action( 'yit_admin_tree', array( $this, 'add_tab' ) );

    }
	
	/**
	 * Init
	 * 
	 */
	public function init() {
        //if ( ! is_admin() ) return;

        /* skins */
        $this->skins = apply_filters( 'yit_skins', array(
            'gold' => __( 'Gold', 'yit' ),
            'b-w' => __( 'Balck & White', 'yit' ),
        ) );

        // add tab in the theme panel
        add_action( 'yit_save_panel', array( $this, 'save_skin' ) );

        // add custom css for skin
        add_action( 'wp_enqueue_scripts', array( $this, 'add_skin_css' ) );
	}

    /**
     * Include the skin css for custom style of each skin
     */
    public function add_skin_css() {
        $skin = yit_get_option('skin');
        if ( empty( $skin ) ) return;
        yit_enqueue_style( 5000, 'skin-' . $skin, YIT_THEME_CSS_URL . '/skins/' . $skin . '.css', false, array(), false, 'all', true );
    }

    /**
     * Add the tab in the theme options
     */
    public function add_tab( $tree ) {
        $tree['subpages']['skins'] = array(
            'parent_slug' => 'yit_panel',
			'page_title'  => __( 'Skins', 'yit' ),
			'menu_title'  => __( 'Skins', 'yit' ),
			'capability'  => 'manage_options',
			'menu_slug'   => 'yit_panel_skins',
			'function'    => 'display_page'
        );
        return $tree;
    }

    /**
     * Save the skin in the database
     */
    public function save_skin() {
        if ( ! isset( $_POST['yit-action'] ) || $_POST['yit-action'] != $this->admin_action ) return;

        $skin = isset( $_POST['skin'] ) ? $_POST['skin'] : null;
        if ( empty( $skin ) ) return;

        $skin_file = yit_locate_template( 'skins/' . $skin . '.txt' );
        if ( empty( $skin_file ) ) return;

        $skin_config = @file_get_contents( $skin_file );
        if ( empty( $skin_config ) ) return;
        $skin_config = unserialize( base64_decode( $skin_config ) );

        // the options to remove from txt import data
        $exclude = apply_filters( 'yit_skin_exclude_options', array(
            'pages' => array( 'buy', 'sidebars', 'seo', 'splash', 'maintenance', 'backup', 'support', 'update', 'skins', 'plugins' ),
            'tabs' => array(
                'theme_option_blog_settings',
                'theme_option_general_cachefonts',
                'theme_option_general_newsletter',
                'theme_option_general_sitemap',
                'theme_option_general_responsive',
                'theme_option_pages_404',
                'theme_option_pages_archives',
                'theme_option_pages_categories',
                'theme_option_pages_search',
                'theme_option_testimonials_settings',
                'theme_option_custom_codes_custom_style',
                'theme_option_custom_codes_custom_script',
                'theme_option_popup_settings',
                'theme_option_popup_newsletter',
                'theme_option_shop_general_settings',
                'theme_option_shop_products_page',
                'theme_option_shop_products_details_page',
                'theme_option_shop_category_page'
            ),
            'options' => array(
            ),
        ) );

        // the options to include in the skin import data
        $include = apply_filters( 'yit_skin_include_options', array(
            'blog-type',
            'blog-single-type',
            'shop-layout',
            'shop-single-layout',
            'shop-products-layout-1-bg',
            'shop-products-layout-1-borders'
        ) );

        // esclude options
        $fields = yit_get_model( 'panel' )->panel;
        foreach ( $fields as $page => $tabs ) {
            if ( in_array( $page, $exclude['pages'] ) ) unset( $fields[$page] );
            foreach ( $tabs as $tab => $options ) {
                if ( in_array( $tab, $exclude['tabs'] ) ) unset( $fields[$page][$tab] );
                if ( empty( $options ) || ! is_array( $options ) ) continue;
                foreach ( $options as $option_pos => $option_args ) {
                    if ( isset( $option_args['id'] ) && in_array( $option_args['id'], $exclude['options'] ) ) unset( $fields[$page][$tab][$option_pos] );
                }
            }
        }

        // filter options
        $filter_options = array();
        foreach ( $fields as $page => $tabs ) {
            foreach ( $tabs as $tab => $options ) {
                if ( empty( $options ) || ! is_array( $options ) ) continue;
                foreach ( $options as $option_pos => $option_args ) {
                    if ( ! isset( $option_args['id'] ) ) continue;
                    yit_get_model('panel')->update_option( $option_args['id'], $skin_config[ $option_args['id'] ] );
                }
            }
        }

        foreach ( $include as $id ) {
            yit_get_model('panel')->update_option( $id, $skin_config[ $id ] );
        }

        // save the actual skin
        yit_get_model('panel')->update_option( 'skin', $skin );

//         yit_debug(yit_get_model('panel')->db_options);
//         die;

        yit_add_message( __( 'Skin applyed', 'yit' ), 'updated', 'panel' );
        yit_get_model('panel')->update_db_options();

        if( defined( 'DOING_AJAX' ) )
            { yit_get_model('message')->printMessages(); die; }
    }

}