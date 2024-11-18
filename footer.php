</main>

<div class="zone-logos">
    <div class="container">
        <!-- <div class="row reveal">
            <div class="col-lg-auto  col col-6 my-auto reveal-1 align-center">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/logos/ademe.png" alt="ADEME">
            </div>

            <div class="col-lg-auto col col-6 my-auto reveal-2 align-center">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/logos/biodechets.png" alt="Biodéchets">
            </div>

            <div class="col-lg-auto col col-6 my-auto reveal-3 align-center">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/logos/rcc.png" alt="Membre Réseau Compost Citoyen">
            </div>

            <div class="col-lg-auto col col-6 my-auto reveal-4 align-center">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/logos/esus.png" alt="ESUS">
            </div>

            <div class="col-lg-auto col col-6 my-auto reveal-5 align-center">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/logos/insitu.png" alt="Compost In Situ">
            </div>

            <div class="col-lg-auto col col-6 my-auto reveal-6 align-center">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/logos/cycl.png" alt="Cycl'organique">
            </div>

            <div class="col-lg-auto col col-6 my-auto reveal-7 align-center">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/logos/formation.png" alt="Mon compte formation">
            </div>

            <div class=" col my-auto col-qualiopi  reveal-8">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/logos/qualiopi.png" alt="Qualipi">
                <div class="texte-xs">La certification qualité a été délivrée au titre de la catégorie d'action suivante
                    : Actions de formation <a href="/wp-content/uploads/2024/11/certificat-qualiopi.pdf">Télécharger le certificat.</a></div>
            </div>
        </div> -->

        <div class="row ">
            <div class="col col-12 reveal">
                <img class="reveal-1" src="<?php echo get_stylesheet_directory_uri() ?>/logos/ademe.png" alt="ADEME">
           
            
                <img class="reveal-2" src="<?php echo get_stylesheet_directory_uri() ?>/logos/biodechets.png" alt="Biodéchets">
          

          
                <img class="reveal-3" src="<?php echo get_stylesheet_directory_uri() ?>/logos/rcc.png" alt="Membre Réseau Compost Citoyen">
          

         
                <img class="reveal-4" src="<?php echo get_stylesheet_directory_uri() ?>/logos/esus.png" alt="ESUS">
          

        
                <img class="reveal-5" src="<?php echo get_stylesheet_directory_uri() ?>/logos/insitu.png" alt="Compost In Situ">
          

         
                <img class="reveal-6" src="<?php echo get_stylesheet_directory_uri() ?>/logos/cycl.png" alt="Cycl'organique">
          

         
                <img class="reveal-7" src="<?php echo get_stylesheet_directory_uri() ?>/logos/formation.png" alt="Mon compte formation">
           
                

            <div class=" col-qualiopi  reveal-8">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/logos/qualiopi.png" alt="Qualipi">
                <div class="texte-xs">La certification qualité a été délivrée au titre de la catégorie d'action suivante
                    : Actions de formation <a href="/wp-content/uploads/2024/11/certificat-qualiopi.pdf">Télécharger le certificat.</a></div>
            </div>
        </div>
</div>
    </div>
</div>


<footer>
    <div class="container">
        <div class="row row-footer">
            <div class="col-quart footer-adresse">
                <a href="/"><img src="<?php echo get_stylesheet_directory_uri() ?>/logos/logo-footer.svg" alt="DM Compost"></a>
                <div class="texte-s">128 rue Édouard Vaillant<br>94140 Alfortville</div>
                <a href="/contact" class="btn-texte">NOUS CONTACTER</a>
            </div>
            <div class="col-quart  footer-expertises">
            <?php foreach ($GLOBALS['expertises'] as $expertise): ?>
                <div><a href="/<?php echo $expertise->post_name ?>" class="btn-texte  menu-roll"><?php echo $expertise->post_title ?></a></div>
                <?php endforeach; ?>
                <div><a href="/formations-animations" class="btn-texte  menu-roll">Formations & animations</a></div>
            </div>
            <div class="col-quart  footer-cibles">
                <div class="texte-s">Vous êtes :</div>
            <?php foreach ($GLOBALS['cibles'] as $cible): ?>
                <div><a href="/<?php echo $cible->post_name ?>" class="texte-s  menu-roll"><?php echo $cible->post_title ?></a></div>
                <?php endforeach; ?>
            </div>
            <div class="col-quart  footer-liens">
                <div><a href="/qui-sommes-nous" class="texte-s  menu-roll">Qui sommes-nous ?</a></div>
                <div><a href="/references" class="texte-s  menu-roll">Références</a></div>
                <div><a href="/politique-de-confidentialite/" class="texte-s  menu-roll">Politique de confidentialité</a></div>
                <div><a href="/credits" class="texte-s  menu-roll">Crédits</a></div>
                <div>
                    <a href="https://fr-fr.facebook.com/DMCompost/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/logos/ico-fb.svg" alt="Facebook"></a> 
                    <a href="https://www.linkedin.com/company/dmcompost" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/logos/ico-ln.svg" alt="LinkedIn"></a> 
                    <a href="https://www.instagram.com/dmcompost/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/logos/ico-insta.svg" alt="Instagram"></a> 
                </div>
            </div>
        </div>

        <div class="row row-copyright">
            <div class="texte-xs">DM Compost - Tous droits réservés 2024</div>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>