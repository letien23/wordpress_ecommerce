<?php
/**
 * The woocommerce php file contain all woocommerce-based customisation and functions
 *
 * @package    productive-ecommerce
 */

/**
 * Method woocommerce functions.
 *
 * @return boolean
 */
function productive_ecommerce_is_woocommerce_activated() {
    return class_exists( 'woocommerce' );
}

/**
 * Method
 *
 * @return boolean
 */
function productive_ecommerce_is_shop() {
    if ( productive_ecommerce_is_woocommerce_activated() ) {
        return is_shop();
    } else {
        return false;
    }
}


/**
 * Method productive_ecommerce_is_product.
 *
 * @return boolean
 */
function productive_ecommerce_is_product() {
    if ( productive_ecommerce_is_woocommerce_activated() ) {
        return is_product();
    } else {
        return false;
    }
}


/**
 * Method productive_ecommerce_is_product_category.
 *
 * @return boolean
 */
function productive_ecommerce_is_product_category() {
    if ( productive_ecommerce_is_woocommerce_activated() ) {
        return is_product_category();
    } else {
        return false;
    }
}

/**
 * Method productive_ecommerce_is_woocommerce_page.
 *
 * @return boolean ''
 */
function productive_ecommerce_is_woocommerce_page() {
    if ( productive_ecommerce_is_woocommerce_activated() ) {
        return is_shop() || is_product() || is_product_category();
    } else {
        return false;
    }
}


if ( productive_ecommerce_is_woocommerce_activated() ) {
    
    /**
     * Breadcrumb
     */
    function productive_ecommerce__woocommerce_breadcrumbs() {
        return array(
                'delimiter'   => ' &#47; ',
                'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
                'wrap_after'  => '</nav>',
                'before'      => '',
                'after'       => '',
                'home'        => _x( 'Home', 'breadcrumb', 'productive-ecommerce' ),
            );
    }
    add_filter( 'woocommerce_breadcrumb_defaults', 'productive_ecommerce__woocommerce_breadcrumbs' );

    
    // Always have 'woocommerce_sidebar' disabled
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    
    
    /**
     * Method enable featured image.
     */
    function productive_ecommerce_setup_woocommerce() {
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
    add_action( 'after_setup_theme', 'productive_ecommerce_setup_woocommerce' );

    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

}
