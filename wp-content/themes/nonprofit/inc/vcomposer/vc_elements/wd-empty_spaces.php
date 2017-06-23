<?php 
vc_map( array(
    "name" => esc_html__("Wd Empty Space", 'nonprofit'),
    "base" => "nonprofit_empty_spaces",
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true,
    "is_container" => FALSE,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Height in Mobile", 'nonprofit'),
            "param_name" => "height_mobile",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Height in Tablet", 'nonprofit'),
            "param_name" => "height_tablet",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Height in Desktop", 'nonprofit'),
            "param_name" => "height_desktop",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra Classes", 'nonprofit'),
            "param_name" => "extra_classes",
        )
    )
) );