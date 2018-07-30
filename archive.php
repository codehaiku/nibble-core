<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nibble_Core
 */

get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-8">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
					<?php
					$this_category = get_queried_object();
					$categories = get_categories();

					foreach( $categories as $position => $cat ) :
					    if( $this_category->term_id == $cat->term_id ) :
					        $next_cat = $position + 1;
					        $prev_cat = $position - 1;
					        break;
					    endif;
					endforeach;

					$next_cat = $next_cat == count($categories) ? 0 : $next_cat;
					$prev_cat = $prev_cat < 0 ? count($categories) - 1 : $prev_cat;

					?>
				<?php if ( have_posts() ) : ?>

					<!-- Archive head-->
					<div class="card mb-4 mt-4">
					  <div class="card-header">
					    	Archives
					  </div>
					  <div class="card-body">
					    <h1 class="card-title h5">
					    	<?php
								the_archive_title();
							?>
					    </h1>
					    <p class="card-text">
					    	<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
					    </p>
					    <a href="<?php echo esc_url( get_term_link( $categories[$prev_cat] ) ); ?>" class="btn btn-primary">Previous</a>
					    <a href="<?php echo esc_url( get_term_link( $categories[$next_cat] ) ); ?>" class="btn btn-primary">Next</a>
					  </div>
					</div>

					<div class="card-columns" style="column-count: 2;">					
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						//get_template_part( 'template-parts/content', get_post_type() );
						?>

							<div class="card" style="display: inline-block; column-break-inside: avoid;">
								<?php the_post_thumbnail(); ?>
							  	<div class="card-body">
							  		<h4 class="card-title">
							  			<a href="<?php esc_url( the_permalink() ); ?>">
							  				<?php the_title(); ?>
							  			</a>
							  		</h4>
								    <p class="card-text">
								    	<?php the_excerpt(); ?>
								    </p>
								    
							    
							  	</div>
							  	 <div class="card-footer">
							  		<small class="card-text">
							    		<?php nibble_core_posted_on() ?>
							    	</small>
							  </div>
							</div>
						<?php

					endwhile;
					?>
					</div>
					<?php
					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
		<div class="col-sm-12 col-md-12 col-lg-4">
			<div class="sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php

get_footer();
