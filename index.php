<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php do_action('get_header'); ?>

	<div class="site">
		<?php get_template_part('templates/partials/header'); ?>
		<?php get_template_part('templates/partials/content'); ?>
		<?php get_template_part('templates/partials/footer'); ?>
	</div>

	<?php do_action('get_footer'); ?>
	<?php wp_footer(); ?>
</body>
</html>
