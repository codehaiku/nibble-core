<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<header class="page-header py-4 mb-5 bg-light border-bottom">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<?php
								the_archive_title( '<h1 class="page-title display-4">', '</h1>' );
								the_archive_description( '<div class="archive-description lead">', '</div>' );
							?>
						</div>
					</div>
				</div>
			</header><!-- .page-header -->

			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-8">
						<?php if ( have_posts() ) : ?>
							<?php
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

							?>
							
							<?php $has_post_navigation = get_the_posts_navigation(); ?>
							<?php if ( ! empty( $has_post_navigation ) ): ?>
								<h5 class="text-secondary"><?php esc_html_e('Previous/Next Reading', 'nibble-core'); ?></h5>
								<?php the_posts_navigation(); ?>
							<?php endif; ?>

							<?php
							else :
								get_template_part( 'template-parts/content', 'none' );
							endif;
						?>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-4">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();