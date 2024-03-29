<?php
/*
Plugin Name: Elated CPT
Description: Plugin that adds all post types needed by our theme
Author: Elated Themes
Version: 1.0
*/

require_once 'load.php';

add_action('after_setup_theme', array(ElatedCore\CPT\PostTypesRegister::getInstance(), 'register'));

if(!function_exists('eltd_core_activation')) {
    /**
     * Triggers when plugin is activated. It calls flush_rewrite_rules
     * and defines sweettooth_elated_action_core_on_activate action
     */
    function eltd_core_activation() {
        do_action('sweettooth_elated_action_core_on_activate');

        ElatedCore\CPT\PostTypesRegister::getInstance()->register();
        flush_rewrite_rules();
    }

    register_activation_hook(__FILE__, 'eltd_core_activation');
}

if(!function_exists('eltd_core_text_domain')) {
    /**
     * Loads plugin text domain so it can be used in translation
     */
    function eltd_core_text_domain() {
        load_plugin_textdomain('eltdf-core', false, ELATED_CORE_REL_PATH.'/languages');
    }

    add_action('plugins_loaded', 'eltd_core_text_domain');
}

if(!function_exists('eltdf_core_version_class')) {
	/**
	 * Adds plugins version class to body
	 * @param $classes
	 * @return array
	 */
	function eltdf_core_version_class($classes) {
		$classes[] = 'eltd-core-'.ELATED_CORE_VERSION;
		
		return $classes;
	}
	
	add_filter('body_class', 'eltdf_core_version_class');
}

if(!function_exists('eltdf_core_theme_installed')) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function eltdf_core_theme_installed() {
		return defined('ELATED_ROOT');
	}
}

if (!function_exists('eltdf_core_is_woocommerce_installed')) {
	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function eltdf_core_is_woocommerce_installed() {
		return function_exists('is_woocommerce');
	}
}

if(!function_exists('eltdf_core_is_revolution_slider_installed')) {
	function eltdf_core_is_revolution_slider_installed() {
		return class_exists('RevSliderFront');
	}
}

if(!function_exists('eltd_core_theme_menu')) {
    /**
     * Function that generates admin menu for options page.
     * It generates one admin page per options page.
     */
    function eltd_core_theme_menu() {
        if (eltdf_core_theme_installed()) {

            global $sweettooth_php_global_Framework;
            sweettooth_elated_init_theme_options();

            $page_hook_suffix = add_menu_page(
                'Elated Options',      // The value used to populate the browser's title bar when the menu page is active
	            'Elated Options',      // The text of the menu in the administrator's sidebar
                'administrator',                  // What roles are able to access the menu
                'sweettooth_elated_theme_menu',                // The ID used to bind submenu items to this menu
                array($sweettooth_php_global_Framework->getSkin(), 'renderOptions'), // The callback function used to render this menu
                $sweettooth_php_global_Framework->getSkin()->getMenuIcon('options'),             // Icon For menu Item
                $sweettooth_php_global_Framework->getSkin()->getMenuItemPosition('options')            // Position
            );

            foreach ($sweettooth_php_global_Framework->eltdOptions->adminPages as $key=>$value ) {
                $slug = "";

                if (!empty($value->slug)) {
                    $slug = "_tab".$value->slug;
                }

                $subpage_hook_suffix = add_submenu_page(
                    'sweettooth_elated_theme_menu',
	                'Elated Options - '.$value->title,                   // The value used to populate the browser's title bar when the menu page is active
                    $value->title,                   // The text of the menu in the administrator's sidebar
                    'administrator',                  // What roles are able to access the menu
                    'sweettooth_elated_theme_menu'.$slug,                // The ID used to bind submenu items to this menu
                    array($sweettooth_php_global_Framework->getSkin(), 'renderOptions')
                );

                add_action('admin_print_scripts-'.$subpage_hook_suffix, 'sweettooth_elated_enqueue_admin_scripts');
                add_action('admin_print_styles-'.$subpage_hook_suffix, 'sweettooth_elated_enqueue_admin_styles');
            };

            add_action('admin_print_scripts-'.$page_hook_suffix, 'sweettooth_elated_enqueue_admin_scripts');
            add_action('admin_print_styles-'.$page_hook_suffix, 'sweettooth_elated_enqueue_admin_styles');
        }
    }

    add_action( 'admin_menu', 'eltd_core_theme_menu');
}
if(!function_exists('eltd_core_theme_menu_backup_options')) {
	/**
	 * Function that generates admin menu for options page.
	 * It generates one admin page per options page.
	 */
	function eltd_core_theme_menu_backup_options() {
		if (eltdf_core_theme_installed()) {
			global $sweettooth_php_global_Framework;
			
			$slug = "_backup_options";
			$page_hook_suffix = add_submenu_page(
				'sweettooth_elated_theme_menu',
				'Elated Options - Backup Options',                   // The value used to populate the browser's title bar when the menu page is active
				'Backup Options',                   // The text of the menu in the administrator's sidebar
				'administrator',                  // What roles are able to access the menu
				'sweettooth_elated_theme_menu'.$slug,                // The ID used to bind submenu items to this menu
				array($sweettooth_php_global_Framework->getSkin(), 'renderBackupOptions')
			);
			
			add_action('admin_print_scripts-'.$page_hook_suffix, 'sweettooth_elated_enqueue_admin_scripts');
			add_action('admin_print_styles-'.$page_hook_suffix, 'sweettooth_elated_enqueue_admin_styles');
		}
	}

	add_action( 'admin_menu', 'eltd_core_theme_menu_backup_options');
}