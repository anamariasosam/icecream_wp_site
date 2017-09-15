<?php
namespace ElatedCore\CPT\Shortcodes\HorizontalTimeline;

use ElatedCore\Lib;

class HorizontalTimelineItem implements Lib\ShortcodeInterface {
    private $base;
	
    public function __construct() {
        $this->base = 'eltdf_horizontal_timeline_item';
        add_action('vc_before_init', array($this, 'vcMap'));
    }
	
    public function getBase() {
        return $this->base;
    }
	
    public function vcMap() {
	    vc_map(
		    array(
			    'name'            => esc_html__( 'Elated Horizontal Timeline Item', 'eltdf-core' ),
			    'base'            => $this->base,
			    'category'        => esc_html__( 'by ELATED', 'eltdf-core' ),
			    'icon'            => 'icon-wpb-horizontal-timeline-item extended-custom-icon',
			    'as_child'        => array( 'only' => 'eltdf_horizontal_timeline' ),
			    'as_parent'       => array( 'except' => 'vc_row, vc_accordion' ),
			    'content_element' => true,
			    'js_view'         => 'VcColumnView',
			    'params'          => array(
				    array(
					    'type'       => 'textfield',
					    'param_name' => 'timeline_label',
					    'heading'    => esc_html__( 'Timeline Label', 'eltdf-core' )
				    ),
				    array(
					    'type'        => 'textfield',
					    'param_name'  => 'timeline_date',
					    'heading'     => esc_html__( 'Timeline Date', 'eltdf-core' ),
					    'description' => esc_html__( 'Enter date in format dd/mm/yyyy.', 'eltdf-core' )
				    ),
				    array(
					    'type'       => 'attach_image',
					    'param_name' => 'content_image',
					    'heading'    => esc_html__( 'Content Image', 'eltdf-core' )
				    )
			    )
		    )
	    );
    }

    /**
     * Renders HTML for product list shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'timeline_label' => '2017',
            'timeline_date' => '23/02/2017',
            'content_image' => ''
        );
        $params = shortcode_atts($default_atts, $atts);
	
	    $params['holder_classes'] = $this->getHolderClasses($params);
	    $params['timeline_label'] = !empty($atts['timeline_label']) ? $atts['timeline_label'] : $default_atts['timeline_label'];
	    $params['timeline_date']  = !empty($atts['timeline_date']) ? $atts['timeline_date'] : $default_atts['timeline_date'];
	    $params['content']        = $content;

        $html = eltdf_core_get_shortcode_module_template_part('templates/horizontal-timeline-item','horizontal-timeline', '', $params);

        return $html;
    }

	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses($params) {
		$holderClasses = array();

		$holderClasses[] = ! empty($params['content_image']) ? 'eltdf-timeline-has-image' : 'eltdf-timeline-no-image';

		return implode( ' ', $holderClasses );
	}
}