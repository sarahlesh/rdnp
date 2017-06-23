<?php 

global $vc_add_css_animation;
global $nonprofit_fonts_array;
// COUNTUP
// -------------------------------------------------------------------
vc_map( array(
    "name" => esc_html__("Drop Caps", 'nonprofit'),
    "base" => "nonprofit_drop_cups",
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, 
    "is_container" => FALSE,
    "params" => array( 

      array(
            "type" => "textfield",
            "heading" => esc_html__("First Lettre", 'nonprofit'),
            "param_name" => "nonprofit_drop_cups_first_lettre"
        ),
      array(
            "type" => "textarea_raw_html",
            "heading" => esc_html__("Paragraph", 'nonprofit'),
            "param_name" => "nonprofit_drop_cups_paragraph",
            'description' => esc_html__( 'Paragraph text without the first lettre', 'nonprofit' )
        ),
    
      array(
      "heading" => esc_html__("Alignment", 'nonprofit'),
      "type" => "dropdown",
      "param_name" => "nonprofit_drop_cups_alignment",
      'value' => array('Left (Default)' => 'left',
               'center' => 'center',
               'right' => 'right',
               'justify' => 'justify',
              ),
    ),
    array(
       "type" => "textfield",
       "class" => "",
       "heading" => esc_html__("first lettre Padding", 'nonprofit'),
       "param_name" => "nonprofit_drop_cups_first_lettre_padding",
       'description' => esc_html__( 'Example : 6px 6px 6px 6px', 'nonprofit' ),
       "value" => "",
    ),
    array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("first lettre Background color", 'nonprofit'),
             "param_name" => "nonprofit_drop_cups_first_lettre_background_color",
             "value" => ""
        ),
    array(
       "type" => "textfield",
       "class" => "",
       "heading" => esc_html__("first lettre Margin", 'nonprofit'),
       "param_name" => "nonprofit_drop_cups_first_lettre_margin",
       'description' => esc_html__( 'Example : 6px 6px 6px 6px', 'nonprofit' ),
       "value" => "",
    ),
    array(
       "type" => "textfield",
       "class" => "",
       "heading" => esc_html__("first lettre border width", 'nonprofit'),
       "param_name" => "nonprofit_drop_cups_first_lettre_border_width",
       'description' => esc_html__( 'Example : 6px 6px 6px 6px', 'nonprofit' ),
       "value" => "",
    ),
    array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("first lettre border color", 'nonprofit'),
             "param_name" => "nonprofit_drop_cups_first_lettre_border_color",
             "value" => ""
        ),
    array(
    "heading" => esc_html__("first lettre border Style", 'nonprofit'),
    "type" => "dropdown",
    "param_name" => "nonprofit_drop_cups_first_lettre_border_style",
    'value' => array('None (Default)' => 'none',
             'solid' => 'solid',
             'dotted' => 'dotted',
             'dashed' => 'dashed',
             'double' => 'double',
            ),
    ),
    array(
       "type" => "textfield",
       "class" => "",
       "heading" => esc_html__("first lettre border radius", 'nonprofit'),
       "param_name" => "nonprofit_drop_cups_first_lettre_border_radius",
       'description' => esc_html__( 'Example : 6px 6px 6px 6px', 'nonprofit' ),
       "value" => "",
    ),

     
  // First lettre typography
        array(
             "type" => "dropdown",
             'value' => $nonprofit_fonts_array,
             "heading" => esc_html__("first lettre Font Family", 'nonprofit'),
             "param_name" => "nonprofit_drop_cups_first_lettre_font_familly",
             "group" => "First Lettre Typography",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("first lettre Font Size", 'nonprofit'),
             "param_name" => "nonprofit_drop_cups_first_lettre_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "First Lettre Typography",
             'description' => 'Example : 14 (the value will be in px)',
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("first lettre Font Color", 'nonprofit'),
             "param_name" => "nonprofit_drop_cups_first_lettre_color",
             "value" => "",
             "group" => "First Lettre Typography",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("first lettre Font Weight", 'nonprofit'),
             "param_name"   =>   "nonprofit_drop_cups_first_lettre_font_weight",
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
             "group" => "First Lettre Typography",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("first lettre Text Transform", 'nonprofit'),
             "param_name" => "nonprofit_drop_cups_first_lettre_text_transform",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "First Lettre Typography",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("first lettre Line Height", 'nonprofit'),
             "param_name" => "nonprofit_drop_cups_first_lettre_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "First Lettre Typography",
             'description' => 'Example : 14 (the value will be in px)',
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("first lettre Font Style", 'nonprofit'),
             "param_name"   =>   "nonprofit_drop_cups_first_lettre_font_style",
             'value' => array(
                  esc_html__('Normal', 'nonprofit')  =>   'normal',
                  esc_html__('Italic','nonprofit')        =>   'italic',
                  esc_html__('Inherit','nonprofit')       =>   'inherit',
                  esc_html__('Initial','nonprofit')       =>   'initial',
             ),
             "group" => "First Lettre Typography",
        ),


        // Paragraph typography
        array(
             "type" => "dropdown",
             'value' => $nonprofit_fonts_array,
             "heading" => esc_html__("Paragraph Font Family", 'nonprofit'),
             "param_name" => "nonprofit_drop_cups_first_lettre_font_familly",
             "group" => "Paragraph Typography",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Paragraph Font Size", 'nonprofit'),
             "param_name" => "nonprofit_drop_cups_paragraph_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Paragraph Typography",
             'description' => 'Example : 14 (the value will be in px)',
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Paragraph Font Color", 'nonprofit'),
             "param_name" => "nonprofit_drop_cups_paragraph_color",
             "value" => "",
             "group" => "Paragraph Typography",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Paragraph Font Weight", 'nonprofit'),
             "param_name"   =>   "nonprofit_drop_cups_paragraph_font_weight",
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
             "group" => "Paragraph Typography",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Paragraph Text Transform", 'nonprofit'),
             "param_name" => "nonprofit_drop_cups_paragraph_text_transform",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Paragraph Typography",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Paragraph Line Height", 'nonprofit'),
             "param_name" => "nonprofit_drop_cups_paragraph_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Paragraph Typography",
             'description' => 'Example : 14 (the value will be in px)',
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Paragraph Lettre Spacing", 'nonprofit'),
             "param_name" => "nonprofit_drop_cups_paragraph_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Paragraph Typography",
             'description' => 'Example : 1 (the value will be in px)',
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Paragraph Font Style", 'nonprofit'),
             "param_name"   =>   "nonprofit_drop_cups_paragraph_font_style",
             'value' => array(
                  esc_html__('Normal', 'nonprofit')  =>   'normal',
                  esc_html__('Italic','nonprofit')        =>   'italic',
                  esc_html__('Inherit','nonprofit')       =>   'inherit',
                  esc_html__('Initial','nonprofit')       =>   'initial',
             ),
             "group" => "Paragraph Typography",
        ),
        
       $vc_add_css_animation
    )
) );