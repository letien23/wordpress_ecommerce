<?php
/**
 * Part template
 *
 * @package     productive-ecommerce
 */

?>
<?php if ( ( is_home() && productive_ecommerce_show_homepage_blog_excerpts() ) || ! is_home() ) { ?>
<div class="homepage-block-container">
    <?php $blog_title = productive_ecommerce_homepage_blog_heading(); ?>
    <?php if ( is_home() && !empty($blog_title) ) { ?>
        <?php
            $large_header_class = '';
            if ( productive_ecommerce_homepage_blog_heading_style() ) {
                $large_header_class = 'large-blog-header';
            }
        ?>
        <h2 class="<?php echo $large_header_class; ?> "><?php echo $blog_title; ?></h2>
    <?php } ?>
        <?php
            $productive_ecommerce_get_items_per_row_to_display = productive_ecommerce_get_items_per_row_to_display();
        ?>
        <div class="productive_ecommerce_section columns-<?php echo esc_attr( $productive_ecommerce_get_items_per_row_to_display ); ?>">
                <div class="products-grid products columns-<?php echo esc_attr( $productive_ecommerce_get_items_per_row_to_display ); ?>">
                        <?php $counter = 0; ?>
                                <?php while ( have_posts() && ( ( is_home() && $counter < $productive_ecommerce_get_items_per_row_to_display ) || ! is_home() ) ) : ?>

                                <?php the_post(); ?>

                                <div class="product">
                <div class="the_search_item">

                          <div class="the_search_thumbnail">
                                <a href="<?php echo esc_url( get_permalink() ); ?>"> 
                                        <?php
                                        if ( has_post_thumbnail() ) {
                                                the_post_thumbnail( 'full' );
                                        } else {
                                                do_action( 'display_placeholder_image' );
                                        }
                                        ?>
                                </a>
                        </div>

                        <?php
                        $post_format = get_post_format();
                        if ( 'status' != $post_format && 'aside' != $post_format ) {
                                ?>
                                        <div class="the_search_title">
                                                <?php
                                                echo '<h3><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h3>';
                                                ?>
                                        </div>
                                <?php
                        }
                        ?>

                        <div class="the_search_excerpt">
                                <?php
                                        echo esc_html( wp_trim_words( get_the_excerpt(), 16 ) );
                                ?>
                        </div>
                </div>
            </div>

                                <?php $counter++; ?>
                                <?php endwhile; ?>
                        <div class="clear_min"></div>
                </div>
                <div class="clear_min"></div>
        </div> 
</div>
<?php 
}