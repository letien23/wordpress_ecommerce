<?php
/**
 * The function php file contain all theme-based customisation and functions
 * including several hooks used within the theme
 *
 * @package    productive-ecommerce
 */


// START ============== Productive_Theme_Customiser_Header CUSTOMISERS
/**
 * Method productive_ecommerce_enable_header_search.
 *
 * @param string $class ''.
 */
function productive_ecommerce_enable_header_search( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_enable_header_search', true );
}
add_action( 'display_productive_ecommerce_enable_header_search', 'productive_ecommerce_enable_header_search' );

/**
 * Method productive_ecommerce_enable_header_account.
 *
 * @param string $class ''.
 */
function productive_ecommerce_enable_header_account( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_enable_header_account', true );
}
add_action( 'display_productive_ecommerce_enable_header_account', 'productive_ecommerce_enable_header_account' );

/**
 * Method productive_ecommerce_header_style.
 *
 * @param string $class ''.
 */
function productive_ecommerce_header_style( $class = '' ) {
    $default_value = 'default';
    $theme_mod_value = get_theme_mod( 'productive_ecommerce_header_style', 'default' );
    if ( !$theme_mod_value ) {
        // 
    } else {
        $default_value = $theme_mod_value;
    }
    return $default_value;
}
add_action( 'display_productive_ecommerce_header_style', 'productive_ecommerce_header_style' );


// START ============== Productive_Theme_Customiser_Homepage_Banner CUSTOMISERS
/**
 * Method productive_ecommerce_homepage_usp_image.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_usp_image( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_homepage_usp_image', false );
}
add_action( 'display_productive_ecommerce_homepage_usp_image', 'productive_ecommerce_homepage_usp_image' );

/**
 * Method productive_ecommerce_is_homepage_usp_scroll.
 *
 * @param string $class ''.
 */
function productive_ecommerce_is_homepage_usp_scroll( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_is_homepage_usp_scroll', true );
}
add_action( 'display_productive_ecommerce_is_homepage_usp_scroll', 'productive_ecommerce_is_homepage_usp_scroll' );

/**
 * Method productive_ecommerce_homepage_usp_textarea_1.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_usp_textarea_1( $class = '' ) {
    $blog_name = get_bloginfo( 'name' );
    $theme_mod_value = get_theme_mod( 'productive_ecommerce_homepage_usp_textarea_1', $blog_name );
    echo '<div class="productive_ecommerce_hero_container_content_text top">' .
        wp_specialchars_decode(stripslashes($theme_mod_value) ) . 
        '</div>';
}
add_action( 'display_productive_ecommerce_homepage_usp_textarea_1', 'productive_ecommerce_homepage_usp_textarea_1' );

/**
 * Method productive_ecommerce_homepage_usp_textarea_1_color.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_usp_textarea_1_color( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_homepage_usp_textarea_1_color', '#ffffff' );
}
add_action( 'display_productive_ecommerce_homepage_usp_textarea_1_color', 'productive_ecommerce_homepage_usp_textarea_1_color' );

/**
 * Method productive_ecommerce_homepage_usp_textarea_2.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_usp_textarea_2( $class = '' ) {
    $blog_desc = get_bloginfo( 'description' );
    $theme_mod_value = get_theme_mod( 'productive_ecommerce_homepage_usp_textarea_2', $blog_desc );
    echo '<div class="productive_ecommerce_hero_container_content_text bottom">' .
        wp_specialchars_decode(stripslashes($theme_mod_value) ) . 
        '</div>';
}
add_action( 'display_productive_ecommerce_homepage_usp_textarea_2', 'productive_ecommerce_homepage_usp_textarea_2' );

/**
 * Method productive_ecommerce_homepage_usp_textarea_2_color.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_usp_textarea_2_color( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_homepage_usp_textarea_2_color', '#eded12' );
}
add_action( 'display_productive_ecommerce_homepage_usp_textarea_2_color', 'productive_ecommerce_homepage_usp_textarea_2_color' );

/**
 * Method productive_ecommerce_homepage_cta_1_title.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_cta_1_title( $class = '' ) {
    $theme_mod_value = get_theme_mod( 'productive_ecommerce_homepage_cta_1_title', '' );
    $cta_url = productive_ecommerce_homepage_cta_1_url();
    if ( $theme_mod_value != '' && $cta_url != '' ) {
        echo '<a class="' . $class. '" href="'. $cta_url .'">' .
            wp_specialchars_decode(stripslashes($theme_mod_value) ) .
            '</a>';
    }
} 
add_action( 'display_productive_ecommerce_homepage_cta_1_title', 'productive_ecommerce_homepage_cta_1_title' );

/**
 * Method productive_ecommerce_homepage_cta_1_url.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_cta_1_url( $class = '' ) {
    // text html
    $theme_mod_value = get_theme_mod( 'productive_ecommerce_homepage_cta_1_url', '' );
    return wp_specialchars_decode( esc_url( $theme_mod_value ) );
}
add_action( 'display_productive_ecommerce_homepage_cta_1_url', 'productive_ecommerce_homepage_cta_1_url' );

/**
 * Method productive_ecommerce_homepage_cta_1_text_color.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_cta_1_text_color( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_homepage_cta_1_text_color', '#ffffff' );
}
add_action( 'display_productive_ecommerce_homepage_cta_1_text_color', 'productive_ecommerce_homepage_cta_1_text_color' );

/**
 * Method productive_ecommerce_homepage_cta_1_bg_color.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_cta_1_bg_color( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_homepage_cta_1_bg_color', '#fc0082' );
}
add_action( 'display_productive_ecommerce_homepage_cta_1_bg_color', 'productive_ecommerce_homepage_cta_1_bg_color' );

/**
 * Method productive_ecommerce_homepage_cta_2_title.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_cta_2_title( $class = '' ) {
    $theme_mod_value = get_theme_mod( 'productive_ecommerce_homepage_cta_2_title', '' );
    $cta_url = productive_ecommerce_homepage_cta_2_url();
    if ( $theme_mod_value != '' && $cta_url != '' ) {
        echo '<a class="' . $class. '" href="'. $cta_url .'">' .
            wp_specialchars_decode(stripslashes($theme_mod_value) ) .
            '</a>';
    }
} 
add_action( 'display_productive_ecommerce_homepage_cta_2_title', 'productive_ecommerce_homepage_cta_2_title' );

/**
 * Method productive_ecommerce_homepage_cta_2_url.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_cta_2_url( $class = '' ) {
    $theme_mod_value = get_theme_mod( 'productive_ecommerce_homepage_cta_2_url', '' );
    return wp_specialchars_decode( esc_url( $theme_mod_value ) );
}
add_action( 'display_productive_ecommerce_homepage_cta_2_url', 'productive_ecommerce_homepage_cta_2_url' );

/**
 * Method productive_ecommerce_homepage_cta_2_text_color.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_cta_2_text_color( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_homepage_cta_2_text_color', '#ffffff' );
}
add_action( 'display_productive_ecommerce_homepage_cta_2_text_color', 'productive_ecommerce_homepage_cta_2_text_color' );

/**
 * Method productive_ecommerce_homepage_cta_2_bg_color.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_cta_2_bg_color( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_homepage_cta_2_bg_color', '#0239ef' );
}
add_action( 'display_productive_ecommerce_homepage_cta_2_bg_color', 'productive_ecommerce_homepage_cta_2_bg_color' );




// START ============== Productive_Theme_Customiser_Homepage_Blog CUSTOMISERS
/**
 * Method productive_ecommerce_show_homepage_blog_excerpts.
 *
 * @param string $class ''.
 */
function productive_ecommerce_show_homepage_blog_excerpts( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_show_homepage_blog_excerpts', true );
}
add_action( 'display_productive_ecommerce_show_homepage_blog_excerpts', 'productive_ecommerce_show_homepage_blog_excerpts' );

/**
 * Method productive_ecommerce_homepage_blog_heading.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_blog_heading( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_homepage_blog_heading', 'Latest Blog' );
}
add_action( 'display_productive_ecommerce_homepage_blog_heading', 'productive_ecommerce_homepage_blog_heading' );




// START ============== Productive_Theme_Customiser_Commerce CUSTOMISERS
/**
 * Method productive_ecommerce_enable_header_cart.
 *
 * @param string $class ''.
 */
function productive_ecommerce_enable_header_cart( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_enable_header_cart', true );
}
add_action( 'display_productive_ecommerce_enable_header_cart', 'productive_ecommerce_enable_header_cart' );

/**
 * Method productive_ecommerce_enable_header_wishlist.
 *
 * @param string $class ''.
 */
function productive_ecommerce_enable_header_wishlist( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_enable_header_wishlist', true );
}
add_action( 'display_productive_ecommerce_enable_header_wishlist', 'productive_ecommerce_enable_header_wishlist' );

/**
 * Method productive_ecommerce_enable_header_compare.
 *
 * @param string $class ''.
 */
function productive_ecommerce_enable_header_compare( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_enable_header_compare', true );
}
add_action( 'display_productive_ecommerce_enable_header_compare', 'productive_ecommerce_enable_header_compare' );

/**
 * Method productive_ecommerce_enable_switch_currency.
 *
 * @param string $class ''.
 */
function productive_ecommerce_enable_switch_currency( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_enable_switch_currency', true );
}
add_action( 'display_productive_ecommerce_enable_switch_currency', 'productive_ecommerce_enable_switch_currency' );

/**
 * Method productive_ecommerce_enable_switch_language.
 *
 * @param string $class ''.
 */
function productive_ecommerce_enable_switch_language( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_enable_switch_language', true );
}
add_action( 'display_productive_ecommerce_enable_switch_language', 'productive_ecommerce_enable_switch_language' );

/**
 * Method productive_ecommerce_product_page_custom_design.
 *
 * @param string $class ''.
 */
function productive_ecommerce_product_page_custom_design( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_product_page_custom_design', true );
}
add_action( 'display_productive_ecommerce_product_page_custom_design', 'productive_ecommerce_product_page_custom_design' );

/**
 * Method productive_ecommerce_enable_breadcrumb.
 *
 * @param string $class ''.
 */
function productive_ecommerce_enable_breadcrumb( $class = '' ) {
    $theme_mod_enabled = get_theme_mod( 'productive_ecommerce_enable_breadcrumb', true );
    if ( $theme_mod_enabled ) {
        echo '<div class="breadcrumb-container-standard ' . $class . '">';
           do_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
        echo '</div>';
    }
}
add_action( 'display_productive_ecommerce_enable_breadcrumb', 'productive_ecommerce_enable_breadcrumb' );

/**
 * Method productive_ecommerce_get_enable_breadcrumb.
 *
 * @param string $class ''.
 */
function productive_ecommerce_get_enable_breadcrumb() {
    return get_theme_mod( 'productive_ecommerce_enable_breadcrumb', true );
}

/**
 * Method productive_ecommerce_enable_subcategories.
 *
 * @param string $class ''.
 */
function productive_ecommerce_enable_subcategories( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_enable_subcategories', true );
}
add_action( 'display_productive_ecommerce_enable_subcategories', 'productive_ecommerce_enable_subcategories' );

/**
 * Method productive_ecommerce_subcategories_items_per_row_to_display.
 *
 * @param string $class ''.
 */
function productive_ecommerce_subcategories_items_per_row_to_display( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_subcategories_items_per_row_to_display', 5 );
}
add_action( 'display_productive_ecommerce_subcategories_items_per_row_to_display', 'productive_ecommerce_subcategories_items_per_row_to_display' );




// START ============== Productive_Theme_Customiser_Layout CUSTOMISERS
/**
 * Method productive_ecommerce_template_layout_options.
 *
 * @param string $class ''.
 */
function productive_ecommerce_template_layout_options( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_template_layout_options', 'one_column' );
}
add_action( 'display_productive_ecommerce_template_layout_options', 'productive_ecommerce_template_layout_options' );

/**
 * Method productive_ecommerce_sidebar_left_header_text.
 *
 * @param string $class ''.
 */
function productive_ecommerce_sidebar_left_header_text( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_sidebar_left_header_text', esc_html__( 'Info', 'productive-ecommerce' ) );
}
add_action( 'display_productive_ecommerce_sidebar_left_header_text', 'productive_ecommerce_sidebar_left_header_text' );




// START ============== Productive_Theme_Customiser_Archive CUSTOMISERS
/**
 * Method productive_ecommerce_items_per_row_to_display.
 *
 * @param string $class ''.
 */
function productive_ecommerce_items_per_row_to_display( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_items_per_row_to_display', 4 );
}
add_action( 'display_productive_ecommerce_items_per_row_to_display', 'productive_ecommerce_items_per_row_to_display' );

/**
 * Method productive_ecommerce_posts_placeholder_image.
 *
 * @param string $class ''.
 */
function productive_ecommerce_posts_placeholder_image( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_posts_placeholder_image' );
}
add_action( 'display_productive_ecommerce_posts_placeholder_image', 'productive_ecommerce_posts_placeholder_image' );

/**
 * Method productive_ecommerce_homepage_blog_heading_style.
 *
 * @param string $class ''.
 */
function productive_ecommerce_homepage_blog_heading_style( $class = '' ) {
    $theme_mod_enabled = get_theme_mod( 'productive_ecommerce_homepage_blog_heading_style', false );
    return $theme_mod_enabled;
}
add_action( 'display_productive_ecommerce_homepage_blog_heading_style', 'productive_ecommerce_homepage_blog_heading_style' );

/**
 * Method productive_ecommerce_post_archive_banner_image.
 *
 * @param string $class ''.
 */
function productive_ecommerce_post_archive_banner_image( $class = '' ) {
    // image
    return get_theme_mod( 'productive_ecommerce_post_archive_banner_image' );
}
add_action( 'display_productive_ecommerce_post_archive_banner_image', 'productive_ecommerce_post_archive_banner_image' );

/**
 * Method productive_ecommerce_post_archive_title_color.
 *
 * @param string $class ''.
 */
function productive_ecommerce_post_archive_title_color( $class = '' ) {
    return get_theme_mod( 'productive_ecommerce_post_archive_title_color', '#ffffff' );
}
add_action( 'display_productive_ecommerce_post_archive_title_color', 'productive_ecommerce_post_archive_title_color' );




// START ============== Productive_Theme_Customiser_Footer CUSTOMISERS
/**
 * Method productive_ecommerce_enable_footer_sitename.
 *
 * @param string $class ''.
 */
function productive_ecommerce_enable_footer_sitename( $class = '' ) {
    $theme_mod_enabled = get_theme_mod( 'productive_ecommerce_enable_footer_sitename', true );
    if ( $theme_mod_enabled ) {
        echo '<div class="footer-about-site-name ' . $class . '">
                <span class="footer-about-site-name-text">' . get_bloginfo( 'name' ) . '</span>' .
            '</div>';
    }
}
add_action( 'display_productive_ecommerce_enable_footer_sitename', 'productive_ecommerce_enable_footer_sitename' );

/**
 * Method productive_ecommerce_enable_footer_copyright.
 *
 * @param string $class ''.
 */
function productive_ecommerce_enable_footer_copyright( $class = '' ) {
    $theme_mod_enabled = get_theme_mod( 'productive_ecommerce_enable_footer_copyright', true );
    if ( (PRODUCTIVE_ECOMMERCE_PRODUCT_DOWNLOAD_TYPE == 'product' && $theme_mod_enabled) || PRODUCTIVE_ECOMMERCE_PRODUCT_DOWNLOAD_TYPE != 'product' ) {
        echo '<div class="site-container-copyright">
                <div class="copyright">' .
                    wp_specialchars_decode( stripslashes(productive_ecommerce_footer_copyright_textarea()) ).
                '</div>
            </div>';
    }
}
add_action( 'display_productive_ecommerce_enable_footer_copyright', 'productive_ecommerce_enable_footer_copyright' );

/**
 * Method productive_ecommerce_footer_copyright_textarea.
 *
 * @param string $class ''.
 */
function productive_ecommerce_footer_copyright_textarea( $class = '' ) {
    $footer_copyright_copy = esc_html( 'A WordPress theme by ', 'productive-ecommerce' ).'<a target="_blank" href="' . esc_url( PRODUCTIVE_ECOMMERCE_THEME_DEVELOPER_WEBSITE ) . '">productiveminds.com</a>';
    if ( PRODUCTIVE_ECOMMERCE_PRODUCT_DOWNLOAD_TYPE == 'product' ) {
        $footer_copyright = get_theme_mod( 'productive_ecommerce_footer_copyright_textarea', $footer_copyright_copy );
        return $footer_copyright;
    } else {
        return $footer_copyright_copy;
    }
}
add_action( 'display_productive_ecommerce_footer_copyright_textarea', 'productive_ecommerce_footer_copyright_textarea' );

/**
 * Method productive_ecommerce_footer_style.
 *
 * @param string $class ''.
 */
function productive_ecommerce_footer_style( $class = '' ) {
    $default_value = 'default';
    $theme_mod_value = get_theme_mod( 'productive_ecommerce_footer_style', 'default' );
    if ( !$theme_mod_value ) {
        // 
    } else {
        $default_value = $theme_mod_value;
    }
    return $default_value;
}
add_action( 'display_productive_ecommerce_footer_style', 'productive_ecommerce_footer_style' );