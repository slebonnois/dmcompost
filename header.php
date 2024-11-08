<?php
$GLOBALS['expertises'] = loadExpertises();
$GLOBALS['cibles'] = loadCibles();
$GLOBALS['class'] = getClass(get_the_id());
$GLOBALS['formations'] = getFormations();
$template = getTemplate(get_the_ID());
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
                    <li><a href="/qui-sommes-nous" id="menu-qui" class="menu-s menu-roll <?php if ($post->post_name == 'qui-sommes-nous')
                        echo 'is-active' ?>">Qui
                                sommes-nous</a></li>
                        <li><a href="/references" id="menu-ref" class="menu-s menu-roll <?php if ($post->post_name == 'references')
                        echo 'is-active' ?>">Références</a>
                        </li>
                        <li class="conteneur-menu-contact"><a href="/contact" class="menu-s menu-contact">Contact</a></li>
                        <li class="">
                            <div class="menu-s menu-vous-etes">
                                <div>Vous êtes</div>

                                <div class="container-sous-menu-cible">
                                    <div class="sous-menu-cible">
                                        <div class="texte-l"><strong>Nous répondons à vos besoins,<br>que vous soyez  :</strong></div>
                                        <ul class="menu-cibles">
                                        <?php foreach ($GLOBALS['cibles'] as $cible): ?>
                                            <?php if ($cible->fields['cible_principale'] == true):
                                                $class = "titre-s"; ?>
                                            <?php else:
                                                $class = "tag-typo"; ?>
                                            <?php endif; ?>
                                            <li>
                                                <a href="/<?php echo $cible->post_name ?>" class="<?php echo $class ?>">
                                                    
                                                    <div class="lien">
                                                        <div class="vignette-cible"></div>    
                                                        <div><?php echo $cible->fields['genre'] ?> <?php echo $cible->post_title ?></div>
                                                </div>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="overlay"></div>
                            </div>

                        </div>


                    </li>
                </ul>
            </div>
        </div>
        <div class="menu-principal">
            <a href="/" class="logo"></a>
            <div class="menu-conteneur">
                <ul>
                    <?php foreach ($GLOBALS['expertises'] as $expertise): ?>
                        <li class="conteneur-menu <?php echo $expertise->fields['code'] ?>">
                            <a href="/<?php echo $expertise->post_name ?>"
                                class="menu"><?php echo $expertise->post_title ?></a>
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
                                                        <a href="<?php echo get_permalink($service->ID) ?>" class="titre-s">
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
                        <a href="/formations-animations" class="menu">FORMATIONS & ANIMATIONS</a>
                        <div class="conteneur-sous-menu">
                            <div class="sous-menu form">
                                <div class="row">

                                    <div class="col col-4 my-auto">
                                        <div class="titre-l">Formations & animations</div>
                                        <div class="texte-m">Vous souhaitez acquérir des compétences en compostage de
                                            proximité, gaspillage alimentaire ou restauration durable et/ou vous
                                            reconvertir professionnellement ?</div>
                                        <a href="/formations-animations" class="btn btn--vert">Découvrir</a>
                                    </div>

                                    <div class="col col-4 my-auto">
                                        <ul>
                                            <li>
                                                <div class="titre-s">FORMATIONS</div>
                                            </li>
                                            <?php
                                            foreach ($GLOBALS['formations'] as $formation):
                                                if ($formation->fields['type'] == 1): ?>
                                                    <li>
                                                        <a href="/formations-animations/<?php echo $formation->post_name ?>"
                                                            class="texte-s">
                                                            <div><?php echo $formation->post_title ?></div>
                                                            <?php if ($formation->fields['configuration']['formation_certifiante'] == 1): ?>
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
                                            foreach ($GLOBALS['formations'] as $formation):
                                                if ($formation->fields['type'] != 1): ?>
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