<?php
/**
 * @link https://developer.wordpress.org/themes/functionality/widgets/
 */

namespace Cradle;

class Widget_Categories extends Widget {
	public function __construct() {
		$widget_options = [
			'classname'   => 'widget-categories',
			'description' => __('A list of categories.', 'cradle'),
		];

		$options = [
			[
				'name'          => 'title',
				'type'          => 'text',
				'description'   => __('Title:', 'cradle'),
				'default_value' => '',
			],
			[
				'name'          => 'hide_empty',
				'type'          => 'checkbox',
				'description'   => __('Hide empty', 'cradle'),
				'default_value' => false,
			],
		];

		parent::__construct(
			'cradle' . '-categories',
			__('Categories', 'cradle'),
			$widget_options,
			$options,
			'categories'
		);
	}
}
