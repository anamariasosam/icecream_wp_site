<?php

if(!function_exists('sweettooth_elated_disable_wpml_css')) {
    function sweettooth_elated_disable_wpml_css() {
	    define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
    }

	add_action('after_setup_theme', 'sweettooth_elated_disable_wpml_css');
}