<?php
/**
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

namespace Cradle;

const INCLUDES = array(
		'setup',
	);

$template_directory = get_template_directory();

foreach (INCLUDES as $file) {
	require "{$template_directory}/inc/{$file}.php";
}
