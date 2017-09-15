<li class="eltdf-hti-content" data-date="<?php echo esc_attr($timeline_date) ?>">
	<div class="eltdf-hti-content-inner <?php echo esc_attr($holder_classes); ?>">
		<div class='eltdf-hti-content-inner-shadow'>
			<?php if( !empty($content_image) ): ?>
				<div class='eltdf-hti-content-image'>
					<?php echo wp_get_attachment_image($content_image, 'full'); ?>
				</div>
			<?php endif; ?>
			<div class='eltdf-hti-content-value'>
				<?php echo do_shortcode($content); ?>
			</div>
		</div>
	</div>
</li>