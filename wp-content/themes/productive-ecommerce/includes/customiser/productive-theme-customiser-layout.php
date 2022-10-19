<?php
/**
 * Theme Customiser
 *
 * @package productive-ecommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
    die();
}


if ( ! class_exists( 'Productive_Theme_Customiser_Layout' ) ) {
    
    /**
     * Productive_Theme_Customiser_Layout
     * Theme Customiser Class
     */
    class Productive_Theme_Customiser_Layout extends Productive_Theme_Customiser_Common {
        
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
                'productive_ecommerce_layout_options',
                array(
                    'title' => esc_html__( 'Layout Options', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Layout Options', 'productive-ecommerce' ),
                    'panel' => 'productive_ecommerce_theme_options',
                    'priority' => 50,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // add a setting for productive_ecommerce_template_layout_options control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_template_layout_options',
                array(
                    'type' => 'theme_mod',
                    'default' => 'one_column',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_select'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_template_layout_options',
                array(
                    'type' => 'radio',
                    'priority' => 10,
                    'section' => 'productive_ecommerce_layout_options',
                    'label' => esc_html__( 'Layout options for templates', 'productive-ecommerce' ),
                    'description' => '',
                    'choices' => array(
                        'one_column' => esc_html__( 'One Column', 'productive-ecommerce' ),
                        'two_columns_left' => esc_html__( 'Two Column Left Sidebar', 'productive-ecommerce' ),
                        'two_columns_right' => esc_html__( 'Two Column Right Sidebar', 'productive-ecommerce' ),
                        'three_columns' => esc_html__( 'Three columns', 'productive-ecommerce' ),
                    ),
                )
                );
            
            // add a setting for productive_ecommerce_sidebar_left_header_text control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_sidebar_left_header_text',
                array(
                    'type' => 'theme_mod',
                    'default' => 'Info',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_no_html'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_sidebar_left_header_text',
                array(
                    'type' => 'text',
                    'priority' => 20,
                    'section' => 'productive_ecommerce_layout_options',
                    'label' => 'Small Screen Left Sidebar Header',
                    'description' => 'Text to display on small screens left sidebar header',
                    // 'active_callback' => 'is_front_page'
                )
                );
            
        }
        
    } // End of class.
    
    // add hook for the class.
    add_action( 'customize_register', array( 'Productive_Theme_Customiser_Layout', 'register' ) );
    
}// End of if class exists
