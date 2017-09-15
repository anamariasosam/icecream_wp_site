<?php
$product = sweettooth_elated_return_woocommerce_global_variable();

if ($display_price === 'yes' &&  $price_html = $product->get_price_html()) { ?>
	<h5 class="eltdf-<?php echo esc_attr($class_name); ?>-price"><?php echo wp_kses_post($price_html); ?></h5>
<?php } ?>