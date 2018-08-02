<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NibbleCore
 */

?>

<?php $classes = array('mb-5', 'bg-white', 'shadow-sm', 'border'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<header class="entry-header">
		<div class="d-flex align-items-center p-3 border-bottom">
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
			<?php if (is_sticky()): ?>
			<div class="sticky-star flex-fill text-right">
				<i class="far fa-star text-success"></i>
			</div>
			<?php endif; ?>
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

	<?php if ( is_single() ): ?>
		<?php if ( has_post_thumbnail() ): ?>
			<div class="entry-content text-secondary px-5 py-3 border-bottom">
		<?php else: ?>
			<div class="entry-content text-secondary px-3 border-bottom">
		<?php endif;?>
		
	<?php else: ?>
		<div class="entry-content text-secondary px-3 border-bottom">
	<?php endif; ?>
	
		<?php
		if ( is_single() ) {
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
		} else {
			the_excerpt();
		}
		?>
		<div class="clearfix"></div>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nibble-core' ),
			'after'  => '</div>',
		) );

		?>

		<div class="post-taxonomies mt-3 mb-3 small">
			<?php nibble_core_entry_footer(); ?>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer text-secondary">
		<div class="d-flex bd-highlight">
			<?php if ( ! is_single() ): ?>
				<a class="text-secondary flex-fill text-center border-right p-3 bg-light" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php esc_attr_e('Read More', 'nibble-core'); ?>">
					<i class="far fa-arrow-alt-circle-right"></i>
					<?php esc_html_e('Read More', 'nibble-core'); ?>
				</a>
			<?php endif; ?>
			<?php if ( comments_open() ): ?>
				<a class="text-secondary flex-fill text-center p-3 bg-light" href="<?php comments_link(); ?>" title="<?php esc_attr_e('Comments', 'nibble-core'); ?>">
					<i class="far fa-comment-dots"></i>
					<?php comments_number( 'Leave a Comment', 'One Comment', '% Comments' ); ?>
				</a>
			<?php endif; ?>
		</div>
		
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->