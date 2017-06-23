<?php
if(!function_exists('nonprofit_count_up')){
  function nonprofit_count_up($atts) {
		global $nonprofit_fonts_to_enqueue_array;
    extract( shortcode_atts( array(
    //___________general_________
    
   
    
      'nonprofit_countup_alignment'  => 'left',
      "nonprofit_countup_layout"=> 'style1',
      //___________Title_________
     'nonprofit_countup_title'  => '',
     'nonprofit_countup_title_color'  => '',
     'nonprofit_countup_title_padding'  => '',
     'nonprofit_countup_title_font_family'  => '',
     'nonprofit_countup_title_font_weight'  => '',
     'nonprofit_countup_title_font_size'  => '',
     'nonprofit_countup_title_text_transform'  => '',
     'nonprofit_countup_title_line_height'  => '',
     'nonprofit_countup_title_letter_spacing'  => '',
      //___________Number_________
     'nonprofit_countup_number'  => '',
     'nonprofit_countup_number_padding'  => '',
     'nonprofit_countup_number_color'  => '',
     'nonprofit_countup_number_font_family'  => '',
     'nonprofit_countup_number_font_weight'  => '',
     'nonprofit_countup_number_font_size'  => '',
     'nonprofit_countup_number_text_transform'  => '',
     'nonprofit_countup_number_line_height'  => '',
     'nonprofit_countup_number_letter_spacing'  => '',
     //___________icon_________
     'nonprofit_countup_switch'  => '',
     'nonprofit_countup_image'  => '',
     'nonprofit_coundup_fontawesome'  => '',
     'nonprofit_countup_icon_padding'  => '',
     'nonprofit_countup_icon_color'  => '',
     'nonprofit_countup_icon_font_size'  => '',
      'css_animation' => 'no'
    ), $atts ) );


    $animation_classes =  "";
    $data_animated = "";
    
    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}
	  //___________________ Title font Style _______________

	$nonprofit_font_family_countup_to_enqueue = "";

	$custom_title_inline_style = '';
		if($nonprofit_countup_title_font_family != '' && $nonprofit_countup_title_font_family != 'Default') {
			$custom_title_inline_style .= 'font-family:'.esc_attr($nonprofit_countup_title_font_family).';';
			$nonprofit_font_family_countup_to_enqueue .= esc_attr($nonprofit_countup_title_font_family) . ":";
		}
		if($nonprofit_countup_title_padding != '') {
			$custom_title_inline_style .= 'padding:'.esc_attr($nonprofit_countup_title_padding).';';
		}
		if($nonprofit_countup_title_color != '') {
			$custom_title_inline_style .= 'color:'.esc_attr($nonprofit_countup_title_color).';';
		}
		if($nonprofit_countup_title_font_weight != '' && $nonprofit_countup_title_font_family != '') {
			$custom_title_inline_style .= 'font-weight:'.esc_attr($nonprofit_countup_title_font_weight) . ';';
			$nonprofit_font_family_countup_to_enqueue .= esc_attr($nonprofit_countup_title_font_weight) . "%7C";
		}
		if($nonprofit_countup_title_font_size != '') {
			$custom_title_inline_style .= 'font-size:'.esc_attr($nonprofit_countup_title_font_size).'px;';
		}
		if($nonprofit_countup_title_text_transform != '') {
			$custom_title_inline_style .= 'text-transform:'.esc_attr($nonprofit_countup_title_text_transform).';';
		}
		if($nonprofit_countup_title_line_height != '') {
			$custom_title_inline_style .= 'line-height:'.esc_attr($nonprofit_countup_title_line_height).'px;';
		}
		if($nonprofit_countup_title_letter_spacing != '') {
			$custom_title_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_countup_title_letter_spacing).'px;';
		}

		$nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_countup_to_enqueue);


		$nonprofit_font_family_countup_to_enqueue = "";
	  //___________Number style_________
	  $custom_number_inline_style ='';
		if($nonprofit_countup_number_color != '') {
			$custom_number_inline_style .= 'color:'.esc_attr($nonprofit_countup_number_color).';';
		}
		if($nonprofit_countup_number_font_family != '' && $nonprofit_countup_number_font_family != 'Default') {
			$custom_number_inline_style .= 'font-family:'.esc_attr($nonprofit_countup_number_font_family).';';
			$nonprofit_font_family_countup_to_enqueue .= esc_attr($nonprofit_countup_number_font_family) . ":";
		}
		if($nonprofit_countup_number_font_weight != '' && $nonprofit_countup_number_font_family != '') {
			$custom_number_inline_style .= 'font-weight:'.esc_attr($nonprofit_countup_number_font_weight).';';
			$nonprofit_font_family_countup_to_enqueue .= esc_attr($nonprofit_countup_number_font_weight) . "%7C";
		}
		if($nonprofit_countup_number_font_size != '') {
			$custom_number_inline_style .= 'font-size:'.esc_attr($nonprofit_countup_number_font_size).'px;';
		}
		if($nonprofit_countup_number_text_transform != '') {
			$custom_number_inline_style .= 'text-transform:'.esc_attr($nonprofit_countup_number_text_transform).';';
		}
		if($nonprofit_countup_number_line_height != '') {
			$custom_number_inline_style .= 'line-height:'.esc_attr($nonprofit_countup_number_line_height).'px;';
		}
		if($nonprofit_countup_number_letter_spacing != '') {
			$custom_number_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_countup_number_letter_spacing).'px;';
		}
		if($nonprofit_countup_number_padding != '') {
			$custom_number_inline_style .= 'padding:'.esc_attr($nonprofit_countup_number_padding).';';
		}

		$nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_countup_to_enqueue);

    //_________________________Icon style ___________________________
		$custom_icon_inline_style ='';
		if($nonprofit_countup_icon_color != '') {
			$custom_icon_inline_style .= 'color:'.esc_attr($nonprofit_countup_icon_color).';';
		}
		if($nonprofit_countup_icon_font_size != '') {
			$custom_icon_inline_style .= 'font-size:'.esc_attr($nonprofit_countup_icon_font_size).'px;';
		}
		if($nonprofit_countup_icon_padding != '') {
			$custom_icon_inline_style .= 'padding:'.esc_attr($nonprofit_countup_icon_padding).';';
		}

    ob_start(); ?>
    
	<div class="<?php echo  esc_attr($animation_classes); ?> clearfix" style="text-align:<?php echo esc_attr($nonprofit_countup_alignment) ?>" <?php echo esc_attr($data_animated); ?>>
		
		<?php if($nonprofit_countup_layout == 'style1') {  ?>
			<?php if($nonprofit_countup_switch == 'nonprofit_countup_icon') { ?>
	    	<i class="fa fa-<?php echo esc_attr($nonprofit_coundup_fontawesome) ?>" style="<?php echo esc_attr($custom_icon_inline_style) ?>"></i>
	    	<?php }elseif($nonprofit_countup_switch == 'nonprofit_countup_image'){
	    		$nonprofit_image = wp_get_attachment_image_src( $nonprofit_countup_image, '150X150');
					?>
					<img src="<?php echo esc_url($nonprofit_image[0]) ?>" style="<?php echo esc_attr($custom_icon_inline_style) ?>">
					<?php
	    	} ?>
	    	<h5 style="<?php echo esc_attr($custom_number_inline_style) ?>" class="counter" data-file="<?php echo esc_attr($nonprofit_countup_number) ?>"><?php echo esc_attr($nonprofit_countup_number) ?> </h5>
	    	<h2 style="<?php echo esc_attr($custom_title_inline_style) ?>"><?php echo esc_attr($nonprofit_countup_title) ?></h2>
	    
    	<?php }elseif($nonprofit_countup_layout == 'style2'){ ?>
    		<h2 style="<?php echo esc_attr($custom_title_inline_style) ?>"><?php echo esc_attr($nonprofit_countup_title) ?></h2>
    		<?php if($nonprofit_countup_switch == 'nonprofit_countup_icon') { ?>
	    	<i class="fa fa-<?php echo esc_attr($nonprofit_coundup_fontawesome) ?>" style="<?php echo esc_attr($custom_icon_inline_style) ?>"></i>
	    	<?php }elseif($nonprofit_countup_switch == 'nonprofit_countup_image'){
	    		$nonprofit_image = wp_get_attachment_image_src( $nonprofit_countup_image, '150X150');
					?>
					<img src="<?php echo esc_url($nonprofit_image[0]) ?>" style="<?php echo esc_attr($custom_icon_inline_style) ?>">
					<?php
	    	} ?>
	    	<h5 style="<?php echo esc_attr($custom_number_inline_style) ?>" class="counter" data-file="<?php echo esc_attr($nonprofit_countup_number) ?>"><?php echo esc_attr($nonprofit_countup_number) ?> </h5>
	    	
		
    	<?php }else{ ?>
    		<h5 style="<?php echo esc_attr($custom_number_inline_style) ?>" class="counter" data-file="<?php echo esc_attr($nonprofit_countup_number) ?>"><?php echo esc_attr($nonprofit_countup_number) ?> </h5>
    		<?php if($nonprofit_countup_switch == 'nonprofit_countup_icon') { ?>
	    	<i class="fa fa-<?php echo esc_attr($nonprofit_coundup_fontawesome) ?>" style="<?php echo esc_attr($custom_icon_inline_style) ?>"></i>
	    	<?php }elseif($nonprofit_countup_switch == 'nonprofit_countup_image'){
	    		$nonprofit_image = wp_get_attachment_image_src( $nonprofit_countup_image, '150X150');
					?>
					<img src="<?php echo esc_url($nonprofit_image[0]) ?>" style="<?php echo esc_attr($custom_icon_inline_style) ?>">
					<?php
	    	} ?>
	    	
	    	<h2 style="<?php echo esc_attr($custom_title_inline_style) ?>"><?php echo esc_attr($nonprofit_countup_title) ?></h2>
			
    	<?php } ?>
    	
    </div>

    <?php return ob_get_clean();
  }
  add_shortcode( 'nonprofit_count_up', 'nonprofit_count_up' );
}  
?>