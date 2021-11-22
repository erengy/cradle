<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-tags/
 */

namespace Cradle;

const CUSTOM_POST_TYPES = array(
		// e.g. 'custom_post_type' => 'custom_taxonomy',
	);

const CUSTOM_TAXONOMIES = array(
		// e.g. 'custom_taxonomy' => 'custom_post_type',
	);

function get_breadcrumbs() {
	global $wp_query;

	$breadcrumbs = array();

	// Home
	$breadcrumbs[] = array(
			'url'  => home_url('/'),
			'text' => get_bloginfo('name'),
		);
	if (is_front_page()) {
		return $breadcrumbs;
	}

	// Error
	if (is_404()) {
		$breadcrumbs[] = array(
				'url'  => null,
				'text' => __('Page Not Found', 'cradle'),
			);
		return $breadcrumbs;
	}

	// Search
	if (is_search()) {
		$breadcrumbs[] = array(
				'url'  => null,
				'text' => __('Search Results', 'cradle') . ': ' . get_search_query(),
			);
		return $breadcrumbs;
	}

	// Index
	if (is_home()) {
		$_post = $wp_query->get_queried_object();
		$breadcrumbs[] = array(
				'url'  => get_permalink($_post->ID),
				'text' => $_post->post_title,
			);
	}

	// Archive
	if (is_archive()) {
		if (is_post_type_archive()) {
			$breadcrumbs[] = array(
					'url'  => get_post_type_archive_link(get_post_type()),
					'text' => get_post_type_object(get_query_var('post_type'))->label,
				);

		} else if (is_author()) {
			$author = $wp_query->get_queried_object();
			$breadcrumbs[] = array(
					'url'  => get_author_posts_url($author->ID),
					'text' => $author->display_name,
				);

		} elseif (is_category() || is_tag() || is_tax()) {
			$term = $wp_query->get_queried_object();
			$post_type = array_key_exists($term->taxonomy, CUSTOM_TAXONOMIES)
					? CUSTOM_TAXONOMIES[$term->taxonomy]
					: 'post';
			$breadcrumbs[] = array(
					'url'  => get_post_type_archive_link($post_type),
					'text' => get_post_type_object($post_type)->label,
				);
			if ($term->parent) {
				$term_ancestors = get_ancestors($term->term_id, $term->taxonomy);
				foreach (array_reverse($term_ancestors) as $term_ancestor_id) {
					$breadcrumbs[] = array(
							'url'  => get_term_link($term_ancestor_id),
							'text' => get_term($term_ancestor_id)->name,
						);
				}
			}
			$breadcrumbs[] = array(
					'url'  => get_term_link($term),
					'text' => $term->name,
				);
		}
	}

	// Singular
	if (is_singular()) {
		$post_id = $wp_query->get_queried_object_id();
		$_post = $wp_query->get_queried_object();

		if (is_single()) {
			$post_type = $_post->post_type;
			$breadcrumbs[] = array(
					'url'  => get_post_type_archive_link($post_type),
					'text' => get_post_type_object($post_type)->label,
				);
			$taxonomy = array_key_exists($post_type, CUSTOM_POST_TYPES)
					? CUSTOM_POST_TYPES[$post_type]
					: 'category';
			$term = get_the_terms($post_id, $taxonomy)[0];
			if ($term) {
				$breadcrumbs[] = array(
						'url'  => get_term_link($term),
						'text' => $term->name,
					);
			}

		} else if (is_page()) {
			if ($_post->post_parent) {
				$page_on_front = intval(get_option('page_on_front'));
				foreach (array_reverse(get_post_ancestors($_post)) as $post_ancestor) {
					if ($post_ancestor !== $page_on_front) {
						$breadcrumbs[] = array(
								'url'  => get_permalink($post_ancestor),
								'text' => get_the_title($post_ancestor),
							);
					}
				}
			}
		}

		$breadcrumbs[] = array(
				'url'  => get_permalink($post_id),
				'text' => get_the_title($post_id),
			);
	}

	return $breadcrumbs;
}
