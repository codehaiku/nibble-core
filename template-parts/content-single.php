<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NibbleCore
 */

?>

<?php $classes = array('mb-2','pb-2'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>

	<header class="entry-header mb-3">
		
		<div class="entry-header-meta mb-4">
			<!--Title.-->
			<div class="entry-title border-bottom mb-3 pb-3">
				<?php the_title( '<h1 class="entry-title mb-0">', '</h1>' ); ?>
			</div>
			<!-- User -->
			<div class="d-flex align-items-center">
				<div class="entry-header-avatar">
					<?php echo get_avatar( get_the_author_meta('ID'), 32, '', '',  array('class' => 'rounded-circle') ); ?>
				</div>
				<div class="entry-header-meta">
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

				<?php if ( comments_open() ): ?>
				<div class="comment count flex-fill text-right">
					<a href="<?php comments_link(); ?>" title="<?php esc_attr_e('Comments', 'nibble-core'); ?>">
						<i class="far fa-comment-dots"></i>
						<?php comments_number( 'Leave a Comment', 'One Comment', '% Comments' ); ?>
					</a>
				</div>
				<?php endif; ?>

			</div>
		</div>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="nibble-core-post-thumbnail mb-3 text-center bg-secondary">
				<?php nibble_core_post_thumbnail(); ?>
			</div>
		<?php endif ;?>
		
	</header><!-- .entry-header -->

	
	<div class="entry-content pb-4">
		<?php the_content(); ?>
		<div class="clearfix"></div>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nibble-core' ),
			'after'  => '</div>',
		) );
		?>
	

	</div><!-- .entry-content -->

	<footer class="entry-footer text-secondary border-top">
		<div class="post-taxonomies mt-3 mb-3 small">
			<?php nibble_core_entry_footer(); ?>
		</div>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->