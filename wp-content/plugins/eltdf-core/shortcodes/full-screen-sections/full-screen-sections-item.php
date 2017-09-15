<?php
namespace ElatedCore\CPT\Shortcodes\FullScreenSections;

use ElatedCore\Lib;

class FullScreenSectionsItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_full_screen_sections_item';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'            => esc_html__( 'Elated Full Screen Sections Item', 'eltdf-core' ),
					'base'            => $this->base,
					'as_child'        => array( 'only' => 'eltdf_full_screen_sections' ),
					'as_parent'       => array( 'except' => 'vc_row, vc_accordion' ),
					'category'        => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'            => 'icon-wpb-full-screen-sections-item extended-custom-icon',
					'js_view'         => 'VcColumnView',
					'content_element' => true,
					'params'          => array(
						array(
							'type'       => 'colorpicker',
							'param_name' => 'background_color',
							'heading'    => esc_html__( 'Background Color', 'eltdf-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'background_image',
							'heading'    => esc_html__('Background Image', 'eltdf-core')
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'padding',
							'heading'     => esc_html__( 'Content Padding', 'eltdf-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left. You can use px or %', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'vertical_alignment',
							'heading'     => esc_html__( 'Content Vertical Alignment', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Default', 'eltdf-core' ) => '',
								esc_html__( 'Top', 'eltdf-core' )     => 'top',
								esc_html__( 'Middle', 'eltdf-core' )  => 'middle',
								esc_html__( 'Bottom', 'eltdf-core' )  => 'bottom'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'horizontal_alignment',
							'heading'     => esc_html__( 'Content Horizontal Alignment', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Default', 'eltdf-core' ) => '',
								esc_html__( 'Left', 'eltdf-core' )    => 'left',
								esc_html__( 'Center', 'eltdf-core' )  => 'center',
								esc_html__( 'Right', 'eltdf-core' )   => 'right'
							),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'link',
							'heading'     => esc_html__( 'Link', 'eltdf-core' ),
							'description' => esc_html__( 'Set custom link around item', 'eltdf-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'link_target',
							'heading'    => esc_html__( 'Custom Link Target', 'eltdf-core' ),
							'value'      => array_flip( sweettooth_elated_get_link_target_array() ),
							'dependency' => Array( 'element' => 'link', 'not_empty' => true )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'background_color'     => '',
			'background_image'     => '',
			'padding'              => '',
			'vertical_alignment'   => '',
			'horizontal_alignment' => '',
			'link'                 => '',
			'link_target'          => '_self'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']    = $this->getHolderClasses( $params );
		$params['holder_styles']     = $this->getHolderStyles( $params );
		$params['item_inner_styles'] = $this->getItemInnerStyles( $params );
		$params['link_target']       = !empty($params['link_target']) ? $params['link_target'] : $args['link_target'];
		
		$params['content'] = $content;
		
		$html = eltdf_core_get_shortcode_module_template_part( 'templates/full-screen-sections-item', 'full-screen-sections', '', $params );
		
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
		
		$holderClasses[] = ! empty( $params['vertical_alignment'] ) ? 'eltdf-fss-item-va-' . $params['vertical_alignment'] : '';
		$holderClasses[] = ! empty( $params['horizontal_alignment'] ) ? 'eltdf-fss-item-ha-' . $params['horizontal_alignment'] : '';
		$holderClasses[] = ! empty( $params['link'] ) ? 'eltdf-fss-item-has-link' : '';
		
		return implode( ' ', $holderClasses );
	}
	
	/**
	 * Returns inline holder styles
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['background_color'];
		}
		
		if ($params['background_image'] !== '') {
			$styles[] = 'background-image: url(' . wp_get_attachment_url($params['background_image']) . ')';
		}
		
		return implode( ';', $styles );
	}
	
	/**
	 * Returns inline item inner styles
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getItemInnerStyles( $params ) {
		$styles = array();
		
		if ( $params['padding'] !== '' ) {
			$styles[] = 'padding: ' . $params['padding'];
		}
		
		return implode( ';', $styles );
	}
}
