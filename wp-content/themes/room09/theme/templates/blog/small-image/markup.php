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

$post_classes = 'hentry-post group blog-small-image row';
$is_single = is_single();
$span = yit_get_sidebar_layout() == 'sidebar-no' ? 12 : 9;

$post_format = get_post_format() == '' ? 'standard' : get_post_format();
$post_format = yit_get_option( 'blog-post-formats-list' ) && get_post_format() != ''  ? get_post_format() : $post_format;

if( !$is_single && $post_format == 'quote' ) {
    $meta = false;
} else {
    $meta =    yit_get_option( 'blog-show-author' )
        || yit_get_option( 'blog-show-comments' ) && comments_open()
        || yit_get_option( 'blog-show-categories' )
        || yit_get_option( 'blog-show-tags' )
        || yit_get_option( 'blog-show-share' );
}

if( yit_get_option( 'blog-post-formats-list' ) ) {
    $post_classes .= ' post-formats-on-list';
}

if( $is_single ) {
    $post_classes .= ' blog-small-image-single';
}

$has_thumbnail = ( ! has_post_thumbnail() || ( ! is_single() && ! yit_get_option( 'blog-show-featured' ) ) || ( is_single() && ! yit_get_option( 'blog-show-featured-single' ) ) ) ? false : true;

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
    <div class="span<?php echo $span ?>">
        <?php if( is_single() ): ?>
            <div class="row">
                <?php yit_get_template( 'blog/small-image/post-formats/' . $post_format . '.php', array('span' => $span, 'has_thumbnail' => $has_thumbnail) ); ?>

                <div class="the-content-single the-content group">
                    <div class="blog-small-image-content">

                        <!-- post title -->
                        <?php
                        $link = get_permalink();
                        $title = get_the_title() == '' ? __( '(this post does not have a title)', 'yit' ) : get_the_title();

                        if( $post_format != 'quote' ) {
                            if ( $is_single ) {
                                yit_string( "<h1 class=\"post-title\"><a href=\"$link\">", $title, "</a></h1>" );
                            } else {
                                yit_string( "<h2 class=\"post-title\"><a href=\"$link\">", $title, "</a></h2>" );
                            }
                        }
                        ?>

                        <?php

                        if( $post_format != 'quote' )
                        {
                            if( yit_get_option( 'blog-show-read-more' ) )
                            {
                                the_content( yit_get_option( 'blog-read-more-text' ) );
                            }
                            else
                            {
                                the_excerpt();
                            }
                        } else {
                            yit_string( "<blockquote class=\"post-title\"><a href=\"$link\">", get_the_content(), "</a><cite>" . $title . "</cite></blockquote>" );
                        }
                        ?>

                        <?php wp_link_pages(); ?>
                        <?php if( is_paged() && $is_single ) { previous_post_link(); echo ' | '; next_post_link(); } ?>
                    </div>

                    <?php if( $is_single && $meta != false ): ?>
                        <div class="clear"></div>
                        <div class="blog-big-image-meta-single">
                            <div>
                                <?php if( yit_get_option( 'blog-show-date' ) && !$has_thumbnail ): ?>
                                    <p>
                                        <span class="date"><?php _e( 'Published', 'yit' ) ?></span>
                                        <?php the_date() ?>
                                    </p>
                                <?php endif ?>
                                <?php if( yit_get_option( 'blog-show-author' ) ) : ?>
                                    <p>
                                        <span class="author"><?php _e( 'Author', 'yit' ) ?></span>
                                        <?php the_author_posts_link() ?>
                                    </p>
                                <?php endif; ?>
                                <?php if( yit_get_option( 'blog-show-categories' ) ) : ?>
                                    <p>
                                        <span class="categories"><?php _e( 'Categories', 'yit' ) ?></span>
                                        <?php the_category( ', ' ) ?>
                                    </p>
                                <?php endif; ?>
                                <?php if( yit_get_option( 'blog-show-tags' ) && get_the_tags() ) : ?>
                                    <p>
                                        <span class="tags"><?php _e( 'Tags', 'yit' ) ?></span>
                                        <?php the_tags( '', ', ' ); ?>
                                    </p>
                                <?php endif; ?>
                                <?php if( yit_get_option( 'blog-show-comments' ) && comments_open() ) : ?>
                                    <p>
                                        <span class="comments"><?php _e('Comments', 'yit') ?></span>
                                        <?php comments_popup_link( __('0 comments', 'yit'), __('1 comment', 'yit'), __('% comments', 'yit') ); ?>
                                    </p>
                                <?php endif ?>
                                <?php if( yit_get_option( 'blog-show-share' ) ) : ?>
                                    <div class="group">
                                        <span class="share text-color"><?php echo apply_filters('yit_blog_big-image_share_label', __('Share it', 'yit')) ?></span>
                                        <?php echo do_shortcode('[share title="" icon_type="square" socials="facebook, twitter, google, pinterest, bookmark"]'); ?>
                                    </div>
                                <?php endif ?>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?php endif ?>

                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <?php yit_get_template( 'blog/small-image/post-formats/standard.php', array('span' => $span, 'has_thumbnail' => $has_thumbnail) ); ?>

                <!-- post content -->
                <div class="the-content-list the-content <?php if( $post_format == 'quote' ) echo 'the-content-quote'; ?> span<?php echo $has_thumbnail ? $span - 3 : $span ?> group">
                    <div>
                        <?php if( $meta != false ): ?>
                            <div class="blog-small-image-meta">
                                    <?php if( yit_get_option( 'blog-show-date' ) && !$has_thumbnail ): ?>
                                        <p>
                                            <span class="date"><?php _e( 'Published', 'yit' ) ?></span>
                                            <?php the_date() ?>
                                        </p>
                                    <?php endif ?>
                                    <?php if( yit_get_option( 'blog-show-author' ) ) : ?>
                                        <p>
                                            <span class="author"><?php _e( 'Author', 'yit' ) ?></span>
                                            <?php the_author_posts_link() ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if( yit_get_option( 'blog-show-categories' ) ) : ?>
                                        <p>
                                            <span class="categories"><?php _e( 'Categories', 'yit' ) ?></span>
                                            <?php the_category( ', ' ) ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if( yit_get_option( 'blog-show-tags' ) && get_the_tags() ) : ?>
                                        <p>
                                            <span class="tags"><?php _e( 'Tags', 'yit' ) ?></span>
                                            <?php the_tags( '', ', ' ); ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if( yit_get_option( 'blog-show-comments' ) && comments_open() ) : ?>
                                        <p>
                                            <span class="comments"><?php _e('Comments', 'yit') ?></span>
                                            <?php comments_popup_link( __('0 comments', 'yit'), __('1 comment', 'yit'), __('% comments', 'yit') ); ?>
                                        </p>
                                    <?php endif ?>
                                    <?php if( yit_get_option( 'blog-show-share' ) ) : ?>
                                        <div class="group">
                                            <span class="share"><?php echo apply_filters('yit_blog_small-image_share_label', __('Share it', 'yit')) ?></span>
                                            <?php echo do_shortcode('[share title="" icon_type="square" socials="facebook, twitter, google, pinterest, bookmark"]'); ?>
                                        </div>
                                    <?php endif ?>
                            </div>
                        <?php endif ?>

                        <div class="blog-small-image-content">

                            <!-- post title -->
                            <?php
                            $link = get_permalink();
                            $title = get_the_title() == '' ? __( '(this post does not have a title)', 'yit' ) : get_the_title();

                            if( $post_format != 'quote' ) {
                                if ( $is_single ) {
                                    yit_string( "<h1 class=\"post-title\"><a href=\"$link\">", $title, "</a></h1>" );
                                } else {
                                    yit_string( "<h2 class=\"post-title\"><a href=\"$link\">", $title, "</a></h2>" );
                                }
                            }
                            ?>

                            <?php

                            if( $post_format != 'quote' )
                            {
                                if( yit_get_option( 'blog-show-read-more' ) )
                                {
                                    the_content( yit_get_option( 'blog-read-more-text' ) );
                                }
                                else
                                {
                                    the_excerpt();
                                }
                            } else {
                                yit_string( "<blockquote class=\"post-title\"><a href=\"$link\">", get_the_content(), "</a><cite>" . $title . "</cite></blockquote>" );
                            }
                            ?>

                            <?php wp_link_pages(); ?>
                            <?php if( is_paged() && $is_single ) { previous_post_link(); echo ' | '; next_post_link(); } ?>

                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <div class="clear"></div>
    </div>
</div>