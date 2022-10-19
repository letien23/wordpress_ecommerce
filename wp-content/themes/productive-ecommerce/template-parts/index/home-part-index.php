<?php
/**
 * Part template
 *
 * @package productive-ecommerce
 */

$attachment_id = productive_ecommerce_homepage_usp_image();
$productive_ecommerce_homepage_usp_image = productive_ecommerce_get_attachment_by_thumbnail_id($attachment_id);

$parallax = 'parallax';
$productive_ecommerce_is_homepage_usp_scroll = productive_ecommerce_is_homepage_usp_scroll();
if ( $productive_ecommerce_is_homepage_usp_scroll ) {
    $parallax = '';
}
?>

 <?php // start customiser ?>
 <div class="productive_ecommerce_hero_container home <?php echo esc_attr( $parallax ); ?>"  style="background-image: url(<?php echo esc_url( $productive_ecommerce_homepage_usp_image ); ?>)">
        <div class="productive_ecommerce_hero_container_content_bg_overlay"></div>
         <div class="productive_ecommerce_hero_container_content">
                <?php do_action( 'display_productive_ecommerce_homepage_usp_textarea_1'); ?>
                <div class="clear_min"></div>
                <?php do_action( 'display_productive_ecommerce_homepage_usp_textarea_2'); ?>
                <div class="cta">
                    <?php do_action( 'display_productive_ecommerce_homepage_cta_1_title', 'cta1'); ?>
                    <?php do_action( 'display_productive_ecommerce_homepage_cta_2_title', 'cta2'); ?>
                </div>
        </div>
</div>
<?php // end customiser ?>

<div class="site-container">
	
	<?php
      // homepage top sidebar widget.
	  do_action( 'display_homepage_content_widget_top', 'homepage_content_widget_top' );
	?>

	<?php // start blog loop on home page 
            get_template_part( 'template-parts/index/index-part-loop' ); 
        ?>
	
	<?php
	   // homepage bottom sidebar widget.
	   do_action( 'display_homepage_content_widget_bottom', 'homepage_content_widget_bottom' );
	?> 
</div>