<?php

namespace Cradle;

function last_modified($filename) {
	$filename = get_template_directory() . $filename;
	$time = WP_DEBUG ? filemtime($filename) : @filemtime($filename);
	return $time ? $time : null;
}
