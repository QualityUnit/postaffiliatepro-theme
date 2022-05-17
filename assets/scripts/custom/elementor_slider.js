/* eslint-disable no-new */
/* global Swiper */

const swiper = document.querySelectorAll( '.elementor-widget-slides' );

if ( swiper.length > 0 ) {
	swiper.forEach( ( slider ) => {
		const swiperID = slider.dataset.id;
		const elementSettings = JSON.parse( slider.dataset.settings );

		function getAutoplayConfig( settings ) {
			const elSettings = settings;

			if ( elSettings.autoplay !== 'yes' ) {
				return false;
			}

			return {
				stopOnLastSlide: true,
				// Has no effect in infinite mode by default.
				delay: elSettings.autoplay_speed,
				pauseOnHover: elSettings.pause_on_hover === 'yes',
				disableOnInteraction: elSettings.pause_on_interaction === 'yes',
			};
		}

		function options( settings ) {
			const elSettings = settings;
			let swiperOptions = '';
			swiperOptions = {
				autoplay: getAutoplayConfig( elSettings ),
				grabCursor: true,
				slidesPerView: 1,
				slidesPerGroup: 1,
				loop: elSettings.infinite === 'yes',
				speed: elSettings.transition_speed,
				effect: elSettings.transition,
				observeParents: true,
				observer: true,
				handleElementorBreakpoints: true,
			};
			const showArrows =
				elSettings.navigation === 'arrows' ||
				elSettings.navigation === 'both';
			const pagination =
				elSettings.navigation === 'dots' ||
				elSettings.navigation === 'both';

			if ( showArrows ) {
				swiperOptions.navigation = {
					prevEl: '.elementor-swiper-button-prev',
					nextEl: '.elementor-swiper-button-next',
				};
			}

			if ( pagination ) {
				swiperOptions.pagination = {
					el: '.swiper-pagination',
					type: 'bullets',
					clickable: true,
				};
			}

			return swiperOptions;
		}

		new Swiper(
			`[data-id='${ swiperID }'] .swiper-container`,
			options( elementSettings )
		);
	} );
}
