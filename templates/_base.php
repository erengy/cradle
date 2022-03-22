<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php do_action('get_header'); ?>

	<div class="site">
		<?php Cradle\get_template_part('partials/header'); ?>

		<div class="site-content">
			<?php load_template($args['template']); ?>
		</div>

		<?php Cradle\get_template_part('partials/footer'); ?>
	</div>

	<?php do_action('get_footer'); ?>
	<?php wp_footer(); ?>
</body>
</html>
