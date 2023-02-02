<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-tags/
 */

namespace Cradle;

function get_share_url($service, $url = '', $title = '') {
	if (empty($url)) {
		$url = get_permalink();
	}
	if (empty($title)) {
		$title = get_the_title();
	}

	switch ($service) {
		case 'facebook':
			return add_query_arg(
					[
						'u' => $url,
					],
					'https://www.facebook.com/sharer/sharer.php'
				);

		case 'linkedin':
			return add_query_arg(
					[
						'title'  => rawurlencode($title),
						'url'    => rawurlencode($url),
						'source' => THEME_OPTIONS['share']['linkedin_source'],
					],
					'https://www.linkedin.com/cws/share'
				);

		case 'telegram':
			return add_query_arg(
					[
						'text' => rawurlencode($title),
						'url'  => rawurlencode($url),
					],
					'https://t.me/share/url'
				);

		case 'twitter':
			return add_query_arg(
					[
						'text' => rawurlencode($title),
						'url'  => rawurlencode($url),
						'via'  => THEME_OPTIONS['share']['twitter_via'],
					],
					'https://twitter.com/share'
				);

		case 'whatsapp':
			return add_query_arg(
					[
						'text' => rawurlencode("{$title} {$url}"),
					],
					'https://wa.me/'
				);
	}

	return $url;
}
