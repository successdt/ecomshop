<?php
/**
 * The Template for compare products
 *
 * Override this template by copying it to yourtheme/woocommerce/product-compare.php
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

		$comparable_settings = get_option('woo_comparable_settings');

?>
<head>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<script src="<?php echo get_option('siteurl'); ?>/wp-includes/js/jquery/jquery.js"></script>
<script src="<?php echo WOOCP_JS_URL; ?>/jquery.printElement.js"></script>

</head>
<body>
    	<div class="compare_print_container"><div id="compare_popup_container" class="compare_popup_container">
        <link type="text/css" href="<?php echo WOOCP_JS_URL; ?>/fixedcolumntable/fixedcolumntable.css" rel="stylesheet" />
				<div class="compare_heading">
					<?php if (trim($comparable_settings['compare_logo']) != '') { ?>
                    <img class="compare_logo" src="<?php echo $comparable_settings['compare_logo']; ?>" alt="<?php _e('Compare Products', 'woo_cp'); ?>" />
                    <?php } else { ?> 
                    <h1><?php _e('Compare Products', 'woo_cp'); ?></h1>
                    <?php } ?>
                    <div class="print_control">
                        <?php if ($comparable_settings['open_compare_type'] != 'new_page') { ?><a class="btn" href="#" onClick="window.close();"><span><?php _e('Close window', 'woo_cp');?></span></a><?php } ?>
                        <a id="woo_compare_print" class="btn" href="#"><span><?php _e('Print this page', 'woo_cp');?></span></a>
                        <div style="clear:both;"></div>
                    	<div class="woo_compare_print_msg"><?php _e('Refine slections to 3 products and print!', 'woo_cp');?></div>
                    </div>
                </div>
            	<div style="clear:both;"></div>
                <div class="popup_woo_compare_widget_loader" style="display:none;"><img src="<?php echo WOOCP_IMAGES_URL; ?>/ajax-loader.gif" border=0 /></div>
                <div class="compare_popup_wrap">
                    <?php echo WC_Compare_Functions::get_compare_list_html_popup();?>
                </div>
        </div>
        </div>
        <?php
			$woocp_compare_events = wp_create_nonce("woocp-compare-events");
		?>
        <script type="text/javascript">
			jQuery(document).ready(function($) {
						var ajax_url = "<?php echo admin_url('admin-ajax.php');?>";
						$("#woo_compare_print").live("click", function(){
							$(".compare_print_container").printElement({
								printBodyOptions:{
								styleToAdd:"overflow:visible !important;",
								classNameToAdd : "compare_popup_print"
								}
							});
						});
						$(".woo_compare_popup_remove_product").live("click", function(){
							var popup_remove_product_id = $(this).attr("rel");
							$(".popup_woo_compare_widget_loader").show();
							$(".compare_popup_wrap").html("");
							$("#bg-labels").remove();
							var data = {
								action: 		"woocp_remove_from_popup_compare",
								product_id: 	popup_remove_product_id,
								security: 		"<?php echo $woocp_compare_events; ?>"
							};
							$.post( ajax_url, data, function(response) {
								data = {
									action: 		"woocp_update_compare_popup",
									security: 		"<?php echo $woocp_compare_events; ?>"
								};
								$.post( ajax_url, data, function(response) {
									result = $.parseJSON( response );
									$(".popup_woo_compare_widget_loader").hide();
									$(".compare_popup_wrap").html(result);
								});
								
								data = {
									action: 		"woocp_update_compare_widget",
									security: 		"<?php echo $woocp_compare_events; ?>"
								};
								$.post( ajax_url, data, function(response) {
									new_widget = $.parseJSON( response );
									$(".woo_compare_widget_container").html(new_widget);
								});
							});
						});
			});
		</script>
        <script src="<?php echo WOOCP_JS_URL; ?>/fixedcolumntable/fixedcolumntable.js"></script>
</body>