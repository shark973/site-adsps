<?php
$pid = "";
$sidebar_layout = "";
$sidebar_css = "";
$widget_area = "";

$pid = history_get_the_ID();

if( $pid != "" && !is_search()) {

	/* Widget Area */
	if( get_post_meta( $pid, 'history_cf_sidebar_owlayout', true ) != "" ) {
		$sidebar_layout = get_post_meta( $pid, 'history_cf_sidebar_owlayout', true );
	} else { /* Do nothing */ }

	if( $sidebar_layout == "right_sidebar" ) {
		$sidebar_css = "sidebar-right";
	}
	elseif( $sidebar_layout == "left_sidebar" ) {
		$sidebar_css = "sidebar-left";
	}
	elseif( $sidebar_layout == "no_sidebar" ) {
		$sidebar_css = "no-sidebar";
	}
	else { /* Do nothing.. */ }

	if( get_post_meta( $pid, 'history_cf_widget_area', true ) != "" ) {
		$widget_area = get_post_meta( $pid, 'history_cf_widget_area', true );
	}
	else { /* Do nothing.. */ }
}
else {

	$sidebar_layout = "right_sidebar";
	$sidebar_css = "sidebar-right";
	$widget_area = "sidebar-1";
}

if( $sidebar_layout != "no_sidebar" ) {
	?>
	<div class="widget-area col-md-3 col-sm-4 col-xs-12 <?php echo esc_attr( $sidebar_css . " " . $widget_area ); ?>">
		<?php
		if( is_active_sidebar( $widget_area ) ) {
			dynamic_sidebar( $widget_area );
		}
		elseif( is_active_sidebar("sidebar-1") ) {
			dynamic_sidebar("sidebar-1");
		} ?>
	</div><!-- End Sidebar -->
	<?php	
}