<?php

namespace Cradle;

/**
 * @link https://developer.wordpress.org/reference/hooks/login_enqueue_scripts/
 */
add_action('login_enqueue_scripts', function () {
	wp_enqueue_style(
			'custom-login',
			get_asset_url('/css/login.css'),
			array(),
			last_modified('/assets/css/login.css')
		);
});

/**
 * @link https://developer.wordpress.org/reference/hooks/login_headerurl/
 */
add_filter('login_headerurl', function () {
	return home_url();
});

/**
 * @link https://developer.wordpress.org/reference/hooks/login_headertext/
 */
add_filter('login_headertext', function () {
	return get_bloginfo('name');
});
