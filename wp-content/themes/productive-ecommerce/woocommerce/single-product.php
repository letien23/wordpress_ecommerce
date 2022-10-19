<?php
/**
 * Single Page
 *
 * @package productive-ecommerce
 */

?>

<?php
    if ( ! defined( 'ABSPATH' ) ) {
            exit; // Exit if accessed directly
    }
    get_header( 'shop' );
?>

<main id="site-content" class="site-content">
    <div class="site-container">
        <div class="flex-content-container">
            <?php
            $productive_ecommerce_template_layout_options = productive_ecommerce_template_layout_options();
            $main_css_class = 'flex-content-100';
            $side_css_class = 'flex-content-20';

            if ( 'two_columns_left' == $productive_ecommerce_template_layout_options ) {

                    $main_css_class = 'flex-content-70';
                    $side_css_class = 'flex-content-30';
                    $productive_ecommerce_template_layout_options = 'two_columns_left';

            } else if ( 'two_columns_right' == $productive_ecommerce_template_layout_options ) {

                    $main_css_class = 'flex-content-70';
                    $side_css_class = 'flex-content-30';
                    $productive_ecommerce_template_layout_options = 'two_columns_right';

            } else if ( 'three_columns' == $productive_ecommerce_template_layout_options ) {

                    $main_css_class = 'flex-content-60';
                    $side_css_class = 'flex-content-20';
                    $productive_ecommerce_template_layout_options = 'three_columns';
            }
            ?>

                <?php
                // left sidebar.
                if ( 'two_columns_left' == $productive_ecommerce_template_layout_options || 'three_columns' == $productive_ecommerce_template_layout_options ) {
                        do_action( 'display_sidebar_left', $side_css_class );
                }
                ?>

                <?php // main content ?>
                <?php // 'woocommerce_before_main_content' is switch off. See includes/woocommerce.php & content-single-product ?>
                <div class="<?php echo esc_attr( $main_css_class ); ?>">
                    <?php
                            /**
                             * woocommerce_before_main_content hook.
                             *
                             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                             * @hooked woocommerce_breadcrumb - 20
                             */
                            //do_action( 'woocommerce_before_main_content' );
                            do_action( 'display_productive_ecommerce_enable_breadcrumb');
                    ?>
                    <?php while ( have_posts() ) { ?>
                        <?php the_post(); 
                            wc_get_template_part( 'content', 'single-product' );
                    }
                    ?>
                    <?php
                            /**
                             * woocommerce_after_main_content hook.
                             *
                             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                             */
                            do_action( 'woocommerce_after_main_content' );
                    ?>

                    <?php
                            /**
                             * woocommerce_sidebar hook.
                             *
                             * @hooked woocommerce_get_sidebar - 10
                             */
                             // WooCommerce Sidebar is unused
                            // do_action( 'woocommerce_sidebar' );
                    ?>
                    <?php 
                        // 'woocommerce_after_main_content' is switch off. See includes/woocommerce.php 
                        // 'woocommerce_sidebar' is disabled - using custom sidebars
                        // do_action( 'woocommerce_sidebar' );
                    ?>
                    
                </div>
                <?php
                // right sidebar.
                if ( 'two_columns_right' == $productive_ecommerce_template_layout_options || 'three_columns' == $productive_ecommerce_template_layout_options ) {
                    if ( is_active_sidebar( 'header_callout' ) ) {
                        dynamic_sidebar( 'header_callout' );
                    }
                    do_action( 'display_sidebar_right', $side_css_class );
                }
                ?>
        </div>
    </div>
</main>
    	
<?php 

get_footer( 'shop' );