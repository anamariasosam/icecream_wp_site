<?php

if (!function_exists('sweettooth_elated_header_skin_class')) {
	/**
	 * Function that adds header style class to body tag
	 */
	function sweettooth_elated_header_skin_class( $classes ) {
		$header_style        = sweettooth_elated_get_meta_field_intersect('header_style', sweettooth_elated_get_page_id());
		$sticky_header_style = sweettooth_elated_get_meta_field_intersect('sticky_header_style', sweettooth_elated_get_page_id());
		$header_style_404    = get_post_meta(sweettooth_elated_get_page_id(), 'eltdf_sticky_header_style_meta', false);
		
		if(is_404() && !empty($header_style_404)) {
			$classes[] = 'eltdf-' . $header_style_404;
		} else if (!empty($header_style)) {
			$classes[] = 'eltdf-' . $header_style;
		}

		if(!empty($sticky_header_style)) {
			$classes[] = 'eltdf-' . $sticky_header_style;
		}
		
		return $classes;
	}
	
	add_filter('body_class', 'sweettooth_elated_header_skin_class');
}

if(!function_exists('sweettooth_elated_sticky_header_behaviour_class')) {
	/**
	 * Function that adds header behavior class to body tag
	 */
	function sweettooth_elated_sticky_header_behaviour_class($classes) {
		$header_behavior = sweettooth_elated_get_meta_field_intersect('header_behaviour', sweettooth_elated_get_page_id());
		
		if(!empty($header_behavior)) {
			$classes[] = 'eltdf-'.$header_behavior;
		}
		
		return $classes;
	}
	
	add_filter('body_class', 'sweettooth_elated_sticky_header_behaviour_class');
}

if(!function_exists('sweettooth_elated_menu_dropdown_appearance')) {
	/**
	 * Function that adds menu dropdown appearance class to body tag
	 * @param array array of classes from main filter
	 * @return array array of classes with added menu dropdown appearance class
	 */
	function sweettooth_elated_menu_dropdown_appearance($classes) {
		$dropdown_menu_appearance = sweettooth_elated_options()->getOptionValue('menu_dropdown_appearance');
		
		if($dropdown_menu_appearance !== 'default'){
			$classes[] = 'eltdf-'.$dropdown_menu_appearance;
		}
		
		return $classes;
	}
	
	add_filter('body_class', 'sweettooth_elated_menu_dropdown_appearance');
}

if(!function_exists('sweettooth_elated_header_class')) {
	/**
	 * Function that adds class to header based on theme options
	 * @param array array of classes from main filter
	 * @return array array of classes with added header class
	 */
	function sweettooth_elated_header_class($classes) {
		$id = sweettooth_elated_get_page_id();
		
		$header_type = sweettooth_elated_get_meta_field_intersect('header_type', $id);
		
		$classes[] = 'eltdf-'.$header_type;
		
		$disable_menu_area_shadow = sweettooth_elated_get_meta_field_intersect('menu_area_shadow',$id) == 'no';
		if($disable_menu_area_shadow) {
			$classes[] = 'eltdf-menu-area-shadow-disable';
		}
		
		$disable_menu_area_grid_shadow = sweettooth_elated_get_meta_field_intersect('menu_area_in_grid_shadow',$id) == 'no';
		if($disable_menu_area_grid_shadow) {
			$classes[] = 'eltdf-menu-area-in-grid-shadow-disable';
		}
		
		$disable_menu_area_border = sweettooth_elated_get_meta_field_intersect('menu_area_border',$id) == 'no';
		if($disable_menu_area_border) {
			$classes[] = 'eltdf-menu-area-border-disable';
		}
		
		$disable_menu_area_grid_border = sweettooth_elated_get_meta_field_intersect('menu_area_in_grid_border',$id) == 'no';
		if($disable_menu_area_grid_border) {
			$classes[] = 'eltdf-menu-area-in-grid-border-disable';
		}
		
		if(sweettooth_elated_get_meta_field_intersect('menu_area_in_grid',$id) == 'yes' &&
		   sweettooth_elated_get_meta_field_intersect('menu_area_grid_background_color',$id) !== '' &&
		   sweettooth_elated_get_meta_field_intersect('menu_area_grid_background_transparency',$id) !== '0'){
			$classes[] = 'eltdf-header-menu-area-in-grid-padding';
		}
		
		$disable_logo_area_border = sweettooth_elated_get_meta_field_intersect('logo_area_border',$id) == 'no';
		if($disable_logo_area_border) {
			$classes[] = 'eltdf-logo-area-border-disable';
		}
		
		$disable_logo_area_grid_border = sweettooth_elated_get_meta_field_intersect('logo_area_in_grid_border',$id) == 'no';
		if($disable_logo_area_grid_border) {
			$classes[] = 'eltdf-logo-area-in-grid-border-disable';
		}
		
		if(sweettooth_elated_get_meta_field_intersect('logo_area_in_grid',$id) == 'yes' &&
		   sweettooth_elated_get_meta_field_intersect('logo_area_grid_background_color',$id) !== '' &&
		   sweettooth_elated_get_meta_field_intersect('logo_area_grid_background_transparency',$id) !== '0'){
			$classes[] = 'eltdf-header-logo-area-in-grid-padding';
		}
		
		$disable_shadow_vertical = sweettooth_elated_get_meta_field_intersect('vertical_header_shadow',$id) == 'no';
		if($disable_shadow_vertical) {
			$classes[] = 'eltdf-header-vertical-shadow-disable';
		}
		
		$disable_border_vertical = sweettooth_elated_get_meta_field_intersect('vertical_header_border',$id) == 'no';
		if($disable_border_vertical) {
			$classes[] = 'eltdf-header-vertical-border-disable';
		}
		
		return $classes;
	}
	
	add_filter('body_class', 'sweettooth_elated_header_class');
}

if (!function_exists('sweettooth_elated_header_area_style')) {
	/**
	 * Function that return styles for header area
	 */
	function sweettooth_elated_header_area_style($style) {
		$id = sweettooth_elated_get_page_id();
		$class_id = sweettooth_elated_get_page_id();
		if (sweettooth_elated_is_woocommerce_installed() && is_product()) {
			$class_id = get_the_ID();
		}
		
		$class_prefix = sweettooth_elated_get_unique_page_class($class_id);
		
		$current_style = '';
		
		$menu_area_style = array();
		$menu_area_grid_style = array();
		$menu_area_enable_border = get_post_meta($id, 'eltdf_menu_area_border_meta', true) == 'yes';
		$menu_area_enable_grid_border = get_post_meta($id, 'eltdf_menu_area_in_grid_border_meta', true) == 'yes';
		$menu_area_enable_shadow = get_post_meta($id, 'eltdf_menu_area_shadow_meta', true) == 'yes';
		$menu_area_enable_grid_shadow = get_post_meta($id, 'eltdf_menu_area_in_grid_shadow_meta', true) == 'yes';
		
		$menu_area_selector = array($class_prefix . ' .eltdf-page-header .eltdf-menu-area');
		$menu_area_grid_selector = array($class_prefix . ' .eltdf-page-header .eltdf-menu-area .eltdf-grid .eltdf-vertical-align-containers');
		
		/* menu area style - start */
		
		$menu_area_background_color = get_post_meta($id, 'eltdf_menu_area_background_color_meta', true);
		$menu_area_background_transparency = get_post_meta($id, 'eltdf_menu_area_background_transparency_meta', true);
		
		if ($menu_area_background_transparency === '') {
			$menu_area_background_transparency = 1;
		}
		
		$menu_area_background_color_rgba = sweettooth_elated_rgba_color($menu_area_background_color, $menu_area_background_transparency);
		
		if ($menu_area_background_color_rgba !== null) {
			$menu_area_style['background-color'] = $menu_area_background_color_rgba;
		}
		
		if ($menu_area_enable_shadow) {
			$menu_area_style['box-shadow'] = '0px 1px 3px rgba(0,0,0,0.15)';
		}
		
		if ($menu_area_enable_border) {
			$header_border_color = get_post_meta($id, 'eltdf_menu_area_border_color_meta', true);
			
			if ($header_border_color !== '') {
				$menu_area_style['border-bottom'] = '1px solid ' . $header_border_color;
			}
		}
		
		/* menu area style - end */
		
		/* menu area in grid style - start */
		
		if ($menu_area_enable_grid_shadow) {
			$menu_area_grid_style['box-shadow'] = '0px 1px 3px rgba(0,0,0,0.15)';
		}
		
		if ($menu_area_enable_grid_border) {
			$header_grid_border_color = get_post_meta($id, 'eltdf_menu_area_in_grid_border_color_meta', true);
			
			if ($header_grid_border_color !== '') {
				$menu_area_grid_style['border-bottom'] = '1px solid ' . $header_grid_border_color;
			}
		}
		
		$menu_area_grid_background_color = get_post_meta($id, 'eltdf_menu_area_grid_background_color_meta', true);
		$menu_area_grid_background_transparency = get_post_meta($id, 'eltdf_menu_area_grid_background_transparency_meta', true);
		
		if ($menu_area_grid_background_transparency === '') {
			$menu_area_grid_background_transparency = 1;
		}
		
		$menu_area_grid_background_color_rgba = sweettooth_elated_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
		
		if ($menu_area_grid_background_color_rgba !== null) {
			$menu_area_grid_style['background-color'] = $menu_area_grid_background_color_rgba;
		}
		
		/* menu area in grid style - end */
		
		$current_style .= sweettooth_elated_dynamic_css($menu_area_selector, $menu_area_style);
		$current_style .= sweettooth_elated_dynamic_css($menu_area_grid_selector, $menu_area_grid_style);
		
		
		$logo_area_style = array();
		$logo_area_grid_style = array();
		$logo_area_enable_border = get_post_meta($id, 'eltdf_logo_area_border_meta', true) == 'yes';
		$logo_area_enable_grid_border = get_post_meta($id, 'eltdf_logo_area_in_grid_border_meta', true) == 'yes';
		
		$logo_area_selector = array($class_prefix . ' .eltdf-page-header .eltdf-logo-area');
		$logo_area_grid_selector = array($class_prefix . ' .eltdf-page-header .eltdf-logo-area .eltdf-grid .eltdf-vertical-align-containers');
		
		/* logo area style - start */
		
		$logo_area_background_color = get_post_meta($id, 'eltdf_logo_area_background_color_meta', true);
		$logo_area_background_transparency = get_post_meta($id, 'eltdf_logo_area_background_transparency_meta', true);
		
		if ($logo_area_background_transparency === '') {
			$logo_area_background_transparency = 1;
		}
		
		$logo_area_background_color_rgba = sweettooth_elated_rgba_color($logo_area_background_color, $logo_area_background_transparency);
		
		if ($logo_area_background_color_rgba !== null) {
			$logo_area_style['background-color'] = $logo_area_background_color_rgba;
		}
		
		if ($logo_area_enable_border) {
			$header_border_color = get_post_meta($id, 'eltdf_logo_area_border_color_meta', true);
			
			if ($header_border_color !== '') {
				$logo_area_style['border-bottom'] = '1px solid ' . $header_border_color;
			}
		}
		
		$logo_area_logo_padding = get_post_meta($id, 'eltdf_logo_wrapper_padding_header_centered_meta', true);
		if ($logo_area_logo_padding !== '') {
			$current_style .= sweettooth_elated_dynamic_css($class_prefix . '.eltdf-header-centered .eltdf-logo-area .eltdf-logo-wrapper', array('padding' => $logo_area_logo_padding));
		}
		
		/* logo area style - end */
		
		/* logo area in grid style - start */
		
		if ($logo_area_enable_grid_border) {
			$header_grid_border_color = get_post_meta($id, 'eltdf_logo_area_in_grid_border_color_meta', true);
			
			if ($header_grid_border_color !== '') {
				$logo_area_grid_style['border-bottom'] = '1px solid ' . $header_grid_border_color;
			}
		}
		
		$logo_area_grid_background_color = get_post_meta($id, 'eltdf_logo_area_grid_background_color_meta', true);
		$logo_area_grid_background_transparency = get_post_meta($id, 'eltdf_logo_area_grid_background_transparency_meta', true);
		
		if ($logo_area_grid_background_transparency === '') {
			$logo_area_grid_background_transparency = 1;
		}
		
		$logo_area_grid_background_color_rgba = sweettooth_elated_rgba_color($logo_area_grid_background_color, $logo_area_grid_background_transparency);
		
		if ($logo_area_grid_background_color_rgba !== null) {
			$logo_area_grid_style['background-color'] = $logo_area_grid_background_color_rgba;
		}
		
		/* logo area in grid style - end */
		
		/* vertical area style - start */
		$vertical_area_style = array();
		$vertical_area_selector = array($class_prefix . '.eltdf-header-vertical .eltdf-vertical-area-background');
		
		$vertical_header_background_color = get_post_meta($id, 'eltdf_vertical_header_background_color_meta', true);
		$disable_vertical_background_image = get_post_meta($id, 'eltdf_disable_vertical_header_background_image_meta', true);
		$vertical_background_image = get_post_meta($id, 'eltdf_vertical_header_background_image_meta', true);
		$vertical_shadow = get_post_meta($id, 'eltdf_vertical_header_shadow_meta', true);
		$vertical_border = get_post_meta($id, 'eltdf_vertical_header_border_meta', true);
		
		if ($vertical_header_background_color !== '') {
			$vertical_area_style['background-color'] = $vertical_header_background_color;
		}
		
		if ($disable_vertical_background_image == 'yes') {
			$vertical_area_style['background-image'] = 'none';
		} elseif ($vertical_background_image !== '') {
			$vertical_area_style['background-image'] = 'url(' . $vertical_background_image . ')';
		}
		
		if ($vertical_shadow == 'yes') {
			$vertical_area_style['box-shadow'] = '1px 0 3px rgba(0, 0, 0, 0.05)';
		}
		
		if ($vertical_border == 'yes') {
			$header_border_color = get_post_meta($id, 'eltdf_vertical_header_border_color_meta', true);
			
			if ($header_border_color !== '') {
				$vertical_area_style['border-right'] = '1px solid ' . $header_border_color;
			}
		}
		
		/* vertical area style - end */
		
		$current_style .= sweettooth_elated_dynamic_css($logo_area_selector, $logo_area_style);
		$current_style .= sweettooth_elated_dynamic_css($logo_area_grid_selector, $logo_area_grid_style);
		$current_style .= sweettooth_elated_dynamic_css($vertical_area_selector, $vertical_area_style);
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter('sweettooth_elated_filter_add_page_custom_style', 'sweettooth_elated_header_area_style');
}