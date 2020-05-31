<?php
/**
 * The sidebar containing the main Sidebar area.
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */
$extension_settings = extension_get_theme_options();

if( $post ) {

	$extension_layout = get_post_meta( get_queried_object_id(), 'extension_sidebarlayout', true );

}

if( empty( $extension_layout ) || is_archive() || is_search() || is_home() ) {

	$extension_layout = 'default';

}

if( 'default' == $extension_layout ) { //Settings from customizer

	if((is_active_sidebar('extension_main_sidebar')) && ($extension_settings['extension_sidebar_layout_options'] != 'fullwidth')){ ?>

		<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Secondary', 'extension' ); ?>">
<?php }

}else{ // for page/ post
		if((is_active_sidebar('extension_main_sidebar')) && ($extension_layout != 'full-width')){ ?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Secondary', 'extension' ); ?>">

  <?php }
	}?>
  <?php 
	if( 'default' == $extension_layout ) { //Settings from customizer

		if((is_active_sidebar('extension_main_sidebar')) && ($extension_settings['extension_sidebar_layout_options'] != 'fullwidth')): ?>

  <?php dynamic_sidebar( 'extension_main_sidebar' ); ?>

</aside><!-- end #secondary -->
<?php endif;
	}else{ // for page/post

		if((is_active_sidebar('extension_main_sidebar')) && ($extension_layout != 'full-width')){

			dynamic_sidebar( 'extension_main_sidebar' );
			
			echo '</aside><!-- end #secondary -->';
		}
	}