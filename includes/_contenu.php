<?php


// GESTION DES COULEURS SUR LES PAGES SERVICES
function getClass($id)
{
    // $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
    // $current_post_id = url_to_postid( $url );
    $templateSlug = get_page_template_slug($id);

    if (strpos($templateSlug, 'expertise') !== false) {
        $tempPost = get_post($id);
        return $tempPost->post_name;
    } else if (strpos($templateSlug, 'service') !== false) {
        $tempPost = get_post(wp_get_post_parent_id($id));
        return $tempPost->post_name;
    } else if (strpos($templateSlug, 'formation') !== false) {
        $tempPost = get_post(wp_get_post_parent_id($id));
        return $tempPost->post_name;
    }
    else if (strpos($templateSlug, 'cible') !== false) {
        $tempPost = get_post($id);
        return $tempPost->post_name;
    } else {
        $post = get_post($id);
        return $post->post_name;
    }
}


function loadExpertises()
{
    $args = array(
        'post_type' => 'page', //it is a Page right?
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => 'templates/expertise.php', // folder + template name as stored in the dB
            )
        )
    );
    $posts = get_posts($args);

    $contenu = [];
    foreach ($posts as $p) {
        $p->fields = get_fields($p->ID);
        $contenu[] = $p;
    }
    return $contenu;
}

function loadCibles()
{
    $args = array(
        'post_type' => 'page', //it is a Page right?
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => 'templates/cible.php', // folder + template name as stored in the dB
            )
        )
    );
    $posts = get_posts($args);

    $contenu = [];
    foreach ($posts as $p) {
        $p->fields = get_fields($p->ID);
        $contenu[] = $p;
    }
    return $contenu;
}



function getFormations() {

    $args = array(
        'post_type' => 'page', //it is a Page right?
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => 'templates/formation.php', // folder + template name as stored in the dB
            )
        )
    );
    $posts = get_posts($args);
    $contenu = [];
    foreach ($posts as $p) {
        $p->fields = get_fields($p->ID);
        $contenu[] = $p;
    }
    return $contenu;
}

function getServices($id)
{

    $posts = get_pages('child_of=' . $id . '&sort_column=menu_order');

    $contenu = [];
    foreach ($posts as $p) {
        $p->fields = get_fields($p->ID);
        $contenu[] = $p;
    }

    return $contenu;

}


function getTemplate($id) {
    $template = trim(get_page_template_slug($id));

    $type = str_replace('templates/','',$template);
    $type = str_replace('.php', '',$type);
    return $type;
}

function getRealisations($id)
{

   
    $allReals = get_posts(array(
        'posts_per_page' => -1,
        'post_type' => 'realisations',
    ));

    $parent = wp_get_post_parent_id($id);
    $selectReals = [];

    // Pages de second niveau
   // if ( !in_array($type,['expertise','accueil-formations'])) {
   if ( $parent != 0) {
        $type = getTemplate($id);
        foreach ($allReals as $real) {
            $choix = get_fields($real->ID)['liens'][$type];
            if (in_array($id, $choix)) {
                $real->fields = get_fields($real->ID);
                $selectReals[] = $real;
            }
        }
    } else {

        $child_args = array(
            'post_parent' => $id, 
            'post_type'   => 'page',
            'post_status' => 'publish'
        );
        $children = get_children( $child_args );

        foreach ($children as $child) {
           
            $type = getTemplate($child->ID);
            if ($type == 'formations') $type='formation';
            
            foreach ($allReals as $real) {
                $choix = get_fields($real->ID)['liens'][$type];
                if (in_array($child->ID, $choix)) {
                    $real->fields = get_fields($real->ID);
                    $selectReals[$real->ID] = $real;
                }
            }
        }
    }

    return $selectReals;

}


function getCibles($id)
{

    $args = array(
        'post_type' => 'page', //it is a Page right?
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => 'templates/cible.php', // folder + template name as stored in the dB
            )
        )
    );
    $posts = get_posts($args);

    $cibles = [];
    foreach ($posts as $p) {
        $besoins = get_field('besoin', $p->ID);
        if ($besoins) {
            foreach ($besoins as $b) {

                if ($b['lien_service'] == $id) {
                    $cibles[$p->ID] = [];
                    $cibles[$p->ID]['titre'] = get_the_title($p->ID);
                    $cibles[$p->ID]['lien'] = get_permalink($p->ID);
                }
            }
        }
    }
    return $cibles;

}