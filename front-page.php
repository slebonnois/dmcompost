<?php get_header();
$c = get_fields(); ?>

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


    <div class="container container-accueil-expertise  zone-contenus">

        <div class="row">
            <div class="col col-12 ">
                <div class="titre-xl">Nos domaines<br>d’expertise</div>
            </div>

            <?php foreach ($GLOBALS['expertises'] as $expertise): ?>
                <div class="col col-lg-4 col-12">
                    <a class="card card-expertise card-<?php echo $expertise->post_name ?> "
                        href="/<?php echo $expertise->post_name ?>">
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

                        <div class=""><img src="<?php echo get_field('visuels', 101)['icone']['url'] ?>"></div>
                        <div class="texte-l">Formations & animations</div>
                        <div class="texte-s">Vous aider à acquérir des compétences en compostage de proximité.</div>
                    </div>
                    <div class="card-conteneur"
                        style="background-image:url(<?php echo get_field('visuels', 101)['visuel_accueil']['url'] ?>)">
                        <div class="filtre"></div>
                        <div class="btn-xs"></div>
                    </div>
                </a>
            </div>

        </div>

    </div>

    <div class="container zone-contenus">
        <div class="row">
            <div class="col col-lg-4 offset-lg-2 col-12 my-auto">
                <div class="titre-xl">
                POURQUOI FAIRE APPEL à DM COMPOST
                <a href="/qui-sommes-nous" class="btn btn--vert">Qui sommes-nous</a>
                </div>
            </div>
            <div class="col col-lg-4 col-12 my-auto">
            <div class="row ">
						<div class="col col-6 my-auto ">
							<div class="picto">
								<div class="picto-image picto-home-1"></div>
								<div class="picto-texte">
									<div class="texte-xl align-center"><strong>Faire ensemble</strong><br>durablement
									</div>
								</div>
							</div>
						</div>
						<div class="col col-6 my-auto ">
							<div class="picto">
								<div class="picto-image picto-home-2"></div>
								<div class="picto-texte">
									<div class="texte-xl align-center"><strong>Partager et <br>transmettre</strong><br>notre passion
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col col-6 my-auto ">
							<div class="picto">
								<div class="picto-image picto-home-3"></div>
								<div class="picto-texte">
									<div class="texte-xl align-center"><strong>Respecter <br>
                                    et protéger</strong> <br>le vivant</div>
								</div>
							</div>
						</div>
						<div class="col col-6 my-auto ">
							<div class="picto">
								<div class="picto-image picto-home-4"></div>
								<div class="picto-texte">
									<div class="texte-xl align-center"><strong>Mettre<br>en valeur</strong><br>l’humain</div>
								</div>
							</div>
						</div>
					</div>
            </div>
            
        </div>
    </div>



<?php if ( !empty($c['chiffre_1'])): ?>


<div class="container zone-contenus">

    <div class="row row-chiffres quelques-chiffres">
        <div class="col col-12 col-lg-10 offset-lg-1">
            <div class="row ">
                <div class="col col-12">
                    <div class="texte-xxl">En quelques chiffres</div>
                </div>
            </div>
            <div class="row ">
                <div class="col col-lg-4 col-12">
                    <div class="chiffre"><?php echo $c['chiffre_1'] ?></div>
                    <div class="titre-s"><?php echo $c['texte_1'] ?></div>
                </div>
                <div class="col col-lg-4 col-12">
                    <div class="chiffre"><?php echo $c['chiffre_2'] ?></div>
                    <div class="titre-s"><?php echo $c['texte_2'] ?></div>
                </div>
                <div class="col col-lg-4 col-12">
                    <div class="chiffre"><?php echo $c['chiffre_3'] ?></div>
                    <div class="titre-s"><?php echo $c['texte_3'] ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif ?>


    <div class="zone-contact">
        <a href="/contact" class="bloc-contact">
            <div class="texte-xxl">Vous aider à construire votre solution <strong>sur mesure</strong></div>
            <div class="btn">contactez-nous</div>
            <div class="bloc-contact--fond"></div>
        </a>
    </div>



</main>

<?php get_footer(); ?>