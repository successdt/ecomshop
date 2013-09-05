<?php
/**
 * @package WordPress
 * @subpackage Your Inspiration Themes
 */             

global $is_primary;
 
$slider_type = yit_slide_get( 'slider_type' ); 

// slides
$slides = array();
while( yit_have_slide() ) $slides[] = '{image: "' . yit_slide_get('image_url') . '"}';

ob_start();
?>
 
<script type="text/javascript">
        
    var supersized = function() {
        jQuery.supersized({
				
			// Functionality
			slide_interval          :   <?php echo yit_slide_get('interval') * 1000 ?>,		// Length between transitions
			transition              :   <?php yit_slide_the('effect') ?>, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
			transition_speed		:	<?php echo yit_slide_get('speed') * 1000 ?>,		// Speed of transition
			slideshow               :   1,
													   
			// Components							
			slide_links				:	'blank',	// Individual links for each slide (Options: false, 'number', 'name', 'blank')
			slides 					:  	[			// Slideshow Images
											<?php echo implode( $slides, ",\n" ) ?>
                                        ]
			
		});
	};   
               
    jQuery(function($){
        supersized();
    });
</script>
<?php add_action( 'wp_footer', create_function( '', 'echo stripslashes( "'.addslashes( ob_get_clean() ).'" );' ), 20 ); ?>