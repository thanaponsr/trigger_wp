<?php
/**
 * This template to displays woocommerce page
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */

get_header();

$extension_settings = extension_get_theme_options();

if( $post ) {
	$extension_layout = get_post_meta( get_queried_object_id(), 'extension_sidebarlayout', true );
}
if( empty( $extension_layout ) || is_archive() || is_search() || is_home() ) {
	$extension_layout = 'default';
} ?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php woocommerce_content(); ?>
		</main><!-- end #main -->
	</div> <!-- #primary -->
<?php 

if( 'default' == $extension_layout ) { //Settings from customizer
	if((is_active_sidebar('extension_woocommerce_sidebar')) && ($extension_settings['extension_sidebar_layout_options'] != 'fullwidth')){ ?>
<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Secondary', 'extension' ); ?>">
	<?php }
} 
	if( 'default' == $extension_layout ) { //Settings from customizer
		if((is_active_sidebar('extension_woocommerce_sidebar')) && ($extension_settings['extension_sidebar_layout_options'] != 'fullwidth')): ?>
		<?php dynamic_sidebar( 'extension_woocommerce_sidebar' ); ?>
</aside><!-- end #secondary -->
<?php endif;
	} ?>
</div><!-- end .wrap -->

<?php
get_footer();