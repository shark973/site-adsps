<?php
/* Define Constants */
define( 'HISTORY_IMGURI', get_template_directory_uri() . '/images' );
define( 'HISTORY_ADMIN_IMGURI', get_template_directory_uri() . '/admin/images' );

/**
 * Register three widget areas.
 *
 * @since History 1.0
 */
if ( ! function_exists( 'history_widgets_init' ) ) {
	function history_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Right Sidebar (Default for Blog)', "history" ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "history" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Left Sidebar', "history" ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "history" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Right Sidebar (Default for Shop)', "history" ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "history" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Left Sidebar', "history" ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "history" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 1', "history" ),
			'id'            => 'sidebar-5',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "history" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 2', "history" ),
			'id'            => 'sidebar-6',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "history" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 3', "history" ),
			'id'            => 'sidebar-7',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "history" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 4', "history" ),
			'id'            => 'sidebar-8',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "history" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
	}
	add_action( 'widgets_init', 'history_widgets_init' );
}

require_once( trailingslashit( get_template_directory() ) . 'include/nav_walker.php' );
require_once( trailingslashit( get_template_directory() ) . 'include/page_walker.php' );
require_once( trailingslashit( get_template_directory() ) . 'include/theme-customizer.php' );