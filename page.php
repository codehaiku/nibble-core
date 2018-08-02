<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nibble_Core
 */

get_header();
?>

<div class="page-header bg-light border-bottom mb-4">
	<div class="container">
		<div id="page-title" class="py-4">
			<?php the_title('<h1 class="entry-title mb-0">','</h1>'); ?>
			<?php if ( function_exists( 'nibble_core_the_page_leading_text') ): ?>
				<?php nibble_core_the_page_leading_text(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<?php while( have_posts() ) : ?>
			<?php the_post(); ?>
			<div class="col-sm-12 col-md-12 col-lg-8">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
						<?php 
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>
					</main>
				</div>
			</div>
		<?php endwhile; ?>
		<div class="col-sm-12 col-md-12 col-lg-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>	
<?php 

get_footer();
