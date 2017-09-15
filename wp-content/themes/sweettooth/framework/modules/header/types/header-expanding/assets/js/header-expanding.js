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