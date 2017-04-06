<?php
/**
 * The Header for our theme
 *
 *
 * @package WordPress
 * @subpackage History
 * @since History 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<?php
	$logo_style = $logo_img = $badge_img = "";

	$logo_style = get_theme_mod("select_logo", "img_logo");

	if( get_theme_mod("img_sitelogo") != "" ) {
		$logo_img = get_theme_mod("img_sitelogo");
	}
	else {
		$logo_img = HISTORY_IMGURI . "/logo.png";
	}

	if( get_theme_mod("img_badge") != "" ) {
		$badge_img = get_theme_mod("img_badge");
	}

	/* Page Metabox */
	$page_title = "";
	$page_subtitle = "";
	$page_banner = "";

	$header_image = "";
	
	$pid = history_get_the_ID();
	
		/* Widget Area */
	if( get_post_meta( $pid, 'history_cf_page_title', true ) != "" ) {
		$page_title = get_post_meta( $pid, 'history_cf_page_title', true );
	} 
	
	if( get_post_meta( $pid, 'history_cf_page_subtitle', true ) != "" ) {
		$page_subtitle = get_post_meta( $pid, 'history_cf_page_subtitle', true );
	} 
	
	if( get_post_meta( $pid, 'history_cf_page_header_img', true ) != "" ) {
		$page_banner = get_post_meta( $pid, 'history_cf_page_header_img', true );
	} 

	/* Page Banner */
	if( $page_banner != "" ) {
		$header_image = $page_banner;
	}
	else {
		$header_image = HISTORY_IMGURI . '/page-banner-bg.jpg';
	}
	?>
	<div class="main-container">

		<?php
		$loader_display = get_theme_mod("select_loader_option", "show");

		if( $loader_display == "show") {
			?>
			<!-- Loader -->
			<div id="site-loader" class="load-complete">
				<div class="loader">
					<div class="loader-inner ball-clip-rotate">
						<div></div>
					</div>
				</div>
			</div><!-- Loader /- -->
			<?php
		} 		
		?>

		<!-- Header Section -->
		<header id="header" class="header-section container-fluid no-padding">
			<!-- Top Header -->
			<?php 
				$css = "";
				if(history_options("opt_contact") !="" || history_options("opt_fburl") !="" || history_options("opt_twurl") !="" || history_options("opt_gpurl") !="" || history_options("opt_time") !="" ) {
					?>
					<div class="top-header container-fluid no-padding">
						<div class="col-md-7 col-sm-12 col-xs-12 top-content no-padding">
							<?php if(history_options("opt_contact") !="") { ?><a href="tel:<?php echo esc_attr(history_options("opt_contact")); ?>"><i class="fa fa-phone"></i><b><?php echo esc_attr(history_options("opt_contact")); ?></b></a><?php } ?>
							<div class="top-icons">
								<ul>
									<?php if(history_options("opt_fburl") !="") { ?><li><a href="<?php echo esc_attr(history_options("opt_fburl")); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
									<?php if(history_options("opt_twurl") !="") { ?><li><a href="<?php echo esc_attr(history_options("opt_twurl")); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
									<?php if(history_options("opt_gpurl") !="") { ?><li><a href="<?php echo esc_attr(history_options("opt_gpurl")); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php } ?>
								</ul>
								<?php if(history_options("opt_time") !="") { ?><h5><span><?php esc_html_e('OPENING HOURS:',"history"); ?></span><?php echo esc_attr(history_options("opt_time")); ?></h5><?php } ?>
							</div>
						</div>
					</div><!-- Top Header /- -->
					<?php
				}
				else{
					$css = ' no-top-header';
				}
			?>
			<!-- Container -->
			<div class="container">		
				<!-- nav -->
				<nav class="navbar navbar-default ow-navigation <?php echo esc_attr( $css );?>">
					<div class="navbar-header">
						<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
							<span class="sr-only"><?php echo esc_html_e("Toggle navigation", "history"); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<?php
						if( $logo_style == "img_logo" && $logo_img != "" ) {
							?>
							<a class="navbar-brand image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo_img ); ?>" alt=""/></a>
							<?php
						}
						elseif( $logo_style == "site_title" ) {
							?>
							<a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo("title"); ?></a>
							<?php
						}
						else {
							?>
							<a class="navbar-brand custom-txt" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_attr( get_theme_mod("txt_custom_logo", "history") ); ?></a>
							<?php
						} ?>
					</div>
					<!-- Menu Icon -->
					<div class="menu-icon">
						<div class="search">	
							<a href="javascript:void(0);" id="search" title="Search"><i class="icon icon-Search"></i></a>
						</div>
					</div><!-- Menu Icon /- -->
					
					<div class="navbar-collapse collapse navbar-right" id="navbar">
					
						<?php
						if( has_nav_menu('ow_primary_nav') ) :
							wp_nav_menu( array(
								'theme_location' => 'ow_primary_nav',
								'container' => false,
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth' => 10,
								'menu_class' => 'nav navbar-nav',
								'walker' => new history_nav_walker
							));
						else :
							echo '<ul class="nav navbar-nav">'
								.wp_list_pages(array(
								'echo'            => 0,
								'walker'          => new history_wp_page_walker,
								'title_li'        => ''
							)).'</ul>';
						endif;
						?>
						
					</div><!--/.nav-collapse -->
				</nav><!-- nav /- -->
				<!-- Search Box -->
				<div class="search-box">
					<span><i class="icon_close"></i></span>
					<?php echo history_custom_search_form(); ?>
				</div><!-- Search Box /- -->
			</div><!-- Container /- -->		
		</header><!-- Header Section /- -->
	
		<?php
		if( $page_title != "disable" || is_search()) {
			?>
			<!-- Page Banner -->
			<div class="page-banner"<?php if( $header_image != "" ) { ?> style="background-image: url(<?php echo esc_url( $header_image ); ?>);"<?php } ?>>
				<!-- Container -->
				<div class="container">
					<h3>				
						<?php
						if( is_home() ) {
							esc_html_e( 'Blog', "history" );
						}
						if( is_404() ) {
							esc_html_e( 'Error Page', "history" );
						}
						elseif( is_search() ) {
							printf( esc_html__( 'Search Results for: %s', "history" ), get_search_query() );
						}
						elseif( is_archive() ) {

							the_archive_title();

						}
						elseif( ! is_home() ) {
							the_title();
						}

						if( $page_subtitle != "" ) {
							?>
							<span class="page-subtitle">
								<?php echo esc_attr( $page_subtitle ); ?>
							</span>
							<?php
						}
						?>
					</h3>
				</div><!-- Container /- -->
			</div><!-- Page Banner /- -->
			<?php
		} ?>