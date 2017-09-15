<?php

sweettooth_elated_get_single_post_format_html($blog_single_type);

sweettooth_elated_get_module_template_part('templates/parts/single/author-info', 'blog');

sweettooth_elated_get_module_template_part('templates/parts/single/single-navigation', 'blog');

sweettooth_elated_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

sweettooth_elated_get_module_template_part('templates/parts/single/comments', 'blog');