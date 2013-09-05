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

/*
Template Name: Home Bg Slider
*/

if( is_posts_page() || is_home() )
    { get_template_part( 'blog' ); die; }

remove_action( 'yit_footer', 'yit_footer', 10 );
yit_add_body_class('home-full-screen');

add_action( 'wp_head', create_function( '', 'echo "<style>html, body { height:100%; overflow:hidden; }</style>";' ) );

// change params of sidebar Home Row
$sidebar = 'home-row';
$sidebars = wp_get_sidebars_widgets();

global $wp_registered_sidebars;

switch ( count( $sidebars[$sidebar] ) ) {
    case 1  : $widget_class = 'span12'; break;
    case 2  : $widget_class = 'span6';  break;
    case 3  : $widget_class = 'span4';  break;
    default : $widget_class = 'span3';  break;
}

$widget_class = "home-widget $widget_class";
$wp_registered_sidebars[$sidebar]['before_widget'] = '<div id="%1$s" class="' . $widget_class . ' %2$s"><div class="widget-wrap">';
$wp_registered_sidebars[$sidebar]['after_widget'] = '</div></div>';

get_header(); if ( ! empty( $sidebars[$sidebar] ) ) { ?>

<div class="home-row container">
    <div class="row"><?php dynamic_sidebar($sidebar) ?></div>
</div>

<?php } get_footer() ?>