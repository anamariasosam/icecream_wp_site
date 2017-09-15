<?php

if ( ! function_exists( 'sweettooth_elated_map_post_quote_meta' ) ) {
	function sweettooth_elated_map_post_quote_meta() {
		$quote_post_format_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'sweettooth' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'sweettooth' ),
				'description' => esc_html__( 'Enter Quote text', 'sweettooth' ),
				'parent'      => $quote_post_format_meta_box,
			
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'sweettooth' ),
				'description' => esc_html__( 'Enter Quote author', 'sweettooth' ),
				'parent'      => $quote_post_format_meta_box,
			)
		);

		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author Position', 'sweettooth' ),
				'description' => esc_html__( 'Enter Quote author', 'sweettooth' ),
				'parent'      => $quote_post_format_meta_box,
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_post_quote_meta', 25 );
}