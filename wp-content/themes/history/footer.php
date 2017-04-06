<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage History
 * @since History 1.0
 */
?>
		<?php 
		if ( is_active_sidebar( 'sidebar-5' ) ||
			 is_active_sidebar( 'sidebar-6' ) ||
			 is_active_sidebar( 'sidebar-7' ) ||
			 is_active_sidebar( 'sidebar-8' ) ||
			 history_options("opt_footer_copyright") != ""
			) {
			?>
			<!-- Footer Section -->
			<footer class="footer-main container-fluid">
				<!-- Container -->
				<div class="container">
					<div class="row">
						<?php
						if ( is_active_sidebar( 'sidebar-5' ) ) {
							?>
							<div class="col-md-4 col-sm-6 col-xs-6">
								<?php dynamic_sidebar("sidebar-5"); ?>
							</div>
							<?php
						}
						if ( is_active_sidebar( 'sidebar-6' ) ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6">
								<?php dynamic_sidebar("sidebar-6"); ?>
							</div>
							<?php
						}
						if ( is_active_sidebar( 'sidebar-7' ) ) {
							?>
							<div class="col-md-2 col-sm-6 col-xs-6">
								<?php dynamic_sidebar("sidebar-7"); ?>
							</div>
							<?php
						}
						if ( is_active_sidebar( 'sidebar-8' ) ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6">
								<?php dynamic_sidebar("sidebar-8"); ?>
							</div>
							<?php
						}
						?>
					</div>
				</div><!-- Container /- -->
				<?php
				if( history_options("opt_footer_copyright") != "" ) {
					?>
					<!-- Copyright -->
					<div class="container-fluid no-padding copyright">
						<?php echo htmlspecialchars_decode( wpautop( history_options("opt_footer_copyright") ) ); ?>
					</div><!-- Copyright /- -->
					<?php
				}
				?>
			</footer><!-- Footer Section /- -->
			<?php
		}
		?>
	</div>

	<?php wp_footer(); ?>

</body>
</html>