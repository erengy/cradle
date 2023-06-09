<?php
/**
 * @link https://developer.wordpress.org/apis/handbook/shortcode/
 */

namespace Cradle;

/**
 * Caption
 *
 * @link https://developer.wordpress.org/reference/hooks/img_caption_shortcode_width/
 */
add_filter('img_caption_shortcode_width', '__return_false');

/**
 * Gallery
 *
 * @link https://developer.wordpress.org/reference/functions/gallery_shortcode/
 */
add_filter('post_gallery', function ($output, $attr, $instance) {
	$post = get_post();

	$atts = shortcode_atts(
			[
				'columns' => 3,
				'ids'     => '',
			],
			$attr,
			'gallery'
		);

	if (!empty($atts['ids'])) {
		$attachments = get_posts([
			'post_type'      => 'attachment',
			'posts_per_page' => -1,
			'post_mime_type' => 'image',
			'post__in'       => explode(',', $atts['ids']),
			'orderby'        => 'post__in',
			'order'          => 'ASC',
		]);
	} else {
		$attachments = get_children([
			'post_parent'    => $post ? $post->ID : 0,
			'posts_per_page' => -1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
		]);
	}

	if (empty($attachments)) {
		return '';
	}

	ob_start();
	?>
	<div
		id="gallery-<?php echo esc_attr($instance); ?>"
		class="gallery gallery-columns-<?php echo esc_attr($atts['columns']); ?> gap-4"
	>
		<?php foreach ($attachments as $attachment): ?>
			<figure class="gallery-item">
				<?php
				list($src, $width, $height) = wp_get_attachment_image_src($attachment->ID, 'full');
				$caption = $attachment->post_excerpt;
				?>
				<a
					class="block lightbox-item mb-1"
					href="<?php echo esc_url($src); ?>"
					data-width="<?php echo esc_attr($width); ?>"
					data-height="<?php echo esc_attr($height); ?>"
					data-caption="<?php echo esc_attr($caption); ?>"
				>
					<?php
					list($src, $width, $height) = wp_get_attachment_image_src($attachment->ID, 'thumbnail');
					$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
					?>
					<img
						loading="lazy"
						src="<?php echo esc_url($src); ?>"
						width="<?php echo esc_attr($width); ?>"
						height="<?php echo esc_attr($height); ?>"
						alt="<?php echo esc_attr($alt); ?>"
					>
				</a>
				<?php if ($caption): ?>		
					<figcaption class="font-bold text-center">
						<?php echo esc_html($caption); ?>
					</figcaption>
				<?php endif; ?>
			</figure>
		<?php endforeach; ?>
	</div>
	<?php
	return ob_get_clean();
}, 10, 3);
