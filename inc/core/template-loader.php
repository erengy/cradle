<?php
/**
 * @link https://github.com/WordPress/WordPress/blob/master/wp-includes/template-loader.php
 */

namespace Cradle;

/**
 * Modifies the template hierarchy so that WordPress searches our template
 * directory too.
 *
 * @link https://developer.wordpress.org/reference/hooks/type_template_hierarchy/
 * @link https://developer.wordpress.org/reference/functions/get_query_template/
 *
 * Can be simplified once `locate_template` function becomes filterable.
 *
 * @link https://developer.wordpress.org/reference/functions/locate_template/
 * @link https://core.trac.wordpress.org/ticket/13239
 * @link https://core.trac.wordpress.org/ticket/22355
 */
const QUERY_TYPES = array(
		'404',
		'archive',
		'attachment',
		'author',
		'category',
		'date',
		'embed',
		'frontpage',
		'home',
		'index',
		'page',
		'privacypolicy',
		'search',
		'single',
		'singular',
		'tag',
		'taxonomy',
	);
foreach (QUERY_TYPES as $type) {
	add_filter("{$type}_template_hierarchy", function ($templates) {
		$new_templates = array_map(function ($template) {
				return TEMPLATE_DIR . "/{$template}";
			}, $templates);
		$templates = array_diff($templates, array('index.php'));
		$templates = array_merge($templates, $new_templates);
		return $templates;
	});
}

/**
 * Loads our base template and passes the current template as an argument.
 *
 * @link https://developer.wordpress.org/reference/hooks/template_include/
 */
add_filter('template_include', function ($template) {
	$base_template = get_stylesheet_directory() . '/' . TEMPLATE_DIR . '/' . BASE_TEMPLATE;
	load_template($base_template, true, array('template' => $template));
	return null;
});
