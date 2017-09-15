<?php
namespace ElatedCore\CPT\Shortcodes\InnerRowHolder;

use ElatedCore\Lib;

class InnerRowHolder implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_inner_row_holder';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'      => esc_html__( 'Elated Inner Row Holder', 'eltdf-core' ),
					'base'      => $this->base,
					'icon'      => 'icon-wpb-inner-row-holder extended-custom-icon',
					'category'  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'as_parent' => array( 'only' => 'eltdf_inner_row_column' ),
					'js_view'   => 'VcColumnView',
					'params'    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_columns',
							'heading'     => esc_html__( 'Space Between Columns', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Large', 'eltdf-core' )    => 'large',
								esc_html__( 'Medium', 'eltdf-core' )   => 'medium',
								esc_html__( 'Normal', 'eltdf-core' )   => 'normal',
								esc_html__( 'Small', 'eltdf-core' )    => 'small',
								esc_html__( 'Tiny', 'eltdf-core' )     => 'tiny',
								esc_html__( 'No Space', 'eltdf-core' ) => 'no'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_alignment',
							'heading'     => esc_html__( 'Horizontal Alignment', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Default', 'eltdf-core' ) => '',
								esc_html__( 'Left', 'eltdf-core' )    => 'left',
								esc_html__( 'Center', 'eltdf-core' )  => 'center',
								esc_html__( 'Right', 'eltdf-core' )   => 'right'
							),
							'save_always' => true
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'space_between_columns' => 'normal',
			'text_alignment'        => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params, $args );
		
		$html = '';
		
		$html .= '<div class="eltdf-inner-row-holder eltdf-grid-row ' . esc_attr( $params['holder_classes'] ) . '">';
		$html .= do_shortcode( $content );
		$html .= '</div>';
		
		return $html;
	}
	
	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses( $params, $args ) {
		$holderClasses = '';
		
		$holderClasses .= ! empty( $params['space_between_columns'] ) ? ' eltdf-grid-' . $params['space_between_columns'] . '-gutter' : ' eltdf-grid-' . $args['space_between_items'] . '-gutter';
		$holderClasses .= ! empty( $params['text_alignment'] ) ? ' eltdf-ir-alignment-' . $params['text_alignment'] : '';
		
		return $holderClasses;
	}
}
