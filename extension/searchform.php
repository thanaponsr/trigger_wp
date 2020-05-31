<?php
/**
 * Displays the searchform
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */
?>
<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">

	<label class="screen-reader-text"><?php esc_html_e('Search','extension'); ?></label>
	<?php
		$extension_settings = extension_get_theme_options();
		$extension_search_form = $extension_settings['extension_search_text'];?>
		<input type="search" name="s" class="search-field" placeholder="<?php echo esc_attr($extension_search_form); ?>" autocomplete="off" />
		<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>

</form> <!-- end .search-form -->