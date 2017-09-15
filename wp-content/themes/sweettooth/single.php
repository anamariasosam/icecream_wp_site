<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <?php
        sweettooth_elated_include_blog_helper_functions('singles', 'standard');

        //Action added for applying module specific filters that couldn't be applied on init
        do_action('sweettooth_elated_action_blog_single_loaded');

        //Get classes for holder and holder inner
        $eltdf_holder_params = sweettooth_elated_get_holder_params_blog();

        ?>

        <?php sweettooth_elated_get_title(); ?>
        <?php get_template_part('slider'); ?>
        <div class="<?php echo esc_attr($eltdf_holder_params['holder']); ?>">
            <?php do_action('sweettooth_elated_action_after_container_open'); ?>
            <div class="<?php echo esc_attr($eltdf_holder_params['inner']); ?>">
                <?php sweettooth_elated_get_blog_single('standard'); ?>
            </div>
            <?php do_action('sweettooth_elated_action_before_container_close'); ?>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>