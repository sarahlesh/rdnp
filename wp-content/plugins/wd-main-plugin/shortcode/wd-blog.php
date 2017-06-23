<?php 
if(!function_exists('nonprofit_blog')){
function nonprofit_blog($atts) {
  global $nonprofit_fonts_to_enqueue_array;
  extract( shortcode_atts( array(
    $nonprofit_custom_blog_title_inline_style = $nonprofit_custom_blog_text_inline_style = $nonprofit_custom_blog_author_inline_style = $nonprofit_custom_blog_tags_date_inline_style = "",
  	
    'nonprofit_blog_type' => 'nonprofit_multi_post',
    'nonprofit_blog_affichage_one_post' => 'nonprofit_blog_latest_post',
    'nonprofit_blog_post_list' => '',
    "nonprofit_blog_image_size" => '290x190',
    'nonprofit_blog_display_filter' => 'nonprofit_blog_show_filter',
    'nonprofit_blog_category' => '',
    
    'nonprofit_blog_item_perpage' => '',
    'nonprofit_blog_columns' => '1',
    'nonprofit_blog_style' => 'nonprofit_grid_blog',
    'nonprofit_blog_affichage_type' => 'nonprofit_blog_image_left',
    'nonprofit_blog_display_content' => 'yes',

    'nonprofit_blog_title_tag' => 'h2',
    'nonprofit_blog_title_font_family' => 'Josefin Sans',
    'nonprofit_blog_title_font_size' => '18',
    'nonprofit_blog_title_color' => '#000',
    'nonprofit_blog_title_font_weight' => '700',
    'nonprofit_blog_title_text_transform' => 'uppercase',
    'nonprofit_blog_title_line_height' => '',
    'nonprofit_blog_title_letter_spacing' => '0.45',
    'nonprofit_blog_title_font_style' => 'normal',


    'nonprofit_blog_text_font_family' => 'Open Sans',
    'nonprofit_blog_text_font_size' => '14',
    'nonprofit_blog_text_color' => '#666666',
    'nonprofit_blog_text_font_weight' => '400',
    'nonprofit_blog_text_text_transform' => 'none',
    'nonprofit_blog_text_line_height' => '28',
    'nonprofit_blog_text_letter_spacing' => '0.33',
    'nonprofit_blog_text_font_style' => 'normal',


    'nonprofit_blog_author_font_family' => 'Josefin Sans',
    'nonprofit_blog_author_font_size' => '12',
    'nonprofit_blog_author_color' => '#000',
    'nonprofit_blog_author_font_weight' => '700',
    'nonprofit_blog_author_text_transform' => 'uppercase',
    'nonprofit_blog_author_line_height' => '10',
    'nonprofit_blog_author_letter_spacing' => '0.3',
    'nonprofit_blog_author_font_style' => 'normal',


    'nonprofit_blog_tags_date_font_family' => 'Josefin Sans',
    'nonprofit_blog_tags_date_font_size' => '12',
    'nonprofit_blog_tags_date_color' => '#999999',
    'nonprofit_blog_tags_date_font_weight' => '700',
    'nonprofit_blog_tags_date_text_transform' => 'uppercase',
    'nonprofit_blog_tags_date_line_height' => '',
    'nonprofit_blog_tags_date_letter_spacing' => '0.3',
    'nonprofit_blog_tags_date_font_style' => 'normal',

    'css_animation' => 'no'
  ), $atts ) );



  $nonprofit_font_family_blog_to_enqueue = "";

    if($nonprofit_blog_title_font_family != '' && $nonprofit_blog_title_font_family != 'Default') {
      $nonprofit_custom_blog_title_inline_style .= 'font-family:'.esc_attr($nonprofit_blog_title_font_family).';';
      $nonprofit_font_family_blog_to_enqueue .= esc_attr($nonprofit_blog_title_font_family) . ":";
    }
    if($nonprofit_blog_title_font_weight != '' && $nonprofit_blog_title_font_family != '') {
      $nonprofit_custom_blog_title_inline_style .= 'font-weight:'.esc_attr($nonprofit_blog_title_font_weight).';';
      $nonprofit_font_family_blog_to_enqueue .= esc_attr($nonprofit_blog_title_font_weight) . "%7C";
    }
    if($nonprofit_blog_title_font_size != '') {
      $nonprofit_custom_blog_title_inline_style .= 'font-size:'.esc_attr($nonprofit_blog_title_font_size).'px;';
    }
    if($nonprofit_blog_title_color != '') {
      $nonprofit_custom_blog_title_inline_style .= 'color:'.esc_attr($nonprofit_blog_title_color).';';
    }
    if($nonprofit_blog_title_text_transform != '') {
      $nonprofit_custom_blog_title_inline_style .= 'text-transform:'.esc_attr($nonprofit_blog_title_text_transform).';';
    }
    if($nonprofit_blog_title_line_height != '') {
      $nonprofit_custom_blog_title_inline_style .= 'line-height:'.esc_attr($nonprofit_blog_title_line_height).'px;';
    }
    if($nonprofit_blog_title_letter_spacing != '') {
      $nonprofit_custom_blog_title_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_blog_title_letter_spacing).'px;';
    }
    if($nonprofit_blog_title_font_style != '') {
      $nonprofit_custom_blog_title_inline_style .= 'font-style:'.esc_attr($nonprofit_blog_title_font_style).';';
    }

    $nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_blog_to_enqueue);





    $nonprofit_font_family_blog_to_enqueue = "";

    if($nonprofit_blog_text_font_family != '' && $nonprofit_blog_text_font_family != 'Default') {
      $nonprofit_custom_blog_text_inline_style .= 'font-family:'.esc_attr($nonprofit_blog_text_font_family).';';
      $nonprofit_font_family_blog_to_enqueue .= esc_attr($nonprofit_blog_text_font_family) . ":";
    }
    if($nonprofit_blog_text_font_weight != '' && $nonprofit_blog_text_font_family != '') {
      $nonprofit_custom_blog_text_inline_style .= 'font-weight:'.esc_attr($nonprofit_blog_text_font_weight).';';
      $nonprofit_font_family_blog_to_enqueue .= esc_attr($nonprofit_blog_text_font_weight) . "%7C";
    }
    if($nonprofit_blog_text_font_size != '') {
      $nonprofit_custom_blog_text_inline_style .= 'font-size:'.esc_attr($nonprofit_blog_text_font_size).'px;';
    }
    if($nonprofit_blog_text_color != '') {
      $nonprofit_custom_blog_text_inline_style .= 'color:'.esc_attr($nonprofit_blog_text_color).';';
    }
    if($nonprofit_blog_text_text_transform != '') {
      $nonprofit_custom_blog_text_inline_style .= 'text-transform:'.esc_attr($nonprofit_blog_text_text_transform).';';
    }
    if($nonprofit_blog_text_line_height != '') {
      $nonprofit_custom_blog_text_inline_style .= 'line-height:'.esc_attr($nonprofit_blog_text_line_height).'px;';
    }
    if($nonprofit_blog_text_letter_spacing != '') {
      $nonprofit_custom_blog_text_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_blog_text_letter_spacing).'px;';
    }
    if($nonprofit_blog_text_font_style != '') {
      $nonprofit_custom_blog_text_inline_style .= 'font-style:'.esc_attr($nonprofit_blog_text_font_style).';';
    }

    $nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_blog_to_enqueue);



    $nonprofit_font_family_blog_to_enqueue = "";

    if($nonprofit_blog_author_font_family != '' && $nonprofit_blog_author_font_family != 'Default') {
      $nonprofit_custom_blog_author_inline_style .= 'font-family:'.esc_attr($nonprofit_blog_author_font_family).';';
      $nonprofit_font_family_blog_to_enqueue .= esc_attr($nonprofit_blog_author_font_family) . ":";
    }
    if($nonprofit_blog_author_font_weight != '' && $nonprofit_blog_author_font_family != '') {
      $nonprofit_custom_blog_author_inline_style .= 'font-weight:'.esc_attr($nonprofit_blog_author_font_weight).';';
      $nonprofit_font_family_blog_to_enqueue .= esc_attr($nonprofit_blog_author_font_weight) . "%7C";
    }
    if($nonprofit_blog_author_font_size != '') {
      $nonprofit_custom_blog_author_inline_style .= 'font-size:'.esc_attr($nonprofit_blog_author_font_size).'px;';
    }
    if($nonprofit_blog_author_color != '') {
      $nonprofit_custom_blog_author_inline_style .= 'color:'.esc_attr($nonprofit_blog_author_color).';';
    }
    if($nonprofit_blog_author_text_transform != '') {
      $nonprofit_custom_blog_author_inline_style .= 'text-transform:'.esc_attr($nonprofit_blog_author_text_transform).';';
    }
    if($nonprofit_blog_author_line_height != '') {
      $nonprofit_custom_blog_author_inline_style .= 'line-height:'.esc_attr($nonprofit_blog_author_line_height).'px;';
    }
    if($nonprofit_blog_author_letter_spacing != '') {
      $nonprofit_custom_blog_author_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_blog_author_letter_spacing).'px;';
    }
    if($nonprofit_blog_author_font_style != '') {
      $nonprofit_custom_blog_author_inline_style .= 'font-style:'.esc_attr($nonprofit_blog_author_font_style).';';
    }

    $nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_blog_to_enqueue);




	$nonprofit_custom_blog_name_inline_style = '';
    $nonprofit_font_family_blog_to_enqueue = "";
    
    if($nonprofit_blog_tags_date_font_family != '' && $nonprofit_blog_tags_date_font_family != 'Default') {
      $nonprofit_custom_blog_tags_date_inline_style .= 'font-family:'.esc_attr($nonprofit_blog_tags_date_font_family).';';
      $nonprofit_font_family_blog_to_enqueue .= esc_attr($nonprofit_blog_tags_date_font_family) . ":";
    }
    if($nonprofit_blog_tags_date_font_weight != '' && $nonprofit_blog_tags_date_font_family != '') {
      $nonprofit_custom_blog_tags_date_inline_style .= 'font-weight:'.esc_attr($nonprofit_blog_tags_date_font_weight).';';
      $nonprofit_font_family_blog_to_enqueue .= esc_attr($nonprofit_blog_tags_date_font_weight) . "%7C";
    }
    if($nonprofit_blog_tags_date_font_size != '') {
      $nonprofit_custom_blog_tags_date_inline_style .= 'font-size:'.esc_attr($nonprofit_blog_tags_date_font_size).'px;';
    }
    if($nonprofit_blog_tags_date_color != '') {
      $nonprofit_custom_blog_tags_date_inline_style .= 'color:'.esc_attr($nonprofit_blog_tags_date_color).';';
    }
    if($nonprofit_blog_tags_date_text_transform != '') {
      $nonprofit_custom_blog_tags_date_inline_style .= 'text-transform:'.esc_attr($nonprofit_blog_tags_date_text_transform).';';
    }
    if($nonprofit_blog_tags_date_line_height != '') {
      $nonprofit_custom_blog_tags_date_inline_style .= 'line-height:'.esc_attr($nonprofit_blog_tags_date_line_height).'px;';
    }
    if($nonprofit_blog_tags_date_letter_spacing != '') {
      $nonprofit_custom_blog_tags_date_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_blog_tags_date_letter_spacing).'px;';
    }
    if($nonprofit_blog_tags_date_font_style != '') {
      $nonprofit_custom_blog_tags_date_inline_style .= 'font-style:'.esc_attr($nonprofit_blog_tags_date_font_style).';';
    }

    $nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_blog_to_enqueue);


    
  ob_start();
  $animation_classes =  "";
      $data_animated = "";
  if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}
  $sap = str_replace(array('X','x'),'X',$nonprofit_blog_image_size);
  $nonprofit_image_size_ = explode( 'X', $sap) ;
  if(isset($nonprofit_image_size_[0])){
  	$nonprofit_image_size_w = $nonprofit_image_size_[0];
  }
  if(isset($nonprofit_image_size_[1])){
  	$nonprofit_image_size_h = $nonprofit_image_size_[1];
  }else{
  	$nonprofit_image_size_h = '';
  }
  

?>
<div class="blog-container">
  <?php 
  if($nonprofit_blog_type  == 'nonprofit_one_post')  {
    include( plugin_dir_path( __FILE__ ).'blog/one-post.php' )?>
  <?php }elseif($nonprofit_blog_type  == 'nonprofit_free_style') {
    include( plugin_dir_path( __FILE__ ).'blog/freestyle.php' );
  }else{      
     include( plugin_dir_path( __FILE__ ). 'blog/multi-post.php' );
    ?>
  <?php } ?>
</div>
	


  <?php return ob_get_clean();
  }
add_shortcode( 'nonprofit_blog', 'nonprofit_blog' ); }  ?>