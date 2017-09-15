<?php

if ( ! function_exists( 'sweettooth_elated_page_options_map' ) ) {
	function sweettooth_elated_page_options_map() {
		
		sweettooth_elated_add_admin_page(
			array(
				'slug'  => '_page_page',
				'title' => esc_html__( 'Page', 'sweettooth' ),
				'icon'  => 'fa fa-file-text-o'
			)
		);
		
		/***************** Page Layout - begin **********************/
		
		$panel_sidebar = sweettooth_elated_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_sidebar',
				'title' => esc_html__( 'Page Style', 'sweettooth' )
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'page_show_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'sweettooth' ),
				'default_value' => 'yes',
				'parent'        => $panel_sidebar
			)
		);
		
		/***************** Page Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		$panel_content = sweettooth_elated_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_content',
				'title' => esc_html__( 'Content Style', 'sweettooth' )
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_top_padding',
				'default_value' => '0',
				'label'         => esc_html__( 'Content Top Padding for Template in Full Width', 'sweettooth' ),
				'description'   => esc_html__( 'Enter top padding for content area for templates in full width. If you set this value then it\'s important to set also Content top padding for mobile header value', 'sweettooth' ),
				'args'          => array(
					'suffix'    => 'px',
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_top_padding_in_grid',
				'default_value' => '40',
				'label'         => esc_html__( 'Content Top Padding for Templates in Grid', 'sweettooth' ),
				'description'   => esc_html__( 'Enter top padding for content area for Templates in grid. If you set this value then it\'s important to set also Content top padding for mobile header value', 'sweettooth' ),
				'args'          => array(
					'suffix'    => 'px',
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_top_padding_mobile',
				'default_value' => '40',
				'label'         => esc_html__( 'Content Top Padding for Mobile Header', 'sweettooth' ),
				'description'   => esc_html__( 'Enter top padding for content area for Mobile Header', 'sweettooth' ),
				'args'          => array(
					'suffix'    => 'px',
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		/***************** Content Layout - end **********************/
	}
	
	add_action( 'sweettooth_elated_action_options_map', 'sweettooth_elated_page_options_map', 5 );
}


if ( ! function_exists( 'sweettooth_elated_paspartout_page_options' ) ) {
	function sweettooth_elated_paspartout_page_options($style) {
		$id = sweettooth_elated_get_page_id();
		$class_id = sweettooth_elated_get_page_id();

		$class_prefix = sweettooth_elated_get_unique_page_class($class_id);

		$content_selector = array(
			$class_prefix . '.eltdf-paspartu-enabled .eltdf-wrapper'
		);

		$paspartu_style = array();

		$paspartu_color = get_post_meta($id, "eltdf_paspartu_color", true);
		if (!empty($paspartu_color)) {
			$paspartu_style['background-color'] = $paspartu_color;
		}

		$paspartu_width = get_post_meta($id, "eltdf_paspartu_width", true);
		if ($paspartu_width !== '') {
			$paspartu_style['padding'] = $paspartu_width.'%';
		}

		$current_style = sweettooth_elated_dynamic_css($content_selector, $paspartu_style);

		return $style.$current_style;
	}

	add_filter('sweettooth_elated_filter_add_page_custom_style', 'sweettooth_elated_paspartout_page_options');
}