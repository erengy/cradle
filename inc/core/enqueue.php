<?php

namespace Cradle;

/**
 * Changed default $ver to `null`.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 */
function enqueue_style($handle, $src = '', $deps = [], $ver = null, $media = 'all') {
	wp_enqueue_style($handle, $src, $deps, $ver, $media);
}

/**
 * Changed default $ver to `null`.
 * Changed default $in_footer to `true`.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
function enqueue_script($handle, $src = '', $deps = [], $ver = null, $args = []) {
	$args = wp_parse_args($args, [
		'in_footer' => true,
	]);

	wp_enqueue_script($handle, $src, $deps, $ver, $args);
}
