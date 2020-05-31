<?php
/**
 * The header used by template-blank-canvas.php.
 *
 * @package Azuma
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'azuma' ); ?></a>
<?php
	if ( get_theme_mod( 'sticky_footer' ) ) {
		$page_class = ' class="sticky-footer"';
	} else {
		$page_class = '';
	}

	if ( get_theme_mod( 'header_search_off' ) ) {
		$masthead_class_search = '';
	} else {
		$masthead_class_search = ' has-search';
	}

	if ( class_exists( 'WooCommerce' ) ) {
		$masthead_class_wc = ' has-wc';
	} else {
		$masthead_class_wc = '';
	}
?>
<div id="page"<?php echo $page_class; ?>>

	<header id="masthead" class="site-header not-full<?php echo $masthead_class_search.$masthead_class_wc; ?>">

		<div class="container">
		<?php azuma_header_content(); ?>
		<?php azuma_header_menu(); ?>
		<?php azuma_header_content_extra(); ?>
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content clearfix">
		<div class="container clearfix">
