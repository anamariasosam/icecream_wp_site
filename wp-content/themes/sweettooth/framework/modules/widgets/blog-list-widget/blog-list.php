<?php

class SweetToothElatedClassBlogListWidget extends SweetToothElatedClassWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_blog_list_widget',
            esc_html__('Elated Blog List Widget', 'sweettooth'),
            array( 'description' => esc_html__( 'Display a list of your blog posts', 'sweettooth'))
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
                'name'  => 'widget_title',
                'title' => esc_html__('Widget Title', 'sweettooth')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'type',
                'title'   => esc_html__('Type', 'sweettooth'),
                'options' => array(
                    'simple'  => esc_html__('Simple', 'sweettooth'),
                    'minimal' => esc_html__('Minimal', 'sweettooth')
                )
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'number_of_posts',
                'title' => esc_html__('Number of Posts', 'sweettooth')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'space_between_columns',
                'title'   => esc_html__('Space Between items', 'sweettooth'),
                'options' => array(
                    'normal' => esc_html__('Normal', 'sweettooth'),
                    'small'  => esc_html__('Small', 'sweettooth'),
                    'tiny'   => esc_html__('Tiny', 'sweettooth'),
                    'no'     => esc_html__('No Space', 'sweettooth')
                )
            ),
	        array(
		        'type'    => 'dropdown',
		        'name'    => 'order_by',
		        'title'   => esc_html__('Order By', 'sweettooth'),
		        'options' => sweettooth_elated_get_query_order_by_array()
	        ),
	        array(
		        'type'    => 'dropdown',
		        'name'    => 'order',
		        'title'   => esc_html__('Order', 'sweettooth'),
		        'options' => sweettooth_elated_get_query_order_array()
	        ),
            array(
                'type'        => 'textfield',
                'name'        => 'category',
                'title'       => esc_html__('Category Slug', 'sweettooth'),
                'description' => esc_html__('Leave empty for all or use comma for list', 'sweettooth')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'title_tag',
                'title'   => esc_html__('Title Tag', 'sweettooth'),
                'options' => sweettooth_elated_get_title_tag(true, array( 'p' => 'p' ))
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'title_transform',
                'title'   => esc_html__('Title Text Transform', 'sweettooth'),
                'options' => sweettooth_elated_get_text_transform_array(true)
            ),
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

        $instance['post_info_section'] = 'yes';
        $instance['number_of_columns'] = '1';

        // Filter out all empty params
        $instance = array_filter($instance, function($array_value) { return trim($array_value) != ''; });

        //generate shortcode params
        foreach($instance as $key => $value) {
            $params .= " $key='$value' ";
        }

        $available_types = array('simple', 'classic');

        if (!in_array($instance['type'], $available_types)) {
            $instance['type'] = 'simple';
        }

        echo '<div class="widget eltdf-blog-list-widget">';
		    if ( ! empty( $instance['widget_title'] ) ) {
			    echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
		    }
            echo do_shortcode("[eltdf_blog_list $params]"); // XSS OK
        echo '</div>';
    }
}