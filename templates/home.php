<main class="site-main">
	<div class="container">
		<?php Cradle\get_template_part('partials/breadcrumbs'); ?>
		<div class="row">
			<div class="col-12 col-lg-8">
				<?php
				while (have_posts()):
					the_post();
					Cradle\get_template_part('partials/loop', get_post_type());
				endwhile;
				the_posts_pagination();
				?>
			</div>
			<div class="col-12 col-lg-4">
				<?php Cradle\get_sidebar('primary'); ?>
			</div>
		</div>
	</div>
</main>
