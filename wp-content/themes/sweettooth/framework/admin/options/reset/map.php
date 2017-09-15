<?php

if ( ! function_exists( 'sweettooth_elated_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function sweettooth_elated_reset_options_map() {
		
		sweettooth_elated_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'sweettooth' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = sweettooth_elated_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'sweettooth' )
			)
		);
		
		sweettooth_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'sweettooth' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'sweettooth' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'sweettooth_elated_action_options_map', 'sweettooth_elated_reset_options_map', 100 );
}