// Testimonials blocks content expander
const mqtl = window.matchMedia( '(min-width: 1024px)' );

const testimonialsBlocks = '.Testimonials__list .Testimonials__item';

function shortenTestimonial() {
	// First, we are going to get height of each block before making a grid layout
	document.querySelectorAll( testimonialsBlocks ).forEach( ( item ) => {
		const testimonial = item;
		const itemHeight = testimonial.clientHeight; // height in pixels

		const itemContent = testimonial.querySelector(
			'.Testimonials__item__content'
		);

		// We calculate whole upper value of grid row spans directly, assuming row height is 3em
		// eslint-disable-next-line no-mixed-operators
		testimonial.dataset.height = Math.ceil( itemHeight / ( 16 * 3 ) + 1 );

		if ( item.clientHeight > 270 ) {
			itemContent.classList.add( 'overflow' );
		}

		if ( itemContent.classList.contains( 'overflow' ) ) {
			testimonial.style.cursor = 'pointer';
		}
		// After adding height to dataset, adding class to span over defined number of grid rows
		item.classList.add( 'minimized' );
	} );

	// Finally, we activate the grid layout so items are nicely stacked
	document.querySelectorAll( '.Testimonials__list' ).forEach( ( list ) => {
		list.classList.add( 'grid-list' );
	} );
}

if ( document.querySelectorAll( testimonialsBlocks ).length > 0 ) {
	// Handles on load
	setTimeout( () => {
		shortenTestimonial();
	}, 10 );

	// Handles case when user changes orientation of device from portrait > landscape, ie. iPad Pro
	mqtl.addEventListener( 'change', ( event ) => {
		if ( event.matches ) {
			document
				.querySelectorAll( testimonialsBlocks )
				.forEach( ( item ) => {
					const testimonial = item;
					testimonial.classList.remove( 'minimized' );
					testimonial
						.querySelector( '.Testimonials__item__content' )
						.classList.remove( 'overflow' );
				} );
			// We remove the grid layout
			document
				.querySelectorAll( '.Testimonials__list' )
				.forEach( ( list ) => {
					list.classList.remove( 'grid-list' );
				} );

			// And rerun function again
			shortenTestimonial();
		}
	} );

	// Implementing expansion of grid item
	document.querySelectorAll( testimonialsBlocks ).forEach( ( item ) => {
		const block = item;
		const expander = block.querySelector( '.Testimonials__item__expander' );

		const itemContent = block.querySelector(
			'.Testimonials__item__content'
		);

		block.addEventListener( 'click', () => {
			if (
				! block.classList.contains( 'active' ) &&
				itemContent.classList.contains( 'overflow' )
			) {
				block.classList.add( 'target' );
				block.parentElement
					.querySelectorAll( '.Testimonials__item:not(.target)' )
					.forEach( ( testimonial ) => {
						const activeItem = testimonial;
						activeItem.classList.remove( 'active' );
						setTimeout( () => {
							activeItem.style.gridRow = null;
						}, 250 );
						activeItem.querySelector(
							'.Testimonials__item__expander'
						).innerText = '+';
					} );
				block.classList.add( 'active' );
				block.style.gridRow = `span ${ block.dataset.height }`;
				block.classList.remove( 'target' );
				expander.innerText = expander.dataset.on;
			} else {
				block.classList.remove( 'target' );
				block.classList.remove( 'active' );
				setTimeout( () => {
					block.style.gridRow = null;
				}, 250 );
				expander.innerText = expander.dataset.off;
			}
		} );
	} );
}
