<?php

/*** Post Settings ***/

if ( ! function_exists( 'sweettooth_elated_map_post_meta' ) ) {
	function sweettooth_elated_map_post_meta() {
		
		$post_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'sweettooth' ),
				'name'  => 'post-meta'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_single_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Single Post Pages', 'sweettooth' ),
				'description'   => esc_html__( 'Choose a default blog layout for single post pages', 'sweettooth' ),
				'default_value' => 'standard',
				'parent'        => $post_meta_box,
				'options'       => array(
					''                 => esc_html__( 'Default', 'sweettooth' ),
					'standard'         => esc_html__( 'Standard', 'sweettooth' ),
					'title-area-empty' => esc_html__( 'Title Area Empty', 'sweettooth' ),
					'title-area-info'  => esc_html__( 'Title Area Info', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'sweettooth' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'sweettooth' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
				'options'       => array(
					''                 => esc_html__( 'Default', 'sweettooth' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'sweettooth' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'sweettooth' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'sweettooth' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'sweettooth' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'sweettooth' )
				)
			)
		);
		
		$sweettooth_custom_sidebars = sweettooth_elated_get_custom_sidebars();
		if ( count( $sweettooth_custom_sidebars ) > 0 ) {
			sweettooth_elated_add_meta_box_field( array(
				'name'        => 'eltdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'sweettooth' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'sweettooth' ),
				'parent'      => $post_meta_box,
				'options'     => sweettooth_elated_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'sweettooth' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'sweettooth' ),
				'parent'      => $post_meta_box
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'sweettooth' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'sweettooth' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'sweettooth' ),
					'large-width'        => esc_html__( 'Large Width', 'sweettooth' ),
					'large-height'       => esc_html__( 'Large Height', 'sweettooth' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'sweettooth' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'sweettooth' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'sweettooth' ),
					'large-width' => esc_html__( 'Large Width', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'sweettooth' ),
				'parent'        => $post_meta_box,
				'options'       => sweettooth_elated_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_post_meta', 20 );
}
