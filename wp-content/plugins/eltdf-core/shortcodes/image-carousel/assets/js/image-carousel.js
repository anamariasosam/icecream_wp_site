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
			    }
		    });
	    }
    }

})(jQuery);