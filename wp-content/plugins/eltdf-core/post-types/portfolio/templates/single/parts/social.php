<?php if(sweettooth_elated_options()->getOptionValue('enable_social_share') == 'yes' && sweettooth_elated_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
    <div class="eltdf-ps-info-item eltdf-ps-social-share">
	    <span class="eltdf-social-label"><?php echo esc_html__('Share', 'eltdf-core'); ?></span>
        <?php echo sweettooth_elated_get_social_share_html(); ?>
    </div>
<?php endif; ?>