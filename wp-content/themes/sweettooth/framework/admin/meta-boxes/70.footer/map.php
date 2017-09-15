<?php

if ( ! function_exists( 'sweettooth_elated_map_footer_meta' ) ) {
	function sweettooth_elated_map_footer_meta() {
		$footer_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'sweettooth_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Footer', 'sweettooth' ),
				'name'  => 'footer_meta'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_disable_footer_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Footer for this Page', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'sweettooth' ),
				'parent'        => $footer_meta_box
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_show_footer_top_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Top', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'sweettooth' ),
				'parent'        => $footer_meta_box,
				'options'       => sweettooth_elated_get_yes_no_select_array()
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_show_footer_bottom_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Bottom', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'sweettooth' ),
				'parent'        => $footer_meta_box,
				'options'       => sweettooth_elated_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_footer_meta', 70 );
}