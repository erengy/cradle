<?php
if (!is_active_sidebar('primary')) {
	return;
}
?>
<aside id="sidebar-primary" class="sidebar">
	<?php dynamic_sidebar('primary'); ?>
</aside>
