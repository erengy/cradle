<?php

namespace Cradle;

/**
 * Remove default REST API endpoints
 * 
 * @link https://developer.wordpress.org/reference/hooks/rest_endpoints/
 */
add_filter('rest_endpoints', function ($endpoints) {
	$allowed_namespaces = [
		API_NAMESPACE,
		'contact-form-7',
		'google-site-kit',
	];

	return array_filter(
			$endpoints,
			function ($value, $key) use ($allowed_namespaces) {
				foreach ($allowed_namespaces as $namespace) {
					if (str_starts_with($key, "/{$namespace}/")) {
						return true;
					}
				}
				return false;
			},
			ARRAY_FILTER_USE_BOTH
		);
});
