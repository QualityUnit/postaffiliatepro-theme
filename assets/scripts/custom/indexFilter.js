const searchField = document.querySelector( 'input[type=search]' );
const searchGroups = document.querySelectorAll( '[data-searchGroup]' );

searchField.addEventListener( 'input', () => {
	const searchText = searchField.value.toLowerCase();

	searchGroups.forEach( ( group ) => {
		const searchItems = group.querySelectorAll( '[data-search]' );
		let searchItemsHidden;

		searchItems.forEach( ( item ) => {
			const itemText = item.innerText.toLowerCase();

			if ( ! itemText.includes( searchText ) ) {
				item.classList.add( 'hidden' );
				searchItemsHidden = group.querySelectorAll( '[data-search].hidden' );
				return false;
			}
			item.classList.remove( 'hidden' );
			searchItemsHidden = group.querySelectorAll( '[data-search].hidden' );
		} );

		if ( searchItems.length === searchItemsHidden.length ) {
			group.classList.add( 'hidden' );
			return false;
		}

		group.classList.remove( 'hidden' );
	} );
} );
