<?php
/**
 * Theme Customiser
 *
 * @package productive-ecommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
    die();
}


if ( ! class_exists( 'Productive_Theme_Customiser_Homepage_Banner' ) ) {
    
    /**
     * Productive_Theme_Customiser_Homepage_Banner
     * Theme Customiser Class
     */
    class Productive_Theme_Customiser_Homepage_Banner extends Productive_Theme_Customiser_Common {
        
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
                'productive_ecommerce_homepage_options',
                array(
                    'title' => esc_html__( 'Homepage Banner Copy', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Homepage Banner Copy', 'productive-ecommerce' ),
                    'panel' => 'productive_ecommerce_theme_options',
                    'priority' => 20,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // add a setting for productive_ecommerce_homepage_usp_image control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_usp_image',
                array(
                    'type' => 'theme_mod',
                    'default' => false,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_image'),
                )
                );
            // add control..
            $wp_customise->add_control(
                new WP_Customize_Media_Control(
                    $wp_customise,
                    'productive_ecommerce_homepage_usp_image',
                    array(
                        'priority' => 10,
                        'section' => 'productive_ecommerce_homepage_options',
                        'label' => esc_html__( 'Banner Background Image', 'productive-ecommerce' ),
                        'description' => esc_html__( 'The main background image in the homepage', 'productive-ecommerce' ),
                    )
                    )
                );
            
            // add a setting for productive_ecommerce_is_homepage_usp_scroll control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_is_homepage_usp_scroll',
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
                'productive_ecommerce_is_homepage_usp_scroll',
                array(
                    'type' => 'checkbox',
                    'priority' => 20,
                    'section' => 'productive_ecommerce_homepage_options',
                    'label' => esc_html__( 'Scroll Banner Background?', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Image scrolls (if disabled, banner uses parallax effect)', 'productive-ecommerce' ),
                    // 'active_callback' => 'is_front_page',
                )
                );
            
            // add a setting for productive_ecommerce_homepage_usp_textarea_1, below.
            $blog_name = get_bloginfo( 'name' );
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_usp_textarea_1',
                array(
                    'type' => 'theme_mod',
                    'default' => $blog_name,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                )
                );
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_homepage_usp_textarea_1',
                array(
                    'type' => 'textarea',
                    'priority' => 30,
                    'section' => 'productive_ecommerce_homepage_options',
                    'label' => esc_html__( 'Banner text 1 (Main USP)', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Leave empty to disable', 'productive-ecommerce' ),
                    // 'active_callback' => 'is_front_page'
                )
                );
            
            // add a setting for productive_ecommerce_homepage_usp_textarea_1_color control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_usp_textarea_1_color',
                array(
                    'type' => 'theme_mod',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'default'              => '#ffffff',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_color'),
                )
                );
            
            $wp_customise->add_control(
                new WP_Customize_Color_Control(
                    $wp_customise,
                    'productive_ecommerce_homepage_usp_textarea_1_color',
                    array(
                        'priority' => 40,
                        'label' => esc_html__( 'Banner text 1 Color', 'productive-ecommerce' ),
                        'section' => 'productive_ecommerce_homepage_options',
                    )
                    )
                );
            
            // add a setting for productive_ecommerce_homepage_usp_textarea_2, below.
            $blog_desc = get_bloginfo( 'description' );
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_usp_textarea_2',
                array(
                    'type' => 'theme_mod',
                    'default' => $blog_desc,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                )
                );
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_homepage_usp_textarea_2',
                array(
                    'type' => 'textarea',
                    'priority' => 50,
                    'section' => 'productive_ecommerce_homepage_options',
                    'label' => esc_html__( 'Banner text 2 (smaller USP copy)', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Leave empty to disable', 'productive-ecommerce' ),
                )
                );
            
            // add a setting for productive_ecommerce_homepage_usp_textarea_2_color control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_usp_textarea_2_color',
                array(
                    'type' => 'theme_mod',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'default'              => '#ffffff',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_color'),
                )
                );
            
            $wp_customise->add_control(
                new WP_Customize_Color_Control(
                    $wp_customise,
                    'productive_ecommerce_homepage_usp_textarea_2_color',
                    array(
                        'priority' => 60,
                        'label' => esc_html__( 'Banner text 2 Color', 'productive-ecommerce' ),
                        'section' => 'productive_ecommerce_homepage_options',
                    )
                    )
                );
            
        }
        
    } // End of class.
    
    // add hook for the class.
    add_action( 'customize_register', array( 'Productive_Theme_Customiser_Homepage_Banner', 'register' ) );
    
} // End of if class exists
