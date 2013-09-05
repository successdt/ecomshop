<?php
/**
 * Other actions (Compare, Wishlist, Share)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product;

$actions = array();                                                                         
$actions['compare']  = function_exists('woo_add_compare_button') ? woo_add_compare_button() : '';
$actions['wishlist'] = do_shortcode('[yith_wcwl_add_to_wishlist]');

if( ( yit_get_option('shop-view-show-share') && !is_product() ) ||
    ( yit_get_option('shop-single-show-share') && is_product() )) {
    if( yit_get_option('shop-share-lite-style') ) {
        $actions['share']    = '<a href="#" class="yit_share">' . __( 'Share', 'yit' ) . '</a>';
    } elseif ( isset( $woocommerce->integrations->integrations['sharethis'] ) && !empty( $woocommerce->integrations->integrations['sharethis']->publisher_id ) ) {
        $actions['share']    = sprintf('<a href="%s" rel="nofollow" title="%s" class="share" id="%s" onclick="return false;">%s</a>', '#', __( 'Share', 'yit' ), "share_$product->id", __( 'Share', 'yit' ));;
    }
}
           
if ( ! defined( 'YITH_WCWL' ) || get_option( 'yith_wcwl_enabled' ) != 'yes' || empty( $actions['wishlist'] ) ) { unset( $actions['wishlist'] ); }

foreach ( array( 'wishlist', 'compare', 'share' ) as $button ) {
    if ( ! is_product() && ! yit_get_option('shop-view-show-'.$button) || 
           is_product() && ! yit_get_option('shop-single-show-'.$button) || 
           empty( $actions[$button] ) 
       ) {
        unset( $actions[$button] );  
    }
}

if ( ! empty( $actions['compare'] ) ) $actions['compare'] .= '<a href="#" class="woo_compare_button_go hide"></a>';
?>

<div class="product-actions">
    <?php echo implode( array_values( $actions ), ' / ' ); ?>    
    
    <!--<a class="details" href="#"><?php _e('Details', 'yit') ?></a>-->
</div>
<?php if( yit_get_option('shop-view-show-share') ): ?>
    <?php if( yit_get_option('shop-share-lite-style') ): ?>
        <div class="product-share"><?php echo do_shortcode('[share title="' . __('Share on:', 'yit') . ' " icon_type="default" socials="facebook, twitter, google, pinterest"]'); ?></div>
    <?php elseif( isset( $woocommerce->integrations->integrations['sharethis'] ) && !empty( $woocommerce->integrations->integrations['sharethis']->publisher_id ) ): ?>
        <?php yit_add_sharethis_button_js() ?>
    <?php endif ?>
<?php endif ?>