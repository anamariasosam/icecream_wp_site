<?php
namespace ElatedCore\CPT\Shortcodes\InnerRowHolder;

use ElatedCore\Lib;

class InnerRowColumn implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_inner_row_column';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'            => esc_html__( 'Elated Inner Row Column', 'eltdf-core' ),
					'base'            => $this->base,
					'as_child'        => array( 'only' => 'eltdf_inner_row_holder' ),
					'as_parent'       => array( 'except' => 'vc_row, vc_accordion' ),
					'content_element' => true,
					'category'        => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'            => 'icon-wpb-inner-row-column extended-custom-icon',
					'js_view'         => 'VcColumnView',
					'params'          => array(
						array(
							'type'       => 'dropdown',
							'param_name' => 'column_size',
							'heading'    => esc_html__( 'Column Size', 'eltdf-core' ),
							'value'      => array(
								esc_html__( 'One Even', 'eltdf-core' )   => '12',
								esc_html__( 'One Half', 'eltdf-core' )   => '6',
								esc_html__( 'One Third', 'eltdf-core' )  => '4',
								esc_html__( 'One Fourth', 'eltdf-core' ) => '3',
								esc_html__( 'One Sixth', 'eltdf-core' )  => '2',
								esc_html__( 'One Twenty', 'eltdf-core' ) => '1'
							)
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'column_size' => '1'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['column_classes'] = $this->getColumnClasses( $params, $args );
		
		$params['content'] = $content;
		
		$html = eltdf_core_get_shortcode_module_template_part( 'templates/inner-row-column', 'inner-row', '', $params );
		
		return $html;
	}
	
	/**
	 * Generates column classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getColumnClasses( $params, $args ) {
		$holderClasses = '';
		
		$holderClasses .= ! empty( $params['column_size'] ) ? ' eltdf-grid-col-' . $params['column_size'] : ' eltdf-grid-col-' . $args['column_size'];
		
		return $holderClasses;
	}
}
