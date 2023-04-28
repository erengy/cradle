<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-start" tabindex="-1">
	<div class="offcanvas-header">
		<div class="offcanvas-title">
			<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
				<img
					class="site-logo"
					src="<?php echo esc_url(Cradle\get_asset_url('/img/logo.png')); ?>"
					alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
				>
			</a>
		</div>
		<button
			type="button"
			class="btn-close text-reset"
			data-bs-dismiss="offcanvas"
			aria-label="<?php _e('Close', 'cradle'); ?>">
		</button>
	</div>

	<div class="offcanvas-body">
		<div class="d-flex flex-column justify-content-between h-100">
			<div>
				<?php
				wp_nav_menu([
					'theme_location'  => 'mobile',
					'container'       => '',
					'container_id'    => '',
					'container_class' => '',
					'menu_id'         => 'mobile-menu',
					'menu_class'      => 'list-group list-group-flush text-uppercase',
					'depth'           => 2,
					'walker'          => new Cradle\Walker_Nav_Menu_Mobile,
				]);
				?>
			</div>

			<div class="mt-4">
				<ul class="list-inline d-flex">
				<?php foreach (Cradle\THEME_OPTIONS['social'] as $name => $url): ?>
					<li class="list-inline-item">
						<a
							class="link-secondary"
							href="<?php echo esc_url($url); ?>"
							title="<?php echo esc_attr($name); ?>"
							target="_blank"
							rel="external noopener"
						>
							<i class="fa-brands fa-<?php echo esc_attr(strtolower($name)); ?> fa-fw fa-xl"></i>
						</a>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</div>
