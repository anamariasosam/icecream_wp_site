<div class="eltdf-section-title-holder <?php echo esc_attr($holder_class); ?>" <?php echo sweettooth_elated_get_inline_style($holder_styles); ?>>
	<?php if(!empty($title)) { ?>
		<<?php echo esc_attr($title_tag); ?> class="eltdf-st-title <?php echo esc_attr($title_align); ?>" <?php echo sweettooth_elated_get_inline_style($title_styles); ?>>
			<span><?php echo esc_html($title); ?></span>
		</<?php echo esc_attr($title_tag); ?>>
	<?php } ?>
	<?php if(!empty($text)) { ?>
		<p class="eltdf-st-text" <?php echo sweettooth_elated_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
	<?php } ?>
</div>