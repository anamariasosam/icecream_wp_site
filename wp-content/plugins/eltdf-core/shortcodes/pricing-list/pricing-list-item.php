<?php
namespace ElatedCore\CPT\Shortcodes\PricingListItem;

use ElatedCore\Lib;

class PricingListItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_pricing_list_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elated Pricing List Item', 'eltdf-core'),
			'base' => $this->base,
			'icon' => 'icon-wpb-pricing-list-item extended-custom-icon',
			'category' => esc_html__('by ELATED', 'eltdf-core'),
			'allowed_container_element' => 'vc_row',
			'as_child' => array('only' => 'eltdf_pricing_list'),
			'params' => array(
				array(
					'type'        => 'attach_image',
					'param_name'  => 'image',
					'heading'     => esc_html__('Image', 'eltdf-core'),
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'title',
					'heading'     => esc_html__('Title', 'eltdf-core'),
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'title_quotes',
					'heading'     => esc_html__( 'Start - End Position of Quotes', 'eltdf-core' ),
					'description' => esc_html__( 'Enter the position of the word before which you want to add opening quotes and comma separeted position of the word after which you want to add closing quotes (e.g. if you would like the opening quotes before the 3rd word, and closing quotes after 4th word you would enter "3,4")', 'eltdf-core' ),
					'dependency'  => array( 'element' => 'title', 'not_empty' => true )
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'description',
					'heading'     => esc_html__('Description', 'eltdf-core'),
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'price',
					'heading'    => esc_html__('Price', 'eltdf-core')
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'link',
					'heading'    => esc_html__('Title Link', 'eltdf-core'),
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'target',
					'heading'     => esc_html__('Link Target', 'eltdf-core'),
					'value'       => array_flip(sweettooth_elated_get_link_target_array())
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'color_title',
					'heading'    => esc_html__('Title Color', 'eltdf-core'),
					'group'      => 'Style'
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'color_description',
					'heading'    => esc_html__('Description Color', 'eltdf-core'),
					'group'      => 'Style'
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'color_price',
					'heading'    => esc_html__('Price Color', 'eltdf-core'),
					'group'      => 'Style'
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'image'             => '',
			'title'             => '',
			'title_quotes'      => '',
			'description'       => '',
			'price'             => '',
			'link'              => '',
			'target'            => '_self',
			'color_title'       => '',
			'color_description' => '',
			'color_price'       => ''
		);
		
		$params = shortcode_atts($args, $atts);

		$params['title']        = $this->getModifiedTitle($params);
		$params['title_styles'] = $this->getPricingListItemTitleStyles($params);
		$params['desc_styles']  = $this->getPricingListItemDescStyles($params);
		$params['price_styles'] = $this->getPricingListItemPriceStyles($params);

		extract($params);

		$html = eltdf_core_get_shortcode_module_template_part('templates/pricing-list-item', 'pricing-list', '', $params);
		
		return $html;
	}

	private function getModifiedTitle( $params ) {
		$title          = $params['title'];
		$title_quotes   = str_replace( ' ', '', $params['title_quotes'] );

		if ( ! empty( $title ) ) {
			$quotes  = explode( ',', $title_quotes );
			$split_title = explode( ' ', $title );

			if ( ! empty( $quotes ) && ! empty($params['title_quotes']) ) {
				$split_title[ $quotes[0] - 1 ] = '<span class="eltdf-pl-quotes">' . $split_title[ $quotes[0] - 1 ] ;
			    $split_title[ $quotes[1] - 1 ] = $split_title[ $quotes[1] - 1 ] . '</span>';
			}

			$title = implode( ' ', $split_title );
		}

		return $title;
	}

	private function getPricingListItemTitleStyles($params) {
		$styles = array();

		if(!empty($params['color_title'])) {
			$styles[] = 'color: '.$params['color_title'];
		}

		return implode( ';', $styles );
	}

	private function getPricingListItemDescStyles($params) {
		$styles = array();

		if(!empty($params['color_description'])) {
			$styles[] = 'color: '.$params['color_description'];
		}

		return implode( ';', $styles );
	}

	private function getPricingListItemPriceStyles($params) {
		$styles = array();

		if(!empty($params['color_price'])) {
			$styles[] = 'color: '.$params['color_price'];
		}

		return implode( ';', $styles );
	}
}