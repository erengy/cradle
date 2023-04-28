<?php
/**
 * @link https://developer.wordpress.org/themes/functionality/widgets/
 */

namespace Cradle;

class Widget_Recent_Posts extends Widget {
	public function __construct() {
		$widget_options = [
			'classname'   => 'widget-recent-posts',
			'description' => __('Your site&#8217;s most recent Posts.', 'cradle'),
		];

		$options = [
			[
				'name'          => 'title',
				'type'          => 'text',
				'description'   => __('Title:', 'cradle'),
				'default_value' => '',
			],
		];

		parent::__construct(
			'cradle' . '-recent-posts',
			__('Recent Posts', 'cradle'),
			$widget_options,
			$options,
			'recent-posts'
		);
	}
}
