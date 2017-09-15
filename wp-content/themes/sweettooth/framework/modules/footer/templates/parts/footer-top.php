<div class="eltdf-footer-top-holder">
	<div class="eltdf-footer-top-inner <?php echo esc_attr($footer_top_grid_class); ?>">
		<div class="eltdf-grid-row <?php echo esc_attr($footer_top_classes); ?> eltdf-grid-huge-gutter">
			<?php for($i = 1; $i <= $footer_top_columns; $i++) { ?>
				<div class="eltdf-column-content eltdf-grid-col-<?php echo esc_attr(12 / $footer_top_columns); ?> eltdf-footer-column-<?php echo esc_attr($i); ?>">
					<?php
						if(is_active_sidebar('footer_top_column_'.$i)) {
							dynamic_sidebar('footer_top_column_'.$i);
						}
					?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>