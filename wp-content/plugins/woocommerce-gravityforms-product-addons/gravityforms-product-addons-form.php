<?php

class woocommerce_gravityforms_product_form {

    private $current_page;
    private $next_page;
    private $form_id = 0;
    private $product_id = 0;

    public function __construct($form_id, $product_id) {
        $this->form_id = $form_id;
        $this->product_id = $product_id;

        add_filter('gform_form_tag', array(&$this, 'on_form_tag'), 10, 2);
        add_filter('gform_submit_button', array(&$this, 'on_submit_button'), 10, 2);
    }

    function get_form($options) {
        global $woocommerce;

        $product = null;
        if (function_exists('get_product')) {
            $product = get_product($this->product_id);
        } else {
            $product = new WC_Product($this->product_id);
        }

        extract(shortcode_atts(array(
                    'display_title' => true,
                    'display_description' => true,
                    'display_inactive' => false,
                    'field_values' => false,
                    'ajax' => false,
                    'tabindex' => 1,
                    'label_subtotal' => __('Subtotal', 'wc_gravityforms'),
                    'label_options' => __('Options', 'wc_gravityforms'),
                    'label_total' => __('Total', 'wc_gravityforms'),
                    'disable_label_subtotal' => 'no',
                    'disable_label_options' => 'no',
                    'disable_label_total' => 'no',
                    'disable_calculations' => 'no'
                        ), $options));

        //Get the form meta so we can make sure the form exists.
        $form_meta = RGFormsModel::get_form_meta($this->form_id);
        if (!empty($form_meta)) {

            $_POST['gform_submit'] = isset($_POST['gform_old_submit']) ? $_POST['gform_old_submit'] : '';

            $form = RGForms::get_form($this->form_id, $display_title, $display_description, $display_inactive, $field_values, $ajax, $tabindex);
            $_POST['gform_old_submit'] = $_POST['gform_submit'];
            unset($_POST['gform_submit']);

            $form = str_replace('</form>', '', $form);

            $form = str_replace('gform_submit', 'gform_old_submit', $form);

            $this->current_page = GFFormDisplay::get_current_page($this->form_id);
            $this->next_page = $this->current_page + 1;
            $this->previous_page = $this->current_page - 1;
            $this->next_page = $this->next_page > $this->get_max_page_number($form_meta) ? 0 : $this->next_page;

            if ($product->product_type == 'variable') {
                echo '<div class="gform_variation_wrapper gform_wrapper single_variation_wrap">';
            } else {
                echo '<div class="gform_variation_wrapper gform_wrapper">';
            }

            if ($product->is_type('variable')) :
                //echo '<input type="hidden" name="add-to-cart" value="variation" />';
                echo '<input type="hidden" id="product_id" name="product_id" value="' . $this->product_id . '" />';
            elseif ($product->has_child()) :
                //echo '<input type="hidden" name="add-to-cart" value="group" />';
                echo '<input type="hidden" id="product_id" name="product_id" value="' . $this->product_id . '" />';
            else :
                //echo '<input type="hidden" name="add-to-cart" value="' . $this->product_id . '" />';
                echo '<input type="hidden" id="product_id" name="product_id" value="' . $this->product_id . '" />';
            endif;

            $woocommerce->nonce_field('add_to_cart');

            echo $form;

            echo '<input type="hidden" name="gform_form_id" id="gform_form_id" value="' . $this->form_id . '" />';
            echo '<input type="hidden" id="woocommerce_get_action" value="" />';
            echo '<input type="hidden" id="woocommerce_product_base_price" value="' . $product->get_price() . '" />';

            $description_class = rgar($form_meta, "descriptionPlacement") == "above" ? "description_above" : "description_below";
            ?>

            <?php
            add_action('wp_footer', array(&$this, 'print_scripts'));
            if ($disable_calculations == 'no') :
                ?>

                <div class="product_totals">
                    <ul id="gform_totals_<?php echo $this->form_id; ?>" class="gform_fields <?php echo $form_meta['labelPlacement'] . ' ' . $description_class; ?>">
                        <li class="gfield" <?php
                if ($disable_label_subtotal == 'yes')
                    echo 'style="display:none;"';
                ?> >
                            <label class="gfield_label"><?php echo $label_subtotal; ?></label>
                            <div class="ginput_container">
                                <span class="formattedBasePrice ginput_total"></span>
                            </div>
                        </li>
                        <li class="gfield" <?php
                if ($disable_label_options == 'yes')
                    echo 'style="display:none;"';
                ?> >
                            <label class="gfield_label"><?php echo $label_options; ?></label>
                            <div class="ginput_container">
                                <span class="formattedVariationTotal ginput_total"></span>
                            </div>
                        </li>
                        <li class="gfield" <?php
                if ($disable_label_total == 'yes')
                    echo 'style="display:none;"';
                ?> >
                            <label class="gfield_label"><?php echo $label_total; ?></label>
                            <div class="ginput_container">
                                <span class="formattedTotalPrice ginput_total"></span>
                            </div>
                        </li>
                    </ul>
                </div>
                <style>
                    .single_variation .price {
                        display:none !important;
                    }
                </style>
            <?php endif; ?>
            <style>
                .hidden-total {
                    display:none !important;
                }
            </style>



            <?php
            echo '</div>';
        }
    }

    // filter out the Gravity Form form tag so all we have are the fields
    function on_form_tag($form_tag, $form) {
        if ($form['id'] != $this->form_id) {
            return $form_tag;
        }

        return '';
    }

    // filter the Gravity Forms button type
    function on_submit_button($button, $form) {
        if ($form['id'] != $this->form_id) {
            return $button;
        }

        return '';
    }

    function print_scripts() {
        ?>
        <script type="text/javascript">                                                                                                                                                                                                                                                                 
            var ajax_price_req;      
            //See the gravity forms documentation for this function. 
            function gform_product_total(formId, total){ 
                return update_dynamic_price(total);
            }
                                                                                            
            function update_dynamic_price(gform_total){
                jQuery('button.gform_button').attr('disabled', 'disabled');     
                jQuery('div.product_totals').block({message: null, overlayCSS: {background: '#fff url(' + woocommerce_params.plugin_url + '/assets/images/ajax-loader.gif) no-repeat center', opacity: 0.6}});
                                                
                var base = jQuery('#woocommerce_product_base_price').val();
                                                                                           
                if (ajax_price_req) {
                    ajax_price_req.abort();
                }
                                                                                                                                                                                                                                                                                                                    
                var opts = "product_id=" + jQuery("#product_id").val() + "&variation_id=" + jQuery("input[name=variation_id]").val();
                opts += '&action=get_updated_price&gform_total=' + gform_total;
                                                                                                                                                                                                                                                                                                                    
                ajax_price_req = jQuery.ajax({
                    type: "POST",
                    url: woocommerce_params.ajax_url,
                    data: opts,
                    dataType: 'json',
                    success: function (response) {                            
                        jQuery('.formattedBasePrice').html( (response.formattedBasePrice) );
                        jQuery('.formattedVariationTotal').html( response.formattedVariationTotal);
                        jQuery('.formattedTotalPrice').html( response.formattedTotalPrice);
                                                                        
                        jQuery('div.product_totals').unblock();
                        jQuery('button.gform_button').removeAttr('disabled');
                    }
                });                                                                                                                                                                                                                                                                                  
                return gform_total;
            }
                                                                                                                                                                                                                                                                                                                            
            jQuery(document).ready(function($) {
                $("form.cart").attr('action', '');
                                                
                $('body').delegate('form.cart', 'found_variation', function(){
                    try { gf_apply_rules(<?php echo $this->form_id ?>,["0"]); } catch(err) { }                                                                                                                                                                                                
                    gformCalculateTotalPrice(<?php echo $this->form_id ?>);
                });  
                                                
                                                
                                                                                                                                                                                
                $('button[type=submit]', 'form.cart').attr('id', 'gform_submit_button_<?php echo $this->form_id ?>').addClass('button gform_button');
                                                
        <?php if ($this->next_page != 0) : ?>
                    $('button[type=submit]', 'form.cart').remove();
                    $('div.quantity').remove(); 
        <?php endif; ?>
                                                
                try { gf_apply_rules(<?php echo $this->form_id ?>,["0"]); } catch(err) { }
                                                        
                $('.gform_next_button', 'form.cart').attr('onclick', '');
                $('.gform_next_button', 'form.cart').click(function(event) {
                                                            
                    $("#gform_target_page_number_<?php echo $this->form_id; ?>").val("<?php echo $this->next_page; ?>"); 
                    $("form.cart").trigger("submit",[true]); 
                                                            
                });
                                                
                $('.gform_previous_button', 'form.cart').click(function(event) {
                                                            
                    $("#gform_target_page_number_<?php echo $this->form_id; ?>").val("<?php echo $this->previous_page; ?>"); 
                    $("form.cart").trigger("submit",[true]); 
                                                            
                });
            });                                    
        </script>
        <?php
    }

    private function get_max_page_number($form) {
        $page_number = 0;
        foreach ($form["fields"] as $field) {
            if ($field["type"] == "page") {
                $page_number++;
            }
        }
        return $page_number == 0 ? 0 : $page_number + 1;
    }

}
?>