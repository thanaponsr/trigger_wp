<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */
$extension_settings = extension_get_theme_options();

$wp_customize->add_section('extension_layout_options', array(
	'title' => __('Layout Options', 'extension'),
	'priority' => 102,
	'panel' => 'extension_options_panel'
));

$wp_customize->add_setting('extension_theme_options[extension_header_design]', array(
	'default' => $extension_settings['extension_header_design'],
	'sanitize_callback' => 'extension_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control('extension_theme_options[extension_header_design]', array(
	'priority' =>30,
	'label' => __('Header Design Layout', 'extension'),
	'section' => 'extension_layout_options',
	'type' => 'select',
	'checked' => 'checked',
	'choices' => array(
		'1' => __('Design 1 (Vivid Pink) ','extension'),
		'2' => __('Design 2 Homepage Fullwidth (Red)','extension'),
		'3' => __('Design 3 (Vivid Violet)','extension'),
		'4' => __('Design 4(Green)','extension'),
		'5' => __('Design 5 (Yellow)','extension'),
	),
));

$wp_customize->add_setting( 'extension_theme_options[extension_entry_meta_single]', array(
	'default' => $extension_settings['extension_entry_meta_single'],
	'sanitize_callback' => 'extension_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_entry_meta_single]', array(
	'priority'=>40,
	'label' => __('Disable Entry Meta from Single Page', 'extension'),
	'section' => 'extension_layout_options',
	'type' => 'select',
	'choices' => array(
		'show' => __('Display Entry Format','extension'),
		'hide' => __('Hide Entry Format','extension'),
	),
));

$wp_customize->add_setting( 'extension_theme_options[extension_entry_meta_blog]', array(
	'default' => $extension_settings['extension_entry_meta_blog'],
	'sanitize_callback' => 'extension_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_entry_meta_blog]', array(
	'priority'=>50,
	'label' => __('Disable Entry Meta from Blog', 'extension'),
	'section' => 'extension_layout_options',
	'type'	=> 'select',
	'choices' => array(
		'show-meta' => __('Display Entry Meta','extension'),
		'hide-meta' => __('Hide Entry Meta','extension'),
	),
));

$wp_customize->add_setting( 'extension_theme_options[extension_post_category]', array(
	'default' => $extension_settings['extension_post_category'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_post_category]', array(
	'priority'=>60,
	'label' => __('Disable Category', 'extension'),
	'section' => 'extension_layout_options',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'extension_theme_options[extension_post_author]', array(
	'default' => $extension_settings['extension_post_author'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_post_author]', array(
	'priority'=>70,
	'label' => __('Disable Author', 'extension'),
	'section' => 'extension_layout_options',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'extension_theme_options[extension_post_date]', array(
	'default' => $extension_settings['extension_post_date'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_post_date]', array(
	'priority'=>80,
	'label' => __('Disable Date', 'extension'),
	'section' => 'extension_layout_options',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'extension_theme_options[extension_post_comments]', array(
	'default' => $extension_settings['extension_post_comments'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_post_comments]', array(
	'priority'=>90,
	'label' => __('Disable Comments', 'extension'),
	'section' => 'extension_layout_options',
	'type' => 'checkbox',
));

$wp_customize->add_setting('extension_theme_options[extension_blog_content_layout]', array(
   'default'        => $extension_settings['extension_blog_content_layout'],
   'sanitize_callback' => 'extension_sanitize_select',
   'type'                  => 'option',
   'capability'            => 'manage_options'
));
$wp_customize->add_control('extension_theme_options[extension_blog_content_layout]', array(
   'priority'  =>100,
   'label'      => __('Blog Content Display', 'extension'),
   'section'    => 'extension_layout_options',
   'type'       => 'select',
   'checked'   => 'checked',
   'choices'    => array(
       'fullcontent_display' => __('Blog Full Content Display','extension'),
       'excerptblog_display' => __(' Excerpt  Display','extension'),
   ),
));

$wp_customize->add_setting('extension_theme_options[extension_design_layout]', array(
	'default'        => $extension_settings['extension_design_layout'],
	'sanitize_callback' => 'extension_sanitize_select',
	'type'                  => 'option',
));
$wp_customize->add_control('extension_theme_options[extension_design_layout]', array(
	'priority'  =>110,
	'label'      => __('Design Layout', 'extension'),
	'section'    => 'extension_layout_options',
	'type'       => 'select',
	'checked'   => 'checked',
	'choices'    => array(
		'full-width-layout' => __('Full Width Layout','extension'),
		'boxed-layout' => __('Boxed Layout','extension'),
		'small-boxed-layout' => __('Small Boxed Layout','extension'),
	),
));