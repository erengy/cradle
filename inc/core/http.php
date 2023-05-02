<?php

namespace Cradle;

/**
 * Build a URL from parse_url/wp_parse_url components
 *
 * @link https://www.php.net/manual/en/function.parse-url.php
 */ 
function build_url($components) {
	$url = '';

	if (isset($components['scheme'])) {
		$url .= "{$components['scheme']}://";
	}
	if (isset($components['user']) && isset($components['pass'])) {
		$url .= "{$components['user']}:{$components['pass']}@";
	} else if (isset($components['user'])) {
		$url .= "{$components['user']}@";
	}
	if (isset($components['host'])) {
		$url .= $components['host'];
	}
	if (isset($components['port'])) {
		$url .= ":{$components['port']}";
	}
	if (isset($components['path'])) {
		$url .= $components['path'];
	}
	if (isset($components['query'])) {
		$url .= "?{$components['query']}";
	}
	if (isset($components['fragment'])) {
		$url .= "#{$components['fragment']}";
	}

	return $url;
}
