<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-tags/
 */

namespace Cradle;

function get_first_category($post_id = false) {
	$categories = get_the_category($post_id);
	return !empty($categories) ? $categories[0] : false;
}

function get_page_by_template($template) {
	$args = [
		'post_type'   => 'page',
		'post_status' => 'publish',
		'numberposts' => 1,
		'meta_query'  => [
			[
				'key'   => '_wp_page_template',
				'value' => "templates/page-{$template}.php",
			],
		],
	];
	$pages = get_posts($args);
	return $pages ? $pages[0] : false;
}
