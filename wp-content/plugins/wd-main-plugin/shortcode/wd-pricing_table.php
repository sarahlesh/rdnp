<?php
if(!function_exists('nonprofit_pricing_table')){
  function nonprofit_pricing_table($atts) {
    global $nonprofit_fonts_to_enqueue_array;
    $nonprofit_custom_pricing_title_inline_style = $nonprofit_custom_pricing_price_inline_style = $nonprofit_custom_pricing_per_inline_style = $nonprofit_custom_pricing_description_inline_style = $nonprofit_custom_pricing_list_inline_style = $nonprofit_custom_pricing_button_inline_style = "";
    extract( shortcode_atts( array(
      'title' => 'Standard',
      'values' => '',
      'sub_title' => 'An awesome description',
      'price' => '$99.99',
      'image' => '',
      'per' => 'Month',
      'featured' => '',
      'button_text' => 'Buy Now',
      'button_link' => '#',
      'css_animation' => 'no',


      'nonprofit_pricing_title_font_family' => 'Open Sans',
      'nonprofit_pricing_title_font_size' => '18',
      'nonprofit_pricing_title_color' => '#c90',
      'nonprofit_pricing_title_font_weight' => '700',
      'nonprofit_pricing_title_text_transform' => 'uppercase',
      'nonprofit_pricing_title_line_height' => 'initial',
      'nonprofit_pricing_title_letter_spacing' => '0',
      'nonprofit_pricing_title_font_style' => 'normal',

      'nonprofit_pricing_price_font_family' => 'Montserrat',
      'nonprofit_pricing_price_font_size' => '40',
      'nonprofit_pricing_price_color' => '#333333',
      'nonprofit_pricing_price_font_weight' => '700',
      'nonprofit_pricing_price_text_transform' => 'uppercase',
      'nonprofit_pricing_price_line_height' => '50',
      'nonprofit_pricing_price_letter_spacing' => '0',
      'nonprofit_pricing_price_font_style' => 'normal',

      'nonprofit_pricing_per_font_family' => 'Montserrat',
      'nonprofit_pricing_per_font_size' => '20',
      'nonprofit_pricing_per_color' => '#333333',
      'nonprofit_pricing_per_font_weight' => '700',
      'nonprofit_pricing_per_text_transform' => 'none',
      'nonprofit_pricing_per_line_height' => '',
      'nonprofit_pricing_per_letter_spacing' => '',
      'nonprofit_pricing_per_font_style' => 'normal',

      'nonprofit_pricing_description_font_family' => 'Open Sans',
      'nonprofit_pricing_description_font_size' => '14',
      'nonprofit_pricing_description_color' => '#999999',
      'nonprofit_pricing_description_font_weight' => '400',
      'nonprofit_pricing_description_text_transform' => '#999999',
      'nonprofit_pricing_description_line_height' => '24',
      'nonprofit_pricing_description_letter_spacing' => '',
      'nonprofit_pricing_description_font_style' => 'normal',

      'nonprofit_pricing_list_font_family' => 'Open Sans',
      'nonprofit_pricing_list_font_size' => '14',
      'nonprofit_pricing_list_color' => '#333333',
      'nonprofit_pricing_list_font_weight' => '400',
      'nonprofit_pricing_list_text_transform' => '',
      'nonprofit_pricing_list_line_height' => '',
      'nonprofit_pricing_list_letter_spacing' => '0.35',
      'nonprofit_pricing_list_font_style' => '',

      'nonprofit_pricing_button_font_family' => 'Montserrat',
      'nonprofit_pricing_button_font_size' => '14',
      'nonprofit_pricing_button_color' => '#666666',
      'nonprofit_pricing_button_font_weight' => '700',
      'nonprofit_pricing_button_text_transform' => 'uppercase',
      'nonprofit_pricing_button_line_height' => '0',
      'nonprofit_pricing_button_letter_spacing' => '0.35',
      'nonprofit_pricing_button_font_style' => '',




    ), $atts ) );

    ob_start(); ?>
    <?php
    $animation_classes =  "";
    $data_animated = "";
    
    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
    }


    $values = (array) vc_param_group_parse_atts( $values );

    $graph_lines_data = array();
    foreach ( $values as $data ) {
      $new_line = $data;
      $new_line['text'] = isset( $data['text'] ) ? $data['text'] : '1 Database';
      
      $graph_lines_data[] = $new_line;
    }





    $nonprofit_font_family_pricing_to_enqueue = "";
    // pricing Title inline style
    if($nonprofit_pricing_title_font_family != '') {
      $nonprofit_custom_pricing_title_inline_style .= 'font-family:'.esc_attr($nonprofit_pricing_title_font_family).';';
      $nonprofit_font_family_pricing_to_enqueue .= esc_attr($nonprofit_pricing_title_font_family) . ":";
    }
    if($nonprofit_pricing_title_font_size != '') {
      $nonprofit_custom_pricing_title_inline_style .= 'font-size:'.esc_attr($nonprofit_pricing_title_font_size).'px;';
    }
    if($nonprofit_pricing_title_color != '') {
      $nonprofit_custom_pricing_title_inline_style .= 'color:'.esc_attr($nonprofit_pricing_title_color).';';
    }
    if($nonprofit_pricing_title_font_weight != '' && $nonprofit_pricing_title_font_family != '') {
      $nonprofit_custom_pricing_title_inline_style .= 'font-weight:'.esc_attr($nonprofit_pricing_title_font_weight).';';
      $nonprofit_font_family_pricing_to_enqueue .= esc_attr($nonprofit_pricing_title_font_weight) . "%7C";
    }
    if($nonprofit_pricing_title_text_transform != '') {
      $nonprofit_custom_pricing_title_inline_style .= 'text-transform:'.esc_attr($nonprofit_pricing_title_text_transform).';';
    }
    if($nonprofit_pricing_title_line_height != '') {
      $nonprofit_custom_pricing_title_inline_style .= 'line-height:'.esc_attr($nonprofit_pricing_title_line_height).'px;';
    }
    if($nonprofit_pricing_title_letter_spacing != '') {
      $nonprofit_custom_pricing_title_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_pricing_title_letter_spacing).'px;';
    }
    if($nonprofit_pricing_title_font_style != '') {
      $nonprofit_custom_pricing_title_inline_style .= 'font-style:'.esc_attr($nonprofit_pricing_title_font_style).';';
    }

    $nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_pricing_to_enqueue);



    $nonprofit_font_family_pricing_to_enqueue = "";
    // pricing price inline style
    if($nonprofit_pricing_price_font_family != '') {
      $nonprofit_custom_pricing_price_inline_style .= 'font-family:'.esc_attr($nonprofit_pricing_price_font_family).';';
      $nonprofit_font_family_pricing_to_enqueue .= esc_attr($nonprofit_pricing_price_font_family) . ":";
    }
    if($nonprofit_pricing_price_font_size != '') {
      $nonprofit_custom_pricing_price_inline_style .= 'font-size:'.esc_attr($nonprofit_pricing_price_font_size).'px;';
    }
    if($nonprofit_pricing_price_color != '') {
      $nonprofit_custom_pricing_price_inline_style .= 'color:'.esc_attr($nonprofit_pricing_price_color).';';
    }
    if($nonprofit_pricing_price_font_weight != '' && $nonprofit_pricing_price_font_family != '') {
      $nonprofit_custom_pricing_price_inline_style .= 'font-weight:'.esc_attr($nonprofit_pricing_price_font_weight).';';
      $nonprofit_font_family_pricing_to_enqueue .= esc_attr($nonprofit_pricing_price_font_weight) . "%7C";
    }
    if($nonprofit_pricing_price_text_transform != '') {
      $nonprofit_custom_pricing_price_inline_style .= 'text-transform:'.esc_attr($nonprofit_pricing_price_text_transform).';';
    }
    if($nonprofit_pricing_price_line_height != '') {
      $nonprofit_custom_pricing_price_inline_style .= 'line-height:'.esc_attr($nonprofit_pricing_price_line_height).'px;';
    }
    if($nonprofit_pricing_price_letter_spacing != '') {
      $nonprofit_custom_pricing_price_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_pricing_price_letter_spacing).'px;';
    }
    if($nonprofit_pricing_price_font_style != '') {
      $nonprofit_custom_pricing_price_inline_style .= 'font-style:'.esc_attr($nonprofit_pricing_price_font_style).';';
    }

    $nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_pricing_to_enqueue);




    $nonprofit_font_family_pricing_to_enqueue = "";
    // pricing per inline style
    if($nonprofit_pricing_per_font_family != '') {
      $nonprofit_custom_pricing_per_inline_style .= 'font-family:'.esc_attr($nonprofit_pricing_per_font_family).';';
      $nonprofit_font_family_pricing_to_enqueue .= esc_attr($nonprofit_pricing_per_font_family) . ":";
    }
    if($nonprofit_pricing_per_font_size != '') {
      $nonprofit_custom_pricing_per_inline_style .= 'font-size:'.esc_attr($nonprofit_pricing_per_font_size).'px;';
    }
    if($nonprofit_pricing_per_color != '') {
      $nonprofit_custom_pricing_per_inline_style .= 'color:'.esc_attr($nonprofit_pricing_per_color).';';
    }
    if($nonprofit_pricing_per_font_weight != '' && $nonprofit_pricing_per_font_family != '') {
      $nonprofit_custom_pricing_per_inline_style .= 'font-weight:'.esc_attr($nonprofit_pricing_per_font_weight).';';
      $nonprofit_font_family_pricing_to_enqueue .= esc_attr($nonprofit_pricing_per_font_weight) . "%7C";
    }
    if($nonprofit_pricing_per_text_transform != '') {
      $nonprofit_custom_pricing_per_inline_style .= 'text-transform:'.esc_attr($nonprofit_pricing_per_text_transform).';';
    }
    if($nonprofit_pricing_per_line_height != '') {
      $nonprofit_custom_pricing_per_inline_style .= 'line-height:'.esc_attr($nonprofit_pricing_per_line_height).'px;';
    }
    if($nonprofit_pricing_per_letter_spacing != '') {
      $nonprofit_custom_pricing_per_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_pricing_per_letter_spacing).'px;';
    }
    if($nonprofit_pricing_per_font_style != '') {
      $nonprofit_custom_pricing_per_inline_style .= 'font-style:'.esc_attr($nonprofit_pricing_per_font_style).';';
    }

    $nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_pricing_to_enqueue);


    $nonprofit_font_family_pricing_to_enqueue = "";
    // pricing description inline style
    if($nonprofit_pricing_description_font_family != '') {
      $nonprofit_custom_pricing_description_inline_style .= 'font-family:'.esc_attr($nonprofit_pricing_description_font_family).';';
      $nonprofit_font_family_pricing_to_enqueue .= esc_attr($nonprofit_pricing_description_font_family) . ":";
    }
    if($nonprofit_pricing_description_font_size != '') {
      $nonprofit_custom_pricing_description_inline_style .= 'font-size:'.esc_attr($nonprofit_pricing_description_font_size).'px;';
    }
    if($nonprofit_pricing_description_color != '') {
      $nonprofit_custom_pricing_description_inline_style .= 'color:'.esc_attr($nonprofit_pricing_description_color).';';
    }
    if($nonprofit_pricing_description_font_weight != '' && $nonprofit_pricing_description_font_family != '') {
      $nonprofit_custom_pricing_description_inline_style .= 'font-weight:'.esc_attr($nonprofit_pricing_description_font_weight).';';
      $nonprofit_font_family_pricing_to_enqueue .= esc_attr($nonprofit_pricing_description_font_weight) . "%7C";
    }
    if($nonprofit_pricing_description_text_transform != '') {
      $nonprofit_custom_pricing_description_inline_style .= 'text-transform:'.esc_attr($nonprofit_pricing_description_text_transform).';';
    }
    if($nonprofit_pricing_description_line_height != '') {
      $nonprofit_custom_pricing_description_inline_style .= 'line-height:'.esc_attr($nonprofit_pricing_description_line_height).'px;';
    }
    if($nonprofit_pricing_description_letter_spacing != '') {
      $nonprofit_custom_pricing_description_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_pricing_description_letter_spacing).'px;';
    }
    if($nonprofit_pricing_description_font_style != '') {
      $nonprofit_custom_pricing_description_inline_style .= 'font-style:'.esc_attr($nonprofit_pricing_description_font_style).';';
    }

    $nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_pricing_to_enqueue);


    $nonprofit_font_family_pricing_to_enqueue = "";
    // pricing List inline style
    if($nonprofit_pricing_list_font_family != '') {
      $nonprofit_custom_pricing_list_inline_style .= 'font-family:'.esc_attr($nonprofit_pricing_list_font_family).';';
      $nonprofit_font_family_pricing_to_enqueue .= esc_attr($nonprofit_pricing_list_font_family) . ":";
    }
    if($nonprofit_pricing_list_font_size != '') {
      $nonprofit_custom_pricing_list_inline_style .= 'font-size:'.esc_attr($nonprofit_pricing_list_font_size).'px;';
    }
    if($nonprofit_pricing_list_color != '') {
      $nonprofit_custom_pricing_list_inline_style .= 'color:'.esc_attr($nonprofit_pricing_list_color).';';
    }
    if($nonprofit_pricing_list_font_weight != '' && $nonprofit_pricing_list_font_family != '') {
      $nonprofit_custom_pricing_list_inline_style .= 'font-weight:'.esc_attr($nonprofit_pricing_list_font_weight).';';
      $nonprofit_font_family_pricing_to_enqueue .= esc_attr($nonprofit_pricing_list_font_weight) . "%7C";
    }
    if($nonprofit_pricing_list_text_transform != '') {
      $nonprofit_custom_pricing_list_inline_style .= 'text-transform:'.esc_attr($nonprofit_pricing_list_text_transform).';';
    }
    if($nonprofit_pricing_list_line_height != '') {
      $nonprofit_custom_pricing_list_inline_style .= 'line-height:'.esc_attr($nonprofit_pricing_list_line_height).'px;';
    }
    if($nonprofit_pricing_list_letter_spacing != '') {
      $nonprofit_custom_pricing_list_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_pricing_list_letter_spacing).'px;';
    }
    if($nonprofit_pricing_list_font_style != '') {
      $nonprofit_custom_pricing_list_inline_style .= 'font-style:'.esc_attr($nonprofit_pricing_list_font_style).';';
    }

    $nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_pricing_to_enqueue);


    $nonprofit_font_family_pricing_to_enqueue = "";
    // pricing Button inline style
    if($nonprofit_pricing_button_font_family != '') {
      $nonprofit_custom_pricing_button_inline_style .= 'font-family:'.esc_attr($nonprofit_pricing_button_font_family).';';
      $nonprofit_font_family_pricing_to_enqueue .= esc_attr($nonprofit_pricing_button_font_family) . ":";
    }
    if($nonprofit_pricing_button_font_size != '') {
      $nonprofit_custom_pricing_button_inline_style .= 'font-size:'.esc_attr($nonprofit_pricing_button_font_size).'px;';
    }
    if($nonprofit_pricing_button_color != '') {
      $nonprofit_custom_pricing_button_inline_style .= 'color:'.esc_attr($nonprofit_pricing_button_color).';';
    }
    if($nonprofit_pricing_button_font_weight != '' && $nonprofit_pricing_button_font_family != '') {
      $nonprofit_custom_pricing_button_inline_style .= 'font-weight:'.esc_attr($nonprofit_pricing_button_font_weight).';';
      $nonprofit_font_family_pricing_to_enqueue .= esc_attr($nonprofit_pricing_button_font_weight) . "%7C";
    }
    if($nonprofit_pricing_button_text_transform != '') {
      $nonprofit_custom_pricing_button_inline_style .= 'text-transform:'.esc_attr($nonprofit_pricing_button_text_transform).';';
    }
    if($nonprofit_pricing_button_line_height != '') {
      $nonprofit_custom_pricing_button_inline_style .= 'line-height:'.esc_attr($nonprofit_pricing_button_line_height).'px;';
    }
    if($nonprofit_pricing_button_letter_spacing != '') {
      $nonprofit_custom_pricing_button_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_pricing_button_letter_spacing).'px;';
    }
    if($nonprofit_pricing_button_font_style != '') {
      $nonprofit_custom_pricing_button_inline_style .= 'font-style:'.esc_attr($nonprofit_pricing_button_font_style).';';
    }

    $nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_pricing_to_enqueue);




?>

  <div class="pricing-table <?php if ($featured == true) {echo "featured";} ?> <?php echo  esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
    <?php 
    $img_id = preg_replace( '/[^\d]/', '', $image );
    $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'full_size' => 'full','thumb_size' => 'thumbnail') );

    $img_path = $img['p_img_large'][0];
    $image = nonprofit_resize( $img_path, 218, 185, true, true, true );
     ?>
     <?php if ($img_id == "") { ?>
     <?php } else { ?>
        <div class="pricing-table-img">
         <img src="<?php echo $image; ?>" alt="">
        </div>
      <?php } ?>
    <div class="title" style="<?php echo esc_attr($nonprofit_custom_pricing_title_inline_style); ?>"><?php echo esc_attr($title); ?></div>
    <div class="price" style="<?php echo esc_attr($nonprofit_custom_pricing_price_inline_style); ?>"><?php echo esc_attr($price) ?><span style="<?php echo esc_attr($nonprofit_custom_pricing_per_inline_style); ?>"><?php echo "/" . $per ?></span></div>
    <div class="description" style="<?php echo esc_attr($nonprofit_custom_pricing_description_inline_style); ?>"><?php echo $sub_title; ?></div>
    <ul>
    <?php
      foreach ( $graph_lines_data as $line ) {
        $line_value =  $line['text'];
      ?>
      <li class="bullet-item" style="<?php echo esc_attr($nonprofit_custom_pricing_list_inline_style); ?>"><i class="ion-ios-checkmark-empty"></i><?php echo esc_attr($line_value) ?></li>
    <?php
    } ?>
    </ul>
    <div class="cta-button"><a style="<?php echo esc_attr($nonprofit_custom_pricing_button_inline_style); ?>" href="<?php echo esc_attr($button_link) ?>" class="button"><?php echo esc_attr($button_text) ?><i class="ion-ios-arrow-thin-right"></i></a></div>
  </div>


    <?php return ob_get_clean();
  }
  add_shortcode( 'nonprofit_pricing_table', 'nonprofit_pricing_table' );
}
?>