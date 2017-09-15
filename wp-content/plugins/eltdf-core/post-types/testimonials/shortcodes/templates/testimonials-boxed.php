<div class="eltdf-testimonial-content" id="eltdf-testimonials-<?php echo esc_attr($current_id) ?>">
	<div class="eltdf-testimonial-content-inner" <?php sweettooth_elated_inline_style($box_styles); ?>>
		<div class="eltdf-testimonial-text-holder">
			<?php if(has_post_thumbnail() || !empty($author)) { ?>
					<?php if(!empty($text)) { ?>
						<p class="eltdf-testimonial-text"><?php echo esc_html($text); ?></p>
					<?php } ?>
					<div class="eltdf-testimonial-bottom eltdf-grid-row">
						<?php if(has_post_thumbnail()) { ?>
							<div class="eltdf-testimonial-image eltdf-grid-col-4">
								<?php echo get_the_post_thumbnail(get_the_ID(), array(87, 87)); ?>
							</div>
						<?php } ?>
						<div class="eltdf-testimonials-author-holder clearfix eltdf-grid-col-8">
							<?php if(!empty($author)) { ?>
								<div class="eltdf-testimonial-author-inner">
			                        <h3 class="eltdf-testimonial-author"><?php echo esc_html($author); ?></h3>
									<?php if(!empty($position)) { ?>
										<span class="eltdf-testimonial-author-position"><?php echo esc_html($position); ?></span>
									<?php } ?>
		                        </div>
							<?php } ?>
						</div>
					</div>
			<?php } ?>
		</div>
	</div>
</div>