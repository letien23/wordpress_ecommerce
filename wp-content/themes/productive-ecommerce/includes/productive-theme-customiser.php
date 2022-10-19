<?php
/**
 * Theme Customiser Base
 *
 * @package productive-ecommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
    die();
}

// Load first
require PRODUCTIVE_ECOMMERCE_THEME_BASE_PATH . '/includes/customiser/productive-theme-customiser-common.php';

require PRODUCTIVE_ECOMMERCE_THEME_BASE_PATH . '/includes/customiser/productive-theme-customiser-header.php';
require PRODUCTIVE_ECOMMERCE_THEME_BASE_PATH . '/includes/customiser/productive-theme-customiser-homepage-banner.php';
require PRODUCTIVE_ECOMMERCE_THEME_BASE_PATH . '/includes/customiser/productive-theme-customiser-homepage-cta.php';
require PRODUCTIVE_ECOMMERCE_THEME_BASE_PATH . '/includes/customiser/productive-theme-customiser-blog.php';
require PRODUCTIVE_ECOMMERCE_THEME_BASE_PATH . '/includes/customiser/productive-theme-customiser-layout.php';
require PRODUCTIVE_ECOMMERCE_THEME_BASE_PATH . '/includes/customiser/productive-theme-customiser-commerce.php';
require PRODUCTIVE_ECOMMERCE_THEME_BASE_PATH . '/includes/customiser/productive-theme-customiser-footer.php';
