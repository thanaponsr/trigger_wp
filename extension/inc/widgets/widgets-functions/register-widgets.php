<?php
/**
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */
/**************** EXTENSION REGISTER WIDGETS ***************************************/
add_action('widgets_init', 'extension_widgets_init');
function extension_widgets_init() {

	register_sidebar(array(
			'name' => __('Main Sidebar', 'extension'),
			'id' => 'extension_main_sidebar',
			'description' => __('Shows widgets at Main Sidebar.', 'extension'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('Top Header Info', 'extension'),
			'id' => 'extension_header_info',
			'description' => __('Shows widgets on all page.', 'extension'),
			'before_widget' => '<aside id="%1$s" class="widget widget_contact">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Side Menu', 'extension'),
			'id' => 'extension_side_menu',
			'description' => __('Shows widgets on all page.', 'extension'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Slider Section', 'extension'),
			'id' => 'slider_section',
			'description' => __('Use any Slider Plugins and drag that slider widgets to this Slider Section', 'extension'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Contact Page Sidebar', 'extension'),
			'id' => 'extension_contact_page_sidebar',
			'description' => __('Shows widgets on Contact Page Template.', 'extension'),
			'before_widget' => '<aside id="%1$s" class="widget widget_contact">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Iframe Code For Google Maps', 'extension'),
			'id' => 'extension_form_for_contact_page',
			'description' => __('Add Iframe Code using text widgets', 'extension'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('WooCommerce Sidebar', 'extension'),
			'id' => 'extension_woocommerce_sidebar',
			'description' => __('Add WooCommerce Widgets Only', 'extension'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_widget( 'Extension_popular_Widgets' );
}