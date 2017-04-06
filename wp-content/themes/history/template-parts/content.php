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
<article id="post-<?php the_ID(); ?>" <?php post_class($css); ?>>

	<div class="entry-cover">

		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?> <span class="sticky-post"><?php esc_html_e( 'Featured', "history" ); ?></span> <?php endif; ?>

		<?php get_template_part("template-parts/format","gallery"); ?>

		<?php get_template_part("template-parts/format","video"); ?>

		<?php get_template_part("template-parts/format","audio"); ?>

		<?php
		if( has_post_thumbnail() && ( get_post_format() != "audio" && get_post_format() != "video" && get_post_format() != "gallery" ) ) {

			if( is_single() ) {
				the_post_thumbnail();
			}
			else {
				?>
				<a href="<?php the_permalink(); ?>" class="post-thumbnail">
					<?php the_post_thumbnail("full"); ?>
				</a>
				<?php
			}
		} 
		?>
	</div>
	<div class="entry-header">
		<div class="post-date">	
			<b><?php echo get_the_date( 'd', get_the_ID() );?></b>
			<span><?php echo get_the_date( 'M', get_the_ID() );?></span>
			<span><?php echo get_the_date( 'Y', get_the_ID() );?></span>
		</div>
		<?php
		if ( is_single() ) :
			
		else :
			the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
		endif;
		?>
		<div class="entry-meta">
			<div class="byline">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
					<?php the_author() ?>
				</a>
			</div>
			<div class="post-comment">
				<a href="<?php comments_link(); ?>">
					<i class="fa fa-commenting-o"></i>
					<?php comments_number( __( '(0) Comments', "history" ), __( '1 Comment', "history" ),__( '(%) Comments', "history" )); ?>
				</a>
			</div>
		</div>
	</div>
	<div class="entry-content">
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
			if( has_tag() ) {
					?>
					<div class="entry-meta tags">
						<span><?php echo esc_html_e("Tags:", "history"); ?></span>
						<?php echo get_the_tag_list(); ?>
					</div>
					<?php 
				}
			?>
			<div class="post-category">
				<span><?php echo esc_html_e("Category:", "history"); ?></span><?php the_category( ' , ' ); ?>
			</div>
			<div class="social">
				<h3><?php echo esc_html_e("Share", "history"); ?></h3>
				<ul>
					<li><a href="javascript: void(0)" data-action="facebook" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-facebook"></i></a></li>
					<li><a href="javascript: void(0)" data-action="twitter" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-twitter"></i></a></li>
					<li><a href="javascript: void(0)" data-action="google-plus" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="javascript: void(0)" data-action="instagram" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-instagram"></i></a></li>
					<li><a href="javascript: void(0)" data-action="linkedin" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
			<?php
		}
		else {
			?>
			<?php echo htmlspecialchars_decode( wpautop( wp_html_excerpt( strip_shortcodes( get_the_content() ), 200, ' [...]' ) ) ); ?>
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_html_e("Read More", "history"); ?>">
					<?php echo esc_html_e("Read More", "history"); ?>
				</a>
			<?php
		}
		?>
	</div>
	
</article>