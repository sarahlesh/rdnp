<?php  
//*-------------------------------btn shortcode---------------------*/
include_once (plugin_dir_path( __FILE__ ) . 'tinymce/tinymce.php');
require_once (plugin_dir_path( __FILE__ ) . 'tinymce/ajax.php');


add_action('init', 'add_button');

function add_button() {
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') ) {
     add_filter('mce_external_plugins', 'add_plugin');
     add_filter('mce_buttons',          'register_button');
   }
}

function register_button($buttons) {
   array_push($buttons, "portfolio");
   array_push( $buttons, 'pricingtable' );
   array_push( $buttons, 'nonprofit_team' );
	 array_push( $buttons, 'testimonial' );
	 array_push( $buttons, 'nonprofit_testimonial' );
	 array_push( $buttons, 'nonprofit_google_map' );

   return $buttons;
}

function add_plugin($plugin_array) {
   $plugin_array['portfolio'] = get_template_directory_uri() . '/inc/js/customcodes.js';
   $plugin_array['pricingtable'] = get_template_directory_uri() . '/inc/js/customcodes.js';
   $plugin_array['nonprofit_team'] = get_template_directory_uri() . '/inc/js/customcodes.js';
	 $plugin_array['testimonial'] = get_template_directory_uri() . '/inc/js/customcodes.js';
	 $plugin_array['nonprofit_testimonial'] = get_template_directory_uri() . '/inc/js/customcodes.js';
	 $plugin_array['nonprofit_google_map'] = get_template_directory_uri() . '/inc/js/customcodes.js';
   return $plugin_array;
}