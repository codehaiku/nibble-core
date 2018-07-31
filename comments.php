<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nibble_Core
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title h4 mt-4 mb-5 border-bottom border-dark">
			<span class="bg-dark text-light d-inline-block px-3 py-2">
				<i class="far fa-comments"></i>
				<?php 
				comments_number( __('Add Comment','nibble-core'), 
				__('One Comment', 'nibble-core'), __('% Comments', 'nibble-core') ); 
				?>
			</span>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list list-unstyled">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'callback' => 'nibble_core_comments_list_template'
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments text-info mt-3">
				<i class="fas fa-comment-slash"></i> <?php esc_html_e( 'Comments are closed.', 'nibble-core' ); ?>
			</p>
			<?php
		endif;

	endif; // Check for have_comments().

		comment_form($args=array(
			'class_submit' => 'btn btn-primary'
		));
	?>

</div><!-- #comments -->
