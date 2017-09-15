<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if(sweettooth_elated_options()->getOptionValue('enable_social_share') === 'yes' && sweettooth_elated_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="eltdf-blog-share">
        <?php echo sweettooth_elated_get_social_share_html(array('type' => $share_type)); ?>
    </div>
<?php } ?>