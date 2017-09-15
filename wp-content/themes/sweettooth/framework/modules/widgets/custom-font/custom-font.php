<?php

class SweetToothElatedClassCustomFontWidget extends SweetToothElatedClassWidget {
	/**
	 * Set basic widget options and call parent class construct
	 */
	public function __construct() {
		parent::__construct(
			'eltdf_custom_font_widget',
			esc_html__( 'Elated Custom Font Widget', 'sweettooth' ),
			array( 'description' => esc_html__( 'Add custom font widget', 'sweettooth' ) )
		);
		
		$this->setParams();
	}
	
	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array(			
			array(
				'type'      => 'textfield',
				'name'      => 'title',
				'title'     => esc_html__( 'Title Text', 'sweettooth' )
			),
			array(
				'type'       => 'textfield',
				'name'       => 'text_color',
				'title'      => esc_html__( 'Color', 'sweettooth' )
			),
			array(
				'type'      => 'dropdown',
				'name'      => 'title_tag',
				'title'     => esc_html__( 'Title Tag', 'sweettooth' ),
				'options'   => sweettooth_elated_get_title_tag( true, array( 'p' => 'p' ) ),
			),
			array(
				'type'     => 'textfield',
				'name'     => 'font_family',
				'title'    => esc_html__( 'Font Family', 'sweettooth' )
			),
			array(
				'type'   => 'textfield',
				'name'   => 'font_size',
				'title'  => esc_html__( 'Font Size (px)', 'sweettooth' )
			),
			array(
				'type'     => 'textfield',
				'name'     => 'line_height',
				'title'    => esc_html__( 'Line Height (px)', 'sweettooth' )
			),
			array(
				'type'      => 'dropdown',
				'name'      => 'font_weight',
				'title'     => esc_html__( 'Font Weight', 'sweettooth' ),
				'options'   => sweettooth_elated_get_font_weight_array( true )
			),
			array(
				'type'      => 'dropdown',
				'name'      => 'font_style',
				'title'     => esc_html__( 'Font Style', 'sweettooth' ),
				'options'   => sweettooth_elated_get_font_style_array( true )
			),
			array(
				'type'     => 'textfield',
				'name'     => 'letter_spacing',
				'title'    => esc_html__( 'Letter Spacing (px)', 'sweettooth' )
			),
			array(
				'type'      => 'dropdown',
				'name'      => 'text_transform',
				'title'     => esc_html__( 'Text Transform', 'sweettooth' ),
				'options'   => sweettooth_elated_get_text_transform_array( true )
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'text_decoration',
				'title'       => esc_html__( 'Text Decoration', 'sweettooth' ),
				'options'     => sweettooth_elated_get_text_decorations( true )
			),
			array(
				'type'          => 'dropdown',
				'name'          => 'text_align',
				'title'         => esc_html__( 'Text Align', 'sweettooth' ),
				'options'       => array(
					''        => esc_html__( 'Default', 'sweettooth' ),
					'left'    => esc_html__( 'Left', 'sweettooth' ),
					'center'  => esc_html__( 'Center', 'sweettooth' ),
					'right'   => esc_html__( 'Right', 'sweettooth' ),
					'justify' => esc_html__( 'Justify', 'sweettooth' )
				)
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin (px)', 'sweettooth' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'sweettooth' )
			)
		);
	}
	
	/**
	 * Generates widget's HTML
	 *
	 * @param array $args args from widget area
	 * @param array $instance widget's options
	 */
	public function widget( $args, $instance ) {
		$title            = !empty( $instance['title'] ) ? $instance['title'] : '';
		$title_tag        = !empty( $instance['title_tag'] ) ? $instance['title_tag'] : 'h2';

		$holder_styles = $this->getHolderStyles( $instance );
		$holder_data   = $this->getHolderData( $instance );
		?>

		<<?php echo esc_attr($title_tag); ?> class="eltdf-custom-font-holder" <?php sweettooth_elated_inline_style($holder_styles); ?> <?php echo esc_attr($holder_data); ?>>
		<?php echo esc_html($title); ?>
		</<?php echo esc_attr($title_tag); ?>>

		<?php
	}

	private function getHolderStyles( $params ) {
		$styles = array();

		if ( $params['font_family'] !== '' ) {
			$styles[] = 'font-family: ' . $params['font_family'];
		}

		if ( ! empty( $params['font_size'] ) ) {
			$styles[] = 'font-size: ' . sweettooth_elated_filter_px( $params['font_size'] ) . 'px';
		}

		if ( ! empty( $params['line_height'] ) ) {
			$styles[] = 'line-height: ' . sweettooth_elated_filter_px( $params['line_height'] ) . 'px';
		}

		if ( ! empty( $params['font_weight'] ) ) {
			$styles[] = 'font-weight: ' . $params['font_weight'];
		}

		if ( ! empty( $params['font_style'] ) ) {
			$styles[] = 'font-style: ' . $params['font_style'];
		}

		if ( ! empty( $params['letter_spacing'] ) ) {
			$styles[] = 'letter-spacing: ' . sweettooth_elated_filter_px( $params['letter_spacing'] ) . 'px';
		}

		if ( ! empty( $params['text_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['text_transform'];
		}

		if ( ! empty( $params['text_decoration'] ) ) {
			$styles[] = 'text-decoration: ' . $params['text_decoration'];
		}

		if ( ! empty( $params['text_align'] ) ) {
			$styles[] = 'text-align: ' . $params['text_align'];
		}

		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}

		if ($params['margin'] !== '') {
			$styles[] = 'margin: '.$params['margin'];
		}

		return implode( ';', $styles );
	}

	private function getHolderData( $params ) {
		$data = array();

		if ( ! empty( $params['font_size'] ) ) {
			$data[] = 'data-font-size=' . sweettooth_elated_filter_px( $params['font_size'] );
		}

		if ( ! empty( $params['line_height'] ) ) {
			$data[] = 'data-line-height=' . sweettooth_elated_filter_px( $params['line_height'] );
		}

		return implode( ' ', $data );
	}
}