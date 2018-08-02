<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nibble_Core
 */

get_header();
$layout = '2';
?>
<div class="py-5 bg-dark">
	<div class="container text-center text-light">
		<h1 class="display-4">Welcome to our Community</h1>
		<p class="lead">You can personalized this area in your theme customizer<br/> or you can disable this area</p>
		<a class="btn btn-outline-info">See Members</a>
		<a class="btn btn-outline-primary">Join Groups</a>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-8">
			<div id="primary" class="content-area py-5">
				<main id="main" class="site-main">
				<?php
				if ( have_posts() ) :
					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text">
								<?php single_post_title(); ?>
							</h1>
						</header>
						<?php
					endif;
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					/* Post Navigation */
					?>
					
					<?php $has_post_navigation = get_the_posts_navigation(); ?>
					<?php if ( ! empty( $has_post_navigation ) ): ?>
						<h5 class="text-secondary font-weight-light"><?php esc_html_e('Previous/Next Reading', 'nibble-core'); ?></h5>
						<?php the_posts_navigation(); ?>
					<?php endif; ?>
					
					<?php
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
		<?php if ( $layout == 2 ): ?>
			<div class="col-sm-12 col-md-12 col-lg-4">
				<div class="sidebar py-5">
					<?php get_sidebar(); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php
get_footer();
