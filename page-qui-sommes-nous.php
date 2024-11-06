<?php get_header();
$c = get_fields(); ?>
<div>

    <div class="container container-chemin">
        <div class="row">
            <div class="col col-12">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb();
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col col-10 offset-1">
                <div class="titre-xxl align-center">Qui sommes-nous</div>
            </div>
        </div>
        <div class="row">
            <div class="col col-12 col-lg-8 offset-lg-2">
                <div class="texte-xl align-center"><?php echo $c['introduction'] ?></div>
            </div>
        </div>
    </div>


    <div class="container ">
        <div class="ico-qui"></div>

        <div class="row row-contenu">
            <div class="col col-12 col-lg-5 row-contenu--image">
                <div class="image-contenu" style="background-image:url(<?php echo $c['contenus']['image_1']['url'] ?>)">
                    <div class="filtre"></div>
                </div>
            </div>
            <div class="col col-12 col-lg-5 row-contenu--texte  my-auto">
                <div class="texte-m"><?php echo $c['contenus']['texte_1'] ?></div>
            </div>
        </div>

        <div class="row">
            <div class="col col-12 align-center">
                <?php echo $c['contenus']['texte_central'] ?>
            </div>
        </div>

        <div class="row row-contenu">
            <div class="col col-12 col-lg-5 row-contenu--texte  my-auto">
                <div class="texte-m"><?php echo $c['contenus']['texte_2'] ?></div>
            </div>
            <div class="col col-12 col-lg-5 row-contenu--image">
                <div class="image-contenu" style="background-image:url(<?php echo $c['contenus']['image_2']['url'] ?>)">
                    <div class="filtre"></div>
                </div>
            </div>
        </div>

    </div>

    <div class="container container-valeurs">
        <div class="row">
            <div class="col col-10 offset-1">
                <div class="titre-xl">nos valeurs</div>
            </div>
        </div>

        <div class="row">
            <div class="col col-10 offset-1">
                <div class="row">
                    <?php foreach ($c['valeurs'] as $v): ?>
                        <div class="col col-6">
                            <img src="<?php echo $v['icone']['url'] ?>">
                            <div class="texte-xl"><?php echo $v['titre'] ?></div>
                            <div class="texte-m"><?php echo $v['texte'] ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>



    </div>
    <div class="container container-fournisseurs zone-contenus">
        <div class="row ">
            <div class="col col-10 offset-1">
                <div class="texte-m"><strong><?php echo $c['texte_fournisseurs'] ?></strong></div>

                <div class="fournisseurs-logos">
                    <?php foreach ($c['fournisseurs'] as $f): ?>
                        <img src="<?php echo $f['url'] ?>">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-recompenses  zone-contenus">
        <div class="row equal">
            <div class="col col-9">

                <div class="recompenses-logos">
                    <div class="titre-xl">nos récompenses</div>
                    <?php foreach ($c['recompenses'] as $r): ?>
                        <div class="recompense align-center ">
                            <div class="texte-s align-middle"><?php echo $r['description'] ?></div>
                            <div class="recompense-logo"><img src="<?php echo $r['logo']['url'] ?>"></div>
                        </div>
                    <?php endforeach; ?>
                </div>



            </div>

            <div class="col col-3">
                <div class="labels-logos">
                    <div class="titre-xl">nos labels</div>
                    <?php foreach ($c['labels'] as $r): ?>
                        <div class="recompense align-center ">
                            <img src="<?php echo $r['url'] ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


    <div class="container container-equipe  zone-contenus">
        <div class="row ">
            <div class="col col-xl-3  col-lg-4 col-md-6 col-12 my-auto">
                <div class="titre-xl">L’ÉQUIPE<br> DM COMPOST</div>
            </div>
            <?php foreach ($c['equipe'] as $e):
                $e->fields = get_fields($e->ID); ?>
                <div class="col col-xl-3  col-lg-4 col-md-6 col-12 ">
                    <div class="equipe" data-id="<?php echo $e->ID ?>"
                        style="background-image:url('<?php echo $e->fields['photo_1']['sizes']['medium'] ?>')">

                        <div class="equipe-contenu">
                            <div class="titre-m"><?php echo $e->post_title ?></div>
                            <div class="texte-l"><strong><?php echo $e->fonction ?></strong></div>
                            <div class="texte-m"><?php echo $e->fields['titre'] ?></div>
                            <div class="equipe-contenu-fond"></div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
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

    <div class="overlay-detail-equipe">
        <div class="detail-equipe">
            <div class="container">
                <div class="row">
                    <div class="col col-6 detail-equipe-portrait">

                    </div>
                    <div class="col col-6">
Texte
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay overlay-equipe"></div>

    <?php get_footer(); ?>