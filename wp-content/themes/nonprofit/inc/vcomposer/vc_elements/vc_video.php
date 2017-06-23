<?php 

/*============================= Video =====================================*/
if(function_exists('vc_remove_param')) {
	vc_remove_param('vc_video','title');
	vc_remove_param('vc_video','link');
	vc_remove_param('vc_tour','title');
	vc_remove_param('vc_single_image','onclick');
}

vc_add_param('vc_video',array(
		'type' => 'dropdown',
		'class' => '',
		'heading' => esc_html__('Video mode...', 'nonprofit'),
		'param_name' => 'video_module_mode',
		'value' => array(
			esc_html__('Simple video', 'nonprofit') => 'simple',
			esc_html__('Full screen video', 'nonprofit') => 'full_screen'
		),
	)
);
vc_add_param('vc_video',array(
		'type' => 'textfield',
		'heading' => esc_html__( 'Video link', 'nonprofit' ),
		'param_name' => 'link',
		'admin_label' => true,
		'description' => sprintf( esc_html__( 'Link to the video. More about supported formats at %s.', 'nonprofit' ), '<a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">WordPress codex page</a>' ),
		'dependency' => array('element' => 'video_module_mode','value' => array('simple')),
	)
);
vc_add_param('vc_video',array(
		'type' => 'attach_image',
		'class' => '',
		'heading' => esc_html__('Thumbnail Image', 'nonprofit'),
		'param_name' => 'video_thumb_image',
		'value' => '',
		'description' => esc_html__('Upload or select video thumbnail image from media gallery.', 'nonprofit'),
		'dependency' => array('element' => 'video_module_mode','value' => array('simple')),
	)
);
vc_add_param('vc_video',array(
		'type' => 'dropdown',
		'class' => '',
		'heading' => esc_html__('Video source', 'nonprofit'),
		'param_name' => 'video_source',
		'value' => array(
			esc_html__('Youtube', 'nonprofit') => 'youtube',
			esc_html__('Vimeo', 'nonprofit') => 'vimeo'
		),
		//'description' => esc_html__('Upload or select video thumbnail image from media gallery.', 'nonprofit'),
		'dependency' => array('element' => 'video_module_mode','value' => array('full_screen')),
	)
);
vc_add_param('vc_video',array(
		'type' => 'textfield',
		'heading' => esc_html__( 'Video ID', 'nonprofit' ),
		'param_name' => 'video_id',
		'admin_label' => true,
		//'description' => esc_html__( '', 'nonprofit' ),
		'dependency' => array('element' => 'video_module_mode','value' => array('full_screen')),
	)
);
vc_add_param('vc_video',array(
		'type' => 'dropdown',
		'class' => '',
		'heading' => esc_html__('Label Alignment','nonprofit'),
		'param_name' => 'module_alignment',
		"value" => array(
			esc_html__('Left','nonprofit') => "text-left",
			esc_html__('Center','nonprofit') => "text-center",
			esc_html__('Right','nonprofit') => "text-right"
		),
		'dependency' => array('element' => 'video_module_mode','value' => array('full_screen')),
	)
);
vc_add_param('vc_video',array(
		'type' => 'dropdown',
		'class' => '',
		'heading' => esc_html__('Modal Size (width)','nonprofit'),
		'param_name' => 'modal_size',
		"value" => array(
			esc_html__('Medium (60%)','nonprofit') => "medium",
			esc_html__('Small (40%)','nonprofit') => "small",
			esc_html__('Tiny (30%)','nonprofit') => "tiny",
			esc_html__('Large (70%)','nonprofit') => "large",
			esc_html__('XLarge (95%)','nonprofit') => "xlarge",
			esc_html__('Full (100%)','nonprofit') => "full"
		),
		'dependency' => array('element' => 'video_module_mode','value' => array('full_screen')),
	)
);
vc_add_param('vc_video',array(
		'type' => 'colorpicker',
		'class' => '',
		'heading' => esc_html__('Icon color', 'nonprofit'),
		'param_name' => 'icon_color',
		'value' => '#ffffff',
		'dependency' => array('element' => 'video_module_mode','value' => array('full_screen')),
	)
);
vc_add_param('vc_video',array(
		'type' => 'colorpicker',
		'class' => '',
		'heading' => esc_html__('Label background', 'nonprofit'),
		'param_name' => 'label_background',
		'value' => 'rgba(0,0,0,0.0)',
		'dependency' => array('element' => 'video_module_mode','value' => array('full_screen')),
	)
);