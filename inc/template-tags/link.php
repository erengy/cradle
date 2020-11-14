<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-tags/
 */

namespace Cradle;

function get_asset_url($file) {
	$file = ltrim($file, '/');
	return get_template_directory_uri() . '/assets/' . $file;
}
