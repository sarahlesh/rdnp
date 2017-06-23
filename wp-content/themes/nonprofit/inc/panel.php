<?php



/*///////////////////////////////// Register Panel Scripts and Styles /////////////////////////////////////////*/
function nonprofit_admin_register() {

  wp_register_script( 'wd-admin-main', get_template_directory_uri() . '/inc/js/script.js',
              array( 'jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'jquery-ui-tabs',
              'jquery-ui-droppable', 'jquery-ui-sortable' ) , false , false );
  wp_register_style( 'themify-icons', get_template_directory_uri().'/inc/themify-icons.css', array(), '20120208', 'all' );
  wp_register_style( 'wd-style', get_template_directory_uri().'/inc/css/style.css', array(), '20120208', 'all' );

  $font_body_name = nonprofit_get_option('nonprofit_body_font_familly','Open Sans');
  $nonprofit_font_weight_style = nonprofit_get_option('nonprofit_body_font_weight','400');
  $nonprofit_main_text_font_subsets = nonprofit_get_option('nonprofit_body_font_subsets','latin');

  $font_header_name = nonprofit_get_option('nonprofit_heading_font_familly','Montserrat');
  $nonprofit_heading_font_weight_style = nonprofit_get_option('nonprofit_heading_font_weight','400');
  $nonprofit_heading_text_font_subsets = nonprofit_get_option('nonprofit_heading_font_subsets','latin');

  $nonprofit_navigation_font_familly = nonprofit_get_option('nonprofit_navigation_font_familly', 'Montserrat');
  $nonprofit_navigation_font_weight_style = nonprofit_get_option('nonprofit_navigation_font_weight', '400');
  $nonprofit_navigation_text_font_subsets = nonprofit_get_option('nonprofit_navigation_font_subsets', 'latin');
  $protocol = is_ssl() ? 'https' : 'http';


  wp_register_style( 'wd-google-fonts-body', $protocol.'://fonts.googleapis.com/css?family=' . $font_body_name . ':' . $nonprofit_font_weight_style . '&subset=' . $nonprofit_main_text_font_subsets , false, NULL, 'all' );
  wp_register_style( 'wd-google-fonts-heading', $protocol.'://fonts.googleapis.com/css?family=' . $font_header_name . ':' . $nonprofit_heading_font_weight_style . '&subset=' . $nonprofit_heading_text_font_subsets , false, NULL, 'all' );
  wp_register_style( 'wd-google-fonts-navigation', $protocol.'://fonts.googleapis.com/css?family=' . $nonprofit_navigation_font_familly . ':' . $nonprofit_navigation_font_weight_style . '&subset=' . $nonprofit_navigation_text_font_subsets , false, NULL, 'all' );

  wp_register_style( 'wd-google-fonts', $protocol.'://fonts.googleapis.com/css?family=' . $font_body_name . ':' . $nonprofit_font_weight_style . '&subset=' . $nonprofit_main_text_font_subsets , false, NULL, 'all' );

  if ( isset( $_GET['page'] ) && $_GET['page'] == 'option panel' ) {


  }
  wp_enqueue_script( 'wd-admin-main' );
  wp_enqueue_style( 'themify-icons' );
  wp_enqueue_style( 'wd-style' );
  wp_enqueue_style( 'wd-google-fonts' );
  wp_enqueue_style( 'wd-google-fonts-body' );
  wp_enqueue_style( 'wd-google-fonts-heading' );
  wp_enqueue_style( 'wd-google-fonts-navigation' );

}
add_action( 'admin_enqueue_scripts', 'nonprofit_admin_register' );



if(!function_exists('nonprofit_load_color_picker')){
  add_action( 'load-widgets.php', 'nonprofit_load_color_picker' );
  function nonprofit_load_color_picker() {
      wp_enqueue_style( 'wp-color-picker' );
      wp_enqueue_script( 'wp-color-picker' );
  }
}




/*///////////////////////////////// Theme Options /////////////////////////////////////////*/
if(!function_exists('nonprofit_panel_option')){
  add_action('admin_menu','nonprofit_panel_option');
  function nonprofit_panel_option()
  {

      add_theme_support('custom-header');

      add_theme_page('Nonprofit Theme Options', 'Nonprofit Theme Options', 'edit_theme_options', 'nonprofit-theme-option', 'nonprofit_theme_option');
      if (is_plugin_active('revslider/revslider.php')) {
          add_theme_page('Import Demos Revsliders', 'Import Demos Revsliders', 'edit_theme_options', 'nonprofit-revslider', 'nonprofit_import_revslider');
      }
  }
}

// add a link to the WP Toolbar
function nonprofit_toolbar_link($wp_admin_bar) {
	$args = array(
		'id' => 'nonprofit_theme_options',
		'title' => 'Theme Options',
		'href' => get_home_url().'/wp-admin/themes.php?page=nonprofit-theme-option',
		'meta' => array(
			'class' => 'wd-theme-options',
			'title' => 'Theme Settings Panel'
		)
	);
	$wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'nonprofit_toolbar_link', 9999999);


if(!function_exists('nonprofit_theme_option')){
  function nonprofit_theme_option() {

    wp_enqueue_media();

    global $nonprofit_tiles;

    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style( 'wp-color-picker' );


    wp_enqueue_script('colorpick',    get_template_directory_uri() . "/js/bootstrap-colorpicker.min.js", array( 'jquery' ) );
    wp_enqueue_style ('colorpick',    get_template_directory_uri() . "/stylesheets/bootstrap-colorpicker.min.css");
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
    	//_________sit border ___________
    	$('#nonprofit_body_border').change(function () {
		    if ($(this).attr("checked")) 
		    {
		        
		        $('.body-margin').fadeIn();
		        return;
		    }
		   $('.body-margin').fadeOut();
		});


      //_________sit adress bar ___________
      $('#nonprofit_show_adress_bar').change(function () {
        if ($(this).attr("checked")) 
        {
            
            $('.adress-bar-item').fadeIn();
            return;
        }
       $('.adress-bar-item').fadeOut();
    });
		//_______________________
        $('.wd-color-picker').colorpicker(
          {format: 'rgba'}
        );
		//---------------footer background script-----------
      jQuery('#nonprofit_upload_footer_btn').click(function(){
      wp.media.editor.send.attachment = function(props, attachment){
        jQuery('#nonprofit_footer_bg_img_path').val(attachment.url);
      }
      wp.media.editor.open(this);

      return false;
      });
      //---------------logo script-----------
      jQuery('#nonprofit_upload_btn').click(function(){
      wp.media.editor.send.attachment = function(props, attachment){
        jQuery('#nonprofit_logo_path').val(attachment.url);
      }
      wp.media.editor.open(this);

      return false;
      });
     

		//------single background post script-----
      jQuery('#nonprofit_upload_single_post').click(function(){
        wp.media.editor.send.attachment = function(props, attachment){
          jQuery('#nonprofit_bg_single_post_path').val(attachment.url);
        }
        wp.media.editor.open(this);
        return false;
      });
    //-------------------------------------
    });
    </script>
    <?php

    if(!empty($_POST)){
      // nonprofit_initialize_options();
		//-------------------General Setting-------------
		nonprofit_save_option('nonprofit_logo_path',     esc_attr($_POST['nonprofit_logo_path']));
		nonprofit_save_option('nonprofit_header_style',     esc_attr($_POST['nonprofit_header_style']));
    if(isset($_POST['nonprofit_body_border']))
	    nonprofit_save_option('nonprofit_body_border', esc_attr($_POST['nonprofit_body_border']));
    else
	    nonprofit_save_option('nonprofit_body_border', 'off');

    if(isset($_POST['nonprofit_show_min_cart']))
      nonprofit_save_option('nonprofit_show_min_cart', esc_attr($_POST['nonprofit_show_min_cart']));
    else
      nonprofit_save_option('nonprofit_show_min_cart', 'off');

    if(isset($_POST['nonprofit_show_min_search']))
      nonprofit_save_option('nonprofit_show_min_search', esc_attr($_POST['nonprofit_show_min_search']));
    else
      nonprofit_save_option('nonprofit_show_min_search', 'off');

    if(isset($_POST['nonprofit_smooth_scroll']))
      nonprofit_save_option('nonprofit_smooth_scroll', esc_attr($_POST['nonprofit_smooth_scroll']));
    else
      nonprofit_save_option('nonprofit_smooth_scroll', 'off');

    if(isset($_POST['nonprofit_show_adress_bar']))
      nonprofit_save_option('nonprofit_show_adress_bar', esc_attr($_POST['nonprofit_show_adress_bar']));
    else
      nonprofit_save_option('nonprofit_show_adress_bar', 'off');

    if(isset($_POST['nonprofit_body_margin']))
	    nonprofit_save_option('nonprofit_body_margin', esc_attr($_POST['nonprofit_body_margin']));
    else
	    nonprofit_save_option('nonprofit_body_margin', 'off');
	
		nonprofit_save_option('nonprofit_footer_style',     esc_attr($_POST['nonprofit_footer_style']));

		nonprofit_save_option('nonprofit_bg_single_post_path',     esc_attr($_POST['nonprofit_bg_single_post_path']));
		
		nonprofit_save_option('nonprofit_header_number',     esc_attr($_POST['nonprofit_header_number']));
		nonprofit_save_option('nonprofit_header_email',     esc_attr($_POST['nonprofit_header_email']));
		nonprofit_save_option('nonprofit_header_adress',     esc_attr($_POST['nonprofit_header_adress']));
		//-------------------Color Setting-------------
		nonprofit_save_option('nonprofit_primary_color',     esc_attr($_POST['nonprofit_primary_color']));
		nonprofit_save_option('nonprofit_secondary_color',     esc_attr($_POST['nonprofit_secondary_color']));
		nonprofit_save_option('nonprofit_footer_bg_color',     esc_attr($_POST['nonprofit_footer_bg_color']));
		
    nonprofit_save_option('nonprofit_top_bar_bg_color',        esc_attr($_POST['nonprofit_top_bar_bg_color']));
    nonprofit_save_option('nonprofit_nav_bar_bg_color',        esc_attr($_POST['nonprofit_nav_bar_bg_color']));
    nonprofit_save_option('nonprofit_sticky_nav_bar_bg_color', esc_attr($_POST['nonprofit_sticky_nav_bar_bg_color']));
    nonprofit_save_option('nonprofit_sticky_nav_bar_color', esc_attr($_POST['nonprofit_sticky_nav_bar_color']));

    nonprofit_save_option('nonprofit_single_product_bg_color', esc_attr($_POST['nonprofit_single_product_bg_color']));
	
	nonprofit_save_option('nonprofit_top_bar_text_color', esc_attr($_POST['nonprofit_top_bar_text_color']));
  	nonprofit_save_option('nonprofit_nav_bar_text_color', esc_attr($_POST['nonprofit_nav_bar_text_color']));
		nonprofit_save_option('nonprofit_toggle_color', esc_attr($_POST['nonprofit_toggle_color']));
		nonprofit_save_option('nonprofit_toggle_background_color', esc_attr($_POST['nonprofit_toggle_background_color']));
		//-------------------Social Icon-------------
		nonprofit_save_option('nonprofit_twitter', esc_attr($_POST['nonprofit_twitter']));
      	nonprofit_save_option('nonprofit_facebook', esc_attr($_POST['nonprofit_facebook']));
		nonprofit_save_option('nonprofit_google_plus', esc_attr($_POST['nonprofit_google_plus']));
		nonprofit_save_option('nonprofit_button_left', esc_attr($_POST['nonprofit_button_left']));
		nonprofit_save_option('nonprofit_button_left_link', esc_attr($_POST['nonprofit_button_left_link']));
		nonprofit_save_option('nonprofit_button_right', esc_attr($_POST['nonprofit_button_right']));
		nonprofit_save_option('nonprofit_button_right_link', esc_attr($_POST['nonprofit_button_right_link']));
    //-------------------Language selector-------------
    
    nonprofit_save_option('nonprofit_language_area_html',                      htmlentities(stripslashes($_POST['nonprofit_language_area_html'])));
	 if(do_action('icl_language_selector')){ 
    	nonprofit_save_option('nonprofit_show_wpml_widget',       esc_attr($_POST['nonprofit_show_wpml_widget']));
    }
		//-------------------Fonts Setting ---------------
		
		//------------------Custom css & js ---------------
		nonprofit_save_option('nonprofit_theme_custom_css', $_POST['nonprofit_theme_custom_css']);
		nonprofit_save_option('nonprofit_theme_custom_js', str_replace("\\", "",$_POST['nonprofit_theme_custom_js']));
		//-------------------Footer Setting-------------
		nonprofit_save_option('nonprofit_footer_columns',     esc_attr($_POST['nonprofit_footer_columns']));
		nonprofit_save_option('nonprofit_copyright',     esc_attr($_POST['nonprofit_copyright']));
		nonprofit_save_option('nonprofit_footer_bg_img_path',     esc_attr($_POST['nonprofit_footer_bg_img_path']));

    nonprofit_save_option('nonprofit_body_font_familly',               esc_attr($_POST['nonprofit_body_font_familly']));
    nonprofit_save_option('nonprofit_body_font_weight',               esc_attr($_POST['nonprofit_body_font_weight']));
    nonprofit_save_option('nonprofit_body_font_subsets',          esc_attr($_POST['nonprofit_body_font_subsets']));
    nonprofit_save_option('nonprofit_body_transform',          esc_attr($_POST['nonprofit_body_transform']));
    nonprofit_save_option('nonprofit_body_font_size',          esc_attr($_POST['nonprofit_body_font_size']));

    nonprofit_save_option('nonprofit_heading_font_familly',               esc_attr($_POST['nonprofit_heading_font_familly']));
    nonprofit_save_option('nonprofit_heading_font_weight',       esc_attr($_POST['nonprofit_heading_font_weight']));
    nonprofit_save_option('nonprofit_heading_text_transform',       esc_attr($_POST['nonprofit_heading_text_transform']));
    nonprofit_save_option('nonprofit_heading_font_subsets',       esc_attr($_POST['nonprofit_heading_font_subsets']));

    nonprofit_save_option('nonprofit_navigation_font_familly',         esc_attr($_POST['nonprofit_navigation_font_familly']));
    nonprofit_save_option('nonprofit_navigation_font_weight',    esc_attr($_POST['nonprofit_navigation_font_weight']));
    nonprofit_save_option('nonprofit_navigation_text_transform',    esc_attr($_POST['nonprofit_navigation_text_transform']));
    nonprofit_save_option('nonprofit_navigation_font_subsets',    esc_attr($_POST['nonprofit_navigation_font_subsets']));
    nonprofit_save_option('nonprofit_navigation_font_size',            esc_attr($_POST['nonprofit_navigation_font_size']));
      
    } ?>



  <?php if(!empty($_POST)): ?>
    <div id="message" class="updated fade">
      <p> Configuration updated!! </p>
    </div>
  <?php endif;  ?>


  <div class="panel-logo">
          <h2>Webdevia theme options</h2>
      </div>
<div class="wd-cpanel">
  <form id="wd-Panel"  method="POST" action="">
    <div id="tabs" class="ui-tabs-vertical ui-helper-clearfix">
        <ul>
          <li><a href="#tabs-0"><?php echo esc_html__('General Settings', 'nonprofit'); ?></a></li>
          <li><a href="#tabs-1"><?php echo esc_html__('Color Settings', 'nonprofit'); ?></a></li>
          <li><a href="#tabs-2"><?php echo esc_html__('Address Bar', 'nonprofit'); ?></a></li>
          <li><a href="#tabs-3"><?php echo esc_html__('Fonts Settings', 'nonprofit'); ?></a></li>
          <li><a href="#tabs-4"><?php echo esc_html__('Custom CSS & JS', 'nonprofit'); ?></a></li>
          <li><a href="#tabs-5"><?php echo esc_html__('Footer Settings', 'nonprofit'); ?></a></li>
          <?php
          if ( is_plugin_active( 'wd-main-plugin/wd-main-plugin.php' ) ) {
           ?>
          <li><a href="#tabs-6"><?php echo esc_html__('Import Demos', 'nonprofit'); ?></a></li>
          <?php } ?>
         
        </ul>
        
        <!-- General Setting -->
        <div id="tabs-0">
          <table class="form-table">
            <tbody>
              
               <tr>
                <td>
                  <strong><?php echo esc_html__('Logo link', 'nonprofit'); ?></strong>
                </td>
                <?php 

               //  $nonprofit_default_logo_path = get_template_directory_uri().'/images/logo.png';
                 $nonprofit_logo_path = nonprofit_get_option('nonprofit_logo_path','');

                 $nonprofit_default_logo_path = 'http://themes.webdevia.com/nonprofit/wp-content/uploads/2016/01/logo-nonprofit.png';
                 $nonprofit_logo_path = nonprofit_get_option('nonprofit_logo_path',$nonprofit_default_logo_path);

                ?>  
                <td>
                  <input type="text" name="nonprofit_logo_path" id="nonprofit_logo_path" value="<?php print $nonprofit_logo_path ?>" />
                  <input class="button" name="_unique_name_button" id="nonprofit_upload_btn" value="<?php echo esc_html__('Upload', 'nonprofit') ?>" /></br>
                </td>
                <td> 
                  	<?php
                  	 if(!empty($nonprofit_logo_path)): ?> <img src="<?php print $nonprofit_logo_path; ?>" style="max-height: 70px;" /> <?php endif;
                    ?>
                </td>
              </tr>
              
              <tr>
                <td>
                  <strong><?php echo esc_html__('Background Title Bar for Single Post', 'nonprofit'); ?></strong>
                </td>
                <?php 
                 
                 $nonprofit_bg_single_post_path = nonprofit_get_option('nonprofit_bg_single_post_path','');
                ?>  
                <td>
                  <input type="text" name="nonprofit_bg_single_post_path" id="nonprofit_bg_single_post_path" value="<?php print $nonprofit_bg_single_post_path ?>" />
                  <input class="button" name="_unique_name_button_single_post" id="nonprofit_upload_single_post" value="<?php echo esc_html__('Upload', 'nonprofit') ?>" /></br>
                </td>
                <td> 
                  	<?php
                  	 if(!empty($nonprofit_bg_single_post_path)): ?> <img src="<?php print $nonprofit_bg_single_post_path; ?>" style="max-height: 40px;" /> <?php endif;
                    ?>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nonprofit_header_style"><strong>Header Style:</strong></label>
                </td>
                <td>
                  <select name="nonprofit_header_style" id="nonprofit_header_style" class="nonprofit_header_style">
                    <option value="1" <?php if ( nonprofit_get_option( 'nonprofit_header_style', '1' ) == '1' ) echo "selected='selected'"; ?>><?php echo esc_html__('Style 1', 'nonprofit'); ?></option>
                    <option value="2" <?php if ( nonprofit_get_option( 'nonprofit_header_style', '1' ) == '2' ) echo "selected='selected'"; ?>><?php echo esc_html__('Style 2', 'nonprofit'); ?></option>
                    <option value="3" <?php if ( nonprofit_get_option( 'nonprofit_header_style', '1' ) == '3' ) echo "selected='selected'"; ?>><?php echo esc_html__('Style 3', 'nonprofit'); ?></option>
                    <option value="4" <?php if ( nonprofit_get_option( 'nonprofit_header_style', '1' ) == '4' ) echo "selected='selected'"; ?>><?php echo esc_html__('Style 4', 'nonprofit'); ?></option>
                    <option value="5" <?php if ( nonprofit_get_option( 'nonprofit_header_style', '1' ) == '5' ) echo "selected='selected'"; ?>><?php echo esc_html__('Style 5', 'nonprofit'); ?></option>
                    <option value="6" <?php if ( nonprofit_get_option( 'nonprofit_header_style', '1' ) == '6' ) echo "selected='selected'"; ?>><?php echo esc_html__('Style 6', 'nonprofit'); ?></option>
                    <option value="none" <?php if ( nonprofit_get_option( 'nonprofit_header_style', '1' ) == '5' ) echo "selected='selected'"; ?>><?php echo esc_html__('None', 'nonprofit'); ?></option>
                  </select>
                </td>
              </tr>
               <tr>
                   <td><strong><?php echo esc_html__('Body Border', 'nonprofit'); ?></strong></td>
                   <td>
                       <input type="checkbox" <?php if(nonprofit_get_option('nonprofit_body_border','on') == 'off') print 'checked'; ?>
                              name="nonprofit_body_border" value="on" id="nonprofit_body_border" class="cmn-toggle cmn-toggle-round"/>
                       <label for="nonprofit_body_border"></label></td>
               </tr>
               <tr class="body-margin" style= "<?php if(nonprofit_get_option('nonprofit_body_border','on') != 'on') {echo 'display:none;';}  ?>">
                   <td><strong><?php echo esc_html__('Add page margin', 'nonprofit'); ?></strong></td>
                   <td>
                       <input type="checkbox" <?php if(nonprofit_get_option('nonprofit_body_margin','on') == 'off') print 'checked'; ?>
                              name="nonprofit_body_margin" value="on" id="nonprofit_body_margin" class="cmn-toggle cmn-toggle-round"/>
                       <label for="nonprofit_body_margin"></label></td>
               </tr>

              <tr>
                <td><strong><?php echo esc_html__('Show Min Cart', 'nonprofit'); ?></strong></td>
                <td>
                  <input type="checkbox" <?php if(nonprofit_get_option('nonprofit_show_min_cart','off') == 'on') print 'checked'; ?>
                   name="nonprofit_show_min_cart" value="on" id="nonprofit_show_min_cart" class="cmn-toggle cmn-toggle-round"/>
                <label for="nonprofit_show_min_cart"></label></td>
              </tr>
              <tr>
                <td><strong><?php echo esc_html__('Show Min Search', 'nonprofit'); ?></strong></td>
                <td>
                  <input type="checkbox" <?php if(nonprofit_get_option('nonprofit_show_min_search','off') == 'on') print 'checked'; ?>
                   name="nonprofit_show_min_search" value="on" id="nonprofit_show_min_search" class="cmn-toggle cmn-toggle-round"/>
                <label for="nonprofit_show_min_search"></label></td>
              </tr>
              <tr>
                <td><strong><?php echo esc_html__('Active Smooth Scroll', 'nonprofit'); ?></strong></td>
                <td>
                  <input type="checkbox" <?php if(nonprofit_get_option('nonprofit_smooth_scroll','off') == 'on') print 'checked'; ?>
                   name="nonprofit_smooth_scroll" value="on" id="nonprofit_smooth_scroll" class="cmn-toggle cmn-toggle-round"/>
                <label for="nonprofit_smooth_scroll"></label></td>
              </tr>

            </tbody>
          </table>
          
        </div>
        
        <!-- Color Setting -->
        <div id="tabs-1">
            <table class="form-table">
              <tbody>
              	
                 <tr>
	                <td><strong><?php echo esc_html__('Primary Color:', 'nonprofit'); ?></strong></td>

	               	 <td class='wd-color-picker'><?php $nonprofit_primary_color = nonprofit_get_option('nonprofit_primary_color',''); ?>

	                	<input name="nonprofit_primary_color" type="text" value="<?php print $nonprofit_primary_color; ?>" data-default-color="#CD9A00">
	               	 <span class="input-group-addon"><i></i></span>
	                </td>
              	</tr>
              	
              	<tr>
	                <td><strong><?php echo esc_html__('Secondary Color:', 'nonprofit'); ?></strong></td>

	               	 <td class='wd-color-picker'><?php $nonprofit_secondary_color = nonprofit_get_option('nonprofit_secondary_color','');

	               	 	?>
	                	<input name="nonprofit_secondary_color" type="text" value="<?php print $nonprofit_secondary_color; ?>" data-default-color="#2098d1">
	               	 <span class="input-group-addon"><i></i></span>
	                </td>
              	</tr>
				
			         	<tr>
	                <td><strong><?php echo esc_html__('Footer Background Color:', 'nonprofit'); ?></strong></td>

	               	 <td class='wd-color-picker'><?php $nonprofit_footer_bg_color = nonprofit_get_option('nonprofit_footer_bg_color','');
	               	 	?>
	                	<input name="nonprofit_footer_bg_color" type="text" value="<?php print $nonprofit_footer_bg_color; ?>" data-default-color="#2098d1">
	               	 <span class="input-group-addon"><i></i></span>
	                </td>
              	</tr>
				
				 <tr>
                  <td><strong><?php echo esc_html__('Top Bar Background Color:', 'nonprofit'); ?></strong></td>

                   <td class='wd-color-picker'><?php $nonprofit_top_bar_bg_color = nonprofit_get_option('nonprofit_top_bar_bg_color','');
                    ?>
                    <input name="nonprofit_top_bar_bg_color" type="text" value="<?php print $nonprofit_top_bar_bg_color; ?>" data-default-color="#333">
                   <span class="input-group-addon"><i></i></span>
                  </td>
                </tr>

              	<tr>
                  <td><strong><?php echo esc_html__('Top Bar Text Color:', 'nonprofit'); ?></strong></td>

                   <td class='wd-color-picker'><?php $nonprofit_top_bar_text_color = nonprofit_get_option('nonprofit_top_bar_text_color',''); ?>
                    <input name="nonprofit_top_bar_text_color" type="text" value="<?php print $nonprofit_top_bar_text_color; ?>" data-default-color="#333">
                   <span class="input-group-addon"><i></i></span>
                  </td>
                </tr>
				
                <tr>
                  <td><strong><?php echo esc_html__('Nav Bar Background Color:', 'nonprofit'); ?></strong></td>

                   <td class='wd-color-picker'><?php $nonprofit_nav_bar_bg_color = nonprofit_get_option('nonprofit_nav_bar_bg_color','');
                    ?>
                    <input name="nonprofit_nav_bar_bg_color" type="text" value="<?php print $nonprofit_nav_bar_bg_color; ?>" data-default-color="#333">
                   <span class="input-group-addon"><i></i></span>
                  </td>
                </tr>

              	<tr>
                  <td><strong><?php echo esc_html__('Nav Bar Text Color:', 'nonprofit'); ?></strong></td>

                   <td class='wd-color-picker'><?php $nonprofit_nav_bar_text_color = nonprofit_get_option('nonprofit_nav_bar_text_color',''); ?>
                    <input name="nonprofit_nav_bar_text_color" type="text" value="<?php print $nonprofit_nav_bar_text_color; ?>" data-default-color="#fff">
                   <span class="input-group-addon"><i></i></span>
                  </td>
                </tr>

                <tr>
                  <td><strong><?php echo esc_html__('Sticky Top Bar Background Color:', 'nonprofit'); ?></strong></td>

                   <td class='wd-color-picker'><?php $nonprofit_sticky_nav_bar_bg_color = nonprofit_get_option('nonprofit_sticky_nav_bar_bg_color','');
                    ?>
                    <input name="nonprofit_sticky_nav_bar_bg_color" type="text" value="<?php print $nonprofit_sticky_nav_bar_bg_color; ?>" data-default-color="#333">
                   <span class="input-group-addon"><i></i></span>
                  </td>
                </tr>

                <tr>
                  <td><strong><?php echo esc_html__('Sticky Top Bar Color:', 'nonprofit'); ?></strong></td>

                   <td class='wd-color-picker'><?php $nonprofit_sticky_nav_bar_color = nonprofit_get_option('nonprofit_sticky_nav_bar_color','');
                    ?>
                    <input name="nonprofit_sticky_nav_bar_color" type="text" value="<?php print $nonprofit_sticky_nav_bar_color; ?>" data-default-color="#333">
                   <span class="input-group-addon"><i></i></span>
                  </td>
                </tr>

                <tr>
                  <td><strong><?php echo esc_html__('Single Product Image Background Color:', 'nonprofit'); ?></strong></td>

                   <td class='wd-color-picker'><?php $nonprofit_single_product_bg_color = nonprofit_get_option('nonprofit_single_product_bg_color','');
                    ?>
                    <input name="nonprofit_single_product_bg_color" type="text" value="<?php print $nonprofit_single_product_bg_color; ?>" data-default-color="#eaeceb">
                   <span class="input-group-addon"><i></i></span>
                  </td>
                </tr>
                
                <tr>
                  <td><strong><?php echo esc_html__('Toggle Color:', 'nonprofit'); ?></strong></td>

                   <td class='wd-color-picker'><?php $nonprofit_toggle_color = nonprofit_get_option('nonprofit_toggle_color','');
                    ?>
                    <input name="nonprofit_toggle_color" type="text" value="<?php print $nonprofit_toggle_color; ?>" data-default-color="#fff">
                   <span class="input-group-addon"><i></i></span>
                  </td>
                </tr>
                <tr>
                  <td><strong><?php echo esc_html__('Toggle background Color:', 'nonprofit'); ?></strong></td>

                   <td class='wd-color-picker'><?php $nonprofit_toggle_background_color = nonprofit_get_option('nonprofit_toggle_background_color','');
                    ?>
                    <input name="nonprofit_toggle_background_color" type="text" value="<?php print $nonprofit_toggle_background_color; ?>" data-default-color="#000">
                   <span class="input-group-addon"><i></i></span>
                  </td>
                </tr>
                
              </tbody>
            </table>
        </div>
        
        <!-- Social Icon -->
        <div id="tabs-2">
          <table class="form-table">
            <tbody>
              <tr>
                <td><strong><?php echo esc_html__('Show Adress Bar', 'nonprofit'); ?></strong></td>
                <td>
                  <input type="checkbox" <?php if(nonprofit_get_option('nonprofit_show_adress_bar','on') == 'on') print 'checked'; ?>
                   name="nonprofit_show_adress_bar" value="on" id="nonprofit_show_adress_bar" class="cmn-toggle cmn-toggle-round"/>
                <label for="nonprofit_show_adress_bar"></label></td>
              </tr>
              <tr class="adress-bar-item">
                <td><strong><?php echo esc_html__('Header Phone Number', 'nonprofit'); ?></strong></td>
                <td><input type="text" name="nonprofit_header_number" value="<?php echo nonprofit_get_option("nonprofit_header_number","214-587-3652") ?>" /></td>
              </tr>
              <tr class="adress-bar-item">
                <td>
                  <strong>Put HTML code here</strong></td>
                <td><textarea placeholder="Language Area HTML" name="nonprofit_language_area_html" cols="70" rows="10">
                  <?php 
                        echo html_entity_decode(nonprofit_get_option('nonprofit_language_area_html'));
                  ?>
                </textarea>
                </td>
              </tr>
              <?php if(do_action('icl_language_selector')){ ?>

              <tr class="adress-bar-item">


                <td><strong><?php echo esc_html__('Show WPML Widget', 'nonprofit'); ?></strong></td>
                <td>
                  <input type="checkbox" <?php if(nonprofit_get_option('nonprofit_show_wpml_widget','on') == 'on') print 'checked'; ?>
                   name="nonprofit_show_wpml_widget" value="on" id="nonprofit_show_wpml_widget" class="cmn-toggle cmn-toggle-round"/>
                  <label for="nonprofit_show_wpml_widget"></label>
                </td>
              </tr>    
              <?php }?>
               <tr class="adress-bar-item">
                <td><strong><?php echo esc_html__('Header E-mail', 'nonprofit'); ?></strong></td>
                <td><input type="text" name="nonprofit_header_email" value="<?php echo nonprofit_get_option("nonprofit_header_email","our@mail.com") ?>" /></td>
              </tr>
              <tr class="adress-bar-item">
                <td><strong><?php echo esc_html__('Header Adress', 'nonprofit'); ?></strong></td>
                <td><input type="text" name="nonprofit_header_adress" value="<?php echo nonprofit_get_option("nonprofit_header_adress","142 New York") ?>" /></td>
              </tr>
             	<tr class="adress-bar-item">
                  <td>
                    <strong><?php echo esc_html__("Facebook", 'nonprofit') ?></strong></td>
                  <td><input type="text" name="nonprofit_facebook" placeholder="Your Facebook page link" value="<?php echo nonprofit_get_option('nonprofit_facebook', ''); ?>"></td>
                </tr>
                <tr class="adress-bar-item">
                  <td>
                    <strong><?php echo esc_html__("Twitter", 'nonprofit') ?></strong></td>
                  <td><input type="text" name="nonprofit_twitter" placeholder="Your Twitter page link" value="<?php echo nonprofit_get_option('nonprofit_twitter', ''); ?>"></td>
                </tr>
                <tr class="adress-bar-item">
                  <td>
                    <strong><?php echo esc_html__("Google +", 'nonprofit') ?></strong></td>
                  <td><input type="text" name="nonprofit_google_plus" placeholder="Your Google-plus page link" value="<?php echo nonprofit_get_option('nonprofit_google_plus', ''); ?>"></td>
                </tr>
                <tr class="adress-bar-item">
                  <td>
                    <strong><?php echo esc_html__("Left Button", 'nonprofit') ?></strong></td>
                  <td>
                    <strong><?php echo esc_html__("Text", 'nonprofit') ?></strong>
                    <input type="text" name="nonprofit_button_left" placeholder="Your Button left text" value="<?php echo nonprofit_get_option('nonprofit_button_left', 'Donate'); ?>">
                    <strong><?php echo esc_html__("Link", 'nonprofit') ?></strong>
                    <input type="text" name="nonprofit_button_left_link" placeholder="Your Button left text" value="<?php echo nonprofit_get_option('nonprofit_button_left_link', '#'); ?>">
                  </td>
                </tr>
                <tr class="adress-bar-item">
                  <td>
                    <strong><?php echo esc_html__("Right Button", 'nonprofit') ?></strong></td>
                  <td>
                    <strong><?php echo esc_html__("Text", 'nonprofit') ?></strong>
                    <input type="text" name="nonprofit_button_right" placeholder="Your right button text" value="<?php echo nonprofit_get_option('nonprofit_button_right', 'Become Volunteer'); ?>">
                    <strong><?php echo esc_html__("Link", 'nonprofit') ?></strong>
                    <input type="text" name="nonprofit_button_right_link" placeholder="Your right button link" value="<?php echo nonprofit_get_option('nonprofit_button_right_link', '#'); ?>">
                  </td>
                </tr>
				
            </tbody>
          </table>
        </div>
        
        <!-- Fonts Settings -->
        <div id="tabs-3">
         <table class="form-table">
          <tbody>
            <tr>
              <td>
                <strong><?php echo esc_html__('Main text font', 'nonprofit'); ?></strong>
              </td>
              <td>
                <?php 
                $nonprofit_body_font_familly = nonprofit_get_option('nonprofit_body_font_familly' ,'Open Sans');
                $nonprofit_fontArray = array('Abel','Abril Fatface','Aclonica','Actor','Adamina','Aguafina Script','Aladin','Aldrich','Alice','Alike Angular','Alike','Allan','Allerta Stencil','Allerta','Amaranth','Amatic SC','Andada','Andika','Annie Use Your Telescope','Anonymous Pro','Antic','Anton','Arapey','Architects Daughter','Arimo','Artifika','Arvo','Asset','Astloch','Atomic Age','Aubrey','Bangers','Bentham','Bevan','Bigshot One','Bitter','Black Ops One','Bowlby One SC','Bowlby One','Brawler','Bubblegum Sans','Buda','Butcherman Caps','Cabin Condensed','Cabin Sketch','Cabin','Cagliostro','Calligraffitti','Candal','Cantarell','Cardo','Carme','Carter One','Caudex','Cedarville Cursive','Changa One','Cherry Cream Soda','Chewy','Chicle','Chivo','Coda Caption','Coda','Comfortaa','Coming Soon','Contrail One','Convergence','Cookie','Copse','Corben','Cousine','Coustard','Covered By Your Grace','Crafty Girls','Creepster Caps','Crimson Text','Crushed','Cuprum','Damion','Dancing Script','Dawning of a New Day','Days One','Delius Swash Caps','Delius Unicase','Delius','Devonshire','Didact Gothic','Dorsa','Dr Sugiyama','Droid Sans Mono','Droid Sans','Droid Serif','EB Garamond','Eater Caps','Expletus Sans','Fanwood Text','Federant','Federo','Fjord One','Fondamento','Fontdiner Swanky','Forum','Francois One','Gentium Basic','Gentium Book Basic','Geo','Geostar Fill','Geostar','Give You Glory','Gloria Hallelujah','Goblin One','Gochi Hand','Goudy Bookletter 1911','Gravitas One','Gruppo','Hammersmith One','Herr Von Muellerhoff','Holtwood One SC','Homemade Apple','IM Fell DW Pica SC','IM Fell DW Pica','IM Fell Double Pica SC','IM Fell Double Pica','IM Fell English SC','IM Fell English','IM Fell French Canon SC','IM Fell French Canon','IM Fell Great Primer SC','IM Fell Great Primer','Iceland','Inconsolata','Indie Flower','Irish Grover','Istok Web','Jockey One','Josefin Sans','Josefin Slab','Judson','Julee','Jura','Just Another Hand','Just Me Again Down Here','Kameron','Karla', 'Kelly Slab','Kenia','Knewave','Kranky','Kreon','Kristi','La Belle Aurore','Lancelot','Lato','League Script','Leckerli One','Lekton','Lemon','Limelight','Linden Hill','Lobster Two','Lobster','Lora','Love Ya Like A Sister','Loved by the King','Luckiest Guy','Maiden Orange','Mako','Marck Script','Marvel','Mate SC','Mate','Maven Pro','Meddon','MedievalSharp','Megrim','Merienda One','Merriweather','Metrophobic','Michroma','Miltonian Tattoo','Miltonian','Miss Fajardose','Miss Saint Delafield','Modern Antiqua','Molengo','Monofett','Monoton','Monsieur La Doulaise','Montez','Mountains of Christmas','Mr Bedford','Mr Dafoe','Mr De Haviland','Mrs Sheppards','Muli','Neucha','Neuton','News Cycle','Niconne','Nixie One','Nobile','Nosifer Caps','Nothing You Could Do','Nova Cut','Nova Flat','Nova Mono','Nova Oval','Nova Round','Nova Script','Nova Slim','Nova Square','Numans','Nunito','Old Standard TT','Open Sans Condensed','Open Sans','Orbitron','Oswald','Over the Rainbow','Ovo','PT Sans Caption','PT Sans Narrow','PT Sans','PT Serif Caption','PT Serif','Pacifico','Passero One','Patrick Hand','Paytone One','Permanent Marker','Petrona','Philosopher','Piedra','Pinyon Script','Play','Playfair Display','Podkova','Poller One','Poly','Pompiere','Prata','Prociono','Puritan','Quattrocento Sans','Quattrocento','Questrial','Quicksand','Radley','Raleway','Rammetto One','Rancho','Rationale','Redressed','Reenie Beanie','Ribeye Marrow','Ribeye','Righteous','Rochester','Rock Salt','Rokkitt','Rosario','Ruslan Display','Salsa','Sancreek','Sansita One','Satisfy','Schoolbell','Shadows Into Light','Shanti','Short Stack','Sigmar One','Signika Negative','Signika','Six Caps','Slackey','Smokum','Smythe','Sniglet','Snippet','Sorts Mill Goudy','Special Elite','Spinnaker','Spirax','Stardos Stencil','Sue Ellen Francisco','Sunshiney','Supermercado One','Swanky and Moo Moo','Syncopate','Tangerine','Tenor Sans','Terminal Dosis','The Girl Next Door','Tienne','Tinos','Tulpen One','Ubuntu Condensed','Ubuntu Mono','Ubuntu','Ultra','UnifrakturCook','UnifrakturMaguntia','Unkempt','Unlock','Unna','VT323','Varela Round','Varela','Vast Shadow','Vibur','Vidaloka','Volkhov','Vollkorn','Voltaire','Waiting for the Sunrise','Wallpoet','Walter Turncoat','Wire One','Yanone Kaffeesatz','Yellowtail','Yeseva One','Zeyada','Montserrat');
                ?>
                <table>
                  <tbody>
                    <tr>
                      <td>
                        <label for="nonprofit_body_font_familly"><?php echo esc_html__('Font family :', 'nonprofit'); ?></label>
                      </td>
                      <td>
                        <select name="nonprofit_body_font_familly" id="nonprofit_body_font_familly" class="font_familly">
                          <option value="default"><?php echo esc_html__("Default", 'nonprofit') ?></option>
                          <?php foreach ( $nonprofit_fontArray as $pititablo){
                            $font_name=$pititablo;
                            ?>
                          <option value="<?php echo esc_attr($pititablo) ?>" <?php if(nonprofit_get_option('nonprofit_body_font_familly' ,'Open Sans')== $font_name) echo "selected='selected'" ?> ><?php echo esc_attr($pititablo) ?></option>
                         <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="nonprofit_body_font_weight"><?php echo esc_html__('Font weight and style ', 'nonprofit'); ?>:</label>
                      </td>
                      <td>
                        <select name="nonprofit_body_font_weight" id="nonprofit_body_font_weight" class="font_weight">
                          <option value="400" <?php if (nonprofit_get_option('nonprofit_body_font_weight' ,'400') == 400) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Normal 400", 'nonprofit') ?></option>
                          <option value="300" <?php if (nonprofit_get_option('nonprofit_body_font_weight' ,'400') == 300) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Light 300", 'nonprofit') ?></option>
                          <option value="600" <?php if (nonprofit_get_option('nonprofit_body_font_weight' ,'400') == 600) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Semi-bold 600", 'nonprofit') ?></option>
                          <option value="700" <?php if (nonprofit_get_option('nonprofit_body_font_weight','400') == 700) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Bold 700", 'nonprofit') ?></option>
                          <option value="800" <?php if (nonprofit_get_option('nonprofit_body_font_weight','400') == 800) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Extra-Bold 800", 'nonprofit') ?></option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="nonprofit_body_transform"><?php echo esc_html__('Text Transform', 'nonprofit'); ?> :</label>
                      </td>
                      <td>
                        <select name="nonprofit_body_transform" id="nonprofit_body_transform" class="text_transform">
                          <option value="none" <?php if (nonprofit_get_option('nonprofit_body_transform', 'none') == 'none') {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Normal", 'nonprofit') ?></option>
                          <option value="uppercase" <?php if (nonprofit_get_option('nonprofit_body_transform', 'none') == 'uppercase') {
                            echo 'selected';
                          } ?>><?php echo esc_html__("UPPERCASE", 'nonprofit') ?></option>
                          <option value="lowercase" <?php if (nonprofit_get_option('nonprofit_body_transform', 'none') == 'lowercase') {
                            echo 'selected';
                          } ?>><?php echo esc_html__("lowercase", 'nonprofit') ?></option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="nonprofit_body_font_size"><?php echo esc_html__('Font size', 'nonprofit'); ?> :</label>
                      </td>
                      <td>
                      <?php $nonprofit_body_font_size = nonprofit_get_option('nonprofit_body_font_size', '15');
                        $fontsizeArray = array('12','14','13','15','16','17','18','19','20','22','24','26','28','30','32','34','36','38','40');
                      ?>
                        <select name="nonprofit_body_font_size" id="nonprofit_body_font_size" class="text_size">
                          <option value="default">Default</option>
                          <?php foreach ( $fontsizeArray as $font_size_item){
                            $font_size = $font_size_item;
                            ?>
                            <option value="<?php echo esc_attr($font_size_item) ?>" <?php if(nonprofit_get_option('nonprofit_body_font_size','15')== $font_size) echo "selected='selected'" ?> ><?php echo esc_attr($font_size_item) ?></option>
                         <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="nonprofit_body_font_subsets"><?php echo esc_html__('Font subsets', 'nonprofit'); ?> :</label>
                      </td>
                      <td>
                        <select id="nonprofit_body_font_subsets" name="nonprofit_body_font_subsets" class="font_subsets">
                          <option value="latin"<?php if (nonprofit_get_option('nonprofit_body_font_subsets', 'latin') == 'latin'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Latin", 'nonprofit') ?></option>
                      <option value="cyrillic-ext"<?php if (nonprofit_get_option('nonprofit_body_font_subsets', 'latin') == 'cyrillic-ext'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Cyrillic Extended", 'nonprofit') ?></option>
                      <option value="greek-ext"<?php if (nonprofit_get_option('nonprofit_body_font_subsets', 'latin') == 'greek-ext'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Greek Extended", 'nonprofit') ?></option>
                      <option value="greek"<?php if (nonprofit_get_option('nonprofit_body_font_subsets', 'latin') == 'greek'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Greek", 'nonprofit') ?></option>
                      <option value="vietnamese"<?php if (nonprofit_get_option('nonprofit_body_font_subsets', 'latin') == 'vietnamese'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Vietnamese", 'nonprofit') ?></option>
                      <option value="latin-ext"<?php if (nonprofit_get_option('nonprofit_body_font_subsets', 'latin') == 'latin-ext'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Latin Extended", 'nonprofit') ?></option>
                      <option value="cyrillic"<?php if (nonprofit_get_option('nonprofit_body_font_subsets', 'latin') == 'cyrillic'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Cyrillic", 'nonprofit') ?></option>
                        </select>
                        <br>
                        <p class="body_font_result" style="font-family: '<?php echo nonprofit_get_option('nonprofit_body_font_familly' ,'Open Sans'); ?>'; font-weight: <?php nonprofit_get_option('nonprofit_body_font_weight','400'); ?>;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        <?php echo esc_html__("tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 'nonprofit') ?></p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
            <td>
              <strong><?php echo esc_html__('Head font family', 'nonprofit'); ?></strong>
            </td>
            <td>
            <table>
              <tbody>
                <tr>
                  <td>
                    <label for="nonprofit_heading_font_familly"><?php echo esc_html__('Font family', 'nonprofit'); ?> :</label>
                  </td>
                  <td>
                    <select name="nonprofit_heading_font_familly" id="nonprofit_heading_font_familly" class="font_familly">
                      <option value="default"><?php echo esc_html__("Default", 'nonprofit') ?></option>
                      <?php
                      $nonprofit_heading_font_familly = nonprofit_get_option('nonprofit_heading_font_familly' ,'Josefin Sans');
                       foreach ( $nonprofit_fontArray as $pititablo){
                        $font_name=$pititablo;?>

                      <option value="<?php echo esc_attr($font_name) ?>" <?php if(nonprofit_get_option('nonprofit_heading_font_familly' ,'Montserrat')== $font_name) echo "selected='selected'" ?> ><?php echo esc_attr($font_name) ?></option>
                     <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="nonprofit_heading_font_weight"><?php echo esc_html__('Font weight and style', 'nonprofit'); ?> :</label>
                  </td>
                  <td>
                    <select name="nonprofit_heading_font_weight" id="nonprofit_heading_font_weight" class="font_weight">
                      <option value="400" <?php if (nonprofit_get_option('nonprofit_heading_font_weight','700') == 400) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Normal 400", 'nonprofit') ?></option>
                          <option value="300" <?php if (nonprofit_get_option('nonprofit_heading_font_weight','700') == 300) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Light 300", 'nonprofit') ?></option>
                          <option value="600" <?php if (nonprofit_get_option('nonprofit_heading_font_weight','700') == 600) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Semi-bold 600", 'nonprofit') ?></option>
                          <option value="700" <?php if (nonprofit_get_option('nonprofit_heading_font_weight','700') == 700) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Bold 700", 'nonprofit') ?></option>
                          <option value="800" <?php if (nonprofit_get_option('nonprofit_heading_font_weight','700') == 800) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Extra-Bold 800", 'nonprofit') ?></option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="nonprofit_heading_text_transform"><?php echo esc_html__('Text Transform', 'nonprofit'); ?> :</label>
                  </td>
                  <td>
                    <select name="nonprofit_heading_text_transform" id="nonprofit_heading_text_transform" class="text_transform">
                      <option value="none" <?php if (nonprofit_get_option('nonprofit_heading_text_transform', 'none') == 'none') {
                        echo 'selected';
                      } ?>><?php echo esc_html__("Normal", 'nonprofit') ?></option>
                      <option value="uppercase" <?php if (nonprofit_get_option('nonprofit_heading_text_transform', 'none') == 'uppercase') {
                        echo 'selected';
                      } ?>><?php echo esc_html__("UPPERCASE", 'nonprofit') ?></option>
                      <option value="lowercase" <?php if (nonprofit_get_option('nonprofit_heading_text_transform', 'none') == 'lowercase') {
                        echo 'selected';
                      } ?>><?php echo esc_html__("lowercase", 'nonprofit') ?></option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="nonprofit_heading_font_subsets"><?php echo esc_html__('Font subsets', 'nonprofit'); ?> :</label>
                  </td>
                  <td>
                    <select id="nonprofit_heading_font_subsets" name="nonprofit_heading_font_subsets" class="font_subsets">
                      <option value="latin"<?php if (nonprofit_get_option('nonprofit_navigation_font_subsets', 'latin') == 'latin'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Latin", 'nonprofit') ?></option>
                      <option value="cyrillic-ext"<?php if (nonprofit_get_option('nonprofit_heading_font_subsets', 'latin') == 'cyrillic-ext'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Cyrillic Extended", 'nonprofit') ?></option>
                      <option value="greek-ext"<?php if (nonprofit_get_option('nonprofit_heading_font_subsets', 'latin') == 'greek-ext'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Greek Extended", 'nonprofit') ?></option>
                      <option value="greek"<?php if (nonprofit_get_option('nonprofit_heading_font_subsets', 'latin') == 'greek'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Greek", 'nonprofit') ?></option>
                      <option value="vietnamese"<?php if (nonprofit_get_option('nonprofit_heading_font_subsets', 'latin') == 'vietnamese'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Vietnamese", 'nonprofit') ?></option>
                      <option value="latin-ext"<?php if (nonprofit_get_option('nonprofit_heading_font_subsets', 'latin') == 'latin-ext'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Latin Extended", 'nonprofit') ?></option>
                      <option value="cyrillic"<?php if (nonprofit_get_option('nonprofit_heading_font_subsets', 'latin') == 'cyrillic'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Cyrillic", 'nonprofit') ?></option>
                    </select>
                    <h2 class="heading_font_result" style="font-family: '<?php echo nonprofit_get_option('nonprofit_heading_font_familly' ,'Montserrat'); ?>'; font-weight: <?php nonprofit_get_option('nonprofit_heading_font_weight','400'); ?>;">Lorem ipsum dolor sit amet, consectetur adipisicing elit</h2>
                  </td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
          <tr>
            <td>
              <strong><?php echo esc_html__('Navigation font family', 'nonprofit'); ?></strong>
            </td>
            <td>
            <table>
              <tbody>
                <tr>
                  <td>
                    <label for="nonprofit_navigation_font_familly"><?php echo esc_html__('Font family', 'nonprofit'); ?> :</label>
                  </td>
                  <td>
                    <select name="nonprofit_navigation_font_familly" id="nonprofit_navigation_font_familly" class="font_familly">
                    <option value="default"><?php echo esc_html__("Default", 'nonprofit') ?></option>
                      <?php
                      $nonprofit_navigation_font_familly = nonprofit_get_option('nonprofit_navigation_font_familly' ,'Open Sans');
                       foreach ( $nonprofit_fontArray as $pititablo){
                        $font_name=$pititablo;?>

                      <option value="<?php echo esc_attr($font_name) ?>" <?php if(nonprofit_get_option('nonprofit_navigation_font_familly' ,'Montserrat')== $font_name) echo "selected='selected'" ?> ><?php echo esc_attr($font_name) ?></option>
                     <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="nonprofit_navigation_font_weight"><?php echo esc_html__('Font weight and style', 'nonprofit'); ?> :</label>
                  </td>
                  <td>
                    <select name="nonprofit_navigation_font_weight" id="nonprofit_navigation_font_weight" class="font_weight">
                      <option value="400" <?php if (nonprofit_get_option('nonprofit_navigation_font_weight','600') == 400) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Normal 400", 'nonprofit') ?></option>
                          <option value="300" <?php if (nonprofit_get_option('nonprofit_navigation_font_weight','600') == 300) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Light 300", 'nonprofit') ?></option>
                          <option value="600" <?php if (nonprofit_get_option('nonprofit_navigation_font_weight','600') == 600) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Semi-bold 600", 'nonprofit') ?></option>
                          <option value="700" <?php if (nonprofit_get_option('nonprofit_navigation_font_weight','600') == 700) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Bold 700", 'nonprofit') ?></option>
                          <option value="800" <?php if (nonprofit_get_option('nonprofit_navigation_font_weight','600') == 800) {
                            echo 'selected';
                          } ?>><?php echo esc_html__("Extra-Bold 800", 'nonprofit') ?></option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="nonprofit_navigation_text_transform"><?php echo esc_html__('Text Transform', 'nonprofit'); ?> :</label>
                  </td>
                  <td>
                    <select name="nonprofit_navigation_text_transform" id="nonprofit_navigation_text_transform" class="text_transform">
                      <option value="none" <?php if (nonprofit_get_option('nonprofit_navigation_text_transform', 'none') == 'none') {
                        echo 'selected';
                      } ?>><?php echo esc_html__("Normal", 'nonprofit') ?></option>
                      <option value="uppercase" <?php if (nonprofit_get_option('nonprofit_navigation_text_transform', 'none') == 'uppercase') {
                        echo 'selected';
                      } ?>><?php echo esc_html__("UPPERCASE", 'nonprofit') ?></option>
                      <option value="lowercase" <?php if (nonprofit_get_option('nonprofit_navigation_text_transform', 'none') == 'lowercase') {
                        echo 'selected';
                      } ?>><?php echo esc_html__("lowercase", 'nonprofit') ?></option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="nonprofit_navigation_font_size"><?php echo esc_html__('Font size', 'nonprofit'); ?> :</label>
                  </td>
                  <td>
                  <?php $nonprofit_body_font_size = nonprofit_get_option('nonprofit_navigation_font_size','14');
                  ?>
                    <select name="nonprofit_navigation_font_size" id="nonprofit_navigation_font_size" class="text_size">
                      <option value="default">Default</option>
                      <?php foreach ( $fontsizeArray as $font_size_item){
                        $font_size = $font_size_item;
                        ?>
                        <option value="<?php echo esc_attr($font_size_item) ?>" <?php if(nonprofit_get_option('nonprofit_navigation_font_size','14')== $font_size) echo "selected='selected'" ?> ><?php echo esc_attr($font_size_item) ?></option>
                     <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="nonprofit_navigation_font_subsets"><?php echo esc_html__('Font subsets ', 'nonprofit'); ?>:</label>
                  </td>
                  <td>
                    <select id="nonprofit_navigation_font_subsets" name="nonprofit_navigation_font_subsets" class="font_subsets">
                      <option value="latin"<?php if (nonprofit_get_option('nonprofit_navigation_font_subsets', 'latin') == 'latin'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Latin", 'nonprofit') ?></option>
                      <option value="cyrillic-ext"<?php if (nonprofit_get_option('nonprofit_navigation_font_subsets', 'latin') == 'cyrillic-ext'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Cyrillic Extended", 'nonprofit') ?></option>
                      <option value="greek-ext"<?php if (nonprofit_get_option('nonprofit_navigation_font_subsets', 'latin') == 'greek-ext'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Greek Extended", 'nonprofit') ?></option>
                      <option value="greek"<?php if (nonprofit_get_option('nonprofit_navigation_font_subsets', 'latin') == 'greek'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Greek", 'nonprofit') ?></option>
                      <option value="vietnamese"<?php if (nonprofit_get_option('nonprofit_navigation_font_subsets', 'latin') == 'vietnamese'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Vietnamese", 'nonprofit') ?></option>
                      <option value="latin-ext"<?php if (nonprofit_get_option('nonprofit_navigation_font_subsets', 'latin') == 'latin-ext'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Latin Extended", 'nonprofit') ?></option>
                      <option value="cyrillic"<?php if (nonprofit_get_option('nonprofit_navigation_font_subsets', 'latin') == 'cyrillic'){
                        echo "selected";
                        } ?>><?php echo esc_html__("Cyrillic", 'nonprofit') ?></option>
                    </select>
                    <ul class="navigation-list" style="font-family: '<?php echo nonprofit_get_option('nonprofit_navigation_font_familly' ,'Montserrat'); ?>'; font-weight: <?php nonprofit_get_option('nonprofit_navigation_font_weight','400'); ?>;">
                      <li><?php echo esc_html__('Home', 'nonprofit'); ?></li>
                      <li><?php echo esc_html__('About', 'nonprofit'); ?></li>
                      <li><?php echo esc_html__('Services', 'nonprofit'); ?></li>
                    </ul>
                  </td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>

          </tbody>
          </table>
        </div>
       
        <!-- Custom css & js -->
        <div id="tabs-4">
        <table class="form-table">
          <tbody>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Custom css', 'nonprofit'); ?></strong>
                </td>
                <td>
                  <textarea rows="10" cols="70" name="nonprofit_theme_custom_css" placeholder="Put your style here"><?php echo nonprofit_get_option('nonprofit_theme_custom_css',''); ?></textarea>
                </td>
              </tr>
               <tr>
                <td>
                  <strong><?php echo esc_html__('Custom JavaScript','nonprofit')?></strong>
                </td>

                <td>
                	<script>
                	<?php echo nonprofit_get_option('nonprofit_theme_custom_js','') ?></script>
                  <textarea rows="10" cols="70" name="nonprofit_theme_custom_js" placeholder="Put your JavaScript here"><?php echo nonprofit_get_option('nonprofit_theme_custom_js',''); ?></textarea>
                </td>
              </tr>
          </tbody>
        </table>
        </div>
		<!-- Footer Settings -->
        <div id="tabs-5">
            <table class="form-table">
            <tbody>
             <tr>
                <td><strong><?php echo esc_html__('Footer columns', 'nonprofit'); ?></strong></td>
                <td class="nonprofit_footer_columns">
                   <?php $nonprofit_footer_columns = nonprofit_get_option('nonprofit_footer_columns','three_columns');
                   	
                   ?>
                    <input type="radio" id="nonprofit_footer1" name="nonprofit_footer_columns" value="one_columns" <?php if($nonprofit_footer_columns == 'one_columns') { echo "checked"; }  ?> />
                    <label for="nonprofit_footer1" class="nonprofit_footer1 <?php if($nonprofit_footer_columns == 'one_columns') { echo 'label_selected '; }  ?>"></label>

                    <input type="radio" id="nonprofit_footer2" name="nonprofit_footer_columns" value="tow_a_columns" <?php if($nonprofit_footer_columns == 'tow_a_columns') { echo "checked"; }  ?> />
                    <label for="nonprofit_footer2" class="nonprofit_footer2 <?php if($nonprofit_footer_columns == 'tow_a_columns') { echo 'label_selected '; }  ?>"></label>

                    <input type="radio" id="nonprofit_footer3" name="nonprofit_footer_columns" value="tow_b_columns" <?php if($nonprofit_footer_columns == 'tow_b_columns') { echo "checked"; }  ?> />
                    <label for="nonprofit_footer3" class="nonprofit_footer3 <?php if($nonprofit_footer_columns == 'tow_b_columns') { echo 'label_selected '; }  ?>"></label>

                    <input type="radio" id="nonprofit_footer4" name="nonprofit_footer_columns" value="tow_c_columns" <?php if($nonprofit_footer_columns == 'tow_c_columns') { echo "checked"; }  ?> />
                    <label for="nonprofit_footer4" class="nonprofit_footer4 <?php if($nonprofit_footer_columns == 'tow_c_columns') { echo 'label_selected '; }  ?>"></label>

                    <input type="radio" id="nonprofit_footer5" name="nonprofit_footer_columns" value="three_columns" <?php if($nonprofit_footer_columns == 'three_columns') { echo "checked"; }  ?> />
                    <label for="nonprofit_footer5" class="nonprofit_footer5 <?php  if($nonprofit_footer_columns == 'three_columns') { echo 'label_selected'; }  ?>"></label>
                    
                    <input type="radio" id="nonprofit_footer6" name="nonprofit_footer_columns" value="four_columns" <?php if($nonprofit_footer_columns == 'four_columns') { echo "checked"; }  ?> />
                    <label for="nonprofit_footer6" class="nonprofit_footer6 <?php  if($nonprofit_footer_columns == 'four_columns') { echo 'label_selected'; }  ?>"></label>
                </td>
              </tr>

              <tr>
                <td>
                  <label for="nonprofit_footer_style"><strong><?php echo esc_html__('Footer Style', 'nonprofit'); ?>:</strong></label>
                </td>
                <td>
                  <select name="nonprofit_footer_style" id="nonprofit_footer_style" class="nonprofit_footer_style">

                    <option value="1" <?php if ( nonprofit_get_option( 'nonprofit_footer_style', '1' ) == '1' ) echo "selected='selected'"; ?>>Style 1</option>
                    <option value="2" <?php if ( nonprofit_get_option( 'nonprofit_footer_style', '1' ) == '2' ) echo "selected='selected'"; ?>>Style 2</option>
                    <option value="3" <?php if ( nonprofit_get_option( 'nonprofit_footer_style', '1' ) == '3' ) echo "selected='selected'"; ?>>Style 3</option>
                    <option value="4" <?php if ( nonprofit_get_option( 'nonprofit_footer_style', '1' ) == '4' ) echo "selected='selected'"; ?>>Style 4</option>
                    <option value="none" <?php if ( nonprofit_get_option( 'nonprofit_footer_style', '1' ) == 'none' ) echo "selected='selected'"; ?>>None</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Footer Background Image', 'nonprofit'); ?></strong>
                </td>
                <?php 
                
                 $nonprofit_footer_bg_img_path = nonprofit_get_option('nonprofit_footer_bg_img_path','');
                ?>  
                <td>
                  <input type="text" name="nonprofit_footer_bg_img_path" id="nonprofit_footer_bg_img_path" value="<?php print $nonprofit_footer_bg_img_path ?>" />
                  <input class="button" name="_unique_name_button" id="nonprofit_upload_footer_btn" value="<?php echo esc_html__('Upload', 'nonprofit') ?>" /></br>
                </td>
                <td> 
                  	<?php
                  	 if(!empty($nonprofit_footer_bg_img_path)): ?> <img src="<?php print $nonprofit_footer_bg_img_path; ?>" style="max-height: 70px;" /> <?php endif;
                    ?>
                </td>
              </tr>
              
               <tr>
                <td>
                  <strong><?php echo esc_html__('Footer Copyright text', 'nonprofit'); ?></strong>
                 </td>
                 <td>
                  <?php
                 $nonprofit_copyright = (!empty($nonprofit_copyright)) ?  nonprofit_get_option('nonprofit_copyright','') : '© 2017 Nonprofit All rights reserved.'; ?>
                  <input type="text" class="nonprofit_txt_big" name="nonprofit_copyright" placeholder="Footer Copyright text" value="<?php echo esc_attr($nonprofit_copyright); ?>"></td>
              </tr>
            </tbody>
            </table>
        </div>

        <!---------------------------------- Wd Importer ------------------------>
        <?php
        if ( is_plugin_active( 'wd-main-plugin/wd-main-plugin.php' ) ) {
            ?>
            <div id="tabs-6">
                <div id="wd-metaboxes-general" class="wrap wd-page wd-page-info" style="padding: 20px;background-color: #FFF;">
                    <table class="form-table">
                        <tbody>
                        <tr>
                            <td style="display: none;"></td>
                            <td class="import-demo-screenshot" style="padding-left: 250px;">

                                <em class="wd-field-description"><?php echo esc_html__('Select demo to import', 'nonprofit'); ?> : </em>
                                <select name="Demo_selector" id="Demo_selector" class="form-control wd-form-element">
                                    <option value="demo-1">Demo 1</option>
                                    <option value="demo-2">Demo 2</option>
                                </select><br>
                                <label class="demo-1 demos_label" for="demo-1"></label>
                                <label class="demo-2 demos_label" for="demo-2" style="display:none"></label>



                            </td>
                        </tr>
                        <tr>
                            <td style="display:none;">

                            </td>
                            <td style="padding-left: 250px;">
                                <em class="wd-field-description"><?php echo esc_html__('Import Type', 'nonprofit'); ?> : </em>
                                <select name="import_option" id="import_option" class="form-control wd-form-element">
                                    <option value=""><?php echo esc_html__('Please Select', 'nonprofit'); ?></option>
                                    <option value="complete_content"><?php echo esc_html__('All', 'nonprofit'); ?></option>
                                    <option value="content"><?php echo esc_html__('Content', 'nonprofit'); ?></option>
                                    <option value="widgets"><?php echo esc_html__('Widgets', 'nonprofit'); ?></option>
                                    <option value="options"><?php echo esc_html__('Options', 'nonprofit'); ?></option>
                                    <option value="menus"><?php echo esc_html__('Menus', 'nonprofit'); ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr id="tr_import_attachments" style="display:none;" >
                            <td style="display: none;">
                            </td>
                            <td style="padding-left: 250px;">
                                <p><?php echo esc_html__('Do you want to import media files?', 'nonprofit'); ?></p>
                                <input type="checkbox" value="1" class="wd-form-element" name="import_attachments" id="import_attachments"/>
                            </td>
                        </tr>
                        <tr id="tr_delete_menus" style="display:none;">
                            <td style="display: none;">
                            </td>
                            <td style="padding-left: 250px;">
                                <p><?php echo esc_html__('Do you want to delete all existing menus?', 'nonprofit'); ?></p>
                                <input type="checkbox" value="1" class="wd-form-element" name="delete_menus" id="delete_menus" />
                            </td>
                        </tr>
                        <tr>
                            <td style="display: none;">

                            </td>
                            <td style="padding-left: 250px;">
                                <input type="submit" class="button button-primary" value="<?php echo esc_html__('Import', 'nonprofit'); ?>" name="import" id="import_demo_data" />
                                <img id="loading_gif" src="<?php echo get_template_directory_uri() . '/images/loading_import.gif'; ?>" style="margin-left:20px; display:none" />
                                <img id="OK_result" src="<?php echo get_template_directory_uri() . '/images/OK_result.png'; ?>" style="margin-left:20px; display:none" />
                                <img id="NOK_result" src="<?php echo get_template_directory_uri() . '/images/NOK_result.png'; ?>" style="margin-left:20px; display:none" />
                            </td>
                        </tr>
                        <tr>
                            <td style="display: none;">
                            </td>
                            <td style="padding-left: 250px;">
                                <span><?php esc_html_e('The import process may take some time. Please be patient.', 'nonprofit') ?> </span><br />
                                <div class="import_load">
                                    <div class="wd-progress-bar-wrapper html5-progress-bar">
                                        <div class="progress-bar-wrapper">
                                            <progress id="progressbar" value="0" max="100"></progress>
                                        </div>
                                        <div class="progress-value">0%</div>
                                        <div class="progress-bar-message"></div>
                                        <div class="error-message" style="color:#990000; font-weight:bold;"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="display: none;"></td>
                            <td style="text-align: center;">
                                <div class="alert alert-warning">
                                    <strong><?php esc_html_e('Important notes:', 'nonprofit') ?></strong>
                                    <ul>
                                        <li><?php esc_html_e('Please note that import process will take time needed to download all attachments from demo web site.', 'nonprofit'); ?></li>
                                        <li> <?php _e('If you plan to use shop, please install <b>WooCommerce</b> before you run import.', 'nonprofit')?></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>


                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        jQuery(document).on('change', '#Demo_selector', function() {
                            jQuery(".demos_label").hide();
                            jQuery(".demos_label."+jQuery(this).val()).show();
                        });
                        jQuery(document).on('change', '#import_option', function() {
                            if(jQuery(this).val()=='content') {
                                jQuery("#tr_import_attachments").show();
                                jQuery("#tr_delete_menus").hide();
                            } else if(jQuery(this).val()=='widgets') {
                                jQuery("#tr_import_attachments").hide();
                                jQuery("#tr_delete_menus").hide();
                            }else if(jQuery(this).val()=='menus') {
                                jQuery("#tr_import_attachments").hide();
                                jQuery("#tr_delete_menus").show();
                            } else if(jQuery(this).val()=='complete_content') {
                                jQuery("#tr_import_attachments").show();
                                jQuery("#tr_delete_menus").show();
                            } else{
                                jQuery("#tr_import_attachments").hide();
                                jQuery("#tr_delete_menus").hide();
                            }
                        });
                        jQuery(document).on('click', '#import_demo_data', function(e) {
                            e.preventDefault();

                            if (jQuery( "#import_option" ).val() == "") {
                                alert('Please select Import Type.');
                                return false;
                            }
                            if (confirm('Are you sure, you want to import Demo Data now?')) {
                                jQuery('.import_load').css('display','block');
                                var progressbar = jQuery('#progressbar');
                                var import_opt = jQuery( "#import_option" ).val();

                                var import_expl = jQuery( "#Demo_selector" ).val();
                                var p = 0;

                                jQuery('.progress-value').html((0) + '%');
                                progressbar.val(0);
                                jQuery('.progress-bar-message').html('');
                                jQuery('.error-message').html('');
                                jQuery('#loading_gif').css({display: "inline"});
                                jQuery('#OK_result').css({display: "none"});
                                jQuery('#NOK_result').css({display: "none"});
                                if(import_opt == 'content'){
                                    for(var i = 1; i <= 10; i++){
                                        var str;
                                        if (i < 10) str = 'demo-file-0'+i+'.xml';
                                        else str = 'demo-file-'+i+'.xml';
                                        jQuery.ajax({
                                            type: 'POST',
                                            url: ajaxurl,
                                            data: {
                                                action: 'nonprofit_dataImport',
                                                xml: str,
                                                example: import_expl,
                                                import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
                                            },
                                            success: function(data, textStatus, XMLHttpRequest){
                                                console.log('Success!!' + data );
                                                p += 10;
                                                jQuery('.progress-value').html((p) + '%');
                                                progressbar.val(p);
                                                if (p == 90) {
                                                    str = 'demo-file-10.xml';
                                                    jQuery.ajax({
                                                        type: 'POST',
                                                        url: ajaxurl,
                                                        data: {
                                                            action: 'nonprofit_dataImport',
                                                            xml: str,
                                                            example: import_expl,
                                                            import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
                                                        },
                                                        success: function(data, textStatus, XMLHttpRequest){
                                                            p+= 10;
                                                            jQuery('.progress-value').html((p) + '%');
                                                            progressbar.val(p);
                                                            jQuery('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
                                                            jQuery('#loading_gif').css({display: "none"});
                                                            jQuery('#OK_result').css({display: "inline"});
                                                        },
                                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                                            jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
                                                            jQuery('#loading_gif').css({display: "none"});
                                                            jQuery('#NOK_result').css({display: "inline"});
                                                        }
                                                    });
                                                }
                                            },
                                            error: function(MLHttpRequest, textStatus, errorThrown){
                                                jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
                                                jQuery('#loading_gif').css({display: "none"});
                                                jQuery('#NOK_result').css({display: "inline"});
                                                console.log('Error!!');
                                            }
                                        });
                                    }
                                } else if(import_opt == 'widgets') {
                                    jQuery.ajax({
                                        type: 'POST',
                                        url: ajaxurl,
                                        data: {
                                            action: 'nonprofit_widgetsImport',
                                            example: import_expl
                                        },
                                        success: function(data, textStatus, XMLHttpRequest){
                                            console.log('widgets imported');
                                            jQuery('.progress-value').html((100) + '%');
                                            progressbar.val(100);
                                            jQuery('.progress-bar-message').html('<div class="alert alert-success"><strong>Widgets import is completed</strong></div>');
                                            jQuery('#loading_gif').css({display: "none"});
                                            jQuery('#OK_result').css({display: "inline"});
                                        },
                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                            jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
                                            jQuery('#loading_gif').css({display: "none"});
                                            jQuery('#NOK_result').css({display: "inline"});
                                        }
                                    });
                                } else if(import_opt == 'menus') {
                                    jQuery.ajax({
                                        type: 'POST',
                                        url: ajaxurl,
                                        data: {
                                            action: 'nonprofit_menuImport',
                                            example: import_expl,
                                            delete_menus: (jQuery("#delete_menus").is(':checked') ? 1 : 0)
                                        },
                                        success: function(data, textStatus, XMLHttpRequest){
                                            console.log('Menus imported' + data );
                                            jQuery('.progress-value').html((100) + '%');
                                            progressbar.val(100);
                                            jQuery('.progress-bar-message').html('<div class="alert alert-success"><strong>Menus import is completed</strong></div>');
                                            jQuery('#loading_gif').css({display: "none"});
                                            jQuery('#OK_result').css({display: "inline"});
                                        },
                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                            jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
                                            jQuery('#loading_gif').css({display: "none"});
                                            jQuery('#NOK_result').css({display: "inline"});
                                        }
                                    });
                                } else if(import_opt == 'options'){
                                    jQuery.ajax({
                                        type: 'POST',
                                        url: ajaxurl,
                                        data: {
                                            action: 'nonprofit_import_options',
                                            example: import_expl
                                        },
                                        success: function(data, textStatus, XMLHttpRequest){
                                            console.log('options imported');
                                            jQuery('.progress-value').html((100) + '%');
                                            progressbar.val(100);
                                            jQuery('.progress-bar-message').html('<div class="alert alert-success"><strong>Options import is completed</strong></div>');
                                            jQuery('#loading_gif').css({display: "none"});
                                            jQuery('#OK_result').css({display: "inline"});
                                        },
                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                            jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
                                            jQuery('#loading_gif').css({display: "none"});
                                            jQuery('#NOK_result').css({display: "inline"});
                                        }
                                    });
                                }else if(import_opt == 'complete_content'){
                                    for(var i=1;i<10;i++){
                                        var str;
                                        if (i < 10) str = 'demo-file-0'+i+'.xml';
                                        else str = 'demo-file-'+i+'.xml';
                                        jQuery.ajax({
                                            type: 'POST',
                                            url: ajaxurl,
                                            data: {
                                                action: 'nonprofit_dataImport',
                                                xml: str,
                                                example: import_expl,
                                                import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
                                            },
                                            success: function(data, textStatus, XMLHttpRequest){
                                                p+= 7;
                                                jQuery('.progress-value').html((p) + '%');
                                                progressbar.val(p);
                                                if (p == 63) {
                                                    str = 'demo-file-10.xml';
                                                    jQuery.ajax({
                                                        type: 'POST',
                                                        url: ajaxurl,
                                                        data: {
                                                            action: 'nonprofit_dataImport',
                                                            xml: str,
                                                            example: import_expl,
                                                            import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
                                                        },
                                                        success: function(data, textStatus, XMLHttpRequest){
                                                            p+= 7;
                                                            jQuery('.progress-value').html((p) + '%');
                                                            progressbar.val(p);
                                                            jQuery('.progress-bar-message').append('<div class="alert alert-success">Content imported</div>');
                                                            jQuery.ajax({
                                                                type: 'POST',
                                                                url: ajaxurl,
                                                                data: {
                                                                    action: 'nonprofit_import_options',
                                                                    example: import_expl
                                                                },
                                                                success: function(data, textStatus, XMLHttpRequest){
                                                                    p+= 7;
                                                                    jQuery('.progress-value').html((p) + '%');
                                                                    progressbar.val(p);
                                                                    jQuery('.progress-bar-message').append('<div class="alert alert-success">Options imported</div>');
                                                                    console.log('options imported');
                                                                    jQuery.ajax({
                                                                        type: 'POST',
                                                                        url: ajaxurl,
                                                                        data: {
                                                                            action: 'nonprofit_widgetsImport',
                                                                            example: import_expl
                                                                        },
                                                                        success: function(data, textStatus, XMLHttpRequest){
                                                                            p+= 7;
                                                                            jQuery('.progress-value').html((p) + '%');
                                                                            progressbar.val(p);
                                                                            jQuery('.progress-bar-message').append('<div class="alert alert-success">Widgets imported</div>');

                                                                            str = 'menus.xml';
                                                                            jQuery.ajax({
                                                                                type: 'POST',
                                                                                url: ajaxurl,
                                                                                data: {
                                                                                    action: 'nonprofit_menuImport',
                                                                                    xml: str,
                                                                                    example: import_expl,
                                                                                    import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0),
                                                                                    delete_menus: (jQuery("#delete_menus").is(':checked') ? 1 : 0)
                                                                                },
                                                                                success: function(data, textStatus, XMLHttpRequest){
                                                                                    p+= 7;
                                                                                    jQuery('.progress-value').html((p) + '%');
                                                                                    progressbar.val(p);
                                                                                    jQuery('.progress-bar-message').append('<div class="alert alert-success">Menus imported</div>');
                                                                                    console.log("menu imported");
                                                                                    jQuery.ajax({
                                                                                        type: 'POST',
                                                                                        url: ajaxurl,
                                                                                        data: {
                                                                                            action: 'nonprofit_otherImport',
                                                                                            example: import_expl,
                                                                                            delete_menus: (jQuery("#delete_menus").is(':checked') ? 1 : 0)
                                                                                        },
                                                                                        success: function(data, textStatus, XMLHttpRequest){
                                                                                            jQuery('.progress-value').html((100) + '%');
                                                                                            progressbar.val(100);
                                                                                            jQuery('.progress-bar-message').append('<div class="alert alert-success"><strong>Import is completed.</strong></div>');
                                                                                            jQuery('#loading_gif').css({display: "none"});
                                                                                            jQuery('#OK_result').css({display: "inline"});
                                                                                        },
                                                                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                                                                            jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
                                                                                            jQuery('#loading_gif').css({display: "none"});
                                                                                            jQuery('#NOK_result').css({display: "inline"});
                                                                                        }
                                                                                    });
                                                                                },
                                                                                error: function(MLHttpRequest, textStatus, errorThrown){
                                                                                    jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
                                                                                    jQuery('#loading_gif').css({display: "none"});
                                                                                    jQuery('#NOK_result').css({display: "inline"});
                                                                                }
                                                                            });

                                                                        },
                                                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                                                            jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
                                                                            jQuery('#loading_gif').css({display: "none"});
                                                                            jQuery('#NOK_result').css({display: "inline"});
                                                                        }
                                                                    });
                                                                },
                                                                error: function(MLHttpRequest, textStatus, errorThrown){
                                                                    jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
                                                                    jQuery('#loading_gif').css({display: "none"});
                                                                    jQuery('#NOK_result').css({display: "inline"});
                                                                }
                                                            });
                                                        },
                                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                                            jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
                                                            jQuery('#loading_gif').css({display: "none"});
                                                            jQuery('#NOK_result').css({display: "inline"});
                                                        }
                                                    });
                                                }
                                            },
                                            error: function(MLHttpRequest, textStatus, errorThrown){
                                                jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
                                                jQuery('#loading_gif').css({display: "none"});
                                                jQuery('#NOK_result').css({display: "inline"});
                                            }
                                        });
                                    }




                                }
                            }
                            return false;
                        });
                    });

                    function get_error_from_response(response){
                        var responseText=response.responseText.replace('{','');
                        responseText = responseText.replace('}','');
                        var trainindIdArray = responseText.split(':');
                        responseText=trainindIdArray[trainindIdArray.length-1].replace('"','').replace('"','');
                        return responseText;
                    }
                </script>

            </div>
        <?php } ?>
    </div>
</div>
      <div class="eight columns wp-core-ui"> <p><button  type="submit" name="search" value="Update Options" class="button success button-primary" /><?php echo esc_html__('Update Options', 'nonprofit'); ?></button></p></div>
      </form>
      </div>


      <div style="clear: both;">
          <br/><br/><br/><br/><br/><br/>
      </div>


      <div class="wb-item">
          <div class="icon-themes">

          </div>
      </div>
      <?php
  }
}


if(!function_exists('nonprofit_import_revslider')){
    function nonprofit_import_revslider() {

        wp_enqueue_media();

        wp_enqueue_script('wp-color-picker');
        wp_enqueue_style( 'wp-color-picker' );


        wp_enqueue_script('colorpick',    get_template_directory_uri() . "/js/bootstrap-colorpicker.min.js", array( 'jquery' ) );
        wp_enqueue_style ('colorpick',    get_template_directory_uri() . "/css/bootstrap-colorpicker.min.css");
        ?>

        <div class="panel-logo">
            <h2>Voip Revsliders Import</h2>
        </div>
        <div class="wd-cpanel">
            <div id="wd-Panel"  method="POST" action="">
                <div id="tabs" class="ui-tabs-vertical ui-helper-clearfix">
                    <div id="tabs-7">
                        <form action="<?php echo admin_url("admin-ajax.php"); ?>" enctype="multipart/form-data" method="post" >
                            <div id="wd-metaboxes-general" class="wrap wd-page wd-page-info" style="padding: 20px;background-color: #FFF;">
                                <table class="form-table">
                                    <tbody>
                                    <tr>
                                        <td style="display:none;">
                                            <input type="hidden" name="action" value="revslider_ajax_action">
                                            <input type="hidden" name="client_action" value="import_slider_slidersview">
                                            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce("revslider_actions"); ?>">
                                        </td>
                                        <td style="padding-left: 250px;">
                                            <?php _e("Choose the import file : You can select the demo file \"zip file\" inside the folder \"wp-content\\themes\\nonprofit\\inc\\revslider_import_files\\\" ", 'nonprofit'); ?>:
                                            <br><br>
                                            <input type="file" size="60" name="import_file" class="input_import_slider" id="input_import_slider" ><br><br>

                <span style="font-weight: 700;"><?php esc_html_e("Note: styles templates will be updated if they exist!", 'nonprofit'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="display: none;">
                                        </td>
                                        <td style="padding-left: 250px;"><?php esc_html_e("Custom Animations:", 'nonprofit'); ?><br><br>
                                            <input type="radio" name="update_animations" value="true" checked="checked"> <?php esc_html_e("overwrite", 'nonprofit'); ?>
                                            <input type="radio" name="update_animations" value="false" style="margin-left:30px;"> <?php esc_html_e("append", 'nonprofit'); ?><br><br>
                                            <?php esc_html_e("Custom Navigations:", 'nonprofit'); ?><br><br>
                                            <input type="radio" name="update_navigations" value="true" checked="checked"> <?php esc_html_e("overwrite", 'nonprofit'); ?>
                                            <input type="radio" name="update_navigations" value="false" style="margin-left:30px;"> <?php esc_html_e("append", 'nonprofit'); ?><br><br>
                                            <?php esc_html_e("Static Styles:", 'nonprofit'); ?><br><br>
                                            <input type="radio" name="update_static_captions" value="true"> <?php esc_html_e("overwrite", 'nonprofit'); ?>
                                            <input type="radio" name="update_static_captions" value="false" style="margin-left:30px;"> <?php esc_html_e("append", 'nonprofit'); ?>
                                            <input type="radio" name="update_static_captions" value="none" checked="checked" style="margin-left:30px;"> <?php esc_html_e("ignore", 'nonprofit'); ?></td>
                                    </tr>
                                    <td style="display: none;">
                                    </td>
                                    <td style="padding-left: 250px;">
                                        <br> <input type="submit" class="button button-primary revblue tp-be-button" value="<?php esc_html_e("Import Slider", 'nonprofit'); ?>"><br>
                                    </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>


                    <script type="text/javascript">
                        jQuery(document).ready(function() {
                            jQuery(".revblue.tp-be-button").on('click',function(e){
                                if(jQuery("#input_import_slider").val()==''){
                                    alert("Please select the revslider file");
                                    e.preventDefault();
                                    return false;
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        </div>


        <div style="clear: both;">
            <br/><br/><br/><br/><br/><br/>
        </div>


        <div class="wb-item">
            <div class="icon-themes">

            </div>
        </div>
        <?php
    }
}