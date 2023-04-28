<?php
/**
 * @link https://developer.wordpress.org/reference/classes/walker_nav_menu/
 */

namespace Cradle;

class Walker_Nav_Menu_Primary extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = null) {}

	function end_lvl(&$output, $depth = 0, $args = null) {}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		if ($item->post_type !== 'nav_menu_item') {
			return;
		}

		$args = apply_filters('nav_menu_item_args', $args, $item, $depth);
		$attributes = $this->get_attributes($item);

		if ($this->is_active($item)) {
			$attributes['class'] = 'nav-link active';
		} else {
			$attributes['class'] = 'nav-link';
		}

		$attributes = build_html_attributes($attributes);

		$title = apply_filters('the_title', $item->title, $item->ID);
		$title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

		$item_output  = $this->get_indent($depth, $args);
		$item_output .= '<li class="nav-item">';
		$item_output .= $args->before;
		$item_output .= '<a ' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	function end_el(&$output, $item, $depth = 0, $args = null) {
		$output .= "</li>\n";
	}
}
