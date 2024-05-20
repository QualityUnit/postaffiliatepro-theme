<?php
/**
 * Template Name: Thank You
 */

use QualityUnit\Trial_Signup;
set_source( 'thank-you', 'pages/ThankYou', 'css' );
Trial_Signup::include_crm_installer();
?>

<div data-id="signup-trial-installation" id="loader" class="urlslab-skip-all">
	<div class="loaderIn">

		<div class="BuildingApp">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/pap-logo.svg"
					alt="<?php bloginfo( 'name' ); ?>" class="BuildingApp__logo">

			<h2 class="BuildingHeader BuildingApp__title BuildingApp--desktop">
				<?php _e( 'Building Your Post Affiliate Pro...', 'ms' ); ?></h2>
			<p class="BuildingText BuildingApp__text BuildingApp--desktop">
				<?php _e( 'We appreciate your recent sign up for a Post Affiliate Pro. <br>A message will be sent to your email address containing login details, right after your account is installed. <br>If you wait for a while, after installation is complete you will be able to access your account directly from here.', 'ms' ); ?>
			</p>

			<h2 class="BuildingHeader BuildingApp__title BuildingApp--mobile">
				<?php _e( 'We are currently building your Post Affiliate Pro dashboard...', 'ms' ); ?></h2>
			<p class="BuildingTextBuildingApp__text BuildingApp--mobile">
				<?php _e( 'After the process is over, we will send the login details to your mailbox.', 'ms' ); ?></p>

			<h4 id="BuildingSubheader" class="BuildingApp__subtitle"><?php _e( 'Installation status', 'ms' ); ?></h4>

			<div class="progressHeart" id="progressHeart">
				<span class="percentage">0%</span>
				<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" viewBox="0 0 100 100">
					<path fill-opacity="0" stroke-width="1" stroke="#f4f4f4"
								d="M81.495,13.923c-11.368-5.261-26.234-0.311-31.489,11.032C44.74,13.612,29.879,8.657,18.511,13.923  C6.402,19.539,0.613,33.883,10.175,50.804c6.792,12.04,18.826,21.111,39.831,37.379c20.993-16.268,33.033-25.344,39.819-37.379  C99.387,33.883,93.598,19.539,81.495,13.923z">
					</path>
					<path id="heart-1" fill-opacity="0" stroke-width="3" stroke="#ED6A5A"
								d="M81.495,13.923c-11.368-5.261-26.234-0.311-31.489,11.032C44.74,13.612,29.879,8.657,18.511,13.923  C6.402,19.539,0.613,33.883,10.175,50.804c6.792,12.04,18.826,21.111,39.831,37.379c20.993-16.268,33.033-25.344,39.819-37.379  C99.387,33.883,93.598,19.539,81.495,13.923z">
					</path>
				</svg>
			</div>
		</div>

		<div id="redirectButtonPanel" data-id="redirectButtonPanel" style="display:none"></div>

		<div class="loading-bar">
			<div class="progress-bar">
				<div class="progress-stripes">////////////////////////</div>
			</div>
		</div>

		<div class="loading-info">
			<span class="loader-label"><?php _e( 'Loading...', 'ms' ); ?></span>
		</div>
	</div>
</div>