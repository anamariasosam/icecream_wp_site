<?php
$args_pages = array(
    'before'           => '<div class="eltdf-single-links-pages"><div class="eltdf-single-links-pages-inner">',
    'after'            => '</div></div>',
    'link_before'      => '<span>'. esc_html__('Page ', 'sweettooth'),
    'link_after'       => '</span>',
    'pagelink'         => '%'
);

wp_link_pages($args_pages);