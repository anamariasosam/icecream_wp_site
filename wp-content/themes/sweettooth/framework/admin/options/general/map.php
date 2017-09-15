<?php

if ( ! function_exists( 'sweettooth_elated_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function sweettooth_elated_general_options_map() {
		
		sweettooth_elated_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'sweettooth' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = sweettooth_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'sweettooth' )
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'sweettooth' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'sweettooth' ),
				'parent'        => $panel_design_style
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'sweettooth' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_additional_google_fonts_container"
				)
			)
		);
		
		$additional_google_fonts_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'hidden_property' => 'additional_google_fonts',
				'hidden_value'    => 'no'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'sweettooth' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'sweettooth' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'sweettooth' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'sweettooth' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'sweettooth' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'sweettooth' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'sweettooth' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'sweettooth' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'sweettooth' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'sweettooth' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'sweettooth' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'sweettooth' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'       => esc_html__( '100 Thin', 'sweettooth' ),
					'100italic' => esc_html__( '100 Thin Italic', 'sweettooth' ),
					'200'       => esc_html__( '200 Extra-Light', 'sweettooth' ),
					'200italic' => esc_html__( '200 Extra-Light Italic', 'sweettooth' ),
					'300'       => esc_html__( '300 Light', 'sweettooth' ),
					'300italic' => esc_html__( '300 Light Italic', 'sweettooth' ),
					'400'       => esc_html__( '400 Regular', 'sweettooth' ),
					'400italic' => esc_html__( '400 Regular Italic', 'sweettooth' ),
					'500'       => esc_html__( '500 Medium', 'sweettooth' ),
					'500italic' => esc_html__( '500 Medium Italic', 'sweettooth' ),
					'600'       => esc_html__( '600 Semi-Bold', 'sweettooth' ),
					'600italic' => esc_html__( '600 Semi-Bold Italic', 'sweettooth' ),
					'700'       => esc_html__( '700 Bold', 'sweettooth' ),
					'700italic' => esc_html__( '700 Bold Italic', 'sweettooth' ),
					'800'       => esc_html__( '800 Extra-Bold', 'sweettooth' ),
					'800italic' => esc_html__( '800 Extra-Bold Italic', 'sweettooth' ),
					'900'       => esc_html__( '900 Ultra-Bold', 'sweettooth' ),
					'900italic' => esc_html__( '900 Ultra-Bold Italic', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'sweettooth' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'sweettooth' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'sweettooth' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'sweettooth' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'sweettooth' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'sweettooth' ),
					'greek'        => esc_html__( 'Greek', 'sweettooth' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'sweettooth' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'sweettooth' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'sweettooth' ),
				'parent'      => $panel_design_style
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'sweettooth' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'sweettooth' ),
				'parent'      => $panel_design_style
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'sweettooth' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'sweettooth' ),
				'parent'      => $panel_design_style
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'sweettooth' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_boxed_container"
				)
			)
		);
		
		$boxed_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'boxed_container',
				'hidden_property' => 'boxed',
				'hidden_value'    => 'no'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'page_background_color_in_box',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'sweettooth' ),
				'description' => esc_html__( 'Choose the page background color outside box', 'sweettooth' ),
				'parent'      => $boxed_container
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'boxed_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'sweettooth' ),
				'description' => esc_html__( 'Choose an image to be displayed in background', 'sweettooth' ),
				'parent'      => $boxed_container
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'boxed_pattern_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Pattern', 'sweettooth' ),
				'description' => esc_html__( 'Choose an image to be used as background pattern', 'sweettooth' ),
				'parent'      => $boxed_container
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'boxed_background_image_attachment',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__( 'Background Image Attachment', 'sweettooth' ),
				'description'   => esc_html__( 'Choose background image attachment', 'sweettooth' ),
				'parent'        => $boxed_container,
				'options'       => array(
					'fixed'  => esc_html__( 'Fixed', 'sweettooth' ),
					'scroll' => esc_html__( 'Scroll', 'sweettooth' )
				)
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'sweettooth' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_paspartu_container"
				)
			)
		);
		
		$paspartu_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'paspartu_container',
				'hidden_property' => 'paspartu',
				'hidden_value'    => 'no'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'paspartu_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Passepartout Color', 'sweettooth' ),
				'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'sweettooth' ),
				'parent'      => $paspartu_container
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'paspartu_width',
				'type'        => 'text',
				'label'       => esc_html__( 'Passepartout Size', 'sweettooth' ),
				'description' => esc_html__( 'Enter size amount for passepartout', 'sweettooth' ),
				'parent'      => $paspartu_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'parent'        => $paspartu_container,
				'type'          => 'yesno',
				'default_value' => 'no',
				'name'          => 'disable_top_paspartu',
				'label'         => esc_html__( 'Disable Top Passepartout', 'sweettooth' )
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'sweettooth' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'sweettooth' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'eltdf-grid-1300' => esc_html__( '1300px - default', 'sweettooth' ),
					'eltdf-grid-1200' => esc_html__( '1200px', 'sweettooth' ),
					'eltdf-grid-1100' => esc_html__( '1100px', 'sweettooth' ),
					'eltdf-grid-1000' => esc_html__( '1000px', 'sweettooth' ),
					'eltdf-grid-800'  => esc_html__( '800px', 'sweettooth' )
				)
			)
		);
		
		$panel_settings = sweettooth_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'sweettooth' )
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'sweettooth' ),
				'parent'        => $panel_settings
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'sweettooth' ),
				'parent'        => $panel_settings,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_page_transitions_container"
				)
			)
		);
		
		$page_transitions_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $panel_settings,
				'name'            => 'page_transitions_container',
				'hidden_property' => 'smooth_page_transitions',
				'hidden_value'    => 'no'
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'page_transition_preloader',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Preloading Animation', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'sweettooth' ),
				'parent'        => $page_transitions_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_page_transition_preloader_container"
				)
			)
		);
		
		$page_transition_preloader_container = sweettooth_elated_add_admin_container(
			array(
				'parent'          => $page_transitions_container,
				'name'            => 'page_transition_preloader_container',
				'hidden_property' => 'page_transition_preloader',
				'hidden_value'    => 'no'
			)
		);
		
		
		sweettooth_elated_add_admin_field(
			array(
				'name'   => 'smooth_pt_bgnd_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Page Loader Background Color', 'sweettooth' ),
				'parent' => $page_transition_preloader_container
			)
		);
		
		$group_pt_spinner_animation = sweettooth_elated_add_admin_group(
			array(
				'name'        => 'group_pt_spinner_animation',
				'title'       => esc_html__( 'Loader Style', 'sweettooth' ),
				'description' => esc_html__( 'Define styles for loader spinner animation', 'sweettooth' ),
				'parent'      => $page_transition_preloader_container
			)
		);
		
		$row_pt_spinner_animation = sweettooth_elated_add_admin_row(
			array(
				'name'   => 'row_pt_spinner_animation',
				'parent' => $group_pt_spinner_animation
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'type'          => 'selectsimple',
				'name'          => 'smooth_pt_spinner_type',
				'default_value' => '',
				'label'         => esc_html__( 'Spinner Type', 'sweettooth' ),
				'parent'        => $row_pt_spinner_animation,
				'options'       => array(
					'logo' 					=> esc_html__( 'Logo', 'sweettooth' ),
					'rotate_circles'        => esc_html__( 'Rotate Circles', 'sweettooth' ),
					'pulse'                 => esc_html__( 'Pulse', 'sweettooth' ),
					'double_pulse'          => esc_html__( 'Double Pulse', 'sweettooth' ),
					'cube'                  => esc_html__( 'Cube', 'sweettooth' ),
					'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'sweettooth' ),
					'stripes'               => esc_html__( 'Stripes', 'sweettooth' ),
					'wave'                  => esc_html__( 'Wave', 'sweettooth' ),
					'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'sweettooth' ),
					'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'sweettooth' ),
					'atom'                  => esc_html__( 'Atom', 'sweettooth' ),
					'clock'                 => esc_html__( 'Clock', 'sweettooth' ),
					'mitosis'               => esc_html__( 'Mitosis', 'sweettooth' ),
					'lines'                 => esc_html__( 'Lines', 'sweettooth' ),
					'fussion'               => esc_html__( 'Fussion', 'sweettooth' ),
					'wave_circles'          => esc_html__( 'Wave Circles', 'sweettooth' ),
					'pulse_circles'         => esc_html__( 'Pulse Circles', 'sweettooth' )
				),
				'args'          => array(
	                'dependence'  => true,
	                'show'        => array(
	                    'logo'               	=> "#eltdf_logo_params_container",
	                    'rotate_circles'        => "#eltdf_smooth_pt_spinner_color",
	                    'pulse'                 => "#eltdf_smooth_pt_spinner_color",
	                    'double_pulse'          => "#eltdf_smooth_pt_spinner_color",
	                    'cube'                  => "#eltdf_smooth_pt_spinner_color",
	                    'rotating_cubes'        => "#eltdf_smooth_pt_spinner_color",
	                    'stripes'              	=> "#eltdf_smooth_pt_spinner_color",
	                    'wave'                  => "#eltdf_smooth_pt_spinner_color",
	                    'two_rotating_circles'  => "#eltdf_smooth_pt_spinner_color",
	                    'five_rotating_circles' => "#eltdf_smooth_pt_spinner_color",
	                    'atom'                  => "#eltdf_smooth_pt_spinner_color",
	                    'clock'                	=> "#eltdf_smooth_pt_spinner_color",
	                    'mitosis'               => "#eltdf_smooth_pt_spinner_color",
	                    'lines'                	=> "#eltdf_smooth_pt_spinner_color",
	                    'fussion'              	=> "#eltdf_smooth_pt_spinner_color",
	                    'wave_circles'          => "#eltdf_smooth_pt_spinner_color",
	                    'pulse_circles'         => "#eltdf_smooth_pt_spinner_color"
	                ),
	                'hide'        => array(
	                    'logo'                	=> "#eltdf_smooth_pt_spinner_color",
	                    'rotate_circles'        => "#eltdf_logo_params_container",
	                    'pulse'                	=> "#eltdf_logo_params_container",
	                    'double_pulse'          => "#eltdf_logo_params_container",
	                    'cube'                  => "#eltdf_logo_params_container",
	                    'rotating_cubes'        => "#eltdf_logo_params_container",
	                    'stripes'               => "#eltdf_logo_params_container",
	                    'wave'                  => "#eltdf_logo_params_container",
	                    'two_rotating_circles'  => "#eltdf_logo_params_container",
	                    'five_rotating_circles' => "#eltdf_logo_params_container",
	                    'atom'                  => "#eltdf_logo_params_container",
	                    'clock'                 => "#eltdf_logo_params_container",
	                    'mitosis'               => "#eltdf_logo_params_container",
	                    'lines'                 => "#eltdf_logo_params_container",
	                    'fussion'               => "#eltdf_logo_params_container",
	                    'wave_circles'          => "#eltdf_logo_params_container",
	                    'pulse_circles'         => "#eltdf_logo_params_container"
	                )
	            )
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'type'          => 'colorsimple',
				'name'          => 'smooth_pt_spinner_color',
				'default_value' => '',
				'label'         => esc_html__( 'Spinner Color', 'sweettooth' ),
				'parent'        => $row_pt_spinner_animation
			)
		);
		
		$logo_params_container = sweettooth_elated_add_admin_container(
            array(
                'parent'            => $page_transition_preloader_container,
                'name'              => 'logo_params_container',
                'hidden_property'   => 'smooth_pt_spinner_logo',
                'hidden_value'      => 'no'
            )
        );

		sweettooth_elated_add_admin_field(array(
                'name'          => 'smooth_pt_spinner_logo',
                'type'          => 'image',
                'label'         => esc_html__('Preloader Logo', 'sweettooth'),
                'description'   => esc_html__('Choose preloader logo to be displayed until the page is loaded', 'sweettooth'),
                'parent'        => $logo_params_container
            )
        );

		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'page_transition_fadeout',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Fade Out Animation', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'sweettooth' ),
				'parent'        => $page_transitions_container
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'sweettooth' ),
				'parent'        => $panel_settings
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'sweettooth' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'sweettooth' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = sweettooth_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'sweettooth' )
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'custom_css',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom CSS', 'sweettooth' ),
				'description' => esc_html__( 'Enter your custom CSS here', 'sweettooth' ),
				'parent'      => $panel_custom_code
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'sweettooth' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'sweettooth' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = sweettooth_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'sweettooth' )
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'sweettooth' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'sweettooth' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_options_map', 'sweettooth_elated_general_options_map', 1 );
}

if ( ! function_exists( 'sweettooth_elated_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function sweettooth_elated_page_general_style( $style ) {
		$id = sweettooth_elated_get_page_id();
		$current_style = '';
		$class_prefix  = sweettooth_elated_get_unique_page_class( sweettooth_elated_get_page_id() );

		$boxed_page_top_margin    = get_post_meta( $id, 'eltdf_page_container_top_margin', true );
		$boxed_page_bottom_margin = get_post_meta( $id, 'eltdf_page_container_bottom_margin', true );

		$boxed_container_style = array();
		if( $boxed_page_top_margin !== '' ) {
			$boxed_container_style['padding-top'] = sweettooth_elated_filter_px($boxed_page_top_margin).'px';
		}
		if( $boxed_page_bottom_margin !== '' ) {
			$boxed_container_style['padding-bottom'] = sweettooth_elated_filter_px($boxed_page_bottom_margin).'px';
		}
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = sweettooth_elated_get_meta_field_intersect( 'page_background_color_in_box' );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = sweettooth_elated_get_meta_field_intersect( 'boxed_background_image' );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = sweettooth_elated_get_meta_field_intersect( 'boxed_pattern_background_image' );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = sweettooth_elated_get_meta_field_intersect( 'boxed_background_image_attachment' );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.eltdf-boxed .eltdf-wrapper';

		if ( ! empty( $boxed_container_style ) ) {
			$current_style .= sweettooth_elated_dynamic_css( $boxed_background_selector, $boxed_container_style );
		}

		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= sweettooth_elated_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'sweettooth_elated_filter_add_page_custom_style', 'sweettooth_elated_page_general_style' );
}