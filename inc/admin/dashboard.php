<?php

namespace Cradle;

/**
 * Remove some default dashboard widgets
 * 
 * @link https://developer.wordpress.org/apis/handbook/dashboard-widgets/#removing-default-dashboard-widgets
 */
add_action('wp_dashboard_setup', function () {
	remove_action('welcome_panel', 'wp_welcome_panel');             // Welcome
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Draft
	remove_meta_box('dashboard_primary', 'dashboard', 'side');      // WordPress Events and News
});

/**
 * Add custom post types to "At a Glance" dashboard widget
 *
 * @link https://developer.wordpress.org/reference/hooks/dashboard_glance_items/
 */
add_action('dashboard_glance_items', function () {
	$post_types = array(
			// e.g. 'custom_post_type'
		);

	foreach ($post_types as $post_type) {
		$post_type_object = get_post_type_object($post_type);

		if (function_exists('pll_is_translated_post_type') && pll_is_translated_post_type($post_type)) {
			$num_posts = pll_count_posts(pll_default_language(), array('post_type' => $post_type));
		} else {
			$num_posts = wp_count_posts($post_type);
			$num_posts = $num_posts ? $num_posts->publish : 0;
		}

		$text = _n(
				$post_type_object->labels->singular_name,
				$post_type_object->labels->name,
				$num_posts,
				'cradle'
			);
		$text = number_format_i18n($num_posts) . ' ' . $text;

		if ($post_type_object && current_user_can($post_type_object->cap->edit_posts)) {
			printf('<li class="%1$s-count"><a href="edit.php?post_type=%1$s">%2$s</a></li>', $post_type, $text);
		} else {
			printf('<li class="%1$s-count"><span>%2$s</span></li>', $post_type, $text);
		}
	}
});

/**
 * Hide WordPress version from "At a Glance" dashboard widget
 *
 * @link https://developer.wordpress.org/reference/hooks/update_right_now_text/
 */
add_filter('update_right_now_text', function ($content) {
	if (!current_user_can('manage_options')) {
		return '';
	}
	return $content;
});
