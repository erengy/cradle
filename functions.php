<?php
/**
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

namespace Cradle;

$files = glob(get_template_directory() . '/inc/{,*/}*.php', GLOB_BRACE);

foreach ($files as $file) {
	require $file;
}
