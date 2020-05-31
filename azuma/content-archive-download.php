<?php
/**
 * download archive template (EDD)
 *
 * @package Azuma
 */
?>

<?php $schema = edd_add_schema_microdata() ? 'itemscope itemtype="http://schema.org/Product" ' : ''; ?>

<div <?php echo $schema; ?>class="<?php echo esc_attr( apply_filters( 'edd_download_class', 'edd_download', get_the_ID() ) ); ?>" id="edd_download_<?php the_ID(); ?>">

	<div class="<?php echo esc_attr( apply_filters( 'edd_download_inner_class', 'edd_download_inner', get_the_ID() ) ); ?>">

		<?php
			do_action( 'edd_download_before' );

			azuma_edd_thumbnail( get_the_ID() );
			do_action( 'edd_download_after_thumbnail' );

			edd_get_template_part( 'shortcode', 'content-title' );

			do_action( 'edd_download_after_title' );

			do_action( 'edd_download_after_content' );

			azuma_edd_purchase_form( get_the_ID() );

			do_action( 'edd_download_after' );
		?>

	</div>

</div>
