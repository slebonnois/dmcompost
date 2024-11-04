<?php
$GLOBALS['expertises'] = loadExpertises();
$GLOBALS['cibles'] = loadCibles();
$GLOBALS['class'] = getClass(get_the_id());
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?> DM Compost</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- 
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
-->
    <?php wp_head(); ?>
</head>


<body <?PHP body_class(  $GLOBALS['class']   ) ?>>
    <div class="overlay">

   
            <div class="sous-menu"></div>
    </div>
    <nav>

        <div class="menu-secondaire">
            <div class="menu-conteneur ">
                <ul>
                    <li><a href="" class="menu-s">Qui sommes-nous</a></li>
                    <li><a href="" class="menu-s">Références</a></li><li class=""><a href="" class="menu-s menu-contact">Contact</a></li><li class=""><a href="" class="menu-s menu-vous-etes">Vous êtes</a></li>
                </ul>
            </div>
        </div>
        <div class="menu-principal">
            <a href="/" class="logo"></a>
            <div class="menu-conteneur">
                <ul>
                    <?php foreach ($GLOBALS['expertises'] as $expertise): ?>
                        <li><a href="/<?php echo $expertise->post_name?>" class="menu"><?php echo  $expertise->post_title ?></a>
                     
                    </li>
                    <?php endforeach; ?>
                    <li><a href="/formations-animations/" class="menu">FORMATIONS & ANIMATIONS</a></li>
                   
                </ul>
            </div>
        </div>

    </nav>

    <div class="header-fond">
    <div class="header-fond--logo "></div>
    <div class="header-fond--image "></div>
    </div>