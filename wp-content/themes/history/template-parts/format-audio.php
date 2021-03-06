<?php
/* Post Format : Audio */
if( get_post_format() == "audio" ) {

	if( get_post_meta( get_the_ID(), 'history_cf_post_audio_source', 1 ) == "soundcloud_link" && get_post_meta( get_the_ID(), 'history_cf_post_soundcloud_url', 1 ) != "" ) {
		?>
		<iframe src="<?php echo esc_url( get_post_meta( get_the_ID(), 'history_cf_post_soundcloud_url', 1 ) ); ?>"></iframe>
		<?php
	}
	elseif( get_post_meta( get_the_ID(), 'history_cf_post_audio_source', 1 ) == "audio_upload_local" && get_post_meta( get_the_ID(), 'history_cf_post_audio_local', 1 ) != "" ) {
		?>
		<audio controls>
			<source src="<?php echo esc_url( get_post_meta( get_the_ID(), 'history_cf_post_audio_local', 1 ) ); ?>" type="audio/mpeg">
			<?php esc_html_e("Your browser does not support the audio element.","history"); ?>
		</audio>
		<?php
	}
}
?>