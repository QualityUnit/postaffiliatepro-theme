( () => {
	const mobileTablet = window.matchMedia( '(max-width: 1380px)' );
	const query = document.querySelector.bind( document );
	const queryAll = document.querySelectorAll.bind( document );

	const activateMenuClick = () => {
		/* Header Mobile Menu */
		if ( query( '.Header__mobileNavigation' ) !== null ) {
			query( '.Header__mobileNavigation' ).addEventListener(
				'click',
				() => {
					query( '.Header__mobileNavigation' ).classList.toggle(
						'active'
					);
					query( '.Header__navigation' ).classList.toggle( 'active' );
				}
			);
		}

		if (
			queryAll( '.Header__navigation ul > .menu-item-has-children' )
				.length > 0
		) {
			queryAll(
				'.Header__navigation ul > .menu-item-has-children'
			).forEach( ( element ) => {
				const link = element.querySelector( "a[href='#']" );
				const sub = element.querySelector( 'ul' );

				if ( link !== null ) {
					link.addEventListener( 'click', () => {
						if (
							! link.parentElement.classList.contains( 'active' )
						) {
							queryAll( '.Header__navigation .active' ).forEach(
								( activated ) => {
									activated.classList.remove( 'active' );
								}
							);
						}
						link.parentElement.classList.toggle( 'active' );
						sub.classList.toggle( 'active' );
					} );
				}
			} );
		}

		/* Main Navigation */
		if ( query( '.Header__navigation' ) !== null ) {
			queryAll( ".Header__navigation a[href='#']" ).forEach(
				( element ) => {
					element.addEventListener( 'click', ( event ) => {
						event.preventDefault();
					} );
				}
			);
		}
	};

	if ( mobileTablet.matches ) {
		activateMenuClick();
	}

	// Handles case when user changes orientation of device from portrait > landscape, ie. iPad Pro
	mobileTablet.addEventListener( 'change', ( event ) => {
		if ( event.matches ) {
			activateMenuClick();
		}
	} );

	/* Language switcher */
	function hideLanguageSwitcher( target ) {
		if ( target.classList.contains( 'visible' ) ) {
			target.classList.remove( 'visible' );
			setTimeout( () => {
				target.classList.remove( 'active' );
			}, 200 );
		}
	}

	if ( query( '.Header__flags #languageSwitcher-toggle' ) !== null ) {
		const langSwitcherToggle = query(
			'.Header__flags #languageSwitcher-toggle'
		);

		/* Gets region of active language and activates mobile switcher for such region */
		// const langActive = langSwitcherToggle.parentElement.getAttribute(
		// 	'lang'
		// );
		// const matchRegion = langSwitcherToggle.parentElement.querySelector(
		// 	`.Header__flags--item[lang=${ langActive }]`
		// ).dataset.region;

		// document.querySelector(
		// 	`#${ matchRegion }.input--region`
		// ).checked = true;

		/* Toggles language switcher */
		const langSwitcherMenu = query( '.Header__flags--mainmenu' );
		langSwitcherToggle.addEventListener( 'click', ( event ) => {
			event.stopPropagation();
			if ( ! langSwitcherMenu.classList.contains( 'visible' ) ) {
				langSwitcherMenu.dataset.active = 'active';
				langSwitcherMenu.classList.add( 'active' );
				setTimeout( () => {
					langSwitcherMenu.classList.add( 'visible' );
				}, 200 );
			}
			hideLanguageSwitcher( langSwitcherMenu );
		} );

		document.addEventListener( 'click', ( event ) => {
			if (
				! event.target.classList.contains( 'Header__flags--mainmenu' )
			) {
				event.stopPropagation();
				hideLanguageSwitcher( langSwitcherMenu );
			}
		} );
	}

	/* Data Href */
	if ( queryAll( '[data-href]' ).length > 0 ) {
		queryAll( '[data-href]' ).forEach( ( element ) => {
			element.addEventListener( 'click', () => {
				const link = element.getAttribute( 'data-href' );

				if ( link !== null ) {
					window.location.href = link;
				}
			} );
		} );
	}

	/* Used for custom looking Select menu */
	if ( queryAll( '[data-select]' ).length > 0 ) {
		const selectors = queryAll( '[data-select]' );

		selectors.forEach( ( element ) => {
			const thisSelect = element;
			const thisSelectParent = thisSelect.closest(
				'.Signup__form__item'
			);
			const thisSelectID = element.dataset.select;
			const thisOptions = document.getElementById( thisSelectID ).options;

			const pseudoSelect = document.createElement( 'div' );
			pseudoSelect.classList.add( 'pseudoSelect', thisSelectID );
			thisSelectParent.appendChild( pseudoSelect );

			Object.entries( thisOptions ).forEach( ( [ key ] ) => {
				const pseudoSelectOption = document.createElement( 'div' );
				pseudoSelectOption.classList.add( 'pseudoSelect__option' );
				pseudoSelectOption.innerText = thisOptions[ key ].textContent;
				pseudoSelectOption.dataset.value = thisOptions[ key ].value;
				pseudoSelect.appendChild( pseudoSelectOption );

				if (
					thisOptions[ key ].value ===
					document.getElementById( thisSelectID ).value
				) {
					thisSelect.dataset.text = thisSelect.innerText;
					thisSelect.innerText = thisOptions[ key ].textContent;
				}
			} );

			thisSelect.addEventListener( 'click', ( event ) => {
				event.stopPropagation();

				if ( document.querySelector( '.pseudoSelect.active' ) ) {
					document
						.querySelector( '.pseudoSelect.active' )
						.classList.remove( 'active' );
					document
						.querySelector( '.Signup__form__item.active' )
						.classList.remove( 'active' );
				}

				pseudoSelect.classList.toggle( 'active' );
				thisSelectParent.classList.toggle( 'active' );
			} );

			const pseudoSelectOptions = thisSelectParent.querySelectorAll(
				'.pseudoSelect__option'
			);

			pseudoSelectOptions.forEach( ( option ) => {
				option.addEventListener( 'click', ( event ) => {
					const optionVal = event.target.dataset.value;
					const optionText = event.target.innerText;
					document.getElementById( thisSelectID ).value = optionVal;
					pseudoSelect.classList.toggle( 'active' );
					thisSelectParent.classList.toggle( 'active' );
					thisSelect.dataset.text = thisSelect.innerText;
					thisSelect.innerText = optionText;
				} );
			} );

			document.addEventListener( 'click', ( event ) => {
				const pseudoSelectActive = document.querySelector(
					'.pseudoSelect.active'
				);
				if (
					! event.target.classList.contains( 'pseudoSelect' ) &&
					pseudoSelectActive !== null
				) {
					pseudoSelectActive.classList.remove( 'active' );
					pseudoSelectActive
						.closest( '.Signup__form__item' )
						.classList.remove( 'active' );
				}
			} );
		} );
	}

	/* Article Sidebar */
	if ( query( '.Article__container__sidebar' ) !== null ) {
		const container = query( '.Article__container__sidebar' );
		const urlPath = window.location.pathname;
		const li = container.querySelectorAll( 'li' );

		li.forEach( ( menuItem ) => {
			const a = menuItem.querySelector( 'a' );
			const href = a.getAttribute( 'href' );

			if ( href.includes( urlPath ) ) {
				const parent = a.parentElement;
				parent.classList.add( 'active' );
			}
		} );
	}

	/* Glossary */
	if ( query( '.Archive__container--glossary' ) !== null ) {
		queryAll( '.Archive__filter ul li a' ).forEach( ( element ) => {
			const link = element.getAttribute( 'href' );

			element.addEventListener( 'click', ( event ) => {
				const scrollToPos =
					query( link ).getBoundingClientRect().top +
					window.pageYOffset;
				event.preventDefault();
				if ( window.matchMedia( '(min-width: 1180px)' ).matches ) {
					window.scroll( {
						top: scrollToPos - 215,
						behavior: 'smooth',
					} );
				} else {
					window.scroll( {
						top: scrollToPos - 115,
						behavior: 'smooth',
					} );
				}
			} );
		} );
	}

	// Custom tabs and accordion, replacing Elementor one
	if ( queryAll( '.elementor-tab-title' ).length > 0 ) {
		const tabItems = queryAll( '.elementor-tab-title' );
		const firstItemRef = tabItems.item( 0 ).getAttribute( 'aria-controls' );
		const parent = tabItems
			.item( 0 )
			.closest( '.elementor-widget-container' );

		tabItems.forEach( ( element ) => {
			const elemReference = element.getAttribute( 'aria-controls' );
			const elemContent = document.querySelector( `#${ elemReference }` );

			if (
				parent.querySelectorAll( '.elementor-accordion-item' ).length >
				0
			) {
				elemContent.dataset.height = `${ elemContent.clientHeight }px`;
				elemContent.style.height = '0px';
				elemContent.style.paddingBottom = '0px';
			}
			element.addEventListener( 'click', ( event ) => {
				const nonActive = queryAll(
					`[aria-controls=${ elemReference }], #${ elemReference }`
				);

				event.preventDefault();

				if (
					parent.querySelector(
						'[data-active="elementor-active"].elementor-tab-content'
					) !== null
				) {
					const activeElem = parent.querySelectorAll(
						'[data-active="elementor-active"]'
					);

					if (
						parent.querySelectorAll( '.elementor-accordion-item' )
							.length > 0
					) {
						parent.querySelector(
							'[data-active="elementor-active"].elementor-tab-content'
						).style.height = '0px';
					}
					activeElem.forEach( ( elementorItem ) => {
						elementorItem.dataset.active = '';
					} );
				}

				nonActive.forEach( ( elementorItem ) => {
					elementorItem.dataset.active = 'elementor-active';
				} );

				if (
					parent.querySelectorAll( '.elementor-accordion-item' )
						.length > 0
				) {
					elemContent.style.height = elemContent.dataset.height;
				}
			} );
		} );

		queryAll(
			`[aria-controls=${ firstItemRef }], #${ firstItemRef }`
		).forEach( ( item ) => {
			item.dataset.active = 'elementor-active';
			// eslint-disable-next-line no-param-reassign
			item.style.height = 'auto';
		} );
	}

	// Elementor Slides replacing dots navigation with tabs
	window.addEventListener( 'load', () => {
		const slidesHeadings = document.querySelectorAll(
			'.elementor-swiper .swiper-slide:not(.swiper-slide-duplicate) .elementor-slide-heading'
		);
		if ( slidesHeadings.length > 0 ) {
			const headingsFilled = [];
			const sliderParent = slidesHeadings[ 0 ].closest(
				'.elementor-swiper'
			);
			const sliderDots = sliderParent.querySelectorAll(
				'.swiper-pagination-bullet'
			);

			if ( sliderDots.length > 0 ) {
				sliderParent.classList.add( 'has-pagination' );

				for ( let i = 0; i < slidesHeadings.length; i += 1 ) {
					headingsFilled.push( slidesHeadings[ i ].innerText );
				}
				const tabTitles = headingsFilled.filter(
					( v, i, a ) => a.indexOf( v ) === i
				);

				for ( let dot = 0; dot < sliderDots.length; dot += 1 ) {
					sliderDots[ dot ].innerText = tabTitles[ dot ];
				}
			}
		}
	} );

	// Remove empty p from numbers block
	const lastP = queryAll( '.elementor-text-editor p:last-of-type' );
	if ( lastP.length > 0 ) {
		lastP.forEach( ( element ) => {
			const empty = element;

			if ( empty !== undefined && empty.innerHTML === '&nbsp;' ) {
				empty.remove();
			}
		} );
	}

	// Adds classes to main block if Signup form is in there
	if ( query( '.Block:first-of-type .Signup__form' ) !== null ) {
		const headerForm = query( '.Block:first-of-type .Signup__form' );

		headerForm.closest( '.Block' ).classList.add( 'Block--background' );
		headerForm.closest( '.Block' ).classList.add( 'Block--trial' );
	}

	const form = query( '.Signup__form' );

	function scroll( element ) {
		const scrollToPos =
			form.getBoundingClientRect().top + window.pageYOffset;
		element.addEventListener( 'click', ( event ) => {
			event.preventDefault();
			window.scroll( {
				top: scrollToPos - 175,
				behavior: 'smooth',
			} );
		} );
	}

	/* Scroll Buttons to Signup Form */
	if ( query( '.Signup__form' ) !== null ) {
		if ( queryAll( ".Reviews a[href*='trial']" ).length > 0 ) {
			queryAll( ".Reviews a[href*='trial']" ).forEach( ( element ) => {
				scroll( element );
			} );
		}

		if ( queryAll( ".Reviews a[href*='free-account']" ).length > 0 ) {
			queryAll( ".Reviews a[href*='free-account']" ).forEach(
				( element ) => {
					scroll( element );
				}
			);
		}

		if ( queryAll( ".Portals a[href*='trial']" ).length > 0 ) {
			queryAll( ".Portals a[href*='trial']" ).forEach( ( element ) => {
				scroll( element );
			} );
		}

		if ( queryAll( ".Block a[href*='trial']" ).length > 0 ) {
			queryAll( ".Block a[href*='trial']" ).forEach( ( element ) => {
				scroll( element );
			} );
		}

		if ( queryAll( ".Block a[href*='free-account']" ).length > 0 ) {
			queryAll( ".Block a[href*='free-account']" ).forEach(
				( element ) => {
					scroll( element );
				}
			);
		}

		if ( queryAll( ".BlockPricing a[href*='trial']" ).length > 0 ) {
			queryAll( ".BlockPricing a[href*='trial']" ).forEach(
				( element ) => {
					scroll( element );
				}
			);
		}
	}

	/* Copy to clipboard */
	if ( queryAll( '.Copy ' ).length > 0 ) {
		queryAll( '.Copy ' ).forEach( ( item ) => {
			item.querySelector( '.Button--copy' ).addEventListener(
				'click',
				() => {
					const thisCopy = item;
					const copyText = thisCopy.querySelector( 'textarea' );
					const defaultText = thisCopy.querySelector(
						'.Button--copy span'
					).textContent;

					copyText.select();

					document.execCommand( 'copy' );

					thisCopy.querySelector( '.Button--copy span' ).textContent =
						'Copied!';

					setTimeout( () => {
						thisCopy.querySelector(
							'.Button--copy span'
						).textContent = defaultText;
					}, 5000 );
				}
			);
		} );
	}

	/* Login */
	if ( query( '.Login__overlay' ) !== null ) {
		query( '.Login__overlay' ).addEventListener( 'click', () => {
			query( '.Login__overlay' ).classList.remove( 'active' );
			query( '.Login__popup' ).classList.remove( 'active' );
		} );

		query( '.Login__popup__close' ).addEventListener( 'click', () => {
			query( '.Login__overlay' ).classList.remove( 'active' );
			query( '.Login__popup' ).classList.remove( 'active' );
		} );
	}

	/* Adding class to Boxes in illustration Block if more or same than 4 */
	const boxes = document.querySelectorAll( '.Boxes' );

	if ( boxes.length > 0 ) {
		boxes.forEach( ( block ) => {
			const boxesColumns = block.querySelectorAll( '.elementor-column' );
			if ( boxesColumns.length >= 4 ) {
				boxesColumns[ 0 ]
					.closest( '.Boxes' )
					.classList.add( 'has-four' );
			}
		} );
	}
} )();
