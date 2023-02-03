// Disable empty links
document.querySelectorAll('[href="#"]').forEach(element => {
	element.addEventListener('click', event => event.preventDefault());
});

// Init sliders
// https://swiperjs.com/swiper-api
document.querySelectorAll('.slider').forEach(slider => {
	const container = slider.parentElement;

	let breakpoints = slider.dataset.breakpoints || '[]';
	breakpoints = Object.fromEntries(JSON.parse(breakpoints));
	for (let key in breakpoints) {
		breakpoints[key] = { slidesPerView: breakpoints[key] };
	}

	new Swiper(slider, {
		slidesPerView: parseInt(slider.dataset.slidesPerView) || 2,
		spaceBetween: parseInt(slider.dataset.spaceBetween) || 10,
		navigation: {
			nextEl: container.querySelector('.swiper-button-next'),
			prevEl: container.querySelector('.swiper-button-prev'),
		},
		pagination: {
			el: container.querySelector('.swiper-pagination'),
			type: 'bullets',
		},
		breakpoints,
	});
});

// Init lightbox
// https://photoswipe.com/v4-docs/getting-started.html
document.addEventListener('DOMContentLoaded', event => {
	const pswp = document.querySelector('.pswp');
	const elements = document.querySelectorAll('.lightbox-item');

	const items = elements.map(element => ({
		src: element.getAttribute('href'),
		w: element.dataset.width,
		h: element.dataset.height,
		title: element.dataset.caption,
	}));

	const options = {
		showHideOpacity: true,
		bgOpacity: 0.9,
		history: false,
	};

	elements.forEach((element, index) => {
		element.addEventListener('click', event => {
			event.preventDefault();
			const gallery = new PhotoSwipe(pswp, PhotoSwipeUI_Default, items, { index, ...options });
			gallery.init();
		});
	});
});

// Init scroll animations
// https://github.com/michalsnik/aos
document.addEventListener('DOMContentLoaded', event => {
	AOS.init({
		once: true,
	});
});
