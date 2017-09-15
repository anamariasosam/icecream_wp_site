<?php

if(!function_exists('sweettooth_elated_map_woocommerce_meta')) {
    function sweettooth_elated_map_woocommerce_meta() {
        $woocommerce_meta_box = sweettooth_elated_add_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Product Meta', 'sweettooth'),
                'name' => 'woo_product_meta'
            )
        );

        sweettooth_elated_add_meta_box_field(array(
            'name'        => 'eltdf_product_featured_image_size',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Product List Shortcode', 'sweettooth'),
            'description' => esc_html__('Choose image layout when it appears in Elated Product List - Masonry layout shortcode', 'sweettooth'),
            'parent'      => $woocommerce_meta_box,
            'options'     => array(
                'eltdf-woo-image-normal-width' => esc_html__('Default', 'sweettooth'),
                'eltdf-woo-image-large-width'  => esc_html__('Large Width', 'sweettooth')
            )
        ));

        sweettooth_elated_add_meta_box_field(
            array(
                'name'          => 'eltdf_show_title_area_woo_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Show Title Area', 'sweettooth'),
                'description'   => esc_html__('Disabling this option will turn off page title area', 'sweettooth'),
                'parent'        => $woocommerce_meta_box,
                'options'       => sweettooth_elated_get_yes_no_select_array()
            )
        );
    }
	
    add_action('sweettooth_elated_action_meta_boxes_map', 'sweettooth_elated_map_woocommerce_meta', 99);
}