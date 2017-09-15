<?php

class SweetToothElatedClassSocialIconWidget extends SweetToothElatedClassWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_social_icon_widget',
            esc_html__('Elated Social Icon Widget', 'sweettooth'),
            array( 'description' => esc_html__( 'Add social network icons to widget areas', 'sweettooth'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array_merge(
            sweettooth_elated_icon_collections()->getSocialIconWidgetParamsArray(),
            array(
                array(
                    'type'  => 'textfield',
                    'name'  => 'link',
                    'title' => esc_html__('Link', 'sweettooth')
                ),
                array(
                    'type'    => 'dropdown',
                    'name'    => 'target',
                    'title'   => esc_html__('Target', 'sweettooth'),
                    'options' => sweettooth_elated_get_link_target_array()
                ),
	            array(
		            'type'    => 'dropdown',
		            'name'    => 'type',
		            'title'   => esc_html__( 'Type', 'sweettooth' ),
		            'options'   => array(
			            'eltdf-normal' => esc_html__( 'Normal', 'sweettooth' ),
			            'eltdf-circle' => esc_html__( 'Circle', 'sweettooth' )
		            )
	            ),
	            array(
		            'type'        => 'textfield',
		            'name'        => 'shape_size',
		            'title'       => esc_html__( 'Circle Size (px)', 'sweettooth' ),
		            'description' => esc_html__('Applies to circle type', 'sweettooth')
	            ),
	            array(
		            'type'        => 'textfield',
		            'name'        => 'shape_color',
		            'title'       => esc_html__( 'Circle Background Color', 'sweettooth' ),
		            'description' => esc_html__('Applies to circle type', 'sweettooth')
	            ),
	            array(
		            'type'        => 'textfield',
		            'name'        => 'shape_hover_color',
		            'title'       => esc_html__( 'Circle Hover Background Color', 'sweettooth' ),
		            'description' => esc_html__('Applies to circle type', 'sweettooth')
	            ),
	            array(
		            'type'        => 'textfield',
		            'name'        => 'border_width',
		            'title'       => esc_html__( 'Border Width (px)', 'sweettooth' ),
		            'description' => esc_html__('Applies to circle type', 'sweettooth')
	            ),
	            array(
		            'type'        => 'textfield',
		            'name'        => 'border_color',
		            'title'       => esc_html__( 'Border Color', 'sweettooth' ),
		            'description' => esc_html__('Applies to circle type', 'sweettooth')
	            ),
	            array(
		            'type'        => 'textfield',
		            'name'        => 'border_hover_color',
		            'title'       => esc_html__( 'Hover Border Color', 'sweettooth' ),
		            'description' => esc_html__('Applies to circle type', 'sweettooth')
	            ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'icon_size',
                    'title' => esc_html__('Icon Size (px)', 'sweettooth')
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
                    'name'        => 'margin',
                    'title'       => esc_html__('Margin', 'sweettooth'),
                    'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'sweettooth')
                )
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
		$type = '';
		$border_color = '';
		$border_hover_color = '';
		$shape_color = '';
		$shape_hover_color = '';
		$shape_styles = array();
		$holder_classes = array();
		if (!empty($instance['type']) && $instance['type'] !== '') {
			$type = $instance['type'];

			$holder_classes[] = $type;

			if($type !== 'eltdf-normal') {

				if(!empty($instance['shape_size'])) {
					$shape_styles[] = 'width: '.sweettooth_elated_filter_px($instance['shape_size']).'px';
					$shape_styles[] = 'height: '.sweettooth_elated_filter_px($instance['shape_size']).'px';
					$shape_styles[] = 'line-height: '.sweettooth_elated_filter_px($instance['shape_size']).'px';
				}

				if(!empty($instance['shape_color'])) {
					$shape_color = $instance['shape_color'];
					$shape_styles[] = 'background-color: '.$instance['shape_color'];
				}

				if(!empty($instance['shape_hover_color'])) {
					$shape_hover_color = $instance['shape_hover_color'];
				}

				if(!empty($instance['border_color']) && $instance['border_width'] !== '') {
					$border_color = $instance['border_color'];
					$shape_styles[] = 'border-style: solid';
					$shape_styles[] = 'border-color: '.$instance['border_color'];
					$shape_styles[] = 'border-width: '.sweettooth_elated_filter_px($instance['border_width']).'px';
				} else if(isset($params['border_width']) && $instance['border_width'] !== ''){
					$shape_styles[] = 'border-style: solid';
					$shape_styles[] = 'border-width: '.sweettooth_elated_filter_px($instance['border_width']).'px';
				} else if(!empty($params['border_color'])){
					$shape_styles[] = 'border-color: '.$instance['border_color'];
				}

				if(!empty($instance['border_hover_color']) && $instance['border_hover_color'] !== '') {
					$border_hover_color = $instance['border_hover_color'];
				}
			}
		}

		$icon_color = '';
		$icon_styles = array();
		if (!empty($instance['color'])) {
			$icon_styles[] = 'color: '.$instance['color'];
			$icon_color = $instance['color'];
		}

		$icon_hover_color = '';
		if (!empty($instance['hover_color'])) {
			$icon_hover_color = $instance['hover_color'];
		}

		if ($icon_hover_color === '') {
			$icon_hover_color = $icon_color;
		}
		if ($border_hover_color === '') {
			$border_hover_color = $border_color;
		}
		if ($shape_hover_color === '') {
			$shape_hover_color = $shape_color;
		}

		$icon_html = 'fa-facebook';
		$icon_holder_html = '';
		$icon_class = array('eltdf-social-icon-widget');
		if (!empty($instance['icon_pack']) && $instance['icon_pack'] !== '') {
			$icon_class = implode(' ', $icon_class);

			if (!empty($instance['fa_icon']) && $instance['fa_icon'] !== '' && $instance['icon_pack'] === 'font_awesome') {
				$icon_html = $instance['fa_icon'];
				$icon_holder_html = '<i class="'.$icon_class.' fa '.$icon_html.'"></i>';
			} else if (!empty($instance['fe_icon']) && $instance['fe_icon'] !== '' && $instance['icon_pack'] === 'font_elegant') {
				$icon_html = $instance['fe_icon'];
				$icon_holder_html = '<span class="'.$icon_class.' '.$icon_html.'"></span>';
			} else if (!empty($instance['ion_icon']) && $instance['ion_icon'] !== '' && $instance['icon_pack'] === 'ion_icons') {
				$icon_html = $instance['ion_icon'];
				$icon_holder_html = '<span class="'.$icon_class.' '.$icon_html.'"></span>';
			} else if (!empty($instance['linea_icon']) && $instance['linea_icon'] !== '' && $instance['icon_pack'] === 'linea_icons') {
				$icon_html = $instance['linea_icon'];
				$icon_holder_html = '<span class="'.$icon_class.' '.$icon_html.'"></span>';
			} else if (!empty($instance['simple_line_icons']) && $instance['simple_line_icons'] !== '' && $instance['icon_pack'] === 'simple_line_icons') {
				$icon_html = $instance['simple_line_icons'];
				$icon_holder_html = '<span class="'.$icon_class.' '.$icon_html.'"></span>';
			} else {
				$icon_holder_html = '<i class="'.$icon_class.' fa '.$icon_html.'"></i>';
			}
		}

		$data = array();
		$data[] = sweettooth_elated_get_inline_attr($icon_hover_color, 'data-hover-color');
		$data[] = sweettooth_elated_get_inline_attr($border_hover_color, 'data-hover-border-color');
		$data[] = sweettooth_elated_get_inline_attr($shape_hover_color, 'data-hover-background-color');
		$data = implode(' ', $data);

		$widget_class = array();
		$widget_class[] = !empty($instance['hover_color']) || !empty($instance['shape_hover_color']) || !empty($instance['border_hover_color']) ? 'eltdf-icon-has-hover' : '';

		$holder_classes   = implode(' ', $holder_classes);

		$icon_holder_html = '<span class="eltdf-icon-holder '.esc_attr($holder_classes).'" '.sweettooth_elated_get_inline_style($shape_styles).'>' . $icon_holder_html . '</span>';

		$icon_text_html = '';
		if(!empty($instance['icon_text'])) {
			$widget_class[] = !empty($instance['text_position']) ? $instance['text_position'] : '';

			$icon_text_html = '<span class="eltdf-icon-text-holder" '.sweettooth_elated_get_inline_style($icon_styles).'><span class="eltdf-icon-text">'.esc_html($instance['icon_text']).'</span></span>';
		}

		$widget_class[] = 'eltdf-icon-widget-holder';
		$widget_class = implode(' ', $widget_class);

		if( ! empty($instance['icon_size']) ) {
			$icon_styles[] = 'font-size: '.sweettooth_elated_filter_px($instance['icon_size']).'px';
		}
		if( ! empty($instance['margin']) ) {
			$icon_styles[] = 'margin: '.$instance['margin'];
		}
		if( ! empty($instance['icon_text_size']) ) {
			$icon_styles[] = 'font-size: '.sweettooth_elated_filter_px($instance['icon_text_size']).'px';
		}
		if( ! empty($instance['icon_text_margin']) ) {
			$icon_styles[] = 'margin: '.$instance['icon_text_margin'];
		}

		$link   = !empty($instance['link']) ? $instance['link'] : '#';
		$target = !empty($instance['target']) ? $instance['target'] : '_self';
		?>

		<a <?php sweettooth_elated_class_attribute($widget_class); ?> href="<?php echo esc_html($link); ?>" <?php echo wp_kses_post($data); ?> target="<?php echo esc_attr($target); ?>" <?php echo sweettooth_elated_get_inline_style($icon_styles); ?>>
			<?php echo wp_kses($icon_holder_html, array(
				'span' => array(
					'class' => true,
					'style' => true
				),
				'i'  => array(
					'class' => true
				)
			)); ?>
			<?php echo wp_kses($icon_text_html, array(
				'span' => array(
					'class' => true,
					'style' => true
				)
			)); ?>
		</a>
		<?php
	}
}