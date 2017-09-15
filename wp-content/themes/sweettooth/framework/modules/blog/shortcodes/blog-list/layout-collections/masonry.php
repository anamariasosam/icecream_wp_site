<li class="eltdf-bl-item clearfix">
	<div class="eltdf-bli-inner">
        <?php sweettooth_elated_get_module_template_part('templates/parts/image', 'blog', '', $params); ?>

        <div class="eltdf-bli-content">
            <?php sweettooth_elated_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>
	        <div class="eltdf-bli-excerpt">
		        <?php sweettooth_elated_get_module_template_part('templates/parts/excerpt', 'blog', '', $params); ?>
	        </div>
            <?php
            if($post_info_section == 'yes') { ?>
                <div class="eltdf-bli-info">
                    <?php
                    if ($post_info_date == 'yes') {
                        sweettooth_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
                    }
                    if ($post_info_category == 'yes') {
                        sweettooth_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
                    }
                    if ($post_info_author == 'yes') {
                        sweettooth_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $params);
                    }
                    if ($post_info_comments == 'yes') {
                        sweettooth_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $params);
                    }
                    if ($post_info_like == 'yes') {
                        sweettooth_elated_get_module_template_part('templates/parts/post-info/like', 'blog', '', $params);
                    }
                    if ($post_info_share == 'yes') {
                        sweettooth_elated_get_module_template_part('templates/parts/post-info/share', 'blog', '', $params);
                    }
                    ?>
                </div>
            <?php } ?>
	        <?php sweettooth_elated_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $params); ?>
        </div>
	</div>
</li>