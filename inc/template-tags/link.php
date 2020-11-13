<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-tags/
 */

namespace Cradle;

function get_asset_url($file) {
	return get_template_directory_uri() . '/assets' . $file;
}

function get_post_thumbnail_url($size = 'thumbnail', $post = null) {
	$thumbnail_id = get_post_thumbnail_id($post);
	if ($thumbnail_id) {
		$image = wp_get_attachment_image_src($thumbnail_id, $size, false);
		if ($image) {
			return $image[0];
		}
	}
	return get_template_directory_uri() . '/assets/img/placeholder.png';
}
