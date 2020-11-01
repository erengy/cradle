<nav aria-label="breadcrumb">
	<ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
	<?php
	$breadcrumbs = Cradle\get_breadcrumbs();
	foreach ($breadcrumbs as $i => $breadcrumb):
		?>
		<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"<?php echo ($i == count($breadcrumbs) - 1) ? ' aria-current="page"' : ''; ?>>
		<?php if ($breadcrumb['url']): ?>
			<a href="<?php echo esc_url($breadcrumb['url']); ?>" itemprop="item">
				<span itemprop="name"><?php echo esc_html($breadcrumb['text']); ?></span>
			</a>
		<?php else: ?>
			<span itemprop="item">
				<span itemprop="name"><?php echo esc_html($breadcrumb['text']); ?></span>
			</span>
		<?php endif; ?>
			<meta itemprop="position" content="<?php echo esc_attr($i + 1); ?>">
		</li>
	<?php endforeach; ?>
	</ol>
</nav>
