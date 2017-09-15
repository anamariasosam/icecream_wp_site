<?php

if ( ! function_exists( 'sweettooth_elated_map_content_bottom_meta' ) ) {
	function sweettooth_elated_map_content_bottom_meta() {
		$content_bottom_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'sweettooth_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Content Bottom', 'sweettooth' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'sweettooth' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'sweettooth' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => sweettooth_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''   => '#eltdf_eltdf_show_content_bottom_meta_container',
						'no' => '#eltdf_eltdf_show_content_bottom_meta_container'
					),
					'show'       => array(
						'yes' => '#eltdf_eltdf_show_content_bottom_meta_container'
					)
				)
			)
		);
		
		$show_content_bottom_meta_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'eltdf_show_content_bottom_meta_container',
				'hidden_property' => 'eltdf_enable_content_bottom_area_meta',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'sweettooth' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'sweettooth' ),
				'options'       => sweettooth_elated_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args' => array(
					'select2' => true
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'sweettooth' ),
				'options'       => sweettooth_elated_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'eltdf_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'sweettooth' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'sweettooth' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_content_bottom_meta', 71 );
}