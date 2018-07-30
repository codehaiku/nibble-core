<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NibbleCore
 */

?>

<?php $classes = array('mb-5', 'bg-white', 'shadow'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<header class="entry-header">
		<div class="d-flex align-items-center p-3 border-bottom">
			<div class="">
				<?php echo get_avatar( get_the_author_meta('ID'), 32, '', '',  array('class' => 'rounded-circle') ); ?>
			</div>
			<div class="">
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta ml-3 text-secondary">
					<?php
					nibble_core_posted_by(); ?>
					<?php
					nibble_core_posted_on();
					?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</div>
		</div>
		<div class="archive-title p-3">
		<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title mt-2">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title mt-2 h4"><a class="text-dark" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>
		</div>
		
		
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="nibble-core-post-thumbnail mb-3 text-center bg-secondary">
			<?php nibble_core_post_thumbnail(); ?>
		</div>
	<?php endif ;?>

	<div class="entry-content text-secondary px-3 border-bottom">
		<?php
		if ( is_single() ) {
			the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '_nibble_core' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		} else {
			the_excerpt();
		}

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_nibble_core' ),
			'after'  => '</div>',
		) );
		?>

		<div class="post-taxonomies mt-3 mb-3 small">
			<?php nibble_core_entry_footer(); ?>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer text-secondary">
		<div class="d-flex bd-highlight">
			<a class="text-secondary flex-fill text-center border-right p-3 bg-light" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php esc_attr_e('Read More', 'nibble-core'); ?>">
				<i class="fab fa-readme"></i>
				<?php esc_html_e('Read More', 'nibble-core'); ?>
			</a>
			<a class="text-secondary flex-fill text-center p-3 bg-light" href="<?php comments_link(); ?>" title="<?php esc_attr_e('Comments', 'nibble-core'); ?>">
				<i class="far fa-comment-dots"></i>
				<?php comments_number( 'Add Comment', 'One Comment', '% Comments' ); ?>
			</a>
		</div>
		
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->