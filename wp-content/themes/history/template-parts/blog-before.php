<?php
get_header();

$pid = "";
$sidebar_layout = "";
$page_layout = "";
$page_layout_css = "";
$layout_css = "";
$content_area_css = "";
$page_css = "";
$template_css = "";
$page_customstyle = "";

$pid = history_get_the_ID();

if( $pid != "" && !is_search()) {

	/* Widget Area */
	if( get_post_meta( $pid, 'history_cf_sidebar_owlayout', true ) != "" ) {
		$sidebar_layout = get_post_meta( $pid, 'history_cf_sidebar_owlayout', true );
	} else { /* Do nothing.. */ }

	/* Page Layout */
	if( get_post_meta( $pid, 'history_cf_page_owlayout', true ) != "" ) {
		$page_layout = get_post_meta( $pid, 'history_cf_page_owlayout', true );
	}
	else {
		$page_layout = "";
	}

	if( $page_layout == "fluid" ) {
		$page_layout_css = "container-fluid no-padding";
		$layout_css = " fullwidth_page";
	}
	else {
		$page_layout_css  = "container no-padding";
	}

	/* Content Area */
	if( $sidebar_layout == "right_sidebar" ) {
		$content_area_css = " content-left col-md-9 col-sm-8";
	}
	elseif( $sidebar_layout == "left_sidebar" ) {
		$content_area_css = " content-right col-md-9 col-sm-8";
	}
	elseif( $sidebar_layout == "no_sidebar" ) {
		$content_area_css = " no-sidebar col-md-12 no-padding";
	}
	else {
		$content_area_css = " content-left col-md-9 col-sm-8";
	}

	if( get_post_meta( $pid, 'history_cf_content_padding', true ) == "off" ) { $page_css = " no_spacing"; }
	else {
		$page_css = " page_spacing";
	}

	if( is_page_template("blog-template.php") || is_singular("post") ) {
		$template_css = " blog-listing";
	}
}
else {

	$page_layout_css = "container no-padding";
	$content_area_css = " content-left col-md-9 col-sm-8";
	$page_css = " page_spacing";
}
?>
<main id="main" class="site-main<?php echo esc_attr( $page_css . $layout_css ); ?>">

	<div class="<?php echo esc_attr( $page_layout_css ); ?>">

		<div class="content-area<?php echo esc_attr( $content_area_css . $template_css ); ?>">