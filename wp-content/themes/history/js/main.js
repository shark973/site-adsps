/*
	Project Name : History
	
	## Document Scroll		

	## Document Ready
		- Scrolling Navigation
		- Responsive Caret
		- Search
		- Back To Top
		- Portfolio Section
		- Client Carousel
		- Blog Carousel
		- Lightbox for Highlights Video
		- Testimonial Slider

	## Window Load
		- Site Loader
*/

(function($) {

	"use strict"
	
	/* - Testimonial Slider */
	function chkActiveSlider(){
		var slideNum = 0;
		if( $( ".mis-slide.mis-current" ).length > 0 ){
			slideNum = $( ".mis-slide.mis-current" ).attr("id").split("-")[1];
			$( "[id*='mis_slide_content-']" ).css( "display", "none" );
			$( "[id='mis_slide_content-"+slideNum+"']" ).css( "display", "block" );
			$( "[id='mis_slide_content-"+slideNum+"']" ).addClass("animated fadeIn");
		}
	}
		
	/* ## Document Ready - Handler for ready() called */
	$(document).on("ready",function() {
		
		/* - Set Sticky Menu */
		if( $('.header-section').length ) {
			var menu_scroll = $('.header-section').offset().top;
			var sticky_menu = function() {
				var scroll_top = $(window).scrollTop();
				if ( scroll_top > menu_scroll ) {
					$('.header-section').addClass('navbar-fixed-top animated fadeInDown');
				} else {
					$('.header-section').removeClass('navbar-fixed-top animated fadeInDown'); 
				}
			};
			sticky_menu();
			
			$(window).scroll(function() {
				sticky_menu();
			});
		}
		
		$('.navbar-nav li a[href*="#"]:not([href="#"]), .site-logo a[href*="#"]:not([href="#"])').on("click", function(e) {
	
			var $anchor = $(this);
			
			$("html, body").stop().animate({ scrollTop: $($anchor.attr("href")).offset().top - 49 }, 1500, "easeInOutExpo");
			
			e.preventDefault();
		});

		/* - Responsive Caret */
		$(".ddl-switch").on("click", function() {
			var li = $(this).parent();
			if ( li.hasClass("ddl-active") || li.find(".ddl-active").length !== 0 || li.find(".dropdown-menu").is(":visible") ) {
				li.removeClass("ddl-active");
				li.children().find(".ddl-active").removeClass("ddl-active");
				li.children(".dropdown-menu").slideUp();
			}
			else {
				li.addClass("ddl-active");
				li.children(".dropdown-menu").slideDown();
			}
		});
		
		/* - Search */
		if($(".search-box").length){
			$("#search").on("click", function(){
				$(".search-box").addClass("active")
			});
			$(".search-box span").on("click", function(){
				$(".search-box").removeClass("active")
			});
		}
		
		/* - Back To Top */	
		$('#back-to-top').on("click", function()	{
			/* When arrow is clicked */
			$('body,html').animate(
			{
				scrollTop : 0 /* Scroll to top of body */
			},800);
		});
		
		/* - Portfolio Section */
		if($(".portfolio-section").length){
			var url;
			$(".portfolio-section .portfolio-box").magnificPopup({
				delegate: "a",
				type: "image",
				tLoading: "Loading image #%curr%...",
				mainClass: "mfp-img-mobile",
				gallery: {
					enabled: true,
					navigateByImgClick: false,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: "<a href="%url%">The image #%curr%</a> could not be loaded.",				
				}
			});
		}

		/* - Client Carousel */
		if($(".client-carousel").length){
			$(".client-carousel").owlCarousel({
				autoplay: true,
				loop: true,
				dots: false,
				nav: true,
				responsive:{
					0:{
						items:1
					},
					480:{
						items:2
					},
					560:{
						items:3
					},
					768:{
						items:4
					},
					1200:{
						items:5
					}
				},
				margin: 0,
				stagePadding: 0,
				smartSpeed: 450
			});
		}
		
		/* - Blog Carousel */
		if($(".blog-carousel").length){
			$(".blog-carousel").owlCarousel({
				autoplay: true,
				loop: true,
				dots: false,
				nav: false,
				items: 1,
				margin: 0,
				stagePadding: 0,
				smartSpeed: 450
			});
			$(".wc-controls .left").on("click",function(){
				$(".blog-carousel").trigger('next.owl.carousel');
			})
			$(".wc-controls .right").on("click",function(){
				$(".blog-carousel").trigger('prev.owl.carousel');
			})
		}
		
		/* - Lightbox for Highlights Video */
		$('.video-section a').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
		});
		
		if($(".testimonial-section").length) {
			var slider = $('.mis-stage').miSlider({
				speed: 1000,
				stageHeight: false,
				slidesLoaded: true,
				slidesOnStage: false,
				slidePosition: 'center',
				slideStart: 'mid',
				slideWidth: 140,
				slideScaling: 100,
				offsetV: 0,
				centerV: true,
				navButtonsOpacity: 1
			});
		}
		
	});	/* - Document Ready /- */
	
	/* - Window Load - Handler for load() called */
	$(window).on("load",function() {  
		/* - Site Loader */
		if ( !$("html").is(".ie6, .ie7, .ie8") ) {
			$("#site-loader").delay(1000).fadeOut("slow");
		}
		else {
			$("#site-loader").css("display","none");
		}
		
		/* - Portfolio Section */
		var $container = $(".portfolio-section .portfolio-list");
		$container.isotope({
			layoutMode: 'fitRows',
			itemSelector: ".portfolio-box",
			gutter: 0,
			transitionDuration: "0.5s"
		});
		
		$("#filters a").on("click",function(){
			$('#filters a').removeClass("active");
			$(this).addClass("active");
			var selector = $(this).attr("data-filter");
			$container.isotope({ filter: selector });		
			return false;
		});
		
		/* - Testimonial Slider */
		if( $( ".testimonial-slider" ).length ) {
			setInterval( chkActiveSlider, 1000 );
		}
		
	});
	
	if( $('.social ul').length ) {
		$('.social ul > li > a', this).on('click', function() {

			var data_action = $(this).attr('data-action');
			var data_title = $(this).attr('data-title');
			var data_url = $(this).attr('data-url');

			if( data_action == 'facebook' ) {		
				window.open('http://www.facebook.com/share.php?u='+encodeURIComponent(data_url)+'&title='+encodeURIComponent(data_title),'sharer','toolbar=0,status=0,width=580,height=325');
			}
			else if( data_action == 'twitter' ) {
				window.open('http://twitter.com/intent/tweet?status='+encodeURIComponent(data_url)+'+'+encodeURIComponent(data_title),'sharer','toolbar=0,status=0,width=580,height=325');
			}
			else if( data_action == 'google-plus' ) {
				window.open('https://plus.google.com/share?url='+encodeURIComponent(data_url),'sharer','toolbar=0,status=0,width=580,height=325');
			}
			else if( data_action == 'instagram' ) {
				window.open('https://instagram.com/share?url='+encodeURIComponent(data_url),'sharer','toolbar=0,status=0,width=580,height=325');
			}
			else if( data_action == 'linkedin' ) {
				window.open('http://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent(data_url)+'&title='+encodeURIComponent(data_title)+'&source='+encodeURIComponent(data_url),'sharer','toolbar=0,status=0,width=580,height=325');
			}
		});
	}

})(jQuery);