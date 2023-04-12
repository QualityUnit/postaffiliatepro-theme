const comparePlansTableTitles = document.querySelectorAll( '.ComparePlans .ComparePlans__table-title' );
const comparePlansTitle = document.querySelector( '.ComparePlans__sectionTitle' );
const comparePlansHeader = document.querySelector( '.ComparePlans__header' );
const comparePlansTables = document.querySelectorAll( '.ComparePlans__section' );
const comparePlansRows = document.querySelectorAll( '.ComparePlans__table-row' );

const setOddEven = () => {
	if ( comparePlansRows.length ) {
		comparePlansRows.forEach( ( row ) => {
			row.classList.remove( 'even' );
		} );
	}

	comparePlansTables.forEach( ( table ) => {
		const visibleRows = table.querySelectorAll( '.ComparePlans__table-row:not(.hidden)' );

		if ( visibleRows.length ) {
			visibleRows.forEach( ( element, index ) => {
				const item = element;
				if ( index % 2 !== 0 ) { //We start at 0 not 1 so even is with modulus
					item.classList.add( 'even' );
				}
			} );
		}
	} );
};

// Setting tables header class when sticky to hide icons
if ( comparePlansHeader ) {
	const headerObserver = new IntersectionObserver(
		( [ entry ] ) => {
			if ( entry.isIntersecting ) {
				comparePlansHeader.classList.remove( 'is-sticky' );
				return;
			}
			if ( entry.boundingClientRect.top < 0 ) {
				comparePlansHeader.classList.add( 'is-sticky' );
			}
		},
		{ rootMargin: '-92px 0px 0px 0px' }
	);

	headerObserver.observe( comparePlansTitle );
}

// Toggling visibility of table below main title
if ( comparePlansTableTitles.length ) {
	comparePlansTableTitles.forEach( ( element ) => {
		element.addEventListener( 'click', () => {
			element.classList.toggle( 'ComparePlans__open' );

			function hideCompareTableRows( el ) {
				const nextUntil = [];
				let until = true;
				let value;

				// eslint-disable-next-line no-param-reassign
				while ( ( el = el.nextElementSibling ) ) {
					if (
						until &&
						el &&
						! el.matches( '.ComparePlans__view' )
					) {
						nextUntil.push( el );
					} else {
						until = false;
					}
				}
				if ( value !== true ) {
					nextUntil.forEach( ( item ) => {
						item.classList.toggle( 'ComparePlans__open' );
					} );
					value = true;
				}
			}

			hideCompareTableRows( element );
		} );
	} );
}

// Finding differences in values in pricing table rows
if ( comparePlansRows.length ) {
	const matchingRows = [];
	const compareSwitcher = document.querySelector( '[data-switcher="compare"]' );
	const compareSwitcherLabels = compareSwitcher.querySelectorAll( 'label' );
	setOddEven();

	comparePlansRows.forEach( ( row ) => {
		// Selecting cells except first description one
		const cells = row.querySelectorAll( '.ComparePlans__table-col:not(:first-of-type)' );
		const firstValueCell = cells.item( 0 ).innerText;

		// Filtering array of nodes with different values
		const matching = [ ...cells ].filter( ( cell ) => cell.innerText !== firstValueCell );

		// If returns td cells with same content in all cells, push the row to the array
		if ( ! matching.length ) {
			matchingRows.push( row );
		}
	} );

	if ( matchingRows.length ) {
		compareSwitcher.addEventListener( 'click', () => {
			compareSwitcherLabels.forEach( ( label ) => {
				label.classList.toggle( 'active' );
			} );
			matchingRows.forEach( ( row ) => {
				row.classList.toggle( 'ComparePlans__hidden' );
			} );
			setOddEven();
		} );
	}
	if ( ! matchingRows.length ) {
		compareSwitcher.classList.add( 'inactive' );
	}
}
