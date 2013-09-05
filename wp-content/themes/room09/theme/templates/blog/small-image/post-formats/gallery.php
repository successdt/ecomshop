<?php
/**
 * Your Inspiration Themes
 *
 * @package WordPress
 * @subpackage Your Inspiration Themes
 * @author Your Inspiration Themes Team <info@yithemes.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if( !is_single() && !yit_get_option( 'blog-post-formats-list' ) ) {
    yit_get_template( 'blog/small-image/post-formats/standard.php', array('span' => $span, 'has_thumbnail' => $has_thumbnail) );
    return;
}

?>

<?php if ( $has_thumbnail ): ?>
        <div class="thumbnail span3">
            <?php
            $attachments = get_posts( array(
                'post_type' 	=> 'attachment',
                'numberposts' 	=> -1,
                'post_status' 	=> null,
                'post_parent' 	=> get_the_ID(),
                'post_mime_type'=> 'image',
                'orderby'		=> 'menu_order',
                'order'			=> 'ASC'
            ) );

            if( $attachments ) {
                $height = 0;
                $html = '';

                foreach ( $attachments as $key => $attachment ) {
                    $image = wp_get_attachment_image_src( $attachment->ID, 'blog_big' );
                    $html .= yit_image( "id=$attachment->ID&size=blog_small_image&alt=blogimage&output=url", false ) . PHP_EOL;
                }

                $html = '[images_slider effect="fade" width="0" height="auto" direction="horizontal" speed="5000"]' . PHP_EOL . $html . '[/images_slider]';

                echo do_shortcode( $html );
            }
            ?>

            <?php if( yit_get_option( 'blog-show-date' ) ): ?>
                <div class="blog-small-image-date">
                    <span class="month"><?php echo get_the_date( 'M' ) ?></span>
                    <span class="day"><?php echo get_the_date( 'd' ) ?></span>
                </div>
            <?php endif ?>
        </div>
<?php endif ?>
