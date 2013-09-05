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
?>  

<?php
    $topbar_right = yit_get_option('show-header-search') ? 2 : 0;
    $topbar_left  = $span - $topbar_right;
?>

<div id="topbar" class="row">
<div class="topbar-left span<?php echo $topbar_left ?>">

    <?php if( yit_get_option('topbar-login') ): ?>
    <!-- login links -->
    <div class="welcome_username<?php if ( ! yit_get_option('responsive-show-header-login') ) echo ' hidden-phone' ?>">
        <?php
            $output = '';
            if( is_user_logged_in() ) {
                global $current_user;
                get_currentuserinfo();

                $user_name = $current_user->user_firstname . ' ' . $current_user->user_lastname;
                if( $user_name == ' ' ) {
                    $user_name = $current_user->user_login;
                }

                $output  = __('Welcome, ', 'yit') . '<span class="welcome_username">' . $user_name . '</span>';
            } else {
                if( is_shop_installed() ) {
                    $accountPage = get_permalink( get_option('woocommerce_myaccount_page_id') );
                    $output  = '<a href="' . $accountPage . '">' . __('Login', 'yit') . ' <span> / </span> ' . __('Register', 'yit') . '</a>';
                } else {
                    $output  = '<a href="' . wp_login_url() . '">' . __('Login', 'yit') . '</a>';
                    $output .= wp_register(' <span> / </span> ','', false);
                }
            }

            echo $output;
        ?>
    </div>
    <!-- /login links -->
    <?php endif ?>


    <!-- Top bar menu -->
    <?php
        include_once YIT_CORE_PATH . '/lib/yit/Walker/Walker_Top_Menu.php';
        $nav_args = array(
            'theme_location' => 'top',
            'container' => 'none',
            'menu_class' => 'level-1' . ( ( ! yit_get_option('responsive-show-topbar-menu') ) ? ' hidden-phone' : '' ),
            'depth' => 1,
            'walker' => new YIT_Walker_Top_Menu()
            //'fallback_fb' => false,
        );

        wp_nav_menu( $nav_args );
    ?>
    <!-- /Top bar menu -->

    <!-- Widget area -->
    <?php get_sidebar('header') ?>
    <!-- /Widget area -->

</div>

<?php if(yit_get_option('show-header-search')): ?>
<div class="topbar-right span2">
    <!-- search bar -->
        <?php if( ! yit_get_option('responsive-show-header-search') ): ?><div class="hidden-phone"><?php endif ?>
        <?php the_widget('search_mini'); ?>
        <?php if( ! yit_get_option('responsive-show-header-search') ): ?></div><?php endif ?>
    <!-- /search bar -->
</div>
<?php endif ?>
</div>

<div class="topbar-border"></div>