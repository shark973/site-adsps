<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage History
* @since History 1.0
*/
get_header(); ?>

<main id="main" class="site-main">
	<?php
	$css = "";
	
	if(get_theme_mod("404_img") != "") {
		$css = " errorbg";
	}
	if(get_theme_mod("errorimg") != "") {
		$errorimg = get_theme_mod("errorimg");
	}
	else {
		$errorimg = HISTORY_IMGURI . "/404.png";
	}
	
	?>
	<!-- start erroe area -->
	<section class="error_area<?php echo esc_attr($css); ?>" <?php if(get_theme_mod("404_img")) { ?>style="background-image: url(<?php echo esc_url( get_theme_mod("404_img") ) ?>);" <?php } ?>>
		<div class="container">
			<div class="error-page container-fluid no-padding">
				<div class="padding-50"></div>
				<div class="container">
					<img src="<?php echo esc_url( $errorimg ); ?>" alt="404" />
					<div class="error-content">
						<h3>
							<span><?php esc_html_e('OOOOOOPS!', "history"); ?></span> 
							<?php esc_html_e('the page was not found', "history"); ?>
						</h3>
						<?php get_search_form(); ?>
					</div>
				</div>
				<div class="section-padding"></div>
			</div>
		</div>
	</section>

</main><!-- .site-main -->

<?php get_footer(); ?>