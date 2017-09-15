<?php
$title_tag = isset($quote_tag) ? $quote_tag : 'h5';
if(get_post_format() === 'quote') {
	$title_tag = 'p';
}
$quote_text_meta = get_post_meta(get_the_ID(), "eltdf_post_quote_text_meta", true );

$post_title = !empty($quote_text_meta) ? $quote_text_meta : get_the_title();

$post_author     = get_post_meta(get_the_ID(), "eltdf_post_quote_author_meta", true );
$post_author_pos = get_post_meta(get_the_ID(), "eltdf_post_quote_author_position", true );
?>

<div class="eltdf-post-quote-holder">
    <div class="eltdf-post-quote-holder-inner">
        <<?php echo esc_attr($title_tag);?> itemprop="name" class="eltdf-quote-title eltdf-post-title">
        <?php if(sweettooth_elated_blog_item_has_link()) { ?>
            <a itemprop="url" href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php } ?>
            <?php echo esc_html($post_title); ?>
        <?php if(sweettooth_elated_blog_item_has_link()) { ?>
            </a>
        <?php } ?>
        </<?php echo esc_attr($title_tag);?>>
        <?php if($post_author !== '') { ?>
            <span class="eltdf-quote-author">
                <?php echo esc_html($post_author); ?>
            </span>
	        <?php if($post_author_pos !== '') { ?>
		        <span class="eltdf-quote-author-position">
	                <?php echo esc_html($post_author_pos); ?>
	            </span>
	        <?php } ?>
        <?php } ?>
    </div>
</div>