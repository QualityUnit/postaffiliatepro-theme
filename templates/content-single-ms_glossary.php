<?php // @codingStandardsIgnoreLine ?>
<div class="Post" itemscope itemtype="http://schema.org/TechArticle">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="PostAffiliatePro"></span>

	<div class="Post__header customer-support-glossary ">
		<div class="wrapper__wide"></div>
	</div>

	<div class="wrapper__wide Post__container">
		<div class="Post__sidebar">
			<?php if ( boolval( get_post_meta( get_the_ID(), 'mb_glossary_mb_glossary_related-articles', true ) ) ) { ?>
				<div class="Post__sidebar__related">
					<h4 class="Post__sidebar__title"><?php _e( 'Related Articles', 'ms' ); ?></h4>
					<?= wp_kses_post( get_post_meta( get_the_ID(), 'mb_glossary_mb_glossary_related-articles', true ) ) ?>
				</div>
			<?php } ?>

			<?php if ( sidebar_toc() !== false ) { ?>
				<div class="SidebarTOC-wrapper">
					<div class="SidebarTOC Post__SidebarTOC">
						<strong class="SidebarTOC__title"><?php _e( 'Contents', 'ms' ); ?></strong>
						<div class="SidebarTOC__slider slider splide">
							<div class="splide__track">
								<ul class="SidebarTOC__content splide__list">
									<?= wp_kses_post( sidebar_toc() ); ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div class="Signup__sidebar-wrapper">
			<?= do_shortcode( '[signup-sidebar]' ); ?>
		</div>

		<div class="Post__content">
			<div class="Post__logo">
				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail( 'logo_thumbnail' ); ?>
				<?php } else { ?>
					<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-book.svg" alt="<?php _e( 'Glossary', 'ms' ); ?>">
				<?php } ?>
			</div>
			<div class="Post__content__breadcrumbs">
				<ul>
					<li><a href="<?php _e( '/affiliate-marketing-glossary/', 'ms' ); ?>"><?php _e( 'Affiliate Marketing Glossary', 'ms' ); ?></a></li>
					<li><?php the_title(); ?></li>
				</ul>
			</div>

			<h1 itemprop="name"><?php the_title(); ?></h1>

			<div class="Content" itemprop="articleBody">
				<?php the_content(); ?>

				<?php if ( get_post_meta( get_the_ID(), 'mb_glossary_mb_glossary_faq-q1', true ) ) { ?>
					<div class="Post__m__negative Faq" itemscope itemtype="https://schema.org/FAQPage">
						<h2 id="faq">
							<?php
							$headline = __( 'Frequently asked questions', 'ms' );
							$words    = explode( ' ', $headline );
							$counter  = 0;
							foreach ( $words as $word ) {
								if ( 0 === $counter ) {
									echo '<span class="highlight highlight-splash3">' . esc_html( $words[0] ) . '</span>';
								} else {
									echo ' ';
									echo esc_html( $word );
								}
								$counter++;
							}
							echo '</h2>';
							if ( get_post_meta( get_the_ID(), 'mb_glossary_mb_glossary_faq-text', true ) ) {
								?>
								<div class="subhead--wrapper">
									<p class="subhead"><?= esc_html( get_post_meta( get_the_ID(), 'mb_glossary_mb_glossary_faq-text', true ) ); ?></p>
								</div>
								<?php
							}
							for ( $i = 1; $i <= 10; ++$i ) {
								if ( get_post_meta( get_the_ID(), 'mb_glossary_mb_glossary_faq-q' . $i, true ) ) {
									?>
									<div class="Faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
										<h3 itemprop="name"><?= esc_html( get_post_meta( get_the_ID(), 'mb_glossary_mb_glossary_faq-q' . $i, true ) ); ?></h3>
										<div class="Faq__outer-wrapper" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
											<div class="Faq__inner-wrapper" itemprop="text">
												<p><?= wp_kses_post( get_post_meta( get_the_ID(), 'mb_glossary_mb_glossary_faq-a' . $i, true ) ); ?></p>
											</div>
										</div>
									</div>
									<?php
								}
							}
							?>
					</div>
				<?php } ?>

				<div class="Post__buttons">
					<a href="<?php _e( '/affiliate-marketing-glossary/', 'ms' ); ?>" class="Button Button--outline Button--back" onclick="_paq.push(['trackEvent', 'Activity', 'Glossary', 'Back to Glossary'])"><span></span><?php _e( 'Back to Glossary', 'ms' ); ?></span></a>

					<a href="<?php _e( '/trial/', 'ms' ); ?>" class="Button Button--full" onclick="_paq.push(['trackEvent', 'Activity', 'Glossary', 'Sign Up Trial'])">
						<span><?php _e( 'Create account for FREE', 'ms' ); ?></span>
					</a>
				</div>

				<div class="Post__content__resources Post__m__negative">
					<div class="Post__sidebar__title h4"><?php _e( 'Related Resources', 'ms' ); ?></div>

					<div class="SimilarSources">
						<?php echo do_shortcode( '[urlslab-related-resources]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
