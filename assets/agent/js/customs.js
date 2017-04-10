
jQuery(document).ready(function(){

	/*"use strict";*/

		
		
		/**
		 * introLoader - Preloader
		 */
		/*jQuery("#introLoader").introLoader({
			animation: {
					name: 'gifLoader',
					options: {
							ease: "easeInOutCirc",
							style: 'dark bubble',
							delayBefore: 500,
							delayAfter: 0,
							exitTime: 300
					}
			}
		});	*/

		
		
		/**
		 * Sticky Header
		 */
		jQuery(".container-wrapper").waypoint(function() {
			jQuery(".navbar").toggleClass("navbar-sticky-function");
			jQuery(".navbar").toggleClass("navbar-sticky");
			return false;
		}, { offset: "-20px" });
		
		
		
		/**
		 * Main Menu Slide Down Effect
		 */
		 
		// Mouse-enter dropdown
		jQuery('#navbar li').on("mouseenter", function() {
				jQuery(this).find('ul').first().stop(true, true).delay(350).slideDown(500, 'easeInOutQuad');
		});

		// Mouse-leave dropdown
		jQuery('#navbar li').on("mouseleave", function() {
				jQuery(this).find('ul').first().stop(true, true).delay(100).slideUp(150, 'easeInOutQuad');
		});
		
		
		
		/**
		 * Effect to Bootstrap Dropdown
		 */
		jQuery('.bt-dropdown-click').on('show.bs.dropdown', function(e) {   
			jQuery(this).find('.dropdown-menu').first().stop(true, true).slideDown(500, 'easeInOutQuad'); 
		}); 
		jQuery('.bt-dropdown-click').on('hide.bs.dropdown', function(e) { 
			jQuery(this).find('.dropdown-menu').first().stop(true, true).slideUp(250, 'easeInOutQuad'); 
		});
		
		
		
		/**
		 * Icon Change on Collapse
		 */
		jQuery('.collapse.in').prev('.panel-heading').addClass('active');
		jQuery('.bootstarp-accordion, .bootstarp-toggle').on('show.bs.collapse', function(a) {
			jQuery(a.target).prev('.panel-heading').addClass('active');
		})
		.on('hide.bs.collapse', function(a) {
			jQuery(a.target).prev('.panel-heading').removeClass('active');
		});
		
		
		
		/**
		 * Slicknav - a Mobile Menu
		 */
		jQuery('#responsive-menu').slicknav({
			duration: 300,
			easingOpen: 'easeInExpo',
			easingClose: 'easeOutExpo',
			closedSymbol: '<i class="fa fa-plus"></i>',
			openedSymbol: '<i class="fa fa-minus"></i>',
			prependTo: '#slicknav-mobile',
			allowParentLinks: true,
			label:"" 
		});
		
		
		
		/**
		 * Smooth scroll to anchor
		 */
		jQuery('a.anchor[href*=#]:not([href=#])').on("click",function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = jQuery(this.hash);
				target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					jQuery('html,body').animate({
						scrollTop: (target.offset().top - 120) // 70px offset for navbar menu
					}, 1000);
					return false;
				}
			}
		});
		
		
		
		/**
		 * Sign-in Modal
		 */
		var jQueryformLogin = jQuery('#login-form');
		var jQueryformLost = jQuery('#lost-form');
		var jQueryformRegister = jQuery('#register-form');
		var jQuerydivForms = jQuery('#modal-login-form-wrapper');
		var jQuerymodalAnimateTime = 300;
		
		jQuery('#login_register_btn').on("click", function () { modalAnimate(jQueryformLogin, jQueryformRegister) });
		jQuery('#register_login_btn').on("click", function () { modalAnimate(jQueryformRegister, jQueryformLogin); });
		jQuery('#login_lost_btn').on("click", function () { modalAnimate(jQueryformLogin, jQueryformLost); });
		jQuery('#lost_login_btn').on("click", function () { modalAnimate(jQueryformLost, jQueryformLogin); });
		jQuery('#lost_register_btn').on("click", function () { modalAnimate(jQueryformLost, jQueryformRegister); });
		
		function modalAnimate (jQueryoldForm, jQuerynewForm) {
			var jQueryoldH = jQueryoldForm.height();
			var jQuerynewH = jQuerynewForm.height();
			jQuerydivForms.css("height",jQueryoldH);
			jQueryoldForm.fadeToggle(jQuerymodalAnimateTime, function(){
				jQuerydivForms.animate({height: jQuerynewH}, jQuerymodalAnimateTime, function(){
					jQuerynewForm.fadeToggle(jQuerymodalAnimateTime);
				});
			});
		}

		
		
		/**
		 * select2 - custom select
		 */
		jQuery(".select2-single").select2({allowClear: true});
		jQuery(".select2-no-search").select2({dropdownCssClass : 'select2-no-search',allowClear: true});
		jQuery(".select2-multi").select2({});
		
		
		
		/**
		 * Show more-less button
		 */
		jQuery('.btn-more-less').on("click",function(){
			jQuery(this).text(function(i,old){
				return old=='Show more' ?  'Show less' : 'Show more';
			});
		});

		
		
		/**
		 *  Arrow for Menu has sub-menu
		 */
		jQuery(".navbar-arrow > ul > li").has("ul").children("a").append("<i class='arrow-indicator fa fa-angle-down'></i>");
		jQuery(".navbar-arrow ul ul > li").has("ul").children("a").append("<i class='arrow-indicator fa fa-angle-right'></i>");
		
		
		
		/**
		 *  Placeholder
		 */
		jQuery("input, textarea").placeholder();

	
	
		/**
		 * Bootstrap tooltips
		 */
		 jQuery('[data-toggle="tooltip"]').tooltip();
		 
		 
		 
		/**
		 * responsivegrid - layout grid
		 */
		jQuery('.grid').responsivegrid({
			gutter : '0',
			itemSelector : '.grid-item',
			'breakpoints': {
				'desktop' : {
					'range' : '1200-',
					'options' : {
						'column' : 20,
					}
				},
				'tablet-landscape' : {
					'range' : '1000-1200',
					'options' : {
						'column' : 20,
					}
				},
				'tablet-portrate' : {
					'range' : '767-1000',
					'options' : {
						'column' : 20,
					}
				},
				'mobile-landscape' : {
					'range' : '-767',
					'options' : {
						'column' : 10,
					}
				},
				'mobile-portrate' : {
					'range' : '-479',
					'options' : {
						'column' : 10,
					}
				},
			}
		});
		
		
		
		/**
		 * Payment Option
		 */
		jQuery("div.payment-option-form").hide();
		jQuery("input[namejQuery='payments']").on("click",function() {
				var test = jQuery(this).val();
				jQuery("div.payment-option-form").hide();
				jQuery("#" + test).show();
		});
		
		
		
		/**
		 * Raty - Rating Star
		 */
		jQuery.fn.raty.defaults.path = 'images/raty';
		
		// Default size star 
		jQuery('.star-rating').raty({
			round : { down: .2, full: .6, up: .8 },
			half: true,
			space: false,
			score: function() {
				return jQuery(this).attr('data-rating-score');
			}
		});
		
		// Read onlu default size star
		jQuery('.star-rating-read-only').raty({
			readOnly: true,
			round : { down: .2, full: .6, up: .8 },
			half: true,
			space: false,
			score: function() {
				return jQuery(this).attr('data-rating-score');
			}
		});
		
		// Smaller size star
		jQuery('.star-rating-12px').raty({
			path: 'images/raty',
			starHalf: 'star-half-sm.png',
			starOff: 'star-off-sm.png',
			starOn: 'star-on-sm.png',
			readOnly: true,
			round : { down: .2, full: .6, up: .8 },
			half: true,
			space: false,
			score: function() {
				return jQuery(this).attr('data-rating-score');
			}
		});
		
		// White color default size star
		jQuery('.star-rating-white').raty({
			path: 'images/raty',
			starHalf: 'star-half-white.png',
			starOff: 'star-off-white.png',
			starOn: 'star-on-white.png',
			readOnly: true,
			round : { down: .2, full: .6, up: .8 },
			half: true,
			space: false,
			score: function() {
				return jQuery(this).attr('data-rating-score');
			}
		});
		
		
		
		/**
		 * readmore - read more/less
		 */
		jQuery('.read-more-div').readmore({
			speed: 220,
			moreLink: '<a href="#" class="read-more-div-open">Read More</a>',
			lessLink: '<a href="#" class="read-more-div-close">Read less</a>',
			collapsedHeight: 45,
			heightMargin: 25
		});

		
		
		/**
		 * ionRangeSlider - range slider
		 */
		 
		 // Price Range Slider
		jQuery("#price_range").ionRangeSlider({
			type: "double",
			grid: true,
			min: 0,
			max: 1000,
			from: 200,
			to: 800,
			prefix: "jQuery"
		});
		
		// Star Range Slider
		jQuery("#star_range").ionRangeSlider({
			type: "double",
			grid: false,
			from: 1,
			to: 2,
			values: [
				"<i class='fa fa-star'></i>", 
				"<i class='fa fa-star'></i> <i class='fa fa-star'></i>",
				"<i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i>", 
				"<i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i>",
				"<i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i>" 
			]
		});

		

		/**
		 * slick
		 */
		jQuery('.gallery-slideshow').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			speed: 500,
			arrows: true,
			fade: true,
			asNavFor: '.gallery-nav'
		});
		jQuery('.gallery-nav').slick({
			slidesToShow: 7,
			slidesToScroll: 1,
			speed: 500,
			asNavFor: '.gallery-slideshow',
			dots: false,
			centerMode: true,
			focusOnSelect: true,
			infinite: true,
			responsive: [
				{
				breakpoint: 1199,
				settings: {
					slidesToShow: 7,
					}
				}, 
				{
				breakpoint: 991,
				settings: {
					slidesToShow: 5,
					}
				}, 
				{
				breakpoint: 767,
				settings: {
					slidesToShow: 5,
					}
				}, 
				{
				breakpoint: 480,
				settings: {
					slidesToShow: 3,
					}
				}
			]
		});


		
		/**
		 * Back To Top
		 */
		jQuery(window).scroll(function(){
			if(jQuery(window).scrollTop() > 500){
				jQuery("#back-to-top").fadeIn(200);
			} else{
				jQuery("#back-to-top").fadeOut(200);
			}
		});
		jQuery('#back-to-top').on("click",function() {
			  jQuery('html, body').animate({ scrollTop:0 }, '800');
			  return false;
		});
		
		
		
		/**
		 * Instagram
		 */
		function createPhotoElement(photo) {
			var innerHtml = jQuery('<img>')
			.addClass('instagram-image')
			.attr('src', photo.images.thumbnail.url);

			innerHtml = jQuery('<a>')
			.attr('target', '_blank')
			.attr('href', photo.link)
			.append(innerHtml);

			return jQuery('<div>')
			.addClass('instagram-placeholder')
			.attr('id', photo.id)
			.append(innerHtml);
		}

		function didLoadInstagram(event, response) {
			var that = this;
			jQuery.each(response.data, function(i, photo) {
			jQuery(that).append(createPhotoElement(photo));
			});
		}

		jQuery(document).ready(function() {
			
			jQuery('#instagram').on('didLoadInstagram', didLoadInstagram);
			jQuery('#instagram').instagram({
			count: 20,
			userId: 302604202,
			accessToken: '735306460.4814dd1.03c1d131c1df4bfea491b3d7006be5e0'
			});

		});

});
