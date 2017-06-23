<?php
if(!function_exists('nonprofit_text_icon')){
  function nonprofit_text_icon($atts) {
    global $nonprofit_fonts_to_enqueue_array;
    extract( shortcode_atts( array(
    //__________General___________
      'box_alignment' => 'left',
      'box_style' => '',
      'box_contenttitle_padding' => '',
      'box_link_apply' => '',
      'box_extra_class_name' => '',
      'box_show_subtitle' => '',
      'box_hover_style' => 'none',
      'nonprofit_switch_title_subtitle' => 'true',
      'box_background_image' => '',
      'box_background_color' => '',
      'box_hover_background_color' => '',
    //__________Title___________  
      'box_title' => 'Block title',
      'box_title_balises' => 'h2',
      'box_title_padding' => '0px',
      'box_title_color' => '#eee',
      'nonprofit_title_letter_spacing' => '',
      'nonprofit_title_font_family' => '',
      'nonprofit_title_font_weight' => '',
      'nonprofit_title_font_size' => '',
      'nonprofit_title_text_transform' => '',
      'nonprofit_title_line_height' => '',
      'nonprofit_title_letter_spacing' => '',
      //_______separator___________
      'box_title_separator_color' => '',
      'box_title_separator_height' => '',
      'box_title_separator_width' => '',
    //__________SubTitle___________  
      'box_subtitle' => '',
      'box_subtitle_padding' => '0px',
      'box_subtitle_color' => '#eee',
      'nonprofit_subtitle_font_family' => '',
      'nonprofit_subtitle_font_weight' => '',
      'nonprofit_subtitle_font_size' => '',
      'nonprofit_subtitle_text_transform' => '',
      'nonprofit_subtitle_line_height' => '',
      'nonprofit_subtitle_letter_spacing' => '',
     //__________Content___________  
      'box_content' => 'Block title',
      'box_content_padding' => '0px',
      'box_content_color' => '#eee',
      'nonprofit_content_font_family' => '',
      'nonprofit_content_font_weight' => '',
      'nonprofit_content_font_size' => '',
      'nonprofit_content_text_transform' => '',
      'nonprofit_content_line_height' => '',
      'nonprofit_content_letter_spacing' => '',
      //__________Icon___________
      	'nonprofit_icon_fontawesome' => '',
      	'box_icon_color' => '#eee',
      	'nonprofit_switch' => '',
      	'nonprofit_source_image' => '',
      	'box_icon_padding' => '0px',
      	'nonprofit_icon_font_size' => '',
      	'box_icon_margin' => '',
		'box_icon_border_style' => '',
		'box_icon_background_color' => '',
		'box_icon_border_color' => '',
		'box_icon_border_width' => '',
		'box_icon_border_radius' => '',
      	
      //__________Link___________
      	'box_link_apply' => '',
      	'box_link' => '',
      	'box_read_more' => 'Block title',
      	'box_read_more_class' => 'button',
      	//___________animation___________
      	'css_animation' => 'no'
     
    ), $atts ) );


	$box_title = str_replace("{","<span>", $box_title);
	$box_title = str_replace("}","</span>", $box_title);

	$box_title = str_replace("/n","<br/>", $box_title);
	//$box_content =str_replace("/n","<br/>", $box_content);

	$nonprofit_custom_box_icon_background_inline_style = '';
	if($box_background_image != '') {
		$box_background_image = wp_get_attachment_image_src($box_background_image , 'full');
		$nonprofit_custom_box_icon_background_inline_style .= 'background : url('. $box_background_image[0] .');';
	}
	if($box_background_color != ''){
		$nonprofit_custom_box_icon_background_inline_style .= 'background : '.esc_attr($box_background_color).';';
	}
	
	//______________ block alignment ______________
	$nonprofit_custom_box_icon_position_inline_style = '';
	$nonprofit_custom_box_icon_position_padding_inline_style =  ($box_contenttitle_padding != "") ? 'padding:'. $box_contenttitle_padding  : "";
	if($box_style == 'style2') {
		$nonprofit_custom_box_icon_position_inline_style .= 'position:absolute;left:0;';
	}elseif($box_style == 'style3'){
		$nonprofit_custom_box_icon_position_inline_style .= 'position:absolute;right:0;';
	}
		$nonprofit_custom_box_hover = '';
	if($box_hover_style != 'none') {
			$nonprofit_custom_box_hover = esc_attr($box_hover_style);
		}
	//______________ block alignment ______________
	$nonprofit_custom_box_inline_style='';
		if($box_alignment != '') {
			$nonprofit_custom_box_inline_style .= 'text-align:'.esc_attr($box_alignment).';';
		}
	//___________________ Title font Style _______________
	$nonprofit_custom_title_inline_style = '';
	if($box_title_balises != '') {
			$nonprofit_custom_title_balise = esc_attr($box_title_balises);
		}
		
		$nonprofit_font_family_text_icon_to_enqueue = "";

		if($nonprofit_title_font_family != '') {
			$nonprofit_custom_title_inline_style .= 'font-family:'.esc_attr($nonprofit_title_font_family).';';
			$nonprofit_font_family_text_icon_to_enqueue .= esc_attr($nonprofit_title_font_family) . ":";
		}
		if($box_title_padding != '') {
			$nonprofit_custom_title_inline_style .= 'padding:'.esc_attr($box_title_padding).';';
		}
		if($box_title_color != '') {
			$nonprofit_custom_title_inline_style .= 'color:'.esc_attr($box_title_color).';';
		}
		if($nonprofit_title_font_weight != '' && $nonprofit_title_font_family != '') {
			$nonprofit_custom_title_inline_style .= 'font-weight:'.esc_attr($nonprofit_title_font_weight).';';
			$nonprofit_font_family_text_icon_to_enqueue .= esc_attr($nonprofit_title_font_weight) . "%7C";
		}
		if($nonprofit_title_font_size != '') {
			$nonprofit_custom_title_inline_style .= 'font-size:'.esc_attr($nonprofit_title_font_size).'px;';
		}
		if($nonprofit_title_text_transform != '') {
			$nonprofit_custom_title_inline_style .= 'text-transform:'.esc_attr($nonprofit_title_text_transform).';';
		}
		if($nonprofit_title_line_height != '') {
			$nonprofit_custom_title_inline_style .= 'line-height:'.esc_attr($nonprofit_title_line_height).'px;';
		}
		if($nonprofit_title_letter_spacing != '') {
			$nonprofit_custom_title_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_title_letter_spacing).'px;';
		}


		$nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_text_icon_to_enqueue);
		
	//___________________separator____________________________________
		$nonprofit_custom_title_separator_inline_style = '';
		if($box_title_separator_color != '') {
			$nonprofit_custom_title_separator_inline_style .= 'background:'.esc_attr($box_title_separator_color).';';
		}
		if($box_title_separator_width != '') {
			$nonprofit_custom_title_separator_inline_style .= 'width:'.esc_attr($box_title_separator_width).';';
		}
		if($box_title_separator_height != '') {
			$nonprofit_custom_title_separator_inline_style .= 'height:'.esc_attr($box_title_separator_height).';';
		}	
	//___________________ SubTitle font Style _______________	

	$nonprofit_font_family_text_icon_to_enqueue = "";

	$nonprofit_custom_subtitle_inline_style = '';
		if($nonprofit_subtitle_font_family != '') {
			$nonprofit_custom_subtitle_inline_style .= 'font-family:'.esc_attr($nonprofit_subtitle_font_family).';';
			$nonprofit_font_family_text_icon_to_enqueue .= esc_attr($nonprofit_subtitle_font_family) . ":";
		}
		if($box_subtitle_padding != '') {
			$nonprofit_custom_subtitle_inline_style .= 'padding:'.esc_attr($box_subtitle_padding).';';
		}
		if($box_subtitle_color != '') {
			$nonprofit_custom_subtitle_inline_style .= 'color:'.esc_attr($box_subtitle_color).';';
		}
		if($nonprofit_subtitle_font_weight != '' && $nonprofit_subtitle_font_family != '') {
			$nonprofit_custom_subtitle_inline_style .= 'font-weight:'.esc_attr($nonprofit_subtitle_font_weight).';';
			$nonprofit_font_family_text_icon_to_enqueue .= esc_attr($nonprofit_subtitle_font_weight) . "%7C";
		}
		if($nonprofit_subtitle_font_size != '') {
			$nonprofit_custom_subtitle_inline_style .= 'font-size:'.esc_attr($nonprofit_subtitle_font_size).'px;';
		}
		if($nonprofit_subtitle_text_transform != '') {
			$nonprofit_custom_subtitle_inline_style .= 'text-transform:'.esc_attr($nonprofit_subtitle_text_transform).';';
		}
		if($nonprofit_subtitle_line_height != '') {
			$nonprofit_custom_subtitle_inline_style .= 'line-height:'.esc_attr($nonprofit_subtitle_line_height).'px;';
		}
		if($nonprofit_subtitle_letter_spacing != '') {
			$nonprofit_custom_subtitle_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_subtitle_letter_spacing).'px;';
		}

		$nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_text_icon_to_enqueue);
		$nonprofit_font_family_text_icon_to_enqueue = "";
	//___________________ content font Style _______________	
	$nonprofit_custom_content_inline_style = '';

		if($nonprofit_content_font_family != '') {
			$nonprofit_custom_content_inline_style .= 'font-family:'.esc_attr($nonprofit_content_font_family).';';
			$nonprofit_font_family_text_icon_to_enqueue .= esc_attr($nonprofit_content_font_family) . ":";
		}
		if($box_content_padding != '') {
			$nonprofit_custom_content_inline_style .= 'padding:'.esc_attr($box_content_padding).';';
		}
		if($box_content_color != '') {
			$nonprofit_custom_content_inline_style .= 'color:'.esc_attr($box_content_color).';';
		}
		if($nonprofit_content_font_weight != '' && $nonprofit_content_font_family != '') {
			$nonprofit_custom_content_inline_style .= 'font-weight:'.esc_attr($nonprofit_content_font_weight).';';
			$nonprofit_font_family_text_icon_to_enqueue .= esc_attr($nonprofit_content_font_weight) . "%7C";
		}
		if($nonprofit_content_font_size != '') {
			$nonprofit_custom_content_inline_style .= 'font-size:'.esc_attr($nonprofit_content_font_size).'px;';
		}
		if($nonprofit_content_text_transform != '') {
			$nonprofit_custom_content_inline_style .= 'text-transform:'.esc_attr($nonprofit_content_text_transform).';';
		}
		if($nonprofit_content_line_height != '') {
			$nonprofit_custom_content_inline_style .= 'line-height:'.esc_attr($nonprofit_content_line_height).'px;';
		}
		if($nonprofit_content_letter_spacing != '') {
			$nonprofit_custom_content_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_content_letter_spacing).'px;';
		}

		$nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_text_icon_to_enqueue);
		$nonprofit_font_family_text_icon_to_enqueue = "";
	//_________________________Icon style ___________________________
		$nonprofit_custom_icon_inline_style ='';
		if($box_icon_color != '') {
			$nonprofit_custom_icon_inline_style .= 'color:'.esc_attr($box_icon_color).';';
		}
		if($nonprofit_icon_font_size != '') {
			$nonprofit_custom_icon_inline_style .= 'font-size:'.esc_attr($nonprofit_icon_font_size).'px;';
		}
		if($box_icon_padding != '') {
			$nonprofit_custom_icon_inline_style .= 'padding:'.esc_attr($box_icon_padding).';';
		}
		if($box_icon_margin != '') {
			$nonprofit_custom_icon_inline_style .= 'margin:'.esc_attr($box_icon_margin).';';
		}
		if($box_icon_background_color != '') {
			$nonprofit_custom_icon_inline_style .= 'background-color:'.esc_attr($box_icon_background_color).';';
		}
		if($box_icon_border_style != '') {
			$nonprofit_custom_icon_inline_style .= 'border-style:'.esc_attr($box_icon_border_style).';';
		}
		if($box_icon_border_color != '') {
			$nonprofit_custom_icon_inline_style .= 'border-color:'.esc_attr($box_icon_border_color).';';
		}
		if($box_icon_border_width != '') {
			$nonprofit_custom_icon_inline_style .= 'border-width:'.esc_attr($box_icon_border_width).'px;';
		}
		if($box_icon_border_radius != '') {
			$nonprofit_custom_icon_inline_style .= 'border-radius:'.esc_attr($box_icon_border_radius).';';
		}
		
		
    $animation_classes =  "";
    $data_animated = "";
	$box_icon_data =$data_hover_effect = '';
	
    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
    }
	if ($box_hover_background_color != '') {
		$box_icon_data = 'box-icon-data';
		$data_hover_effect = "data-box-hover-bg = '$box_hover_background_color' data-box-bg = '$box_background_color'";
	}

    ob_start(); ?>
    
    <div <?php echo $data_hover_effect ?> class="<?php echo esc_attr($animation_classes), $box_icon_data  ?> clearfix <?php echo esc_attr($box_extra_class_name) ?>" style="<?php echo esc_attr($nonprofit_custom_box_inline_style), $nonprofit_custom_box_icon_background_inline_style; ?>"  <?php echo esc_attr($data_animated); ?>>
    	<?php if($box_link_apply == 'all_box') { echo '<a href="'.$box_link.'">'; } ?>
    		
    	<?php //__________Icon / Image_________________-->	?>
    		<div style="<?php echo esc_attr($nonprofit_custom_box_icon_position_inline_style) ?>" >
	    		<?php 
	    		
	    		if($nonprofit_icon_fontawesome !='' and $nonprofit_switch == 'nonprofit_icon') { ?>
	    		<i class="fa <?php echo esc_attr($nonprofit_icon_fontawesome) .' '.  $nonprofit_custom_box_hover ?>" style="<?php  echo esc_attr($nonprofit_custom_icon_inline_style);  ?>" ></i>
	    		<?php }elseif($nonprofit_source_image !='' and $nonprofit_switch == 'nonprofit_image'){
	    			
					$nonprofit_image = wp_get_attachment_image_src( $nonprofit_source_image, '150X150');
					?>
					<img src="<?php echo $nonprofit_image[0] ?>" style="<?php  echo esc_attr($nonprofit_custom_icon_inline_style);  ?>" alt='<?php echo $box_title ?>'>
					<?php
	    		}
	    		?>
			</div>
		<?php //___________Title / Content / Read More_________________ ?>	
			<div style="<?php echo esc_attr($nonprofit_custom_box_icon_position_padding_inline_style) ?>">
			<?php  //-- --------------------Title SubTitle ------------------------->?>
				<?php if($nonprofit_switch_title_subtitle == 'true') { ?>
					<?php //__________Title_________________-->	 ?>
			          <<?php echo $nonprofit_custom_title_balise ?> style="<?php  echo esc_attr($nonprofit_custom_title_inline_style);  ?>">
			          	<?php if($box_link_apply == 'title_box')  {?>
			          	  <a href="<?php echo esc_attr($box_link) ?>"><?php  echo $box_title;  ?></a>
			          	<?php }else{ 
		                echo $box_title;
	                } ?>
			          </<?php echo $nonprofit_custom_title_balise ?>>
			          
			          <?php if($box_title_separator_color !='' and $box_title_separator_height !='' and $box_title_separator_width !='' ){ ?>
			          <div style='display: inline-block;<?php  echo esc_attr($nonprofit_custom_title_separator_inline_style);  ?>'></div>
			          <?php } ?>
			        <?php // _________SubTitle_________________--> ?>
			          <?php if($box_show_subtitle == 'nonprofit_show') { ?>
			          <h5 style="<?php  echo esc_attr($nonprofit_custom_subtitle_inline_style);  ?>">
			          	<?php  echo esc_attr($box_subtitle);  ?>
			          </h5>
			          <?php } ?>
		 <?php //_-------------------- SubTitle Title ------------------------- ?>
		         <?php }else{ ?>
			        <?php //__________SubTitle_________________-- ?>
			          <?php if($box_show_subtitle == 'nonprofit_show') { ?>
			          <h5 style="<?php  echo esc_attr($nonprofit_custom_subtitle_inline_style);  ?>">
			          	<?php  echo esc_attr($box_subtitle);  ?>
			          </h5>
			          <?php } ?>
			        <?php //__________Title_________________-- ?>	
			          <<?php echo $nonprofit_custom_title_balise ?> style="<?php  echo esc_attr($nonprofit_custom_title_inline_style);  ?>">
			          	<?php if($box_link_apply == 'title_box')  {?>
			          	<a href="<?php echo esc_attr($box_link) ?>"><?php  echo $box_title;  ?></a>
			          	<?php }else{ 
			          			echo $box_title;
			          		  } ?>
			          </<?php echo $nonprofit_custom_title_balise ?>>
			          
			          <?php if($box_title_separator_color !='' and $box_title_separator_height !='' and $box_title_separator_width !='' ){ ?>
			          <div style='display: inline-block;<?php  echo esc_attr($nonprofit_custom_title_separator_inline_style);  ?>'></div>
			          <?php } ?>
		        <?php } ?> 
		    <?php //_ -------------------- /SubTitle Tite ------------------------- ?>      
		        <?php //___________Content_________________ ?>
		          <p style="<?php  echo esc_attr($nonprofit_custom_content_inline_style);  ?>">
		          	<?php  echo $box_content;  ?>
		          </p>
		        <?php //___________Read More Button_________________-- ?>
		          <?php
		          if($box_link_apply == 'read_more_btn'){
		          	?>
		          	<a href='<?php echo esc_attr($box_link) ?>' class='<?php echo $box_read_more_class ?>'><?php echo esc_attr($box_read_more); ?></a>
		          	<?php
		          } ?>
	        </div>
      <?php if($box_link_apply == 'all_box') { echo '</a>'; } ?> 
    </div>      
      
    <?php return ob_get_clean();
  }
  add_shortcode( 'nonprofit_text_icon', 'nonprofit_text_icon' );
}  
?>