<?php

namespace Cradle;

add_action('after_setup_theme', function () {
	/**
	 * @link https://developer.wordpress.org/reference/functions/load_theme_textdomain/
	 */
	load_theme_textdomain('cradle', get_template_directory() . '/languages');

	/**
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
	 */
	add_theme_support('align-wide');
	add_theme_support('disable-custom-colors');
	add_theme_support('disable-custom-font-sizes');
	add_theme_support('disable-custom-gradients');
	add_theme_support('editor-color-palette', [
		[
			'name'  => esc_attr__('Black', 'cradle'),
			'slug'  => 'black',
			'color' => '#000000',
		],
		[
			'name'  => esc_attr__('Dark', 'cradle'),
			'slug'  => 'dark',
			'color' => '#343a40',
		],
		[
			'name'  => esc_attr__('Light', 'cradle'),
			'slug'  => 'light',
			'color' => '#f8f9fa',
		],
		[
			'name'  => esc_attr__('Primary', 'cradle'),
			'slug'  => 'primary',
			'color' => '#007bff',
		],
	]);
	add_theme_support('editor-gradient-presets', []);
	add_theme_support('editor-styles');
	add_theme_support('html5', [
		'comment-list',
		'comment-form',
		'search-form',
		'gallery',
		'caption',
		'style',
		'script',
	]);
	add_theme_support('post-formats', []);
	add_theme_support('post-thumbnails');
	add_theme_support('responsive-embeds');
	add_theme_support('title-tag');

	/**
	 * @link https://developer.wordpress.org/reference/functions/remove_theme_support/
	 */
	remove_theme_support('block-templates');
	remove_theme_support('core-block-patterns');

	/**
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	register_nav_menus([
		'primary'   => __('Primary Menu', 'cradle'),
		'mobile'    => __('Mobile Menu', 'cradle'),
		'footer'    => __('Footer Menu', 'cradle'),
	]);
});
