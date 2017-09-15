<?php

if ( ! function_exists('sweettooth_elated_sidebar_options_map') ) {

	function sweettooth_elated_sidebar_options_map() {

		sweettooth_elated_add_admin_page(
			array(
				'slug' => '_sidebar_page',
				'title' => esc_html__('Sidebar Area', 'sweettooth'),
				'icon' => 'fa fa-indent'
			)
		);

		$sidebar_panel = sweettooth_elated_add_admin_panel(
			array(
				'title' => esc_html__('Sidebar Area', 'sweettooth'),
				'name' => 'sidebar',
				'page' => '_sidebar_page'
			)
		);
		
		sweettooth_elated_add_admin_field(array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__('Sidebar Layout', 'sweettooth'),
			'description'   => esc_html__('Choose a sidebar layout for pages', 'sweettooth'),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
			'options'       => array(
				'no-sidebar'        => esc_html__('No Sidebar', 'sweettooth'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'sweettooth'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'sweettooth'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'sweettooth'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'sweettooth')
			)
		));
		
		$sweettooth_custom_sidebars = sweettooth_elated_get_custom_sidebars();
		if(count($sweettooth_custom_sidebars) > 0) {
			sweettooth_elated_add_admin_field(array(
				'name' => 'custom_sidebar_area',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'sweettooth'),
				'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'sweettooth'),
				'parent' => $sidebar_panel,
				'options' => $sweettooth_custom_sidebars,
				'args'        => array(
					'select2'	=> true
				)
			));
		}
	}

	add_action('sweettooth_elated_action_options_map', 'sweettooth_elated_sidebar_options_map', 6);
}