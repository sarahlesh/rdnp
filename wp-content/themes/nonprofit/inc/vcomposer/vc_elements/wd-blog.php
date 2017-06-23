<?php
global $vc_add_css_animation;
global $nonprofit_fonts_array;
$nonprofit_posts = get_posts(array('post_type' => 'post','posts_per_page'   => '99999',));
$nonprofit_posts_array = array();
foreach ( $nonprofit_posts as $key => $post ) {
	$nonprofit_posts_array[$post->post_title] = $post->ID;
}
$nonprofit_terms = get_terms( array('category'), array('hide_empty' => FALSE) );
$nonprofit_cat_array = array('all');
foreach ($nonprofit_terms as $key => $term) {
	$nonprofit_cat_array[]=$term->name;
}

vc_map( array(
	"name" => esc_html__("Recent From Blog", 'nonprofit'),
	"base" => "nonprofit_blog",
	"icon" => get_template_directory_uri()."/images/icon/meknes.png",
	"content_element" => true,
	"is_container" => FALSE,
	"params" => array(
	
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Blog type", 'nonprofit'),
			"param_name" => "nonprofit_blog_type",
			"value" => array(
					'Latest Posts'=>'nonprofit_multi_post',
					'One Post'=>'nonprofit_one_post',
					'Free Style'=>'nonprofit_free_style'
					
					),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Image Size", 'nonprofit'),
			"param_name" => "nonprofit_blog_image_size",
			"value" => '',
			"description" =>'Enter image size  Alternatively enter size in pixels (Example: 200x100 (Width x Height) or 200 (Width)).'
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Chose One Post", 'nonprofit'),
			"param_name" => "nonprofit_blog_affichage_one_post",
			"value" => array(
					'Show Latest Post'=>'nonprofit_blog_latest_post',
					'chose frome List'=>'nonprofit_blog_Post_from_list'
					),
					"dependency" => Array("element" => "nonprofit_blog_type", "value" => array('nonprofit_one_post')),
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Blog Post List", 'nonprofit'),
			"param_name" => "nonprofit_blog_post_list",
			"value" => $nonprofit_posts_array,
			"dependency" => Array("element" => "nonprofit_blog_type", "value" => array('nonprofit_one_post')),
			"dependency" => Array("element" => "nonprofit_blog_affichage_one_post", "value" => array('nonprofit_blog_Post_from_list')),
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show / Hide Filter Categories", 'nonprofit'),
			"param_name" => "nonprofit_blog_display_filter",
			"std" => "yes",
			'value' => array( 
					'Show Filter'=>'nonprofit_blog_show_filter',
					'Hide Filter'=>'nonprofit_blog_hide_filter' ),
			"dependency" => Array("element" => "nonprofit_blog_type", "value" => array('nonprofit_multi_post')),
			
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Blog Category", 'nonprofit'),
			"param_name" => "nonprofit_blog_category",
			"value" => $nonprofit_cat_array,
			"dependency" => Array("element" => "nonprofit_blog_type", "value" => array('nonprofit_multi_post')),
			"dependency" => Array("element" => "nonprofit_blog_display_filter", "value" => array('nonprofit_blog_hide_filter')),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Item perpage", 'nonprofit'),
			"param_name" => "nonprofit_blog_item_perpage",
			"value" => '',
			"dependency" => Array("element" => "nonprofit_blog_type", "value" => array('nonprofit_multi_post')),
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Columns", 'nonprofit'),
			"param_name" => "nonprofit_blog_columns",
			"value" => array('1','2','3','4','5','6','7'),
			"dependency" => Array("element" => "nonprofit_blog_type", "value" => array('nonprofit_multi_post')),
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Blog Style", 'nonprofit'),
			"param_name" => "nonprofit_blog_style",
			"value" => array(
					'Grid'=>'nonprofit_grid_blog',
					'Massonry'=>'nonprofit_masonry_blog'
					
					),
					"dependency" => Array("element" => "nonprofit_blog_type", "value" => array('nonprofit_multi_post')),
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display Style", 'nonprofit'),
			"param_name" => "nonprofit_blog_affichage_type",
			"value" => array(
					'Image Post in Left'=>'nonprofit_blog_image_left',
					'Image Post in Top'=>'nonprofit_blog_image_top'
					
					),
					"dependency" => Array("element" => "nonprofit_blog_type", "value" => array('nonprofit_multi_post')),
					"dependency" => Array("element" => "nonprofit_blog_style", "value" => array('nonprofit_grid_blog')),
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Display Content", 'nonprofit'),
			"param_name" => "nonprofit_blog_display_content",
			"std" => "yes",
			'value' => array( esc_html__( 'Yes, Please', 'nonprofit' ) => 'yes' ),
			"dependency" => Array("element" => "nonprofit_blog_affichage_type", "value" => array('nonprofit_blog_image_left','nonprofit_multi_post')),
		),


		// ________Blog Title Typo
        array(
             "heading" => esc_html__("Blog Title Tag", 'nonprofit'),
             "type" => "dropdown",
             "param_name" => "nonprofit_blog_title_tag",
             "value" => array('H6 (Default)' => 'h6',
                                                'H1' => 'h1',
                                                'H2' => 'h2',
                                                'H3' => 'h3',
                                                'H4' => 'h4',
                                                'H5' => 'h5',
                                                'P' => 'p',
                                                'Span' => 'span',
                                                ),
             "group" => "Title Style",
          ),
        array(
             "type" => "dropdown",
             'value' => $nonprofit_fonts_array,
             "heading" => esc_html__("Font Family", 'nonprofit'),
             "param_name" => "nonprofit_blog_title_font_family",
             "group" => "Title Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Font Size", 'nonprofit'),
             "param_name" => "nonprofit_blog_title_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Title Style",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Font Color", 'nonprofit'),
             "param_name" => "nonprofit_blog_title_color",
             "value" => "",
             "group" => "Title Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Font Weight", 'nonprofit'),
             "param_name"   =>   "nonprofit_blog_title_font_weight",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   '900',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '400',
             ),
             "group" => "Title Style",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Text Transform", 'nonprofit'),
             "param_name" => "nonprofit_blog_title_text_transform",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Title Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Line Height", 'nonprofit'),
             "param_name" => "nonprofit_blog_title_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Title Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Letter spacing", 'nonprofit'),
             "param_name" => "nonprofit_blog_title_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Title Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Font Style", 'nonprofit'),
             "param_name"   =>   "nonprofit_blog_title_font_style",
             'value' => array(
                  esc_html__('Normal', 'nonprofit')  =>   'normal',
                  esc_html__('Italic','nonprofit')        =>   'italic',
                  esc_html__('Inherit','nonprofit')       =>   'inherit',
                  esc_html__('Initial','nonprofit')       =>   'initial',
             ),
             "group" => "Title Style",
        ),

        // ________Blog Text Typo
        array(
             "type" => "dropdown",
             'value' => $nonprofit_fonts_array,
             "heading" => esc_html__("Font Family", 'nonprofit'),
             "param_name" => "nonprofit_blog_text_font_family",
             "group" => "Text Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Font Size", 'nonprofit'),
             "param_name" => "nonprofit_blog_text_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Text Style",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Font Color", 'nonprofit'),
             "param_name" => "nonprofit_blog_text_color",
             "value" => "",
             "group" => "Text Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Font Weight", 'nonprofit'),
             "param_name"   =>   "nonprofit_blog_text_font_weight",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   '400',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '900'     =>   '900',
             ),
             "group" => "Text Style",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Text Transform", 'nonprofit'),
             "param_name" => "nonprofit_blog_text_text_transform",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Text Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Line Height", 'nonprofit'),
             "param_name" => "nonprofit_blog_text_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Text Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Letter spacing", 'nonprofit'),
             "param_name" => "nonprofit_blog_text_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Text Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Font Style", 'nonprofit'),
             "param_name"   =>   "nonprofit_blog_text_font_style",
             'value' => array(
                  esc_html__('Normal', 'nonprofit')  =>   'normal',
                  esc_html__('Italic','nonprofit')        =>   'italic',
                  esc_html__('Inherit','nonprofit')       =>   'inherit',
                  esc_html__('Initial','nonprofit')       =>   'initial',
             ),
             "group" => "Text Style",
        ),


        // ________Blog Author Typo
        array(
             "type" => "dropdown",
             'value' => $nonprofit_fonts_array,
             "heading" => esc_html__("Font Family", 'nonprofit'),
             "param_name" => "nonprofit_blog_author_font_family",
             "group" => "Text Author",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Font Size", 'nonprofit'),
             "param_name" => "nonprofit_blog_author_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Text Author",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Font Color", 'nonprofit'),
             "param_name" => "nonprofit_blog_author_color",
             "value" => "",
             "group" => "Text Author",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Font Weight", 'nonprofit'),
             "param_name"   =>   "nonprofit_blog_author_font_weight",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   '900',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '400',
             ),
             "group" => "Text Author",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Text Transform", 'nonprofit'),
             "param_name" => "nonprofit_blog_author_text_transform",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Text Author",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Line Height", 'nonprofit'),
             "param_name" => "nonprofit_blog_author_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Text Author",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Letter spacing", 'nonprofit'),
             "param_name" => "nonprofit_blog_author_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Text Author",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Font Style", 'nonprofit'),
             "param_name"   =>   "nonprofit_blog_author_font_style",
             'value' => array(
                  esc_html__('Normal', 'nonprofit')  =>   'normal',
                  esc_html__('Italic','nonprofit')        =>   'italic',
                  esc_html__('Inherit','nonprofit')       =>   'inherit',
                  esc_html__('Initial','nonprofit')       =>   'initial',
             ),
             "group" => "Text Author",
        ),

        // ________Blog Author Typo
        array(
             "type" => "dropdown",
             'value' => $nonprofit_fonts_array,
             "heading" => esc_html__("Blog Tags And Post Date Font Family", 'nonprofit'),
             "param_name" => "nonprofit_blog_tags_date_font_family",
             "group" => "Text Author",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Blog Tags And Post Date Font Size", 'nonprofit'),
             "param_name" => "nonprofit_blog_tags_date_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Text Author",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Blog Tags And Post Date Font Color", 'nonprofit'),
             "param_name" => "nonprofit_blog_tags_date_color",
             "value" => "",
             "group" => "Text Author",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Blog Tags And Post Date Font Weight", 'nonprofit'),
             "param_name"   =>   "nonprofit_blog_tags_date_font_weight",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   '900',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '400',
             ),
             "group" => "Text Author",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Blog Tags And Post Date Text Transform", 'nonprofit'),
             "param_name" => "nonprofit_blog_tags_date_text_transform",
             'value' => array(
                  esc_html__('Default', 'nonprofit') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Text Author",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Blog Tags And Post Date Line Height", 'nonprofit'),
             "param_name" => "nonprofit_blog_tags_date_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Text Author",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Blog Tags And Post Date Letter spacing", 'nonprofit'),
             "param_name" => "nonprofit_blog_tags_date_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Text Author",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Blog Tags And Post Date Font Style", 'nonprofit'),
             "param_name"   =>   "nonprofit_blog_tags_date_font_style",
             'value' => array(
                  esc_html__('Normal', 'nonprofit')  =>   'normal',
                  esc_html__('Italic','nonprofit')        =>   'italic',
                  esc_html__('Inherit','nonprofit')       =>   'inherit',
                  esc_html__('Initial','nonprofit')       =>   'initial',
             ),
             "group" => "Text Author",
        ),
		
		
		$vc_add_css_animation


	)
) );