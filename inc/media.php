<?php

namespace Cradle;

/**
 * Remove unused image sizes.
 *
 * @link https://developer.wordpress.org/reference/hooks/intermediate_image_sizes/
 */
add_filter('intermediate_image_sizes', function($sizes) {
	return array_diff($sizes, array('medium', 'medium_large'));
});
