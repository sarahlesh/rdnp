<?php 

global $vc_add_css_animation;
/* our client
---------------------------------------------------------- */
vc_map( array(
    "name" => esc_html__("Wd Clients", 'nonprofit'),
    "base" => "nonprofit_clients",
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, 
    "is_container" => FALSE,
    "params" => array(         
		array(
			'type' => 'attach_images',
			'heading' => esc_html__( 'Images', 'nonprofit' ),
			'param_name' => 'images',
			
		)
    ,array(
        "type" => "dropdown", // it will bind a textfield in WP
        "heading" => esc_html__("Layout Style", 'nonprofit'),
        "param_name" => "layout_style",
         "value" => array('Carousel' => 'carousel',
                          'Grid'     => 'grid'),
    )
    ,array(
        "type" => "dropdown", // it will bind a textfield in WP
        "heading" => esc_html__("Navigation Style", 'nonprofit'),
        "param_name" => "nav_style",
         "value" => array('Dots' => 'dots',
                          'Arrows'     => 'arrows'),
         "dependency" => Array("element" => "layout_style", "value" => array('carousel'))
    ),
    array(
        "type" => "textfield",
        "heading" => esc_html__("Elements To Swipe", 'nonprofit'),
        "param_name" => "elements_to_swipe",
        "dependency" => Array("element" => "layout_style", "value" => array('carousel'))
    ),

    array(
        "type" => "textfield",
        "heading" => esc_html__("Items To Display in Mobile", 'nonprofit'),
        "param_name" => "item_to_display_mobile",
        "dependency" => Array("element" => "layout_style", "value" => array('carousel'))
    ),
    array(
        "type" => "textfield",
        "heading" => esc_html__("Items To Display in Tablet", 'nonprofit'),
        "param_name" => "item_to_display_tablet",
        "dependency" => Array("element" => "layout_style", "value" => array('carousel'))
    ),
    array(
        "type" => "textfield",
        "heading" => esc_html__("Items To Display in Desktop", 'nonprofit'),
        "param_name" => "item_to_display_desktop",
        "dependency" => Array("element" => "layout_style", "value" => array('carousel'))
    ),


    array(
        "type" => "textfield",
        "heading" => esc_html__("Columns number in Mobile", 'nonprofit'),
        "param_name" => "columns_number_mobile",
        "dependency" => Array("element" => "layout_style", "value" => array('grid'))
    ),
    array(
        "type" => "textfield",
        "heading" => esc_html__("Columns number in Tablet", 'nonprofit'),
        "param_name" => "columns_number_tablet",
        "dependency" => Array("element" => "layout_style", "value" => array('grid'))
    ),
    array(
        "type" => "textfield",
        "heading" => esc_html__("Columns number in Desktop", 'nonprofit'),
        "param_name" => "columns_number_desktop",
        "dependency" => Array("element" => "layout_style", "value" => array('grid'))
    ),

    $vc_add_css_animation
    )
) );