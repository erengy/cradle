<?php

namespace Cradle;

/**
 * @link https://developer.wordpress.org/reference/hooks/embed_oembed_html/
 */
add_filter('embed_oembed_html', function ($cache, $url, $attr, $post_ID) {
	if (str_contains($url, 'youtube.com')) {
		$cache = str_replace('iframe ', 'iframe class="aspect-video w-full"', $cache);
		$cache = preg_replace('/width="[^"]+"/', 'width="100%"', $cache);
		$cache = preg_replace('/ height="[^"]+"/', '', $cache);
	}
	return $cache;
}, 10, 4);
