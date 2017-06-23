<?php 

/**
 * Plugin Name: Webdevia main plugin
 * Plugin URI: http://www.themeforest.net/user/Mymoun
 * Description: Add features to Mymoun themes.
 * Version: 2.0
 * Author: Mymoun
 * Author URI: http://www.themeforest.net/user/Mymoun
 */
$GLOBALS['nonprofit_fonts_to_enqueue_array'] = "";



require_once(  plugin_dir_path( __FILE__ ).'post-types.php' );
require_once(  plugin_dir_path( __FILE__ ).'/import/wd-import.php' );


require_once(  plugin_dir_path( __FILE__ ).'widgets/widget.php' );
require_once(  plugin_dir_path( __FILE__ ).'widgets/adress.php' );
require_once(  plugin_dir_path( __FILE__ ).'widgets/twitter-oath-widget.php' );

include_once( plugin_dir_path( __FILE__ ).'shortcode/parametre_shortcode.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-image_with_text.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-blog.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-portfolio.php' );
include_once  plugin_dir_path( __FILE__ ).'shortcode/wd-testimonial.php' ;
include_once( plugin_dir_path( __FILE__ ).'shortcode/_wd-clients.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-separator_title.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-countup.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-call_to_action.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-pricing_table.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-hero_image.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-headings.php' );

include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-clients.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-empty_spaces.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-text_icon.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-team_member.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-maps.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-progressbar.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-list.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-button.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-drop_cups.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-causes.php' );





add_action("get_footer", "nonprofit_footer_f");
function nonprofit_footer_f(){

	if (!empty($GLOBALS["nonprofit_fonts_to_enqueue_array"]))
	{
		$nonprofit_fonts_string = implode($GLOBALS["nonprofit_fonts_to_enqueue_array"]);
		$protocol = is_ssl() ? 'https' : 'http';
		if ($nonprofit_fonts_string != "") {
			wp_enqueue_style('nonprofit_shortcodes_google_fonts',$protocol . '://fonts.googleapis.com/css?family=' . esc_attr($nonprofit_fonts_string),false , false);
		}
	}
}
function image_from_url_relatives($image_url){
    $images=array();
    $images=explode('/',$image_url);
    $position=array_search('uploads',$images);
    $content=array();
    if($position){
        for($i=$position; $i<count($images);$i++) array_push($content,$images[$i]);
        $image_relative_link=get_site_url(). '/wp-content/'.implode('/',$content);
        if($image_url!=$image_relative_link) update_post_meta(get_the_ID(), 'pciture', $image_relative_link);
        return $image_relative_link;
    } else {
        return $image_url;
    }
}