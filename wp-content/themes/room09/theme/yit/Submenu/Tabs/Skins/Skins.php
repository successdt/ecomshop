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
 
/**
 * Class to print fields in the tab Sample Data -> Import
 * 
 * @since 1.0.0
 */
class YIT_Submenu_Tabs_Skins_Skins extends YIT_Submenu_Tabs_Abstract {
    /**
     * Default fields
     * 
     * @var array
     * @since 1.0.0
     */
    public $fields;
    
    /**
     * Merge default fields with theme specific fields using the filter yit_submenu_tabs_sidebars_custom_add
     * 
     * @param array $fields
     * @since 1.0.0
     */
    public function __construct() {
        $fields = $this->init();
        //$this->fields = apply_filters( strtolower( __CLASS__ ), $fields );
    }
    
    /**
     * Set default values
     * 
     * @return array
     * @since 1.0.0
     */
    public function init() {
        return false;
    }
	
	/**
	 * Display tab html code
	 * 
	 * @return string
	 * @since 1.0.0
	 */
	public function display_page() {
		$skins = yit_get_model( 'skin' )->skins;
?>
			<div id="skins_skins" class="yit_options rm_option rm_input rm_text">
                <div class="option">
                	<?php if( !empty($skins) ): ?>
                    <label for="skin"><?php _e('Choose a skin to use', 'yit'); ?></label>
	                <div class="select_wrapper">
	                    <select name="skin" id="skin">
							<?php foreach( $skins as $id=>$name ): ?>
							<option value="<?php echo $id ?>"<?php selected( $id, yit_get_option('skin') ) ?>><?php echo $name ?></option>
							<?php endforeach ?>
	                    </select>
	                </div>                    
					<input type="submit" value="<?php _e( 'Apply', 'yit' ) ?>" class="button" name="apply-skin" id="apply-skin" />
					<?php else: ?>
					<?php _e( 'No skin to select.', 'yit'); ?>
					<?php endif ?>
                </div>
                <div class="description">
					<?php _e( 'Apply skin you want to use. This will replace some options in the theme options.', 'yit'); ?>
                </div>
                <div class="clear"></div>
            </div>
<?php
	}
}
