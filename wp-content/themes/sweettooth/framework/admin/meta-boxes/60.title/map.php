<?php

if ( ! function_exists( 'sweettooth_elated_map_title_meta' ) ) {
	function sweettooth_elated_map_title_meta() {
		$title_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'sweettooth_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Title', 'sweettooth' ),
				'name'  => 'title_meta'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'sweettooth' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'sweettooth' ),
				'parent'        => $title_meta_box,
				'options'       => sweettooth_elated_get_yes_no_select_array(),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "#eltdf_eltdf_show_title_area_meta_container",
						"yes" => ""
					),
					"show"       => array(
						""    => "#eltdf_eltdf_show_title_area_meta_container",
						"no"  => "",
						"yes" => "#eltdf_eltdf_show_title_area_meta_container"
					)
				)
			)
		);
		
		$show_title_area_meta_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $title_meta_box,
				'name'            => 'eltdf_show_title_area_meta_container',
				'hidden_property' => 'eltdf_show_title_area_meta',
				'hidden_value'    => 'no'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Title Area Type', 'sweettooth' ),
				'description'   => esc_html__( 'Choose title type', 'sweettooth' ),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''           => esc_html__( 'Default', 'sweettooth' ),
					'standard'   => esc_html__( 'Standard', 'sweettooth' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'sweettooth' )
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						"standard"   => "",
						"breadcrumb" => "#eltdf_eltdf_title_area_type_meta_container"
					),
					"show"       => array(
						""           => "#eltdf_eltdf_title_area_type_meta_container",
						"standard"   => "#eltdf_eltdf_title_area_type_meta_container",
						"breadcrumb" => ""
					)
				)
			)
		);
		
		$title_area_type_meta_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $show_title_area_meta_container,
				'name'            => 'eltdf_title_area_type_meta_container',
				'hidden_property' => 'eltdf_title_area_type_meta',
				'hidden_value'    => 'breadcrumb'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_enable_breadcrumbs_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Breadcrumbs', 'sweettooth' ),
				'description'   => esc_html__( 'This option will display Breadcrumbs in Title Area', 'sweettooth' ),
				'parent'        => $title_area_type_meta_container,
				'options'       => sweettooth_elated_get_yes_no_select_array()
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_vertical_alignment_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Vertical Alignment', 'sweettooth' ),
				'description'   => esc_html__( 'Specify title vertical alignment', 'sweettooth' ),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''              => esc_html__( 'Default', 'sweettooth' ),
					'header_bottom' => esc_html__( 'From Bottom of Header', 'sweettooth' ),
					'window_top'    => esc_html__( 'From Window Top', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_content_alignment_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Horizontal Alignment', 'sweettooth' ),
				'description'   => esc_html__( 'Specify title horizontal alignment', 'sweettooth' ),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''       => esc_html__( 'Default', 'sweettooth' ),
					'left'   => esc_html__( 'Left', 'sweettooth' ),
					'center' => esc_html__( 'Center', 'sweettooth' ),
					'right'  => esc_html__( 'Right', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_title_tag_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Title Tag', 'sweettooth' ),
				'parent'        => $title_area_type_meta_container,
				'options'       => sweettooth_elated_get_title_tag( true )
			)
		);

		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_title_transform_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Title Text Transform', 'sweettooth' ),
				'parent'        => $title_area_type_meta_container,
				'options'       => sweettooth_elated_get_text_transform_array( true )
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_title_text_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Title Color', 'sweettooth' ),
				'description' => esc_html__( 'Choose a color for title text', 'sweettooth' ),
				'parent'      => $show_title_area_meta_container
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_title_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'sweettooth' ),
				'description' => esc_html__( 'Choose a background color for title area', 'sweettooth' ),
				'parent'      => $show_title_area_meta_container
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_hide_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Background Image', 'sweettooth' ),
				'description'   => esc_html__( 'Enable this option to hide background image in title area', 'sweettooth' ),
				'parent'        => $show_title_area_meta_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#eltdf_eltdf_hide_background_image_meta_container",
					"dependence_show_on_yes" => ""
				)
			)
		);
		
		$hide_background_image_meta_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $show_title_area_meta_container,
				'name'            => 'eltdf_hide_background_image_meta_container',
				'hidden_property' => 'eltdf_hide_background_image_meta',
				'hidden_value'    => 'yes'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_title_area_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'sweettooth' ),
				'description' => esc_html__( 'Choose an Image for title area', 'sweettooth' ),
				'parent'      => $hide_background_image_meta_container
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_background_image_responsive_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Background Responsive Image', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will make Title background image responsive', 'sweettooth' ),
				'parent'        => $hide_background_image_meta_container,
				'options'       => sweettooth_elated_get_yes_no_select_array(),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "",
						"yes" => "#eltdf_eltdf_title_area_background_image_responsive_meta_container, #eltdf_eltdf_title_area_height_meta"
					),
					"show"       => array(
						""    => "#eltdf_eltdf_title_area_background_image_responsive_meta_container, #eltdf_eltdf_title_area_height_meta",
						"no"  => "#eltdf_eltdf_title_area_background_image_responsive_meta_container, #eltdf_eltdf_title_area_height_meta",
						"yes" => ""
					)
				)
			)
		);
		
		$title_area_background_image_responsive_meta_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $hide_background_image_meta_container,
				'name'            => 'eltdf_title_area_background_image_responsive_meta_container',
				'hidden_property' => 'eltdf_title_area_background_image_responsive_meta',
				'hidden_value'    => 'yes'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_background_image_parallax_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image in Parallax', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will make Title background image parallax', 'sweettooth' ),
				'parent'        => $title_area_background_image_responsive_meta_container,
				'options'       => array(
					''         => esc_html__( 'Default', 'sweettooth' ),
					'no'       => esc_html__( 'No', 'sweettooth' ),
					'yes'      => esc_html__( 'Yes', 'sweettooth' ),
					'yes_zoom' => esc_html__( 'Yes, with zoom out', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_title_area_height_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Height', 'sweettooth' ),
				'description' => esc_html__( 'Set a height for Title Area', 'sweettooth' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_subtitle_meta',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Subtitle Text', 'sweettooth' ),
				'description'   => esc_html__( 'Enter your subtitle text', 'sweettooth' ),
				'parent'        => $show_title_area_meta_container,
				'args'          => array(
					'col_width' => 6
				)
			)
		);

		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_subtitle_tag_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Subtitle Tag', 'sweettooth' ),
				'description'   => esc_html__( 'Select subtitle tag', 'sweettooth' ),
				'parent'        => $show_title_area_meta_container,
				'options'       => sweettooth_elated_get_title_tag(true, array('p' => 'p'))
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_subtitle_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Subtitle Color', 'sweettooth' ),
				'description' => esc_html__( 'Choose a color for subtitle text', 'sweettooth' ),
				'parent'      => $show_title_area_meta_container
			)
		);
		
		sweettooth_elated_add_meta_box_field(array(
			'name'        => 'eltdf_subtitle_side_padding_left_meta',
			'type'        => 'text',
			'label'       => esc_html__('Subtitle Side Padding Left', 'sweettooth'),
			'description' => esc_html__('Set left padding for subtitle area', 'sweettooth'),
			'parent'      => $show_title_area_meta_container,
			'args'        => array(
				'col_width' => 2,
				'suffix' => '%'
			)
		));

		sweettooth_elated_add_meta_box_field(array(
			'name'         => 'eltdf_subtitle_side_padding_right_meta',
			'type'         => 'text',
			'label'        => esc_html__('Subtitle Side Padding Right', 'sweettooth'),
			'description'  => esc_html__('Set right padding for subtitle area', 'sweettooth'),
			'parent'       => $show_title_area_meta_container,
			'args'         => array(
				'col_width' => 2,
				'suffix' => '%'
			)
		));

		sweettooth_elated_add_meta_box_field(array(
			'name'    => 'eltdf_subtitle_disable_small_devices_meta',
			'type'    => 'select',
			'label'   => esc_html__('Disable Subtitle on Mobile Devices', 'sweettooth'),
			'parent'  => $show_title_area_meta_container,
			'options' => sweettooth_elated_get_yes_no_select_array(false)
		));
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_title_meta', 60 );
}