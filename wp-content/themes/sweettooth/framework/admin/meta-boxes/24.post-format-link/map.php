<?php

if ( ! function_exists( 'sweettooth_elated_map_post_link_meta' ) ) {
	function sweettooth_elated_map_post_link_meta() {
		$link_post_format_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'sweettooth' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'sweettooth' ),
				'description' => esc_html__( 'Enter link', 'sweettooth' ),
				'parent'      => $link_post_format_meta_box,
			
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_post_link_meta', 24 );
}