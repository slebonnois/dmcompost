<?php
get_header();
$c = get_fields();

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

<div class="container container-expertise">
    <div class="row">
        <div class="col col-10 offset-1">
            <h1 class="titre-xxl align-center"><?php echo get_the_title() ?></h1>
        </div>
    </div>
</div>

<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" id="contact-form" class="" >
    <input type="hidden" name="action" value="custom_contact_form">

    <div class="container container-page ">

        <div class="row row-intro-service">
            <div class="col col-12 col-lg-8 offset-lg-2 align-center ">
                <img class="service-icone reveal-1"
                    src="<?php echo get_stylesheet_directory_uri() ?>/logos/ico-contact.svg">

                <div class="titre-m">sélectionnez votre profil</div>
            </div>
        </div>



        <div class="row ">
            <div class="col col-10 offset-1 offset-md-2 col-md-8 align-center my-auto col-profiles">

                <fieldset>
                    <label>
                        <input type="radio" name="profil" class="radio-btn" value="Collectivité" required>
                        <div class="card-profile">Collectivité</div>
                    </label>
                </fieldset>

                <fieldset>
                    <label>
                        <input type="radio" name="profil" class="radio-btn" value="Établissement public ou privé" required>
                        <div class="card-profile">Établissement public ou privé</div>
                    </label>
                </fieldset>

                <fieldset>
                    <label>
                        <input type="radio" name="profil" class="radio-btn" value="Acteur de collecte et valorisation des biodéchets"
                            required>
                        <div class="card-profile">Acteur de collecte et valorisation des biodéchets</div>
                    </label>
                </fieldset>


            </div>
            <div class="texte-s  align-center">Particulier ou enseignant, pour trouver les bons interlocuteur <a
                    href="/particulier-enseignant">cliquez ici</a></div>
        </div>

        <div class="row ">

            <div class="col col-10 offset-1 offset-md-2 col-md-8  my-auto col-form form-disabled" id="contenu-form">

                <div class="row">

                    <div class="col-demi">
                        <div class="zone-form">
                            <div class="titre-m">indiquez vos coordonnées</div>

                            <fieldset>
                                <input type="text" name="nom" id="nom" minlength="1" value="" class="form-control"
                                    required placeholder=' '>
                                <div class="placeholder">
                                    Nom <span>*</span>
                                </div>
                            </fieldset>

                            <fieldset>
                                <input type="text" name="prenom" id="prenom" minlength="1" required placeholder=' '>
                                <div class="placeholder">
                                    Prénom<span>*</span>
                                </div>
                            </fieldset>

                            <fieldset>
                                <input type="text" name="fonction" id="fonction" minlength="1" placeholder=' '>
                                <div class="placeholder">
                                    Fonction
                                </div>
                            </fieldset>

                            <fieldset>
                                <input type="text" name="structure" id="structure" minlength="1" required
                                    placeholder=' '>
                                <div class="placeholder">
                                    Structure<span>*</span>
                                </div>
                            </fieldset>

                            <fieldset>
                                <input type="email" name="courriel" id="courriel" minlength="1" required
                                    placeholder=' '>
                                <div class="placeholder">
                                    Courriel<span>*</span>
                                </div>
                            </fieldset>

                            <fieldset>
                                <input type="text" name="telephone" id="telephone" minlength="1" required
                                    placeholder=' '>
                                <div class="placeholder">
                                    Téléphone<span>*</span>
                                </div>
                            </fieldset>
                        </div>


                    </div>
                    <div class="col-demi">
                        <div class="zone-form">
                            <div class="titre-m">précisez votre demande</div>

                            <fieldset class="texte-s checkbox">
                                <label>
                                    Le bureau d'études et de conseil
                                    <input type="checkbox" name="demande[]" value="Le bureau d'études et de conseil">
                                    <span class="checkmark"></span>
                                </label>
                            </fieldset>

                            <fieldset class="texte-s checkbox">
                                <label>
                                    Les formations et animations
                                    <input type="checkbox" name="demande[]"  value="Les formations et animations">
                                    <span class="checkmark"></span>
                                </label>
                            </fieldset>

                            <fieldset class="texte-s checkbox">
                                <label>
                                    La prévention et gestion des biodéchets
                                    <input type="checkbox" name="demande[]"  value="La prévention et gestion des biodéchets">
                                    <span class="checkmark"></span>
                                </label>
                            </fieldset>

                            <fieldset class="texte-s checkbox">
                                <label>
                                    Une autre demande
                                    <input type="checkbox" name="demande[]"  value="Une autre demande">
                                    <span class="checkmark"></span>
                                </label>
                            </fieldset>

                            <fieldset>
                                <textarea id="message" name="message" required placeholder=' '></textarea>
                                <div class="placeholder">
                                    Décrivez votre besoin<span>*</span>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="col-12 align-center">
                        <input type="hidden" id="recaptchaResponse" name="recaptcha-response">
                        <input id="button-submit-form" type="submit" value="ENVOYER" class="btn btn--vert">
                    </div>

                    <div class="col-12 text-xs form-footer">

                        <div><span>*</span> Champs obligatoires</div>
                        <div>
                            Les informations recueillies sur ce formulaire sont enregistrées dans un fichier informatisé
                            par DM Compost SAS à capital variable pour la gestion administrative et commerciale. Elles
                            sont conservées pendant 3 ans maximum et sont destinées à DM Compost. Vous pouvez consulter
                            notre politique de confidentialité.
                            Conformément à la loi « informatique et libertés », vous pouvez exercer votre droit d'accès
                            aux données vous concernant et les faire rectifier en contactant : contact@dm-compost.fr.
                            

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</form>


<script async src="https://www.google.com/recaptcha/api.js?render=6Lf8nX4qAAAAAMipEIwrkT6h2YpBCavyo-KkF30W"></script>



<?php get_footer(); ?>