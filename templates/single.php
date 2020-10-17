<main class="site-main">
	<?php
	while (have_posts()):
		the_post();
		Cradle\get_template_part('partials/breadcrumbs');
		Cradle\get_template_part('partials/content', get_post_type());
	endwhile;
	?>
</main>

<?php Cradle\get_template_part('partials/sidebar'); ?>
