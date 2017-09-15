<?php

class SweetToothElatedClassSearchOpener extends SweetToothElatedClassWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_search_opener',
	        esc_html__('Elated Search Opener', 'sweettooth'),
	        array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'sweettooth'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
	            'type'        => 'textfield',
	            'name'        => 'search_icon_size',
                'title'       => esc_html__('Icon Size (px)', 'sweettooth'),
                'description' => esc_html__('Define size for search icon', 'sweettooth')
            ),
            array(
	            'type'        => 'textfield',
	            'name'        => 'search_icon_color',
                'title'       => esc_html__('Icon Color', 'sweettooth'),
                'description' => esc_html__('Define color for search icon', 'sweettooth')
            ),
            array(
	            'type'        => 'textfield',
	            'name'        => 'search_icon_hover_color',
                'title'       => esc_html__('Icon Hover Color', 'sweettooth'),
                'description' => esc_html__('Define hover color for search icon', 'sweettooth')
            ),
	        array(
		        'type' => 'textfield',
		        'name' => 'search_icon_margin',
		        'title' => esc_html__('Icon Margin', 'sweettooth'),
		        'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'sweettooth')
	        ),
            array(
	            'type'        => 'dropdown',
	            'name'        => 'show_label',
                'title'       => esc_html__('Enable Search Icon Text', 'sweettooth'),
                'description' => esc_html__('Enable this option to show search text next to search icon in header', 'sweettooth'),
                'options'     => sweettooth_elated_get_yes_no_select_array()
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        global $sweettooth_php_global_options, $sweettooth_php_global_IconCollections;

	    $search_type_class    = 'eltdf-search-opener eltdf-icon-has-hover';
	    $styles = array();
	    $show_search_text     = $instance['show_label'] == 'yes' || $sweettooth_php_global_options['enable_search_icon_text'] == 'yes' ? true : false;

	    if(!empty($instance['search_icon_size'])) {
		    $styles[] = 'font-size: '.intval($instance['search_icon_size']).'px';
	    }

	    if(!empty($instance['search_icon_color'])) {
		    $styles[] = 'color: '.$instance['search_icon_color'].';';
	    }

	    if (!empty($instance['search_icon_margin'])) {
		    $styles[] = 'margin: ' . $instance['search_icon_margin'].';';
	    }
	    ?>

	    <a <?php sweettooth_elated_inline_attr($instance['search_icon_hover_color'], 'data-hover-color'); ?> <?php sweettooth_elated_inline_style($styles); ?>
		    <?php sweettooth_elated_class_attribute($search_type_class); ?> href="javascript:void(0)">
            <span class="eltdf-search-opener-wrapper">
                <?php if(isset($sweettooth_php_global_options['search_icon_pack'])) {
	                $sweettooth_php_global_IconCollections->getSearchIcon($sweettooth_php_global_options['search_icon_pack'], false);
                } ?>
	            <?php if($show_search_text) { ?>
		            <span class="eltdf-search-icon-text"><?php esc_html_e('Search', 'sweettooth'); ?></span>
	            <?php } ?>
            </span>
	    </a>
    <?php }
}