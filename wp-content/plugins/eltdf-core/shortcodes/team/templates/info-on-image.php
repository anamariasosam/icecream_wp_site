<div class="eltdf-team-holder <?php echo esc_attr($holder_classes); ?>">
	<div class="eltdf-team-inner">
		<?php if ($team_image !== '') { ?>
			<div class="eltdf-team-image">
                <?php echo wp_get_attachment_image($team_image, 'full'); ?>
				<div class="eltdf-team-social-wrapper" <?php echo sweettooth_elated_get_inline_style($overlay_styles); ?>>
					<div class="eltdf-team-social-outer">
						<div class="eltdf-team-social-inner">
							<?php if (!empty($team_name)) { ?>
								<<?php echo esc_attr($team_name_tag); ?> class="eltdf-team-name" <?php echo sweettooth_elated_get_inline_style($team_name_styles); ?>><?php echo esc_html($team_name); ?></<?php echo esc_attr($team_name_tag); ?>>
							<?php } ?>
							<?php if (!empty($team_position)) { ?>
								<<?php echo esc_attr($team_position_tag); ?> class="eltdf-team-position" <?php echo sweettooth_elated_get_inline_style($team_position_styles); ?>><?php echo esc_html($team_position); ?></<?php echo esc_attr($team_position_tag); ?>>
							<?php } ?>
							<?php if (!empty($team_desc)) { ?>
								<p class="eltdf-team-desc" <?php echo sweettooth_elated_get_inline_style($team_desc_color); ?>><?php echo esc_html($team_desc); ?></p>
							<?php } ?>
							<?php if (!empty($team_social_icons)) { ?>
								<div class="eltdf-team-social-holder">
									<?php foreach( $team_social_icons as $team_social_icon ) { ?>
										<span class="eltdf-team-icon"><?php echo wp_kses_post($team_social_icon); ?></span>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>