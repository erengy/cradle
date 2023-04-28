<?php

namespace Cradle;

/**
 * @link https://developer.wordpress.org/reference/classes/walker_nav_menu/
 */
class Walker_Nav_Menu extends \Walker_Nav_Menu {
	protected function has_children($item) {
		return isset($item->classes) && in_array('menu-item-has-children', $item->classes);
	}

	protected function is_active($item, $classes = []) {
		return (isset($item->current) && $item->current) ||
				(isset($item->current_item_ancestor) && $item->current_item_ancestor) ||
				(is_array($classes) && in_array('current_page_parent', $classes)) ||
				apply_filters('cradle' . '_is_menu_item_active', false, $item);
	}

	protected function get_attributes($item) {
		$attributes = [];

		if (!empty($item->attr_title)) {
			$attributes['title'] = esc_attr($item->attr_title);
		}
		if (!empty($item->target)) {
			$attributes['target'] = esc_attr($item->target);
		}
		if (!empty($item->xfn)) {
			$attributes['rel'] = esc_attr($item->xfn);
		} elseif ($item->target === '_blank') {
			$attributes['rel'] = 'noopener';
		}
		if (!empty($item->url)) {
			$attributes['href'] = esc_url($item->url);
		}
		if ($item->current) {
			$attributes['aria-current'] = 'page';
		}

		return apply_filters('nav_menu_link_attributes', $attributes, $item, null, 0);
	}

	protected function get_indent($depth, $args) {
		if (isset($args->item_spacing) && $args->item_spacing === 'discard') {
			return '';
		} else {
			return str_repeat("\t", $depth);
		}
	}
}
