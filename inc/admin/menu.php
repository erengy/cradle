<?php

namespace Cradle;

/**
 * Remove some menu items
 */

add_action('admin_bar_menu', function ($wp_admin_bar) {
	$wp_admin_bar->remove_node('new-post');
}, 999);

add_action('admin_menu', function () {
	remove_menu_page('edit.php');
});
