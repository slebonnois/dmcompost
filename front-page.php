<?php get_header(); ?>

<main>

    <div class="container container-accueil">
        <div class="row">
            <div class="col col-12 col-lg-5 offset-lg-1">
                <div class="titre-l">
                    Nous concevons des <strong>solutions sur mesure</strong> et vous accompagnons dans le processus de
                    <strong>valorisation de vos déchets organiques.</strong>
                </div>
                <div class="btn-decouvrir ">
                    DÉCOUVRIR
                </div>

            </div>
            <div class="col col-12 col-lg-4 offset-lg-1 ">
                <div class="card-cibles">
                    <div class="texte-m">Vous êtes :</div>
                    <ul>
                        <?php foreach ($GLOBALS['cibles'] as $cible): ?>
                            <?php if ($cible->fields['cible_principale'] == true):
                                $class = "titre-m"; ?>
                            <?php else:
                                $class = "titre-s"; ?>
                            <?php endif; ?>
                            <li><a href="/<?php echo $cible->post_name ?>"
                                    class="<?php echo $class ?>"><?php echo $cible->post_title ?></a></li>
                        <?php endforeach; ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="container container-accueil-expertise">

        <div class="row">
            <div class="col col-12 ">
                <div class="titre-xl">Nos domaines<br>d’expertise</div>
            </div>

            <?php foreach ($GLOBALS['expertises'] as $expertise): ?>
                <div class="col col-lg-4 col-12">
                    <a class="card card-expertise card-<?php echo $expertise->post_name ?> " href="/<?php echo $expertise->post_name ?>">
                        <div class="card-header">
                            <div class=""><img src="<?php echo $expertise->fields['icone']['url'] ?>"></div>
                            <div class="texte-l"><?php echo $expertise->post_title ?></div>
                            <div class="texte-s"><?php echo $expertise->fields['intro_home'] ?></div>
                        </div>
                        <div class="card-conteneur"
                            style="background-image:url(<?php echo $expertise->fields['visuel']['sizes']['medium_large'] ?>)">
                            <div class="filtre"></div>
                            <div class="btn-xs"></div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            <div class="col col-lg-4 col-12">
                    <a class="card card-expertise card-formation " href="/formations-animations/">
                        <div class="card-header">
                            <div class=""><img src="<?php echo $expertise->fields['icone']['url'] ?>"></div>
                            <div class="texte-l">Formations & animations</div>
                            <div class="texte-s"><?php echo $expertise->fields['intro_home'] ?></div>
                        </div>
                        <div class="card-conteneur"
                            style="background-image:url(<?php echo $expertise->fields['visuel']['sizes']['medium_large'] ?>)">
                            <div class="filtre"></div>
                            <div class="btn-xs"></div>
                        </div>
                    </a>
                </div>

        </div>

    </div>



<div class="zone-contact">
	<a href="/contact" class="bloc-contact">
		<div class="texte-xxl">Vous aider à construire votre solution <strong>sur mesure</strong></div>
		<div class="btn">contactez-nous</div>
		<div class="bloc-contact--fond"></div>
	</a>
</div>



</main>

<?php get_footer(); ?>