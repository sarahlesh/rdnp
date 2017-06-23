<?php
global $vc_add_css_animation;
global $nonprofit_fonts_array;

vc_map( array(
     "name" => esc_html__("Button", 'nonprofit'),
     "base" => "nonprofit_button",
     "icon" => get_template_directory_uri()."/images/icon/meknes.png",
     "content_element" => true,
     "is_container" => FALSE,
     "params" => array(
	     array(
		     "type"       => "textfield",
		     "heading"    => esc_html__( "Button Text", 'nonprofit' ),
		     "param_name" => "nonprofit_button_text",
		     "value"      => "Click Me",
	     ),
	     array(
		     "type"       => "colorpicker",
		     "heading"    => esc_html__( "Text Color", 'nonprofit' ),
		     "param_name" => "nonprofit_button_text_color",
		     "value"      => "#FFF"
	     ),
	     array(
		     "type"       => "colorpicker",
		     "heading"    => esc_html__( "Hover Text Color", 'nonprofit' ),
		     "param_name" => "nonprofit_button_hover_text_color",
		     "value"      => "#000"
	     ),
	     array(
		     "type"       => "vc_link",
		     "heading"    => esc_html__( "Button Link", 'nonprofit' ),
		     "param_name" => "nonprofit_button_link",
		     "value"      => "#",
	     ),
	     array(
		     "heading"    => esc_html__( "Button Size", "nonprofit" ),
		     "param_name" => "nonprofit_button_size",
		     "type"       => "dropdown",
		     'value'      => array(
			     'Default'  => "",
			     'Tiny'     => "tiny",
			     'Small'    => "small",
			     'large'    => "large",
			     'expand'   => "expand",
			     'disabled' => "disabled"
		     ),
	     ),
	     array(
		     "heading"    => esc_html__( "Button Radius", "nonprofit" ),
		     "param_name" => "nonprofit_button_radius",
		     "type"       => "dropdown",
		     'value'      => array(
			     'None'   => "",
			     'Radius' => "radius",
			     'Round'  => "round",
		     ),
	     ),
	     array(
		     "heading"    => esc_html__( "Button Background Color", "nonprofit" ),
		     "param_name" => "nonprofit_button_background_color",
		     "type"       => "dropdown",
		     'value'      => array(
			     'None'      => "",
			     'success'   => "success",
			     'secondary' => "secondary",
			     'alert'     => "alert",
			     'info'      => "info",
			     'disabled'  => "disabled",
			     'Custom'    => "custom",
		     ),
		     "group"      => "Background",
	     ),
	     array(
		     "type"       => "colorpicker",
		     "heading"    => esc_html__( "Button Background Color", 'nonprofit' ),
		     "param_name" => "nonprofit_button_custom_bg_color",
		     "value"      => "#000",
		     "dependency" => Array( "element" => "nonprofit_button_background_color", "value" => array( 'custom' ) ),
		     "group"      => "Background",
	     ),
	     array(
		     "type"       => "colorpicker",
		     "heading"    => esc_html__( "Hover Background Color", 'nonprofit' ),
		     "param_name" => "nonprofit_button_custom_hover_bg_color",
		     "value"      => "#AAA",
		     "dependency" => Array( "element" => "nonprofit_button_background_color", "value" => array( 'custom' ) ),
		     "group"      => "Background",
	     ),
	     array(
		     "heading"    => esc_html__( "Icon Position", "nonprofit" ),
		     "param_name" => "nonprofit_button_icon_position",
		     "type"       => "dropdown",
		     'value'      => array(
			     'None'  => "",
			     'Left'  => "left",
			     'Right' => "right",
		     ),
		     "group"      => "Icon",
	     ),
	     array(
		     'type'        => 'iconpicker',
		     'heading'     => esc_html__( 'Icon', 'nonprofit' ),
		     'param_name'  => 'nonprofit_button_icon',
		     'settings'    => array(
			     'emptyIcon'    => true, // default true, display an "EMPTY" icon?
			     'iconsPerPage' => 4000, // default 100, how many icons per/page to display
		     ),
		     'description' => esc_html__( 'Select icon from library.', 'nonprofit' ),
		     "dependency"  => Array( "element" => "nonprofit_button_icon_position", "value" => array( 'left', 'right' ) ),
		     "group"       => "Icon",
	     ),
	     array(
		     "heading"    => esc_html__( "Button Border", "nonprofit" ),
		     "param_name" => "nonprofit_button_border",
		     "type"       => "dropdown",
		     'value'      => array(
			     'None'   => "no-border",
			     'Border' => "border",
		     ),
		     "group" => "Border",
	     ),
	     array(
		     "heading"    => esc_html__( "Button Border Size", "nonprofit" ),
		     "param_name" => "nonprofit_button_border_size",
		     "type"       => "textfield",
		     'value'      => '',
		     "dependency" => Array( "element" => "nonprofit_button_border", "value" => array( 'border' ) ),
		     "group" => "Border",
	     ),
	     array(
		     "type"       => "colorpicker",
		     "heading"    => __( "Button Border Color", 'nonprofit' ),
		     "param_name" => "nonprofit_button_border_color",
		     "value"      => "#000",
		     "dependency" => Array( "element" => "nonprofit_button_border", "value" => array( 'border' ) ),
		     "group" => "Border",
	     ),
          
	     $vc_add_css_animation

     )
) );