<?php

if(!function_exists('sweettooth_elated_register_required_plugins')) {
    /**
     * Registers Visual Composer, Revolution Slider, Elated Core, Elated Instagram Feed, Elatedf Twitter Feed  as required plugins. Hooks to tgmpa_register hook
     */
    function sweettooth_elated_register_required_plugins() {
        $plugins = array(
            array(
                'name'               => esc_html__('WPBakery Visual Composer', 'sweettooth'),
                'slug'               => 'js_composer',
                'source'             => get_template_directory().'/includes/plugins/js_composer.zip',
                'version'            => '5.2',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Revolution Slider', 'sweettooth'),
                'slug'               => 'revslider',
                'source'             => get_template_directory().'/includes/plugins/revslider.zip',
                'version'            => '5.4.5.1',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Elated Core', 'sweettooth'),
                'slug'               => 'eltdf-core',
                'source'             => get_template_directory().'/includes/plugins/eltdf-core.zip',
                'version'            => '1.0',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Elated Instagram Feed', 'sweettooth'),
                'slug'               => 'eltdf-instagram-feed',
                'source'             => get_template_directory().'/includes/plugins/eltdf-instagram-feed.zip',
                'version'            => '1.0',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Elated Twitter Feed', 'sweettooth'),
                'slug'               => 'eltdf-twitter-feed',
                'source'             => get_template_directory().'/includes/plugins/eltdf-twitter-feed.zip',
                'version'            => '1.0',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
	        array(
		        'name'         => esc_html__( 'WooCommerce', 'sweettooth' ),
		        'slug'         => 'woocommerce',
		        'external_url' => 'https://wordpress.org/plugins/woocommerce/',
		        'required'     => false
	        ),
	        array(
		        'name'         => esc_html__( 'Contact Form 7', 'sweettooth' ),
		        'slug'         => 'contact-form-7',
		        'external_url' => 'https://wordpress.org/plugins/contact-form-7/',
		        'required'     => false
	        )
        );

        $config = array(
            'domain'           => 'sweettooth',
            'default_path'     => '',
            'parent_slug' 	   => 'themes.php',
            'capability' 	   => 'edit_theme_options',
            'menu'             => 'install-required-plugins',
            'has_notices'      => true,
            'is_automatic'     => false,
            'message'          => '',
            'strings'          => array(
                'page_title'                      => esc_html__('Install Required Plugins', 'sweettooth'),
                'menu_title'                      => esc_html__('Install Plugins', 'sweettooth'),
                'installing'                      => esc_html__('Installing Plugin: %s', 'sweettooth'),
                'oops'                            => esc_html__('Something went wrong with the plugin API.', 'sweettooth'),
                'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'sweettooth'),
                'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'sweettooth'),
                'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'sweettooth'),
                'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'sweettooth'),
                'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'sweettooth'),
                'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'sweettooth'),
                'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'sweettooth'),
                'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'sweettooth'),
                'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins', 'sweettooth'),
                'activate_link'                   => _n_noop('Activate installed plugin', 'Activate installed plugins', 'sweettooth'),
                'return'                          => esc_html__('Return to Required Plugins Installer', 'sweettooth'),
                'plugin_activated'                => esc_html__('Plugin activated successfully.', 'sweettooth'),
                'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'sweettooth'),
                'nag_type'                        => 'updated'
            )
        );

        tgmpa($plugins, $config);
    }

    add_action('tgmpa_register', 'sweettooth_elated_register_required_plugins');
}