<?php

namespace Cradle;

/**
 * Set the excerpt length.
 *
 * @link https://developer.wordpress.org/reference/hooks/excerpt_length/
 */
add_filter('excerpt_length', function ($number) {
	return is_admin() ? $number : EXCERPT_LENGTH;
}, 999);

/**
 * Change the excerpt "more" string.
 *
 * @link https://developer.wordpress.org/reference/hooks/excerpt_more/
 */
add_filter('excerpt_more', function ($more_string) {
	return '&hellip;';
});
