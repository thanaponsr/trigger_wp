<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */
/********************* EXTENSION CUSTOMIZER SANITIZE FUNCTIONS *******************************/
function extension_checkbox_integer( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function extension_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

function extension_sanitize_category_select($input) {
	
	$input = sanitize_key( $input );
	return ( ( isset( $input ) && true == $input ) ? $input : '' );

}

function extension_numeric_value( $input ) {
	if(is_numeric($input)){
		return $input;
	}
}

function extension_reset_alls( $input ) {
	if ( $input == 1 ) {
		delete_option( 'extension_theme_options');
		$input=0;
		return absint($input);
	} 
	else {
		return '';
	}
}