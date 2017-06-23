<?php



	function nonprofit_button($atts) {

		extract( shortcode_atts( array(
			'nonprofit_button_text' => '',
			'nonprofit_button_text_color' => '',
			'nonprofit_button_link' => '',
			'nonprofit_button_size' => '',
			'nonprofit_button_radius' => '',
			'nonprofit_button_background_color' => '',
			
			'nonprofit_button_custom_bg_color' => '',
			'nonprofit_button_icon_position' => '',
			'nonprofit_button_icon' => '',
			'nonprofit_button_border' => 'no-border',
			
			'nonprofit_button_border_size' => '',
			'nonprofit_button_border_color' => '',
			
			'css_animation' => 'no'
		), $atts ) );

		ob_start();

		$nonprofit_button_class = $nonprofit_btn_bg_color_inline_style = '';
		$nonprofit_button_class = $nonprofit_button_size;
		$nonprofit_button_class .= " ".$nonprofit_button_border;
		$nonprofit_button_class .= " ".$nonprofit_button_radius;
		if($nonprofit_button_background_color == 'custom') {
			$nonprofit_btn_bg_color_inline_style = 'background :'.$nonprofit_button_custom_bg_color.';';
		}else{
			$nonprofit_button_class .= " ".$nonprofit_button_background_color;
		}
		
		if($nonprofit_button_border == 'border'){
			$nonprofit_btn_bg_color_inline_style .= 'border-width :'.$nonprofit_button_border_size.'px;';
			$nonprofit_btn_bg_color_inline_style .= 'border-color :'.$nonprofit_button_border_color.';';
		}
		$nonprofit_btn_text_color_inline_style = ' color : '.$nonprofit_button_text_color;
			
			

		 if($nonprofit_button_icon_position == 'right') {
			?>
			<a href="<?php echo esc_url($nonprofit_button_link) ?>" style="<?php echo esc_attr($nonprofit_btn_bg_color_inline_style); echo esc_attr($nonprofit_btn_text_color_inline_style) ?>" class="button btn-icon-right <?php echo esc_attr($nonprofit_button_class) ?>"><?php echo esc_attr($nonprofit_button_text) ?>
				<i class="<?php echo esc_attr($nonprofit_button_icon) ?>" style="<?php echo esc_attr($nonprofit_btn_text_color_inline_style) ?>"></i></a>

			<?php
		}elseif($nonprofit_button_icon_position == 'left'){
			?>
			<a href="<?php echo esc_url($nonprofit_button_link) ?>" style="<?php echo esc_attr($nonprofit_btn_bg_color_inline_style); echo esc_attr($nonprofit_btn_text_color_inline_style) ?>" class="button btn-icon-left <?php echo esc_attr($nonprofit_button_class) ?>"><i class="<?php echo esc_attr($nonprofit_button_icon) ?>" style="<?php echo esc_attr($nonprofit_btn_text_color_inline_style) ?>"></i><?php echo esc_attr($nonprofit_button_text) ?></a>

			<?php
		}else{
			?>
			<a href="<?php echo esc_attr($nonprofit_button_link) ?>" style="<?php echo esc_attr($nonprofit_btn_bg_color_inline_style); echo esc_attr($nonprofit_btn_text_color_inline_style) ?>" class="button <?php echo esc_attr($nonprofit_button_class) ?>"><?php echo esc_attr($nonprofit_button_text) ?></a>

			<?php
		}
		return ob_get_clean();
	}
add_shortcode( 'nonprofit_button', 'nonprofit_button' ); ?>
