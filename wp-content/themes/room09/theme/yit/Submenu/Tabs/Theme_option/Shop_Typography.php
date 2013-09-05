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
 * Class to print fields in the tab Shop -> Typography
 * 
 * @since 1.0.0
 */
class YIT_Submenu_Tabs_Theme_option_Shop_Typography extends YIT_Submenu_Tabs_Abstract {
    /**
     * Default fields
     * 
     * @var array
     * @since 1.0.0
     */
    public $fields;
    
    /**
     * Merge default fields with theme specific fields using the filter yit_submenu_tabs_theme_option_shop_typography
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
        	/* === START FONT === */   
            10 => array(
                'type' => 'title',
                'name' => __( 'Cart header widget', 'yit' ),
                'desc' => __( 'Typography settings for the widget of shopping cart in header.', 'yit' )
            ),
			12 => array(
                'id'   => 'shop-cart-header-font',
                'type' => 'typography',
                'name' => __( 'Shopping cart text header font', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 8,
                'max'  => 18,
                'std'  => array(
                    'size'   => 11,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#353333'
                ),
                'style' => array(
					'selectors' => '#header-cart span.cart-label',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),
            14 => array(
                'id'   => 'shop-cart-header-items-font',
                'type' => 'typography',
                'name' => __( 'Shopping cart items and price header font', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 8,
                'max'  => 18,
                'std'  => array(
                    'size'   => 11,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#6c6c6c'
                ),
                'style' => array(
					'selectors' => '#header-cart .widget_shopping_cart .cart_label span',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),
            20 => array(
                'id'   => 'shop-cart-font',
                'type' => 'typography',
                'name' => __( 'Shopping cart list font', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 10,
                'max'  => 18,
                'std'  => array(
                    'size'   => 12,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#373736'
                ),
                'style' => array(
					'selectors' => '#header-cart .yit_cart_widget.widget_shopping_cart .cart_wrapper ul.cart_list li a',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),
            30 => array(
                'id' => 'shop-cart-font-hover',
                'type' => 'colorpicker',
                'name' => __( 'Shopping cart list font hover', 'yit' ),
                'desc' => __( 'Select the color of shop cart list on hover.', 'yit' ),
                'std' => '#995D08',
                'style' => array(
                	'selectors' => '#header-cart .yit_cart_widget.widget_shopping_cart .cart_wrapper ul.cart_list li a:hover',
                	'properties' => 'color'
				)
            ),
            /*40 => array(
                'id'   => 'remove-cart-font',
                'type' => 'typography',
                'name' => __( 'Shopping cart remove font', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 10,
                'max'  => 18,
                'std'  => array(
                    'size'   => 10,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#373736'
                ),
                'style' => array(
					'selectors' => '#header-cart-search .cart_wrapper .cart_list li a.remove_item',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),
            50 => array(
                'id' => 'remove-cart-font-hover',
                'type' => 'colorpicker',
                'name' => __( 'Shopping cart remove font hover', 'yit' ),
                'desc' => __( 'Select the color of shop cart list on hover.', 'yit' ),
                'std' => '#995D08',
                'style' => array(
                	'selectors' => '#header-cart-search .cart_wrapper .cart_list li a.remove_item:hover',
                	'properties' => 'color'
				)
            ),*/
            60 => array(
                'id'   => 'price-cart-font',
                'type' => 'typography',
                'name' => __( 'Shopping cart price font', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 10,
                'max'  => 18,
                'std'  => array(
                    'size'   => 12,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#8b8b84'
                ),
                'style' => array(
					'selectors' => '#header-cart .yit_cart_widget.widget_shopping_cart ul.product_list_widget li .quantity, #header-cart .yit_cart_widget.widget_shopping_cart ul.product_list_widget li .amount',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),
            65 => array(
                'id'   => 'subtotal-cart-font',
                'type' => 'typography',
                'name' => __( 'Shopping cart subtotal font', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 10,
                'max'  => 18,
                'std'  => array(
                    'size'   => 12,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#373736'
                ),
                'style' => array(
					'selectors' => '#header-cart .yit_cart_widget.widget_shopping_cart .cart_wrapper .total, #header-cart .yit_cart_widget.widget_shopping_cart .cart_wrapper .total .amount',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),
			70 => array(
                'id'   => 'shop-cart-empty-font',
                'type' => 'typography',
                'name' => __( 'Shopping cart empty font', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 10,
                'max'  => 18,
                'std'  => array(
                    'size'   => 12,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#373736' 
                ),
                'style' => array(
					'selectors' => '#header-cart .yit_cart_widget.widget_shopping_cart .cart_wrapper .cart_list li.empty',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),
            80 => array(
                'id'   => 'shop-cart-button-font',
                'type' => 'typography',
                'name' => __( 'Shopping cart button font', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 10,
                'max'  => 18,
                'std'  => array(
                    'size'   => 10,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#ffffff' 
                ),
                'style' => array(
					'selectors' => '#header-cart .yit_cart_widget.widget_shopping_cart .cart_wrapper .buttons .button',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),
            /*90 => array(
                'id'   => 'shop-search-font',
                'type' => 'typography',
                'name' => __( 'Shopping search form font', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 10,
                'max'  => 18,
                'std'  => array(
                    'size'   => 18,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#747373' 
                ),
                'style' => array(
					'selectors' => '#header-cart-search #search_mini',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),*/
              
            100 => array(
                'type' => 'title',
                'name' => __( 'Products page', 'yit' ),
                'desc' => __( 'Common settings for the products page.', 'yit' )
            ), 
            110 => array(
                'id'   => 'shop-title',
                'type' => 'typography',
                'name' => __( 'Product title', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 10,
                'max'  => 36,
                'std'  => array(
                    'size'   => 14,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#a96e2e' 
                ),
                'style' => array(
					'selectors' => '.woocommerce ul.products li.product h3, ul.products li.product h3, .woocommerce ul.products li.product.grid.classic h3',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),
            120 => array(
                'id'   => 'shop-title-uppercase',
                'type' => 'onoff',
                'name' => __( 'Set uppercase in the product title', 'yit' ),
                'desc' => __( 'Set YES if you want to force the uppercase in the product title.', 'yit' ),
                'std'  => 1
            ), 
            130 => array(
                'id'   => 'shop-price',
                'type' => 'typography',
                'name' => __( 'Product price', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 10,
                'max'  => 36,
                'std'  => array(
                    'size'   => 14,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#5e5c5c'
                ),
                'style' => array(
                    'selectors' => '.woocommerce ul.products li.product .price',
                    'properties' => 'font-size, font-family, color, font-style, font-weight'
                )
            ),
            140 => array(
                'id'   => 'shop-product-actions',
                'type' => 'typography',
                'name' => __( 'Product actions', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 10,
                'max'  => 36,
                'std'  => array(
                    'size'   => 11,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#a3a1a1'
                ),
                'style' => array(
                    'selectors' => '.woocommerce .product .product-actions, .woocommerce .product .product-actions a',
                    'properties' => 'font-size, font-family, color, font-style, font-weight'
                )
            ),
            150 => array(
                'id' => 'shop-product-actions-hover',
                'type' => 'colorpicker',
                'name' => __( 'Product actions on hover', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'std' => '#985d14',
                'style' => array(
                    'selectors' => '.woocommerce .product .product-actions:hover, .woocommerce .product .product-actions a:hover, .woocommerce .product .product-actions a.active',
                    'properties' => 'color'
                )
            ),
            200 => array(
                'type' => 'title',
                'name' => __( 'Product single page', 'yit' ),
                'desc' => __( 'Common settings for the detail page of a product.', 'yit' )
            ), 
            210 => array(
                'id'   => 'shop-single-title',
                'type' => 'typography',
                'name' => __( 'Product title', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 10,
                'max'  => 54,
                'std'  => array(
                    'size'   => 18,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#353333' 
                ),
                'style' => array(
					'selectors' => '.product .summary h1.product_title',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),  
            220 => array(
                'id'   => 'shop-single-title-uppercase',
                'type' => 'onoff',
                'name' => __( 'Set uppercase in the product title', 'yit' ),
                'desc' => __( 'Set YES if you want to force the uppercase in the product title.', 'yit' ),
                'std'  => 1
            ),  
            230 => array(
                'id'   => 'shop-single-price',
                'type' => 'typography',
                'name' => __( 'Product price', 'yit' ),
                'desc' => __( 'Choose the font type, size and color.', 'yit' ),
                'min'  => 10,
                'max'  => 54,
                'std'  => array(
                    'size'   => 18,
                    'unit'   => 'px',
                    'family' => 'Monda',
                    'style'  => 'regular',
                    'color'  => '#353333' 
                ),
                'style' => array(
					'selectors' => '.woocommerce div.product .summary p.price',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),           
              
            240 => array(
                'type' => 'title',
                'name' => __( 'Shop Sidebar', 'yit' ),
                'desc' => __( 'Common settings for the shop sidebar widgets.', 'yit' )
            ),    
            250 => array(
                'id'   => 'shop-sidebar-ajax-titles',
                'type' => 'typography',
                'name' => __( 'AJAX Layered widgets title', 'yit' ),
                'desc' => __( 'Choose the font type, size and color for the title of AJAX Layered Nav widgets', 'yit' ),
                'min'  => 10,
                'max'  => 54,
                'std'  => array(
                    'size'   => 14,
                    'unit'   => 'px',
                    'family' => 'Oswald',
                    'style'  => 'book',
                    'color'  => '#373736' 
                ),
                'style' => array(
					'selectors' => '.sidebar .widget_price_filter.widget h3, .sidebar .widget_layered_nav.widget h3',
					'properties' => 'font-size, font-family, color, font-style, font-weight'
				)
            ),      
        );
    }
}