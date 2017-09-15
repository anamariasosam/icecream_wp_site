<?php

if( !function_exists('sweettooth_elated_load_search') ) {
    function sweettooth_elated_load_search() {
        $search_type_meta = sweettooth_elated_options()->getOptionValue('search_type');
	    $search_type = !empty($search_type_meta) ? $search_type_meta : 'fullscreen';
	    
        if ( sweettooth_elated_active_widget( false, false, 'eltdf_search_opener' ) ) {
            include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/search/types/' . $search_type . '.php';
        }
    }

    add_action('init', 'sweettooth_elated_load_search');
}

if ( ! function_exists( 'sweettooth_elated_search_styles' ) ) {
	/**
	 * Sets per page styles for header top bar
	 *
	 * @param $styles
	 *
	 * @return array
	 */
	function sweettooth_elated_search_styles( $styles ) {
		$search_style = array();

		$background_image = sweettooth_elated_options()->getOptionValue('search_background_image');
		if (!empty($background_image)) {
			$search_style['background-image'] = 'url('.$background_image.')';
			$search_style['background-position'] = 'center 0';
			$search_style['background-size'] = 'cover';
			$search_style['background-repeat'] = 'no-repeat';
		} else {
			$search_style['background-color'] = '#2d2d2d';
		}

		$selector = array(
			'.eltdf-fullscreen-search-holder'
		);

		$search_style = sweettooth_elated_dynamic_css($selector, $search_style);

		$current_style = $search_style . $styles;

		return $current_style;
	}

	add_filter( 'sweettooth_elated_filter_add_page_custom_style', 'sweettooth_elated_search_styles' );
}