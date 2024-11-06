<?php
$GLOBALS['expertises'] = loadExpertises();
$GLOBALS['cibles'] = loadCibles();
$GLOBALS['class'] = getClass(get_the_id());
$GLOBALS['formations'] =  getFormations();
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


<body <?PHP body_class($GLOBALS['class']) ?>>

    <nav>

        <div class="menu-secondaire">
            <div class="menu-conteneur ">
                <ul>
                    <li><a href="/qui-sommes-nous" class="menu-s">Qui sommes-nous</a></li>
                    <li><a href="/references" class="menu-s">Références</a></li><li class=""><a href="" class="menu-s menu-contact">Contact</a></li><li class=""><a href="" class="menu-s menu-vous-etes">Vous êtes</a></li>
                </ul>
            </div>
        </div>
        <div class="menu-principal">
            <a href="/" class="logo"></a>
            <div class="menu-conteneur">
                <ul>
                    <?php foreach ($GLOBALS['expertises'] as $expertise): ?>
                        <li class="conteneur-menu <?php echo $expertise->fields['code'] ?>">
                            <div class="menu"><?php echo $expertise->post_title ?></div>
                            <div class="conteneur-sous-menu">
                                <div class="sous-menu ">
                                    <div class="row">
                                        <div class="col col-6 my-auto">
                                            <div class="titre-l"><?php echo $expertise->post_title ?></div>
                                            <div class="texte-m"><?php echo $expertise->fields['intro_home'] ?></div>
                                            <a href="/<?php echo $expertise->post_name ?>"
                                                class="btn btn--vert">Découvrir</a>
                                        </div>
                                        <div class="col col-6 my-auto">
                                            <ul>
                                                <?php $services = getServices($expertise->ID);
                                                foreach ($services as $service): ?>
                                                    <li>
                                                        <a href="" class="titre-s">
                                                            <div><?php echo $service->post_title ?></div>
                                                            <img
                                                                src="<?php echo $service->fields['icones']['icone_menu']['url'] ?>">
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </li>
                    <?php endforeach; ?>

                    <li class="conteneur-menu form">
                        <div class="menu">FORMATIONS & ANIMATIONS</div>
                        <div class="conteneur-sous-menu">
                            <div class="sous-menu form">
                                <div class="row">

                                    <div class="col col-4 my-auto">
                                        <div class="titre-l">Formations & animations</div>
                                        <div class="texte-m">Vous souhaitez acquérir des compétences en compostage de proximité, gaspillage alimentaire ou restauration durable et/ou vous reconvertir professionnellement ?</div>
                                        <a href="/formations-animations"
                                            class="btn btn--vert">Découvrir</a>
                                    </div>

                                    <div class="col col-4 my-auto">
                                        <ul>
                                            <li>
                                                <div class="titre-s">FORMATIONS</div>
                                            </li>
                                            <?php 
                                            foreach ($GLOBALS['formations']  as $formation):
                                                if ($formation->fields['type'] == 1): ?>
                                                    <li>
                                                        <a href="/formations-animations/<?php echo $formation->post_name ?>"
                                                            class="texte-s">
                                                            <div><?php echo $formation->post_title ?></div>
                                                            <?php if ($formation->fields['configuration']['formation_certifiante'] == 1) : ?>
                                                                <div class="formation-certifiante texte-xs">Certifiante</div>
                                                            <?php endif; ?>
                                                        </a>
                                                    </li>
                                                <?php endif; endforeach; ?>
                                        </ul>
                                    </div>

                                    <div class="col col-4 my-auto">

                                        <ul>
                                            <li>
                                                <div class="titre-s">ANIMATION</div>
                                            </li>
                                            <?php 
                                            foreach ($GLOBALS['formations']  as $formation):
                                                if ($formation->fields['type'] == 0): ?>
                                                    <li>
                                                        <a href="/formations-animations/<?php echo $formation->post_name ?>"
                                                            class="texte-s">
                                                            <div><?php echo $formation->post_title ?></div>
                                                        </a>
                                                    </li>
                                                <?php endif; endforeach; ?>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </li>


                </ul>
            </div>
        </div>

    </nav>

    <div class="header-fond">
        <div class="header-fond--logo "></div>
        <div class="header-fond--image "></div>
    </div>