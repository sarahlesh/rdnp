<?php
/**
 *----------------- include ------------------------------------------
 */


include_once( get_template_directory() .  '/inc/tools.php' );
include_once( get_template_directory() .  '/inc/plugins/plugins.php' );
include_once( get_template_directory() .  '/inc/panel.php' );
include_once( get_template_directory() .  '/inc/meta-box.php');
include_once( get_template_directory() .  '/inc/walker/wd-walker.php');
require_once( get_template_directory() .  '/inc/aq_resizer.php');
include_once( get_template_directory() .  '/inc/mega-menu.php');


load_theme_textdomain( "dietitian", get_template_directory().'/languages' );

/**
 *--------------------------------------------------------------------
 */
/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
  $content_width = 625;

/* Add post formats */

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_theme_support('post-formats', array('gallery', 'video', 'audio'));
	add_theme_support('automatic-feed-links');
	add_theme_support('custom-background');
	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'html5', array( 'search-form' ) );
}

add_post_type_support( 'portfolio', 'post-formats', array( 'aside', 'image', 'quote' ) );

/*
 * --------------- Body Classes --------------
 */
function nonprofit_body_class($classes = '') {
			if(nonprofit_get_option('nonprofit_smooth_scroll','on') == 'on') {
		$classes[] = 'wd-smooth-scroll';
	}
	return $classes;
}
add_filter('body_class','nonprofit_body_class');

/*
 * --------------- Title --------------
 */
function nonprofit_setup() {
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'nonprofit_setup' );

function nonprofit_wp_title_for_home( $title, $sep ) {
	if ( is_feed() )
		return $title;

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'name', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = esc_html__( 'Home - ', 'nonprofit' ) ."$title $sep $site_description";

	return $title;
}
add_filter( 'wp_title', 'nonprofit_wp_title_for_home', 10, 2 );



/**
 *--------------- Image presets-----------
 */

 add_image_size( 'nonprofit_blog-thumb',            840, 424, true );
 add_image_size( 'nonprofit_blog',			             368, 193, true );
 add_image_size( 'nonprofit_testimonial',		       69, 69, true );
 add_image_size( 'nonprofit_testimonial_large',		 433, 574, true );
 add_image_size( 'nonprofit_team',     						 270, 322, true );
 add_image_size( 'nonprofit_team_member_slider',    744, 833, true );
 add_image_size( 'nonprofit_team_member_carousel',  380, 370, true );
 add_image_size( 'nonprofit_team_member_grid',  		 384, 525, true );
 add_image_size( 'nonprofit_carousel_clients',  		 169, 111, true );
 add_image_size( 'nonprofit_grid_clients', 	  		 125, 97, true );
 add_image_size( 'nonprofit_portfolio_grid', 	  	 584, 484, true );




/**
 *-----------------add sidebar------------------------------------------
 */

function nonprofit_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__('Sidebar','nonprofit'),
		'id' => 'sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer 1','nonprofit'),
		'id' => 'footer-1',
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
			));

	register_sidebar(array(
		'name' => esc_html__('Footer 2','nonprofit'),
		'id' => 'footer-2',
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer 3','nonprofit'),
		'id' => 'footer-3',
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'name' => esc_html__('Footer 4','nonprofit'),
		'id' => 'footer-4',
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array('name' => esc_html__( 'Woocommerce Sidebar','nonprofit' ),
		'id' => 'shop-widgets',
	  'description' => esc_html__( 'Appears on the shop page of your website.', 'nonprofit' ),
	  'before_widget' => '<div id="%1$s" class="widget %2$s shop-widgets">',
	  'after_widget' => '</div>',
	  'before_title' => '<h4 class="widget-title">',
	  'after_title' => '</h4>',
  ));
}
add_action( 'widgets_init', 'nonprofit_widgets_init' );


//____________navigation____________

register_nav_menus( array(
  'primary' => esc_html__( 'Primary Navigation', 'nonprofit' ),
  'right' => esc_html__( 'Right', 'nonprofit' ),
) );

function nonprofit_menu() {
register_nav_menu('footer',esc_html__( 'Footer', 'nonprofit'));
}
add_action( 'init', 'nonprofit_menu' );


// Ajax Load More portfolio
function nonprofit_my_enqueue_assets() {
	wp_enqueue_script( 'wd-load-more',  get_stylesheet_directory_uri() . '/js/load-more.js', array( 'jquery' ), '1.0', true );
}

function nonprofit_theme_add_editor_styles() {
    $nonprofit_font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
    add_editor_style( $nonprofit_font_url );
}
add_action( 'after_setup_theme', 'nonprofit_theme_add_editor_styles' );

//--------load css and js----------------------------



	



function nonprofit_fonts_url($font_body_name, $nonprofit_font_weight_style, $nonprofit_main_text_font_subsets) {
	$nonprofit_font_url = '';
	$nonprofit_font_url = add_query_arg( 'family', urlencode( $font_body_name . ':' . $nonprofit_font_weight_style . '&subset=' . $nonprofit_main_text_font_subsets ), "//fonts.googleapis.com/css" );
	return $nonprofit_font_url;
}


function nonprofit_load_js_css_file() {

	/*----------google -fonts ------------------*/
	$font_body_name = nonprofit_get_option('nonprofit_body_font_familly',"default");
  $nonprofit_font_weight_style = nonprofit_get_option('nonprofit_body_font_weight');
  $nonprofit_main_text_font_subsets = nonprofit_get_option('nonprofit_body_font_subsets');

  $font_header_name = nonprofit_get_option('nonprofit_heading_font_familly',"default");
  $nonprofit_heading_font_weight_style = nonprofit_get_option('nonprofit_heading_font_weight');
  $nonprofit_heading_text_font_subsets = nonprofit_get_option('nonprofit_heading_font_subsets');

  $nonprofit_navigation_font_familly = nonprofit_get_option('nonprofit_navigation_font_familly',"default");
  $nonprofit_navigation_font_weight_style = nonprofit_get_option('nonprofit_navigation_font_weight');
  $nonprofit_navigation_text_font_subsets = nonprofit_get_option('nonprofit_navigation_font_subsets');
  
  

  $protocol = is_ssl() ? 'https' : 'http';
  if(is_rtl()){      
    wp_enqueue_style('nonprofit_body_google_fonts',$protocol.'http://fonts.googleapis.com/earlyaccess/droidarabickufi.css');
  }elseif($font_body_name != "default"){
    wp_enqueue_style('nonprofit_body_google_fonts',nonprofit_fonts_url($font_body_name, $nonprofit_font_weight_style, $nonprofit_main_text_font_subsets), array(), '1.0.0' );
  }else{
	  wp_enqueue_style('nonprofit_body_google_fonts',$protocol.'://fonts.googleapis.com/css?family=Open+Sans:400,300,700');
  }
  
	
  if($font_header_name != "default"){
	 wp_enqueue_style('nonprofit_header_google_fonts',nonprofit_fonts_url($font_header_name, $nonprofit_heading_font_weight_style, $nonprofit_main_text_font_subsets), array(), '1.0.0' );
  }

  if($nonprofit_navigation_font_familly != "default"){
	 wp_enqueue_style('nonprofit_navigation_google_fonts',nonprofit_fonts_url($nonprofit_navigation_font_familly, $nonprofit_navigation_font_weight_style, $nonprofit_navigation_text_font_subsets), array(), '1.0.0' );
  }

	//________________________css______________________________
	wp_enqueue_style( 'Owl-carousel',  get_template_directory_uri() . "/css/owl.carousel.css" );
	wp_enqueue_style( 'Owl-carousel-theme',  get_template_directory_uri() . "/css/owl.theme.css" );
	wp_enqueue_style( 'nonprofit_animation',  get_template_directory_uri() . "/css/animate.css" );
	wp_enqueue_style( 'lightbox',  get_template_directory_uri() . "/css/lightbox.min.css" );
	wp_enqueue_style( 'font-awesome',       get_template_directory_uri() . "/css/font-awesome.min.css");
	wp_enqueue_style( 'ionicons',       get_template_directory_uri() . "/css/ionicons.min.css");
	wp_enqueue_style('mediaelementplayer', get_template_directory_uri() . "/css/mediaelementplayer.css");
	wp_enqueue_style( 'nonprofit_style',  get_template_directory_uri() . "/css/app.css" );

	//________________________js______________________________
	wp_enqueue_script('foundation',            get_template_directory_uri() . '/js/foundation.min.js',array( 'jquery' ), array( 'jquery' ), '4.4.2', true );
	wp_enqueue_script('googlemaps', "https://maps.googleapis.com/maps/api/js?key=AIzaSyAmgQr8mjqkLQgcEqGNzjd7YgHZs7EIYrg", array( 'jquery' ), '4.4.2', true );
	wp_enqueue_script('nonprofit_plugins',            get_template_directory_uri() . '/js/plugins.js',array( 'jquery' ),'5',false);
	wp_enqueue_script('wd-maps',     get_template_directory_uri() . "/js/wd-maps.js", array( 'jquery' ) ,'1.0',true);
	wp_enqueue_script('ismobile',            get_template_directory_uri() . '/js/isMobile.min.js', array( 'jquery' ),'4.4.2',false);
	wp_enqueue_script('shortcodes-js',     get_template_directory_uri() . "/js/shortcode/script-shortcodes.js", array( 'jquery' ),'4',true );
	wp_enqueue_script('wd-carousel',     get_template_directory_uri() . "/js/wd-carousel.js", array( 'jquery' ) ,'4.4.2',true);
	wp_enqueue_script('nonprofit_scripts',            get_template_directory_uri() . '/js/scripts.js',array( 'jquery','hoverIntent' ),'4.4.2',true);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' ); 
    }
	wp_enqueue_script( 'wd-load-more',  get_template_directory_uri() . '/js/load-more.js', array( 'jquery' ), '1.0', true );

	//________________________inline style______________________________
	wp_enqueue_style('custom-style',       get_template_directory_uri() . '/style.css');

	include_once( get_template_directory() .  '/inc/custom-style.php');


	wp_add_inline_style( 'custom-style', $nonprofit_custom_css );
}
add_action( 'wp_enqueue_scripts', 'nonprofit_load_js_css_file' );




// retrieves the attachment ID from the file URL
function nonprofit_get_image_id($image_url) {
    global $wpdb;
    $image_url   = esc_sql( $image_url );
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
    if (isset($attachment[0])) {
    	return $attachment[0];
    }
}

// initialize options

if (!function_exists('nonprofit_initialize_options')) {
	function nonprofit_initialize_options() {

		$options_array = get_option("nonprofit_options_array");

		if( !$options_array ) {
			$options_array = array(

						'nonprofit_primary_color' => "",
						'nonprofit_logo_path' => "",
						'nonprofit_favicon_icon_path' => "",
						'nonprofit_facebook' => "",
						'nonprofit_twitter' => "",
						'nonprofit_google_plus' => "",
						'nonprofit_footer_style' => "2",
						'nonprofit_body_font_familly' => "",
						'nonprofit_body_font_weight' => "",
						'nonprofit_body_font_subsets' => "",
						'nonprofit_heading_font_familly' => "",
						'nonprofit_heading_font_weight' => "",
						'nonprofit_heading_font_subsets' => "",
						'nonprofit_navigation_font_familly' => "",
						'nonprofit_navigation_font_weight' => "",
						'nonprofit_navigation_font_subsets' => "",
						'nonprofit_show_wpml_widget' => '',
						'nonprofit_language_area_html' => '',

						"nonprofit_theme_custom_css" => "",
						'nonprofit_theme_custom_js' => "",

						'nonprofit_footer_columns' => "",
						'nonprofit_copyright' => "",
					);
			update_option("nonprofit_options_array",$options_array);
		}
	}
}


// get options value
if (!function_exists('nonprofit_get_option')) {
	function nonprofit_get_option($nonprofit_option_key , $nonprofit_option_default_value = null) {
		nonprofit_initialize_options();
		$options_array = get_option("nonprofit_options_array");
		$nonprofit_meta_value = $nonprofit_option_default_value;
		if (array_key_exists($nonprofit_option_key, $options_array)) {
			if (isset($options_array[$nonprofit_option_key]) && !empty($options_array[$nonprofit_option_key])) {
			$nonprofit_meta_value = esc_attr($options_array[$nonprofit_option_key]);
			}

			if ($nonprofit_meta_value == "") {
				$nonprofit_meta_value = $nonprofit_option_default_value;
			}
		}

		return $nonprofit_meta_value;
	}
}

// get options value
if (!function_exists('nonprofit_save_option')) {
	function nonprofit_save_option($nonprofit_option_key, $nonprofit_option_value) {
		$options_array = get_option("nonprofit_options_array");
		$options_array[$nonprofit_option_key] = $nonprofit_option_value;
		update_option("nonprofit_options_array",$options_array);
	}
}


wp_oembed_add_provider('#https?://(?:api\.)?soundcloud\.com/.*#i', 'http://soundcloud.com/oembed', true);
//____________ Cloud Tag
add_filter( 'widget_tag_cloud_args', 'nonprofit_widget_tag_cloud_args' );
function nonprofit_widget_tag_cloud_args( $args ) {
	$args['number'] = 13;
	$args['largest'] = 13;
	$args['smallest'] = 13;
	$args['unit'] = 'px';
	return $args;
}
//____________footer script ___________
function nonprofit_theme_custom_js() {
	$test = html_entity_decode(nonprofit_get_option('nonprofit_theme_custom_js'));
	echo $test;
	?>
<script type="text/javascript">
	jQuery(document).foundation();
	var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};


	if(!isMobile.any()) {
		jQuery('.animated').css('opacity', 0);
	}else {
		jQuery('.animated').css('opacity', 1);
	}
	jQuery(function() {
		if(jQuery('.full-page').length ) {
			jQuery.scrollify({
				section: ".vc_row-o-full-height",
				after:nonprofit_fullPageUpdate()
			});
		}
	});
	<?php echo nonprofit_get_option('nonprofit_theme_custom_js','') ?>
</script>
		<?php  
		
			if(nonprofit_get_option('nonprofit_theme_custom_js','') !=''){
				echo '<script type="text/javascript">';
				echo	 $test ;
				echo '</script>';
			} 
		?>
<?php
}

add_action( 'wp_footer', 'nonprofit_theme_custom_js' );



if(!function_exists('nonprofit_get_categories')) {
	function nonprofit_get_categories( $taxonomy = '') {
		$args = array(
			'type' => 'post',
			'hide_empty' => 0
		);

		$output = array();

		$args['taxonomy'] = $taxonomy;
		$categories = get_categories( $args);

		if(!empty($categories) && is_array($categories)) {
			foreach( $categories as $category ) {
				if(is_object($category)) {
					$output[$category->name] = $category->slug;
				}
			}
		}

		return $output;
	}
}


if ( function_exists( 'vc_set_template_dir' ) ) {
	$templates_path = get_template_directory() . '/inc/vc_templates/';
	vc_set_template_dir( $templates_path );
}


function nonprofit_removeslashes($string){
    $string = implode("",explode("\\",$string));
    return stripslashes(trim($string));
}
