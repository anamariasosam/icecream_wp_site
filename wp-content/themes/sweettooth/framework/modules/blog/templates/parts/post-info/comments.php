<?php if(comments_open()) { ?>
<div class="eltdf-post-info-comments-holder">
    <a itemprop="url" class="eltdf-post-info-comments" href="<?php comments_link(); ?>" target="_self">
        <?php comments_number('0 ' . esc_html__('Comments','sweettooth'), '1 '.esc_html__('Comment','sweettooth'), '% '.esc_html__('Comments','sweettooth') ); ?>
    </a>
</div>
<?php } ?>