<?php

if ( ! function_exists( 'sweettooth_elated_header_top_bar_styles' ) ) {
	/**
	 * Generates styles for header top bar
	 */
	function sweettooth_elated_header_top_bar_styles() {
		$top_header_height = sweettooth_elated_options()->getOptionValue( 'top_bar_height' );
		
		if ( ! empty( $top_header_height ) ) {
			echo sweettooth_elated_dynamic_css( '.eltdf-top-bar', array( 'height' => sweettooth_elated_filter_px( $top_header_height ) . 'px' ) );
			echo sweettooth_elated_dynamic_css( '.eltdf-top-bar .eltdf-logo-wrapper a', array( 'max-height' => sweettooth_elated_filter_px( $top_header_height ) . 'px' ) );
		}
		
		echo sweettooth_elated_dynamic_css( '.eltdf-top-bar-background', array( 'height' => sweettooth_elated_get_top_bar_background_height() . 'px' ) );
		
		if ( sweettooth_elated_options()->getOptionValue( 'top_bar_in_grid' ) == 'yes' ) {
			$top_bar_grid_selector                = '.eltdf-top-bar .eltdf-grid .eltdf-vertical-align-containers';
			$top_bar_grid_styles                  = array();
			$top_bar_grid_background_color        = sweettooth_elated_options()->getOptionValue( 'top_bar_grid_background_color' );
			$top_bar_grid_background_transparency = sweettooth_elated_options()->getOptionValue( 'top_bar_grid_background_transparency' );
			
			if ( !empty($top_bar_grid_background_color) ) {
				$grid_background_color        = $top_bar_grid_background_color;
				$grid_background_transparency = 1;
				
				if ( $top_bar_grid_background_transparency !== '' ) {
					$grid_background_transparency = $top_bar_grid_background_transparency;
				}
				
				$grid_background_color                   = sweettooth_elated_rgba_color( $grid_background_color, $grid_background_transparency );
				$top_bar_grid_styles['background-color'] = $grid_background_color;
			}
			
			echo sweettooth_elated_dynamic_css( $top_bar_grid_selector, $top_bar_grid_styles );
		}
		
		$top_bar_styles   = array();
		$background_color = sweettooth_elated_options()->getOptionValue( 'top_bar_background_color' );
		$border_color     = sweettooth_elated_options()->getOptionValue( 'top_bar_border_color' );
		
		if ( $background_color !== '' ) {
			$background_transparency = 1;
			if ( sweettooth_elated_options()->getOptionValue( 'top_bar_background_transparency' ) !== '' ) {
				$background_transparency = sweettooth_elated_options()->getOptionValue( 'top_bar_background_transparency' );
			}
			
			$background_color                   = sweettooth_elated_rgba_color( $background_color, $background_transparency );
			$top_bar_styles['background-color'] = $background_color;
			
			echo sweettooth_elated_dynamic_css( '.eltdf-top-bar-background', array( 'background-color' => $background_color ) );
		}
		
		if ( sweettooth_elated_options()->getOptionValue( 'top_bar_border' ) == 'yes' && $border_color != '' ) {
			$top_bar_styles['border-bottom'] = '1px solid ' . $border_color;
		}
		
		echo sweettooth_elated_dynamic_css( '.eltdf-top-bar', $top_bar_styles );
	}
	
	add_action( 'sweettooth_elated_action_style_dynamic', 'sweettooth_elated_header_top_bar_styles' );
}