<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nibble_Core
 */

?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm">
					<a href="<?php echo esc_url( site_url() );?>" title="<?php echo esc_attr( get_bloginfo('name') ); ?>">
						<?php echo sprintf( esc_html__('%s. All Rights Reserved.', 'nibble-core'), get_bloginfo('name') ); ?>
					</a>
				</div>
				<?php do_action('nibble-core-after-site-info-column'); ?>
			</div>
		</div>
		<?php do_action('nibble-core-site-footer-after'); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
