<?php

class SweetToothElatedClassRawHTMLWidget extends SweetToothElatedClassWidget {
	/**
	 * Set basic widget options and call parent class construct
	 */
	public function __construct() {
		parent::__construct(
			'eltdf_raw_html_widget',
			esc_html__( 'Elated Raw HTML Widget', 'sweettooth' ),
			array( 'description' => esc_html__( 'Add raw HTML holder to widget areas', 'sweettooth' ) )
		);
		
		$this->setParams();
	}
	
	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'extra_class',
				'title' => esc_html__( 'Extra Class Name', 'sweettooth' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'sweettooth' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'widget_grid',
				'title'   => esc_html__('Widget Grid', 'sweettooth'),
				'options' => array(
					''     => esc_html__('Full Width', 'sweettooth'),
					'auto' => esc_html__('Auto', 'sweettooth')
				)
			),
			array(
				'type'  => 'textarea',
				'name'  => 'content',
				'title' => esc_html__( 'Content', 'sweettooth' )
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
		extract( $args );
		
		$extra_class   = array();
		$extra_class[] = !empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';
		$extra_class[] = !empty( $instance['widget_grid'] ) && $instance['widget_grid'] === 'auto' ? 'eltdf-grid-auto-width' : '';
		?>
		
		<div class="widget eltdf-raw-html-widget <?php echo esc_attr( implode( $extra_class ) ); ?>">
			<?php
			if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			}
			if ( ! empty( $instance['content'] ) ) {
				echo wp_kses_post( $instance['content'] );
			}
			?>
		</div>
		<?php
	}
}