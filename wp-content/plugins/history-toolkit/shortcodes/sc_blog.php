<?php
function history_blog( $atts ) {

	extract( shortcode_atts( array( 'sc_title' => '', 'sc_subtitle' => '', 'sc_desc' => '', 'sc_posts' => '', 'sc_layout' => 'one'  ), $atts ) );

	$ow_post_type = 'post';

	if( '' === $sc_posts ) :
		$sc_posts = 4;		
	endif;

	$qry = new WP_Query( array(
		'post_type' => $ow_post_type,
		'posts_per_page' => $sc_posts,
		'order' => 'ASC',
	) );

	ob_start();

	if( $sc_layout == "one" ) {
		?>		
		<!-- Latest Blog -->
		<div class="container-fluid latest-blog">
			<div class="section-padding"></div>
			<!-- Container -->
			<div class="container">
				<div class="row">
					<?php
						if( $sc_title != "" || $sc_subtitle != "") { 
							?>
							<div class="col-md-4">
								<!-- Section Header -->
								<div class="section-header">
									<div class="section-title-border">
										<?php if( $sc_title != "" ) { ?><span><?php echo esc_attr( $sc_title ); ?></span><?php } ?>
										<?php if( $sc_subtitle != "" ) { ?><h2><?php echo esc_attr( $sc_subtitle ); ?></h2><?php } ?>
									</div>
								</div><!-- Section Header /- -->	
							</div>
							<?php
						}
						if($sc_desc !="" ) {
							?>
							<div class="col-md-6">
								<?php echo wpautop($sc_desc); ?>
							</div>
							<?php
						}
					?>
					<div class="col-md-2">
						<div class="wc-controls">
							<a href="javascript:void(0)" class="left"><span></span></a>
							<a href="javascript:void(0)" class="right"><span></span></a>
						</div>
					</div>
					<div class="blog-carousel col-md-12 no-padding">
					<?php
						while ( $qry->have_posts() ) : $qry->the_post();
							?>
							<article class="type-post">
								<div class="col-md-6">
									<div class="entry-cover">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('history_570_350'); ?>
										</a>
									</div>
								</div>
								<div class="col-md-6">
									<div class="entry-header">
										<div class="post-date">	
											<b><?php echo get_the_date( 'd', get_the_ID() ); ?></b>
											<span><?php echo get_the_date( 'M', get_the_ID() ); ?></span>
											<span><?php echo get_the_date( 'Y', get_the_ID() ); ?></span>
										</div>
										<h3 class="entry-title">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
										</h3>
									</div>
									<div class="entry-content">
										<p><?php echo wp_html_excerpt( strip_shortcodes( get_the_content() ), 200, ' [...]' ); ?></p>
										<div class="entry-meta">
											<div class="byline">
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
													<?php echo get_the_author(); ?>
												</a>
											</div>
											<div class="post-comment">
												<a href="<?php the_permalink(); ?>">
													<i class="fa fa-commenting-o"></i>
													<?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', "history-toolkit" ), number_format_i18n( get_comments_number() ) ); ?>
												</a>
											</div>
										</div>
										<a href="<?php the_permalink(); ?>" title="<?php esc_html('Read More',"history-toolkit"); ?>">
											<?php esc_html('Read More',"history-toolkit"); ?>
										</a>
									</div>
								</div>
							</article>
							<?php
						endwhile;
							
						// Reset Post Data
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div><!-- Container /- -->
			<div class="section-padding"></div>
		</div><!-- Latest Blog /- -->
		<?php
	}
	elseif( $sc_layout == "two" ) {
		
		query_posts('posts_per_page='.get_option('posts_per_page').'&paged='. get_query_var('paged'));
		
		if ( have_posts() ) {
			?>
			<div class="blog-listing">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( "template-parts/content",get_post_format());

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				// End the loop.
				endwhile;
				
				// Previous/next page navigation.				
				the_posts_pagination( array(
					'prev_text'          => wp_kses( __( '<i class="fa fa-angle-left"></i> Previous', "history-toolkit" ), array( 'i' => array( 'class' => array() ) ) ),
					'next_text'          => wp_kses( __( 'Next <i class="fa fa-angle-right"></i>', "history-toolkit" ), array( 'i' => array( 'class' => array() ) ) ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html( 'Page', "history-toolkit" ) . ' </span>',
				) );		
				
				// Reset Query
				wp_reset_query();		
				?>
			</div>
			<?php
		}
	}

	return ob_get_clean();
}
add_shortcode('history_blog', 'history_blog');

if( function_exists('vc_map') ) {

	vc_map( array(
		'base' => 'history_blog',
		'name' => __( 'Blog', "history-toolkit" ),
		'class' => '',
		"category" => esc_html__("HISTORY", "history-toolkit"),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __( 'Select a Layout', "history-toolkit" ),
				'param_name' => 'sc_layout',
				'value' => array(
					__( 'Layout 1', "history-toolkit" ) => 'one',
					__( 'Layout 2', "history-toolkit" ) => 'two',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'No of Posts', "history-toolkit" ),
				'param_name' => 'sc_posts',
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'one' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', "history-toolkit" ),
				'param_name' => 'sc_title',
				'holder' => 'div',
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'one' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Sub Title', "history-toolkit" ),
				'param_name' => 'sc_subtitle',
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'one' ) ),
			),
			array(
				'type' => 'textarea',
				'heading' => __( 'Description', "history-toolkit" ),
				'param_name' => 'sc_desc',
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'one' ) ),
			),
		),
	) );
}
?>