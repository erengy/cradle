<?php

namespace Cradle;

add_filter('category_rewrite_rules', '__return_empty_array');
add_filter('date_rewrite_rules', '__return_empty_array');
add_filter('post_format_rewrite_rules', '__return_empty_array');

add_filter('rewrite_rules_array', function ($rules) {
	foreach ($rules as $rule => $rewrite) {
		if (preg_match('~(\?|&)(attachment|cpage|embed|feed|tb)=~', $rewrite)) {
			unset($rules[$rule]);
		}
		if (str_contains($rule, 'wp-sitemap')) {
			unset($rules[$rule]);
		}
	}
	return $rules;
});

add_action('init', function () {
	global $wp_rewrite;
	$wp_rewrite->pagination_base = PAGINATION_BASE;
});
