<?php

if ( ! function_exists( 'sweettooth_elated_logo_meta_box_map' ) ) {
	function sweettooth_elated_logo_meta_box_map() {
		
		$logo_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'sweettooth_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Logo', 'sweettooth' ),
				'name'  => 'logo_meta'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'sweettooth' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'sweettooth' ),
				'parent'      => $logo_meta_box
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'sweettooth' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'sweettooth' ),
				'parent'      => $logo_meta_box
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'sweettooth' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'sweettooth' ),
				'parent'      => $logo_meta_box
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'sweettooth' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'sweettooth' ),
				'parent'      => $logo_meta_box
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'sweettooth' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'sweettooth' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_logo_meta_box_map', 47 );
}