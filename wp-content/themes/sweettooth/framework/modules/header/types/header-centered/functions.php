<?php

if ( ! function_exists( 'sweettooth_elated_register_header_centered_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function sweettooth_elated_register_header_centered_type( $header_types ) {
		$header_type = array(
			'header-centered' => 'SweetToothElated\Modules\Header\Types\HeaderCentered'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'sweettooth_elated_init_register_header_centered_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function sweettooth_elated_init_register_header_centered_type() {
		add_filter( 'sweettooth_elated_filter_register_header_type_class', 'sweettooth_elated_register_header_centered_type' );
	}
	
	add_action( 'sweettooth_elated_action_before_header_function_init', 'sweettooth_elated_init_register_header_centered_type' );
}