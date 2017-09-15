<?php

if ( ! function_exists('sweettooth_elated_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function sweettooth_elated_footer_options_map() {

		sweettooth_elated_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__('Footer', 'sweettooth'),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = sweettooth_elated_add_admin_panel(
			array(
				'title' => esc_html__('Footer', 'sweettooth'),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'yes',
				'label' => esc_html__('Footer in Grid', 'sweettooth'),
				'description' => esc_html__('Enabling this option will place Footer content in grid', 'sweettooth'),
				'parent' => $footer_panel,
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Top', 'sweettooth'),
				'description' => esc_html__('Enabling this option will show Footer Top area', 'sweettooth'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = sweettooth_elated_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'parent' => $show_footer_top_container,
				'default_value' => '3',
				'label' => esc_html__('Footer Top Columns', 'sweettooth'),
				'description' => esc_html__('Choose number of columns for Footer Top area', 'sweettooth'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4'
				)
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_column_1_alignment',
				'default_value' => 'left',
				'label' => esc_html__('Footer Top Columns 1 Alignment', 'sweettooth'),
				'description' => esc_html__('Text Alignment in Footer Column 1', 'sweettooth'),
				'options' => array(
					'left'   => esc_html__('Left', 'sweettooth'),
					'center' => esc_html__('Center', 'sweettooth'),
					'right'  => esc_html__('Right', 'sweettooth')
				),
				'parent' => $show_footer_top_container,
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_column_2_alignment',
				'default_value' => 'left',
				'label' => esc_html__('Footer Top Columns 2 Alignment', 'sweettooth'),
				'description' => esc_html__('Text Alignment in Footer Column 2', 'sweettooth'),
				'options' => array(
					'left'   => esc_html__('Left', 'sweettooth'),
					'center' => esc_html__('Center', 'sweettooth'),
					'right'  => esc_html__('Right', 'sweettooth')
				),
				'parent' => $show_footer_top_container,
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_column_3_alignment',
				'default_value' => 'left',
				'label' => esc_html__('Footer Top Columns 3 Alignment', 'sweettooth'),
				'description' => esc_html__('Text Alignment in Footer Column 3', 'sweettooth'),
				'options' => array(
					'left'   => esc_html__('Left', 'sweettooth'),
					'center' => esc_html__('Center', 'sweettooth'),
					'right'  => esc_html__('Right', 'sweettooth')
				),
				'parent' => $show_footer_top_container,
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_column_4_alignment',
				'default_value' => 'left',
				'label' => esc_html__('Footer Top Columns 4 Alignment', 'sweettooth'),
				'description' => esc_html__('Text Alignment in Footer Column 4', 'sweettooth'),
				'options' => array(
					'left'   => esc_html__('Left', 'sweettooth'),
					'center' => esc_html__('Center', 'sweettooth'),
					'right'  => esc_html__('Right', 'sweettooth')
				),
				'parent' => $show_footer_top_container,
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label' => esc_html__('Footer Top Columns Alignment', 'sweettooth'),
				'description' => esc_html__('Text Alignment in Footer Columns', 'sweettooth'),
				'options' => array(
					''       => esc_html__('Default', 'sweettooth'),
					'left'   => esc_html__('Left', 'sweettooth'),
					'center' => esc_html__('Center', 'sweettooth'),
					'right'  => esc_html__('Right', 'sweettooth')
				),
				'parent' => $show_footer_top_container,
			)
		);

		sweettooth_elated_add_admin_field(array(
			'name' => 'footer_top_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'sweettooth'),
			'description' => esc_html__('Set background color for top footer area', 'sweettooth'),
			'parent' => $show_footer_top_container
		));

		sweettooth_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Bottom', 'sweettooth'),
				'description' => esc_html__('Enabling this option will show Footer Bottom area', 'sweettooth'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = sweettooth_elated_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		sweettooth_elated_add_admin_field(array(
			'name' => 'footer_bottom_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'sweettooth'),
			'description' => esc_html__('Set background color for bottom footer area', 'sweettooth'),
			'parent' => $show_footer_bottom_container
		));
	}

	add_action( 'sweettooth_elated_action_options_map', 'sweettooth_elated_footer_options_map', 9);
}