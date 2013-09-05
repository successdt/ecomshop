<?php 
	global $woocommerce_loop;
	
	$ids = '';
	if ( isset( $category ) && $category != '' ) {
		$ids = explode( ',', $category );
	  	$ids = array_map( 'trim', $ids );
		if (in_array('0', $ids)) $ids = '';
	}	
	
	if ($per_page == -1) $per_page = 0;
	
	if (!isset($style) || $style == '' || $style == 'traditional' ) $style = '';
    $woocommerce_loop['layout'] = $style;
	if (!isset($numbers) || $numbers == '') $numbers = 'yes';
	
	$hide_empty = ( !isset($hide_empty) || $hide_empty == 'yes' ) ? 1 : 0;
	
	$args = array(
  		'number'     => $per_page,
  		'orderby'    => $orderby,
  		'order'      => $order,
  		'hide_empty' => $hide_empty,
		'include'    => $ids,
	);
	
  	$terms = get_terms( 'product_cat', $args );
  	
	if ( $terms ) : ?>
		<div class="woocommerce">
			<div class="show-category <?php echo $style ?> numbers-<?php echo $numbers ?>">
	  			<ul class="products row">		
				<?php foreach ( $terms as $category ) {			
					woocommerce_get_template( 'content-product_cat.php', array(
						'category' => $category
					) );			
				} ?>
				</ul>
			</div>
		</div>
	<?php endif;
	
	wp_reset_query();  
	$woocommerce_loop['loop'] = 0;
?>