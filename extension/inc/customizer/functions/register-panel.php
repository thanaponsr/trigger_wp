<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */

use WPTRT\Customize\Section\Button;

if(!class_exists('Extension_Plus_Features')){

	add_action( 'customize_register', function( $manager ) {

		$manager->register_section_type( Button::class );

		$manager->add_section(
			new Button( $manager, 'extension_plus', [
				'priority'    => 1,
				'button_text' => __( 'Upgrade To Plus', 'extension' ),
				'button_url'  => 'https://themefreesia.com/plugins/extension-plus/'
			] )
		);

	} );


// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'extension-customize-section-button',
		get_theme_file_uri( 'inc/upgrade-plus/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'extension-customize-section-button',
		get_theme_file_uri( 'inc/upgrade-plus/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

}

	/******************** EXTENSION CUSTOMIZE REGISTER *********************************************/
	add_action( 'customize_register', 'extension_customize_register_wordpress_default' );
	function extension_customize_register_wordpress_default( $wp_customize ) {
		$wp_customize->add_panel( 'extension_wordpress_default_panel', array(
			'priority' => 5,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'WordPress Settings', 'extension' ),
		) );
	}

	add_action( 'customize_register', 'extension_customize_register_options');
	function extension_customize_register_options( $wp_customize ) {
		$wp_customize->add_panel( 'extension_options_panel', array(
			'priority' => 6,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Theme Options', 'extension' ),
		) );
	}

	add_action( 'customize_register', 'extension_customize_register_colors' );
	function extension_customize_register_colors( $wp_customize ) {
		$wp_customize->add_panel( 'colors', array(
			'priority' => 9,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Colors Section', 'extension' ),
		) );
	}
