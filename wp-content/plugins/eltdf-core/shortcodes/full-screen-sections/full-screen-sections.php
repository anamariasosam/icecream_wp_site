<?php
namespace ElatedCore\CPT\Shortcodes\FullScreenSections;

use ElatedCore\Lib;

class FullScreenSections implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_full_screen_sections';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'      => esc_html__( 'Elated Full Screen Sections', 'eltdf-core' ),
					'base'      => $this->base,
					'icon'      => 'icon-wpb-full-screen-sections extended-custom-icon',
					'category'  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'as_parent' => array( 'only' => 'eltdf_full_screen_sections_item' ),
					'js_view'   => 'VcColumnView',
					'params'    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_navigation',
							'heading'     => esc_html__( 'Enable Navigation Arrows', 'eltdf-core' ),
							'value'       => array_flip( sweettooth_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'navigation_skin',
							'heading'     => esc_html__( 'Navigation Arrows Skin', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Default', 'eltdf-core' ) => '',
								esc_html__( 'Light', 'eltdf-core' )   => 'light',
								esc_html__( 'Dark', 'eltdf-core' )    => 'dark'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'enable_navigation', 'value' => array( 'yes' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_pagination',
							'heading'     => esc_html__( 'Enable Pagination Dots', 'eltdf-core' ),
							'value'       => array_flip( sweettooth_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'pagination_skin',
							'heading'     => esc_html__( 'Pagination Dots Skin', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Default', 'eltdf-core' ) => '',
								esc_html__( 'Light', 'eltdf-core' )   => 'light',
								esc_html__( 'Dark', 'eltdf-core' )    => 'dark'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'enable_pagination', 'value' => array( 'yes' ) )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'enable_navigation' => 'yes',
			'navigation_skin'   => '',
			'enable_pagination' => 'yes',
			'pagination_skin'   => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['holder_data']    = $this->getHolderData( $params );
		$params['content']        = $content;
		
		$html = eltdf_core_get_shortcode_module_template_part( 'templates/full-screen-sections', 'full-screen-sections', '', $params );
		
		return $html;
	}
	
	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = $params['enable_navigation'] === 'yes' ? 'eltdf-fss-has-nav' : '';
		$holderClasses[] = ! empty( $params['navigation_skin'] ) ? ' eltdf-fss-nav-skin-' . $params['navigation_skin'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	/**
	 * Return Holder data
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getHolderData( $params ) {
		$data = array();
		
		if ( ! empty( $params['enable_navigation'] ) ) {
			$data['data-enable-navigation'] = $params['enable_navigation'];
		}
		
		if ( ! empty( $params['enable_pagination'] ) ) {
			$data['data-enable-pagination'] = $params['enable_pagination'];
		}
		
		if ( $params['pagination_skin'] !== '' ) {
			$data['data-pagination-skin'] = $params['pagination_skin'];
		}
		
		return $data;
	}
}
