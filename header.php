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
	<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'nibble-core' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding hide sr-only">
			<?php
			the_custom_logo();
			
			$nibble_core_description = get_bloginfo( 'description', 'display' );
			if ( $nibble_core_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $nibble_core_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->


		<nav class="navbar navbar-expand-lg navbar-light bg-light">

		  	<?php if ( is_front_page() && is_home() ) : ?>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php else : ?>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
		  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    		<span class="navbar-toggler-icon"></span>
		  		</button>

		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<ul class="navbar-nav mr-auto">
		      		<?php
						 wp_nav_menu([
							'menu'            => 'menu-1',
							'theme_location'  => 'menu-1',
							'container'       => 'div',
							'container_id'    => 'bs4navbar',
							'container_class' => 'collapse navbar-collapse',
							'menu_id'         => false,
							'menu_class'      => 'navbar-nav mr-auto',
							'depth'           => 2,
							'fallback_cb'     => 'bs4navwalker::fallback',
							'walker'          => new bs4navwalker()
						]);
					?>
		    	</ul>
		    	<form class="form-inline my-2 my-lg-0">
      			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    		</form>
		  </div>
		  	
		</nav>




	</header><!-- #masthead -->

	<div id="content" class="site-content">
