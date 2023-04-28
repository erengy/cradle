<div class="bg-light p-3">
	<?php
	if ($args['title']) {
		echo $args['before_title'] . $args['title'] . $args['after_title'];
	}
	$query = new WP_Query([
		'posts_per_page'      => 5,
		'no_found_rows'       => true,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true,
	]);
	?>
	<?php if ($query->have_posts()): ?>
		<ul>
			<?php foreach ($query->posts as $_post): ?>
				<li>
					<a href="<?php echo esc_url(get_the_permalink($_post->ID)); ?>">
						<?php echo esc_html(get_the_title($_post->ID)); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>
