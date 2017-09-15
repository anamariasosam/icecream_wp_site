<?php

if ( ! function_exists( 'sweettooth_elated_sticky_header_meta_boxes_options_map' ) ) {
	function sweettooth_elated_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'hidden_property' => 'eltdf_header_behaviour_meta',
				'hidden_values'   => array(
					'',
					'no-behavior',
					'fixed-on-scroll',
					'sticky-header-on-scroll-up'
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll amount for sticky header appearance', 'sweettooth' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'sweettooth' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_additional_header_area_meta_boxes_map', 'sweettooth_elated_sticky_header_meta_boxes_options_map', 10, 1 );
}