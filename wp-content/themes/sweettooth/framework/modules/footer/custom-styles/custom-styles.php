<?php

if(!function_exists('sweettooth_elated_footer_top_general_styles')) {
    /**
     * Generates general custom styles for footer top area
     */
    function sweettooth_elated_footer_top_general_styles() {
        $item_styles = array();
        $background_color = sweettooth_elated_options()->getOptionValue('footer_top_background_color');

        if(!empty($background_color)) {
            $item_styles['background-color'] = $background_color;
        }

        echo sweettooth_elated_dynamic_css('.eltdf-page-footer .eltdf-footer-top-holder', $item_styles);
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_footer_top_general_styles');
}

if(!function_exists('sweettooth_elated_footer_top_columns_alignment')){
	/**
	 * Check footer top showing
	 * Function check value from options and checks if footer columns are empty.
	 * return bool
	 */
	function sweettooth_elated_footer_top_columns_alignment(){
		//check value from options and meta field on current page
		$option_flag = (sweettooth_elated_get_meta_field_intersect('show_footer_top') === 'yes') ? true : false;

		//check footer columns styles
		if($option_flag === true) {
			$footer_top_columns = sweettooth_elated_options()->getOptionValue('footer_top_columns');

			for($i = 1; $i <= $footer_top_columns; $i++){
				$styles = array();
				$footer_columns_id = '.eltdf-footer-column-'.$i;
				$footer_option_id = 'footer_top_column_'.$i.'_alignment';
				$footer_column_alignment = sweettooth_elated_options()->getOptionValue($footer_option_id);

				$selector = '.eltdf-page-footer '.$footer_columns_id;
				$styles['text-align'] = $footer_column_alignment;

				echo sweettooth_elated_dynamic_css($selector, $styles);
			}
		}
	}
	add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_footer_top_columns_alignment');
}

if(!function_exists('sweettooth_elated_footer_bottom_general_styles')) {
    /**
     * Generates general custom styles for footer bottom area
     */
    function sweettooth_elated_footer_bottom_general_styles() {
        $item_styles = array();
	    $background_color = sweettooth_elated_options()->getOptionValue('footer_bottom_background_color');
	
	    if(!empty($background_color)) {
		    $item_styles['background-color'] = $background_color;
	    }

        echo sweettooth_elated_dynamic_css('.eltdf-page-footer .eltdf-footer-bottom-holder', $item_styles);
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_footer_bottom_general_styles');
}