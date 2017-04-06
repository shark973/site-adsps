(function($) {

	'use strict';

	/* Event - Document Ready */	
	$(document).ready(function($) {

		/* Disable : Page Editor */
		if( $('body.post-type-page #postdivrich').length && $('select#page_template').length ) {

			/* Sidebar Layout */
			if( $('select#page_template').val() != 'default' ) {
				$('body.post-type-page #postdivrich').slideUp(500);
			}

			$('select#page_template').live('change', function() {

				/* Sidebar Layout */
				if( $('select#page_template').val() != 'default' ) {
					$('body.post-type-page #postdivrich').slideUp(500);
				}
				else {
					$('body.post-type-page #postdivrich').slideDown(500);
					$(window).scrollTop($(window).scrollTop()+1);
				}

			});
		}

		/* Post : Formats */
		if( $('#post-formats-select').length ) {

			if( $('input[id="post-format-video"]').is(':checked') ) {
				$('#history_cf_metabox_post_video').slideDown(500); /* Enable Video */
				$('#history_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#history_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}
			else if( $('input[id="post-format-gallery"]').is(':checked') ) {
				$('#history_cf_metabox_post_video').slideUp(500); /* Disable Video */
				$('#history_cf_metabox_post_gallery').slideDown(500); /* Enable Gallery */
				$('#history_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}
			else if( $('input[id="post-format-audio"]').is(':checked') ) {
				$('#history_cf_metabox_post_video').slideUp(500); /* Disable Video */
				$('#history_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#history_cf_metabox_post_audio').slideDown(500); /* Enable Audio */
			}
			else {
				$('#history_cf_metabox_post_video').slideUp(500); /* Disable Video */
				$('#history_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#history_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}
 
			/* On Change : Event */
			$('#post-formats-select').live('change', function() {

				var highlight_css = '"border":"2px solid green", "-webkit-transition":"all 0.3s ease 0s", "-moz-transition":"all 0.3s ease 0s", "-o-transition":"all 0.3s ease 0s", "-ms-transition":"all 0.3s ease 0s", "transition":"all 0.3s ease 0s"';
				
				if( $('input[id="post-format-video"]').is(':checked') ) {
					$('#history_cf_metabox_post_video').slideDown(500); /* Enable Video */
					$('#history_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#history_cf_metabox_post_audio').slideUp(500); /* Disable Audio */

					$("#history_cf_metabox_post_video").css({"border":"2px solid green", "-webkit-transition":"all 0.3s ease 0s", "-moz-transition":"all 0.3s ease 0s", "-o-transition":"all 0.3s ease 0s", "-ms-transition":"all 0.3s ease 0s", "transition":"all 0.3s ease 0s"});
					$('html, body').animate({ scrollTop: $("#history_cf_metabox_post_video").offset().top }, 'slow' );
				}
				else if( $('input[id="post-format-audio"]').is(':checked') ) {
					$('#history_cf_metabox_post_video').slideUp(500); /* Disable Video */
					$('#history_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#history_cf_metabox_post_audio').slideDown(500); /* Enable Audio */
				
					$("#history_cf_metabox_post_audio").css({"border":"2px solid green", "-webkit-transition":"all 0.3s ease 0s", "-moz-transition":"all 0.3s ease 0s", "-o-transition":"all 0.3s ease 0s", "-ms-transition":"all 0.3s ease 0s", "transition":"all 0.3s ease 0s"});
					$('html, body').animate({ scrollTop: $("#history_cf_metabox_post_audio").offset().top }, 'slow' );
				}
				else if( $('input[id="post-format-quote"]').is(':checked') ) {
					$('#history_cf_metabox_post_video').slideUp(500); /* Disable Video */
					$('#history_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#history_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
				}
				else if( $('input[id="post-format-gallery"]').is(':checked') ) {
					$('#history_cf_metabox_post_video').slideUp(500); /* Disable Video */
					$('#history_cf_metabox_post_gallery').slideDown(500); /* Enable Gallery */
					$('#history_cf_metabox_post_audio').slideUp(500); /* Disable Audio */

					$("#history_cf_metabox_post_gallery").css({"border":"2px solid green", "-webkit-transition":"all 0.3s ease 0s", "-moz-transition":"all 0.3s ease 0s", "-o-transition":"all 0.3s ease 0s", "-ms-transition":"all 0.3s ease 0s", "transition":"all 0.3s ease 0s"});
					$('html, body').animate({ scrollTop: $("#history_cf_metabox_post_gallery").offset().top }, 'slow' );
				} 
				else {
					$('#history_cf_metabox_post_video').slideUp(500); /* Disable Video */
					$('#history_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#history_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
				}
			});
		}

		/* Post : Video */
		if( $('#history_cf_post_video_source').val() == 'video_link' ) {
			$('.cmb2-id-history-cf-post-video-link').slideDown(500); /* Enable Video Link */
			$('.cmb2-id-history-cf-post-video-embed').slideUp(500); /* Disable Embed */
			$('.cmb2-id-history-cf-post-video-local').slideUp(500); /* Disable Video Local */
		}
		else if ( $('#history_cf_post_video_source').val() == 'video_embed_code' ) {
			$('.cmb2-id-history-cf-post-video-link').slideUp(500); /* Disable Video Link */
			$('.cmb2-id-history-cf-post-video-embed').slideDown(500); /* Enable Embed */
			$('.cmb2-id-history-cf-post-video-local').slideUp(500); /* Disable Video Local */
		}
		else if ( $('#history_cf_post_video_source').val() == 'video_upload_local' ) {
			$('.cmb2-id-history-cf-post-video-link').slideUp(500); /* Disable Video Link */
			$('.cmb2-id-history-cf-post-video-embed').slideUp(500); /* Disable Embed */
			$('.cmb2-id-history-cf-post-video-local').slideDown(500); /* Enable Video Local */
		}
		else {
			$('.cmb2-id-history-cf-post-video-link').slideUp(500); /* Disable Video Link */
			$('.cmb2-id-history-cf-post-video-embed').slideUp(500); /* Disable Embed */
			$('.cmb2-id-history-cf-post-video-local').slideUp(500); /* Disable Video Local */
		}

		/* On Change : Event */
		$('#history_cf_post_video_source').live('change', function() {

			if( $('#history_cf_post_video_source').val() == 'video_link' ) {
				$('.cmb2-id-history-cf-post-video-link').slideDown(500); /* Enable Video Link */
				$('.cmb2-id-history-cf-post-video-embed').slideUp(500); /* Disable Embed */
				$('.cmb2-id-history-cf-post-video-local').slideUp(500); /* Disable Video Local */
			}
			else if ( $('#history_cf_post_video_source').val() == 'video_embed_code' ) {
				$('.cmb2-id-history-cf-post-video-link').slideUp(500); /* Disable Video Link */
				$('.cmb2-id-history-cf-post-video-embed').slideDown(500); /* Enable Embed */
				$('.cmb2-id-history-cf-post-video-local').slideUp(500); /* Disable Video Local */
			}
			else if ( $('#history_cf_post_video_source').val() == 'video_upload_local' ) {
				$('.cmb2-id-history-cf-post-video-link').slideUp(500); /* Disable Video Link */
				$('.cmb2-id-history-cf-post-video-embed').slideUp(500); /* Disable Embed */
				$('.cmb2-id-history-cf-post-video-local').slideDown(500); /* Enable Video Local */
			}
			else {
				$('.cmb2-id-history-cf-post-video-link').slideUp(500);
				$('.cmb2-id-history-cf-post-video-embed').slideUp(500);
				$('.cmb2-id-history-cf-post-video-local').slideUp(500);
			}
		});

		/* Post : Audio */
		if( $('#history_cf_post_audio_source').val() == 'soundcloud_link' ) {
			$('.cmb2-id-history-cf-post-soundcloud-url').slideDown(500); /* Enable Soundcloud URL */
			$('.cmb2-id-history-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
		}
		else if ( $('#history_cf_post_audio_source').val() == 'audio_upload_local' ) {
			$('.cmb2-id-history-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
			$('.cmb2-id-history-cf-post-audio-local').slideDown(500); /* Disable Audio Local */
		}
		else {
			$('.cmb2-id-history-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
			$('.cmb2-id-history-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
		}

		/* On Change : Event */
		$('#history_cf_post_audio_source').live('change', function() {
			if( $('#history_cf_post_audio_source').val() == 'soundcloud_link' ) {
				$('.cmb2-id-history-cf-post-soundcloud-url').slideDown(500); /* Enable Soundcloud URL */
				$('.cmb2-id-history-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
			}
			else if ( $('#history_cf_post_audio_source').val() == 'audio_upload_local' ) {
				$('.cmb2-id-history-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
				$('.cmb2-id-history-cf-post-audio-local').slideDown(500); /* Disable Audio Local */
			}
			else {
				$('.cmb2-id-history-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
				$('.cmb2-id-history-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
			}
		});


		/* Page : Metabox */
		if( $('#history_cf_metabox_page').length || $('#history_cf_metabox_product').length ) {

			/* Header Background Color */
			if( $('select#history_cf_page_title').val() != 'enable' ) {
				$('.cmb2-id-history-cf-page-subtitle').slideUp(500);
				$('.cmb2-id-history-cf-page-header-img').slideUp(500);
			}

			$('#history_cf_page_title').live('change', function() {

				/* Header Background Image */
				if( $('select#history_cf_page_title').val() == 'disable' ) {
					$('.cmb2-id-history-cf-page-subtitle').slideUp(500);
					$('.cmb2-id-history-cf-page-header-img').slideUp(500);
				}
				else {
					$('.cmb2-id-history-cf-page-subtitle').slideDown(500);
					$('.cmb2-id-history-cf-page-header-img').slideDown(500);
				}
			});

			/* Sidebar Layout - Page */
			if( $('select#history_cf_sidebar_layout').val() == 'no_sidebar' ) {
				$('.cmb2-id-history-cf-widget-area').slideUp(500);
			}

			$('select#history_cf_sidebar_layout').live('change', function() {

				/* Sidebar Layout - Page */
				if( $('select#history_cf_sidebar_layout').val() == 'no_sidebar' ) {
					$('.cmb2-id-history-cf-widget-area').slideUp(500);
				}
				else {
					$('.cmb2-id-history-cf-widget-area').slideDown(500);
				}

			});
		}

		/* Customizer Options */
		if( $('[data-customize-setting-link="select_logo"]').val() == 'custom_txt' ) {
			$('#customize-control-img_sitelogo').slideUp(500);
			$('#customize-control-txt_custom_logo').slideDown(500);
		}
		else if( $('[data-customize-setting-link="select_logo"]').val() == 'site_title' ) {
			$('#customize-control-txt_custom_logo').slideUp(500);
			$('#customize-control-img_sitelogo').slideUp(500);
		}
		else if( $('[data-customize-setting-link="select_logo"]').val() == 'img_logo' ) {
			$('#customize-control-txt_custom_logo').slideUp(500);
			$('#customize-control-img_sitelogo').slideDown(500);
		}

		/* On Change : Event */
		$('[data-customize-setting-link="select_logo"]').live('change', function() {

			if( $('[data-customize-setting-link="select_logo"]').val() == 'custom_txt' ) {
				$('#customize-control-img_sitelogo').slideUp(500);
				$('#customize-control-txt_custom_logo').slideDown(500);
			}
			else if( $('[data-customize-setting-link="select_logo"]').val() == 'site_title' ) {
				$('#customize-control-txt_custom_logo').slideUp(500);
				$('#customize-control-img_sitelogo').slideUp(500);
			}
			else if( $('[data-customize-setting-link="select_logo"]').val() == 'img_logo' ) {
				$('#customize-control-txt_custom_logo').slideUp(500);
				$('#customize-control-img_sitelogo').slideDown(500);
			}
		});
	});
})(jQuery);