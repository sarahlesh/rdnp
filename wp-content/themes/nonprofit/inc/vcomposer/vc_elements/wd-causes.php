<?php 

global $vc_add_css_animation;
/* our client
---------------------------------------------------------- */
vc_map( array(
    "name" => esc_html__("Wd Causes", 'nonprofit'),
    "base" => "nonprofit_causes",
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, 
    "is_container" => FALSE,
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Display Style", 'nonprofit'),
            "param_name" => "nonprofit_causes_affichage_type",
            "value" => array(
                'Image Post in Left'=>'nonprofit_blog_image_left',
                'Image Post in Top'=>'nonprofit_blog_image_top'

            )
        )
    ,

    $vc_add_css_animation
    )
) );