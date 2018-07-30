<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Nibble_Core
 */

if ( ! function_exists( 'nibble_core_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function nibble_core_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'on %s', 'post date', 'nibble-core' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'nibble_core_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function nibble_core_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'Published by %s', 'post author', 'nibble-core' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'nibble_core_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function nibble_core_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'nibble-core' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'nibble-core' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'nibble-core' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links ml-2">' . esc_html__( 'Tagged %1$s', 'nibble-core' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'nibble-core' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		$edit_post_link = sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'nibble-core' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			);

		edit_post_link(
			$edit_post_link_content,
			'<p class="edit-link mt-3">',
			'</p>',
			'',
			'btn btn-outline-secondary btn-sm'
		);
	}
endif;

if ( ! function_exists( 'nibble_core_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function nibble_core_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'nibble_core_the_user_navigation' ) ):
	/**
	 * Display current user navigation.
	 */
	function nibble_core_the_user_navigation() {
		if ( is_user_logged_in() ) {
			nibble_core_get_user_navigation();
		} else {
			nibble_core_get_sign_in_buttons();
		}
	}

endif;

if ( ! function_exists( 'nibble_core_get_user_navigation') ):
	
	function nibble_core_get_user_navigation() {
		?>
		<!-- Just an image -->
		<ul class="nav nav-pills float-right">
			
		  	<li class="nav-item dropdown">
		    	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		    		<?php $display_name = 'Joseph Gabito'; ?>
		  		 	<?php echo get_avatar(get_current_user_id(), 30, '', $display_name, array('class'=>'rounded') ); ?>
		   			<?php echo esc_html( $display_name ); ?>
		  		</a>
		    	
			    <div class="dropdown-menu">
			      <a class="dropdown-item" href="#">Action</a>
			      <a class="dropdown-item" href="#">Another action</a>
			      <a class="dropdown-item" href="#">Something else here</a>
			      <div class="dropdown-divider"></div>
			      <a class="dropdown-item" href="#">Separated link</a>
			    </div>
		 	</li>

		 	<li class="nav-item">
			  <a class="nav-link" href="#">My Messages</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link " href="#">Notifications</a>
			</li>
			
		</ul>
		<?php
	}
endif;

if ( ! function_exists( 'nibble_core_get_sign_in_buttons' ) ):
	function nibble_core_get_sign_in_buttons() {
		?>
		<a data-toggle="modal" data-target="#nibble-core-login-modal" href="#" class="btn btn-primary">Sign-in</a>
		<!-- Modal -->
		<?php 
			$args = array(
				'email_help' => __('We\'ll never share your email with anyone else.', 'nibble-core'),
				'password_help' => ''
			); 
		?>
		<?php echo nibble_core_login_form_modal( $args ); ?>

		<?php if ( get_option( 'users_can_register' ) ): ?>
	        <a title="<?php echo esc_attr('Create Account', 'nibble-core'); ?>" href="<?php echo wp_registration_url();?>" class="ml-2 btn btn-secondary">
	        	<?php echo esc_html('Create Account', 'nibble-core'); ?>
	        </a>
	    <?php else: ?>
	    	<a data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr('Registration is Currently Disabled', 'nibble-core'); ?>" href="<?php echo wp_registration_url();?>" class="ml-2 btn btn-secondary">
	        	<?php echo esc_html('Create Account', 'nibble-core'); ?>
	        </a>
	    <?php endif; ?>

		<?php
	}
endif;