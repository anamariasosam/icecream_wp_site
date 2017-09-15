<?php

if ( ! function_exists( 'sweettooth_elated_get_hide_dep_for_header_standard_options' ) ) {
	function sweettooth_elated_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'sweettooth_elated_filter_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'sweettooth_elated_header_standard_map' ) ) {
	function sweettooth_elated_header_standard_map( $parent ) {
		$hide_dep_options = sweettooth_elated_get_hide_dep_for_header_standard_options();
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'sweettooth' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'sweettooth' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'sweettooth' ),
					'left'   => esc_html__( 'Left', 'sweettooth' ),
					'center' => esc_html__( 'Center', 'sweettooth' )
				),
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_additional_header_menu_area_options_map', 'sweettooth_elated_header_standard_map' );
}