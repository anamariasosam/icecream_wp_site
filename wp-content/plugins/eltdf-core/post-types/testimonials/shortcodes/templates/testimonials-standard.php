<div class="eltdf-testimonial-content" id="eltdf-testimonials-<?php echo esc_attr($current_id) ?>">
	<div class="eltdf-testimonial-text-holder">
		<?php if(!empty($title)) { ?>
			<h2 itemprop="name" class="eltdf-testimonial-title entry-title"><?php echo esc_html($title); ?></h2>
		<?php } ?>
		<?php if(has_post_thumbnail()) { ?>
			<div class="eltdf-testimonial-image">
				<?php echo get_the_post_thumbnail(get_the_ID(), array(66, 66)); ?>
			</div>
		<?php } ?>
		<?php if(!empty($text)) { ?>
			<p class="eltdf-testimonial-text"><?php echo esc_html($text); ?></p>
		<?php } ?>
		<?php if(!empty($author)) { ?>
			<div class="eltdf-testimonial-author-inner">
				<h3 class="eltdf-testimonial-author"><?php echo esc_html($author); ?></h3>
				<?php if(!empty($position)) { ?>
					<h5 class="eltdf-testimonial-author-position"><?php echo esc_html($position); ?></h5>
				<?php } ?>
	        </div>
		<?php } ?>
	</div>
</div>