<div class="eltdf-full-screen-sections <?php echo esc_attr($holder_classes); ?>" <?php echo sweettooth_elated_get_inline_attrs($holder_data); ?>>
	<div class="eltdf-fss-wrapper">
		<?php echo do_shortcode($content); ?>
	</div>
	<?php if($enable_navigation === 'yes') { ?>
		<div class="eltdf-fss-nav-holder">
			<a id="eltdf-fss-nav-up" href="#" target="_self"><span class='icon-arrows-up'></span></a>
			<a id="eltdf-fss-nav-down" href="#" target="_self"><span class='icon-arrows-down'></span></a>
		</div>
	<?php } ?>
</div>