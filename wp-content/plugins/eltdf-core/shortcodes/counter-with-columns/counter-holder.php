<?php
namespace ElatedCore\CPT\Shortcodes\CounterHolder;

use ElatedCore\Lib;

class CounterHolder implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_counter_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'      => esc_html__( 'Elated Counter With Columns', 'eltdf-core' ),
					'base'      => $this->base,
					'icon'      => 'icon-wpb-counter-wc-holder extended-custom-icon',
					'category'  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'as_parent' => array( 'only' => 'eltdf_counter' ),
					'js_view'   => 'VcColumnView',
					'params'    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Two', 'eltdf-core' )   => '2',
								esc_html__( 'Three', 'eltdf-core' ) => '3',
								esc_html__( 'Four', 'eltdf-core' )  => '4',
								esc_html__( 'Five', 'eltdf-core' )  => '5',
								esc_html__( 'Six', 'eltdf-core' )   => '6'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_columns',
							'heading'     => esc_html__( 'Space Between Columns', 'eltdf-core' ),
							'value'       => array(
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
							'heading'     => esc_html__( 'Item Horizontal Alignment', 'eltdf-core' ),
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

	public function render($atts, $content = null) {
		$args = array(
			'number_of_columns' 	=> '3',
			'space_between_columns'	=> 'normal',
			'text_alignment' 	    => ''
		);
		$params = shortcode_atts($args, $atts);
		
		$params['holder_classes'] = $this->getHolderClasses($params, $args);
		
		$html = '';

		$html .= '<div class="eltdf-counter-wc-holder '.esc_attr($params['holder_classes']).'"><div class="eltdf-ch-inner">';
			$html .= do_shortcode($content);
		$html .= '</div></div>';

		return $html;
	}
	
	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses($params, $args) {
		$holderClasses = '';
		
		$holderClasses .= !empty($params['number_of_columns']) ? ' eltdf-ch-columns-' . $params['number_of_columns'] : ' eltdf-ch-columns-' . $args['number_of_columns'];
		$holderClasses .= !empty($params['space_between_columns']) ? ' eltdf-ch-' . $params['space_between_columns'] . '-space' : ' eltdf-ch-' . $args['space_between_items'] . '-space';
		$holderClasses .= !empty($params['text_alignment']) ? ' eltdf-ch-alignment-' . $params['text_alignment'] : '';
		
		return $holderClasses;
	}
}
