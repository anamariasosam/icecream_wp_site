<?php

if ( ! function_exists( 'sweettooth_elated_register_header_minimal_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function sweettooth_elated_register_header_minimal_type( $header_types ) {
		$header_type = array(
			'header-minimal' => 'SweetToothElated\Modules\Header\Types\HeaderMinimal'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'sweettooth_elated_init_register_header_minimal_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function sweettooth_elated_init_register_header_minimal_type() {
		add_filter( 'sweettooth_elated_filter_register_header_type_class', 'sweettooth_elated_register_header_minimal_type' );
	}
	
	add_action( 'sweettooth_elated_action_before_header_function_init', 'sweettooth_elated_init_register_header_minimal_type' );
}

if ( ! function_exists( 'sweettooth_elated_register_header_minimal_full_screen_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function sweettooth_elated_register_header_minimal_full_screen_menu($menus) {
		$menus['popup-navigation'] = esc_html__( 'Full Screen Navigation', 'sweettooth' );

		return $menus;
	}

	add_filter( 'sweettooth_elated_filter_register_headers_menu', 'sweettooth_elated_register_header_minimal_full_screen_menu' );
}

if ( ! function_exists( 'sweettooth_elated_register_header_minimal_full_screen_menu_widgets' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function sweettooth_elated_register_header_minimal_full_screen_menu_widgets() {

		register_sidebar(
			array(
				'name'          => esc_html__( 'Fullscreen Menu Top', 'sweettooth' ),
				'id'            => 'fullscreen_menu_above',
				'description'   => esc_html__( 'This widget area is rendered above full screen menu', 'sweettooth' ),
				'before_widget' => '<div class="%2$s eltdf-fullscreen-menu-above-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="eltdf-fullscreen-widget-title">',
				'after_title'   => '</h4>'
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Fullscreen Menu Bottom', 'sweettooth' ),
				'id'            => 'fullscreen_menu_below',
				'description'   => esc_html__( 'This widget area is rendered below full screen menu', 'sweettooth' ),
				'before_widget' => '<div class="%2$s eltdf-fullscreen-menu-below-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="eltdf-fullscreen-widget-title">',
				'after_title'   => '</h4>'
			)
		);
	}
	
	add_action( 'widgets_init', 'sweettooth_elated_register_header_minimal_full_screen_menu_widgets' );
}

if ( ! function_exists( 'sweettooth_elated_check_is_header_minimal_type_enabled' ) ) {
	/**
	 * This function check is header minimal type enabled in global option or meta boxes option
	 */
	function sweettooth_elated_check_is_header_minimal_type_enabled() {
		return sweettooth_elated_get_meta_field_intersect( 'header_type', sweettooth_elated_get_page_id() ) === 'header-minimal';
	}
}

if ( ! function_exists( 'sweettooth_elated_header_minimal_full_screen_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function sweettooth_elated_header_minimal_full_screen_menu_body_class( $classes ) {
		if ( sweettooth_elated_check_is_header_minimal_type_enabled() ) {
			$classes[] = 'eltdf-' . sweettooth_elated_options()->getOptionValue( 'fullscreen_menu_animation_style' );
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'sweettooth_elated_header_minimal_full_screen_menu_body_class' );
}

if ( ! function_exists( 'sweettooth_elated_get_header_minimal_full_screen_menu' ) ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function sweettooth_elated_get_header_minimal_full_screen_menu() {
		if ( sweettooth_elated_check_is_header_minimal_type_enabled() ) {
			$parameters = array(
				'fullscreen_menu_in_grid' => sweettooth_elated_options()->getOptionValue( 'fullscreen_in_grid' ) === 'yes' ? true : false
			);
			
			sweettooth_elated_get_module_template_part( 'templates/full-screen-menu', 'header/types/header-minimal', '', $parameters );
		}
	}
	
	add_action( 'sweettooth_elated_action_after_header_area', 'sweettooth_elated_get_header_minimal_full_screen_menu', 10 );
}