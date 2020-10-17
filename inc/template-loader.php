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
		return array_merge($templates,
				array_map(function ($template) {
						return TEMPLATE_DIR . "/{$template}";
					}, $templates)
			);
	});
}
add_filter('index_template_hierarchy', function () {
	return array(TEMPLATE_DIR . '/index.php');
});

/**
 * Loads our base template and passes the current template as an argument.
 *
 * @link https://developer.wordpress.org/reference/hooks/template_include/
 */
add_filter('template_include', function ($template) {
	$base = get_stylesheet_directory() . '/' . TEMPLATE_DIR . '/' . BASE_TEMPLATE;
	load_template($base, true, array('template' => $template));
	return null;
});

/**
 * Locates a template part in our template directory.
 *
 * Default $name is `''` instead of `null`.
 *
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 */
function get_template_part($slug, $name = '', $args = array()) {
	do_action("get_template_part_{$slug}", $slug, $name, $args);

	$templates = array();
	if ($name !== '') {
		$templates[] = TEMPLATE_DIR . "/{$slug}-{$name}.php";
	}
	$templates[] = TEMPLATE_DIR . "/{$slug}.php";

	do_action('get_template_part', $slug, $name, $templates, $args);

	if (!locate_template($templates, true, false, $args)) {
		return false;
	}
}
