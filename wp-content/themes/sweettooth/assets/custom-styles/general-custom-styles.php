<?php
if(!function_exists('sweettooth_elated_design_styles')) {
    /**
     * Generates general custom styles
     */
    function sweettooth_elated_design_styles() {
	    $font_family = sweettooth_elated_options()->getOptionValue('google_fonts');
	    if (!empty($font_family) && sweettooth_elated_is_font_option_valid($font_family)){
		    $font_family_selector = array(
			    'body',
			    'h1',
			    'h2',
			    'h3',
			    'h4',
			    'h5',
			    'h6',
			    '.eltdf-main-menu ul li a',
			    '#submit_comment',
			    '.post-password-form input[type=\'submit\']',
			    'input.wpcf7-form-control.wpcf7-submit',
			    '.eltdf-blog-holder article.format-quote .eltdf-quote-author',
			    '.eltdf-blog-holder article.format-quote .eltdf-quote-author-position',
			    '.eltdf-blog-holder article.format-link p.eltdf-post-title a',
			    '.eltdf-blog-holder article.format-link .eltdf-link-text',
			    '.eltdf-blog-pagination ul li a',
			    '.eltdf-mobile-header .eltdf-mobile-nav ul li a',
			    '.eltdf-mobile-header .eltdf-mobile-nav ul li h6',
			    '.widget.widget_search input',
			    '.widget.widget_pages a',
			    '.widget.widget_archive a',
			    '.widget.widget_categories a',
			    '.widget.widget_meta a',
			    '.widget.widget_recent_comments a',
			    '.widget.widget_nav_menu a',
			    '.eltdf-page-footer .widget h1',
			    '.eltdf-page-footer .widget h2',
			    '.eltdf-page-footer .widget h3',
			    '.eltdf-page-footer .widget h4',
			    '.eltdf-page-footer .widget h5',
			    '.eltdf-page-footer .widget h6',
			    '.eltdf-top-bar .widget h1',
			    '.eltdf-top-bar .widget h2',
			    '.eltdf-top-bar .widget h3',
			    '.eltdf-top-bar .widget h4',
			    '.eltdf-top-bar .widget h5',
			    '.eltdf-top-bar .widget h6',
			    '.eltdf-accordion-holder .eltdf-title-holder span.eltdf-tab-title',
			    '.eltdf-btn',
			    '.eltdf-counter-holder .eltdf-counter',
			    '.eltdf-counter-holder p.eltdf-counter-title',
			    '.eltdf-horizontal-timeline .eltdf-events-wrapper .eltdf-events a',
			    '.eltdf-image-with-text-holder p.eltdf-iwt-title',
			    '.eltdf-pie-chart-holder .eltdf-pc-percentage .eltdf-pc-percent',
			    '.eltdf-price-table .eltdf-pt-inner ul li.eltdf-pt-title-holder .eltdf-pt-title',
			    '.eltdf-price-table .eltdf-pt-inner ul li.eltdf-pt-prices',
			    '.eltdf-progress-bar .eltdf-pb-percent',
			    '.eltdf-tabs .eltdf-tabs-nav li a',
			    '.eltdf-tabs.eltdf-tabs-simple .eltdf-tabs-nav li a',
			    '.eltdf-tabs.eltdf-tabs-vertical .eltdf-tabs-nav li a',
			    '.eltdf-portfolio-list-holder article .eltdf-pli-text p.eltdf-pli-title',
			    '.eltdf-portfolio-list-holder article .eltdf-pli-text .eltdf-pli-category-holder',
			    '.eltdf-ps-navigation .eltdf-ps-back-btn a',
			    '.eltdf-ps-navigation .eltdf-ps-prev .eltdf-ps-nav-title',
			    '.eltdf-ps-navigation .eltdf-ps-next .eltdf-ps-nav-title',
			    '.eltdf-ps-navigation .eltdf-ps-prev .eltdf-ps-nav-date',
			    '.eltdf-ps-navigation .eltdf-ps-next .eltdf-ps-nav-date',
			    '.woocommerce-page .eltdf-content a.button',
			    '.woocommerce-page .eltdf-content a.added_to_cart',
			    '.woocommerce-page .eltdf-content input[type="submit"]',
			    '.woocommerce-page .eltdf-content button[type="submit"]',
			    '.woocommerce-page .eltdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
			    'div.woocommerce a.button',
			    'div.woocommerce a.added_to_cart',
			    'div.woocommerce input[type="submit"]',
			    'div.woocommerce button[type="submit"]',
			    'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
			    '.select2-drop .select2-search input',
			    'ul.products > .product .eltdf-pl-inner .eltdf-pl-text-inner .button',
			    'ul.products > .product .eltdf-pl-inner .eltdf-pl-text-inner .added_to_cart',
			    '.eltdf-woo-single-page .related.products .product .eltdf-pl-inner a',
			    '.eltdf-woo-single-page .upsells.products .product .eltdf-pl-inner a',
			    '.eltdf-plc-holder .eltdf-plc-item .button',
			    '.eltdf-plc-holder .eltdf-plc-item .added_to_cart',
			    '.eltdf-plc-holder.eltdf-standard-layout .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-default-skin .button',
			    '.eltdf-pl-holder .eltdf-pli .eltdf-pli-category',
			    '.eltdf-pl-holder .eltdf-pli .eltdf-pli-price',
			    '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart .button',
			    '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart .added_to_cart',
			    '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .button',
			    '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .added_to_cart'
		    );

		    echo sweettooth_elated_dynamic_css($font_family_selector, array('font-family' => sweettooth_elated_get_font_option_val($font_family)));
		}

		$first_main_color = sweettooth_elated_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'a:hover',
	            'p a:hover',
	            '.eltdf-comment-holder .eltdf-comment-text .replay',
				'.eltdf-comment-holder .eltdf-comment-text .comment-reply-link',
				'.eltdf-comment-holder .eltdf-comment-text .comment-edit-link',
	            '.eltdf-comment-holder .eltdf-comment-text #cancel-comment-reply-link',
	            '.eltdf-owl-slider .owl-nav .owl-prev:hover .eltdf-prev-icon',
				'.eltdf-owl-slider .owl-nav .owl-prev:hover .eltdf-next-icon',
				'.eltdf-owl-slider .owl-nav .owl-next:hover .eltdf-prev-icon',
				'.eltdf-owl-slider .owl-nav .owl-next:hover .eltdf-next-icon',
	            '.eltdf-side-menu-button-opener.opened',
				'.eltdf-side-menu-button-opener:hover',
	            'nav.eltdf-fullscreen-menu ul li ul li.current-menu-ancestor > a',
				'nav.eltdf-fullscreen-menu ul li ul li.current-menu-item > a',
	            'nav.eltdf-fullscreen-menu > ul > li.eltdf-active-item > a',
	            '.eltdf-search-page-holder .eltdf-search-page-form .eltdf-form-holder .eltdf-search-submit:hover',
	            '.eltdf-search-page-holder article.sticky .eltdf-post-title a',
	            '.eltdf-search-cover .eltdf-search-close a:hover',
	            '.eltdf-blog-holder article.sticky .eltdf-post-title a',
	            '.eltdf-blog-holder article .eltdf-post-info-bottom > div a:hover',
	            '.eltdf-blog-holder article .eltdf-post-info-bottom .eltdf-post-info-author a:hover',
	            '.eltdf-author-description .eltdf-author-description-text-holder .eltdf-author-name a:hover',
	            '.eltdf-author-description .eltdf-author-description-text-holder .eltdf-author-social-icons a:hover',
	            '.eltdf-blog-pagination ul li.eltdf-pag-prev a',
				'.eltdf-blog-pagination ul li.eltdf-pag-next a',
	            '.eltdf-blog-pagination ul li a:hover',
				'.eltdf-blog-pagination ul li a.eltdf-pag-active',
	            '.eltdf-bl-standard-pagination ul li.eltdf-bl-pag-active a',
	            '.eltdf-blog-single-navigation .eltdf-blog-single-prev:hover',
				'.eltdf-blog-single-navigation .eltdf-blog-single-next:hover',
	            '.eltdf-blog-list-holder .eltdf-bli-info > div a:hover',
	            '.eltdf-blog-list-holder .eltdf-bli-info .eltdf-post-info-author a:hover',
	            '.eltdf-blog-holder.eltdf-blog-single.eltdf-blog-single-standard article .eltdf-post-info-top > div a:hover',
	            '.eltdf-main-menu>ul>li>a',
	            '.widget.widget_rss > h4 .rsswidget:hover',
	            '.widget.widget_search input',
				'.widget.widget_search button',
	            '.widget.widget_search button',
	            '.widget.widget_pages a:hover',
				'.widget.widget_archive a:hover',
				'.widget.widget_categories a:hover',
				'.widget.widget_meta a:hover',
				'.widget.widget_recent_comments a:hover',
				'.widget.widget_nav_menu a:hover',
	            '.widget.widget_tag_cloud a:hover',
	            '.widget.eltdf-blog-list-widget .eltdf-post-info-date a',
	            '.eltdf-page-footer .widget a',
				'.eltdf-top-bar .widget a',
	            '.eltdf-page-footer .widget.widget_search button:hover',
				'.eltdf-top-bar .widget.widget_search button:hover',
	            '.eltdf-page-footer .widget.widget_tag_cloud a:hover',
				'.eltdf-top-bar .widget.widget_tag_cloud a:hover',
	            '.eltdf-page-footer .widget.widget_rss .eltdf-footer-widget-title .rsswidget:hover',
	            '.eltdf-top-bar .widget.widget_rss .eltdf-footer-widget-title .rsswidget:hover',
	            '.eltdf-page-footer .widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-standard li .eltdf-tweet-text a',
	            '.eltdf-top-bar .widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-standard li .eltdf-tweet-text a',
	            '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-standard li .eltdf-tweet-text a:hover',
	            '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-twitter-icon i',
	            '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-tweet-text a',
	            '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-tweet-text span',
	            '.eltdf-main-menu ul li a:hover',
	            '.eltdf-main-menu > ul > li > a',
	            '.eltdf-drop-down .second .inner ul li.current-menu-ancestor > a',
	            '.eltdf-drop-down .second .inner ul li.current-menu-item > a',
	            '.eltdf-drop-down .wide .second .inner > ul > li.current-menu-ancestor > a',
	            '.eltdf-drop-down .wide .second .inner > ul > li.current-menu-item > a',
	            '.eltdf-mobile-header .eltdf-mobile-menu-opener.eltdf-mobile-menu-opened a',
	            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-ancestor > a',
	            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-item > a',
	            '.eltdf-mobile-header .eltdf-mobile-nav .eltdf-grid > ul > li.eltdf-active-item > a',
	            '.eltdf-btn.eltdf-btn-outline',
	            '.eltdf-horizontal-timeline .eltdf-timeline-navigation a.eltdf-prev',
	            '.eltdf-horizontal-timeline .eltdf-timeline-navigation a.eltdf-next',
	            '.eltdf-image-carousel .owl-nav .owl-prev:hover .eltdf-prev-icon',
	            '.eltdf-image-carousel .owl-nav .owl-prev:hover .eltdf-next-icon',
	            '.eltdf-image-carousel .owl-nav .owl-next:hover .eltdf-prev-icon',
	            '.eltdf-image-carousel .owl-nav .owl-next:hover .eltdf-next-icon',
	            '.eltdf-social-share-holder.eltdf-dropdown .eltdf-social-share-dropdown-opener:hover',
	            '.eltdf-team-holder.eltdf-team-info-below-image .eltdf-team-position',
	            '.eltdf-team-holder.eltdf-team-info-below-image .eltdf-team-social-wrapper .eltdf-team-social-holder .eltdf-team-icon .eltdf-icon-element',
	            '.eltdf-team-holder .eltdf-team-social-holder .eltdf-team-icon .eltdf-icon-element:hover',
	            '.eltdf-masonry-gallery-holder .eltdf-mg-item.eltdf-mg-standard .eltdf-mg-item-title',
	            '.eltdf-masonry-gallery-holder .eltdf-mg-item.eltdf-mg-standard .eltdf-mg-item-text',
	            '.eltdf-masonry-gallery-holder .eltdf-mg-item.eltdf-mg-standard:hover .eltdf-mg-item-inner',
	            '.eltdf-masonry-gallery-holder .eltdf-mg-item.eltdf-mg-simple.eltdf-mg-skin-dark .eltdf-mg-item-title',
	            '.eltdf-masonry-gallery-holder .eltdf-mg-item.eltdf-mg-simple.eltdf-mg-skin-dark .eltdf-mg-item-text',
	            '.eltdf-pl-filter-holder ul li.eltdf-pl-current span',
	            '.eltdf-pl-filter-holder ul li:hover span',
	            '.eltdf-pl-standard-pagination ul li.eltdf-pl-pag-active a',
	            '.eltdf-portfolio-list-holder.eltdf-pl-gallery-overlay article .eltdf-pli-text .eltdf-pli-title',
	            '.eltdf-portfolio-list-holder.eltdf-pl-gallery-overlay article .eltdf-pli-text .eltdf-pli-excerpt',
	            '.eltdf-testimonials-holder.eltdf-testimonials-boxed .eltdf-testimonials-author-holder .eltdf-testimonial-author-inner .eltdf-testimonial-author-position',
	            '.eltdf-blog-holder article .eltdf-post-info-bottom>div a:hover',
	            '.eltdf-social-share-holder.eltdf-list li a:hover',
	            '#eltdf-back-to-top>span',
	            '.eltdf-blog-holder article.format-quote .eltdf-post-text-main a:hover',
	            '.eltdf-blog-holder.eltdf-blog-single.eltdf-blog-single-standard article.format-link .eltdf-post-info-bottom a:hover',
	            '.eltdf-ps-navigation .eltdf-ps-back-btn a:hover',
	            '.eltdf-portfolio-single-holder .eltdf-ps-info-holder .eltdf-ps-info-item a:hover',
	            '.eltdf-side-menu a.eltdf-close-side-menu',
	            '.eltdf-btn.eltdf-btn-simple'
            );

            $woo_color_selector = array();
            if(sweettooth_elated_is_woocommerce_installed()) {
                $woo_color_selector = array(
					'.woocommerce-page .eltdf-content .eltdf-quantity-buttons .eltdf-quantity-minus:hover',
	                '.woocommerce-page .eltdf-content .eltdf-quantity-buttons .eltdf-quantity-plus:hover',
	                'div.woocommerce .eltdf-quantity-buttons .eltdf-quantity-minus:hover',
	                'div.woocommerce .eltdf-quantity-buttons .eltdf-quantity-plus:hover',
	                '.eltdf-woo-single-page .eltdf-single-product-summary .product_meta > span a:hover',
	                '.eltdf-shopping-cart-dropdown .eltdf-item-info-holder .remove:hover',
	                '.widget.woocommerce.widget_product_categories ul li a:hover',
	                '.widget.woocommerce.widget_product_search .woocommerce-product-search input',
	                '.widget.woocommerce.widget_product_search .woocommerce-product-search button',
	                '.widget.woocommerce.widget_product_search .woocommerce-product-search button',
	                '.woocommerce .widget_search #searchsubmit',
	                '.eltdf-pl-holder .eltdf-pli .eltdf-pli-category a'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
		        '.eltdf-portfolio-list-holder.eltdf-pl-hover-overlay-background article .eltdf-pli-text .eltdf-pli-category-holder a:hover',
		        '.eltdf-fullscreen-menu-opener:hover',
		        '.eltdf-fullscreen-menu-opener.eltdf-fm-opened',
		        '.eltdf-blog-slider-holder .eltdf-blog-slider-item .eltdf-section-button-holder a:hover',
		        '.eltdf-header-expanding .eltdf-expanding-menu-opener:hover',
		        '.eltdf-header-expanding .eltdf-expanding-menu-opener.eltdf-fm-opened',
		        '.eltdf-btn.eltdf-btn-simple:not(.eltdf-btn-custom-hover-color):hover'
	        );

            $background_color_selector = array(
                '.eltdf-st-loader .pulse',
                '.eltdf-st-loader .double_pulse .double-bounce1',
                '.eltdf-st-loader .double_pulse .double-bounce2',
                '.eltdf-st-loader .cube',
                '.eltdf-st-loader .rotating_cubes .cube1',
                '.eltdf-st-loader .rotating_cubes .cube2',
                '.eltdf-st-loader .stripes > div',
                '.eltdf-st-loader .wave > div',
                '.eltdf-st-loader .two_rotating_circles .dot1',
                '.eltdf-st-loader .two_rotating_circles .dot2',
                '.eltdf-st-loader .five_rotating_circles .container1 > div',
                '.eltdf-st-loader .five_rotating_circles .container2 > div',
                '.eltdf-st-loader .five_rotating_circles .container3 > div',
                '.eltdf-st-loader .atom .ball-1:before',
                '.eltdf-st-loader .atom .ball-2:before',
                '.eltdf-st-loader .atom .ball-3:before',
                '.eltdf-st-loader .atom .ball-4:before',
                '.eltdf-st-loader .clock .ball:before',
                '.eltdf-st-loader .mitosis .ball',
                '.eltdf-st-loader .lines .line1',
                '.eltdf-st-loader .lines .line2',
                '.eltdf-st-loader .lines .line3',
                '.eltdf-st-loader .lines .line4',
                '.eltdf-st-loader .fussion .ball',
                '.eltdf-st-loader .fussion .ball-1',
                '.eltdf-st-loader .fussion .ball-2',
                '.eltdf-st-loader .fussion .ball-3',
                '.eltdf-st-loader .fussion .ball-4',
                '.eltdf-st-loader .wave_circles .ball',
                '.eltdf-st-loader .pulse_circles .ball',
                '#eltdf-back-to-top .eltdf-left-part',
                '#eltdf-back-to-top .eltdf-right-part',
                '#submit_comment:hover',
                '.post-password-form input[type=\'submit\']:hover',
                'input.wpcf7-form-control.wpcf7-submit',
                '#eltdf-back-to-top > span:hover',
	            '#submit_comment:hover',
				'.post-password-form input[type=\'submit\']:hover',
	            'input.wpcf7-form-control.wpcf7-submit:hover',
	            '.eltdf-blog-holder article.format-audio .eltdf-blog-audio-holder .mejs-container .mejs-controls > .mejs-time-rail .mejs-time-total .mejs-time-current',
	            '.eltdf-blog-holder article.format-audio .eltdf-blog-audio-holder .mejs-container .mejs-controls > a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
	            '.eltdf-blog-holder.eltdf-blog-standard article .eltdf-post-info-bottom .eltdf-post-info-comments-holder:hover span:first-child',
	            '.widget #wp-calendar td#today',
	            '.eltdf-accordion-holder.eltdf-ac-boxed .eltdf-title-holder.ui-state-active',
	            '.eltdf-accordion-holder.eltdf-ac-boxed .eltdf-title-holder.ui-state-hover',
	            '#fp-nav ul li a.active',
	            '#fp-nav ul li a:hover',
	            '.eltdf-horizontal-timeline .eltdf-events-wrapper .eltdf-events .eltdf-filling-line',
	            '.eltdf-horizontal-timeline .eltdf-events-wrapper .eltdf-events a .circle-outer',
	            '.no-touch .eltdf-horizontal-timeline .eltdf-events-wrapper .eltdf-events a:hover .circle-outer',
	            '.eltdf-horizontal-timeline .eltdf-events-wrapper .eltdf-events a.selected .circle-outer',
	            '.eltdf-icon-shortcode.eltdf-circle',
	            '.eltdf-icon-shortcode.eltdf-square',
	            '.eltdf-icon-shortcode.eltdf-dropcaps.eltdf-circle',
	            '.eltdf-progress-bar .eltdf-pb-content-holder .eltdf-pb-content',
	            '.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li.ui-state-active a',
	            '.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li.ui-state-hover a',
	            '.eltdf-tabs.eltdf-tabs-boxed .eltdf-tabs-nav li.ui-state-active a',
	            '.eltdf-tabs.eltdf-tabs-boxed .eltdf-tabs-nav li.ui-state-hover a',
	            '.eltdf-testimonials-holder .owl-dots .owl-dot span',
	            '.eltdf-testimonials-holder .owl-dots .owl-dot:hover span',
	            '.eltdf-testimonials-holder .owl-dots .owl-dot.active span',
	            '.eltdf-404-page .eltdf-page-not-found .eltdf-btn',
	            '.eltdf-portfolio-list-holder.eltdf-pl-standard-shader.eltdf-pl-main-color article .eltdf-pli-image:after'
            );

            $woo_background_color_selector = array();
            if(sweettooth_elated_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
	                '.woocommerce-page .eltdf-content a.button:hover',
	                '.woocommerce-page .eltdf-content a.added_to_cart:hover',
	                '.woocommerce-page .eltdf-content input[type="submit"]:hover',
	                '.woocommerce-page .eltdf-content button[type="submit"]:hover',
	                '.woocommerce-page .eltdf-content .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
	                'div.woocommerce a.button:hover',
	                'div.woocommerce a.added_to_cart:hover',
	                'div.woocommerce input[type="submit"]:hover',
	                'div.woocommerce button[type="submit"]:hover',
	                'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
	                '.eltdf-shopping-cart-dropdown .eltdf-cart-bottom .eltdf-view-cart',
	                '.widget.woocommerce.widget_layered_nav ul li.chosen a',
	                '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range',
	                '.widget.woocommerce.widget_product_tag_cloud .tagcloud a:hover',
	                '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-default-skin .added_to_cart:hover',
	                '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-light-skin .button:hover',
	                '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-light-skin .added_to_cart:hover',
	                '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-dark-skin .button:hover',
	                '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-dark-skin .added_to_cart:hover'
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

	        $background_important_selector = array(
	        	'.eltdf-btn.eltdf-btn-solid:not(.eltdf-btn-custom-hover-bg):hover',
		        '.eltdf-btn.eltdf-btn-outline:not(.eltdf-btn-custom-hover-bg):hover'
	        );

            $border_color_selector = array(
                '.eltdf-st-loader .pulse_circles .ball',
	            '.eltdf-404-page .eltdf-page-not-found .eltdf-page-not-found-subtitle:after',
	            '.eltdf-title .eltdf-title-holder .eltdf-title-separator:before',
	            '.eltdf-blog-holder article .eltdf-post-title:before',
	            '.eltdf-author-info-widget .eltdf-aiw-title span:after',
	            '.widget.widget_search form > div',
	            '.eltdf-page-footer .widget .eltdf-widget-title:before',
				'.eltdf-top-bar .widget .eltdf-widget-title:before',
	            '.eltdf-btn.eltdf-btn-outline',
	            '.eltdf-section-title-holder .eltdf-st-title:before',
	            '.eltdf-testimonials-holder.eltdf-testimonials-standard .eltdf-testimonial-title:before',
	            '.eltdf-testimonials-holder .owl-dots .owl-dot span',
	            '.eltdf-testimonials-holder .owl-dots .owl-dot:hover span',
	            '.eltdf-testimonials-holder .owl-dots .owl-dot.active span',
	            '.widget.woocommerce.widget_product_search .woocommerce-product-search div.input-holder',
	            '.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li a',
	            '.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li:last-child a',
	            '.eltdf-blog-holder.eltdf-blog-single.eltdf-blog-single-standard article.format-quote .eltdf-post-text-main .eltdf-post-title:before',
	            '.eltdf-search-page-holder article:after'
            );

	        $border_color_important = array(
		        '.eltdf-btn.eltdf-btn-solid:not(.eltdf-btn-custom-border-hover):hover',
		        '.eltdf-btn.eltdf-btn-outline:not(.eltdf-btn-custom-border-hover):hover',
		        '.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li a'
	        );

            echo sweettooth_elated_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo sweettooth_elated_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo sweettooth_elated_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo sweettooth_elated_dynamic_css($background_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo sweettooth_elated_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
	        echo sweettooth_elated_dynamic_css($border_color_important, array('border-color' => $first_main_color.'!important'));
        }

        $page_background_color = sweettooth_elated_options()->getOptionValue('page_background_color');
		if (!empty($page_background_color)) {
			$background_color_selector = array(
				'.eltdf-wrapper-inner',
				'.eltdf-content'
			);
			echo sweettooth_elated_dynamic_css($background_color_selector, array('background-color' => $page_background_color));
		}

		$selection_color = sweettooth_elated_options()->getOptionValue('selection_color');
		if (!empty($selection_color)) {
			echo sweettooth_elated_dynamic_css('::selection', array('background' => $selection_color));
			echo sweettooth_elated_dynamic_css('::-moz-selection', array('background' => $selection_color));
		}

        $paspartu_style = array();
	    $paspartu_color = sweettooth_elated_options()->getOptionValue('paspartu_color');
        if (!empty($paspartu_color)) {
            $paspartu_style['background-color'] = $paspartu_color;
        }
	
	    $paspartu_width = sweettooth_elated_options()->getOptionValue('paspartu_width');
        if ($paspartu_width !== '') {
            $paspartu_style['padding'] = $paspartu_width.'%';
        }

        echo sweettooth_elated_dynamic_css('.eltdf-paspartu-enabled .eltdf-wrapper', $paspartu_style);
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_design_styles');
}

if(!function_exists('sweettooth_elated_content_styles')) {
    /**
     * Generates content custom styles
     */
    function sweettooth_elated_content_styles() {
        $content_style = array();
	    
	    $padding_top = sweettooth_elated_options()->getOptionValue('content_top_padding');
	    if ($padding_top !== '') {
            $content_style['padding-top'] = sweettooth_elated_filter_px($padding_top).'px';
        }

        $content_selector = array(
            '.eltdf-content .eltdf-content-inner > .eltdf-full-width > .eltdf-full-width-inner',
        );

        echo sweettooth_elated_dynamic_css($content_selector, $content_style);

        $content_style_in_grid = array();
	    
	    $padding_top_in_grid = sweettooth_elated_options()->getOptionValue('content_top_padding_in_grid');
	    if ($padding_top_in_grid !== '') {
            $content_style_in_grid['padding-top'] = sweettooth_elated_filter_px($padding_top_in_grid).'px';
        }

        $content_selector_in_grid = array(
            '.eltdf-content .eltdf-content-inner > .eltdf-container > .eltdf-container-inner',
        );

        echo sweettooth_elated_dynamic_css($content_selector_in_grid, $content_style_in_grid);
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_content_styles');
}

if (!function_exists('sweettooth_elated_h1_styles')) {

    function sweettooth_elated_h1_styles() {
	    $margin_top = sweettooth_elated_options()->getOptionValue('h1_margin_top');
	    $margin_bottom = sweettooth_elated_options()->getOptionValue('h1_margin_bottom');
	    
	    $item_styles = sweettooth_elated_get_typography_styles('h1');
	    
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = sweettooth_elated_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = sweettooth_elated_filter_px($margin_bottom).'px';
	    }
	    
	    $item_selector = array(
		    'h1'
	    );

	    if ( ! empty( $item_styles ) ) {
		    echo sweettooth_elated_dynamic_css( $item_selector, $item_styles );
	    }
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_h1_styles');
}

if (!function_exists('sweettooth_elated_h2_styles')) {

    function sweettooth_elated_h2_styles() {
	    $margin_top = sweettooth_elated_options()->getOptionValue('h2_margin_top');
	    $margin_bottom = sweettooth_elated_options()->getOptionValue('h2_margin_bottom');
	
	    $item_styles = sweettooth_elated_get_typography_styles('h2');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = sweettooth_elated_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = sweettooth_elated_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h2'
	    );

	    if ( ! empty( $item_styles ) ) {
		    echo sweettooth_elated_dynamic_css( $item_selector, $item_styles );
	    }
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_h2_styles');
}

if (!function_exists('sweettooth_elated_h3_styles')) {

    function sweettooth_elated_h3_styles() {
	    $margin_top = sweettooth_elated_options()->getOptionValue('h3_margin_top');
	    $margin_bottom = sweettooth_elated_options()->getOptionValue('h3_margin_bottom');
	
	    $item_styles = sweettooth_elated_get_typography_styles('h3');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = sweettooth_elated_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = sweettooth_elated_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h3'
	    );

	    if ( ! empty( $item_styles ) ) {
		    echo sweettooth_elated_dynamic_css( $item_selector, $item_styles );
	    }
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_h3_styles');
}

if (!function_exists('sweettooth_elated_h4_styles')) {

    function sweettooth_elated_h4_styles() {
	    $margin_top = sweettooth_elated_options()->getOptionValue('h4_margin_top');
	    $margin_bottom = sweettooth_elated_options()->getOptionValue('h4_margin_bottom');
	
	    $item_styles = sweettooth_elated_get_typography_styles('h4');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = sweettooth_elated_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = sweettooth_elated_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h4'
	    );

	    if ( ! empty( $item_styles ) ) {
		    echo sweettooth_elated_dynamic_css( $item_selector, $item_styles );
	    }
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_h4_styles');
}

if (!function_exists('sweettooth_elated_h5_styles')) {

    function sweettooth_elated_h5_styles() {
	    $margin_top = sweettooth_elated_options()->getOptionValue('h5_margin_top');
	    $margin_bottom = sweettooth_elated_options()->getOptionValue('h5_margin_bottom');
	
	    $item_styles = sweettooth_elated_get_typography_styles('h5');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = sweettooth_elated_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = sweettooth_elated_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h5'
	    );

	    if ( ! empty( $item_styles ) ) {
		    echo sweettooth_elated_dynamic_css( $item_selector, $item_styles );
	    }
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_h5_styles');
}

if (!function_exists('sweettooth_elated_h6_styles')) {

    function sweettooth_elated_h6_styles() {
	    $margin_top = sweettooth_elated_options()->getOptionValue('h6_margin_top');
	    $margin_bottom = sweettooth_elated_options()->getOptionValue('h6_margin_bottom');
	
	    $item_styles = sweettooth_elated_get_typography_styles('h6');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = sweettooth_elated_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = sweettooth_elated_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h6'
	    );

	    if ( ! empty( $item_styles ) ) {
		    echo sweettooth_elated_dynamic_css( $item_selector, $item_styles );
	    }
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_h6_styles');
}

if (!function_exists('sweettooth_elated_text_styles')) {

    function sweettooth_elated_text_styles() {
	    $item_styles = sweettooth_elated_get_typography_styles('text');
	
	    $item_selector = array(
		    'p'
	    );

	    if ( ! empty( $item_styles ) ) {
		    echo sweettooth_elated_dynamic_css( $item_selector, $item_styles );
	    }
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_text_styles');
}

if (!function_exists('sweettooth_elated_link_styles')) {

    function sweettooth_elated_link_styles() {
        $link_styles = array();

        if(sweettooth_elated_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = sweettooth_elated_options()->getOptionValue('link_color');
        }
        if(sweettooth_elated_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = sweettooth_elated_options()->getOptionValue('link_fontstyle');
        }
        if(sweettooth_elated_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = sweettooth_elated_options()->getOptionValue('link_fontweight');
        }
        if(sweettooth_elated_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = sweettooth_elated_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo sweettooth_elated_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_link_styles');
}

if (!function_exists('sweettooth_elated_link_hover_styles')) {

    function sweettooth_elated_link_hover_styles() {
        $link_hover_styles = array();

        if(sweettooth_elated_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = sweettooth_elated_options()->getOptionValue('link_hovercolor');
        }
        if(sweettooth_elated_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = sweettooth_elated_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo sweettooth_elated_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(sweettooth_elated_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = sweettooth_elated_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo sweettooth_elated_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('sweettooth_elated_action_style_dynamic', 'sweettooth_elated_link_hover_styles');
}

if (!function_exists('sweettooth_elated_smooth_page_transition_styles')) {

    function sweettooth_elated_smooth_page_transition_styles($style) {
        $id = sweettooth_elated_get_page_id();
    	$loader_style = array();
		$current_style = '';

        if(sweettooth_elated_get_meta_field_intersect('smooth_pt_bgnd_color',$id) !== '') {
            $loader_style['background-color'] = sweettooth_elated_get_meta_field_intersect('smooth_pt_bgnd_color',$id);
        }

        $loader_selector = array('.eltdf-smooth-transition-loader');

        if (!empty($loader_style)) {
			$current_style .= sweettooth_elated_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if(sweettooth_elated_get_meta_field_intersect('smooth_pt_spinner_color',$id) !== '') {
            $spinner_style['background-color'] = sweettooth_elated_get_meta_field_intersect('smooth_pt_spinner_color',$id);
        }

        $spinner_selectors = array(
            '.eltdf-st-loader .eltdf-rotate-circles > div', 
            '.eltdf-st-loader .pulse', 
            '.eltdf-st-loader .double_pulse .double-bounce1', 
            '.eltdf-st-loader .double_pulse .double-bounce2', 
            '.eltdf-st-loader .cube', 
            '.eltdf-st-loader .rotating_cubes .cube1', 
            '.eltdf-st-loader .rotating_cubes .cube2', 
            '.eltdf-st-loader .stripes > div', 
            '.eltdf-st-loader .wave > div', 
            '.eltdf-st-loader .two_rotating_circles .dot1', 
            '.eltdf-st-loader .two_rotating_circles .dot2', 
            '.eltdf-st-loader .five_rotating_circles .container1 > div', 
            '.eltdf-st-loader .five_rotating_circles .container2 > div', 
            '.eltdf-st-loader .five_rotating_circles .container3 > div', 
            '.eltdf-st-loader .atom .ball-1:before', 
            '.eltdf-st-loader .atom .ball-2:before', 
            '.eltdf-st-loader .atom .ball-3:before', 
            '.eltdf-st-loader .atom .ball-4:before', 
            '.eltdf-st-loader .clock .ball:before', 
            '.eltdf-st-loader .mitosis .ball', 
            '.eltdf-st-loader .lines .line1', 
            '.eltdf-st-loader .lines .line2', 
            '.eltdf-st-loader .lines .line3', 
            '.eltdf-st-loader .lines .line4', 
            '.eltdf-st-loader .fussion .ball', 
            '.eltdf-st-loader .fussion .ball-1', 
            '.eltdf-st-loader .fussion .ball-2', 
            '.eltdf-st-loader .fussion .ball-3', 
            '.eltdf-st-loader .fussion .ball-4', 
            '.eltdf-st-loader .wave_circles .ball', 
            '.eltdf-st-loader .pulse_circles .ball' 
        );

        if (!empty($spinner_style)) {
			$current_style .= sweettooth_elated_dynamic_css($spinner_selectors, $spinner_style);
        }

		$current_style = $current_style . $style;

		return $current_style;
    }

    add_filter('sweettooth_elated_filter_add_page_custom_style', 'sweettooth_elated_smooth_page_transition_styles');
}