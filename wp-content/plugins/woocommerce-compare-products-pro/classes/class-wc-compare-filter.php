<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
/**
 * WooCommerce Compare Hook Filter
 *
 * Hook anf Filter into woocommerce plugin
 *
 * Table Of Contents
 *
 * template_loader()
 * woocp_shop_add_compare_button()
 * woocp_shop_add_compare_button_below_cart()
 * woocp_details_add_compare_button()
 * woocp_details_add_compare_button_below_cart()
 * add_compare_button()
 * show_compare_fields()
 * woocp_variable_ajax_add_to_cart()
 * woocp_add_to_compare()
 * woocp_remove_from_popup_compare()
 * woocp_update_compare_popup()
 * woocp_update_compare_widget()
 * woocp_update_total_compare()
 * woocp_remove_from_compare()
 * woocp_clear_compare()
 * woocp_footer_script()
 * woocp_variable_add_to_cart_script()
 * woocp_print_scripts()
 * woocp_print_styles()
 * woocp_product_featured_tab()
 * woocp_product_featured_tab_woo_2_0()
 * woocp_product_featured_panel()
 * woocp_product_featured_panel_woo_2_0()
 * woocp_admin_script()
 * woocp_set_selected_attributes()
 * auto_create_compare_category()
 * auto_create_compare_feature()
 */
class WC_Compare_Hook_Filter {
	
	function template_loader( $template ) {
		global $product_compare_id;
		global $post;

		if ( isset( $post->ID ) && $product_compare_id == $post->ID ) {

			$file 	= 'product-compare.php';
			$find[] = $file;
			$find[] = apply_filters( 'woocommerce_template_url', 'woocommerce/' ) . $file;
			
			$template = locate_template( $find );
			if ( ! $template ) $template = WOOCP_FILE_PATH . '/templates/' . $file;

		}
	
		return $template;
	}

	function woocp_shop_add_compare_button($template_name, $template_path, $located) {
		global $post;
		global $product;
		if ($template_name == 'loop/add-to-cart.php') {
			$product_id = $product->id;
			$comparable_settings = get_option('woo_comparable_settings');
			$button_text = $comparable_settings['button_text'];
			if ($button_text == '') $button_text = __('Compare this', 'woo_cp');
			if (($post->post_type == 'product' || $post->post_type == 'product_variation') && WC_Compare_Functions::check_product_activate_compare($product_id) && $comparable_settings['auto_add'] == 'yes' && WC_Compare_Functions::check_product_have_cat($product_id)) {
				if ($comparable_settings['button_type'] == 'button') {
					$compare_html = '<div class="woo_compare_button_container"><input type="button" value="'.$button_text.'" class="button woo_bt_compare_this" id="woo_bt_compare_this_'.$product_id.'" style="cursor:pointer" /> <img width="16" height="16" class="woo_add_compare_success" style="display:none !important; width:16px !important; height:14px !important;" src="'.WOOCP_IMAGES_URL.'/compare_success.png" border=0 /><input type="hidden" id="input_woo_bt_compare_this_'.$product_id.'" name="product_compare_'.$product_id.'" value="'.$product_id.'" /></div>';

					echo $compare_html;
				}else {
					$compare_html = '<div class="woo_compare_button_container"><a class=" woo_bt_compare_this" id="woo_bt_compare_this_'.$product_id.'" style="cursor:pointer">'.$button_text.'</a> <img width="16" height="16" class="woo_add_compare_success" style="display:none !important; width:16px !important; height:14px !important;" src="'.WOOCP_IMAGES_URL.'/compare_success.png" border=0 /><input type="hidden" id="input_woo_bt_compare_this_'.$product_id.'" name="product_compare_'.$product_id.'" value="'.$product_id.'" /></div>';
					echo $compare_html;
				}
			}
		}
	}
	
	function woocp_shop_add_compare_button_below_cart() {
		global $post;
		global $product;
			$product_id = $product->id;
			$comparable_settings = get_option('woo_comparable_settings');
			$button_text = $comparable_settings['button_text'];
			if ($button_text == '') $button_text = __('Compare this', 'woo_cp');
			if (($post->post_type == 'product' || $post->post_type == 'product_variation') && WC_Compare_Functions::check_product_activate_compare($product_id) && $comparable_settings['auto_add'] == 'yes' && WC_Compare_Functions::check_product_have_cat($product_id)) {
				if ($comparable_settings['button_type'] == 'button') {
					$compare_html = '<div class="woo_compare_button_container"><input type="button" value="'.$button_text.'" class="button woo_bt_compare_this" id="woo_bt_compare_this_'.$product_id.'" style="cursor:pointer" /> <img width="16" height="16" class="woo_add_compare_success" style="display:none !important; width:16px !important; height:14px !important;" src="'.WOOCP_IMAGES_URL.'/compare_success.png" border=0 /><input type="hidden" id="input_woo_bt_compare_this_'.$product_id.'" name="product_compare_'.$product_id.'" value="'.$product_id.'" /></div>';
					
					echo $compare_html;
				}else {
					$compare_html = '<div class="woo_compare_button_container"><a class=" woo_bt_compare_this" id="woo_bt_compare_this_'.$product_id.'" style="cursor:pointer">'.$button_text.'</a> <img width="16" height="16" class="woo_add_compare_success" style="display:none !important; width:16px !important; height:14px !important;" src="'.WOOCP_IMAGES_URL.'/compare_success.png" border=0 /><input type="hidden" id="input_woo_bt_compare_this_'.$product_id.'" name="product_compare_'.$product_id.'" value="'.$product_id.'" /></div>';
					echo $compare_html;
				}
			}
	}

	function woocp_details_add_compare_button() {
		global $post;
		global $product;
		$product_id = $product->id;
		$comparable_settings = get_option('woo_comparable_settings');
		$button_text = $comparable_settings['button_text'];
		if ($button_text == '') $button_text = __('Compare this', 'woo_cp');
		if (($post->post_type == 'product' || $post->post_type == 'product_variation') && WC_Compare_Functions::check_product_activate_compare($product_id) && $comparable_settings['auto_add'] == 'yes' && WC_Compare_Functions::check_product_have_cat($product_id)) {
			if ($comparable_settings['button_type'] == 'button') {
				$compare_html = '<div class="woo_compare_button_container"><input type="button" value="'.$button_text.'" class="button woo_bt_compare_this" id="woo_bt_compare_this_'.$product_id.'" style="cursor:pointer" /> <img width="16" height="16" class="woo_add_compare_success" style="display:none !important; width:16px !important; height:14px !important;" src="'.WOOCP_IMAGES_URL.'/compare_success.png" border=0 /><input type="hidden" id="input_woo_bt_compare_this_'.$product_id.'" name="product_compare_'.$product_id.'" value="'.$product_id.'" /></div>';

				echo $compare_html;
			}else {
				$compare_html = '<div class="woo_compare_button_container"><a class=" woo_bt_compare_this" id="woo_bt_compare_this_'.$product_id.'" style="cursor:pointer">'.$button_text.'</a> <img width="16" height="16" class="woo_add_compare_success" style="display:none !important; width:16px !important; height:14px !important;" src="'.WOOCP_IMAGES_URL.'/compare_success.png" border=0 /><input type="hidden" id="input_woo_bt_compare_this_'.$product_id.'" name="product_compare_'.$product_id.'" value="'.$product_id.'" /></div>';
				echo $compare_html;
			}
		}
	}
	
	function woocp_details_add_compare_button_below_cart($template_name, $template_path, $located){
		global $post;
		global $product;
		if (in_array($template_name, array('single-product/add-to-cart/simple.php', 'single-product/add-to-cart/grouped.php', 'single-product/add-to-cart/external.php', 'single-product/add-to-cart/variable.php'))) {
			$product_id = $product->id;
			$comparable_settings = get_option('woo_comparable_settings');
			$button_text = $comparable_settings['button_text'];
			if ($button_text == '') $button_text = __('Compare this', 'woo_cp');
			if (($post->post_type == 'product' || $post->post_type == 'product_variation') && WC_Compare_Functions::check_product_activate_compare($product_id) && $comparable_settings['auto_add'] == 'yes' && WC_Compare_Functions::check_product_have_cat($product_id)) {
				if ($comparable_settings['button_type'] == 'button') {
					$compare_html = '<div class="woo_compare_button_container"><input type="button" value="'.$button_text.'" class="button woo_bt_compare_this" id="woo_bt_compare_this_'.$product_id.'" style="cursor:pointer" /> <img width="16" height="16" class="woo_add_compare_success" style="display:none !important; width:16px !important; height:14px !important;" src="'.WOOCP_IMAGES_URL.'/compare_success.png" border=0 /><input type="hidden" id="input_woo_bt_compare_this_'.$product_id.'" name="product_compare_'.$product_id.'" value="'.$product_id.'" /></div>';
	
					echo $compare_html;
				}else {
					$compare_html = '<div class="woo_compare_button_container"><a class=" woo_bt_compare_this" id="woo_bt_compare_this_'.$product_id.'" style="cursor:pointer">'.$button_text.'</a> <img width="16" height="16" class="woo_add_compare_success" style="display:none !important; width:16px !important; height:14px !important;" src="'.WOOCP_IMAGES_URL.'/compare_success.png" border=0 /><input type="hidden" id="input_woo_bt_compare_this_'.$product_id.'" name="product_compare_'.$product_id.'" value="'.$product_id.'" /></div>';
					echo $compare_html;
				}
			}
		}
	}

	function add_compare_button($product_id='') {
		global $post;
		if (trim($product_id) == '') $product_id = $post->ID;
		$comparable_settings = get_option('woo_comparable_settings');
		$button_text = $comparable_settings['button_text'];
		if ($button_text == '') $button_text = __('Compare this', 'woo_cp');
		$post_type = get_post_type($product_id);
		$html = '';
		if (($post_type == 'product' || $post_type == 'product_variation') && WC_Compare_Functions::check_product_activate_compare($product_id) && WC_Compare_Functions::check_product_have_cat($product_id)) {
			if ($comparable_settings['button_type'] == 'button') {
				$html .= '<div class="woo_compare_button_container"><input type="button" value="'.$button_text.'" class="button woo_bt_compare_this" id="woo_bt_compare_this_'.$product_id.'" style="cursor:pointer" /> <img width="16" height="16" class="woo_add_compare_success" style="display:none !important; width:16px !important; height:14px !important;" src="'.WOOCP_IMAGES_URL.'/compare_success.png" border=0 /><input type="hidden" id="input_woo_bt_compare_this_'.$product_id.'" name="product_compare_'.$product_id.'" value="'.$product_id.'" /></div>';
			}else {
				$html .= '<div class="woo_compare_button_container"><a class=" woo_bt_compare_this" id="woo_bt_compare_this_'.$product_id.'" style="cursor:pointer">'.$button_text.'</a> <img width="16" height="16" class="woo_add_compare_success" style="display:none !important; width:16px !important; height:14px !important;" src="'.WOOCP_IMAGES_URL.'/compare_success.png" border=0 /><input type="hidden" id="input_woo_bt_compare_this_'.$product_id.'" name="product_compare_'.$product_id.'" value="'.$product_id.'" /></div>';
			}
		}

		return $html;
	}

	function show_compare_fields($product_id='', $use_wootheme_style=true) {
		global $post;
		if (trim($product_id) == '') $product_id = $post->ID;
		$html = '';
		$variations_list = WC_Compare_Functions::get_variations($product_id);
		if (is_array($variations_list) && count($variations_list) > 0) {
			foreach ($variations_list as $variation_id) {
				if (WC_Compare_Functions::check_product_activate_compare($variation_id) && WC_Compare_Functions::check_product_have_cat($variation_id)) {
					$compare_category = get_post_meta( $variation_id, '_woo_compare_category', true );
					$compare_fields = WC_Compare_Categories_Fields_Data::get_results("cat_id='".$compare_category."'", 'cf.field_order ASC');
					if (is_array($compare_fields) && count($compare_fields)>0) {
						$html .= '<div class="compare_product_variation"><h2>'.WC_Compare_Functions::get_variation_name($variation_id).'</h2></div>';
						if ($use_wootheme_style) 
							$html .= '<table class="compare_featured_fields shop_attributes">'; 
						else 
							$html .= '<ul class="compare_featured_fields">';
						$fixed_width = ' width="60%"';
						foreach ($compare_fields as $field_data) {
							$field_value = get_post_meta( $variation_id, '_woo_compare_'.$field_data->field_key, true );
							if (is_serialized($field_value)) $field_value = maybe_unserialize($field_value);
							if (is_array($field_value) && count($field_value) > 0) $field_value = implode(', ', $field_value);
							elseif (is_array($field_value) && count($field_value) < 0) $field_value = __('N/A', 'woo_cp');
							if (trim($field_value) == '') $field_value = __('N/A', 'woo_cp');
							$field_unit = '';
							if (trim($field_data->field_unit) != '') $field_unit = ' <span class="compare_featured_unit">('.trim(stripslashes($field_data->field_unit)).')</span>';
							if ($use_wootheme_style) 
								$html .= '<tr><th><span class="compare_featured_name">'.stripslashes($field_data->field_name).'</span>'.$field_unit.'</th><td '.$fixed_width.'><span class="compare_featured_value">'.$field_value.'</span></td></tr>';
							else
								$html .= '<li class="compare_featured_item"><span class="compare_featured_name"><strong>'.stripslashes($field_data->field_name).'</strong>'.$field_unit.'</span> : <span class="compare_featured_value">'.$field_value.'</span></li>';
							$fixed_width = '';
						}
						if ($use_wootheme_style) 
							$html .= '</table>';
						else 
							$html .= '</ul>';
					}
				}
			}
		}elseif (WC_Compare_Functions::check_product_activate_compare($product_id) && WC_Compare_Functions::check_product_have_cat($product_id)) {
			$compare_category = get_post_meta( $product_id, '_woo_compare_category', true );
			$compare_fields = WC_Compare_Categories_Fields_Data::get_results("cat_id='".$compare_category."'", 'cf.field_order ASC');
			if (is_array($compare_fields) && count($compare_fields)>0) {
				if ($use_wootheme_style) 
					$html .= '<table class="compare_featured_fields shop_attributes">'; 
				else 
					$html .= '<ul class="compare_featured_fields">';
				$fixed_width = ' width="60%"';
				foreach ($compare_fields as $field_data) {
					$field_value = get_post_meta( $product_id, '_woo_compare_'.$field_data->field_key, true );
					if (is_serialized($field_value)) $field_value = maybe_unserialize($field_value);
					if (is_array($field_value) && count($field_value) > 0) $field_value = implode(', ', $field_value);
					elseif (is_array($field_value) && count($field_value) < 0) $field_value = __('N/A', 'woo_cp');
					if (trim($field_value) == '') $field_value = __('N/A', 'woo_cp');
					$field_unit = '';
					if (trim($field_data->field_unit) != '') $field_unit = ' <span class="compare_featured_unit">('.trim(stripslashes($field_data->field_unit)).')</span>';
					if ($use_wootheme_style) 
						$html .= '<tr><th><span class="compare_featured_name">'.stripslashes($field_data->field_name).'</span>'.$field_unit.'</th><td '.$fixed_width.'><span class="compare_featured_value">'.$field_value.'</span></td></tr>';
					else
						$html .= '<li class="compare_featured_item"><span class="compare_featured_name"><strong>'.stripslashes($field_data->field_name).'</strong>'.$field_unit.'</span> : <span class="compare_featured_value">'.$field_value.'</span></li>';
					$fixed_width = '';
				}
				if ($use_wootheme_style) 
					$html .= '</table>';
				else 
					$html .= '</ul>';
			}
		}
		return $html;
	}

	function woocp_variable_ajax_add_to_cart() {
		global $woocommerce;
		check_ajax_referer( 'woocp-add-to-cart', 'security' );

		// Get product ID to add and quantity
		$variation_id   = (int) $_REQUEST['product_id'];
		$mypost = get_post($variation_id);
		$product_id   = (int) apply_filters('woocommerce_add_to_cart_product_id', $mypost->post_parent);
		$quantity    = (isset($_REQUEST['quantity'])) ? (int) $_REQUEST['quantity'] : 1;
		$attributes   = (array) maybe_unserialize(get_post_meta($product_id, '_product_attributes', true));
		$variations   = array();

		$my_variation = new WC_Product_Variation($variation_id, $product_id);
		$variation_data = $my_variation->variation_data;

		// Add to cart validation
		$passed_validation  = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);

		if ($passed_validation && $woocommerce->cart->add_to_cart($product_id, $quantity, $variation_id, $variation_data)) {
			// Return html fragments
			$data = apply_filters('add_to_cart_fragments', array());
		} else {
			$data = array(
				'error' => true,
				'product_url' => get_permalink( $product_id )
			);
			$woocommerce->set_messages();
		}

		echo json_encode( $data );
		die();
	}

	function woocp_add_to_compare() {
		check_ajax_referer( 'woocp-compare-events', 'security' );

		$product_id  = $_REQUEST['product_id'];
		WC_Compare_Functions::add_product_to_compare_list($product_id);

		die();
	}

	function woocp_remove_from_popup_compare() {
		check_ajax_referer( 'woocp-compare-events', 'security' );

		$product_id  = $_REQUEST['product_id'];
		WC_Compare_Functions::delete_product_on_compare_list($product_id);

		die();
	}
	
	function woocp_update_compare_popup() {
		check_ajax_referer( 'woocp-compare-events', 'security' );
		$result = WC_Compare_Functions::get_compare_list_html_popup();
		$result .= '<script src="'. WOOCP_JS_URL.'/fixedcolumntable/fixedcolumntable.js"></script>';
		echo json_encode( $result );
		die();
	}

	function woocp_update_compare_widget() {
		check_ajax_referer( 'woocp-compare-events', 'security' );
		$result = WC_Compare_Functions::get_compare_list_html_widget();
		echo json_encode( $result );
		die();
	}

	function woocp_update_total_compare() {
		check_ajax_referer( 'woocp-compare-events', 'security' );
		$result = WC_Compare_Functions::get_total_compare_list();
		echo json_encode( $result );
		die();
	}

	function woocp_remove_from_compare() {
		check_ajax_referer( 'woocp-compare-events', 'security' );
		$product_id  = $_REQUEST['product_id'];
		WC_Compare_Functions::delete_product_on_compare_list($product_id);
		die();
	}

	function woocp_clear_compare() {
		check_ajax_referer( 'woocp-compare-events', 'security' );
		WC_Compare_Functions::clear_compare_list();
		die();
	}

	function woocp_footer_script() {
		global $product_compare_id;
		$woocp_compare_events = wp_create_nonce("woocp-compare-events");
		$woocp_compare_popup = wp_create_nonce("woocp-compare-popup");
		$comparable_settings = get_option('woo_comparable_settings');

        $open_compare_type = isset( $comparable_settings['open_compare_type'] ) ? $comparable_settings['open_compare_type'] : 'window';
        
		$script_add_on = '';
		$script_add_on .= '<script type="text/javascript">
		        var woo_comparable_open_compare_type = "'.( isset( $comparable_settings['open_compare_type'] ) ? $comparable_settings['open_compare_type'] : 'window' ).'",
                    woo_compare_url = "'.get_permalink($product_compare_id).'";
				jQuery(document).ready(function($) {
						var ajax_url = "'.admin_url('admin-ajax.php').'";';
		if ($open_compare_type != 'new_page') {
			$script_add_on .= '
						$(".woo_compare_button_go").live("click",function (event){
							var compare_url = "'.get_permalink($product_compare_id).'";          
							if ($.browser.webkit) {
							  window.open(compare_url, "'.__('Product Comparison', 'woo_cp').'", "width=980, height=650");
							} else {
							  window.open(compare_url, "'.__('Product Comparison', 'woo_cp').'", "scrollbars=1, width=980, height=650");
							}
							event.preventDefault();
							return false;
					 
					  });';
		}
		$script_add_on .= '
						$(".woo_bt_compare_this").live("click", function(){
							var woo_bt_compare_current = $(this);
							var product_id = $("#input_"+$(this).attr("id")).val();
							$(".woo_compare_widget_loader").show();
							$(".woo_compare_widget_container").html("");
							var data = {
								action: 		"woocp_add_to_compare",
								product_id: 	product_id,
								security: 		"'.$woocp_compare_events.'"
							};
							$.post( ajax_url, data, function(response) {
								woo_bt_compare_current.siblings(".woo_add_compare_success").show();
								setTimeout(function(){
									woo_bt_compare_current.siblings(".woo_add_compare_success").hide();
								}, 3000);
								data = {
									action: 		"woocp_update_compare_widget",
									security: 		"'.$woocp_compare_events.'"
								};
								$.post( ajax_url, data, function(response) {
									result = $.parseJSON( response );
									$(".woo_compare_widget_loader").hide();
									$(".woo_compare_widget_container").html(result);
								});
								woo_update_total_compare_list();
							});
						});

						$(".woo_compare_remove_product").live("click", function(){
							var remove_product_id = $(this).attr("rel");
							$(".woo_compare_widget_loader").show();
							$(".woo_compare_widget_container").html("");
							var data = {
								action: 		"woocp_remove_from_compare",
								product_id: 	remove_product_id,
								security: 		"'.$woocp_compare_events.'"
							};
							$.post( ajax_url, data, function(response) {
								data = {
									action: 		"woocp_update_compare_widget",
									security: 		"'.$woocp_compare_events.'"
								};
								$.post( ajax_url, data, function(response) {
									result = $.parseJSON( response );
									$(".woo_compare_widget_loader").hide();
									$(".woo_compare_widget_container").html(result);
								});
								woo_update_total_compare_list();
							});
						});
						$(".woo_compare_clear_all").live("click", function(){
							$(".woo_compare_widget_loader").show();
							$(".woo_compare_widget_container").html("");
							var data = {
								action: 		"woocp_clear_compare",
								security: 		"'.$woocp_compare_events.'"
							};
							$.post( ajax_url, data, function(response) {
								data = {
									action: 		"woocp_update_compare_widget",
									security: 		"'.$woocp_compare_events.'"
								};
								$.post( ajax_url, data, function(response) {
									result = $.parseJSON( response );
									$(".woo_compare_widget_loader").hide();
									$(".woo_compare_widget_container").html(result);
								});
								woo_update_total_compare_list();
							});
						});

						function woo_update_total_compare_list(){
							var data = {
								action: 		"woocp_update_total_compare",
								security: 		"'.$woocp_compare_events.'"
							};
							$.post( ajax_url, data, function(response) {
								total_compare = $.parseJSON( response );
								$("#total_compare_product").html("("+total_compare+")");
							});
							$("body").trigger( "woo_update_total_compare_list" );
						}

					});
				</script>';
		echo $script_add_on;
	}

	function woocp_variable_add_to_cart_script() {
		$woocp_add_to_cart_nonce = wp_create_nonce("woocp-add-to-cart");
		$script_add_on = '';
		$script_add_on .= '<script type="text/javascript">
				(function($){
					$(function(){
						if (woocommerce_params.option_ajax_add_to_cart=="yes") {

							// Ajax add to cart
							$(".add_to_cart_button").live("click", function() {

								// AJAX add to cart request
								var $thisbutton = $(this);

								if ($thisbutton.is(".product_type_variation")) {
									if (!$thisbutton.attr("data-product_id")) return true;

									$thisbutton.removeClass("added");
									$thisbutton.addClass("loading");

									var data = {
										action: 		"woocp_variable_add_to_cart",
										product_id: 	$thisbutton.attr("data-product_id"),
										security: 		"'.$woocp_add_to_cart_nonce.'"
									};

									// Trigger event
									$("body").trigger("adding_to_cart");

									// Ajax action
									$.post( woocommerce_params.ajax_url, data, function(response) {

										$thisbutton.removeClass("loading");

										// Get response
										data = $.parseJSON( response );

										if (data.error && data.product_url) {
											window.location = data.product_url;
											return;
										}

										fragments = data;

										// Block fragments class
										if (fragments) {
											$.each(fragments, function(key, value) {
												$(key).addClass("updating");
											});
										}

										// Block widgets and fragments
										$(".widget_shopping_cart, .shop_table.cart, .updating, .cart_totals").fadeTo("400", "0.6").block({message: null, overlayCSS: {background: "transparent url(" + woocommerce_params.plugin_url + "/assets/images/ajax-loader.gif) no-repeat center", opacity: 0.6}});

										// Changes button classes
										$thisbutton.addClass("added");

										// Cart widget load
										if ($(".widget_shopping_cart").size()>0) {
											$(".widget_shopping_cart:eq(0)").load( window.location + " .widget_shopping_cart:eq(0) > *", function() {

												// Replace fragments
												if (fragments) {
													$.each(fragments, function(key, value) {
														$(key).replaceWith(value);
													});
												}

												// Unblock
												$(".widget_shopping_cart, .updating").css("opacity", "1").unblock();

												$("body").trigger("cart_widget_refreshed");
											} );
										} else {
											// Replace fragments
											if (fragments) {
												$.each(fragments, function(key, value) {
													$(key).replaceWith(value);
												});
											}

											// Unblock
											$(".widget_shopping_cart, .updating").css("opacity", "1").unblock();
										}

										// Cart page elements
										$(".shop_table.cart").load( window.location + " .shop_table.cart:eq(0) > *", function() {

											$("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").addClass("buttons_added").append("<input type=\"button\" value=\"+\" id=\"add1\" class=\"plus\" />").prepend("<input type=\"button\" value=\"-\" id=\"minus1\" class=\"minus\" />");

											$(".shop_table.cart").css("opacity", "1").unblock();

											$("body").trigger("cart_page_refreshed");
										});

										$(".cart_totals").load( window.location + " .cart_totals:eq(0) > *", function() {
											$(".cart_totals").css("opacity", "1").unblock();
										});

										// Trigger event so themes can refresh other areas
										$("body").trigger("added_to_cart");

									});

									return false;

								} else {
									return true;
								}

							});
						}
					});
				})(jQuery);
				</script>';
		echo $script_add_on;
	}

	function woocp_print_scripts() {
		global $woocommerce;
		wp_enqueue_script('jquery');
		$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
		$comparable_settings = get_option('woo_comparable_settings');
		wp_enqueue_script('a3_print_element', WOOCP_JS_URL . '/jquery.printElement.js');
	}

	function woocp_print_styles() {
		global $woocommerce;
		$comparable_settings = get_option('woo_comparable_settings');
		
		$compare_style = '<style>.woo_compare_button_container .woo_bt_compare_this{';
		if (isset($comparable_settings['above_padding']) && is_numeric($comparable_settings['above_padding'])) $above_padding = $comparable_settings['above_padding'];
		else $above_padding = 10;
		if (isset($comparable_settings['below_padding']) && is_numeric($comparable_settings['below_padding'])) $below_padding = $comparable_settings['below_padding'];
		else $below_padding = 10;
		
		if (!isset($comparable_settings['button_position']) || $comparable_settings['button_position'] == 'above') $compare_style .= 'margin-bottom:'.$above_padding.'px !important; display:inline-block !important;';
		else $compare_style .= 'margin-top:'.$below_padding.'px !important; display:inline-block !important;';
		$compare_style .= '}</style>';
		echo $compare_style;
	}

	function woocp_product_featured_tab() {
		global $post;
		$comparable_settings = get_option('woo_comparable_settings');
		$compare_featured_tab = trim($comparable_settings['compare_featured_tab']);
		if ($compare_featured_tab == '') $compare_featured_tab = 'Technical Details';

		$show_compare_featured_tab = false;
		$product_id = $post->ID;
		$variations_list = WC_Compare_Functions::get_variations($product_id);
		if (is_array($variations_list) && count($variations_list) > 0) {
			foreach ($variations_list as $variation_id) {
				if (WC_Compare_Functions::check_product_activate_compare($variation_id) && WC_Compare_Functions::check_product_have_cat($variation_id)) {
					$compare_category = get_post_meta( $variation_id, '_woo_compare_category', true );
					$compare_fields = WC_Compare_Categories_Fields_Data::get_results("cat_id='".$compare_category."'", 'cf.field_order ASC');
					if (is_array($compare_fields) && count($compare_fields)>0) {
						$show_compare_featured_tab = true;
						break;
					}
				}
			}
		}elseif (WC_Compare_Functions::check_product_activate_compare($product_id) && WC_Compare_Functions::check_product_have_cat($product_id)) {
			$compare_category = get_post_meta( $product_id, '_woo_compare_category', true );
			$compare_fields = WC_Compare_Categories_Fields_Data::get_results("cat_id='".$compare_category."'", 'cf.field_order ASC');
			if (is_array($compare_fields) && count($compare_fields)>0) {
				$show_compare_featured_tab = true;
			}
		}

		if ($show_compare_featured_tab) echo '<li><a href="#tab-compare-featured">'.$compare_featured_tab.'</a></li>';
	}
	
	function woocp_product_featured_tab_woo_2_0( $tabs = array() ) {
		global $product, $post;
		$comparable_settings = get_option('woo_comparable_settings');
		
		$compare_featured_tab = trim($comparable_settings['compare_featured_tab']);
		if ($compare_featured_tab == '') $compare_featured_tab = 'Technical Details';

		$show_compare_featured_tab = false;
		$product_id = $post->ID;
		$variations_list = WC_Compare_Functions::get_variations($product_id);
		if (is_array($variations_list) && count($variations_list) > 0) {
			foreach ($variations_list as $variation_id) {
				if (WC_Compare_Functions::check_product_activate_compare($variation_id) && WC_Compare_Functions::check_product_have_cat($variation_id)) {
					$compare_category = get_post_meta( $variation_id, '_woo_compare_category', true );
					$compare_fields = WC_Compare_Categories_Fields_Data::get_results("cat_id='".$compare_category."'", 'cf.field_order ASC');
					if (is_array($compare_fields) && count($compare_fields)>0) {
						$show_compare_featured_tab = true;
						break;
					}
				}
			}
		}elseif (WC_Compare_Functions::check_product_activate_compare($product_id) && WC_Compare_Functions::check_product_have_cat($product_id)) {
			$compare_category = get_post_meta( $product_id, '_woo_compare_category', true );
			$compare_fields = WC_Compare_Categories_Fields_Data::get_results("cat_id='".$compare_category."'", 'cf.field_order ASC');
			if (is_array($compare_fields) && count($compare_fields)>0) {
				$show_compare_featured_tab = true;
			}
		}

		if ($show_compare_featured_tab) {
		
			$tabs['compare-featured'] = array(
				'title'    => $compare_featured_tab,
				'priority' => $comparable_settings['auto_compare_featured_tab'],
				'callback' => array('WC_Compare_Hook_Filter', 'woocp_product_featured_panel_woo_2_0')
			);
		}
		
		return $tabs;
	}

	function woocp_product_featured_panel() {
		global $post;
?>
		<div class="panel entry-content" id="tab-compare-featured">
			<?php echo WC_Compare_Hook_Filter::show_compare_fields($post->ID); ?>
		</div>
        <?php
	}
	
	function woocp_product_featured_panel_woo_2_0() {
		global $post;
		echo WC_Compare_Hook_Filter::show_compare_fields($post->ID);
	}

	function woocp_admin_script() {
		global $woocommerce;
		$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.minified';
		wp_enqueue_script( 'ajax-chosen' );
		wp_enqueue_script( 'chosen' );
		wp_enqueue_style( 'woocommerce_admin_styles', $woocommerce->plugin_url() . '/assets/css/admin.css' );
		echo '<script src="'.WOOCP_JS_URL . '/tipTip/jquery.tipTip'.$suffix.'.js" type="text/javascript"></script>';
		echo '<script type="text/javascript">
(function($){
	$(function(){
		// Tooltips
		$(".help_tip").tipTip({
			"attribute" : "tip",
			"fadeIn" : 50,
			"fadeOut" : 50
		});
		$("select.chosen_select").chosen();
	});
})(jQuery);
		</script>';
	}
	
	function woocp_set_selected_attributes($default_attributes) {
		if (isset($_REQUEST['variation_selected']) && $_REQUEST['variation_selected'] > 0) {
			$variation_id = $_REQUEST['variation_selected'];
			$mypost = get_post($variation_id);
			if ($mypost != NULL && $mypost->post_type == 'product_variation') {
				$attributes = (array) maybe_unserialize(get_post_meta($mypost->post_parent, '_product_attributes', true));
				$my_variation = new WC_Product_Variation($variation_id, $mypost->post_parent);
				$variation_data = $my_variation->variation_data;
				if (is_array($attributes) && count($attributes) > 0) {
					foreach ($attributes as $attribute) {
						if ( !$attribute['is_variation'] ) continue;
						$taxonomy = 'attribute_' . sanitize_title($attribute['name']);
						if (isset($variation_data[$taxonomy])) {
							$default_attributes[sanitize_title($attribute['name'])] = $variation_data[$taxonomy];							
						}
					}
				}
			}
		}
		return $default_attributes;
	}
	
	function auto_create_compare_category($term_id) {
		$term = get_term( $term_id, 'product_cat' );
		$check_existed = WC_Compare_Categories_Data::get_count("category_name='".trim($term->name)."'");
		if ($check_existed < 1 ) {
			WC_Compare_Categories_Data::insert_row(array('category_name' => trim(addslashes($term->name))));
		}
	}
	
	function auto_create_compare_feature() {
		if (isset($_POST['add_new_attribute']) && $_POST['add_new_attribute']) {
			//check_admin_referer( 'woocommerce-add-new_attribute' );
			$attribute_name = (string) sanitize_title($_POST['attribute_name']);
			$attribute_type = (string) $_POST['attribute_type'];
			$attribute_label = (string) $_POST['attribute_label'];
			
			if (!$attribute_label) $attribute_label = ucwords($attribute_name);
			
			if (!$attribute_name) $attribute_name = sanitize_title($attribute_label);
			
			if ($attribute_name && strlen($attribute_name)<30 && $attribute_type && !taxonomy_exists( 'pa_'.$attribute_name )) {
				
				$check_existed = WC_Compare_Data::get_count("field_name='".$attribute_label."'");
				if ($check_existed < 1 ) {
					$feature_id = WC_Compare_Data::insert_row(array('field_name' => $attribute_label, 'field_type' => 'input-text', 'field_unit' => '', 'default_value' => '' ) );
				}
			}
		}
	}
}
?>