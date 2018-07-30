<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nibble_Core
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text sr-only" href="#content">
		<?php esc_html_e( 'Skip to content', 'nibble-core' ); ?></a>

	<header id="masthead" class="site-header">

		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm">
					<div class="site-branding pt-3 pb-3 text-center text-sm-left">
						<?php
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						if ( empty( $custom_logo_id ) ) { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img width="178px" src="<?php echo esc_url( get_template_directory_uri() . '/css/images/logo.png'); ?>" alt="" class="logo-default mb-2" />
							</a>
						<?php
						} else {
							the_custom_logo();
						}
						if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title sr-only">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</h1>
						<?php
						else :
						?>
						<p class="site-title sr-only">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</p>
						<?php
						endif;
						$nibble_core_description = get_bloginfo( 'description', 'display' );
						if ( $nibble_core_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $nibble_core_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->
				</div>
				<!--Right Actions-->
				<div class="col-sm mb-4 mb-md-0">
					<div class="d-flex justify-content-center justify-content-md-end">
						<?php nibble_core_the_user_navigation(); ?>
					</div>
				</div>
				<!--Right Actions Head-->
			</div>
		</div>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container px-3 px-md-3">
		  		<a href="#" class="d-lg-none pl-0 btn btn-link disabled navbar-brand">
		  			<?php esc_html_e('Navigation', 'nibble-core'); ?></a>
		  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    		<span class="navbar-toggler-icon"></span>
		  		</button>

			  		<div class="collapse navbar-collapse mln-10" id="navbarSupportedContent">
			      		<?php
							 wp_nav_menu([
								'menu'            => 'menu-1',
								'theme_location'  => 'menu-1',
								'container'       => '',
								'container_id'    => '',
								'container_class' => '',
								'menu_id'         => false,
								'menu_class'      => 'navbar-nav mr-auto',
								'depth'           => 2,
								'fallback_cb'     => 'bs4navwalker::fallback',
								'walker'          => new bs4navwalker()
							]);
						?>
			    	<?php get_search_form(); ?>
	    		</div>
		  </div>
		  	
		</nav>


	</header><!-- #masthead -->

	<div id="content" class="site-content">
