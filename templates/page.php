<main class="site-main">
	<div class="container">
		<?php
		while (have_posts()):
			the_post();
			Cradle\get_template_part('partials/breadcrumbs');
			Cradle\get_template_part('partials/content', 'page');
		endwhile;
		?>
	</div>
</main>
