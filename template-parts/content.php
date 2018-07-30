<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nibble_Core
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="jumbotron mt-4">
  <header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title display-4">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title display-4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				nibble_core_posted_on();
				nibble_core_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
  <p class="lead">
  	<?php the_excerpt(); ?>
  </p>
  <hr class="my-4">
  <p>
  	<?php nibble_core_entry_footer(); ?>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Join Discussion</a>
  </p>
</div>

	

	<?php nibble_core_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nibble-core' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nibble-core' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php nibble_core_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
