<div class="eltdf-bs-holder <?php echo esc_attr($holder_classes); ?>" <?php echo sweettooth_elated_get_inline_style($holder_styles); ?> <?php echo sweettooth_elated_get_inline_attrs($holder_data); ?>>
	<div class="eltdf-container-inner eltdf-bs-content-inner eltdf-grid-row">
		<?php if( !empty($content_image) ): ?>
			<div class='eltdf-bs-content-image eltdf-grid-col-6'>
				<?php echo wp_get_attachment_image($content_image, 'full'); ?>
			</div>
		<?php endif; ?>
		<div class="eltdf-bs-content eltdf-grid-col-6 <?php if( $image_position === 'right' ) {echo 'eltdf-grid-col-pull-6';} ?>">
			<?php echo do_shortcode($content); ?>
		</div>
	</div>
</div>