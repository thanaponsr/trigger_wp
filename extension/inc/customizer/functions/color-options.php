<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */
/********************* Color Option **********************************************/

	$wp_customize->add_section( 'colors', array(
		'title' 						=> __('Background Color Options','extension'),
		'priority'					=> 100,
		'panel'					=>'colors'
	));

	$wp_customize->add_setting( 'extension_theme_options[extension_disable_default_color]', array(
	'default' => $extension_settings['extension_disable_default_color'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_disable_default_color]', array(
	'priority'=>1,
	'label' => __('Disable Theme Default Color', 'extension'),
	'section' => 'colors',
	'type' => 'checkbox',
));