<?php
/**
 * Single Product Image
 *
 * @author 		YIThemes
 * @package 	YITH_Magnifier/Templates
 * @version     1.0.0
 */

global $post, $woocommerce, $product, $yith_wcmg;

$columns = floor( yit_shop_single_w() / ( yit_shop_thumbnail_w() + 18 ) );

$enable_slider = (bool) ( get_option('yith_wcmg_enableslider') == 'yes' && count( $product->get_gallery_attachment_ids() ) > $columns );

?>

<div class="images">
	
	<?php if( !yith_wcmg_is_enabled() ): ?>
		
		<!-- Default Woocommerce Template -->
		<?php if ( has_post_thumbnail() ) : ?>
	
			<a itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="zoom" rel="thumbnails" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>"><?php yit_image( array( 'size' => apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) ) ) ?></a>
	
		<?php else : ?>
	
			<img src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" />
	
		<?php endif; ?>
	<?php else: ?>
		
		<!-- YITH Magnifier Template -->
		<?php if ( has_post_thumbnail() ) : ?>

			<a itemprop="image" href="<?php yit_image( 'size=shop_magnifier&output=url' ) ?>" class="yith_magnifier_zoom" rel="thumbnails"><?php yit_image( array( 'size' => apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) ) ) ?></a>
			
		<?php else: ?>
			
			<img src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" />
			
		<?php endif ?>
		
	<?php endif ?>


	<?php do_action('woocommerce_product_thumbnails'); ?>

</div>

<?php if( yith_wcmg_is_enabled() ): ?>
<script type="text/javascript" charset="utf-8">
var yith_magnifier_options = {
	enableSlider: <?php echo $enable_slider ? 'true' : 'false' ?>,

	<?php if( $enable_slider ): ?>
	sliderOptions: {
		//responsive: true,
		items: <?php echo $columns ?>,
		circular: <?php echo get_option('yith_wcmg_slider_circular') == 'yes' ? 'true' : 'false' ?>,
		infinite: <?php echo get_option('yith_wcmg_slider_infinite') == 'yes' ? 'true' : 'false' ?>,
		direction: '<?php echo get_option('yith_wcmg_slider_direction') == 'yes' ? 'left' : get_option('yith_wcmg_slider_direction') ?>',  
		debug: false,
		auto: false,
		align: 'left',
		prev	: {	
    		button	: "#slider-prev",
    		key		: "left"
    	},
    	next	: { 
    		button	: "#slider-next",
    		key		: "right"
    	},
        width   : <?php echo yit_shop_single_w() + 18 ?>,
	    scroll : {
	    	items     : 1,
	    	pauseOnHover: true
	    }, 
    	items   : {
    	    visible: <?php echo apply_filters( 'woocommerce_product_thumbnails_columns', get_option( 'yith_wcmg_slider_items', $columns ) ) ?>,
            width: <?php echo yit_shop_thumbnail_w() + 4 ?>
        }
	},
	<?php endif ?>
	
	showTitle: false,	
	zoomWidth: '<?php echo get_option('yith_wcmg_zoom_width') ?>',
	zoomHeight: '<?php echo get_option('yith_wcmg_zoom_height') ?>',
	position: '<?php echo get_option('yith_wcmg_zoom_position') ?>',
	tint: <?php echo get_option('yith_wcmg_tint') == '' ? 'false' : "'".get_option('yith_wcmg_tint')."'" ?>,
	tintOpacity: <?php echo get_option('yith_wcmg_tint_opacity') ?>,
	lensOpacity: <?php echo get_option('yith_wcmg_lens_opacity') ?>,
	softFocus: <?php echo get_option('yith_wcmg_softfocus') == 'yes' ? 'true' : 'false' ?>,
	smoothMove: <?php echo get_option('yith_wcmg_smooth') ?>,
	adjustY: 0,
	disableRightClick: false,
	phoneBehavior: '<?php echo get_option('yith_wcmg_zoom_mobile_position') ?>',
	loadingLabel: '<?php echo stripslashes(get_option('yith_wcmg_loading_label')) ?>'
};
</script>
<?php endif ?>