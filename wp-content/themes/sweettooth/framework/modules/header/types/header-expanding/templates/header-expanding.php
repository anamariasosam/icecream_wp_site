<?php do_action('sweettooth_elated_action_before_page_header'); ?>

	<header class="eltdf-page-header">
		<?php if($show_fixed_wrapper) : ?>
		<div class="eltdf-fixed-wrapper">
			<?php endif; ?>
			<div class="eltdf-menu-area">
				<?php do_action( 'sweettooth_elated_action_after_header_menu_area_html_open' )?>
				<?php if($menu_area_in_grid) : ?>
				<div class="eltdf-grid">
					<?php endif; ?>
					<div class="eltdf-vertical-align-containers">
						<div class="eltdf-position-left">
							<div class="eltdf-position-left-inner">
								<?php if(!$hide_logo) {
									sweettooth_elated_get_logo();
								} ?>
							</div>
						</div>
						<?php if($expanding_menu_area_position === 'center') : ?>
							<div class="eltdf-position-center">
								<div class="eltdf-position-center-inner">
									<?php sweettooth_elated_get_main_menu(); ?>
								</div>
							</div>
						<?php endif; ?>
						<div class="eltdf-position-right">
							<div class="eltdf-position-right-inner">
								<?php if($expanding_menu_area_position === 'right') : ?>
									<?php sweettooth_elated_get_main_menu(); ?>
								<?php endif; ?>
								<?php sweettooth_elated_get_header_widget_menu_area(); ?>
								<a href="javascript:void(0)" class="eltdf-expanding-menu-opener">
									<span class="eltdf-fm-lines">
										<span class="eltdf-fm-line eltdf-line-1"></span>
										<span class="eltdf-fm-line eltdf-line-2"></span>
										<span class="eltdf-fm-line eltdf-line-3"></span>
									</span>
								</a>
							</div>
						</div>
					</div>
					<?php if($menu_area_in_grid) : ?>
				</div>
			<?php endif; ?>
			</div>
			<?php if($show_fixed_wrapper) { ?>
			<?php do_action('sweettooth_elated_action_end_of_page_header_html'); ?>
		</div>
	<?php } else {
		do_action('sweettooth_elated_action_end_of_page_header_html');
	} ?>
		<?php if($show_sticky) {
			sweettooth_elated_get_sticky_header('expanding', 'header/types/header-expanding');
		} ?>
	</header>

<?php do_action('sweettooth_elated_action_after_page_header'); ?>