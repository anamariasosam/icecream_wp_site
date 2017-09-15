<?php
namespace ElatedCore\CPT\Shortcodes\Tabs;

use ElatedCore\Lib;

class TabsItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_tabs_item';
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
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'            => esc_html__( 'Elated Tabs Item', 'eltdf-core' ),
					'base'            => $this->getBase(),
					'as_parent'       => array( 'except' => 'vc_row' ),
					'as_child'        => array( 'only' => 'eltdf_tabs' ),
					'category'        => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'            => 'icon-wpb-tabs-item extended-custom-icon',
					'content_element' => true,
					'js_view'         => 'VcColumnView',
					'params'          => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'tab_title',
							'heading'    => esc_html__( 'Title', 'eltdf-core' )
						)
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'tab_title' => 'Tab',
			'tab_id'    => ''
		);

		$params       = shortcode_atts($default_atts, $atts);
		extract($params);

		$rand_number = rand(0, 1000);
		$params['tab_title'] = $params['tab_title'].'-'.$rand_number;

		$params['content'] = $content;
		
		$output = '';
		
		$output .= eltdf_core_get_shortcode_module_template_part('templates/tab-content','tabs', '', $params);
		
		return $output;
	}
}