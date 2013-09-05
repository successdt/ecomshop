<?php
/**
 * Single Product Image
 *
 * @author 		YIThemes
 * @package 	YITH_Magnifier/Templates
 * @version     1.0.0
 */

global $post, $woocommerce;

?>
<div class="images">
	
	<?php if( !yith_wcmg_is_enabled() ): ?>
		
		<!-- Default Woocommerce Template -->
		<?php if ( has_post_thumbnail() ) : ?>
	
			<a itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="zoom" rel="thumbnails" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>"><?php echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) ) ?></a>
	
		<?php else : ?>
	
			<img src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" />
	
		<?php endif; ?>
	<?php else: ?>
		
		<!-- YITH Magnifier Template -->
		<?php if ( has_post_thumbnail() ) : ?>
			
			<?php list( $thumbnail_url, $thumbnail_width, $thumbnail_height ) = wp_get_attachment_image_src( get_post_thumbnail_id(), "shop_magnifier" ); ?>
			<a itemprop="image" href="<?php echo $thumbnail_url; ?>" class="yith_magnifier_zoom" rel="thumbnails"><?php echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) ) ?></a>
			
		<?php else: ?>
			
			<img src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" />
			
		<?php endif ?>
		
	<?php endif ?>


	<?php do_action('woocommerce_product_thumbnails'); ?>

</div>

<?php if( yith_wcmg_is_enabled() ): ?>
<script type="text/javascript" charset="utf-8">
var yith_magnifier_options = {
	enableSlider: <?php echo get_option('yith_wcmg_enableslider') == 'yes' ? 'true' : 'false' ?>,

	<?php if( get_option('yith_wcmg_enableslider') == 'yes' ): ?>
	sliderOptions: {
		responsive: true,
		items: <?php echo get_option('yith_wcmg_slider_items', 4) ?>,
		circular: <?php echo get_option('yith_wcmg_slider_circular') == 'yes' ? 'true' : 'false' ?>,
		infinite: <?php echo get_option('yith_wcmg_slider_infinite') == 'yes' ? 'true' : 'false' ?>,
		direction: '<?php echo get_option('yith_wcmg_slider_direction') ?>',
		debug: false
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
	adjustY: -4,
	disableRightClick: false,
	phoneBehavior: '<?php echo get_option('yith_wcmg_zoom_mobile_position') ?>',
	loadingLabel: '<?php echo stripslashes(get_option('yith_wcmg_loading_label')) ?>'
};
</script>
<?php endif ?>