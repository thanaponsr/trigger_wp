<?php
/**
 * The template for displaying navigation.
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */
$extension_settings = extension_get_theme_options();
	if ( function_exists('wp_pagenavi' ) ) :

		wp_pagenavi();

	else:

	// Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text'          => '<i class="fas fa-angle-double-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'extension' ).'</span>',
			'next_text'          => '<i class="fas fa-angle-double-right"></i><span class="screen-reader-text">' . __( 'Next page', 'extension' ).'</span>',
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'extension' ) . ' </span>',
		) );

	endif;