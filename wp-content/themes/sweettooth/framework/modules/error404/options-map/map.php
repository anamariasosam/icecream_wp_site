<?php

if ( ! function_exists('sweettooth_elated_error_404_options_map') ) {

	function sweettooth_elated_error_404_options_map() {

		sweettooth_elated_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__('404 Error Page', 'sweettooth'),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_header = sweettooth_elated_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_header',
			'title'	=> esc_html__('Header', 'sweettooth')
		));

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'color',
				'name' => '404_menu_area_background_color_header',
				'label' => esc_html__('Background Color', 'sweettooth'),
				'description' => esc_html__('Choose a background color for header area', 'sweettooth')
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'text',
				'name' => '404_menu_area_background_transparency_header',
				'default_value' => '',
				'label' => esc_html__('Background Transparency', 'sweettooth'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'sweettooth'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'color',
				'name' => '404_menu_area_border_color_header',
				'default_value' => '',
				'label' => esc_html__('Border Color', 'sweettooth'),
				'description' => esc_html__('Choose a border bottom color for header area', 'sweettooth')
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'select',
				'name' => '404_header_style',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'sweettooth'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'sweettooth'),
				'options' => array(
					'' => esc_html__('Default', 'sweettooth'),
					'light-header' => esc_html__('Light', 'sweettooth'),
					'dark-header' => esc_html__('Dark', 'sweettooth')
				)
			)
		);

		$panel_404_options = sweettooth_elated_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title'	=> esc_html__('404 Page Options', 'sweettooth')
		));

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'color',
				'name' => '404_page_background_color',
				'label' => esc_html__('Background Color', 'sweettooth')
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_background_image',
				'label' => esc_html__('Background Image', 'sweettooth'),
				'description' => esc_html__('Choose a background image for 404 page', 'sweettooth')
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_background_pattern_image',
				'label' => esc_html__('Pattern Background Image', 'sweettooth'),
				'description' => esc_html__('Choose a pattern image for 404 page', 'sweettooth')
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_title_image',
				'label' => esc_html__('Title Image', 'sweettooth'),
				'description' => esc_html__('Choose a background image for displaying above 404 page Title', 'sweettooth')
			)
		);

		sweettooth_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_title',
			'default_value' => '',
			'label' => esc_html__('Title', 'sweettooth'),
			'description' => esc_html__('Enter title for 404 page. Default label is "404".', 'sweettooth')
		));

		$first_level_group = sweettooth_elated_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => 'first_level_group',
				'title' => esc_html__('Title Style', 'sweettooth'),
				'description' => esc_html__('Define styles for 404 page title', 'sweettooth')
			)
		);

		$first_level_row1 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => '404_title_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'sweettooth'),
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'fontsimple',
				'name' => '404_title_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'sweettooth'),
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'textsimple',
				'name' => '404_title_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'sweettooth'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'textsimple',
				'name' => '404_title_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'sweettooth'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_row2 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'sweettooth'),
				'options' => sweettooth_elated_get_font_style_array()
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'sweettooth'),
				'options' => sweettooth_elated_get_font_weight_array()
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'textsimple',
				'name' => '404_title_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'sweettooth'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'sweettooth'),
				'options' => sweettooth_elated_get_text_transform_array()
			)
		);

		sweettooth_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_subtitle',
			'default_value' => '',
			'label' => esc_html__('Subtitle', 'sweettooth'),
			'description' => esc_html__('Enter subtitle for 404 page. Default label is "PAGE NOT FOUND".', 'sweettooth')
		));

		$second_level_group = sweettooth_elated_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => 'second_level_group',
				'title' => esc_html__('Subtitle Style', 'sweettooth'),
				'description' => esc_html__('Define styles for 404 page subtitle', 'sweettooth')
			)
		);

		$second_level_row1 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => '404_subtitle_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'sweettooth'),
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'fontsimple',
				'name' => '404_subtitle_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'sweettooth'),
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'textsimple',
				'name' => '404_subtitle_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'sweettooth'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'textsimple',
				'name' => '404_subtitle_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'sweettooth'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row2 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_subtitle_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'sweettooth'),
				'options' => sweettooth_elated_get_font_style_array()
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_subtitle_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'sweettooth'),
				'options' => sweettooth_elated_get_font_weight_array()
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => '404_subtitle_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'sweettooth'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_subtitle_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'sweettooth'),
				'options' => sweettooth_elated_get_text_transform_array()
			)
		);

		sweettooth_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_text',
			'default_value' => '',
			'label' => esc_html__('Text', 'sweettooth'),
			'description' => esc_html__('Enter text for 404 page.', 'sweettooth')
		));

		$third_level_group = sweettooth_elated_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => '$third_level_group',
				'title' => esc_html__('Text Style', 'sweettooth'),
				'description' => esc_html__('Define styles for 404 page text', 'sweettooth')
			)
		);

		$third_level_row1 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => '$third_level_row1'
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => '404_text_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'sweettooth'),
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'fontsimple',
				'name' => '404_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'sweettooth'),
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'textsimple',
				'name' => '404_text_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'sweettooth'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'textsimple',
				'name' => '404_text_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'sweettooth'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row2 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => '$third_level_row2',
				'next' => true
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'sweettooth'),
				'options' => sweettooth_elated_get_font_style_array()
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'sweettooth'),
				'options' => sweettooth_elated_get_font_weight_array()
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => '404_text_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'sweettooth'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'sweettooth'),
				'options' => sweettooth_elated_get_text_transform_array()
			)
		);

		sweettooth_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'label' => esc_html__('Back to Home Button Label', 'sweettooth'),
			'description' => esc_html__('Enter label for "BACK TO HOME" button', 'sweettooth')
		));
	}

	add_action( 'sweettooth_elated_action_options_map', 'sweettooth_elated_error_404_options_map', 14);
}