<?php

class SweetToothElatedClassButtonWidget extends SweetToothElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_button_widget',
			esc_html__('Elated Button Widget', 'sweettooth'),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'sweettooth'))
		);

		$this->setParams();
	}

	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__('Type', 'sweettooth'),
				'options' => array(
					'solid'   => esc_html__('Solid', 'sweettooth'),
					'outline' => esc_html__('Outline', 'sweettooth'),
					'simple'  => esc_html__('Simple', 'sweettooth')
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'size',
				'title'   => esc_html__('Size', 'sweettooth'),
				'options' => array(
					'small'  => esc_html__('Small', 'sweettooth'),
					'medium' => esc_html__('Medium', 'sweettooth'),
					'large'  => esc_html__('Large', 'sweettooth'),
					'huge'   => esc_html__('Huge', 'sweettooth')
				),
				'description' => esc_html__('This option is only available for solid and outline button type', 'sweettooth')
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__('Text', 'sweettooth'),
				'default' => esc_html__('Button Text', 'sweettooth')
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__('Link', 'sweettooth')
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__('Link Target', 'sweettooth'),
				'options' => sweettooth_elated_get_link_target_array()
			),
			array(
				'type'  => 'textfield',
				'name'  => 'color',
				'title' => esc_html__('Color', 'sweettooth')
			),
			array(
				'type'  => 'textfield',
				'name'  => 'hover_color',
				'title' => esc_html__('Hover Color', 'sweettooth')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'background_color',
				'title'       => esc_html__('Background Color', 'sweettooth'),
				'description' => esc_html__('This option is only available for solid button type', 'sweettooth')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_background_color',
				'title'       => esc_html__('Hover Background Color', 'sweettooth'),
				'description' => esc_html__('This option is only available for solid button type', 'sweettooth')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'border_color',
				'title'       => esc_html__('Border Color', 'sweettooth'),
				'description' => esc_html__('This option is only available for solid and outline button type', 'sweettooth')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_border_color',
				'title'       => esc_html__('Hover Border Color', 'sweettooth'),
				'description' => esc_html__('This option is only available for solid and outline button type', 'sweettooth')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__('Margin', 'sweettooth'),
				'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'sweettooth')
			)
		);
	}

	/**
	 * Generates widget's HTML
	 *
	 * @param array $args args from widget area
	 * @param array $instance widget's options
	 */
	public function widget($args, $instance) {
		$params = '';

		if (!is_array($instance)) { $instance = array(); }

		// Filter out all empty params
		$instance = array_filter($instance, function($array_value) { return trim($array_value) != ''; });

		// Default values
		if (!isset($instance['text'])) { $instance['text'] = 'Button Text'; }

		// Generate shortcode params
		foreach($instance as $key => $value) {
			$params .= " $key='$value' ";
		}

		echo '<div class="widget eltdf-button-widget">';
			echo do_shortcode("[eltdf_button $params]"); // XSS OK
		echo '</div>';
	}
}