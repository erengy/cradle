<?php
if (!Cradle\GOOGLE_TAG_ID) {
	return;
}
if (wp_get_environment_type() !== 'production') {
	return;
}
?>
<!-- Global site tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo Cradle\GOOGLE_TAG_ID; ?>"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', '<?php echo Cradle\GOOGLE_TAG_ID; ?>');
</script>
