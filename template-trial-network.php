<?php
/**
 * Template Name: Network Trial
 */
?>

<div class="FullScreen">
	<div class="FullScreen__wrap flex">
		<div class="FullScreen__sidebar">
			<a class="FullScreen__sidebar__logo" href="<?= esc_url( home_url( '/network/', 'relative' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" onclick="_paq.push(['trackEvent', 'Activity', 'Header', 'Logo'])">
				<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/logo-pan.svg" alt="<?php bloginfo( 'name' ); ?>">
			</a>
			<p class="FullScreen__sidebar__item__text large">
				<?php _e( 'The Post Affiliate Network™ platform powers over 30,000 affiliate programs', 'ms' ); ?>
			</p>
			<br />

			<p class="whatyouget"><strong><?php _e( 'What we offer', 'ms' ); ?></strong></p>

			<ul class="checklist">
				<li><?php _e( 'Free full setup + website integration', 'ms' ); ?></li>
				<li><?php _e( 'Support 365 days a year', 'ms' ); ?></li>
				<li><?php _e( 'Free lifetime updates', 'ms' ); ?></li>
			</ul>

			<p class="small"><?php _e( 'and much more…', 'ms' ); ?></p>

			<div class="talkingHead">
				<img class="talkingHead-image" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/talkinghead_brian.jpg" alt="<?php bloginfo( 'Andrej Saxon' ); ?>">
				<div class="talkingHead-text">
					<p>
						<strong>
							<?php
							_e(
								"“Let's discuss the details about the affiliate program together!”",
								'ms'
							)
							?>
						</strong>
					</p>
					<p class="regular">Andrej Saxon<br />
						<strong><?php _e( 'Sales manager', 'ms' ); ?></strong>
					</p>
				</div>
			</div>


		</div>

		<div class="FullScreen__main">
			<div class="FullScreen__main__container">
				<div class="fifty-fifty flex">
					<a href="<?php _e( '/trial/', 'ms' ); ?>" class="Button Button--narrow Button--outline Button--outline-light Button--icon">
						<svg viewBox="0 0 22 19" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M1.331 12.407a4.549 4.549 0 0 1 3.214-1.331h7.273a4.545 4.545 0 0 1 4.546 4.545v1.819a.909.909 0 0 1-1.818 0v-1.819a2.73 2.73 0 0 0-2.728-2.727H4.545a2.728 2.728 0 0 0-2.727 2.727v1.819a.909.909 0 0 1-1.818 0v-1.819c0-1.205.479-2.361 1.331-3.214zM8.182 1.985a2.727 2.727 0 1 0 0 5.454 2.727 2.727 0 0 0 0-5.454zM3.636 4.712a4.545 4.545 0 1 1 9.09 0 4.545 4.545 0 0 1-9.09 0zM17.302 11.876a.909.909 0 0 1 1.107-.653 4.546 4.546 0 0 1 3.409 4.398v1.819a.909.909 0 0 1-1.818 0v-1.818a2.728 2.728 0 0 0-2.045-2.638.909.909 0 0 1-.653-1.108zM13.665.969a.91.91 0 0 1 1.106-.656 4.545 4.545 0 0 1 0 8.807.909.909 0 1 1-.451-1.761 2.729 2.729 0 0 0 0-5.284.91.91 0 0 1-.655-1.106z"/></svg>
						<span>&nbsp;<?php _e( 'Post Affiliate Pro', 'ms' ); ?></span>
					</a>
					<a href="<?php _e( '/network/trial/', 'ms' ); ?>" class="Button Button--full Button--narrow Button--icon">
						<svg viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M10.077 1.82a8.257 8.257 0 1 0 0 16.515 8.257 8.257 0 0 0 0-16.515zM0 10.077C0 4.511 4.511 0 10.077 0c5.565 0 10.076 4.511 10.076 10.077 0 5.565-4.511 10.076-10.076 10.076C4.511 20.153 0 15.642 0 10.077z" /><path d="M0 10.077a.91.91 0 0 1 .91-.911h18.333a.91.91 0 0 1 0 1.821H.91a.91.91 0 0 1-.91-.91z" /><path d="M7.32 10.077a13.117 13.117 0 0 0 2.757 7.756 13.116 13.116 0 0 0 2.756-7.756 13.113 13.113 0 0 0-2.756-7.756 13.114 13.114 0 0 0-2.757 7.756zM10.077.91 9.405.296A14.937 14.937 0 0 0 5.5 10.058v.038a14.936 14.936 0 0 0 3.905 9.761.908.908 0 0 0 1.344 0 14.935 14.935 0 0 0 3.904-9.761v-.038A14.936 14.936 0 0 0 10.749.296l-.672.614z" /></svg>
						<span>&nbsp;<?php _e( 'Post Affiliate Network', 'ms' ); ?></span>
					</a>
				</div>

				<h1 class="FullScreen__main__container__title"><?php _e( 'Free 14-Day <span class="highlight highlight-splash">Trial</span>', 'ms' ); ?></h1>
				<p class="small"><?php _e( "Sign up for Post Affiliate Network™ in less than 60 seconds. Enjoy testing every feature from our All-Inclusive plan starting today. Once your trial expires, your account's features will be adjusted according to the plan you've selected.", 'ms' ); ?></p>

				<?= do_shortcode( '[signupform-network]' ); ?>
				<?= do_shortcode( '[fullscreenlogos logos=3]' ); ?>
			</div>
		</div>
	</div>
</div>
