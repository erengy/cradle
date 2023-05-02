<?php

namespace Cradle;

function get_upload_dir($file) {
	$file = ltrim($file, '/');
	return wp_get_upload_dir()['basedir'] . '/' . $file;
}

function get_upload_url($file) {
	$file = ltrim($file, '/');
	return wp_get_upload_dir()['baseurl'] . '/' . $file;
}
