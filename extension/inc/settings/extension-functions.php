<?php
/**
 * Custom functions
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */
/********************* Set Default Value if not set ***********************************/
	if ( !get_theme_mod('extension_theme_options') ) {

		set_theme_mod( 'extension_theme_options', extension_get_option_defaults_values() );

	}

/******************************** EXCERPT LENGTH *********************************/
function extension_excerpt_length($extension_excerpt_length) {
	$extension_settings = extension_get_theme_options();
	if( is_admin() ){
		return absint($extension_excerpt_length);
	}

	$extension_excerpt_length = $extension_settings['extension_excerpt_length'];
	return absint($extension_excerpt_length);
}
add_filter('excerpt_length', 'extension_excerpt_length');

/********************* CONTINUE READING LINKS FOR EXCERPT *********************************/
function extension_continue_reading($more) {
	$extension_settings = extension_get_theme_options();
	$extension_tag_text = $extension_settings['extension_tag_text'];
	$link = sprintf(
			'<a href="%1$s" class="more-link">%2$s</a>',
			esc_url( get_permalink( get_the_ID() ) ),esc_attr($extension_tag_text),
			/* translators: %s: Name of current post */
			sprintf( __( '<span class="screen-reader-text"> "%s"</span>', 'extension' ), get_the_title( get_the_ID() ) )
		);
	if( is_admin() ){
		return $more;
	}

	return $link;
}
add_filter('excerpt_more', 'extension_continue_reading');

/***************** USED CLASS FOR BODY TAGS ******************************/
function extension_body_class($extension_class) {
	$extension_settings = extension_get_theme_options();
	$extension_site_layout = $extension_settings['extension_design_layout'];

	if ($extension_site_layout =='boxed-layout') {

		$extension_class[] = 'boxed-layout';

	}elseif ($extension_site_layout =='small-boxed-layout') {

		$extension_class[] = 'boxed-layout-small';

	}else{

		$extension_class[] = '';

	}

	if ( is_singular() && false !== strpos( get_queried_object()->post_content, '<!-- wp:' ) ) {

		$extension_class[] = 'gutenberg';

	}

	if(is_page_template('page-templates/contact-template.php')) {

		$extension_class[] = 'contact-template';

	}
	if($extension_settings['extension_header_design']=='1'){

		$extension_class[] = 'design-1';

	}elseif ($extension_settings['extension_header_design']=='2'){

		$extension_class[] = 'design-2';

	}elseif ($extension_settings['extension_header_design']=='3'){

		$extension_class[] = 'design-3';

	}elseif ($extension_settings['extension_header_design']=='4'){

		$extension_class[] = 'design-4';

	}else{

		$extension_class[] = 'design-5';

	}

	if (!is_active_sidebar('extension_main_sidebar')){

		$extension_class[] = 'no-sidebar-layout';

	}

	return $extension_class;
}
add_filter('body_class', 'extension_body_class');

/********************** SCRIPTS FOR DONATE/ UPGRADE BUTTON ******************************/
function extension_customize_scripts() {

	wp_enqueue_style( 'extension_customizer_custom', get_template_directory_uri() . '/inc/css/extension-customizer.css');

}
add_action( 'customize_controls_print_scripts', 'extension_customize_scripts');

/**************************** SOCIAL MENU *********************************************/
function extension_social_links_display() {
		if ( has_nav_menu( 'social-link' ) ) : ?>
	<div class="social-links clearfix">
	<?php
		wp_nav_menu( array(
			'container' 	=> '',
			'theme_location' => 'social-link',
			'depth'          => 1,
			'items_wrap'      => '<ul>%3$s</ul>',
			'link_before'    => '<span class="screen-reader-text">',
			'link_after'     => '</span>' . extension_get_icons(array( 'icon' => 'tf-link' ) ),
		) );
	?>
	</div><!-- end .social-links -->
	<?php endif; ?>
<?php }
add_action ('extension_social_links', 'extension_social_links_display');

/******************* DISPLAY BREADCRUMBS ******************************/
function extension_breadcrumb() {
	if (function_exists('bcn_display')) { ?>
		<div class="breadcrumb home">
			<?php bcn_display(); ?>
		</div> <!-- .breadcrumb -->
	<?php }
}
/*************************** ENQUEING STYLES AND SCRIPTS ****************************************/
function extension_scripts() {
	$extension_settings = extension_get_theme_options();
	$extension_stick_menu = $extension_settings['extension_stick_menu'];
	wp_enqueue_script('extension-main', get_template_directory_uri().'/js/extension-main.js', array('jquery'), false, true);
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
	wp_enqueue_style( 'extension-style', get_stylesheet_uri() );
	wp_enqueue_style('extension-font-icons', get_template_directory_uri().'/assets/font-icons/css/icon-style.css');
	wp_enqueue_script('extension-navigation', get_template_directory_uri().'/js/navigation.js', array('jquery'), false, true);
	wp_enqueue_script('extension-skip-link-focus-fix', get_template_directory_uri().'/js/skip-link-focus-fix.js', array('jquery'), false, true);

	if( $extension_stick_menu != 1 ):

		wp_enqueue_script('jquery-sticky', get_template_directory_uri().'/assets/sticky/jquery.sticky.min.js', array('jquery'), false, true);
		wp_enqueue_script('extension-sticky-settings', get_template_directory_uri().'/assets/sticky/sticky-settings.js', array('jquery'), false, true);

	endif;
}

	add_action( 'wp_enqueue_scripts', 'extension_scripts');

function extension_style_design() {
	$extension_settings = extension_get_theme_options();

	if($extension_settings['extension_header_design']=='1'){

		wp_enqueue_style('extension-designs', get_template_directory_uri().'/css/style-cd-1.css');

	}elseif ($extension_settings['extension_header_design']=='2'){

		wp_enqueue_style('extension-designs', get_template_directory_uri().'/css/style-cd-2.css');

	}elseif ($extension_settings['extension_header_design']=='3'){

		wp_enqueue_style('extension-designs', get_template_directory_uri().'/css/style-cd-3.css');

	}elseif ($extension_settings['extension_header_design']=='4'){

		wp_enqueue_style('extension-designs', get_template_directory_uri().'/css/style-cd-4.css');

	}else{

		wp_enqueue_style('extension-designs', get_template_directory_uri().'/css/style-cd-5.css');

	}
}
add_action( 'wp_enqueue_scripts', 'extension_style_design',10);


function extension_inline_remove_default_color() {
	$extension_settings = extension_get_theme_options();

	if ($extension_settings['extension_disable_default_color'] == 1){

		wp_enqueue_style('extension-default-styles', get_template_directory_uri().'/css/remove-default-color.css');
		
	}
}

	add_action( 'wp_enqueue_scripts', 'extension_inline_remove_default_color',20);

function extension_inline_fonts() {

	$extension_settings = extension_get_theme_options();

	/********* Adding Multiple Fonts ********************/
	$extension_googlefont = array();
	array_push( $extension_googlefont, 'Open+Sans');
	$extension_googlefonts = implode("|", $extension_googlefont);

	wp_register_style( 'extension-google-fonts', '//fonts.googleapis.com/css?family='.$extension_googlefonts .':300,400,600,700');
	wp_enqueue_style( 'extension-google-fonts' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	/* Custom Css */
	$extension_internal_css='';

	if ($extension_settings['extension_logo_high_resolution'] !=0){
		$extension_internal_css .= '/* Center Logo for high resolution screen(Use 2X size image) */
		.header-wrap-inner .custom-logo,
		.header-wrap-inner .custom-logo {
			height: auto;
			width: 50%;
		}

		@media only screen and (max-width: 767px) { 
			.header-wrap-inner .custom-logo,
			.header-wrap-inner .custom-logo {
				width: 60%;
			}
		}

		@media only screen and (max-width: 480px) { 
			.header-wrap-inner .custom-logo,
			.header-wrap-inner .custom-logo {
				width: 80%;
			}
		}';
	}

	if($extension_settings['extension_header_display']=='header_logo'){
		$extension_internal_css .= '
		#site-branding #site-title, #site-branding #site-description{
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
		#site-detail {
			padding: 0;
		}';
	}

	if($extension_settings['extension_header_image_bg_text_color']=='bg-text-color'){
		$extension_internal_css .= '/* Header Image With background Text color */
		.custom-header-content {
			background-color: rgba(255, 255, 255, 0.5);
			border: 1px solid rgba(255, 255, 255, 0.5);
			outline: 6px solid rgba(255, 255, 255, 0.5);
			padding: 20px;
		}';
	}

	if($extension_settings['extension_button_gradient'] !='0' ){
		$extension_internal_css .= '/* Hide Slider Button Gradient */
		.btn-default{
			background-image: none;
		}';
	}

	wp_add_inline_style( 'extension-designs', wp_strip_all_tags($extension_internal_css) );
}
add_action( 'wp_enqueue_scripts', 'extension_inline_fonts',70);

/**************** Header banner display/ Widget slider ***********************/
function extension_header_image_widget_slider(){
	$extension_settings = extension_get_theme_options();
	$extension_header_image_layout = $extension_settings['extension_header_image_layout'];
	if ( get_header_image() ) : ?>
		<div class="custom-header <?php if($extension_header_image_layout=='header-image-small'){ echo 'header-image-small'; } ?>">
			<div class="custom-header-wrap">
				<img src="<?php header_image(); ?>" class="header-image" width="<?php echo esc_attr(get_custom_header()->width);?>" height="<?php echo esc_attr(get_custom_header()->height);?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display'));?>">
				<?php if($extension_settings['extension_header_image_title'] !=''){ ?>
					<div class="custom-header-content">
						<?php if (!empty($extension_settings['extension_header_image_title'] ) ): ?>
							<h2 class="header-image-title"><?php echo esc_attr($extension_settings['extension_header_image_title']);?></h2>

							<?php endif;

							if (!empty($extension_settings['extension_header_sub_title'] ) ): ?>

							<span class="header-image-sub-title"><?php echo esc_attr($extension_settings['extension_header_sub_title']); ?></span>
							<?php endif;

							if (!empty($extension_settings['extension_header_image_button'] ) ): ?>
							<a title="<?php echo esc_attr($extension_settings['extension_header_image_button']);?>" href="<?php echo esc_url($extension_settings['extension_header_image_link']);?>"  class="btn-default" target="_blank"><span><?php echo esc_attr($extension_settings['extension_header_image_button']);?></span><i class="fas fa-chevron-right" aria-hidden="true"></i></a>
						<?php endif; ?>
					</div> <!-- end .custom-header-content -->
				<?php } ?>
			</div><!-- end .custom-header-wrap -->
		</div> <!-- end .custom-header -->
		<?php endif;
		if(is_active_sidebar( 'slider_section' )):
			dynamic_sidebar( 'slider_section' );
		endif;
}

add_action('extension_display_header_image_widget_slider','extension_header_image_widget_slider');

/**************** Header right ***********************/
function extension_header_right_section(){
	$extension_settings = extension_get_theme_options();
	$extension_side_menu = $extension_settings['extension_side_menu'];
	$search_form = $extension_settings['extension_search_custom_header']; ?>
	<div class="header-right">
		<?php
			if( (1 != $extension_side_menu) || (1 != $search_form) ){

					if(1 != $extension_side_menu){
						if (has_nav_menu('side-nav-menu') || (has_nav_menu( 'social-link' ) && $extension_settings['extension_side_menu_social_icons'] == 0 ) || is_active_sidebar( 'extension_side_menu' ) ): ?>
							<button type="button" class="show-menu-toggle">
								<span class="sn-text"><?php esc_html_e('Menu Button','extension'); ?></span>
								<span class="bars"></span>
							</button>
				  		<?php endif;
				  	}

				  	if(1 != $extension_side_menu){ ?>
						<div class="side-menu-wrap">
							<div class="side-menu">
						  		<button type="button" class="hide-menu-toggle">			
									<span class="bars"></span>
							  	</button>

								<?php

								if (has_nav_menu('side-nav-menu') || (has_nav_menu( 'social-link' ) && $extension_settings['extension_side_menu_social_icons'] == 0 ) || is_active_sidebar( 'extension_side_menu' ) ):
									
									if (has_nav_menu('side-nav-menu')) { 
										$args = array(
											'theme_location' => 'side-nav-menu',
											'container'      => '',
											'items_wrap'     => '<ul class="side-menu-list">%3$s</ul>',
											); ?>
									<nav class="side-nav-wrap" role="navigation"  aria-label="<?php esc_attr_e( 'Side Menu', 'extension' ); ?>">
										<?php wp_nav_menu($args); ?>
									</nav><!-- end .side-nav-wrap -->
									<?php }
									if($extension_settings['extension_side_menu_social_icons'] == 0):
										do_action('extension_social_links');
									endif;

									if( is_active_sidebar( 'extension_side_menu' )) {
										echo '<div class="side-widget-tray">';

											dynamic_sidebar( 'extension_side_menu' );

										echo '</div> <!-- end .side-widget-tray -->';
									} 
								endif; ?>
							</div><!-- end .side-menu -->
						</div><!-- end .side-menu-wrap -->
					<?php }

				  	if (1 != $search_form) { ?>
					<button type="button" id="search-toggle" class="header-search"></button>
						<div id="search-box" class="clearfix">
								<?php get_search_form();?>
						</div>  <!-- end #search-box -->
					<?php }
			} ?>
		</div> <!-- end .header-right -->
<?php }

add_action('extension_display_header_right_section','extension_header_right_section');