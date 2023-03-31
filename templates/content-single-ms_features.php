<?php // @codingStandardsIgnoreLine
$current_lang    = apply_filters( 'wpml_current_language', null );
$header_category = get_en_category( 'ms_features', $post->ID );
do_action( 'wpml_switch_language', $current_lang );
?>


<div class="Post" itemscope itemtype="http://schema.org/TechArticle">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="PostAffiliatePro"></span>

	<div class="Post__header features <?= esc_attr( $header_category ); ?>">
		<div class="wrapper__wide"></div>
	</div>

	<div class="wrapper__wide Post__container">
		<div class="Post__sidebar">
			<div class="Post__sidebar__categories">
				<h4 class="Post__sidebar__title"><?php _e( 'Categories', 'ms' ); ?></h4>
				<ul class="CategoryTags">
					<?php
					$current_id = apply_filters( 'wpml_object_id', $post->ID, 'ms_features' );
					$categories = get_the_terms( $current_id, 'ms_features_categories' );

					if ( $categories ) {
						foreach ( $categories as $category ) {
							$category_id    = $category->term_id;
							$category_name  = $category->name;
							$category_color = get_term_meta( $category_id, 'category_color', true );
							?>
							<li class="CategoryTag <?= esc_attr( $category_color ); ?>">
								<a href="../#<?= esc_attr( $category->slug ); ?>" title="<?= esc_attr( $category_name ); ?>"><?= esc_html( $category_name ); ?></a>
							</li>
							<?php
						}
					}
					?>
				</ul>
			</div>

			<div class="Post__sidebar__available">
				<h4 class="Post__sidebar__title"><?php _e( 'Available in', 'ms' ); ?></h4>
				<ul>
					<?php
					if ( get_post_meta( get_the_ID(), 'mb_features_mb_features_plan', true ) ) {
						foreach ( get_post_meta( get_the_ID(), 'mb_features_mb_features_plan', true ) as $item ) {
							if ( 'pro' === $item ) {
								echo "<li class='" . esc_attr( $item ) . "'>Post Affiliate Pro</li>";
							}
							if ( 'ultimate' === $item ) {
								echo "<li class='" . esc_attr( $item ) . "'>Post Affiliate Pro Ultimate</li>";
							}
							if ( 'network' === $item ) {
								echo "<li class='" . esc_attr( $item ) . "'>Post Affiliate Network</li>";
							}
						}
					}
					?>
				</ul>
			</div>

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
			<div class="Post__logo Post__logo--features">
				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail( 'logo_thumbnail' ); ?>
				<?php } else { ?>
					<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-custom-post_type.svg" alt="<?php _e( 'Integration', 'ms' ); ?>">
				<?php } ?>
			</div>
			<div class="Post__content__breadcrumbs">
				<ul>
					<li><a href="<?php _e( '/features/', 'ms' ); ?>"><?php _e( 'Features', 'ms' ); ?></a></li>
					<li><?php the_title(); ?></li>
				</ul>
			</div>

			<h1 itemprop="name"><?php the_title(); ?></h1>

			<div class="Content" itemprop="articleBody">
				<?php the_content(); ?>

				<div class="Post__content__resources">
					<div class="Post__sidebar__title h4"><?php _e( 'Related Articles', 'ms' ); ?></div>

					<div class="SimilarSources">
						<div class="urlslab-rel-res-items urlslab-skip-all urlslab-rel-res-items-with-image urlslab-rel-res-items-with-summary"><div class="urlslab-rel-res-item"><a href="https://www.liveagent.com/desk-com-alternative/" title="See why LiveAgent is the best alternative to Desk.com. Find out the benefits and sign up for a free 14-day, no strings attached trial today."><div class="urlslab-rel-res-item-screenshot"><img alt="See why LiveAgent is the best alternative to Desk.com. Find out the benefits and sign up for a free 14-day, no strings attached trial today." src="https://api.urlslab.com/v1/public/screenshot/thumbnail/carousel/bfe918060ec1f367/8c16e890355100c5/1679427658"></div><div class="urlslab-rel-res-item-text"><p class="urlslab-rel-res-item-title">Desk.com alternative - LiveAgent</p><p class="urlslab-rel-res-item-summary">LiveAgent offers a free, automated white glove migration service for Desk.com customers looking to switch to their multi-channel help desk software. Their features include powerful helpdesk ticketing software, live chat with real-time typing view, and built-in cloud-based call center software, as well as over 40 integrations and plugins, 40 available language translations, and dozens of reports and insights. Desk.com products are likely to receive limited technical and customer support, while LiveAgent receives new product updates every 2-3 weeks to enhance both stability and functionality.</p></div></a></div><div class="urlslab-rel-res-item"><a href="https://www.liveagent.com/industry/banking-insurance/" title="As banking industry is moving to the digital world it is necessary to fulfill the needs of the customers also there. LiveAgent can help you with that."><div class="urlslab-rel-res-item-screenshot"><img alt="As banking industry is moving to the digital world it is necessary to fulfill the needs of the customers also there. LiveAgent can help you with that." src="https://api.urlslab.com/v1/public/screenshot/thumbnail/carousel/bfe918060ec1f367/6def76751927b1e2/1679392945"></div><div class="urlslab-rel-res-item-text"><p class="urlslab-rel-res-item-title">Banking &amp; Insurance | LiveAgent</p><p class="urlslab-rel-res-item-summary">LiveAgent is a help desk software recommended for banking and insurance industries. It offers a 14-day free trial with no setup fee and 24/7 customer service. The software can increase advocacy, improve response times and reduce ticket volume. It contains a knowledge base and automated ticket routing. LiveAgent also invests in providing customers with class-leading help desk.</p></div></a></div><div class="urlslab-rel-res-item"><a href="https://www.liveagent.com/onedesk-alternative/" title="Your search for a OneDesk alternative is over. Switch to LiveAgent and get a multi-channel ticketing system that also supports social media."><div class="urlslab-rel-res-item-screenshot"><img alt="Your search for a OneDesk alternative is over. Switch to LiveAgent and get a multi-channel ticketing system that also supports social media." src="https://api.urlslab.com/v1/public/screenshot/thumbnail/carousel/bfe918060ec1f367/e5454bc753d1e139/1679922540"></div><div class="urlslab-rel-res-item-text"><p class="urlslab-rel-res-item-title">OneDesk alternative - LiveAgent</p><p class="urlslab-rel-res-item-summary">LiveAgent is touted as the best alternative to OneDesk in the market. There are no setup fees, round-the-clock customer service, and no requirement for a credit card or commitment. LiveAgent is an easy-to-use solution that assists you in managing any customer inquiries. You can support your customers from a single platform servicing email, live chat, call center, customer portal and social media. Try it for 14 days for free.</p></div></a></div><div class="urlslab-rel-res-item"><a href="https://www.liveagent.com/service-desk-software/" title="LiveAgent is fully-featured service desk software that uses a ticketing system to combine all of your service desk processes."><div class="urlslab-rel-res-item-screenshot"><img alt="LiveAgent is fully-featured service desk software that uses a ticketing system to combine all of your service desk processes." src="https://api.urlslab.com/v1/public/screenshot/thumbnail/carousel/bfe918060ec1f367/e4c358cbc24bb493/1679426835"></div><div class="urlslab-rel-res-item-text"><p class="urlslab-rel-res-item-title">Best service desk software 2023 (Free Trial) | LiveAgent</p><p class="urlslab-rel-res-item-summary">LiveAgent offers service desk software that streamlines customer interactions and helps teams deliver exceptional customer service experiences. The software uses a ticketing system to combine all service desk processes, making it easier for teams to collaborate and build lasting relationships with customers. LiveAgent also offers a free trial with no setup fee, 24/7 customer service, and the option to cancel at any time.</p></div></a></div><div class="urlslab-rel-res-item"><a href="https://www.liveagent.com/helpshift-alternative/" title="Looking to migrate from Helpshift to a different customer service software? Check out LiveAgent and find out if it's the right fit for you."><div class="urlslab-rel-res-item-screenshot"><img alt="Looking to migrate from Helpshift to a different customer service software? Check out LiveAgent and find out if it's the right fit for you." src="https://api.urlslab.com/v1/public/screenshot/thumbnail/carousel/bfe918060ec1f367/3a0c15783be8b1a8/1679427636"></div><div class="urlslab-rel-res-item-text"><p class="urlslab-rel-res-item-title">Helpshift alternative - LiveAgent</p><p class="urlslab-rel-res-item-summary">LiveAgent is being highlighted as the best Helpshift alternative with a free trial period and round-the-clock customer support without the need for a credit card. The software offers an omnichannel solution for improving customer engagement and service desk feedback. It is suitable for all kinds of businesses.</p></div></a></div><div class="urlslab-rel-res-item"><a href="https://www.liveagent.com/industry/retail/" title="LiveAgent helps retail industry with providing the best possible customer service. LiveAgent - one omnichannel solution to satisfy every customer."><div class="urlslab-rel-res-item-screenshot"><img alt="LiveAgent helps retail industry with providing the best possible customer service. LiveAgent - one omnichannel solution to satisfy every customer." src="https://api.urlslab.com/v1/public/screenshot/thumbnail/carousel/bfe918060ec1f367/4880195156ee4d18/1679427215"></div><div class="urlslab-rel-res-item-text"><p class="urlslab-rel-res-item-title">Helpdesk Software for Retail Industry | LiveAgent</p><p class="urlslab-rel-res-item-summary">LiveAgent is a helpdesk software for the retail industry that can improve customer service and increase satisfaction. It offers a free trial with no setup fee, customer service available 24/7, and can reduce ticket volume by 37%. It also boasts a 4x boost in advocacy and can decrease response times by 24%. Users can start a free trial for 7 or 30 days with a free email, and no credit card is required.</p></div></a></div><div class="urlslab-rel-res-item"><a href="https://www.liveagent.com/alternatives/" title="Great customer service starts with specific help desk software comparison. Try LiveAgent with a 14-day free trial. Build relationships, Increase sales."><div class="urlslab-rel-res-item-screenshot"><img alt="Great customer service starts with specific help desk software comparison. Try LiveAgent with a 14-day free trial. Build relationships, Increase sales." src="https://api.urlslab.com/v1/public/screenshot/thumbnail/carousel/bfe918060ec1f367/9c177921f93c8fa9/1679427657"></div><div class="urlslab-rel-res-item-text"><p class="urlslab-rel-res-item-title">Help Desk Software Comparison | LiveAgent</p><p class="urlslab-rel-res-item-summary">The article discusses the search for help desk software alternatives and highlights LiveAgent as the best option on the market. It boasts no setup fee, 24/7 customer service, and no credit card required with a 14-day free trial. The article urges readers to test LiveAgent, which offers more than 175 help desk features, including email, live chat, call center, and social media support. The setup is quick and easy, taking up to 5 minutes. A free trial is offered for 7 or 30 days, and no credit card is required.</p></div></a></div><div class="urlslab-rel-res-item"><a href="https://www.liveagent.com/extend-alternative/" title="Are you looking for something to extend your help desk capabilities? See LiveAgent's key features and benefits now or sign up for a free trial."><div class="urlslab-rel-res-item-screenshot"><img alt="Are you looking for something to extend your help desk capabilities? See LiveAgent's key features and benefits now or sign up for a free trial." src="https://api.urlslab.com/v1/public/screenshot/thumbnail/carousel/bfe918060ec1f367/8fedf79eb8a355b8/1679426454"></div><div class="urlslab-rel-res-item-text"><p class="urlslab-rel-res-item-title">Extend alternative - LiveAgent</p><p class="urlslab-rel-res-item-summary">Looking for an alternative to Extend? LiveAgent is the best option on the market, offering 24/7 customer service, no setup fees or credit card requirements, and the ability to cancel anytime. It's packed with useful tools and integrations for your customer support needs. Try it out for free with a 7 or 30-day trial.</p></div></a></div></div>

						<?php echo do_shortcode( '[urlslab-related-resources related-count="4" show-image="true" show-summary="true"]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
