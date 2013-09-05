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

function yit_pages_404_font_std( $array ) {
    $array['size'] = 16;
    $array['family'] = 'Monda';
	$array['style']  = 'regular';
    $array['color']  = '#808080';
    
    return $array;
}
add_filter( 'yit_pages-404-font_std', 'yit_pages_404_font_std' );

function yit_pages_404_font_style( $array ) {
    $array['selectors'] = '.error-404-text p, .error-404-text p a';
    
    return $array;
}
add_filter( 'yit_pages-404-font_style', 'yit_pages_404_font_style' );

add_filter( 'yit_pages-404-a-font_std', create_function('', 'return "#c19537";') );
add_filter( 'yit_pages-404-a-font-hover_std', create_function('', 'return "#d58f2c";') );