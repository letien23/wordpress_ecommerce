<?php
/**
 * Part template
 *
 * @package productive-ecommerce
 */

?>

<?php
// Remove the Archive Title Prefix such as 'category:' from archives
if ( is_archive() ) {
    add_filter("get_the_archive_title_prefix", "__return_empty_string");
}
?>
<main id="site-content" class="site-content">
	
	<?php get_template_part( 'template-parts/index/standard-part-index-top', 'top' ); ?>
	
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
                            <?php get_template_part( 'template-parts/index/index-part-loop' ); ?>
                            <?php productive_ecommerce_the_posts_navigation(  ); ?>
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