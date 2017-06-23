<?php
define('THEME_NAME', "nonprofit");
if( ! function_exists('nonprofit_cause_posttype')):
  function nonprofit_cause_posttype() {
    register_post_type( 'cause',
      array(
        'labels' => array(
          'name' => __( 'cause', THEME_NAME ),
          'singular_name' => __( 'cause', THEME_NAME ),
          'add_new' => __( 'Add New cause Item', THEME_NAME ),
          'add_new_item' => __( 'Add New cause Item', THEME_NAME ),
          'edit_item' => __( 'Edit cause', THEME_NAME ),
          'new_item' => __( 'Add New cause Item', THEME_NAME ),
          'view_item' => __( 'View cause Item', THEME_NAME ),
          'search_items' => __( 'Search cause Item', THEME_NAME ),
          'not_found' => __( 'No cause Item found', THEME_NAME ),
          'not_found_in_trash' => __( 'No cause Item found in trash', THEME_NAME )
        ),
        'public' => true,
        'menu_icon' => 'dashicons-cause',
        'supports' => array( 'title', 'comments','editor' , 'thumbnail'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "cause"), // Permalinks format
        'menu_position' => 5
      )
    );
    register_taxonomy( 'cause_categories', 'cause', array( 'hierarchical' => true,
      'label' => 'Categories',
      'query_var' => true,
      'show_ui' => true,
      'rewrite' => true ) );
  }
  add_action( 'init', 'nonprofit_cause_posttype' );
endif;

/*-------------- portfolio custom posttyp -----------------------*/
 if( ! function_exists('nonprofit_portfolio_posttype')):
  function nonprofit_portfolio_posttype() {
    register_post_type( 'portfolio',
      array(
        'labels' => array(
          'name' => __( 'Portfolio', THEME_NAME ),
          'singular_name' => __( 'portfolio', THEME_NAME ),
          'add_new' => __( 'Add New Portfolio Item', THEME_NAME ),
          'add_new_item' => __( 'Add New Portfolio Item', THEME_NAME ),
          'edit_item' => __( 'Edit portfolio', THEME_NAME ),
          'new_item' => __( 'Add New Portfolio Item', THEME_NAME ),
          'view_item' => __( 'View Portfolio Item', THEME_NAME ),
          'search_items' => __( 'Search Portfolio Item', THEME_NAME ),
          'not_found' => __( 'No Portfolio Item found', THEME_NAME ),
          'not_found_in_trash' => __( 'No Portfolio Item found in trash', THEME_NAME )
        ),
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array( 'title', 'comments','editor' , 'thumbnail'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "portfolio"), // Permalinks format
        'menu_position' => 5
      )
    );
    register_taxonomy( 'portfolio_categories', 'portfolio', array( 'hierarchical' => true,
											                               'label' => 'Categories',
											                               'query_var' => true,
											                               'show_ui' => true,
											                               'rewrite' => true ) );
  }
  add_action( 'init', 'nonprofit_portfolio_posttype' );
endif;


//----------------------- Custom type Team Member -----------------
if( ! function_exists('nonprofit_team_member_post_type')):
    function nonprofit_team_member_post_type() {
        register_post_type( 'wd-team-member',
            array(
                'labels' => array(
                    'name' => __( 'Team Members', THEME_NAME ),
                    'singular_name' => __( 'team member', THEME_NAME ),
                    'add_new' => __( 'Add New Team Member', THEME_NAME ),
                    'add_new_item' => __( 'Add New Team Member', THEME_NAME ),
                    'edit_item' => __( 'Edit Team Member', THEME_NAME ),
                    'new_item' => __( 'Add New Team Member', THEME_NAME ),
                    'view_item' => __( 'View Team Member', THEME_NAME ),
                    'search_items' => __( 'Search Team Member', THEME_NAME ),
                    'not_found' => __( 'No Team Member found', THEME_NAME ),
                    'not_found_in_trash' => __( 'No Team Member found in trash', THEME_NAME )
                ),
                'public' => true,
                'menu_icon' => 'dashicons-businessman',
                'supports' => array( 'title'),
                'capability_type' => 'post',
                'rewrite' => array("slug" => "wd-team-member"), // Permalinks format
                'menu_position' => 5
            )
        );
    }
    add_action( 'init', 'nonprofit_team_member_post_type' );
endif;
//----------------------- Custom type Testimonials -----------------
if( ! function_exists('nonprofit_testimonials_posttype')):
  function nonprofit_testimonials_posttype() {
    register_post_type( 'testimonials',
      array(
        'labels' => array(
          'name' => __( 'Testimonials', THEME_NAME ),
          'singular_name' => __( 'testimonials', THEME_NAME ),
          'add_new' => __( 'Add New Testimonial Item', THEME_NAME ),
          'add_new_item' => __( 'Add New Testimonial Item', THEME_NAME ),
          'edit_item' => __( 'Edit testimonials', THEME_NAME ),
          'new_item' => __( 'Add New Testimonial Item', THEME_NAME ),
          'view_item' => __( 'View Testimonial Item', THEME_NAME ),
          'search_items' => __( 'Search Testimonial Item', THEME_NAME ),
          'not_found' => __( 'No Testimonial Item found', THEME_NAME ),
          'not_found_in_trash' => __( 'No Testimonial Item found in trash', THEME_NAME )
        ),
        'public' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array( 'title', 'comments','editor' , 'thumbnail','excerpt'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "testimonials"), // Permalinks format
        'menu_position' => 5
      )
    );
    register_taxonomy( 'testimonials_categories', 'testimonials', array( 'hierarchical' => true,
                                                     'label' => 'Categories',
                                                     'query_var' => true,
                                                     'show_ui' => true,
                                                     'rewrite' => true ) );
  }
  add_action( 'init', 'nonprofit_testimonials_posttype' );
endif;