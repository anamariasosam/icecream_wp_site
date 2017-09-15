<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = ELATED_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'sweettooth_elated_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function sweettooth_elated_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}

	add_action( 'vc_after_init', 'sweettooth_elated_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'sweettooth_elated_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function sweettooth_elated_vc_row_map() {

		vc_add_param( 'vc_row', array(
			'type'       => 'dropdown',
			'param_name' => 'row_content_width',
			'heading'    => esc_html__( 'Elated Row Content Width', 'sweettooth' ),
			'value'      => array(
				esc_html__( 'Full Width', 'sweettooth' ) => 'full-width',
				esc_html__( 'In Grid', 'sweettooth' )    => 'grid'
			),
			'group'      => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		vc_add_param( 'vc_row', array(
			'type'        => 'textfield',
			'param_name'  => 'anchor',
			'heading'     => esc_html__( 'Elated Anchor ID', 'sweettooth' ),
			'description' => esc_html__( 'For example "home"', 'sweettooth' ),
			'group'       => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		vc_add_param( 'vc_row', array(
			'type'       => 'colorpicker',
			'param_name' => 'simple_background_color',
			'heading'    => esc_html__( 'Elated Background Color', 'sweettooth' ),
			'group'      => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		vc_add_param( 'vc_row', array(
			'type'       => 'attach_image',
			'param_name' => 'simple_background_image',
			'heading'    => esc_html__( 'Elated Background Image', 'sweettooth' ),
			'group'      => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		vc_add_param( 'vc_row', array(
			'type'        => 'dropdown',
			'param_name'  => 'disable_background_image',
			'heading'     => esc_html__( 'Elated Disable Background Image', 'sweettooth' ),
			'value'       => array(
				esc_html__( 'Never', 'sweettooth' )        => '',
				esc_html__( 'Below 1440px', 'sweettooth' ) => '1440',
				esc_html__( 'Below 1280px', 'sweettooth' ) => '1280',
				esc_html__( 'Below 1024px', 'sweettooth' ) => '1024',
				esc_html__( 'Below 768px', 'sweettooth' )  => '768',
				esc_html__( 'Below 680px', 'sweettooth' )  => '680',
				esc_html__( 'Below 480px', 'sweettooth' )  => '480'
			),
			'save_always' => true,
			'description' => esc_html__( 'Choose on which stage you hide row background image', 'sweettooth' ),
			'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
			'group'       => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		vc_add_param( 'vc_row', array(
			'type'       => 'attach_image',
			'param_name' => 'parallax_background_image',
			'heading'    => esc_html__( 'Elated Parallax Background Image', 'sweettooth' ),
			'group'      => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		vc_add_param( 'vc_row', array(
			'type'        => 'textfield',
			'param_name'  => 'parallax_bg_speed',
			'heading'     => esc_html__( 'Elated Parallax Speed', 'sweettooth' ),
			'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'sweettooth' ),
			'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
			'group'       => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		vc_add_param( 'vc_row', array(
			'type'       => 'textfield',
			'param_name' => 'parallax_bg_height',
			'heading'    => esc_html__( 'Elated Parallax Section Height (px)', 'sweettooth' ),
			'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
			'group'      => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		vc_add_param( 'vc_row', array(
			'type'       => 'dropdown',
			'param_name' => 'content_text_aligment',
			'heading'    => esc_html__( 'Elated Content Aligment', 'sweettooth' ),
			'value'      => array(
				esc_html__( 'Default', 'sweettooth' ) => '',
				esc_html__( 'Left', 'sweettooth' )    => 'left',
				esc_html__( 'Center', 'sweettooth' )  => 'center',
				esc_html__( 'Right', 'sweettooth' )   => 'right'
			),
			'group'      => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		/*** Row Inner ***/

		vc_add_param( 'vc_row_inner', array(
			'type'       => 'dropdown',
			'param_name' => 'row_content_width',
			'heading'    => esc_html__( 'Elated Row Content Width', 'sweettooth' ),
			'value'      => array(
				esc_html__( 'Full Width', 'sweettooth' ) => 'full-width',
				esc_html__( 'In Grid', 'sweettooth' )    => 'grid'
			),
			'group'      => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		vc_add_param( 'vc_row_inner', array(
			'type'       => 'colorpicker',
			'param_name' => 'simple_background_color',
			'heading'    => esc_html__( 'Elated Background Color', 'sweettooth' ),
			'group'      => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		vc_add_param( 'vc_row_inner', array(
			'type'       => 'attach_image',
			'param_name' => 'simple_background_image',
			'heading'    => esc_html__( 'Elated Background Image', 'sweettooth' ),
			'group'      => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		vc_add_param( 'vc_row_inner', array(
			'type'        => 'dropdown',
			'param_name'  => 'disable_background_image',
			'heading'     => esc_html__( 'Elated Disable Background Image', 'sweettooth' ),
			'value'       => array(
				esc_html__( 'Never', 'sweettooth' )        => '',
				esc_html__( 'Below 1440px', 'sweettooth' ) => '1440',
				esc_html__( 'Below 1280px', 'sweettooth' ) => '1280',
				esc_html__( 'Below 1024px', 'sweettooth' ) => '1024',
				esc_html__( 'Below 768px', 'sweettooth' )  => '768',
				esc_html__( 'Below 680px', 'sweettooth' )  => '680',
				esc_html__( 'Below 480px', 'sweettooth' )  => '480'
			),
			'save_always' => true,
			'description' => esc_html__( 'Choose on which stage you hide row background image', 'sweettooth' ),
			'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
			'group'       => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		vc_add_param( 'vc_row_inner', array(
			'type'       => 'dropdown',
			'param_name' => 'content_text_aligment',
			'heading'    => esc_html__( 'Elated Content Aligment', 'sweettooth' ),
			'value'      => array(
				esc_html__( 'Default', 'sweettooth' ) => '',
				esc_html__( 'Left', 'sweettooth' )    => 'left',
				esc_html__( 'Center', 'sweettooth' )  => 'center',
				esc_html__( 'Right', 'sweettooth' )   => 'right'
			),
			'group'      => esc_html__( 'Elated Settings', 'sweettooth' )
		) );

		vc_add_param( 'vc_row', array(
			'type'        => 'attach_image',
			'param_name'  => 'simple_background_image_1440',
			'heading'     => esc_html__( 'Elated Big Laptop Background Image', 'sweettooth' ),
			'description' => esc_html__( 'Choose an image to show on screen sizes bellow 1440px', 'sweettooth' ),
			'group'       => esc_html__( 'Elated Image Responsiveness', 'sweettooth' )
		) );

		vc_add_param( 'vc_row', array(
			'type'        => 'attach_image',
			'param_name'  => 'simple_background_image_1280',
			'heading'     => esc_html__( 'Elated Laptop Background Image', 'sweettooth' ),
			'description' => esc_html__( 'Choose an image to show on screen sizes bellow 1280px', 'sweettooth' ),
			'group'       => esc_html__( 'Elated Image Responsiveness', 'sweettooth' )
		) );

		vc_add_param( 'vc_row', array(
			'type'        => 'attach_image',
			'param_name'  => 'simple_background_image_1024',
			'heading'     => esc_html__( 'Elated Horizontal Ipad Background Image', 'sweettooth' ),
			'description' => esc_html__( 'Choose an image to show on screen sizes bellow 1024px', 'sweettooth' ),
			'group'       => esc_html__( 'Elated Image Responsiveness', 'sweettooth' )
		) );

		vc_add_param( 'vc_row', array(
			'type'        => 'attach_image',
			'param_name'  => 'simple_background_image_768',
			'heading'     => esc_html__( 'Elated Vertical Ipad Background Image', 'sweettooth' ),
			'description' => esc_html__( 'Choose an image to show on screen sizes bellow 768px', 'sweettooth' ),
			'group'       => esc_html__( 'Elated Image Responsiveness', 'sweettooth' )
		) );

		vc_add_param( 'vc_row', array(
			'type'        => 'attach_image',
			'param_name'  => 'simple_background_image_460',
			'heading'     => esc_html__( 'Elated Mobile Background Image', 'sweettooth' ),
			'description' => esc_html__( 'Choose an image to show on screen sizes bellow 480px', 'sweettooth' ),
			'group'       => esc_html__( 'Elated Image Responsiveness', 'sweettooth' )
		) );
	}

	add_action( 'vc_after_init', 'sweettooth_elated_vc_row_map' );
}