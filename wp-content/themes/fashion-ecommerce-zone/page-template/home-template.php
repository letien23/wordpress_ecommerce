<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="slide_cat">
    <div class="container">
      <div class="row slider-border">
        <div class="col-lg-3 col-md-4">
          <?php if(class_exists('woocommerce')){ ?>
            <div class="home_product_cat">
              <?php $args = array(
                  'number'     => '',
                  'orderby'    => 'title',
                  'order'      => 'ASC',
                  'hide_empty' => '',
                  'include'    => ''
              );
              $product_categories = get_terms( 'product_cat', $args );
              $count = count($product_categories);
                if ( $count > 0 ){
                  foreach ( $product_categories as $product_category ) {
                  echo '<h4><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a></h4>';
                  $args = array(
                    'posts_per_page' => -1,
                    'tax_query' => array(
                      'relation' => 'AND',
                      array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $product_category->slug
                      )
                    ),
                    'post_type' => 'product',
                    'orderby' => 'title,'
                  );
                }
              }?>
            </div>
          <?php }?>
        </div>
        <div class="col-lg-9 col-md-8">
          <div id="top-slider">
            <?php $fashion_estore_slide_pages = array();
              for ( $count = 1; $count <= 3; $count++ ) {
                $mod = intval( get_theme_mod( 'fashion_estore_top_slider_page' . $count ));
                if ( 'page-none-selected' != $mod ) {
                  $fashion_estore_slide_pages[] = $mod;
                }
              }
              if( !empty($fashion_estore_slide_pages) ) :
                $args = array(
                  'post_type' => 'page',
                  'post__in' => $fashion_estore_slide_pages,
                  'orderby' => 'post__in'
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  $i = 1;
            ?>
            <div class="owl-carousel" role="listbox">
              <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="slider-box">
                  <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
                  <div class="slider-inner-box">
                    <h2><?php the_title(); ?></h2>
                    <div class="slide-btn"><a href="<?php the_permalink(); ?>"><?php esc_html_e('SHOP NOW','fashion-ecommerce-zone'); ?></a></div>
                  </div>
                </div>
              <?php $i++; endwhile;
              wp_reset_postdata();?>
            </div>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php endif;
            endif;?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="shop_services" class="py-4">
    <div class="container">
      <div class="row">
        <?php for ($i=1; $i <= 4; $i++) { ?>
          <div class="col-lg-3 col-md-6 col-sm-6 align-self-center">
            <div class="services-box mb-3">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 align-self-center">
                  <?php if( get_theme_mod('fashion_ecommerce_zone_shop_services_icon'.$i) != '' ){ ?>
                    <i class="<?php echo esc_html(get_theme_mod('fashion_ecommerce_zone_shop_services_icon'.$i)); ?>"></i>
                  <?php }?>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 align-self-center">
                  <?php if( get_theme_mod('fashion_ecommerce_zone_shop_services_title'.$i) != '' ){ ?>
                    <h4><?php echo esc_html(get_theme_mod('fashion_ecommerce_zone_shop_services_title'.$i)); ?></h4>
                  <?php }?>
                  <?php if( get_theme_mod('fashion_ecommerce_zone_shop_services_text'.$i) != '' ){ ?>
                    <p class="mb-0"><?php echo esc_html(get_theme_mod('fashion_ecommerce_zone_shop_services_text'.$i)); ?></p>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <section id="shop_category" class="py-4">
    <div class="container">
      <div class="row">
        <?php for ($i=1; $i <= 2; $i++) { ?>
          <div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
            <div class="category-box mb-3">
              <?php if( get_theme_mod('fashion_ecommerce_zone_shop_category_image'.$i) != '' ){ ?>
                <img src="<?php echo esc_url(get_theme_mod('fashion_ecommerce_zone_shop_category_image'.$i)); ?>">
              <?php }?>
              <div class="<?php echo('category-inner-box').$i ?> category-inner-box">
                <?php if( get_theme_mod('fashion_ecommerce_zone_shop_category_title'.$i) != '' ){ ?>
                  <h4><?php echo esc_html(get_theme_mod('fashion_ecommerce_zone_shop_category_title'.$i)); ?></h4>
                <?php }?>
                <div class="slide-btn">
                  <?php if( get_theme_mod('fashion_ecommerce_zone_shop_category_url'.$i) != '' || get_theme_mod('fashion_ecommerce_zone_shop_category_text'.$i) != '' ){ ?>
                    <a href="<?php echo esc_url(get_theme_mod('fashion_ecommerce_zone_shop_category_url'.$i)); ?>" class="mb-0"><?php echo esc_html(get_theme_mod('fashion_ecommerce_zone_shop_category_text'.$i)); ?></a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>


  <section id="content-section" class="container">
    <?php
      if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
          the_content();
        endwhile; 
      endif; 
    ?>
  </section>
</main>

<?php get_footer(); ?>