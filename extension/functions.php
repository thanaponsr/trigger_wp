<?php
/**
 * Display all extension functions and definitions
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */

include get_theme_file_path( 'inc/upgrade-plus/autoload/src/Loader.php' );

$loader = new \WPTRT\Autoload\Loader();

$loader->add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'inc/upgrade-plus/customize-section-button/src' ) );

$loader->register();

/************************************************************************************************/
if ( ! function_exists( 'extension_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function extension_setup() {
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
			$content_width=1300;
	}

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('post-thumbnails');

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => __( 'Main Menu', 'extension' ),
		'side-nav-menu' => __( 'Side Menu', 'extension' ),
		'social-link'  => __( 'Add Social Icons Only', 'extension' ),
	) );

	/* 
	* Enable support for custom logo. 
	*
	*/ 
	add_theme_support( 'custom-logo', array(
		'flex-width' => true, 
		'flex-height' => true,
	) );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	add_theme_support( 'gutenberg', array(
			'colors' => array(
				'#f2095e',
			),
		) );
	add_theme_support( 'align-wide' );

	//Indicate widget sidebars can use selective refresh in the Customizer. 
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Switch default core markup for comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	add_image_size( 'extension-popular-post', 75, 75, true );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat' ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'extension_custom_background_args', array( 'default-color' => 'ffffff') ) );

	add_editor_style( array( 'css/editor-style.css') );

/**
 * Load WooCommerce compatibility files.
 */
	
require get_template_directory() . '/woocommerce/functions.php';


}
endif; // extension_setup
add_action( 'after_setup_theme', 'extension_setup' );

/***************************************************************************************/
function extension_content_width() {
	if ( is_page_template( 'page-templates/gallery-template.php' ) || is_attachment() ) {

		global $content_width;
		$content_width = 1920;

	}
}
add_action( 'template_redirect', 'extension_content_width' );

/***************************************************************************************/
if(!function_exists('extension_get_theme_options')):
	function extension_get_theme_options() {
	    return wp_parse_args(  get_option( 'extension_theme_options', array() ), extension_get_option_defaults_values() );
	}
endif;

/***************************************************************************************/
require get_template_directory() . '/inc/customizer/extension-default-values.php';
require get_template_directory() . '/inc/settings/extension-functions.php';
require get_template_directory() . '/inc/settings/extension-common-functions.php';
require get_template_directory() . '/inc/settings/icon-functions.php';
/************************ Extension Sidebar/ Widgets  *****************************/
require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/popular-posts.php';

/************************ Extension Customizer  *****************************/
require get_template_directory() . '/inc/customizer/functions/sanitize-functions.php';
require get_template_directory() . '/inc/customizer/functions/register-panel.php';

function extension_customize_register( $wp_customize ) {
		if(!class_exists('Extension_Plus_Features')  && !class_exists('Mocktail_Customize_upgrade') && !class_exists('Cappuccino_Customize_upgrade') )  {
		class Extension_Customize_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
				<a title="<?php esc_attr_e( 'Review Us', 'extension' ); ?>" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/extension/' ); ?>" target="_blank" id="about_extension">
				<?php esc_html_e( 'Review Us', 'extension' ); ?>
				</a><br/>
				<a href="<?php echo esc_url( 'https://themefreesia.com/theme-instruction/extension/' ); ?>" title="<?php esc_attr_e( 'Theme Instructions', 'extension' ); ?>" target="_blank" id="about_extension">
				<?php esc_html_e( 'Theme Instructions', 'extension' ); ?>
				</a><br/>
				<a href="<?php echo esc_url( 'https://tickets.themefreesia.com/' ); ?>" title="<?php esc_attr_e( 'Support Tickets', 'extension' ); ?>" target="_blank" id="about_extension">
				<?php esc_html_e( 'Tickets', 'extension' ); ?>
				</a><br/>
			<?php
			}
		}
		$wp_customize->add_section('extension_upgrade_links', array(
			'title'					=> __('Important Links', 'extension'),
			'priority'				=> 1000,
		));
		$wp_customize->add_setting( 'extension_upgrade_links', array(
			'default'				=> false,
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Extension_Customize_upgrade(
			$wp_customize,
			'extension_upgrade_links',
				array(
					'section'				=> 'extension_upgrade_links',
					'settings'				=> 'extension_upgrade_links',
				)
			)
		);
	}	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'extension_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'extension_customize_partial_blogdescription',
		) );
	}
	
	require get_template_directory() . '/inc/customizer/functions/design-options.php';
	require get_template_directory() . '/inc/customizer/functions/theme-options.php';
	require get_template_directory() . '/inc/customizer/functions/color-options.php' ;
}
if(!class_exists('Extension_Plus_Features')){

		/**
		 * TGM plugin Activation
		 */
		require_once( trailingslashit( get_template_directory() ) . '/inc/tgm/tgm.php' );

}

/** 
* Render the site title for the selective refresh partial. 
* @see extension_customize_register() 
* @return void 
*/ 
function extension_customize_partial_blogname() {
	bloginfo( 'name' ); 
} 

/** 
* Render the site tagline for the selective refresh partial. 
* @see extension_customize_register() 
* @return void 
*/ 
function extension_customize_partial_blogdescription() {
	bloginfo( 'description' ); 
}
add_action( 'customize_register', 'extension_customize_register' );

/******************* Extension Site Branding Primary Header Display *************************/
function extension_header_display(){
	$extension_settings = extension_get_theme_options();
	$header_display = $extension_settings['extension_header_display'];
	$extension_header_display = $extension_settings['extension_header_display'];
	if ($extension_header_display == 'header_logo' || $extension_header_display == 'header_text' || $extension_header_display == 'show_both') {

		if ($header_display == 'header_logo' || $header_display == 'header_text' || $header_display == 'show_both')	{ ?>
			<div id="site-branding" class="site-branding">
				<?php if($header_display != 'header_text'){
					extension_the_custom_logo();
				} ?>
				<div id="site-detail">

					<div id="site-title">
						<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_html(get_bloginfo('name', 'display'));?>" rel="home"> <?php bloginfo('name');?> </a>
					</div>  <!-- end .site-title -->
					<?php

					$site_description = get_bloginfo( 'description', 'display' );
					if ($site_description){?>
						<div id="site-description"> <?php bloginfo('description');?> </div> <!-- end #site-description -->
				
					<?php } ?>
				</div>
			</div>  <!-- end #site-branding -->
		<?php }
	}
}

add_action('extension_site_branding','extension_header_display');

/******************* Extension Site Branding Secondary Header Display *************************/
function extension_secondary_header_display(){
	$extension_settings = extension_get_theme_options();
	$header_display = $extension_settings['extension_header_display'];
	$extension_header_display = $extension_settings['extension_header_display'];
	if ($extension_header_display == 'header_logo' || $extension_header_display == 'header_text' || $extension_header_display == 'show_both') {

		if ($header_display == 'header_logo' || $header_display == 'header_text' || $header_display == 'show_both')	{
			echo '<div id="site-branding" class="site-branding">';
			if($header_display != 'header_text'){
				extension_the_custom_logo();
			}
			echo '<div id="site-detail">';
				if (is_home() || is_front_page()){ ?>
				<h1 id="site-title"> <?php }else{?> <h2 id="site-title"> <?php } ?>
				<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_html(get_bloginfo('name', 'display'));?>" rel="home"> <?php bloginfo('name');?> </a>
				<?php if(is_home() || is_front_page()){ ?>
				</h1>  <!-- end .site-title -->
				<?php } else { ?> </h2> <!-- end .site-title --> <?php }

				$site_description = get_bloginfo( 'description', 'display' );
				if ($site_description){?>
					<div id="site-description"> <?php bloginfo('description');?> </div> <!-- end #site-description -->
			
		<?php }
		echo '</div></div>'; // end #site-branding
		}
	}
}

add_action('extension_secondary_site_branding','extension_secondary_header_display');

if ( ! function_exists( 'extension_the_custom_logo' ) ) : 
 	/** 
 	 * Displays the optional custom logo. 
 	 * Does nothing if the custom logo is not available. 
 	 */ 
 	function extension_the_custom_logo() { 
		if ( function_exists( 'the_custom_logo' ) ) {

			the_custom_logo();

		}
 	} 
endif;

/************** Site Branding for sticky header and side menu sidebar *************************************/
add_action('extension_new_site_branding','extension_stite_branding_for_stickyheader_sidesidebar');

	function extension_stite_branding_for_stickyheader_sidesidebar(){ 
		$extension_settings = extension_get_theme_options(); ?>
		<div id="site-branding" class="site-branding">
			<?php	
			$extension_header_display = $extension_settings['extension_header_display'];
			if ($extension_header_display == 'header_logo' || $extension_header_display == 'show_both') {
				extension_the_custom_logo(); 
			}

			if ($extension_header_display == 'header_text' || $extension_header_display == 'show_both') { ?>
			<div id="site-detail">
				<div id="site-title">
					<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" rel="home"> <?php bloginfo('name');?> </a>
				</div>
				<!-- end #site-title -->
				<div id="site-description"><?php bloginfo('description');?></div> <!-- end #site-description -->
			</div><!-- end #site-detail -->
			<?php } ?>
		</div> <!-- end #site-branding -->
	<?php }