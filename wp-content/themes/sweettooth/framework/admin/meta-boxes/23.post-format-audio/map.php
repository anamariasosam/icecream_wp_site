<?php

if ( ! function_exists( 'sweettooth_elated_map_post_audio_meta' ) ) {
	function sweettooth_elated_map_post_audio_meta() {
		$audio_post_format_meta_box = sweettooth_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'sweettooth' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'sweettooth' ),
				'description'   => esc_html__( 'Choose audio type', 'sweettooth' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'sweettooth' ),
					'self'            => esc_html__( 'Self Hosted', 'sweettooth' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#eltdf_eltdf_audio_self_hosted_container',
						'self'            => '#eltdf_eltdf_audio_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#eltdf_eltdf_audio_embedded_container',
						'self'            => '#eltdf_eltdf_audio_self_hosted_container'
					)
				)
			)
		);
		
		$eltdf_audio_embedded_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'eltdf_audio_embedded_container',
				'hidden_property' => 'eltdf_audio_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$eltdf_audio_self_hosted_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'eltdf_audio_self_hosted_container',
				'hidden_property' => 'eltdf_audio_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'sweettooth' ),
				'description' => esc_html__( 'Enter audio URL', 'sweettooth' ),
				'parent'      => $eltdf_audio_embedded_container,
			)
		);
		
		sweettooth_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'sweettooth' ),
				'description' => esc_html__( 'Enter audio link', 'sweettooth' ),
				'parent'      => $eltdf_audio_self_hosted_container,
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_post_audio_meta', 23 );
}