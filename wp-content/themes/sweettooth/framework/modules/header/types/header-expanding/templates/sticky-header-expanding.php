<?php do_action('sweettooth_elated_action_after_sticky_header'); ?>

    <div class="eltdf-sticky-header">
        <?php do_action('sweettooth_elated_action_after_sticky_menu_html_open'); ?>
        <div class="eltdf-sticky-holder">
        <?php if ($sticky_header_in_grid) : ?>
            <div class="eltdf-grid">
        <?php endif; ?>
                <div class=" eltdf-vertical-align-containers">
	                <div class="eltdf-position-left">
		                <div class="eltdf-position-left-inner">
			                <?php if(!$hide_logo) {
				                sweettooth_elated_get_logo('sticky');
			                } ?>
		                </div>
	                </div>
	                <?php if($expanding_menu_area_position === 'center') : ?>
		                <div class="eltdf-position-center">
			                <div class="eltdf-position-center-inner">
				                <?php sweettooth_elated_get_sticky_menu('eltdf-sticky-nav'); ?>
			                </div>
		                </div>
	                <?php endif; ?>
	                <div class="eltdf-position-right">
		                <div class="eltdf-position-right-inner">
			                <?php if($expanding_menu_area_position === 'right') : ?>
				                <?php sweettooth_elated_get_sticky_menu('eltdf-sticky-nav'); ?>
			                <?php endif; ?>
			                <?php if(is_active_sidebar('eltdf-sticky-right')) : ?>
				                <?php dynamic_sidebar('eltdf-sticky-right'); ?>
			                <?php endif; ?>
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
        <?php if ($sticky_header_in_grid) : ?>
            </div>
        <?php endif; ?>
        </div>
    </div>

<?php do_action('sweettooth_elated_action_after_sticky_header'); ?>