<?php
/**
 * The template for displaying the footer.
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */

$extension_settings = extension_get_theme_options(); ?>
		<!-- Footer Start ============================================= -->
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php do_action('extension_footer_columns'); ?>

			<!-- Site Information ============================================= -->
			<div class="site-info"  <?php if($extension_settings['extension_img-upload-footer-image'] !=''){?>style="background-image:url('<?php echo esc_url($extension_settings['extension_img-upload-footer-image']); ?>');" <?php } ?>>
				<div class="wrap">
					<?php
						if($extension_settings['extension_buttom_social_icons'] == 0):

							do_action('extension_social_links');

						endif;
					?>
					<div class="copyright">
					<?php
					 
					 if ( is_active_sidebar( 'extension_footer_options' ) ) :

						dynamic_sidebar( 'extension_footer_options' );

					else: ?>

						<a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" target="_blank" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name', 'display' ); ?></a> | 
									<?php esc_html_e('Designed by:','extension'); ?> <a title="<?php echo esc_attr__( 'Theme Freesia', 'extension' ); ?>" target="_blank" href="<?php echo esc_url( 'https://themefreesia.com' ); ?>"><?php esc_html_e('Theme Freesia','extension');?></a> |
									<?php  date_i18n(__('Y','extension')) ; ?> <a title="<?php echo esc_attr__( 'WordPress', 'extension' );?>" target="_blank" href="<?php echo esc_url( 'https://wordpress.org' );?>"><?php esc_html_e('WordPress','extension'); ?></a> | <?php echo '&copy; ' . esc_attr__('Copyright All right reserved ','extension'); ?>
						<?php
							if ( function_exists( 'the_privacy_policy_link' ) ) { 
								the_privacy_policy_link( ' | ', '<span role="separator" aria-hidden="true"></span>' );
							}
							
							endif; ?>
					</div><!-- end .copyright -->
					<div style="clear:both;"></div>
				</div> <!-- end .wrap -->
			</div> <!-- end .site-info -->
			<?php
				$disable_scroll = $extension_settings['extension_scroll'];
				if($disable_scroll == 0):?>
					<button type="button" class="go-to-top" type="button">
						<span class="screen-reader-text"><?php esc_html_e('Top','extension'); ?></span>
						<span class="icon-bg"></span>
							 <span class="back-to-top-text"><?php esc_html_e('Top','extension'); ?></span>
							<i class="fas fa-angle-up back-to-top-icon"></i>
					</button>
			<?php endif; ?>
			<div class="page-overlay"></div>
		</footer> <!-- end #colophon -->
	</div><!-- end .site-content-contain -->
</div><!-- end #page -->
<?php wp_footer(); ?>
</body>
</html>