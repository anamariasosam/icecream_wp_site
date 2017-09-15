<?php

if ( ! function_exists('sweettooth_elated_blog_options_map') ) {

	function sweettooth_elated_blog_options_map() {

		sweettooth_elated_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__('Blog', 'sweettooth'),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */
		$panel_blog_lists = sweettooth_elated_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists', 'sweettooth')
			)
		);

		sweettooth_elated_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label'       => esc_html__('Blog Layout for Archive Pages', 'sweettooth'),
			'description' => esc_html__('Choose a default blog layout for archived blog post lists', 'sweettooth'),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'masonry'               => esc_html__('Blog: Masonry', 'sweettooth'),
                'standard'              => esc_html__('Blog: Standard', 'sweettooth')
			)
		));

		sweettooth_elated_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout for Archive Pages', 'sweettooth'),
			'description' => esc_html__('Choose a sidebar layout for archived blog post lists', 'sweettooth'),
			'default_value' => '',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				''		            => esc_html__('Default', 'sweettooth'),
				'no-sidebar'		=> esc_html__('No Sidebar', 'sweettooth'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'sweettooth'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'sweettooth'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'sweettooth'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'sweettooth')
			)
		));
		
		$sweettooth_custom_sidebars = sweettooth_elated_get_custom_sidebars();
		if(count($sweettooth_custom_sidebars) > 0) {
			sweettooth_elated_add_admin_field(array(
				'name' => 'archive_custom_sidebar_area',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display for Archive Pages', 'sweettooth'),
				'description' => esc_html__('Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'sweettooth'),
				'parent' => $panel_blog_lists,
				'options' => sweettooth_elated_get_custom_sidebars(),
				'args'        => array(
					'select2'	=> true
				)
			));
		}

        sweettooth_elated_add_admin_field(array(
            'name'        => 'blog_masonry_layout',
            'type'        => 'select',
            'label'       => esc_html__('Masonry - Layout', 'sweettooth'),
            'default_value' => 'in-grid',
            'description' => esc_html__('Set masonry layout. Default is in grid.', 'sweettooth'),
            'parent'      => $panel_blog_lists,
            'options'     => array(
                'in-grid'    => esc_html__('In Grid', 'sweettooth'),
                'full-width' => esc_html__('Full Width', 'sweettooth')
            )
        ));
		
		sweettooth_elated_add_admin_field(array(
			'name'        => 'blog_masonry_number_of_columns',
			'type'        => 'select',
			'label'       => esc_html__('Masonry - Number of Columns', 'sweettooth'),
			'default_value' => 'four',
			'description' => esc_html__('Set number of columns for your masonry blog lists. Default value is 4 columns', 'sweettooth'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'two'   => esc_html__('2 Columns', 'sweettooth'),
				'three' => esc_html__('3 Columns', 'sweettooth'),
				'four'  => esc_html__('4 Columns', 'sweettooth'),
				'five'  => esc_html__('5 Columns', 'sweettooth')
			)
		));
		
		sweettooth_elated_add_admin_field(array(
			'name'        => 'blog_masonry_space_between_items',
			'type'        => 'select',
			'label'       => esc_html__('Masonry - Space Between Items', 'sweettooth'),
			'default_value' => 'normal',
			'description' => esc_html__('Set space size between posts for your masonry blog lists. Default value is normal', 'sweettooth'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'normal'  => esc_html__('Normal', 'sweettooth'),
				'small'   => esc_html__('Small', 'sweettooth'),
				'tiny'    => esc_html__('Tiny', 'sweettooth'),
				'no'      => esc_html__('No Space', 'sweettooth')
			)
		));

        sweettooth_elated_add_admin_field(array(
            'name'        => 'blog_list_featured_image_proportion',
            'type'        => 'select',
            'label'       => esc_html__('Featured Image Proportion', 'sweettooth'),
            'default_value' => 'fixed',
            'description' => esc_html__('Choose type of proportions you want to use for featured images on blog lists.', 'sweettooth'),
            'parent'      => $panel_blog_lists,
            'options'     => array(
                'fixed'    => esc_html__('Fixed', 'sweettooth'),
                'original' => esc_html__('Original', 'sweettooth')
            )
        ));

		sweettooth_elated_add_admin_field(array(
			'name'        => 'blog_pagination_type',
			'type'        => 'select',
			'label'       => esc_html__('Pagination Type', 'sweettooth'),
			'description' => esc_html__('Choose a pagination layout for Blog Lists', 'sweettooth'),
			'parent'      => $panel_blog_lists,
			'default_value' => 'standard',
			'options'     => array(
				'standard'		  => esc_html__('Standard', 'sweettooth'),
				'load-more'		  => esc_html__('Load More', 'sweettooth'),
				'infinite-scroll' => esc_html__('Infinite Scroll', 'sweettooth'),
				'no-pagination'   => esc_html__('No Pagination', 'sweettooth')
			)
		));
	
		sweettooth_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '40',
				'label' => esc_html__('Number of Words in Excerpt', 'sweettooth'),
				'description' => esc_html__('Enter a number of words in excerpt (article summary). Default value is 40', 'sweettooth'),
				'parent' => $panel_blog_lists,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = sweettooth_elated_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__('Blog Single', 'sweettooth')
			)
		);

        sweettooth_elated_add_admin_field(array(
            'name'        => 'blog_single_type',
            'type'        => 'select',
            'label'       => esc_html__('Blog Layout for Single Post Pages', 'sweettooth'),
            'description' => esc_html__('Choose a default blog layout for single post pages', 'sweettooth'),
            'default_value' => 'standard',
            'parent'      => $panel_blog_single,
            'options'     => array(
                'standard'              => esc_html__('Standard', 'sweettooth'),
                'title-area-empty'		=> esc_html__('Title Area Empty', 'sweettooth'),
                'title-area-info' 		=> esc_html__('Title Area Info', 'sweettooth')
            )
        ));

		sweettooth_elated_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout', 'sweettooth'),
			'description' => esc_html__('Choose a sidebar layout for Blog Single pages', 'sweettooth'),
			'default_value'	=> '',
			'parent'      => $panel_blog_single,
			'options'     => array(
				''		            => esc_html__('Default', 'sweettooth'),
				'no-sidebar'		=> esc_html__('No Sidebar', 'sweettooth'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'sweettooth'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'sweettooth'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'sweettooth'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'sweettooth')
			)
		));

		if(count($sweettooth_custom_sidebars) > 0) {
			sweettooth_elated_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar_area',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'sweettooth'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'sweettooth'),
				'parent' => $panel_blog_single,
				'options' => sweettooth_elated_get_custom_sidebars(),
				'args'        => array(
					'select2'	=> true
				)
			));
		}
		
		sweettooth_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'show_title_area_blog',
				'default_value' => '',
				'label'       => esc_html__('Show Title Area', 'sweettooth'),
				'description' => esc_html__('Enabling this option will show title area on single post pages', 'sweettooth'),
				'parent'      => $panel_blog_single,
				'options'     => sweettooth_elated_get_yes_no_select_array(),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		sweettooth_elated_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label'			=> esc_html__('Show Related Posts', 'sweettooth'),
			'description'   => esc_html__('Enabling this option will show related posts on single post pages', 'sweettooth'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		sweettooth_elated_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments Form', 'sweettooth'),
			'description'   => esc_html__('Enabling this option will show comments form on single post pages', 'sweettooth'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		sweettooth_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'no',
				'label' => esc_html__('Enable Prev/Next Single Post Navigation Links', 'sweettooth'),
				'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'sweettooth'),
				'parent' => $panel_blog_single,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = sweettooth_elated_add_admin_container(
			array(
				'name' => 'eltdf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'       => esc_html__('Enable Navigation Only in Current Category', 'sweettooth'),
				'description' => esc_html__('Limit your navigation only through current category', 'sweettooth'),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'yes',
				'label' => esc_html__('Show Author Info Box', 'sweettooth'),
				'description' => esc_html__('Enabling this option will display author name and descriptions on single post pages', 'sweettooth'),
				'parent' => $panel_blog_single,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = sweettooth_elated_add_admin_container(
			array(
				'name' => 'eltdf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label'       => esc_html__('Show Author Email', 'sweettooth'),
				'description' => esc_html__('Enabling this option will show author email', 'sweettooth'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		sweettooth_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'       => esc_html__('Show Author Social Icons', 'sweettooth'),
				'description' => esc_html__('Enabling this option will show author social icons on single post pages', 'sweettooth'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);
	}

	add_action( 'sweettooth_elated_action_options_map', 'sweettooth_elated_blog_options_map', 11);
}