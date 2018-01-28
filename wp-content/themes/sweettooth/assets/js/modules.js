(function($) {
    "use strict";

    window.eltdf = {};
    eltdf.modules = {};

    eltdf.scroll = 0;
    eltdf.window = $(window);
    eltdf.document = $(document);
    eltdf.windowWidth = $(window).width();
    eltdf.windowHeight = $(window).height();
    eltdf.body = $('body');
    eltdf.html = $('html, body');
    eltdf.htmlEl = $('html');
    eltdf.menuDropdownHeightSet = false;
    eltdf.defaultHeaderStyle = '';
    eltdf.minVideoWidth = 1500;
    eltdf.videoWidthOriginal = 1280;
    eltdf.videoHeightOriginal = 720;
    eltdf.videoRatio = 1.61;

    eltdf.eltdfOnDocumentReady = eltdfOnDocumentReady;
    eltdf.eltdfOnWindowLoad = eltdfOnWindowLoad;
    eltdf.eltdfOnWindowResize = eltdfOnWindowResize;
    eltdf.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);

    /*
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdf.scroll = $(window).scrollTop();

        //set global variable for header style which we will use in various functions
        if(eltdf.body.hasClass('eltdf-dark-header')){ eltdf.defaultHeaderStyle = 'eltdf-dark-header';}
        if(eltdf.body.hasClass('eltdf-light-header')){ eltdf.defaultHeaderStyle = 'eltdf-light-header';}
    }

    /*
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {

    }

    /*
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
        eltdf.windowWidth = $(window).width();
        eltdf.windowHeight = $(window).height();
    }

    /*
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {
        eltdf.scroll = $(window).scrollTop();
    }

    //set boxed layout width variable for various calculations

    switch(true){
        case eltdf.body.hasClass('eltdf-grid-1300'):
            eltdf.boxedLayoutWidth = 1350;
            break;
        case eltdf.body.hasClass('eltdf-grid-1200'):
            eltdf.boxedLayoutWidth = 1250;
            break;
        case eltdf.body.hasClass('eltdf-grid-1000'):
            eltdf.boxedLayoutWidth = 1050;
            break;
        case eltdf.body.hasClass('eltdf-grid-800'):
            eltdf.boxedLayoutWidth = 850;
            break;
        default :
            eltdf.boxedLayoutWidth = 1150;
            break;
    }

})(jQuery);
(function($) {
	"use strict";

    var common = {};
    eltdf.modules.common = common;

    common.eltdfFluidVideo = eltdfFluidVideo;
    common.eltdfEnableScroll = eltdfEnableScroll;
    common.eltdfDisableScroll = eltdfDisableScroll;
    common.eltdfOwlSlider = eltdfOwlSlider;
	common.eltdfInitParallax = eltdfInitParallax;
    common.eltdfInitSelfHostedVideoPlayer = eltdfInitSelfHostedVideoPlayer;
    common.eltdfSelfHostedVideoSize = eltdfSelfHostedVideoSize;
	common.eltdfPrettyPhoto = eltdfPrettyPhoto;
    common.getLoadMoreData = getLoadMoreData;
    common.setLoadMoreAjaxData = setLoadMoreAjaxData;

    common.eltdfOnDocumentReady = eltdfOnDocumentReady;
    common.eltdfOnWindowLoad = eltdfOnWindowLoad;
    common.eltdfOnWindowResize = eltdfOnWindowResize;
    common.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);

    /*
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
	    eltdfIconWithHover().init();
	    eltdfInitCustomMenuDropdown();
	    eltdfIEversion();
	    eltdfDisableSmoothScrollForMac();
	    eltdfInitAnchor().init();
	    eltdfInitBackToTop();
	    eltdfBackButtonShowHide();
	    eltdfInitRowImageResponsiveness();
	    eltdfInitSelfHostedVideoPlayer();
	    eltdfSelfHostedVideoSize();
	    eltdfFluidVideo();
	    eltdfOwlSlider();
	    eltdfPreloadBackgrounds();
	    eltdfPrettyPhoto();
    }

    /*
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {
	    eltdfInitParallax();
        eltdfSmoothTransition();
    }

    /*
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
        eltdfSelfHostedVideoSize();
    }

    /*
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {
    }

	/*
	 * IE version
	 */
	function eltdfIEversion() {
		var ua = window.navigator.userAgent;
		var msie = ua.indexOf("MSIE ");

		if (msie > 0) {
			var version = parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)));
			eltdf.body.addClass('eltdf-ms-ie'+version);
		}
		return false;
	}

	/*
	 ** Disable smooth scroll for mac if smooth scroll is enabled
	 */
	function eltdfDisableSmoothScrollForMac() {
		var os = navigator.appVersion.toLowerCase();

		if (os.indexOf('mac') > -1 && eltdf.body.hasClass('eltdf-smooth-scroll')) {
			eltdf.body.removeClass('eltdf-smooth-scroll');
		}
	}

	function eltdfDisableScroll() {
		if (window.addEventListener) {
			window.addEventListener('DOMMouseScroll', eltdfWheel, false);
		}

		window.onmousewheel = document.onmousewheel = eltdfWheel;
		document.onkeydown = eltdfKeydown;
	}

	function eltdfEnableScroll() {
		if (window.removeEventListener) {
			window.removeEventListener('DOMMouseScroll', eltdfWheel, false);
		}

		window.onmousewheel = document.onmousewheel = document.onkeydown = null;
	}

	function eltdfWheel(e) {
		eltdfPreventDefaultValue(e);
	}

	function eltdfKeydown(e) {
		var keys = [37, 38, 39, 40];

		for (var i = keys.length; i--;) {
			if (e.keyCode === keys[i]) {
				eltdfPreventDefaultValue(e);
				return;
			}
		}
	}

	function eltdfPreventDefaultValue(e) {
		e = e || window.event;
		if (e.preventDefault) {
			e.preventDefault();
		}
		e.returnValue = false;
	}

	/*
	 **	Anchor functionality
	 */
	var eltdfInitAnchor = function() {
		/**
		 * Set active state on clicked anchor
		 * @param anchor, clicked anchor
		 */
		var setActiveState = function(anchor){

			$('.eltdf-main-menu .eltdf-active-item, .eltdf-mobile-nav .eltdf-active-item, .eltdf-fullscreen-menu .eltdf-active-item').removeClass('eltdf-active-item');
			anchor.parent().addClass('eltdf-active-item');

			$('.eltdf-main-menu a, .eltdf-mobile-nav a, .eltdf-fullscreen-menu a').removeClass('current');
			anchor.addClass('current');
		};

		/**
		 * Check anchor active state on scroll
		 */
		var checkActiveStateOnScroll = function(){

			$('[data-eltdf-anchor]').waypoint( function(direction) {
				if(direction === 'down') {
					setActiveState($("a[href='"+window.location.href.split('#')[0]+"#"+$(this.element).data("eltdf-anchor")+"']"));
				}
			}, { offset: '50%' });

			$('[data-eltdf-anchor]').waypoint( function(direction) {
				if(direction === 'up') {
					setActiveState($("a[href='"+window.location.href.split('#')[0]+"#"+$(this.element).data("eltdf-anchor")+"']"));
				}
			}, { offset: function(){
				return -($(this.element).outerHeight() - 150);
			} });

		};

		/**
		 * Check anchor active state on load
		 */
		var checkActiveStateOnLoad = function(){
			var hash = window.location.hash.split('#')[1];

			if(hash !== "" && $('[data-eltdf-anchor="'+hash+'"]').length > 0){
				anchorClickOnLoad(hash);
			}
		};

		/**
		 * Handle anchor on load
		 */
		var anchorClickOnLoad = function($this) {
			var scrollAmount;
			var anchor = $('a');
			var hash = $this;
			if(hash !== "" && $('[data-eltdf-anchor="' + hash + '"]').length > 0 ) {
				var anchoredElementOffset = $('[data-eltdf-anchor="' + hash + '"]').offset().top;
				scrollAmount = $('[data-eltdf-anchor="' + hash + '"]').offset().top - headerHeihtToSubtract(anchoredElementOffset) - eltdfGlobalVars.vars.eltdfAddForAdminBar;

				setActiveState(anchor);

				eltdf.html.stop().animate({
					scrollTop: Math.round(scrollAmount)
				}, 1000, function() {
					//change hash tag in url
					if(history.pushState) { history.pushState(null, null, '#'+hash); }
				});
				return false;
			}
		};

		/**
		 * Calculate header height to be substract from scroll amount
		 * @param anchoredElementOffset, anchorded element offest
		 */
		var headerHeihtToSubtract = function(anchoredElementOffset){

			if(eltdf.modules.stickyHeader.behaviour === 'eltdf-sticky-header-on-scroll-down-up') {
				eltdf.modules.stickyHeader.isStickyVisible = (anchoredElementOffset > eltdf.modules.header.stickyAppearAmount);
			}

			if(eltdf.modules.stickyHeader.behaviour === 'eltdf-sticky-header-on-scroll-up') {
				if((anchoredElementOffset > eltdf.scroll)){
					eltdf.modules.stickyHeader.isStickyVisible = false;
				}
			}

			var headerHeight = eltdf.modules.stickyHeader.isStickyVisible ? eltdfGlobalVars.vars.eltdfStickyHeaderTransparencyHeight : eltdfPerPageVars.vars.eltdfHeaderTransparencyHeight;

			if(eltdf.windowWidth < 1025) {
				headerHeight = 0;
			}

			return headerHeight;
		};

		/**
		 * Handle anchor click
		 */
		var anchorClick = function() {
			eltdf.document.on("click", ".eltdf-main-menu a, .eltdf-fullscreen-menu a, .eltdf-btn, .eltdf-anchor, .eltdf-mobile-nav a", function() {
				var scrollAmount;
				var anchor = $(this);
				var hash = anchor.prop("hash").split('#')[1];

				if(hash !== "" && $('[data-eltdf-anchor="' + hash + '"]').length > 0 ) {

					var anchoredElementOffset = $('[data-eltdf-anchor="' + hash + '"]').offset().top;
					scrollAmount = $('[data-eltdf-anchor="' + hash + '"]').offset().top - headerHeihtToSubtract(anchoredElementOffset) - eltdfGlobalVars.vars.eltdfAddForAdminBar;

					setActiveState(anchor);

					eltdf.html.stop().animate({
						scrollTop: Math.round(scrollAmount)
					}, 1000, function() {
						//change hash tag in url
						if(history.pushState) { history.pushState(null, null, '#'+hash); }
					});
					return false;
				}
			});
		};

		return {
			init: function() {
				if($('[data-eltdf-anchor]').length) {
					anchorClick();
					checkActiveStateOnScroll();
					$(window).load(function() { checkActiveStateOnLoad(); });
				}
			}
		};
	};

	function eltdfInitBackToTop(){
		var backToTopButton = $('#eltdf-back-to-top');
		backToTopButton.on('click',function(e){
			e.preventDefault();
			eltdf.html.animate({scrollTop: 0}, eltdf.window.scrollTop()/3, 'linear');
		});
	}

	function eltdfBackButtonShowHide(){
		eltdf.window.scroll(function () {
			var b = $(this).scrollTop();
			var c = $(this).height();
			var d;
			if (b > 0) { d = b + c / 2; } else { d = 1; }
			if (d < 1e3) { eltdfToTopButton('off'); } else { eltdfToTopButton('on'); }
		});
	}

	function eltdfToTopButton(a) {
		var b = $("#eltdf-back-to-top");
		b.removeClass('off on');
		if (a === 'on') { b.addClass('on'); } else { b.addClass('off'); }
	}

	function eltdfInitSelfHostedVideoPlayer() {
		var players = $('.eltdf-self-hosted-video');

		if(players.length) {
			players.mediaelementplayer({
				audioWidth: '100%'
			});
		}
	}

	function eltdfSelfHostedVideoSize(){
		var selfVideoHolder = $('.eltdf-self-hosted-video-holder .eltdf-video-wrap');

		if(selfVideoHolder.length) {
			selfVideoHolder.each(function(){
				var thisVideo = $(this),
					videoWidth = thisVideo.closest('.eltdf-self-hosted-video-holder').outerWidth(),
					videoHeight = videoWidth / eltdf.videoRatio;

				if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
					thisVideo.parent().width(videoWidth);
					thisVideo.parent().height(videoHeight);
				}

				thisVideo.width(videoWidth);
				thisVideo.height(videoHeight);

				thisVideo.find('video, .mejs-overlay, .mejs-poster').width(videoWidth);
				thisVideo.find('video, .mejs-overlay, .mejs-poster').height(videoHeight);
			});
		}
	}

	function eltdfFluidVideo() {
        fluidvids.init({
			selector: ['iframe'],
			players: ['www.youtube.com', 'player.vimeo.com']
		});
	}

	function eltdfSmoothTransition() {

        if (eltdf.body.hasClass('eltdf-smooth-page-transitions')) {

            //check for preload animation
            if (eltdf.body.hasClass('eltdf-smooth-page-transitions-preloader')) {
                var loader = $('body > .eltdf-smooth-transition-loader.eltdf-mimic-ajax');
                loader.fadeOut(500);
                $(window).bind("pageshow", function (event) {
                    if (event.originalEvent.persisted) {
                        loader.fadeOut(500);
                    }
                });
            }

            //check for fade out animation
			if(eltdf.body.hasClass('eltdf-smooth-page-transitions-fadeout')) {
				var linkItem = $('a');

				linkItem.click(function (e) {
                    var a = $(this);

                    if ((a.parents('.eltdf-shopping-cart-dropdown').length || a.parent('.product-remove').length) && a.hasClass('remove')) {
                        return false;
                    }

                    if (
                        e.which == 1 && // check if the left mouse button has been pressed
                        a.attr('href').indexOf(window.location.host) >= 0 && // check if the link is to the same domain
                        (typeof a.data('rel') === 'undefined') && //Not pretty photo link
                        (typeof a.attr('rel') === 'undefined') && //Not VC pretty photo link
                        (typeof a.attr('target') === 'undefined' || a.attr('target') === '_self') && // check if the link opens in the same window
                        (a.attr('href').split('#')[0] !== window.location.href.split('#')[0]) // check if it is an anchor aiming for a different page
                    ) {
                        e.preventDefault();
                        $('.eltdf-wrapper-inner').fadeOut(1000, function () {
                            window.location = a.attr('href');
                        });
                    }
                });
            }
		}
	}

	/*
	 *	Preload background images for elements that have 'eltdf-preload-background' class
	 */
	function eltdfPreloadBackgrounds(){
		var preloadBackHolder = $('.eltdf-preload-background');

		if(preloadBackHolder.length) {
			preloadBackHolder.each(function() {
				var preloadBackground = $(this);

				if(preloadBackground.css("background-image") !== "" && preloadBackground.css("background-image") != "none") {
					var bgUrl = preloadBackground.attr('style');

					bgUrl = bgUrl.match(/url\(["']?([^'")]+)['"]?\)/);
					bgUrl = bgUrl ? bgUrl[1] : "";

					if (bgUrl) {
						var backImg = new Image();
						backImg.src = bgUrl;
						$(backImg).load(function(){
							preloadBackground.removeClass('eltdf-preload-background');
						});
					}
				} else {
					$(window).load(function(){ preloadBackground.removeClass('eltdf-preload-background'); }); //make sure that eltdf-preload-background class is removed from elements with forced background none in css
				}
			});
		}
	}

	function eltdfPrettyPhoto() {
		/*jshint multistr: true */
		var markupWhole = '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#"><span class="fa fa-angle-right"></span></a> \
                                            <a class="pp_previous" href="#"><span class="fa fa-angle-left"></span></a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                            <a class="pp_close" href="#">Close</a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>';

		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			hook: 'data-rel',
			animation_speed: 'normal', /* fast/slow/normal */
			slideshow: false, /* false OR interval time in ms */
			autoplay_slideshow: false, /* true/false */
			opacity: 0.80, /* Value between 0 and 1 */
			show_title: true, /* true/false */
			allow_resize: true, /* Resize the photos bigger than viewport. true/false */
			horizontal_padding: 0,
			default_width: 960,
			default_height: 540,
			counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
			theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
			hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
			wmode: 'opaque', /* Set the flash wmode attribute */
			autoplay: true, /* Automatically start videos: True/False */
			modal: false, /* If set to true, only the close button will close the window */
			overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
			keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
			deeplinking: false,
			custom_markup: '',
			social_tools: false,
			markup: markupWhole
		});
	}

	/**
	 * Initializes load more data params
	 * @param container with defined data params
	 * return array
	 */
	function getLoadMoreData(container){
		var dataList = container.data(),
			returnValue = {};

		for (var property in dataList) {
			if (dataList.hasOwnProperty(property)) {
				if (typeof dataList[property] !== 'undefined' && dataList[property] !== false) {
					returnValue[property] = dataList[property];
				}
			}
		}

		return returnValue;
	}

	/**
	 * Sets load more data params for ajax function
	 * @param container with defined data params
	 * return array
	 */
	function setLoadMoreAjaxData(container, action){
		var returnValue = {
			action: action
		};

		for (var property in container) {
			if (container.hasOwnProperty(property)) {

				if (typeof container[property] !== 'undefined' && container[property] !== false) {
					returnValue[property] = container[property];
				}
			}
		}

		return returnValue;
	}

	/**
	 * Object that represents icon with hover data
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var eltdfIconWithHover = function() {
		//get all icons on page
		var icons = $('.eltdf-icon-has-hover');

		/**
		 * Function that triggers icon hover color functionality
		 */
		var iconHoverColor = function(icon) {
			if(typeof icon.data('hover-color') !== 'undefined') {
				var changeIconColor = function(event) {
					event.data.icon.css('color', event.data.color);
				};

				var hoverColor = icon.data('hover-color'),
					originalColor = icon.css('color');

				if(hoverColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverColor}, changeIconColor);
					icon.on('mouseleave', {icon: icon, color: originalColor}, changeIconColor);
				}
			}
		};

		/**
		 * Function that triggers icon holder background color hover functionality
		 */
		var iconWidgetHolderBackgroundHover = function(icon) {
			if(typeof icon.data('hover-background-color') !== 'undefined') {
				var changeIconBgColor = function(event) {
					event.data.icon.css('background-color', event.data.color);
				};

				var iconElement = icon.find('.eltdf-icon-holder');
				var hoverBackgroundColor = icon.data('hover-background-color');
				var originalBackgroundColor = iconElement.css('background-color');

				if(hoverBackgroundColor !== '') {
					icon.on('mouseenter', {icon: iconElement, color: hoverBackgroundColor}, changeIconBgColor);
					icon.on('mouseleave', {icon: iconElement, color: originalBackgroundColor}, changeIconBgColor);
				}
			}
		};

		/**
		 * Function that initializes icon holder border hover functionality
		 */
		var iconWidgetHolderBorderHover = function(icon) {
			if(typeof icon.data('hover-border-color') !== 'undefined') {
				var changeIconBorder = function(event) {
					event.data.icon.css('border-color', event.data.color);
				};

				var iconElement = icon.find('.eltdf-icon-holder');
				if( icon.hasClass('eltdf-icon-shortcode') ) {
					iconElement = icon;
				}
				var hoverBorderColor = icon.data('hover-border-color');
				var originalBorderColor = iconElement.css('borderTopColor');

				if(hoverBorderColor !== '') {
					icon.on('mouseenter', {icon: iconElement, color: hoverBorderColor}, changeIconBorder);
					icon.on('mouseleave', {icon: iconElement, color: originalBorderColor}, changeIconBorder);
				}
			}
		};

		return {
			init: function() {
				if(icons.length) {
					icons.each(function() {
						iconHoverColor($(this));
						iconWidgetHolderBackgroundHover($(this));
						iconWidgetHolderBorderHover($(this));
					});
				}
			}
		};
	};

	function eltdfInitCustomMenuDropdown() {
		var menus = $('.eltdf-sidebar .widget_nav_menu .menu');

		var dropdownOpeners,
			currentMenu;


		if(menus.length) {
			menus.each(function() {
				currentMenu = $(this);

				dropdownOpeners = currentMenu.find('li.menu-item-has-children > a');

				if(dropdownOpeners.length) {
					dropdownOpeners.each(function() {
						var currentDropdownOpener = $(this);

						currentDropdownOpener.on('click', function(e) {
							e.preventDefault();

							var dropdownToOpen = currentDropdownOpener.parent().children('.sub-menu');

							if(dropdownToOpen.is(':visible')) {
								dropdownToOpen.slideUp();
								currentDropdownOpener.removeClass('eltdf-custom-menu-active');
							} else {
								dropdownToOpen.slideDown();
								currentDropdownOpener.addClass('eltdf-custom-menu-active');
							}
						});
					});
				}
			});
		}
	}

	/*
	 ** Init vc parallax
	 */
	function eltdfInitParallax(){
		var parallaxHolder = $('.eltdf-parallax-row-holder');

		if(parallaxHolder.length){
			parallaxHolder.each(function() {
				var parallaxElement = $(this),
					image = parallaxElement.data('parallax-bg-image'),
					speed = parallaxElement.data('parallax-bg-speed') * 0.4,
					height = 0;

				if (typeof parallaxElement.data('parallax-bg-height') !== 'undefined' && parallaxElement.data('parallax-bg-height') !== false) {
					height = parseInt(parallaxElement.data('parallax-bg-height'));
				}

				parallaxElement.css({'background-image': 'url('+image+')'});

				if(height > 0) {
					parallaxElement.css({'min-height': height+'px', 'height': height+'px'});
				}

				parallaxElement.parallax('50%', speed);
			});
		}
	}

	/*
	 ** Init row image responsiveness
	 */
	function eltdfInitRowImageResponsiveness(){
		var stageHolder = $('.eltdf-row-stage-images');

		if(stageHolder.length){
			stageHolder.each(function() {
				var stageElement = $(this),
					style = '',
					responsiveStyle = '',
					ipadHor = '',
					laptop = '',
					laptopBig = '',
					ipad   = '',
					mobile = '',
					itemClass = '';

				if (typeof stageElement.data('row-custom-class') !== 'undefined' && stageElement.data('row-custom-class') !== false) {
					itemClass = stageElement.data('row-custom-class');
				}
				if (typeof stageElement.data('image-1440') !== 'undefined' && stageElement.data('image-1440' !== false)) {
					laptopBig = stageElement.data('image-1440');
				}
				if (typeof stageElement.data('image-1280') !== 'undefined' && stageElement.data('image-1280' !== false)) {
					laptop = stageElement.data('image-1280');
				}
				if (typeof stageElement.data('image-1024') !== 'undefined' && stageElement.data('image-1024' !== false)) {
					ipadHor = stageElement.data('image-1024');
				}
				if (typeof stageElement.data('image-768') !== 'undefined' && stageElement.data('image-768' !== false)) {
					ipad = stageElement.data('image-768');
				}
				if (typeof stageElement.data('image-480') !== 'undefined' && stageElement.data('image-480' !== false)) {
					mobile = stageElement.data('image-480');
				}

				if(laptopBig.length || laptop.length || ipadHor.length || ipad.length || mobile.length) {

					if (laptopBig.length) {
						responsiveStyle += "@media only screen and (max-width: 1440px) {.eltdf-row-stage-images." + itemClass + " { background-image: url(" + laptopBig + ") !important; } }";
					}
					if (laptop.length) {
						responsiveStyle += "@media only screen and (max-width: 1280px) {.eltdf-row-stage-images." + itemClass + " { background-image: url(" + laptop + ") !important; } }";
					}
					if (ipadHor.length) {
						responsiveStyle += "@media only screen and (max-width: 1024px) {.eltdf-row-stage-images." + itemClass + " { background-image: url(" + ipadHor + ") !important; } }";
					}
					if (ipad.length) {
						responsiveStyle += "@media only screen and (max-width: 768px) {.eltdf-row-stage-images." + itemClass + " { background-image: url(" + ipad + ") !important; } }";
					}
					if (mobile.length) {
						responsiveStyle += "@media only screen and (max-width: 480px) {.eltdf-row-stage-images." + itemClass + " { background-image: url(" + mobile + ") !important; } }";
					}
				}

				if(responsiveStyle.length) {
					style = '<style type="text/css" data-type="sweettooth_elated_shortcodes_custom_css">'+responsiveStyle+'</style>';
				}

				if(style.length) {
					$('head').append(style);
				}
			});
		}
	}

    /**
     * Init Owl Carousel
     */
    function eltdfOwlSlider() {
        var sliders = $('.eltdf-owl-slider');

        if (sliders.length) {
            sliders.each(function(){
                var slider = $(this),
	                slideItemsNumber = slider.children().length,
	                numberOfItems = 1,
	                loop = true,
	                autoplay = true,
	                autoplayHoverPause = true,
	                sliderSpeed = 5000,
	                sliderSpeedAnimation = 600,
	                margin = 0,
	                center = false,
	                autoWidth = false,
	                animateInClass = false, // keyframe css animation
	                animateOut = false, // keyframe css animation
	                navigation = true,
	                pagination = false,
	                sliderIsPortfolio = !!slider.hasClass('eltdf-pl-is-slider'),
	                sliderDataHolder = sliderIsPortfolio ? slider.parent() : slider;  // this is condition for portfolio slider

	            if (typeof slider.data('number-of-items') !== 'undefined' && slider.data('number-of-items') !== false && !sliderIsPortfolio) {
		            numberOfItems = slider.data('number-of-items');
	            }
	            if (typeof sliderDataHolder.data('number-of-columns') !== 'undefined' && sliderDataHolder.data('number-of-columns') !== false && sliderIsPortfolio) {
		            numberOfItems = sliderDataHolder.data('number-of-columns');
	            }
	            if (sliderDataHolder.data('enable-loop') === 'no') {
		            loop = false;
	            }
	            if (sliderDataHolder.data('enable-autoplay') === 'no') {
		            autoplay = false;
	            }
	            if (sliderDataHolder.data('enable-autoplay-hover-pause') === 'no') {
		            autoplayHoverPause = false;
	            }
	            if (typeof sliderDataHolder.data('slider-speed') !== 'undefined' && sliderDataHolder.data('slider-speed') !== false) {
		            sliderSpeed = sliderDataHolder.data('slider-speed');
	            }
	            if (typeof sliderDataHolder.data('slider-speed-animation') !== 'undefined' && sliderDataHolder.data('slider-speed-animation') !== false) {
		            sliderSpeedAnimation = sliderDataHolder.data('slider-speed-animation');
	            }
	            if (typeof sliderDataHolder.data('slider-margin') !== 'undefined' && sliderDataHolder.data('slider-margin') !== false) {
		            margin = sliderDataHolder.data('slider-margin');
	            }
	            if(slider.parent().hasClass('eltdf-large-space')) {
		            margin = 55;
	            } else if(slider.parent().hasClass('eltdf-normal-space')) {
		            margin = 30;
	            } else if (slider.parent().hasClass('eltdf-small-space')) {
		            margin = 20;
	            } else if (slider.parent().hasClass('eltdf-tiny-space')) {
		            margin = 10;
	            }
	            if (sliderDataHolder.data('enable-center') === 'yes') {
		            center = true;
	            }
	            if (sliderDataHolder.data('enable-auto-width') === 'yes') {
		            autoWidth = true;
	            }
	            if (typeof sliderDataHolder.data('slider-animate-in') !== 'undefined' && sliderDataHolder.data('slider-animate-in') !== false) {
		            animateInClass = sliderDataHolder.data('slider-animate-in');
	            }
	            if (typeof sliderDataHolder.data('slider-animate-out') !== 'undefined' && sliderDataHolder.data('slider-animate-out') !== false) {
		            animateOut = sliderDataHolder.data('slider-animate-out');
	            }
	            if (sliderDataHolder.data('enable-navigation') === 'no') {
		            navigation = false;
	            }
	            if (sliderDataHolder.data('enable-pagination') === 'yes') {
		            pagination = true;
	            }

	            if(navigation && pagination) {
		            slider.addClass('eltdf-slider-has-both-nav');
	            }

	            if (slideItemsNumber <= 1) {
		            loop       = false;
		            autoplay   = false;
		            navigation = false;
		            pagination = false;
	            }

	            var responsiveNumberOfItems1 = 1,
		            responsiveNumberOfItems2 = 2,
		            responsiveNumberOfItems3 = 3;

	            if (numberOfItems < 3) {
		            responsiveNumberOfItems2 = numberOfItems;
		            responsiveNumberOfItems3 = numberOfItems;
	            }

                slider.owlCarousel({
	                items: numberOfItems,
	                loop: loop,
	                autoplay: autoplay,
	                autoplayHoverPause: autoplayHoverPause,
	                autoplayTimeout: sliderSpeed,
	                smartSpeed: sliderSpeedAnimation,
	                margin: margin,
		            center: center,
		            autoWidth: autoWidth,
	                animateInClass : animateInClass,
	                animateOut : animateOut,
                    dots: pagination,
                    nav: navigation,
                    navText: [
                        '<div class="eltdf-prev-icon"><div class="eltdf-nav-arrow"><span class="eltdf-top-part"></span><span class="eltdf-bottom-part"></span></div></div>',
                        '<div class="eltdf-next-icon"><div class="eltdf-nav-arrow"><span class="eltdf-top-part"></span><span class="eltdf-bottom-part"></span></div></div>'
                    ],
	                responsive: {
		                0: {
			                items: responsiveNumberOfItems1,
			                margin: 0,
			                center: false,
			                autoWidth: false
		                },
		                680: {
			                items: responsiveNumberOfItems2
		                },
		                768: {
			                items: responsiveNumberOfItems3
		                },
		                1024: {
			                items: numberOfItems
		                }
	                },
	                onInitialize: function () {
		                slider.css('visibility', 'visible');
		                eltdfInitParallax();
	                }
                });
            });
        }
    }

})(jQuery);
(function($) {
	"use strict";

    var blog = {};
    eltdf.modules.blog = blog;

    blog.eltdfOnDocumentReady = eltdfOnDocumentReady;
    blog.eltdfOnWindowLoad = eltdfOnWindowLoad;
    blog.eltdfOnWindowResize = eltdfOnWindowResize;
    blog.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);

    /*
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdfInitAudioPlayer();
        eltdfInitBlogMasonry();
        eltdfInitBlogListMasonry();
	    eltdfInitBlogMasonryGallery();
    }

    /*
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {
	    eltdfInitBlogPagination().init();
	    eltdfInitBlogListShortcodePagination().init();
        eltdfInitBlogMasonryGalleryAppear();
    }

    /*
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
        eltdfInitBlogMasonry();
	    eltdfInitBlogMasonryGallery();
    }

    /*
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {
	    eltdfInitBlogPagination().scroll();
	    eltdfInitBlogListShortcodePagination().scroll();
    }

    /**
    * Init audio player for Blog list and single pages
    */
    function eltdfInitAudioPlayer() {
        var players = $('audio.eltdf-blog-audio');

        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }

    /**
     * Init Resize Blog Items
     */
    function eltdfResizeBlogItems(size,container){

        if(container.hasClass('eltdf-masonry-images-fixed')) {
            var padding = parseInt(container.find('article').css('padding-left')),
                defaultMasonryItem = container.find('.eltdf-post-size-default'),
                largeWidthMasonryItem = container.find('.eltdf-post-size-large-width'),
                largeHeightMasonryItem = container.find('.eltdf-post-size-large-height'),
                largeWidthHeightMasonryItem = container.find('.eltdf-post-size-large-width-height');

			if (eltdf.windowWidth > 680) {
				defaultMasonryItem.css('height', size - 2 * padding);
				largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
				largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
				largeWidthMasonryItem.css('height', size - 2 * padding);
			} else {
				defaultMasonryItem.css('height', size);
				largeHeightMasonryItem.css('height', size);
				largeWidthHeightMasonryItem.css('height', size);
				largeWidthMasonryItem.css('height', Math.round(size / 2));
			}
        }
    }

    /**
    * Init Blog Masonry Layout
    */
    function eltdfInitBlogMasonry() {
	    var holder = $('.eltdf-blog-holder.eltdf-blog-type-masonry');

	    if(holder.length){
		    holder.each(function(){
			    var thisHolder = $(this),
				    masonry = thisHolder.children('.eltdf-blog-holder-inner'),
                    size = thisHolder.find('.eltdf-blog-masonry-grid-sizer').width();

                eltdfResizeBlogItems(size, thisHolder);

			    masonry.waitForImages(function() {
				    masonry.isotope({
					    layoutMode: 'packery',
					    itemSelector: 'article',
					    percentPosition: true,
					    packery: {
						    gutter: '.eltdf-blog-masonry-grid-gutter',
						    columnWidth: '.eltdf-blog-masonry-grid-sizer'
					    }
				    });
                    masonry.css('opacity', '1');
                });
		    });
	    }
    }


    /**
     *  Init Blog Masonry Gallery
     *
     *  Function that sets equal height of articles on blog masonry gallery list
     */
    function eltdfInitBlogMasonryGallery() {
        var blogList = $('.eltdf-blog-holder.eltdf-blog-masonry-gallery');
        if(blogList.length){
            blogList.each(function(){

                var container = $(this),
                    masonry = container.children('.eltdf-blog-holder-inner'),
                    article = masonry.find('article'),
                    size = masonry.find('.eltdf-blog-masonry-grid-sizer').width() * 1.25;

                article.css({'height': (size) + 'px'});

                masonry.isotope( 'layout', function(){});
                eltdfInitBlogMasonryGalleryAppear();
            });
        }
    }

    /**
     *  Animate blog masonry gallery type
     */
    function eltdfInitBlogMasonryGalleryAppear() {
        var blogList = $('.eltdf-blog-holder.eltdf-blog-masonry-gallery');
        if(blogList.length){
            blogList.each(function(){
                var thisBlogList = $(this),
                    article = thisBlogList.find('article'),
                    pagination = thisBlogList.find('.eltdf-blog-pagination-holder'),
                    animateCycle = 7, // rewind delay
                    animateCycleCounter = 0;

                article.each(function(){
                    var thisArticle = $(this);
                    setTimeout(function(){
                        thisArticle.appear(function(){
                            animateCycleCounter ++;
                            if(animateCycleCounter == animateCycle) {
                                animateCycleCounter = 0;
                            }
                            setTimeout(function(){
                                thisArticle.addClass('eltdf-appeared');
                            },animateCycleCounter * 200);
                        },{accX: 0, accY: 0});
                    },150);
                });

                pagination.appear(function(){
                    pagination.addClass('eltdf-appeared');
                },{accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});

            });
        }
    }

	/**
	 * Initializes blog pagination functions
	 */
	function eltdfInitBlogPagination(){
		var holder = $('.eltdf-blog-holder');

		var initLoadMorePagination = function(thisHolder) {
			var loadMoreButton = thisHolder.find('.eltdf-blog-pag-load-more a');

			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();

				initMainPagFunctionality(thisHolder);
			});
		};

		var initInifiteScrollPagination = function(thisHolder) {
			var blogListHeight = thisHolder.outerHeight(),
				blogListTopOffest = thisHolder.offset().top,
				blogListPosition = blogListHeight + blogListTopOffest - eltdfGlobalVars.vars.eltdfAddForAdminBar;

			if(!thisHolder.hasClass('eltdf-blog-pagination-infinite-scroll-started') && eltdf.scroll + eltdf.windowHeight > blogListPosition) {
				initMainPagFunctionality(thisHolder);
			}
		};

		var initMainPagFunctionality = function(thisHolder) {
			var thisHolderInner = thisHolder.children('.eltdf-blog-holder-inner'),
				nextPage,
				maxNumPages;

			if (typeof thisHolder.data('max-num-pages') !== 'undefined' && thisHolder.data('max-num-pages') !== false) {
				maxNumPages = thisHolder.data('max-num-pages');
			}

			if(thisHolder.hasClass('eltdf-blog-pagination-infinite-scroll')) {
				thisHolder.addClass('eltdf-blog-pagination-infinite-scroll-started');
			}

			var loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisHolder),
				loadingItem = thisHolder.find('.eltdf-blog-pag-loading');

			nextPage = loadMoreDatta.nextPage;

			if(nextPage <= maxNumPages){
				loadingItem.addClass('eltdf-showing');

				var ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'sweettooth_elated_blog_load_more');

				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: eltdfGlobalVars.vars.eltdfAjaxUrl,
					success: function (data) {
						nextPage++;

						thisHolder.data('next-page', nextPage);

						var response = $.parseJSON(data),
							responseHtml =  response.html;

						thisHolder.waitForImages(function(){
							if(thisHolder.hasClass('eltdf-blog-type-masonry')){
								eltdfInitAppendIsotopeNewContent(thisHolderInner, loadingItem, responseHtml);
                                eltdfResizeBlogItems(thisHolderInner.find('.eltdf-blog-masonry-grid-sizer').width(), thisHolder);
							} else {
								eltdfInitAppendGalleryNewContent(thisHolderInner, loadingItem, responseHtml);
							}

							setTimeout(function() {
								eltdfInitAudioPlayer();
								eltdf.modules.common.eltdfOwlSlider();
								eltdf.modules.common.eltdfFluidVideo();
                                eltdf.modules.common.eltdfInitSelfHostedVideoPlayer();
                                eltdf.modules.common.eltdfSelfHostedVideoSize();
                                eltdfInitBlogMasonryGalleryAppear();
							}, 400);
						});

						if(thisHolder.hasClass('eltdf-blog-pagination-infinite-scroll-started')) {
							thisHolder.removeClass('eltdf-blog-pagination-infinite-scroll-started');
						}
					}
				});
			}

			if(nextPage === maxNumPages){
				thisHolder.find('.eltdf-blog-pag-load-more').hide();
			}
		};

		var eltdfInitAppendIsotopeNewContent = function(thisHolderInner, loadingItem, responseHtml) {
			thisHolderInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('eltdf-showing');

			setTimeout(function() {
				thisHolderInner.isotope('layout');
			}, 400);
		};

		var eltdfInitAppendGalleryNewContent = function(thisHolderInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltdf-showing');
			thisHolderInner.append(responseHtml);
		};

		return {
			init: function() {
				if(holder.length) {
					holder.each(function() {
						var thisHolder = $(this);

						if(thisHolder.hasClass('eltdf-blog-pagination-load-more')) {
							initLoadMorePagination(thisHolder);
						}

						if(thisHolder.hasClass('eltdf-blog-pagination-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			},
			scroll: function() {
				if(holder.length) {
					holder.each(function() {
						var thisHolder = $(this);

						if(thisHolder.hasClass('eltdf-blog-pagination-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			}
		};
	}

	/**
	 * Init blog list shortcode masonry layout
	 */
	function eltdfInitBlogListMasonry() {
		var holder = $('.eltdf-blog-list-holder.eltdf-bl-masonry');

		if(holder.length){
			holder.each(function(){
				var thisHolder = $(this),
					masonry = thisHolder.find('.eltdf-blog-list');

				masonry.waitForImages(function() {
					masonry.isotope({
						layoutMode: 'packery',
						itemSelector: '.eltdf-bl-item',
						percentPosition: true,
						packery: {
							gutter: '.eltdf-bl-grid-gutter',
							columnWidth: '.eltdf-bl-grid-sizer'
						}
					});

					masonry.css('opacity', '1');
				});
			});
		}
	}

	/**
	 * Init blog list shortcode pagination functions
	 */
	function eltdfInitBlogListShortcodePagination(){
		var holder = $('.eltdf-blog-list-holder');

		var initStandardPagination = function(thisHolder) {
			var standardLink = thisHolder.find('.eltdf-bl-standard-pagination li');

			if(standardLink.length) {
				standardLink.each(function(){
					var thisLink = $(this).children('a'),
						pagedLink = 1;

					thisLink.on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();

						if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
							pagedLink = thisLink.data('paged');
						}

						initMainPagFunctionality(thisHolder, pagedLink);
					});
				});
			}
		};

		var initLoadMorePagination = function(thisHolder) {
			var loadMoreButton = thisHolder.find('.eltdf-blog-pag-load-more a');

			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();

				initMainPagFunctionality(thisHolder);
			});
		};

		var initInifiteScrollPagination = function(thisHolder) {
			var blogListHeight = thisHolder.outerHeight(),
				blogListTopOffest = thisHolder.offset().top,
				blogListPosition = blogListHeight + blogListTopOffest - eltdfGlobalVars.vars.eltdfAddForAdminBar;

			if(!thisHolder.hasClass('eltdf-bl-pag-infinite-scroll-started') && eltdf.scroll + eltdf.windowHeight > blogListPosition) {
				initMainPagFunctionality(thisHolder);
			}
		};

		var initMainPagFunctionality = function(thisHolder, pagedLink) {
			var thisHolderInner = thisHolder.find('.eltdf-blog-list'),
				nextPage,
				maxNumPages;

			if (typeof thisHolder.data('max-num-pages') !== 'undefined' && thisHolder.data('max-num-pages') !== false) {
				maxNumPages = thisHolder.data('max-num-pages');
			}

			if(thisHolder.hasClass('eltdf-bl-pag-standard-blog-list')) {
				thisHolder.data('next-page', pagedLink);
			}

			if(thisHolder.hasClass('eltdf-bl-pag-infinite-scroll')) {
				thisHolder.addClass('eltdf-bl-pag-infinite-scroll-started');
			}

			var loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisHolder),
				loadingItem = thisHolder.find('.eltdf-blog-pag-loading');

			nextPage = loadMoreDatta.nextPage;

			if(nextPage <= maxNumPages){
				if(thisHolder.hasClass('eltdf-bl-pag-standard-blog-list')) {
					loadingItem.addClass('eltdf-showing eltdf-standard-pag-trigger');
					thisHolder.addClass('eltdf-bl-pag-standard-blog-list-animate');
				} else {
					loadingItem.addClass('eltdf-showing');
				}

				var ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'sweettooth_elated_blog_shortcode_load_more');

				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: eltdfGlobalVars.vars.eltdfAjaxUrl,
					success: function (data) {
						if(!thisHolder.hasClass('eltdf-bl-pag-standard-blog-list')) {
							nextPage++;
						}

						thisHolder.data('next-page', nextPage);

						var response = $.parseJSON(data),
							responseHtml =  response.html;

						if(thisHolder.hasClass('eltdf-bl-pag-standard-blog-list')) {
							eltdfInitStandardPaginationLinkChanges(thisHolder, maxNumPages, nextPage);

							thisHolder.waitForImages(function(){
								if(thisHolder.hasClass('eltdf-bl-masonry')){
									eltdfInitHtmlIsotopeNewContent(thisHolder, thisHolderInner, loadingItem, responseHtml);
								} else {
									eltdfInitHtmlGalleryNewContent(thisHolder, thisHolderInner, loadingItem, responseHtml);
								}
							});
						} else {
							thisHolder.waitForImages(function(){
								if(thisHolder.hasClass('eltdf-bl-masonry')){
									eltdfInitAppendIsotopeNewContent(thisHolderInner, loadingItem, responseHtml);
								} else {
									eltdfInitAppendGalleryNewContent(thisHolderInner, loadingItem, responseHtml);
								}
							});
						}

						if(thisHolder.hasClass('eltdf-bl-pag-infinite-scroll-started')) {
							thisHolder.removeClass('eltdf-bl-pag-infinite-scroll-started');
						}
					}
				});
			}

			if(nextPage === maxNumPages){
				thisHolder.find('.eltdf-blog-pag-load-more').hide();
			}
		};

		var eltdfInitStandardPaginationLinkChanges = function(thisHolder, maxNumPages, nextPage) {
			var standardPagHolder = thisHolder.find('.eltdf-bl-standard-pagination'),
				standardPagNumericItem = standardPagHolder.find('li.eltdf-bl-pag-number'),
				standardPagPrevItem = standardPagHolder.find('li.eltdf-bl-pag-prev a'),
				standardPagNextItem = standardPagHolder.find('li.eltdf-bl-pag-next a');

			standardPagNumericItem.removeClass('eltdf-bl-pag-active');
			standardPagNumericItem.eq(nextPage-1).addClass('eltdf-bl-pag-active');

			standardPagPrevItem.data('paged', nextPage-1);
			standardPagNextItem.data('paged', nextPage+1);

			if(nextPage > 1) {
				standardPagPrevItem.css({'opacity': '1'});
			} else {
				standardPagPrevItem.css({'opacity': '0'});
			}

			if(nextPage === maxNumPages) {
				standardPagNextItem.css({'opacity': '0'});
			} else {
				standardPagNextItem.css({'opacity': '1'});
			}
		};

		var eltdfInitHtmlIsotopeNewContent = function(thisHolder, thisHolderInner, loadingItem, responseHtml) {
			thisHolderInner.html(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('eltdf-showing eltdf-standard-pag-trigger');
			thisHolder.removeClass('eltdf-bl-pag-standard-blog-list-animate');

			setTimeout(function() {
				thisHolderInner.isotope('layout');
			}, 400);
		};

		var eltdfInitHtmlGalleryNewContent = function(thisHolder, thisHolderInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltdf-showing eltdf-standard-pag-trigger');
			thisHolder.removeClass('eltdf-bl-pag-standard-blog-list-animate');
			thisHolderInner.html(responseHtml);
		};

		var eltdfInitAppendIsotopeNewContent = function(thisHolderInner, loadingItem, responseHtml) {
			thisHolderInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('eltdf-showing');

			setTimeout(function() {
				thisHolderInner.isotope('layout');
			}, 400);
		};

		var eltdfInitAppendGalleryNewContent = function(thisHolderInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltdf-showing');
			thisHolderInner.append(responseHtml);
		};

		return {
			init: function() {
				if(holder.length) {
					holder.each(function() {
						var thisHolder = $(this);

						if(thisHolder.hasClass('eltdf-bl-pag-standard-blog-list')) {
							initStandardPagination(thisHolder);
						}

						if(thisHolder.hasClass('eltdf-bl-pag-load-more')) {
							initLoadMorePagination(thisHolder);
						}

						if(thisHolder.hasClass('eltdf-bl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			},
			scroll: function() {
				if(holder.length) {
					holder.each(function() {
						var thisHolder = $(this);

						if(thisHolder.hasClass('eltdf-bl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			}
		};
	}

})(jQuery);
(function($) {
	"use strict";

	var header = {};
	eltdf.modules.header = header;

	header.eltdfOnDocumentReady = eltdfOnDocumentReady;
	header.eltdfOnWindowLoad = eltdfOnWindowLoad;
	header.eltdfOnWindowResize = eltdfOnWindowResize;
	header.eltdfOnWindowScroll = eltdfOnWindowScroll;

	$(document).ready(eltdfOnDocumentReady);
	$(window).load(eltdfOnWindowLoad);
	$(window).resize(eltdfOnWindowResize);
	$(window).scroll(eltdfOnWindowScroll);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfSetDropDownMenuPosition();
		eltdfDropDownMenu();
		eltdfSearch();
		eltdfSideArea();
		eltdfSideAreaScroll();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function eltdfOnWindowLoad() {
	}

	/*
	 All functions to be called on $(window).resize() should be in this function
	 */
	function eltdfOnWindowResize() {
	}

	/*
	 All functions to be called on $(window).scroll() should be in this function
	 */
	function eltdfOnWindowScroll() {
	}

	/**
	 * Set dropdown position
	 */
	function eltdfSetDropDownMenuPosition(){
		var menuItems = $('.eltdf-drop-down > ul > li.narrow.menu-item-has-children');

		if (menuItems.length) {
			menuItems.each(function (i) {
				var thisItem = $(this),
					menuItemPosition = thisItem.offset().left,
					dropdownHolder = thisItem.find('.second'),
					dropdownMenuItem = dropdownHolder.find('.inner ul'),
					dropdownMenuWidth = dropdownMenuItem.outerWidth(),
					menuItemFromLeft = eltdf.windowWidth - menuItemPosition;

				if (eltdf.body.hasClass('eltdf-boxed')) {
					menuItemFromLeft = eltdf.boxedLayoutWidth - (menuItemPosition - (eltdf.windowWidth - eltdf.boxedLayoutWidth ) / 2);
				}

				var dropDownMenuFromLeft; //has to stay undefined beacuse 'dropDownMenuFromLeft < dropdownMenuWidth' condition will be true

				if (thisItem.find('li.sub').length > 0) {
					dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
				}

				dropdownHolder.removeClass('right');
				dropdownMenuItem.removeClass('right');
				if (menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth) {
					dropdownHolder.addClass('right');
					dropdownMenuItem.addClass('right');
				}
			});
		}
	}

	function eltdfDropDownMenu() {
		var menu_items = $('.eltdf-drop-down > ul > li');

		menu_items.each(function(i) {
			if($(menu_items[i]).find('.second').length > 0) {
				var dropDownSecondDiv = $(menu_items[i]).find('.second');

				if($(menu_items[i]).hasClass('wide')) {
					if(!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
						dropDownSecondDiv.css('left', 0);
					}

					//set columns to be same height - start
					var tallest = 0;
					$(this).find('.second > .inner > ul > li').each(function() {
						var thisHeight = $(this).height();
						if(thisHeight > tallest) {
							tallest = thisHeight;
						}
					});

					$(this).find('.second > .inner > ul > li').css("height", ""); // delete old inline css - via resize
					$(this).find('.second > .inner > ul > li').height(tallest);
					//set columns to be same height - end

					var left_position;

					if(!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
						left_position = dropDownSecondDiv.offset().left;

						if(eltdf.body.hasClass('eltdf-boxed')) {
							var boxedWidth = $('.eltdf-boxed .eltdf-wrapper .eltdf-wrapper-inner').outerWidth();
							left_position = left_position - (eltdf.windowWidth - boxedWidth) / 2;

							dropDownSecondDiv.css('left', -left_position);
							dropDownSecondDiv.css('width', boxedWidth);
						} else {
							dropDownSecondDiv.css('left', -left_position);
							dropDownSecondDiv.css('width', eltdf.windowWidth);
						}
					}
				}

				if(!eltdf.menuDropdownHeightSet) {
					$(menu_items[i]).data('original_height', dropDownSecondDiv.height() + 'px');
					dropDownSecondDiv.height(0);
				}

				if(navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
					$(menu_items[i]).on("touchstart mouseenter", function() {
						dropDownSecondDiv.css({
							'height': $(menu_items[i]).data('original_height'),
							'overflow': 'visible',
							'visibility': 'visible',
							'opacity': '1'
						});
					}).on("mouseleave", function() {
						dropDownSecondDiv.css({
							'height': '0px',
							'overflow': 'hidden',
							'visibility': 'hidden',
							'opacity': '0'
						});
					});
				} else {
					if(eltdf.body.hasClass('eltdf-dropdown-animate-height')) {

						var config = {
							interval: 0,
							over: function() {
								setTimeout(function() {
									dropDownSecondDiv.css({
										'visibility': 'visible',
										'height': '0px',
										'opacity': '0'
									});
									dropDownSecondDiv.stop().animate({
										'height': $(menu_items[i]).data('original_height'),
										opacity: 1
									}, 300, function() {
										dropDownSecondDiv.css('overflow', 'visible');
									});
								}, 150);
							},
							timeout: 150,
							out: function() {
								dropDownSecondDiv.stop().animate({
									'height': '0px'
								}, 150, function() {
									dropDownSecondDiv.css({
										'overflow': 'hidden',
										'visibility': 'hidden'
									});
								});
							}
						};
						$(menu_items[i]).hoverIntent(config);


					} else {
						var config = {
							interval: 0,
							over: function() {
								setTimeout(function() {
									dropDownSecondDiv.addClass('eltdf-drop-down-start');
									dropDownSecondDiv.stop().css({'height': $(menu_items[i]).data('original_height')});
								}, 150);
							},
							timeout: 150,
							out: function() {
								dropDownSecondDiv.stop().css({'height': '0px'});
								dropDownSecondDiv.removeClass('eltdf-drop-down-start');
							}
						};
						$(menu_items[i]).hoverIntent(config);
					}
				}
			}
		});

		$('.eltdf-drop-down ul li.wide ul li a').on('click', function(e) {
			if (e.which == 1){
				var $this = $(this);
				setTimeout(function() {
					$this.mouseleave();
				}, 500);
			}
		});

		eltdf.menuDropdownHeightSet = true;
	}

	/**
	 * Init Search Types
	 */
	function eltdfSearch() {
		var searchOpener = $('a.eltdf-search-opener'),
			searchForm,
			searchClose;

		if ( searchOpener.length > 0 ) {
			//Check for type of search
			if ( eltdf.body.hasClass( 'eltdf-fullscreen-search' ) ) {
				searchClose = $( '.eltdf-fullscreen-search-close' );
				eltdfFullscreenSearch();

			} else if ( eltdf.body.hasClass( 'eltdf-slide-from-header-bottom' ) ) {
				eltdfSearchSlideFromHeaderBottom();

			} else if ( eltdf.body.hasClass( 'eltdf-search-covers-header' ) ) {
				eltdfSearchCoversHeader();

			} else if ( eltdf.body.hasClass( 'eltdf-search-slides-from-window-top' ) ) {
				searchForm = $('.eltdf-search-slide-window-top');
				searchClose = $('.eltdf-swt-search-close');
				eltdfSearchWindowTop();
			}
		}

		/**
		 * Fullscreen search fade
		 */
		function eltdfFullscreenSearch() {
			var searchHolder = $('.eltdf-fullscreen-search-holder');

			searchOpener.click(function (e) {
				e.preventDefault();

				if (searchHolder.hasClass('eltdf-animate')) {
					eltdf.body.removeClass('eltdf-fullscreen-search-opened eltdf-search-fade-out');
					eltdf.body.removeClass('eltdf-search-fade-in');
					searchHolder.removeClass('eltdf-animate');

					setTimeout(function () {
						searchHolder.find('.eltdf-search-field').val('');
						searchHolder.find('.eltdf-search-field').blur();
					}, 300);

					eltdf.modules.common.eltdfEnableScroll();
				} else {
					eltdf.body.addClass('eltdf-fullscreen-search-opened eltdf-search-fade-in');
					eltdf.body.removeClass('eltdf-search-fade-out');
					searchHolder.addClass('eltdf-animate');

					setTimeout(function () {
						searchHolder.find('.eltdf-search-field').focus();
					}, 900);

					eltdf.modules.common.eltdfDisableScroll();
				}

				searchClose.click(function (e) {
					e.preventDefault();
					eltdf.body.removeClass('eltdf-fullscreen-search-opened eltdf-search-fade-in');
					eltdf.body.addClass('eltdf-search-fade-out');
					searchHolder.removeClass('eltdf-animate');

					setTimeout(function () {
						searchHolder.find('.eltdf-search-field').val('');
						searchHolder.find('.eltdf-search-field').blur();
					}, 300);

					eltdf.modules.common.eltdfEnableScroll();
				});

				//Close on click away
				$(document).mouseup(function (e) {
					var container = $(".eltdf-form-holder-inner");

					if (!container.is(e.target) && container.has(e.target).length === 0) {
						e.preventDefault();
						eltdf.body.removeClass('eltdf-fullscreen-search-opened eltdf-search-fade-in');
						eltdf.body.addClass('eltdf-search-fade-out');
						searchHolder.removeClass('eltdf-animate');

						setTimeout(function () {
							searchHolder.find('.eltdf-search-field').val('');
							searchHolder.find('.eltdf-search-field').blur();
						}, 300);

						eltdf.modules.common.eltdfEnableScroll();
					}
				});

				//Close on escape
				$(document).keyup(function (e) {
					if (e.keyCode == 27) { //KeyCode for ESC button is 27
						eltdf.body.removeClass('eltdf-fullscreen-search-opened eltdf-search-fade-in');
						eltdf.body.addClass('eltdf-search-fade-out');
						searchHolder.removeClass('eltdf-animate');

						setTimeout(function () {
							searchHolder.find('.eltdf-search-field').val('');
							searchHolder.find('.eltdf-search-field').blur();
						}, 300);

						eltdf.modules.common.eltdfEnableScroll();
					}
				});
			});

			//Text input focus change
			var inputSearchField = $('.eltdf-fullscreen-search-holder .eltdf-search-field'),
				inputSearchLine = $('.eltdf-fullscreen-search-holder .eltdf-field-holder .eltdf-line');

			inputSearchField.focus(function () {
				inputSearchLine.css('width', '100%');
			});

			inputSearchField.blur(function () {
				inputSearchLine.css('width', '0');
			});
		}

		/**
		 * Search covers header type of search
		 */
		function eltdfSearchCoversHeader() {
			searchOpener.click(function (e) {
				e.preventDefault();

				var thisSearchOpener = $(this),
					searchFormHeight,
					searchFormHeaderHolder = $('.eltdf-page-header'),
					searchFormTopHeaderHolder = $('.eltdf-top-bar'),
					searchFormFixedHeaderHolder = searchFormHeaderHolder.find('.eltdf-fixed-wrapper.fixed'),
					searchFormMobileHeaderHolder = $('.eltdf-mobile-header'),
					searchForm = $('.eltdf-search-cover'),
					searchFormIsInTopHeader = !!thisSearchOpener.parents('.eltdf-top-bar').length,
					searchFormIsInFixedHeader = !!thisSearchOpener.parents('.eltdf-fixed-wrapper.fixed').length,
					searchFormIsInStickyHeader = !!thisSearchOpener.parents('.eltdf-sticky-header').length,
					searchFormIsInMobileHeader = !!thisSearchOpener.parents('.eltdf-mobile-header').length;

				searchForm.removeClass('eltdf-is-active');

				//Find search form position in header and height
				if (searchFormIsInTopHeader) {
					searchFormHeight = eltdfGlobalVars.vars.eltdfTopBarHeight;
					searchFormTopHeaderHolder.find('.eltdf-search-cover').addClass('eltdf-is-active');

				} else if (searchFormIsInFixedHeader) {
					searchFormHeight = searchFormFixedHeaderHolder.outerHeight();
					searchFormHeaderHolder.children('.eltdf-search-cover').addClass('eltdf-is-active');

				} else if (searchFormIsInStickyHeader) {
					searchFormHeight = eltdfGlobalVars.vars.eltdfStickyHeaderHeight;
					searchFormHeaderHolder.children('.eltdf-search-cover').addClass('eltdf-is-active');

				} else if (searchFormIsInMobileHeader) {
					if(searchFormMobileHeaderHolder.hasClass('mobile-header-appear')) {
						searchFormHeight = searchFormMobileHeaderHolder.children('.eltdf-mobile-header-inner').outerHeight();
					} else {
						searchFormHeight = searchFormMobileHeaderHolder.outerHeight();
					}

					searchFormMobileHeaderHolder.find('.eltdf-search-cover').addClass('eltdf-is-active');

				} else {
					searchFormHeight = searchFormHeaderHolder.outerHeight();
					searchFormHeaderHolder.children('.eltdf-search-cover').addClass('eltdf-is-active');
				}

				if(searchForm.hasClass('eltdf-is-active')) {
					searchForm.height(searchFormHeight).stop(true).fadeIn(600).find('input[type="text"]').focus();
				}

				searchForm.find('.eltdf-search-close').click(function (e) {
					e.preventDefault();
					searchForm.stop(true).fadeOut(450);
				});

				searchForm.blur(function () {
					searchForm.stop(true).fadeOut(450);
				});

				$(window).scroll(function(){
					searchForm.stop(true).fadeOut(450);
				});
			});
		}

		/**
		 * Search slides from window top type of search
		 */
		function eltdfSearchWindowTop() {
			searchOpener.click( function(e) {
				e.preventDefault();

				if ( searchForm.height() == "0") {
					$('.eltdf-search-slide-window-top input[type="text"]').focus();
					//Push header bottom
					eltdf.body.addClass('eltdf-search-open');
				} else {
					eltdf.body.removeClass('eltdf-search-open');
				}

				$(window).scroll(function() {
					if ( searchForm.height() != '0' && eltdf.scroll > 50 ) {
						eltdf.body.removeClass('eltdf-search-open');
					}
				});

				searchClose.click(function(e){
					e.preventDefault();
					eltdf.body.removeClass('eltdf-search-open');
				});
			});
		}

		/**
		 * Search slide from header bottom type of search
		 */
		function eltdfSearchSlideFromHeaderBottom() {
			searchOpener.click( function(e) {
				e.preventDefault();

				var thisSearchOpener = $(this),
					searchIconPosition = parseInt(eltdf.windowWidth - thisSearchOpener.offset().left - thisSearchOpener.outerWidth());

				if(eltdf.body.hasClass('eltdf-boxed') && eltdf.windowWidth > 1024) {
					searchIconPosition -= parseInt((eltdf.windowWidth - $('.eltdf-boxed .eltdf-wrapper .eltdf-wrapper-inner').outerWidth()) / 2);
				}

				var searchFormHeaderHolder = $('.eltdf-page-header'),
					searchFormTopOffset = '100%',
					searchFormTopHeaderHolder = $('.eltdf-top-bar'),
					searchFormFixedHeaderHolder = searchFormHeaderHolder.find('.eltdf-fixed-wrapper.fixed'),
					searchFormMobileHeaderHolder = $('.eltdf-mobile-header'),
					searchForm = $('.eltdf-slide-from-header-bottom-holder'),
					searchFormIsInTopHeader = !!thisSearchOpener.parents('.eltdf-top-bar').length,
					searchFormIsInFixedHeader = !!thisSearchOpener.parents('.eltdf-fixed-wrapper.fixed').length,
					searchFormIsInStickyHeader = !!thisSearchOpener.parents('.eltdf-sticky-header').length,
					searchFormIsInMobileHeader = !!thisSearchOpener.parents('.eltdf-mobile-header').length;

				searchForm.removeClass('eltdf-is-active');

				//Find search form position in header and height
				if (searchFormIsInTopHeader) {
					searchFormTopHeaderHolder.find('.eltdf-slide-from-header-bottom-holder').addClass('eltdf-is-active');

				} else if (searchFormIsInFixedHeader) {
					searchFormTopOffset = searchFormFixedHeaderHolder.outerHeight() + eltdfGlobalVars.vars.eltdfAddForAdminBar;
					searchFormHeaderHolder.children('.eltdf-slide-from-header-bottom-holder').addClass('eltdf-is-active');

				} else if (searchFormIsInStickyHeader) {
					searchFormTopOffset = eltdfGlobalVars.vars.eltdfStickyHeaderHeight + eltdfGlobalVars.vars.eltdfAddForAdminBar;
					searchFormHeaderHolder.children('.eltdf-slide-from-header-bottom-holder').addClass('eltdf-is-active');

				} else if (searchFormIsInMobileHeader) {
					if(searchFormMobileHeaderHolder.hasClass('mobile-header-appear')) {
						searchFormTopOffset = searchFormMobileHeaderHolder.children('.eltdf-mobile-header-inner').outerHeight() + eltdfGlobalVars.vars.eltdfAddForAdminBar;
					}
					searchFormMobileHeaderHolder.find('.eltdf-slide-from-header-bottom-holder').addClass('eltdf-is-active');

				} else {
					searchFormHeaderHolder.children('.eltdf-slide-from-header-bottom-holder').addClass('eltdf-is-active');
				}

				if(searchForm.hasClass('eltdf-is-active')) {
					searchForm.css({'right': searchIconPosition, 'top': searchFormTopOffset}).stop(true).slideToggle(300, 'easeOutBack');
				}

				//Close on escape
				$(document).keyup(function(e){
					if (e.keyCode == 27 ) { //KeyCode for ESC button is 27
						searchForm.stop(true).fadeOut(0);
					}
				});

				$(window).scroll(function(){
					searchForm.stop(true).fadeOut(0);
				});
			});
		}
	}

	/**
	 * Show/hide side area
	 */
	function eltdfSideArea() {

		var wrapper = $('.eltdf-wrapper'),
			sideMenuButtonOpen = $('a.eltdf-side-menu-button-opener'),
			cssClass = 'eltdf-right-side-menu-opened';

		wrapper.prepend('<div class="eltdf-cover"/>');

		$('a.eltdf-side-menu-button-opener, a.eltdf-close-side-menu').click( function(e) {
			e.preventDefault();

			if(!sideMenuButtonOpen.hasClass('opened')) {

				sideMenuButtonOpen.addClass('opened');
				eltdf.body.addClass(cssClass);

				$('.eltdf-wrapper .eltdf-cover').click(function() {
					eltdf.body.removeClass('eltdf-right-side-menu-opened');
					sideMenuButtonOpen.removeClass('opened');
				});

				var currentScroll = $(window).scrollTop();
				$(window).scroll(function() {
					if(Math.abs(eltdf.scroll - currentScroll) > 400){
						eltdf.body.removeClass(cssClass);
						sideMenuButtonOpen.removeClass('opened');
					}
				});
			} else {
				sideMenuButtonOpen.removeClass('opened');
				eltdf.body.removeClass(cssClass);
			}
		});
	}

	/*
	 **  Smooth scroll functionality for Side Area
	 */
	function eltdfSideAreaScroll(){
		var sideMenu = $('.eltdf-side-menu');

		if(sideMenu.length){
			sideMenu.niceScroll({
				scrollspeed: 60,
				mousescrollstep: 40,
				cursorwidth: 0,
				cursorborder: 0,
				cursorborderradius: 0,
				cursorcolor: "transparent",
				autohidemode: false,
				horizrailenabled: false
			});
		}
	}

})(jQuery);
(function($) {
    "use strict";

    var headerExpanding = {};
    eltdf.modules.headerExpanding = headerExpanding;

	headerExpanding.eltdfOnDocumentReady = eltdfOnDocumentReady;
	headerExpanding.eltdfOnWindowLoad = eltdfOnWindowLoad;
	headerExpanding.eltdfOnWindowResize = eltdfOnWindowResize;
	headerExpanding.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);

    /*
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
	    eltdfExpandingMenu();
    }

    /*
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {
    }

    /*
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
    }

    /*
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {
    }

	/**
	 * Init Expanding Menu
	 */
	function eltdfExpandingMenu() {

		if ($('a.eltdf-expanding-menu-opener').length) {

			var expandingMenuOpener = $( 'a.eltdf-expanding-menu-opener');

			// Open expanding menu
			expandingMenuOpener.on('click',function(e){
				e.preventDefault();

				if (!expandingMenuOpener.hasClass('eltdf-fm-opened')) {
					expandingMenuOpener.addClass('eltdf-fm-opened');
					eltdf.body.addClass('eltdf-expanding-menu-opened');
					$(document).keyup(function(e){
						if (e.keyCode == 27 ) {
							expandingMenuOpener.removeClass('eltdf-fm-opened');
							eltdf.body.removeClass('eltdf-expanding-menu-opened');
						}
					});
				} else {
					expandingMenuOpener.removeClass('eltdf-fm-opened');
					eltdf.body.removeClass('eltdf-expanding-menu-opened');
				}
			});
		}
	}

})(jQuery);
(function($) {
    "use strict";

    var headerMinimal = {};
    eltdf.modules.headerMinimal = headerMinimal;

	headerMinimal.eltdfOnDocumentReady = eltdfOnDocumentReady;
	headerMinimal.eltdfOnWindowLoad = eltdfOnWindowLoad;
	headerMinimal.eltdfOnWindowResize = eltdfOnWindowResize;
	headerMinimal.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);

    /*
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdfFullscreenMenu();
    }

    /*
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {
    }

    /*
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
    }

    /*
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {
    }

    /**
     * Init Fullscreen Menu
     */
    function eltdfFullscreenMenu() {
	    var popupMenuOpener = $( 'a.eltdf-fullscreen-menu-opener');

        if (popupMenuOpener.length) {
            var popupMenuHolderOuter = $(".eltdf-fullscreen-menu-holder-outer"),
                cssClass,
            //Flags for type of animation
                fadeRight = false,
                fadeTop = false,
            //Widgets
                widgetAboveNav = $('.eltdf-fullscreen-above-menu-widget-holder'),
                widgetBelowNav = $('.eltdf-fullscreen-below-menu-widget-holder'),
            //Menu
                menuItems = $('.eltdf-fullscreen-menu-holder-outer nav > ul > li > a'),
                menuItemWithChild =  $('.eltdf-fullscreen-menu > ul li.has_sub > a'),
                menuItemWithoutChild = $('.eltdf-fullscreen-menu ul li:not(.has_sub) a');

            //set height of popup holder and initialize nicescroll
            popupMenuHolderOuter.height(eltdf.windowHeight).niceScroll({
                scrollspeed: 30,
                mousescrollstep: 20,
                cursorwidth: 0,
                cursorborder: 0,
                cursorborderradius: 0,
                cursorcolor: "transparent",
                autohidemode: false,
                horizrailenabled: false
            }); //200 is top and bottom padding of holder

            //set height of popup holder on resize
            $(window).resize(function() {
                popupMenuHolderOuter.height(eltdf.windowHeight);
            });

            if (eltdf.body.hasClass('eltdf-fade-push-text-right')) {
                cssClass = 'eltdf-push-nav-right';
                fadeRight = true;
            } else if (eltdf.body.hasClass('eltdf-fade-push-text-top')) {
                cssClass = 'eltdf-push-text-top';
                fadeTop = true;
            }

            //Appearing animation
            if (fadeRight || fadeTop) {
                if (widgetAboveNav.length) {
                    widgetAboveNav.children().css({
                        '-webkit-animation-delay' : 0 + 'ms',
                        '-moz-animation-delay' : 0 + 'ms',
                        'animation-delay' : 0 + 'ms'
                    });
                }
                menuItems.each(function(i) {
                    $(this).css({
                        '-webkit-animation-delay': (i+1) * 70 + 'ms',
                        '-moz-animation-delay': (i+1) * 70 + 'ms',
                        'animation-delay': (i+1) * 70 + 'ms'
                    });
                });
                if (widgetBelowNav.length) {
                    widgetBelowNav.children().css({
                        '-webkit-animation-delay' : (menuItems.length + 1)*70 + 'ms',
                        '-moz-animation-delay' : (menuItems.length + 1)*70 + 'ms',
                        'animation-delay' : (menuItems.length + 1)*70 + 'ms'
                    });
                }
            }

            // Open popup menu
            popupMenuOpener.on('click',function(e){
                e.preventDefault();

                if (!popupMenuOpener.hasClass('eltdf-fm-opened')) {
                    popupMenuOpener.addClass('eltdf-fm-opened');
                    eltdf.body.addClass('eltdf-fullscreen-menu-opened');
                    eltdf.body.removeClass('eltdf-fullscreen-fade-out').addClass('eltdf-fullscreen-fade-in');
                    eltdf.body.removeClass(cssClass);
                    if(!eltdf.body.hasClass('page-template-full_screen-php')){
                        eltdf.modules.common.eltdfDisableScroll();
                    }
                    $(document).keyup(function(e){
                        if (e.keyCode == 27 ) {
                            popupMenuOpener.removeClass('eltdf-fm-opened');
                            eltdf.body.removeClass('eltdf-fullscreen-menu-opened');
                            eltdf.body.removeClass('eltdf-fullscreen-fade-in').addClass('eltdf-fullscreen-fade-out');
                            eltdf.body.addClass(cssClass);
                            if(!eltdf.body.hasClass('page-template-full_screen-php')){
                                eltdf.modules.common.eltdfEnableScroll();
                            }
                            $("nav.eltdf-fullscreen-menu ul.sub_menu").slideUp(200, function(){
                                $('nav.popup_menu').getNiceScroll().resize();
                            });
                        }
                    });
                } else {
                    popupMenuOpener.removeClass('eltdf-fm-opened');
                    eltdf.body.removeClass('eltdf-fullscreen-menu-opened');
                    eltdf.body.removeClass('eltdf-fullscreen-fade-in').addClass('eltdf-fullscreen-fade-out');
                    eltdf.body.addClass(cssClass);
                    if(!eltdf.body.hasClass('page-template-full_screen-php')){
                        eltdf.modules.common.eltdfEnableScroll();
                    }
                    $("nav.eltdf-fullscreen-menu ul.sub_menu").slideUp(200, function(){
                        $('nav.popup_menu').getNiceScroll().resize();
                    });
                }
            });

            //logic for open sub menus in popup menu
            menuItemWithChild.on('tap click', function(e) {
                e.preventDefault();

                var thisItem = $(this),
	                thisItemParent = thisItem.parent();

                if (thisItemParent.hasClass('has_sub')) {
                    var submenu = thisItemParent.find('> ul.sub_menu');

                    if (submenu.is(':visible')) {
                        submenu.slideUp(450, 'easeInOutQuint', function() {
                            popupMenuHolderOuter.getNiceScroll().resize();
                        });
	                    thisItemParent.removeClass('open_sub');
                    } else {
	                    thisItemParent.addClass('open_sub');
	                    thisItemParent.siblings().removeClass('open_sub').find('.sub_menu').slideUp(400, 'easeInOutQuint', function() {
		                    popupMenuHolderOuter.getNiceScroll().resize();
		                    submenu.slideDown(400, 'easeInOutQuint', function() {
			                    popupMenuHolderOuter.getNiceScroll().resize();
		                    });
	                    });
                    }
                }

                return false;
            });

            //if link has no submenu and if it's not dead, than open that link
            menuItemWithoutChild.click(function (e) {
                if(($(this).attr('href') !== "http://#") && ($(this).attr('href') !== "#")){
                    if (e.which == 1) {
                        popupMenuOpener.removeClass('eltdf-fm-opened');
                        eltdf.body.removeClass('eltdf-fullscreen-menu-opened');
                        eltdf.body.removeClass('eltdf-fullscreen-fade-in').addClass('eltdf-fullscreen-fade-out');
                        eltdf.body.addClass(cssClass);
                        $("nav.eltdf-fullscreen-menu ul.sub_menu").slideUp(200, function(){
                            $('nav.popup_menu').getNiceScroll().resize();
                        });
                        eltdf.modules.common.eltdfEnableScroll();
                    }
                } else {
                    return false;
                }
            });
        }
    }

})(jQuery);
(function($) {
    "use strict";

    var mobileHeader = {};
    eltdf.modules.mobileHeader = mobileHeader;

	mobileHeader.eltdfOnDocumentReady = eltdfOnDocumentReady;

    $(document).ready(eltdfOnDocumentReady);

    /*
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdfInitMobileNavigation();
        eltdfMobileHeaderBehavior();
    }

    function eltdfInitMobileNavigation() {
        var navigationOpener = $('.eltdf-mobile-header .eltdf-mobile-menu-opener');
        var navigationHolder = $('.eltdf-mobile-header .eltdf-mobile-nav');
        var dropdownOpener = $('.eltdf-mobile-nav .mobile_arrow, .eltdf-mobile-nav h6, .eltdf-mobile-nav a.eltdf-mobile-no-link');
        var animationSpeed = 200;

        //whole mobile menu opening / closing
        if(navigationOpener.length && navigationHolder.length) {
            navigationOpener.on('tap click', function(e) {
                e.stopPropagation();
                e.preventDefault();

                if(navigationHolder.is(':visible')) {
                    navigationHolder.slideUp(animationSpeed);
                    navigationOpener.removeClass("eltdf-mobile-menu-opened");
                } else {
                    navigationHolder.slideDown(animationSpeed);
                    navigationOpener.addClass("eltdf-mobile-menu-opened");
                }
            });
        }

        //dropdown opening / closing
        if(dropdownOpener.length) {
            dropdownOpener.each(function() {
                $(this).on('tap click', function(e) {
                    var dropdownToOpen = $(this).nextAll('ul').first();

                    if(dropdownToOpen.length) {
                        e.preventDefault();
                        e.stopPropagation();

                        var openerParent = $(this).parent('li');
                        if(dropdownToOpen.is(':visible')) {
                            dropdownToOpen.slideUp(animationSpeed);
                            openerParent.removeClass('eltdf-opened');
                        } else {
                            dropdownToOpen.slideDown(animationSpeed);
                            openerParent.addClass('eltdf-opened');
                        }
                    }
                });
            });
        }

        $('.eltdf-mobile-nav a, .eltdf-mobile-logo-wrapper a').on('click tap', function(e) {
            if($(this).attr('href') !== 'http://#' && $(this).attr('href') !== '#') {
                navigationHolder.slideUp(animationSpeed);
                navigationOpener.removeClass("eltdf-mobile-menu-opened");
            }
        });
    }

    function eltdfMobileHeaderBehavior() {
	    var mobileHeader = $('.eltdf-mobile-header'),
		    mobileMenuOpener = mobileHeader.find('.eltdf-mobile-menu-opener'),
		    mobileHeaderHeight = mobileHeader.length ? mobileHeader.height() : 0;

	    if(eltdf.body.hasClass('eltdf-content-is-behind-header') && mobileHeaderHeight > 0 && eltdf.windowWidth <= 1024) {
		    $('.eltdf-content').css('marginTop', -mobileHeaderHeight);
	    }

        if(eltdf.body.hasClass('eltdf-sticky-up-mobile-header')) {
            var stickyAppearAmount,
                adminBar     = $('#wpadminbar');

            var docYScroll1 = $(document).scrollTop();
            stickyAppearAmount = mobileHeaderHeight + eltdfGlobalVars.vars.eltdfAddForAdminBar;

            $(window).scroll(function() {
                var docYScroll2 = $(document).scrollTop();

                if(docYScroll2 > stickyAppearAmount) {
                    mobileHeader.addClass('eltdf-animate-mobile-header');
                } else {
                    mobileHeader.removeClass('eltdf-animate-mobile-header');
                }

                if((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount && !mobileMenuOpener.hasClass('eltdf-mobile-menu-opened')) || (docYScroll2 < stickyAppearAmount)) {
                    mobileHeader.removeClass('mobile-header-appear');
                    mobileHeader.css('margin-bottom', 0);

                    if(adminBar.length) {
                        mobileHeader.find('.eltdf-mobile-header-inner').css('top', 0);
                    }
                } else {
                    mobileHeader.addClass('mobile-header-appear');
                    mobileHeader.css('margin-bottom', stickyAppearAmount);
                }

                docYScroll1 = $(document).scrollTop();
            });
        }
    }

})(jQuery);
(function($) {
	"use strict";

	var stickyHeader = {};
	eltdf.modules.stickyHeader = stickyHeader;

	stickyHeader.isStickyVisible = false;
	stickyHeader.stickyAppearAmount = 0;
	stickyHeader.behaviour = '';

	stickyHeader.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		if(eltdf.windowWidth > 1024) {
			eltdfHeaderBehaviour();
		}
	}

	/*
	 **	Show/Hide sticky header on window scroll
	 */
	function eltdfHeaderBehaviour() {
		var header = $('.eltdf-page-header'),
			stickyHeader = $('.eltdf-sticky-header'),
			fixedHeaderWrapper = $('.eltdf-fixed-wrapper'),
			sliderHolder = $('.eltdf-slider'),
			revSliderHeight = sliderHolder.length ? sliderHolder.outerHeight() : 0,
			stickyAppearAmount,
			headerAppear;

		var headerMenuAreaOffset = $('.eltdf-page-header').find('.eltdf-fixed-wrapper').length ? $('.eltdf-page-header').find('.eltdf-fixed-wrapper').offset().top - eltdfGlobalVars.vars.eltdfAddForAdminBar : 0;

		switch(true) {
			// sticky header that will be shown when user scrolls up
			case eltdf.body.hasClass('eltdf-sticky-header-on-scroll-up'):
				eltdf.modules.stickyHeader.behaviour = 'eltdf-sticky-header-on-scroll-up';
				var docYScroll1 = $(document).scrollTop();
				stickyAppearAmount = parseInt(eltdfGlobalVars.vars.eltdfTopBarHeight) + parseInt(eltdfGlobalVars.vars.eltdfLogoAreaHeight) + parseInt(eltdfGlobalVars.vars.eltdfMenuAreaHeight) + parseInt(eltdfGlobalVars.vars.eltdfStickyHeaderHeight);

				headerAppear = function(){
					var docYScroll2 = $(document).scrollTop();

					if((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
						eltdf.modules.stickyHeader.isStickyVisible = false;
						stickyHeader.removeClass('header-appear').find('.eltdf-main-menu .second').removeClass('eltdf-drop-down-start');
						eltdf.body.removeClass('eltdf-sticky-header-appear');
					} else {
						eltdf.modules.stickyHeader.isStickyVisible = true;
						stickyHeader.addClass('header-appear');
						eltdf.body.addClass('eltdf-sticky-header-appear');
					}

					docYScroll1 = $(document).scrollTop();
				};
				headerAppear();

				$(window).scroll(function() {
					headerAppear();
				});

				break;

			// sticky header that will be shown when user scrolls both up and down
			case eltdf.body.hasClass('eltdf-sticky-header-on-scroll-down-up'):
				eltdf.modules.stickyHeader.behaviour = 'eltdf-sticky-header-on-scroll-down-up';

				if(eltdfPerPageVars.vars.eltdfStickyScrollAmount !== 0){
					eltdf.modules.stickyHeader.stickyAppearAmount = parseInt(eltdfPerPageVars.vars.eltdfStickyScrollAmount);
				} else {
					eltdf.modules.stickyHeader.stickyAppearAmount = parseInt(eltdfGlobalVars.vars.eltdfTopBarHeight) + parseInt(eltdfGlobalVars.vars.eltdfLogoAreaHeight) + parseInt(eltdfGlobalVars.vars.eltdfMenuAreaHeight) + parseInt(revSliderHeight);
				}

				headerAppear = function(){
					if(eltdf.scroll < eltdf.modules.stickyHeader.stickyAppearAmount) {
						eltdf.modules.stickyHeader.isStickyVisible = false;
						stickyHeader.removeClass('header-appear').find('.eltdf-main-menu .second').removeClass('eltdf-drop-down-start');
						eltdf.body.removeClass('eltdf-sticky-header-appear');
					}else{
						eltdf.modules.stickyHeader.isStickyVisible = true;
						stickyHeader.addClass('header-appear');
						eltdf.body.addClass('eltdf-sticky-header-appear');
					}
				};

				headerAppear();

				$(window).scroll(function() {
					headerAppear();
				});

				break;

			// on scroll down, part of header will be sticky
			case eltdf.body.hasClass('eltdf-fixed-on-scroll'):
				eltdf.modules.stickyHeader.behaviour = 'eltdf-fixed-on-scroll';
				var headerFixed = function(){

					if(eltdf.scroll <= headerMenuAreaOffset) {
						fixedHeaderWrapper.removeClass('fixed');
						eltdf.body.removeClass('eltdf-fixed-header-appear');
						header.css('margin-bottom', '0');
					} else {
						fixedHeaderWrapper.addClass('fixed');
						eltdf.body.addClass('eltdf-fixed-header-appear');
						header.css('margin-bottom', fixedHeaderWrapper.outerHeight());
					}
				};

				headerFixed();

				$(window).scroll(function() {
					headerFixed();
				});

				break;
		}
	}

})(jQuery);
(function($) {
	"use strict";

	var footer = {};
	eltdf.modules.footer = footer;

	footer.eltdfOnWindowLoad = eltdfOnWindowLoad;

	$(window).load(eltdfOnWindowLoad);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnWindowLoad() {
		setFooterHeight();
	}

	/*
	 ** Init footer height for left border line
	 */
	function setFooterHeight() {

		if(eltdf.windowWidth > 680){
			var columns = $(".eltdf-footer-top-holder .eltdf-column-content");
			columns.css('min-height', 0);

			var footerHeight = $('.eltdf-footer-top-inner > .eltdf-grid-row').innerHeight();

			columns.css('min-height', footerHeight);
		}
	}

})(jQuery);
(function($) {
    "use strict";

    var title = {};
    eltdf.modules.title = title;

    title.eltdfOnDocumentReady = eltdfOnDocumentReady;
    title.eltdfOnWindowLoad = eltdfOnWindowLoad;
    title.eltdfOnWindowResize = eltdfOnWindowResize;
    title.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);

    /*
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
	    eltdfParallaxTitle();
    }

    /*
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {
    }

    /*
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
    }

    /*
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {

    }

    /*
     **	Title image with parallax effect
     */
    function eltdfParallaxTitle(){
	    var parallaxBackground = $('.eltdf-title.eltdf-has-parallax-background');

        if(parallaxBackground.length > 0 && $('.touch').length === 0){
            var parallaxBackgroundWithZoomOut = $('.eltdf-title.eltdf-has-parallax-background.eltdf-zoom-out');

            var backgroundSizeWidth = parseInt(parallaxBackground.data('background-width').match(/\d+/));
            var titleHolderHeight = parallaxBackground.data('height');
            var titleRate = (titleHolderHeight / 10000) * 7;
            var titleYPos = -(eltdf.scroll * titleRate);

            //set position of background on doc ready
            parallaxBackground.css({'background-position': 'center '+ (titleYPos+eltdfGlobalVars.vars.eltdfAddForAdminBar) +'px' });
            parallaxBackgroundWithZoomOut.css({'background-size': backgroundSizeWidth-eltdf.scroll + 'px auto'});

            //set position of background on window scroll
            $(window).scroll(function() {
                titleYPos = -(eltdf.scroll * titleRate);
                parallaxBackground.css({'background-position': 'center ' + (titleYPos+eltdfGlobalVars.vars.eltdfAddForAdminBar) + 'px' });
                parallaxBackgroundWithZoomOut.css({'background-size': backgroundSizeWidth-eltdf.scroll + 'px auto'});
            });
        }
    }

})(jQuery);

(function($) {
    'use strict';

    var like = {};

    like.eltdfOnDocumentReady = eltdfOnDocumentReady;

    $(document).ready(eltdfOnDocumentReady);

    /**
    *  All functions to be called on $(document).ready() should be in this function
    **/
    function eltdfOnDocumentReady() {
        eltdfLikes();
    }

    function eltdfLikes() {
        $(document).on('click','.eltdf-like', function() {
            var likeLink = $(this),
                id = likeLink.attr('id'),
                type;

            if ( likeLink.hasClass('liked') ) {
                return false;
            }

            if (typeof likeLink.data('type') !== 'undefined') {
                type = likeLink.data('type');
            }

            var dataToPass = {
                action: 'sweettooth_elated_like',
                likes_id: id,
                type: type
            };

            var like = $.post(eltdfGlobalVars.vars.eltdfAjaxUrl, dataToPass, function( data ) {
                likeLink.html(data).addClass('liked').attr('title', 'You already like this!');
            });

            return false;
        });
    }

})(jQuery);
(function($) {
    'use strict';

	var accordions = {};
	eltdf.modules.accordions = accordions;

	accordions.eltdfInitAccordions = eltdfInitAccordions;


	accordions.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitAccordions();
	}

	/**
	 * Init accordions shortcode
	 */
	function eltdfInitAccordions(){
		var accordion = $('.eltdf-accordion-holder');

		if(accordion.length){
			accordion.each(function(){
				var thisAccordion = $(this);

				if(thisAccordion.hasClass('eltdf-accordion')){
					thisAccordion.accordion({
						animate: "swing",
						collapsible: true,
						active: 0,
						icons: "",
						heightStyle: "content"
					});
				}

				if(thisAccordion.hasClass('eltdf-toggle')){
					var toggleAccordion = $(this),
						toggleAccordionTitle = toggleAccordion.find('.eltdf-title-holder'),
						toggleAccordionContent = toggleAccordionTitle.next();

					toggleAccordion.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
					toggleAccordionTitle.addClass("ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom");
					toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();

					toggleAccordionTitle.each(function(){
						var thisTitle = $(this);

						thisTitle.hover(function(){
							thisTitle.toggleClass("ui-state-hover");
						});

						thisTitle.on('click',function(){
							thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
							thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
						});
					});
				}
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var animationHolder = {};
	eltdf.modules.animationHolder = animationHolder;

	animationHolder.eltdfInitAnimationHolder = eltdfInitAnimationHolder;


	animationHolder.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitAnimationHolder();
	}

	/*
	 *	Init animation holder shortcode
	 */
	function eltdfInitAnimationHolder(){
		var elements = $('.eltdf-grow-in, .eltdf-fade-in-down, .eltdf-element-from-fade, .eltdf-element-from-left, .eltdf-element-from-right, .eltdf-element-from-top, .eltdf-element-from-bottom, .eltdf-flip-in, .eltdf-x-rotate, .eltdf-z-rotate, .eltdf-y-translate, .eltdf-fade-in, .eltdf-fade-in-left-x-rotate'),
			animationClass,
			animationData,
			animationDelay;

		if(elements.length){
			elements.each(function(){
				var thisElement = $(this);

				thisElement.appear(function() {
					animationData = thisElement.data('animation');
					animationDelay = parseInt(thisElement.data('animation-delay'));

					if(typeof animationData !== 'undefined' && animationData !== '') {
						animationClass = animationData;
						var newClass = animationClass+'-on';

						setTimeout(function(){
							thisElement.addClass(newClass);
						},animationDelay);
					}
				},{accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var backgroundSections = {};
	eltdf.modules.backgroundSections = backgroundSections;

	backgroundSections.eltdfInitBackgroundSections = eltdfInitBackgroundSections;


	backgroundSections.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);
	$(window).resize(eltdfOnWindowResize);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitBackgroundSections();
	}

	/*
	 All functions to be called on $(window).resize() should be in this function
	 */
	function eltdfOnWindowResize() {
		eltdfInitBackgroundSections();
	}


	/*
	 **	Init full screen sections shortcode
	 */
	function eltdfInitBackgroundSections(){
		var backgroundSections = $('.eltdf-bs-holder');

		if(backgroundSections.length){
			backgroundSections.each(function() {
				var thisBackgroundSection = $(this);

				setResposniveData(thisBackgroundSection);
			});
		}
	}

	function setResposniveData(thisBackgroundSection) {
		var itemClass = '',
			imageBigLaptop = '',
			imageLaptop = '',
			imageTablet = '',
			imagePortraitTablet = '',
			imageMobile = '',
			responsiveStyle = '',
			style = '';

		if (typeof thisBackgroundSection.data('item-class') !== 'undefined' && thisBackgroundSection.data('item-class') !== false) {
			itemClass = thisBackgroundSection.data('item-class');
		}
		if (typeof thisBackgroundSection.data('big-laptop-image') !== 'undefined' && thisBackgroundSection.data('big-laptop-image') !== false) {
			imageBigLaptop = thisBackgroundSection.data('big-laptop-image');
		}
		if (typeof thisBackgroundSection.data('laptop-image') !== 'undefined' && thisBackgroundSection.data('laptop-image') !== false) {
			imageLaptop = thisBackgroundSection.data('laptop-image');
		}
		if (typeof thisBackgroundSection.data('tablet-image') !== 'undefined' && thisBackgroundSection.data('tablet-image') !== false) {
			imageTablet = thisBackgroundSection.data('tablet-image');
		}
		if (typeof thisBackgroundSection.data('tablet-portrait-image') !== 'undefined' && thisBackgroundSection.data('tablet-portrait-image') !== false) {
			imagePortraitTablet = thisBackgroundSection.data('tablet-portrait-image');
		}
		if (typeof thisBackgroundSection.data('mobile-image') !== 'undefined' && thisBackgroundSection.data('mobile-image') !== false) {
			imageMobile = thisBackgroundSection.data('mobile-image');
		}

		if (imageBigLaptop.length || imageLaptop.length || imageTablet.length || imagePortraitTablet.length || imageMobile.length) {

			if (imageBigLaptop.length) {
				responsiveStyle += "@media only screen and (max-width: 1440px) {.eltdf-bs-holder." + itemClass + " { background-image: url(" + imageBigLaptop + ") !important; } }";
			}
			if (imageLaptop.length) {
				responsiveStyle += "@media only screen and (max-width: 1280px) {.eltdf-bs-holder." + itemClass + " { background-image: url(" + imageLaptop + ") !important; } }";
			}
			if (imageTablet.length && eltdf.windowWidth <= 1024 && eltdf.windowWidth > 800) {
				thisBackgroundSection.find('.eltdf-bs-content-image img').attr('srcset', imageTablet);
			}
			if (imagePortraitTablet.length && eltdf.windowWidth <= 800 && eltdf.windowWidth > 680) {
				thisBackgroundSection.find('.eltdf-bs-content-image img').attr('srcset', imagePortraitTablet);
			}
			if (imageMobile.length && eltdf.windowWidth <= 680) {
				thisBackgroundSection.find('.eltdf-bs-content-image img').attr('srcset', imageMobile);
			}

			responsiveStyle += "@media only screen and (max-width: 1024px) {.eltdf-bs-holder." + itemClass + " { background-image: none !important; } }";
		}

		if (responsiveStyle.length && $('style[data-type="sweettooth_elated_background_sections_custom_css"]').length <= 0 ) {
			style = '<style type="text/css" data-type="sweettooth_elated_background_sections_custom_css">' + responsiveStyle + '</style>';
		}

		if (style.length) {
			$('head').append(style);
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var button = {};
	eltdf.modules.button = button;

	button.eltdfButton = eltdfButton;


	button.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfButton().init();
	}

	/**
	 * Button object that initializes whole button functionality
	 * @type {Function}
	 */
	var eltdfButton = function() {
		//all buttons on the page
		var buttons = $('.eltdf-btn');

		/**
		 * Initializes button hover color
		 * @param button current button
		 */
		var buttonHoverColor = function(button) {
			if(typeof button.data('hover-color') !== 'undefined') {
				var changeButtonColor = function(event) {
					event.data.button.css('color', event.data.color);
				};

				var originalColor = button.css('color');
				var hoverColor = button.data('hover-color');

				button.on('mouseenter', { button: button, color: hoverColor }, changeButtonColor);
				button.on('mouseleave', { button: button, color: originalColor }, changeButtonColor);
			}
		};

		/**
		 * Initializes button hover background color
		 * @param button current button
		 */
		var buttonHoverBgColor = function(button) {
			if(typeof button.data('hover-bg-color') !== 'undefined') {
				var changeButtonBg = function(event) {
					event.data.button.css('background-color', event.data.color);
				};

				var originalBgColor = button.css('background-color');
				var hoverBgColor = button.data('hover-bg-color');

				button.on('mouseenter', { button: button, color: hoverBgColor }, changeButtonBg);
				button.on('mouseleave', { button: button, color: originalBgColor }, changeButtonBg);
			}
		};

		/**
		 * Initializes button border color
		 * @param button
		 */
		var buttonHoverBorderColor = function(button) {
			if(typeof button.data('hover-border-color') !== 'undefined') {
				var changeBorderColor = function(event) {
					event.data.button.css('border-color', event.data.color);
				};

				var originalBorderColor = button.css('borderTopColor'); //take one of the four sides
				var hoverBorderColor = button.data('hover-border-color');

				button.on('mouseenter', { button: button, color: hoverBorderColor }, changeBorderColor);
				button.on('mouseleave', { button: button, color: originalBorderColor }, changeBorderColor);
			}
		};

		return {
			init: function() {
				if(buttons.length) {
					buttons.each(function() {
						buttonHoverColor($(this));
						buttonHoverBgColor($(this));
						buttonHoverBorderColor($(this));
					});
				}
			}
		};
	};

})(jQuery);
(function($) {
	'use strict';

	var countdown = {};
	eltdf.modules.countdown = countdown;

	countdown.eltdfInitCountdown = eltdfInitCountdown;


	countdown.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitCountdown();
	}

	/**
	 * Countdown Shortcode
	 */
	function eltdfInitCountdown() {
		var countdowns = $('.eltdf-countdown'),
			date = new Date(),
			currentMonth = date.getMonth(),
			year,
			month,
			day,
			hour,
			minute,
			timezone,
			monthLabel,
			dayLabel,
			hourLabel,
			minuteLabel,
			secondLabel;

		if (countdowns.length) {
			countdowns.each(function(){
				//Find countdown elements by id-s
				var countdownId = $(this).attr('id'),
					countdown = $('#'+countdownId),
					digitFontSize,
					labelFontSize;

				//Get data for countdown
				year = countdown.data('year');
				month = countdown.data('month');
				day = countdown.data('day');
				hour = countdown.data('hour');
				minute = countdown.data('minute');
				timezone = countdown.data('timezone');
				monthLabel = countdown.data('month-label');
				dayLabel = countdown.data('day-label');
				hourLabel = countdown.data('hour-label');
				minuteLabel = countdown.data('minute-label');
				secondLabel = countdown.data('second-label');
				digitFontSize = countdown.data('digit-size');
				labelFontSize = countdown.data('label-size');

				if( currentMonth != month ) {
					month = month - 1;
				}

				//Initialize countdown
				countdown.countdown({
					until: new Date(year, month, day, hour, minute, 44),
					labels: ['Years', monthLabel, 'Weeks', dayLabel, hourLabel, minuteLabel, secondLabel],
					format: 'ODHMS',
					timezone: timezone,
					padZeroes: true,
					onTick: setCountdownStyle
				});

				function setCountdownStyle() {
					countdown.find('.countdown-amount').css({
						'font-size' : digitFontSize+'px',
						'line-height' : digitFontSize+'px'
					});
					countdown.find('.countdown-period').css({
						'font-size' : labelFontSize+'px'
					});
				}
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var counter = {};
	eltdf.modules.counter = counter;

	counter.eltdfInitCounter = eltdfInitCounter;


	counter.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitCounter();
	}

	/**
	 * Counter Shortcode
	 */
	function eltdfInitCounter() {
		var counterHolder = $('.eltdf-counter-holder');

		if (counterHolder.length) {
			counterHolder.each(function() {
				var thisCounterHolder = $(this),
					thisCounter = thisCounterHolder.find('.eltdf-counter');

				thisCounterHolder.appear(function() {
					thisCounterHolder.css('opacity', '1');

					//Counter zero type
					if (thisCounter.hasClass('eltdf-zero-counter')) {
						var max = parseFloat(thisCounter.text());
						thisCounter.countTo({
							from: 0,
							to: max,
							speed: 1500,
							refreshInterval: 100
						});
					} else {
						thisCounter.absoluteCounter({
							speed: 2000,
							fadeInDelay: 1000
						});
					}
				},{accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var customFont = {};
	eltdf.modules.customFont = customFont;

	customFont.eltdfCustomFontResize = eltdfCustomFontResize;


	customFont.eltdfOnDocumentReady = eltdfOnDocumentReady;
	customFont.eltdfOnWindowResize = eltdfOnWindowResize;

	$(document).ready(eltdfOnDocumentReady);
	$(window).resize(eltdfOnWindowResize);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfCustomFontResize();
	}

	/*
	 All functions to be called on $(window).resize() should be in this function
	 */
	function eltdfOnWindowResize() {
		eltdfCustomFontResize();
	}

	/*
	 **	Custom Font resizing
	 */
	function eltdfCustomFontResize(){
		var customFont = $('.eltdf-custom-font-holder');

		if (customFont.length){
			customFont.each(function(){
				var thisCustomFont = $(this);
				var fontSize;
				var lineHeight;
				var coef1 = 1;
				var coef2 = 1;

				if (eltdf.windowWidth < 1480){
					coef1 = 0.8;
				}

				if (eltdf.windowWidth < 1200){
					coef1 = 0.7;
				}

				if (eltdf.windowWidth < 768){
					coef1 = 0.55;
					coef2 = 0.65;
				}

				if (eltdf.windowWidth < 600){
					coef1 = 0.45;
					coef2 = 0.55;
				}

				if (eltdf.windowWidth < 480){
					coef1 = 0.4;
					coef2 = 0.5;
				}

				if (typeof thisCustomFont.data('font-size') !== 'undefined' && thisCustomFont.data('font-size') !== false) {
					fontSize = parseInt(thisCustomFont.data('font-size'));

					if (fontSize > 70) {
						fontSize = Math.round(fontSize*coef1);
					}
					else if (fontSize > 35) {
						fontSize = Math.round(fontSize*coef2);
					}

					thisCustomFont.css('font-size',fontSize + 'px');
				}

				if (typeof thisCustomFont.data('line-height') !== 'undefined' && thisCustomFont.data('line-height') !== false) {
					lineHeight = parseInt(thisCustomFont.data('line-height'));

					if (lineHeight > 70 && eltdf.windowWidth < 1440) {
						lineHeight = '1.2em';
					} else if (lineHeight > 35 && eltdf.windowWidth < 768) {
						lineHeight = '1.2em';
					} else {
						lineHeight += 'px';
					}

					thisCustomFont.css('line-height', lineHeight);
				}
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var elementsHolder = {};
	eltdf.modules.elementsHolder = elementsHolder;

	elementsHolder.eltdfInitElementsHolderResponsiveStyle = eltdfInitElementsHolderResponsiveStyle;


	elementsHolder.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitElementsHolderResponsiveStyle();
	}

	/*
	 **	Elements Holder responsive style
	 */
	function eltdfInitElementsHolderResponsiveStyle(){
		var elementsHolder = $('.eltdf-elements-holder');

		if(elementsHolder.length){
			elementsHolder.each(function() {
				var thisElementsHolder = $(this),
					elementsHolderItem = thisElementsHolder.children('.eltdf-eh-item'),
					style = '',
					responsiveStyle = '';

				elementsHolderItem.each(function() {
					var thisItem = $(this),
						itemClass = '',
						largeLaptop = '',
						smallLaptop = '',
						ipadLandscape = '',
						ipadPortrait = '',
						mobileLandscape = '',
						mobilePortrait = '';

					if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
						itemClass = thisItem.data('item-class');
					}
					if (typeof thisItem.data('1280-1600') !== 'undefined' && thisItem.data('1280-1600') !== false) {
						largeLaptop = thisItem.data('1280-1600');
					}
					if (typeof thisItem.data('1024-1280') !== 'undefined' && thisItem.data('1024-1280') !== false) {
						smallLaptop = thisItem.data('1024-1280');
					}
					if (typeof thisItem.data('768-1024') !== 'undefined' && thisItem.data('768-1024') !== false) {
						ipadLandscape = thisItem.data('768-1024');
					}
					if (typeof thisItem.data('600-768') !== 'undefined' && thisItem.data('600-768') !== false) {
						ipadPortrait = thisItem.data('600-768');
					}
					if (typeof thisItem.data('480-600') !== 'undefined' && thisItem.data('480-600') !== false) {
						mobileLandscape = thisItem.data('480-600');
					}
					if (typeof thisItem.data('480') !== 'undefined' && thisItem.data('480') !== false) {
						mobilePortrait = thisItem.data('480');
					}

					if(largeLaptop.length || smallLaptop.length || ipadLandscape.length || ipadPortrait.length || mobileLandscape.length || mobilePortrait.length) {

						if(largeLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1280px) and (max-width: 1600px) {.eltdf-eh-item-content."+itemClass+" { padding: "+largeLaptop+" !important; } }";
						}
						if(smallLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1024px) and (max-width: 1280px) {.eltdf-eh-item-content."+itemClass+" { padding: "+smallLaptop+" !important; } }";
						}
						if(ipadLandscape.length) {
							responsiveStyle += "@media only screen and (min-width: 768px) and (max-width: 1024px) {.eltdf-eh-item-content."+itemClass+" { padding: "+ipadLandscape+" !important; } }";
						}
						if(ipadPortrait.length) {
							responsiveStyle += "@media only screen and (min-width: 600px) and (max-width: 768px) {.eltdf-eh-item-content."+itemClass+" { padding: "+ipadPortrait+" !important; } }";
						}
						if(mobileLandscape.length) {
							responsiveStyle += "@media only screen and (min-width: 480px) and (max-width: 600px) {.eltdf-eh-item-content."+itemClass+" { padding: "+mobileLandscape+" !important; } }";
						}
						if(mobilePortrait.length) {
							responsiveStyle += "@media only screen and (max-width: 480px) {.eltdf-eh-item-content."+itemClass+" { padding: "+mobilePortrait+" !important; } }";
						}
					}
				});

				if(responsiveStyle.length) {
					style = '<style type="text/css" data-type="sweettooth_elated_style_shortcodes_custom_css">'+responsiveStyle+'</style>';
				}

				if(style.length) {
					$('head').append(style);
				}
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var expandedGallery = {};
	eltdf.modules.expandedGallery = expandedGallery;

	expandedGallery.eltdfInitExpandedGallery = eltdfInitExpandedGallery;


	expandedGallery.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitExpandedGallery();
	}

	/*
	 **	Init Expanded Gallery shortcode
	 */
	function eltdfInitExpandedGallery(){
		var holder = $('.eltdf-expanded-gallery');

		if(holder.length){
			holder.each(function() {
				var thisHolder = $(this),
					thisHolderImages = thisHolder.find('.eltdf-eg-image');

				thisHolder.find('.eltdf-eg-image:nth-child('+Math.ceil(thisHolderImages.length / 2)+')').addClass('eltdf-eg-middle-item');

				thisHolder.appear(function() {
					thisHolder.find('.eltdf-eg-middle-item').addClass('eltdf-eg-show');

					setTimeout(function(){
						thisHolder.find('.eltdf-eg-middle-item').prev().addClass('eltdf-eg-show');
						thisHolder.find('.eltdf-eg-middle-item').next().addClass('eltdf-eg-show');
					},250);

					if (thisHolder.hasClass('eltdf-eg-five')) {
						setTimeout(function(){
							thisHolder.find('.eltdf-eg-middle-item').prev().prev().addClass('eltdf-eg-show');
							thisHolder.find('.eltdf-eg-middle-item').next().next().addClass('eltdf-eg-show');
						},500);
					}
				}, {accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var fullScreenSections = {};
	eltdf.modules.fullScreenSections = fullScreenSections;

	fullScreenSections.eltdfInitFullScreenSections = eltdfInitFullScreenSections;


	fullScreenSections.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitFullScreenSections();
	}

	/*
	 **	Init full screen sections shortcode
	 */
	function eltdfInitFullScreenSections(){
		var fullScreenSections = $('.eltdf-full-screen-sections');

		if(fullScreenSections.length){
			fullScreenSections.each(function() {
				var thisFullScreenSections = $(this),
					fullScreenSectionsWrapper = thisFullScreenSections.children('.eltdf-fss-wrapper'),
					fullScreenSectionsItemsNumber = fullScreenSectionsWrapper.children('.eltdf-fss-item').length,
					enableNavigationData = '',
					enablePaginationData = '',
					paginationSkin = '';

				if (typeof thisFullScreenSections.data('enable-navigation') !== 'undefined' && thisFullScreenSections.data('enable-navigation') !== false) {
					enableNavigationData = thisFullScreenSections.data('enable-navigation');
				}
				if (typeof thisFullScreenSections.data('enable-pagination') !== 'undefined' && thisFullScreenSections.data('enable-pagination') !== false) {
					enablePaginationData = thisFullScreenSections.data('enable-pagination');
				}
				if (typeof thisFullScreenSections.data('pagination-skin') !== 'undefined' && thisFullScreenSections.data('pagination-skin') !== false) {
					paginationSkin = thisFullScreenSections.data('pagination-skin');
				}

				var enableNavigation = enableNavigationData !== 'no',
					enablePagination = enablePaginationData !== 'no';

				fullScreenSectionsWrapper.fullpage({
					sectionSelector: '.eltdf-fss-item',
					scrollingSpeed: 1200,
					verticalCentered: false,
					continuousVertical: true,
					navigation: enablePagination,
					onLeave: function(index, nextIndex, direction){
						if(enableNavigation) {
							checkActiveArrowsOnFullScrrenTemplate(thisFullScreenSections, fullScreenSectionsItemsNumber, nextIndex);
						}
					},
					afterRender: function(){
						if(enableNavigation) {
							checkActiveArrowsOnFullScrrenTemplate(thisFullScreenSections, fullScreenSectionsItemsNumber, 1);
							thisFullScreenSections.children('.eltdf-fss-nav-holder').css('visibility','visible');
						}

						if(enablePagination && paginationSkin !== '') {
							eltdf.body.addClass('eltdf-fss-dots-skin-' + paginationSkin);
						}

						fullScreenSectionsWrapper.css('visibility','visible');
					}
				});

				if(enableNavigation) {
					thisFullScreenSections.find('#eltdf-fss-nav-up').on('click', function() {
						$.fn.fullpage.moveSectionUp();
						return false;
					});

					thisFullScreenSections.find('#eltdf-fss-nav-down').on('click', function() {
						$.fn.fullpage.moveSectionDown();
						return false;
					});
				}
			});
		}
	}

	function checkActiveArrowsOnFullScrrenTemplate(thisFullScreenSections, fullScreenSectionsItemsNumber, index){
		var thisHolder = thisFullScreenSections,
			thisHolderArrowsUp = thisHolder.find('#eltdf-fss-nav-up'),
			thisHolderArrowsDown = thisHolder.find('#eltdf-fss-nav-down');

		if (index === 1) {
			thisHolderArrowsUp.css({'opacity': '0', 'height': '0', 'visibility': 'hidden'});
			thisHolderArrowsDown.css({'opacity': '0', 'height': '0', 'visibility': 'hidden'});

			if(index !== fullScreenSectionsItemsNumber){
				thisHolderArrowsDown.css({'opacity': '1', 'height': 'auto', 'visibility': 'visible'});
			}
		} else if (index === fullScreenSectionsItemsNumber) {
			thisHolderArrowsDown.css({'opacity': '0', 'height': '0', 'visibility': 'hidden'});

			if(fullScreenSectionsItemsNumber === 2){
				thisHolderArrowsUp.css({'opacity': '1', 'height': 'auto', 'visibility': 'visible'});
			}
		} else {
			thisHolderArrowsUp.css({'opacity': '1', 'height': 'auto', 'visibility': 'visible'});
			thisHolderArrowsDown.css({'opacity': '1', 'height': 'auto', 'visibility': 'visible'});
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var googleMap = {};
	eltdf.modules.googleMap = googleMap;

	googleMap.eltdfShowGoogleMap = eltdfShowGoogleMap;


	googleMap.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfShowGoogleMap();
	}

	/*
	 **	Show Google Map
	 */
	function eltdfShowGoogleMap(){
		var googleMap = $('.eltdf-google-map');

		if(googleMap.length){
			googleMap.each(function(){
				var element = $(this);

				var customMapStyle;
				if(typeof element.data('custom-map-style') !== 'undefined') {
					customMapStyle = element.data('custom-map-style');
				}

				var colorOverlay;
				if(typeof element.data('color-overlay') !== 'undefined' && element.data('color-overlay') !== false) {
					colorOverlay = element.data('color-overlay');
				}

				var saturation;
				if(typeof element.data('saturation') !== 'undefined' && element.data('saturation') !== false) {
					saturation = element.data('saturation');
				}

				var lightness;
				if(typeof element.data('lightness') !== 'undefined' && element.data('lightness') !== false) {
					lightness = element.data('lightness');
				}

				var zoom;
				if(typeof element.data('zoom') !== 'undefined' && element.data('zoom') !== false) {
					zoom = element.data('zoom');
				}

				var pin;
				if(typeof element.data('pin') !== 'undefined' && element.data('pin') !== false) {
					pin = element.data('pin');
				}

				var mapHeight;
				if(typeof element.data('height') !== 'undefined' && element.data('height') !== false) {
					mapHeight = element.data('height');
				}

				var uniqueId;
				if(typeof element.data('unique-id') !== 'undefined' && element.data('unique-id') !== false) {
					uniqueId = element.data('unique-id');
				}

				var scrollWheel;
				if(typeof element.data('scroll-wheel') !== 'undefined') {
					scrollWheel = element.data('scroll-wheel');
				}
				var addresses;
				if(typeof element.data('addresses') !== 'undefined' && element.data('addresses') !== false) {
					addresses = element.data('addresses');
				}

				var map = "map_"+ uniqueId;
				var geocoder = "geocoder_"+ uniqueId;
				var holderId = "eltdf-map-"+ uniqueId;

				eltdfInitializeGoogleMap(customMapStyle, colorOverlay, saturation, lightness, scrollWheel, zoom, holderId, mapHeight, pin,  map, geocoder, addresses);
			});
		}
	}

	/*
	 **	Init Google Map
	 */
	function eltdfInitializeGoogleMap(customMapStyle, color, saturation, lightness, wheel, zoom, holderId, height, pin,  map, geocoder, data){

		if(typeof google !== 'object') {
			return;
		}

		var mapStyles = [
			{
				stylers: [
					{hue: color },
					{saturation: saturation},
					{lightness: lightness},
					{gamma: 1}
				]
			}
		];

		var googleMapStyleId;

		if(customMapStyle === 'yes'){
			googleMapStyleId = 'eltdf-style';
		} else {
			googleMapStyleId = google.maps.MapTypeId.ROADMAP;
		}

		if(wheel === 'yes'){
			wheel = true;
		} else {
			wheel = false;
		}

		var qoogleMapType = new google.maps.StyledMapType(mapStyles,
			{name: "Elated Google Map"});

		geocoder = new google.maps.Geocoder();
		var latlng = new google.maps.LatLng(-34.397, 150.644);

		if (!isNaN(height)){
			height = height + 'px';
		}

		var myOptions = {
			zoom: zoom,
			scrollwheel: wheel,
			center: latlng,
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL,
				position: google.maps.ControlPosition.RIGHT_CENTER
			},
			scaleControl: false,
			scaleControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			streetViewControl: false,
			streetViewControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			panControl: false,
			panControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			mapTypeControl: false,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'eltdf-style'],
				style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			mapTypeId: googleMapStyleId
		};

		map = new google.maps.Map(document.getElementById(holderId), myOptions);
		map.mapTypes.set('eltdf-style', qoogleMapType);

		var index;

		for (index = 0; index < data.length; ++index) {
			eltdfInitializeGoogleAddress(data[index], pin, map, geocoder);
		}

		var holderElement = document.getElementById(holderId);
		holderElement.style.height = height;
	}

	/*
	 **	Init Google Map Addresses
	 */
	function eltdfInitializeGoogleAddress(data, pin, map, geocoder){
		if (data === '') {
			return;
		}

		var contentString = '<div id="content">'+
			'<div id="siteNotice">'+
			'</div>'+
			'<div id="bodyContent">'+
			'<p>'+data+'</p>'+
			'</div>'+
			'</div>';

		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});

		geocoder.geocode( { 'address': data}, function(results, status) {
			if (status === google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location,
					icon:  pin,
					title: data.store_title
				});
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map,marker);
				});

				google.maps.event.addDomListener(window, 'resize', function() {
					map.setCenter(results[0].geometry.location);
				});
			}
		});
	}

})(jQuery);
(function($) {
    'use strict';

	var timeline = {};
	eltdf.modules.timeline = timeline;

	timeline.eltdfInitHorizontalTimeline = eltdfInitHorizontalTimeline;


	timeline.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 ** All functions to be called on $(window).load() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitHorizontalTimeline();
	}

	function eltdfInitHorizontalTimeline() {
		var timelines = $('.eltdf-horizontal-timeline');

		var eventsMinDistance = 120;
		if(eltdf.windowWidth > 680 && eltdf.windowWidth <= 1024) {
			eventsMinDistance = 60;
		} else if (eltdf.windowWidth < 680) {
			eventsMinDistance = 105;
		}

		if(timelines.length) {
			timelines.each(function() {
				var timeline = $(this),
					timelineComponents = {};

				//cache timeline components
				timelineComponents['timelineWrapper'] = timeline.find('.eltdf-events-wrapper');
				timelineComponents['eventsWrapper'] = timelineComponents['timelineWrapper'].children('.eltdf-events');
				timelineComponents['fillingLine'] = timelineComponents['eventsWrapper'].children('.eltdf-filling-line');
				timelineComponents['timelineEvents'] = timelineComponents['eventsWrapper'].find('a');
				timelineComponents['timelineDates'] = parseDate(timelineComponents['timelineEvents']);
				timelineComponents['eventsMinLapse'] = minLapse(timelineComponents['timelineDates']);
				timelineComponents['timelineNavigation'] = timeline.find('.eltdf-timeline-navigation');
				timelineComponents['eventsContent'] = timeline.children('.eltdf-events-content');

				timelineComponents['eventsWrapper'].find('ol li:first-child a').addClass('selected');
				timelineComponents['eventsContent'].find('ol li:first-child').addClass('selected');

				//assign a left postion to the single events along the timeline
				setDatePosition(timelineComponents, eventsMinDistance, timeline);
				//assign a width to the timeline
				var timelineTotWidth = setTimelineWidth(timelineComponents, eventsMinDistance, timeline);
				//the timeline has been initialize - show it
				timeline.addClass('loaded');

				//detect click on the next arrow
				timelineComponents['timelineNavigation'].on('click', '.eltdf-next', function(event){
					event.preventDefault();
					updateSlide(timelineComponents, timelineTotWidth, 'next');
				});
				//detect click on the prev arrow
				timelineComponents['timelineNavigation'].on('click', '.eltdf-prev', function(event){
					event.preventDefault();
					updateSlide(timelineComponents, timelineTotWidth, 'prev');
				});
				//detect click on the a single event - show new event content
				timelineComponents['eventsWrapper'].on('click', 'a', function(event){
					event.preventDefault();
					timelineComponents['timelineEvents'].removeClass('selected');
					$(this).addClass('selected');
					updateOlderEvents($(this));
					updateFilling($(this), timelineComponents['fillingLine'], timelineTotWidth);
					updateVisibleContent($(this), timelineComponents['eventsContent']);
				});

				//on swipe, show next/prev event content
				timelineComponents['eventsContent'].on('swipeleft', function(){
					var mq = checkMQ();
					( mq == 'mobile' ) && showNewContent(timelineComponents, timelineTotWidth, 'next');
				});
				timelineComponents['eventsContent'].on('swiperight', function(){
					var mq = checkMQ();
					( mq == 'mobile' ) && showNewContent(timelineComponents, timelineTotWidth, 'prev');
				});

				//keyboard navigation
				$(document).keyup(function(event){
					if(event.which === '37' && elementInViewport(timeline.get(0)) ) {
						showNewContent(timelineComponents, timelineTotWidth, 'prev');
					} else if( event.which === '39' && elementInViewport(timeline.get(0))) {
						showNewContent(timelineComponents, timelineTotWidth, 'next');
					}
				});
			});
		}

		function updateSlide(timelineComponents, timelineTotWidth, string) {
			//retrieve translateX value of timelineComponents['eventsWrapper']
			var translateValue = getTranslateValue(timelineComponents['eventsWrapper']),
				wrapperWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', ''));
			//translate the timeline to the left('next')/right('prev')
			(string === 'next')
				? translateTimeline(timelineComponents, translateValue - wrapperWidth + eventsMinDistance, wrapperWidth - timelineTotWidth)
				: translateTimeline(timelineComponents, translateValue + wrapperWidth - eventsMinDistance);
		}

		function showNewContent(timelineComponents, timelineTotWidth, string) {
			//go from one event to the next/previous one
			var visibleContent =  timelineComponents['eventsContent'].find('.selected'),
				newContent = ( string === 'next' ) ? visibleContent.next() : visibleContent.prev();

			if ( newContent.length > 0 ) { //if there's a next/prev event - show it
				var selectedDate = timelineComponents['eventsWrapper'].find('.selected'),
					newEvent = ( string === 'next' ) ? selectedDate.parent('li').next('li').children('a') : selectedDate.parent('li').prev('li').children('a');

				updateFilling(newEvent, timelineComponents['fillingLine'], timelineTotWidth);
				updateVisibleContent(newEvent, timelineComponents['eventsContent']);
				newEvent.addClass('selected');
				selectedDate.removeClass('selected');
				updateOlderEvents(newEvent);
				updateTimelinePosition(string, newEvent, timelineComponents);
			}
		}

		function updateTimelinePosition(string, event, timelineComponents) {
			//translate timeline to the left/right according to the position of the selected event
			var eventStyle = window.getComputedStyle(event.get(0), null),
				eventLeft = Number(eventStyle.getPropertyValue("left").replace('px', '')),
				timelineWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', '')),
				timelineTotWidth = Number(timelineComponents['eventsWrapper'].css('width').replace('px', ''));
			var timelineTranslate = getTranslateValue(timelineComponents['eventsWrapper']);

			if( (string === 'next' && eventLeft > timelineWidth - timelineTranslate) || (string == 'prev' && eventLeft < - timelineTranslate) ) {
				translateTimeline(timelineComponents, - eventLeft + timelineWidth/2, timelineWidth - timelineTotWidth);
			}
		}

		function translateTimeline(timelineComponents, value, totWidth) {
			var eventsWrapper = timelineComponents['eventsWrapper'].get(0);
			value = (value > 0) ? 0 : value; //only negative translate value
			value = ( typeof totWidth !== 'undefined' &&  value < totWidth ) ? totWidth : value; //do not translate more than timeline width
			setTransformValue(eventsWrapper, 'translateX', value+'px');
			//update navigation arrows visibility
			(value === 0 ) ? timelineComponents['timelineNavigation'].find('.eltdf-prev').addClass('inactive') : timelineComponents['timelineNavigation'].find('.eltdf-prev').removeClass('inactive');
			(value === totWidth ) ? timelineComponents['timelineNavigation'].find('.eltdf-next').addClass('inactive') : timelineComponents['timelineNavigation'].find('.eltdf-next').removeClass('inactive');
		}

		function disableTranslateTimeline(timelineComponents) {
			timelineComponents['timelineNavigation'].find('.eltdf-prev').addClass('inactive');
			timelineComponents['timelineNavigation'].find('.eltdf-next').addClass('inactive');
		}

		function updateFilling(selectedEvent, filling, totWidth) {
			//change .filling-line length according to the selected event
			var eventStyle = window.getComputedStyle(selectedEvent.get(0), null),
				eventLeft = eventStyle.getPropertyValue("left"),
				eventWidth = eventStyle.getPropertyValue("width");
			eventLeft = Number(eventLeft.replace('px', '')) + Number(eventWidth.replace('px', ''))/2;
			var scaleValue = eventLeft/totWidth;
			setTransformValue(filling.get(0), 'scaleX', scaleValue);
		}

		function setDatePosition(timelineComponents, min, timeline) {
			var shorten = false;
			for (var i = 0; i < timelineComponents['timelineDates'].length; i++) {
				var distance = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][i]),
					distanceNorm = Math.round(distance/timelineComponents['eventsMinLapse']) + 1;
				/* 24 is width of circles placed in link :after element */
				timelineComponents['timelineEvents'].eq(i).css('left', distanceNorm*min-24+'px');
				/* 80 is width of 2*40 margins on eltdf-events-wrapper */
				if(distanceNorm*min < timeline.outerWidth() - 80) {
					shorten = true;
				}
				else {
					shorten = false;
				}
			}
			if(shorten) {
				disableTranslateTimeline(timelineComponents);
				/* 80 is width of 2*40 margins on eltdf-events-wrapper, 24 is width of circles placed in link :after element */
				var minDistance = (timeline.outerWidth() - 80 - (timelineComponents['timelineDates'].length - 1) * 24) / (timelineComponents['timelineDates'].length + 1);
				for (var i = 0; i < timelineComponents['timelineDates'].length; i++) {
					timelineComponents['timelineEvents'].eq(i).css('left', (i+1)*minDistance+'px');
				}
			}
		}

		function setTimelineWidth(timelineComponents, width, timeline) {
			var timeSpan = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][timelineComponents['timelineDates'].length-1]),
				timeSpanNorm = timeSpan/timelineComponents['eventsMinLapse'],
				timeSpanNorm = Math.round(timeSpanNorm) + 2,
				totalWidth = timeSpanNorm*width;
			/* 80 is width of 2*40 margins on eltdf-events-wrapper */
			if(totalWidth < timeline.outerWidth() - 80) {
				totalWidth = timeline.outerWidth() - 80;
			}
			timelineComponents['eventsWrapper'].css('width', totalWidth+"px");
			updateFilling(timelineComponents['eventsWrapper'].find('a.selected'), timelineComponents['fillingLine'], totalWidth);
			updateTimelinePosition('next', timelineComponents['eventsWrapper'].find('a.selected'), timelineComponents);

			return totalWidth;
		}

		function updateVisibleContent(event, eventsContent) {
			var eventDate = event.data('date'),
				visibleContent = eventsContent.find('.selected'),
				selectedContent = eventsContent.find('[data-date="'+ eventDate +'"]'),
				selectedContentHeight = selectedContent.height();

			if (selectedContent.index() > visibleContent.index()) {
				var classEnetering = 'selected eltdf-enter-right',
					classLeaving = 'eltdf-leave-left';
			} else {
				var classEnetering = 'selected eltdf-enter-left',
					classLeaving = 'eltdf-leave-right';
			}

			selectedContent.attr('class', classEnetering);
			visibleContent.attr('class', classLeaving).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
				visibleContent.removeClass('eltdf-leave-right eltdf-leave-left');
				selectedContent.removeClass('eltdf-enter-left eltdf-enter-right');
			});
			eventsContent.css('height', selectedContentHeight+'px');
		}

		function updateOlderEvents(event) {
			event.parent('li').prevAll('li').children('a').addClass('older-event').end().end().nextAll('li').children('a').removeClass('older-event');
		}

		function getTranslateValue(timeline) {
			var timelineStyle = window.getComputedStyle(timeline.get(0), null),
				timelineTranslate = timelineStyle.getPropertyValue("-webkit-transform") ||
					timelineStyle.getPropertyValue("-moz-transform") ||
					timelineStyle.getPropertyValue("-ms-transform") ||
					timelineStyle.getPropertyValue("-o-transform") ||
					timelineStyle.getPropertyValue("transform");

			if( timelineTranslate.indexOf('(') >= 0 ) {
				var timelineTranslate = timelineTranslate.split('(')[1];
				timelineTranslate = timelineTranslate.split(')')[0];
				timelineTranslate = timelineTranslate.split(',');
				var translateValue = timelineTranslate[4];
			} else {
				var translateValue = 0;
			}

			return Number(translateValue);
		}

		function setTransformValue(element, property, value) {
			element.style["-webkit-transform"] = property+"("+value+")";
			element.style["-moz-transform"] = property+"("+value+")";
			element.style["-ms-transform"] = property+"("+value+")";
			element.style["-o-transform"] = property+"("+value+")";
			element.style["transform"] = property+"("+value+")";
		}

		//based on http://stackoverflow.com/questions/542938/how-do-i-get-the-number-of-days-between-two-dates-in-javascript
		function parseDate(events) {
			var dateArrays = [];
			events.each(function(){
				var singleDate = $(this),
					dateComp = singleDate.data('date').split('T');
				if( dateComp.length > 1 ) { //both DD/MM/YEAR and time are provided
					var dayComp = dateComp[0].split('/'),
						timeComp = dateComp[1].split(':');
				} else if( dateComp[0].indexOf(':') >=0 ) { //only time is provide
					var dayComp = ["2000", "0", "0"],
						timeComp = dateComp[0].split(':');
				} else { //only DD/MM/YEAR
					var dayComp = dateComp[0].split('/'),
						timeComp = ["0", "0"];
				}
				var	newDate = new Date(dayComp[2], dayComp[1]-1, dayComp[0], timeComp[0], timeComp[1]);
				dateArrays.push(newDate);
			});
			return dateArrays;
		}

		function daydiff(first, second) {
			return Math.round((second-first));
		}

		function minLapse(dates) {
			//determine the minimum distance among events
			var dateDistances = [];
			for (var i = 1; i < dates.length; i++) {
				var distance = daydiff(dates[i-1], dates[i]);
				dateDistances.push(distance);
			}
			return Math.min.apply(null, dateDistances);
		}

		/*
		 How to tell if a DOM element is visible in the current viewport?
		 http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
		 */
		function elementInViewport(el) {
			var top = el.offsetTop;
			var left = el.offsetLeft;
			var width = el.offsetWidth;
			var height = el.offsetHeight;

			while(el.offsetParent) {
				el = el.offsetParent;
				top += el.offsetTop;
				left += el.offsetLeft;
			}

			return (
				top < (window.pageYOffset + window.innerHeight) &&
				left < (window.pageXOffset + window.innerWidth) &&
				(top + height) > window.pageYOffset &&
				(left + width) > window.pageXOffset
			);
		}

		function checkMQ() {
			//check if mobile or desktop device
			return window.getComputedStyle(document.querySelector('.eltdf-horizontal-timeline'), '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, "");
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var icon = {};
	eltdf.modules.icon = icon;

	icon.eltdfIcon = eltdfIcon;


	icon.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfIcon().init();
	}

	/**
	 * Object that represents icon shortcode
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var eltdfIcon = function() {
		var icons = $('.eltdf-icon-shortcode');

		/**
		 * Function that triggers icon animation and icon animation delay
		 */
		var iconAnimation = function(icon) {
			if(icon.hasClass('eltdf-icon-animation')) {
				icon.appear(function() {
					icon.parent('.eltdf-icon-animation-holder').addClass('eltdf-icon-animation-show');
				}, {accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
			}
		};

		/**
		 * Function that triggers icon hover color functionality
		 */
		var iconHoverColor = function(icon) {
			if(typeof icon.data('hover-color') !== 'undefined') {
				var changeIconColor = function(event) {
					event.data.icon.css('color', event.data.color);
				};

				var iconElement = icon.find('.eltdf-icon-element');
				var hoverColor = icon.data('hover-color');
				var originalColor = iconElement.css('color');

				if(hoverColor !== '') {
					icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
					icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
				}
			}
		};

		/**
		 * Function that triggers icon holder background color hover functionality
		 */
		var iconHolderBackgroundHover = function(icon) {
			if(typeof icon.data('hover-background-color') !== 'undefined') {
				var changeIconBgColor = function(event) {
					event.data.icon.css('background-color', event.data.color);
				};

				var hoverBackgroundColor = icon.data('hover-background-color');
				var originalBackgroundColor = icon.css('background-color');

				if(hoverBackgroundColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverBackgroundColor}, changeIconBgColor);
					icon.on('mouseleave', {icon: icon, color: originalBackgroundColor}, changeIconBgColor);
				}
			}
		};

		/**
		 * Function that initializes icon holder border hover functionality
		 */
		var iconHolderBorderHover = function(icon) {
			if(typeof icon.data('hover-border-color') !== 'undefined') {
				var changeIconBorder = function(event) {
					event.data.icon.css('border-color', event.data.color);
				};

				var hoverBorderColor = icon.data('hover-border-color');
				var originalBorderColor = icon.css('border-color');

				if(hoverBorderColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverBorderColor}, changeIconBorder);
					icon.on('mouseleave', {icon: icon, color: originalBorderColor}, changeIconBorder);
				}
			}
		};

		return {
			init: function() {
				if(icons.length) {
					icons.each(function() {
						iconAnimation($(this));
						iconHoverColor($(this));
						iconHolderBackgroundHover($(this));
						iconHolderBorderHover($(this));
					});
				}
			}
		};
	};

})(jQuery);
(function($) {
	'use strict';

	var iconListItem = {};
	eltdf.modules.iconListItem = iconListItem;

	iconListItem.eltdfInitIconList = eltdfInitIconList;


	iconListItem.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitIconList().init();
	}

	/**
	 * Button object that initializes icon list with animation
	 * @type {Function}
	 */
	var eltdfInitIconList = function() {
		var iconList = $('.eltdf-animate-list');

		/**
		 * Initializes icon list animation
		 * @param list current slider
		 */
		var iconListInit = function(list) {
			setTimeout(function(){
				list.appear(function(){
					list.addClass('eltdf-appeared');
				},{accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
			},30);
		};

		return {
			init: function() {
				if(iconList.length) {
					iconList.each(function() {
						iconListInit($(this));
					});
				}
			}
		};
	};

})(jQuery);
(function($) {
    'use strict';

	var imageCarousel = {};
	eltdf.modules.imageCarousel = imageCarousel;

	imageCarousel.eltdfInitImageCarousel = imageCarousel;

	imageCarousel.eltdfOnDocumentReady  = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdfOnDocumentReady() {
	    eltdfInitImageCarousel();
    }

    /**
     * Initializes portfolio slider
     */
    function eltdfInitImageCarousel(){
        var imageCarousel = $('.eltdf-image-carousel');

	    if(imageCarousel.length) {
		    imageCarousel.each(function () {
			    var thisImageCarousel = $(this),
				    imageCarouselSlider = thisImageCarousel.children('.eltdf-owl-slider'),
				    height = '',
				    laptop = '',
				    laptopBig = '',
				    size_1366 = '',
				    ipad   = '',
				    mobileBig = '',
				    mobile = '',
				    itemClass = '',
				    style   = '',
				    responsiveStyle = '';


			    if (typeof imageCarouselSlider.data('class') !== 'undefined' && imageCarouselSlider.data('class') !== false) {
				    itemClass = imageCarouselSlider.data('class');
			    }
			    if (typeof imageCarouselSlider.data('height') !== 'undefined' && imageCarouselSlider.data('height' !== false)) {
				    height = imageCarouselSlider.data('height');
			    }
			    if (typeof imageCarouselSlider.data('height-1440') !== 'undefined' && imageCarouselSlider.data('height-1440' !== false)) {
				    laptopBig = imageCarouselSlider.data('height-1440');
			    }
			    if (typeof imageCarouselSlider.data('height-1366') !== 'undefined' && imageCarouselSlider.data('height-1366' !== false)) {
				    size_1366 = imageCarouselSlider.data('height-1366');
			    }
			    if (typeof imageCarouselSlider.data('height-1280') !== 'undefined' && imageCarouselSlider.data('height-1280' !== false)) {
				    laptop = imageCarouselSlider.data('height-1280');
			    }
			    if (typeof imageCarouselSlider.data('height-1024') !== 'undefined' && imageCarouselSlider.data('height-1024' !== false)) {
				    ipad = imageCarouselSlider.data('height-1024');
			    }
			    if (typeof imageCarouselSlider.data('height-600') !== 'undefined' && imageCarouselSlider.data('height-600' !== false)) {
				    mobileBig = imageCarouselSlider.data('height-600');
			    }
			    if (typeof imageCarouselSlider.data('height-480') !== 'undefined' && imageCarouselSlider.data('height-480' !== false)) {
				    mobile = imageCarouselSlider.data('height-480');
			    }

			    if(laptopBig.length || size_1366.length || laptop.length || ipad.length || mobileBig.length || mobile.length || height.length) {

				    if(height.length) {
					    responsiveStyle += ".eltdf-image-carousel." + itemClass + " .eltdf-ic-image { height: " + height + "; }";
				    }
				    if (laptopBig.length) {
					    responsiveStyle += "@media only screen and (max-width: 1440px) {.eltdf-image-carousel." + itemClass + " .eltdf-ic-image { height: " + laptopBig + " !important; } }";
				    }
				    if (size_1366.length) {
					    responsiveStyle += "@media only screen and (max-width: 1366px) {.eltdf-image-carousel." + itemClass + " .eltdf-ic-image { height: " + size_1366 + " !important; } }";
				    }
				    if (laptop.length) {
					    responsiveStyle += "@media only screen and (max-width: 1280px) {.eltdf-image-carousel." + itemClass + " .eltdf-ic-image { height: " + laptop + " !important; } }";
				    }
				    if (ipad.length) {
					    responsiveStyle += "@media only screen and (max-width: 1024px) {.eltdf-image-carousel." + itemClass + " .eltdf-ic-image { height: " + ipad + " !important; } }";
				    }
				    if (mobileBig.length) {
					    responsiveStyle += "@media only screen and (max-width: 600px) {.eltdf-image-carousel." + itemClass + " .eltdf-ic-image { height: " + mobileBig + " !important; } }";
				    }
				    if (mobile.length) {
					    responsiveStyle += "@media only screen and (max-width: 480px) {.eltdf-image-carousel." + itemClass + " .eltdf-ic-image { height: " + mobile + " !important; } }";
				    }
			    }

			    if(responsiveStyle.length) {
				    style = '<style type="text/css" data-type="sweettooth_elated_shortcodes_custom_css">'+responsiveStyle+'</style>';
			    }

			    if(style.length) {
				    $('head').append(style);
            alert('hosafasdfasdfa')
			    }
		    });
	    }
    }

})(jQuery);
(function($) {
    'use strict';

	var imageGallery = {};
	eltdf.modules.imageGallery = imageGallery;

	imageGallery.eltdfInitImageGalleryMasonry = eltdfInitImageGalleryMasonry;


	imageGallery.eltdfOnWindowLoad = eltdfOnWindowLoad;

	$(window).load(eltdfOnWindowLoad);

	/*
	 ** All functions to be called on $(window).load() should be in this function
	 */
	function eltdfOnWindowLoad() {
		eltdfInitImageGalleryMasonry();
	}

	/*
	 ** Init Image Gallery shortcode - Masonry layout
	 */
	function eltdfInitImageGalleryMasonry(){
		var holder = $('.eltdf-image-gallery.eltdf-ig-masonry-type');

		if(holder.length){
			holder.each(function(){
				var thisHolder = $(this),
					masonry = thisHolder.find('.eltdf-ig-masonry');

				masonry.waitForImages(function() {
					masonry.isotope({
						layoutMode: 'packery',
						itemSelector: '.eltdf-ig-image',
						percentPosition: true,
						packery: {
							gutter: '.eltdf-ig-grid-gutter',
							columnWidth: '.eltdf-ig-grid-sizer'
						}
					});

					setTimeout(function() {
						masonry.isotope('layout');
					}, 800);

					masonry.css('opacity', '1');
				});
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var itemShowcase = {};
	eltdf.modules.itemShowcase = itemShowcase;

	itemShowcase.eltdfInitItemShowcase = eltdfInitItemShowcase;


	itemShowcase.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitItemShowcase();
	}

	/**
	 * Init item showcase shortcode
	 */
	function eltdfInitItemShowcase() {
		var itemShowcase = $('.eltdf-item-showcase-holder');

		if (itemShowcase.length) {
			itemShowcase.each(function(){
				var thisItemShowcase = $(this),
					leftItems = thisItemShowcase.find('.eltdf-is-left'),
					rightItems = thisItemShowcase.find('.eltdf-is-right'),
					itemImage = thisItemShowcase.find('.eltdf-is-image');

				//logic
				leftItems.wrapAll( "<div class='eltdf-is-item-holder eltdf-is-left-holder' />");
				rightItems.wrapAll( "<div class='eltdf-is-item-holder eltdf-is-right-holder' />");
				thisItemShowcase.animate({opacity:1},200);

				setTimeout(function(){
					thisItemShowcase.appear(function(){
						itemImage.addClass('eltdf-appeared');
						thisItemShowcase.on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
							function(e) {
								if(eltdf.windowWidth > 1200) {
									itemAppear('.eltdf-is-left-holder .eltdf-is-item');
									itemAppear('.eltdf-is-right-holder .eltdf-is-item');
								} else {
									itemAppear('.eltdf-is-item');
								}
							});
					},{accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
				},100);

				//appear animation trigger
				function itemAppear(itemCSSClass) {
					thisItemShowcase.find(itemCSSClass).each(function(i){
						var thisListItem = $(this);
						setTimeout(function(){
							thisListItem.addClass('eltdf-appeared');
						}, i*150);
					});
				}
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var pieChart = {};
	eltdf.modules.pieChart = pieChart;

	pieChart.eltdfInitPieChart = eltdfInitPieChart;


	pieChart.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitPieChart();
	}

	/**
	 * Init Pie Chart shortcode
	 */
	function eltdfInitPieChart() {
		var pieChartHolder = $('.eltdf-pie-chart-holder');

		if (pieChartHolder.length) {
			pieChartHolder.each(function () {
				var thisPieChartHolder = $(this),
					pieChart = thisPieChartHolder.children('.eltdf-pc-percentage'),
					barColor = '#25abd1',
					trackColor = '#f7f7f7',
					lineWidth = 3,
					size = 176;

				if(typeof pieChart.data('size') !== 'undefined' && pieChart.data('size') !== '') {
					size = pieChart.data('size');
				}

				if(typeof pieChart.data('bar-color') !== 'undefined' && pieChart.data('bar-color') !== '') {
					barColor = pieChart.data('bar-color');
				}

				if(typeof pieChart.data('track-color') !== 'undefined' && pieChart.data('track-color') !== '') {
					trackColor = pieChart.data('track-color');
				}

				pieChart.appear(function() {
					initToCounterPieChart(pieChart);
					thisPieChartHolder.css('opacity', '1');

					pieChart.easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: lineWidth,
						animate: 1500,
						size: size
					});
				},{accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
			});
		}
	}

	/*
	 **	Counter for pie chart number from zero to defined number
	 */
	function initToCounterPieChart(pieChart){
		var counter = pieChart.find('.eltdf-pc-percent'),
			max = parseFloat(counter.text());

		counter.countTo({
			from: 0,
			to: max,
			speed: 1500,
			refreshInterval: 50
		});
	}

})(jQuery);
(function($) {
	'use strict';

	var progressBar = {};
	eltdf.modules.progressBar = progressBar;

	progressBar.eltdfInitProgressBars = eltdfInitProgressBars;


	progressBar.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitProgressBars();
	}

	/*
	 **	Horizontal progress bars shortcode
	 */
	function eltdfInitProgressBars(){
		var progressBar = $('.eltdf-progress-bar');

		if(progressBar.length){
			progressBar.each(function() {
				var thisBar = $(this),
					thisBarContent = thisBar.find('.eltdf-pb-content'),
					percentage = thisBarContent.data('percentage');

				thisBar.appear(function() {
					eltdfInitToCounterProgressBar(thisBar, percentage);

					thisBarContent.css('width', '0%');
					thisBarContent.animate({'width': percentage+'%'}, 2000);
				});
			});
		}
	}

	/*
	 **	Counter for horizontal progress bars percent from zero to defined percent
	 */
	function eltdfInitToCounterProgressBar(progressBar, $percentage){
		var percentage = parseFloat($percentage),
			percent = progressBar.find('.eltdf-pb-percent');

		if(percent.length) {
			percent.each(function() {
				var thisPercent = $(this);
				thisPercent.css('opacity', '1');

				thisPercent.countTo({
					from: 0,
					to: percentage,
					speed: 2000,
					refreshInterval: 50
				});
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var stackedImages = {};
	eltdf.modules.stackedImages = stackedImages;

	stackedImages.eltdfInitItemShowcase = eltdfInitStackedImages;


	stackedImages.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitStackedImages();
	}

	/**
	 * Init item showcase shortcode
	 */
	function eltdfInitStackedImages() {
		var stackedImages = $('.eltdf-stacked-images-holder');

		if (stackedImages.length) {
			stackedImages.each(function(){
				var thisStackedImages = $(this),
					itemImage = thisStackedImages.find('.eltdf-si-images');

				//logic
				thisStackedImages.animate({opacity:1},200);

				setTimeout(function(){
					thisStackedImages.appear(function(){
						itemImage.addClass('eltdf-appeared');
					},{accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
				},100);
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var tabs = {};
	eltdf.modules.tabs = tabs;

	tabs.eltdfInitTabs = eltdfInitTabs;


	tabs.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitTabs();
	}

	/*
	 **	Init tabs shortcode
	 */
	function eltdfInitTabs(){
		var tabs = $('.eltdf-tabs');

		if(tabs.length){
			tabs.each(function(){
				var thisTabs = $(this);

				thisTabs.children('.eltdf-tab-container').each(function(index){
					index = index + 1;
					var that = $(this),
						link = that.attr('id'),
						navItem = that.parent().find('.eltdf-tabs-nav li:nth-child('+index+') a'),
						navLink = navItem.attr('href');

					link = '#'+link;

					if(link.indexOf(navLink) > -1) {
						navItem.attr('href',link);
					}
				});

				thisTabs.tabs();
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';

	var verticalSplitSlider = {};
	eltdf.modules.verticalSplitSlider = verticalSplitSlider;

	verticalSplitSlider.eltdfInitVerticalSplitSlider = eltdfInitVerticalSplitSlider;


	verticalSplitSlider.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitVerticalSplitSlider();
	}

	/*
	 **	Vertical Split Slider
	 */
	function eltdfInitVerticalSplitSlider() {
		var slider = $('.eltdf-vertical-split-slider');

		if (slider.length) {
			if (eltdf.body.hasClass('eltdf-vss-initialized')) {
				eltdf.body.removeClass('eltdf-vss-initialized');
				$.fn.multiscroll.destroy();
			}

			slider.height(eltdf.windowHeight).animate({opacity: 1}, 300);

			var defaultHeaderStyle = '';
			if (eltdf.body.hasClass('eltdf-light-header')) {
				defaultHeaderStyle = 'light';
			} else if (eltdf.body.hasClass('eltdf-dark-header')) {
				defaultHeaderStyle = 'dark';
			}

			slider.multiscroll({
				scrollingSpeed: 700,
				easing: 'easeInOutQuart',
				navigation: true,
				useAnchorsOnLoad: false,
				sectionSelector: '.eltdf-vss-ms-section',
				leftSelector: '.eltdf-vss-ms-left',
				rightSelector: '.eltdf-vss-ms-right',
				afterRender: function () {
					eltdfCheckVerticalSplitSectionsForHeaderStyle($('.eltdf-vss-ms-left .eltdf-vss-ms-section:last-child').data('header-style'), defaultHeaderStyle);
					eltdf.body.addClass('eltdf-vss-initialized');

					var contactForm7 = $('div.wpcf7 > form');
					if(contactForm7.length) {
						contactForm7.each(function(){
							var thisForm = $(this);

							thisForm.find('.wpcf7-submit').off().on('click', function(e){
								e.preventDefault();
								wpcf7.submit(thisForm);
							});
						});
					} // this function need to be initialized after initVerticalSplitSlide

					//prepare html for smaller screens - start //
					var verticalSplitSliderResponsive = $('<div class="eltdf-vss-responsive"></div>'),
						leftSide = slider.find('.eltdf-vss-ms-left > div'),
						rightSide = slider.find('.eltdf-vss-ms-right > div');

					slider.after(verticalSplitSliderResponsive);

					for (var i = 0; i < leftSide.length; i++) {
						verticalSplitSliderResponsive.append($(leftSide[i]).clone(true));
						verticalSplitSliderResponsive.append($(rightSide[leftSide.length - 1 - i]).clone(true));
					}

					//prepare google maps clones
					var googleMapHolder = $('.eltdf-vss-responsive .eltdf-google-map');
					if (googleMapHolder.length) {
						googleMapHolder.each(function () {
							var map = $(this);
							map.empty();
							var num = Math.floor((Math.random() * 100000) + 1);
							map.attr('id', 'eltdf-map-' + num);
							map.data('unique-id', num);
						});
					}

					if (typeof eltdf.modules.button.eltdfButton === "function") {
						eltdf.modules.button.eltdfButton().init();
					}

					if (typeof eltdf.modules.elementsHolder.eltdfInitElementsHolderResponsiveStyle === "function") {
						eltdf.modules.elementsHolder.eltdfInitElementsHolderResponsiveStyle();
					}

					if (typeof eltdf.modules.googleMap.eltdfShowGoogleMap === "function") {
						eltdf.modules.googleMap.eltdfShowGoogleMap();
					}

					if (typeof eltdf.modules.icon.eltdfIcon === "function") {
						eltdf.modules.icon.eltdfIcon().init();
					}

					if (typeof eltdf.modules.progressBar.eltdfInitProgressBars === "function") {
						eltdf.modules.progressBar.eltdfInitProgressBars();
					}
				},
				onLeave: function (index, nextIndex, direction) {
					eltdfCheckVerticalSplitSectionsForHeaderStyle($($('.eltdf-vss-ms-left .eltdf-vss-ms-section')[$(".eltdf-vss-ms-left .eltdf-vss-ms-section").length - nextIndex]).data('header-style'), defaultHeaderStyle);
				}
			});

			if (eltdf.windowWidth <= 1024) {
				$.fn.multiscroll.destroy();
			} else {
				$.fn.multiscroll.build();
			}

			$(window).resize(function () {
				if (eltdf.windowWidth <= 1024) {
					$.fn.multiscroll.destroy();
				} else {
					$.fn.multiscroll.build();
				}
			});
		}
	}

	/*
	 **	Check slides on load and slide change for header style changing
	 */
	function eltdfCheckVerticalSplitSectionsForHeaderStyle(section_header_style, default_header_style) {
		if (section_header_style !== undefined && section_header_style !== '') {
			eltdf.body.removeClass('eltdf-light-header eltdf-dark-header').addClass('eltdf-' + section_header_style + '-header');
		} else if (default_header_style !== '') {
			eltdf.body.removeClass('eltdf-light-header eltdf-dark-header').addClass('eltdf-' + default_header_style + '-header');
		} else {
			eltdf.body.removeClass('eltdf-light-header eltdf-dark-header');
		}
	}

})(jQuery);
(function($) {
    'use strict';

	var masonryGallery = {};
	eltdf.modules.masonryGallery = masonryGallery;

	masonryGallery.eltdfInitMasonryGallery = eltdfInitMasonryGallery;


	masonryGallery.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitMasonryGallery();
	}

	/**
	 * Masonry gallery, init masonry and resize pictures in grid
	 */
	function eltdfInitMasonryGallery(){
		var galleryHolder = $('.eltdf-masonry-gallery-holder'),
			gallery = galleryHolder.children('.eltdf-mg-inner'),
			gallerySizer = gallery.children('.eltdf-mg-grid-sizer');

		resizeMasonryGallery(gallerySizer.outerWidth(), gallery);

		if(galleryHolder.length){
			galleryHolder.each(function(){
				var holder = $(this),
					holderGallery = holder.children('.eltdf-mg-inner');

				holderGallery.waitForImages(function(){
					holderGallery.animate({opacity:1});

					holderGallery.isotope({
						layoutMode: 'packery',
						itemSelector: '.eltdf-mg-item',
						percentPosition: true,
						packery: {
							gutter: '.eltdf-mg-grid-gutter',
							columnWidth: '.eltdf-mg-grid-sizer'
						}
					});
				});
			});

			$(window).resize(function(){
				resizeMasonryGallery(gallerySizer.outerWidth(), gallery);

				gallery.isotope('reloadItems');
			});
		}
	}

	function resizeMasonryGallery(size, holder){
		var rectangle_portrait = holder.find('.eltdf-mg-rectangle-portrait'),
			rectangle_landscape = holder.find('.eltdf-mg-rectangle-landscape'),
			square_big = holder.find('.eltdf-mg-square-big'),
			square_small = holder.find('.eltdf-mg-square-small');

		rectangle_portrait.css('height', 2*size);

		if (window.innerWidth <= 680) {
			rectangle_landscape.css('height', size/2);
		} else {
			rectangle_landscape.css('height', size);
		}

		square_big.css('height', 2*size);

		if (window.innerWidth <= 680) {
			square_big.css('height', square_big.width());
		}

		square_small.css('height', size);
	}

})(jQuery);
(function($) {
    'use strict';

    var portfolio = {};
    eltdf.modules.portfolio = portfolio;

    portfolio.eltdfOnWindowLoad = eltdfOnWindowLoad;
    portfolio.eltdfOnWindowResize = eltdfOnWindowResize;
    portfolio.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function eltdfOnWindowLoad() {
        eltdfInitPortfolioMasonry();
        eltdfInitPortfolioFilter();
        initPortfolioSingleMasonry();
        eltdfInitPortfolioListAnimation();
	    eltdfInitPortfolioPagination().init();
        eltdfPortfolioSingleFollow().init();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function eltdfOnWindowResize() {
        eltdfInitPortfolioMasonry();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function eltdfOnWindowScroll() {
	    eltdfInitPortfolioPagination().scroll();
    }

    /**
     * Initializes portfolio list article animation
     */
    function eltdfInitPortfolioListAnimation(){
        var portList = $('.eltdf-portfolio-list-holder.eltdf-pl-has-animation');

        if(portList.length){
            portList.each(function(){
                var thisPortList = $(this).children('.eltdf-pl-inner');

                thisPortList.children('article').each(function(l) {
                    var thisArticle = $(this);

                    thisArticle.appear(function() {
                        thisArticle.addClass('eltdf-item-show');

                        setTimeout(function(){
                            thisArticle.addClass('eltdf-item-shown');
                        }, 1000);
                    },{accX: 0, accY: 0});
                });
            });
        }
    }

    /**
     * Initializes portfolio list
     */
    function eltdfInitPortfolioMasonry(){
        var portList = $('.eltdf-portfolio-list-holder.eltdf-pl-masonry');

        if(portList.length){
            portList.each(function(){
                var thisPortList = $(this),
                    masonry = thisPortList.children('.eltdf-pl-inner'),
                    size = thisPortList.find('.eltdf-pl-grid-sizer').width();

                eltdfResizePortfolioItems(size, thisPortList);

                masonry.isotope({
                    layoutMode: 'packery',
                    itemSelector: 'article',
                    percentPosition: true,
                    packery: {
                        gutter: '.eltdf-pl-grid-gutter',
                        columnWidth: '.eltdf-pl-grid-sizer'
                    }
                });

                setTimeout(function () {
	                eltdf.modules.common.eltdfInitParallax();
                });

                masonry.css('opacity', '1');
            });
        }
    }

    /**
     * Init Resize Portfolio Items
     */
    function eltdfResizePortfolioItems(size,container){
        if(container.hasClass('eltdf-pl-images-fixed')) {
            var padding = parseInt(container.find('article').css('padding-left')),
                defaultMasonryItem = container.find('.eltdf-pl-masonry-default'),
                largeWidthMasonryItem = container.find('.eltdf-pl-masonry-large-width'),
                largeHeightMasonryItem = container.find('.eltdf-pl-masonry-large-height'),
                largeWidthHeightMasonryItem = container.find('.eltdf-pl-masonry-large-width-height');

            if (eltdf.windowWidth > 680) {
                defaultMasonryItem.css('height', size - 2 * padding);
                largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthMasonryItem.css('height', size - 2 * padding);
            } else {
                defaultMasonryItem.css('height', size);
                largeHeightMasonryItem.css('height', size);
                largeWidthHeightMasonryItem.css('height', size);
                largeWidthMasonryItem.css('height', Math.round(size / 2));
            }
        }
    }

    /**
     * Initializes portfolio masonry filter
     */
    function eltdfInitPortfolioFilter(){
        var filterHolder = $('.eltdf-portfolio-list-holder .eltdf-pl-filter-holder');

        if(filterHolder.length){
            filterHolder.each(function(){
                var thisFilterHolder = $(this),
                    thisPortListHolder = thisFilterHolder.closest('.eltdf-portfolio-list-holder'),
                    thisPortListInner = thisPortListHolder.find('.eltdf-pl-inner'),
                    portListHasLoadMore = thisPortListHolder.hasClass('eltdf-pl-pag-load-more') ? true : false;

                thisFilterHolder.find('.eltdf-pl-filter:first').addClass('eltdf-pl-current');

	            if(thisPortListHolder.hasClass('eltdf-pl-gallery')) {
		            thisPortListInner.isotope();
	            }

                thisFilterHolder.find('.eltdf-pl-filter').click(function(){
                    var thisFilter = $(this),
                        filterValue = thisFilter.attr('data-filter'),
                        filterClassName = filterValue.length ? filterValue.substring(1) : '',
                        portListHasArtciles = thisPortListInner.children().hasClass(filterClassName) ? true : false;

                    thisFilter.parent().children('.eltdf-pl-filter').removeClass('eltdf-pl-current');
                    thisFilter.addClass('eltdf-pl-current');

                    if(portListHasLoadMore && !portListHasArtciles) {
                        eltdfInitLoadMoreItemsPortfolioFilter(thisPortListHolder, filterValue, filterClassName);
                    } else {
                        thisFilterHolder.parent().children('.eltdf-pl-inner').isotope({ filter: filterValue });
	                    eltdf.modules.common.eltdfInitParallax();
                    }
                });
            });
        }
    }

    /**
     * Initializes load more items if portfolio masonry filter item is empty
     */
    function eltdfInitLoadMoreItemsPortfolioFilter($portfolioList, $filterValue, $filterClassName) {
        var thisPortList = $portfolioList,
            thisPortListInner = thisPortList.find('.eltdf-pl-inner'),
            filterValue = $filterValue,
            filterClassName = $filterClassName,
            maxNumPages = 0;

        if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
            maxNumPages = thisPortList.data('max-num-pages');
        }

        var	loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisPortList),
            nextPage = loadMoreDatta.nextPage,
	        ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'eltdf_core_portfolio_ajax_load_more'),
            loadingItem = thisPortList.find('.eltdf-pl-loading');

        if(nextPage <= maxNumPages) {
            loadingItem.addClass('eltdf-showing eltdf-filter-trigger');
            thisPortListInner.css('opacity', '0');

            $.ajax({
                type: 'POST',
                data: ajaxData,
                url: eltdfGlobalVars.vars.eltdfAjaxUrl,
                success: function (data) {
                    nextPage++;
                    thisPortList.data('next-page', nextPage);
                    var response = $.parseJSON(data),
                        responseHtml = response.html;

                    thisPortList.waitForImages(function () {
                        thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
                        var portListHasArtciles = !!thisPortListInner.children().hasClass(filterClassName);

                        if(portListHasArtciles) {
                            setTimeout(function() {
                                eltdfResizePortfolioItems(thisPortListInner.find('.eltdf-pl-masonry-grid-sizer').width(), thisPortList);
                                thisPortListInner.isotope('layout').isotope({filter: filterValue});
                                loadingItem.removeClass('eltdf-showing eltdf-filter-trigger');

                                setTimeout(function() {
                                    thisPortListInner.css('opacity', '1');
	                                eltdfInitPortfolioListAnimation();
	                                eltdf.modules.common.eltdfInitParallax();
                                }, 150);
                            }, 400);
                        } else {
                            loadingItem.removeClass('eltdf-showing eltdf-filter-trigger');
                            eltdfInitLoadMoreItemsPortfolioFilter(thisPortList, filterValue, filterClassName);
                        }
                    });
                }
            });
        }
    }

	/**
	 * Initializes portfolio pagination functions
	 */
	function eltdfInitPortfolioPagination(){
		var portList = $('.eltdf-portfolio-list-holder');

		var initStandardPagination = function(thisPortList) {
			var standardLink = thisPortList.find('.eltdf-pl-standard-pagination li');

			if(standardLink.length) {
				standardLink.each(function(){
					var thisLink = $(this).children('a'),
						pagedLink = 1;

					thisLink.on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();

						if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
							pagedLink = thisLink.data('paged');
						}

						initMainPagFunctionality(thisPortList, pagedLink);
					});
				});
			}
		};

		var initLoadMorePagination = function(thisPortList) {
			var loadMoreButton = thisPortList.find('.eltdf-pl-load-more a');

			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();

				initMainPagFunctionality(thisPortList);
			});
		};

		var initInifiteScrollPagination = function(thisPortList) {
			var portListHeight = thisPortList.outerHeight(),
				portListTopOffest = thisPortList.offset().top,
				portListPosition = portListHeight + portListTopOffest - eltdfGlobalVars.vars.eltdfAddForAdminBar;

			if(!thisPortList.hasClass('eltdf-pl-infinite-scroll-started') && eltdf.scroll + eltdf.windowHeight > portListPosition) {
				initMainPagFunctionality(thisPortList);
			}
		};

		var initMainPagFunctionality = function(thisPortList, pagedLink) {
			var thisPortListInner = thisPortList.find('.eltdf-pl-inner'),
				nextPage,
				maxNumPages;

			if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
				maxNumPages = thisPortList.data('max-num-pages');
			}

			if(thisPortList.hasClass('eltdf-pl-pag-standard')) {
				thisPortList.data('next-page', pagedLink);
			}

			if(thisPortList.hasClass('eltdf-pl-pag-infinite-scroll')) {
				thisPortList.addClass('eltdf-pl-infinite-scroll-started');
			}

			var loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisPortList),
				loadingItem = thisPortList.find('.eltdf-pl-loading');

			nextPage = loadMoreDatta.nextPage;

			if(nextPage <= maxNumPages){
				if(thisPortList.hasClass('eltdf-pl-pag-standard')) {
					loadingItem.addClass('eltdf-showing eltdf-standard-pag-trigger');
					thisPortList.addClass('eltdf-pl-pag-standard-animate');
				} else {
					loadingItem.addClass('eltdf-showing');
				}

				var ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'eltdf_core_portfolio_ajax_load_more');

				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: eltdfGlobalVars.vars.eltdfAjaxUrl,
					success: function (data) {
						if(!thisPortList.hasClass('eltdf-pl-pag-standard')) {
							nextPage++;
						}

						thisPortList.data('next-page', nextPage);

						var response = $.parseJSON(data),
							responseHtml =  response.html;

						if(thisPortList.hasClass('eltdf-pl-pag-standard')) {
							eltdfInitStandardPaginationLinkChanges(thisPortList, maxNumPages, nextPage);

							thisPortList.waitForImages(function(){
								if(thisPortList.hasClass('eltdf-pl-masonry')){
                                    eltdfResizePortfolioItems(thisPortListInner.find('.eltdf-pl-masonry-grid-sizer').width(), thisPortList);
									eltdfInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else if (thisPortList.hasClass('eltdf-pl-gallery') && thisPortList.hasClass('eltdf-pl-has-filter')) {
									eltdfInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else {
									eltdfInitHtmlGalleryNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								}
							});
						} else {
							thisPortList.waitForImages(function(){
								if(thisPortList.hasClass('eltdf-pl-masonry')){
									eltdfInitAppendIsotopeNewContent(thisPortListInner, loadingItem, responseHtml);
								} else if (thisPortList.hasClass('eltdf-pl-gallery') && thisPortList.hasClass('eltdf-pl-has-filter')) {
									eltdfInitAppendIsotopeNewContent(thisPortListInner, loadingItem, responseHtml);
								} else {
									eltdfInitAppendGalleryNewContent(thisPortListInner, loadingItem, responseHtml);
								}
							});
						}

						if(thisPortList.hasClass('eltdf-pl-infinite-scroll-started')) {
							thisPortList.removeClass('eltdf-pl-infinite-scroll-started');
						}
					}
				});
			}

			if(nextPage === maxNumPages){
				thisPortList.find('.eltdf-pl-load-more-holder').hide();
			}
		};

		var eltdfInitStandardPaginationLinkChanges = function(thisPortList, maxNumPages, nextPage) {
			var standardPagHolder = thisPortList.find('.eltdf-pl-standard-pagination'),
				standardPagNumericItem = standardPagHolder.find('li.eltdf-pl-pag-number'),
				standardPagPrevItem = standardPagHolder.find('li.eltdf-pl-pag-prev a'),
				standardPagNextItem = standardPagHolder.find('li.eltdf-pl-pag-next a');

			standardPagNumericItem.removeClass('eltdf-pl-pag-active');
			standardPagNumericItem.eq(nextPage-1).addClass('eltdf-pl-pag-active');

			standardPagPrevItem.data('paged', nextPage-1);
			standardPagNextItem.data('paged', nextPage+1);

			if(nextPage > 1) {
				standardPagPrevItem.css({'opacity': '1'});
			} else {
				standardPagPrevItem.css({'opacity': '0'});
			}

			if(nextPage === maxNumPages) {
				standardPagNextItem.css({'opacity': '0'});
			} else {
				standardPagNextItem.css({'opacity': '1'});
			}
		};

		var eltdfInitHtmlIsotopeNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
			thisPortListInner.html(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('eltdf-showing eltdf-standard-pag-trigger');
			thisPortList.removeClass('eltdf-pl-pag-standard-animate');

			setTimeout(function() {
				thisPortListInner.isotope('layout');
				eltdfInitPortfolioListAnimation();
				eltdf.modules.common.eltdfInitParallax();
			}, 400);
		};

		var eltdfInitHtmlGalleryNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltdf-showing eltdf-standard-pag-trigger');
			thisPortList.removeClass('eltdf-pl-pag-standard-animate');
			thisPortListInner.html(responseHtml);
			eltdfInitPortfolioListAnimation();
			eltdf.modules.common.eltdfInitParallax();
		};

		var eltdfInitAppendIsotopeNewContent = function(thisPortListInner, loadingItem, responseHtml) {
			thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('eltdf-showing');

			setTimeout(function() {
				thisPortListInner.isotope('layout');
				eltdfInitPortfolioListAnimation();
				eltdf.modules.common.eltdfInitParallax();
			}, 400);
		};

		var eltdfInitAppendGalleryNewContent = function(thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltdf-showing');
			thisPortListInner.append(responseHtml);
			eltdfInitPortfolioListAnimation();
			eltdf.modules.common.eltdfInitParallax();
		};

		return {
			init: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);

						if(thisPortList.hasClass('eltdf-pl-pag-standard')) {
							initStandardPagination(thisPortList);
						}

						if(thisPortList.hasClass('eltdf-pl-pag-load-more')) {
							initLoadMorePagination(thisPortList);
						}

						if(thisPortList.hasClass('eltdf-pl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisPortList);
						}
					});
				}
			},
			scroll: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);

						if(thisPortList.hasClass('eltdf-pl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisPortList);
						}
					});
				}
			}
		};
	}

	var eltdfPortfolioSingleFollow = function() {
		var info = $('.eltdf-follow-portfolio-info .eltdf-portfolio-single-holder .eltdf-ps-info-sticky-holder');

		if (info.length) {
			var infoHolder = info.parent(),
				infoHolderOffset = infoHolder.offset().top,
				infoHolderHeight = infoHolder.height(),
				mediaHolder = $('.eltdf-ps-image-holder'),
				mediaHolderHeight = mediaHolder.height(),
				header = $('.header-appear, .eltdf-fixed-wrapper'),
				headerHeight = (header.length) ? header.height() : 0;
		}

		var infoHolderPosition = function() {
			if(info.length) {
				if (mediaHolderHeight > infoHolderHeight) {
					if(eltdf.scroll > infoHolderOffset) {
						var marginTop = eltdf.scroll - infoHolderOffset + eltdfGlobalVars.vars.eltdfAddForAdminBar + headerHeight;
						// if scroll is initially positioned below mediaHolderHeight
						if(marginTop + infoHolderHeight > mediaHolderHeight){
							marginTop = mediaHolderHeight - infoHolderHeight;
						}
						info.stop().animate({
							marginTop: marginTop
						});
					}
				}
			}
		};

		var recalculateInfoHolderPosition = function() {
			if (info.length) {
				if(mediaHolderHeight > infoHolderHeight) {
					if(eltdf.scroll > infoHolderOffset) {

						if(eltdf.scroll + headerHeight + eltdfGlobalVars.vars.eltdfAddForAdminBar + infoHolderHeight + 50 < infoHolderOffset + mediaHolderHeight) { //50 to prevent mispositioning

							//Calculate header height if header appears
							if ($('.header-appear, .eltdf-fixed-wrapper').length) {
								headerHeight = $('.header-appear, .eltdf-fixed-wrapper').height();
							}
							info.stop().animate({
								marginTop: (eltdf.scroll - infoHolderOffset + eltdfGlobalVars.vars.eltdfAddForAdminBar + headerHeight)
							});
							//Reset header height
							headerHeight = 0;
						}
						else{
							info.stop().animate({
								marginTop: mediaHolderHeight - infoHolderHeight
							});
						}
					} else {
						info.stop().animate({
							marginTop: 0
						});
					}
				}
			}
		};

		return {
			init : function() {
				infoHolderPosition();
				$(window).scroll(function(){
					recalculateInfoHolderPosition();
				});
			}
		};
	};

	function initPortfolioSingleMasonry(){
		var masonryHolder = $('.eltdf-portfolio-single-holder .eltdf-ps-masonry-images'),
			masonry = masonryHolder.children();

		if(masonry.length){
            masonry.isotope({
                layoutMode: 'packery',
                itemSelector: '.eltdf-ps-image',
                percentPosition: true,
                packery: {
                    gutter: '.eltdf-ps-grid-gutter',
                    columnWidth: '.eltdf-ps-grid-sizer'
                }
            });

            masonry.css('opacity', '1');
		}
	}

})(jQuery);
(function($) {
    'use strict';

    var woocommerce = {};
    eltdf.modules.woocommerce = woocommerce;

    woocommerce.eltdfOnDocumentReady = eltdfOnDocumentReady;
    woocommerce.eltdfOnWindowLoad = eltdfOnWindowLoad;
    woocommerce.eltdfOnWindowResize = eltdfOnWindowResize;
    woocommerce.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);

    /*
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdfInitQuantityButtons();
        eltdfInitSelect2();
	    eltdfInitSingleProductLightbox();
	    eltdfInitSingleProductImageSwitchLogic();
	    eltdfInitButtonLoading();
    }

    /*
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {
        eltdfInitProductListMasonryShortcode();
    }

    /*
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
        eltdfInitProductListMasonryShortcode();
    }

    /*
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {}

    /*
    ** Init quantity buttons to increase/decrease products for cart
    */
    function eltdfInitQuantityButtons() {

        $(document).on( 'click', '.eltdf-quantity-minus, .eltdf-quantity-plus', function(e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.siblings('.eltdf-quantity-input'),
                step = parseFloat(inputField.data('step')),
                max = parseFloat(inputField.data('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('eltdf-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(0);
                }
            } else {
                newInputValue = inputValue + step;
                if ( max === undefined ) {
                    inputField.val(newInputValue);
                } else {
                    if ( newInputValue >= max ) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }

            inputField.trigger( 'change' );
        });
    }

    /*
    ** Init select2 script for select html dropdowns
    */
    function eltdfInitSelect2() {
    	var orderByDropDown = $('.woocommerce-ordering .orderby');
        if (orderByDropDown.length) {
	        orderByDropDown.select2({
                minimumResultsForSearch: Infinity
            });
        }

        var shippingCountryCalc = $('#calc_shipping_country');
        if(shippingCountryCalc.length) {
	        shippingCountryCalc.select2();
        }

	    var shippingStateCalc = $('.cart-collaterals .shipping select#calc_shipping_state');
	    if(shippingStateCalc.length) {
		    shippingStateCalc.select2();
	    }
    }

	/*
	 ** Init switch image logic for thumbnail and featured images on product single page
	 */
	function eltdfInitSingleProductImageSwitchLogic() {
		if(eltdf.body.hasClass('eltdf-woo-single-switch-image')){

			var thumbnailImage = $('.eltdf-woo-single-page .product .images .thumbnails > a'),
				featuredImage = $('.eltdf-woo-single-page .product .images .woocommerce-main-image');

			if(featuredImage.length) {
				featuredImage.on('click', function() {
					if($('div.pp_overlay').length) {
						$.prettyPhoto.close();
					}
					if(eltdf.body.hasClass('eltdf-disable-thumbnail-prettyphoto')){
						eltdf.body.removeClass('eltdf-disable-thumbnail-prettyphoto');
					}
					if(featuredImage.children('.eltdf-fake-featured-image').length){
						$('.eltdf-fake-featured-image').stop().animate({'opacity': '0'}, 300, function() {
							$(this).remove();
						});
					}
				});
			}

			if(thumbnailImage.length) {
				thumbnailImage.each(function(){
					var thisThumbnailImage = $(this),
						thisThumbnailImageSrc = thisThumbnailImage.attr('href');

					thisThumbnailImage.on('click', function() {
						if(!eltdf.body.hasClass('eltdf-disable-thumbnail-prettyphoto')){
							eltdf.body.addClass('eltdf-disable-thumbnail-prettyphoto');
						}

						if($('div.pp_overlay').length) {
							$.prettyPhoto.close();
						}
						if(thisThumbnailImageSrc !== '' && featuredImage !== '') {
							if (featuredImage.children('.eltdf-fake-featured-image').length) {
								$('.eltdf-fake-featured-image').remove();
							}
							featuredImage.append('<img itemprop="image" class="eltdf-fake-featured-image" src="' + thisThumbnailImageSrc + '" />');
						}
					});
				});
			}
		}
	}

	function eltdfInitSingleProductLightbox() {
		var item = $('.eltdf-woo-single-page .eltdf-single-product-content .images .woocommerce-product-gallery__image');

		if(item.length) {
			item.each(function() {
				var thisItem = $(this).children('a');

				thisItem.attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');

				if (typeof eltdf.modules.common.eltdfPrettyPhoto === "function") {
					eltdf.modules.common.eltdfPrettyPhoto();
				}
			});
		}
	}

	/*
	 ** Init Product List Masonry Shortcode Layout
	 */
	function eltdfInitProductListMasonryShortcode() {
		var container = $('.eltdf-pl-holder.eltdf-masonry-layout .eltdf-pl-outer');

		if(container.length) {
			container.each(function(){
				var thisContainer = $(this);

				thisContainer.waitForImages(function() {
					thisContainer.isotope({
						itemSelector: '.eltdf-pli',
						resizable: false,
						masonry: {
							columnWidth: '.eltdf-pl-sizer',
							gutter: '.eltdf-pl-gutter'
						}
					});

					thisContainer.isotope('layout');

					thisContainer.css('opacity', 1);
				});
			});
		}
	}

	function eltdfInitButtonLoading() {
        $(".add_to_cart_button").click(function(){
            $(this).text(eltdfGlobalVars.vars.eltdfAddingToCart);
        });
    }

})(jQuery);
