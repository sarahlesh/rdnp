<header class="wd-header wd-header-2 <?php if( get_post_meta(get_queried_object_id(), "header_bg", true) == "colored") echo "with-bg"; ?>">
	<div class="wd-menu-nav sticky ">
		
		<nav class="top-bar row" data-topbar>
			<ul class="title-area">
				<li class="toggle-topbar menu-icon"><a href="#"><span><?php echo esc_html__("Menu", 'nonprofit') ?></span></a></li>
			</ul>
			<div class="top-bar-section
			<?php if (nonprofit_get_option('nonprofit_show_min_cart','') != "off" || nonprofit_get_option('nonprofit_show_min_search','') != "off") {
				echo " show-icons";
			} ?>
			">
				<?php wp_nav_menu(array('theme_location' => 'primary',
				'container_class'=>'wd-menu-left left',
				                        'walker' => new nonprofit_top_bar_walker,
				                        'fallback_cb' => 'nonprofit_main_menu_fallback'))  ?>
		<div class="wd-logo left">
			<?php
			$nonprofit_default_logo_path = get_template_directory_uri().'/images/logo.png';
			$nonprofit_logo_path = nonprofit_get_option('nonprofit_logo_path', $nonprofit_default_logo_path) ?>
			<h1><a title="<?php esc_html_e('Home', 'nonprofit'); ?>" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img alt="<?php echo get_bloginfo(); ?>" src="<?php echo esc_attr($nonprofit_logo_path); ?>"></a></h1>
		</div>
		
				<?php wp_nav_menu(array('theme_location' => 'right',
				'container_class'=>'wd-menu-right left',
				                        'walker' => new nonprofit_top_bar_walker,
				                        'fallback_cb' => 'nonprofit_main_menu_fallback'))  ?>
        <div class="min-search-cart left hide-for-small-only">
        	<?php if (nonprofit_get_option('nonprofit_show_min_search','') != "off"){ ?>
					<div class="show-search-btn hide-for-small-only">
					  <span class="ion-ios-search-strong"></span>
					  <div class="hidden-search" style="display: none;">
					    <?php get_search_form(); ?>
					  </div>
					</div>
					<?php } ?>
				<?php if ( function_exists( 'WC' ) && nonprofit_get_option('nonprofit_show_min_cart','') != "off" ) { ?>
				  <div class="show-cart-btn hide-for-small-only">
				  <span class="ion-bag"></span><span class="min-cart-count"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'nonprofit' ), WC()->cart->cart_contents_count ); ?></span>
				  <div class="hidden-cart" style="display: none;">
				    <?php the_widget( 'WC_Widget_Cart' ); ?>
				  </div>
				  </div>
			  <?php }  ?>
			  <div class="languages_section right">
          <?php 
          if (nonprofit_get_option('nonprofit_language_area_html') != "" && nonprofit_get_option('nonprofit_show_wpml_widget') != "on") {
            echo html_entity_decode(nonprofit_get_option('nonprofit_language_area_html'));
          }
          if (nonprofit_get_option('nonprofit_show_wpml_widget') == "on") {
            if(do_action('icl_language_selector')){
									do_action('icl_language_selector');
						}
          }
           ?>
				</div>
        </div>
			</div>
		</nav>
	</div>
</header>