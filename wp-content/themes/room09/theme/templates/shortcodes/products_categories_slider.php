<?php 	
	wp_enqueue_script( 'caroufredsel' );
	wp_enqueue_script( 'touch-swipe' );
	wp_enqueue_script( 'mousewheel' );

	global $woocommerce_loop;
	
	$ids = '';
	if ( isset( $category ) && $category != '' ) {
		$ids = explode( ',', $category );
	  	$ids = array_map( 'trim', $ids );
		if (in_array('0', $ids)) $ids = '';
	}                         
    
    $woocommerce_loop['setLast'] = true;
                                                       
    //$woocommerce_loop['style'] = $style;
    
    if (!isset($style) || $style == '' || $style == 'traditional' ) $style = '';
	if (!isset($numbers) || $numbers == '') $numbers = 'yes';
    
	$hide_empty = ( $hide_empty == true || $hide_empty == 'yes' ) ? 1 : 0;
	
  	$args = array(
  		//'number'     => $number,
  		'orderby'    => $orderby,
  		'order'      => $order,
  		'hide_empty' => $hide_empty,
		'include'    => $ids
	);
	
  	$terms = get_terms( 'product_cat', $args ); 
    
    $woocommerce_loop['view'] = 'grid';
    if ( isset( $layout ) && $layout != 'default' ) $woocommerce_loop['layout'] = $layout;          
	
	//$products_per_page = apply_filters( 'loop_shop_columns', 4 );
	//$woocommerce_loop['columns'] = $columns;
  	if ( $terms ) {
  	    $html = $html_mobile = '';
		
		$i = 0;
		echo '<div class="woocommerce">';
		echo '<div class="products-slider-wrapper">';
		
		echo '<div class="products-slider categories '.$style.' numbers-'.$numbers.'">';
		if (isset($title) && $title != '')
			echo '<h4>'.$title.'</h4>';
		else
			echo '<h4>&nbsp;</h4>';
		echo '<ul class="products row '.$style.'">';
		foreach ( $terms as $category ) {
			woocommerce_get_template( 'content-product_cat.php', array(
				'category' => $category
			) );			
		}
		echo '</ul></div>';
		
		echo '<div class="es-nav"><span class="es-nav-prev">Previous</span><span class="es-nav-next">Next</span></div>';
		
		echo '</div><div class="es-carousel-clear"></div>';

		echo '</div>';

	}

	wp_reset_query();	                         
	
	$woocommerce_loop['loop'] = 0;
	unset( $woocommerce_loop['setLast'] ); 
	
?>