<header class="wd-header wd-header-3 clearfix">
	
	<nav data-topbar>
			<div class="wd-logo left">
						<?php
						$nonprofit_default_logo_path = get_template_directory_uri().'/images/logo.png';
						$nonprofit_logo_path = nonprofit_get_option('nonprofit_logo_path', $nonprofit_default_logo_path) ?>
						<h1><a title="<?php esc_html_e('Home', 'nonprofit'); ?>" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img alt="<?php echo get_bloginfo(); ?>" src="<?php echo esc_attr($nonprofit_logo_path); ?>"></a></h1>
			</div>
			<?php if (nonprofit_get_option('nonprofit_show_min_search','') != "off"){ ?>
				<div class="show-search-btn">
				  <span class="ion-ios-search-strong"></span>
				  <div class="hidden-search" style="display: none;">
				    <?php get_search_form(); ?>
				  </div>
				</div>
				<?php } ?>
			<?php if ( function_exists( 'WC' ) && nonprofit_get_option('nonprofit_show_min_cart','') != "off" ) { ?>
			  <div class="show-cart-btn">
			  <span class="ion-bag"></span><span class="min-cart-count"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'nonprofit' ), WC()->cart->cart_contents_count ); ?></span>
			  <div class="hidden-cart" style="display: none;">
			    <?php the_widget( 'WC_Widget_Cart' ); ?>
			  </div>
			  </div>
		  <?php }  ?>
			<button class="c-hamburger c-hamburger--htx toggle-menu ">
			  <span><?php echo esc_html__("Menu", 'nonprofit') ?></span>
			</button>
				<?php 
					wp_nav_menu(array('theme_location' => 'primary',
					'container_class'=>'menu-empty-menu-container',
										'menu_id'=> "menu",
										"menu_class"=>"overlay-menu",
				                        'walker' => new nonprofit_top_bar_walker,
				                        'fallback_cb' => 'nonprofit_main_menu_fallback'))
										 ?>
					<?php if (nonprofit_get_option('nonprofit_show_min_search','') != "off"){ ?>
					<div class="show-search-btn hide-for-small-only">
					  <span class="ion-ios-search-strong"></span>
					  <div class="hidden-search" style="display: none;">
					    <form action="<?php echo esc_url( home_url( '/' ) ) ?>" class="searchform" id="searchform" method="get" role="search">
										<div>
											
											<input type="text" id="s" name="s" value="" placeholder="Type & Hit Enter...">
											<input type="submit" value="Search" id="searchsubmit">
										</div>
						</form>
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
		
		
			
	</nav> 
</header>