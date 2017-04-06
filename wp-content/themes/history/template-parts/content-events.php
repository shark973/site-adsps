<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage History
 * @since History 1.0
 */

$css = "";
if( ! has_post_thumbnail() ) {
	$css = " no-post-thumbnail";
}

// Get post format
$post_format = get_post_format();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $css ); ?>>

	<div class="events-single">

		<!-- Event Block -->
		<div class="col-md-12 col-sm-12 col-xs-12 no-padding event-block">
		
			<div class="col-md-12 col-sm-12 col-xs-12 no-padding event-cover">				
				<?php the_post_thumbnail("full"); ?>				
			</div>
			
			<div class="col-md-12 col-sm-12 col-xs-12 event-content">
				
				<div class="post-date"><span><?php echo get_the_date( 'd', get_the_ID() ); ?></span><span><?php echo get_the_date( 'M', get_the_ID() ); ?></span></div>

				<h4><span><i class="fa fa-map-marker"></i><?php echo get_post_meta( get_the_ID(), "history_cf_event_location", true ); ?></span><span><i class="fa fa-clock-o"></i><?php echo get_post_meta( get_the_ID(), "history_cf_event_time", true ); ?></span></h4>

				<?php
				if( is_single() ) {
					/* translators: %s: Name of current post */
					the_content( sprintf(
						esc_html__( 'Continue reading %s', "history" ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', "history" ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', "history" ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
				}
				else {
					?>
					<p><?php echo wp_html_excerpt( strip_shortcodes( get_the_content() ), 200, ' [...]' ); ?></p>
					<?php
				} ?>
				<!--a href="#" title="Book Now">Book Now</a-->
			</div>
		</div><!-- Event Block /- -->
		<?php 
			if(get_post_meta( get_the_ID(),"history_cf_event_maplat", true ) && get_post_meta( get_the_ID(),"history_cf_event_maplng", true ) ) {
				?>
				<!-- Map -->
				<div class="col-md-12 col-sm-12 col-xs-12 no-padding map-section">
					<div id="map-canvas-contact" class="map-canvas"  data-lat="<?php echo esc_attr(get_post_meta( get_the_ID(),"history_cf_event_maplat", true ) ); ?>" data-lng="<?php echo esc_attr(get_post_meta( get_the_ID(),"history_cf_event_maplng", true ) ); ?>" data-string="<?php echo esc_html( get_post_meta( get_the_ID(),"history_cf_event_mapadd", true  ) ); ?>" data-marker="<?php  echo esc_url( HISTORY_LIB ).'images/marker.png'; ?>" data-zoom="12"></div>
				</div><!-- Map /- -->
				<?php
			}
		?>
	</div><!-- Content Area /- -->
</article>
<div class="clearfix"></div>