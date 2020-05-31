<?php
/**
 * The template for displaying 404 pages
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */
get_header(); ?>
<div id="content" class="site-content">
	<div class="wrap">
		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				<?php if ( is_active_sidebar( 'extension_404_page' ) ) :

					dynamic_sidebar( 'extension_404_page' );

				else:?>

				<section class="error-404 not-found">
					<header class="page-header">
						<h2 class="page-title"> <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'extension' ); ?> </h2>
					</header> <!-- .page-header -->
					<div class="page-content">
						<p> <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'extension' ); ?> </p>
							<?php get_search_form(); ?>
					</div> <!-- .page-content -->
				</section> <!-- .error-404 -->

			<?php endif; ?>
		</main><!-- end #main -->
		</div> <!-- #primary -->
	<?php get_sidebar(); ?>
	</div><!-- end .wrap -->
</div><!-- end #content -->
<?php get_footer();