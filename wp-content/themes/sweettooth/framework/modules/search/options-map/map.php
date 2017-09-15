<?php

if ( ! function_exists('sweettooth_elated_search_options_map') ) {

	function sweettooth_elated_search_options_map() {

		sweettooth_elated_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => esc_html__('Search', 'sweettooth'),
				'icon' => 'fa fa-search'
			)
		);

		$search_page_panel = sweettooth_elated_add_admin_panel(
			array(
				'title' => esc_html__('Search Page', 'sweettooth'),
				'name' => 'search_template',
				'page' => '_search_page'
			)
		);

		sweettooth_elated_add_admin_field(array(
			'name'        => 'search_page_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout', 'sweettooth'),
            'description' 	=> esc_html__("Choose a sidebar layout for search page", 'sweettooth'),
            'default_value' => 'no-sidebar',
            'options'       => array(
                'no-sidebar'        => esc_html__('No Sidebar', 'sweettooth'),
                'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'sweettooth'),
                'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'sweettooth'),
                'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'sweettooth'),
                'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'sweettooth')
            ),
			'parent'      => $search_page_panel
		));

        $sweettooth_custom_sidebars = sweettooth_elated_get_custom_sidebars();
        if(count($sweettooth_custom_sidebars) > 0) {
            sweettooth_elated_add_admin_field(array(
                'name' => 'search_custom_sidebar_area',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'sweettooth'),
                'description' => esc_html__('Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'sweettooth'),
                'parent' => $search_page_panel,
                'options' => $sweettooth_custom_sidebars,
				'args' => array(
					'select2' => true
				)
            ));
        }

		$search_panel = sweettooth_elated_add_admin_panel(
			array(
				'title' => esc_html__('Search', 'sweettooth'),
				'name' => 'search',
				'page' => '_search_page'
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_type',
				'default_value'	=> 'fullscreen',
				'label' 		=> esc_html__('Select Search Type', 'sweettooth'),
				'description' 	=> esc_html__("Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with Vertical Header)", 'sweettooth'),
				'options' 		=> array(
					'fullscreen' => esc_html__('Fullscreen Search', 'sweettooth'),
					'slide-from-header-bottom' => esc_html__('Slide From Header Bottom', 'sweettooth'),
                    'covers-header' => esc_html__('Search Covers Header', 'sweettooth'),
                    'slide-from-window-top' => esc_html__('Slide from Window Top' , 'sweettooth')
				)
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'parent'      => $search_panel,
				'name'        => 'search_background_image',
				'type'        => 'image',
				'label'       => esc_html__('Background Image', 'sweettooth'),
				'description' => esc_html__('Choose an Image for Full Screen Search', 'sweettooth')
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_icon_pack',
				'default_value'	=> 'font_elegant',
				'label'			=> esc_html__('Search Icon Pack', 'sweettooth'),
				'description'	=> esc_html__('Choose icon pack for search icon', 'sweettooth'),
				'options'		=> sweettooth_elated_icon_collections()->getIconCollectionsExclude(array('linea_icons'))
			)
		);

        sweettooth_elated_add_admin_field(
            array(
                'parent'		=> $search_panel,
                'type'			=> 'yesno',
                'name'			=> 'search_in_grid',
                'default_value'	=> 'yes',
                'label'			=> esc_html__('Enable Grid Layout', 'sweettooth'),
                'description'	=> esc_html__('Set search area to be in grid. (Applied for Search covers header and Slide from Window Top types.', 'sweettooth'),
            )
        );
		
		sweettooth_elated_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_icon_title',
				'title'		=> esc_html__('Initial Search Icon in Header', 'sweettooth')
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'text',
				'name'			=> 'header_search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size', 'sweettooth'),
				'description'	=> esc_html__('Set size for icon', 'sweettooth'),
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);
		
		$search_icon_color_group = sweettooth_elated_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Colors', 'sweettooth'),
				'description' => esc_html__('Define color style for icon', 'sweettooth'),
				'name'		=> 'search_icon_color_group'
			)
		);
		
		$search_icon_color_row = sweettooth_elated_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'	=> $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_color',
				'label'		=> esc_html__('Color', 'sweettooth')
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_hover_color',
				'label'		=> esc_html__('Hover Color', 'sweettooth')
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'enable_search_icon_text',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Enable Search Icon Text', 'sweettooth'),
				'description'	=> esc_html__("Enable this option to show 'Search' text next to search icon in header", 'sweettooth'),
				'args'			=> array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_enable_search_icon_text_container'
				)
			)
		);
		
		$enable_search_icon_text_container = sweettooth_elated_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'enable_search_icon_text_container',
				'hidden_property'	=> 'enable_search_icon_text',
				'hidden_value'		=> 'no'
			)
		);
		
		$enable_search_icon_text_group = sweettooth_elated_add_admin_group(
			array(
				'parent'	=> $enable_search_icon_text_container,
				'title'		=> esc_html__('Search Icon Text', 'sweettooth'),
				'name'		=> 'enable_search_icon_text_group',
				'description'	=> esc_html__('Define style for search icon text', 'sweettooth')
			)
		);
		
		$enable_search_icon_text_row = sweettooth_elated_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color',
				'label'			=> esc_html__('Text Color', 'sweettooth')
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color_hover',
				'label'			=> esc_html__('Text Hover Color', 'sweettooth')
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_font_size',
				'label'			=> esc_html__('Font Size', 'sweettooth'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_line_height',
				'label'			=> esc_html__('Line Height', 'sweettooth'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
		
		$enable_search_icon_text_row2 = sweettooth_elated_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row2',
				'next'		=> true
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_text_transform',
				'label'			=> esc_html__('Text Transform', 'sweettooth'),
				'default_value'	=> '',
				'options'		=> sweettooth_elated_get_text_transform_array()
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_icon_text_google_fonts',
				'label'			=> esc_html__('Font Family', 'sweettooth'),
				'default_value'	=> '-1',
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_font_style',
				'label'			=> esc_html__('Font Style', 'sweettooth'),
				'default_value'	=> '',
				'options'		=> sweettooth_elated_get_font_style_array(),
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_font_weight',
				'label'			=> esc_html__('Font Weight', 'sweettooth'),
				'default_value'	=> '',
				'options'		=> sweettooth_elated_get_font_weight_array(),
			)
		);
		
		$enable_search_icon_text_row3 = sweettooth_elated_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row3',
				'next'		=> true
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row3,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_letter_spacing',
				'label'			=> esc_html__('Letter Spacing', 'sweettooth'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
	}

	add_action('sweettooth_elated_action_options_map', 'sweettooth_elated_search_options_map', 7);
}