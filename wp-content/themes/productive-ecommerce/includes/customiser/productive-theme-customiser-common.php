<?php
/**
 * Theme Customiser
 *
 * @package productive-ecommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
    die();
}


if ( ! class_exists( 'Productive_Theme_Customiser_Common' ) ) {
    
    /**
     * Productive_Theme_Customiser_Common
     * Theme Customiser Class
     */
    class Productive_Theme_Customiser_Common {
        
        /**
         * Register the customizer
         *
         * @param WP_Customize_Manager $wp_customise Param.
         */
        public static function register( $wp_customise ) {
            
            // Panel for productive_ecommerce_theme_options
            $panel_title = PRODUCTIVE_ECOMMERCE_CURRENT_THEME_NAME; 
            $panel_desc = esc_html__( 'Customisable Options for', 'productive-ecommerce' ) . PRODUCTIVE_ECOMMERCE_CURRENT_THEME_NAME; 
            $wp_customise->add_panel(
                'productive_ecommerce_theme_options',
                array(
                    'title' => $panel_title,
                    'description' => $panel_desc,
                    'priority' => 10,
                )
            );
        }
        
        /**
         * Method productive_ecommerce_sanitize_checkbox ''.
         *
         * @param boolean $checked ''.
         *
         * @return boolean ''.
         */
        public static function productive_ecommerce_sanitize_checkbox( $checked ) {
            return ( ( isset( $checked ) && true == $checked ) ?  true : false );
        }
        
        /**
         * Method productive_ecommerce_sanitize_select ''.
         *
         * @param string $input ''.
         * @param object $setting ''.
         *
         * @return string Input or default.
         */
        public static function productive_ecommerce_sanitize_select( $input, $setting ) {
            $input = sanitize_key( $input );
            $choices = $setting->manager->get_control( $setting->id )->choices;
            return ( ( array_key_exists( $input, $choices ) ) ? $input : $setting->default );
        }
        
        /**
         * Method productive_ecommerce_sanitize_html ''.
         *
         * @param string $html ''.
         *
         * @return string Sanitized version of the $html param.
         */
        public static function productive_ecommerce_sanitize_html( $html ) {
            return wp_filter_post_kses( $html );
        }
        
        /**
         * Method productive_ecommerce_sanitize_no_html ''.
         *
         * @param string $text ''.
         *
         * @return string ''.
         */
        public static function productive_ecommerce_sanitize_no_html( $text ) {
            return wp_filter_nohtml_kses( $text );
        }
        
        /**
         * Method productive_ecommerce_sanitize_url ''.
         *
         * @param string $url ''.
         *
         * @return string Sanitized version of the $url param.
         */
        public static function productive_ecommerce_sanitize_url( $url ) {
            return esc_url_raw( $url );
        }
        
        /**
         * Method productive_ecommerce_sanitize_absint ''.
         *
         * @param int $number ''.
         * @param object $setting ''.
         *
         * @return string Sanitized version of the $number or setting default.
         */
        public static function productive_ecommerce_sanitize_absint( $number, $setting ) {
            $number = absint( $number );
            
            return ( $number ? $number : $setting->default );
        }
        
        /**
         * Method productive_ecommerce_sanitize_image ''.
         *
         * @param string $image ''.
         * @param object $setting ''.
         *
         * @return string ''.
         */
        public static function productive_ecommerce_sanitize_image( $image, $setting ) {
            
            $mimes = array(
                'jpg|jpeg|jpe'    => 'image/jpeg',
                'png'             => 'image/png',
                'gif'             => 'image/gif',
                'bmp'             => 'image/bmp',
                'tif/tiff'        => 'image/tiff',
                'ico'             => 'image/x-icon'
            );
            
            $file = wp_check_filetype( $image, $mimes );
            
            if ( null != $file && array_key_exists('ext', $file) ) {
                return $image;
            } else {
                return $setting->default;
            }
            
        }
        
        
        /**
         * Method productive_ecommerce_sanitize_color ''.
         *
         * @param string $color ''.
         *
         * @return string ''.
         */
        public function productive_ecommerce_sanitize_color( $color ) {
            if ( 'blank' === $color || empty( trim($color) ) ) {
                return '#000000';
            }
            $color_sani = sanitize_hex_color( $color );
            if ( empty( $color_sani ) ) {
                $color_sani = '#000000';
            }
            return $color_sani;
        }
        
        
    } // end of class.
    
    // add hook for the class.
    add_action( 'customize_register', array( 'Productive_Theme_Customiser_Common', 'register' ) );
    
}
