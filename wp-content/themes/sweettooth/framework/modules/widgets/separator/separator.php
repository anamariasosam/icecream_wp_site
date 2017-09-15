<?php

class SweetToothElatedClassSeparatorWidget extends SweetToothElatedClassWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_separator_widget',
	        esc_html__('Elated Separator Widget', 'sweettooth'),
	        array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'sweettooth'))
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
                'type' => 'dropdown',
                'name' => 'type',
                'title' => esc_html__('Type', 'sweettooth'),
                'options' => array(
                    'normal' => esc_html__('Normal', 'sweettooth'),
                    'full-width' => esc_html__('Full Width', 'sweettooth')
                )
            ),
            array(
                'type' => 'dropdown',
                'name' => 'position',
                'title' => esc_html__('Position', 'sweettooth'),
                'options' => array(
                    'center' => esc_html__('Center', 'sweettooth'),
                    'left' => esc_html__('Left', 'sweettooth'),
                    'right' => esc_html__('Right', 'sweettooth')
                )
            ),
            array(
                'type' => 'dropdown',
                'name' => 'border_style',
                'title' => esc_html__('Style', 'sweettooth'),
                'options' => array(
                    'solid' => esc_html__('Solid', 'sweettooth'),
                    'dashed' => esc_html__('Dashed', 'sweettooth'),
                    'dotted' => esc_html__('Dotted', 'sweettooth')
                )
            ),
            array(
                'type' => 'textfield',
                'name' => 'color',
                'title' => esc_html__('Color', 'sweettooth')
            ),
            array(
                'type' => 'textfield',
                'name' => 'width',
                'title' => esc_html__('Width', 'sweettooth')
            ),
            array(
                'type' => 'textfield',
                'name' => 'thickness',
                'title' => esc_html__('Thickness (px)', 'sweettooth')
            ),
            array(
                'type' => 'textfield',
                'name' => 'top_margin',
                'title' => esc_html__('Top Margin', 'sweettooth')
            ),
            array(
                'type' => 'textfield',
                'name' => 'bottom_margin',
                'title' => esc_html__('Bottom Margin', 'sweettooth')
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
        extract($args);

        //prepare variables
        $params = '';

	    $extra_class[] = !empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget eltdf-separator-widget '. esc_attr( implode( $extra_class ) ) .'">';
            echo do_shortcode("[eltdf_separator $params]"); // XSS OK
        echo '</div>';
    }
}