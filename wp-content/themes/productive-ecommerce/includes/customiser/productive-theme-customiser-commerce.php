<?php
/**
 * Theme Customiser
 *
 * @package productive-ecommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
    die();
}


if ( ! class_exists( 'Productive_Theme_Customiser_Commerce' ) ) {
    
    /**
     * Productive_Theme_Customiser_Commerce
     * Theme Customiser Class
     */
    class Productive_Theme_Customiser_Commerce extends Productive_Theme_Customiser_Common {
        
        /**
         * Register the customizer
         *
         * @param WP_Customize_Manager $wp_customise param.
         */
        public static function register( $wp_customise ) {
            
            // See common for Panels
            // 
            // Section
            $wp_customise->add_section(
                'productive_ecommerce_theme_commerce',
                array(
                    'title' => esc_html__( 'eCommerce Options', 'productive-ecommerce' ),
                    'description' => esc_html__( 'WooCommerce Related Options', 'productive-ecommerce' ),
                    'panel' => 'productive_ecommerce_theme_options',
                    'priority' => 40,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // add a setting for productive_ecommerce_enable_header_cart control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_enable_header_cart',
                array(
                    'type' => 'theme_mod',
                    'default' => true,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_checkbox'),
                )
            );
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_enable_header_cart',
                array(
                    'type' => 'checkbox',
                    'priority' => 10,
                    'section' => 'productive_ecommerce_theme_commerce',
                    'label' => esc_html__( 'Show Header Cart?', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Display Cart icon in the header', 'productive-ecommerce' ),
                    // 'active_callback' => 'is_front_page',
                )
                );
            
        }
        
        
    } // End of class.
    
    // add hook for the class.
    add_action( 'customize_register', array( 'Productive_Theme_Customiser_Commerce', 'register' ) );
    
} // End of if class exists
