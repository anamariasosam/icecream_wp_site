<?php

if( !function_exists('sweettooth_elated_search_body_class') ) {
    /**
     * Function that adds body classes for different search types
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function sweettooth_elated_search_body_class($classes) {
        $classes[] = 'eltdf-slide-from-header-bottom';

        return $classes;
    }

    add_filter('body_class', 'sweettooth_elated_search_body_class');
}

if ( ! function_exists('sweettooth_elated_get_search') ) {
    /**
     * Loads search HTML based on search type option.
     */
    function sweettooth_elated_get_search() {
        sweettooth_elated_load_search_template();
    }

    add_action( 'sweettooth_elated_action_before_page_header_html_close', 'sweettooth_elated_get_search');
	add_action( 'sweettooth_elated_action_before_mobile_header_html_close', 'sweettooth_elated_get_search');
}

if ( ! function_exists('sweettooth_elated_load_search_template') ) {
    /**
     * Loads search HTML based on search type option.
     */
    function sweettooth_elated_load_search_template() {
        sweettooth_elated_get_module_template_part('templates/types/slide-from-header-bottom', 'search');
    }
}