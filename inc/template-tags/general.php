<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-tags/
 */

namespace Cradle;

function get_templates_to_search($slug, $name = '') {
	$templates = [];

	if ($name !== '') {
		$templates[] = TEMPLATE_DIR . "/{$slug}-{$name}.php";
	}
	$templates[] = TEMPLATE_DIR . "/{$slug}.php";

	return $templates;
}

/**
 * Locates a template part in our template directory.
 *
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 */
function get_template_part($slug, $name = '', $args = []) {
	do_action("get_template_part_{$slug}", $slug, $name, $args);

	$templates = get_templates_to_search($slug, $name);

	do_action('get_template_part', $slug, $name, $templates, $args);

	if (!locate_template($templates, true, false, $args)) {
		return false;
	}
}

/**
 * Locates a search form template in our template directory.
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 */
function get_search_form($args = []) {
	do_action('pre_get_search_form', $args);

	$args = apply_filters('search_form_args', $args);

	$templates = get_templates_to_search('partials/searchform');

	if (!locate_template($templates, true, true, $args)) {
		return false;
	}
}

/**
 * Locates a sidebar template in our template directory.
 *
 * @link https://developer.wordpress.org/reference/functions/get_sidebar/
 */
function get_sidebar($name = '', $args = []) {
	do_action('get_sidebar', $name, $args);

	$templates = get_templates_to_search('partials/sidebar', $name);

	if (!locate_template($templates, true, true, $args)) {
		return false;
	}
}

/**
 * Locates a widget template in our template directory.
 */
function get_widget($name = '', $args = []) {
	$templates = get_templates_to_search('partials/widget', $name);

	if (!locate_template($templates, true, true, $args)) {
		return false;
	}
}
