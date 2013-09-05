<?php 
/**
 * Your Inspiration Themes
 * 
 * In this files the framework register theme metaboxes.
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

function yit_remove_options_metabox( $array ) {
    
    return $array;
}
add_filter( 'yit_remove_options_metabox', 'yit_remove_options_metabox' );

//yit_metaboxes_sep( 'yit-page-settings', __( 'Settings', 'yit' ) );

/**
 * SLIDER BACKGROUND
 */
yit_metaboxes_sep( 'yit-page-settings', __( 'Body Background', 'yit' ) );

$options = array(
    'title' => __( 'Background slider', 'yit' ),
    'desc' =>  __( 'Select the slider to use for background. (Ignore the options below, if you want to use a slider for the background)', 'yit' ),
    'options' => array_merge( array( '' => '' ), yit_get_sliders('background') )
);
yit_add_option_metabox( 'yit-page-settings', __( 'Body Background', 'yit' ), '_bg_slider', 'select', $options );    

/**
 * TESTIMONIALS
 */ 
yit_metaboxes_sep( 'yit-testimonial-site', __( 'Settings', 'yit' ) );

$options = array(
    'title' => __( 'Small quote', 'yit' ),
    'desc' =>  __( 'Insert the text to show with blockquote', 'yit' ),
);

yit_add_option_metabox( 'yit-testimonial-site', __( 'Settings', 'yit' ), '_small-quote', 'text', $options );

/**
 * LOGOS
 */ 
yit_register_metabox ( 'yit-logo-site', __( 'Other Logo info', 'yit' ), 'logo' );
$options = array(
    'title' => __( 'Link', 'yit' ),
    'desc' =>  __( 'Insert the link for Logo.', 'yit' ),
);
yit_add_option_metabox( 'yit-logo-site', __( 'Settings', 'yit' ), '_site-link', 'text', $options );

/**
 * SITEMAP
 */
$options = array(
    'title' => __( 'Hide in Sitemap', 'yit' ),
    'desc' =>  __( 'Do not show in Sitemap.', 'yit' ),
);
yit_metaboxes_sep( 'yit-page-settings', __( 'Settings', 'yit' ) );
yit_add_option_metabox( 'yit-page-settings', __( 'Settings', 'yit' ), '_exclude-sitemap', 'checkbox', $options );             
yit_metaboxes_sep( 'yit-post-settings', __( 'Settings', 'yit' ) );
yit_add_option_metabox( 'yit-post-settings', __( 'Settings', 'yit' ), '_exclude-sitemap', 'checkbox', $options );             


/**
* PRODUCT SIDEBAR LAYOUT
*/

yit_register_metabox ( 'yit-custom-product-settings', __( 'Product Page Settings', 'yit' ), 'product' );
 
                                                            

/**
* PRODUCT CUSTOM TABS
*/

$options = array(
    'title' => __( 'Show ask info form?', 'yit' ),
    'desc'  =>  __( 'Set YES if you want a tab with the "Ask Info" form.', 'yit' ),
    'std'   => (yit_get_option('shop-products-details-contact-form') != -1) ? 1 : 0 , // -1 No from selected
);
yit_add_option_metabox( 'yit-custom-product-settings', __( 'Tabs', 'yit' ), '_use_ask_info', 'onoff', $options );

$options = array(
	'title' => __( 'Tabs', 'yit' ),
	'desc' => __( 'Insert a custom tab.', 'yit' ),
);
yit_add_option_metabox ( 'yit-custom-product-settings', __( 'Tabs', 'yit' ), '_custom_tabs', 'customtabs', $options );


// move up the background slider option
function yit_move_up_background_slider( $options ) {      //yit_Debug($options);
    $tmp_options = $options['yit-page-settings']['Body Background'];
    
    $last = array();
    $last[] = array_pop( $tmp_options );
    $last[] = array_pop( $tmp_options );
    $tmp_options = array_merge( $last, $tmp_options );      
    
    $options['yit-page-settings']['Body Background'] = $tmp_options;
    
    return $options;
}
add_filter( 'yit_add_options_metabox', 'yit_move_up_background_slider', 10 );


/* HEADER */
yit_metaboxes_sep( 'yit-page-settings', __( 'Header', 'yit' ) );

$options = array(
    'title' => __( 'Enable custom header background', 'yit' ),
    'desc'  =>  __( 'Set YES if you want to customize the header background.', 'yit' ),
    'std'   => 0
);
yit_add_option_metabox( 'yit-page-settings', __( 'Header', 'yit' ), '_enable_custom_header', 'onoff', $options );

$options = array(
    'title' => __( 'Header Min-Height', 'yit' ),
    'desc' =>  __( 'Select the min-height of the header.', 'yit' ),
    'std' => 0
);
yit_add_option_metabox( 'yit-page-settings', __( 'Header', 'yit' ), '_header-height', 'number', $options );

$options = array(
    'title' =>  __( 'Header background color', 'yit' ),
    'desc' =>  __( 'Select a background color for the header.', 'yit' )
);
yit_add_option_metabox( 'yit-page-settings', __( 'Header', 'yit' ), '_background-header', 'colorpicker', $options );

$options = array(
    'title' => __( 'Header background image', 'yit' ),
    'desc' =>  __( 'Select a background image for the header.', 'yit' ),
);
yit_add_option_metabox( 'yit-page-settings', __( 'Header', 'yit' ), '_background-header-image', 'upload', $options );

$options = array(
    'title' => __( 'Background repeat', 'yit' ),
    'desc' => __( 'Select the repeat mode for the background image.', 'yit' ),
    'options' => array(
        '' => __( 'Default', 'yit' ),
        'repeat' => __( 'Repeat', 'yit' ),
        'repeat-x' => __( 'Repeat Horizontally', 'yit' ),
        'repeat-y' => __( 'Repeat Vertically', 'yit' ),
        'no-repeat' => __( 'No Repeat', 'yit' ),
    ),
);
yit_add_option_metabox( 'yit-page-settings', __( 'Header', 'yit' ), '_background-header-repeat', 'select', $options );

$options = array(
    'title' => __( 'Background position', 'yit' ),
    'desc' => __( 'Select the position for the background image.', 'yit' ),
    'options' => array(
        '' => __( 'Default', 'yit' ),
        'center' => __( 'Center', 'yit' ),
        'top left' => __( 'Top left', 'yit' ),
        'top center' => __( 'Top center', 'yit' ),
        'top right' => __( 'Top right', 'yit' ),
        'bottom left' => __( 'Bottom left', 'yit' ),
        'bottom center' => __( 'Bottom center', 'yit' ),
        'bottom right' => __( 'Bottom right', 'yit' ),
    ),
);
yit_add_option_metabox( 'yit-page-settings', __( 'Header', 'yit' ), '_background-header-position', 'select', $options );

$options = array(
    'title' => __( 'Background attachment', 'yit' ),
    'desc' => __( 'Select the attachment for the background image.', 'yit' ),
    'options' => array(
        '' => __( 'Default', 'yit' ),
        'scroll' => __( 'Scroll', 'yit' ),
        'fixed' => __( 'Fixed', 'yit' ),
    ),
);
yit_add_option_metabox( 'yit-page-settings', __( 'Header', 'yit' ), '_background-header-attachment', 'select', $options );
