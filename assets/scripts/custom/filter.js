( () => {
	const query = document.querySelector.bind( document );
	const queryAll = document.querySelectorAll.bind( document );

	function recountVisible() {
		// ReCount
		setTimeout( () => {
			const listItem = queryAll( '[data-listitem]' );
			const sublist = queryAll( '[data-sublist]' );
			const recount =
				listItem.length - queryAll( "[data-list] [data-listitem][style*='none']" ).length;
			const counter = query( '#countPosts' );
			if ( counter ) {
				counter.textContent = recount;
			}
			if ( sublist.length ) {
				sublist.forEach( ( list ) => {
					const sublistItems = list.querySelectorAll( '[data-listitem]' );
					const sublistItemsHidden = list.querySelectorAll( "[data-listitem][style*='none']" );
					if ( sublistItems.length === sublistItemsHidden.length ) {
						list.classList.add( 'hidden' );
					}
					if ( sublistItems.length !== sublistItemsHidden.length ) {
						list.classList.remove( 'hidden' );
					}
				} );
			}
		}, 25 );
	}

	if ( query( '[data-list]' ) !== null ) {
		const list = query( '[data-list]' );
		const listItems = list.querySelectorAll( '[data-listitem]' );
		const pillars = list.querySelectorAll( '[data-listitem].pillar' );
		const countItems = listItems.length;
		const filterItems = queryAll(
			'[data-filteritem]'
		);
		const search = query( "[data-searchfield] input[type='search']" );
		const { hash } = window.location;
		const activeFilter = {
			collections: '',
			plan: '',
			size: '',
			category: '',
			favourite: '',
			type: '',
		};

		// Count
		const count =
			queryAll( '[data-list] [data-listitem]' ).length -
			queryAll( "[data-list] [data-listitem][style*='none']" ).length;
		if ( query( '.Category__content__description' ) ) {
			query( '.Category__content__description span:not(#filter-show)' ).textContent = count;
			query( '.Category__content__description #filter-show' ).classList.add( 'show' );
		}

		// Adds numbered classes to each featured article so we can assign image to it
		if ( pillars !== null ) {
			pillars.forEach( ( pillar, i ) => {
				pillar.classList.add( `pillar-${ i }` );
			} );
		}

		// Filter
		filterItems.forEach( ( element ) => {
			const filterItem = element;

			filterItem.addEventListener( 'change', () => {
				if ( filterItem.matches( ':checked' ) ) {
					const val = filterItem.value;
					const name = filterItem.getAttribute( 'name' );

					if ( name === 'category' || name === 'type' ) {
						window.history.pushState( {}, '', `#${ val }` );
						if ( val.length === 0 ) {
							window.history.pushState( {}, '', ' ' );
						}
					}

					activeFilter[ name ] = val;
				}

				recountVisible();
			} );
		} );

		// Items
		listItems.forEach( ( element ) => {
			const listItem = element;
			const dataCollections = listItem.dataset.collections
				? listItem.dataset.collections
				: '';
			const dataPlan = listItem.dataset.plan ? listItem.dataset.plan : '';
			const dataSize = listItem.dataset.size ? listItem.dataset.size : '';
			const dataCategory = listItem.dataset.category
				? listItem.dataset.category
				: '';
			const dataFavourite = listItem.dataset.favourite
				? listItem.dataset.favourite
				: '';
			const dataType = listItem.dataset.type ? listItem.dataset.type : '';

			filterItems.forEach( ( e ) => {
				const filterItem = e;

				filterItem.addEventListener( 'change', () => {
					function regex( activeFilterCategory ) {
						if ( activeFilterCategory !== '' ) {
							return new RegExp( `${ activeFilterCategory }` );
						}
						return '';
					}

					if (
						listItem.style.display === 'none' &&
						! listItem.classList.contains( 'pillar' )
					) {
						listItem.style.display = 'block';
					}

					if (
						listItem.style.display === 'none' &&
						listItem.classList.contains( 'pillar' )
					) {
						listItem.style.display = 'flex';
					}

					if (
						! dataCollections.includes(
							activeFilter.collections
						) ||
						! dataPlan.includes( activeFilter.plan ) ||
						! dataSize.includes( activeFilter.size ) ||
						! dataCategory.match(
							regex( activeFilter.category )
						) ||
						! dataFavourite.includes( activeFilter.favourite ) ||
						! dataType.includes( activeFilter.type )
					) {
						listItem.style.display = 'none';
					}
				} );
			} );
		} );

		// URL filter
		if ( hash.length ) {
			const filteredHash = hash.replace( '#', '' );
			filterItems.forEach( ( element ) => {
				const filterItem = element;
				const val = filterItem.value;
				const name = filterItem.getAttribute( 'name' );

				if ( filteredHash === val ) {
					filterItem.checked = true;

					activeFilter[ name ] = val;
					recountVisible();
				}
			} );

			listItems.forEach( ( element ) => {
				const listItem = element;
				const dataCategory = listItem.dataset.category
					? listItem.dataset.category
					: '';
				const dataType = listItem.dataset.type
					? listItem.dataset.type
					: '';

				if (
					! dataCategory.includes( activeFilter.category ) ||
					! dataType.includes( activeFilter.type )
				) {
					listItem.style.display = 'none';
				}
			} );
		}

		// Empty
		filterItems.forEach( ( element ) => {
			const filterItem = element;

			filterItem.addEventListener( 'change', () => {
				if (
					list.querySelectorAll( "[data-listitem][style*='display: none']" )
						.length === countItems
				) {
					list.classList.add( 'empty' );
				} else {
					list.classList.remove( 'empty' );
				}
			} );
		} );

		// Search
		if ( search ) {
			search.addEventListener( 'keyup', () => {
				const val = search.value.toLowerCase();

				listItems.forEach( ( element ) => {
					const listItem = element;
					let title = listItem.querySelector( '[data-listitem-title]' );
					let excerpt = listItem.querySelector( '[data-listitem-excerpt]' );

					if ( title ) {
						title = title.textContent.toLowerCase();
					}

					if ( excerpt ) {
						excerpt = excerpt.textContent.toLowerCase();
					}

					if (
						listItem.style.display === 'none' &&
					! listItem.classList.contains( 'pillar' )
					) {
						listItem.style.display = 'block';
					}

					if (
						listItem.style.display === 'none' &&
					listItem.classList.contains( 'pillar' )
					) {
						listItem.style.display = 'flex';
					}

					if ( title && excerpt ) {
						if ( ! title.includes( val ) && ! excerpt.includes( val ) ) {
							listItem.style.display = 'none';
						}
					}

					if ( ! excerpt ) {
						if ( ! title.includes( val ) ) {
							listItem.style.display = 'none';
						}
					}

					recountVisible();
				} );
			} );

			search.addEventListener( 'keyup', () => {
				if (
					list.querySelectorAll( "[data-listitem][style*='display: none']" ).length ===
				countItems
				) {
					list.classList.add( 'empty' );
				} else {
					list.classList.remove( 'empty' );
				}
			} );
			search.addEventListener( 'input', () => {
				if ( search.value === '' ) {
					list.classList.remove( 'empty' );
					list.querySelectorAll( '[data-listitem]' ).forEach( ( element ) => {
						const el = element;
						el.style = null;
					} );
				}

				recountVisible();
			} );
		}
	}
} )();
