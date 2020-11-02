<main class="site-main">
	<?php
	while (have_posts()):
		the_post();
		Cradle\get_template_part('partials/content', 'front-page');
	endwhile;
	?>
</main>
