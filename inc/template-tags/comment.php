<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-tags/
 */

namespace Cradle;

/**
 * @link https://developer.wordpress.org/reference/hooks/comments_template/
 */
add_filter('comments_template', function ($theme_template) {
	return get_stylesheet_directory() . '/' . TEMPLATE_DIR . '/' . COMMENTS_TEMPLATE;
});
