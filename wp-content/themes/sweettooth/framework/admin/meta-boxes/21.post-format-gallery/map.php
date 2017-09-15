<?php

if ( ! function_exists( 'sweettooth_elated_map_post_gallery_meta' ) ) {
	
	function sweettooth_elated_map_post_gallery_meta() {
		$gallery_post_format_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'sweettooth' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		sweettooth_elated_add_multiple_images_field(
			array(
				'name'        => 'eltdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'sweettooth' ),
				'description' => esc_html__( 'Choose your gallery images', 'sweettooth' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_post_gallery_meta', 21 );
}
