<?php
get_header();

$pid = "";
$sidebar_layout = "";
$page_layout = "";
$page_layout_css = "";
$content_area_css = "";
$page_css = "";
$template_css = "";

$pid = history_get_the_ID();

if( $pid != "" ) {

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
	}
	else {
		$page_layout_css = "container no-padding";
	}

	/* Content Area */
	if( $sidebar_layout == "right_sidebar" ) {
		$content_area_css = " content-left col-md-9 col-sm-8";
	}
	elseif( $sidebar_layout == "left_sidebar" ) {
		$content_area_css = " content-right col-md-9 col-sm-8";
	}
	elseif( $sidebar_layout == "no_sidebar" ) {
		$content_area_css = " full-content col-md-12";
	}
	else {
		$content_area_css = " content-left col-md-9 col-sm-8";
	}

	if( get_post_meta( $pid, 'history_cf_content_padding', true ) == "off" ) {
		$page_css = " no-padding no-margin";
	}
	else {
		$page_css = " page_spacing";
	}
}
else {

	$page_layout_css = "container no-padding";
	$content_area_css = " content-left col-md-9 col-sm-8";
	$page_css = " page_spacing";
}
?>
<main id="main" class="site-main<?php echo esc_attr( $page_css ); ?>">

	<div class="<?php echo esc_attr( $page_layout_css ); ?>">

		<div class="content-area<?php echo esc_attr( $content_area_css . $template_css ); ?>">