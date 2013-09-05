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

function yit_submenu_tabs_theme_option_blog_typography( $items ) {
    $items[50] = $items[30];
    $items[60] = $items[40];

    $items[12] = array(
        'id'   => 'blog-title-hover-font',
        'type' => 'typography',
        'name' => __( 'Title hover', 'yit' ),
        'desc' => __( 'Choose the font type, size and color for the title hover.', 'yit' ),
        'min'  => 1,
        'max'  => 30,
        'std'  => apply_filters( 'yit_blog-title-hover-font_std', array(
            'size'   => 18,
            'unit'   => 'px',
            'family' => 'Monda',
            'style'  => 'regular',
            'color'  => '#D98104'
        ) ),
        'style' => apply_filters('yit_blog-title-hover-font_style',array(
            'selectors' => '.post-title:hover, .post-title a:hover, .blog-big .meta .post-title a:hover,
                            .blog-small .meta .post-title a:hover, .blog-bazar .blog-bazar-header .post-title:hover, .blog-bazar .blog-bazar-header .post-title a:hover,
                            .hentry-post .post-title > a:hover',
            'properties' => 'font-size, font-family, color, font-style, font-weight'
        ))
    );

    unset($items[20]);
    unset($items[21]);
    unset($items[50]);
    unset($items[60]);

    $items[30] = array(
        'id'   => 'blog-ribbon-month',
        'type' => 'typography',
        'name' => __( 'Date month', 'yit' ),
        'desc' => __( 'Choose the font type, size and color for the month in the date of the blog Ribbon.', 'yit' ),
        'min'  => 1,
        'max'  => 50,
        'std'  => apply_filters( 'yit_blog-ribbon-month_std', array(
            'size'   => 24,
            'unit'   => 'px',
            'family' => 'Josefin Sans',
            'style'  => 'bold',
            'color'  => '#2f2f2f'
        ) ),
        'style' => array(
            'selectors' => '.blog-big-ribbon .date-comments .date .month, .blog-small-ribbon .date-comments .date .month, .section.blog .post .date .month',
            'properties' => 'font-size, font-family, color, font-style, font-weight'
        ),
        'deps' => array(
            'ids' => 'blog-type',
            'values' => 'big-ribbon,small-ribbon'
        )
    );

    $items[40] = array(
        'id'   => 'blog-ribbon-day',
        'type' => 'typography',
        'name' => __( 'Date day', 'yit' ),
        'desc' => __( 'Choose the font type, size and color for the day in the date of the blog Ribbon.', 'yit' ),
        'min'  => 1,
        'max'  => 60,
        'std'  => apply_filters( 'yit_blog-ribbon-day_std', array(
            'size'   => 50,
            'unit'   => 'px',
            'family' => 'Josefin Sans',
            'style'  => 'regular',
            'color'  => '#2f2f2f'
        ) ),
        'style' => array(
            'selectors' => '.blog-big-ribbon .date-comments .date .day, .blog-small-ribbon .date-comments .date .day, .section.blog .post .date .day',
            'properties' => 'font-size, font-family, color, font-style, font-weight'
        ),
        'deps' => array(
            'ids' => 'blog-type',
            'values' => 'big-ribbon,small-ribbon'
        )
    );

    $items[45] = array(
        'id'   => 'blog-ribbon-background-comments',
        'type' => 'colorpicker',
        'name' => __( 'Background comments', 'yit' ),
        'desc' => __( 'Choose the color for the background in the comments count of the blog Ribbon.', 'yit' ),
        'min'  => 1,
        'max'  => 60,
        'std'  => apply_filters( 'yit_blog-ribbon-background-comments_std', '#C27D05' ),
        'style' => array(
            'selectors' => '.blog-big-ribbon .date-comments .comments, .blog-small-ribbon .date-comments .comments',
            'properties' => 'background-color'
        ),
        'deps' => array(
            'ids' => 'blog-type',
            'values' => 'big-ribbon,small-ribbon'
        )
    );

    $items[50] = array(
        'id'   => 'blog-image-month',
        'type' => 'typography',
        'name' => __( 'Date month', 'yit' ),
        'desc' => __( 'Choose the font type, size and color for the month in the date of the blog Image.', 'yit' ),
        'min'  => 1,
        'max'  => 50,
        'std'  => apply_filters( 'yit_blog-image-month_std', array(
            'size'   => 24,
            'unit'   => 'px',
            'family' => 'Josephin Sans',
            'style'  => 'regular',
            'color'  => '#2f2f2f'
        ) ),
        'style' => array(
            'selectors' => '.blog-big-image .blog-big-image-date .month, .blog-small-image .blog-small-image-date .month',
            'properties' => 'font-size, font-family, color, font-style, font-weight'
        ),
        'deps' => array(
            'ids' => 'blog-type',
            'values' => 'big-image,small-image'
        )
    );

    $items[60] = array(
        'id'   => 'blog-image-day',
        'type' => 'typography',
        'name' => __( 'Date day', 'yit' ),
        'desc' => __( 'Choose the font type, size and color for the day in the date of the blog Image.', 'yit' ),
        'min'  => 1,
        'max'  => 60,
        'std'  => apply_filters( 'yit_blog-image-day_std', array(
            'size'   => 50,
            'unit'   => 'px',
            'family' => 'Josefin Sans',
            'style'  => 'bold',
            'color'  => '#2f2f2f'
        ) ),
        'style' => array(
            'selectors' => '.blog-big-image .blog-big-image-date .day, .blog-small-image .blog-small-image-date .day',
            'properties' => 'font-size, font-family, color, font-style, font-weight'
        ),
        'deps' => array(
            'ids' => 'blog-type',
            'values' => 'big-image,small-image'
        )
    );

    return $items;
}
add_filter( 'yit_submenu_tabs_theme_option_blog_typography', 'yit_submenu_tabs_theme_option_blog_typography' );
 
function yit_blog_title_std( $array ) {
    $array['color'] = '#373736';
    $array['family'] = 'Monda';
    $array['style'] = 'regular';
    $array['size'] = 18;
    
    return $array;    
}
add_filter( 'yit_blog-title-font_std', 'yit_blog_title_std' );

function yit_blog_title_style( $array ) {
    $array['selectors'] = '.post-title, .post-title a, .blog-big .meta .post-title a, .blog-small .meta .post-title a';
    return $array;    
}
add_filter( 'yit_blog-title-font_style', 'yit_blog_title_style' );

function yit_section_blog_post_title_std( $array ) {
    $array['color'] = '#676768';
    $array['family'] = 'Monda';
    $array['style'] = 'regular';
    $array['size'] = 12;
    
    return $array;    
}
add_filter( 'yit_section-blog-post-title_std', 'yit_section_blog_post_title_std' );
function yit_section_blog_post_title_style( $array ) {
    $array['selectors'] = '.section.blog .post .meta h4 a, .section.blog .sticky .the-content h4 a';
    return $array;    
}
add_filter( 'yit_section-blog-post-title_style', 'yit_section_blog_post_title_style' );

function yit_section_blog_post_title_hover_std( $array ) {
    return '#d98104';    
}
add_filter( 'yit_section-blog-post-title-hover_std', 'yit_section_blog_post_title_hover_std' );

function yit_section_blog_post_title_hover_style( $array ) {
    $array['selectors'] = '.section.blog .post .meta h4 a:hover, .section.blog .sticky .the-content h4 a:hover';    
    return $array;  
}
add_filter( 'yit_section-blog-post-title-hover_style', 'yit_section_blog_post_title_hover_style' );

function yit_section_blog_metas_std( $array ) {
    $array['family'] = 'Monda';
    $array['color'] = '#5F5E5E';
    return $array;    
}
add_filter( 'yit_blog-meta-font_std', 'yit_section_blog_metas_std' );

function yit_section_blog_metas_style( $array ) {
    $array['selectors'] = '.blog-big .meta div p, .blog-big .meta div p a, .blog-elegant .meta div p, .blog-elegant .meta div p a, .blog-pinterest .meta div p, .blog-pinterest .meta div p a, .blog-small .meta div p, .blog-small .meta div p a';    
    return $array;    
}
add_filter( 'yit_blog-meta-font_style', 'yit_section_blog_metas_style' );