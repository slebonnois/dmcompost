
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



// ADMIN
require_once( 'includes/_admin.php'); 

//CONTENU
require_once( 'includes/_contenu.php'); 


