<div class="eltdf-ic-item">
	<?php if(!empty($image)): ?>
		<div class="eltdf-ic-image" <?php sweettooth_elated_inline_style($image_styles); ?>></div>
	<?php endif; ?>
	<div class="eltdf-ic-content" <?php sweettooth_elated_inline_style($content_styles); ?>>

		<?php if(!empty($title)): ?>

			<?php if(!empty($custom_link)) { ?>
				<a itemprop="url" class="eltdf-ic-link" href="<?php echo esc_url($custom_link) ?>" target="<?php echo esc_attr($custom_link_target); ?>">
			<?php } ?>

			<h3 class="eltdf-ic-title" <?php sweettooth_elated_inline_style($title_styles); ?>><?php echo esc_html($title); ?></h3>

			<?php if(!empty($custom_link)) { ?>
				</a>
			<?php } ?>
			
		<?php endif; ?>

		<?php if(!empty($subtitle)): ?>
			<p class="eltdf-ic-subtitle" <?php sweettooth_elated_inline_style($subtitle_styles); ?>><?php echo wp_kses($subtitle, array('br' => 'br')); ?></p>
		<?php endif; ?>
	</div>
</div>