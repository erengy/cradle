<?php
if (post_password_required()) {
	return;
}
?>

<div id="comments">
	<?php if (have_comments()): ?>
		<h3>
			<?php
			printf(
					/* translators: 1: Number of comments, 2: Post title. */
					_n('%1$s response to %2$s', '%1$s responses to %2$s', get_comments_number(), 'cradle'),
					number_format_i18n(get_comments_number()),
					'&#8220;' . get_the_title() . '&#8221;'
				);
			?>
		</h3>

		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link(); ?></div>
			<div class="alignright"><?php next_comments_link(); ?></div>
		</div>

		<ol class="commentlist">
		<?php wp_list_comments(); ?>
		</ol>

		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link(); ?></div>
			<div class="alignright"><?php next_comments_link(); ?></div>
		</div>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>
