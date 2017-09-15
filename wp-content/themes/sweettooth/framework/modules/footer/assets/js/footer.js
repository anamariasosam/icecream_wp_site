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