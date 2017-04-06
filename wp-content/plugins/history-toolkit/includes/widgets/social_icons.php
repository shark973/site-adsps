<?php
/**
 * Social Icons widget class HISTORY
 *
 * @since 2.8.0
 */
class History_Widget_Social extends WP_Widget {

	public function __construct() {

		$widget_ops = array('classname' => 'widget_social_icons', 'description' => __( 'A Social Icons Widget.', "history-toolkit" ) );
		parent::__construct('widget_social_icons', esc_html('History :: Social Icons', "history-toolkit-toolkit"), $widget_ops);
	}

	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo html_entity_decode( $args['before_widget'] ); // Widget starts to print information

		if ( $title ) {
			echo html_entity_decode( $args['before_title'] . $title . $args['after_title'] );
		}

		$social_facebook = empty( $instance['social_facebook'] ) ? '' : $instance['social_facebook'];
		$social_twitter = empty( $instance['social_twitter'] ) ? '' : $instance['social_twitter'];
		$social_googleplus = empty( $instance['social_googleplus'] ) ? '' : $instance['social_googleplus'];
		$social_instagram = empty( $instance['social_instagram'] ) ? '' : $instance['social_instagram'];
		$social_linkedin = empty( $instance['social_linkedin'] ) ? '' : $instance['social_linkedin'];
		
		?>

		<ul>
			<?php if( !empty( $social_facebook ) ): ?><li><a target="_blank" href="<?php echo esc_url( $social_facebook ); ?>" title="Facebbok"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
			<?php if( !empty( $social_twitter ) ): ?><li><a target="_blank" href="<?php echo esc_url( $social_twitter ); ?>" title="Twitter"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
			<?php if( !empty( $social_googleplus ) ): ?><li><a target="_blank" href="<?php echo esc_url( $social_googleplus ); ?>"  title="Google"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
			<?php if( !empty( $social_instagram ) ): ?><li><a target="_blank" href="<?php echo esc_url( $social_instagram ); ?>" title="Instagram"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
			<?php if( !empty( $social_linkedin ) ): ?><li><a target="_blank" href="<?php echo esc_url( $social_linkedin ); ?>" title="Linkedin"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
			
		</ul>

		<?php
		echo html_entity_decode( $args['after_widget'] );
	}

	public function form( $instance ) {

		$instance = wp_parse_args( ( array ) $instance, array( 'title' => '' ) );

		$title = $instance['title'];

		$social_facebook = empty( $instance['social_facebook'] ) ? '' : $instance['social_facebook'];
		$social_twitter = empty( $instance['social_twitter'] ) ? '' : $instance['social_twitter'];
		$social_googleplus = empty( $instance['social_googleplus'] ) ? '' : $instance['social_googleplus'];
		$social_instagram = empty( $instance['social_instagram'] ) ? '' : $instance['social_instagram'];
		$social_linkedin = empty( $instance['social_linkedin'] ) ? '' : $instance['social_linkedin'];
		
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:', "history-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('title') ); ?>" name="<?php echo esc_html( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('social_facebook') ); ?>"><?php esc_html_e('Facebook:', "history-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('social_facebook') ); ?>" name="<?php echo esc_html( $this->get_field_name('social_facebook') ); ?>" type="text" value="<?php echo esc_url( $social_facebook ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('social_twitter') ); ?>"><?php esc_html_e('Twitter:', "history-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('social_twitter') ); ?>" name="<?php echo esc_html( $this->get_field_name('social_twitter') ); ?>" type="text" value="<?php echo esc_url( $social_twitter ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('social_googleplus') ); ?>"><?php esc_html_e('Google Plus:', "history-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('social_googleplus') ); ?>" name="<?php echo esc_html( $this->get_field_name('social_googleplus') ); ?>" type="text" value="<?php echo esc_url( $social_googleplus ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('social_instagram') ); ?>"><?php esc_html_e('Instagram:', "history-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('social_instagram') ); ?>" name="<?php echo esc_html( $this->get_field_name('social_instagram') ); ?>" type="text" value="<?php echo esc_url( $social_instagram ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('social_linkedin') ); ?>"><?php esc_html_e('Linkedin', "history-toolkit" ); ?> <input class="widefat" id="<?php echo esc_html( $this->get_field_id('social_linkedin') ); ?>" name="<?php echo esc_html( $this->get_field_name('social_linkedin') ); ?>" type="text" value="<?php echo esc_url( $social_linkedin ); ?>" /></label></p>
		
		<?php
	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$new_instance = wp_parse_args( ( array ) $new_instance, array('title' => '') );

		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['social_facebook'] = ( ! empty( $new_instance['social_facebook'] ) ) ? strip_tags( $new_instance['social_facebook'] ) : '';
		$instance['social_twitter'] = ( ! empty( $new_instance['social_twitter'] ) ) ? strip_tags( $new_instance['social_twitter'] ) : '';
		$instance['social_googleplus'] = ( ! empty( $new_instance['social_googleplus'] ) ) ? strip_tags( $new_instance['social_googleplus'] ) : ''; 
		$instance['social_instagram'] = ( ! empty( $new_instance['social_instagram'] ) ) ? strip_tags( $new_instance['social_instagram'] ) : '';
		$instance['social_linkedin'] = ( ! empty( $new_instance['social_linkedin'] ) ) ? strip_tags( $new_instance['social_linkedin'] ) : '';
		

		return $instance;
	}
}