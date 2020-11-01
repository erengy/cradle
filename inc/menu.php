<?php
/**
 * @link https://developer.wordpress.org/reference/classes/walker_nav_menu/
 */

namespace Cradle;

/**
 * Filters the ID applied to a menu item's list item element.
 *
 * @link https://developer.wordpress.org/reference/hooks/nav_menu_item_id/
 */
add_filter('nav_menu_item_id', function ($menu_id, $item, $args, $depth) {
	return null;
}, 10, 4);

/**
 * Filters the CSS classes applied to a menu item's list item element.
 *
 * @link https://developer.wordpress.org/reference/hooks/nav_menu_css_class/
 */
add_filter('nav_menu_css_class', function ($classes, $item, $args, $depth) {
	$has_children = in_array('menu-item-has-children', $classes);
	$current_page_parent = in_array('current_page_parent', $classes);

	$classes = array();
	if ($depth === 0) {
		$classes[] = 'nav-item';
		if ($item->current || $item->current_item_ancestor || $current_page_parent) {
			$classes[] = 'active';
		}
		if ($has_children) {
			$classes[] = 'dropdown';
		}
	}
	$classes[] = 'menu-item';
	$classes[] = 'menu-' . sanitize_title($item->title, $item->post_name);

	return $classes;
}, 10, 4);

/**
 * Filters the HTML attributes applied to a menu item's anchor element.
 *
 * @link https://developer.wordpress.org/reference/hooks/nav_menu_link_attributes/
 */
add_filter('nav_menu_link_attributes', function ($atts, $item, $args, $depth) {
	$classes = empty($item->classes) ? array() : (array) $item->classes;
	$has_children = in_array('menu-item-has-children', $classes);

	if ($depth === 0) {
		if ($has_children) {
			$atts['class'] = 'nav-link dropdown-toggle';
			$atts['role'] = 'button';
			$atts['data-toggle'] = 'dropdown';
			$atts['aria-haspopup'] = 'true';
			$atts['aria-expanded'] = 'false';
		} else {
			$atts['class'] = 'nav-link';
		}
	} else {
		$atts['class'] = 'dropdown-item';
		if ($item->current || $item->current_item_ancestor) {
			$atts['class'] .= ' active';
		}
	}

	return $atts;
}, 10, 4);

/**
 * Filters the CSS classes applied to a menu list element.
 *
 * @link https://developer.wordpress.org/reference/hooks/nav_menu_submenu_css_class/
 */
add_filter('nav_menu_submenu_css_class', function ($classes, $args, $depth) {
	$classes = array('dropdown-menu');
	return $classes;
}, 10, 3);
