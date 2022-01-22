<?php

namespace Cradle;

/**
 * Remove buttons from TinyMCE editor
 *
 * @link https://developer.wordpress.org/reference/hooks/mce_buttons/
 * @link https://developer.wordpress.org/reference/hooks/mce_buttons_2/
 */
add_filter('mce_buttons', function ($mce_buttons, $editor_id) {
	$removed_buttons = array('wp_more');
	return array_diff($mce_buttons, $removed_buttons);
}, 10, 2);

add_filter('mce_buttons_2', function ($mce_buttons_2, $editor_id) {
	$removed_buttons = array('forecolor');
	return array_diff($mce_buttons_2, $removed_buttons);
}, 10, 2);
