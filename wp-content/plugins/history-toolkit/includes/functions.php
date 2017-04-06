<?php
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

/* Check string for Null or Empty & Print It */
if ( ! function_exists( 'history_content' ) ) :

	function history_content( $before_val, $after_val, $val ) {

		if( $val != "" ) {
			return $before_val.$val.$after_val;
		}
		else {
			return "";
		}
	}
endif;
?>