<?php
/**
 * @link https://developer.wordpress.org/reference/classes/walker_nav_menu/
 */

namespace Cradle;

class Walker_Nav_Menu_Mobile extends Walker_Nav_Menu {
	private $parent_items = [];

	function start_lvl(&$output, $depth = 0, $args = null) {
		$output .= "\n";
		$output .= $this->get_indent($depth, $args);

		if (!empty($this->parent_items)) {
			$item = $this->parent_items[count($this->parent_items) - 1];
			$output .= '<ul id="collapse-' . esc_attr($item->post_name) . '" class="list-unstyled collapse">';
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
		$has_parent = !empty($this->parent_items);

		if ($has_children) {
			$this->parent_items[] = $item;
		}

		if ($has_parent) {
			$attributes = array_merge($attributes, [
				'class' => 'link-secondary d-block fw-bold flex-grow-1 my-2',
			]);
		} else {
			$attributes = array_merge($attributes, [
				'class' => 'link-body ff-secondary flex-grow-1',
			]);
		}

		$attributes = build_html_attributes($attributes);

		$title = apply_filters('the_title', $item->title, $item->ID);
		$title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

		$item_output  = $this->get_indent($depth, $args);
		if ($has_parent) {
		$item_output .= '<li>';
		} else {
			$item_output .= '<li class="list-group-item px-0">';
			$item_output .= '<div class="d-flex align-items-center justify-content-between">';
		}
		$item_output .= $args->before;
		$item_output .= '<a ' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		if ($has_children) {
			$attributes = build_html_attributes([
				'class'          => 'collapsed link-secondary px-2',
				'href'           => "#collapse-{$item->post_name}",
				'data-bs-toggle' => 'collapse',
				'aria-expanded'  => 'false',
				'aria-controls'  => "collapse-{$item->post_name}",
			]);
			$item_output .= '<a ' . $attributes . '><i class="fa fa-chevron-down"></i></a>';
		}
		if (!$has_parent) {
			$item_output .= '</div>';
		}
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	function end_el(&$output, $item, $depth = 0, $args = null) {
		$output .= "</li>\n";
	}
}
