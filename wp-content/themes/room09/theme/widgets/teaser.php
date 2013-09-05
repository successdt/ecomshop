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

if( !class_exists( 'teaser' ) ) :
class teaser extends WP_Widget
{
    function teaser() {
        $widget_ops = array( 
            'classname' => 'teaser',
            'description' => __( 'An image with a text linkable', 'yit' )
        );

        $control_ops = array( 'id_base' => 'teaser', 'width' => 430 );

        $this->WP_Widget( 'teaser', __( 'Teaser', 'yit' ), $widget_ops, $control_ops );
    }
    
    function form( $instance ) {
        global $icons_name;
        
        /* Impostazioni di default del widget */
        $defaults = array( 
            'title' => '',
            'image' => '',
            'link' => '',
            'read_more' => '',
        );
        
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
        <p>
            <label>
                <strong><?php _e( 'Title', 'yit' ) ?>:</strong><br />
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
            </label>
        </p>                  
        
        <p>
            <label><?php _e( 'Image', 'yit' ) ?>:
                <input type="text" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" />
                <a href="media-upload.php?type=image&TB_iframe=true" id="<?php echo $this->id ?>-upload-button" class="upload-image button-secondary">Upload</a>
            </label>
        </p>

        <p>
            <label><?php _e( 'Read more text', 'yit' ) ?>:
                <input type="text" id="<?php echo $this->get_field_id( 'read_more' ); ?>" name="<?php echo $this->get_field_name( 'read_more' ); ?>" value="<?php echo $instance['read_more']; ?>" />
            </label>
        </p>

        <p>
            <label><?php _e( 'Link', 'yit' ) ?>:
                <input type="text" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link']; ?>" />
            </label>
        </p>
        <?php
    }
    
    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters('widget_title', $instance['title'] ); 
                   
        if ( strpos( $before_widget, 'widget-wrap' ) === false ) {
            $before_widget .= '<div class="widget-wrap">';
            $after_widget  .= '</div>';
        }
        
        echo $before_widget;                   

        echo do_shortcode('[teaser title="' . $instance['title'] . '" image="' . $instance['image'] . '" link="' . $instance['link'] . '" read_more="' . $instance['read_more'] . '" ]');
        
        echo $after_widget;
    }                     

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );

        $instance['image'] = $new_instance['image'];
        
        $instance['link'] = esc_url( $new_instance['link'] );
        
        $instance['read_more'] = $new_instance['read_more'];

        return $instance;
    }
    
}     
endif;