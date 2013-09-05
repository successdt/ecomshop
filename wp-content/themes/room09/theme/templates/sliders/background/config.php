<?php
/**
 * @package WordPress
 * @subpackage Your Inspiration Themes
 */ 
 
yit_register_slider_style(  $slider_type, 'slider-background', 'css/supersized.css' );
yit_register_slider_script( $slider_type, 'supersized', 'js/supersized.3.2.7.min.js' );

// set here if the slider is reponsive or not
$this->responsive_sliders[ $slider_type ] = true;

// add support to slide
//yit_add_slide_support( $slider_type, 'image' );
 
// add the slider fields for the admin
yit_add_slider_config( $slider_type, array(
    array(
        'name' => __( 'Effect', 'yit' ),
        'id' => 'effect',
        'type' => 'select',
        'options' => array(
             0 => 'None',
             1 => 'Fade',
             2 => 'Slide Top',
             3 => 'Slide Right',
             4 => 'Slide Bottom', 
             5 => 'Slide Left', 
             6 => 'Carousel Right', 
             7 => 'Carousel Left'
         ),
        'desc' => __( 'The effect used to change slide.', 'yit' ),
        'std' => 1,
    ),
    array(
        'name' => __( 'Pause between slides (s)', 'yit' ),
        'id' => 'interval',
        'type' => 'slider',        
        'desc' => __( 'Select the delay between slides, expressed in seconds.', 'yit' ),
        'min' => 0.1,
        'max' => 20,
        'step' => 0.1,
        'std' => 6
    ),
    array(
        'name' => __( 'Animation speed (s)', 'yit' ),
        'id' => 'speed',
        'type' => 'slider',
        'desc' => __( 'The speed of the animation between two slide, expressed in seconds.', 'yit' ),
        'min' => 0.1,
        'max' => 20,   
        'step' => 0.1,  
        'std' => 1.2
    )
) );        