<header class="site-header bg-light">
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
				<span class="site-title"><?php bloginfo('name'); ?></span>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryMenu" aria-controls="primaryMenu" aria-expanded="false" aria-label="<?php _e('Menu', 'cradle'); ?>"><span class="navbar-toggler-icon"></span></button>
			<?php
			wp_nav_menu(
				array(
						'theme_location'  => 'primary',
						'container'       => 'div',
						'container_id'    => 'primaryMenu',
						'container_class' => 'collapse navbar-collapse',
						'menu_id'         => 'primary-menu',
						'menu_class'      => 'navbar-nav ml-auto',
					)
				);
			?>
		</div>
	</nav>
</header>
