<?php

if ( ! function_exists( 'sweettooth_elated_mobile_header_options_map' ) ) {
	function sweettooth_elated_mobile_header_options_map() {
		
		$panel_mobile_header = sweettooth_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Mobile Header', 'sweettooth' ),
				'name'  => 'panel_mobile_header',
				'page'  => '_mobile_header'
			)
		);
		
		$mobile_header_group = sweettooth_elated_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_group',
				'title'  => esc_html__( 'Mobile Header Styles', 'sweettooth' )
			)
		);
		
		$mobile_header_row1 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $mobile_header_group,
				'name'   => 'mobile_header_row1'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_header_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Height', 'sweettooth' ),
				'parent' => $mobile_header_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_header_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'sweettooth' ),
				'parent' => $mobile_header_row1
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_header_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'sweettooth' ),
				'parent' => $mobile_header_row1
			)
		);
		
		$mobile_menu_group = sweettooth_elated_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_menu_group',
				'title'  => esc_html__( 'Mobile Menu Styles', 'sweettooth' )
			)
		);
		
		$mobile_menu_row1 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $mobile_menu_group,
				'name'   => 'mobile_menu_row1'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_menu_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'sweettooth' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_menu_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'sweettooth' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_menu_separator_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Menu Item Separator Color', 'sweettooth' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'mobile_logo_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Header', 'sweettooth' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 1024px', 'sweettooth' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'mobile_logo_height_phones',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Devices', 'sweettooth' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 480px', 'sweettooth' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		sweettooth_elated_add_admin_section_title(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_fonts_title',
				'title'  => esc_html__( 'Typography', 'sweettooth' )
			)
		);
		
		$first_level_group = sweettooth_elated_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'first_level_group',
				'title'       => esc_html__( '1st Level Menu', 'sweettooth' ),
				'description' => esc_html__( 'Define styles for 1st level in Mobile Menu Navigation', 'sweettooth' )
			)
		);
		
		$first_level_row1 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'sweettooth' ),
				'parent' => $first_level_row1
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'sweettooth' ),
				'parent' => $first_level_row1
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'sweettooth' ),
				'parent' => $first_level_row1
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'sweettooth' ),
				'parent' => $first_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$first_level_row2 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'sweettooth' ),
				'parent' => $first_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'    => 'mobile_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'sweettooth' ),
				'parent'  => $first_level_row2,
				'options' => sweettooth_elated_get_text_transform_array()
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'    => 'mobile_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'sweettooth' ),
				'parent'  => $first_level_row2,
				'options' => sweettooth_elated_get_font_style_array()
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'    => 'mobile_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'sweettooth' ),
				'parent'  => $first_level_row2,
				'options' => sweettooth_elated_get_font_weight_array()
			)
		);
		
		$first_level_row3 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'sweettooth' ),
				'default_value' => '',
				'parent'        => $first_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_group = sweettooth_elated_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Dropdown Menu', 'sweettooth' ),
				'description' => esc_html__( 'Define styles for drop down menu items in Mobile Menu Navigation', 'sweettooth' )
			)
		);
		
		$second_level_row1 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'sweettooth' ),
				'parent' => $second_level_row1
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'sweettooth' ),
				'parent' => $second_level_row1
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'sweettooth' ),
				'parent' => $second_level_row1
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'sweettooth' ),
				'parent' => $second_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$second_level_row2 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'sweettooth' ),
				'parent' => $second_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'sweettooth' ),
				'parent'  => $second_level_row2,
				'options' => sweettooth_elated_get_text_transform_array()
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'sweettooth' ),
				'parent'  => $second_level_row2,
				'options' => sweettooth_elated_get_font_style_array()
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'sweettooth' ),
				'parent'  => $second_level_row2,
				'options' => sweettooth_elated_get_font_weight_array()
			)
		);
		
		$second_level_row3 = sweettooth_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_dropdown_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'sweettooth' ),
				'default_value' => '',
				'parent'        => $second_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		sweettooth_elated_add_admin_section_title(
			array(
				'name'   => 'mobile_opener_panel',
				'parent' => $panel_mobile_header,
				'title'  => esc_html__( 'Mobile Menu Opener', 'sweettooth' )
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'mobile_menu_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Mobile Navigation Title', 'sweettooth' ),
				'description' => esc_html__( 'Enter title for mobile menu navigation', 'sweettooth' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_icon_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Color', 'sweettooth' ),
				'parent' => $panel_mobile_header
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'mobile_icon_hover_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Hover Color', 'sweettooth' ),
				'parent' => $panel_mobile_header
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_additional_header_main_navigation_options_map', 'sweettooth_elated_mobile_header_options_map', 5 );
}