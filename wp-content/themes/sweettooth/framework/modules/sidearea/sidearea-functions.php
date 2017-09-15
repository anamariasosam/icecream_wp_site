<?php
if (!function_exists('sweettooth_elated_register_side_area_sidebar')) {
    /**
     * Register side area sidebar
     */
    function sweettooth_elated_register_side_area_sidebar() {

        register_sidebar(array(
            'name' => esc_html__('Side Area', 'sweettooth'),
            'id' => 'sidearea', //TODO Change name of sidebar
            'description' => esc_html__('Side Area', 'sweettooth'),
            'before_widget' => '<div id="%1$s" class="widget eltdf-sidearea %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="eltdf-widget-title-holder"><h3 class="eltdf-widget-title">',
            'after_title' => '</h3></div>'
        ));
    }

    add_action('widgets_init', 'sweettooth_elated_register_side_area_sidebar');
}

if (!function_exists('sweettooth_elated_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function sweettooth_elated_side_menu_body_class($classes) {

        if (is_active_widget(false, false, 'eltdf_side_area_opener')) {

            $classes[] = 'eltdf-side-menu-slide-from-right';
        }

        return $classes;
    }

    add_filter('body_class', 'sweettooth_elated_side_menu_body_class');
}

if (!function_exists('sweettooth_elated_get_side_area')) {
    /**
     * Loads side area HTML
     */
    function sweettooth_elated_get_side_area() {

        if (is_active_widget(false, false, 'eltdf_side_area_opener')) {

            sweettooth_elated_get_module_template_part('templates/sidearea', 'sidearea');
        }
    }
	
	add_action('sweettooth_elated_action_after_body_tag', 'sweettooth_elated_get_side_area', 10);
}

