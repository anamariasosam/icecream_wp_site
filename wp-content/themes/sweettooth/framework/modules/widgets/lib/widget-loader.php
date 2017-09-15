<?php

if (!function_exists('sweettooth_elated_register_widgets')) {
	function sweettooth_elated_register_widgets() {
		$widgets = array(
			'SweetToothElatedClassAuthorInfoWidget',
			'SweetToothElatedClassBlogListWidget',
			'SweetToothElatedClassButtonWidget',
			'SweetToothElatedClassCustomFontWidget',
			'SweetToothElatedClassIconWidget',
			'SweetToothElatedClassImageWidget',
			'SweetToothElatedClassImageSliderWidget',
			'SweetToothElatedClassRawHTMLWidget',
			'SweetToothElatedClassSearchOpener',
			'SweetToothElatedClassSeparatorWidget',         
			'SweetToothElatedClassSideAreaOpener',
			'SweetToothElatedClassSocialIconWidget'
		);

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
	
	add_action('widgets_init', 'sweettooth_elated_register_widgets');
}