/* global Splide */
const direction = () => {
	return document.documentElement.dir;
};

const thisSliders = document.querySelectorAll(
	'.elementor-shortcode .SliderTestimonials__slider:not(.SliderTestimonials__slider--reference) .slider'
);

/* Testimonials Slider */
if ( thisSliders.length > 0 ) {
	thisSliders.forEach( ( slider ) => {
		new Splide( slider, {
			type: 'loop',
			autoplay: true,
			lazyLoad: 'nearby',
			speed: 300,
			easing: 'linear',
			fixedWidth: 'calc(50% - 70px)',
			perPage: 2,
			perMove: 1,
			pagination: false,
			arrows: true,
			breakpoints: {
				768: {
					fixedWidth: 'calc(100% - 70px)',
					perPage: 1,
				},
				767: {
					fixedWidth: '100%',
					perPage: 1,
					arrows: false,
				},
			},
		} ).mount();
	} );
}

/* Redesigned homepage reference testimonials slider (earth map at bg) */
const testimonialsReference = document.querySelectorAll(
	'.elementor-shortcode .SliderTestimonials__slider--reference .slider'
);

/* Home Testimonials Slider */
if ( testimonialsReference.length > 0 ) {
	testimonialsReference.forEach( ( slider ) => {
		slider.querySelectorAll( '[data-src]' ).forEach( ( image ) => {
			const img = image;
			img.setAttribute( 'src', img.dataset.src );
			img.style.cssText = null;
		} );
		const testimonials = new Splide( slider, {
			type: 'loop',
			autoplay: true,
			lazyLoad: 'nearby',
			speed: 700,
			interval: 5000,
			perPage: 1,
			perMove: 1,
			focus: 'center',
			pagination: true,
			arrows: false,
			trimspace: true,
			gap: '2em',
			breakpoints: {
				767: {
					interval: 8000,
					gap: '1.5em',
					pagination: false,
					fixedWidth: '80%',
				},
			},
		} ).mount();

		// Bugfix for not showing images on first slide
		testimonials.on( 'lazyload:loaded', () => {
			const visibles = slider.querySelectorAll( '.is-visible' );

			if ( visibles.length >= 2 ) {
				visibles
					.item( 0 )
					.querySelectorAll( '[data-splide-lazy]' )
					.forEach( ( image ) => {
						const showImage = image;
						showImage.style.display = null;
						if ( showImage.nextElementSibling !== null ) {
							showImage.nextElementSibling.remove();
						}
					} );
			}
		} );

		// Fix to achieve fluid opacity animation on move, not after move

		testimonials.on( 'move', () => {
			const visibles = slider.querySelectorAll( '.is-visible' );

			if ( visibles.length >= 2 ) {
				visibles.item( 1 ).classList.remove( 'is-active' );
				visibles.item( 2 ).classList.add( 'is-active' );
			}
		} );
	} );
}

/* Testimonials Slider in Gutenberg */
const gutenSliders = document.querySelectorAll(
	'.Gutenberg .SliderTestimonials__slider .slider'
);
if ( gutenSliders.length > 0 ) {
	gutenSliders.forEach( ( slider ) => {
		new Splide( slider, {
			type: 'loop',
			autoplay: false,
			speed: 300,
			easing: 'linear',
			fixedWidth: 'calc(100% - 100px)',
			perPage: 1,
			perMove: 1,
			pagination: false,
			arrows: true,
			breakpoints: {
				600: {
					arrows: true,
				},
				480: {
					fixedWidth: 'calc(100% - 40px)',
					arrows: false,
				},
			},
		} ).mount();
	} );
}

/* Demo Slider */
if ( document.querySelectorAll( '.FullScreen__sidebar .slider' ).length > 0 ) {
	document
		.querySelectorAll( '.FullScreen__sidebar .slider' )
		.forEach( ( slider ) => {
			new Splide( slider, {
				type: 'loop',
				autoplay: true,
				speed: 500,
				easing: 'linear',
				perPage: 1,
				perMove: 1,
				pagination: true,
				arrows: false,
				breakpoints: {
					600: {
						arrows: true,
					},
					480: {
						arrows: false,
					},
				},
			} ).mount();
		} );
}

const sliderCutted = document.querySelectorAll( '.SliderCutted' );

if ( sliderCutted.length > 0 ) {
	sliderCutted.forEach( ( slider ) => {
		new Splide( slider, {
			type: 'slide',
			rewind: true,
			autoplay: true,
			direction: direction(),
			speed: 500,
			interval: 10000,
			perPage: 1,
			perMove: 1,
			pagination: true,
			arrows: true,
		} ).mount();
	} );
}
