<?php
/**
 * Theme Customiser
 *
 * @package productive-ecommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
    die();
}


if ( ! class_exists( 'Productive_Theme_Customiser_Homepage_Banner_Cta' ) ) {
    
    /**
     * Productive_Theme_Customiser_Homepage_Banner_Cta
     * Theme Customiser Class
     */
    class Productive_Theme_Customiser_Homepage_Banner_Cta extends Productive_Theme_Customiser_Common {
        
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
                'productive_ecommerce_homepage_cta_options',
                array(
                    'title' => esc_html__( 'Homepage Banner CTAs', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Homepage Banner CTAs', 'productive-ecommerce' ),
                    'panel' => 'productive_ecommerce_theme_options',
                    'priority' => 20,
                    'capability' => 'edit_theme_options',
                )
                );
            
            
            // add a setting for productive_ecommerce_homepage_cta_1_title, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_cta_1_title',
                array(
                    'type' => 'theme_mod',
                    'default' => esc_html__( '', 'productive-ecommerce' ),
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_no_html'),
                )
                );
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_homepage_cta_1_title',
                array(
                    'type' => 'text',
                    'priority' => 10,
                    'section' => 'productive_ecommerce_homepage_cta_options',
                    'label' => esc_html__( 'CTA 1 Copy', 'productive-ecommerce' ),
                    'description' => esc_html__( '', 'productive-ecommerce' ),
                )
                );
            
            // add a setting for productive_ecommerce_homepage_cta_1_url, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_cta_1_url',
                array(
                    'type' => 'theme_mod',
                    'default' => esc_html__( '', 'productive-ecommerce' ),
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_url'),
                )
                );
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_homepage_cta_1_url',
                array(
                    'type' => 'text',
                    'priority' => 20,
                    'section' => 'productive_ecommerce_homepage_cta_options',
                    'label' => esc_html__( 'CTA 1 Url', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Full Url starting with \'http\' (leave empty to disable)', 'productive-ecommerce' ),
                )
                );
            
            // add a setting for productive_ecommerce_homepage_cta_1_text_color control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_cta_1_text_color',
                array(
                    'type' => 'theme_mod',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'default'              => '#000000',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_color'),
                )
                );
            
            $wp_customise->add_control(
                new WP_Customize_Color_Control(
                    $wp_customise,
                    'productive_ecommerce_homepage_cta_1_text_color',
                    array(
                        'priority' => 30,
                        'label' => esc_html__( 'CTA 1 Text Color', 'productive-ecommerce' ),
                        'section' => 'productive_ecommerce_homepage_cta_options',
                    )
                    )
                );
            
            // add a setting for productive_ecommerce_homepage_cta_1_bg_color control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_cta_1_bg_color',
                array(
                    'type' => 'theme_mod',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'default'              => '#fff00b',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_color'),
                )
                );
            
            $wp_customise->add_control(
                new WP_Customize_Color_Control(
                    $wp_customise,
                    'productive_ecommerce_homepage_cta_1_bg_color',
                    array(
                        'priority' => 40,
                        'label' => esc_html__( 'CTA 1 Background Color', 'productive-ecommerce' ),
                        'section' => 'productive_ecommerce_homepage_cta_options',
                    )
                    )
                );
            
            
            // add a setting for productive_ecommerce_homepage_cta_1_title, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_cta_2_title',
                array(
                    'type' => 'theme_mod',
                    'default' => esc_html__( '', 'productive-ecommerce' ),
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_no_html'),
                )
                );
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_homepage_cta_2_title',
                array(
                    'type' => 'text',
                    'priority' => 50,
                    'section' => 'productive_ecommerce_homepage_cta_options',
                    'label' => esc_html__( 'CTA 2 Copy', 'productive-ecommerce' ),
                    'description' => esc_html__( '', 'productive-ecommerce' ),
                )
                );
            
            // add a setting for productive_ecommerce_homepage_cta_1_url, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_cta_2_url',
                array(
                    'type' => 'theme_mod',
                    'default' => esc_html__( '', 'productive-ecommerce' ),
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_url'),
                )
                );
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_homepage_cta_2_url',
                array(
                    'type' => 'text',
                    'priority' => 60,
                    'section' => 'productive_ecommerce_homepage_cta_options',
                    'label' => esc_html__( 'CTA 2 Url', 'productive-ecommerce' ),
                    'description' => esc_html__( '', 'productive-ecommerce' ),
                )
                );
            
            // add a setting for productive_ecommerce_homepage_cta_2_text_color control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_cta_2_text_color',
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
                    'productive_ecommerce_homepage_cta_2_text_color',
                    array(
                        'priority' => 70,
                        'label' => esc_html__( 'CTA 2 Text & Border Color', 'productive-ecommerce' ),
                        'section' => 'productive_ecommerce_homepage_cta_options',
                    )
                    )
                );
            
            // add a setting for productive_ecommerce_homepage_cta_2_bg_color control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_cta_2_bg_color',
                array(
                    'type' => 'theme_mod',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'default'              => '#032e66',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_color'),
                )
                );
            
            $wp_customise->add_control(
                new WP_Customize_Color_Control(
                    $wp_customise,
                    'productive_ecommerce_homepage_cta_2_bg_color',
                    array(
                        'priority' => 80,
                        'label' => esc_html__( 'CTA 2 Background Color', 'productive-ecommerce' ),
                        'section' => 'productive_ecommerce_homepage_cta_options',
                    )
                    )
                );
            
            
        }
        
    } // End of class.
    
    // add hook for the class.
    add_action( 'customize_register', array( 'Productive_Theme_Customiser_Homepage_Banner_Cta', 'register' ) );
    
} // End of if class exists
