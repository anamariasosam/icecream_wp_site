<?php

if ( ! function_exists('sweettooth_elated_sidearea_options_map') ) {

	function sweettooth_elated_sidearea_options_map() {

		sweettooth_elated_add_admin_page(
			array(
				'slug' => '_side_area_page',
				'title' => esc_html__('Side Area', 'sweettooth'),
				'icon' => 'fa fa-indent'
			)
		);

		$side_area_panel = sweettooth_elated_add_admin_panel(
			array(
				'title' => esc_html__('Side Area', 'sweettooth'),
				'name' => 'side_area',
				'page' => '_side_area_page'
			)
		);

		$side_area_icon_style_group = sweettooth_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_style_group',
				'title' => esc_html__('Side Area Icon Style', 'sweettooth'),
				'description' => esc_html__('Define styles for Side Area icon', 'sweettooth')
			)
		);

		$side_area_icon_style_row1 = sweettooth_elated_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row1'
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_color',
				'label' => esc_html__('Color', 'sweettooth')
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_hover_color',
				'label' => esc_html__('Hover Color', 'sweettooth')
			)
		);

		$side_area_icon_style_row2 = sweettooth_elated_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row2',
				'next'		=> true
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_color',
				'label' => esc_html__('Close Icon Color', 'sweettooth')
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_hover_color',
				'label' => esc_html__('Close Icon Hover Color', 'sweettooth')
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_width',
				'default_value' => '',
				'label' => esc_html__('Side Area Width', 'sweettooth'),
				'description' => esc_html__('Enter a width for Side Area', 'sweettooth'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'sidearea_background_image',
				'type'        => 'image',
				'label'       => esc_html__('Background Image', 'sweettooth'),
				'description' => esc_html__('Choose an Image for Side area', 'sweettooth')
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'color',
				'name' => 'side_area_background_color',
				'label' => esc_html__('Background Color', 'sweettooth'),
				'description' => esc_html__('Choose a background color for Side Area', 'sweettooth')
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_padding',
				'label' => esc_html__('Padding', 'sweettooth'),
				'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'sweettooth'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'selectblank',
				'name' => 'side_area_aligment',
				'default_value' => '',
				'label' => esc_html__('Text Alignment', 'sweettooth'),
				'description' => esc_html__('Choose text alignment for side area', 'sweettooth'),
				'options' => array(
					'' => esc_html__('Default', 'sweettooth'),
					'left' => esc_html__('Left', 'sweettooth'),
					'center' => esc_html__('Center', 'sweettooth'),
					'right' => esc_html__('Right', 'sweettooth')
				)
			)
		);
	}

	add_action('sweettooth_elated_action_options_map', 'sweettooth_elated_sidearea_options_map', 8);
}