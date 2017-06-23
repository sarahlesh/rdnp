<?php
if(!function_exists('nonprofit_drop_cups')){
  function nonprofit_drop_cups($atts) {
		global $nonprofit_fonts_to_enqueue_array;
    extract( shortcode_atts( array(

    
   
    
      'nonprofit_drop_cups_first_lettre'  => '',
      'nonprofit_drop_cups_paragraph' => '',
      'nonprofit_drop_cups_alignment' => '',
      'nonprofit_drop_cups_first_lettre_padding' => '20px',
      'nonprofit_drop_cups_first_lettre_background_color' => '#cd9a00',
      'nonprofit_drop_cups_first_lettre_margin' => '0 12px 0 0',
      'nonprofit_drop_cups_first_lettre_border_width' => '',
      'nonprofit_drop_cups_first_lettre_border_color' => '',
      'nonprofit_drop_cups_first_lettre_border_style' => '',
      'nonprofit_drop_cups_first_lettre_border_radius' => '',

      'nonprofit_drop_cups_first_lettre_font_familly' => 'Playfair Display',
      'nonprofit_drop_cups_first_lettre_font_size' => '33',
      'nonprofit_drop_cups_first_lettre_color' => '#fff',
      'nonprofit_drop_cups_first_lettre_font_weight' => '700',
      'nonprofit_drop_cups_first_lettre_text_transform' => 'uppercase',
      'nonprofit_drop_cups_first_lettre_line_height' => '',
      'nonprofit_drop_cups_first_lettre_font_style' => 'normal',

      'nonprofit_drop_cups_paragraph_font_familly' => '',
      'nonprofit_drop_cups_paragraph_font_size' => '',
      'nonprofit_drop_cups_paragraph_color' => '',
      'nonprofit_drop_cups_paragraph_font_weight' => '',
      'nonprofit_drop_cups_paragraph_text_transform' => '',
      'nonprofit_drop_cups_paragraph_line_height' => '',
      'nonprofit_drop_cups_paragraph_font_style' => '',
      'nonprofit_drop_cups_paragraph_letter_spacing' => '',



      
      'css_animation' => 'no'
    ), $atts ) );


    $animation_classes =  "";
    $data_animated = "";
    
    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}
	  //___________________ Title font Style _______________

	$nonprofit_font_family_drop_cups_to_enqueue = "";

	$custom_drop_cups_first_lettre_inline_style = '';
		if($nonprofit_drop_cups_first_lettre_font_familly != '' && $nonprofit_drop_cups_first_lettre_font_familly != 'Default') {
			$custom_drop_cups_first_lettre_inline_style .= 'font-family:'.esc_attr($nonprofit_drop_cups_first_lettre_font_familly).';';
			$nonprofit_font_family_drop_cups_to_enqueue .= esc_attr($nonprofit_drop_cups_first_lettre_font_familly) . ":";
		}
		if($nonprofit_drop_cups_first_lettre_padding != '') {
			$custom_drop_cups_first_lettre_inline_style .= 'padding:'.esc_attr($nonprofit_drop_cups_first_lettre_padding).';';
		}

		if($nonprofit_drop_cups_alignment == 'right') {
			$custom_drop_cups_first_lettre_inline_style .= 'float: right;';
		}
		if($nonprofit_drop_cups_first_lettre_background_color != '') {
			$custom_drop_cups_first_lettre_inline_style .= 'background-color:'.esc_attr($nonprofit_drop_cups_first_lettre_background_color).';';
		}
		if($nonprofit_drop_cups_first_lettre_margin != '') {
			$custom_drop_cups_first_lettre_inline_style .= 'margin:'.esc_attr($nonprofit_drop_cups_first_lettre_margin).';';
		}
		if($nonprofit_drop_cups_first_lettre_border_width != '') {
			$custom_drop_cups_first_lettre_inline_style .= 'border-width:'.esc_attr($nonprofit_drop_cups_first_lettre_border_width).'px;';
		}
		if($nonprofit_drop_cups_first_lettre_border_color != '') {
			$custom_drop_cups_first_lettre_inline_style .= 'border-color:'.esc_attr($nonprofit_drop_cups_first_lettre_border_color).';';
		}
		if($nonprofit_drop_cups_first_lettre_border_style != '') {
			$custom_drop_cups_first_lettre_inline_style .= 'border-style:'.esc_attr($nonprofit_drop_cups_first_lettre_border_style).';';
		}
		if($nonprofit_drop_cups_first_lettre_border_radius != '') {
			$custom_drop_cups_first_lettre_inline_style .= 'border-radius:'.esc_attr($nonprofit_drop_cups_first_lettre_border_radius).';';
		}

		if($nonprofit_drop_cups_first_lettre_color != '') {
			$custom_drop_cups_first_lettre_inline_style .= 'color:'.esc_attr($nonprofit_drop_cups_first_lettre_color).';';
		}
		if($nonprofit_drop_cups_first_lettre_font_weight != '' && $nonprofit_drop_cups_first_lettre_font_familly != '') {
			$custom_drop_cups_first_lettre_inline_style .= 'font-weight:'.esc_attr($nonprofit_drop_cups_first_lettre_font_weight) . ';';
			$nonprofit_font_family_drop_cups_to_enqueue .= esc_attr($nonprofit_drop_cups_first_lettre_font_weight) . "%7C";
		}
		if($nonprofit_drop_cups_first_lettre_font_size != '') {
			$custom_drop_cups_first_lettre_inline_style .= 'font-size:'.esc_attr($nonprofit_drop_cups_first_lettre_font_size).'px;';
		}
		if($nonprofit_drop_cups_first_lettre_text_transform != '') {
			$custom_drop_cups_first_lettre_inline_style .= 'text-transform:'.esc_attr($nonprofit_drop_cups_first_lettre_text_transform).';';
		}
		if($nonprofit_drop_cups_first_lettre_line_height != '') {
			$custom_drop_cups_first_lettre_inline_style .= 'line-height:'.esc_attr($nonprofit_drop_cups_first_lettre_line_height).'px;';
		}

		$nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_drop_cups_to_enqueue);



		//___________________ Title font Style _______________

		$nonprofit_font_family_drop_cups_to_enqueue = "";

		$custom_drop_cups_paragraph_inline_style = '';
		if($nonprofit_drop_cups_paragraph_font_familly != '' && $nonprofit_drop_cups_paragraph_font_familly != 'Default') {
			$custom_drop_cups_paragraph_inline_style .= 'font-family:'.esc_attr($nonprofit_drop_cups_paragraph_font_familly).';';
			$nonprofit_font_family_drop_cups_to_enqueue .= esc_attr($nonprofit_drop_cups_paragraph_font_familly) . ":";
		}
		if($nonprofit_drop_cups_paragraph_color != '') {
			$custom_drop_cups_paragraph_inline_style .= 'color:'.esc_attr($nonprofit_drop_cups_paragraph_color).';';
		}
		if($nonprofit_drop_cups_paragraph_font_weight != '' && $nonprofit_drop_cups_paragraph_font_familly != '') {
			$custom_drop_cups_paragraph_inline_style .= 'font-weight:'.esc_attr($nonprofit_drop_cups_paragraph_font_weight) . ';';
			$nonprofit_font_family_drop_cups_to_enqueue .= esc_attr($nonprofit_drop_cups_paragraph_font_weight) . "%7C";
		}
		if($nonprofit_drop_cups_paragraph_font_size != '') {
			$custom_drop_cups_paragraph_inline_style .= 'font-size:'.esc_attr($nonprofit_drop_cups_paragraph_font_size).'px;';
		}
		if($nonprofit_drop_cups_paragraph_text_transform != '') {
			$custom_drop_cups_paragraph_inline_style .= 'text-transform:'.esc_attr($nonprofit_drop_cups_paragraph_text_transform).';';
		}
		if($nonprofit_drop_cups_paragraph_line_height != '') {
			$custom_drop_cups_paragraph_inline_style .= 'line-height:'.esc_attr($nonprofit_drop_cups_paragraph_line_height).'px;';
		}
		if($nonprofit_drop_cups_paragraph_letter_spacing != '') {
			$custom_drop_cups_paragraph_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_drop_cups_paragraph_letter_spacing).'px;';
		}

		$nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_drop_cups_to_enqueue);
	  
	  
		$nonprofit_drop_cups_paragraph = rawurldecode( base64_decode( strip_tags( $nonprofit_drop_cups_paragraph ) ) );

    ob_start(); ?>
    
	<div class="<?php echo  esc_attr($animation_classes); ?> clearfix" style="text-align:<?php echo esc_attr($nonprofit_drop_cups_alignment) ?>" <?php echo esc_attr($data_animated); ?>>
		<p style="<?php echo esc_attr($custom_drop_cups_paragraph_inline_style); ?>">
			<span class="wd_firstcharacter" style="<?php echo esc_attr($custom_drop_cups_first_lettre_inline_style); ?>">L</span> <?php echo esc_attr($nonprofit_drop_cups_paragraph); ?>
		</p>
  </div>

    <?php return ob_get_clean();
  }
  add_shortcode( 'nonprofit_drop_cups', 'nonprofit_drop_cups' );
}  
?>