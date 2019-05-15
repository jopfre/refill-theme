<?php
add_action( 'wp_enqueue_scripts', 'refill_enqueue_scripts' );

function refill_enqueue_scripts() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'micromodal', get_stylesheet_directory_uri() . '/micromodal.css' );

  wp_enqueue_script( 'leaflet', get_stylesheet_directory_uri() . '/leaflet.js', array(), 1, true );
  wp_enqueue_script( 'map', get_stylesheet_directory_uri() . '/map.js', array( 'wp-api', 'leaflet'), 1, true );
}

?>