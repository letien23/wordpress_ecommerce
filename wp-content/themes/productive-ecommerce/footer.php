<?php
/**
 * The footer of the theme
 * This file displays the footer content and includes theme-specific content
 *
 * @package productive-ecommerce
 */

?>

<footer class="site-footer">
    <div class="site-container">
        <div class="flex-content-container">
            <div class="flex-content-60">
                <div class="site-footer-nav">
                    <?php
                    if ( has_nav_menu( 'footer_menu' ) ) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer_menu',
                                'menu' => 'promindsone-footer-nav',
                                'menu_id' => 'promindsone-footer-nav',
                                'container' => 'div',
                                'menu_class' => 'footer-menu',
                                'containder-class' => 'footer-menu',
                                // 'fallback_cb' => false
                            )
                        );
                    }
                    ?>
                 </div>
            </div>
            <div class="flex-content-40 footer-about">
                <?php
                    do_action( 'display_footer_right_info', 'footer-right-widget' );
                ?>
            </div>
         </div>
        <div class="flex-content-container">
            <div class="flex-content-100">
                <?php
                    do_action( 'display_footer_left_info', 'footer-left-widget' );
                ?>
            </div>
        </div>
    </div>
    
    <?php do_action( 'display_productive_ecommerce_enable_footer_copyright' ); ?>
    
</footer>

<?php wp_footer(); ?>
</body>
</html>