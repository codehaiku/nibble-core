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
	<h2 class="comments-title h4 mt-4 mb-5 border-bottom border-dark">
		<span class="bg-dark text-light d-inline-block px-3 py-2">
			<i class="far fa-comments"></i>
			<?php 
			comments_number( __('Leave a Comment','nibble-core'), 
			__('One Comment', 'nibble-core'), __('% Comments', 'nibble-core') ); 
			?>
		</span>
	</h2><!-- .comments-title -->
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		
		the_comments_navigation(); ?>

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

		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$fields =  array(
		  'author' =>
		    '<div class="comment-form-author form-group"><label for="author">' . __( 'Name', 'nibble-core' ) .
		    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
		    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		    '" size="30"' . $aria_req . ' /></div>',

		  'email' =>
		    '<div class="comment-form-email form-group"><label for="email">' . __( 'Email', 'nibble-core' ) .
		    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
		    '<input class="form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		    '" size="30"' . $aria_req . ' /></div>',

		  'url' =>
		    '<div class="comment-form-url form-group"><label for="url">' . __( 'Website', 'nibble-core' ) . '</label>' .
		    '<input class="form-control" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		    '" size="30" /></div>',
		);
		
		$comment_field = '<div class="form-group comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'nibble-core' ) . '</label><textarea class="form-control" required id="comment" name="comment" cols="45" rows="4" aria-required="true"></textarea></div>';

		comment_form(
			array(
				'class_submit' => 'btn btn-primary',
				'comment_field' => apply_filters('nibble_core_comment_field', $comment_field),
				'must_login' => '<p class="must-log-in text-info">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'nibble-core' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
				'fields' => apply_filters( 'comment_form_default_fields', $fields )
			)
		);
	?>

</div><!-- #comments -->
