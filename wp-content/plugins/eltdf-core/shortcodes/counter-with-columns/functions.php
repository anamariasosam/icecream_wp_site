<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Eltdf_Counter_Holder extends WPBakeryShortCodesContainer {}
}

if(!function_exists('eltdf_core_add_counter_holder_shortcodes')) {
	function eltdf_core_add_counter_holder_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'ElatedCore\CPT\Shortcodes\CounterHolder\CounterHolder'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('eltdf_core_filter_add_vc_shortcode', 'eltdf_core_add_counter_holder_shortcodes');
}

if( !function_exists('eltdf_core_set_counter_holder_icon_class_name_for_vc_shortcodes') ) {
	/**
	 * Function that set custom icon class name for counter holder shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function eltdf_core_set_counter_holder_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
		$shortcodes_icon_class_array[] = '.icon-wpb-counter-wc-holder';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter('eltdf_core_filter_add_vc_shortcodes_custom_icon_class', 'eltdf_core_set_counter_holder_icon_class_name_for_vc_shortcodes');
}