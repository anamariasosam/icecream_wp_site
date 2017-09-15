<?php

if (!function_exists('sweettooth_elated_register_footer_sidebar')) {
	
	function sweettooth_elated_register_footer_sidebar() {
		
		register_sidebar(array(
			'name' => esc_html__('Footer Top Column 1', 'sweettooth'),
			'description'   => esc_html__('Widgets added here will appear in the first column of top footer area', 'sweettooth'),
			'id' => 'footer_top_column_1',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-1 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="eltdf-widget-title-holder"><h3 class="eltdf-widget-title">',
			'after_title' => '</h3></div>'
		));
		
		register_sidebar(array(
			'name' => esc_html__('Footer Top Column 2', 'sweettooth'),
			'description'   => esc_html__('Widgets added here will appear in the second column of top footer area', 'sweettooth'),
			'id' => 'footer_top_column_2',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-2 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="eltdf-widget-title-holder"><h3 class="eltdf-widget-title">',
			'after_title' => '</h3></div>'
		));
		
		register_sidebar(array(
			'name' => esc_html__('Footer Top Column 3', 'sweettooth'),
			'description'   => esc_html__('Widgets added here will appear in the third column of top footer area', 'sweettooth'),
			'id' => 'footer_top_column_3',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-3 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="eltdf-widget-title-holder"><h3 class="eltdf-widget-title">',
			'after_title' => '</h3></div>'
		));
		
		register_sidebar(array(
			'name' => esc_html__('Footer Top Column 4', 'sweettooth'),
			'description'   => esc_html__('Widgets added here will appear in the fourth column of top footer area', 'sweettooth'),
			'id' => 'footer_top_column_4',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-4 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="eltdf-widget-title-holder"><h3 class="eltdf-widget-title">',
			'after_title' => '</h3></div>'
		));
		
		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Column', 'sweettooth'),
			'description'   => esc_html__('Widgets added here will appear in the bottom footer area', 'sweettooth'),
			'id' => 'footer_bottom_column_1',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-bottom-column-2 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="eltdf-widget-title-holder"><h3 class="eltdf-widget-title">',
			'after_title' => '</h3></div>'
		));
	}
	
	add_action('widgets_init', 'sweettooth_elated_register_footer_sidebar');
}

if (!function_exists('sweettooth_elated_get_footer')) {
	/**
	 * Loads footer HTML
	 */
	function sweettooth_elated_get_footer() {
		$parameters          = array();
		$page_id             = sweettooth_elated_get_page_id();
		$disable_footer_meta = get_post_meta($page_id, 'eltdf_disable_footer_meta', true);
		
		$parameters['display_footer']        = $disable_footer_meta === 'yes' ? false : true;
		$parameters['display_footer_top']    = sweettooth_elated_show_footer_top();
		$parameters['display_footer_bottom'] = sweettooth_elated_show_footer_bottom();
		
		sweettooth_elated_get_module_template_part('templates/footer', 'footer', '', $parameters);
	}
	
	add_action('sweettooth_elated_get_footer_template', 'sweettooth_elated_get_footer');
}

if(!function_exists('sweettooth_elated_show_footer_top')){
	/**
	 * Check footer top showing
	 * Function check value from options and checks if footer columns are empty.
	 * return bool
	 */
	function sweettooth_elated_show_footer_top(){
		$footer_top_flag = false;
		
		//check value from options and meta field on current page
		$option_flag = (sweettooth_elated_get_meta_field_intersect('show_footer_top') === 'yes') ? true : false;
		
		//check footer columns.If they are empty, disable footer top
		$columns_flag = false;
		for($i = 1; $i <= 4; $i++){
			$footer_columns_id = 'footer_top_column_'.$i;
			if(is_active_sidebar($footer_columns_id)) {
				$columns_flag = true;
				break;
			}
		}
		
		if($option_flag && $columns_flag){
			$footer_top_flag = true;
		}
		
		return $footer_top_flag;
	}
}

if(!function_exists('sweettooth_elated_show_footer_bottom')){
	/**
	 * Check footer bottom showing
	 * Function check value from options and checks if footer columns are empty.
	 * return bool
	 */
	function sweettooth_elated_show_footer_bottom(){
		$footer_bottom_flag = false;
		
		//check value from options and meta field on current page
		$option_flag = (sweettooth_elated_get_meta_field_intersect('show_footer_bottom') === 'yes') ? true : false;
		
		//check footer columns.If they are empty, disable footer bottom
		$columns_flag = false;
		for($i = 1; $i <= 3; $i++){
			$footer_columns_id = 'footer_bottom_column_'.$i;
			if(is_active_sidebar($footer_columns_id)) {
				$columns_flag = true;
				break;
			}
		}
		
		if($option_flag && $columns_flag){
			$footer_bottom_flag = true;
		}
		
		return $footer_bottom_flag;
	}
}

if (!function_exists('sweettooth_elated_get_content_bottom_area')) {
	/**
	 * Loads content bottom area HTML with all needed parameters
	 */
	function sweettooth_elated_get_content_bottom_area() {
		
		$parameters = array();
		
		//Current page id
		$id = sweettooth_elated_get_page_id();
		
		//is content bottom area enabled for current page?
		$parameters['content_bottom_area'] = sweettooth_elated_get_meta_field_intersect('enable_content_bottom_area', $id);
		
		if ($parameters['content_bottom_area'] === 'yes') {
			
			//Sidebar for content bottom area
			$parameters['content_bottom_area_sidebar'] = sweettooth_elated_get_meta_field_intersect('content_bottom_sidebar_custom_display', $id);
			//Content bottom area in grid
			$parameters['grid_class'] = (sweettooth_elated_get_meta_field_intersect('content_bottom_in_grid', $id)) === 'yes' ? 'eltdf-grid' : 'eltdf-full-width';
			
			$parameters['content_bottom_style'] = array();
			
			//Content bottom area background color
			$background_color = sweettooth_elated_get_meta_field_intersect('content_bottom_background_color', $id);
			if ($background_color !== '') {
				$parameters['content_bottom_style'][] = 'background-color: ' . $background_color . ';';
			}
			
			if(is_active_sidebar($parameters['content_bottom_area_sidebar'])){
				sweettooth_elated_get_module_template_part('templates/parts/content-bottom-area', 'footer', '', $parameters);
			}
		}
	}
}

if (!function_exists('sweettooth_elated_get_footer_top')) {
	/**
	 * Return footer top HTML
	 */
	function sweettooth_elated_get_footer_top() {
		$parameters = array();
		
		//get number of top footer columns
		$parameters['footer_top_columns'] = sweettooth_elated_options()->getOptionValue('footer_top_columns');
		
		//get footer top grid/full width class
		$parameters['footer_top_grid_class'] = sweettooth_elated_options()->getOptionValue('footer_in_grid') === 'yes' ? 'eltdf-grid' : 'eltdf-full-width';
		
		//get footer top other classes
		$footer_top_classes = array();
		
			//footer alignment
			$footer_top_alignment = sweettooth_elated_options()->getOptionValue('footer_top_columns_alignment');
			$footer_top_classes[] = !empty($footer_top_alignment) ? 'eltdf-footer-top-alignment-'.esc_attr($footer_top_alignment) : '';
		
		$footer_top_classes   = apply_filters('sweettooth_elated_filter_footer_top_classes', $footer_top_classes);
		
		$parameters['footer_top_classes'] = implode(' ', $footer_top_classes);
		
		sweettooth_elated_get_module_template_part('templates/parts/footer-top', 'footer', '', $parameters);
	}
}

if (!function_exists('sweettooth_elated_get_footer_bottom')) {
	/**
	 * Return footer bottom HTML
	 */
	function sweettooth_elated_get_footer_bottom() {
		$parameters = array();
		
		//get number of bottom footer columns
		$parameters['footer_bottom_columns'] = 1;
		
		//get footer top grid/full width class
		$parameters['footer_bottom_grid_class'] = sweettooth_elated_options()->getOptionValue('footer_in_grid') === 'yes' ? 'eltdf-grid' : 'eltdf-full-width';
		
		//get footer top other classes
		$footer_bottom_classes = array();
		$footer_bottom_classes = apply_filters('sweettooth_elated_filter_footer_bottom_classes', $footer_bottom_classes);
		
		$parameters['footer_bottom_classes'] = implode(' ', $footer_bottom_classes);
		
		sweettooth_elated_get_module_template_part('templates/parts/footer-bottom', 'footer', '', $parameters);
	}
}