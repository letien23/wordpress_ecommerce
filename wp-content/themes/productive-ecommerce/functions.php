<?php
/**
 * The function php file contain all theme-based customisation and functions
 * including several hooks used within the theme
 *
 * @package    productive-ecommerce
 */

define( 'PRODUCTIVE_ECOMMERCE_THEME_BASE_PATH', get_template_directory() );
define( 'PRODUCTIVE_ECOMMERCE_THEME_BASE_URI', get_template_directory_uri() );

$productive_ecommerce_theme_version_obj = wp_get_theme();
$productive_ecommerce_theme_version = $productive_ecommerce_theme_version_obj->get( 'Version' );

$productiveminds_base_demo_url = 'https://demo.productiveminds.com';

$theme_name = $productive_ecommerce_theme_version_obj->get( 'Name' );
$theme_url = $productive_ecommerce_theme_version_obj->get( 'ThemeURI' );
$author_url = $productive_ecommerce_theme_version_obj->get( 'AuthorURI' );
$theme_demo_url = $productiveminds_base_demo_url . '/' . $productive_ecommerce_theme_version_obj->get( 'TextDomain' );

define( 'PRODUCTIVE_ECOMMERCE_PRODUCT_DOWNLOAD_TYPE', 'product-download' );
define( 'PRODUCTIVE_ECOMMERCE_THEME_DEVELOPER_NAME', 'productiveminds.com' );
define( 'PRODUCTIVE_ECOMMERCE_THEME_DEVELOPER_WEBSITE', $author_url );
define( 'PRODUCTIVE_ECOMMERCE_CURRENT_THEME_NAME', $theme_name );
define( 'PRODUCTIVE_ECOMMERCE_THEME_DEMO_URL', $theme_demo_url );
define( 'PRODUCTIVE_ECOMMERCE_THEME_FEATURES_OR_BUY_URL', $theme_url );
define( 'PRODUCTIVE_ECOMMERCE_HOMEPAGE_USP_IMAGE_REMOTE', PRODUCTIVE_ECOMMERCE_THEME_BASE_URI . '/assets/images/hero-1.webp' );

$productive_ecommerce_posts_placeholder_image_remote = PRODUCTIVE_ECOMMERCE_THEME_BASE_URI . '/assets/images/posts-placeholder.webp';

// A global array for theme styles and settings
$global_style_setting = array();

// Ensure to include customiser before WooCommerce includes
require PRODUCTIVE_ECOMMERCE_THEME_BASE_PATH . '/includes/productive-theme-customiser.php';

/**
 * WooCOmmerce includes
 */
require_once PRODUCTIVE_ECOMMERCE_THEME_BASE_PATH . '/includes/woocommerce.php';

/**
 * Method productive_ecommerce_body_open_action.
 *
 */
function productive_ecommerce_body_open_action() {
    echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to content', 'productive-ecommerce' ) . '</a>';
}
add_action( 'productive_ecommerce_body_open', 'productive_ecommerce_body_open_action' );


/**
 * Register sidebar widgets
 */
function productive_ecommerce_promindsone_widgets() {
    
    register_sidebar(
        array(
            'name' => esc_html__('Homepage Content (above Blog)', 'productive-ecommerce'),
            'id' => 'homepage_content_widget_top',
            'before_widget' => '<div class="productive_ecommerce_widget_container_home">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
        );
    
    register_sidebar(
        array(
            'name' => esc_html__('Homepage Content (below Blog)', 'productive-ecommerce'),
            'id' => 'homepage_content_widget_bottom',
            'before_widget' => '<div class="productive_ecommerce_widget_container_home">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
        );
    
    register_sidebar(
        array(
            'name' => esc_html__('Left Sidebar', 'productive-ecommerce'),
            'id' => 'sidebar_left',
            'before_widget' => '<div class="productive_ecommerce_widget_container_sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
        );
    
    register_sidebar(
        array(
            'name' => esc_html__('Right Sidebar', 'productive-ecommerce'),
            'id' => 'sidebar_right',
            'before_widget' => '<div class="productive_ecommerce_widget_container_sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
        );
    
    register_sidebar(
        array(
            'name' => esc_html__('Footer (Left)', 'productive-ecommerce'),
            'id' => 'footer_left_info',
            'before_widget' => '<div class="productive_ecommerce_widget_container_sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
        );
    
    register_sidebar(
        array(
            'name' => esc_html__('Footer (Right)', 'productive-ecommerce'),
            'id' => 'footer_right_info',
            'before_widget' => '<div class="productive_ecommerce_widget_container_sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
        );
    
}
add_action( 'widgets_init', 'productive_ecommerce_promindsone_widgets' );



/**
 * Method productive_ecommerce_body_open.
 *
 */
function productive_ecommerce_body_open() {
    do_action( 'productive_ecommerce_body_open' );
}

	/**
	 * Method productive_ecommerce_menu_navs.
	 */
function productive_ecommerce_menu_navs() {
	$theme_menus = array(
		'primary' => 'Primary',
		'footer_menu' => 'Footer Menu',
	);
	register_nav_menus( $theme_menus );
}
	// hook for productive_ecommerce_menus.
	add_action( 'init', 'productive_ecommerce_menu_navs' );


	/**
	 * Method productive_ecommerce_get_placeholder_image.
	 *
	 * @return string
	 */
function productive_ecommerce_get_placeholder_image() {

	global $productive_ecommerce_posts_placeholder_image_remote;

	$productive_ecommerce_posts_placeholder_url = '';
	$productive_ecommerce_posts_placeholder_image_id = productive_ecommerce_posts_placeholder_image();
	
	$productive_ecommerce_posts_placeholder_url = productive_ecommerce_get_attachment_by_thumbnail_id( $productive_ecommerce_posts_placeholder_image_id, 'full', 
	    $productive_ecommerce_posts_placeholder_image_remote );
	
	return $productive_ecommerce_posts_placeholder_url;
}

	/**
	 * Method productive_ecommerce_do_placeholder_image.
	 */
function productive_ecommerce_do_placeholder_image() {
    
    global $productive_ecommerce_posts_placeholder_image_remote;
    
    $productive_ecommerce_posts_placeholder_url = '';
    $productive_ecommerce_posts_placeholder_image_id = productive_ecommerce_posts_placeholder_image();
    
    $productive_ecommerce_posts_placeholder_url = productive_ecommerce_get_attachment_by_thumbnail_id( $productive_ecommerce_posts_placeholder_image_id, 'full',
        $productive_ecommerce_posts_placeholder_image_remote );
    
	echo '<img src="' . esc_url( $productive_ecommerce_posts_placeholder_url ) . '" alt="" />';
}
	add_action( 'display_placeholder_image', 'productive_ecommerce_do_placeholder_image' );


	/**
	 * Method productive_ecommerce_scripts.
	 */
function productive_ecommerce_scripts() {
    
	global $productive_ecommerce_theme_version;
	
	// Per WP Theme team guide - See https://github.com/WPTT/webfont-loader
	require_once get_template_directory() . '/includes/wptt-webfont-loader.php';
	
	// Google fonts.
	wp_enqueue_style('productive_ecommerce_googlefonts', wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=Roboto:wght@100;300;400;500;700;900&display=swap' ), array(), $productive_ecommerce_theme_version );
	
	// Google font icons - https://fonts.google.com/icons.
	wp_enqueue_style('productive_ecommerce_google_font_icons', wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Material+Icons' ), array(), $productive_ecommerce_theme_version );
	wp_enqueue_style('productive_ecommerce_google_font_icons_round', wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Material+Icons+Round' ), array(), $productive_ecommerce_theme_version );
	wp_enqueue_style('productive_ecommerce_google_font_icons_symbol', wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@300' ), array(), $productive_ecommerce_theme_version );
	
	wp_enqueue_style( 'productive_ecommerce_normalize', get_template_directory_uri() . '/libraries/css/normalize.css', array( 'productive_ecommerce_googlefonts', 'productive_ecommerce_google_font_icons', 'productive_ecommerce_google_font_icons_round' ), $productive_ecommerce_theme_version );
	
	// theme's main css with normalise & google font as dependencies.
	wp_enqueue_style( 'productive_ecommerce_style', get_template_directory_uri() . '/style.css', array( 'productive_ecommerce_normalize' ), $productive_ecommerce_theme_version );
	
	// as per number of columns - load only after main css.
	$number_of_items_per_row = productive_ecommerce_get_items_per_row_to_display();
	if ( 2 == $number_of_items_per_row ) {
		wp_enqueue_style( 'product_archive_css', get_template_directory_uri() . '/assets/css/archive_2.css', array( 'productive_ecommerce_style' ), $productive_ecommerce_theme_version );
	} else if ( 3 == $number_of_items_per_row ) {
		wp_enqueue_style( 'product_archive_css', get_template_directory_uri() . '/assets/css/archive_3.css', array( 'productive_ecommerce_style' ), $productive_ecommerce_theme_version );
	} else if ( 4 == $number_of_items_per_row ) {
		wp_enqueue_style( 'product_archive_css', get_template_directory_uri() . '/assets/css/archive_4.css', array( 'productive_ecommerce_style' ), $productive_ecommerce_theme_version );
	} else if ( 5 == $number_of_items_per_row ) {
		wp_enqueue_style( 'product_archive_css', get_template_directory_uri() . '/assets/css/archive_5.css', array( 'productive_ecommerce_style' ), $productive_ecommerce_theme_version );
	} else if ( 6 == $number_of_items_per_row ) {
		wp_enqueue_style( 'product_archive_css', get_template_directory_uri() . '/assets/css/archive_6.css', array( 'productive_ecommerce_style' ), $productive_ecommerce_theme_version );
	} else if ( 7 == $number_of_items_per_row ) {
		wp_enqueue_style( 'product_archive_css', get_template_directory_uri() . '/assets/css/archive_7.css', array( 'productive_ecommerce_style' ), $productive_ecommerce_theme_version );
	}
	
	if ( ! is_admin() && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	    wp_enqueue_script( 'comment-reply' );
	}
	// jquery.
	wp_enqueue_script( 'jquery' );

	// theme's main JS.
	wp_enqueue_script( 'productive_ecommerce_js', get_template_directory_uri() . '/assets/js/theme.js', array(), $productive_ecommerce_theme_version, true );
}
	// hook for productive_ecommerce_scripts.
	add_action( 'wp_enqueue_scripts', 'productive_ecommerce_scripts' );
	
	
/**
 * Load (wp_enqueue_script) admin css * JS files.
 */
function productive_ecommerce_admin_scripts() {
    
	global $productive_ecommerce_theme_version;
    
    $admin_ajax_php_class = array(
        'ajax_admin_url' => admin_url( 'admin-ajax.php' ),
    );
   
    wp_enqueue_style( 'productive_ecommerce_admin_css', get_theme_file_uri() . '/assets/admin/css/admin-style.css', array(), $productive_ecommerce_theme_version );
    wp_enqueue_script( 'productive_ecommerce_admin_js_handle', get_theme_file_uri() . '/assets/admin/js/admin-theme-ajax.js', array(), $productive_ecommerce_theme_version, true );
    
    wp_localize_script(
    'productive_ecommerce_admin_js_handle',
    'productive_ecommerce_admin_js_url_name',
    $admin_ajax_php_class
    );
    
}
// hook for productive_ecommerce_admin_scripts.
add_action( 'admin_enqueue_scripts', 'productive_ecommerce_admin_scripts' );



	/**
	 * Method enable featured image.
	 */
function productive_ecommerce_setup_theme() {
    
    add_theme_support('post-thumbnails');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('custom-logo');
    add_theme_support('align-wide');
    add_theme_support('title-tags');
    add_theme_support('automatic-feed-links');
    
	$args = array(
	    'gallery',
	    'caption',
	    'script',
	    'search-form',
	    'comment-form',
	    'comment-list',
	    'navigation-widgets',
	);
	
	add_theme_support( 'html5', $args );

	// initiate text-domain.
	load_theme_textdomain( 'productive-ecommerce', get_template_directory() . '/languages' );

}
// hook for productive_ecommerce_setup_theme.
add_action( 'after_setup_theme', 'productive_ecommerce_setup_theme' );

	
/**
 * Method productive_ecommerce_get_homepage_content_widget_top.
 *
 * @param string $class ''.
 */
function productive_ecommerce_get_homepage_content_widget_top( $class = '' ) {

    if ( is_active_sidebar( 'homepage_content_widget_top' ) ) {
        if ( '' != $class ) {
            echo '<div class="' . esc_attr( $class ) . '">';
            if ( is_active_sidebar( 'homepage_content_widget_top' ) ) {
                dynamic_sidebar( 'homepage_content_widget_top' );
            }
            echo '</div>';
        } else {
            if ( is_active_sidebar( 'homepage_content_widget_top' ) ) {
                dynamic_sidebar( 'homepage_content_widget_top' );
            }
        }
    }
}
// hook for get_homepage_content_widget_top.
add_action( 'display_homepage_content_widget_top', 'productive_ecommerce_get_homepage_content_widget_top' );


/**
 * Method productive_ecommerce_get_homepage_content_widget_bottom.
 *
 * @param string $class ''.
 */
function productive_ecommerce_get_homepage_content_widget_bottom( $class = '' ) {

    if ( is_active_sidebar( 'homepage_content_widget_bottom' ) ) {
        if ( '' != $class ) {
            echo '<div class="' . esc_attr( $class ) . '">';
            if ( is_active_sidebar( 'homepage_content_widget_bottom' ) ) {
                dynamic_sidebar( 'homepage_content_widget_bottom' );
            }
            echo '</div>';
        } else {
            if ( is_active_sidebar( 'homepage_content_widget_bottom' ) ) {
                dynamic_sidebar( 'homepage_content_widget_bottom' );
            }
        }
    }
}
// hook for get_homepage_content_widget_bottom.
add_action( 'display_homepage_content_widget_bottom', 'productive_ecommerce_get_homepage_content_widget_bottom' );


/**
 * Method productive_ecommerce_get_left_sidebar.
 *
 * @param string $class ''.
 */
function productive_ecommerce_get_left_sidebar( $class = '' ) {

    if ( is_active_sidebar( 'sidebar_left' ) ) {
        echo '<div class="sidebar_left_header">';
        echo '<i class="add_circle material-icons-round">add_circle</i>';
        echo '<i class="remove_circle material-icons-round">remove_circle</i>';
        echo '<span class="productive_ecommerce_sidebar_left_header_text">' . 
            productive_ecommerce_sidebar_left_header_text() . '</span>';
        echo '</div>';

        if ( '' != $class ) {
            echo '<aside class="sidebar_left ' . esc_attr( $class ) . '">';
            dynamic_sidebar( 'sidebar_left' );
            echo '</aside>';
        } else {
            echo '<aside class="sidebar_left">';
            dynamic_sidebar( 'sidebar_left' );
            echo '</aside>';
        }
    }

}
// hook for sidebar_left.
add_action( 'display_sidebar_left', 'productive_ecommerce_get_left_sidebar' );


/**
 * Method productive_ecommerce_get_sidebar_right.
 *
 * @param string $class ''.
 */
function productive_ecommerce_get_sidebar_right( $class = '' ) {

    if ( is_active_sidebar( 'sidebar_right' ) ) {
        if ( '' != $class ) {
            echo '<aside class="' . esc_attr( $class ) . '">';
            if ( is_active_sidebar( 'sidebar_right' ) ) {
                dynamic_sidebar( 'sidebar_right' );
            }
            echo '</aside>';
        } else {
            echo '<aside>';
            if ( is_active_sidebar( 'sidebar_right' ) ) {
                dynamic_sidebar( 'sidebar_right' );
            }
            echo '</aside>';
        }
    }
}
// hook for sidebar_right.
add_action( 'display_sidebar_right', 'productive_ecommerce_get_sidebar_right' );



/**
 * Method productive_ecommerce_get_footer_left_info.
 *
 * @param string $class ''.
 */
function productive_ecommerce_get_footer_left_info( $class = '' ) {

    if ( is_active_sidebar( 'footer_left_info' ) ) {
        if ( '' != $class ) {
            echo '<aside class="' . esc_attr( $class ) . '">';
            if ( is_active_sidebar( 'footer_left_info' ) ) {
                dynamic_sidebar( 'footer_left_info' );
            }
            echo '</aside>';
        } else {
            echo '<aside>';
            if ( is_active_sidebar( 'footer_left_info' ) ) {
                dynamic_sidebar( 'footer_left_info' );
            }
            echo '</aside>';
        }
    }
}
// hook for footer_left_info.
add_action( 'display_footer_left_info', 'productive_ecommerce_get_footer_left_info' );



/**
 * Method productive_ecommerce_get_footer_right_info.
 *
 * @param string $class ''.
 */
function productive_ecommerce_get_footer_right_info( $class = '' ) {

    if ( is_active_sidebar( 'footer_right_info' ) ) {
        if ( '' != $class ) {
            echo '<aside class="' . esc_attr( $class ) . '">';
            if ( is_active_sidebar( 'footer_right_info' ) ) {
                dynamic_sidebar( 'footer_right_info' );
            }
            echo '</aside>';
        } else {
            echo '<aside>';
            if ( is_active_sidebar( 'footer_right_info' ) ) {
                dynamic_sidebar( 'footer_right_info' );
            }
            echo '</aside>';
        }
    }
}
// hook for footer_right_info.
add_action( 'display_footer_right_info', 'productive_ecommerce_get_footer_right_info' );



/**
 * Method productive_ecommerce_get_site_posts.
 *
 * @param number $number_of_posts ''.
 *
 * @param string $post_type ''.
 *
 * @return WP_Post[]|number[]
 */
function productive_ecommerce_get_site_posts( $number_of_posts = 10, $post_type = 'post' ) {
    $args = array(
        'numberposts' => $number_of_posts,
        'post_type' => $post_type,
    );
    return get_posts( $args );
}

/**
 * Add hook to display search box in the header.
 *
 * @param string $class ''.
 */
function productive_ecommerce_get_productive_ecommerce_header_nav( $class = '' ) {
	if ( '' != $class ) {
		echo '<div class="' . esc_attr( $class ) . '">';
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu' => 'promindsone-header-nav',
				'menu_id' => 'promindsone-header-nav',
				'container' => 'div',
				'menu_class' => 'header-navbar-nav',
				'containder-class' => 'promindsone-header-nav',
			)
		);
		echo '</div>';
	} else {
		echo '<div>';
		wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu' => 'promindsone-header-nav',
                        'menu_id' => 'promindsone-header-nav',
                        'container' => 'div',
                        'menu_class' => 'header-navbar-nav',
                        'containder-class' => 'promindsone-header-nav',
                    )
		);
		echo '</div>';
	}
}
	// hook for  header_nav form.
	add_action( 'display_productive_ecommerce_header_nav', 'productive_ecommerce_get_productive_ecommerce_header_nav' );

	/**
	 * Method productive_ecommerce_get_items_per_row_to_display.
	 *
	 * Ensure to add the require woocommerce.php before this method
	 * 
	 * @return number|mixed ''
	 */
function productive_ecommerce_get_items_per_row_to_display() {
	$productive_ecommerce_items_per_row_to_display = 4;
	if ( productive_ecommerce_is_woocommerce_activated() ) {
            if ( wc_get_default_products_per_row() != 0 ) {
                    $productive_ecommerce_items_per_row_to_display = wc_get_default_products_per_row();
            } else {
                    $productive_ecommerce_items_per_row_to_display = productive_ecommerce_items_per_row_to_display();
            }
	} else {
            $productive_ecommerce_items_per_row_to_display = productive_ecommerce_items_per_row_to_display();
	}
	return $productive_ecommerce_items_per_row_to_display;
}
	add_action( 'display_items_per_row_to_display', 'productive_ecommerce_get_items_per_row_to_display' );


	/**
	 * Method productive_ecommerce_get_unique_id.
	 *
	 * @param string $prefix ''.
	 *
	 * @return string
	 */
function productive_ecommerce_get_unique_id( $prefix = '' ) {
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	} else {
		static $id_counter;
		return $prefix . (string) ++$id_counter;
	}
}
	add_action( 'display_unique_id', 'productive_ecommerce_get_unique_id', 1 );

	
/**
 * Method productive_ecommerce_inhouse_full_width_video
 */
function productive_ecommerce_inhouse_full_width_video( $html ) {
    return '<div class="embedded_content_css">' . $html . '</div>';
}
// hook for productive_ecommerce_inhouse_full_width_video.
add_filter( 'embed_oembed_html', 'productive_ecommerce_inhouse_full_width_video', 1, 2 );


/**
 * Method productive_ecommerce_is_blog_category_page.
 * *
 * @return boolean
 */
function productive_ecommerce_is_blog_category_page() {
    if (is_category()) {
        return true;
    }
    return false;
}

/**
 * Method productive_ecommerce_get_theme_mod_bg_image_home
 */
function productive_ecommerce_get_attachment_by_thumbnail_id($attachment_id, $type = 'full', 
    $default_image = PRODUCTIVE_ECOMMERCE_HOMEPAGE_USP_IMAGE_REMOTE) {
    
    $productive_ecommerce_homepage_usp_image = $default_image;
    
    if ( $attachment_id ) {
        $attachment_url = wp_get_attachment_url( $attachment_id, $type );
        if ( !empty( trim($attachment_url)) ) {
            $productive_ecommerce_homepage_usp_image = $attachment_url;
        }
    }
    return $productive_ecommerce_homepage_usp_image;
}

if ( ! function_exists( 'productive_ecommerce_the_posts_navigation' ) ) {
    /**
     * Method for productive_ecommerce_the_posts_navigation
     */
    function productive_ecommerce_the_posts_navigation() {
        the_posts_pagination(
            array(
                'prev_text' => sprintf(
                    '%s <span class="prev-post-link">%s</span>',
                    '<i class="material-icons-round">arrow_left</i>',
                    esc_html__( 'Newer ', 'productive-ecommerce' )
                    ),
                'next_text' => sprintf(
                    '<span class="next-post-link">%s</span> %s',
                    esc_html__( 'Older', 'productive-ecommerce' ),
                    '<i class="material-icons-round">arrow_right</i>'
                    ),
                'screen_reader_text' => esc_html__( 'Page Content navigation ', 'productive-ecommerce' ),
                'class' => 'productive_ecommerce_pagination_nav',
            )
        );
    }
}

    
// Customisers
require PRODUCTIVE_ECOMMERCE_THEME_BASE_PATH . '/includes/functions-customiser.php';

function productive_ecommerce_add_user_style() {
    global $global_style_setting;
    $global_style_setting['usp_1_text_color'] = productive_ecommerce_homepage_usp_textarea_1_color();
    $global_style_setting['usp_2_text_color'] = productive_ecommerce_homepage_usp_textarea_2_color();
    
    $global_style_setting['cta_1_text_color'] = productive_ecommerce_homepage_cta_1_text_color();
    $global_style_setting['cta_1_bg_color'] = productive_ecommerce_homepage_cta_1_bg_color();
    $global_style_setting['cta_2_text_color'] = productive_ecommerce_homepage_cta_2_text_color();
    $global_style_setting['cta_2_bg_color'] = productive_ecommerce_homepage_cta_2_bg_color();
    
    $global_style_setting['blog_category_title_text_color'] = productive_ecommerce_post_archive_title_color();
        
    productive_ecommerce_apply_user_style($global_style_setting);
}
add_action('wp_head', 'productive_ecommerce_add_user_style');

function productive_ecommerce_apply_user_style($global_style_setting) {
    ?>
        <style>
        .productive_ecommerce_hero_container.home .productive_ecommerce_hero_container_content_text.top {
                color: <?php echo $global_style_setting['usp_1_text_color']; ?>;
        }.productive_ecommerce_hero_container.home .productive_ecommerce_hero_container_content_text.bottom {
                color: <?php echo $global_style_setting['usp_2_text_color']; ?>;
        }.productive_ecommerce_hero_container.home .productive_ecommerce_hero_container_content .cta a {
                color: <?php echo $global_style_setting['cta_1_text_color']; ?>;
                background: <?php echo $global_style_setting['cta_1_bg_color']; ?>;
        }.productive_ecommerce_hero_container.home .productive_ecommerce_hero_container_content .cta a.cta2 {
                color: <?php echo $global_style_setting['cta_2_text_color']; ?>;
                border-color: <?php echo $global_style_setting['cta_2_text_color']; ?>;
                background: <?php echo $global_style_setting['cta_2_bg_color']; ?>;
        }.productive_ecommerce_hero_container.archive .productive_ecommerce_hero_container_content_text h1 {
                color: <?php echo $global_style_setting['blog_category_title_text_color']; ?>;
        }
        </style>
    <?php
}
