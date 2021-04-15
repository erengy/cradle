<article id="post-<?php the_ID(); ?>" <?php post_class('mb-4'); ?>>
	<h1 class="h3"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h1>
	<div><?php the_excerpt(); ?></div>
</article>
