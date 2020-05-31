<?php
/**
 * Template Name: Contact Template
 *
 * Displays the contact page template.
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */
get_header();
global $extension_settings;
$extension_settings = wp_parse_args(  get_option( 'extension_theme_options', array() ),  extension_get_option_defaults_values() );
if( $post ) {

	$extension_layout = get_post_meta( get_queried_object_id(), 'extension_sidebarlayout', true );

}
if( empty( $extension_layout ) || is_archive() || is_search() || is_home() ) {

	$extension_layout = 'default';

}

$attachment_id = get_post_thumbnail_id();
$image_attributes = wp_get_attachment_image_src($attachment_id,'full'); ?>
<div id="content" class="site-content">
	<div <?php post_class('contact-content'); if(has_post_thumbnail()){ ?> style="background-image:url('<?php echo esc_url($image_attributes[0]); ?>');" <?php } ?>>
		<div class="wrap">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<article>
						<header class="page-header">
							<h1 class="page-title"><?php the_title();?></h1>
							<!-- .page-title -->
							<?php extension_breadcrumb(); ?><!-- .breadcrumb -->
						</header><!-- .page-header -->
						<div class="page-content clearfix">
							<?php
							if( have_posts() ) {

								while( have_posts() ) {

									the_post();

									the_content();

									comments_template();

								}
							} else { ?>

								<h2 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'extension' ); ?> </h2>

							<?php } ?>
						</div> <!-- end #page-content -->
					</article>
				</main> <!-- end #main -->
			</div> <!-- #primary -->

			<?php 
				if( 'default' == $extension_layout ) { //Settings from customizer
					if((is_active_sidebar('extension_contact_page_sidebar') ) && ($extension_settings['extension_sidebar_layout_options'] != 'fullwidth')){ ?>

				<div id="secondary" class="widget-area">
				<?php }

				}else{ // for page/ post

						if((is_active_sidebar('extension_contact_page_sidebar') ) && ($extension_layout != 'full-width')){ ?>

				<div id="secondary" class="widget-area">
					<?php }
					}
					if ( is_active_sidebar( 'extension_contact_page_sidebar' ) ) :
						dynamic_sidebar( 'extension_contact_page_sidebar' );
					endif;?>
					<?php 
					if( 'default' == $extension_layout ) { //Settings from customizer
						if((is_active_sidebar('extension_contact_page_sidebar')) && ($extension_settings['extension_sidebar_layout_options'] != 'fullwidth')): ?>
				</div><!-- end #secondary -->
				<?php endif;
					}else{ // for page/post
						if((is_active_sidebar('extension_contact_page_sidebar') ) && ($extension_layout != 'full-width')){
							echo '</div><!-- end #secondary -->';
						} 
					}
			?>
		</div><!-- end .wrap -->
		<?php if ( is_active_sidebar( 'extension_form_for_contact_page' ) ) : ?>

			<div class="googlemaps_widget">
				<div class="maps-container">
					<?php dynamic_sidebar( 'extension_form_for_contact_page' ); ?>
				</div>
			</div><!-- end .googlemaps_widget -->

		<?php endif;  ?>
	</div><!-- end .contact-content -->
</div>
<?php get_footer();