
<?php if (nonprofit_get_option('nonprofit_show_adress_bar','') != "off") { ?>
  <div class="wd-top-bar clearfix">
    <div class="row">
      <div class="left address-info">
        <?php if (nonprofit_get_option("nonprofit_header_number","214-587-3656") != ""){
          echo "<i class='ion-android-phone-portrait'></i><span>". nonprofit_get_option("nonprofit_header_number","214-587-3656") . " </span>";
        } ?>
        <?php if (nonprofit_get_option("nonprofit_header_email","out@mail.com") != ""){
          echo "<i class='ion-email'></i><span>". nonprofit_get_option("nonprofit_header_email","out@mail.com")  . " </span>";
        } ?>
        <?php if (nonprofit_get_option("nonprofit_header_adress","142 NEw York") != ""){
          echo "<i class='ion-android-pin'></i><span>". nonprofit_get_option("nonprofit_header_adress","142 NEw York"). " </span>";
        } ?>

      </div>


      <div class="call-action right">
        <a href="<?php echo nonprofit_get_option('nonprofit_button_left_link','#') ?>" class="button alert radius tiny m-b-0"><?php echo nonprofit_get_option('nonprofit_button_left','Donate') ?></a>
        <a href="<?php echo nonprofit_get_option('nonprofit_button_right_link','#') ?>" class="button success radius tiny m-b-0" style="background: #8F7E06;"><?php echo nonprofit_get_option('nonprofit_button_right','Become Volunteer') ?></a>
      </div>

      <div class="right">
        <ul class="social-icons inline-list m-b-0">
          <?php if (nonprofit_get_option('nonprofit_facebook','') != ""){ ?>
            <li class="facebook">
              <a href="<?php echo nonprofit_get_option('nonprofit_facebook','') ?>"><i class="fa fa-facebook"></i></a>
            </li>
          <?php } ?>
          <?php if (nonprofit_get_option('nonprofit_twitter','') != ""){ ?>
            <li class="twitter">
              <a href="<?php echo nonprofit_get_option('nonprofit_twitter','') ?>"><i class="fa fa-twitter"></i></a>
            </li>
          <?php } ?>
          <?php if (nonprofit_get_option('nonprofit_google_plus','') != ""){ ?>
            <li class="googleplus">
              <a href="<?php echo nonprofit_get_option('nonprofit_google_plus','') ?>"><i class="fa fa-google-plus"></i></a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
<?php } ?>

<header class="wd-header wd-header-1 contain-to-grid <?php if( get_post_meta(get_queried_object_id(), "header_bg", true) == "colored") echo "with-bg"; ?>">
	<div class="wd-menu-nav sticky">

		
		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<li class="name" >
					<div class="wd-logo left">
						<?php
						$nonprofit_default_logo_path = 'http://themes.webdevia.com/nonprofit/wp-content/uploads/2016/01/logo-nonprofit.png';
						$nonprofit_logo_path = nonprofit_get_option('nonprofit_logo_path', $nonprofit_default_logo_path) ?>
						<h1><a title="<?php esc_html_e('Home', 'nonprofit'); ?>" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img alt="<?php echo get_bloginfo(); ?>" src="<?php echo esc_attr($nonprofit_logo_path); ?>"></a></h1>
					</div>
					
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span><?php echo esc_html__("Menu", 'nonprofit') ?></span></a></li>
				
			</ul>
			<div class="top-bar-section
			<?php if (nonprofit_get_option('nonprofit_show_min_cart','') != "off" || nonprofit_get_option('nonprofit_show_min_search','') != "off") {
				echo " show-icons";
			} ?>
			">
				<?php 
					wp_nav_menu(array('theme_location' => 'primary',
				                        'walker' => new nonprofit_top_bar_walker,
				                        'fallback_cb' => 'nonprofit_main_menu_fallback'))
										 ?>
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
		</nav>
	</div>

</header>