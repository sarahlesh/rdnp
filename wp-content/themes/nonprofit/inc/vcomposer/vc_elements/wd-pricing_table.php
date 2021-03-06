<?php
global $vc_add_css_animation;
global $nonprofit_fonts_array;

vc_map( array(
  'name' => esc_html__( 'Wd Pricing Table', 'nonprofit' ),
  'base' => 'nonprofit_pricing_table',
  "icon" => get_template_directory_uri()."/images/icon/meknes.png",
  "content_element" => true,
  "is_container"    => false,
  'params' => array(
    array(
      'type' => 'param_group',
      'heading' => esc_html__( 'Values', 'nonprofit' ),
      'param_name' => 'values',
      'value' => urlencode( json_encode( array(
        array(
          'text' => '1 Database',
        ),
        array(
          'text' => '5GB Storage',
        ),
        array(
          'text' => '20 Users',
        ),
      ) ) ),
      'params' => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Text', 'nonprofit' ),
          'param_name' => 'text',
          'description' => esc_html__( 'Enter Line text.', 'nonprofit' ),
          'admin_label' => true,
        ),
      ),
    ),
    array(
      "type" => "attach_image", // it will bind a img choice in WP
      "heading" => esc_html__("Image", 'nonprofit'),
      "param_name" => "image",
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Price', 'nonprofit' ),
      'param_name' => 'price',
    ),
    array(
      "type"       => "checkbox",
      "heading"    => esc_html__( "Featured", 'nonprofit' ),
      "param_name" => "featured",
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Per', 'nonprofit' ),
      'param_name' => 'per',
      'description' => esc_html__( 'Per Month - Year - Day ...', 'nonprofit' ),
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Sub Title', 'nonprofit' ),
      'param_name' => 'sub_title',
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Button Text', 'nonprofit' ),
      'param_name' => 'button_text',
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Button Link', 'nonprofit' ),
      'param_name' => 'button_link',
    ),


    // Pricing Table Title Typo

        array(
             "type" => "dropdown",
             'value' => $nonprofit_fonts_array,
             "heading" => esc_html__("Title Font Family", 'nonprofit'),
             "param_name" => "nonprofit_pricing_title_font_family",
             "group" => "Title Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Title Font Size", 'nonprofit'),
             "param_name" => "nonprofit_pricing_title_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Title Style",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Title Font Color", 'nonprofit'),
             "param_name" => "nonprofit_pricing_title_color",
             "value" => "",
             "group" => "Title Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Title Font Weight", 'nonprofit'),
             "param_name"   =>   "nonprofit_pricing_title_font_weight",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   '900',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '400',
             ),
             "group" => "Title Style",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Title Text Transform", 'nonprofit'),
             "param_name" => "nonprofit_pricing_title_text_transform",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Title Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Title Line Height", 'nonprofit'),
             "param_name" => "nonprofit_pricing_title_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Title Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Title Letter spacing", 'nonprofit'),
             "param_name" => "nonprofit_pricing_title_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Title Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Title Font Style", 'nonprofit'),
             "param_name"   =>   "nonprofit_pricing_title_font_style",
             'value' => array(
                  esc_html__('Normal', 'nonprofit')  =>   'normal',
                  esc_html__('Italic','nonprofit')        =>   'italic',
                  esc_html__('Inherit','nonprofit')       =>   'inherit',
                  esc_html__('Initial','nonprofit')       =>   'initial',
             ),
             "group" => "Title Style",
        ),





        // Pricing Table Price Typo

        array(
             "type" => "dropdown",
             'value' => $nonprofit_fonts_array,
             "heading" => esc_html__("Price Font Family", 'nonprofit'),
             "param_name" => "nonprofit_pricing_price_font_family",
             "group" => "Price Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Price Font Size", 'nonprofit'),
             "param_name" => "nonprofit_pricing_price_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Price Style",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Price Font Color", 'nonprofit'),
             "param_name" => "nonprofit_pricing_price_color",
             "value" => "",
             "group" => "Price Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Price Font Weight", 'nonprofit'),
             "param_name"   =>   "nonprofit_pricing_price_font_weight",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   '900',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '400',
             ),
             "group" => "Price Style",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Price Text Transform", 'nonprofit'),
             "param_name" => "nonprofit_pricing_price_text_transform",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Price Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Price Line Height", 'nonprofit'),
             "param_name" => "nonprofit_pricing_price_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Price Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Price Letter spacing", 'nonprofit'),
             "param_name" => "nonprofit_pricing_price_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Price Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Price Font Style", 'nonprofit'),
             "param_name"   =>   "nonprofit_pricing_price_font_style",
             'value' => array(
                  esc_html__('Normal', 'nonprofit')  =>   'normal',
                  esc_html__('Italic','nonprofit')        =>   'italic',
                  esc_html__('Inherit','nonprofit')       =>   'inherit',
                  esc_html__('Initial','nonprofit')       =>   'initial',
             ),
             "group" => "Price Style",
        ),

        // Pricing Table Per Typo

        array(
             "type" => "dropdown",
             'value' => $nonprofit_fonts_array,
             "heading" => esc_html__("Per Font Family", 'nonprofit'),
             "param_name" => "nonprofit_pricing_per_font_family",
             "group" => "Per Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Per Font Size", 'nonprofit'),
             "param_name" => "nonprofit_pricing_per_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Per Style",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Per Font Color", 'nonprofit'),
             "param_name" => "nonprofit_pricing_per_color",
             "value" => "",
             "group" => "Per Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Per Font Weight", 'nonprofit'),
             "param_name"   =>   "nonprofit_pricing_per_font_weight",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   '900',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '400',
             ),
             "group" => "Per Style",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Per Text Transform", 'nonprofit'),
             "param_name" => "nonprofit_pricing_per_text_transform",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Per Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Per Line Height", 'nonprofit'),
             "param_name" => "nonprofit_pricing_per_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Per Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Per Letter spacing", 'nonprofit'),
             "param_name" => "nonprofit_pricing_per_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Per Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Per Font Style", 'nonprofit'),
             "param_name"   =>   "nonprofit_pricing_per_font_style",
             'value' => array(
                  esc_html__('Normal', 'nonprofit')  =>   'normal',
                  esc_html__('Italic','nonprofit')        =>   'italic',
                  esc_html__('Inherit','nonprofit')       =>   'inherit',
                  esc_html__('Initial','nonprofit')       =>   'initial',
             ),
             "group" => "Per Style",
        ),


        // Pricing Table Description Typo

        array(
             "type" => "dropdown",
             'value' => $nonprofit_fonts_array,
             "heading" => esc_html__("Description Font Family", 'nonprofit'),
             "param_name" => "nonprofit_pricing_description_font_family",
             "group" => "Per Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Description Font Size", 'nonprofit'),
             "param_name" => "nonprofit_pricing_description_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Per Style",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Description Font Color", 'nonprofit'),
             "param_name" => "nonprofit_pricing_description_color",
             "value" => "",
             "group" => "Per Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Description Font Weight", 'nonprofit'),
             "param_name"   =>   "nonprofit_pricing_description_font_weight",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   '900',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '400',
             ),
             "group" => "Per Style",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Description Text Transform", 'nonprofit'),
             "param_name" => "nonprofit_pricing_description_text_transform",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Per Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Description Line Height", 'nonprofit'),
             "param_name" => "nonprofit_pricing_description_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Per Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Description Letter spacing", 'nonprofit'),
             "param_name" => "nonprofit_pricing_description_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Per Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Description Font Style", 'nonprofit'),
             "param_name"   =>   "nonprofit_pricing_description_font_style",
             'value' => array(
                  esc_html__('Normal', 'nonprofit')  =>   'normal',
                  esc_html__('Italic','nonprofit')        =>   'italic',
                  esc_html__('Inherit','nonprofit')       =>   'inherit',
                  esc_html__('Initial','nonprofit')       =>   'initial',
             ),
             "group" => "Per Style",
        ),


        // Pricing Table List Typo

        array(
             "type" => "dropdown",
             'value' => $nonprofit_fonts_array,
             "heading" => esc_html__("List Font Family", 'nonprofit'),
             "param_name" => "nonprofit_pricing_list_font_family",
             "group" => "List Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("List Font Size", 'nonprofit'),
             "param_name" => "nonprofit_pricing_list_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "List Style",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("List Font Color", 'nonprofit'),
             "param_name" => "nonprofit_pricing_list_color",
             "value" => "",
             "group" => "List Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("List Font Weight", 'nonprofit'),
             "param_name"   =>   "nonprofit_pricing_list_font_weight",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   '400',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '900',
             ),
             "group" => "List Style",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("List Text Transform", 'nonprofit'),
             "param_name" => "nonprofit_pricing_list_text_transform",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "List Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("List Line Height", 'nonprofit'),
             "param_name" => "nonprofit_pricing_list_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "List Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("List Letter spacing", 'nonprofit'),
             "param_name" => "nonprofit_pricing_list_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "List Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("List Font Style", 'nonprofit'),
             "param_name"   =>   "nonprofit_pricing_list_font_style",
             'value' => array(
                  esc_html__('Normal', 'nonprofit')  =>   'normal',
                  esc_html__('Italic','nonprofit')        =>   'italic',
                  esc_html__('Inherit','nonprofit')       =>   'inherit',
                  esc_html__('Initial','nonprofit')       =>   'initial',
             ),
             "group" => "List Style",
        ),



        // Pricing Table Button Typo

        array(
             "type" => "dropdown",
             'value' => $nonprofit_fonts_array,
             "heading" => esc_html__("Button Font Family", 'nonprofit'),
             "param_name" => "nonprofit_pricing_button_font_family",
             "group" => "Button Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Button Font Size", 'nonprofit'),
             "param_name" => "nonprofit_pricing_button_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Button Style",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Button Font Color", 'nonprofit'),
             "param_name" => "nonprofit_pricing_button_color",
             "value" => "",
             "group" => "Button Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Button Font Weight", 'nonprofit'),
             "param_name"   =>   "nonprofit_pricing_button_font_weight",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   '400',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '900',
             ),
             "group" => "Button Style",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Button Text Transform", 'nonprofit'),
             "param_name" => "nonprofit_pricing_button_text_transform",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Button Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Button Line Height", 'nonprofit'),
             "param_name" => "nonprofit_pricing_button_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Button Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Button Letter spacing", 'nonprofit'),
             "param_name" => "nonprofit_pricing_button_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Button Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Button Font Style", 'nonprofit'),
             "param_name"   =>   "nonprofit_pricing_button_font_style",
             'value' => array(
                  esc_html__('Normal', 'nonprofit')  =>   'normal',
                  esc_html__('Italic','nonprofit')        =>   'italic',
                  esc_html__('Inherit','nonprofit')       =>   'inherit',
                  esc_html__('Initial','nonprofit')       =>   'initial',
             ),
             "group" => "Button Style",
        ),



	  $vc_add_css_animation,
  ),
));