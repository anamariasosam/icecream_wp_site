<?php
namespace ElatedCore\CPT\Shortcodes\ImageCarousel;

use ElatedCore\Lib;

class ImageCarousel implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_image_carousel';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 */
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Elated Image Carousel', 'eltdf-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'                      => 'icon-wpb-image-carousel extended-custom-icon',
					'content_element'           => true,
					'as_parent'                 => array( 'only' => 'eltdf_image_carousel_item' ),
					'js_view'                   => 'VcColumnView',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'height',
							'heading'     => esc_html__('Slider Images Height (px or %)', 'eltdf-core'),
							'description' => esc_html__('Default is 460px', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'visible_items',
							'heading'     => esc_html__( 'Number Of Visible Items', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Default', 'eltdf-core' )  => 'default',
								esc_html__( '4', 'eltdf-core' )        => '4',
								esc_html__( '3', 'eltdf-core' )        => '3'
							),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_loop',
							'heading'     => esc_html__( 'Enable Slider Loop', 'eltdf-core' ),
							'value'       => array_flip( sweettooth_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_autoplay',
							'heading'     => esc_html__( 'Enable Slider Autoplay', 'eltdf-core' ),
							'value'       => array_flip( sweettooth_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed',
							'heading'     => esc_html__( 'Slide Duration', 'eltdf-core' ),
							'description' => esc_html__( 'Default value is 5000 (ms)', 'eltdf-core' ),
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed_animation',
							'heading'     => esc_html__( 'Slide Animation Duration', 'eltdf-core' ),
							'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'eltdf-core' ),
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_navigation',
							'heading'     => esc_html__( 'Enable Slider Navigation Arrows', 'eltdf-core' ),
							'value'       => array_flip( sweettooth_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_pagination',
							'heading'     => esc_html__( 'Enable Slider Pagination', 'eltdf-core' ),
							'value'       => array_flip( sweettooth_elated_get_yes_no_select_array( false, false ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Carousel Items', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'No Space', 'eltdf-core' ) => 'no',
								esc_html__( 'Tiny', 'eltdf-core' )     => 'tiny',
								esc_html__( 'Small', 'eltdf-core' )    => 'small',
								esc_html__( 'Normal', 'eltdf-core' )   => 'normal',
								esc_html__( 'Large', 'eltdf-core' )   => 'large'
							),
							'save_always' => true,
							'admin_label' => true,
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'height_1440',
							'heading'     => esc_html__('Slider Images height on screen size bellow 1440px (px or %)', 'eltdf-core'),
							'group'       => esc_html__('Responsiveness', 'eltdf-core')
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'height_1366',
							'heading'     => esc_html__('Slider Images height on screen size bellow 1366px (px or %)', 'eltdf-core'),
							'group'       => esc_html__('Responsiveness', 'eltdf-core')
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'height_1280',
							'heading'     => esc_html__('Slider Images height on screen size bellow 1280px (px or %)', 'eltdf-core'),
							'group'       => esc_html__('Responsiveness', 'eltdf-core')
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'height_1024',
							'heading'     => esc_html__('Slider Images height on screen size bellow 1024px (px or %)', 'eltdf-core'),
							'group'       => esc_html__('Responsiveness', 'eltdf-core')
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'height_768',
							'heading'     => esc_html__('Slider Images height on screen size bellow 768px (px or %)', 'eltdf-core'),
							'group'       => esc_html__('Responsiveness', 'eltdf-core')
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'height_600',
							'heading'     => esc_html__('Slider Images height on screen size bellow 600px (px or %)', 'eltdf-core'),
							'group'       => esc_html__('Responsiveness', 'eltdf-core')
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'height_480',
							'heading'     => esc_html__('Slider Images height on screen size bellow 480px (px or %)', 'eltdf-core'),
							'group'       => esc_html__('Responsiveness', 'eltdf-core')
						)
					)
				)
			);
		}
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
			'height'                  => '',
			'visible_items'           => '4',
			'slider_loop'		      => 'yes',
			'slider_autoplay'		  => 'yes',
			'slider_speed'		      => '5000',
			'slider_speed_animation'  => '600',
			'slider_navigation'	      => 'yes',
			'slider_pagination'	      => 'no',
			'space_between_items'     => 'no',
			'height_1440'             => '',
			'height_1280'             => '',
			'height_1024'             => '',
			'height_768'              => '',
			'height_600'              => '',
			'height_480'              => ''
		);

		$params = shortcode_atts($args, $atts);

		$rand_class = 'eltdf-image-carousel-custom-' . mt_rand(100000,1000000);

		$params['custom_class']    = $rand_class;
		$params['slider_classes']  = $this->getSliderClasses($params);
		$params['slider_data']     = $this->getSliderData($params);
		$params['content']         = $content;

		$html = eltdf_core_get_shortcode_module_template_part('templates/image-carousel', 'image-carousel', '', $params);

		return $html;
	}

	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getSliderClasses($params) {
		$holderSlider  = array();

		$holderSlider[] = $params['custom_class'];
		$holderSlider[] = 'eltdf-'.$params['space_between_items'].'-space';

		return implode( ' ', $holderSlider );
	}
	
	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getSliderData($params) {
		$slider_data = array();

		$slider_data['data-class'] = $params['custom_class'];
		
		$slider_data['data-number-of-items']        	= !empty($params['visible_items']) ? $params['visible_items'] : '4';
		$slider_data['data-enable-loop']            	= !empty($params['slider_loop']) ? $params['slider_loop'] : '';
		$slider_data['data-enable-autoplay']        	= !empty($params['slider_autoplay']) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           	= !empty($params['slider_speed']) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] 	= !empty($params['slider_speed_animation']) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-enable-navigation']      	= !empty($params['slider_navigation']) ? $params['slider_navigation'] : '';
		$slider_data['data-enable-pagination']      	= !empty($params['slider_pagination']) ? $params['slider_pagination'] : '';
		$slider_data['data-enable-auto-width']      	= 'no';
		$slider_data['data-enable-autoplay-hover-pause']= 'no';
		$slider_data['data-height']                 	= !empty($params['height']) ? $params['height'] : '';
		$slider_data['data-height-1440']            	= !empty($params['height_1440']) ? $params['height_1440'] : '';
		$slider_data['data-height-1366']            	= !empty($params['height_1366']) ? $params['height_1366'] : '';
		$slider_data['data-height-1280']            	= !empty($params['height_1280']) ? $params['height_1280'] : '';
		$slider_data['data-height-1024']            	= !empty($params['height_1024']) ? $params['height_1024'] : '400px';
		$slider_data['data-height-768']             	= !empty($params['height_768']) ? $params['height_768'] : '';
		$slider_data['data-height-600']             	= !empty($params['height_600']) ? $params['height_600'] : '';
		$slider_data['data-height-480']             	= !empty($params['height_480'])  ? $params['height_480'] : '300px';

		return $slider_data;
	}
}