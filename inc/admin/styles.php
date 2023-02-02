<?php

namespace Cradle;

/**
 * Add custom styles
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_head/
 */
add_action('admin_head', function () {
	wp_enqueue_style(
			'admin',
			get_asset_url('/css/admin.css'),
			[],
			last_modified('/assets/css/admin.css')
		);
});

/**
 * @link https://developer.wordpress.org/reference/hooks/login_enqueue_scripts/
 */
add_action('login_enqueue_scripts', function () {
	wp_enqueue_style(
			'custom-login',
			get_asset_url('/css/login.css'),
			[],
			last_modified('/assets/css/login.css')
		);
});
