<?php

namespace Cradle;

function array_find_first($array, $callback) {
	foreach ($array as $item) {
		if ($callback($item)) {
			return $item;
		}
	}
	return false;
}

function build_html_attributes($atts) {
	$html = [];

	foreach ($atts as $key => $value) {
		if (is_null($value)) {
			continue;
		}

		if (is_array($value)) {
			$value = implode(' ', $value);
		}

		$value = esc_attr($value);

		$html[] = "{$key}=\"{$value}\"";
	}

	return implode(' ', $html);
}

function last_modified($filename) {
	$filename = get_template_directory() . $filename;
	$time = WP_DEBUG ? filemtime($filename) : @filemtime($filename);
	return $time ? $time : null;
}
