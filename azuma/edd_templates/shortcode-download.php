<?php
/**
 * A single download inside of the [downloads] shortcode.
 *
 * @package Azuma
 */

global $edd_download_shortcode_item_atts, $edd_download_shortcode_item_i;
?>

<?php $schema = edd_add_schema_microdata() ? 'itemscope itemtype="http://schema.org/Product" ' : ''; ?>

<div <?php echo $schema; ?>class="<?php echo esc_attr( apply_filters( 'edd_download_class', 'edd_download', get_the_ID(), $edd_download_shortcode_item_atts, $edd_download_shortcode_item_i ) ); ?>" id="edd_download_<?php the_ID(); ?>">

	<div class="<?php echo esc_attr( apply_filters( 'edd_download_inner_class', 'edd_download_inner', get_the_ID(), $edd_download_shortcode_item_atts, $edd_download_shortcode_item_i ) ); ?>">

		<?php
			do_action( 'edd_download_before' );

			if ( 'false' !== $edd_download_shortcode_item_atts['thumbnails'] ) :
				if ( 'yes' === $edd_download_shortcode_item_atts['excerpt'] && 'yes' !== $edd_download_shortcode_item_atts['full_content'] ) {
					edd_get_template_part( 'shortcode', 'content-image-excerpt' );
				} else {
					edd_get_template_part( 'shortcode', 'content-image' );
				}
				do_action( 'edd_download_after_thumbnail' );
			endif;

			edd_get_template_part( 'shortcode', 'content-title' );

			do_action( 'edd_download_after_title' );

			if ( 'yes' === $edd_download_shortcode_item_atts['full_content'] ) :
				edd_get_template_part( 'shortcode', 'content-full' );
				do_action( 'edd_download_after_content' );
			endif;

			if ( 'yes' === $edd_download_shortcode_item_atts['price'] ) :
				azuma_edd_purchase_form( get_the_ID(), 'price' );
			endif;

			if ( 'yes' === $edd_download_shortcode_item_atts['buy_button'] ) :
				azuma_edd_purchase_form( get_the_ID(), 'buy-button' );
			endif;

			do_action( 'edd_download_after' );
		?>

	</div>

</div>
