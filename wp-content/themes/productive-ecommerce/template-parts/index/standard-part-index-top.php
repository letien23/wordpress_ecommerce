<?php
/**
 * Part template
 *
 * @package productive-ecommerce
 */
?>

<?php
$post_thumbnail_id = productive_ecommerce_post_archive_banner_image();
$thumbnail_image = productive_ecommerce_get_attachment_by_thumbnail_id( $post_thumbnail_id, 'full', PRODUCTIVE_ECOMMERCE_HOMEPAGE_USP_IMAGE_REMOTE );
?>

<div class="productive_ecommerce_hero_container archive"  style="background-image: url(<?php echo esc_url( $thumbnail_image ); ?>)">
	<div class="productive_ecommerce_hero_container_content">
	
	<div class="productive_ecommerce_hero_container_content_text">
            <h1><?php echo wp_kses_post( get_the_archive_title() ); ?></h1>
	</div>
		
	</div>
</div>