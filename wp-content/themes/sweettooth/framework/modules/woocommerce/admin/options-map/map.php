<?php

if ( ! function_exists('sweettooth_elated_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function sweettooth_elated_woocommerce_options_map() {

		sweettooth_elated_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' => esc_html__('Woocommerce', 'sweettooth'),
				'icon' => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = sweettooth_elated_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__('Product List', 'sweettooth')
			)
		);

		sweettooth_elated_add_admin_field(array(
			'name'        	=> 'eltdf_woo_product_list_columns',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product List Columns', 'sweettooth'),
			'default_value'	=> 'eltdf-woocommerce-columns-4',
			'description' 	=> esc_html__('Choose number of columns for product listing and related products on single product', 'sweettooth'),
			'options'		=> array(
				'eltdf-woocommerce-columns-3' => esc_html__('3 Columns', 'sweettooth'),
				'eltdf-woocommerce-columns-4' => esc_html__('4 Columns', 'sweettooth')
			),
			'parent'      	=> $panel_product_list,
		));
		
		sweettooth_elated_add_admin_field(array(
			'name'        	=> 'eltdf_woo_product_list_columns_space',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Space Between Products', 'sweettooth'),
			'default_value'	=> 'eltdf-woo-normal-space',
			'description' 	=> esc_html__('Select space between products for product listing and related products on single product', 'sweettooth'),
			'options'		=> array(
				'eltdf-woo-normal-space' => esc_html__('Normal', 'sweettooth'),
				'eltdf-woo-small-space'  => esc_html__('Small', 'sweettooth'),
				'eltdf-woo-no-space'     => esc_html__('No Space', 'sweettooth')
			),
			'parent'      	=> $panel_product_list,
		));
		
		sweettooth_elated_add_admin_field(array(
			'name'        	=> 'eltdf_woo_product_list_info_position',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product Info Position', 'sweettooth'),
			'default_value'	=> 'info_below_image',
			'description' 	=> esc_html__('Select product info position for product listing and related products on single product', 'sweettooth'),
			'options'		=> array(
				'info_below_image'    => esc_html__('Info Below Image', 'sweettooth'),
				'info_on_image_hover' => esc_html__('Info On Image Hover', 'sweettooth')
			),
			'parent'      	=> $panel_product_list,
		));

		sweettooth_elated_add_admin_field(array(
			'name'        	=> 'eltdf_woo_products_per_page',
			'type'        	=> 'text',
			'label'       	=> esc_html__('Number of products per page', 'sweettooth'),
			'default_value'	=> '',
			'description' 	=> esc_html__('Set number of products on shop page', 'sweettooth'),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

		sweettooth_elated_add_admin_field(array(
			'name'        	=> 'eltdf_products_list_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Products Title Tag', 'sweettooth'),
			'default_value'	=> 'h4',
			'description' 	=> '',
			'options'       => sweettooth_elated_get_title_tag(),
			'parent'      	=> $panel_product_list,
		));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = sweettooth_elated_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_single_product',
				'title' => esc_html__('Single Product', 'sweettooth')
			)
		);
			
			sweettooth_elated_add_admin_field(array(
				'name'          => 'woo_set_thumb_images_position',
				'type'          => 'select',
				'label'         => esc_html__('Set Thumbnail Images Position', 'sweettooth'),
				'default_value' => 'below-image',
				'options'		=> array(
					'below-image'  => esc_html__('Below Featured Image', 'sweettooth'),
					'on-left-side' => esc_html__('On The Left Side Of Featured Image', 'sweettooth')
				),
				'parent'        => $panel_single_product
			));

			sweettooth_elated_add_admin_field(array(
				'name'        	=> 'eltdf_single_product_title_tag',
				'type'        	=> 'select',
				'label'       	=> esc_html__('Single Product Title Tag', 'sweettooth'),
				'default_value'	=> 'h2',
				'description' 	=> '',
				'options'       => sweettooth_elated_get_title_tag(),
				'parent'      	=> $panel_single_product,
			));

            sweettooth_elated_add_admin_field(
                array(
                    'type' => 'select',
                    'name' => 'show_title_area_woo',
                    'default_value' => '',
                    'label'       => esc_html__('Show Title Area', 'sweettooth'),
                    'description' => esc_html__('Enabling this option will show title area on single post pages', 'sweettooth'),
                    'parent'      => $panel_single_product,
                    'options'     => sweettooth_elated_get_yes_no_select_array(),
                    'args' => array(
                        'col_width' => 3
                    )
                )
            );

		/**
		 * DropDown Cart Widget Settings
		 */
		$panel_dropdown_cart = sweettooth_elated_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_dropdown_cart',
				'title' => esc_html__('Dropdown Cart Widget', 'sweettooth')
			)
		);

			sweettooth_elated_add_admin_field(array(
				'name'        	=> 'eltdf_woo_dropdown_cart_description',
				'type'        	=> 'text',
				'label'       	=> esc_html__('Cart Description', 'sweettooth'),
				'default_value'	=> '',
				'description' 	=> esc_html__('Enter dropdown cart description', 'sweettooth'),
				'parent'      	=> $panel_dropdown_cart
			));
	}

	add_action( 'sweettooth_elated_action_options_map', 'sweettooth_elated_woocommerce_options_map', 16);
}