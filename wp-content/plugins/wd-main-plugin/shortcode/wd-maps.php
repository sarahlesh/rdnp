<?php
if(!function_exists('nonprofit_maps')){
  function nonprofit_maps($atts) {
              
    extract( shortcode_atts( array(
      'nonprofit_map_latitude'  => '-37.817612',
      'nonprofit_map_longitude'  => '144.959399',
      'nonprofit_map_height' => '500',
      'nonprofit_map_zoom' => '14',
      'nonprofit_map_style' => 'wa_map_style1',
      'nonprofit_map_company_name' => 'Envato',
      'nonprofit_map_company_description' => '2 Elizabeth St, Melbourne Victoria 3000 Australia',
      'nonprofit_map_source_image' => '',
      'nonprofit_map_extra_class_name' => '',
      'css_animation' => 'no'
    ), $atts ) );

    ob_start();
   
		$nonprofit_image = wp_get_attachment_image_src( $nonprofit_map_source_image, '50X50');
		$data_animated = '';
    $animation_classes =  "";
	  if(($css_animation != 'no')){
		  $animation_classes =  " animated ";
		  $data_animated = "data-animated=$css_animation";
	  }

    ?>
   

    <div class="map <?php echo esc_attr($animation_classes)  ?>" <?php echo esc_attr($data_animated); ?>>
      <div class="map-canvas" data-id="map-canvas" style="height: <?php echo $nonprofit_map_height ?>px;" data-latitude="<?php echo $nonprofit_map_latitude ?>"
        data-longitude="<?php echo $nonprofit_map_longitude ?>" data-zoom="<?php echo $nonprofit_map_zoom ?>" data-companyname="<?php echo $nonprofit_map_company_name ?>"
        data-decription="<?php echo $nonprofit_map_company_description ?>" data-imagepath="<?php echo $nonprofit_image[0] ?>" data-wdmapstyle="<?php echo $nonprofit_map_style ?>">
      </div>
    </div>
    

    <?php return ob_get_clean();
  }
  add_shortcode( 'nonprofit_maps', 'nonprofit_maps' );
}  
?>