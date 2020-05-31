<?php
if(!function_exists('extension_get_option_defaults_values')):
	/******************** EXTENSION DEFAULT OPTION VALUES ******************************************/
	function extension_get_option_defaults_values() {
		global $extension_default_values;
		$extension_default_values = array(
			'extension_header_design'	=> '1',
			'extension_design_layout' => 'full-width-layout',
			'extension_sidebar_layout_options' => 'right',
			'extension_search_custom_header' => 0,
			'extension_side_menu'	=> 0,
			'extension_img-upload-footer-image' => '',
			'extension_header_display'=> 'header_text',
			'extension_scroll'	=> 0,
			'extension_tag_text' => esc_html__('View More','extension'),
			'extension_excerpt_length'	=> '25',
			'extension_reset_all' => 0,
			'extension_stick_menu'	=>0,
			'extension_logo_high_resolution'	=> 0,
			'extension_blog_post_image' => 'on',
			'extension_search_text' => esc_html__('Search &hellip;','extension'),
			'extension_entry_meta_single' => 'show',
			'extension_entry_meta_blog' => 'show-meta',
			'extension_blog_content_layout'	=> 'fullcontent_display',
			'extension_post_category' => 0,
			'extension_post_author' => 0,
			'extension_post_date' => 0,
			'extension_post_comments' => 0,
			'extension_footer_column_section'	=>'4',
			'extension_disable_main_menu' => 0,
			'extension_display_page_single_featured_image'=>0,
			'extension_header_image_title'=>'',
			'extension_header_sub_title'=>'',
			'extension_header_image_link'=>'',
			'extension_header_image_button'=> esc_html__('Get Started','extension'),
			'extension_enable_header_image'=>'frontpage',
			'extension_header_image_layout'=>'default',
			'extension_header_image_bg_text_color'=>'default',
			'extension_button_gradient' => 0,
			'extension_disable_default_color' =>0,

			/*Social Icons */
			'extension_top_social_icons' =>0,
			'extension_side_menu_social_icons' =>0,
			'extension_buttom_social_icons'	=>0,
			);
		return apply_filters( 'extension_get_option_defaults_values', $extension_default_values );
	}
endif;