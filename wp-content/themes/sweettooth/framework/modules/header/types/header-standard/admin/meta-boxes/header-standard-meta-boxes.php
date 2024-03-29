<?php

if ( ! function_exists( 'sweettooth_elated_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function sweettooth_elated_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'sweettooth_elated_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'sweettooth_elated_header_standard_meta_map' ) ) {
	function sweettooth_elated_header_standard_meta_map( $parent ) {
		$hide_dep_options = sweettooth_elated_get_hide_dep_for_header_standard_meta_boxes();
		
		sweettooth_elated_add_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'eltdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'sweettooth' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'sweettooth' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'sweettooth' ),
					'left'   => esc_html__( 'Left', 'sweettooth' ),
					'right'  => esc_html__( 'Right', 'sweettooth' ),
					'center' => esc_html__( 'Center', 'sweettooth' )
				),
				'hidden_property' => 'eltdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_additional_header_area_meta_boxes_map', 'sweettooth_elated_header_standard_meta_map' );
}