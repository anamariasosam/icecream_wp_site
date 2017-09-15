<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-heading">
            <?php sweettooth_elated_get_module_template_part('templates/parts/image', 'blog', '', $part_params); ?>
            <?php sweettooth_elated_get_module_template_part('templates/parts/post-type/audio', 'blog', '', $part_params); ?>
        </div>
	    <div class="eltdf-post-text">
		    <div class="eltdf-post-text-inner">
			    <div class="eltdf-post-text-main">
				    <?php sweettooth_elated_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
				    <?php the_content(); ?>
				    <?php do_action('sweettooth_elated_action_single_link_pages'); ?>
			    </div>
			    <div class="eltdf-post-info-bottom clearfix">
				    <?php sweettooth_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
				    <?php sweettooth_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
				    <?php sweettooth_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
				    <?php sweettooth_elated_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
				    <?php sweettooth_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
				    <?php sweettooth_elated_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
				    <?php sweettooth_elated_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
			    </div>
		    </div>
	    </div>
    </div>
</article>