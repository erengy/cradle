<main class="site-main">
	<div class="container">
		<?php Cradle\get_template_part('partials/breadcrumbs'); ?>
		<header class="entry-header">
			<h1 class="mb-5"><?php _e('Search results', 'cradle'); ?></h1>
		</header>
		<?php
		while (have_posts()):
			the_post();
			Cradle\get_template_part('partials/loop', 'search');
		endwhile;
		the_posts_pagination();
		?>
	</div>
</main>
