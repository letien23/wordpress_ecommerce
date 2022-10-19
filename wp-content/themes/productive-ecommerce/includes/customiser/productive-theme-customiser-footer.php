<?php
/**
 * Theme Customiser
 *
 * @package productive-ecommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
    die();
}


if ( ! class_exists( 'Productive_Theme_Customiser_Footer' ) ) {
    
    /**
     * Productive_Theme_Customiser_Footer
     * Theme Customiser Class
     */
    class Productive_Theme_Customiser_Footer extends Productive_Theme_Customiser_Common {
        
        /**
         * Register the customizer
         *
         * @param WP_Customize_Manager $wp_customise param.
         */
        public static function register( $wp_customise ) {
            
            $footer_section_desc = esc_html__( 'Footer Options ', 'productive-ecommerce' );
            $pro_only_message = esc_html__( ' (Copyright management is Pro only feature)', 'productive-ecommerce' );
            if ( PRODUCTIVE_ECOMMERCE_PRODUCT_DOWNLOAD_TYPE == 'product' ) {
                $pro_only_message = '';
            }
            // See common for Panels
            // Section
            // first, add a productive_ecommerce_footer_options for the theme.
            $footer_section_desc = $footer_section_desc . $pro_only_message;
            $wp_customise->add_section(
                'productive_ecommerce_footer_options',
                array(
                    'title' => esc_html__( 'Footer Options', 'productive-ecommerce' ),
                    'description' => $footer_section_desc,
                    'panel' => 'productive_ecommerce_theme_options',
                    'priority' => 60,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // add a setting for productive_ecommerce_footer_copyright_textarea control, below.
            $url = wp_specialchars_decode( stripslashes( esc_url( PRODUCTIVE_ECOMMERCE_THEME_DEVELOPER_WEBSITE ) ) );
            $wp_customise->add_setting(
                'productive_ecommerce_footer_copyright_textarea',
                array(
                    'type' => 'theme_mod',
                    'default' => esc_html__( 'A WordPress theme by ', 'productive-ecommerce' ) . '<a target="_blank" href="' . $url . '">' . esc_attr( PRODUCTIVE_ECOMMERCE_THEME_DEVELOPER_NAME ) . '</a>',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                )
                );
                // add control..
            if ( PRODUCTIVE_ECOMMERCE_PRODUCT_DOWNLOAD_TYPE != 'product' ) {
                
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_footer_copyright_textarea',
                    array(
                        'type' => 'hidden',
                        'priority' => 30,
                        'section' => 'productive_ecommerce_footer_options',
                        'label' => esc_html__( 'Footer copyright', 'productive-ecommerce' ),
                        'description' => '<a href="' . esc_url( PRODUCTIVE_ECOMMERCE_THEME_FEATURES_OR_BUY_URL ) . '">' . esc_html__( 'You need the Pro version', 'productive-ecommerce' ) . '</a> ' . esc_html__( ' to remove or change the Footer copyright', 'productive-ecommerce' ),
                    )
                    );
            } else {
                
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_footer_copyright_textarea',
                    array(
                        'type' => 'textarea',
                        'priority' => 30,
                        'section' => 'productive_ecommerce_footer_options',
                        'label' => esc_html__( 'Footer copyright content', 'productive-ecommerce' ),
                        'description' => esc_html__( 'Leave blank for no copyright info', 'productive-ecommerce' ),
                    )
                    );
            }
                
            
            // start callouts
            // add a setting for productive_ecommerce_pro_callout_1, below.
            $productive_ecommerce_pro_callout_features_label = esc_attr( 'Get more features with PRO', 'productive-ecommerce' );
            $productive_ecommerce_pro_callout_features_url = '<a target="_blank" class="get-pro-button" href="' .
                esc_url( PRODUCTIVE_ECOMMERCE_THEME_FEATURES_OR_BUY_URL ) . '">' .
                esc_html__( 'Compare Pro and Free Features', 'productive-ecommerce' ) . '</a> ';
            $productive_ecommerce_pro_callout_demo_url = '<a target="_blank" class="get-pro-button" href="' .
                esc_url( PRODUCTIVE_ECOMMERCE_THEME_DEMO_URL ) . '">' . esc_html__( 'See a Live Demo', 'productive-ecommerce' ) . '</a>';
            
             $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_header',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_header',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_theme_header',
                        'label' => $productive_ecommerce_pro_callout_features_label,
                        'description' => $productive_ecommerce_pro_callout_features_url,
                    )
                    );
                
                $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_header_demo',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_header_demo',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_theme_header',
                        'label' => '',
                        'description' => $productive_ecommerce_pro_callout_demo_url,
                    )
                    );
                
                $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_homepage_options',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_homepage_options',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_homepage_options',
                        'label' => $productive_ecommerce_pro_callout_features_label,
                        'description' => $productive_ecommerce_pro_callout_demo_url,
                    )
                    );
                
                $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_homepage_blog_options',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_homepage_blog_options',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_homepage_blog_options',
                        'label' => $productive_ecommerce_pro_callout_features_label,
                        'description' => $productive_ecommerce_pro_callout_features_url,
                    )
                    );
                
                $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_commerce_options',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_commerce_options',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_theme_commerce',
                        'label' => $productive_ecommerce_pro_callout_features_label,
                        'description' => $productive_ecommerce_pro_callout_demo_url,
                    )
                    );
                
                $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_footer_options',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_footer_options',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_footer_options',
                        'label' => $productive_ecommerce_pro_callout_features_label,
                        'description' => $productive_ecommerce_pro_callout_features_url,
                    )
                    );
                
                $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_layout_options',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_layout_options',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_layout_options',
                        'label' => $productive_ecommerce_pro_callout_features_label,
                        'description' => $productive_ecommerce_pro_callout_demo_url,
                    )
                    );
                
                $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_archive_options',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_archive_options',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_archive_options',
                        'label' => $productive_ecommerce_pro_callout_features_label,
                        'description' => $productive_ecommerce_pro_callout_features_url,
                    )
                    );
                // end callouts
        }
        
        
    } // End of class.
    
    // add hook for the class.
    add_action( 'customize_register', array( 'Productive_Theme_Customiser_Footer', 'register' ) );
    
} // End of if class exists
