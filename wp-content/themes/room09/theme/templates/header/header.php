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

global $yit_is_header;
$yit_is_header = true; ?>

<div id="header-container" class="container">
    <div class="row">
    <?php
        $span_container = is_shop_installed() && yit_get_option('shop-enabled') && yit_get_option('show-header-woocommerce-cart') ? 10 : 12;
        $span_logo = yit_get_span_from_width( yit_get_option('login-width', 3) );
        $span_topbar = $span_container - $span_logo;
    ?>
        <div class="span<?php echo $span_container ?>">
            <div class="border">
                <div class="innerborder <?php if (yit_get_option('hide-header-shadow')) echo 'no-shadow'; ?>">
                    <div class="row" <?php if ( yit_get_option('nav-cart-min-height-onoff') ) { echo 'style="min-height: ' . yit_get_option('nav-cart-min-height') . 'px;"'; } ?>>
                            <!-- START LOGO -->
                            <?php do_action( 'yit_before_logo' ) ?>
                            <div id="logo" class="span<?php echo $span_logo; ?>">
                                <div>
                                <?php
                                /**
                                 * @see yit_logo
                                 */
                                do_action( 'yit_logo' ) ?>
                                </div>
                            </div>
                            <?php do_action( 'yit_after_logo' ) ?>
                            <!-- END LOGO -->

                            <!-- START MENU - TOPBAR -->
                            <div id="nav-topbar" class="span<?php echo $span_topbar ?>">
                                <!-- START TOPBAR -->
                                <?php
                                /**
                                 * @see yit_main_navigation
                                 */
                                do_action( 'yit_topbar', $span_topbar) ?>
                                <!-- END TOPBAR -->

                                <!-- START NAVIGATION -->
                                <div id="nav">
                                    <?php
                                    /**
                                     * @see yit_main_navigation
                                     */
                                    do_action( 'yit_main_navigation') ?>
                                </div>
                                <!-- END NAVIGATION -->
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if( $span_container == 10 ): ?>
            <!-- CART -->
            <div id="header-cart" class="<?php if (yit_get_option('hide-header-shadow')) echo 'no-shadow'; ?><?php if (!yit_get_option('responsive-show-header-cart')) echo ' hidden-phone'; ?> span2">
                <?php do_action('yit_header_cart') ?>
            </div>
            <!-- /END CART -->
        <?php endif ?>
    </div>
</div>

<?php $yit_is_header = false; ?>