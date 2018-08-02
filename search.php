<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Nibble_Core
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<header class="page-header py-4 mb-5 bg-light border-bottom">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="page-title display-4">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'nibble-core' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
						</div>
					</div>
				</div>
			</header><!-- .page-header -->

			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-8">
						<?php
						if ( have_posts() ) : 
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );
								endwhile;
								the_posts_navigation();
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
	</section><!-- #primary -->

<?php
get_footer();
