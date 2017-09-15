<?php
namespace ElatedCore\CPT\Shortcodes\PricingList;

use ElatedCore\Lib;

class PricingList implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_pricing_list';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map(
			array(
				'name'                    => esc_html__( 'Elated Pricing list', 'eltdf-core' ),
				'base'                    => $this->base,
				'as_parent'               => array( 'only' => 'eltdf_pricing_list_item' ),
				'content_element'         => true,
				'category'                => esc_html__( 'by ELATED', 'eltdf-core' ),
				'icon'                    => 'icon-wpb-pricing-list extended-custom-icon',
				'show_settings_on_create' => false,
				'js_view'                 => 'VcColumnView',
				'params'                  => array()
			)
		);
	}

	public function render($atts, $content = null) {
		$args = array();
		
		$params = shortcode_atts($args, $atts);

		$params['content']  = $content;
		
		$html = eltdf_core_get_shortcode_module_template_part('templates/pricing-list', 'pricing-list', '', $params);

		return $html;
	}
}