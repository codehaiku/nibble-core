<?php
/**
 * Nibble core login form is base on wp_login_form function
 * @see   <https://developer.wordpress.org/reference/functions/wp_login_form/>
 */
function nibble_core_login_form_modal( $args = array() ) {
    $defaults = array(
        'echo' => true,
        // Default 'redirect' value takes the user back to the request URI.
        'redirect' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
        'form_id' => 'loginform',
        'label_username' => __( 'Username or Email Address', 'nibble-core' ),
        'label_password' => __( 'Password', 'nibble-core' ),
        'label_remember' => __( 'Remember Me', 'nibble-core' ),
        'label_log_in' => __( 'Log In', 'nibble-core' ),
        'id_username' => 'user_login',
        'id_password' => 'user_pass',
        'id_remember' => 'rememberme',
        'id_submit' => 'wp-submit',
        'remember' => true,
        'value_username' => '',
        // Set 'value_remember' to true to default the "Remember me" checkbox to checked.
        'value_remember' => false,
        'email_help' => '',
    );
 
    /**
     * Filters the default login form output arguments.
     *
     * @since 3.0.0
     *
     * @see wp_login_form()
     *
     * @param array $defaults An array of default login form arguments.
     */
    $args = wp_parse_args( $args, apply_filters( 'login_form_defaults', $defaults ) );
 
    /**
     * Filters content to display at the top of the login form.
     *
     * The filter evaluates just following the opening form tag element.
     *
     * @since 3.0.0
     *
     * @param string $content Content to display. Default empty.
     * @param array  $args    Array of login form arguments.
     */
    $login_form_top = apply_filters( 'login_form_top', '', $args );
 
    /**
     * Filters content to display in the middle of the login form.
     *
     * The filter evaluates just following the location where the 'login-password'
     * field is displayed.
     *
     * @since 3.0.0
     *
     * @param string $content Content to display. Default empty.
     * @param array  $args    Array of login form arguments.
     */
    $login_form_middle = apply_filters( 'login_form_middle', '', $args );
 
    /**
     * Filters content to display at the bottom of the login form.
     *
     * The filter evaluates just preceding the closing form tag element.
     *
     * @since 3.0.0
     *
     * @param string $content Content to display. Default empty.
     * @param array  $args    Array of login form arguments.
     */
    $login_form_bottom = apply_filters( 'login_form_bottom', '', $args );
    ob_start();
 	?>
 	<div class="modal fade" id="nibble-core-login-modal" tabindex="-1" role="dialog" aria-labelledby="<?php esc_html_e('Sign in', 'nibble-core');?>" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<form name="<?php echo $args['form_id']; ?>" id="<?php echo $args['form_id']; ?>"
		    	action="<?php echo apply_filters('nibble-core-login-form-action', esc_url( site_url( 'wp-login.php', 'login_post' ) )); ?>" method="post">
			      <div class="modal-header">
			        <h5 class="modal-title">
			        	<?php esc_html_e('Sign in', 'nibble-core');?>
			        </h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<!--username-->
			      	<div class="form-group">
			      		<label for="<?php echo esc_attr( $args['id_username'] );?>">
			      			<?php echo esc_html( $args['label_username'] ); ?>
			      		</label>
					    <input autocomplete="off" name="log" type="text" class="form-control" id="<?php echo esc_attr( $args['id_username'] );?>" aria-describedby="emailHelp" placeholder="<?php echo esc_attr('Enter email', 'nibble-core'); ?>">
					    <small id="emailHelp" class="form-text text-muted"><?php echo esc_html( $args['email_help']); ?></small>
			      	</div>
			      	<!-- password-->
			      	<div class="form-group">
					    <label for="<?php echo esc_attr( $args['id_password'] ); ?>">
					    	<?php echo esc_html( $args['label_password'] ); ?>
					    </label>
					    <input name="pwd" type="password" class="form-control" id="<?php echo esc_attr( $args['id_password'] ); ?>" placeholder="<?php echo esc_html( $args['label_password'] ); ?>">
					    <small id="emailHelp" class="form-text text-muted">
					    	<?php echo esc_html( $args['password_help']); ?>
					    	<a href="<?php echo esc_url(wp_lostpassword_url()); ?>" title="<?php echo esc_attr('Click to recover your password', 'nibble-core'); ?>">
					    		<?php echo esc_html('Forgot Password? Click here', 'nibble-core'); ?>
					    	</a>
					    </small>
					  </div>
			      </div>
			      <div class="modal-footer">
			        <button type="submit" class="btn btn-primary">
			        	<?php echo esc_html('Sign-in', 'nibble-core'); ?>
			        </button>
			        <?php if ( get_option( 'users_can_register' ) ): ?>
				        <a title="<?php echo esc_attr('Create Account', 'nibble-core'); ?>" href="<?php echo wp_registration_url();?>" class="btn btn-link ml-2">
				        	<?php echo esc_html('Create Account', 'nibble-core'); ?>
				        </a>
				    <?php else: ?>
				    	<a title="<?php echo esc_attr('Create Account', 'nibble-core'); ?>" href="<?php echo wp_registration_url();?>" class="btn btn-link disabled ml-2">
				        	<?php echo esc_html('Create Account', 'nibble-core'); ?>
				        </a>
				    <?php endif; ?>
			      </div>
		    	</form>
		  </div>
		</div>
	</div>
 	<?php
 
    if ( $args['echo'] )
        echo ob_get_clean();
    else
        return ob_get_clean();
}