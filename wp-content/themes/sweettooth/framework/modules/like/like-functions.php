<?php

if ( ! function_exists('sweettooth_elated_like') ) {
	/**
	 * Returns SweetToothElatedClassLike instance
	 *
	 * @return SweetToothElatedClassLike
	 */
	function sweettooth_elated_like() {
		return SweetToothElatedClassLike::get_instance();
	}
}

function sweettooth_elated_get_like() {

	echo wp_kses(sweettooth_elated_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}