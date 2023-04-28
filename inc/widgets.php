<?php

namespace Cradle;

/**
 * Register sidebars
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/
 */
add_action('widgets_init', function () {
	register_sidebar([
		'name'          => __('Primary Sidebar', 'cradle'),
		'id'            => 'primary',
		'description'   => __('Add widgets here.', 'cradle'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	]);
});

/**
 * Remove default widgets and add new ones
 *
 * @link https://developer.wordpress.org/reference/functions/unregister_widget/
 * @link https://developer.wordpress.org/reference/functions/register_widget/
 */
add_action('widgets_init', function () {
	$disabled_widgets = [
		// e.g. 'PLL_Widget_Calendar'
	];
	foreach ($disabled_widgets as $widget) {
		unregister_widget($widget);
	}

	$new_widgets = [
		'Cradle\Widget_Categories',
		'Cradle\Widget_Recent_Posts',
	];
	foreach ($new_widgets as $widget) {
		register_widget($widget);
	}
});
