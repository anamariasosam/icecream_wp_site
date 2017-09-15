<div class="eltdf-pricing-list-item clearfix <?php echo empty($image) ? 'eltdf-pli-no-image' : ''; ?>">
	<div class="eltdf-pli-content clearfix">
		<?php if(!empty($image)): ?>
		<div class="eltdf-pli-image-holder">
			<?php echo wp_get_attachment_image($image); ?>
		</div>
		<?php endif; ?>
		<div class="eltdf-pli-content-holder">
			<?php if(!empty($title)): ?>
				<div class="eltdf-pli-title-holder">
					<h3 itemprop="name" class="eltdf-pli-title entry-title" <?php echo sweettooth_elated_get_inline_style($title_styles); ?>>
						<?php if(!empty($link)): ?><a itemprop="url" target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($link); ?>"><?php endif; ?>
							<?php echo wp_kses($title, array(
									'span' => array(
										'class' => true
									)
							)); ?>
							<?php if(!empty($link)): ?></a><?php endif; ?>
					</h3>
				</div>
			<?php endif; ?>
			<div class="eltdf-pli-bottom-content">
				<?php if(!empty($description)) : ?>
					<div class="eltdf-pli-desc clearfix" <?php echo sweettooth_elated_get_inline_style($desc_styles); ?>>
						<p><?php echo esc_html($description); ?></p>
					</div>
				<?php endif; ?>
				<div class="eltdf-pli-dots"></div>
				<?php if(!empty($price)) : ?>
					<div class="eltdf-pli-price-holder">
						<p class="eltdf-pli-price" <?php echo sweettooth_elated_get_inline_style($price_styles); ?>>
							<span><?php echo esc_html($price); ?></span>
						</p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>	