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