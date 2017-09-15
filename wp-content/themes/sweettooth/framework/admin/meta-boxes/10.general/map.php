<?php

if ( ! function_exists( 'sweettooth_elated_map_general_meta' ) ) {
	function sweettooth_elated_map_general_meta() {
		
		$general_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'sweettooth_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'General', 'sweettooth' ),
				'name'  => 'general_meta'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'sweettooth' ),
				'parent'        => $general_meta_box,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$eltdf_content_padding_group = sweettooth_elated_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'sweettooth' ),
				'description' => esc_html__( 'Define styles for Content area', 'sweettooth' ),
				'parent'      => $general_meta_box
			)
		);
		
		$eltdf_content_padding_row = sweettooth_elated_add_admin_row(
			array(
				'name'   => 'eltdf_content_padding_row',
				'next'   => true,
				'parent' => $eltdf_content_padding_group
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'   => 'eltdf_page_content_top_padding',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Content Top Padding', 'sweettooth' ),
				'parent' => $eltdf_content_padding_row,
				'args'   => array(
					'suffix' => 'px'
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'    => 'eltdf_page_content_top_padding_mobile',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Set this top padding for mobile header', 'sweettooth' ),
				'parent'  => $eltdf_content_padding_row,
				'options' => sweettooth_elated_get_yes_no_select_array( false )
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'sweettooth' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'sweettooth' ),
				'parent'      => $general_meta_box
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'sweettooth' ),
				'description' => esc_html__( 'Choose background color for page content', 'sweettooth' ),
				'parent'      => $general_meta_box
			)
		);

		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'sweettooth' ),
				'description' => esc_html__( 'Choose an image to be displayed in background', 'sweettooth' ),
				'parent'      => $general_meta_box
			)
		);

		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_background_image_position_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Page Background Image Position', 'sweettooth' ),
				'description' => esc_html__( 'Set image position. Default is - right bottom', 'sweettooth' ),
				'parent'      => $general_meta_box
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'    => 'eltdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'sweettooth' ),
				'parent'  => $general_meta_box,
				'options' => sweettooth_elated_get_yes_no_select_array(),
				'args'    => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_boxed_container_meta',
						'no'  => '#eltdf_boxed_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_boxed_container_meta'
					)
				)
			)
		);

		$boxed_container_meta = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $general_meta_box,
				'name'            => 'boxed_container_meta',
				'hidden_property' => 'eltdf_boxed_meta',
				'hidden_values'   => array(
					'',
					'no'
				)
			)
		);

		$eltdf_content_margin_group = sweettooth_elated_add_admin_group(
			array(
				'name'        => 'content_margin_group',
				'title'       => esc_html__( 'Container Margin', 'sweettooth' ),
				'description' => esc_html__( 'Define margin for Boxed Container area', 'sweettooth' ),
				'parent'      => $boxed_container_meta
			)
		);

		$eltdf_content_margin_row = sweettooth_elated_add_admin_row(
			array(
				'name'   => 'eltdf_content_margin_row',
				'next'   => true,
				'parent' => $eltdf_content_margin_group
			)
		);

		sweettooth_elated_add_meta_box_field(
			array(
				'name'   => 'eltdf_page_container_top_margin',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Container Top Margin', 'sweettooth' ),
				'parent' => $eltdf_content_margin_row,
				'args'   => array(
					'suffix' => 'px'
				)
			)
		);

		sweettooth_elated_add_meta_box_field(
			array(
				'name'   => 'eltdf_page_container_bottom_margin',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Container Bottom Margin', 'sweettooth' ),
				'parent' => $eltdf_content_margin_row,
				'args'   => array(
					'suffix' => 'px'
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_background_color_in_box_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'sweettooth' ),
				'description' => esc_html__( 'Choose the page background color outside box', 'sweettooth' ),
				'parent'      => $boxed_container_meta
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_boxed_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Page Background Image', 'sweettooth' ),
				'description' => esc_html__( 'Choose an image to be displayed in background', 'sweettooth' ),
				'parent'      => $boxed_container_meta
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_boxed_pattern_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Pattern', 'sweettooth' ),
				'description' => esc_html__( 'Choose an image to be used as background pattern', 'sweettooth' ),
				'parent'      => $boxed_container_meta
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_boxed_background_image_attachment_meta',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__( 'Background Image Attachment', 'sweettooth' ),
				'description'   => esc_html__( 'Choose background image attachment', 'sweettooth' ),
				'parent'        => $boxed_container_meta,
				'options'       => array(
					''       => esc_html__( 'Default', 'sweettooth' ),
					'fixed'  => esc_html__( 'Fixed', 'sweettooth' ),
					'scroll' => esc_html__( 'Scroll', 'sweettooth' )
				)
			)
		);

		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'sweettooth' ),
				'parent'        => $general_meta_box,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_eltdf_paspartu_container"
				)
			)
		);

		$paspartu_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $general_meta_box,
				'name'            => 'eltdf_paspartu_container',
				'hidden_property' => 'eltdf_paspartu',
				'hidden_value'    => 'no'
			)
		);

		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_paspartu_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Passepartout Color', 'sweettooth' ),
				'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'sweettooth' ),
				'parent'      => $paspartu_container
			)
		);

		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_paspartu_width',
				'type'        => 'text',
				'label'       => esc_html__( 'Passepartout Size', 'sweettooth' ),
				'description' => esc_html__( 'Enter size amount for passepartout', 'sweettooth' ),
				'parent'      => $paspartu_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		sweettooth_elated_add_meta_box_field(
			array(
				'parent'        => $paspartu_container,
				'type'          => 'yesno',
				'default_value' => 'no',
				'name'          => 'eltdf_disable_top_paspartu',
				'label'         => esc_html__( 'Disable Top Passepartout', 'sweettooth' )
			)
		);


		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'sweettooth' ),
				'parent'        => $general_meta_box,
				'options'       => sweettooth_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_page_transitions_container_meta',
						'no'  => '#eltdf_page_transitions_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_page_transitions_container_meta'
					)
				)
			)
		);
		
		$page_transitions_container_meta = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $general_meta_box,
				'name'            => 'page_transitions_container_meta',
				'hidden_property' => 'eltdf_smooth_page_transitions_meta',
				'hidden_values'   => array(
					'',
					'no'
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_transition_preloader_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Enable Preloading Animation', 'sweettooth' ),
				'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'sweettooth' ),
				'parent'      => $page_transitions_container_meta,
				'options'     => sweettooth_elated_get_yes_no_select_array(),
				'args'        => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_page_transition_preloader_container_meta',
						'no'  => '#eltdf_page_transition_preloader_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_page_transition_preloader_container_meta'
					)
				)
			)
		);
		
		$page_transition_preloader_container_meta = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $page_transitions_container_meta,
				'name'            => 'page_transition_preloader_container_meta',
				'hidden_property' => 'eltdf_page_transition_preloader_meta',
				'hidden_values'   => array(
					'',
					'no'
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'   => 'eltdf_smooth_pt_bgnd_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Page Loader Background Color', 'sweettooth' ),
				'parent' => $page_transition_preloader_container_meta
			)
		);
		
		$group_pt_spinner_animation_meta = sweettooth_elated_add_admin_group(
			array(
				'name'        => 'group_pt_spinner_animation_meta',
				'title'       => esc_html__( 'Loader Style', 'sweettooth' ),
				'description' => esc_html__( 'Define styles for loader spinner animation', 'sweettooth' ),
				'parent'      => $page_transition_preloader_container_meta
			)
		);
		
		$row_pt_spinner_animation_meta = sweettooth_elated_add_admin_row(
			array(
				'name'   => 'row_pt_spinner_animation_meta',
				'parent' => $group_pt_spinner_animation_meta
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'type'    => 'selectsimple',
				'name'    => 'eltdf_smooth_pt_spinner_type_meta',
				'label'   => esc_html__( 'Spinner Type', 'sweettooth' ),
				'parent'  => $row_pt_spinner_animation_meta,
				'options' => array(
					''                      => esc_html__( 'Default', 'sweettooth' ),
					'rotate_circles'        => esc_html__( 'Rotate Circles', 'sweettooth' ),
					'pulse'                 => esc_html__( 'Pulse', 'sweettooth' ),
					'double_pulse'          => esc_html__( 'Double Pulse', 'sweettooth' ),
					'cube'                  => esc_html__( 'Cube', 'sweettooth' ),
					'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'sweettooth' ),
					'stripes'               => esc_html__( 'Stripes', 'sweettooth' ),
					'wave'                  => esc_html__( 'Wave', 'sweettooth' ),
					'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'sweettooth' ),
					'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'sweettooth' ),
					'atom'                  => esc_html__( 'Atom', 'sweettooth' ),
					'clock'                 => esc_html__( 'Clock', 'sweettooth' ),
					'mitosis'               => esc_html__( 'Mitosis', 'sweettooth' ),
					'lines'                 => esc_html__( 'Lines', 'sweettooth' ),
					'fussion'               => esc_html__( 'Fussion', 'sweettooth' ),
					'wave_circles'          => esc_html__( 'Wave Circles', 'sweettooth' ),
					'pulse_circles'         => esc_html__( 'Pulse Circles', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'type'   => 'colorsimple',
				'name'   => 'eltdf_smooth_pt_spinner_color_meta',
				'label'  => esc_html__( 'Spinner Color', 'sweettooth' ),
				'parent' => $row_pt_spinner_animation_meta
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_transition_fadeout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Enable Fade Out Animation', 'sweettooth' ),
				'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'sweettooth' ),
				'options'     => sweettooth_elated_get_yes_no_select_array(),
				'parent'      => $page_transitions_container_meta
			
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'sweettooth' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'sweettooth' ),
				'parent'      => $general_meta_box,
				'options'     => sweettooth_elated_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_general_meta', 10 );
}