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
 * Add the tab in the theme options
 */
function yit_add_sidebar_tab( $tabs ) {
    $new_tab = array( 'sidebar' => __( 'Sidebar', 'yit' ) );
    
    yit_array_splice_assoc( $tabs['colors'], $new_tab, 'footer' );
       
    return $tabs; 
} 
add_filter( 'yit_admin_submenu_theme_options', 'yit_add_sidebar_tab' );