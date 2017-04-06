<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage History
 * @since History 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h2 class="no-padding no-margin hide"><?php echo the_title(); ?></h2>

	<?php the_post_thumbnail(); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', "history" ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', "history" ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>

	</div><!-- .entry-content -->

	<?php edit_post_link( esc_html__( 'Edit', "history" ), '<div class="container no-padding"><div class="entry-footer"><span class="edit-link">', '</span></div><!-- .entry-footer --></div>' ); ?>

</div><!-- #post-## -->