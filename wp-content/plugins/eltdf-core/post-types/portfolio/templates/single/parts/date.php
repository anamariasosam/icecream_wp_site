<?php if(sweettooth_elated_options()->getOptionValue('portfolio_single_hide_date') === 'yes') : ?>
    <div class="eltdf-ps-info-item eltdf-ps-date">
        <p class="eltdf-ps-info-title"><?php esc_html_e('Date:', 'eltdf-core'); ?></p>
        <p itemprop="dateCreated" class="eltdf-ps-info-date entry-date updated"><?php the_time(get_option('date_format')); ?></p>
        <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(sweettooth_elated_get_page_id()); ?>"/>
    </div>
<?php endif; ?>