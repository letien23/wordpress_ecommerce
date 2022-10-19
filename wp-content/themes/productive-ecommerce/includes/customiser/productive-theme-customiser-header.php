<?php
/**
 * Theme Customiser
 *
 * @package productive-ecommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
    die();
}


if ( ! class_exists( 'Productive_Theme_Customiser_Header' ) ) {
    
    /**
     * Productive_Theme_Customiser_Header
     * Theme Customiser Class
     */
    class Productive_Theme_Customiser_Header extends Productive_Theme_Customiser_Common {
        
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
                'productive_ecommerce_theme_header',
                array(
                    'title' => esc_html__( 'Header Options', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Header Options', 'productive-ecommerce' ),
                    'panel' => 'productive_ecommerce_theme_options',
                    'priority' => 10,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // add a setting for productive_ecommerce_enable_header_search control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_enable_header_search',
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
                'productive_ecommerce_enable_header_search',
                array(
                    'type' => 'checkbox',
                    'priority' => 10,
                    'section' => 'productive_ecommerce_theme_header',
                    'label' => esc_html__( 'Show Header Search?', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Display search box in the header', 'productive-ecommerce' ),
                    // 'active_callback' => 'is_front_page',
                )
                );
            
        }
        
        
    } // End of class.
    
    // add hook for the class.
    add_action( 'customize_register', array( 'Productive_Theme_Customiser_Header', 'register' ) );
    
} // End of if class exists
