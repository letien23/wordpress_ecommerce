<?php
/**
 * Header page.
 *
 * @package    productive-ecommerce
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php $productive_ecommerce_header_style = productive_ecommerce_header_style(); ?>
        
<?php 
    wp_body_open();
    productive_ecommerce_body_open();

    $customiser_show_search_icon = productive_ecommerce_enable_header_search();
    $customiser_show_account_icon = productive_ecommerce_enable_header_account();
    $customiser_show_cart_icon = productive_ecommerce_enable_header_cart();

    $show_mini_cart = productive_ecommerce_is_woocommerce_activated() && $customiser_show_cart_icon;

    $site_container_no_logo = '';
    if ( !has_custom_logo() ) {
        $site_container_no_logo = 'site-container-no-logo';
    }
?>
    
<header class="site-header">

    <div class="minicart-display-container"></div>

    <div class="site-container <?php echo esc_attr( $site_container_no_logo );?>">
        <div class="site-header-logo">
            <div class="site-header-logo-left">
                <?php if ( !has_custom_logo() ) { ?>
                <div class="site-header-logo-text-name">
                     <a class="logo" href="<?php echo esc_url( home_url() ); ?>" >
                             <?php bloginfo( 'name' ); ?>
                     </a>
                </div>
                <div class="site-header-logo-text-desc">
                     <a class="logo" href="<?php echo esc_url( home_url() ); ?>" >
                             <?php bloginfo( 'description' ); ?>
                     </a>
                </div>
                <?php } else { ?>
                        <?php the_custom_logo(); ?>
                <?php } ?>
           </div>
            <div class="site-header-logo-right"> 
                 <span class="show_in_small_screen_only header-mini-items-mobile">

                     <?php if ( $show_mini_cart ) { ?>
                         <a title="<?php esc_attr_e( 'Shopping Basket', 'productive-ecommerce'); ?>"  class="righted open-minicart-button-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                            <i class="material-symbols-outlined mini-item minicart">shopping_bag</i>
                            <span class="minibasket-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                         </a>
                     <?php } ?>
                     <?php if ( $customiser_show_account_icon ) { ?>
                            <a title="<?php esc_attr_e( 'Logout', 'productive-ecommerce'); ?>" class="righted ten_right_padding" href="<?php echo esc_url( home_url() ); ?>/my-account">
                                <i class="material-symbols-outlined mini-item">account_circle</i> 
                            </a>
                      <?php } ?>
                 </span>

                 <!-- nav icon -->
                 <button class="site-header-menu-icon show_in_small_screen_only">
                         <i class="material-symbols-outlined">menu</i>
                         <span class="screen-reader-text"><?php esc_html_e('Menu', 'productive-ecommerce'); ?></span>
                 </button>
                 <div class="clear_min"></div>
            </div>
            <div class="clear_min"></div>
        </div>

        <div class="site-header-main">
            <div class="flex-content-container">
                <div class="flex-content-70 search-box">
                    <?php
                        if ( $customiser_show_search_icon ) {
                            get_search_form(
                                array( 
                                    'arial_label' => __( 'Search...', 'productive-ecommerce' ), 
                                )
                           );
                        }
                    ?>
               </div>
                <div class="flex-content-30 header-mini-items">
                    <?php if ( $show_mini_cart ) { ?>
                    <a title="<?php esc_attr_e( 'Shopping Basket', 'productive-ecommerce'); ?>" class="righted open-minicart-button-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                        <i class="material-symbols-outlined mini-item minicart">shopping_bag</i>
                        <span class="minibasket-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                    <?php } ?>

                    <?php if ( $customiser_show_account_icon ) { ?>
                        <a title="<?php esc_attr_e( 'Logout', 'productive-ecommerce'); ?>" class="righted" href="<?php echo esc_url( home_url() ); ?>/my-account">
                            <i class="material-symbols-outlined mini-item">account_circle</i> 
                        </a>
                    <?php } ?>
                </div>
            </div>
           <div class="clear_min"></div>
        </div>
        <div class="clear_min"></div>
        <div class="show_in_small_screen_only menu-nav">
             <?php do_action( 'display_productive_ecommerce_header_nav', 'site-header-nav site-header-nav-smallscreen' ); ?>
        </div>
       <div class="clear_min"></div>
   </div>

    <div class="clear_min"></div>
    
    <div class="site-container site-container-no-grid">
    <?php do_action( 'display_productive_ecommerce_header_nav', 'flex-content-100 site-header-nav site-header-nav-bigscreen' ); ?>
    </div>
    <div class="clear_min"></div>

</header>
    