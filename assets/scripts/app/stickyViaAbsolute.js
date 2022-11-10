const stickies = document.querySelectorAll( '[data-stickyFrom]' );

if ( stickies.length && 'IntersectionObserver' in window ) {
	const headerHeight = document
		.querySelector( 'header.Header' )
		.getBoundingClientRect().height;
	const windowHeight = window.innerHeight;

	const stickyObserver = new IntersectionObserver(
		( [ entry ] ) => {
			const stickyParent = entry.target;
			const stickyChild = stickyParent.firstElementChild;
			const stickyPos = stickyChild.getBoundingClientRect();
			stickyParent.style.height = `${ stickyPos.height }px`;

			if ( entry.isIntersecting || entry.boundingClientRect.top < 0 ) {
				stickyChild.dataset.isSticky = true;
				stickyChild.style.cssText = `position: fixed; left: ${ stickyPos.x }px; width: ${ stickyPos.width }px`;
				return;
			}
			if ( ! entry.isIntersecting ) {
				stickyChild.dataset.isSticky = false;
				stickyChild.style = null;
			}
		},
		{
			rootMargin: `0px 0px -${
				// eslint-disable-next-line no-mixed-operators
				100 - ( headerHeight / windowHeight ) * 100
			}% 0px`,
		}
	);

	stickies.forEach( ( sticky ) => {
		stickyObserver.observe( sticky );
	} );
}
