<?php
namespace ElatedCore\CPT\Shortcodes\ImageGallery;

use ElatedCore\Lib;

class ImageGallery implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_image_gallery';

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
					'name'                      => esc_html__( 'Elated Image Gallery', 'eltdf-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'                      => 'icon-wpb-image-gallery extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Gallery Type', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Image Grid', 'eltdf-core' ) => 'grid',
								esc_html__( 'Masonry', 'eltdf-core' )    => 'masonry',
								esc_html__( 'Slider', 'eltdf-core' )     => 'slider',
								esc_html__( 'Carousel', 'eltdf-core' )   => 'carousel'
							),
							'save_always' => true,
							'admin_label' => true
						),
						array(
							'type'        => 'attach_images',
							'param_name'  => 'images',
							'heading'     => esc_html__( 'Images', 'eltdf-core' ),
							'description' => esc_html__( 'Select images from media library', 'eltdf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'image_size',
							'heading'     => esc_html__( 'Image Size', 'eltdf-core' ),
							'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'eltdf-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'image_behavior',
							'heading'    => esc_html__( 'Image Behavior', 'eltdf-core' ),
							'value'      => array(
								esc_html__( 'None', 'eltdf-core' )             => '',
								esc_html__( 'Open Lightbox', 'eltdf-core' )    => 'lightbox',
								esc_html__( 'Open Custom Link', 'eltdf-core' ) => 'custom-link',
								esc_html__( 'Zoom', 'eltdf-core' )             => 'zoom',
								esc_html__( 'Grayscale', 'eltdf-core' )        => 'grayscale'
							)
						),
						array(
							'type'        => 'textarea',
							'param_name'  => 'custom_links',
							'heading'     => esc_html__( 'Custom Links', 'eltdf-core' ),
							'description' => esc_html__( 'Delimit links by comma', 'eltdf-core' ),
							'dependency'  => array( 'element' => 'image_behavior', 'value' => array( 'custom-link' ) )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'custom_link_target',
							'heading'    => esc_html__( 'Custom Link Target', 'eltdf-core' ),
							'value'      => array_flip( sweettooth_elated_get_link_target_array() ),
							'dependency' => array( 'element' => 'image_behavior', 'value' => array( 'custom-link' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Two', 'eltdf-core' )   => 'two',
								esc_html__( 'Three', 'eltdf-core' ) => 'three',
								esc_html__( 'Four', 'eltdf-core' )  => 'four',
								esc_html__( 'Five', 'eltdf-core' )  => 'five',
								esc_html__( 'Six', 'eltdf-core' )   => 'six'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'grid', 'masonry' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_columns',
							'heading'     => esc_html__( 'Space Between Columns', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Big', 'eltdf-core' )      => 'big',
								esc_html__( 'Normal', 'eltdf-core' )   => 'normal',
								esc_html__( 'Small', 'eltdf-core' )    => 'small',
								esc_html__( 'Tiny', 'eltdf-core' )     => 'tiny',
								esc_html__( 'No Space', 'eltdf-core' ) => 'no'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'grid', 'masonry' ) )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'shadow',
							'heading'    => esc_html__( 'Enable Image Shadow', 'eltdf-core' ),
							'value'      => array_flip( sweettooth_elated_get_yes_no_select_array( false ) ),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'grid' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_visible_items',
							'heading'     => esc_html__( 'Number Of Visible Items', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'One', 'eltdf-core' )   => '1',
								esc_html__( 'Two', 'eltdf-core' )   => '2',
								esc_html__( 'Three', 'eltdf-core' ) => '3',
								esc_html__( 'Four', 'eltdf-core' )  => '4',
								esc_html__( 'Five', 'eltdf-core' )  => '5',
								esc_html__( 'Six', 'eltdf-core' )   => '6'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'carousel' ) ),
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_loop',
							'heading'     => esc_html__( 'Enable Slider Loop', 'eltdf-core' ),
							'value'       => array_flip( sweettooth_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'slider', 'carousel' ) ),
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_autoplay',
							'heading'     => esc_html__( 'Enable Slider Autoplay', 'eltdf-core' ),
							'value'       => array_flip( sweettooth_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'slider', 'carousel' ) ),
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed',
							'heading'     => esc_html__( 'Slide Duration', 'eltdf-core' ),
							'description' => esc_html__( 'Default value is 5000 (ms)', 'eltdf-core' ),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'slider', 'carousel' ) ),
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed_animation',
							'heading'     => esc_html__( 'Slide Animation Duration', 'eltdf-core' ),
							'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'eltdf-core' ),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'slider', 'carousel' ) ),
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_navigation',
							'heading'     => esc_html__( 'Enable Slider Navigation Arrows', 'eltdf-core' ),
							'value'       => array_flip( sweettooth_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'slider', 'carousel' ) ),
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_pagination',
							'heading'     => esc_html__( 'Enable Slider Pagination', 'eltdf-core' ),
							'value'       => array_flip( sweettooth_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'slider', 'carousel' ) ),
							'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
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
			'type'                    => 'grid',
			'images'			      => '',
			'image_size'		      => 'thumbnail',
			'image_behavior'          => '',
			'custom_links'		      => '',
			'custom_link_target'      => '_self',
			'number_of_columns'		  => 'three',
			'space_between_columns'   => 'normal',
			'number_of_visible_items' => '1',
			'shadow'			      => 'no',
			'slider_loop'		      => 'yes',
			'slider_autoplay'		  => 'yes',
			'slider_speed'		      => '5000',
			'slider_speed_animation'  => '600',
			'slider_navigation'	      => 'yes',
			'slider_pagination'	      => 'yes'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params, $args );
		$params['inner_classes']  = $this->getInnerClasses( $params, $args );
		$params['slider_data']    = $this->getSliderData( $params );
		
		$params['images']             = $this->getGalleryImages( $params );
		$params['image_size']         = $this->getImageSize( $params['image_size'] );
		$params['image_behavior']     = ! empty( $params['image_behavior'] ) ? $params['image_behavior'] : $args['image_behavior'];
		$params['custom_links']       = $this->getCustomLinks( $params );
		$params['custom_link_target'] = ! empty( $params['custom_link_target'] ) ? $params['custom_link_target'] : $args['custom_link_target'];
		$params['type']               = ! empty( $params['type'] ) ? $params['type'] : $args['type'];
		
		$html = eltdf_core_get_shortcode_module_template_part( 'templates/' . $params['type'], 'image-gallery', '', $params );

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
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['type'] ) ? 'eltdf-ig-' . $params['type'] . '-type' : 'eltdf-ig-' . $args['type'] . '-type';
		$holderClasses[] = ! empty( $params['image_behavior'] ) ? 'eltdf-image-behavior-' . $params['image_behavior'] : 'eltdf-image-behavior-' . $args['image_behavior'];
		$holderClasses[] = $params['shadow'] === 'yes' ? ' eltdf-ig-has-shadow' : '';
		
		return implode( ' ', $holderClasses );
	}
	
	/**
	 * Generates gallery classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getInnerClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = $params['type'] === 'masonry' ? 'eltdf-ig-masonry' : 'eltdf-ig-grid';
		$holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'eltdf-ig-' . $params['number_of_columns'] . '-columns' : 'eltdf-ig-' . $args['number_of_columns'] . '-columns';
		$holderClasses[] = ! empty( $params['space_between_columns'] ) ? 'eltdf-ig-' . $params['space_between_columns'] . '-space' : 'eltdf-ig-' . $args['space_between_columns'] . '-space';
		
		return implode( ' ', $holderClasses );
	}
	
	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getSliderData($params) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = ($params['number_of_visible_items'] !== '' && $params['type'] === 'carousel') ? $params['number_of_visible_items'] : '1';
		$slider_data['data-enable-loop']            = !empty($params['slider_loop']) ? $params['slider_loop'] : '';
		$slider_data['data-enable-autoplay']        = !empty($params['slider_autoplay']) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           = !empty($params['slider_speed']) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] = !empty($params['slider_speed_animation']) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-enable-navigation']      = !empty($params['slider_navigation']) ? $params['slider_navigation'] : '';
		$slider_data['data-enable-pagination']      = !empty($params['slider_pagination']) ? $params['slider_pagination'] : '';
		
		return $slider_data;
	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getGalleryImages($params) {
		$image_ids = array();
		$images = array();
		$i = 0;

		if ($params['images'] !== '') {
			$image_ids = explode(',', $params['images']);
		}

		foreach ($image_ids as $id) {

			$image['image_id'] = $id;
			$image_original = wp_get_attachment_image_src($id, 'full');
			$image['url'] = $image_original[0];
			$image['title'] = get_the_title($id);
			$image['alt'] = get_post_meta( $id, '_wp_attachment_image_alt', true);

			$images[$i] = $image;
			$i++;
		}

		return $images;
	}

	/**
	 * Return image size or custom image size array
	 *
	 * @param $image_size
	 * @return array
	 */
	private function getImageSize($image_size) {
		$image_size = trim($image_size);
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if(in_array( $image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
			return $image_size;
		} elseif(!empty($matches[0])) {
			return array(
				$matches[0][0],
				$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}

    /**
     * Return custom links for gallery
     *
     * @param $params
     * @return array
     */
    private function getCustomLinks($params) {
        $custom_links = array();

        if (!empty($params['custom_links'])) {
            $custom_links = array_map('trim', explode(',', $params['custom_links']));
	    }

        return $custom_links;
    }
}