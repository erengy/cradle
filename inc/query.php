<?php

namespace Cradle;

/**
 * @link https://developer.wordpress.org/reference/hooks/pre_get_posts/
 */
add_action('pre_get_posts', function ($query) {
	if (is_admin() || !$query->is_main_query()) {
		return;
	}

	if ($query->is_search()) {
		$excluded = array();

		// Remove front page from search results
		if ($front_page_id = get_option('page_on_front')) {
			$excluded = array_merge($excluded, array($front_page_id));
		}

		if (!empty($excluded)) {
			$query->set('post__not_in', $excluded);
		}
	}
});
