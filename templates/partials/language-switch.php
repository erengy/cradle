<?php
if (!function_exists('pll_the_languages')) {
	return;
}

$languages = pll_the_languages(['raw' => true]);
?>
<div class="ms-auto ms-lg-4">
	<?php foreach ($languages as $lang): ?>
		<a
			class="btn <?php echo $lang['current_lang'] ? 'btn-light' : 'btn-secondary'; ?> rounded-0 px-1 py-0"
			href="<?php echo esc_url($lang['url']); ?>"
			lang="<?php echo esc_attr($lang['locale']); ?>"
			aria-label="<?php echo esc_attr($lang['name']); ?>"
		>
			<span class="small">
				<?php echo esc_html(strtoupper($lang['slug'])); ?>
			</span>
		</a>
	<?php endforeach; ?> 
</div>
