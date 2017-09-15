<?php

if ( ! function_exists( 'sweettooth_elated_map_post_video_meta' ) ) {
	function sweettooth_elated_map_post_video_meta() {
		$video_post_format_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'sweettooth' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'sweettooth' ),
				'description'   => esc_html__( 'Choose video type', 'sweettooth' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'sweettooth' ),
					'self'            => esc_html__( 'Self Hosted', 'sweettooth' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#eltdf_eltdf_video_self_hosted_container',
						'self'            => '#eltdf_eltdf_video_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#eltdf_eltdf_video_embedded_container',
						'self'            => '#eltdf_eltdf_video_self_hosted_container'
					)
				)
			)
		);
		
		$eltdf_video_embedded_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'eltdf_video_embedded_container',
				'hidden_property' => 'eltdf_video_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$eltdf_video_self_hosted_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'eltdf_video_self_hosted_container',
				'hidden_property' => 'eltdf_video_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'sweettooth' ),
				'description' => esc_html__( 'Enter Video URL', 'sweettooth' ),
				'parent'      => $eltdf_video_embedded_container,
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'sweettooth' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'sweettooth' ),
				'parent'      => $eltdf_video_self_hosted_container,
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_post_video_meta', 22 );
}