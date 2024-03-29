<?php
/**
 * Woocommerce configuration file
 */

// Adds theme support for woocommerce
add_theme_support('woocommerce');

//Disable the default WooCommerce stylesheet.
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

if (!function_exists('sweettooth_elated_woocommerce_content')){
	/**
	 * Output WooCommerce content.
	 *
	 * This function is only used in the optional 'woocommerce.php' template
	 * which people can add to their themes to add basic woocommerce support
	 * without hooks or modifying core templates.
	 *
	 * @access public
	 * @return void
	 */
	function sweettooth_elated_woocommerce_content() {

		if ( is_singular( 'product' ) ) {

			while ( have_posts() ) : the_post();

				wc_get_template_part( 'content', 'single-product' );

			endwhile;

		} else {

			if ( have_posts() ) :

				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );

				woocommerce_product_loop_start();

					woocommerce_product_subcategories();

					while ( have_posts() ) : the_post();

						wc_get_template_part( 'content', 'product' );

					endwhile; // end of the loop.

				woocommerce_product_loop_end();

				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );

			elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :

				wc_get_template( 'loop/no-products-found.php' );

			endif;
		}
	}
}

/*************** GENERAL FILTERS - begin ***************/

	//Define number of products per page
	add_filter('loop_shop_per_page', 'sweettooth_elated_woocommerce_products_per_page', 20);

	//Set number of related products
	add_filter('woocommerce_output_related_products_args', 'sweettooth_elated_woocommerce_related_products_args');

	//Sale flash template override
	add_filter('woocommerce_sale_flash', 'sweettooth_elated_woocommerce_sale_flash');

	//Out of stock template
	add_filter('woocommerce_product_thumbnails', 'sweettooth_elated_woocommerce_product_out_of_stock', 20);
	add_action('woocommerce_before_shop_loop_item_title', 'sweettooth_elated_woocommerce_product_out_of_stock', 10);

	//Add view all pagination for product lists
	add_action('woocommerce_after_shop_loop', 'sweettooth_elated_woocommerce_view_all_pagination', 11);

	//Add additional html tags around woocommerce pagination
	add_action('woocommerce_after_shop_loop', 'sweettooth_elated_woo_view_all_pagination_additional_tag_before', 9);
	add_action('woocommerce_after_shop_loop', 'sweettooth_elated_woo_view_all_pagination_additional_tag_after', 12);


/*************** GENERAL FILTERS - end ***************/

/*************** PRODUCT LISTS FILTERS - begin ***************/

	//Add additional html tags around product lists
	add_action( 'woocommerce_before_shop_loop', 'sweettooth_elated_pl_holder_additional_tag_before', 35 );
	add_action( 'woocommerce_after_shop_loop', 'sweettooth_elated_pl_holder_additional_tag_after', 5 );
	
	//Add additional html tag around product elements
	add_action( 'woocommerce_before_shop_loop_item', 'sweettooth_elated_pl_inner_additional_tag_before', 5 );
	
	//Remove open and close link position
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	
	//Add additional html tags around image and marks
	add_action( 'woocommerce_before_shop_loop_item_title', 'sweettooth_elated_pl_image_additional_tag_before', 5 );
	add_action( 'sweettooth_elated_action_woo_pl_info_below_image', 'sweettooth_elated_pl_image_additional_tag_after', 6 );
	add_action( 'sweettooth_elated_action_woo_pl_info_on_image_hover', 'sweettooth_elated_pl_image_additional_tag_after', 1 );


	/*************** Product Info Position Is On Image Hover ***************/
	
		//Add additional html tag around product elements
		add_action( 'sweettooth_elated_action_woo_pl_info_on_image_hover', 'sweettooth_elated_pl_inner_additional_tag_after', 22 );
		
		//Add open and close link position
		add_action( 'sweettooth_elated_action_woo_pl_info_on_image_hover', 'woocommerce_template_loop_product_link_open', 21 );
		add_action( 'sweettooth_elated_action_woo_pl_info_on_image_hover', 'woocommerce_template_loop_product_link_close', 21 );
		
		//Add additional html around product info elements
		add_action( 'sweettooth_elated_action_woo_pl_info_on_image_hover', 'sweettooth_elated_pl_inner_text_additional_tag_before', 5 );
		add_action( 'sweettooth_elated_action_woo_pl_info_on_image_hover', 'sweettooth_elated_pl_inner_text_additional_tag_after', 15 );
		
		//Override product title with our own html
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'sweettooth_elated_action_woo_pl_info_on_image_hover', 'sweettooth_elated_woocommerce_template_loop_product_title', 7 );

		//Add Categories
		add_action( 'sweettooth_elated_action_woo_pl_info_on_image_hover', 'sweettooth_elated_pl_category', 8 );

		//remove rating star
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		
		//Change price position
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		add_action( 'sweettooth_elated_action_woo_pl_info_on_image_hover', 'woocommerce_template_loop_price', 12 );
		
		//Change add to cart position
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		add_action( 'sweettooth_elated_action_woo_pl_info_on_image_hover', 'woocommerce_template_loop_add_to_cart', 13 );


	/*************** Product Info Position Is Below Image ***************/

		//Add additional html tag around product elements
		add_action( 'sweettooth_elated_action_woo_pl_info_below_image', 'sweettooth_elated_pl_inner_additional_tag_after', 21 );
		
		//Add open and close link position
		add_action( 'sweettooth_elated_action_woo_pl_info_below_image', 'woocommerce_template_loop_product_link_open', 20 );
		add_action( 'sweettooth_elated_action_woo_pl_info_below_image', 'woocommerce_template_loop_product_link_close', 20 );
		
		//Add additional html at the end of product info elements
		add_action( 'sweettooth_elated_action_woo_pl_info_below_image', 'sweettooth_elated_pl_text_wrapper_additional_tag_before', 22 );
		add_action( 'sweettooth_elated_action_woo_pl_info_below_image', 'sweettooth_elated_pl_text_wrapper_additional_tag_after', 30 );
		
		//Override product title with our own html
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'sweettooth_elated_action_woo_pl_info_below_image', 'sweettooth_elated_woocommerce_template_loop_product_title', 23 );

		//Add Categories
		add_action( 'sweettooth_elated_action_woo_pl_info_below_image', 'sweettooth_elated_pl_category', 24 );
		
		//remove rating star
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		
		//Change price position
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		add_action( 'sweettooth_elated_action_woo_pl_info_below_image', 'woocommerce_template_loop_price', 27 );

		//Add additional html around add to cart element
		add_action( 'sweettooth_elated_action_woo_pl_info_below_image', 'sweettooth_elated_pl_inner_text_additional_tag_before', 1 );
		add_action( 'sweettooth_elated_action_woo_pl_info_below_image', 'sweettooth_elated_pl_inner_text_additional_tag_after', 3 );

		//Change add to cart position
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		add_action( 'sweettooth_elated_action_woo_pl_info_below_image', 'woocommerce_template_loop_add_to_cart', 2 );


/*************** PRODUCT LISTS FILTERS - end ***************/

/*************** PRODUCT SINGLE FILTERS - begin ***************/

	//Add additional html around single product summary and images
	add_action( 'woocommerce_before_single_product_summary', 'sweettooth_elated_single_product_content_additional_tag_before', 5 );
	add_action( 'woocommerce_after_single_product_summary', 'sweettooth_elated_single_product_content_additional_tag_after', 1 );
	
	//Add additional html around single product summary
	add_action( 'woocommerce_before_single_product_summary', 'sweettooth_elated_single_product_summary_additional_tag_before', 30 );
	add_action( 'woocommerce_after_single_product_summary', 'sweettooth_elated_single_product_summary_additional_tag_after', 5 );
	
	//Override product thumbnaiil columns size
	add_filter( 'woocommerce_product_thumbnails_columns', 'sweettooth_elated_woocommerce_product_thumbnail_column_size', 10 );
	
	//Change title position
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	add_action( 'woocommerce_single_product_summary', 'sweettooth_elated_woocommerce_template_single_title', 5 );
	
	//Change price position
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 8 );
	
	//Change product meta position
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 25 );
	
	//Add social share (default woocommerce_share)
	add_action( 'woocommerce_single_product_summary', 'sweettooth_elated_woocommerce_share', 28 );

	//Change product tabs position
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 30 );


/*************** PRODUCT SINGLE FILTERS - end ***************/