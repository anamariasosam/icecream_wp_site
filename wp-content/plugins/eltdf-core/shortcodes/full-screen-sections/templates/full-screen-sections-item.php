<div class="eltdf-fss-item <?php echo esc_attr($holder_classes); ?>" <?php sweettooth_elated_inline_style($holder_styles); ?>>
	<div class="eltdf-fss-item-inner" <?php sweettooth_elated_inline_style($item_inner_styles); ?>>
		<?php echo do_shortcode($content); ?>
	</div>
	<?php if(!empty($link)) { ?>
		<a itemprop="url" class="eltdf-fss-item-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>"></a>
	<?php } ?>
</div>