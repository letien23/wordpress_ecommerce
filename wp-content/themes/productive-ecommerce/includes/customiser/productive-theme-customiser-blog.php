<?php
/**
 * Theme Customiser
 *
 * @package productive-ecommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
    die();
}


if ( ! class_exists( 'Productive_Theme_Customiser_Homepage_Blog' ) ) {
    
    /**
     * Productive_Theme_Customiser_Homepage_Blog
     * Theme Customiser Class
     */
    class Productive_Theme_Customiser_Homepage_Blog extends Productive_Theme_Customiser_Common {
        
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
                'productive_ecommerce_homepage_blog_options',
                array(
                    'title' => esc_html__( 'Blog Options', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Blog Options', 'productive-ecommerce' ),
                    'panel' => 'productive_ecommerce_theme_options',
                    'priority' => 30,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // add a setting for productive_ecommerce_show_homepage_blog_excerpts control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_show_homepage_blog_excerpts',
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
                'productive_ecommerce_show_homepage_blog_excerpts',
                array(
                    'type' => 'checkbox',
                    'priority' => 10,
                    'section' => 'productive_ecommerce_homepage_blog_options',
                    'label' => esc_html__( 'Show Homepage Latest Blog Posts?', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Display Latest Blog post (summaries) on Homepage', 'productive-ecommerce' ),
                    // 'active_callback' => 'is_front_page',
                )
                );
            
            // add a setting for productive_ecommerce_homepage_usp_textarea_2, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_blog_heading',
                array(
                    'type' => 'theme_mod',
                    'default' => esc_html__( 'Latest Blog', 'productive-ecommerce' ),
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_no_html'),
                )
                );
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_homepage_blog_heading',
                array(
                    'type' => 'text',
                    'priority' => 20,
                    'section' => 'productive_ecommerce_homepage_blog_options',
                    'label' => esc_html__( 'Homepage Latest Blog Heading', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Homepage blog section heading', 'productive-ecommerce' ),
                )
                );
            
            // add a setting for productive_ecommerce_posts_placeholder_image control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_posts_placeholder_image',
                array(
                    'type' => 'theme_mod',
                    'default' => true,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_image'),
                )
                );
            
            // add control.
            $wp_customise->add_control(
                new WP_Customize_Media_Control(
                    $wp_customise,
                    'productive_ecommerce_posts_placeholder_image',
                    array(
                        'priority' => 40, // 30 is used in extra. So this will be 40
                        'section' => 'productive_ecommerce_homepage_blog_options',
                        'label' => esc_html__( 'Blog Post Placeholder Thumbnail', 'productive-ecommerce' ),
                        'description' => esc_html__( 'An image that shows as thumbnail if a blog post does not have one', 'productive-ecommerce' ),
                        // 'active_callback' => 'is_front_page'
                    )
                    )
                );
            
            
            // add a setting for productive_ecommerce_items_per_row_to_display, below.
            $wp_customise->add_setting(
                'productive_ecommerce_items_per_row_to_display',
                array(
                    'type' => 'theme_mod',
                    'default' => '4',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_absint'),
                )
                );
            
            // add control. 
            $wp_customise->add_control(
                'productive_ecommerce_items_per_row_to_display',
                array(
                    'type' => 'number',
                    'priority' => 50, 
                    'section' => 'productive_ecommerce_homepage_blog_options',
                    'label' => esc_html__( 'Number of Blog Posts Per Row', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Use 3 or more for best result (Note, if WooCommerce is installed, Products per row setting from WooCommerce is used instead)', 'productive-ecommerce' ),
                    // 'active_callback' => 'is_front_page'
                )
                );
            
            
            // add a setting for productive_ecommerce_post_archive_title_color control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_post_archive_title_color',
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
                    'productive_ecommerce_post_archive_title_color',
                    array(
                        'priority' => 80,
                        'label' => esc_html__( 'Colour for Blog Category Title', 'productive-ecommerce' ),
                        'section' => 'productive_ecommerce_homepage_blog_options',
                    )
                    )
                );
            
            
        }
        
    } // End of class.
    
    // add hook for the class.
    add_action( 'customize_register', array( 'Productive_Theme_Customiser_Homepage_Blog', 'register' ) );
    
} // End of if class exists
