// Disable empty links
document.querySelectorAll('[href="#"]').forEach(element => {
	element.addEventListener('click', event => event.preventDefault());
});
