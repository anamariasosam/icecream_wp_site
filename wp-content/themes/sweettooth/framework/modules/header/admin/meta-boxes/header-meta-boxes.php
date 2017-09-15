<?php

if ( ! function_exists( 'sweettooth_elated_header_types_meta_boxes' ) ) {
	function sweettooth_elated_header_types_meta_boxes() {
		$header_type_options = apply_filters( 'sweettooth_elated_filter_header_type_meta_boxes', $header_type_options = array( '' => esc_html__( 'Default', 'sweettooth' ) ) );
		
		return $header_type_options;
	}
}

if ( ! function_exists( 'sweettooth_elated_get_show_dep_for_header_types_meta_boxes' ) ) {
	function sweettooth_elated_get_show_dep_for_header_types_meta_boxes() {
		$show_dep_options = apply_filters( 'sweettooth_elated_filter_header_type_show_meta_boxes', $show_dep_options = array() );
		
		return $show_dep_options;
	}
}

if ( ! function_exists( 'sweettooth_elated_get_hide_dep_for_header_types_meta_boxes' ) ) {
	function sweettooth_elated_get_hide_dep_for_header_types_meta_boxes() {
		$hide_dep_options = apply_filters( 'sweettooth_elated_filter_header_type_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'sweettooth_elated_get_hide_dep_for_header_behavior_meta_boxes' ) ) {
	function sweettooth_elated_get_hide_dep_for_header_behavior_meta_boxes() {
		$hide_dep_options = apply_filters( 'sweettooth_elated_filter_header_behavior_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

foreach ( glob( ELATED_FRAMEWORK_HEADER_ROOT_DIR . '/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

foreach ( glob( ELATED_FRAMEWORK_HEADER_TYPES_ROOT_DIR . '/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'sweettooth_elated_map_header_meta' ) ) {
	function sweettooth_elated_map_header_meta() {
		$header_type_meta_boxes = sweettooth_elated_header_types_meta_boxes();
		
		$set_active_global_containers_for_default_value = '#eltdf_menu_area_container';
		
		$header_type_meta_boxes_show_dep = array_merge( array( '' => $set_active_global_containers_for_default_value ), sweettooth_elated_get_show_dep_for_header_types_meta_boxes() );
		
		$get_all_containers_arrays = array_unique( explode( ' ', str_replace( ',', ' ', implode( ' ', array_values( $header_type_meta_boxes_show_dep ) ) ) ) );
		foreach ( $get_all_containers_arrays as $key => $value ) {
			if ( $value == $set_active_global_containers_for_default_value ) {
				unset( $get_all_containers_arrays[ $key ] );
			}
		}
		$get_all_containers_except_global_for_default_value = array( '' => implode( ',', $get_all_containers_arrays ) );
		
		$header_type_meta_boxes_hide_dep     = array_merge( $get_all_containers_except_global_for_default_value, sweettooth_elated_get_hide_dep_for_header_types_meta_boxes() );
		$header_behavior_meta_boxes_hide_dep = sweettooth_elated_get_hide_dep_for_header_behavior_meta_boxes();
		
		$header_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'sweettooth_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Header', 'sweettooth' ),
				'name'  => 'header_meta'
			)
		);
		
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_header_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Choose Header Type', 'sweettooth' ),
				'description'   => esc_html__( 'Select header type layout', 'sweettooth' ),
				'parent'        => $header_meta_box,
				'options'       => $header_type_meta_boxes,
				'args'          => array(
					"dependence" => true,
					'show'       => $header_type_meta_boxes_show_dep,
					'hide'       => $header_type_meta_boxes_hide_dep
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_header_style_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'sweettooth' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'sweettooth' ),
				'parent'        => $header_meta_box,
				'options'       => array(
					''             => esc_html__( 'Default', 'sweettooth' ),
					'light-header' => esc_html__( 'Light', 'sweettooth' ),
					'dark-header'  => esc_html__( 'Dark', 'sweettooth' )
				)
			)
		);

		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_sticky_header_style_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Sticky Header Header Skin', 'sweettooth' ),
				'description'   => esc_html__( 'Choose a header style to make sticky header elements (logo, main menu, side menu button) in that predefined style', 'sweettooth' ),
				'parent'        => $header_meta_box,
				'options'       => array(
					''             => esc_html__( 'Default', 'sweettooth' ),
					'light-sticky-header' => esc_html__( 'Light', 'sweettooth' ),
					'dark-sticky-header'  => esc_html__( 'Dark', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'parent'          => $header_meta_box,
				'type'            => 'select',
				'name'            => 'eltdf_header_behaviour_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Header Behaviour', 'sweettooth' ),
				'description'     => esc_html__( 'Select the behaviour of header when you scroll down to page', 'sweettooth' ),
				'options'         => array(
					''                                => esc_html__( 'Default', 'sweettooth' ),
					'fixed-on-scroll'                 => esc_html__( 'Fixed on scroll', 'sweettooth' ),
					'no-behavior'                     => esc_html__( 'No Behavior', 'sweettooth' ),
					'sticky-header-on-scroll-up'      => esc_html__( 'Sticky on scroll up', 'sweettooth' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'sweettooth' )
				),
				'hidden_property' => 'eltdf_header_type_meta',
				'hidden_values'   => $header_behavior_meta_boxes_hide_dep,
				'args'            => array(
					'dependence' => true,
					'show'       => array(
						''                                => '',
						'fixed-on-scroll'                 => '',
						'no-behavior'                     => '',
						'sticky-header-on-scroll-up'      => '',
						'sticky-header-on-scroll-down-up' => '#eltdf_sticky_amount_container_meta_container'
					),
					'hide'       => array(
						''                                => '#eltdf_sticky_amount_container_meta_container',
						'fixed-on-scroll'                 => '#eltdf_sticky_amount_container_meta_container',
						'no-behavior'                     => '#eltdf_sticky_amount_container_meta_container',
						'sticky-header-on-scroll-up'      => '#eltdf_sticky_amount_container_meta_container',
						'sticky-header-on-scroll-down-up' => ''
					)
				)
			)
		);
		
		//additional area
		do_action( 'sweettooth_elated_action_additional_header_area_meta_boxes_map', $header_meta_box );
		
		//top area
		do_action( 'sweettooth_elated_action_header_top_area_meta_boxes_map', $header_meta_box );
		
		//logo area
		do_action( 'sweettooth_elated_action_header_logo_area_meta_boxes_map', $header_meta_box );
		
		//menu area
		do_action( 'sweettooth_elated_action_header_menu_area_meta_boxes_map', $header_meta_box );
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_header_meta', 50 );
}