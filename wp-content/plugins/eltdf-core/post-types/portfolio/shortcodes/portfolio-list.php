<?php
namespace ElatedCore\CPT\Shortcodes\Portfolio;

use ElatedCore\Lib;

class PortfolioList implements Lib\ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'eltdf_portfolio_list';

        add_action('vc_before_init', array($this, 'vcMap'));

	    //Portfolio category filter
	    add_filter( 'vc_autocomplete_eltdf_portfolio_list_category_callback', array( &$this, 'portfolioCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

	    //Portfolio category render
	    add_filter( 'vc_autocomplete_eltdf_portfolio_list_category_render', array( &$this, 'portfolioCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array

	    //Portfolio selected projects filter
	    add_filter( 'vc_autocomplete_eltdf_portfolio_list_selected_projects_callback', array( &$this, 'portfolioIdAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

	    //Portfolio selected projects render
	    add_filter( 'vc_autocomplete_eltdf_portfolio_list_selected_projects_render', array( &$this, 'portfolioIdAutocompleteRender', ), 10, 1 ); // Render exact portfolio. Must return an array (label,value)

	    //Portfolio tag filter
	    add_filter( 'vc_autocomplete_eltdf_portfolio_list_tag_callback', array( &$this, 'portfolioTagAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

	    //Portfolio tag render
	    add_filter( 'vc_autocomplete_eltdf_portfolio_list_tag_render', array( &$this, 'portfolioTagAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     *
     * @see vc_map
     */
    public function vcMap() {
	    if(function_exists('vc_map')) {
		    vc_map( array(
				    'name'                      => esc_html__( 'Elated Portfolio List', 'eltdf-core' ),
				    'base'                      => $this->getBase(),
				    'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
				    'icon'                      => 'icon-wpb-portfolio extended-custom-icon',
				    'allowed_container_element' => 'vc_row',
				    'params'                    => array(
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'type',
						    'heading'     => esc_html__( 'Portfolio List Template', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'Gallery', 'eltdf-core' ) => 'gallery',
							    esc_html__( 'Masonry', 'eltdf-core' ) => 'masonry'
						    ),
						    'save_always' => true,
						    'admin_label' => true
					    ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'item_type',
                            'heading'     => esc_html__( 'Click Behavior', 'eltdf-core' ),
                            'value'       => array(
                                esc_html__( 'Open portfolio single page on click', 'eltdf-core' )     => '',
                                esc_html__( 'Open gallery in Pretty Photo on click', 'eltdf-core' )   => 'gallery',
                            ),
                        ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'number_of_columns',
						    'heading'     => esc_html__( 'Number of Columns', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'Default', 'eltdf-core' ) => '',
							    esc_html__( 'One', 'eltdf-core' )     => '1',
							    esc_html__( 'Two', 'eltdf-core' )     => '2',
							    esc_html__( 'Three', 'eltdf-core' )   => '3',
							    esc_html__( 'Four', 'eltdf-core' )    => '4',
							    esc_html__( 'Five', 'eltdf-core' )    => '5'
						    ),
						    'description' => esc_html__( 'Default value is Three', 'eltdf-core' ),
						    'save_always' => true,
						    'admin_label' => true
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'space_between_items',
						    'heading'     => esc_html__( 'Space Between Portfolio Items', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'Normal', 'eltdf-core' )   => 'normal',
							    esc_html__( 'Small', 'eltdf-core' )    => 'small',
							    esc_html__( 'Tiny', 'eltdf-core' )     => 'tiny',
							    esc_html__( 'No Space', 'eltdf-core' ) => 'no'
						    ),
				        	'save_always' => true,
						    'admin_label' => true
					    ),
					    array(
						    'type'        => 'textfield',
						    'param_name'  => 'number_of_items',
						    'heading'     => esc_html__( 'Number of Portfolios Per Page', 'eltdf-core' ),
						    'description' => esc_html__( 'Set number of items for your portfolio list. Enter -1 to show all.', 'eltdf-core' ),
						    'value'       => '-1'
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'image_proportions',
						    'heading'     => esc_html__( 'Image Proportions', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'Original', 'eltdf-core' )  => 'full',
							    esc_html__( 'Square', 'eltdf-core' )    => 'square',
							    esc_html__( 'Landscape', 'eltdf-core' ) => 'landscape',
							    esc_html__( 'Portrait', 'eltdf-core' )  => 'portrait',
							    esc_html__( 'Medium', 'eltdf-core' )    => 'medium',
							    esc_html__( 'Large', 'eltdf-core' )     => 'large'
						    ),
						    'description' => esc_html__( 'Set image proportions for your portfolio list.', 'eltdf-core' ),
                            'dependency'  => array( 'element' => 'type', 'value' => array( 'gallery' ) )
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'enable_fixed_proportions',
						    'heading'     => esc_html__( 'Enable Fixed Image Proportions', 'eltdf-core' ),
						    'value'       => array_flip(sweettooth_elated_get_yes_no_select_array(false)),
						    'description' => esc_html__( 'Set predefined image proportions for your masonry portfolio list. This option will apply image proportions you set in Portfolio Single page - dimensions for masonry option.', 'eltdf-core' ),
						    'dependency'  => array( 'element' => 'type', 'value' => array( 'masonry' ) )
					    ),
					    array(
						    'type'        => 'autocomplete',
						    'param_name'  => 'category',
						    'heading'     => esc_html__( 'One-Category Portfolio List', 'eltdf-core' ),
						    'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'autocomplete',
						    'param_name'  => 'selected_projects',
						    'heading'     => esc_html__( 'Show Only Projects with Listed IDs', 'eltdf-core' ),
						    'settings'    => array(
							    'multiple'      => true,
							    'sortable'      => true,
							    'unique_values' => true
						    ),
						    'description' => esc_html__( 'Delimit ID numbers by comma (leave empty for all)', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'autocomplete',
						    'param_name'  => 'tag',
						    'heading'     => esc_html__( 'One-Tag Portfolio List', 'eltdf-core' ),
						    'description' => esc_html__( 'Enter one tag slug (leave empty for showing all tags)', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'order_by',
						    'heading'     => esc_html__('Order By', 'eltdf-core'),
						    'value'       => array_flip(sweettooth_elated_get_query_order_by_array()),
						    'save_always' => true
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'order',
						    'heading'     => esc_html__('Order', 'eltdf-core'),
						    'value'       => array_flip(sweettooth_elated_get_query_order_array()),
						    'save_always' => true
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'target',
						    'heading'     => esc_html__('Portfolio Items Link Target', 'eltdf-core'),
						    'value'       => array_flip(sweettooth_elated_get_link_target_array(true))
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'item_style',
						    'heading'     => esc_html__( 'Item Style', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'Standard - Shader', 'eltdf-core' )                 => 'standard-shader',
							    esc_html__( 'Gallery - Overlay', 'eltdf-core' )                 => 'gallery-overlay',
							    esc_html__( 'Gallery - Slide From Image Bottom', 'eltdf-core' ) => 'gallery-slide-from-image-bottom'
						    ),
						    'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'hover_skin',
						    'heading'     => esc_html__( 'Hover Skin', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'Default', 'eltdf-core' )    => '',
							    esc_html__( 'Main Color', 'eltdf-core' ) => 'main-color'
						    ),
						    'group'       => esc_html__( 'Content Layout', 'eltdf-core' ),
						    'dependency'  => array( 'element' => 'item_style', 'value' => array( 'standard-shader' ) ),
						    'save_always' => true,
						    'admin_label' => true
					    ),
					    array(
						    'type'       => 'dropdown',
						    'param_name' => 'enable_title',
						    'heading'    => esc_html__( 'Enable Title', 'eltdf-core' ),
						    'value'      => array_flip(sweettooth_elated_get_yes_no_select_array(false, true)),
						    'group'      => esc_html__( 'Content Layout', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'title_tag',
						    'heading'     => esc_html__( 'Title Tag', 'eltdf-core' ),
						    'value'       => array_flip(sweettooth_elated_get_title_tag(true, array('p' => 'p'))),
						    'dependency'  => array( 'element' => 'enable_title', 'value' => array( 'yes' ) ),
						    'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'title_text_transform',
						    'heading'     => esc_html__( 'Title Text Transform', 'eltdf-core' ),
						    'value'       => array_flip(sweettooth_elated_get_text_transform_array(true)),
						    'dependency'  => array( 'element' => 'enable_title', 'value' => array( 'yes' ) ),
						    'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
					    ),
					    array(
						    'type'       => 'dropdown',
						    'param_name' => 'enable_category',
						    'heading'    => esc_html__( 'Enable Category', 'eltdf-core' ),
						    'value'      => array_flip(sweettooth_elated_get_yes_no_select_array(false, true)),
						    'group'      => esc_html__( 'Content Layout', 'eltdf-core' )
					    ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'enable_count_images',
                            'heading'     => esc_html__( 'Enable Number of Images', 'eltdf-core' ),
                            'value'      => array_flip(sweettooth_elated_get_yes_no_select_array(false, true)),
                            'dependency'  => array( 'element' => 'item_type', 'value' => array( 'gallery' ) ),
                            'group'      => esc_html__( 'Content Layout', 'eltdf-core' )
                        ),
					    array(
						    'type'       => 'dropdown',
						    'param_name' => 'enable_excerpt',
						    'heading'    => esc_html__( 'Enable Excerpt', 'eltdf-core' ),
						    'value'      => array_flip(sweettooth_elated_get_yes_no_select_array(false)),
						    'group'      => esc_html__( 'Content Layout', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'textfield',
						    'param_name'  => 'excerpt_length',
						    'heading'     => esc_html__( 'Excerpt Length', 'eltdf-core' ),
						    'description' => esc_html__( 'Number of characters', 'eltdf-core' ),
						    'dependency'  => array( 'element' => 'enable_excerpt', 'value' => array( 'yes' ) ),
						    'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'pagination_type',
						    'heading'     => esc_html__( 'Pagination Type', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'None', 'eltdf-core' )  => 'no-pagination',
							    esc_html__( 'Standard', 'eltdf-core' ) => 'standard',
							    esc_html__( 'Load More', 'eltdf-core' )    => 'load-more',
							    esc_html__( 'Infinite Scroll', 'eltdf-core' )  => 'infinite-scroll'
						    ),
						    'group'       => esc_html__( 'Additional Features', 'eltdf-core' )
					    ),
					    array(
						    'type'       => 'dropdown',
						    'param_name' => 'filter',
						    'heading'    => esc_html__( 'Enable Category Filter', 'eltdf-core' ),
						    'value'      => array_flip(sweettooth_elated_get_yes_no_select_array(false)),
						    'group'      => esc_html__( 'Additional Features', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'filter_order_by',
						    'heading'     => esc_html__( 'Filter Order By', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'Name', 'eltdf-core' )  => 'name',
							    esc_html__( 'Count', 'eltdf-core' ) => 'count',
							    esc_html__( 'Id', 'eltdf-core' )    => 'id',
							    esc_html__( 'Slug', 'eltdf-core' )  => 'slug'
						    ),
						    'dependency'  => array( 'element' => 'filter', 'value' => array( 'yes' ) ),
						    'group'       => esc_html__( 'Additional Features', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'filter_text_transform',
						    'heading'     => esc_html__( 'Filter Text Transform', 'eltdf-core' ),
						    'value'       => array_flip(sweettooth_elated_get_text_transform_array(true)),
						    'dependency'  => array( 'element' => 'filter', 'value' => array( 'yes' ) ),
						    'group'       => esc_html__( 'Additional Features', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'enable_article_animation',
						    'heading'     => esc_html__( 'Enable Article Animation', 'eltdf-core' ),
						    'value'       => array_flip(sweettooth_elated_get_yes_no_select_array(false)),
						    'description' => esc_html__( 'Enabling this option you will enable appears animation for your portfolio list items', 'eltdf-core' ),
						    'group'       => esc_html__( 'Additional Features', 'eltdf-core' )
					    )
				    )
			    )
		    );
	    }
    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $args = array(
            'type'                      => 'gallery',
            'item_type'                 => '',
	        'number_of_columns'         => '3',
            'space_between_items'       => 'normal',
	        'number_of_items'           => '-1',
            'image_proportions'         => 'full',
	        'enable_fixed_proportions'  => 'no',
            'category'                  => '',
            'selected_projects'         => '',
	        'tag'                       => '',
            'order_by'                  => 'date',
            'order'                     => 'ASC',
	        'target'                    => '_self',
	        'item_style'                => 'standard-shader',
	        'hover_skin'                => '',
	        'enable_title'              => 'yes',
            'title_tag'                 => 'p',
	        'title_text_transform'      => '',
            'enable_category'           => 'yes',
            'enable_count_images'       => 'yes',
            'enable_excerpt'            => 'no',
            'excerpt_length'            => '20',
            'pagination_type'           => 'no-pagination',
            'filter'                    => 'no',
            'filter_order_by'           => 'name',
	        'filter_text_transform'     => '',
            'enable_article_animation'  => 'no',
	        'portfolio_slider_on'       => 'no',
            'enable_loop'               => 'yes',
            'enable_autoplay'		    => 'yes',
            'slider_speed'              => '5000',
            'slider_speed_animation'    => '600',
            'enable_navigation'         => 'yes',
            'navigation_skin'           => '',
            'enable_pagination'         => 'yes',
            'pagination_skin'           => '',
	        'pagination_position'       => ''
        );
		$params = shortcode_atts($args, $atts);
	
	    /***
	     * @params query_results
	     * @params holder_data
	     * @params holder_classes
	     * @params holder_inner_classes
	     */
		$additional_params = array();
	    
		$query_array = $this->getQueryArray($params);
		$query_results = new \WP_Query($query_array);
	    $additional_params['query_results'] = $query_results;
	
	    $additional_params['holder_data'] = $this->getHolderData($params, $additional_params);
	    $additional_params['holder_classes'] = $this->getHolderClasses($params);
	    $additional_params['holder_inner_classes'] = $this->getHolderInnerClasses($params);
	    
	    $params['this_object'] = $this;
	    
	    $html = eltdf_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-holder', $params['type'], $params, $additional_params);

        return $html;
	}

	/**
    * Generates portfolio list query attribute array
    *
    * @param $params
    *
    * @return array
    */
	public function getQueryArray($params){
		$query_array = array(
			'post_status'    => 'publish',
			'post_type'      => 'portfolio-item',
			'posts_per_page' => $params['number_of_items'],
			'orderby'        => $params['order_by'],
			'order'          => $params['order']
		);

		if(!empty($params['category'])){
			$query_array['portfolio-category'] = $params['category'];
		}

		$project_ids = null;
		if (!empty($params['selected_projects'])) {
			$project_ids = explode(',', $params['selected_projects']);
			$query_array['post__in'] = $project_ids;
		}

		if(!empty($params['tag'])){
			$query_array['portfolio-tag'] = $params['tag'];
		}

		if(!empty($params['next_page'])){
			$query_array['paged'] = $params['next_page'];
		} else {
			$query_array['paged'] = 1;
		}

		return $query_array;
	}
	
	/**
	 * Generates data attributes array
	 *
	 * @param $params
	 * @param $additional_params
	 *
	 * @return string
	 */
	public function getHolderData($params, $additional_params){
		$dataString = '';
		
		if(get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif(get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
		
		$query_results = $additional_params['query_results'];
		$params['max_num_pages'] = $query_results->max_num_pages;
		
		if(!empty($paged)) {
			$params['next_page'] = $paged+1;
		}
		
		foreach ($params as $key => $value) {
			if($value !== '') {
				$new_key = str_replace( '_', '-', $key );
				
				$dataString .= ' data-'.$new_key.'='.esc_attr($value);
			}
		}
		
		return $dataString;
	}

	/**
    * Generates portfolio holder classes
    *
    * @param $params
    *
    * @return string
    */
	public function getHolderClasses($params){
		$classes = array();
		
		$classes[] = !empty($params['type']) ? 'eltdf-pl-'.$params['type'] : 'eltdf-pl-gallery';
		$classes[] = !empty($params['space_between_items']) ? 'eltdf-pl-'.$params['space_between_items'].'-space' : 'eltdf-pl-normal-space';
		
		$number_of_columns   = $params['number_of_columns'];
		switch ( $number_of_columns ):
			case '1':
				$classes[] = 'eltdf-pl-one-column';
				break;
			case '2':
				$classes[] = 'eltdf-pl-two-columns';
				break;
			case '3':
				$classes[] = 'eltdf-pl-three-columns';
				break;
			case '4':
				$classes[] = 'eltdf-pl-four-columns';
				break;
			case '5':
				$classes[] = 'eltdf-pl-five-columns';
				break;
			default:
				$classes[] = 'eltdf-pl-three-columns';
				break;
		endswitch;

		if(!empty($params['item_style'])){
			$classes[] = 'eltdf-pl-'.$params['item_style'];
		}

		if(!empty($params['hover_skin'])){
			$classes[] = 'eltdf-pl-'.$params['hover_skin'];
		}
		
		if($params['enable_fixed_proportions'] === 'yes') {
			$classes[] = 'eltdf-pl-images-fixed';
		}
		
		if($params['enable_title'] === 'no' && $params['enable_category'] === 'no' && $params['enable_excerpt'] === 'no') {
			$classes[] = 'eltdf-pl-no-content';
		}
		
		if(!empty($params['pagination_type'])){
			$classes[] = 'eltdf-pl-pag-'.$params['pagination_type'];
		}
		
		if($params['filter'] === 'yes'){
			$classes[] = 'eltdf-pl-has-filter';
		}
		
		if($params['enable_article_animation'] === 'yes'){
			$classes[] = 'eltdf-pl-has-animation';
		}
		
		if(!empty($params['navigation_skin'])) {
			$classes[] = 'eltdf-nav-'.$params['navigation_skin'].'-skin';
		}
		
		if(!empty($params['pagination_skin'])) {
			$classes[] = 'eltdf-pag-'.$params['pagination_skin'].'-skin';
		}
		
		if(!empty($params['pagination_position'])) {
			$classes[] = 'eltdf-pag-'.$params['pagination_position'];
		}

		return implode(' ', $classes);
	}
	
	/**
	 * Generates portfolio holder inner classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getHolderInnerClasses($params){
		$classes = array();
		
		$classes[] = $params['portfolio_slider_on'] === 'yes' ? 'eltdf-owl-slider eltdf-pl-is-slider' : '';
		
		return implode(' ', $classes);
	}

	/**
	 * Generates portfolio article classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getArticleClasses($params){
		$classes = array();
		
		$type        = $params['type'];
		$item_style = $params['item_style'];

		if(get_post_meta(get_the_ID(), "eltdf_portfolio_featured_image_meta", true) !== ""  && $item_style === 'standard-switch-images'){
			$classes[] = 'eltdf-pl-has-switch-image';
		} elseif (get_post_meta(get_the_ID(), "eltdf_portfolio_featured_image_meta", true) === ""  && $item_style === 'standard-switch-images') {
			$classes[] = 'eltdf-pl-no-switch-image';
		}

		$image_proportion = $params['enable_fixed_proportions'] === 'yes' ? 'fixed' : 'original';
        $masonry_size = get_post_meta(get_the_ID(), 'eltdf_portfolio_masonry_'.$image_proportion.'_dimensions_meta', true);

		$classes[] = !empty($masonry_size) && $type === 'masonry' ? 'eltdf-pl-masonry-'.esc_attr($masonry_size) : '';
		
		$article_classes = get_post_class($classes);

		return implode(' ', $article_classes);
	}

	/**
    * Generates portfolio image size
    *
    * @param $params
    *
    * @return string
    */
	public function getImageSize($params){
		$thumb_size = 'full';

		if (!empty($params['image_proportions']) && $params['type'] == 'gallery') {
			$image_size = $params['image_proportions'];

			switch ($image_size) {
				case 'landscape':
					$thumb_size = 'sweettooth_image_landscape';
					break;
				case 'portrait':
					$thumb_size = 'sweettooth_image_portrait';
					break;
				case 'square':
					$thumb_size = 'sweettooth_image_square';
					break;
				case 'medium':
					$thumb_size = 'medium';
					break;
				case 'large':
					$thumb_size = 'large';
					break;
				case 'full':
					$thumb_size = 'full';
					break;
			}
		}
		
		if($params['type'] == 'masonry' && $params['enable_fixed_proportions'] === 'yes') {
			$fixed_image_size = get_post_meta(get_the_ID(), 'eltdf_portfolio_masonry_fixed_dimensions_meta', true);

			switch ($fixed_image_size) {
				case 'default' :
					$thumb_size = 'sweettooth_image_square';
					break;
				case 'large-width':
					$thumb_size = 'sweettooth_image_landscape';
					break;
				case 'large-height':
					$thumb_size = 'sweettooth_image_portrait';
					break;
				case 'large-width-height':
					$thumb_size = 'sweettooth_image_huge';
					break;
				default :
					$thumb_size = 'full';
					break;
			}
		}

		return $thumb_size;
	}

	/**
	 * Returns array of title element styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getTitleStyles($params) {
		$styles = array();
		
		if(!empty($params['title_text_transform'])) {
			$styles[] = 'text-transform: '.$params['title_text_transform'];
		}
		
		return implode(';', $styles);
	}

	/**
	 * Get portfolio featured image for switch featured images hover style
	 *
	 * @return string
	 */
	public function getSwitchFeaturedImage(){
		$featured_image_meta = get_post_meta(get_the_ID(), 'eltdf_portfolio_featured_image_meta', true);
		
		$featured_image = !empty($featured_image_meta) ? esc_url($featured_image_meta) : '';

		return $featured_image;
	}

	/**
    * Generates filter categories array
    *
    * @param $params
    *
	* @return array
    */
	public function getFilterCategories($params){
		$cat_id = 0;

		if(!empty($params['category'])){
			$top_category = get_term_by('slug', $params['category'], 'portfolio-category');

			if(isset($top_category->term_id)){
				$cat_id = $top_category->term_id;
			}
		}

        $order = $params['filter_order_by'] === 'count' ? 'DESC' : 'ASC';

		$args = array(
			'taxonomy' => 'portfolio-category',
			'child_of' => $cat_id,
			'orderby' => $params['filter_order_by'],
			'order'  => $order
		);

		$filter_categories = get_terms($args);

		return $filter_categories;
	}
	
	/**
	 * Returns array of filter element items styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getFilterStyles($params) {
		$styles = array();
		
		if(!empty($params['filter_text_transform'])) {
			$styles[] = 'text-transform: '.$params['filter_text_transform'];
		}
		
		return implode(';', $styles);
	}
	
	/**
	 * Returns link url for items
	 *
	 * @return string
	 */
    public function getItemLink(){
	    $portfolio_link_meta = get_post_meta(get_the_ID(), 'portfolio_external_link', true);
	
	    $portfolio_link = !empty($portfolio_link_meta) ? $portfolio_link_meta : get_permalink(get_the_ID());

        return $portfolio_link;
    }
	
	/**
	 * Returns link target for items
	 *
	 * @return string
	 */
	public function getItemLinkTarget(){
		$portfolio_link_meta = get_post_meta(get_the_ID(), 'portfolio_external_link', true);
		
		$portfolio_link_target = !empty($portfolio_link_meta) ? '_blank' : '_self';
		
		return $portfolio_link_target;
	}

	/**
	 * Filter portfolio categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos       = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio-category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_category_title'] ) > 0 ) ? esc_html__( 'Category', 'eltdf-core' ) . ': ' . $value['portfolio_category_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;
	}

	/**
	 * Find portfolio category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$portfolio_category = get_term_by( 'slug', $query, 'portfolio-category' );
			if ( is_object( $portfolio_category ) ) {

				$portfolio_category_slug = $portfolio_category->slug;
				$portfolio_category_title = $portfolio_category->name;

				$portfolio_category_title_display = '';
				if ( ! empty( $portfolio_category_title ) ) {
					$portfolio_category_title_display = esc_html__( 'Category', 'eltdf-core' ) . ': ' . $portfolio_category_title;
				}

				$data          = array();
				$data['value'] = $portfolio_category_slug;
				$data['label'] = $portfolio_category_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

	/**
	 * Filter portfolios by ID or Title
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioIdAutocompleteSuggester( $query ) {
		global $wpdb;
		$portfolio_id = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts} 
					WHERE post_type = 'portfolio-item' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $portfolio_id > 0 ? $portfolio_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_html__( 'Id', 'eltdf-core' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'Title', 'eltdf-core' ) . ': ' . $value['title'] : '' );
				$results[] = $data;
			}
		}

		return $results;
	}

	/**
	 * Find portfolio by id
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioIdAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio
			$portfolio = get_post( (int) $query );
			if ( ! is_wp_error( $portfolio ) ) {

				$portfolio_id = $portfolio->ID;
				$portfolio_title = $portfolio->post_title;

				$portfolio_title_display = '';
				if ( ! empty( $portfolio_title ) ) {
					$portfolio_title_display = ' - ' . esc_html__( 'Title', 'eltdf-core' ) . ': ' . $portfolio_title;
				}

				$portfolio_id_display = esc_html__( 'Id', 'eltdf-core' ) . ': ' . $portfolio_id;

				$data          = array();
				$data['value'] = $portfolio_id;
				$data['label'] = $portfolio_id_display . $portfolio_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

	/**
	 * Filter portfolio tags
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioTagAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_tag_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio-tag' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_tag_title'] ) > 0 ) ? esc_html__( 'Tag', 'eltdf-core' ) . ': ' . $value['portfolio_tag_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;
	}

	/**
	 * Find portfolio tag by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioTagAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$portfolio_tag = get_term_by( 'slug', $query, 'portfolio-tag' );
			if ( is_object( $portfolio_tag ) ) {

				$portfolio_tag_slug = $portfolio_tag->slug;
				$portfolio_tag_title = $portfolio_tag->name;

				$portfolio_tag_title_display = '';
				if ( ! empty( $portfolio_tag_title ) ) {
					$portfolio_tag_title_display = esc_html__( 'Tag', 'eltdf-core' ) . ': ' . $portfolio_tag_title;
				}

				$data          = array();
				$data['value'] = $portfolio_tag_slug;
				$data['label'] = $portfolio_tag_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}
}