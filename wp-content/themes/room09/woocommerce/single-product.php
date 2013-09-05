<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Custom settings */
$layout = yit_product_layout();    

// layout 1
if ( $layout == 'layout-1' ) {
    add_action( 'woocommerce_single_product_summary', 'yit_woocommerce_prev_next_nav', 3 );
    add_action( 'woocommerce_after_single_product_summary', 'woocommerce_get_sidebar', 15 );
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

} elseif ( $layout == 'layout-2' ) {  
    add_action( 'woocommerce_before_main_content', 'yit_woocommerce_prev_next_nav', 7 );
}

yit_add_body_class( 'single-' . $layout );

get_header('shop');

wp_enqueue_script( 'jquery-tipTip' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action('woocommerce_before_main_content');
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action('woocommerce_sidebar');
	?>

<?php get_footer('shop'); ?>