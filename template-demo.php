<?php
/**
 * Template Name: Demo
 */
?>

<div class="FullScreenOld">
	<a href="<?= esc_url( home_url( '/', 'relative' ) ); ?>" class="FullScreenOld__logo" onclick="_paq.push(['trackEvent', 'Activity', 'Header', 'Demo Logo'])">
		<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/pap-logo_white.svg" alt="<?php bloginfo( 'name' ); ?>">
	</a>

	<div class="FullScreenOld__sidebar">
		<div class="slider splide">
			<div class="splide__track">
				<div class="splide__list">
					<div class="splide__slide FullScreenOld__sidebar__item FullScreenOld__sidebar__item--demo" style="background-image: url(<?= esc_url( home_url( '/', 'relative' ) ); ?>app/uploads/2020/01/bg_demo_michaela.jpg);">
						<div class="FullScreenOld__sidebar__item__text">
							<?php _e( '<p>“Wanna find out how to track everything in one software? Let’s chat to find out about all the features in Post Affiliate Pro and you can decide for yourself.”</p><p>Michaela Gombarova, <strong>Sales Manager</strong></p>', 'ms' ); ?>
						</div>
					</div>

					<div class="splide__slide FullScreenOld__sidebar__item FullScreenOld__sidebar__item--demo" style="background-image: url(<?= esc_url( home_url( '/', 'relative' ) ); ?>app/uploads/2020/01/bg_demo_tomas.jpg);">
						<div class="FullScreenOld__sidebar__item__text">
							<?php _e( '<p>"Lumberjack shirt? Check! Laptop for the demo? Check! Notepad for ideas? Check! Are you ready?"</p><p>Tomas Varga, <strong>Sales Manager</strong></p>', 'ms' ); ?>
						</div>
					</div>

					<div class="splide__slide FullScreenOld__sidebar__item FullScreenOld__sidebar__item--demo" style="background-image: url(<?= esc_url( home_url( '/', 'relative' ) ); ?>app/uploads/2020/01/bg_demo_andrej.jpg);">
						<div class="FullScreenOld__sidebar__item__text">
							<?php _e( '<p>"Approach each customer with the idea of helping him or her to solve a problem or achieve a goal, not of selling a product or service." – Brian Tracy</p><p>Andrej Saxon, <strong>Sales Manager</strong></p>', 'ms' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="FullScreenOld__main FullScreenOld__main--long">
		<div class="FullScreenOld__main__container">

			<img class="FullScreenOld__main__container__image" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/pap-logo.svg" alt="<?php bloginfo( 'name' ); ?>">

			<h1 class="FullScreenOld__main__container__title"><?php _e( 'Schedule a Call', 'ms' ); ?></h1>
			<p class="FullScreenOld__main__container__text"><?php _e( 'Get a jump start on the competition and schedule a one-on-one call with one of our customer success representatives, to see how Post Affiliate Pro can benefit your business.', 'ms' ); ?></p>

			<script type="text/javascript">
				(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
						'//support.qualityunit.com/scripts/track.js',
						function(e){ LiveAgent.createForm('4v6gqpts', e); });
			</script>

		</div>
	</div>
</div>

</div>
