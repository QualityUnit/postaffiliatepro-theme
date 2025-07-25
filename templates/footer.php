<?php
wp_enqueue_style( 'footer', get_template_directory_uri() . '/assets/dist/layouts/Footer' . isrtl() . wpenv() . '.css', false, THEME_VERSION );

if ( empty( preg_grep( '/^(login|trial|thank-you|free-account|demo|request-for-proposal)$/', get_body_class() ) ) ) {
	echo do_shortcode( '[good-hands-redesign]' );
}
?>

<footer class="Footer urlslab-skip-keywords urlslab-skip-fragment flowhunt-skip" data-scrollsidebars="true">
	<div class="Footer__top">
		<div class="wrapper">
			<div class="Footer__top__row">
				<div class="Footer__top__column">
					<?php
					if ( is_active_sidebar( 'footer_column_1' ) ) :
						dynamic_sidebar( 'footer_column_1' );
					endif;
					?>
				</div>

				<div class="Footer__top__column">
					<?php
					if ( is_active_sidebar( 'footer_column_2' ) ) :
						dynamic_sidebar( 'footer_column_2' );
					endif;
					?>
				</div>

				<div class="Footer__top__column">
					<?php
					if ( is_active_sidebar( 'footer_column_3' ) ) :
						dynamic_sidebar( 'footer_column_3' );
					endif;
					?>
				</div>

				<div class="Footer__top__column">
					<?php
					if ( is_active_sidebar( 'footer_column_4' ) ) :
						dynamic_sidebar( 'footer_column_4' );
					endif;
					?>
				</div>

				<div class="Footer__top__column">
					<?php
					if ( is_active_sidebar( 'footer_column_5' ) ) :
						dynamic_sidebar( 'footer_column_5' );
					endif;
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="Footer__middle">
		<div class="wrapper">
			<div class="Footer__middle__row">
				<div class="Footer__middle__contacts">
					<div class="Footer__middle__title h5"><?php _e( 'Sales contacts', 'ms' ); ?></div>
					<ul>
						<li class="Footer__middle__contacts__phone"><a href="tel:<?php _e( '+421 2 33 456 826', 'ms' ); ?>" title="<?php _e( 'Post Affiliate Pro\'s phone number', 'ms' ); ?>"><?php _e( '+421 2 33 456 826', 'ms' ); ?></a></li>
						<li class="Footer__middle__contacts__phone"><a href="tel:<?php _e( '18888429508', 'ms' ); ?>" title="<?php _e( 'Post Affiliate Pro\'s phone number', 'ms' ); ?>"><?php _e( '+1-888-842-9508', 'ms' ); ?></a></li>
						<li class="Footer__middle__contacts__whatsapp"><a href="https://wa.me/15084695208" title="<?php _e( 'Post Affiliate Pro\'s WhatsApp', 'ms' ); ?>"><?php _e( '+1-508-469-5208', 'ms' ); ?></a></li>
					</ul>
				</div>

				<div class="Footer__middle__social">
					<div class="Footer__middle__title h5"><?php _e( 'Social media', 'ms' ); ?></div>
					<ul class="Footer__social">
						<li>
							<a href="<?php _e( 'https://www.facebook.com/PostAffiliatePro', 'ms' ); ?>" target="_blank"
								 title="<?php _e( 'Post Affiliate Pro\'s Facebook', 'ms' ); ?>">
								<svg>
									<use xlink:href=" <?php echo esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#social-facebook' ); ?>"></use>
								</svg>
							</a>
						</li>
						<li>
							<a href="<?php _e( 'https://x.com/pappro', 'ms' ); ?>" target="_blank"
								 title="<?php _e( 'Post Affiliate Pro\'s X', 'ms' ); ?>" rel="nofollow noopener">
								<svg class="icon icon-social-twitter">
									<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#social-twitter' ); ?>"></use>
								</svg>
							</a>
						</li>
						<li>
							<a href="<?php _e( 'https://www.youtube.com/channel/UC1UGrbCyFlJ9h8eutLCqntw', 'ms' ); ?>" target="_blank"
								 title="<?php _e( 'Post Affiliate Pro\'s YouTube', 'ms' ); ?>" rel="nofollow noopener">
								<svg>
									<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#social-youtube' ); ?>"></use>
								</svg>
							</a>
						</li>
						<li>
							<a href="https://wa.me/15084695208?text=Hi! I am contacting you from <?php the_permalink(); ?>, and I am contacting you about..." target="_blank"
								 title="<?php _e( 'Post Affiliate Pro\'s WhatsApp', 'ms' ); ?>" rel="nofollow noopener">
								<svg>
									<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#social-whatsapp' ); ?>"></use>
								</svg>
							</a>
						</li>
					</ul>
				</div>

				<div class="Footer__middle__newsletter">
					<div class="Footer__middle__title h5"><?php _e( 'Subscribe to our newsletter', 'ms' ); ?></div>
					<?= do_shortcode( '[newsletterform]' ); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="Footer__bottom">
		<div class="wrapper">
			<div class="Footer__bottom__row">
				<div class="Footer__bottom__copyright">
					<p><?php _e( '© 2004-', 'ms' ); ?><?= esc_html( gmdate( 'Y' ) ); ?> <?php _e( 'Quality Unit, LLC. All rights reserved.', 'ms' ); ?></p>
				</div>
				<div class="Footer__bottom__navigation">
					<?php
					if ( has_nav_menu( 'footer_bottom_navigation' ) ) :
						wp_nav_menu(
							array(
								'theme_location' => 'footer_bottom_navigation',
								'menu_class'     => 'nav',
							)
						);
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</footer>

<div class="Kolaciky flowhunt-skip urlslab-skip-all">
	<div class="wrapper">
		<p>
			<?php _e( 'Our website uses cookies. By continuing we assume your permission to deploy cookies as detailed in our', 'ms' ); ?>
			<a
					href="<?php _e( '/privacy-policy/', 'ms' ); ?>"><?php _e( 'privacy and cookies policy', 'ms' ); ?></a><?php _e( '.', 'ms' ); ?>
		</p>

		<div class="Kolaciky__buttons">
			<a href="<?php _e( '/privacy-policy/', 'ms' ); ?>"
				class="Kolaciky__button Kolaciky__button--more Button Button--outline">
				<span><?php _e( 'More Information', 'ms' ); ?></span>
			</a>
			<a href="#" class="Kolaciky__button Kolaciky__button--no Kolaciky__button--more Button Button--outline">
				<span><?php _e( 'Decline', 'ms' ); ?></span>
			</a>
			<a href="#" class="Kolaciky__button Kolaciky__button--yes Button Button--full">
				<span><?php _e( 'Accept', 'ms' ); ?></span>
			</a>
		</div>
	</div>
</div>

<?php
function show_demo_bar() {
	$disabled_urls = array(
		/* EN */'/demo',
		/* EN */'/call',
		'/trial',
		'/thank-you',
		'/login',
		'/pricing',
		'/about',
		'/new-york-office',
		'/blog',
		'/directory',
		'/academy',
		'/templates',
		'/request-for-proposal',
		'/partner-with-us',
		'/affiliate-program',
		'/affiliate-manager',
		'/typing-test',
		'/affiliate-marketing-glossary',
		'/terms-of-service',
		'/privacy-policy',
		'/security-privacy-policy',
		'/bug-bounty-program',
		/* DE */ '/testversion/',
		'/probephase/',
		'/preise/',
		'/ueber-uns/',
		'/buero-in-new-york/',
		'/verzeichnis/',
		'/akademie/',
		'/email-vorlagen/',
		'/anfrage-stellen/',
		'/moechten-sie-partner-werden/',
		'/affiliateprogramm/',
		'/tipptest/',
		'/glossar/',
		'/geschaeftsbedingungen/',
		'/sicherheits-und-datenschutzrichtlinien/',
		'/bug-bounty-programm/',
		/* FR */ '/essai/',
		'/identifiant/',
		'/prix/',
		'/a-propos-de-nous/',
		'/bureau-de-new-york/',
		'/repertoire/',
		'/education/',
		'/modeles-email/',
		'/demande-doffre/',
		'/devenir-partenaire/',
		'/programme-daffiliation/',
		'/test-de-saisie/',
		'/glossaire-de-l-assistance-client/',
		'/termes-conditions/',
		'/politique-de-confidentialite/',
		'/politique-de-securite-et-de-confidentialite/',
		'/programme-prime-bug/',
		/* IT */ '/prova/',
		'/prezzi/',
		'/chi-siamo/',
		'/ufficio-di-new-york/',
		'/accademia/',
		'/template-email/',
		'/richiesta-di-proposta/',
		'/collabora-con-noi/',
		'/programma-di-affiliazione/',
		'/test-di-digitazione/',
		'/glossario/',
		'/termini-condizioni/',
		'/informativa-privacy/',
		'/informativa-sulla-privacy/',
		'/programma-bug-bounty/',
		/* NL */ '/proef/',
		'/prijzen/',
		'/over/',
		'/kantoor-in-new-york/',
		'/adresboek/',
		'/academie/',
		'/email-sjablonen/',
		'/verzoek-om-voorstel/',
		'/wilt-u-samenwerken/',
		'/partner-programma/',
		'/typetest/',
		'/klantenondersteuning-woordenlijst/',
		'/algemene-voorwaarden/',
		'/veiligheid-privacy-beleid/',
		'/bug-bounty-programma/',
		/* ES */ '/prueba/',
		'/iniciar-sesion/',
		'/tarifas/',
		'/sobre-nosotros/',
		'/oficina-de-nueva-york/',
		'/directorio/',
		'/academia/',
		'/plantillas-correo-electronico/',
		'/solicitud-de-propuesta/',
		'/quiere-asociarse/',
		'/programa-de-afiliados/',
		'/prueba-de-tipeo/',
		'/glosario/',
		'/terminos-y-condiciones/',
		'/politica-de-privacidad/',
		'/politica-de-privacidad-y-de-seguridad/',
		'/programa-bug-bounty/',
		/* PT */ '/demonstracao/',
		'/teste-gratuito/',
		'/precos/',
		'/sobre-nos/',
		'/escritorio-em-nova-york/',
		'/diretorio/',
		'/academia/',
		'/modelos-de-e-mail/',
		'/solicitacao-de-proposta/',
		'/quer-ser-parceiro/',
		'/programa-de-afiliados/',
		'/teste-de-digitacao/',
		'/glossario/',
		'/termos-e-condicoes/',
		'/politica-de-privacidade/',
		'/politica-de-privacidade-e-seguranca/',
		'/programa-caca-aos-bugs/',
		/* PL */ '/wersja-probna/',
		'/zaloguj-sie/',
		'/cennik/',
		'/o-nas/',
		'/biuro-w-nowym-jorku/',
		'/katalog/',
		'/akademia/',
		'/szablony-e-maili/',
		'/prosba-o-propozycje/',
		'/rozpocznij-wspolprace/',
		'/program-partnerski/',
		'/test-pisania/',
		'/slowniczek/',
		'/regulamin/',
		'/polityka-prywatnosci/',
		'/polityka-bezpieczenstwa-i-prywatnosci/',
		'/program-bug-bounty/',
		/* HU */ '/proba/',
		'/belepes/',
		'/arazas/',
		'/rolunk/',
		'/new-york-iroda/',
		'/konyvtar/',
		'/akademia/',
		'/email-sablonok/',
		'/ajanlatkeres/',
		'/tarsuljon-velunk/',
		'/partnerprogram/',
		'/gepelesi-teszt/',
		'/szojegyzek/',
		'/altalanos-szerzodesi-feltetelek/',
		'/adatvedelmi-szabalyzat/',
		'/biztonsagi-adatvedelmi-politika/',
		'/bug-bounty-program/',
		/* SK */ '/ukazka-softveru/',
		'/skusobna-verzia/',
		'/prihlasenie/',
		'/cennik/',
		'/o-nas/',
		'/adresar/',
		'/akademia/',
		'/sablony/',
		'/test-pisania/',
		'/slovnik-zakaznickej-podpory/',
	);

	foreach ( $disabled_urls as $url ) {
		if ( isset( $_SERVER['REQUEST_URI'] ) ) {
			if ( strpos( esc_url_raw( $_SERVER['REQUEST_URI'] ), $url ) !== false ) {
				return false;
			}
		}
	}

	return true;
}

if ( show_demo_bar() !== false ) {
	?>
	<div id="demobar" class="DemoBar__wrapper wrapper">
		<div class="DemoBar">
			<span class="DemoBar__close" id="demobar-close">&times;</span>
			<div class="DemoBar__main">
				<h3 class="DemoBar__title">
					<?php _e( '<strong>Schedule a one-on-one call</strong> and discover how Post Affiliate Pro can benefit your business.', 'ms' ); ?>
				</h3>
				<div class="DemoBar__dates">
					<svg class=DemoBar__dates--icon" height="24" viewBox="0 0 25 24" width="25" xmlns="http://www.w3.org/2000/svg">
						<path d="m14.9678 17.7c1.3807 0 2.5-1.1193 2.5-2.5s-1.1193-2.5-2.5-2.5-2.5 1.1193-2.5 2.5 1.1193 2.5 2.5 2.5z"
									fill="#1ac65f" />
						<g fill="#fff">
							<path
									d="m16.4678 1v2h-8.00003v-2h-2v2h-1c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14.00003c1.1 0 2-.9 2-2v-14c0-1.1-.9-2-2-2h-1v-2zm3 18h-14.00003v-11h14.00003z" />
							<path d="m10.7676 14.2h-2.00002v2h2.00002z" />
							<path d="m10.7676 9.29999h-2.00002v2.00001h2.00002z" />
							<path d="m15.9678 9.29999h-2v2.00001h2z" />
						</g>
					</svg>
					<p class="DemoBar__dates--text"><?php _e( 'We’re available on multiple dates', 'ms' ); ?></p>
				</div>
			</div>
			<a href="<?php _e( '/demo/', 'ms' ); ?>"
				onclick="ga( 'send', 'event', 'Demo bar Button', 'start', 'Schedule a call' )"
				class="DemoBar__button Button Button--full">
				<span><?php _e( 'Schedule a call', 'ms' ); ?></span>
			</a>
		</div>
	</div>
<?php } ?>

<div class="trial__sticky__button">
	<a href="<?= esc_url( '/trial/' ); ?>"><?= esc_html( 'Start a Free Trial', 'ms' ); ?></a>
	<span class="trial__sticky__button--close"><svg class="icon-close"><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?' . THEME_VERSION . '#close' ); ?>"></use></svg></span>
</div>
