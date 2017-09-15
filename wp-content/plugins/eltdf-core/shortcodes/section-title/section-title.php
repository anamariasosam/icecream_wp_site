<?php
namespace ElatedCore\CPT\Shortcodes\SectionTitle;

use ElatedCore\Lib;

class SectionTitle implements Lib\ShortcodeInterface {
	private $base; 
	
	function __construct() {
		$this->base = 'eltdf_section_title';

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
					'name'                      => esc_html__( 'Elated Section Title', 'eltdf-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'                      => 'icon-wpb-section-title extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'position',
							'heading'     => esc_html__( 'Horizontal Position', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Default', 'eltdf-core' ) => '',
								esc_html__( 'Left', 'eltdf-core' )    => 'left',
								esc_html__( 'Center', 'eltdf-core' )  => 'center',
								esc_html__( 'Right', 'eltdf-core' )   => 'right'
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'holder_padding_left',
							'heading'    => esc_html__( 'Holder Left Padding (px or %)', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'holder_padding_right',
							'heading'    => esc_html__( 'Holder Right Padding (px or %)', 'eltdf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'eltdf-core' ),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'eltdf-core' ),
							'value'       => array_flip( sweettooth_elated_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'eltdf-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'eltdf-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_font_size',
							'heading'    => esc_html__( 'Text Font Size (px)', 'eltdf-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_line_height',
							'heading'    => esc_html__( 'Text Line Height (px)', 'eltdf-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_font_weight',
							'heading'     => esc_html__( 'Text Font Weight', 'eltdf-core' ),
							'value'       => array_flip( sweettooth_elated_get_font_weight_array( true ) ),
							'save_always' => true,
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_margin',
							'heading'    => esc_html__( 'Text Top Margin (px)', 'eltdf-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'separator',
							'heading'    => esc_html__( 'Enable Separator', 'eltdf-core' ),
							'value'      => array_flip(sweettooth_elated_get_yes_no_select_array(false, true)),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'separator_skin',
							'heading'     => esc_html__( 'Separator Skin Color', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Main Color', 'eltdf-core' )            => '',
								esc_html__( 'Inherit From Title', 'eltdf-core' )    => 'inherit'
							),
							'dependency'  => array( 'element' => 'separator', 'value' => array('yes') ),
							'save_always' => true,
							'admin_label' => true
						),
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'position'              => '',
			'holder_padding_left'   => '',
			'holder_padding_right'  => '',
			'title'                 => '',
			'title_tag'             => 'h2',
			'title_color'           => '',
			'text'                  => '',
			'text_color'            => '',
			'text_font_size'        => '',
			'text_line_height'      => '',
			'text_font_weight'      => '',
			'text_margin'           => '',
			'separator'             => 'yes',
			'separator_skin'        => ''
        );
		$params = shortcode_atts($args, $atts);

		$params['holder_class']  = $this->getHolderClasses($params);
		$params['holder_styles'] = $this->getHolderStyles($params);
		$params['title_tag']     = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']  = $this->getTitleStyles($params);
		$params['text_styles']   = $this->getTextStyles($params);
		$params['title_align']   = $params['position'] ? 'eltdf-title-'.$params['position'] : '';

		$html = eltdf_core_get_shortcode_module_template_part('templates/section-title', 'section-title', '', $params);
		
		return $html;
	}

	private function getHolderClasses($params) {
		$classes = array();

		$classes[] = $params['separator'] === 'no' ? 'eltdf-separator-disabled' : '';
		$classes[] = !empty($params['separator_skin']) ? 'eltdf-separator-inherit-color' : '';

		return implode(' ', $classes);
	}
	
	private function getHolderStyles($params) {
		$styles = array();
		
		if (!empty($params['holder_padding_left'])) {
			$styles[] = 'padding-left: '.$params['holder_padding_left'];
		}

		if (!empty($params['holder_padding_right'])) {
			$styles[] = 'padding-right: '.$params['holder_padding_right'];
		}
		
		if (!empty($params['position'])) {
			$styles[] = 'text-align: '.$params['position'];
		}
		
		return implode(';', $styles);
	}
	
	private function getTitleStyles($params) {
		$styles = array();
		
		if (!empty($params['title_color'])) {
			$styles[] = 'color: '.$params['title_color'];
		}
		
		return implode(';', $styles);
	}
	
	private function getTextStyles($params) {
		$styles = array();
		
		if (!empty($params['text_color'])) {
			$styles[] = 'color: '.$params['text_color'];
		}
		
		if (!empty($params['text_font_size'])) {
			$styles[] = 'font-size: '.sweettooth_elated_filter_px($params['text_font_size']).'px';
		}
		
		if (!empty($params['text_line_height'])) {
			$styles[] = 'line-height: '.sweettooth_elated_filter_px($params['text_line_height']).'px';
		}
		
		if (!empty($params['text_font_weight'])) {
			$styles[] = 'font-weight: '.$params['text_font_weight'];
		}
		
		if (!empty($params['text_margin'])) {
			$styles[] = 'margin-top: '.sweettooth_elated_filter_px($params['text_margin']).'px';
		}
		
		return implode(';', $styles);
	}
}