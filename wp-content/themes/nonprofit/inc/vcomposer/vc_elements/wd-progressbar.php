<?php
global $vc_add_css_animation;

vc_map( array(
  'name' => esc_html__( 'Wd Progress Bar', 'nonprofit' ),
  'base' => 'nonprofit_progressbar',
  "icon" => get_template_directory_uri()."/images/icon/meknes.png",
  "content_element" => true,
  "is_container"    => false,
  'params' => array(
    array(
      "heading" => esc_html__("Style", 'nonprofit'),
      "type" => "dropdown",
      "param_name" => "nonprofit_progress_style",
      'value' => array('Progress bar' => 'progress_bar',
               'Pie chart' => 'pie_chart',
              ),
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Widget title', 'nonprofit' ),
      'param_name' => 'title',
      'description' => esc_html__( 'Enter text used as widget title (Note: located above content element).', 'nonprofit' ),
    ),
    array(
      'type' => 'param_group',
      'heading' => esc_html__( 'Values', 'nonprofit' ),
      'param_name' => 'values',
      'description' => esc_html__( 'Enter values for graph - value, title.', 'nonprofit' ),
      'value' => urlencode( json_encode( array(
        array(
          'label' => esc_html__( 'Development', 'nonprofit' ),
          'value' => '90',
        ),
        array(
          'label' => esc_html__( 'Design', 'nonprofit' ),
          'value' => '80',
        ),
        array(
          'label' => esc_html__( 'Marketing', 'nonprofit' ),
          'value' => '70',
        ),
      ) ) ),
      'params' => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Label', 'nonprofit' ),
          'param_name' => 'label',
          'description' => esc_html__( 'Enter text used as title of bar.', 'nonprofit' ),
          'admin_label' => true,
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Value', 'nonprofit' ),
          'param_name' => 'value',
          'description' => esc_html__( 'Enter value of bar.', 'nonprofit' ),
          'admin_label' => true,
        ),
      ),
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Units', 'nonprofit' ),
      'param_name' => 'units',
      'description' => esc_html__( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'nonprofit' ),
    ),
    array(
      'type' => 'css_editor',
      'heading' => esc_html__( 'CSS box', 'nonprofit' ),
      'param_name' => 'css',
      'group' => esc_html__( 'Design Options', 'nonprofit' ),
    ),
	  $vc_add_css_animation,
  ),
));