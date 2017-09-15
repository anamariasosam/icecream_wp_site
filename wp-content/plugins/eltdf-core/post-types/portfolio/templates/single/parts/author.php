<?php
	$authorID = get_the_author_meta('ID');
?>
<div class="eltdf-portfolio-author-holder clearfix">
	<div class="eltdf-portfolio-author-image">
		<?php echo sweettooth_elated_kses_img(get_avatar($authorID, 42)); ?>
	</div>
	<div class="eltdf-portfolio-author-name vcard author">
		<a itemprop="url" href="<?php echo esc_attr(get_author_posts_url($authorID)); ?>" target="_self">
			<span class="fn">
				<?php
				if(esc_attr(get_the_author_meta('first_name', $authorID)) != "" || esc_attr(get_the_author_meta('last_name', $authorID) != "")) {
					echo esc_attr(get_the_author_meta('first_name', $authorID)) . " " . esc_attr(get_the_author_meta('last_name', $authorID));
				} else {
					echo esc_attr(get_the_author_meta('display_name', $authorID));
				}
				?>
			</span>
		</a>
	</div>
</div>