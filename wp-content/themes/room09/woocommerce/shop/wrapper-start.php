<?php
/**
 * Content Wrappers
 */
 
$is_full_width = (bool)( yit_get_sidebar_layout() == 'sidebar-no' || is_product() && yit_product_layout() == 'layout-1' );
 
?>
	        <!-- START CONTENT -->
	        <div id="content-shop" class="span<?php echo $is_full_width ? 12 : 9 ?> content group">