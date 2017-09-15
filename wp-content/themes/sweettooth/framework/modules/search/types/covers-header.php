<?php

if ( ! function_exists( 'sweettooth_elated_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function sweettooth_elated_search_body_class( $classes ) {
		$classes[] = 'eltdf-search-covers-header';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'sweettooth_elated_search_body_class' );
}

if ( ! function_exists( 'sweettooth_elated_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function sweettooth_elated_get_search() {
		sweettooth_elated_load_search_template();
	}
	
	add_action( 'sweettooth_elated_action_before_page_header_html_close', 'sweettooth_elated_get_search');
	add_action( 'sweettooth_elated_action_before_mobile_header_html_close', 'sweettooth_elated_get_search');
}

if ( ! function_exists( 'sweettooth_elated_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function sweettooth_elated_load_search_template() {
		$search_icon       = '';
		$search_icon_close = '';
		
		$search_in_grid   = sweettooth_elated_options()->getOptionValue( '$search_in_grid' ) == 'yes' ? true : false;
		$search_icon_pack = sweettooth_elated_options()->getOptionValue( 'search_icon_pack' );
		
		if ( ! empty( $search_icon_pack ) ) {
			$search_icon       = sweettooth_elated_icon_collections()->getSearchIcon( $search_icon_pack, true );
			$search_icon_close = sweettooth_elated_icon_collections()->getSearchClose( $search_icon_pack, true );
		}
		
		$parameters = array(
			'search_in_grid'    => $search_in_grid,
			'search_icon'       => $search_icon,
			'search_icon_close' => $search_icon_close
		);
		
		sweettooth_elated_get_module_template_part( 'templates/types/covers-header', 'search', '', $parameters );
	}
}