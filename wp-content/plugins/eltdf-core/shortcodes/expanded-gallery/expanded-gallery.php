<?php
namespace ElatedCore\CPT\Shortcodes\ExpandedGallery;

use ElatedCore\Lib;

class ExpandedGallery implements Lib\ShortcodeInterface {
	
	private $base;
	
	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'eltdf_expanded_gallery';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
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
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Elated Expanded Gallery', 'eltdf-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'                      => 'icon-wpb-expanded-gallery extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_images',
							'heading'     => esc_html__( 'Number of Images', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Three', 'eltdf-core' ) => 'three',
								esc_html__( 'Five', 'eltdf-core' )  => 'five'
							),
							'save_always' => true
						),
						array(
							'type'        => 'attach_images',
							'param_name'  => 'images',
							'heading'     => esc_html__( 'Images', 'eltdf-core' ),
							'description' => esc_html__( 'Select images from media library. Images needs to be same size', 'eltdf-core' )
						),
						array(
							'type'        => 'textarea',
							'param_name'  => 'custom_links',
							'heading'     => esc_html__( 'Custom Links', 'eltdf-core' ),
							'description' => esc_html__( 'Delimit links by comma', 'eltdf-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'custom_link_target',
							'heading'    => esc_html__( 'Custom Link Target', 'eltdf-core' ),
							'value'      => array_flip( sweettooth_elated_get_link_target_array() )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'shadow',
							'heading'    => esc_html__( 'Enable Image Shadow', 'eltdf-core' ),
							'value'      => array_flip( sweettooth_elated_get_yes_no_select_array( false ) ),
							'save_always' => true
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
	 *
	 * @return string
	 */
	public function render( $atts, $content = null ) {
		$args = array(
			'number_of_images'   => 'five',
			'images'             => '',
			'custom_links'       => '',
			'custom_link_target' => '_self',
			'shadow'             => 'no'
		);
		
		$params = shortcode_atts( $args, $atts );
		
		$params['gallery_classes'] = $this->getGalleryClasses( $params );
		$params['images']          = $this->getGalleryImages( $params );
		$params['links']           = $this->getGalleryLinks( $params );
		$params['target']          = ! empty( $params['custom_link_target'] ) ? $params['custom_link_target'] : $args['custom_link_target'];
		
		$html = eltdf_core_get_shortcode_module_template_part( 'templates/expanded-gallery', 'expanded-gallery', '', $params );
		
		return $html;
	}
	
	/**
	 * Generates gallery classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getGalleryClasses( $params ) {
		$holderClasses = '';
		
		$holderClasses .= ! empty( $params['number_of_images'] ) ? ' eltdf-eg-' . $params['number_of_images'] : ' eltdf-eg-five';
		$holderClasses .= $params['shadow'] === 'yes' ? ' eltdf-ig-has-shadow' : '';
		
		return $holderClasses;
	}
	
	/**
	 * Return images for gallery
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getGalleryImages( $params ) {
		$image_ids = array();
		$images    = array();
		$i         = 0;
		
		if ( $params['images'] !== '' ) {
			$image_ids = explode( ',', $params['images'] );
		}
		
		foreach ( $image_ids as $id ) {
			$image['image_id'] = $id;
			$image_original    = wp_get_attachment_image_src( $id, 'full' );
			$image['url']      = $image_original[0];
			$image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
			
			$images[ $i ] = $image;
			$i ++;
		}
		
		return $images;
	}
	
	/**
	 * Return links for gallery
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getGalleryLinks( $params ) {
		$custom_links = array();
		
		if ( ! empty( $params['custom_links'] ) ) {
			$custom_links = array_map( 'trim', explode( ',', $params['custom_links'] ) );
		}
		
		return $custom_links;
	}
}