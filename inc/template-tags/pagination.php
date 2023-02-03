<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-tags/
 */

namespace Cradle;

function the_posts_pagination() {
	\the_posts_pagination([
		'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
		'next_text' => '<i class="fa-solid fa-angle-right"></i>',
		'type'      => 'list',
	]);
}

/**
 * @link https://developer.wordpress.org/reference/functions/paginate_links/
 */
add_filter('navigation_markup_template', function($template, $class) {
	$template = '
	<nav aria-label="%4$s">
		%3$s
	</nav>';
	return $template;
}, 10, 2);

/**
 * @link https://developer.wordpress.org/reference/functions/paginate_links/
 */
add_filter('paginate_links_output', function($r, $args) {
	$r = str_replace("ul class='page-numbers'", 'ul class="pagination justify-content-center"', $r);
	$r = str_replace('<li>', '<li class="page-item">', $r);
	$r = str_replace('<li class="page-item"><span aria-current="page"', '<li class="page-item active"><span aria-current="page"', $r);
	$r = str_replace('page-numbers', 'page-link', $r);
	return $r;
}, 10, 2);
