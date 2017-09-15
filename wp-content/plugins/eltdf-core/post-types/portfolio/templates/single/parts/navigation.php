<?php if(sweettooth_elated_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') : ?>
	<?php
	$back_to_link = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
	$nav_same_category = sweettooth_elated_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';
	?>

	<div class="eltdf-ps-navigation">
		<?php if(get_previous_post() !== '') : ?>
			<div class="eltdf-ps-prev">
				<?php if($nav_same_category) {
					$html = '';
					if(get_adjacent_post(true, false, true, 'portfolio-category' ) !== ""){
						$prev_post = get_adjacent_post(true, false, true, 'portfolio-category' );
						$html .= get_the_post_thumbnail($prev_post->ID, 'medium');
						$html .= '<span class="eltdf-ps-nav-title">';
						$html .= get_the_title($prev_post->ID);
						$html .= '</span>';
					}
					previous_post_link('%link',''.$html, true,'','portfolio-category');
				} else {
					$html = '';
					if(get_previous_post() != ""){
						$prev_post = get_previous_post();
						$html .= get_the_post_thumbnail($prev_post->ID, 'medium');
						$html .= '<span class="eltdf-ps-nav-title">';
						$html .= get_the_title($prev_post->ID);
						$html .= '</span>';
					}
					previous_post_link('%link',''.$html);
				} ?>
			</div>
		<?php endif; ?>

		<?php if($back_to_link !== '') : ?>
			<div class="eltdf-ps-back-btn">
				<a itemprop="url" href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
					<?php esc_html_e('MAIN LIST', 'eltdf-core'); ?>
				</a>
			</div>
		<?php endif; ?>

		<?php if(get_next_post() !== '') : ?>
			<div class="eltdf-ps-next">
				<?php if($nav_same_category) {
					$html = '';
					if(get_adjacent_post(true, false, false, 'portfolio-category' ) !== ""){
						$next_post = get_adjacent_post(true, false, false, 'portfolio-category' );
						$html .= get_the_post_thumbnail($next_post->ID, 'medium');
						$html .= '<span class="eltdf-ps-nav-title">';
						$html .= get_the_title($next_post->ID);
						$html .= '</span>';
					}
					next_post_link('%link', $html.'', true,'','portfolio-category');
				} else {
					$html = '';
					if(get_next_post() !== ""){
						$next_post = get_next_post();
						$html .= get_the_post_thumbnail($next_post->ID, 'medium');
						$html .= '<span class="eltdf-ps-nav-title">';
						$html .= get_the_title($next_post->ID);
						$html .= '</span>';
					}
					next_post_link('%link', $html.'');
				} ?>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
