<?php

if (!function_exists('sweettooth_elated_title_area_typography_style')) {

    function sweettooth_elated_title_area_typography_style(){

        // title default/small style
	    
	    $item_styles = sweettooth_elated_get_typography_styles('page_title');
	
	    $item_selector = array(
		    '.eltdf-title .eltdf-title-holder .eltdf-page-title'
	    );
	
	    echo sweettooth_elated_dynamic_css($item_selector, $item_styles);
	
	    // subtitle style
	
	    $item_styles = sweettooth_elated_get_typography_styles('page_subtitle');
	
	    $item_selector = array(
		    '.eltdf-title .eltdf-title-holder .eltdf-subtitle'
	    );
	
	    echo sweettooth_elated_dynamic_css($item_selector, $item_styles);
	
	    // breadcrumb style
	
	    $item_styles = sweettooth_elated_get_typography_styles('page_breadcrumb');
	
	    $item_selector = array(
		    '.eltdf-title .eltdf-title-holder .eltdf-breadcrumbs a',
		    '.eltdf-title .eltdf-title-holder .eltdf-breadcrumbs span'
	    );
	
	    echo sweettooth_elated_dynamic_css($item_selector, $item_styles);
	    

	    $breadcrumb_hover_color = sweettooth_elated_options()->getOptionValue('page_breadcrumb_hovercolor');
	    
        $breadcrumb_hover_styles = array();
        if(!empty($breadcrumb_hover_color)) {
            $breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
        }

        $breadcrumb_hover_selector = array(
            '.eltdf-title .eltdf-title-holder .eltdf-breadcrumbs a:hover'
        );

        echo sweettooth_elated_dynamic_css($breadcrumb_hover_selector, $breadcrumb_hover_styles);
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_title_area_typography_style');
}