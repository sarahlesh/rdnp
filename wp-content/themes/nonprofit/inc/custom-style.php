
<?php 


$nonprofit_custom_css = "";
	$nonprofit_custom_css .= "";
	
	//______________ background header single pages ______________________________

	$nonprofit_single_post_bg_img = nonprofit_get_option( 'nonprofit_bg_single_post_path','');
	
	if($nonprofit_single_post_bg_img != ''){
		
		$nonprofit_custom_css .= "
			.single-post .wd-title-bar, .archive .wd-title-bar, .blog .wd-title-bar  {
				background:url(".$nonprofit_single_post_bg_img .") no-repeat #111;
				background-size:cover;
			}
		";
	}
	//______________ background header pages ______________________________
	global $wp_query;
	  if( is_object($wp_query) && is_object($wp_query->post) && isset($wp_query->post->ID)) {
	  	$nonprofit_PageID = $wp_query->post->ID;
	  }else{
	  	$nonprofit_PageID = '';
	  }
	  if(nonprofit_is_blog()) {
	  	$nonprofit_PageID = get_option('page_for_posts');
	  }else {
	  	$nonprofit_PageID =$nonprofit_PageID;
	  }
	$nonprofit_page_bg_img = get_post_meta($nonprofit_PageID, 'nonprofit_page_title_area_bg_img', true);
	if($nonprofit_page_bg_img != ''){
		
		$nonprofit_custom_css .= "
			.wd-title-bar , .archive .wd-title-bar, .blog .wd-title-bar{
				background:url(".$nonprofit_page_bg_img .") no-repeat #111;
				background-size:cover;
			}
		";
	}
	if( is_rtl() ){
          $nonprofit_custom_css .= "body, p, #lang_sel_list {
            font-family : 'Droid Arabic Kufi', serif;
          } ";
          
          $nonprofit_custom_css .= "h1, h2, h3, h4, h5, h6 {
              font-family : 'Droid Arabic Naskh', serif;
            } ";
						}else{
 		if((nonprofit_get_option('nonprofit_body_font_familly')!='default') && (nonprofit_get_option('nonprofit_body_font_familly')!= false)){
    $nonprofit_custom_css .= "body, body p {
    	font-family :'". nonprofit_get_option('nonprofit_body_font_familly', 'Open Sans')."';
    	font-weight :" . nonprofit_get_option('nonprofit_body_font_weight', '400').";
    }";
		}else {
			$nonprofit_custom_css .= "body, body p {
    	font-family: 'Open Sans', sans-serif;
    	font-weight :" . nonprofit_get_option('nonprofit_body_font_weight', '400').";
    }";
		}
		if((nonprofit_get_option('nonprofit_body_font_size')!='default') && (nonprofit_get_option('nonprofit_body_font_size')!= false) ){
			$nonprofit_custom_css .= "body p {
    	font-size :". nonprofit_get_option('nonprofit_body_font_size', '14')."px;
    }";
		}
		if((nonprofit_get_option('nonprofit_heading_font_familly')!='default') && (nonprofit_get_option('nonprofit_heading_font_familly')!= false) ){
    $nonprofit_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a, .bbp-topic-permalink  {
    	font-family :'". nonprofit_get_option('nonprofit_heading_font_familly','Josefin Sans')."';
    	font-weight :" . nonprofit_get_option('nonprofit_heading_font_weight', '700').";
    }";
    }else {
    	$nonprofit_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
    	font-family: 'Montserrat','Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;
    	font-weight :" . nonprofit_get_option('nonprofit_heading_font_weight','700').";
    }";
    }
    if((nonprofit_get_option('nonprofit_navigation_font_familly')!='default') && (nonprofit_get_option('nonprofit_navigation_font_weight')!= false) ){
    	$nonprofit_custom_css .= ".wd-header .top-bar-section ul li > a {
			font-family : '" . nonprofit_get_option('nonprofit_navigation_font_familly','Open Sans') . "';
			font-weight : " . nonprofit_get_option('nonprofit_navigation_font_weight','600') . ";
		}";
    }else {
    	$nonprofit_custom_css .= ".wd-header .top-bar-section ul li > a {
			font-family: 'Open Sans', sans-serif;
			font-weight : " . nonprofit_get_option('nonprofit_navigation_font_weight','600') . ";
		}";
    }

    if( nonprofit_get_option('nonprofit_navigation_text_transform') != "") {
			$nonprofit_custom_css .= ".wd-header .top-bar-section ul li > a {
				text-transform : " . nonprofit_get_option( 'nonprofit_navigation_text_transform', 'none' ) . ";
			}";
		}
    
		if((nonprofit_get_option('nonprofit_navigation-font-size')!='default') && (nonprofit_get_option('nonprofit_navigation-font-size')!= false) ){
    	$nonprofit_custom_css .= ".wd-header .top-bar-section ul li > a {
				font-size : " . nonprofit_get_option( 'nonprofit_navigation_font_size','14' ) . "px;
			}";
		}
		if( nonprofit_get_option('nonprofit_heading_text_transform') != "") {
			$nonprofit_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
				text-transform : " . nonprofit_get_option( 'nonprofit_heading_text_transform','none' ) . ";
			}";
		}
		if( nonprofit_get_option('nonprofit_body_transform') != "") {
			$nonprofit_custom_css .= "body ,body p {
				text-transform : " . nonprofit_get_option( 'nonprofit_body_transform','none' ) . ";
			}";
		}
		}
		//_____________nav text colo __________________
		$nonprofit_custom_css .= "
		.top-bar-section ul li > a, 
		.show-search-btn span, .show-cart-btn span,
		.top-bar-section .has-dropdown > a:after ,
		.wd-menu-nav.sticky.fixed {
			color : ".nonprofit_get_option('nonprofit_nav_bar_text_color', 'rgba(106,106,106,1)').";
		}";


		$nonprofit_header_color = get_post_meta($nonprofit_PageID, 'nonprofit_header_color', true);

		$nonprofit_custom_css .= "
		.top-bar-section ul li > a, 
		.show-search-btn span, .show-cart-btn span,
		.top-bar-section .has-dropdown > a:after ,
		.wd-menu-nav.sticky.fixed {
			color : ". $nonprofit_header_color .";
		}";



		$nonprofit_custom_css .= ".top-bar-section .has-dropdown > a:after {
			border-color: ".nonprofit_get_option('nonprofit_nav_bar_text_color', 'rgba(106,106,106,1)')." transparent transparent;
		}";
		
		$nonprofit_custom_css .= "
				.wd-header.wd-header-6 .wd-header-toggle {
					background : ".nonprofit_get_option('nonprofit_toggle_background_color','rgba(0,0,0,1)') .";
				}
				#nav-icon2 span, #nav-icon2.open:hover span {
					background : ".nonprofit_get_option('nonprofit_toggle_color','rgba(255,255,255,1)') .";
				}
		";
		
	//_______________ background Primary color___________________________
	$nonprofit_custom_css .= "
	        button, .button,
					.primary-color,#filters li:hover,#filters li:first-child, #filters li:focus, #filters li:active,
					.wd-section-blog-services.style-3 .wd-blog-post h4:after,
					.box-icon img, .box-icon i,

					.wd-latest-news .wd-image-date span strong,
					.wd-latest-news .wd-title-element:after,
					.wd-section-blog.style2 h4:after,
					.accordion .accordion-navigation > a, .accordion dd > a,
					.blog-page .post-left .month,
					.searchform #searchsubmit,.blog-page .quote-format blockquote,
					.wd-progress-bar-container ul.wd-progress-bar li .progress .meter,
					.team-member-slider .owl-dots .owl-dot.active span, .team-member-slider .owl-theme .owl-dots .owl-dot:hover span, .team-member-carousel .owl-dots .owl-dot.active span, .team-member-carousel .owl-theme .owl-dots .owl-dot:hover span,
					.pricing-table.featured .button,
					.pricing-table .cta-button .button:hover, .pricing-table .cta-button .button:focus,
					.wd-footer .tagcloud a:hover,
					.wd-portfolio-carousel .wd-portfolio-carousel-item-text .portfolio-title:before,
					ul.sub-menu.dropdown:after, .show-cart-btn span.min-cart-count,
					.vc_tta-tabs .vc_tta-tabs-container ul.vc_tta-tabs-list .vc_tta-tab.vc_active,
					.vc_tta.vc_general.vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-title
					{
						background:".nonprofit_get_option('nonprofit_primary_color','rgba(79,191,112,1)').";
					}
	";
	$nonprofit_custom_css .= "
	.wd-menu-nav.sticky.fixed .top-bar-section ul li > a, 
	.wd-menu-nav.sticky.fixed .show-search-btn span, 
	.wd-menu-nav.sticky.fixed .show-cart-btn span,
	.wd-menu-nav.sticky.fixed .top-bar-section .has-dropdown > a:after {
			color : ".nonprofit_get_option('nonprofit_sticky_nav_bar_color','#555').";
		}";

	$nonprofit_custom_css .= ".wd-menu-nav.sticky.fixed .top-bar-section .has-dropdown > a:after {
		border-color: ".nonprofit_get_option('nonprofit_sticky_nav_bar_color','rgba(5,5,5,1)')." transparent transparent;
	}";




	$nonprofit_custom_css .=	"
	.vc_tta-tabs .vc_tta-tabs-container ul.vc_tta-tabs-list .vc_tta-tab.vc_active:after,
	.woocommerce-info {
		border-color : " . nonprofit_get_option('nonprofit_primary_color','rgba(79,191,112,1)') . " transparent transparent;
	}";

	$nonprofit_custom_css .=	"
	.wd_pagination ul.page-numbers li span.current,
	.wd_pagination ul.page-numbers li a:hover, .wd_pagination .next-link a:hover, .wd_pagination .prev-link a:hover,
	.vc_tta.vc_general.vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-title 
	 {
		border-color : " . nonprofit_get_option('nonprofit_primary_color','rgba(79,191,112,1)') . ";
	}";
	
	$nonprofit_custom_css .=	"
	.vc_tta-tabs .vc_tta-tabs-container ul.vc_tta-tabs-list .vc_tta-tab.vc_active {
		border-color : " . nonprofit_get_option('nonprofit_primary_color','rgba(79,191,112,1)') . " transparent transparent;
	}";
	
	//_______________ Topbar & Sticky nav bar background color___________________________
	
	$nonprofit_custom_css .= "
	.wd-header{
		background-color: ".nonprofit_get_option('nonprofit_nav_bar_bg_color','rgba(255,255,255,1)')."
	}
	.wd-menu-nav.sticky.fixed {
		background-color: ".nonprofit_get_option('nonprofit_sticky_nav_bar_bg_color','rgba(255,255,255,1)')."
	}";
	$nonprofit_custom_css .= "
		.wd-top-bar {
			background-color: ".nonprofit_get_option('nonprofit_top_bar_bg_color','rgba(79,191,112,1)')."
		}
		.wd-top-bar, .wd-top-bar i {
			color: ".nonprofit_get_option('nonprofit_top_bar_text_color', 'rgba(255,255,255,1)')."
		}
	
	";
	//_______________ text Primary color___________________________
	$nonprofit_custom_css .= "
			a,
			h1 span, h2 span, h3 span, h4 span, h5 span, h6 span,
			.wd-progress-bar-container ul.wd-progress-bar li .value,
			.blog-page .read-more-link,
			#wp-calendar a,.wd-testimonail blockquote cite,
			.list-icon li:before, .wd-menu-nav .nonprofit_mega-menu > .sub-menu.dropdown > li > .sub-menu.dropdown a:hover,
			.pricing-table .title,
			.pricing-table li.bullet-item i,
			.top-bar-section ul li:hover:not(.has-form) > a,
			.top-bar-section .dropdown li:hover:not(.has-form):not(.active) > a:not(.button),
			.wd-header-1 .wd-top-bar a:hover i,
			wd-flow-us li a:hover,
			.wd-footer .block ul li a:hover, .result h2.post-title a:hover, .pricing-table .title,
			.vc_tta.vc_general.vc_tta-accordion .vc_tta-panel .vc_tta-panel-title a, 
			.vc_tta.vc_general.vc_tta-accordion .vc_tta-panel .vc_tta-panel-title a span,
			.wd_pagination ul.page-numbers li span.current,
			.woocommerce-info::before
			{
				color:".nonprofit_get_option('nonprofit_primary_color','rgba(79,191,112,1)').";
			}

	";
	$nonprofit_custom_css .= "
		.team-member-social-medias a:hover,
		.wd-flow-us a:hover
		{
			color:" . nonprofit_get_option('nonprofit_primary_color','rgba(79,191,112,1)') . " !important;
		}";
	//_______________ background secondary Primary color___________________________
	$nonprofit_custom_css .= "
		.hvr-underline-from-center:before,
		.hvr-outline-in:before
			{
				border-color:".nonprofit_get_option('nonprofit_secondary_color','rgba(32,152,209,1)').";
			}
	";
	//____________________background Footer _____________________
	$nonprofit_custom_css .= "
		.wd-footer , .wd-footer-1, .wd-footer-2 {
			background : url(".nonprofit_get_option('nonprofit_footer_bg_img_path').")".nonprofit_get_option('nonprofit_footer_bg_color','rgba(42,43,42,1)') .";
			background-size : cover;
		}
	";
	//_______________ custom css ___________________________
	$nonprofit_custom_css .= nonprofit_get_option('nonprofit_theme_custom_css','');
	
	
	
