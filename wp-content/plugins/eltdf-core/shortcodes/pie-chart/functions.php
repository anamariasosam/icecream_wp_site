<?php

if ( ! function_exists( 'eltdf_core_enqueue_scripts_for_pie_chart_shortcodes' ) ) {
	/**
	 * Function that includes all necessary 3rd party scripts for this shortcode
	 */
	function eltdf_core_enqueue_scripts_for_pie_chart_shortcodes() {
		wp_enqueue_script('counter', ELATED_CORE_SHORTCODES_URL_PATH.'/pie-chart/assets/js/plugins/counter.js', array('jquery'), false, true);
		wp_enqueue_script('easypiechart', ELATED_CORE_SHORTCODES_URL_PATH.'/pie-chart/assets/js/plugins/easypiechart.js', array('jquery'), false, true);
	}
	
	add_action('sweettooth_elated_action_enqueue_third_party_scripts', 'eltdf_core_enqueue_scripts_for_pie_chart_shortcodes');
}

if(!function_exists('eltdf_core_add_pie_chart_shortcodes')) {
	function eltdf_core_add_pie_chart_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'ElatedCore\CPT\Shortcodes\PieChart\PieChart'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('eltdf_core_filter_add_vc_shortcode', 'eltdf_core_add_pie_chart_shortcodes');
}

if( !function_exists('eltdf_core_set_pie_chart_icon_class_name_for_vc_shortcodes') ) {
	/**
	 * Function that set custom icon class name for pie chart shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function eltdf_core_set_pie_chart_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
		$shortcodes_icon_class_array[] = '.icon-wpb-pie-chart';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter('eltdf_core_filter_add_vc_shortcodes_custom_icon_class', 'eltdf_core_set_pie_chart_icon_class_name_for_vc_shortcodes');
}