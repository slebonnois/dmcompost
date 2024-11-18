<?php

remove_action('wp_head', 'wp_generator');

// Ajouter la prise en charge des images mises en avant
//add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );



function enqueue_webpack_scripts() {
  

  wp_enqueue_style('main-css', get_template_directory_uri()."/assets/public/css/frontend.css", null, 1, false);
  wp_enqueue_script('main-js', get_template_directory_uri()."/assets/public/js/frontend.js", null, 1, true);

   }
   add_action( 'wp_enqueue_scripts', 'enqueue_webpack_scripts' );



   function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );


/** * Completely Remove jQuery From WordPress */
function my_init() {
  if (!is_admin()) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', false);
  }
}
add_action('init', 'my_init');



// ADMIN
require_once( 'includes/_admin.php'); 

//CONTENU
require_once( 'includes/_contenu.php'); 

//CONTACT
require_once( 'includes/_contact.php'); 

