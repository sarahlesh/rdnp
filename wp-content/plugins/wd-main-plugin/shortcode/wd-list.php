<?php
if(!function_exists('nonprofit_list')){
	function nonprofit_list($atts) {
		global $nonprofit_fonts_to_enqueue_array;
		$custom_list_inline_style = "";
		extract( shortcode_atts( array(
			'values' => '',
			'icon_color' => "#333",
			'text_color' => "#333",
			'nonprofit_font_family' => 'Open Sans',
			'nonprofit_font_size' => '14',
			'nonprofit_icon_size' => '14px',
			'nonprofit_font_weight' => '400',
			'nonprofit_text_transform' => 'none',
			'nonprofit_line_height' => '30',
			'nonprofit_icon_padding' => '10px',
			'nonprofit_icon_margin' => '0px',
			'nonprofit_letter_spacing' => '',
			'nonprofit_font_style' => 'normal',
			'nonprofit_list_style' => "style-1",
			'css_animation' => 'no'
		), $atts ) );

		ob_start(); ?>
		<?php
		$animation_classes =  "";
		$data_animated = "";

		if(($css_animation != 'no')){
			$animation_classes =  " animated ";
			$data_animated = "data-animated=$css_animation";
		}


		$nonprofit_font_family_list_to_enqueue = "";

		if($nonprofit_font_family != '' && $nonprofit_font_family != 'Default') {
      $custom_list_inline_style .= 'font-family:'. esc_attr($nonprofit_font_family).';';
      $nonprofit_font_family_list_to_enqueue .= esc_attr($nonprofit_font_family) . ":";
    }
    if($nonprofit_font_weight != '' && $nonprofit_font_family != '') {
      $custom_list_inline_style .= 'font-weight:'.esc_attr($nonprofit_font_weight).';';
      $nonprofit_font_family_list_to_enqueue .= esc_attr($nonprofit_font_weight) . "%7C";
    }
    if($nonprofit_font_size != '') {
      $custom_list_inline_style .= 'font-size:'.esc_attr($nonprofit_font_size).'px;';
    }
    if($nonprofit_text_transform != '') {
      $custom_list_inline_style .= 'text-transform:'.esc_attr($nonprofit_text_transform).';';
    }
    if($nonprofit_line_height != '') {
      $custom_list_inline_style .= 'line-height:'.esc_attr($nonprofit_line_height).'px;';
    }
    if($nonprofit_letter_spacing != '') {
      $custom_list_inline_style .= 'letter-spacing:'.esc_attr($nonprofit_letter_spacing).'px;';
    }
    if($nonprofit_font_style != '') {
      $custom_list_inline_style .= 'font-style:'.esc_attr($nonprofit_font_style).';';
    }

    $nonprofit_fonts_to_enqueue_array[] = esc_attr($nonprofit_font_family_list_to_enqueue);








		$values = (array) vc_param_group_parse_atts( $values );

		$graph_lines_data = array();
		foreach ( $values as $data ) {
			$new_line = $data;
			$new_line['value'] = isset( $data['value'] ) ? $data['value'] : 0;
			$new_line['label'] = isset( $data['label'] ) ? $data['label'] : '';
			$new_line['icon_color'] = isset( $data['icon_color'] ) ? $data['icon_color'] : '#333';
			$new_line['text_color'] = isset( $data['text_color'] ) ? $data['text_color'] : '#333';
			
			$graph_lines_data[] = $new_line;
		}
?>
	<div class="wd-list-container">
		<ul class="wd-list <?php echo esc_attr($nonprofit_list_style); ?>">
			<?php
			foreach ( $graph_lines_data as $line ) {
				$line_value =  $line['value'];
				$line_label =  $line['label'];
				$icon_color =  $line['icon_color'];
				$text_color =  $line['text_color'];
			?>
			<li style="<?php echo esc_attr($custom_list_inline_style)?>" class="<?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
			<?php 
			switch ($nonprofit_list_style) {
				case 'style-1':
					?>
					<i style="font-size: <?php echo esc_attr($nonprofit_icon_size); ?>;padding: <?php echo esc_attr($nonprofit_icon_padding) ?>;margin: <?php echo esc_attr($nonprofit_icon_margin) ?>;color:<?php echo esc_attr($icon_color) ?>" class="<?php echo esc_attr($line_value); ?>"></i>
					<?php
					break;
				case 'style-2':
					?>
					<i style="font-size: <?php echo esc_attr($nonprofit_icon_size); ?>;padding: <?php echo esc_attr($nonprofit_icon_padding) ?>;margin: <?php echo esc_attr($nonprofit_icon_margin) ?>;background-color:<?php echo esc_attr($icon_color) ?>" class="<?php echo esc_attr($line_value); ?>"></i>
					<?php
					break;
				case 'style-2-2':
					?>
					<i style="font-size: <?php echo esc_attr($nonprofit_icon_size); ?>;padding: <?php echo esc_attr($nonprofit_icon_padding) ?>;margin: <?php echo esc_attr($nonprofit_icon_margin) ?>;border-color:<?php echo esc_attr($icon_color) ?>;color:<?php echo esc_attr($icon_color) ?>" class="<?php echo esc_attr($line_value); ?>"></i>
					<?php
					break;
					case 'style-3':
					?>
					<i style="font-size: <?php echo esc_attr($nonprofit_icon_size); ?>;padding: <?php echo esc_attr($nonprofit_icon_padding) ?>;margin: <?php echo esc_attr($nonprofit_icon_margin) ?>;background-color:<?php echo esc_attr($icon_color) ?>" class="<?php echo esc_attr($line_value); ?>"></i>
					<?php
					break;
					case 'style-3-3':
					?>
					<i style="font-size: <?php echo esc_attr($nonprofit_icon_size); ?>;padding: <?php echo esc_attr($nonprofit_icon_padding) ?>;margin: <?php echo esc_attr($nonprofit_icon_margin) ?>;border-color:<?php echo esc_attr($icon_color) ?>;color:<?php echo esc_attr($icon_color) ?>" class="<?php echo esc_attr($line_value); ?>"></i>
					<?php
					break;
					case 'style-4':
					?>
					<i data-hover="<?php echo esc_attr($icon_color) ?>" class="<?php echo esc_attr($line_value); ?>"></i>
					<?php
					break;
					case 'style-4-4':
					?>
					<i style="color:<?php echo esc_attr($icon_color) ?>" data-border="<?php echo esc_attr($icon_color) ?>" class="<?php echo esc_attr($line_value); ?>"></i>
					<?php
					break;
				
				default:
					?>
					<i style="font-size: <?php echo esc_attr($nonprofit_icon_size); ?>;padding: <?php echo esc_attr($nonprofit_icon_padding) ?>;margin: <?php echo esc_attr($nonprofit_icon_margin) ?>;color:<?php echo esc_attr($icon_color) ?>" class="<?php echo esc_attr($line_value); ?>"></i>
					<?php
					break;
			}
			 ?>
			<span style="color:<?php echo esc_attr($text_color) ?>"><?php echo esc_attr($line_label); ?></span>
			</li>
			<?php
			} ?>
		</ul>
	</div>


		<?php return ob_get_clean();
	}
	add_shortcode( 'nonprofit_list', 'nonprofit_list' );
}
?>