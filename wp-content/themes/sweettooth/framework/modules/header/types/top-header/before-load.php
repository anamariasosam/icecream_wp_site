<?php

if ( ! function_exists( 'sweettooth_elated_set_show_dep_options_for_top_header' ) ) {
	/**
	 * This function is used to show this header type specific containers/panels for admin options when another header type is selected
	 */
	function sweettooth_elated_set_show_dep_options_for_top_header( $show_dep_options ) {
		$show_dep_options[] = '#eltdf_top_header_container';
		
		return $show_dep_options;
	}
	
	// show top header container for global options
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_box', 'sweettooth_elated_set_show_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_centered', 'sweettooth_elated_set_show_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_divided', 'sweettooth_elated_set_show_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_minimal', 'sweettooth_elated_set_show_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_standard', 'sweettooth_elated_set_show_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_standard_extended', 'sweettooth_elated_set_show_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_tabbed', 'sweettooth_elated_set_show_dep_options_for_top_header' );
	
	// show top header container for meta boxes
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_box_meta_boxes', 'sweettooth_elated_set_show_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_centered_meta_boxes', 'sweettooth_elated_set_show_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_divided_meta_boxes', 'sweettooth_elated_set_show_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_minimal_meta_boxes', 'sweettooth_elated_set_show_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_standard_meta_boxes', 'sweettooth_elated_set_show_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_standard_extended_meta_boxes', 'sweettooth_elated_set_show_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_show_dep_options_for_header_tabbed_meta_boxes', 'sweettooth_elated_set_show_dep_options_for_top_header' );
}

if ( ! function_exists( 'sweettooth_elated_set_hide_dep_options_for_top_header' ) ) {
	/**
	 * This function is used to hide this header type specific containers/panels for admin options when another header type is selected
	 */
	function sweettooth_elated_set_hide_dep_options_for_top_header( $hide_dep_options ) {
		$hide_dep_options[] = '#eltdf_top_header_container';
		
		return $hide_dep_options;
	}
	
	// hide top header container for global options
	add_filter( 'sweettooth_elated_filter_hide_dep_options_for_header_top_menu', 'sweettooth_elated_set_hide_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_hide_dep_options_for_header_vertical', 'sweettooth_elated_set_hide_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_hide_dep_options_for_header_vertical_closed', 'sweettooth_elated_set_hide_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_hide_dep_options_for_header_vertical_compact', 'sweettooth_elated_set_hide_dep_options_for_top_header' );
	
	// hide top header container for meta boxes
	add_filter( 'sweettooth_elated_filter_hide_dep_options_for_header_top_menu_meta_boxes', 'sweettooth_elated_set_hide_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_hide_dep_options_for_header_vertical_meta_boxes', 'sweettooth_elated_set_hide_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_hide_dep_options_for_header_vertical_closed_meta_boxes', 'sweettooth_elated_set_hide_dep_options_for_top_header' );
	add_filter( 'sweettooth_elated_filter_hide_dep_options_for_header_vertical_compact_meta_boxes', 'sweettooth_elated_set_hide_dep_options_for_top_header' );
}