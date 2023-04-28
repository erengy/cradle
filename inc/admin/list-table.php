<?php

namespace Cradle;

/**
 * Remove date filter for pages
 *
 * @link https://developer.wordpress.org/reference/hooks/post_row_actions/
 */
add_filter('months_dropdown_results', function ($months, $post_type) {
	switch ($post_type) {
		case 'page':
			return [];
	}
	return $months;
}, 10, 2);

/**
 * Add menu order column for pages
 *
 * @link https://developer.wordpress.org/reference/hooks/manage_post_type_posts_columns/
 * @link https://developer.wordpress.org/reference/hooks/manage_post-post_type_posts_custom_column/
 */
add_filter('manage_page_posts_columns', function ($columns) {
	$columns['menu_order'] = __('Order', 'cradle');
	return $columns;
}, 10);

add_action('manage_page_posts_custom_column', function ($column_key, $post_id) {
	switch ($column_key) {
		case 'menu_order':
			if ($_post = get_post($post_id)) {
				echo $_post->menu_order;
			}
			break;
	}
}, 10, 2);
