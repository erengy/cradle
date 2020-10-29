<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-tags/
 */

namespace Cradle;

/**
 * Locates a template part in our template directory.
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

/**
 * Locates a sidebar template in our template directory.
 *
 * @link https://developer.wordpress.org/reference/functions/get_sidebar/
 */
function get_sidebar($name = '', $args = array()) {
	do_action('get_sidebar', $name, $args);

	$templates = array();
	if ($name !== '') {
		$templates[] = TEMPLATE_DIR . "/partials/sidebar-{$name}.php";
	}
	$templates[] = TEMPLATE_DIR . '/partials/sidebar.php';

	if (!locate_template($templates, true, true, $args)) {
		return false;
	}
}
