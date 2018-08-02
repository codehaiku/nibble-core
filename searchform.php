<form class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  	<div class="form-group">
    	<input type="search" name="s" class="mr-sm-2 form-control" 
    	placeholder="<?php echo esc_attr('Search', 'nibble-core'); ?>">
    	<button class="btn btn-secondary" type="submit">
    		<?php esc_html_e('Search', 'nibble-core'); ?>
    	</button>
  	</div>
</form>