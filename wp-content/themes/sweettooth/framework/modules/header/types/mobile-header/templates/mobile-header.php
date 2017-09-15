<?php do_action('sweettooth_elated_action_before_mobile_header'); ?>

<header class="eltdf-mobile-header">
	<?php do_action('sweettooth_elated_action_after_mobile_header_html_open'); ?>
	
	<div class="eltdf-mobile-header-inner">
		<div class="eltdf-mobile-header-holder">
			<div class="eltdf-grid">
				<div class="eltdf-vertical-align-containers">
					<div class="eltdf-vertical-align-containers">
						<?php if($show_navigation_opener) : ?>
							<div class="eltdf-mobile-menu-opener">
								<a href="javascript:void(0)">
									<span class="eltdf-mm-lines">
										<span class="eltdf-mm-line eltdf-line-1"></span>
										<span class="eltdf-mm-line eltdf-line-2"></span>
										<span class="eltdf-mm-line eltdf-line-3"></span>
									</span>
									<?php if(!empty($mobile_menu_title)) { ?>
										<h5 class="eltdf-mobile-menu-text"><?php echo esc_attr($mobile_menu_title); ?></h5>
									<?php } ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="eltdf-position-center">
							<div class="eltdf-position-center-inner">
								<?php sweettooth_elated_get_mobile_logo(); ?>
							</div>
						</div>
						<div class="eltdf-position-right">
							<div class="eltdf-position-right-inner">
								<?php if(is_active_sidebar('eltdf-right-from-mobile-logo')) {
									dynamic_sidebar('eltdf-right-from-mobile-logo');
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php sweettooth_elated_get_mobile_nav(); ?>
	</div>
	
	<?php do_action('sweettooth_elated_action_before_mobile_header_html_close'); ?>
</header>

<?php do_action('sweettooth_elated_action_after_mobile_header'); ?>