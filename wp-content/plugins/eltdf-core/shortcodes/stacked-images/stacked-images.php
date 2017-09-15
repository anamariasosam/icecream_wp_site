<?php
namespace ElatedCore\CPT\Shortcodes\StackedImages;

use ElatedCore\Lib;

class StackedImages implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_stacked_images';
		
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'     => esc_html__( 'Elated Stacked Images', 'eltdf-core' ),
					'base'     => $this->base,
					'category' => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'     => 'icon-wpb-stacked-images extended-custom-icon',
					'params'   => array(
						array(
							'type'       => 'attach_image',
							'param_name' => 'item_image',
							'heading'    => esc_html__( 'Image', 'eltdf-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'item_stack_image',
							'heading'    => esc_html__( 'Stack Image', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'stack_image_position',
							'heading'     => esc_html__( 'Stack Image Position', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Left Offset', 'eltdf-core' )  => 'left',
								esc_html__( 'Right Offset', 'eltdf-core' ) => 'right'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'item_stack_image', 'not_empty' => true )
						)
					)
				)
			);
		}
	}
	
	public function render($atts, $content = null) {
		$args = array(
			'item_image'           => '',
			'item_stack_image'     => '',
			'stack_image_position' => 'left'
		);
		$params = shortcode_atts($args, $atts);
		
		$params['holder_classes'] = $this->getHolderClasses( $params, $args );
		
		$html = eltdf_core_get_shortcode_module_template_part('templates/stacked-images', 'stacked-images', '', $params);
		
		return $html;
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['stack_image_position'] ) ? 'eltdf-si-position-' . $params['stack_image_position'] : 'eltdf-si-position-' . $args['stack_image_position'];
		
		return implode( ' ', $holderClasses );
	}
}