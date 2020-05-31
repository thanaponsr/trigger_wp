<?php
/**
 * The template for displaying the homepage
 *
 * @package Azuma
 */

if ( 'page' == get_option( 'show_on_front' ) ) {

	$page_full_width = ' full-width';
	$azuma_sidebar = 'none';
	$azuma_footer = '';

	if ( is_page_template( 'template-blank-canvas.php' ) ) {
		get_header( 'blank-canvas' );
		$azuma_footer = 'blank-canvas';
	} elseif ( is_page_template( 'template-landing-page.php' ) ) {
		get_header( 'landing-page' );
		$azuma_footer = 'landing-page';
	} elseif ( is_page_template( 'template-no-sidebar.php' ) ) {
		get_header();
	} elseif ( is_page_template( 'template-transparent-header.php' ) ) {
		get_header( 'transparent' );
	} else {
		get_header();
		if ( ! is_active_sidebar( 'azuma-sidebar-homepage' ) ) {
			$page_full_width = ' full-width';
		} else {
			$page_full_width = '';
		}
		$azuma_sidebar = 'homepage';
	}
?>

	<div id="primary" class="content-area<?php echo $page_full_width;?>">
		<main id="main" class="site-main" role="main">

		<?php
		if ( get_theme_mod( 'woo_home_enable' ) ) {
			if ( class_exists( 'WooCommerce' ) ) {
				azuma_home_woo_section();
			} else {
				azuma_home_nonwoo_section();
			}
		} else {
			azuma_homepage_content();
		}
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( $azuma_sidebar ); ?>

<?php get_footer( $azuma_footer ); ?>

<?php
} else {

	get_header();
	get_template_part( 'home' );

}
