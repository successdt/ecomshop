<?php
/**
 * @package WordPress
 * @subpackage Your Inspiration Themes
 */         


$sidebar_layout = yit_get_sidebar_layout();

extract( $this->shortcode_atts );


if( ! yit_is_accordion_empty() ): ?>
	<div class="team-slider wrapper team-professional margin-top margin-bottom">
    	<ul<?php if(yit_accordion_has_featured_item()):?> class="with-featured"<?php else :?> class="without-featured"<?php endif ?>>
			<?php while( yit_have_accordion_item() ): ?>
            
            	<?php
					$li_span = 3;
					if (yit_accordion_item_get('featured') )
					{
						if ( $sidebar_layout == 'sidebar-no' ) $li_span = "12 featured";
						else $li_span = "9 featured";
					}
				?>
            	
                <li class="span<?php echo $li_span; ?>">
                	<div class="padding">
                    	
                        <?php if( yit_accordion_item_get('featured') ): ?>
                    	
							<?php list( $thumbnail_url, $thumbnail_width, $thumbnail_height ) = yit_image( array( 'id' => yit_accordion_item_get('item_id'), 'size' => 'team_professional_thumb', 'output' => 'array' ) ); ?>
                            <div class="thumb span3" style="position:absolute; bottom:1px; margin-bottom:0px;">
                                <img src="<?php echo $thumbnail_url ?>" alt="<?php yit_accordion_item_the('title'); ?>" />
                            </div>
                            <div class="content">
                                <h4><?php yit_accordion_item_the('title'); ?></h4>
                                <?php if (yit_accordion_item_get('subtitle') != '') : ?><h5><?php yit_accordion_item_the('subtitle'); ?></h5><?php endif ?>
                                <?php echo yit_content(yit_accordion_item_get('content'), 1000); ?>
                                <?php list( $thumbnail_url, $thumbnail_width, $thumbnail_height ) = yit_image( array( 'id' => yit_accordion_item_get('item_id'), 'size' => 'team_professional_mini_thumb', 'output' => 'array' ) ); ?>
                            </div>
                            <div class="mobile_thumb span1">
                            	<img src="<?php echo $thumbnail_url ?>" alt="<?php yit_accordion_item_the('title'); ?>" />
                            </div>
                        
                        <?php else : ?>
                        
                        	<?php list( $thumbnail_url, $thumbnail_width, $thumbnail_height ) = yit_image( array( 'id' => yit_accordion_item_get('item_id'), 'size' => 'team_professional_mini_thumb', 'output' => 'array' ) );?>
                        	<h4><?php yit_accordion_item_the('title'); ?></h4>
                            <?php if (yit_accordion_item_get('subtitle') != '') : ?><h5><?php yit_accordion_item_the('subtitle'); ?></h5><?php endif ?>
                            <?php echo yit_content(yit_accordion_item_get('content'), 1000); ?>
                            <div class="thumb span1">
                                <img src="<?php echo $thumbnail_url ?>" alt="<?php yit_accordion_item_the('title'); ?>" />
                            </div>
                            
                        <?php endif ?>	
                        
                        <?php if (yit_accordion_item_get('website') != '' || yit_accordion_item_get('social') != '' ) : ?>
                            <div class="meta">
                                <h6>Get in touch</h6>
                                <?php if (yit_accordion_item_get('website') != '') : ?><p><a href="<?php yit_accordion_item_the('website'); ?>"><?php yit_accordion_item_the('website'); ?></a></p><?php endif ?>
                                <?php if (yit_accordion_item_get('social') != '') : ?>
                                    <div>
                                        <?php echo yit_content(yit_accordion_item_get('social')); ?>
                                    </div>
                                <?php endif ?>							
                            </div>
                        <?php endif ?>	
            			<div class="clear"></div>
                	</div>				
                </li>
                
            <?php endwhile ?>
            <div class="clear"></div>
		</ul>
	</div>	
<?php endif ?>