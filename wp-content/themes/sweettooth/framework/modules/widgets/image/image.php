<?php

class SweetToothElatedClassImageWidget extends SweetToothElatedClassWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_image_widget',
            esc_html__('Elated Image Widget', 'sweettooth'),
            array( 'description' => esc_html__( 'Add image element to widget areas', 'sweettooth'))
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
                'title' => esc_html__('Custom CSS Class', 'sweettooth')
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'widget_title',
                'title' => esc_html__('Widget Title', 'sweettooth')
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'image_src',
                'title' => esc_html__('Image Source', 'sweettooth')
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'image_alt',
                'title' => esc_html__('Image Alt', 'sweettooth')
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'image_width',
                'title' => esc_html__('Image Width', 'sweettooth')
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'image_height',
                'title' => esc_html__('Image Height', 'sweettooth')
            ),
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
	    extract( $args );

	    $extra_class = ! empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';

	    $image_src    = '';
	    $image_alt    = ! empty( $instance['image_alt'] ) ? $instance['image_alt'] : esc_html__( 'Widget Image', 'sweettooth' );
	    $image_width  = ! empty( $instance['image_width'] ) ? intval( $instance['image_width'] ) : 600;
	    $image_height = ! empty( $instance['image_height'] ) ? intval( $instance['image_height'] ) : 400;

	    if ( ! empty( $instance['image_src'] ) ) {
		    $image_src = '<img itemprop="image" src="' . esc_url( $instance['image_src'] ) . '" alt="' . esc_attr( $image_alt ) . '" width="' . esc_attr( $image_width ) . '" height="' . esc_attr( $image_height ) . '" />';
	    }

	    $link_begin_html = '';
	    $link_end_html   = '';
	    $target          = ! empty( $instance['target'] ) ? $instance['target'] : '_self';

	    if ( ! empty( $instance['link'] ) ) {
		    $link_begin_html = '<a itemprop="url" href="' . esc_url( $instance['link'] ) . '" target="' . esc_attr( $target ) . '">';
		    $link_end_html   = '</a>';
	    }
        ?>

	    <div class="widget eltdf-image-widget <?php echo esc_html($extra_class); ?>">
		    <?php
		    if ( ! empty( $instance['widget_title'] ) ) {
			    echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
		    }
		    if ($link_begin_html !== '') {
			    echo wp_kses($link_begin_html, array(
				    'a' => array(
					    'itemprop' => true,
					    'class'    => true,
					    'href'     => true,
					    'target'   => true
				    )
			    ));
		    }
		    if ($image_src !== '') {
			    echo wp_kses($image_src, array(
				    'img' => array(
					    'itemprop' => true,
					    'class'    => true,
					    'src'      => true,
					    'alt'      => true,
					    'width'    => true,
					    'height'   => true
				    )
			    ));
		    }
		    if ($link_end_html !== '') {
			    echo wp_kses($link_end_html, array(
				    'a' => true
			    ));
		    }
		    ?>
	    </div>
    <?php 
    }
}