<?php
/**
 * @link https://developer.wordpress.org/themes/functionality/sidebars/
 */

namespace Cradle;

add_action('widgets_init', function () {
	register_sidebar(
			array(
					'name'          => __('Primary Sidebar', 'cradle'),
					'id'            => 'primary',
					'description'   => __('Add widgets here.', 'cradle'),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h1 class="widget-title">',
					'after_title'   => '</h1>',
				)
		);
});
