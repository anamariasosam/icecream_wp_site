<?php

if ( ! function_exists( 'sweettooth_elated_map_sidebar_meta' ) ) {
	function sweettooth_elated_map_sidebar_meta() {
		$eltdf_sidebar_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'sweettooth_elated_filter_set_scope_for_meta_boxes', array( 'page' ) ),
				'title' => esc_html__( 'Sidebar', 'sweettooth' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Layout', 'sweettooth' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'sweettooth' ),
				'parent'      => $eltdf_sidebar_meta_box,
				'options'     => array(
					''                 => esc_html__( 'Default', 'sweettooth' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'sweettooth' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'sweettooth' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'sweettooth' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'sweettooth' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'sweettooth' )
				)
			)
		);
		
		$eltdf_custom_sidebars = sweettooth_elated_get_custom_sidebars();
		if ( count( $eltdf_custom_sidebars ) > 0 ) {
			sweettooth_elated_add_meta_box_field(
				array(
					'name'        => 'eltdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'sweettooth' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'sweettooth' ),
					'parent'      => $eltdf_sidebar_meta_box,
					'options'     => $eltdf_custom_sidebars,
					'args'        => array(
						'select2'	=> true
					)
				)
			);
		}
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_sidebar_meta', 31 );
}