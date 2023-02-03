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

function last_modified($filename) {
	$filename = get_template_directory() . $filename;
	$time = WP_DEBUG ? filemtime($filename) : @filemtime($filename);
	return $time ? $time : null;
}
