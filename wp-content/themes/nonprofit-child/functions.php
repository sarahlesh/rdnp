<?php

function enqueue_parent_theme_style() {
    // wp_enqueue_style( 'nonprofit-parent-style', get_template_directory_uri().'/css/app.css' );
    wp_enqueue_style( 'nonprofit-child-style', get_stylesheet_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style', 99 ); 
