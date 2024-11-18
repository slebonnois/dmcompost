<?php
get_header();
$c = get_fields();

foreach ($c['equipe'] as $k => $e) {
    $c['equipe'][$k]->fields = get_fields($e->ID);
}
?>


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

    <div class="container container-header-qui reveal-start">
        <div class="row">
            <div class="col col-12  reveal-1">
                <h1 class="titre-xxl align-center">Qui sommes-nous</h1>
            </div>
        </div>
        <div class="row">
            <div class="col col-12 col-lg-8 offset-lg-2 reveal-2">
                <div class="texte-xl align-center"><?php echo $c['introduction'] ?></div>
            </div>
        </div>
    </div>


    <div class="container zone-contenus reveal">
        <div class="ico-qui reveal-1"></div>

        <div class="row row-contenu reveal">
            <div class="col col-12 col-lg-5 row-contenu--image reveal-1">
                <div class="image-contenu" style="background-image:url(<?php echo $c['contenus']['image_1']['url'] ?>)">
                    <div class="filtre"></div>
                </div>
            </div>
            <div class="col col-12 col-lg-5 row-contenu--texte  my-auto reveal-2">
                <div class="texte-m"><?php echo $c['contenus']['texte_1'] ?></div>
            </div>
        </div>

        <div class="row reveal">
            <div class="col col-12 align-center citation reveal-1">
                <?php echo $c['contenus']['texte_central'] ?>
            </div>
        </div>

        <div class="row row-contenu reveal">
            <div class="col col-12 col-lg-5 row-contenu--texte  my-auto reveal-1">
                <div class="texte-m"><?php echo $c['contenus']['texte_2'] ?></div>
            </div>
            <div class="col col-12 col-lg-5 row-contenu--image reveal-2">
                <div class="image-contenu" style="background-image:url(<?php echo $c['contenus']['image_2']['url'] ?>)">
                    <div class="filtre"></div>
                </div>
            </div>
        </div>

    </div>

    <div class="container container-valeurs reveal">
        <div class="row">
            <div class="col col-10 offset-1 reveal-1">
                <div class="titre-xl">nos valeurs</div>
            </div>
        </div>

        <div class="row">
            <div class="col col-10 offset-1 ">
                <div class="row reveal">
                    <?php $i=1; foreach ($c['valeurs'] as $v): ?>
                        <div class="col col-12 col-md-6 reveal-<?php echo $i?>">
                            <img src="<?php echo $v['icone']['url'] ?>" alt="<?php echo $v['titre'] ?>">
                            <div class="texte-xl"><?php echo $v['titre'] ?></div>
                            <div class="texte-m"><?php echo $v['texte'] ?></div>
                        </div>
                    <?php $i++; endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-fournisseurs zone-contenus reveal">
        <div class="row ">
            <div class="col col-10 offset-1 reveal-1">
                <div class="texte-m"><strong><?php echo $c['texte_fournisseurs'] ?></strong></div>

                <div class="fournisseurs-logos">
                    <?php foreach ($c['fournisseurs'] as $f): ?>
                        <img src="<?php echo $f['url'] ?>" alt="<?php echo $f['filename'] ?>">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-recompenses  zone-contenus reveal">
        <div class="row equal">

            <div class="col col-lg-9 col-12">
                <div class="recompenses-logos reveal-1">
                    <div class="titre-xl">nos récompenses</div>
                    <?php foreach ($c['recompenses'] as $r): ?>
                        <div class="recompense align-center ">
                            <div class="texte-s align-middle"><?php echo $r['description'] ?></div>
                            <div class="recompense-logo"><img src="<?php echo $r['logo']['url'] ?>" alt="<?php echo $r['description'] ?>"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col col-lg-3 col-12 reveal-2">
                <div class="labels-logos">
                    <div class="titre-xl">nos labels</div>
                    <?php foreach ($c['labels'] as $r): ?>
                        <div class="recompense align-center ">
                            <img src="<?php echo $r['url'] ?>"  alt="<?php echo $f['filename'] ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>

    <div class="container container-equipe  zone-contenus reveal ">
        <div class="row ">
            
            <div class="col col-xl-3  col-lg-4 col-md-6 col-12 my-auto reveal-1">
                <div class="titre-xl reveal-1">L’ÉQUIPE<br> DM COMPOST</div>
            </div>
            <?php $i=2; foreach ($c['equipe'] as $e): ?>
                <div class="col col-xl-3  col-lg-4 col-md-6 col-10 offset-1 offset-md-0 reveal-<?php echo $i ?>">
                    <div class="equipe" data-id="<?php echo $e->ID ?>"
                        style="background-image:url('<?php echo $e->fields['photo_1']['sizes']['medium_large'] ?>')">
                       
                        <div class="equipe-contenu">
                            <div class="titre-m"><?php echo $e->post_title ?></div>
                            <div class="texte-l puce-dm"><strong><?php echo $e->fonction ?></strong></div>
                            <div class="texte-m"><?php echo $e->fields['titre'] ?></div>
                            <div class="equipe-contenu-fond"></div>
                        </div>

                    </div>
                </div>
            <?php $i++;endforeach; ?>
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

    <?php foreach ($c['equipe'] as $e): ?>
        <div class="overlay-detail-equipe" id="equipe-<?php echo $e->ID ?>">
            <div class="detail-equipe">

                <div class="row">
                    <div class="col col-12 col-md-6 ">
                     
                        <div class="detail-equipe-portrait"
                            style="background-image:url('<?php echo $e->fields['photo_2']['sizes']['medium_large'] ?>')"></div>
                    </div>
                    <div class="col col-12 col-md-6 ">
                        <div class="detail-equipe-ferme"></div>
                        <div class="equipe-tag"><div><?php echo $e->fields['surnom'] ?></div></div>
                        <div class="detail-equipe-texte">
                            <div class="titre-xl"><?php echo str_replace(trim($e->fields['nom']),'',$e->post_title) ?><br><?php echo $e->fields['nom'] ?></div>
                            <div class="texte-l puce-dm"><strong><?php echo $e->fonction ?></strong></div>
                            <div class="texte-s detail-equipe-titre"><strong><?php echo $e->fields['titre'] ?></strong></div>
                            <div class="texte-s"><?php echo $e->fields['cv'] ?></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>

    <div class="overlay overlay-equipe"></div>

    <?php get_footer(); ?>