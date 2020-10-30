<?php

namespace Cradle;

/**
 * Changed default $ver to `null`.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 */
function enqueue_style($handle, $src = '', $deps = array(), $ver = null, $media = 'all') {
	wp_enqueue_style($handle, $src, $deps, $ver, $media);
}

/**
 * Changed default $ver to `null`.
 * Changed default $in_footer to `true`.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
function enqueue_script($handle, $src = '', $deps = array(), $ver = null, $in_footer = true) {
	wp_enqueue_script($handle, $src, $deps, $ver, $in_footer);
}

add_action('wp_enqueue_scripts', function () {
	if (class_exists('Classic_Editor')) {
		wp_dequeue_style('wp-block-library');
		wp_dequeue_style('wp-block-library-theme');
	}
	// enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,500,700&display=swap&subset=latin-ext');
	enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css');
	enqueue_style('main', get_asset_url('/css/main.css'), array(), last_modified('/assets/css/main.css'));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		enqueue_script('comment-reply');
	}
	// enqueue_script('fontawesome', 'https://use.fontawesome.com/releases/v5.15.1/js/all.js', array(), null, false);
	enqueue_script('jquery', 'https://code.jquery.com/jquery-3.5.1.min.js');
	enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js');
	enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js', array('jquery', 'popper'));
	enqueue_script('main', get_asset_url('/js/main.js'), array(), last_modified('/assets/js/main.js'));
});
