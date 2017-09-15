<?php
namespace ElatedCore\CPT\Shortcodes\BackgroundSections;

use ElatedCore\Lib;


/**
 * Class ProductList that represents product list shortcode
 * @package eltdf-coreMkdf\Modules\Shortcodes\HorizontalTimelineItem
 */
class BackgroundSections implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'eltdf_background_sections';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
        vc_map(array(
            'name'              => esc_html__('Elated Background Sections', 'eltdf-core'),
            'base'              => $this->base,
            'category'          => 'by ELATED',
            'icon'              => 'icon-wpb-background-sections extended-custom-icon',
            'as_parent'         => array('except' => 'vc_row, vc_accordion'),
            'js_view'           => 'VcColumnView',
            'content_element'   => true,
            'params'            => array(
	            array(
		            'type'       => 'attach_image',
		            'param_name' => 'content_image',
		            'heading'    => esc_html__('Section Background Image', 'eltdf-core')
	            ),
	            array(
		            'type'        => 'dropdown',
		            'param_name'  => 'image_position',
		            'heading'     => esc_html__( 'Image Position', 'eltdf-core' ),
		            'value'       => array(
			            esc_html__( 'Left', 'eltdf-core' )   => 'left',
			            esc_html__( 'Right', 'eltdf-core' )  => 'right'
		            ),
		            'save_always' => true
	            ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'padding',
                    'heading' => esc_html__('Section Padding', 'eltdf-core'),
                    'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px (px or %)', 'eltdf-core'),
                ),
	            array(
		            'type' => 'textfield',
		            'param_name' => 'offset',
		            'heading' => esc_html__('Section Offset', 'eltdf-core'),
		            'description' => esc_html__('Please insert offset in format 0px 10px 0px 10px (px or %)', 'eltdf-core'),
	            ),
	            array(
		            'type'        => 'attach_image',
		            'param_name'  => 'image_laptop_big',
		            'heading'     => esc_html__('Background Image for Big Laptops (1440px)', 'eltdf-core'),
		            'group'       => esc_html__('Responsiveness', 'eltdf-core')
	            ),
	            array(
		            'type'        => 'attach_image',
		            'param_name'  => 'image_laptop',
		            'heading'     => esc_html__('Background Image for Laptops', 'eltdf-core'),
		            'group'       => esc_html__('Responsiveness', 'eltdf-core')
	            ),
	            array(
		            'type'        => 'attach_image',
		            'param_name'  => 'image_tablet',
		            'heading'     => esc_html__('Background Image for Tablets - Landscape', 'eltdf-core'),
		            'group'       => esc_html__('Responsiveness', 'eltdf-core')
	            ),
	            array(
		            'type'        => 'attach_image',
		            'param_name'  => 'image_tablet_portrait',
		            'heading'     => esc_html__('Background Image for Tablets - Portrait', 'eltdf-core'),
		            'group'       => esc_html__('Responsiveness', 'eltdf-core')
	            ),
	            array(
		            'type'        => 'attach_image',
		            'param_name'  => 'image_mobile',
		            'heading'     => esc_html__('Background Image for Mobiles', 'eltdf-core'),
		            'group'       => esc_html__('Responsiveness', 'eltdf-core')
	            )
            )
        ));
    }

    /**
     * Renders HTML for product list shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
	        'content_image'         => '',
	        'image_position'        => 'left',
            'padding'               => '',
            'offset'                => '',
			'image_laptop'          => '',
			'image_tablet'          => '',
			'image_tablet_portrait' => '',
			'image_mobile'          => ''
        );

        $params = shortcode_atts($default_atts, $atts);
	    $rand_class = 'eltdf-fss-custom-' . mt_rand(100000,1000000);

	    $params['holder_unique_class'] = $rand_class;
	    $params['holder_data']         = $this->getHolderData($params);
	    $params['holder_classes']      = $this->getHolderClasses($params);
	    $params['holder_styles']       = $this->getHolderStyles($params);
	    $params['content']             = $content;

        $html = eltdf_core_get_shortcode_module_template_part('templates/background-sections','background-sections', '', $params);

        return $html;
    }

	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses($params) {
		$holderClasses  = array();

		$holderClasses[] = ! empty($params['content_image']) ? 'eltdf-bs-has-image' : 'eltdf-bs-no-image';
		$holderClasses[] = 'eltdf-bs-image-'.$params['image_position'];
		$holderClasses[] = ! empty( $params['holder_unique_class'] ) ? $params['holder_unique_class'] : '';

		return implode( ' ', $holderClasses );
	}

	/**
	 * Generates holder styles
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderStyles($params) {
		$styles   = array();

		if(!empty($params['padding'])) {
			$styles[] = 'padding: '. $params['padding'];
		}

		if(!empty($params['offset'])) {
			$styles[] = 'margin: '. $params['offset'];
		}

		if(!empty($params['content_image'])) {
			$image_src = $this->getImageSrc($params);

			$styles[] = 'background-image: url('. $image_src .')';
		}

		return implode( ';', $styles );
	}

	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderData($params) {
		$data   = array();
		$data['data-item-class'] = $params['holder_unique_class'];

		if ( ! empty( $params['image_laptop_big'] ) ) {
			$image                         = wp_get_attachment_image_src( $params['image_laptop_big'], 'full' );
			$data['data-big-laptop-image'] = $image[0];
		}

		if ( ! empty( $params['image_laptop'] ) ) {
			$image                     = wp_get_attachment_image_src( $params['image_laptop'], 'full' );
			$data['data-laptop-image'] = $image[0];
		}

		if ( $params['image_tablet'] !== '' ) {
			$image                     = wp_get_attachment_image_src( $params['image_tablet'], 'full' );
			$data['data-tablet-image'] = $image[0];
		}

		if ( $params['image_tablet_portrait'] !== '' ) {
			$image                              = wp_get_attachment_image_src( $params['image_tablet_portrait'], 'full' );
			$data['data-tablet-portrait-image'] = $image[0];
		}

		if ( $params['image_mobile'] !== '' ) {
			$image                     = wp_get_attachment_image_src( $params['image_mobile'], 'full' );
			$data['data-mobile-image'] = $image[0];
		}

		return $data;
	}

	/**
	 * Get attached image source
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getImageSrc($params) {
		$image_src = '';

		if( ! empty($params['content_image']) ) {
			$image_src = wp_get_attachment_image_src($params['content_image'], 'full');

			if( is_array($image_src) ) {
				$image_src = $image_src[0];
			}
		}

		return $image_src;
	}
}