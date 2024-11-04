<?php


// REMPLISSAGE DES LISTES LIENS TEMOIGNAGES

function acf_load_choices( $field ) {

    // Reset
    $field['choices'] = array();

    $args = array(
        'post_type' => 'page', //it is a Page right?
        'post_status' => 'publish',   
        'numberposts'      => -1,
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => 'templates/'.$field['name'].'.php', // folder + template name as stored in the dB
            )
        )
    );
   $posts = get_posts($args) ; 
   
    if( is_array($posts) ) {
        foreach( $posts as $post ) {        
            $field['choices'][ $post->ID ] = $post->post_title;
        }
        return $field;
    }
   
}
add_filter('acf/load_field/name=cible', 'acf_load_choices');
add_filter('acf/load_field/name=service', 'acf_load_choices');
add_filter('acf/load_field/name=formation', 'acf_load_choices');



// FILTRER LES TEMPLATES
function filter_page_templates( $page_templates ) {
    
    global $post;
    $id = $post->ID;


    // Accueil : supprimer la possibilité de modifier le template
    if ($id == 10) {
        foreach($page_templates as $k => $template) {
            if ($k != 'templates/accueil.php')  unset( $page_templates[$k] );
        }
    } else {
        unset( $page_templates['templates/accueil.php'] );
    }

   // Page Formations : supprimer la possibilité de modifier le template
//    if ($id == 101) {
//     foreach($page_templates as $k => $template) {
//         if ($k != 'templates/accueil-formations.php')  unset( $page_templates[$k] );
//     }
//         } else {
//             unset( $page_templates['templates/accueil-formations.php'] );
//         }
    
    // Returns the updated array.
    return $page_templates;
}
add_filter( 'theme_page_templates', 'filter_page_templates');


// AFFICHER LE NOM DU TEPLATE DANS L'ADMIN

add_filter( 'manage_pages_columns', 'page_column_views' );
add_action( 'manage_pages_custom_column', 'page_custom_column_views', 10, 2 );
function page_column_views( $defaults )
{
   $defaults['page-layout'] = __('Template');
   return $defaults;
}
function page_custom_column_views( $column_name, $id )
{
   if ( $column_name === 'page-layout' ) {
       $set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
       if ( $set_template == 'default' ) {
           echo '';
       }
       $templates = get_page_templates();
       ksort( $templates );
       foreach ( array_keys( $templates ) as $template ) :
           if ( $set_template == $templates[$template] ) echo $template;
       endforeach;
   }
}


// UPLOAD SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
  }
  add_action( 'admin_head', 'fix_svg' );
  
  

// Création des menus

function register_my_menus() {
    register_nav_menus(
      array(
        'menu-main' => __( 'Principal' ),
        'menu-second' => __( 'Secondaire' )
      )
    );
  }
  add_action( 'init', 'register_my_menus' );





  // REMPLISSAGE DES LISTES LIENS TEMOIGNAGES

function acf_load_services( $field ) {

    // Reset
    $field['choices'] = array();

    $args = array(
        'post_type' => 'page', //it is a Page right?
        'post_status' => 'publish',   
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => 'templates/service.php', // folder + template name as stored in the dB
            )
        )
    );
   $posts = get_posts($args) ; 
   $field['choices'][0] = 'Choisir';
    if( is_array($posts) ) {
        foreach( $posts as $post ) {        
            $field['choices'][ $post->ID ] = $post->post_title;
        }
        return $field;
    }
   
}
add_filter('acf/load_field/name=lien_service', 'acf_load_services');
