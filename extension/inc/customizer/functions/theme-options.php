<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */
$extension_settings = extension_get_theme_options();
/********************** Extension WordPreess default Panel ***********************************/
$wp_customize->add_section('header_image', array(
	'title' => __('Header Media', 'extension'),
	'priority' => 20,
	'panel' => 'extension_wordpress_default_panel'
));
$wp_customize->add_section('colors', array(
	'title' => __('Colors', 'extension'),
	'priority' => 30,
	'panel' => 'extension_wordpress_default_panel'
));
$wp_customize->add_section('background_image', array(
	'title' => __('Background Image', 'extension'),
	'priority' => 40,
	'panel' => 'extension_wordpress_default_panel'
));
$wp_customize->add_section('nav', array(
	'title' => __('Navigation', 'extension'),
	'priority' => 50,
	'panel' => 'extension_wordpress_default_panel'
));
$wp_customize->add_section('static_front_page', array(
	'title' => __('Static Front Page', 'extension'),
	'priority' => 60,
	'panel' => 'extension_wordpress_default_panel'
));
$wp_customize->add_section('title_tagline', array(
	'title' => __('Site Title & Logo Options', 'extension'),
	'priority' => 10,
	'panel' => 'extension_wordpress_default_panel'
));

$wp_customize->add_section('extension_custom_header', array(
	'title' => __('Options', 'extension'),
	'priority' => 503,
	'panel' => 'extension_options_panel'
));

$wp_customize->add_section('extension_footer_image', array(
	'title' => __('Footer Background Image', 'extension'),
	'priority' => 510,
	'panel' => 'extension_options_panel'
));

/********************  EXTENSION THEME OPTIONS ******************************************/

$wp_customize->add_setting('extension_theme_options[extension_header_display]', array(
	'capability' => 'edit_theme_options',
	'default' => $extension_settings['extension_header_display'],
	'sanitize_callback' => 'extension_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control('extension_theme_options[extension_header_display]', array(
	'label' => __('Site Logo/ Text Options', 'extension'),
	'priority' => 105,
	'section' => 'title_tagline',
	'type' => 'select',
	'checked' => 'checked',
		'choices' => array(
		'header_text' => __('Display Site Title Only','extension'),
		'header_logo' => __('Display Site Logo Only','extension'),
		'show_both' => __('Show Both','extension'),
		'disable_both' => __('Disable Both','extension'),
	),
));

$wp_customize->add_setting( 'extension_theme_options[extension_logo_high_resolution]', array(
	'default' => $extension_settings['extension_logo_high_resolution'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_logo_high_resolution]', array(
	'priority'=>110,
	'label' => __('Center Logo for high resolution screen(Use 2X size image)', 'extension'),
	'description' => __(' Works only on header design 4 & 5', 'extension'),
	'section' => 'title_tagline',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'extension_theme_options[extension_search_custom_header]', array(
	'default' => $extension_settings['extension_search_custom_header'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_search_custom_header]', array(
	'priority'=>20,
	'label' => __('Disable Search Form', 'extension'),
	'section' => 'extension_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'extension_theme_options[extension_side_menu]', array(
	'default' => $extension_settings['extension_side_menu'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_side_menu]', array(
	'priority'=>25,
	'label' => __('Disable Side Menu', 'extension'),
	'section' => 'extension_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'extension_theme_options[extension_stick_menu]', array(
	'default' => $extension_settings['extension_stick_menu'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_stick_menu]', array(
	'priority'=>30,
	'label' => __('Disable Stick Menu', 'extension'),
	'section' => 'extension_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'extension_theme_options[extension_scroll]', array(
	'default' => $extension_settings['extension_scroll'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_scroll]', array(
	'priority'=>40,
	'label' => __('Disable Goto Top', 'extension'),
	'section' => 'extension_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'extension_theme_options[extension_top_social_icons]', array(
	'default' => $extension_settings['extension_top_social_icons'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_top_social_icons]', array(
	'priority'=>50,
	'label' => __('Disable Header Social Icons', 'extension'),
	'section' => 'extension_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'extension_theme_options[extension_side_menu_social_icons]', array(
	'default' => $extension_settings['extension_side_menu_social_icons'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_side_menu_social_icons]', array(
	'priority'=>60,
	'label' => __('Disable Side Menu Social Icons', 'extension'),
	'section' => 'extension_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'extension_theme_options[extension_buttom_social_icons]', array(
	'default' => $extension_settings['extension_buttom_social_icons'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_buttom_social_icons]', array(
	'priority'=>70,
	'label' => __('Disable Bottom Social Icons', 'extension'),
	'section' => 'extension_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'extension_theme_options[extension_display_page_single_featured_image]', array(
	'default' => $extension_settings['extension_display_page_single_featured_image'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_display_page_single_featured_image]', array(
	'priority'=>100,
	'label' => __('Disable Page/Single Featured Image', 'extension'),
	'section' => 'extension_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'extension_theme_options[extension_disable_main_menu]', array(
	'default' => $extension_settings['extension_disable_main_menu'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_disable_main_menu]', array(
	'priority'=>120,
	'label' => __('Disable Main Menu', 'extension'),
	'section' => 'extension_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'extension_theme_options[extension_reset_all]', array(
	'default' => $extension_settings['extension_reset_all'],
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'extension_reset_alls',
	'transport' => 'postMessage',
));
$wp_customize->add_control( 'extension_theme_options[extension_reset_all]', array(
	'priority'=>150,
	'label' => __('Reset all default settings. (Refresh it to view the effect)', 'extension'),
	'section' => 'extension_custom_header',
	'type' => 'checkbox',
));

/********************** Footer Background Image ***********************************/
$wp_customize->add_setting( 'extension_theme_options[extension_img-upload-footer-image]',array(
	'default'	=> $extension_settings['extension_img-upload-footer-image'],
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'extension_theme_options[extension_img-upload-footer-image]', array(
	'label' => __('Footer Background Image','extension'),
	'description' => __('Image will be displayed on footer','extension'),
	'priority'	=> 50,
	'section' => 'extension_footer_image',
	)
));

/********************** Header Image ***********************************/

$wp_customize->add_setting('extension_theme_options[extension_enable_header_image]', array(
	'capability' => 'edit_theme_options',
	'default' => $extension_settings['extension_enable_header_image'],
	'sanitize_callback' => 'extension_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control('extension_theme_options[extension_enable_header_image]', array(
	'label' => __('Display Header Image/ Slider Sidebar Widget Section', 'extension'),
	'priority' => 40,
	'section' => 'header_image',
	'type' => 'select',
	'checked' => 'checked',
		'choices' => array(
		'frontpage' => __('Front Page','extension'),
		'enitresite' => __('Entire Site','extension'),
		'off' => __('Disable','extension'),
	),
));

$wp_customize->add_setting( 'extension_theme_options[extension_header_image_title]', array(
	'default'           => $extension_settings['extension_header_image_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'type'                  => 'option',
	'capability'            => 'manage_options'
	)
);
$wp_customize->add_control( 'extension_theme_options[extension_header_image_title]', array(
	'label' => __('Title','extension'),
	'section' => 'header_image',
	'type'     => 'text',
	'priority'	=> 50,
	)
);

$wp_customize->add_setting( 'extension_theme_options[extension_header_sub_title]', array(
	'default'           => $extension_settings['extension_header_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'type'                  => 'option',
	'capability'            => 'manage_options'
	)
);
$wp_customize->add_control( 'extension_theme_options[extension_header_sub_title]', array(
	'label' => __('Sub Title','extension'),
	'section' => 'header_image',
	'type'     => 'text',
	'priority'	=> 60,
	)
);

$wp_customize->add_setting( 'extension_theme_options[extension_header_image_button]', array(
	'default'           => $extension_settings['extension_header_image_button'],
	'sanitize_callback' => 'sanitize_text_field',
	'type'                  => 'option',
	'capability'            => 'manage_options'
	)
);
$wp_customize->add_control( 'extension_theme_options[extension_header_image_button]', array(
	'label' => __('Button Text','extension'),
	'section' => 'header_image',
	'type'     => 'text',
	'priority'	=> 70,
	)
);

$wp_customize->add_setting( 'extension_theme_options[extension_header_image_link]', array(
	'default'           => $extension_settings['extension_header_image_link'],
	'sanitize_callback' => 'esc_url_raw',
	'type'                  => 'option',
	'capability'            => 'manage_options'
	)
);
$wp_customize->add_control( 'extension_theme_options[extension_header_image_link]', array(
	'label' => __('Link','extension'),
	'section' => 'header_image',
	'type'     => 'text',
	'priority'	=> 80,
	)
);

$wp_customize->add_setting('extension_theme_options[extension_header_image_layout]', array(
	'capability' => 'edit_theme_options',
	'default' => $extension_settings['extension_header_image_layout'],
	'sanitize_callback' => 'extension_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control('extension_theme_options[extension_header_image_layout]', array(
	'label' => __('Display Header Image Layout', 'extension'),
	'priority' => 90,
	'section' => 'header_image',
	'type' => 'select',
	'checked' => 'checked',
		'choices' => array(
		'default' => __('Default/ Fullwidth','extension'),
		'header-image-small' => __(' Header Image Small','extension'),
	),
));

$wp_customize->add_setting('extension_theme_options[extension_header_image_bg_text_color]', array(
	'capability' => 'edit_theme_options',
	'default' => $extension_settings['extension_header_image_bg_text_color'],
	'sanitize_callback' => 'extension_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control('extension_theme_options[extension_header_image_bg_text_color]', array(
	'label' => __('Header Image With background Text color', 'extension'),
	'priority' => 100,
	'section' => 'header_image',
	'type' => 'select',
	'checked' => 'checked',
		'choices' => array(
		'default' => __('Off','extension'),
		'bg-text-color' => __('On','extension'),
	),
));

$wp_customize->add_setting( 'extension_theme_options[extension_button_gradient]', array(
	'default' => $extension_settings['extension_button_gradient'],
	'sanitize_callback' => 'extension_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'extension_theme_options[extension_button_gradient]', array(
	'priority'=>110,
	'label' => __('Disable Button Gradient', 'extension'),
	'section' => 'header_image',
	'type' => 'checkbox',
));