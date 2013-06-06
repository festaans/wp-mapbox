<?php

//SCRIPTS
function custom_scripts() {
        //map clusters
        wp_enqueue_script('gmaps-cluster', 'http://maps.google.com/maps/api/js?sensor=true', array( 'jquery' ) );
        //gmapsjs
        wp_enqueue_script('gmapsjs', get_stylesheet_directory_uri() . '/js/gmaps.js', array( 'jquery' ),'1.0', true);        
}

add_action( 'wp_enqueue_scripts', 'custom_scripts' ); // wp_enqueue_scripts action hook to link only on the front-end

/* STYLESHEETS */
function map_style_method() {
    wp_register_style('gmapscss', get_stylesheet_directory_uri() . '/css/map.css');
    wp_enqueue_style( 'gmapscss' );
}
add_action( 'wp_enqueue_scripts', 'map_style_method' );


include 'metabox/custom-meta-boxes.php';
?>