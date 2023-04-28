<div class="bg-light p-3">
	<?php
	if ($args['title']) {
		echo $args['before_title'] . $args['title'] . $args['after_title'];
	}
	?>
	<ul class="widget-list widget-list-tight">
		<?php
		wp_list_categories([
			'orderby'    => 'name',
			'hide_empty' => $args['hide_empty'],
			'title_li'   => '',
		]);
		?>
	</ul>
</div>
