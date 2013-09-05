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
    yit_get_template( 'blog/big-image/post-formats/standard.php', array('span' => $span, 'has_thumbnail' => $has_thumbnail) );
    return;
}

?>
<div class="<?php if ( ! $has_thumbnail ) echo 'without ' ?>thumbnail">
    <?php
    $id = yit_get_post_meta( get_the_ID(), '_format_video' );
    $type = yit_get_post_meta( get_the_ID(), '_format_video_host' );

    echo do_shortcode( '[' . $type . ' video_id="' . $id . '"]' );
    ?>
</div>
<div class="clear"></div>
