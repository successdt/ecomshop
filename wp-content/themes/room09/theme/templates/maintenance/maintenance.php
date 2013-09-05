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

//Add body classes
$body_classes = 'no_js maintenance';
if( ( yit_get_option( 'responsive-enabled' ) && !$GLOBALS['is_IE'] ) || ( yit_get_option( 'responsive-enabled' ) && yit_ie_version() >= 9 ) ) {
    $body_classes .= ' responsive';
}

$body_classes .= ' ' . yit_get_option( 'layout-type' );
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7"  class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8"  class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9"  class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if gt IE 9]>
<html class="ie"<?php language_attributes() ?>>
<![endif]-->

<!-- This doesn't work but i prefer to leave it here... maybe in the future the MS will support it... i hope... -->
<!--[if IE 10]>
<html id="ie10"  class="ie"<?php language_attributes() ?>>
<![endif]-->


<!--[if !IE]>
<html <?php language_attributes() ?>>
<![endif]-->

<!-- START HEAD -->
<head>
    <?php do_action( 'yit_head' ) ?> 
    <?php wp_head() ?>
    
    <style type="text/css">
    	body {
			background: <?php echo $background['color'] ?> <?php if($background['image']): ?>url('<?php echo $background['image'] ?>') <?php echo $background['repeat'] ?> <?php echo $background['position'] ?> <?php echo $background['attachment'] ?><?php endif ?>;
    	}
    	
    	#maintenance_logo {
    		position: absolute;
    		top: 170px;
    		left: 50%;
    		margin-left: -95px;
    		text-align: center;
    		padding: 3px;
	    	<?php if( $logo['color'] ): ?>background: <?php echo $logo['color'] ?>;<?php endif ?>
	    	box-shadow: 5px 5px rgba(0,0,0,0.1);
    	}
    	
    	#maintenance_logo img {
    		max-width: 165;
    		max-height: 160px;
    	}
    	
    	#maintenance_logo .border {
    		border: 1px solid #e2e1df;
    		width: 190px;
    		height: 160px;    		
    	}

		#maintenance_message {
			position: absolute;
			top: 170px;
			right: 50%;
			width: 100%;
			height: 128px;
			margin-right: 125px;
			padding: 30px 30px 10px 30px;
			background: rgba(255,255,255,0.9);
			box-shadow: 5px 5px rgba(0,0,0,0.1);			
			text-align: right;
		}
		
		#maintenance_message .text{
			float: right;
			width: 400px;
			text-align: left;
		}
		
		#maintenance_message .text h3, #maintenance_newsletter h3 {
			font-size: 13px;
			color: #985d14;	
		}
		#maintenance_message .text p {
			font-size: 13px;
			color: #5b5b5b;	
		}
		
		#maintenance_newsletter {
			position: absolute;
			top: 170px;
			left: 50%;
			width: 100%;
			height: 128px;
			margin-left: 125px;
			padding: 30px 30px 10px 30px;
			background: rgba(255,255,255,0.9);
			box-shadow: 5px 5px rgba(0,0,0,0.1);
		}
		
		#maintenance_newsletter .newsletter-section {
			width: 460px;
			margin: 0 ;
		}
		
		#maintenance_newsletter .newsletter-section li { float: left; }
		
		#maintenance_newsletter .newsletter-section input.text-field {
			width: 235px;
			background: #ffffff;
			background-repeat: no-repeat;
			background-position: 10px center;
			border: 1px solid #d1d1cf;
			padding: 5px 0;
			padding-left: 15px;
			height: 20px;
			line-height: 20px;
			border-radius: 0px;
			
		}
		
		#maintenance_newsletter .newsletter-section label {
			top: 10px;
			left: 10px;
		}
		
		#maintenance_newsletter .newsletter-section li {
			margin-left: 0px;
		}
		#maintenance_newsletter .newsletter-section input.submit-field {
			background: <?php echo $newsletter['submit']['color'] ?>;						
			border: none;
			margin-top: 3px;
			padding: 10px;
			height: 30px;
			line-height: 10px;
			box-shadow: 3px 3px #d8d6d4;
		}
		.gecko #maintenance_newsletter .newsletter-section input.submit-field {			
			padding: 0 10px;
		}
		
		#maintenance_newsletter .newsletter-section input.submit-field:hover {
			background: <?php echo $newsletter['submit']['hover'] ?>;
		}
		
		@media (max-width: 1121px) {  
			#maintenance_message .text { width: 300px; }
			#maintenance_newsletter .newsletter-section li { float: none; display: inline-block; width: 100% }
			#maintenance_newsletter .newsletter-section input.text-field { margin-left: 0px; }
			#maintenance_newsletter .newsletter-section input.submit-field { float: none; display: inline-block; }
		}
		
		@media (min-width: 577px) and (max-width: 1120px) {  
			#maintenance_message {
				position: absolute;
				top: 170px;
				left: 0px;
				right: auto;
				width: 300px;			
				text-align: right;
			}
			
			#maintenance_logo {
	    		position: absolute;
	    		top: 170px;
	    		left: 480px;
	    	}
		
			#maintenance_newsletter {
				position: absolute;
				top: 400px;
				left: 390px;
				width: 100%;
				margin-left: 0px;
			}
		}		
		
		@media (min-width: 577px) and (max-width: 720px) {  
			#maintenance_newsletter {
				position: absolute;
				top: 400px;
				left: 290px;
				width: 100%;
				margin-left: 0px;
			}
		}

		@media (max-width: 576px) {
			body { padding: 0px; }
			#maintenance_message {
				position: static;
				text-align: left;
				margin: 0 auto;
				padding: 20px;
				width: auto;
				height: auto;
			}
			
			#maintenance_message .text{
				float: none;
				width: auto;
				text-align: left;
			}
			
			#maintenance_logo {
	    		position: static;
	    		margin: 20px auto;
	    		width: 192px;
	    	}
		
			#maintenance_newsletter {
				position: static;
	    		margin: 20px auto;
				width: auto;
			}
		}

		@media (max-width: 320px) {
			#maintenance_newsletter .newsletter-section li { margin: 0; padding: 0 }
			#maintenance_newsletter .newsletter-section label { display: none; }
			#maintenance_newsletter .newsletter-section input.text-field { width: auto; }
		}
		

    	<?php echo $custom ?>
    </style>
</head>
<!-- END HEAD -->
<!-- START BODY -->
<body <?php body_class( $body_classes ) ?>>
	
		
	<?php if( $message ): ?>
	<div id="maintenance_message">
		<div class="text">
			<?php echo $message ?>
		</div>
	</div>
	<?php endif ?>
	
	<?php if( $logo['image'] ): ?>
	<div id="maintenance_logo">
		<div class="border">						
			<img src="<?php echo $logo['image'] ?>" alt="<?php bloginfo() ?>" />
		</div>					
	</div>
	<?php endif ?>				
	
	<?php if( $newsletter['enabled'] ): ?>
	<div id="maintenance_newsletter">
		<h3><?php _e('STAY UPDATED WITH ROOM 09', 'yit') ?></h3>
		<?php echo do_shortcode('[newsletter_form]'); ?>
	</div>
	<?php endif ?>
			
	
	
	<?php wp_footer() ?>
</body>
</html>