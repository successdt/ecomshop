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
<div class="thumbnails"><?php
	$attachments = get_posts( array(
		'post_type' 	=> 'attachment',
		'numberposts' 	=> -1,
		'post_status' 	=> null,
		'post_parent' 	=> $post->ID,
		//'post__not_in'	=> array( get_post_thumbnail_id() ),
		'post_mime_type'=> 'image',
		'orderby'		=> 'menu_order',
		'order'			=> 'ASC'
	) );
	if ($attachments) {

		if( yith_wcmg_is_enabled() ) {
			echo '<ul class="yith_magnifier_gallery">';
		}

		$loop = 0;
		$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

		foreach ( $attachments as $key => $attachment ) {

			if ( get_post_meta( $attachment->ID, '_woocommerce_exclude_image', true ) == 1 )
				continue;

			if( !yith_wcmg_is_enabled() ) {
				$classes = array( 'zoom' );
			} else {
				$classes = array();
			}

			if ( $loop == 0 || $loop % $columns == 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns == 0 )
				$classes[] = 'last';


			if( yith_wcmg_is_enabled() ) {
				list( $thumbnail_url, $thumbnail_width, $thumbnail_height ) = wp_get_attachment_image_src( $attachment->ID, "shop_single" );
				list( $magnifier_url, $magnifier_width, $magnifier_height ) = wp_get_attachment_image_src( $attachment->ID, "shop_magnifier" );

				printf( '<li><a href="%s" title="%s" rel="thumbnails" class="%s" data-small="%s">%s</a></li>', $magnifier_url, esc_attr( $attachment->post_title ), implode(' ', $classes), $thumbnail_url, wp_get_attachment_image( $attachment->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) ) );
			} else {
				printf( '<a href="%s" title="%s" rel="thumbnails" class="%s">%s</a></li>', wp_get_attachment_url( $attachment->ID ), esc_attr( $attachment->post_title ), implode(' ', $classes), wp_get_attachment_image( $attachment->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) ) );				
			}
			$loop++;

		}

		if( yith_wcmg_is_enabled() ) {
			echo '</ul>';
		}
	}
?></div>