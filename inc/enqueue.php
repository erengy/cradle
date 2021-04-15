<?php

namespace Cradle;

add_action('wp_enqueue_scripts', function () {
	if (class_exists('Classic_Editor')) {
		wp_dequeue_style('wp-block-library');
		wp_dequeue_style('wp-block-library-theme');
	}
	// enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,500,700&display=swap&subset=latin-ext');
	enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css');
	enqueue_style('main', get_asset_url('/css/main.css'), array(), last_modified('/assets/css/main.css'));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		enqueue_script('comment-reply');
	}
	// enqueue_script('fontawesome', 'https://use.fontawesome.com/releases/v5.15.2/js/all.js', array(), null, false);
	enqueue_script('jquery', 'https://code.jquery.com/jquery-3.5.1.min.js');
	enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js');
	enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', array('jquery', 'popper'));
	enqueue_script('main', get_asset_url('/js/main.js'), array(), last_modified('/assets/js/main.js'));
});
