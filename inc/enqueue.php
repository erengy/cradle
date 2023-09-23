<?php

namespace Cradle;

add_action('wp_enqueue_scripts', function () {
	if (class_exists('Classic_Editor')) {
		wp_dequeue_style('classic-theme-styles');
		wp_dequeue_style('global-styles');
		wp_dequeue_style('wp-block-library');
		wp_dequeue_style('wp-block-library-theme');
	}
	enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,500,700&display=swap&subset=latin-ext');
	enqueue_style('aos', 'https://cdn.jsdelivr.net/npm/aos@3.0.0-beta.6/dist/aos.css');
	enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
	enqueue_style('photoswipe', 'https://cdn.jsdelivr.net/npm/photoswipe@4.1.3/dist/photoswipe.css');
	enqueue_style('photoswipe-skin', 'https://cdn.jsdelivr.net/npm/photoswipe@4.1.3/dist/default-skin/default-skin.css');
	enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8.4.6/swiper-bundle.min.css');
	enqueue_style('main', get_asset_url('/css/main.css'), [], last_modified('/assets/css/main.css'));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		enqueue_script('comment-reply');
	}
	enqueue_script('fontawesome', 'https://use.fontawesome.com/releases/v6.2.1/js/all.js', [], null, [
		'strategy'  => 'defer',
		'in_footer' => false,
	]);
	enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js');
	enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js', ['popper']);
	enqueue_script('aos', 'https://cdn.jsdelivr.net/npm/aos@3.0.0-beta.6/dist/aos.js');
	enqueue_script('photoswipe', 'https://cdn.jsdelivr.net/npm/photoswipe@4.1.3/dist/photoswipe.min.js');
	enqueue_script('photoswipe-ui', 'https://cdn.jsdelivr.net/npm/photoswipe@4.1.3/dist/photoswipe-ui-default.min.js');
	enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8.4.6/swiper-bundle.min.js');
	enqueue_script('main', get_asset_url('/js/main.js'), [], last_modified('/assets/js/main.js'));
});
