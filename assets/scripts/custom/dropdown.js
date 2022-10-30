const dropdown = document.querySelector( '.dropdown' );
const selected = document.querySelector( '.selected' );
const arrow = document.querySelector( '.dropdown-arrow' );
const menu = document.querySelector( '.Archive__header__dropdown--menu' );
const items = document.querySelectorAll( '.Archive__header__dropdown--menu--item' );
const sidebarItems = document.querySelectorAll( '[data-sidebarfilteritem]' );

dropdown.addEventListener( 'click', () => {
	menu.classList.toggle( 'menu-open' );
	arrow.classList.toggle( 'rotate' );
} );
items.forEach( ( item ) => {
	item.addEventListener( 'click', () => {
		if ( 'any' === item.innerText.toLowerCase() ) {
			selected.innerText = 'Category';
		} else {
			selected.innerText = item.innerText;
		}
		menu.classList.remove( 'menu-open' );
		arrow.classList.toggle( 'rotate' );
		items.forEach( ( option ) => {
			option.classList.remove( 'active' );
		} );
		item.classList.add( 'active' );
	} );
} );

sidebarItems.forEach( ( item ) => {
	item.addEventListener( 'click', () => {
		selected.innerText = item.innerText;
	} );
} );
