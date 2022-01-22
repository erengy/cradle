<?php

namespace Cradle;

/**
 * Add custom styles
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_head/
 */
add_action('admin_head', function () {
	enqueue_style(
			'admin',
			get_asset_url('/css/admin.css'),
			array(),
			last_modified('/assets/css/admin.css')
		);
});

/**
 * Remove help tabs
 */
add_action('admin_head', function () {
	get_current_screen()->remove_help_tabs();
});

/**
 * Remove the footer text from admin area
 */
add_filter('admin_footer_text', '__return_empty_string');
add_filter('update_footer', '__return_empty_string', 11);

/**
 * Remove "WordPress" from page title
 */
add_filter('admin_title', function ($admin_title, $title) {
	$admin_title = str_replace(' &#8212; WordPress', '', $admin_title);
	$admin_title = str_replace(' &lsaquo; ', ' &#8211; ', $admin_title);
	return $admin_title;
}, 10, 2);

/**
 * Remove theme-related capabilities
 *
 * @link https://developer.wordpress.org/reference/hooks/user_has_cap/
 * @link https://wordpress.org/support/article/roles-and-capabilities/
 */
add_filter('user_has_cap', function ($allcaps, $caps, $args, $user) {
	$caps_to_remove = array(
			'delete_themes',
			'edit_themes',
			'install_themes',
			'switch_themes',
			'update_themes',
		);
	return array_diff_key($allcaps, array_flip($caps_to_remove));
}, 10, 4);

/**
 * Disable automatic updates for plugins and themes
 *
 * @link https://developer.wordpress.org/reference/functions/wp_is_auto_update_enabled_for_type/
 */
add_filter('plugins_auto_update_enabled', '__return_false');
add_filter('themes_auto_update_enabled', '__return_false');

/**
 * Remove "Have a default theme available" recommendation from Site Health page
 *
 * @link https://developer.wordpress.org/reference/hooks/site_status_tests/
 */
add_filter('site_status_tests', function ($test_type) {
	unset($test_type['direct']['theme_version']);
	return $test_type;
});
