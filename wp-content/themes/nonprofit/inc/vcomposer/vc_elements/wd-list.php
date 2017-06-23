<?php
global $vc_add_css_animation;
global $nonprofit_fonts_array;

vc_map( array(
  'name' => esc_html__( 'Wd List', 'nonprofit' ),
  'base' => 'nonprofit_list',
  "icon" => get_template_directory_uri()."/images/icon/meknes.png",
  "content_element" => true,
  "is_container"    => false,
  'params' => array(
    
    array(
      'type' => 'param_group',
      'heading' => esc_html__( 'Values', 'nonprofit' ),
      'param_name' => 'values',
      'description' => esc_html__( 'Enter values for graph - value, title and color.', 'nonprofit' ),
      'value' => urlencode( json_encode( array(
        array(
          'label' => esc_html__( 'Put some text here ...', 'nonprofit' ),
          'value' => 'fa fa-adjust',
        ),
        array(
          'label' => esc_html__( 'Put some text here ...', 'nonprofit' ),
          'value' => 'fa fa-adjust',
        ),
      ) ) ),
      'params' => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Label', 'nonprofit' ),
          'param_name' => 'label',
          'description' => esc_html__( 'Enter text used as title of bar.', 'nonprofit' ),
          'admin_label' => true,
        ),
        array(
          'type' => 'iconpicker',
          'heading' => esc_html__( 'Value', 'nonprofit' ),
          'param_name' => 'value',
          'description' => esc_html__( 'Select icon from library.', 'nonprofit' ),
          'admin_label' => true,
        ),
        array(
        'type' => 'colorpicker',
        'heading' => esc_html__( 'Icon color', 'nonprofit' ),
        'param_name' => 'icon_color',
        'description' => esc_html__( 'Select the icon color.', 'nonprofit' ),
        ),
        array(
        'type' => 'colorpicker',
        'heading' => esc_html__( 'Text color', 'nonprofit' ),
        'param_name' => 'text_color',
        'description' => esc_html__( 'Select the text color.', 'nonprofit' ),
        ),
      ),       
    ),
    array(
           "type" => "dropdown",
           "heading"           =>   esc_html__("List Style", 'nonprofit'),
           "param_name"   =>   "nonprofit_list_style",
           'value' => array(
                esc_html__('Default', 'nonprofit') =>   'style-1',
                'Style 2'                 =>   'style-2',
                'Style 2 light'           =>   'style-2-2',
                'Style 3'                 =>   'style-3',
                'Style 3 light'           =>   'style-3-3',
                'Style 4'                 =>   'style-4',
                'Style 4 light'           =>   'style-4-4',
           ),
      ),
    array(
         "type" => "textfield",
         "class" => "",
         "heading" => esc_html__("Icon Padding", 'nonprofit'),
         "param_name" => "nonprofit_icon_padding",
         "suffix" => "px"
    ),
    array(
         "type" => "textfield",
         "class" => "",
         "heading" => esc_html__("Icon Margin", 'nonprofit'),
         "param_name" => "nonprofit_icon_margin",
         "suffix" => "px"
    ),
    // ------------------ Typography
     array(
             "type" => "dropdown",
             'value' => $nonprofit_fonts_array,
             "heading" => esc_html__("Font Family", 'nonprofit'),
             "param_name" => "nonprofit_font_family",
             "group" => "Typography"
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Font Size", 'nonprofit'),
             "param_name" => "nonprofit_font_size",
             "suffix" => "px",
             "group" => "Typography"
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Icon Size", 'nonprofit'),
             "param_name" => "nonprofit_icon_size",
             "suffix" => "px",
             "group" => "Typography"
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Font Weight", 'nonprofit'),
             "param_name"   =>   "nonprofit_font_weight",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   '400',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '900'     =>   '900',
             ),
             "group" => "Typography"
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Text Transform", 'nonprofit'),
             "param_name" => "nonprofit_text_transform",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Typography"
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Line Height", 'nonprofit'),
             "param_name" => "nonprofit_line_height",
             "value" => "30",
             "suffix" => "px",
             "group" => "Typography"
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Letter spacing", 'nonprofit'),
             "param_name" => "nonprofit_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Typography"
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Font Style", 'nonprofit'),
             "param_name"   =>   "nonprofit_font_style",
             'value' => array(
                  esc_html__('Normal', 'nonprofit')  =>   'normal',
                  esc_html__('Italic','nonprofit')        =>   'italic',
                  esc_html__('Inherit','nonprofit')       =>   'inherit',
                  esc_html__('Initial','nonprofit')       =>   'initial',
             ),
             "group" => "Typography"
        ),
    $vc_add_css_animation,
  ),
));