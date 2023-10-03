<?php
	/**
	 * Template Name: Trial Network
	 */

	set_source( 'trial', 'pages/TrialRedesign', 'css' );
?>

<div class="Trial FullScreen">
	<a href="<?= esc_url( home_url( '/', 'relative' ) ); ?>" class="Trial__logo__top" onclick="_paq.push(['trackEvent', 'Activity', 'Header', 'Trial Logo'])">
		<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/pap-logo.svg" alt="<?php bloginfo( 'name' ); ?>" class="urlslab-skip-lazy">
	</a>

	<div class="Trial__container">
		<div class="Trial__sidebar urlslab-min-width-1024">
			<div class="Trial__sidebar__inner">
				<div class="Trial__sidebar__content checklist">
				<p class="Trial__sidebar__title"><?php _e( 'Over 10,000 affiliate programs powered by Post Affiliate Network™ and counting!', 'ms' ); ?></p>
					<h3 class="Trial__sidebar__checklist__title"><?php _e( 'What you will get', 'ms' ); ?></h3>
					<ul>
						<li><?php _e( 'Unlimited affiliates and multiple merchant accounts', 'ms' ); ?></li>
						<li><?php _e( 'Full control over network customization', 'ms' ); ?></li>
						<li><?php _e( 'Free setup, web integration, and lifetime updates', 'ms' ); ?></li>
					</ul>
					<p class="Trial__sidebar__content__footer"><?php _e( 'and much more....', 'ms' ); ?></p>
				</div>
				<div class="Trial__sidebar__affiliate__program__img">
				<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/trial_sidebar_affiliate_network.png" alt="<?php _e( 'affiliate program', 'ms' ); ?>" class="urlslab-skip-lazy">
				</div>
			</div>
		</div>
		<div class="Trial__main">
			<div class="AwardsHeroHeader"><img class="AwardsHeroHeader__text" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/heroHeadline_award_badges_text.svg" alt="Awards" /><?= do_shortcode( '[awards_small posts=3]' ); ?></div>
			<div class="Trial__main__inner">
				<div class="Trial__main__tabs flex">
					<a href="<?php _e( '/trial/', 'ms' ); ?>" class="Button Button--outline Button--outline-light Button--narrow Button--icon">
						<svg viewBox="0 0 22 19" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M1.331 12.407a4.549 4.549 0 0 1 3.214-1.331h7.273a4.545 4.545 0 0 1 4.546 4.545v1.819a.909.909 0 0 1-1.818 0v-1.819a2.73 2.73 0 0 0-2.728-2.727H4.545a2.728 2.728 0 0 0-2.727 2.727v1.819a.909.909 0 0 1-1.818 0v-1.819c0-1.205.479-2.361 1.331-3.214zM8.182 1.985a2.727 2.727 0 1 0 0 5.454 2.727 2.727 0 0 0 0-5.454zM3.636 4.712a4.545 4.545 0 1 1 9.09 0 4.545 4.545 0 0 1-9.09 0zM17.302 11.876a.909.909 0 0 1 1.107-.653 4.546 4.546 0 0 1 3.409 4.398v1.819a.909.909 0 0 1-1.818 0v-1.818a2.728 2.728 0 0 0-2.045-2.638.909.909 0 0 1-.653-1.108zM13.665.969a.91.91 0 0 1 1.106-.656 4.545 4.545 0 0 1 0 8.807.909.909 0 1 1-.451-1.761 2.729 2.729 0 0 0 0-5.284.91.91 0 0 1-.655-1.106z"/></svg>
						<span>&nbsp;<?php _e( 'Affiliate Program', 'ms' ); ?></span>
					</a>
					<a href="<?php _e( '/network/trial/', 'ms' ); ?>" class="Button Button--narrow Button--full Button--icon">
						<svg viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M10.077 1.82a8.257 8.257 0 1 0 0 16.515 8.257 8.257 0 0 0 0-16.515zM0 10.077C0 4.511 4.511 0 10.077 0c5.565 0 10.076 4.511 10.076 10.077 0 5.565-4.511 10.076-10.076 10.076C4.511 20.153 0 15.642 0 10.077z" /><path d="M0 10.077a.91.91 0 0 1 .91-.911h18.333a.91.91 0 0 1 0 1.821H.91a.91.91 0 0 1-.91-.91z" /><path d="M7.32 10.077a13.117 13.117 0 0 0 2.757 7.756 13.116 13.116 0 0 0 2.756-7.756 13.113 13.113 0 0 0-2.756-7.756 13.114 13.114 0 0 0-2.757 7.756zM10.077.91 9.405.296A14.937 14.937 0 0 0 5.5 10.058v.038a14.936 14.936 0 0 0 3.905 9.761.908.908 0 0 0 1.344 0 14.935 14.935 0 0 0 3.904-9.761v-.038A14.936 14.936 0 0 0 10.749.296l-.672.614z" /></svg>
						<span>&nbsp;<?php _e( 'Affiliate Network', 'ms' ); ?></span>
					</a>
				</div>
				<h1 class="Trial__main__title"><?php _e( 'Try Our 1-Month <span class="highlight-background">Free Trial</span>', 'ms' ); ?></h1>
				<p class="Trial__main__text"><?php _e( 'Experience working with PostAffiliatePro for free with our 7-day or 30-day trial. Enjoy testing every feature needed for your business starting today.', 'ms' ); ?></p>

				<?= do_shortcode( '[signupform-network]' ); ?>

				<div class="Trial__main__logos">
					<div class="Trial__main__logo">
						<a href="<?php _e( '/awards/', 'ms' ); ?>">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/rating_capterra.svg" alt="<?php _e( 'Capterra', 'ms' ); ?>" class="urlslab-skip-lazy">
						</a>
					</div>

					<div class="Trial__main__logo">
						<a href="<?php _e( '/awards/', 'ms' ); ?>">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/rating_g2.svg" alt="<?php _e( 'G2 Crowd', 'ms' ); ?>" class="urlslab-skip-lazy">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
