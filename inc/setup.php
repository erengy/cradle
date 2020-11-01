<?php

namespace Cradle;

add_action('after_setup_theme', function () {
	/**
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
	 */
	add_theme_support('html5', array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
			'style',
			'script',
		));
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');

	/**
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	register_nav_menus(
			array(
					'primary' => __('Primary Menu', 'cradle'),
				)
		);
});
