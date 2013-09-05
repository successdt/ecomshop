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
 
require_once YIT_CORE_PATH . '/lib/vendors/firephp/firephp.php';

/**
 * Concrete class for generating debug dumps related to the output source.
 * The class extends the var_dump() by adding <pre /> tags and, above all,
 * makes use of FirePHP extension. This means that you can use within the 
 * class all FirePHP methods.
 * 
 * FirePHP: http://www.firephp.org/
 * 
 * @since 1.0.0
 */
class YIT_Debug extends FB {
	
    /**
     * Debug helper function.  This is a wrapper for var_dump() that adds
     * the <pre /> tags, cleans up newlines and indents, and runs
     * htmlentities() before output.
     *
     * @param  mixed  $var   The variable to dump.
     * @param  string $label OPTIONAL Label to prepend to output.
     * @param  bool   $echo  OPTIONAL Echo output if true.
     * @return string
     */
    public static function vardump($var, $label=null, $echo=true) {
        // format the label
        $label = ($label===null) ? '' : rtrim($label) . ' ';

        // var_dump the variable into a buffer and keep the output
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // neaten the newlines and indents
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);

        if(!extension_loaded('xdebug')) {
            $output = htmlspecialchars($output, ENT_QUOTES);
        }

        $output = '<pre>'
                . $label
                . $output
                . '</pre>';

        if ($echo) {
            echo($output);
        }
        return $output;
    }
	
    /**
     * Dumps key and variable to firebug server panel
     *
     * @see FirePHP::DUMP
     * @param mixed $var
     * @param string $key
     * @return true
     * @throws Exception
    */
	public static function dump($var, $key = 'label') {
		return parent::dump($key, $var);
	}
}                    

/**
 * Debug tool to screen
 * 
 * Usefull to have a debug status of some vars and have major informations
 * during the development.
 * This stamp the var dump in screen, with <pre></pre> tags. 
 *
 * @param  mixed  $var   The variable to dump.
 * @param  string $label OPTIONAL Label to prepend to output.
 * @param  bool   $echo  OPTIONAL Echo output if true.   
 * @return string
 * @since 1.0.0
 */  
function yit_debug( $var, $label=null, $echo=true ) {
    return YIT_Debug::vardump( $var, $label, $echo );
}           

/**
 * Debug tool to firephp
 * 
 * Usefull to have a debug status of some vars and have major informations
 * during the development.
 * This dumps key and variable to firebug server panel. 
 *
 * @see FirePHP::DUMP
 * @param mixed $var
 * @param string $key
 * @return true
 * @throws Exception
 */  
function yit_fbdebug( $var, $key = 'label' ) {
    return YIT_Debug::dump( $var, $key );
}           

/**
 * Debug the actions and filters of wordpress 
 *
 * @since 1.0.0
 */ 
function yit_filters_for( $hook = '' ) {
  global $wp_filters;

  yit_debug( $wp_filters[$hook] );
}