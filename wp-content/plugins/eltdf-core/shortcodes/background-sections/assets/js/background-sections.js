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