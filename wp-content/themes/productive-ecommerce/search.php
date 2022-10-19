<?php
/**
 * Search page.
 *
 * @package productive-ecommerce
 */

?>

<?php get_header(); ?>

<main id="site-content" class="site-content">
	<div class="site-container">
		<div class="flex-content-container">
		
		<?php
		$productive_ecommerce_template_layout_options = productive_ecommerce_template_layout_options();
		$main_css_class = 'flex-content-100';
		$side_css_class = 'flex-content-20';

		if ( 'two_columns_left' == $productive_ecommerce_template_layout_options ) {

			$main_css_class = 'flex-content-70';
			$side_css_class = 'flex-content-30';
			$productive_ecommerce_template_layout_options = 'two_columns_left';

		} else if ( 'two_columns_right' == $productive_ecommerce_template_layout_options ) {

			$main_css_class = 'flex-content-70';
			$side_css_class = 'flex-content-30';
			$productive_ecommerce_template_layout_options = 'two_columns_right';

		} else if ( 'three_columns' == $productive_ecommerce_template_layout_options ) {

			$main_css_class = 'flex-content-60';
			$side_css_class = 'flex-content-20';
			$productive_ecommerce_template_layout_options = 'three_columns';

		}

		?>
			
			<?php
			// left sidebar.
			if ( 'two_columns_left' == $productive_ecommerce_template_layout_options || 'three_columns' == $productive_ecommerce_template_layout_options ) {
				do_action( 'display_sidebar_left', $side_css_class );
			}
			?>
			
			<!-- main content -->
			<div class="<?php echo esc_attr( $main_css_class ); ?>">
				
				<h1 class="wc-page-title">
					<?php echo esc_html__( 'Search result for: ', 'productive-ecommerce' ) . esc_html( get_search_query() ); ?>
				</h1>

				<?php if ( trim( get_search_query() ) != '' && $wp_query->found_posts > 0 ) { ?>
					
					<div class="search-result-number">
						<?php
							$found_posts = esc_attr( $wp_query->found_posts );
						if ( $found_posts > 1 ) {
							echo esc_attr( $found_posts ) . esc_html__( ' matches found for your search...', 'productive-ecommerce' );
						} else {
							echo esc_attr( $found_posts ) . esc_html__( ' match found for your search...', 'productive-ecommerce' );
						}
						?>
					</div>
					
					<?php get_template_part( 'template-parts/page-part-search' ); ?>					
								
                                        <?php productive_ecommerce_the_posts_navigation(  ); ?>
                                        
				<?php } else { ?>
                                        
					<?php // no result. ?>
				
					<div class="search-result-number">
						<?php get_template_part( 'template-parts/page-part-none' ); ?>
					</div>
				
				<?php } ?>
				
			</div>
			
			<?php
			// right sidebar.
			if ( 'two_columns_right' == $productive_ecommerce_template_layout_options || 'three_columns' == $productive_ecommerce_template_layout_options ) {
				do_action( 'display_sidebar_right', $side_css_class );
			}
			?>
			
		</div>
	</div>
</main>
	
	
<?php
get_footer();