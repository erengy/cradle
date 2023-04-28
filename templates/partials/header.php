<header class="site-header bg-light sticky-top">
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<a class="navbar-brand py-0" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
				<img
					class="site-logo"
					src="<?php echo esc_url(Cradle\get_asset_url('/img/logo.png')); ?>"
					alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
				>
			</a>

			<?php
			wp_nav_menu([
				'theme_location'  => 'primary',
				'container'       => 'div',
				'container_id'    => 'primaryMenu',
				'container_class' => 'collapse navbar-collapse',
				'menu_id'         => 'primary-menu',
				'menu_class'      => 'navbar-nav ms-auto',
				'depth'           => 1,
				'walker'          => new Cradle\Walker_Nav_Menu_Primary,
			]);
			?>

			<?php Cradle\get_template_part('partials/language-switch'); ?>

			<button
				type="button"
				class="btn d-block d-lg-none rounded-0 ms-3"
				data-bs-toggle="offcanvas"
				data-bs-target="#offcanvas-mobile-menu"
				aria-controls="offcanvas-mobile-menu"
				aria-label="<?php _e('Menu', 'cradle'); ?>"
			>
				<i class="fa-solid fa-bars fa-xl text-primary"></i>
			</button>
		</div>
	</nav>

	<?php Cradle\get_template_part('partials/offcanvas-mobile-menu'); ?>
</header>
