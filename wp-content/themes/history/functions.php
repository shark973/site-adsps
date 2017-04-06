<?php
/**
 * Theme functions and definitions
 *
*/

/* Include Core */
require get_template_directory() . '/include/inc.php';

/* Include Admin */
require get_template_directory() . '/admin/inc.php';

/* ************************************************************************ */

if( !function_exists('history_get_the_ID') ) :

	function history_get_the_ID() {

		if( class_exists( 'WooCommerce' ) && woocommerce_get_page_id('shop') != "-1" && is_shop() ) {
			$post_id = woocommerce_get_page_id('shop');
		}
		else {
			$post_id = get_the_ID();
		}

		return ! empty( $post_id ) ? $post_id : false;
	}
endif;

/* ************************************************************************ */

/* Redux Options */
if( !function_exists('history_options') ) :

	function history_options( $option, $arr = null ) {

		global $history_option;

		if( $arr ) {

			if( isset( $history_option[$option][$arr] ) ) {
				return $history_option[$option][$arr];
			}
		}
		else {
			if( isset( $history_option[$option] ) ) {
				return $history_option[$option];
			}
		}
	}

endif;

/**
 * Filters all menu item URLs for a #placeholder#.
 *
 * @param WP_Post[] $menu_items All of the nave menu items, sorted for display.
 *
 * @return WP_Post[] The menu items with any placeholders properly filled in.
 */
function history_dynamic_menu_items( $menu_items ) {

    foreach ( $menu_items as $menu_item ) {

		$url = substr( $menu_item->url, 0, 1);

        if ( '#' === $url && !is_front_page() ) {
			$menu_item->url = trailingslashit( home_url() ) . $menu_item->url;
        }
    }

    return $menu_items;
}
add_filter( 'wp_nav_menu_objects', 'history_dynamic_menu_items' );



/**
 * Set up the content width value based on the theme's design.
 *
 * @see ow_content_width()
 *
 * @since History 1.0
 */
if ( ! isset( $content_width ) ) { $content_width = 474; }


/**
 * Adjust content_width value for image attachment template.
 *
 * @since History 1.0
 */
if( !function_exists('history_content_width') ) :

	function history_content_width() {
		if ( is_attachment() && wp_attachment_is_image() ) { $GLOBALS['content_width'] = 810; }
	}
	add_action( 'template_redirect', 'history_content_width' );
endif;

/* ************************************************************************ */

/**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since History 1.0
 */
if( !function_exists('history_theme_setup') ) :

	function history_theme_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		// wp-content/themes/history-child/languages/en_US.mo
		load_theme_textdomain( "history", get_stylesheet_directory() . '/languages' );

		/* load theme languages */
		load_theme_textdomain( "history", get_template_directory() . '/languages' );

		/* Image Sizes */
		set_post_thumbnail_size( 825, 342, true ); /* Default Featured Image */

		add_image_size( 'history_825_342', 825, 342, true ); // Gallery Post
		

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'ow_primary_nav'   => esc_html__( 'Primary menu', "history" ),
		) );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );

		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio' ) );
	}
	add_action( 'after_setup_theme', 'history_theme_setup' );
endif;

/* ************************************************************************ */

/* Google Font */
if( !function_exists('history_fonts_url') ) :

	function history_fonts_url() {

		$fonts_url = '';

		$lora = _x( 'on', 'Lora font: on or off', "history" );
		$ptserif = _x( 'on', 'PT Serif font: on or off', "history" );
		$poppins = _x( 'on', 'Poppins font: on or off', "history" );
		$roboto = _x( 'on', 'Roboto font: on or off', "history" );

		if ( 'off' !== $lora || 'off' !== $ptserif || 'off' !== $poppins || 'off' !== $roboto ) {

			$font_families = array();

			if ( 'off' !== $lora ) {
				$font_families[] = 'Lora:400,400i,700,700i';
			}

			if ( 'off' !== $ptserif ) {
				$font_families[] = 'PT Serif:400,400i,700,700i';
			}

			if ( 'off' !== $poppins ) {
				$font_families[] = 'Poppins:300,400,500,600,700';
			}

			if ( 'off' !== $roboto ) {
				$font_families[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
			}

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;

/* ************************************************************************ */

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since History 1.0
 */
if( !function_exists('history_enqueue_scripts') ) :

	function history_enqueue_scripts() {

		wp_enqueue_media();

		$theme = wp_get_theme("history");
		$version = $theme['Version'];

		// load the Internet Explorer specific stylesheet.
	 	wp_enqueue_style( 'ie-css', get_template_directory_uri() . '/css/ie.css');
		wp_style_add_data( 'ie-css', 'conditional', 'lt IE 9' );

		// Load the html5 shiv.
		wp_enqueue_script( 'respond.min', get_template_directory_uri() . '/js/html5/respond.min.js', array(), '3.7.3' );
		wp_script_add_data( 'respond.min', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		/* Google Font */
		if( function_exists('history_fonts_url') ) :
			wp_enqueue_style( 'history-fonts', history_fonts_url() );
		endif;

		wp_enqueue_style( 'dashicons' );

		/* Lib */
		wp_enqueue_style( 'history-lib', get_template_directory_uri() . '/css/lib.css');
		wp_enqueue_script( 'history-lib', get_template_directory_uri() . '/js/lib.js', array( 'jquery' ), $version, true );

		wp_add_inline_script( 'history-lib', '
			var templateUrl = "'.esc_url( get_template_directory_uri() ).'";
			var WPAjaxUrl = "'.admin_url( 'admin-ajax.php' ).'";
		');

		/* Main Style */
		wp_enqueue_style( 'history-main', get_template_directory_uri() . '/css/main.css');
		wp_enqueue_script( 'history-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), $version, true );	

		wp_enqueue_style( 'history-plugins', get_template_directory_uri() . '/css/plugins.css');
		wp_enqueue_style( 'history-navigationmenu', get_template_directory_uri() . '/css/navigation-menu.css');
		wp_enqueue_style( 'history-shortcode', get_template_directory_uri() . '/css/shortcode.css');
		wp_enqueue_style( 'history-wordpress', get_template_directory_uri() . '/css/wordpress.css');
		wp_enqueue_style( 'history-woocommerce', get_template_directory_uri() . '/css/woocommerce.css');

		wp_enqueue_style( 'history-stylesheet', get_template_directory_uri() . '/style.css' );
		wp_add_inline_style( 'history-stylesheet', get_theme_mod('txtarea_customcss') );
	}
	add_action( 'wp_enqueue_scripts', 'history_enqueue_scripts' );
endif;

/* ************************************************************************ */

/**
 * Do the work to pagination work on custom post types listing pages.
 *
 * @param array $query args array, as it works on wordpress (dont use it as string)
 * @return array set global $posts and return it as well
 */
if( ! function_exists("history_wp_query") ) {

	function history_wp_query( array $qry_args = array() ) {

		global $wp_query;

		wp_reset_query();

		$paged = get_query_var('paged') ? get_query_var('paged') : 1;

		$defaults = array(
			'paged'	=> $paged,
			'posts_per_page' => 10
		);

		$qry_args += $defaults;

		$wp_query = new WP_Query( $qry_args );
	}
}

/* ************************************************************************ */

/**
 * Extend the default WordPress body classes.
 *
 * @since History 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
if( !function_exists('history_body_classes') ) :

	function history_body_classes( $classes ) {

		if ( is_singular() && ! is_front_page() ) {
			$classes[] = "singular";
		}

		if( is_front_page() && !is_home() ) {
			$classes[] = "front-page";
		}

		if( is_404() ) {
			$classes[] = "404-template";
		}

		return $classes;
	}
	add_filter( 'body_class', 'history_body_classes' );

endif;

/* ************************************************************************ */

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since History 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
if( !function_exists('history_post_classes') ) :

	function history_post_classes( $classes ) {
		if ( ! is_attachment() && has_post_thumbnail() ) { $classes[] = 'has-post-thumbnail'; }
		return $classes;
	}
	add_filter( 'post_class', 'history_post_classes' );

endif;
/* ************************************************************************ */

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since History 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
if( ! function_exists( 'history_search_form_modify' ) ) :

	function history_search_form_modify( $html ) {
		$number = rand(0,999);
		$html = '<form method="get" id="'.$number.'" class="searchform" action="' . home_url( '/' ) . '" >
		<div class="input-group">
		<input type="text" name="s" id="s-'.$number.'" placeholder="'.esc_html("search blog ...", "history").'" class="form-control" required>
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
		</span>
		</div><!-- /input-group -->
		</form>';
		return $html;

	}
	add_filter( 'get_search_form', 'history_search_form_modify' );
endif;

if( ! function_exists( 'history_custom_search_form' ) ) :

	function history_custom_search_form() {
		
		$html = '<form method="get" id="searchform_header" class="searchform" action="' . home_url( '/' ) . '" >
			<input type="text" name="s" id="s_header" placeholder="'.esc_html("Enter a keyword and press enter...", "history").'" class="form-control" required>
			<span  class="input-group-btn">
				<button type="button" title="Search" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
			</span>
		</form>';
		return $html;
	}
endif;

/* ************************************************************************ */

if( ! function_exists( 'history_notices' ) ) :
	
	function history_notices( $alert_msg = "" ) {

		if( is_admin() ) {
				
			if( class_exists("woocommerce") && woocommerce_get_page_id('shop') == "-1" && is_shop() ) {

				$alert_msg = "<div role='alert' class='history-notices alert alert-warning alert-dismissible fade in'>
					<button aria-label='Close' data-dismiss='alert' class='close' type='button'>
						<span aria-hidden='true'>x</span>
					</button>
					<strong>You need to set the shop page in WooCommerce Settings, Goto WooCommerce > Settings >  Products Tab > Display Option & Find the Option 'Shop Page' & Set the Shop page.</strong>
				</div>";
			}
		}

		return $alert_msg;
	}
endif;

/* ************************************************************************ */

if( class_exists("woocommerce") ) {

	/* ## Admin Notices */
	if ( woocommerce_get_page_id('shop') == "-1" && is_admin() ) {

		if( ! function_exists( 'history_woocommerce_settings_admin_notices' ) ) :
			
			add_action( 'admin_notices', 'history_woocommerce_settings_admin_notices' );

			function history_woocommerce_settings_admin_notices() {
				?>
				<div class="error">
					<p><?php esc_html_e( "To work this page properly, You need to set the shop page in WooCommerce Settings, Goto WooCommerce > Settings >  Products Tab > Display Option & Find the Option 'Shop Page' & Set the Shop page.", "history" ); ?></p>
				</div>
			<?php
			}
		endif;
	}

	/* Change number or products per row to 3 */
	if ( !function_exists('history_loop_columns') ) :

		add_filter('loop_shop_columns', 'history_loop_columns');

		function history_loop_columns() {
			return 3; // 4 products per row
		}
	endif;
	
	if ( !function_exists('history_related_products_args') ) :

		add_filter( 'woocommerce_output_related_products_args', 'history_related_products_args' );

		function history_related_products_args( $args ) {

			$args['posts_per_page'] = 3; // 4 related products
			$args['columns'] = 3; // arranged in 3 columns
			return $args;
			
		}
	endif;
}