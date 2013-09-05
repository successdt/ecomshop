<?php
/**
 * Shopping Cart Widget
 *
 * Displays shopping cart widget
 *
 * @author 		YIThemes
 * @extends 	WP_Widget
 */
class YIT_Widget_Cart extends WP_Widget {

	var $woo_widget_cssclass;
	var $woo_widget_description;
	var $woo_widget_idbase;
	var $woo_widget_name;

	/**
	 * constructor
	 *
	 * @access public
	 * @return void
	 */
	function YIT_Widget_Cart() {

		/* Widget variable settings. */
		$this->woo_widget_cssclass 		= 'woocommerce widget_shopping_cart';
		$this->woo_widget_description 	= __( "Display the user's Cart in the header of the page. Note: the widget can be used only in the header.", 'yit' );
		$this->woo_widget_idbase 		= 'yit_widget_cart';
		$this->woo_widget_name 			= __( 'YIT Cart', 'yit' );

		/* Widget settings. */
		$widget_ops = array( 'classname' => $this->woo_widget_cssclass, 'description' => $this->woo_widget_description );

		/* Create the widget. */
		$this->WP_Widget( 'shopping_cart', $this->woo_widget_name, $widget_ops );
	}


	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 * @access public
	 * @param array $args
	 * @param array $instance
	 * @return void
	 */
	function widget( $args, $instance ) {
		global $woocommerce;

		extract( $args );


        ?>
        <div class="yit_cart_widget widget_shopping_cart">
    		<div class="cart_label">
                <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="cart-icon"><img width="28" height="22" src="<?php echo yit_get_option('minicart-icon') ?>" alt="<?php _e('View Cart', 'yit') ?>" /></a>
                <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="cart-items">
                <?php list( $cart_items, $cart_subtotal, $cart_currency ) = yit_get_current_cart_info(); ?>
                <span class="cart-items-number"><?php echo $cart_items ?></span>
                <span class="cart-items-label"><?php echo $cart_items != 1 ? __('Items', 'yit') : __('Item', 'yit') ?></span>
                <span>|</span>

                <?php if( strpos( get_option( 'woocommerce_currency_pos' ), 'left' ) !== false ) : ?>
                    <span class="cart-subtotal-currency"><?php echo $cart_currency ?></span>
                <?php endif; ?>
                    <span class="cart-subtotal"><?php echo $cart_subtotal ?></span>
                <?php if( strpos( get_option( 'woocommerce_currency_pos' ), 'right' ) !== false ) : ?>
                    <span class="cart-subtotal-currency"><?php echo $cart_currency ?></span>
                <?php endif; ?>
                </a>
            </div>

            <div class="cart_wrapper" style="display:none">
                <div class="widget_shopping_cart_content group"></div>
            </div>


            <script type="text/javascript">
            jQuery(document).ready(function($){
                $(document).on('mouseover', '.cart_label', function(){
                    $(this).next('.cart_wrapper').slideDown();
                }).on('mouseleave', '.cart_label', function(){
                    $(this).next('.cart_wrapper').delay(500).slideUp();
                });

                $(document)
                    .on('mouseenter', '.cart_wrapper', function(){ $(this).stop(true,true).show() })
                    .on('mouseleave', '.cart_wrapper',  function(){ $(this).delay(500).slideUp() });
                });
            </script>
        </div>
		<?php
	}


	/**
	 * update function.
	 *
	 * @see WP_Widget->update
	 * @access public
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 */
	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( stripslashes( $new_instance['title'] ) );
        $instance['hide_if_empty'] = empty( $new_instance['hide_if_empty'] ) ? 0 : 1;
		return $instance;
	}


	/**
	 * form function.
	 *
	 * @see WP_Widget->form
	 * @access public
	 * @param array $instance
	 * @return void
	 */
	function form( $instance ) {
		?>
        <p><?php _e('This widget cannot be used in this Sidebar', 'yit') ?></p>
		<?php
	}

}