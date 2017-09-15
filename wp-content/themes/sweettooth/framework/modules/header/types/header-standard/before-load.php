<?php

if ( ! function_exists( 'sweettooth_elated_set_header_standard_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function sweettooth_elated_set_header_standard_type_global_option( $header_types ) {
		$header_types['header-standard'] = array(
			'image' => ELATED_FRAMEWORK_HEADER_TYPES_ROOT . '/header-standard/assets/img/header-standard.png',
			'label' => esc_html__( 'Standard', 'sweettooth' )
		);
		
		return $header_types;
	}
	
	add_filter( 'sweettooth_elated_filter_header_type_global_option', 'sweettooth_elated_set_header_standard_type_global_option' );
}

if ( ! function_exists( 'sweettooth_elated_set_header_standard_type_as_global_option' ) ) {
	/**
	 * This function set default header type value for global header option map
	 */
	function sweettooth_elated_set_header_standard_type_as_global_option( $header_type ) {
		$header_type = 'header-standard';
		
		return $header_type;
	}
	
	add_filter( 'sweettooth_elated_filter_default_header_type_global_option', 'sweettooth_elated_set_header_standard_type_as_global_option' );
}

if ( ! function_exists( 'sweettooth_elated_set_header_standard_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function sweettooth_elated_set_header_standard_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-standard'] = esc_html__( 'Standard', 'sweettooth' );
		
		return $header_type_options;
	}
	
	add_filter( 'sweettooth_elated_filter_header_type_meta_boxes', 'sweettooth_elated_set_header_standard_type_meta_boxes_option' );
}

if ( ! function_exists( 'sweettooth_elated_set_show_dep_options_for_header_standard' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type global option
	 */
	function sweettooth_elated_set_show_dep_options_for_header_standard( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#eltdf_header_behaviour';
		$show_containers[] = '#eltdf_menu_area_container';
		$show_containers[] = '#eltdf_panel_main_menu';
		$show_containers[] = '#eltdf_panel_sticky_header';
		$show_containers[] = '#eltdf_panel_fixed_header';
		
		$show_containers = apply_filters( 'sweettooth_elated_filter_show_dep_options_for_header_standard', $show_containers );
		
		$show_dep_options['header-standard'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'sweettooth_elated_filter_header_type_show_global_option', 'sweettooth_elated_set_show_dep_options_for_header_standard' );
}

if ( ! function_exists( 'sweettooth_elated_set_hide_dep_options_for_header_standard' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type global option
	 */
	function sweettooth_elated_set_hide_dep_options_for_header_standard( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#eltdf_logo_area_container';
		$hide_containers[] = '#eltdf_panel_fullscreen_menu';
		
		$hide_containers = apply_filters( 'sweettooth_elated_filter_hide_dep_options_for_header_standard', $hide_containers );
		
		$hide_dep_options['header-standard'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'sweettooth_elated_filter_header_type_hide_global_option', 'sweettooth_elated_set_hide_dep_options_for_header_standard' );
}

if ( ! function_exists( 'sweettooth_elated_set_show_dep_options_for_header_standard_meta_boxes' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type meta boxes map
	 */
	function sweettooth_elated_set_show_dep_options_for_header_standard_meta_boxes( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#eltdf_menu_area_container';
		$show_containers[] = '#eltdf_eltdf_set_menu_area_position_meta';
		
		$show_containers = apply_filters( 'sweettooth_elated_filter_show_dep_options_for_header_standard_meta_boxes', $show_containers );
		
		$show_dep_options['header-standard'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'sweettooth_elated_filter_header_type_show_meta_boxes', 'sweettooth_elated_set_show_dep_options_for_header_standard_meta_boxes' );
}

if ( ! function_exists( 'sweettooth_elated_set_hide_dep_options_for_header_standard_meta_boxes' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type meta boxes map
	 */
	function sweettooth_elated_set_hide_dep_options_for_header_standard_meta_boxes( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#eltdf_logo_area_container';
		$hide_containers[] = '#eltdf_eltdf_set_expanding_menu_area_position_meta';
		
		$hide_containers = apply_filters( 'sweettooth_elated_filter_hide_dep_options_for_header_standard_meta_boxes', $hide_containers );
		
		$hide_dep_options['header-standard'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'sweettooth_elated_filter_header_type_hide_meta_boxes', 'sweettooth_elated_set_hide_dep_options_for_header_standard_meta_boxes' );
}

if ( ! function_exists( 'sweettooth_elated_set_hide_dep_options_header_standard' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function sweettooth_elated_set_hide_dep_options_header_standard( $hide_dep_options ) {
		$hide_dep_options[] = 'header-standard';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'sweettooth_elated_filter_header_logo_area_hide_global_option', 'sweettooth_elated_set_hide_dep_options_header_standard' );
	
	// header global panel meta boxes
	add_filter( 'sweettooth_elated_filter_header_logo_area_hide_meta_boxes', 'sweettooth_elated_set_hide_dep_options_header_standard' );
	
	// header types panel options
	add_filter( 'sweettooth_elated_filter_header_centered_hide_global_option', 'sweettooth_elated_set_hide_dep_options_header_standard' );
	add_filter( 'sweettooth_elated_filter_full_screen_menu_hide_global_option', 'sweettooth_elated_set_hide_dep_options_header_standard' );
	add_filter( 'sweettooth_elated_filter_header_vertical_hide_global_option', 'sweettooth_elated_set_hide_dep_options_header_standard' );
	add_filter( 'sweettooth_elated_filter_header_vertical_menu_hide_global_option', 'sweettooth_elated_set_hide_dep_options_header_standard' );
	
	// header types panel meta boxes
	add_filter( 'sweettooth_elated_filter_header_centered_hide_meta_boxes', 'sweettooth_elated_set_hide_dep_options_header_standard' );
	add_filter( 'sweettooth_elated_filter_header_minimal_hide_meta_boxes', 'sweettooth_elated_set_hide_dep_options_header_standard' );
	add_filter( 'sweettooth_elated_filter_header_expanding_hide_meta_boxes', 'sweettooth_elated_set_hide_dep_options_header_standard' );
}