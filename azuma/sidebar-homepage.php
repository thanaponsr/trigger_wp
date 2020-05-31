<?php
/**
 * The sidebar containing the main widget area for the homepage
 *
 * @package Azuma
 */

if ( ! is_active_sidebar( 'azuma-sidebar-homepage' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'azuma-sidebar-homepage' ); ?>
</div><!-- #secondary -->
