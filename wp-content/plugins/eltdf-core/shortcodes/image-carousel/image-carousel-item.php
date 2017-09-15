<?php
namespace ElatedCore\CPT\Shortcodes\ImageCarouselItem;

use ElatedCore\Lib;

class ImageCarouselItem implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_image_carousel_item';

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
					'name'                      => esc_html__( 'Elated Image Carousel Item', 'eltdf-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'                      => 'icon-wpb-image-carousel-item extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'as_child'                  => array( 'only' => 'eltdf_image_carousel' ),
					'params'                    => array(
						array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Image', 'eltdf-core' ),
							'description' => esc_html__( 'Select images from media library', 'eltdf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Slide Title', 'eltdf-core' ),
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_transform',
							'heading'     => esc_html__( 'Slide Title Transform', 'eltdf-core' ),
							'value'       => array_flip(sweettooth_elated_get_text_transform_array(true)),
							'dependency'  => array('element' => 'title', 'not_empty' => true)
						),
						array(
							'type'        => 'colorpicker',
							'param_name'  => 'title_color',
							'heading'     => esc_html__( 'Slide Title Color', 'eltdf-core' ),
							'dependency'  => array('element' => 'title', 'not_empty' => true)
						),
						array(
							'type'        => 'textarea',
							'param_name'  => 'subtitle',
							'heading'     => esc_html__( 'Slide Text', 'eltdf-core' ),
						),
						array(
							'type'        => 'colorpicker',
							'param_name'  => 'subtitle_color',
							'heading'     => esc_html__( 'Slide Text Color', 'eltdf-core' ),
							'dependency'  => array('element' => 'subtitle', 'not_empty' => true)
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_link',
							'heading'     => esc_html__( 'Slide Custom Link', 'eltdf-core' ),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'custom_link_target',
							'heading'    => esc_html__( 'Custom Link Target', 'eltdf-core' ),
							'value'      => array_flip( sweettooth_elated_get_link_target_array() ),
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'content_offset',
							'heading'     => esc_html__( 'Slides Content Top Offset (px or %)', 'eltdf-core' )
						),
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
			'image'			          => '',
			'title'			          => '',
			'title_transform'         => '',
			'title_color'             => '',
			'subtitle_color'          => '',
			'subtitle'			      => '',
			'custom_link'			  => '',
			'custom_link_target'      => '_self',
			'content_offset'          => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['image_styles']       = $this->getImageStyles($params);
		$params['content_styles']     = $this->getContentStyles($params);
		$params['title_styles']       = $this->getTitleStyles($params);
		$params['subtitle_styles']    = $this->getSubtitleStyles($params);

        $params['custom_link_target'] = !empty($params['custom_link_target']) ? $params['custom_link_target'] : $args['custom_link_target'];

		$html = eltdf_core_get_shortcode_module_template_part('templates/image-carousel-item', 'image-carousel', '', $params);

		return $html;
	}

	/**
	 * Return Image Styles
	 *
	 * @param $params
	 * @return array
	 */
	private function getImageStyles($params) {
		$styles = array();

		$image_src = $this->getImageSrc($params);

		if (!empty($image_src)) {
			$styles[] = 'background-image:  url(' . $image_src.')';
		}

		return implode(';', $styles);
	}

	/**
	 * Return content styles
	 *
	 * @param $params
	 * @return array
	 */
	private function getContentStyles($params) {
		$styles = array();

		if (!empty($params['content_offset'])) {
			$styles[] = 'margin-top:' . $params['content_offset'];
		}

		return implode(';', $styles);
	}

	/**
	 * Return title styles
	 *
	 * @param $params
	 * @return array
	 */
	private function getTitleStyles($params) {
		$styles = array();

		if (!empty($params['title_color'])) {
			$styles[] = 'color:' . $params['title_color'];
		}

		if (!empty($params['title_transform'])) {
			$styles[] = 'text-transform:' . $params['title_transform'];
		}

		return implode(';', $styles);
	}

	/**
	 * Return subtitle styles
	 *
	 * @param $params
	 * @return array
	 */
	private function getSubtitleStyles($params) {
		$styles = array();

		if (!empty($params['subtitle_color'])) {
			$styles[] = 'color:' . $params['subtitle_color'];
		}

		return implode(';', $styles);
	}

	/**
	 * Return image url
	 *
	 * @param $params
	 * @return array
	 */
	private function getImageSrc($params) {
		$url = '';

		if ($params['image']) {

			$image['image_id'] = $params['image'];
			$image_original    = wp_get_attachment_image_src($params['image'], 'full');

			$url = $image_original[0];
		}

		return $url;
	}
}