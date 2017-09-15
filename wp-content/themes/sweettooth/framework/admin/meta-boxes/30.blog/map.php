<?php

if ( ! function_exists( 'sweettooth_elated_map_blog_meta' ) ) {
	function sweettooth_elated_map_blog_meta() {
		$eltd_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$eltd_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'sweettooth' ),
				'name'  => 'blog_meta'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'sweettooth' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'sweettooth' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltd_blog_categories
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'sweettooth' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'sweettooth' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltd_blog_categories,
				'args'        => array( "col_width" => 3 )
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'sweettooth' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'sweettooth' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'sweettooth' ),
					'in-grid'    => esc_html__( 'In Grid', 'sweettooth' ),
					'full-width' => esc_html__( 'Full Width', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'sweettooth' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'sweettooth' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'sweettooth' ),
					'two'   => esc_html__( '2 Columns', 'sweettooth' ),
					'three' => esc_html__( '3 Columns', 'sweettooth' ),
					'four'  => esc_html__( '4 Columns', 'sweettooth' ),
					'five'  => esc_html__( '5 Columns', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'sweettooth' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'sweettooth' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''       => esc_html__( 'Default', 'sweettooth' ),
					'normal' => esc_html__( 'Normal', 'sweettooth' ),
					'small'  => esc_html__( 'Small', 'sweettooth' ),
					'tiny'   => esc_html__( 'Tiny', 'sweettooth' ),
					'no'     => esc_html__( 'No Space', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Featured Image Proportion', 'sweettooth' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on blog lists.', 'sweettooth' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'sweettooth' ),
					'fixed'    => esc_html__( 'Fixed', 'sweettooth' ),
					'original' => esc_html__( 'Original', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'sweettooth' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'sweettooth' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'sweettooth' ),
					'standard'        => esc_html__( 'Standard', 'sweettooth' ),
					'load-more'       => esc_html__( 'Load More', 'sweettooth' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'sweettooth' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'eltdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'sweettooth' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'sweettooth' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_blog_meta', 30 );
}