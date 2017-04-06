<?php
/**
 * LatestPosts widget class History
 *
 * @since 2.8.0
 */
class History_Widget_LatestPosts extends WP_Widget {

	public function __construct() {

		$widget_ops = array( 'classname' => 'widget_latestpost', 'description' => esc_html( "Your site&#8217;s most Latest Posts with thumbnail.", "history-toolkit" ) );

		parent::__construct('widget_latestpost', esc_html('History :: Latest Posts with Thumbnail', "history-toolkit"), $widget_ops);

		$this->alt_option_name = 'widget_latestpost';
	}

	public function widget($args, $instance) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		ob_start();

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html( 'Latest Posts', "history-toolkit" );

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;

		if ( ! $number ) {
			$number = 3;
		}

		/**
		 * Filter the arguments for the latest Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$qry_args = array (
			'post_status'            => 'publish',
			'posts_per_page'         => $number,
			'ignore_sticky_posts'    => true,
			'order'                  => 'DESC',
			'orderby'                => 'date',
		);

		$qry = new WP_Query( $qry_args );

		echo html_entity_decode( $args['before_widget'] );

		if ( $title ) {
			echo html_entity_decode( $args['before_title'] . $title . $args['after_title'] );
		}
		?>
		<div class="latestposts">
			<?php
			while ( $qry->have_posts() ) : $qry->the_post();
			
				$css = "";
				if( ! has_post_thumbnail() ) {
					$css = ' no_post_thumb';
				}
				?>
				<div class="latestpost-content">
					<a href="<?php the_permalink(); ?>" title="Post Cover"><?php the_post_thumbnail('history_82_82'); ?></a>
					<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<span><?php echo get_the_date( 'd M Y', get_the_ID() );?></span>
				</div>
				<?php
			endwhile;
			?>
		</div>
		<?php
		echo html_entity_decode( $args['after_widget'] );

		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];

		return $instance;
	}

	public function form( $instance ) {

		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', "history-toolkit" ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', "history-toolkit" ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" />
		</p>
		<?php
	}
}
?>