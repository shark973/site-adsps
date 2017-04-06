<?php
/* Widget Register / UN-register */
function history_manage_widgets() {
	
	/* Latest Posts */
	require_once("latest_posts.php");
	
	/* Social Icons */
	require_once("social_icons.php");
	
	register_widget( 'History_Widget_LatestPosts' );
	
	register_widget( 'History_Widget_Social' );

}
add_action( 'widgets_init', 'history_manage_widgets' );