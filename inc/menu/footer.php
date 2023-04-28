<?php
/**
 * @link https://developer.wordpress.org/reference/classes/walker_nav_menu/
 */

namespace Cradle;

class Walker_Nav_Menu_Footer extends Walker_Nav_Menu {
	private $parent_items = [];

	function start_lvl(&$output, $depth = 0, $args = null) {
		$output .= "\n";
		$output .= $this->get_indent($depth, $args);

		if (!empty($this->parent_items)) {
			$item = $this->parent_items[count($this->parent_items) - 1];
			$output .= '<ul id="collapse-' . esc_attr($item->post_name) . '" class="collapse">';
		} else {
			$output .= '<ul>';
		}

		$output .= "\n";
	}

	function end_lvl(&$output, $depth = 0, $args = null) {
		if (!empty($this->parent_items)) {
			array_pop($this->parent_items);
		}

		$output .= $this->get_indent($depth, $args);
		$output .= "</ul>\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		if ($item->post_type !== 'nav_menu_item') {
			return;
		}

		$args = apply_filters('nav_menu_item_args', $args, $item, $depth);
		$attributes = $this->get_attributes($item);
		$has_children = $this->has_children($item);

		if ($has_children) {
			$this->parent_items[] = $item;

			$attributes = array_merge($attributes, [
				'class'         => 'collapsed',
				'data-toggle'   => 'collapse',
				'data-target'   => "#collapse-{$item->post_name}",
				'aria-expanded' => 'false',
				'aria-controls' => "collapse-{$item->post_name}",
			]);
		}

		$attributes = build_html_attributes($attributes);

		$title = apply_filters('the_title', $item->title, $item->ID);
		$title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

		$item_output  = $this->get_indent($depth, $args);
		$item_output .= '<li class="' . ($has_children ? 'accordion' : '') . 'py-1">';
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
