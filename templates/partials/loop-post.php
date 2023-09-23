<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title">
			<a href="<?php echo esc_url(get_permalink()); ?>">
				<?php the_title(); ?>
			</a>
		</h1>
		<?php the_post_thumbnail(); ?>
	</header>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<a class="btn btn-primary" href="<?php echo esc_url(get_permalink()); ?>">
			<?php _e('Read more', 'cradle'); ?>
		</a>
	</footer>
</article>
