<?php
if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

return array(
  'name' => __( 'Tabs', 'nonprofit' ),
  'base' => 'wd_vc_tta_tabs',
  'icon' => 'icon-wpb-ui-tab-content',
  'is_container' => true,
  'show_settings_on_create' => false,
  'as_parent' => array(
    'only' => 'vc_tta_section',
  ),
  'category' => __( 'Content', 'nonprofit' ),
  'description' => __( 'Tabbed content', 'nonprofit' ),
  'params' => array(
    array(
      'type' => 'textfield',
      'param_name' => 'title',
      'heading' => __( 'Widget title', 'nonprofit' ),
      'description' => __( 'Enter text used as widget title (Note: located above content element).', 'nonprofit' ),
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'style',
      'value' => array(
        __( 'Classic', 'nonprofit' ) => 'classic',
        __( 'Modern', 'nonprofit' ) => 'modern',
        __( 'Flat', 'nonprofit' ) => 'flat',
        __( 'Outline', 'nonprofit' ) => 'outline',
      ),
      'heading' => __( 'Style', 'nonprofit' ),
      'description' => __( 'Select tabs display style.', 'nonprofit' ),
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'shape',
      'value' => array(
        __( 'Rounded', 'nonprofit' ) => 'rounded',
        __( 'Square', 'nonprofit' ) => 'square',
        __( 'Round', 'nonprofit' ) => 'round',
      ),
      'heading' => __( 'Shape', 'nonprofit' ),
      'description' => __( 'Select tabs shape.', 'nonprofit' ),
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'color',
      'heading' => __( 'Color', 'nonprofit' ),
      'description' => __( 'Select tabs color.', 'nonprofit' ),
      'value' => getVcShared( 'colors-dashed' ),
      'std' => 'grey',
      'param_holder_class' => 'vc_colored-dropdown',
    ),
    array(
      'type' => 'checkbox',
      'param_name' => 'no_fill_content_area',
      'heading' => __( 'Do not fill content area?', 'nonprofit' ),
      'description' => __( 'Do not fill content area with color.', 'nonprofit' ),
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'spacing',
      'value' => array(
        __( 'None', 'nonprofit' ) => '',
        '1px' => '1',
        '2px' => '2',
        '3px' => '3',
        '4px' => '4',
        '5px' => '5',
        '10px' => '10',
        '15px' => '15',
        '20px' => '20',
        '25px' => '25',
        '30px' => '30',
        '35px' => '35',
      ),
      'heading' => __( 'Spacing', 'nonprofit' ),
      'description' => __( 'Select tabs spacing.', 'nonprofit' ),
      'std' => '1',
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'gap',
      'value' => array(
        __( 'None', 'nonprofit' ) => '',
        '1px' => '1',
        '2px' => '2',
        '3px' => '3',
        '4px' => '4',
        '5px' => '5',
        '10px' => '10',
        '15px' => '15',
        '20px' => '20',
        '25px' => '25',
        '30px' => '30',
        '35px' => '35',
      ),
      'heading' => __( 'Gap', 'nonprofit' ),
      'description' => __( 'Select tabs gap.', 'nonprofit' ),
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'tab_position',
      'value' => array(
        __( 'Top', 'nonprofit' ) => 'top',
        __( 'Bottom', 'nonprofit' ) => 'bottom',
      ),
      'heading' => __( 'Position', 'nonprofit' ),
      'description' => __( 'Select tabs navigation position.', 'nonprofit' ),
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'alignment',
      'value' => array(
        __( 'Left', 'nonprofit' ) => 'left',
        __( 'Right', 'nonprofit' ) => 'right',
        __( 'Center', 'nonprofit' ) => 'center',
      ),
      'heading' => __( 'Alignment', 'nonprofit' ),
      'description' => __( 'Select tabs section title alignment.', 'nonprofit' ),
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'autoplay',
      'value' => array(
        __( 'None', 'nonprofit' ) => 'none',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '10' => '10',
        '20' => '20',
        '30' => '30',
        '40' => '40',
        '50' => '50',
        '60' => '60',
      ),
      'std' => 'none',
      'heading' => __( 'Autoplay', 'nonprofit' ),
      'description' => __( 'Select auto rotate for tabs in seconds (Note: disabled by default).', 'nonprofit' ),
    ),
    array(
      'type' => 'textfield',
      'param_name' => 'active_section',
      'heading' => __( 'Active section', 'nonprofit' ),
      'value' => 1,
      'description' => __( 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'nonprofit' ),
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'pagination_style',
      'value' => array(
        __( 'None', 'nonprofit' ) => '',
        __( 'Square Dots', 'nonprofit' ) => 'outline-square',
        __( 'Radio Dots', 'nonprofit' ) => 'outline-round',
        __( 'Point Dots', 'nonprofit' ) => 'flat-round',
        __( 'Fill Square Dots', 'nonprofit' ) => 'flat-square',
        __( 'Rounded Fill Square Dots', 'nonprofit' ) => 'flat-rounded',
      ),
      'heading' => __( 'Pagination style', 'nonprofit' ),
      'description' => __( 'Select pagination style.', 'nonprofit' ),
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'pagination_color',
      'value' => getVcShared( 'colors-dashed' ),
      'heading' => __( 'Pagination color', 'nonprofit' ),
      'description' => __( 'Select pagination color.', 'nonprofit' ),
      'param_holder_class' => 'vc_colored-dropdown',
      'std' => 'grey',
      'dependency' => array(
        'element' => 'pagination_style',
        'not_empty' => true,
      ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Extra class name', 'nonprofit' ),
      'param_name' => 'el_class',
      'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nonprofit' ),
    ),
    array(
      'type' => 'css_editor',
      'heading' => __( 'CSS box', 'nonprofit' ),
      'param_name' => 'css',
      'group' => __( 'Design Options', 'nonprofit' ),
    ),
  ),
  'js_view' => 'VcBackendTtaTabsView',
  'custom_markup' => '
<div class="vc_tta-container" data-vc-action="collapse">
  <div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
    <div class="vc_tta-tabs-container">'
                     . '<ul class="vc_tta-tabs-list">'
                     . '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
                     . '</ul>
    </div>
    <div class="vc_tta-panels vc_clearfix {{container-class}}">
      {{ content }}
    </div>
  </div>
</div>',
  'default_content' => '
[vc_tta_section title="' . sprintf( '%s %d', __( 'Tab', 'nonprofit' ), 1 ) . '"][/vc_tta_section]
[vc_tta_section title="' . sprintf( '%s %d', __( 'Tab', 'nonprofit' ), 2 ) . '"][/vc_tta_section]
  ',
  'admin_enqueue_js' => array(
    vc_asset_url( 'lib/vc_tabs/vc-tabs.min.js' ),
  ),
);
