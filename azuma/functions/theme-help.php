<?php
/**
 * Theme help
 *
 * Adds a simple Theme help page to the Appearance section of the WordPress Dashboard.
 *
 * @package Azuma
 */

// Add Theme help page to admin menu.
add_action( 'admin_menu', 'azuma_add_theme_help_page' );

function azuma_add_theme_help_page() {

	// Get Theme Details from style.css
	$theme = wp_get_theme();

	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'azuma' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ), esc_html__( 'Theme Help', 'azuma' ), 'edit_theme_options', 'azuma', 'azuma_display_theme_help_page'
	);
}

// Display Theme help page.
function azuma_display_theme_help_page() {

	// Get Theme Details from style.css.
	$theme = wp_get_theme();
	?>

	<div class="wrap theme-help-wrap">

		<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'azuma' ), esc_html( $theme->get( 'Name' ) ), esc_html( $theme->get( 'Version' ) ) ); ?></h1>

		<div class="theme-description"><?php echo esc_html( $theme->get( 'Description' ) ); ?></div>

		<hr>
		<div class="important-links clearfix">
			<p><strong><?php esc_html_e( 'Theme Links', 'azuma' ); ?>:</strong>
				<a href="<?php echo esc_url( 'https://uxlthemes.com/theme/azuma/' ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'azuma' ); ?></a>
				<a href="<?php echo esc_url( 'https://uxlthemes.com/demo/?demo=azuma' ); ?>" target="_blank"><?php esc_html_e( 'Theme Demo', 'azuma' ); ?></a>
				<a href="<?php echo esc_url( 'https://uxlthemes.com/docs/azuma-theme/' ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'azuma' ); ?></a>
				<a href="<?php echo esc_url( 'https://uxlthemes.com/forums/forum/azuma/' ); ?>" target="_blank"><?php esc_html_e( 'Theme Support', 'azuma' ); ?></a>
			</p>
		</div>
		<hr>

		<div id="getting-started">

			<h3><?php printf( esc_html__( 'Getting Started with %s', 'azuma' ), esc_html( $theme->get( 'Name' ) ) ); ?></h3>

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Theme Documentation', 'azuma' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'Do you need help to setup, configure and customize this theme? Check out the extensive theme documentation on our website.', 'azuma' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( 'https://uxlthemes.com/docs/azuma-theme/' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'View %s Documentation', 'azuma' ), esc_html( $theme->get( 'Name' ) ) ); ?>
							</a>
						</p>
					</div>

					<div class="section">
						<h4><?php esc_html_e( 'Theme Options', 'azuma' ); ?></h4>

						<p class="about">
							<?php printf( esc_html__( '%s makes use of the Customizer for the theme settings.', 'azuma' ), esc_html( $theme->get( 'Name' ) ) ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( wp_customize_url() ); ?>" class="button button-primary">
								<?php esc_html_e( 'Customize Theme', 'azuma' ); ?>
							</a>
						</p>
					</div>

					<div class="section">
						<h4><?php esc_html_e( 'Upgrade', 'azuma' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'Upgrade to Azuma Pro for even more cool features and customization options.', 'azuma' ) ; ?>
						</p>
						<p>
							<a href="<?php echo esc_url( 'https://uxlthemes.com/theme/azuma-pro/' ); ?>" target="_blank" class="button button-pro">
								<?php esc_html_e( 'GO PRO', 'azuma' ); ?>
							</a>
						</p>
					</div>

				</div>

				<div class="column column-half clearfix">

					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png" />

				</div>

			</div>

		</div>

		<hr>

		<div id="theme-author">

			<p>
				<?php printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'azuma' ), esc_html( $theme->get( 'Name' ) ), '<a target="_blank" href="https://uxlthemes.com/" title="UXL Themes">UXL Themes</a>', '<a target="_blank" href="https://wordpress.org/support/theme/azuma/reviews/?filter=5" title="' . esc_html__( 'Azuma Review', 'azuma' ) . '">' . esc_html__( 'rate it', 'azuma' ) . '</a>' ); ?>
			</p>

		</div>

	</div>

	<?php
}

// Add CSS for Theme help Panel.
add_action( 'admin_enqueue_scripts', 'azuma_theme_help_page_css' );

function azuma_theme_help_page_css( $hook ) {

	// Load styles and scripts only on theme help page.
	if ( 'appearance_page_azuma' != $hook ) {
		return;
	}

	// Embed theme help css style.
	wp_enqueue_style( 'azuma-theme-help-css', get_template_directory_uri() . '/css/theme-help.css' );
}
