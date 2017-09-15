<?php

if (!function_exists('sweettooth_elated_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function sweettooth_elated_register_sidebars() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'sweettooth'),
            'id' => 'sidebar',
            'description' => esc_html__('Default Sidebar', 'sweettooth'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="eltdf-widget-title-holder"><h5 class="eltdf-widget-title">',
            'after_title' => '</h5></div>'
        ));
    }

    add_action('widgets_init', 'sweettooth_elated_register_sidebars', 1);
}

if (!function_exists('sweettooth_elated_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates SweetToothElatedClassSidebar object
     */
    function sweettooth_elated_add_support_custom_sidebar() {
        add_theme_support('SweetToothElatedClassSidebar');
        if (get_theme_support('SweetToothElatedClassSidebar')) new SweetToothElatedClassSidebar();
    }

    add_action('after_setup_theme', 'sweettooth_elated_add_support_custom_sidebar');
}