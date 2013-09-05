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


add_filter( 'yit_recent-posts-title_std', create_function('',"return array(
            'size'   => 12,
            'unit'   => 'px',
            'family' => 'Monda',
            'style'  => 'regular',
            'color'  => '#282726'
			);")
);

add_filter( 'yit_recent-posts-title-hover_std', create_function('','return "#a86e24";'));

add_filter( 'yit_recent-posts-excerpt_std', create_function('',"return array(
            'size'   => 11,
            'unit'   => 'px',
            'family' => 'Monda',
            'style'  => 'regular',
            'color'  => '#8e8a83'
			);")
);

add_filter( 'yit_recent-posts-excerpt_style', create_function('',"return array(
            'selectors'   => '.sidebar .recent-post p, .recent-post p'
			);")
);

add_filter( 'yit_recent-posts-date_std', create_function('',"return array(
            'size'   => 11,
            'unit'   => 'px',
            'family' => 'Monda',
            'style'  => 'regular',
            'color'  => '#8e8a83'
			);")
);

add_filter( 'yit_recent-posts-readmore_std', create_function('',"return array(
            'size'   => 11,
            'unit'   => 'px',
            'family' => 'Monda',
            'style'  => 'bold',
            'color'  => '#585555'
			);")
);

add_filter( 'yit_recent-posts-readmore-hover_std', create_function('','return "#d98104";'));