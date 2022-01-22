<?php

namespace Cradle;

/**
 * Remove some menu items
 */
add_action('wp_before_admin_bar_render', function () {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
});

add_action('admin_bar_menu', function ($wp_admin_bar) {
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('new-media');
	$wp_admin_bar->remove_node('new-user');

	$wp_admin_bar->add_node(
			array(
					'id'    => 'my-account',
					'title' => wp_get_current_user()->display_name,
				)
		);
}, 999);

add_action('admin_menu', function () {
	remove_menu_page('edit-comments.php');
	if (!current_user_can('manage_options')) {
		remove_menu_page('tools.php');
	}

	remove_submenu_page('edit.php?post_type=form_submission', 'post-new.php?post_type=form_submission');
	remove_submenu_page('themes.php', 'customize.php?return=' . urlencode($_SERVER['REQUEST_URI']));
	remove_submenu_page('tools.php', 'tools.php');
	remove_submenu_page('tools.php', 'import.php');
	remove_submenu_page('tools.php', 'export.php');
	remove_submenu_page('tools.php', 'export-personal-data.php');
	remove_submenu_page('tools.php', 'erase-personal-data.php');
});
