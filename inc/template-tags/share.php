<?php

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
					array(
							'u' => $url,
						),
					'https://www.facebook.com/sharer/sharer.php'
				);

		case 'linkedin':
			return add_query_arg(
					array(
							'title'  => $title,
							'url'    => $url,
							'source' => THEME_OPTIONS['share']['linkedin_source'],
						),
					'https://www.linkedin.com/cws/share'
				);

		case 'twitter':
			return add_query_arg(
					array(
							'text' => $title,
							'url'  => $url,
							'via'  => THEME_OPTIONS['share']['twitter_via'],
						),
					'https://twitter.com/share'
				);
	}

	return $url;
}
