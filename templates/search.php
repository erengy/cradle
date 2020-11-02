<main class="site-main">
	<div class="container">
		<?php
		Cradle\get_template_part('partials/breadcrumbs');
		while (have_posts()):
			the_post();
			Cradle\get_template_part('partials/loop', 'search');
		endwhile;
		the_posts_pagination();
		?>
	</div>
</main>
