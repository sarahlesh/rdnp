<?php 
function nonprofit_separator_title($atts) {
           
  extract( shortcode_atts( array(
  
    'nonprofit_title' => 'this is a title',
    'nonprofit_subtitle'=>'this is a subtitle',
    'nonprofit_separator_style' => 'wd-title-section_c',
    'css_animation' => 'no'
    
  ), $atts ) );

  $animation_classes =  "";
    $data_animated = "";
  if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}

  ob_start(); ?>


<div class="<?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
  <div class="large-12 columns <?php echo esc_attr($animation_classes) . ' ' . esc_attr($nonprofit_separator_style) ; ?>" <?php echo esc_attr($data_animated); ?>>
  <?php if ($nonprofit_title != "") { ?>
    <h2><?php echo $nonprofit_title ?></h2>
  <?php } ?>
  <?php if ($nonprofit_title != "") { ?>
    <h5><?php echo $nonprofit_subtitle ?></h5>
  <?php } ?>
  
  </div>
</div>

  
<?php return ob_get_clean();
}
add_shortcode( 'nonprofit_separator_title', 'nonprofit_separator_title' );