<?php if ( ! sweettooth_elated_post_has_read_more() ) { ?>
	<div class="eltdf-post-read-more-button">
	<?php
	    if(sweettooth_elated_core_plugin_installed()) {
	        echo sweettooth_elated_get_button_html(
	            apply_filters(
	                'sweettooth_elated_filter_blog_template_read_more_button',
	                array(
	                    'type' => 'simple',
	                    'size' => 'medium',
	                    'link' => get_the_permalink(),
	                    'text' => esc_html__('READ MORE', 'sweettooth'),
	                    'custom_class' => 'eltdf-blog-list-button'
	                )
	            )
	        );
	    } else { ?>
	        <a itemprop="url" href="<?php echo esc_attr(get_the_permalink()); ?>" target="_self" class="eltdf-btn eltdf-btn-medium eltdf-btn-simple eltdf-blog-list-button">
	            <span class="eltdf-btn-text">
	                <?php echo esc_html__('READ MORE', 'sweettooth'); ?>
	            </span>
	        </a>
	<?php } ?>
	</div>
<?php } ?>